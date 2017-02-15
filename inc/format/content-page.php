<article  id="page-<?php the_ID(); ?>" <?php post_class( 'page'); ?>>

	<?php if ( class_exists( 'acf' ) ) {

		$hide_title = get_field('hide_title'); ?>

	<?php if($hide_title == false) { ?>
	<div class="page-title">
		<div class="container">
			<?php magzma_breadcrumbs(); ?>
		</div>
	</div>
	<div class="container page-title-wrap">
		<h3><?php the_title(); ?></h3>
	</div>
	<?php } ?>

	<?php }
	else { ?>
	<div class="page-title">
		<div class="container">
			<?php magzma_breadcrumbs(); ?>
		</div>
	</div>
	<div class="container page-title-wrap">
		<h3><?php the_title(); ?></h3>
	</div>
	<?php } ?>

	<div class="page-content wrapper<?php magzma_wrap_space(); ?>clearfix">
		 <div class="container">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
			     
			<div class="page-comment  clearfix">
				<?php 
					if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
					if ( comments_open() || '0' != get_comments_number() ) comments_template(); 
				?>
			</div>
		</div> 
	</div><!-- page-content --> 

</article><!-- #page<?php the_ID(); ?> -->