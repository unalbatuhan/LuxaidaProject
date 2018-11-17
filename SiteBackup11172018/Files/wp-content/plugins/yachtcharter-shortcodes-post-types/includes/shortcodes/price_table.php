<?php

function pricing_table_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'columns' => '',
			'column_title_1' => '',
			'column_price_1' => '',
			'column_price_detail_1' => '',
			'column_list_1' => '',
			'column_title_2' => '',
			'column_price_2' => '',
			'column_price_detail_2' => '',
			'column_list_2' => '',
			'column_title_3' => '',
			'column_price_3' => '',
			'column_price_detail_3' => '',
			'column_list_3' => '',
		), $atts ) );
	
	if ( $columns == '1' ) {
		$column_code = 'pt-full-width';
	} elseif ( $columns == '2' ) {
		$column_code = 'pt-one-half';
	} elseif ( $columns == '3' ) {
		$column_code = 'pt-one-third';
	} else {
		$column_code = 'pt-full-width';
	}
	
	$output = '<!-- BEGIN .pricing-table-wrapper -->
	<div class="pricing-table-wrapper clearfix">';
		
		if ( $column_title_1 != '' ) { 
			$output .= '<!-- BEGIN .' . $column_code . ' -->
			<div class="' . $column_code . '">';
			$output .= '<h4>' . $column_title_1 . '</h4>';
			$output .= '<h6>' . $column_price_1 . '<span>' . $column_price_detail_1 . '</span></h6>';
			$output .= '<!-- BEGIN .pt-content-wrapper -->
			<div class="pt-content-wrapper">';
				$output .= $column_list_1;
			$output .= '<!-- END .pt-content-wrapper -->
			</div>';
			$output .= '<!-- END .' . $column_code . ' -->
			</div>';
		}
		
		if ( $column_title_2 != '' ) { 
			$output .= '<!-- BEGIN .' . $column_code . ' -->
			<div class="' . $column_code . '">';
			$output .= '<h4>' . $column_title_2 . '</h4>';
			$output .= '<h6>' . $column_price_2 . '<span>' . $column_price_detail_2 . '</span></h6>';
			$output .= '<!-- BEGIN .pt-content-wrapper -->
			<div class="pt-content-wrapper">';
				$output .= $column_list_2;
			$output .= '<!-- END .pt-content-wrapper -->
			</div>';
			$output .= '<!-- END .' . $column_code . ' -->
			</div>';
		}
		
		if ( $column_title_3 != '' ) { 
			$output .= '<!-- BEGIN .' . $column_code . ' -->
			<div class="' . $column_code . '">';
			$output .= '<h4>' . $column_title_3 . '</h4>';
			$output .= '<h6>' . $column_price_3 . '<span>' . $column_price_detail_3 . '</span></h6>';
			$output .= '<!-- BEGIN .pt-content-wrapper -->
			<div class="pt-content-wrapper">';
				$output .= $column_list_3;
			$output .= '<!-- END .pt-content-wrapper -->
			</div>';
			$output .= '<!-- END .' . $column_code . ' -->
			</div>';
		}

	$output .= '<!-- END .pricing-table-wrapper -->
	</div>';
	
	return $output;
	
}

add_shortcode( 'pricing_table', 'pricing_table_shortcode' );

?>