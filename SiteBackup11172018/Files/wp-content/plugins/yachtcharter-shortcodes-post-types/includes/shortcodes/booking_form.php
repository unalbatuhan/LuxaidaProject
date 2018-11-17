<?php

function booking_form_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'section_title' => '',
		'section_content' => '',
		'background_image_url' => '',
		'form_id' => '',
	), $atts ) );
	
	ob_start(); ?>
	
	<!-- BEGIN .booking-form-wrapper -->
	<div class="booking-form-wrapper clearfix">

		<!-- BEGIN .booking-form-left -->
		<div class="booking-form-left" style="background: url(<?php echo $background_image_url; ?>) no-repeat 30px 30px">

			<h3 class="center-title"><?php echo $section_title; ?></h3>
			<div class="title-block2"></div>

			<?php echo $section_content; ?>

		<!-- END .booking-form-left -->
		</div>

		<!-- BEGIN .booking-form-right -->
		<div class="booking-form-right">
			
			<?php echo do_shortcode('[contact-form-7 id="' . $form_id . '"]'); ?>

		<!-- END .booking-form-right -->
		</div>

	<!-- END .booking-form-wrapper -->
	</div>
	
	<?php return ob_get_clean();
	
}

add_shortcode( 'booking_form', 'booking_form_shortcode' );

?>