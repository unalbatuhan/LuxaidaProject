<?php global $yachtcharter_data; ?>

<!-- BEGIN .footer -->
<footer class="footer">

	<!-- BEGIN .footer-inner -->
	<div class="footer-inner clearfix">
		
		<div class="footer-inner-wrapper">
		
		<?php if ( is_active_sidebar('footer-widget-area') ) { ?>	
			<?php dynamic_sidebar( 'footer-widget-area' ); ?>
		<?php } ?>
		
		</div>

	<!-- END .footer-inner -->
	</div>
	
	<!-- BEGIN .footer-bottom -->
	<div class="footer-bottom <?php if ( $yachtcharter_data['site-footer-style'] == 'yacht-footer-center-align' ) { echo 'footer-bottom-center';} ?>">

		<div class="footer-bottom-inner clearfix">
			
			<?php if( $yachtcharter_data['footer-message'] ) { ?>
				<p class="footer-message"><?php echo esc_attr($yachtcharter_data['footer-message']); ?></p>
			<?php } ?>

			<?php echo yachtcharter_footer_social_icons(); ?>

		</div>

	<!-- END .footer-bottom -->
	</div>

<!-- END .footer -->	
</footer>

<!-- END .outer-wrapper -->
</div>

<?php wp_footer(); ?>

<!-- END body -->
</body>
</html>