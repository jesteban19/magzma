<?php global $post;
$postList1 = get_the_ID(); ?>

<div class="post-list-1<?php if($use_infinite_scroll == 'use') { ?> list1-wrap-<?php echo esc_attr($loop_infinite_class); } ?> clearfix">
	
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

	?>

	<article class="post-item clearfix selector-padding post-list-post-selector wow <?php echo sanitize_text_field($horizontal_col_select); ?> wow <?php echo esc_attr($animation); ?> clearfix" data-wow-delay="<?php echo esc_attr( $anime_time ); ?>s" data-file="<?php the_permalink(); ?>" data-target="article">

		<?php if($use_shadow == 'use') { ?>
		<div class="use-shadow">
		<?php } ?>

		<div class="post-thumb">
			<?php if(has_post_thumbnail()) { 
				$img_url_blog = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
				if($horizontal_use == 'left') {
					$image_blogblog = aq_resize($img_url_blog[0],  $width, $height, true);
				}
				else {
					$image_blogblog = $img_url_blog[0];
				} ?>
			
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo esc_url( $image_blogblog ); ?>" alt="<?php the_title(); ?>"></a>
			<?php }  
			
			else {  ?>
				
			<?php } ?>

			<?php 
			if($use_icon_post_list_1 == 'on') {
			magzma_post_type();
			}

			if($use_view_post_list_1 == 'on' && has_post_thumbnail()) { ?>
			<div class="meta-love-and-view">
				<span class="post-view">
					<i class="icon-simple-line-icons-160"></i><span><?php if(function_exists('magzma_bac_PostViews')) { echo magzma_bac_PostViews(get_the_ID()); }?></span>
				</span>

				<?php echo magzma_love_it_link(); ?>
			</div>
			<?php } ?>
		</div>
			
		<div class="story-content">
			<?php if($use_view_post_list_1 == 'on' && !has_post_thumbnail()) { ?>
				<div class="meta-love-and-view no-thumb">
					<span class="post-view">
						<i class="icon-simple-line-icons-160"></i><span><?php if(function_exists('magzma_bac_PostViews')) { echo magzma_bac_PostViews(get_the_ID()); }?></span>
					</span>

					<?php echo magzma_love_it_link(); ?>
				</div>
			<?php } ?>
			<?php if($use_category_post_list_1 == 'on') { ?>
			<div class="standard-post-categories">
				<?php the_category(''); ?>
			</div>
			<?php }

			if($use_title_post_list_1 == 'on') { ?>
			<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<?php }

			if($use_meta_post_list_1 == 'on') { ?>
			<div class="post-meta clearfix">
				<span class="author">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<span class="author-name">
							<?php magzma_get_author_30(); ?>
							<span class="author-separator"><?php esc_html_e( 'by', 'magzma' ); ?></span><span class="vcard"> <?php echo get_the_author_meta( 'display_name' ); ?></span>
						</span>
					</a>
				</span>
				<span class="date">
					<a href="<?php the_permalink(); ?>">
						<span><?php echo get_the_date('F'); ?></span> <span><?php echo get_the_date('d'); ?></span><?php esc_html_e( ',', 'magzma' ); ?> <span><?php echo get_the_date('Y'); ?></span>
					</a>
				</span>
				<span class="time-read">
					<span class="eta"></span> <?php esc_html_e( ' read', 'magzma' ); ?>
				</span>
			</div>
			<?php }

			if($use_excerpt_post_list_1 == 'on') { ?>
			<div class="post-text">
				<p><?php echo magzma_excerpt($post_list_1_excerpt_word); ?></p>
			</div>
			<?php }

			if($use_read_more_post_list_1 == 'on') { ?>
				<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Continue Reading', 'magzma' ); ?></a>
			<?php } ?>
		</div>

		<?php if($use_shadow == 'use') { ?>
		</div>
		<?php } ?>
	</article> 

	<?php endwhile; endif;  ?>

</div>

<?php if($use_infinite_scroll == 'use') { ?>
<div class="infinite-wrap">
	<div id="load-more-post-list-1-<?php echo esc_attr( $loop_infinite_class ); ?>" class="infinite-button"><?php next_posts_link( '', $sec_hook->max_num_pages ); ?></div>
	<button id="load-infinite1"><?php esc_html_e( 'Load More', 'magzma' ); ?></button>
</div>

<script type="text/javascript">

	jQuery(window).load(function(){

		var jQuerycontainer = jQuery('.list1-wrap-<?php echo esc_attr($loop_infinite_class); ?>');

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
			navSelector  : '#load-more-post-list-1-<?php echo esc_attr( $loop_infinite_class ); ?>', 
			nextSelector : '#load-more-post-list-1-<?php echo esc_attr( $loop_infinite_class ); ?> a', 
			itemSelector : '.list1-wrap-<?php echo esc_attr($loop_infinite_class); ?> .post-item',

		});

		jQuerycontainer.infinitescroll('unbind');
		  jQuery("#load-infinite1").click(function(){
				jQuerycontainer.infinitescroll('retrieve');
				 return false;

		});
	});
</script><!-- Portfolio Script End -->
<?php } ?>
<?php wp_reset_postdata(); ?>