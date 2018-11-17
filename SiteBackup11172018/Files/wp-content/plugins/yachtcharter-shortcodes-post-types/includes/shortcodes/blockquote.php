<?php

function blockquote_shortcode( $atts, $content = null ) {
	
	$output = '<blockquote>';
	$output .= '<p>' . $content . '</p>';
	$output .= '</blockquote>';
	
	return $output;
	
}

add_shortcode( 'blockquote', 'blockquote_shortcode' );

?>