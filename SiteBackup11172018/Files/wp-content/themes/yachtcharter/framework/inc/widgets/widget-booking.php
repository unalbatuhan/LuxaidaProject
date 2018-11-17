<?php

// Widget Class
class yachtcharter_booking_widget extends WP_Widget {


/* ------------------------------------------------
	Widget Setup
------------------------------------------------ */

	function yachtcharter_booking_widget() {
		
		parent::__construct(false, $name = esc_html__('Yacht Search','yachtcharter'), array(
			'description' => esc_html__('Display Yacht Search Form','yachtcharter')
		));
	
	}


/* ------------------------------------------------
	Display Widget
------------------------------------------------ */
	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
		
		global $yachtcharter_allowed_html_array;
		
		echo wp_kses($before_widget,$yachtcharter_allowed_html_array);

		if ( $title ) {
			echo wp_kses($before_title . $title . $after_title,$yachtcharter_allowed_html_array);
		 } ?>
		
		<!-- BEGIN .advanced-search-form -->
		<div class="advanced-search-form">

			<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				
				<label><?php esc_html_e('For Sale / Charter:','yachtcharter'); ?></label>
				<div class="select-wrapper">
					<i class="fa fa-angle-down"></i>
					<select class="yacht-sale-charter-option" name="ysco">
						<option value="1"><?php esc_html_e('For Charter','yachtcharter'); ?></option>
						<option value="2"><?php esc_html_e('For Sale','yachtcharter'); ?></option>
					</select>
				</div>
				
				<!-- BEGIN .search-yacht-charter-fields -->
				<div class="search-yacht-charter-fields">
				
					<label><?php esc_html_e('Location:','yachtcharter'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="yclo">
							<?php $yachtcharter_location = get_categories('taxonomy=yacht_charter-location&post_type=yacht_charter');
							foreach ($yachtcharter_location as $category) : ?>
								<option value="<?php echo esc_attr($category->name); ?>"><?php echo esc_attr($category->name); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<label><?php esc_html_e('Yacht Type:','yachtcharter'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="ycto">
							<?php $yachtcharter_type = get_categories('taxonomy=yacht_charter-type&post_type=yacht_charter');
							foreach ($yachtcharter_type as $category) : ?>
								<option value="<?php echo esc_attr($category->name); ?>"><?php echo esc_attr($category->name); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				
				<!-- END .search-yacht-charter-fields -->
				</div>
				
				<!-- BEGIN .search-yacht-sale-fields -->
				<div class="search-yacht-sale-fields">
				
					<label><?php esc_html_e('Location:','yachtcharter'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="yslo">
							<?php $yachtsales_location = get_categories('taxonomy=yacht_sales-location&post_type=yacht_sales');
							foreach ($yachtsales_location as $category) : ?>
								<option value="<?php echo esc_attr($category->name); ?>"><?php echo esc_attr($category->name); ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<label><?php esc_html_e('Yacht Type:','yachtcharter'); ?></label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="ysto">
							<?php $yachtsales_type = get_categories('taxonomy=yacht_sales-type&post_type=yacht_sales');
							foreach ($yachtsales_type as $category) : ?>
								<option value="<?php echo esc_attr($category->name); ?>"><?php echo esc_attr($category->name); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				
				<!-- END .search-yacht-sale-fields -->
				</div>
				
				<input type="hidden" value="" name="s" />
				<input type="hidden" value="1" name="advs" />
				
				<button type="submit">
	 				<i class="fa fa-search"></i> <?php esc_html_e('Search','yachtcharter'); ?>
				</button>

			</form>

		<!-- END .advanced-search-form -->
		</div>
		
		<?php
		
		echo wp_kses($after_widget,$yachtcharter_allowed_html_array);
	}	
	
	
/* ------------------------------------------------
	Update Widget
------------------------------------------------ */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	
/* ------------------------------------------------
	Widget Input Form
------------------------------------------------ */

	function form( $instance ) {
		$defaults = array(
		'title' => 'Yacht Search',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:', 'yachtcharter'); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
		</p>
		
	<?php
	}	
	
}

// Add widget function to widgets_init
add_action( 'widgets_init', 'yachtcharter_booking_widget' );

// Register Widget
function yachtcharter_booking_widget() {
	register_widget( 'yachtcharter_booking_widget' );
}