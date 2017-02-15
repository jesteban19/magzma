<?php global $post;
?>

<div class="masonry-post">
	<ul class="grid effect-3" id="grid">
	
	<?php
		if($orderby == 'meta_value') {
		$order1 = array(
			'posts_per_page' => $post_per_page,
			'ignore_sticky_posts' => true,
			'post_type' => 'post',
			'cat' => $category,
			'offset' => $offset,
			'meta_key' => $metakey,
			'orderby' => $orderby 
		);
	}
	else {
		$order1 = array(
			'posts_per_page' => $post_per_page,
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'cat' => $category,
			'offset' => $offset,
			'orderby' => $orderby
		);
	}

	$sec_hook = new WP_Query( $order1 );
	if ($sec_hook->have_posts()) : while($sec_hook->have_posts()) : $sec_hook->the_post();
	?>

	<li id="post-<?php the_ID(); ?>" class="post column-<?php echo esc_attr( $choose_column ); ?> wow <?php echo esc_attr( $animation ); ?>" data-wow-delay="<?php echo esc_attr( $anime_time ); ?>s">

		<div class="loop-content">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="thumbnail">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div><!-- thumbnail-->
			<?php } ?>        

			<div class="info">

				<?php if($use_category == 'on') { ?>
				<div class="top-info">
					<span class="category"><?php the_category(', '); ?></span>
				</div>
				<?php } 
				if($use_title == 'on') { ?>
				<h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php } 
				if($use_date == 'on') { ?>
				<div class="date"><?php echo get_the_date(); ?></div>
				<?php } 
				if($use_excerpt == 'on') { ?>
				<div class="post-excerpt"><p><?php echo magzma_excerpt($excerpt_value); ?></p></div>
				<?php } 
				if($use_button == 'on') { ?>
				<div class="more-button clearfix">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="more pull-right">
						<?php esc_html_e( 'VIEW', 'magzma' ); ?>	
					</a>
				</div>
				<?php } ?>
			</div>
		</div><!-- post-content -->

	</li><!-- #post-<?php the_ID(); ?> -->

	<?php endwhile; wp_reset_postdata(); endif;  ?>

	</ul>
</div>

<script type="text/javascript">
	jQuery(window).load(function(){
		new AnimOnScroll( document.getElementById( 'grid' ), {
			minDuration : 0.4,
			maxDuration : 0.7,
			viewportFactor : 0.2
		} );
	});
</script>