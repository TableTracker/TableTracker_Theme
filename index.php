<?php

	get_header();

?>
<?php if ( is_home() ){ ?>
	<div style="width: 370px; margin-right: 20px; float:left;">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Left') ) : ?>
		<?php endif; ?>
	</div>

	<div style="width: 545px; float:left;">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Right') ) : ?>
		<?php endif; ?>

		<div style="width: 300px; float:left; margin-top: -10px">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Right - Left') ) : ?>
			<?php endif; ?>
		</div>
	
		<div style="width: 225px; float:right; margin-top: -10px">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Right - Right') ) : ?>
			<?php endif; ?>
		</div>	
	</div>

	<div style="width: 935px; float:left;">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage Bottom') ) : ?>
		<?php endif; ?>
	</div>
  
	<div class="clear"></div>
<?php 
	}
	get_footer();
?>