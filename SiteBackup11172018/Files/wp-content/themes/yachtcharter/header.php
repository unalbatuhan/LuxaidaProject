<?php

// Set Global Variables
global $yachtcharter_data;
global $yachtcharter_page_layout;
global $yachtcharter_page_header_image;
global $yachtcharter_title_style;

$yachtcharter_page_layout_var = get_post_meta(get_the_ID(), 'yachtcharter_page_layout', true);

// Get Page Layout
if( empty($yachtcharter_page_layout_var) ) {
	
	if ( empty($yachtcharter_data['site-layout-style']) ) {
		$yachtcharter_page_layout = 'right-sidebar';
	} else {
		$yachtcharter_page_layout = esc_html($yachtcharter_data['site-layout-style']);
	}

} else {
	$yachtcharter_page_layout = get_post_meta(get_the_ID(), 'yachtcharter_page_layout', true);
}

// Get Page Header Image
if ( is_404() ) {
	$yachtcharter_page_header_image = yachtcharter_page_header('');
} elseif ( is_search() ) {
	$yachtcharter_page_header_image = yachtcharter_page_header('');
} else {
	$yachtcharter_page_header_image = yachtcharter_page_header(wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'yachtcharter-image-style7' ));
}

// Get Page Title Style
$yachtcharter_title_style = get_post_meta(get_the_ID(), 'yachtcharter_title_style', true);

// Reset Query
wp_reset_postdata();

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head>
	
	<!--Meta Tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php wp_head(); ?>
	
