<?php

/*
  Plugin Name: Yacht Charter Shortcodes & Post Types
  Plugin URI: http://quitenicestuff.com
  Description: A Simple Shortcodes and Post Type Plugin
  Version: 1.5.2
  Author: Quite Nice Stuff
  Author URI: http://quitenicestuff.com
 */



  function register_session(){
        if( !session_id())
            session_start();
    }

add_action('init','register_session');



/* ----------------------------------------------------------------------------

   Load Language Files

---------------------------------------------------------------------------- */
function yachtcharter_init() {
	load_plugin_textdomain( 'yachtcharter', false, dirname(plugin_basename( __FILE__ ))  . '/languages/' ); 
}
add_action('init', 'yachtcharter_init');



/* ----------------------------------------------------------------------------

   Load Files

---------------------------------------------------------------------------- */
if ( ! defined( 'yachtcharter_BASE_FILE' ) )
    define( 'yachtcharter_BASE_FILE', __FILE__ );

if ( ! defined( 'yachtcharter_BASE_DIR' ) )
    define( 'yachtcharter_BASE_DIR', dirname( yachtcharter_BASE_FILE ) );

if ( ! defined( 'yachtcharter_PLUGIN_URL' ) )
    define( 'yachtcharter_PLUGIN_URL', plugin_dir_url( __FILE__ ) );



/* ----------------------------------------------------------------------------

   Plugin Activation

---------------------------------------------------------------------------- */
function yachtcharter_shortcodes_activation() {}
register_activation_hook(__FILE__, 'yachtcharter_shortcodes_activation');

function yachtcharter_shortcodes_deactivation() {}
register_deactivation_hook(__FILE__, 'yachtcharter_shortcodes_deactivation');



/* ----------------------------------------------------------------------------

   Load JS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'yachtcharter_shortcodes_scripts');
function yachtcharter_shortcodes_scripts() {
	
    global $post;
	global $yachtcharter_data;
	
	$GoogleMapApiKey = $yachtcharter_data['google-map-api-key'];
	
	wp_enqueue_script('jquery');
	
	wp_register_script('yachtcharter-custom', plugins_url('assets/js/scripts.js', __FILE__));
	wp_enqueue_script('yachtcharter-custom');
	
	if ( !empty($yachtcharter_data['google-map-api-key']) ) {
		wp_register_script('googleMap', 'https://maps.google.com/maps/api/js?key='.$GoogleMapApiKey);
		wp_enqueue_script('googleMap');
	}
	
	wp_register_script('fontawesomemarkers', plugins_url('assets/js/fontawesome-markers.min.js', __FILE__));
	wp_enqueue_script('fontawesomemarkers');
	
	wp_enqueue_script( array( 'jquery-ui-core', 'jquery-ui-tabs', 'jquery-effects-core' ) );

}



/* ----------------------------------------------------------------------------

   Load CSS

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'yachtcharter_shortcodes_styles');
function yachtcharter_shortcodes_styles() {

	wp_register_style('style', plugins_url('assets/css/style.css', __FILE__));
    wp_enqueue_style('style');

}



/* ----------------------------------------------------------------------------

   Load Shortcodes

---------------------------------------------------------------------------- */
include 'includes/shortcodes/video_text.php';
include 'includes/shortcodes/accommodation_search.php';
include 'includes/shortcodes/latest_news.php';
include 'includes/shortcodes/yacht_charter_carousel.php';
include 'includes/shortcodes/yacht_sales_carousel.php';
include 'includes/shortcodes/testimonials_carousel.php';
include 'includes/shortcodes/yacht_charter_page.php';
include 'includes/shortcodes/yacht_sales_page.php';
include 'includes/shortcodes/testimonials_page.php';
include 'includes/shortcodes/news_page.php';
include 'includes/shortcodes/partners_carousel.php';
include 'includes/shortcodes/price_table.php';
include 'includes/shortcodes/services_page.php';
include 'includes/shortcodes/link_blocks.php';
include 'includes/shortcodes/button.php';
include 'includes/shortcodes/calltoaction.php';
include 'includes/shortcodes/contactdetails.php';
include 'includes/shortcodes/gallery.php';
include 'includes/shortcodes/googlemap.php';
include 'includes/shortcodes/list.php';
include 'includes/shortcodes/message.php';
include 'includes/shortcodes/socialmedia.php';
include 'includes/shortcodes/tabs.php';
include 'includes/shortcodes/title.php';
include 'includes/shortcodes/toggle.php';
include 'includes/shortcodes/video.php';
include 'includes/shortcodes/videothumbnail.php';
include 'includes/shortcodes/booking.php';
include 'includes/shortcodes/locations_page.php';
include 'includes/shortcodes/space.php';
include 'includes/shortcodes/icon_text.php';
include 'includes/shortcodes/call_to_action.php';
//include 'includes/shortcodes/booking_form.php';



