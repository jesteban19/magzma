<aside id="primary-sidebar" class="sidebar column column-3 clearfix">
	<div class="blog-sidebar">

	<?php 
	if ( is_active_sidebar( 'primary-sidebar' ) ) { 
		dynamic_sidebar( 'primary-sidebar' );
	}
	?>
	
	</div>
</aside><!-- #primary-sidebar -->