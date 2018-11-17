<?php

function call_to_action_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'section_background_image_url' => '',
		'section_text' => '',
		'button_text_1' => '',
		'button_url_1' => '',
		'button_icon_1' => '',
		'button_text_2' => '',
		'button_url_2' => '',
		'button_icon_2' => '',
	), $atts ) );
	
	$output = '<!-- BEGIN .full-width-message-wrapper -->
	<div class="full-width-message-wrapper" style="background:url(' . $section_background_image_url . ') no-repeat center top;">

		<!-- BEGIN .full-width-message-inner -->
		<div class="full-width-message-inner">

			<h3>' . $section_text . '</h3>

			<div class="call-to-action-button-wrapper clearfix">
				<a href="' . $button_url_1 . '" class="button-view-yachts"><i class="fa ' . $button_icon_1 . '"></i>' . $button_text_1 . '</a>
				<a href="' . $button_url_2 . '" class="button-get-in-touch"><i class="fa ' . $button_icon_2 . '"></i>' . $button_text_2 . '</a>
			</div>

			<div class="clearboth"></div>

		<!-- END .full-width-message-inner -->
		</div>

	<!-- END .full-width-message-wrapper -->
	</div>';
	
	return $output;
	
}

add_shortcode( 'call_to_action', 'call_to_action_shortcode' );

?>