/* ----------------------------------------------------------------------------

   Load Post Types

---------------------------------------------------------------------------- */
include 'includes/post-types/testimonials.php';
include 'includes/post-types/yacht_charter.php';
include 'includes/post-types/yacht_sales.php';
include 'includes/post-types/locations.php';



/* ----------------------------------------------------------------------------

   Load Template Chooser

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'yachtcharter_spt_template_chooser');
function yachtcharter_spt_template_chooser( $template ) {
 
    if ( is_search() ) {
		
		return $template;
		
	} else {
		
		$post_id = get_the_ID();

		if ( get_post_type( $post_id ) == 'yacht_charter' ) {
			return yachtcharter_spt_get_template_hierarchy( 'single-yacht-charter' );
		} elseif ( get_post_type( $post_id ) == 'yacht_sales' ) {
			return yachtcharter_spt_get_template_hierarchy( 'single-yacht-sales' );
		} elseif ( get_post_type( $post_id ) == 'testimonial' ) {
			return yachtcharter_spt_get_template_hierarchy( 'single-testimonials' );
		} elseif ( get_post_type( $post_id ) == 'service' ) {
			return yachtcharter_spt_get_template_hierarchy( 'single-service' );
		} elseif ( get_post_type( $post_id ) == 'location' ) {
			return yachtcharter_spt_get_template_hierarchy( 'single-locations' );
		} else {
			return $template;
		}
		
	}

}



/* ----------------------------------------------------------------------------

   Select Template

---------------------------------------------------------------------------- */
add_filter( 'template_include', 'yachtcharter_spt_template_chooser' );
function yachtcharter_spt_get_template_hierarchy( $template ) {
 
	if ( is_search() ) {
		
		$file = yachtcharter_BASE_DIR . '/includes/templates/' . $template;
		return apply_filters( 'yachtcharter_template_' . $template, $file );
	
	} else {

    	$template_slug = rtrim( $template, '.php' );
	    $template = $template_slug . '.php';

	    if ( $theme_file = locate_template( array( 'includes/templates/' . $template ) ) ) {
	        $file = $theme_file;
	    }
	    else {
	        $file = yachtcharter_BASE_DIR . '/includes/templates/' . $template;
	    }

	    return apply_filters( 'yachtcharter_template_' . $template, $file );
	
	}

}



/* ----------------------------------------------------------------------------

   Select Taxonomy Template

---------------------------------------------------------------------------- */
add_filter('template_include', 'qns_taxonomy_template');
function qns_taxonomy_template( $template ){

	if( is_tax('yacht_charter-type')){
  		$template = yachtcharter_BASE_DIR .'/includes/templates/taxonomy-yacht-categories.php';
 	}  

	if( is_tax('yacht_sales-type')){
  		$template = yachtcharter_BASE_DIR .'/includes/templates/taxonomy-yacht-categories.php';
 	}
  	
	return $template;

}



/* ----------------------------------------------------------------------------

   Calculates Difference Between Days

---------------------------------------------------------------------------- */
function yacht_diff_days($start_input,$end_input) {
	
	$start = strtotime( $start_input );
	$end = strtotime( $end_input );
	$days_between = ceil(abs($end - $start) / 86400);
	
	return $days_between;
	
}

?>