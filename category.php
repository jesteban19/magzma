<?php magzma_header_choice();

if(class_exists('acf') && mag_fs()->is_plan__premium_only('pro') ) {
	$queried_object = get_queried_object(); 
	$taxonomy = $queried_object->taxonomy;
	$term_id = $queried_object->term_id;  

	$post_layout = get_field('post_layout', $queried_object);
	//$category_color = get_field('category_color', $queried_object);
	$category_image = get_field('category_image', $queried_object);
	$featured_news_layout = get_field('featured_news_layout', $queried_object);

	$rand1 = rand();

  ?>

<?php 
	if($featured_news_layout == 'none') {
		echo '';
	}
	elseif($featured_news_layout == 'layout-1') {
		get_template_part( 'inc/part/cat', 'carousel' );
	}
	elseif($featured_news_layout == 'layout-2') {
		get_template_part( 'inc/part/cat', 'main-news-1' );
	}
	elseif($featured_news_layout == 'layout-3') {
		get_template_part( 'inc/part/cat', 'main-news-2' );
	}
	elseif($featured_news_layout == 'layout-4') {
		get_template_part( 'inc/part/cat', 'main-news-3' );
	}
	elseif($featured_news_layout == 'layout-5') {
		get_template_part( 'inc/part/cat', 'post-style' );
	}
	elseif($featured_news_layout == 'layout-6') {
		get_template_part( 'inc/part/cat', 'post-style-2' );
	}
?>

<!-- CONTENT START
============================================= -->
<section id="content" class="clearfix">

	<!-- BLOG START
	============================================= -->
	<div class="blog category wrapper-space clearfix">
		<div class="container">
			<div class="row">

				<!-- BLOG LOOP START
				============================================= -->
				<div class="blog-section column column-2of3">

					<?php 
						if($post_layout == 'masonry-list') {
							get_template_part( 'inc/part/masonry', 'post-list' );
						}
						elseif($post_layout == 'masonry2-list') {
							get_template_part( 'inc/part/masonry2', 'post-list' );
						}
						elseif($post_layout == 'grid-list'){
							get_template_part( 'inc/part/grid', 'list' );
						}
						elseif($post_layout == 'grid2-list'){
							get_template_part( 'inc/part/grid2', 'post-list' );
						}
						else {
							get_template_part( 'inc/part/standard', 'list' );
						}
					?>
						
				</div>
				<!-- BLOG LOOP END -->

			<?php get_sidebar(); ?>

			</div><!-- row -->
		</div><!-- container -->
	</div><!-- search-result -->

</section>
<!-- CONTENT END -->

<?php } 

else { ?>

<!-- CONTENT START
============================================= -->
<section id="content" class="clearfix">

	<!-- BLOG START
	============================================= -->
	<div class="blog category wrapper-space clearfix">
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

<?php }  ?>
<?php magzma_footer_choice(); ?>