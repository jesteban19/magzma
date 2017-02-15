<div  class="feature-slider-<?php echo esc_attr( $rand1 ); ?> carousel-slider swiper-container">
	<div class="swiper-wrapper">

	<?php global $post;

	if($orderby == 'meta_value') {
		$carousel_args = array(
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
		$carousel_args = array(
			'posts_per_page' => $post_per_page,
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'cat' => $category,
			'offset' => $offset,
			'orderby' => $orderby
		);
	} 

	$sec_hook1 = new WP_Query( $carousel_args );
	if ($sec_hook1->have_posts()) : while($sec_hook1->have_posts()) : $sec_hook1->the_post(); ?>

		<div class="swiper-slide"<?php if($autoplay == 'use') { ?> data-swiper-autoplay="<?php echo esc_attr( $autoplay_ms ); ?>"<?php } ?>>

			<?php if(has_post_thumbnail()) { 
			$img_url_blog = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
			if($choose_column != 'auto') {
				$image_blogblog = aq_resize($img_url_blog[0],  $width , $height, true);
			}
			else {
				$image_blogblog = aq_resize($img_url_blog[0],  $img_url_blog[1], $height, true);
			} ?>

			<a href="<?php the_permalink(); ?>">
				<img src="<?php echo esc_url( $image_blogblog ); ?>" alt="<?php the_title(); ?>" width="<?php echo $width ?>" height="<?php echo $height ?>">
			</a>

			<?php }  
			else {
				
			} ?>
			
			<?php if($use_category == 'on') { ?>
			<div class="text-overlay-meta">
				<span class="category-feature-slider"><?php the_category(); ?></span>
			</div>
			<?php } ?>
			
			<div class="overlay-feature-slider">
				<?php if($use_title == 'on' || $use_excerpt == 'on' || $use_date == 'on') { ?>
				<div class="text-overlay">
					<div class="text-overlay-title">
						<?php if($use_title == 'on') { ?>
							<a href="<?php the_permalink(); ?>">
								<h4><?php the_title(); ?></h4>
							</a>
						<?php }

						if($use_date == 'on') { ?>
						<span><?php echo get_the_date('M'); ?> <?php echo get_the_date('d'); ?>, <?php echo get_the_date('Y'); ?></span>
					<?php }
						
						if($use_excerpt == 'on') { ?>
							<p class="excerpt"><?php echo magzma_excerpt($excerpt_value); ?></p>
						<?php } ?>
					</div>

				</div>
				<?php } ?>
			</div>

		</div>
		<!-- owl item end -->
		
		<?php endwhile; wp_reset_postdata(); endif;  ?>
	</div>

	<?php if($navigation != 'none') {
		if($navigation == 'dots') { ?>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
		<?php }
		elseif($navigation == 'arrows') { ?>
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<?php }
		else { ?>
		<!-- Add Pagination -->
		<div class="swiper-pagination"></div>
		<!-- Add Arrows -->
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
		<?php }
	} ?>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
	var swiper = new Swiper('.feature-slider-<?php echo esc_attr( $rand1 ); ?>', {
			slidesPerView: '<?php echo $choose_column; ?>',
		<?php if($navigation == 'dots' || $navigation == 'arrows-dots') { ?>
			pagination: '.swiper-pagination',
			paginationClickable: true,
		<?php }
		if($navigation == 'arrows' || $navigation == 'arrows-dots') { ?>
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
		<?php } ?>
			spaceBetween: <?php echo $column_gap; ?>,
		<?php if($autoplay == 'use') { ?>
			autoplayDisableOnInteraction: false,
			autoplay: <?php echo $autoplay_ms; ?>,
		<?php } ?>
		<?php if($auto_loop == 'use') { ?>
			loop: true,
		<?php } ?>
		<?php if($keyboard_nav == 'use') { ?>
			keyboardControl: true,
		<?php } ?>
			effect: '<?php echo $effect_type; ?>',
			breakpoints: {
			    // when window width is <= 640px
			    768: {
			      slidesPerView: <?php echo $choose_column_mobile; ?>,
			    }
			},
		<?php if($centered_slide == 'use') { ?>
        	centeredSlides: true,
        <?php } ?>
	});
});
</script>