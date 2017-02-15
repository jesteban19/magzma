<?php magzma_header_choice();  ?>

<!-- CONTENT START
============================================= -->
<section id="content" class="clearfix">

	<!-- BLOG START
	============================================= -->
	<div class="blog right-sidebar wrapper-space clearfix">
        <div class="container clearfix">
        	<div class="row clearfix">
				<!-- BLOG LOOP START
				============================================= -->
				<div class="column column-2of3 clearfix">
	                <div class="blog-section content-section">

					<?php while ( have_posts() ) : the_post(); 
			
						get_template_part( 'inc/format/loop', get_post_format() );

					endwhile; // end of the loop. ?>

					<?php magzma_content_nav($pages = '', $range = 2); ?>
				
					</div>
				</div>
				<!-- BLOG LOOP END -->

				<!-- SIDEBAR START
				============================================= -->

				<?php get_sidebar(); ?>

				<!-- SIDEBAR END -->
			</div>
		</div>
	</div>
	<!-- BLOOG END -->

</section>
<!-- CONTENT END -->
		

<?php magzma_footer_choice(); ?>