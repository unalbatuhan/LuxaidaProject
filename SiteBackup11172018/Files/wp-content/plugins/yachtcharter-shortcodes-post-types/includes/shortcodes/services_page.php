<?php

function service_page_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'posts_per_page' => '10',
			'order' => '',
			'columns' => ''
		), $atts ) );

		global $post;
		global $wp_query;

		// Set Posts Displayed Per Page
		if ( $posts_per_page != '' ) {
			$posts_per_page = $posts_per_page;
		} else {
			$posts_per_page = '1';
		}

		// Set Columns
		if ( $columns == '' ) {
			$columns = '2';
		} else {
			$columns = $columns;
		}

		// Set Posts Display Order
		if ( $order == 'newest' ) {
			$order = 'DESC';
		} elseif ( $order == 'oldest' ) {
			$order = 'ASC';
		} else {
			$order = 'DESC';
		}

		if (is_front_page()) {
		    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
		    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}

		$args = array(
			'post_type' => 'service',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'order' => $order
		);

		$wp_query = new WP_Query( $args );
		if ($wp_query->have_posts()) : ?>
			
		<!-- BEGIN .services-block-wrapper -->
		<div class="services-block-wrapper services-block-wrapper-<?php echo $columns; ?>-col clearfix">

			<?php while($wp_query->have_posts()) :
				$wp_query->the_post(); ?>
					
				<!-- BEGIN .services-block -->
				<div class="services-block">
					
					<?php if( has_post_thumbnail() ) { ?>

						<div class="services-block-image">
							<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style2' ); ?>
								<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
							</a>
						</div>

					<?php } ?>
					
					<!-- BEGIN .service-block-content -->
					<div class="service-block-content">

						<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>	

						<!-- BEGIN .service-description -->
						<div class="service-description">
							
							<?php global $more;$more = 0;?>
							<?php the_content('Read More'); ?>
							
						<!-- END .service-description -->
						</div>

					<!-- END .service-block-content -->
					</div>

				<!-- END .services-block -->
				</div>
				
			<?php endwhile; ?>

		<!-- END .services-block-wrapper -->
		</div>

		<?php else : ?>
			<p><?php esc_html_e('No service have been added yet','yachtcharter'); ?></p>
		<?php endif;

			if ( $wp_query->max_num_pages > 1 ) : ?>

				<div class="clearboth"></div>

				<?php if(is_plugin_active('wp-pagenavi/wp-pagenavi.php')) {
					echo '<div class="pagination-wrapper">';
					wp_pagenavi();
					echo '</div>';
					echo '<div class="clearboth"></div>';
				} else { ?>

				<div class="pagination-wrapper">
					<p class="clearfix">
						<span class="fl prev-pagination"><?php next_posts_link( esc_html__( '&larr; Older posts', 'yachtcharter' ) ); ?></span>
						<span class="fr next-pagination"><?php previous_posts_link( esc_html__( 'Newer posts &rarr;', 'yachtcharter' ) ); ?></span>	
					</p>
				</div>

				<?php } ?>

			<?php endif; wp_reset_query();

	}

add_shortcode( 'service_page', 'service_page_shortcode' );

?>