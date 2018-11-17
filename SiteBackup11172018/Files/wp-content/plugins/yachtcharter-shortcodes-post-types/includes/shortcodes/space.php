<?php

function space_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'size' => '',
		), $atts ) );
	
	$output = '<div style="height:' . $atts['size'] . 'px;"></div>';
	
	return $output;
	
}

add_shortcode( 'space', 'space_shortcode' );

?>