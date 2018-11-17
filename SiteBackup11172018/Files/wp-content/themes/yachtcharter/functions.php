<?php

/* ----------------------------------------------------------------------------

   Theme Setup

---------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) $content_width = 640;
	add_action( 'after_setup_theme', 'yachtcharter_setup' );

if ( ! function_exists( 'yachtcharter_setup' ) ):
	function yachtcharter_setup() {
		add_theme_support( 'post-thumbnails' );
		
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
	        set_post_thumbnail_size( "100", "100" );  
		}

		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'yachtcharter-image-style1', 710, 410, true );
			add_image_size( 'yachtcharter-image-style2', 500, 370, true );
			add_image_size( 'yachtcharter-image-style3', 70, 70, true );
			add_image_size( 'yachtcharter-image-style4', 550, 400, true );
			add_image_size( 'yachtcharter-image-style5', 140, 72, true );
			add_image_size( 'yachtcharter-image-style6', 560, 376, true );
			add_image_size( 'yachtcharter-image-style7', 9999, 9999, true );
		}
	
		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'yachtcharter', get_template_directory() . '/framework/languages' );
		$locale = get_locale();
		$locale_file = get_template_directory() . "/framework/languages/$locale.php";
		if ( is_readable( $locale_file ) ) require_once( $locale_file );

	}
	
endif;

// Add Title Tag Support
add_theme_support( 'title-tag' );

// Add Admin CSS
function yachtcharter_admin_style() {
  wp_enqueue_style('yachtcharter_admin_styles', get_template_directory_uri().'/framework/css/admin.css');
}
add_action('admin_enqueue_scripts', 'yachtcharter_admin_style');


/* ----------------------------------------------------------------------------

   Required Plugins

---------------------------------------------------------------------------- */
require_once ('framework/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'yachtcharter_theme_register_required_plugins' );

function yachtcharter_theme_register_required_plugins() {

	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'     				=> esc_html__('Yacht Charter Shortcodes & Post Types','yachtcharter'), // The plugin name
			'slug'     				=> 'yachtcharter-shortcodes-post-types', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/yachtcharter-shortcodes-post-types.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.5.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Redux Framework','yachtcharter'), // The plugin name
			'slug'     				=> 'redux-framework', // The plugin slug (typically the folder name)
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '3.6.9', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('WP Bakery Page Builder','yachtcharter'), // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/js-composer.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.4.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Revolution Slider','yachtcharter'), // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.4.7.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Contact Form 7','yachtcharter'), // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Simple Twitter Tweets','yachtcharter'), // The plugin name
			'slug'     				=> 'simple-twitter-tweets', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Newsletter','yachtcharter'), // The plugin name
			'slug'     				=> 'newsletter', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.4.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('WP PageNavi','yachtcharter'), // The plugin name
			'slug'     				=> 'wp-pagenavi', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.92', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('WordPress Importer','yachtcharter'), // The plugin name
			'slug'     				=> 'wordpress-importer', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '0.6.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Widget Importer & Exporter','yachtcharter'), // The plugin name
			'slug'     				=> 'widget-importer-exporter', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.5.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		)

	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}



/* ----------------------------------------------------------------------------

   Load Visual Componser Modifications

---------------------------------------------------------------------------- */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	require_once(get_template_directory() . '/framework/inc/visualcomposer/vc_modifications.php');
}



/* ----------------------------------------------------------------------------

   Set Visual Componser Template Directory

---------------------------------------------------------------------------- */
if (class_exists('WPBakeryVisualComposerAbstract')) {
	$dir = get_stylesheet_directory() . '/framework/inc/visualcomposer/vc_templates';
	vc_set_shortcodes_templates_dir( $dir );
}



/* ----------------------------------------------------------------------------

   Comments Template

---------------------------------------------------------------------------- */
if( ! function_exists( 'yachtcharter_comments' ) ) {
	function yachtcharter_comments($comment, $args, $depth) {
	   $path = get_template_directory_uri();
	   $GLOBALS['comment'] = $comment;
	   ?>
		
	<li <?php comment_class('comment-entry clearfix'); ?> id="comment-<?php comment_ID(); ?>">
		
		<?php $avatar_url = get_template_directory_uri() . '/images/comment.jpg'; ?>
		
		<!-- BEGIN .comment-left -->
		<div class="comment-left">
			<div class="comment-image">
				<?php echo get_avatar( $comment, 70 ); ?>
			</div>
		<!-- END .comment-left -->
		</div>

		<!-- BEGIN .comment-right -->
		<div class="comment-right">
					
			<p class="comment-info"><?php printf( esc_html__( '%s', 'yachtcharter' ), sprintf( '%s', get_comment_author_link() ) ); ?> 
				<span><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php printf( esc_html__( '%1$s at %2$s', 'yachtcharter' ), get_comment_date(),  get_comment_time() ); ?>
				</a></span>
			</p>
					
			<div class="comment-text">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="comment-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'yachtcharter' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div>
					
			<p class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'yachtcharter' ), ' ' ); ?>
			</p>

		<!-- END .comment-right -->
		</div>		

	<?php }
}



/* ----------------------------------------------------------------------------

   Options Panel

---------------------------------------------------------------------------- */
if ( !isset( $redux_demo ) && file_exists( get_template_directory() . '/framework/admin/admin-config.php' ) ) {
    require_once( get_template_directory() . '/framework/admin/admin-config.php' );
}



