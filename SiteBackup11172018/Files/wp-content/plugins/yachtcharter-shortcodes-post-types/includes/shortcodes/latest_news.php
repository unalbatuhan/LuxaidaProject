<?php

function latest_news_shortcode( $atts, $content = null ) {
	
	extract( shortcode_atts( array(
			'section_title' => '',
			'posts_per_page' => '10',
			'order' => ''
		), $atts ) );

	ob_start(); ?>
	
	<h3 class="center-title"><?php echo $section_title; ?></h3>
	<div class="title-block2"></div>

	<!-- BEGIN .news-list -->
	<div class="news-list">

		<?php $yachtcharter_count_posts = 0;
		$yachtcharter_count_current_post = 0;
	
		$args = array(
            'posts_per_page' => $posts_per_page,
            'ignore_sticky_posts' => 1,
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => 'date'
        );

		$post_query = new WP_Query( $args );
		
		if( $post_query->have_posts() ) : while( $post_query->have_posts() ) : $post_query->the_post(); ?>
		
			<!-- BEGIN .news-wrapper -->
			<div class="news-wrapper clearfix">

				<div class="news-date">
					<div class="news-m"><?php the_time('M'); ?></div>
					<div class="news-d"><?php the_time('d'); ?></div>	
				</div>

				<div class="news-info">	
					<div class="news-meta">
						<h4><a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
						<p><?php echo yachtcharter_limit_text(get_the_excerpt(), 8); ?></p>
					</div>
				</div>

			<!-- END .news-wrapper -->
			</div>
			
		<?php endwhile; endif; ?>

	<!-- END .news-list -->
	</div>
	
	<?php wp_reset_postdata(); 
	return ob_get_clean();
	
}

add_shortcode( 'latest_news', 'latest_news_shortcode' );

?>