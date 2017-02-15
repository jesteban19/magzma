<?php 

global $post;

?>

<div class="main-news-1 clearfix">

<?php

	if($orderby == 'meta_value') {
		$main_news1_args = array(
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
		$main_news1_args = array(
			'posts_per_page' => $post_per_page,
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'cat' => $category,
			'offset' => $offset,
			'orderby' => $orderby
		);
	} 

	$sec_hook1 = new WP_Query( $main_news1_args );
	if ($sec_hook1->have_posts()) : while($sec_hook1->have_posts()) : $sec_hook1->the_post();

	$category_name = '';
	$category_terms = wp_get_object_terms($post->ID, 'category');
	if(!empty($category_terms)){
		if(!is_wp_error( $category_terms )){
			$post_slug = array();
			foreach($category_terms as $term){
				$category_name[] = $term->name;
				$post_slug[] = $term->slug;
			}
		}
	}

	$tax_comas =  join( ", ", $category_name );
	$tax_space =  join( " ", $post_slug );

	if (has_post_thumbnail()) { 
	$img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
			$image1 = aq_resize($img_url[0],  $width , $height, true);
	} ?>
	
	<div class="article-wrap selector-padding <?php echo sanitize_text_field($horizontal_col_select); ?> wow <?php echo esc_attr( $animation ); ?>"  data-wow-delay="<?php echo esc_attr( $anime_time ); ?>s">
		<article class="blog-item main-news-post-selector block <?php echo sanitize_text_field( $tax_space ); ?> <?php if(has_post_thumbnail()) { echo 'has-post-thumbnail'; } ?>" data-file="<?php the_permalink(); ?>" data-target="article">

			<a href="<?php the_permalink(); ?>">
				<div class="blog-wrap" <?php if(has_post_thumbnail()) { ?> style="background-image:url(<?php echo esc_url( $image1 ); ?>)" <?php } ?>>
					<div class="blog-overlay"> </div>    
				</div>
			</a>

			<?php 
			if($use_icon == 'on') {
			magzma_post_type();
			} ?>
						 
			<div class="blog-desc">
				<?php 
				if($use_category == 'on') { ?>
					<div class="category-main-news-1"><?php the_category(); ?></div>
				<?php } 

				if($use_title == 'on') { ?>
					<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php } ?>

				<div class="main-news-post-meta">
					<?php
					if($use_date == 'on') { ?>
						<div class="blog-date"><?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?> </div>
					<?php }
					if($use_read == 'on') { ?>
						<div class="time-read">
							<span class="eta"></span> <?php esc_html_e( ' read', 'magzma' ); ?>
						</div>
					<?php } ?>
					<?php if($love_count == 'on') { ?>
					<div class="love-count">
						<?php magzma_love_it_link(); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</article>
	</div>

	<?php endwhile; endif;  ?>

</div>

<?php wp_reset_postdata(); wp_reset_query(); ?>