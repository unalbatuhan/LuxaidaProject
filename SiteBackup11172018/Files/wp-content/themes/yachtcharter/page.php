<?php get_header(); ?>

<?php if ($yachtcharter_title_style != 'no_title') { ?>
<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>
	
	<div class="page-header-inner">
		<h1><?php the_title(); ?></h1>
		<div class="title-block3"></div>
		<?php echo dimox_breadcrumbs();?>
	</div>
	
</div>
<?php } ?>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper <?php if( $yachtcharter_page_layout == 'unboxed-full-width' ) {echo 'content-wrapper-full';} ?> clearfix">
	
	<!-- BEGIN .main-content -->
	<div class="<?php echo yachtcharter_sidebar1($yachtcharter_page_layout); ?>">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>			
			<?php wp_link_pages(array('before' => '<p><strong>'.esc_html__('Pages:', 'yachtcharter').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>			
			<?php if ( comments_open() ) : comments_template(); endif; ?>
		<?php endwhile;endif; ?>
		
	<!-- END .main-content -->
	</div>
	
	<?php if ( $yachtcharter_page_layout != 'full-width' ) { ?>
	<?php if ( $yachtcharter_page_layout != 'unboxed-full-width' ) { ?>
	
	<!-- BEGIN .sidebar-content -->
	<div class="<?php echo yachtcharter_sidebar2($yachtcharter_page_layout); ?>">
		
		<?php get_sidebar(); ?>
		
	<!-- END .sidebar-content -->
	</div>
	
	<?php } ?>
	<?php } ?>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>