<?php get_header(); ?>

<div id="page-header" <?php echo wp_kses($yachtcharter_page_header_image, $yachtcharter_allowed_html_array); ?>>	
	
	<div class="page-header-inner">
		<h1><?php esc_html_e('Search Results','yachtcharter')?></h1>
		<div class="title-block3"></div>
		<?php echo dimox_breadcrumbs();?>
	</div>
	
</div>

<!-- BEGIN .content-wrapper -->
<div class="content-wrapper clearfix">
	
	<!-- BEGIN .main-content -->
	<div class="main-content">
		
		<?php // Begin Advanced Yacht Search
 		if ( isset($_GET['advs']) ) { ?>
			
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
			
			<?php global $post;
			global $wp_query;

			// Set Posts Displayed Per Page
			$posts_per_page = '10';
			
			// Set Paged
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			
			// Set Query
			if ( $_GET['ysco'] == '1' ) {
				
				$args = array(
					'post_type' => 'yacht_charter',
					's' => $_GET['s'],
					'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'yacht_charter-type',
								'field'    => 'slug',
								'terms'    => $_GET["ycto"],
							),
							array(
								'taxonomy' => 'yacht_charter-location',
								'field'    => 'slug',
								'terms'    => $_GET["yclo"],
							),
						),
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					'order' => 'DESC'
				);
				
			} else {
				
				$args = array(
					'post_type' => 'yacht_sales',
					's' => $_GET['s'],
					'tax_query' => array(
							'relation' => 'AND',
							array(
								'taxonomy' => 'yacht_sales-type',
								'field'    => 'slug',
								'terms'    => $_GET["ysto"],
							),
							array(
								'taxonomy' => 'yacht_sales-location',
								'field'    => 'slug',
								'terms'    => $_GET["yslo"],
							),
						),
					'posts_per_page' => $posts_per_page,
					'paged' => $paged,
					'order' => 'DESC'
				);
				
			}
			
			// Display Results
			$wp_query = new WP_Query( $args );
			if ($wp_query->have_posts()) : ?>

			<!--BEGIN .search-results-list -->
			<ul class="search-results-list">
				
				<?php $i = 0; ?>
				
				<?php while($wp_query->have_posts()) :
					$wp_query->the_post(); ?>

					<li><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span>(<?php echo yachtcharter_post_type_name(get_post_type());?>)</span></li>

				<?php endwhile; ?>

			<!--END .search-results-list -->
			</ul>

			<?php else : ?>
				<p><?php esc_html_e('Sorry no yachts found, please try another search query!','yachtcharter'); ?></p>
			<?php endif;

				if ( $wp_query->max_num_pages > 1 ) : ?>

					<div class="clearboth"></div>

					<?php if(is_plugin_active('wp-pagenavi/wp-pagenavi.php')) {
						echo '<div class="pagination-wrapper">';
						wp_pagenavi();
						echo '</div>';
						echo '<div class="clearboth"></div>';
					} else { ?>

					<div class="pagination-wrapper">
						<p class="clearfix">
							<span class="fl prev-pagination"><?php next_posts_link( esc_html__( '&larr; Older posts', 'yachtcharter' ) ); ?></span>
							<span class="fr next-pagination"><?php previous_posts_link( esc_html__( 'Newer posts &rarr;', 'yachtcharter' ) ); ?></span>	
						</p>
					</div>

					<?php } ?>

				<?php endif; wp_reset_query(); 
		
		// End Advanced Yacht Search
		} else { ?>
			
			<!-- BEGIN .search-results-form -->
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-results-form clearfix">
				<label><?php esc_html_e('Keywords','yachtcharter'); ?></label>
				<input type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>';" onfocus="if(this.value=='<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>')this.value='';" value="<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>" name="s" />
				<button type="submit">
					<?php esc_html_e('Search','yachtcharter'); ?> <i class="fa fa-search"></i>
				</button>
			<!-- END .search-results-form -->
			</form>
			
			<?php if (have_posts()) : ?>

				<!--BEGIN .search-results-list -->
				<ul class="search-results-list">

					<?php $i = 0;
					while (have_posts()) : the_post(); ?>
						<li><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span>(<?php echo yachtcharter_post_type_name(get_post_type());?>)</span></li>
					<?php endwhile;?>

				<!--END .search-results-list -->
				</ul>

			<?php else : ?>

				<!--BEGIN .search-results-list -->
				<ul class="search-results-list">
					<li><?php esc_html_e( 'No results were found.', 'yachtcharter' ); ?></li>
				<!--END .search-results-list -->
				</ul>

			<?php endif;
			
		} ?>
	
	<!-- END .main-content -->
	</div>
	
	<!-- BEGIN .sidebar-content -->
	<div class="sidebar-content">
		
		<?php get_sidebar(); ?>
		
	<!-- END .sidebar-content -->
	</div>

<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>