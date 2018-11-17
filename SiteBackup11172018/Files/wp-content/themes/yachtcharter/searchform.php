<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="not-found-search">
	<div class="input-wrapper">
		<input type="text" onblur="if(this.value=='')this.value='<?php esc_html_e('Search...', 'yachtcharter'); ?>';" onfocus="if(this.value=='<?php esc_html_e('Search...', 'yachtcharter'); ?>')this.value='';" value="<?php esc_html_e('Search...', 'yachtcharter'); ?>" name="s" />
		<i class="fa fa-search"></i>
	</div>
</form>