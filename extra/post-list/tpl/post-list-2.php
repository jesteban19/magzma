<?php $testId = get_the_ID(); ?>

<div class="post-list-2-wrapper list2-wrap-<?php echo esc_attr($loop_infinite_class); ?> clearfix">

	<?php 
	if($orderby == 'meta_value') {
		$ishome = get_option('page_on_front');

		if($ishome == $postList1) {
			$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
		}
		else {
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
		}

		$order1 = array(
			'posts_per_page' => $post_per_page,
			'ignore_sticky_posts' => true,
			'paged' => $paged,
			'post_type' => 'post',
			'cat' => $category,
			'offset' => $offset,
			'meta_key' => $metakey,
			'orderby' => $orderby 
		);
	}
	else { 

		$ishome = get_option('page_on_front');
		$postList1 = get_the_ID();

		if($ishome == $postList1) {
			$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1; 
		}
		else {
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
		} 

		$order1 = array(
			'posts_per_page' => $post_per_page,
			'paged' => $paged,
			'post_type' => 'post',
			'ignore_sticky_posts' => true,
			'cat' => $category,
			'offset' => $offset,
			'orderby' => $orderby
		);
	} 

	$sec_hook = new WP_Query( $order1 );
	if ($sec_hook->have_posts()) : while($sec_hook->have_posts()) : $sec_hook->the_post();

	if ( has_post_format('gallery') ) {
		$images = get_field('magzma_gallery');
	}
	if ( has_post_format('video') ) {
		$video_url = get_field('video_url');
		$video_embed = get_field('video_embed');
		$video_file = get_field('video_file');
	}

	if(has_post_thumbnail()) { 
		$img_url_blog = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
		$image_blogblog = aq_resize($img_url_blog[0],  $width, $height, true);
	}  
	?>
			
	<article class="post-list-2-inner-content post-list-post-selector clearfix wow <?php echo sanitize_text_field( $animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $anime_time); ?>s" data-file="<?php the_permalink(); ?>" data-target="article">

			<?php if( has_post_format('gallery') && $images ) { ?>
			<div class="post-slider-<?php $rand1 = rand(); echo esc_attr( $rand1 ); ?> post-block swiper-container">
				<div class="swiper-wrapper">

					<?php foreach( $images as $image ): ?>
						<div class="swiper-slide">
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						</div>
					<?php endforeach; ?>

				</div>

				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
			<?php }
			elseif( has_post_format('video')) { ?>
			<div class="post-block">
			<?php 
				if($video_url !== ''){ 
					echo wp_oembed_get( esc_url( $video_url ));
				} 
				elseif($video_embed !== '') { 
					echo balancetags( $video_embed );
				}
				elseif($video_file !== '') {
					echo do_shortcode( '[video src="'. sanitize_text_field( $video_file ).'"]' );
				}
			?>
			</div>
			<?php }
			else { ?>
				<?php if ( has_post_thumbnail()) { ?>
				<div class="post-block">
					<img src="<?php echo esc_url( $image_blogblog ); ?>" alt="<?php the_title(); ?>">
				</div>
				<?php } ?>
			<?php } ?>

			<div class="post-content<?php if ( !has_post_thumbnail() && !get_post_format() ) { ?> no-thumb<?php }?>">

				<?php if($use_category == 'on') { ?>
					<div class="standard-post-categories">
						<?php the_category(''); ?>
					</div>
				<?php }

				if($use_title == 'on') { ?>
					<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php }
				
				if($use_meta == 'on') { ?>
					<div class="post-meta">
						<div class="post-author-name">
							<?php echo get_the_author_meta( 'display_name' ); ?>
						</div>

						<div class="post-date">
							<span><?php echo get_the_date('j'); ?></span> <span><?php echo get_the_date('M'); ?></span> <span><?php echo get_the_date('Y'); ?></span>
						</div>

						<div class="time-read">
							<span class="eta"></span><?php esc_html_e( ' read', 'magzma' ); ?>
						</div>
					</div>
				<?php }
				
				if($use_excerpt == 'on') { ?>
					<p><?php echo magzma_excerpt($excerpt_value); ?></p>
				<?php }
				
				if($use_button == 'on') { ?>
					<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Continue Reading', 'magzma' ); ?></a>
				<?php } ?>
			</div>
		</article>

	<?php endwhile; wp_reset_postdata(); endif; ?>

</div>

<?php if($use_infinite_scroll == 'use') { ?>
<div class="infinite-wrap clearfix">
	<div id="load-more-post-list-2-<?php echo esc_attr( $loop_infinite_class ); ?>" class="infinite-button"><?php next_posts_link( '', $sec_hook->max_num_pages ); ?></div>
	<button id="load-infinite-post-list-2"><?php esc_html_e( 'Load More', 'magzma' ); ?></button>
</div>
<?php } ?>

<script type="text/javascript">
jQuery(function($) {
	$('article').each(function() {
		$(this).readingTime({
			readingTimeTarget: $(this).find('.eta'),
			remotePath: $(this).attr('data-file'),
			remoteTarget: $(this).attr('data-target')
		});
	});
});
<?php if( has_post_format('gallery') && $images ) { ?>
var swiper = new Swiper('.post-slider-<?php echo esc_attr( $rand1 ); ?>', {
	nextButton: '.swiper-button-next',
	prevButton: '.swiper-button-prev',
	slidesPerView: 1,
	paginationClickable: true,
	spaceBetween: 0,
	loop: true
}); 
<?php } ?>
<?php if($use_infinite_scroll == 'use') { ?>
	jQuery(window).load(function(){
		var jQuerycontainer = jQuery('.list2-wrap-<?php echo esc_attr($loop_infinite_class); ?>');

		// Infinite Scroll
		jQuerycontainer.infinitescroll({
		loading: {
		finishedMsg: 'There is no more',
		img: "<?php echo get_template_directory_uri(); ?>asset/img/loading.gif",
		msgText: 'loading',
		speed: 'normal'
			},

		state: {
		isDone: false
		},
			navSelector  : '#load-more-post-list-2-<?php echo esc_attr( $loop_infinite_class ); ?>', 
			nextSelector : '#load-more-post-list-2-<?php echo esc_attr( $loop_infinite_class ); ?> a', 
			itemSelector : '.list2-wrap-<?php echo esc_attr($loop_infinite_class); ?> .post-list-2-inner-content',

		});

		jQuerycontainer.infinitescroll('unbind');
		  jQuery("#load-infinite-post-list-2").click(function(){
				jQuerycontainer.infinitescroll('retrieve');
				 return false;

		});
	});
<?php } ?>
</script>