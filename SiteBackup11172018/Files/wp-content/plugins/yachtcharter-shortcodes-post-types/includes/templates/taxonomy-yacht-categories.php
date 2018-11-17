<?php get_header(); ?>

<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php the_title(); ?></h1>
		<div class="title-block3"></div>
		<?php echo dimox_breadcrumbs();?>
	</div>
	
</div>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper <?php if( $yachtcharter_page_layout == 'unboxed-full-width' ) {echo 'content-wrapper-full';} ?> clearfix">
	
	<!-- BEGIN .main-content -->
	<div class="<?php echo yachtcharter_sidebar1($yachtcharter_page_layout); ?>">
		
		<p><?php _e('To create a yacht sales/charter category page, please go to "Pages > Add New", select the "Yacht Charter Page" or "Yacht Sales Page" element in Visual Composer, and enter your category slug in the "Category" field.','yachtcharter'); ?></p>
		
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