/* ----------------------------------------------------------------------------

   Register Sidebars

---------------------------------------------------------------------------- */
function yachtcharter_widgets_init() {

	// Area 1
	register_sidebar( array(
		'name' => esc_html__( 'Standard Page Sidebar', 'yachtcharter' ),
		'id' => 'primary-widget-area',
		'description' => esc_html__( 'Displayed in the sidebar of all pages except the homepage', 'yachtcharter' ),
		'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3><div class="title-block5"></div>',
	) );
	
	// Area 2
	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'yachtcharter' ),
		'id' => 'footer-widget-area',
		'description' => esc_html__( 'Displayed at the bottom of all pages', 'yachtcharter' ),
		'before_widget' => '<div id="%1$s" class="one-fourth widget clearfix %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5><div class="title-block6"></div>',
	) );

}

add_action( 'widgets_init', 'yachtcharter_widgets_init' );



/* ----------------------------------------------------------------------------

   Register Menu

---------------------------------------------------------------------------- */
if( !function_exists( 'yachtcharter_register_menu' ) ) {
	function yachtcharter_register_menu() {
	
		register_nav_menus(
		    array(
				'primary' => esc_html__( 'Primary Navigation','yachtcharter' ),
				'secondary' => esc_html__( 'Secondary Navigation','yachtcharter' )
		    )
		  );
		
	}

	add_action('init', 'yachtcharter_register_menu');
}



