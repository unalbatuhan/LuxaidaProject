<?php

function blankspace_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'margin_top' => '',
			'margin_bottom' => '',
			'border' => '',
		), $atts ) );
	
	if ($margin_top != '') {
		$margin_top = 'margin-top: ' . $margin_top . 'px;';
	} else {
		$margin_top = 'margin-top: 50px;';
	}
	
	if ($margin_bottom != '') {
		$margin_bottom = 'margin-bottom: ' . $margin_bottom . 'px;';
	} else {
		$margin_bottom = 'margin-bottom: 50px;';
	}
	
	if ($border == '') {
		$border = 'background: #e8e8e8;';
	} elseif ($border == 'false') {
		$border = 'background: transparent;';
	} else {
		$border = 'background: #e8e8e8;';
	}
	
	$output = '<hr style="' . $margin_top . $margin_bottom . $border . ' height: 1px;border: none;" />';
	
	return $output;
	
}

add_shortcode( 'blankspace', 'blankspace_shortcode' );

?>