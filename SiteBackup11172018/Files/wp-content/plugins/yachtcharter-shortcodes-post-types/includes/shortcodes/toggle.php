<?php

function toggle_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'title' => esc_html__('Title','yachtcharter'),
		), $atts ) );
	
	if ($atts['title']) {
		$title = $atts['title'];
	} else {
		$title = esc_html__('Title','yachtcharter');
	}
	
	$output = '';
	$output .= '<div class="toggle"><div class="title"><h4>';
	$output .= esc_textarea($title);
	$output .= '</h4><span></span></div><div class="inner">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	
	return $output;

}

add_shortcode( 'toggle', 'toggle_shortcode' );

?>