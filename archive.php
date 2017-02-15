<?php magzma_header_choice();  ?>

<!-- CONTENT START
============================================= -->
<section id="content" class="clearfix">

	<!-- BLOG START
	============================================= -->
	<div class="blog archives wrapper-space clearfix">
		<div class="container">
			<div class="row">

				<!-- BLOG LOOP START
				============================================= -->
				<div class="blog-section column column-2of3">

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); 

							get_template_part( 'inc/format/loop', get_post_format() );

						endwhile; ?>
						
					<?php else : ?>

					<?php get_template_part( 'inc/format/content', 'no-result' ); ?>

					<?php endif; ?>

					<?php magzma_content_nav($pages = '', $range = 2); ?>
				
				</div>
				<!-- BLOG LOOP END -->

			<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- search-result -->

</section>
<!-- CONTENT END -->

<?php magzma_footer_choice(); ?>