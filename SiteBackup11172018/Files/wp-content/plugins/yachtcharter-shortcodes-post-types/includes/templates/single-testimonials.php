<?php get_header(); ?>

<?php if ($yachtcharter_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php the_title(); ?></h1>
		<div class="title-block3"></div>
		<p><span><a href="<?php echo home_url('/'); ?>"><span><?php esc_html_e('Home','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span><a href="<?php echo $yachtcharter_data['testimonials_slug']; ?>" ><span><?php esc_html_e('Testimonials','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span class="current"><?php the_title(); ?></span></p>
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
			
			<!-- BEGIN .testimonial-list-wrapper -->
			<div class="testimonial-list-wrapper testimonial-list-wrapper-full">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<?php
					// Get testimonial data
					$testimonial_guest = get_post_meta($post->ID, $prefix.'testimonial_guest', true);
					$testimonial_other_details = get_post_meta($post->ID, $prefix.'testimonial_other_details', true);			
				?>
			
				<!-- BEGIN .testimonial-wrapper -->
				<div id="post-<?php the_ID(); ?>" class="testimonial-wrapper">
					
					<div><span class="yachtcharter-open-quote">“</span><?php the_content(); ?><span class="yachtcharter-close-quote">”</span></div>
										
					<?php if( has_post_thumbnail() ) { ?>

						<div class="testimonial-image">
							<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style3' ); ?>
							<?php echo '<img src="' . $src[0] . '" alt="' . get_the_title() . '" />'; ?>
						</div>

					<?php } ?>

					<div class="testimonial-author"><p><?php echo esc_textarea($testimonial_guest); ?> - <?php echo esc_textarea($testimonial_other_details); ?></p></div>
										
				<!-- END .testimonial-wrapper -->
				</div>

			<?php endwhile;endif; ?>
			
			<!-- END .testimonial-list-wrapper -->
			</div>
			
		<?php } ?>
		
	<!-- END .columns-two-thirds -->
	</div>
	
	<?php if ( $yachtcharter_page_layout != 'full-width' ) { ?>
	
	<!-- BEGIN .columns-one-third -->
	<div class="<?php echo yachtcharter_sidebar2($yachtcharter_page_layout); ?>">
		
		<?php get_sidebar(); ?>
		
	<!-- END .columns-one-third -->
	</div>
	
	<?php } ?>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>