/* ----------------------------------------------------------------------------

   Register Dependant Javascript Files

---------------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', 'yachtcharter_load_js');

if( ! function_exists( 'yachtcharter_load_js' ) ) {
	function yachtcharter_load_js() {

		if ( is_admin() ) {
			// Admin
		}
		
		else {
			
			// Load JS		
			wp_register_script( 'prettyPhoto', get_template_directory_uri() . '/framework/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.6', true );
			wp_register_script( 'owlcarousel', get_template_directory_uri() . '/framework/js/owl.carousel.min.js', array( 'jquery' ), '1.0', true );
			wp_register_script( 'yachtcharter_custom_js', get_template_directory_uri() . '/framework/js/scripts.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( array( 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-accordion', 'jquery-ui-tabs', 'jquery-effects-core', 'prettyPhoto', 'owlcarousel' ) );
			
			global $yachtcharter_data; 
			
			wp_register_script( 'yachtcharter_custom_js', get_template_directory_uri() . '/framework/js/scripts.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'yachtcharter_custom_js' );
			
			// Load Inline JS
			if ( isset($yachtcharter_data['custom_js']) ) { 
				wp_add_inline_script( 'yachtcharter_custom_js', $yachtcharter_data['custom_js'] );
			}
			
			if( is_single() ) wp_enqueue_script( 'comment-reply' );
			
			// Load Colour CSS
			wp_enqueue_style('yachtcharter_color_blue', get_template_directory_uri() .'/framework/css/color-blue.css');
			
			// Deregister Composer Custom CSS
			wp_deregister_style( 'js_composer_custom_css' );
			
			// Load Main CSS
			wp_enqueue_style('yachtcharter_style', get_bloginfo('stylesheet_url'));

			// Set Font Family 1
			if ( !$yachtcharter_data['google_font_name_1'] ) { 
				$google_font_name_1 = "'Source Serif Pro', serif"; } 
			else { 
				$google_font_name_1 =  $yachtcharter_data['google_font_name_1']['font-family']; 
			}

			// Set Font Family 2
			if ( !$yachtcharter_data['google_font_name_2'] ) { 
				$google_font_name_2 = "'Source Serif Pro', serif"; } 
			else { 
				$google_font_name_2 =  $yachtcharter_data['google_font_name_2']['font-family']; 
			}

			// Set Main Color
			if( !$yachtcharter_data['main-color'] ) {
				$main_color = '#85a5cc';
			} else {
				$main_color = esc_attr($yachtcharter_data['main-color']);
			}

			// Set Secondary Color
			if( !$yachtcharter_data['secondary-color'] ) {
				$secondary_color = '#1a1f2b';
			} else {
				$secondary_color = esc_attr($yachtcharter_data['secondary-color']);
			}
			
			// Secondary Color Border
			if( !$yachtcharter_data['secondary-color-border'] ) {
				$secondary_color_border = '#2f3545';
			} else {
				$secondary_color_border = esc_attr($yachtcharter_data['secondary-color-border']);
			}
			
			// Mobile Navigation Background Color
			if( !$yachtcharter_data['mobile-nav-color'] ) {
				$mobile_nav_color = '#272f43';
			} else {
				$mobile_nav_color = esc_attr($yachtcharter_data['mobile-nav-color']);
			}

			// Set 404 Background Image
			if( isset($yachtcharter_data['404-background']) ) {
				$page_not_found_background = esc_url($yachtcharter_data['404-background']['url']);
			} else {
				$page_not_found_background = '';
			}
			
			// Header Background Color
			if( !$yachtcharter_data['header-background-color'] ) {
				$header_background_colour = '#fff';
			} else {
				$header_background_colour = esc_attr($yachtcharter_data['header-background-color']);
			}
			
			// Header Text Color
			if( !$yachtcharter_data['header-text-color'] ) {
				$header_text_colour = '#424242';
			} else {
				$header_text_colour = esc_attr($yachtcharter_data['header-text-color']);
			}
			
			// Header Border Color
			if( !$yachtcharter_data['header-border-color'] ) {
				$header_border_colour = '#e8e8e8';
			} else {
				$header_border_colour = esc_attr($yachtcharter_data['header-border-color']);
			}
			
			// Footer Background Color
			if( !$yachtcharter_data['footer-background-color'] ) {
				$footer_background_color = '#1a1f2b';
			} else {
				$footer_background_color = esc_attr($yachtcharter_data['footer-background-color']);
			}
			
			// Footer Bottom Background Color
			if( !$yachtcharter_data['footer-bottom-background-color'] ) {
				$footer_bottom_background_color = '#1a1f2b';
			} else {
				$footer_bottom_background_color = esc_attr($yachtcharter_data['footer-bottom-background-color']);
			}
			
			// Footer Widget Text Color
			if( !$yachtcharter_data['footer-title-text-color'] ) {
				$footer_title_text_color = '#ffffff';
			} else {
				$footer_title_text_color = esc_attr($yachtcharter_data['footer-title-text-color']);
			}
			
			// Footer Text Color
			if( !$yachtcharter_data['footer-text-color'] ) {
				$footer_text_color = '#ffffff';
			} else {
				$footer_text_color = esc_attr($yachtcharter_data['footer-text-color']);
			}
			
			// Footer Bottom Text Color
			if( !$yachtcharter_data['footer-bottom-text-color'] ) {
				$footer_bottom_text_color = '#ffffff';
			} else {
				$footer_bottom_text_color = esc_attr($yachtcharter_data['footer-bottom-text-color']);
			}
			
			// Remove spacing from footer if no widgets added
			if ( !is_active_sidebar('footer-widget-area') ) {
				$footer_css = '.footer {
					padding: 0;
				}

				.footer-bottom {
					margin: 0 auto;
				}';
			} else {
				$footer_css = '';
			}

			// Output CSS	
			$output = '';

			$output .= $footer_css;

			$output .= 'h1, h2, h3, h4, h5, h6, .logo h2, .rev-custom-caption-1 h3, .rev-custom-caption-2 h3, .dropcap, .content-wrapper table th, .footer table th, .vc_tta-tabs .vc_tta-title-text, .yacht-block-image .new-icon, .content-wrapper .search-results-list li {
				font-family: ' . $google_font_name_1 . ';
			}';

			$output .= 'body, select, input, button, form textarea, .yacht-charter-sale-form h3 span, #reply-title small {
				font-family: ' . $google_font_name_2 . ';
			}';
			
			if ( isset( $secondary_color ) ) {
				$output .= '/* The dark background areas, default #1a1f2b */
				.top-bar-wrapper,
				.mobile-navigation-wrapper,
				.mobile-navigation-wrapper, 
				.mobile-navigation-wrapper ul li li a, 
				.mobile-navigation-wrapper ul li li li a,
				.about-us-block,
				.our-yachts-sections-dark,
				.booking-form-right,
				.footer,
				.advanced-search-form form,
				.yacht-charter-sale-form form,
				.content-wrapper table th,
				#ui-datepicker-div,
				.content-wrapper .search-results-form {
					background: ' . $secondary_color . ';
				}';
			}
			
			if ( isset( $main_color ) ) {
				$output .= '/* The main bright highlight colour, default #85a5cc */
				.logo h2:before,
				.navigation li ul li a:hover,
				.top-right-button,
				.rev-custom-caption-1 .title-block1,
				.rev-custom-caption-2 .title-block1,
				.slideshow-button-photos,
				.slideshow-button-about,
				.title-block2,
				.title-block7,
				.title-block4,
				.title-block5,
				.title-block8,
				.title-block3,
				.button0,
				.yacht-block-image .new-icon,
				.owl-theme .owl-dots .owl-dot span,
				.button-view-yachts,
				.button-get-in-touch,
				.news-m,
				form button,
				.title-block6,
				.footer-bottom,
				.pp_close,
				.page-pagination li span.current,
				.page-pagination li a:hover,
				.content-wrapper .accordion h4:before,
				.toggle h4:before,
				.widget .contact-details-widget .cdw-address:before,
				.widget .contact-details-widget .cdw-time:before,
				.widget .contact-details-widget .cdw-phone:before,
				.widget .contact-details-widget .cdw-email:before,
				#ui-datepicker-div a:hover,
				.button1:hover,
				.button3:hover,
				.button5:hover,
				.button2,
				.button4,
				.button6,
				.news-read-more,
				.more-link,
				.content-wrapper .search-results-list li:before,
				.main-content .social-links li i,
				.wp-pagenavi span.current, 
				.wp-pagenavi a:hover,
				#submit-button,
				.wpcf7-submit,
				.vc_tta-panels .vc_tta-panel-title:before,
				.toggle h4:before,
				.footer table th,
				.sidebar-content table th,
				.post-pagination span,
				.post-pagination span:hover,
				.newsletter-submit {
					background: ' . $main_color . ';
				}
				
				.pp_close {
					background: url("' . get_template_directory_uri() . '/framework/images/close.png") no-repeat center ' . $main_color . ';
				}
				
				.tnp-widget input[type="submit"] {
					background: ' . $main_color . ' !important; 
				}

				.navigation li ul,
				.header-style-2 .navigation > ul > li.current-menu-item,
				.header-style-2 .navigation > ul > li.current_page_item,
				.header-style-2 .navigation > ul > li:hover {
					border-top: ' . $main_color . ' 3px solid;
				}

				.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a {
					border-top: ' . $main_color . ' 4px solid !important;
				}

				.home-icon-wrapper .yachtcharter-home-icon,
				.home-icon-wrapper-2 .yachtcharter-home-icon,
				.sticky {
					border: ' . $main_color . ' 3px solid;
				}

				.home-icon-wrapper .yachtcharter-home-icon:after {
					border-top-color: ' . $main_color . ';
				}

				.yachtcharter-home-icon i,
				.content-wrapper .yacht-block ul li:before,
				.content-wrapper .testimonial-wrapper p span.yachtcharter-open-quote,
				.content-wrapper .testimonial-wrapper p span.yachtcharter-close-quote,
				.content-wrapper .testimonial-wrapper div span.yachtcharter-open-quote,
				.content-wrapper .testimonial-wrapper div span.yachtcharter-close-quote,
				.content-wrapper p a,
				.booking-form-wrapper p a,
				.footer ul li:before,
				.widget ul li:after,
				.content-wrapper ul li:before,
				.news-block-wrapper .news-block-content .news-meta .nm-news-author:before,
				.news-block-wrapper .news-block-content .news-meta .nm-news-date:before,
				.news-block-wrapper .news-block-content .news-meta .nm-news-category:before,
				.news-block-wrapper .news-block-content .news-meta .nm-news-comments:before {
					color: ' . $main_color . ';
				}

				.owl-theme .owl-dots .owl-dot span,
				.owl-theme .owl-dots .owl-dot.active span {
					border: 2px solid ' . $main_color . ';
				}

				.page-pagination li span.current,
				.page-pagination li a:hover,
				.button1:hover,
				.button3:hover,
				.button5:hover,
				.wp-pagenavi span.current, 
				.wp-pagenavi a:hover,
				.post-pagination span,
				.post-pagination span:hover,
				.footer .tagcloud a {
					border: ' . $main_color . ' 1px solid;
				}

				.ui-tabs .ui-tabs-nav li.ui-state-active {
					border-top: ' . $main_color . ' 4px solid;
				}';
			}
			
			if ( isset( $secondary_color_border ) ) {
				$output .= '/* The faint border colour overlayed on the dark background colour, default #2f3545 */
				.content-wrapper .yacht-charter-sale-form h3 {
					border-top: ' . $secondary_color_border . ' 1px solid;
					border-bottom: ' . $secondary_color_border . ' 1px solid;
				}

				.yacht-charter-sale-form h3 span {
					border-top: ' . $secondary_color_border . ' 1px solid;
				}

				.ui-datepicker-calendar tbody tr td a,
				#ui-datepicker-div .ui-datepicker-calendar tbody tr td span {
					border-right: ' . $secondary_color_border . ' 1px solid;
					border-bottom: ' . $secondary_color_border . ' 1px solid;
				}

				.ui-datepicker-calendar thead tr th {
					border-top: ' . $secondary_color_border . ' 1px solid;
					border-bottom: ' . $secondary_color_border . ' 1px solid;
				}';
			}
			
			if ( isset( $mobile_nav_color ) ) {
				$output .= '/* The mobile navigation background colour, default #272f43  */
				.mobile-navigation-wrapper ul a {
					border-top: ' . $mobile_nav_color . ' 1px solid;
				}

				.mobile-navigation-wrapper ul a, .mobile-navigation-wrapper ul li li a:hover, .mobile-navigation-wrapper ul li li li a:hover {
					background: ' . $mobile_nav_color . ';
				}';
			}
			
			if ( isset( $page_not_found_background ) ) {
				$output .= '.page-not-found-header {background: url(' . $page_not_found_background . ') no-repeat center top #f0f0f0;}';
			}
			
			if ( isset( $header_background_colour ) ) {
				$output .= '.header-wrapper, .navigation ul ul, .fixed-navigation-show {background: ' . $header_background_colour . ';}';
			}
			
			if ( isset( $header_text_colour ) ) {
				$output .= '.logo h2 a, .navigation li a, .navigation ul li.menu-item-has-children > a:after, .navigation-inner-wrapper .fa-search, .navigation ul li li a, .navigation .megamenu-1-col ul li a, .navigation .megamenu-2-col ul li a, .navigation .megamenu-3-col ul li a, .navigation .megamenu-4-col ul li a, .navigation .megamenu-5-col ul li a, #mobile-navigation a {color: ' . $header_text_colour . ';}';
			}
			
			if ( isset( $header_border_colour ) ) {
				$output .= '.header-style-2 #primary-navigation {
					border-top: ' . $header_border_colour . ' 1px solid;
				}

				.header-style-2 .navigation > ul > li:first-child > a {
					border-left: ' . $header_border_colour . ' 1px solid;
				}

				.header-style-2 .navigation > ul > li > a {
					border-right: ' . $header_border_colour . ' 1px solid;
				}
				
				.navigation .megamenu-2-col ul li, .navigation .megamenu-3-col ul li, .navigation .megamenu-4-col ul li, .navigation .megamenu-5-col ul li,
				.navigation .megamenu-2-col ul li:hover, .navigation .megamenu-3-col ul li:hover, .navigation .megamenu-4-col ul li:hover, .navigation .megamenu-5-col ul li:hover {
					border-right: ' . $header_border_colour . ' 1px solid;
				}
				
				.footer {
					background: ' . $footer_background_color . ';
				}
				
				.footer-bottom {
					background: ' . $footer_bottom_background_color . ';
				}
				
				.footer h5 {
					color: ' . $footer_title_text_color . ';
				}
				
				.footer, .footer p, .footer h1, .footer h2, .footer h3, .footer h4, .footer h6, .footer li, .footer li a, .footer a, .footer p a, .footer .tagcloud a {
					color: ' . $footer_text_color . ';
				}
				
				.footer .footer-bottom .footer-message,
				.footer .footer-bottom .footer-social-icons-wrapper a {
					color: ' . $footer_bottom_text_color . ';
				}
				
				';
			}
			
			// Load Inline CSS
			wp_add_inline_style( 'yachtcharter_style', $output );
			
			// Load Other CSS
			wp_enqueue_style('prettyPhoto', get_template_directory_uri() .'/framework/css/prettyPhoto.css');
			wp_enqueue_style('owlcarousel', get_template_directory_uri() .'/framework/css/owl.carousel.css');
			wp_enqueue_style('yachtcharter_responsive', get_template_directory_uri() .'/framework/css/responsive.css');
			wp_enqueue_style('fontawesome', get_template_directory_uri() .'/framework/css/font-awesome/css/font-awesome.min.css');
			
		}
	}
}



