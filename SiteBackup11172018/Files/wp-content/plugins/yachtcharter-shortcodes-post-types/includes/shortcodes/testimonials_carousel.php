<?php

function testimonials_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'section_title' => '',
			'posts_per_page' => '10',
			'order' => '',
			'background_image_url' => ''
		), $atts ) );

		global $post;
		global $wp_query;
		$prefix = 'yachtcharter_';

	ob_start(); ?>
	
	<!-- BEGIN .full-width-testimonials-wrapper -->
	<div class="full-width-testimonials-wrapper" style="background: url(<?php echo $background_image_url; ?>) no-repeat top center">

		<!-- BEGIN .full-width-testimonials-inner -->
		<div class="full-width-testimonials-inner content-wrapper">
	
			<h3 class="center-title"><?php echo $section_title; ?></h3>
			<div class="title-block2"></div>
	
			<!-- BEGIN .testimonial-list-wrapper -->
			<div class="testimonial-list-wrapper owl-carousel2">

				<?php 

				$args = array(
		            'posts_per_page' => $posts_per_page,
		            'ignore_sticky_posts' => 1,
		            'post_type' => 'testimonial',
		            'order' => 'DESC',
		            'orderby' => 'date'
		        );

				$post_query = new WP_Query( $args );

				$yachtcharter_count_total_posts = $post_query->post_count;

				if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post(); ?>

					<?php
						// Get testimonial data
						$testimonial_guest = get_post_meta($post->ID, $prefix.'testimonial_guest', true);
						$testimonial_other_details = get_post_meta($post->ID, $prefix.'testimonial_other_details', true);			
					?>

					<!-- BEGIN .testimonial-wrapper -->
					<div class="testimonial-wrapper">

						<div><span class="yachtcharter-open-quote">“</span><?php the_excerpt(''); ?><span class="yachtcharter-close-quote">”</span></div>

						<?php if( has_post_thumbnail() ) { ?>

							<div class="testimonial-image">
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style3' ); ?>
								<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
							</div>

						<?php } ?>

						<div class="testimonial-author"><p><?php echo esc_textarea($testimonial_guest); ?> - <?php echo esc_textarea($testimonial_other_details); ?></p></div>

					<!-- END .testimonial-wrapper -->
					</div>
			
				<?php endwhile; endif; ?>	

			<!-- END .testimonial-list-wrapper -->
			</div>
	
			<?php wp_reset_postdata(); ?>
	
		<!-- END .full-width-testimonials-inner -->
		</div>

	<!-- END .full-width-testimonials-wrapper -->
	</div>
	
	<?php return ob_get_clean();

}

add_shortcode( 'testimonials_carousel', 'testimonials_carousel_shortcode' );

?>