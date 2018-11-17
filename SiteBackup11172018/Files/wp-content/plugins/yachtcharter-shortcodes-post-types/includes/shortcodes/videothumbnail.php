<?php

function videothumbnail_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'video_thumbnail_url' => '',
		'video_url' => '',
		'video_corner_text' => ''
	), $atts ) );
	
	$output = '<!-- BEGIN .video-wrapper -->';
	$output .= '<div class="video-wrapper">';
	$output .= '<img src="' . $video_thumbnail_url . '" alt="" />';
	$output .= '<div class="video-play">';
	$output .= '<a href="' . $video_url . '" data-gal="prettyPhoto"><i class="fa fa-play"></i></a>';
	$output .= '</div>';
		
	if ( $video_corner_text != '' ) {
		$output .= '<div class="corner-text">';
		$output .= '<p>' . $video_corner_text . '</p>';
		$output .= '</div>';
	}
		
	$output .= '<!-- END .video-wrapper -->';
	$output .= '</div>';
	
	return $output;
	
}

add_shortcode( 'videothumbnail', 'videothumbnail_shortcode' );

?>