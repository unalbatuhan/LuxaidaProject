<?php

function yacht_sales_page_shortcode( $atts, $content = null ) {

		extract( shortcode_atts( array(
			'posts_per_page' => '10',
			'order' => '',
			'columns' => '',
			'yacht_sales_type' => '',
			'yacht_sales_location' => ''
		), $atts ) );

		global $post;
		global $wp_query;
		
		ob_start();
		
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
		
		// Display From Category
		if ( $yacht_sales_type != '' && $yacht_sales_location != '' ) {

			$args = array(
				'post_type' => 'yacht_sales',
				'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'yacht_sales-type',
							'field'    => 'slug',
							'terms'    => $yacht_sales_type,
						),
						array(
							'taxonomy' => 'yacht_sales-location',
							'field'    => 'slug',
							'terms'    => $yacht_sales_location,
						),
					),
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,
				'order' => $order
			);

		} elseif ( $yacht_sales_type != '' && $yacht_sales_location == '' ) {
		
			$args = array(
				'post_type' => 'yacht_sales',
				'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'yacht_sales-type',
							'field'    => 'slug',
							'terms'    => $yacht_sales_type,
						),
					),
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,
				'order' => $order
			);
		
		} elseif ( $yacht_sales_type == '' && $yacht_sales_location != '' ) {
		
			$args = array(
				'post_type' => 'yacht_sales',
				'tax_query' => array(
						array(
							'taxonomy' => 'yacht_sales-location',
							'field'    => 'slug',
							'terms'    => $yacht_sales_location,
						),
					),
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,
				'order' => $order
			);
			
		} else {

			$args = array(
				'post_type' => 'yacht_sales',
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,
				'order' => $order
			);

		}
		
		$wp_query = new WP_Query( $args );
		if ($wp_query->have_posts()) : ?>
		
		<!-- BEGIN .yacht-listing-wrapper -->
		<div class="yacht-listing-wrapper-<?php echo $columns; ?> yacht-sale-wrapper-<?php echo $columns; ?> clearfix">

			<?php while($wp_query->have_posts()) :
				$wp_query->the_post(); ?>
				
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
						
						<?php 

						//Get Post ID
						global $wp_query; $post_id = $wp_query->post->ID; 
						global $yachtcharter_data;
						
						$yacht_sales_currency_symbol = get_post_meta($post->ID, 'yachtcharter_yacht_sales_currency_symbol', true);
						$yacht_sales_price = get_post_meta($post->ID, 'yachtcharter_yacht_sales_price', true);

						?>
						
						<p>
						<span><?php esc_html_e('Price:','yachtcharter'); ?></span>
						
						<?php if ($yachtcharter_data['currency-position'] == 'before') { ?>
							<?php echo $yacht_sales_currency_symbol; ?><?php echo $yacht_sales_price; ?>
						<?php } else { ?>
							<?php echo $yacht_sales_price; ?><?php echo $yacht_sales_currency_symbol; ?>
						<?php } ?>
						
						</p>
						<a class="yacht-charter-book-button" href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Buy Now','yachtcharter'); ?></a>
						
					
						
					</div>
					
				<!-- END .yacht-block -->
				</div>
				
				
			<?php endwhile; ?>

		<!-- END .yacht-listing-wrapper -->
		</div>
		
		<?php else : ?>
			<p><?php esc_html_e('No yachts have been added yet','yachtcharter'); ?></p>
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
			
			return ob_get_clean();

	}

add_shortcode( 'yacht_sales_page', 'yacht_sales_page_shortcode' );

?>