<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class($yachtcharter_data['site-header-style']); ?>>
	
	<!-- BEGIN .outer-wrapper -->
	<div class="outer-wrapper">
		
		<?php if ( $yachtcharter_data['site-header-style'] == 'yacht-header-center-align' ) { ?>
			
			<!-- BEGIN .header-style-1 -->
			<div class="header-style-2">

				<!-- BEGIN .top-bar-wrapper -->
				<div class="top-bar-wrapper">

					<!-- BEGIN .top-bar -->
					<div class="top-bar clearfix">

						<!-- BEGIN .top-bar-inner -->
						<div class="top-bar-inner">

							<div class="top-bar-left clearfix">
								<ul>

									<?php if ( !empty($yachtcharter_data['top-left-address']) ) { ?>
										<li class="top-list-address"><?php echo esc_attr($yachtcharter_data['top-left-address']); ?></li>
									<?php } ?>

									<?php if ( !empty($yachtcharter_data['top-left-phone']) ) { ?>
										<li class="top-list-phone"><?php echo esc_attr($yachtcharter_data['top-left-phone']); ?></li>
									<?php } ?>

									<?php if ( !empty($yachtcharter_data['top-left-open-times']) ) { ?>
										<li class="top-list-business-hours"><?php echo esc_attr($yachtcharter_data['top-left-open-times']); ?></li>
									<?php } ?>

								</ul>
							</div>

							<?php if ( !empty($yachtcharter_data['top-right-button-text']) ) { ?>
								<a href="<?php echo esc_url($yachtcharter_data['top-right-button-url']); ?>" class="top-right-button" <?php if ( !empty($yachtcharter_data['top-right-button-link-target']) ) { ?>target="_blank"<?php } ?>><i class="fa fa-arrow-circle-right"></i><?php echo esc_attr($yachtcharter_data['top-right-button-text']); ?></a>
							<?php } ?>

						<!-- END .top-bar-inner -->
						</div>

					<!-- END .top-bar -->
					</div>

				<!-- END .top-bar-wrapper -->
				</div>

				<!-- BEGIN .header-wrapper -->
				<header class="header-wrapper clearfix">

					<!-- BEGIN .header-inner -->
					<div class="header-inner">

						<!-- BEGIN .header-inner-wrapper -->
						<div class="header-inner-wrapper">

							<!-- BEGIN .logo -->
							<div class="logo">

								<?php if ( !empty($yachtcharter_data['logo-image']['url'] ) ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($yachtcharter_data['logo-image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /></a>
								<?php } else { ?>
									<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
								<?php } ?>

							<!-- END .logo -->
							</div>

							<?php if ( !empty($yachtcharter_data['top-right-button-text']) ) { ?>
								<a href="<?php echo esc_url($yachtcharter_data['top-right-button-url']); ?>" class="top-right-button" <?php if ( !empty($yachtcharter_data['top-right-button-link-target']) ) { ?>target="_blank"<?php } ?>><i class="fa fa-arrow-circle-right"></i><?php echo esc_attr($yachtcharter_data['top-right-button-text']); ?></a>
							<?php } ?>

							<!-- BEGIN #primary-navigation -->
							<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix">

								<!-- BEGIN .navigation-inner -->
								<div class="navigation-inner">

									<!-- BEGIN .navigation-inner-wrapper -->
									<div class="navigation-inner-wrapper">

										<!-- BEGIN .navigation -->
										<div class="navigation">

											<?php wp_nav_menu( array(
												'theme_location' => 'primary',
												'container' => false,
												'items_wrap' => '<ul>%3$s</ul>',
												'fallback_cb' => 'yachtcharter_main_menu_fallback',
												'echo' => true,
												'before' => '',
												'after' => '',
												'link_before' => '',
												'link_after' => '',
												'depth' => 0 )
										 	); ?>

										<a href="#search-lightbox" data-gal="prettyPhoto"><i class="fa fa-search"></i></a>

										<!-- BEGIN #search-lightbox -->
										<div id="search-lightbox">

											<!-- BEGIN .search-lightbox-inner -->
											<div class="search-lightbox-inner">

												<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
													<input type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>';" onfocus="if(this.value=='<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>')this.value='';" value="<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>" name="s" />
												</form>

											<!-- END .search-lightbox-inner -->
											</div>

										<!-- END #search-lightbox -->
										</div>

										<!-- END .navigation -->
										</div>

									<!-- END .navigation-inner-wrapper -->
									</div>

								<!-- END .navigation-inner -->
								</div>

							<!-- END #primary-navigation -->
							</nav>

							<div id="mobile-navigation">
								<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>
							</div>

							<div class="clearboth"></div>

							<!-- BEGIN .mobile-navigation-wrapper -->
							<div class="mobile-navigation-wrapper">	

								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => 'yachtcharter_main_menu_fallback',
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0 )
							 	); ?>

							<!-- END .mobile-navigation-wrapper -->
							</div>

						<!-- END .header-inner-wrapper -->
						</div>

					<!-- END .header-inner -->
					</div>

				<!-- END .header-wrapper -->
				</header>

			<!-- END .header-style-2 -->
			</div>
			
		<?php } else { ?>
			
			<!-- BEGIN .header-style-1 -->
			<div class="header-style-1">

				<!-- BEGIN .top-bar-wrapper -->
				<div class="top-bar-wrapper">

					<!-- BEGIN .top-bar -->
					<div class="top-bar clearfix">

						<!-- BEGIN .top-bar-inner -->
						<div class="top-bar-inner">

							<div class="top-bar-left clearfix">
								<ul>

									<?php if ( !empty($yachtcharter_data['top-left-address']) ) { ?>
										<li class="top-list-address"><?php echo esc_attr($yachtcharter_data['top-left-address']); ?></li>
									<?php } ?>

									<?php if ( !empty($yachtcharter_data['top-left-phone']) ) { ?>
										<li class="top-list-phone"><?php echo esc_attr($yachtcharter_data['top-left-phone']); ?></li>
									<?php } ?>

									<?php if ( !empty($yachtcharter_data['top-left-open-times']) ) { ?>
										<li class="top-list-business-hours"><?php echo esc_attr($yachtcharter_data['top-left-open-times']); ?></li>
									<?php } ?>

								</ul>
							</div>

							<div class="top-bar-right clearfix">
								<ul class="top-bar-social">
									<?php echo yacht_header_social_icons(); ?>
								</ul>
							</div>

						<!-- END .top-bar-inner -->
						</div>

					<!-- END .top-bar -->
					</div>

				<!-- END .top-bar-wrapper -->
				</div>

				<!-- BEGIN .header-wrapper -->
				<header class="header-wrapper clearfix">

					<!-- BEGIN .header-inner -->
					<div class="header-inner">

						<!-- BEGIN .header-inner-wrapper -->
						<div class="header-inner-wrapper">

							<!-- BEGIN .logo -->
							<div class="logo">

								<?php if ( !empty($yachtcharter_data['logo-image']['url'] ) ) { ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($yachtcharter_data['logo-image']['url']); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" /></a>
								<?php } else { ?>
									<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
								<?php } ?>

							<!-- END .logo -->
							</div>

							<?php if ( !empty($yachtcharter_data['top-right-button-text']) ) { ?>
								<a href="<?php echo esc_url($yachtcharter_data['top-right-button-url']); ?>" class="top-right-button" <?php if ( !empty($yachtcharter_data['top-right-button-link-target']) ) { ?>target="_blank"<?php } ?>><i class="fa fa-arrow-circle-right"></i><?php echo esc_attr($yachtcharter_data['top-right-button-text']); ?></a>
							<?php } ?>

							<!-- BEGIN #primary-navigation -->
							<nav id="primary-navigation" class="navigation-wrapper fixed-navigation clearfix">

								<!-- BEGIN .navigation-inner -->
								<div class="navigation-inner">

									<!-- BEGIN .navigation-inner-wrapper -->
									<div class="navigation-inner-wrapper">

										<!-- BEGIN .navigation -->
										<div class="navigation">

											<?php wp_nav_menu( array(
												'theme_location' => 'primary',
												'container' => false,
												'items_wrap' => '<ul>%3$s</ul>',
												'fallback_cb' => 'yachtcharter_main_menu_fallback',
												'echo' => true,
												'before' => '',
												'after' => '',
												'link_before' => '',
												'link_after' => '',
												'depth' => 0 )
										 	); ?>

										<!-- END .navigation -->
										</div>

										<?php if ( !empty($yachtcharter_data['top-right-button-text']) ) { ?>
											<a href="<?php echo esc_url($yachtcharter_data['top-right-button-url']); ?>" class="top-right-button" <?php if ( !empty($yachtcharter_data['top-right-button-link-target']) ) { ?>target="_blank"<?php } ?>><i class="fa fa-arrow-circle-right"></i><?php echo esc_attr($yachtcharter_data['top-right-button-text']); ?></a>
										<?php } ?>

									<!-- END .navigation-inner-wrapper -->
									</div>

								<!-- END .navigation-inner -->
								</div>

							<!-- END #primary-navigation -->
							</nav>

							<div id="mobile-navigation">
								<a href="#" id="mobile-navigation-btn"><i class="fa fa-bars"></i></a>
							</div>

							<div class="clearboth"></div>

							<!-- BEGIN .mobile-navigation-wrapper -->
							<div class="mobile-navigation-wrapper">	

								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'items_wrap' => '<ul>%3$s</ul>',
									'fallback_cb' => 'yachtcharter_main_menu_fallback',
									'echo' => true,
									'before' => '',
									'after' => '',
									'link_before' => '',
									'link_after' => '',
									'depth' => 0 )
							 	); ?>

							<!-- END .mobile-navigation-wrapper -->
							</div>

						<!-- END .header-inner-wrapper -->
						</div>

					<!-- END .header-inner -->
					</div>

				<!-- END .header-wrapper -->
				</header>

			<!-- END .header-style-1 -->
			</div>
			
		<?php } ?>