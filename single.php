<?php

magzma_header_choice();
?>

<!-- CONTENT START
============================================= -->
<section id="content" class="clearfix">

	<div class="breadcrumbs-wrapper">
		<div class="container">
			<?php 
magzma_breadcrumbs();
?>
		</div>
	</div>

	<!-- BLOG START
	============================================= -->
	<div class="blog right-sidebar wrapper-space clearfix">
		<div class="container">
			<div class="row">

				<!-- BLOG LOOP START
				============================================= -->
				<div class="column column-2of3 clearfix">
					<div class="blog-single content-section">

					<?php 
while ( have_posts() ) {
    the_post();
    get_template_part( 'inc/format/content' );
}
?>
				
					</div>
				</div>

				<!-- BLOG LOOP END -->

				<!-- SIDEBAR START
				============================================= -->

				<?php 
get_sidebar();
?>

				<!-- SIDEBAR END -->

			</div>
		</div>
	</div>
	<!-- BLOOG END -->

</section>
<!-- CONTENT END -->
		

<?php 
magzma_footer_choice();