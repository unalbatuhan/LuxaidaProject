<?php get_header(); ?>

<div class="page-not-found-header">
			
	<div class="page-not-found-content">
		
		<h1><?php esc_html_e('Page Not Found','yachtcharter'); ?></h1>
		<div class="title-block3"></div>
		<p><?php esc_html_e('Sorry, the requested page could not be found, the page may have been deleted or you may have followed a broken link.','yachtcharter'); ?></p>

		<!-- BEGIN .page-not-found-search-form -->
		<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="page-not-found-search-form clearfix">

			<div class="page-not-found-search-wrapper">
				<input type="text" name="s" onblur="if(this.value=='')this.value='<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>';" onfocus="if(this.value=='<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>')this.value='';" value="<?php esc_html_e('To search, type and hit enter', 'yachtcharter'); ?>" />
				<i class="fa fa-search"></i>
			</div>

		<!-- END .page-not-found-search-form -->
		</form>
	
	</div>
	
</div>

<?php get_footer(); ?>