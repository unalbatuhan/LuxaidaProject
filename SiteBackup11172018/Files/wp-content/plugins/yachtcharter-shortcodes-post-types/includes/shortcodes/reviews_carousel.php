<?php

function reviews_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'section_title' => 'Reviews From TripAdvisor',
		'review_page_url' => '',
		'posts_per_page' => '3'
	), $atts ) );
	
	global $post;	
	$prefix = 'yachtcharter_';
	
	$args = array(
	'post_type' => 'review',
	'posts_per_page' => 3,
	);

	$output = '<h2 class="section-title"><a href="' . $review_page_url . '">' . $section_title . '</a></h2>';
	$output .= '<div class="title-block2"></div>';
	$output .= '<div class="owl-carousel2 content-wrapper clearfix">';
	
	$wp_query = new WP_Query($args);

	if($wp_query->have_posts()) :
		while($wp_query->have_posts()) :
			$wp_query->the_post();
			
			// Get review date
			$review_author = get_post_meta($post->ID, $prefix.'review_guest', true);
			$review_room = get_post_meta($post->ID, $prefix.'review_other_details', true);			
	
			$output .= '<div class="large-quote-wrapper">';
			$output .= '<blockquote>';
			$output .= '<span class="quoteopen">&ldquo;</span>' . get_the_content('') . '<span class="quoteclose">&rdquo;</span>';
			$output .= '</blockquote>';
			$output .= '<p class="quoteauthor"><span>' . esc_textarea($review_author) . ' -</span> ' . esc_textarea($review_room) . '</p>';
			$output .= '</div>';
			
		endwhile; else :

		$output .= '<p>' . esc_html_e('No reviews found.','yachtcharter') . '</p>';
			
	endif;

	$output .= '</div>';
	
	return $output;
	
}

add_shortcode( 'reviews_carousel', 'reviews_carousel_shortcode' );

?>