/* ----------------------------------------------------------------------------

   Enqueue Fonts

---------------------------------------------------------------------------- */
/*function yachtcharter_fonts_url() {
    $font_url = '';
    
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'yachtcharter' ) ) {
		
		global $yachtcharter_data;
		
		if ( !$yachtcharter_data['google_font_url_1'] ) {
			$yachtcharter_font_1 = 'Source Serif Pro:400,600,700';
		} else {
			$yachtcharter_font_1 = esc_attr($yachtcharter_data['google_font_url_1']);
		}
		
		if ( !$yachtcharter_data['google_font_url_2'] ) {
			$yachtcharter_font_2 = 'Source Sans Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic';
		} else {
			$yachtcharter_font_2 = esc_attr($yachtcharter_data['google_font_url_2']);
		}
		
        $font_url = add_query_arg( 'family', urlencode( $yachtcharter_font_1 . '|' . $yachtcharter_font_2 ), "//fonts.googleapis.com/css" );
    
	}

    return $font_url;

}

function yachtcharter_font_scripts() {
    wp_enqueue_style( 'yachtcharter_fonts', yachtcharter_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'yachtcharter_font_scripts' );*/



/* ----------------------------------------------------------------------------

   Loads Files

---------------------------------------------------------------------------- */

// Post Types
include( get_template_directory() . '/framework/inc/post-types/page.php');
include( get_template_directory() . '/framework/inc/post-types/post.php');

