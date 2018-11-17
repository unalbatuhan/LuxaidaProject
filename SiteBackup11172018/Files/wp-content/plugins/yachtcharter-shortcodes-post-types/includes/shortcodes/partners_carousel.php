<?php

function partners_carousel_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'section_title' => '',
			'posts_per_page' => '',
		), $atts ) );

		global $post;
		global $wp_query;
		$prefix = 'yachtcharter_';

	ob_start(); ?>
	
	<div class="title-style1"><h3><?php echo $section_title; ?></h3></div>
	
	<!-- BEGIN .partner-list-wrapper -->
	<div class="partner-list-wrapper owl-carousel4">

		<?php $args = array(
            'posts_per_page' => 10,
            'ignore_sticky_posts' => 1,
            'post_type' => 'partner',
            'order' => 'DESC',
            'orderby' => 'date'
        );

		$post_query = new WP_Query( $args );
		if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post(); ?>
		
		<?php if( has_post_thumbnail() ) { ?>
			<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style5' ); ?>
			<?php echo '<a target="_blank" href="' . get_the_title() . '"><img src="' . $src[0] . '" alt="' . get_the_title() . '" /></a>'; ?>
		<?php } ?>
		
		<?php endwhile; endif; ?>	

	<!-- END .partner-list-wrapper -->
	</div>
	
	<?php wp_reset_postdata(); 

	return ob_get_clean();

}

add_shortcode( 'partners_carousel', 'partners_carousel_shortcode' );

?>