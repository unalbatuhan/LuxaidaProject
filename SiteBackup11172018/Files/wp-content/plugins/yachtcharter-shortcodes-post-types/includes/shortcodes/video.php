<?php

function video_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'type' => '',
			'id' => '',
			'hd' => '0',
			'width' => '100%',
			'height' => '315',
		), $atts ) );
	
	$output = '';
	
	//Youtube
	if ( $type == 'youtube' ) {
		$output .= '<div class="video-wrapper clearfix"><iframe ';
		$output .= 'style="width: ' . esc_attr($width) . ';" ';
		$output .= 'height="' . esc_attr($height) . '" src="http://www.youtube.com/embed/';
		$output .= esc_attr($id) . '?';
		$output .= 'HD=' . esc_attr($hd) . ';';
		$output .= 'rel=0;';
		$output .= 'showinfo=0';
		$output .= '"></iframe></div>';
	}
	
	//Vimeo
	if ( $type == 'vimeo' ) {
		$output .= '<div class="video-wrapper clearfix"><iframe ';
		$output .= 'style="width: ' . esc_attr($width) . ';" ';
		$output .= 'height="' . esc_attr($height) . '" src="http://player.vimeo.com/video/';
		$output .= esc_attr($id) . '?';
		$output .= 'autoplay=0&amp;';
		$output .= 'title=0&amp;';
		$output .= 'byline=0&amp;';
		$output .= 'portrait=0';
		$output .= '"></iframe></div>';
	}
	
	return $output;

}

add_shortcode( 'video', 'video_shortcode' );

?>