// Widgets
include( get_template_directory() . '/framework/inc/widgets/widget-recent-posts.php');
include( get_template_directory() . '/framework/inc/widgets/widget-contact.php');
include( get_template_directory() . '/framework/inc/widgets/widget-booking.php');



/* ----------------------------------------------------------------------------

   Remove width / height attributes from gallery images

---------------------------------------------------------------------------- */
add_filter('wp_get_attachment_link', 'yachtcharter_remove_img_width_height', 10, 1);
add_filter('wp_get_attachment_image_attributes', 'yachtcharter_remove_img_width_height', 10, 1);

function yachtcharter_remove_img_width_height($html) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



/* ----------------------------------------------------------------------------

   Remove rel attribute from the category list

---------------------------------------------------------------------------- */
function yachtcharter_remove_category_list_rel($output)
{
  $output = str_replace(' rel="category"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'yachtcharter_remove_category_list_rel');
add_filter('the_category', 'yachtcharter_remove_category_list_rel');



/* ----------------------------------------------------------------------------

   Excerpt Length

---------------------------------------------------------------------------- */
function yachtcharter_print_excerpt($length) {
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); 
	$text = strip_tags($text);

	$text = substr($text,0,$length);
	$excerpt = yachtcharter_reverse_strrchr($text, '.', 1);
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}

function yachtcharter_reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}



/* ----------------------------------------------------------------------------

   Excerpt More Link

---------------------------------------------------------------------------- */
function yachtcharter_continue_reading_link() {
		return '';
}

function yachtcharter_auto_excerpt_more( $more ) {
	return yachtcharter_continue_reading_link();
}
add_filter( 'excerpt_more', 'yachtcharter_auto_excerpt_more' );



/* ----------------------------------------------------------------------------

   Main Menu Fallback

---------------------------------------------------------------------------- */
function yachtcharter_main_menu_fallback() { ?>

<ul>
	<?php wp_list_pages(array(
		'depth' => 2,
		'exclude' => '',
		'title_li' => '',
		'link_before'  => '',
		'link_after'   => '',
		'sort_column' => 'post_title',
		'sort_order' => 'ASC',
	)); ?>
</ul>

<?php }



/* ----------------------------------------------------------------------------

   Mobile Main Menu Fallback

---------------------------------------------------------------------------- */
function yachtcharter_mobile_menu() { ?>

<ul class="mobile-menu">
	<?php wp_list_pages(array(
		'depth' => 2,
		'exclude' => '',
		'title_li' => '',
		'link_before'  => '',
		'link_after'   => '',
		'sort_column' => 'post_title',
		'sort_order' => 'ASC',
	)); ?>
</ul>

<?php }



/* ----------------------------------------------------------------------------

   Password Protected Post Form

---------------------------------------------------------------------------- */
add_filter( 'the_password_form', 'yachtcharter_password_form' );

function yachtcharter_password_form() {
	
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<div class="msg fail clearfix"><p class="nopassword">' . esc_html__( 'This post is password protected. To view it please enter your password below', 'yachtcharter' ) . '</p></div>
<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post"><label for="' . esc_attr($label) . '">' . esc_html__( 'Password', 'yachtcharter' ) . ' </label><input name="post_password" id="' . esc_attr($label) . '" class="text_input" type="password" size="20" /><div class="clearboth"></div><input class="button1" type="submit" value="' . esc_attr__( 'Submit','yachtcharter' ) . '" name="submit"></form>';
	return $form;
	
}



