<?php

function yacht_charter_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'section_title' => '',
		'section_intro' => '',
		'posts_per_page' => '10',
		'order' => '',
		'background' => '',
		'yacht_charter_type' => '',
		'yacht_charter_location' => ''
	), $atts ) );
	
	global $post;
	global $wp_query;

	ob_start(); ?>
	
	<!-- BEGIN .our-yachts-sections -->
	<div class="<?php if( $background == 'dark' ) {echo 'our-yachts-sections-dark clearfix';} else {echo 'our-yachts-sections';} ?>">
		
		<!-- BEGIN .yacht-charter-carousel-wrapper -->
		<div class="yacht-charter-carousel-wrapper">
		
		<h3 class="center-title"><?php echo $section_title; ?></h3>
		<div class="title-block2"></div>
		<p class="yacht-intro-text"><?php echo $section_intro; ?></p>

		<!-- BEGIN .yacht-block-wrapper -->
		<div class="owl-carousel1 yacht-block-wrapper">
			
			<?php
			
			if ( isset($order) ) {
				
				if ( $order == 'oldest' ) {
					$yacht_order = 'ASC';
				} else {
					$yacht_order = 'DESC';
				}
				
			}
			
			?>
			
			<?php $args = array(
	            'posts_per_page' => $posts_per_page,
	            'ignore_sticky_posts' => 1,
	            'post_type' => 'yacht_charter',
	            'order' => $yacht_order,
	            'orderby' => 'date'
	        );
	
			// Display From Category
			if ( $yacht_charter_type != '' && $yacht_charter_location != '' ) {

				$args = array(
					'post_type' => 'yacht_charter',
					'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'yacht_charter-type',
								'field'    => 'slug',
								'terms'    => $yacht_charter_type,
							),
							array(
								'taxonomy' => 'yacht_charter-location',
								'field'    => 'slug',
								'terms'    => $yacht_charter_location,
							),
						),
					'posts_per_page' => $posts_per_page,
					'order' => $yacht_order
				);

			} elseif ( $yacht_charter_type != '' && $yacht_charter_location == '' ) {

				$args = array(
					'post_type' => 'yacht_charter',
					'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'yacht_charter-type',
								'field'    => 'slug',
								'terms'    => $yacht_charter_type,
							),
						),
					'posts_per_page' => $posts_per_page,
					'order' => $yacht_order
				);

			} elseif ( $yacht_charter_type == '' && $yacht_charter_location != '' ) {

				$args = array(
					'post_type' => 'yacht_charter',
					'tax_query' => array(
							array(
								'taxonomy' => 'yacht_charter-location',
								'field'    => 'slug',
								'terms'    => $yacht_charter_location,
							),
						),
					'posts_per_page' => $posts_per_page,
					'order' => $yacht_order
				);

			} else {

				$args = array(
					'post_type' => 'yacht_charter',
					'posts_per_page' => $posts_per_page,
					'order' => $yacht_order
				);

			}

			$post_query = new WP_Query( $args );
			if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post(); ?>
				
				<?php $yachtcharter_short_description = get_post_meta($post->ID, 'yachtcharter_yacht_charter_short_content', true); ?>
				
				<!-- BEGIN .yacht-block -->
				<div class="yacht-block">

					<?php if( has_post_thumbnail() ) { ?>
						
						<div class="yacht-block-image">
							
							<?php $yacht_diff_days = yacht_diff_days(date("Y-m-d"),get_the_time("Y-m-d")); ?>
							
							<?php if ( $yacht_diff_days < 20 ) { ?>
								<div class="new-icon"><?php esc_html_e('New','yachtcharter'); ?></div>
							<?php } ?>
							
							<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style2' ); ?>
								<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
							</a>
						</div>

					<?php } ?>

					<div class="yacht-block-content">

						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>	
						<div class="title-block5"></div>

						<?php echo $yachtcharter_short_description; ?>

					</div>

				<!-- END .yacht-block -->
				</div>

			<?php endwhile; endif; ?>	

		<!-- END .yacht-block-wrapper -->
		</div>
		
		<!-- END .yacht-charter-carousel-wrapper -->
		</div>
		
	<!-- END .our-yachts-sections -->
	</div>
	
	<?php wp_reset_postdata(); 

	return ob_get_clean();

}

add_shortcode( 'yacht_charter_carousel', 'yacht_charter_carousel_shortcode' );

?>