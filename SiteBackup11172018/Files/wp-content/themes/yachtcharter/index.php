<?php get_header(); ?>

<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php esc_html_e('Latest News','yachtcharter'); ?></h1>
		<div class="title-block3"></div>
		<?php echo dimox_breadcrumbs();?>
	</div>
	
</div>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper <?php if( $yachtcharter_page_layout == 'unboxed-full-width' ) {echo 'content-wrapper-full';} ?> clearfix">
	
	<!-- BEGIN .main-content -->
	<div class="<?php echo yachtcharter_sidebar1($yachtcharter_page_layout); ?>">
		
		<?php if(get_option('posts_per_page')) {
			$posts_per_page = esc_attr(get_option('posts_per_page'));
		} else {
			$posts_per_page = '10';
		} ?>
		
		<!-- BEGIN .news-block-wrapper -->
		<div class="news-block-wrapper news-block-wrapper-1-col-listing clearfix">

			<?php $count = 0; ?>
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
			<?php query_posts( "post_type=post&paged=" . $paged . "&posts_per_page=" . $posts_per_page ); ?>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
			
					<!-- BEGIN .news-block -->
					<div id="post-<?php the_ID(); ?>" <?php post_class("news-block"); ?>>
				
						<?php if( has_post_thumbnail() ) { ?>

							<div class="news-block-image">
								<a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style1' ); ?>
									<?php echo '<img src="' . esc_url( $src[0] ) . '" alt="' . get_the_title() . '" />'; ?>
								</a>
							</div>

						<?php } ?>
				
						<!-- BEGIN .news-block-content -->
						<div class="news-block-content">
							
							<!-- BEGIN .news-meta -->
							<div class="news-meta clearfix">
								<span class="nm-news-author"><?php esc_html_e( 'By', 'yachtcharter' ); ?> <?php the_author_posts_link(); ?></span>
								<span class="nm-news-date"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
								<span class="nm-news-category"><?php the_category(', '); ?></span>
								<span class="nm-news-comments"><?php comments_popup_link(esc_html__( 'No Comments', 'yachtcharter' ),esc_html__( '1 Comment', 'yachtcharter' ),esc_html__( '% Comments', 'yachtcharter' ),'',esc_html__( 'Comments Off','yachtcharter')); ?></span>
							<!-- END .news-meta -->
							</div>
							
							<h3><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							
							<!-- BEGIN .news-description -->
							<div class="news-description">
						
								<?php global $more;$more = 0;?>
								<?php the_content(esc_html__('Read More','yachtcharter') . ' <i class="fa fa-angle-right"></i>'); ?>
							
							<!-- END .news-description -->
							</div>

						<!-- END .news-block-content -->
						</div>

					<!-- END .news-block -->
					</div>
			
				<?php endwhile; ?>
			<?php endif; ?>
			
		<!-- END .news-block-wrapper -->
		</div>

		<?php get_template_part( 'loop', 'pagination' ); ?>
		
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