<?php

function accommodation_search_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'section_title' => '',
		), $atts ) );
	
	$output = '<div class="title-style1"><h3>' . $section_title . '</h3></div>';
	
	$output .= '<!-- BEGIN .accommodation-search-form-1 -->';
	$output .= '<form action="' . home_url( '/' ) . '" class="accommodation-search-form-1" method="get">';
	
	$output .= '<label>' . esc_html__('Location','yachtcharter') . '</label>
		<div class="select-wrapper">
			<i class="fa fa-angle-down"></i>
			<select name="accommodation-location">';
			
				$accommodation_location = get_categories('taxonomy=accommodation-location&post_type=accommodation');
				foreach ($accommodation_location as $category) :
				$output .= '<option value="' . $category->name . '">' . $category->name . '</option>';
				endforeach;
				
			$output .= '</select>
		</div>';

	$output .= '<label>' . esc_html__('Accommodation Type','yachtcharter') . '</label>		
		<div class="select-wrapper">
			<i class="fa fa-angle-down"></i>	
			<select name="accommodation-type">';
									
				$accommodation_type = get_categories('taxonomy=accommodation-type&post_type=accommodation');
				foreach ($accommodation_type as $category) :
				$output .= '<option value="' . $category->name . '">' . $category->name . '</option>';
				endforeach;
			
			$output .= '</select>
		</div>';
		
	$output .= '<input type="hidden" name="post_type" value="accommodation" />';	
	
	$output .= '<label>' . esc_html__('Keywords','yachtcharter') . '</label>
		<input type="text" name="s" value="" />		

		<button type="submit">' . esc_html__('Search','yachtcharter') . ' <i class="fa fa-search"></i></button>

	<!-- END .accommodation-search-form-1 -->
	</form>';
	
	return $output;

}

add_shortcode( 'accommodation_search', 'accommodation_search_shortcode' );

?>