/* ----------------------------------------------------------------------------

   Page Header

---------------------------------------------------------------------------- */
function yachtcharter_page_header( $image_url ) {
	
	global $yachtcharter_data;
	
	if( is_single() || is_front_page() || is_archive() || is_search() ) {
		
		if ( !empty($yachtcharter_data['page-header-image']['url'] ) ) {
			$output = 'style="background:url(' . esc_url($yachtcharter_data['page-header-image']['url']) . ') top center;"';
		} else {
			$output = 'style="background:#f0f0f0;"';
		}
	
	} else {
		
		if ( !empty($image_url) ) {
			$src = $image_url;
			$output = 'style="background:url(' . esc_url( $src[0] ) . ') top center;"';
		} else {
			
			if ( !empty($yachtcharter_data['page-header-image']['url']) ) {
				$output = 'style="background:url(' . esc_url($yachtcharter_data['page-header-image']['url']) . ') top center;"';
			} else {
				$output = 'style="background:#f0f0f0;"';
			}
			
		}
		
	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Blog Columns

---------------------------------------------------------------------------- */
function yachtcharter_blog_columns1( $blog_columns ) {
	
	$output = '';
	
	if ( $blog_columns == '1' ) {
		$output .= 'blog-listing-page-single-col';
	} elseif ( $blog_columns == '2' ) {
		$output .= 'blog-2-col';
	} elseif ( $blog_columns == '3' ) {
		$output .= 'blog-3-col';
	} elseif ( $blog_columns == '4' ) {
		$output .= 'blog-4-col';
	} else {
		$output .= 'blog-3-col';
	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Blog Columns 2

---------------------------------------------------------------------------- */
function yachtcharter_blog_columns2( $blog_columns,$count ) {
	
	$output = '';
	
	if ( $blog_columns == '1' ) {
		
		$output .= 'blog-listing-wrapper';
		
	} elseif ( $blog_columns == '2' ) {
		
		if($count % 2 == 0) {
			$output .= 'blog-listing-wrapper one-half last-col';
		} else {
			$output .= 'blog-listing-wrapper one-half';
		}
		
	} elseif ( $blog_columns == '3' ) {
		
		if($count % 3 == 0) {
			$output .= 'blog-listing-wrapper one-third last-col';
		} else {
			$output .= 'blog-listing-wrapper one-third';
		}
		
	} elseif ( $blog_columns == '4' ) {
		
		if($count % 4 == 0) {
			$output .= 'blog-listing-wrapper one-fourth last-col';
		} else {
			$output .= 'blog-listing-wrapper one-fourth';
		}
	
	} else {
		
		if($count % 3 == 0) {
			$output .= 'blog-listing-wrapper one-third last-col';
		} else {
			$output .= 'blog-listing-wrapper one-third';
		}

	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Accommodation Columns

---------------------------------------------------------------------------- */
function yachtcharter_accommodation_columns1( $accommodation_columns ) {
	
	$output = '';
	
	if ( $accommodation_columns == '1' ) {
		$output .= 'accommodation-1-col';
	} elseif ( $accommodation_columns == '2' ) {
		$output .= 'accommodation-2-col';
	} elseif ( $accommodation_columns == '3' ) {
		$output .= 'accommodation-3-col';
	} elseif ( $accommodation_columns == '4' ) {
		$output .= 'accommodation-4-col';
	} else {
		$output .= 'accommodation-3-col';
	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Accommodation Columns 2

---------------------------------------------------------------------------- */
function yachtcharter_accommodation_columns2( $accommodation_columns,$count ) {
	
	if ( $accommodation_columns == '1' ) {
		
		$output = '';
		
	} elseif ( $accommodation_columns == '2' ) {
		
		if($count % 2 == 0) {
			$output = 'one-half last-col';
		} else {
			$output = 'one-half';
		}
		
	} elseif ( $accommodation_columns == '3' ) {
		
		if($count % 3 == 0) {
			$output = 'one-third last-col';
		} else {
			$output = 'one-third';
		}
		
	} elseif ( $accommodation_columns == '4' ) {
		
		if($count % 4 == 0) {
			$output = 'one-fourth last-col';
		} else {
			$output = 'one-fourth';
		}
	
	} else {
		
		if($count % 3 == 0) {
			$output = 'one-third last-col';
		} else {
			$output = 'one-third';
		}

	}
	
	return $output;	
	
}



/* ----------------------------------------------------------------------------

   Blog Space

---------------------------------------------------------------------------- */
function yachtcharter_blog_space($columns,$count) {
	
	$output = '';
	
	if ($columns == 1 ) {

		if($count % 1 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	} elseif ($columns == 2 ) {

		if($count % 2 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	} elseif ($columns == 3 ) {

		if($count % 3 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	} elseif ($columns == 4 ) {

		if($count % 4 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	}
	
	return $output;
	
}



/* ----------------------------------------------------------------------------

   Accommodation Space

---------------------------------------------------------------------------- */
function yachtcharter_accommodation_space($columns,$count) {
	
	$output = '';
	
	if ($columns == 1 ) {

		if($count % 1 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	} elseif ($columns == 2 ) {

		if($count % 2 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	} elseif ($columns == 3 ) {

		if($count % 3 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	} elseif ($columns == 4 ) {

		if($count % 4 == 0) {
			$output .= '<div class="clearboth"></div><hr class="space4" />';
		}

	}
	
	return $output;
	
}



/* ----------------------------------------------------------------------------

   Add PrettyPhoto for Attached Images

---------------------------------------------------------------------------- */
add_filter( 'wp_get_attachment_link', 'yachtcharter_sant_prettyadd');
function yachtcharter_sant_prettyadd ($content) {
     $content = preg_replace("/<a/","<a
data-gal=\"prettyPhoto[slides]\"",$content,1);
     return $content;
}



/* ----------------------------------------------------------------------------

   Allow for plugin detection

---------------------------------------------------------------------------- */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );



/* ----------------------------------------------------------------------------

   Social Icons

---------------------------------------------------------------------------- */
function yachtcharter_footer_social_icons() {
	
	global $yachtcharter_data;
	
	$output = '';
	
	if($yachtcharter_data['social-link-target'] == '1' ) {	
		$social_link_target = "_blank";
	} else {
		$social_link_target = "_parent";
	}
	
	if($yachtcharter_data['facebook-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['facebook-icon']) . '"><i class="fa fa-facebook"></i></a>';		
	}
	
	if($yachtcharter_data['flickr-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['flickr-icon']) . '"><i class="fa fa-flickr"></i></a>';		
	}
	
	if($yachtcharter_data['googleplus-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['googleplus-icon']) . '"><i class="fa fa-google-plus"></i></a>';		
	}
	
	if($yachtcharter_data['instagram-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['instagram-icon']) . '"><i class="fa fa-instagram"></i></a>';		
	}
	
	if($yachtcharter_data['linkedin-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['linkedin-icon']) . '"><i class="fa fa-linkedin"></i></a>';		
	}
	
	if($yachtcharter_data['pinterest-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['pinterest-icon']) . '"><i class="fa fa-pinterest"></i></a>';		
	}
	
	if($yachtcharter_data['skype-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['skype-icon']) . '"><i class="fa fa-skype"></i></a>';		
	}
	
	if($yachtcharter_data['soundcloud-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['soundcloud-icon']) . '"><i class="fa fa-soundcloud"></i></a>';		
	}
	
	if($yachtcharter_data['tumblr-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['tumblr-icon']) . '"><i class="fa fa-tumblr"></i></a>';		
	}
	
	if($yachtcharter_data['twitter-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['twitter-icon']) . '"><i class="fa fa-twitter"></i></a>';		
	}
	
	if($yachtcharter_data['vimeo-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['vimeo-icon']) . '"><i class="fa fa-vimeo-square"></i></a>';		
	}
	
	if($yachtcharter_data['vine-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['vine-icon']) . '"><i class="fa fa-vine"></i></a>';		
	}
	
	if($yachtcharter_data['yelp-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['yelp-icon']) . '"><i class="fa fa-yelp"></i></a>';		
	}
	
	if($yachtcharter_data['youtube-icon'] != '' ) {	
		$output .= '<a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['youtube-icon']) . '"><i class="fa fa-youtube-play"></i></a>';		
	}
	
	return '<div class="footer-social-icons-wrapper">' . $output . '</div>';
	
}



/* ----------------------------------------------------------------------------

   Remove width/height dimensions from <img> tags

---------------------------------------------------------------------------- */
add_filter( 'post_thumbnail_html', 'yachtcharter_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'yachtcharter_remove_thumbnail_dimensions', 10 );

function yachtcharter_remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



/* ----------------------------------------------------------------------------

   Include Breadcrumbs

---------------------------------------------------------------------------- */
require_once ('framework/inc/dimox_breadcrumbs.php');



/* ----------------------------------------------------------------------------

   Sidebar

---------------------------------------------------------------------------- */
function yachtcharter_sidebar1($sidebar) {
	
	if ( $sidebar == 'left-sidebar' ) {
		$yachtcharter_sidebar = 'main-content main-content-left-sidebar';
	} elseif ( $sidebar == 'right-sidebar' ) {
		$yachtcharter_sidebar = 'main-content';
	} elseif ( $sidebar == 'full-width' ) {
		$yachtcharter_sidebar = 'main-content main-content-full';
	} elseif ( $sidebar == 'unboxed-full-width' ) {
		$yachtcharter_sidebar = 'main-content main-content-full';
	} 
	
	else {
		$yachtcharter_sidebar = 'main-content';
	}
	
	return $yachtcharter_sidebar;
	
}

function yachtcharter_sidebar2($sidebar) {
	
	if ( $sidebar == 'left-sidebar' ) {
		$yachtcharter_sidebar = 'sidebar-content sidebar-content-left-sidebar';
	} elseif ( $sidebar == 'right-sidebar' ) {
		$yachtcharter_sidebar = 'sidebar-content';
	} elseif ( $sidebar == 'full-width' ) {
		$yachtcharter_sidebar = 'columns-full-width';
	} else {
		$yachtcharter_sidebar = 'sidebar-content';
	}
	
	return $yachtcharter_sidebar;
	
}

$yachtcharter_allowed_html_array = array(
    'style' => array(),
	'div' => array(
		'class' => array(),
		'id' => array(),
	),
	'span' => array(
		'class' => array(),
		'id' => array(),
	),
	'a' => array(
	        'href' => array(),
	        'title' => array()
	),
	'h1' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h2' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h3' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h4' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h5' => array(
	        'class' => array(),
	        'id' => array()
	),
	'h6' => array(
	        'class' => array(),
	        'id' => array()
	),
	'i' => array(
	        'class' => array(),
	        'id' => array()
	),
	'p' => array(
	        'class' => array(),
	        'id' => array()
	),
);

global $yachtcharter_allowed_html_array;

function yacht_header_social_icons() {
	
	global $yachtcharter_data;
	
	if($yachtcharter_data['social-link-target'] == '1' ) {	
		$social_link_target = "_blank";
	} else {
		$social_link_target = "_parent";
	}
	
	$output = '';
	
	/* Header Social Icon #1 */
	if ( !empty($yachtcharter_data['top-right-social-link-1']) ) {
		
		if($yachtcharter_data['top-right-social-link-1'] == 'none' ) {
			$output .= '';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'facebook' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['facebook-icon']) . '"><i class="fa fa-facebook"></i>' . esc_html__('Like Us On Facebook','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'flickr' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['flickr-icon']) . '"><i class="fa fa-flickr"></i>' . esc_html__('Follow Us On Flickr','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'googleplus' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['googleplus-icon']) . '"><i class="fa fa-google-plus"></i>' . esc_html__('Follow Us On Google Plus','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'instagram' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['instagram-icon']) . '"><i class="fa fa-instagram"></i>' . esc_html__('Follow Us On Instagram','yachtcharter') . '</a></li>';
		}
		
		if($yachtcharter_data['top-right-social-link-1'] == 'linkedin' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['linkedin-icon']) . '"><i class="fa fa-linkedin"></i>' . esc_html__('Connect With Us On LinkedIn','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'pinterest' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['pinterest-icon']) . '"><i class="fa fa-pinterest"></i>' . esc_html__('Follow Us On Pinterest','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'skype' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['skype-icon']) . '"><i class="fa fa-skype"></i>' . esc_html__('Call Us On Skype','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'soundcloud' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['soundcloud-icon']) . '"><i class="fa fa-soundcloud"></i>' . esc_html__('Follow Us On Soundcloud','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'tumblr' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['tumblr-icon']) . '"><i class="fa fa-tumblr"></i>' . esc_html__('Follow Us On Tumblr','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'twitter' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['twitter-icon']) . '"><i class="fa fa-twitter"></i>' . esc_html__('Follow Us On Twitter','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'vimeo' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['vimeo-icon']) . '"><i class="fa fa-vimeo-square"></i>' . esc_html__('Watch Us On Vimeo','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'vine' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['vine-icon']) . '"><i class="fa fa-vine"></i>' . esc_html__('Follow Us On Vine','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'yelp' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['yelp-icon']) . '"><i class="fa fa-yelp"></i>' . esc_html__('Follow Us On Yelp','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'youtube' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['youtube-icon']) . '"><i class="fa fa-youtube-play"></i>' . esc_html__('Watch Us On Youtube','yachtcharter') . '</a></li>';
		}
		
	}
	
	/* Header Social Icon #2 */
	if ( !empty($yachtcharter_data['top-right-social-link-2']) ) {
		
		if($yachtcharter_data['top-right-social-link-2'] == 'none' ) {
			$output .= '';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'facebook' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['facebook-icon']) . '"><i class="fa fa-facebook"></i>' . esc_html__('Like Us On Facebook','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'flickr' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['flickr-icon']) . '"><i class="fa fa-flickr"></i>' . esc_html__('Follow Us On Flickr','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'googleplus' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['googleplus-icon']) . '"><i class="fa fa-google-plus"></i>' . esc_html__('Follow Us On Google Plus','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'instagram' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['instagram-icon']) . '"><i class="fa fa-instagram"></i>' . esc_html__('Follow Us On Instagram','yachtcharter') . '</a></li>';
		}
		
		if($yachtcharter_data['top-right-social-link-2'] == 'linkedin' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['linkedin-icon']) . '"><i class="fa fa-linkedin"></i>' . esc_html__('Connect With Us On LinkedIn','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'pinterest' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['pinterest-icon']) . '"><i class="fa fa-pinterest"></i>' . esc_html__('Follow Us On Pinterest','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'skype' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['skype-icon']) . '"><i class="fa fa-skype"></i>' . esc_html__('Call Us On Skype','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'soundcloud' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['soundcloud-icon']) . '"><i class="fa fa-soundcloud"></i>' . esc_html__('Follow Us On Soundcloud','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-1'] == 'tumblr' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['tumblr-icon']) . '"><i class="fa fa-tumblr"></i>' . esc_html__('Follow Us On Tumblr','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'twitter' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['twitter-icon']) . '"><i class="fa fa-twitter"></i>' . esc_html__('Follow Us On Twitter','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'vimeo' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['vimeo-icon']) . '"><i class="fa fa-vimeo-square"></i>' . esc_html__('Watch Us On Vimeo','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'vine' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['vine-icon']) . '"><i class="fa fa-vine"></i>' . esc_html__('Follow Us On Vine','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'yelp' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['yelp-icon']) . '"><i class="fa fa-yelp"></i>' . esc_html__('Follow Us On Yelp','yachtcharter') . '</a></li>';
		}

		if($yachtcharter_data['top-right-social-link-2'] == 'youtube' ) {
			$output .= '<li><a target="' . $social_link_target . '" href="' . esc_url($yachtcharter_data['youtube-icon']) . '"><i class="fa fa-youtube-play"></i>' . esc_html__('Watch Us On Youtube','yachtcharter') . '</a></li>';
		}
		
	}
	
	return $output;
	
}

function yachtcharter_post_type_name($post_type) {
	
	if ($post_type == 'post') {
		return esc_html__('Post','yachtcharter');
	}
	
	if ($post_type == 'testimonial') {
		return esc_html__('Testimonial','yachtcharter');
	}
	
	if ($post_type == 'page') {
		return esc_html__('Page','yachtcharter');
	}
	
	if ($post_type == 'yacht_sales') {
		return esc_html__('Yacht Sales','yachtcharter');
	}
	
	if ($post_type == 'yacht_charter') {
		return esc_html__('Yacht Charter','yachtcharter');
	}
	
	if ($post_type == 'location') {
		return esc_html__('Location','yachtcharter');
	}
	
}

function yachtcharter_limit_text($text, $limit) {
	
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]);
	}
	
	return $text;

}