<?php get_header(); ?>

<?php if ($yachtcharter_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php the_title(); ?></h1>
		<div class="title-block3"></div>
		<p><span><a href="<?php echo home_url('/'); ?>"><span><?php esc_html_e('Home','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span><a href="<?php echo $yachtcharter_data['locations_slug']; ?>" ><span><?php esc_html_e('Locations','yachtcharter'); ?></span></a></span><span class="sep"><i class="fa fa-angle-right"></i></span><span class="current"><?php the_title(); ?></span></p>
	</div>

</div>
<?php } ?>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper clearfix">

	<!-- BEGIN .columns-two-thirds -->
	<div class="main-content main-content-full">

		<?php if ( post_password_required() ) {
			echo yachtcharter_password_form();
		} else { ?>
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
				<!-- BEGIN .post-ID -->
				<div id="post-<?php the_ID(); ?>">
					
					<?php the_content(); ?>
					
				<!-- END .post-ID -->
				</div>
				
			<?php endwhile;endif; ?>

		<?php } ?>
		
	<!-- END .columns-two-thirds -->
	</div>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>