<?php

function video_text_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'section_title' => '',
			'button_text' => '',
			'button_url' => '',
			'video_thumbnail_url' => '',
			'video_url' => '',
			'background' => '',
		), $atts ) );
		
		if ( $background == 'dark' ) {
			
			$output = '<!-- BEGIN .clearfix -->
			<div class="clearfix">

				<!-- BEGIN .about-us-block -->
				<div class="about-us-block about-us-block-1">

					<h3>' . $section_title . '</h3>
					<div class="title-block4"></div>
					<p>' . $content . '</p>
					<a href="' . $button_url . '" class="button0"><i class="fa fa-arrow-circle-right"></i>' . $button_text . '</a>

				<!-- END .about-us-block -->
				</div>

				<div class="video-wrapper video-wrapper-home" style="background:url(' . $video_thumbnail_url . ') no-repeat center top;">

					<div class="video-play">
						<a href="' . $video_url . '" data-gal="prettyPhoto"><i class="fa fa-play"></i></a>
					</div>

				</div>

			<!-- END .clearfix -->
			</div>';
			
		} else {
			
			$output = '<!-- BEGIN .clearfix -->
			<div class="clearfix about-video-light-wrapper">

				<!-- BEGIN .about-us-block -->
				<div class="about-us-block">

					<h3>' . $section_title . '</h3>
					<div class="title-block4"></div>
					<p>' . $content . '</p>
					<a href="' . $button_url . '" class="button0"><i class="fa fa-arrow-circle-right"></i>' . $button_text . '</a>

				<!-- END .about-us-block -->
				</div>

				<div class="video-wrapper" style="background:url(' . $video_thumbnail_url . ') no-repeat center top;">

				<div class="video-play">
					<a href="' . $video_url . '" data-gal="prettyPhoto"><i class="fa fa-play"></i></a>
				</div>

			</div>

		<!-- END .clearfix -->
		</div>';
			
		}
	
	return $output;

}

add_shortcode( 'video_text', 'video_text_shortcode' );

?>