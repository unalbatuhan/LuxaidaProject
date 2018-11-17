<?php

function booking_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'section_title' => '',
		'background_image_url' => '',
		'sale_form_id' => '',
		'charter_form_id' => '',
		'default_form_id' => ''
	), $atts ) );
	
$output = '';
	
	if ( isset($_GET['yacht_sale_charter']) ) {
		
		if ( $_GET['yacht_sale_charter'] == 'charter' ) {
			
			$output .= '<script>
				jQuery(function () {';
					
					if ( isset($_GET['date-from']) ) {
						$output .= 'jQuery(".wpcf7-form input.yacht-form-date-from").val("' . $_GET['date-from'] . '");';
					}
					
					if ( isset($_GET['date-to']) ) {
						$output .= 'jQuery(".wpcf7-form input.yacht-form-date-to").val("' . $_GET['date-to'] . '");';
					}
					
					if ( isset($_GET['guests']) ) {
						$output .= 'jQuery(".wpcf7-form select.yacht-form-number-of-people").val("' . $_GET['guests'] . '");';
					}
					
					if ( isset($_GET['yacht_type']) ) {
						$output .= 'jQuery(".wpcf7-form select.yacht-form-type").val("' . $_GET['yacht_type'] . '");';
					}
					
				$output .= '});
			</script>';
		
		} elseif ( $_GET['yacht_sale_charter'] == 'sale' ) {
			
			$output .= '<script>
				jQuery(function () {';
					
					if ( isset($_GET['yacht_option_1']) ) {
						$output .= 'jQuery(".wpcf7-form select.yacht-option-1").val("' . $_GET['yacht_option_1'] . '");';
					}
					
					if ( isset($_GET['yacht_option_2']) ) {
						$output .= 'jQuery(".wpcf7-form select.yacht-option-2").val("' . $_GET['yacht_option_2'] . '");';
					}
					
					if ( isset($_GET['yacht_option_3']) ) {
						$output .= 'jQuery(".wpcf7-form select.yacht-option-3").val("' . $_GET['yacht_option_3'] . '");';
					}
					
					if ( isset($_GET['yacht_type']) ) {
						$output .= 'jQuery(".wpcf7-form select.yacht-form-type").val("' . $_GET['yacht_type'] . '");';
					}
					
				$output .= '});
			</script>';
			
		}
		
	}
	
	$output .= '<!-- BEGIN .booking-form-wrapper -->
	<div class="booking-form-wrapper clearfix">
		
		<!-- BEGIN .booking-form-wrapper-inner -->
		<div class="booking-form-wrapper-inner">
		
		<!-- BEGIN .booking-form-left -->
		<div class="booking-form-left" style="background: url(' . $background_image_url . ') no-repeat 30px 30px">

			<h3 class="center-title">' . $section_title . '</h3>
			<div class="title-block2"></div>

			' . $content . '

		<!-- END .booking-form-left -->
		</div>

		<!-- BEGIN .booking-form-right -->
		<div class="booking-form-right">';
			
			if ( isset($_GET['yacht_sale_charter']) ) {
			
				if ( $_GET['yacht_sale_charter'] == 'charter' ) {

					$output .= '[contact-form-7 id="' . $charter_form_id . '"]';

				} elseif ( $_GET['yacht_sale_charter'] == 'sale' ) {

					$output .= '[contact-form-7 id="' . $sale_form_id . '"]';

				}

			} elseif ( $default_form_id !== '' ) {
				
				$output .= '[contact-form-7 id="' . $default_form_id . '"]';
				
			} else {
				
				$output .= '[contact-form-7 id="' . $charter_form_id . '"]';
				
			}
			
		$output .= '<!-- END .booking-form-right -->
		</div>
		
		<!-- END .booking-form-wrapper-inner -->
		</div>

	<!-- END .booking-form-wrapper -->
	</div>';
	
	return do_shortcode($output);
	
	}

add_shortcode( 'booking', 'booking_shortcode' );

?>