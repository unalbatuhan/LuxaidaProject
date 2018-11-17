<?php

function locations_page_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
		'posts_per_page' => '',
		'order' => ''
	), $atts ) );
	
	global $post;
	global $wp_query;
	$prefix = 'yachtcharter_';
	
	// Set Testimonials Displayed Per Page
	if ( $posts_per_page != '' ) {
		$posts_per_page = $posts_per_page;
	} else {
		$posts_per_page = '1';
	}
	
	// Set Testimonials Display Order
	if ( $order == 'newest' ) {
		$locations_order = 'DESC';
	} elseif ( $order == 'oldest' ) {
		$locations_order = 'ASC';
	} else {
		$locations_order = 'DESC';
	}
	
	if (is_front_page()) {
	    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
	} else {
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
	
	$args = array(
	'post_type' => 'location',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,
	);
	
	$locations_count = 0;
	
	$wp_query = new WP_Query( $args );
	if ($wp_query->have_posts()) : ?>
	
		<!-- BEGIN .locations-wrapper-outer -->
		<div class="locations-wrapper-outer">
			
		<?php while($wp_query->have_posts()) :
			
			$wp_query->the_post(); ?>
			
			<?php $yachtcharter_short_description = get_post_meta($post->ID, 'yachtcharter_yacht_charter_short_content', true); ?>
			
			<!-- BEGIN .locations-wrapper -->
			<div class="locations-wrapper clearfix">
				
				<?php $locations_count++; ?>
				
				<?php if( has_post_thumbnail() ) { ?>

					<!-- BEGIN .location-image -->
					<div class="location-image <?php if ($locations_count % 2 == 0) {echo 'location-image-right';} ?>">
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style6' ); ?>
						<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
						</a>
					<!-- END .location-image -->
					</div>

				<?php } ?>

				<!-- BEGIN .location-content -->
				<div class="location-content <?php if ($locations_count % 2 == 0) {echo 'location-content-left';} ?>">
					
					<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<div class="title-block5"></div>
					
					<?php echo $yachtcharter_short_description; ?>
					<a href="<?php esc_url(the_permalink()); ?>" class="more-link"><?php esc_html_e('Read More','yachtcharter'); ?> <i class="fa fa-angle-right"></i></a>

				<!-- END .location-content -->
				</div>

			<!-- END .locations-wrapper -->
			</div>
			
		<?php endwhile; ?>
		
		<!-- END .locations-wrapper-outer -->
		</div>
		
		<?php else : ?>
			<p><?php esc_html_e('No locations have been added yet','yachtcharter'); ?></p>
		<?php endif;

		if ( $wp_query->max_num_pages > 1 ) : ?>

			<div class="clearboth"></div>
			
			<!-- BEGIN .locations-pagination-wrapper -->
			<div class="locations-pagination-wrapper clearfix">
			
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
			
			<!-- END .locations-pagination-wrapper -->
			</div>

		<?php endif; 
		
		wp_reset_query();

}

add_shortcode( 'locations_page', 'locations_page_shortcode' );

?>