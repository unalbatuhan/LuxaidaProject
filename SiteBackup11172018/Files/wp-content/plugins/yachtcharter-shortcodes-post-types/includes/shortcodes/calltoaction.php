<?php

function calltoaction_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'message' => '',
			'link_title' => '',
			'link_url' => '',
			'link_target' => '',
		), $atts ) );
	
	if ($link_target == 'true') {
		$link_target = '_blank';
	} elseif ($link_target == 'false') {
		$link_target = '_parent';
	} else {
		$link_target = '_blank';
	}
	
	$output = '<div class="call-to-action1 clearfix">';
	$output .= '<p class="fl">' . $message . '</p>';
	$output .= '<p class="fr"><a href="' . $link_url . '" class="button2" target="' . $link_target . '">' . $link_title . '</a></p>';
	$output .= '</div>';
	
	return $output;
	
}

add_shortcode( 'calltoaction', 'calltoaction_shortcode' );

?>