<?php get_header(); ?>

<?php if ($yachtcharter_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php the_title(); ?></h1>
		<div class="title-block3"></div>
		<p><span><a href="<?php echo home_url('/'); ?>"><span><?php esc_html_e('Home','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span><a href="<?php echo $yachtcharter_data['yacht_charters_slug']; ?>" ><span><?php esc_html_e('Yacht Charter','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span class="current"><?php the_title(); ?></span></p>
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

			<h3><?php esc_html_e('Book This Yacht','yachtcharter'); ?></h3>
			<div class="title-block5"></div>

			<!-- BEGIN .yacht-charter-sale-form -->
			<div class="yacht-charter-sale-form">
				
				<?php if ( !empty($yachtcharter_data['booking-url']) ) {
					$yacht_charter_booking_url = esc_url($yachtcharter_data['booking-url']);
				} else {
					$yacht_charter_booking_url = '#';
				} ?>
				
				<form action="<?php echo $yacht_charter_booking_url; ?>" method="get">
					
					<?php 
					
					//Get Post ID
					global $wp_query; $post_id = $wp_query->post->ID; 
					
					$yacht_charter_currency_symbol = get_post_meta($post->ID, 'yachtcharter_yacht_charter_currency_symbol', true);
					$yacht_charter_price = get_post_meta($post->ID, 'yachtcharter_yacht_charter_price', true);
					$yacht_charter_price_scheme = get_post_meta($post->ID, 'yachtcharter_yacht_charter_price_scheme', true);
					
					if ($yacht_charter_price_scheme == 'per_hour') {
						$yacht_charter_price_scheme_display = esc_html__('Per Hour','yachtcharter');
					} elseif ($yacht_charter_price_scheme == 'per_day') {
						$yacht_charter_price_scheme_display = esc_html__('Per Day','yachtcharter');
					} elseif ($yacht_charter_price_scheme == 'per_night') {
						$yacht_charter_price_scheme_display = esc_html__('Per Night','yachtcharter');
					} elseif ($yacht_charter_price_scheme == 'per_week') {
						$yacht_charter_price_scheme_display = esc_html__('Per Week','yachtcharter');
					} elseif ($yacht_charter_price_scheme == 'per_month') {
						$yacht_charter_price_scheme_display = esc_html__('Per Month','yachtcharter');
					}
					
					?>
					
					<?php if ($yachtcharter_data['currency-position'] == 'before') { ?>
						<h3><?php echo $yacht_charter_currency_symbol; ?><?php echo $yacht_charter_price; ?> <span><?php echo $yacht_charter_price_scheme_display; ?></span></h3>
					<?php } else { ?>
						<h3><?php echo $yacht_charter_price; ?><?php echo $yacht_charter_currency_symbol; ?> <span><?php echo $yacht_charter_price_scheme_display; ?></span></h3>
					<?php } ?>

					<div class="book-form-one-half">
						<label><?php esc_html_e('From','yachtcharter'); ?>:</label>
						<div class="select-wrapper">
							<i class="fa fa-angle-down"></i>
							<input name="date-from" type="text" class="datepicker" readonly="readonly" />
						</div>
					</div>

					<div class="book-form-one-half book-form-one-half-last">
						<label><?php esc_html_e('To','yachtcharter'); ?>:</label>
						<div class="select-wrapper">
							<i class="fa fa-angle-down"></i>
							<input name="date-to" type="text" class="datepicker" readonly="readonly" />
						</div>
					</div>

					<label><?php esc_html_e('Guests','yachtcharter'); ?>:</label>
					<div class="select-wrapper">
						<i class="fa fa-angle-down"></i>
						<select name="guests">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
						</select>
					</div>

					<button type="submit"><?php esc_html_e('Book Now','yachtcharter'); ?></button>
					<input type="hidden" name="yacht_sale_charter" value="charter" />
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