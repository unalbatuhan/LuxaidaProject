<?php get_header(); ?>

<?php if ($yachtcharter_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php the_title(); ?></h1>
		<div class="title-block3"></div>
		<p><span><a href="<?php echo home_url('/'); ?>"><span><?php esc_html_e('Home','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span><a href="<?php echo $yachtcharter_data['yacht_sales_slug']; ?>" ><span><?php esc_html_e('Yacht Sales','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span class="current"><?php the_title(); ?></span></p>
	</div>
	
</div>
<?php } ?>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper clearfix">

	<!-- BEGIN .columns-two-thirds -->
	<div class="<?php echo yachtcharter_sidebar1($yachtcharter_page_layout); ?>">

		<?php if ( post_password_required() ) {
			echo yachtcharter_password_form();
		} else { ?>
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<!-- BEGIN .post-ID -->
				<div id="post-<?php the_ID(); ?>">
					
					<?php if (strpos($post->post_content, '<!--more-->') !== false) {
					    $after_more = explode('<!--more-->', $post->post_content); if( $after_more[1] ) { echo do_shortcode($after_more[1]); } else { echo do_shortcode($after_more[0]); }
					} else {
						the_content();
					} ?>
					
				<!-- END .post-ID -->
				</div>
				
			<?php endwhile;endif; ?>

		<?php } ?>
		
	<!-- END .columns-two-thirds -->
	</div>
	
	<?php if ( $yachtcharter_page_layout != 'full-width' ) { ?>
	
	<!-- BEGIN .columns-one-third -->
	<div class="<?php echo yachtcharter_sidebar2($yachtcharter_page_layout); ?>">
		
		<!-- BEGIN .widget -->
		<div class="widget">

			<h3><?php esc_html_e('Buy This Yacht','yachtcharter'); ?></h3>
			<div class="title-block5"></div>
			
			<!-- BEGIN .yacht-charter-sale-form -->
			<div class="yacht-charter-sale-form">
				
				<?php if ( !empty($yachtcharter_data['booking-url']) ) {
					$yacht_sales_booking_url = esc_url($yachtcharter_data['booking-url']);
				} else {
					$yacht_sales_booking_url = '#';
				} ?>
				
				<form action="<?php echo $yacht_sales_booking_url; ?>" method="get">
					
					<?php 
					
					//Get Post ID
					global $wp_query; $post_id = $wp_query->post->ID; 
					
					$yacht_sales_currency_symbol = get_post_meta($post->ID, 'yachtcharter_yacht_sales_currency_symbol', true);
					$yacht_sales_price = get_post_meta($post->ID, 'yachtcharter_yacht_sales_price', true);
					
					?>
					
					<?php if ($yachtcharter_data['currency-position'] == 'before') { ?>
						<h3><?php echo $yacht_sales_currency_symbol; ?><?php echo $yacht_sales_price; ?></h3>
					<?php } else { ?>
						<h3><?php echo $yacht_sales_price; ?><?php echo $yacht_sales_currency_symbol; ?></h3>
					<?php } ?>
				
					<?php
					
					$yachtcharter_yacht_sales_variable_title_1 = get_post_meta($post->ID, 'yachtcharter_yacht_sales_variable_title_1', true);
					$yachtcharter_yacht_sales_variable_options_1 = get_post_meta($post->ID, 'yachtcharter_yacht_sales_variable_options_1', true);
					
					$yachtcharter_yacht_sales_variable_title_2 = get_post_meta($post->ID, 'yachtcharter_yacht_sales_variable_title_2', true);
					$yachtcharter_yacht_sales_variable_options_2 = get_post_meta($post->ID, 'yachtcharter_yacht_sales_variable_options_2', true);
					
					$yachtcharter_yacht_sales_variable_title_3 = get_post_meta($post->ID, 'yachtcharter_yacht_sales_variable_title_3', true);
					$yachtcharter_yacht_sales_variable_options_3 = get_post_meta($post->ID, 'yachtcharter_yacht_sales_variable_options_3', true);
					
					?>

					<?php // Option #1
					if ( !empty($yachtcharter_yacht_sales_variable_title_1) ) {
						echo '<label>' . $yachtcharter_yacht_sales_variable_title_1 . ':</label>';
					}
					if ( !empty($yachtcharter_yacht_sales_variable_options_1) ) { ?>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="yacht_option_1">
							<?php echo $yachtcharter_yacht_sales_variable_options_1; ?>
						</select>
					</div>
					<?php } ?>
					
					<?php // Option #2
					if ( !empty($yachtcharter_yacht_sales_variable_title_2) ) {
						echo '<label>' . $yachtcharter_yacht_sales_variable_title_2 . ':</label>';
					}
					if ( !empty($yachtcharter_yacht_sales_variable_options_2) ) { ?>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="yacht_option_2">
							<?php echo $yachtcharter_yacht_sales_variable_options_2; ?>
						</select>
					</div>
					<?php } ?>
					
					<?php // Option #3
					if ( !empty($yachtcharter_yacht_sales_variable_title_3) ) {
						echo '<label>' . $yachtcharter_yacht_sales_variable_title_3 . ':</label>';
					}
					if ( !empty($yachtcharter_yacht_sales_variable_options_3) ) { ?>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="yacht_option_3">
							<?php echo $yachtcharter_yacht_sales_variable_options_3; ?>
						</select>
					</div>
					<?php } ?>
					
					<button type="submit"><?php esc_html_e('Buy Now','yachtcharter'); ?></button>
					<input type="hidden" name="yacht_sale_charter" value="sale" />
					<input type="hidden" name="yacht_type" value="<?php the_title(); ?>" />
					
				</form>

			<!-- END .yacht-charter-sale-form -->
			</div>
			
		<!-- END .widget -->
		</div>
		
		<!-- BEGIN .widget -->
		<div class="widget">
			
			<h3><?php esc_html_e('Contact Us','yachtcharter'); ?></h3>
			<div class="title-block5"></div>

			<ul class="contact-details-widget">

				<?php if ( !empty($yachtcharter_data['top-left-address']) ) { ?>
					<li class="cdw-address clearfix"><?php echo esc_html_e($yachtcharter_data['top-left-address']); ?></li>
				<?php } ?>

				<?php if ( !empty($yachtcharter_data['top-left-open-times']) ) { ?>
					<li class="cdw-time clearfix"><?php echo esc_html_e($yachtcharter_data['top-left-open-times']); ?></li>
				<?php } ?>

				<?php if ( !empty($yachtcharter_data['top-left-phone']) ) { ?>
					<li class="cdw-phone clearfix"><?php echo esc_html_e($yachtcharter_data['top-left-phone']); ?></li>
				<?php } ?>

				<?php if ( !empty($yachtcharter_data['top-left-email']) ) { ?>
					<li class="cdw-email clearfix"><?php echo esc_html_e($yachtcharter_data['top-left-email']); ?></li>
				<?php } ?>

			</ul>
		
		<!-- END .widget -->
		</div>
		
	<!-- END .columns-one-third -->
	</div>
	
	<?php } ?>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>