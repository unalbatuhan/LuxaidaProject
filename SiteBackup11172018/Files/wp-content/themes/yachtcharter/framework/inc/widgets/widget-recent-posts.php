<?php

// Widget Class
class yachtcharter_recent_posts_widget extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

	function yachtcharter_recent_posts_widget() {
		
		parent::__construct(false, $name = esc_html__('Yacht Charter Recent Posts Widget','yachtcharter'), array(
			'description' => esc_html__('Display Recent Posts','yachtcharter')
		));
	
	}


/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		$post_limit = $instance['post_limit'];

		global $yachtcharter_allowed_html_array;
		
		echo wp_kses($before_widget,$yachtcharter_allowed_html_array);

		if ( $title ) {
			echo wp_kses($before_title . $title . $after_title,$yachtcharter_allowed_html_array);
		 } ?>

			<?php // Set News Limit
			if ( $instance['post_limit'] ) : 
				$news_limit = $instance['post_limit'];
			elseif ( !is_numeric ( $instance['post_limit'] ) )	:
				$news_limit = '8';
			else :
				$news_limit = '8';
			endif;
			?>
			
			<?php $args = array(
				'posts_per_page' => $news_limit,
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
							<p><?php esc_html_e('Category','yachtcharter'); ?>: <?php the_category(', '); ?></p>
						</div>
					</div>

				<!-- END .news-wrapper -->
				</div>	
					
			<?php endwhile; endif; ?>	
				
		<?php echo wp_kses($after_widget,$yachtcharter_allowed_html_array);
	
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_limit'] = strip_tags( $new_instance['post_limit'] );
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */
	 
	function form( $instance ) {
		$defaults = array(
		'title' => 'Recent Posts',
		'post_limit' => '8'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
				
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'yachtcharter'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'post_limit' )); ?>"><?php esc_html_e('Post Limit:', 'yachtcharter') ?></label>
			<input type="text" size="3" id="<?php echo esc_attr($this->get_field_id('post_limit')); ?>" name="<?php echo esc_attr($this->get_field_name('post_limit')); ?>" value="<?php echo esc_attr($instance['post_limit']); ?>" />
		</p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'yachtcharter_recent_posts_widget' );

// Register Widget
function yachtcharter_recent_posts_widget() {
	register_widget( 'yachtcharter_recent_posts_widget' );
}