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
		
		<?php get_sidebar(); ?>
		
	<!-- END .columns-one-third -->
	</div>
	
	<?php } ?>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>