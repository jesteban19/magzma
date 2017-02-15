<?php magzma_header_choice(); ?>

<div id="content-wrapper" class="wrapper">
	<div class="container">
		<article class="single-post post no-result not-found clearfix">
			<h1><span><?php esc_html_e( '404', 'magzma' ); ?></span> <?php esc_html_e( 'Not Found', 'magzma' ); ?></h1>
			<h3>
			  <?php esc_html_e( 'The page you were looking for doesn&rsquo;t exist.', 'magzma' ); ?> <span><?php esc_html_e( 'You may have mistyped the address or the page may have moved.', 'magzma' ); ?></span>
			</h3>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go back to the homepage ', 'magzma' ); ?></a>
		</article><!-- #post-0 .post .no-result .not-found -->
	</div>
</div><!-- wrapper -->

<?php magzma_footer_choice();