<?php

function contact_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'address' => '',
			'opentime' => '',
			'phone' => '',
			'email' => ''
		), $atts ) );
	
	$output = '	<div class="widget not-widget"><ul class="contact-details-widget">';
	
	if( isset($atts['address']) ) {
		$output .= '<li class="cdw-address clearfix">' . $atts['address'] . '</li>';
	}
	
	if( isset($atts['opentime']) ) {
		$output .= '<li class="cdw-time clearfix">' . $atts['opentime'] . '</li>';
	}
	
	if( isset($atts['phone']) ) {
		$output .= '<li class="cdw-phone clearfix">' . $atts['phone'] . '</li>';
	}
	
	if( isset($atts['email']) ) {
		$output .= '<li class="cdw-email clearfix">' . $atts['email'] . '</li>';
	}
	
	$output .= '</ul></div>';
	
	return $output;

}

add_shortcode( 'contactdetails', 'contact_shortcode' );

?>