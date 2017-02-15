<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item hentry clearfix'); ?>>

	<div class="share-section">
		<?php magzma_social_share(); ?>
	</div>

	<div class="post-content-wrap">
		<div class="post-content">
			<!-- ads start -->
			<?php magzma_top_content_banner(); ?>
			<!-- ads end -->

			<?php if ( has_post_thumbnail()) { ?>
				<div class="post-thumb">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>

					<div class="single-post-style-2-inner-content">
						<div class="standard-post-categories">
							<?php the_category(''); ?>
						</div>

						<h1 class="post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</div>
				</div><!-- thumbnail-->
			<?php }
			else { ?> 
				<div class="single-post-style-2-inner-content no-thumb">
					<div class="standard-post-categories">
						<?php the_category(''); ?>
					</div>

					<h1 class="post-title entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				</div>
			<?php } ?>
			
			<div class="post-meta metadata clearfix">
				<span class="author">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<span class="author-name">
							<?php magzma_get_author_50(); ?>
							<span class="author-separator"><?php esc_html_e( 'by', 'magzma' ); ?></span><span class="vcard"> <?php echo get_the_author_meta( 'display_name' ); ?></span>
						</span>
					</a>
					<p class="date">
						<time class="entry-date" datetime="<?php the_modified_date('Y-m-j'); ?>">
							<?php the_time( get_option( 'date_format' ) ); ?>
						</time>
						<span class="eta"></span> <?php esc_html_e( 'read', 'magzma' ); ?>
					</p>
				</span>
				<span class="right-section">
					<div class="meta post-view">
						<i class="icon-simple-line-icons-160"></i><span><?php if(function_exists('magzma_bac_PostViews')) { echo magzma_bac_PostViews(get_the_ID()); }?></span>
					</div>

					<div class="meta meta-comments">
						<a href="<?php comments_link(); ?>" class="comments"><i class="icon-simple-line-icons-84"></i><span><?php comments_number( '0', '1', '%' ); ?></span></a>
					</div>
					
					<div class="meta love">
						<?php echo magzma_love_it_link(); ?>
					</div>
				</span>
			</div>

			<?php
		        $images = get_field('magzma_gallery');
		        if( $images){ ?>

		        <div class="slider-wrapper">
		            <div class="standard-swiper-slider swiper-container">
		                <div class="swiper-wrapper">
		                    <?php foreach( $images as $image ): ?>
		                    <div class="swiper-slide">
		                        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />  
		                    </div>
		                    <?php endforeach; ?>
		                </div>

		                <div class="slider-pagination">
							<i class='running-news-prev icon-ios-arrow-left'></i>
							<i class='running-news-next icon-ios-arrow-right'></i>
						</div>
		            </div>
		        </div>
		    <?php } ?>

			<div class="post-text entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
				<div class="meta-bottom">
					<div class="tag-wrapper"><?php the_tags('','',''); ?></div>
				</div>
			</div>
		</div>
	</div>

	<!-- ads start -->
	<?php magzma_bottom_content_banner(); ?>
	<!-- ads end -->

	<!-- pagination start -->
	<div class="next-prev-post clearfix">
		<?php $next_post = get_next_post();
		$previous_post = get_previous_post(); ?>
		
		<?php if ( get_previous_post() ) : ?>
		<div class="prev-post column column-2">
			<p><i class="icon-android-arrow-back"></i><?php esc_html_e( 'Previous Post', 'magzma' ); ?></p>
			<h4 class="title">
				<a href="<?php echo get_permalink( $previous_post->ID ); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
			</h4>
		</div>
		<?php endif; ?>
		
		<?php if ( get_next_post() ) : ?>
		<div class="next-post column column-2">
			<p><?php esc_html_e( 'Next Post', 'magzma' ); ?><i class="icon-android-arrow-forward"></i></p>
			<h4 class="title">
				<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
			</h4>
		</div>
		<?php endif; ?>
	</div>
	<!-- pagination end -->

	<!-- Author Info -->
	<?php $author_desc = get_the_author_meta('description'); 
	if(!empty($author_desc)) { ?>
	<div class="post-author clearfix">
		<div class="author-wrap clearfix">
			<?php if ( class_exists( 'acf' ) ) {
			$author_id 							= get_the_author_meta('ID');
			$magzma_select_your_profile_image 	= get_field('select_your_profile_image', 'user_'. $author_id);
			$magzma_upload_profile_image 		= get_field('upload_profile_image', 'user_'. $author_id);
				$magzma_author_img = aq_resize($magzma_upload_profile_image,  100 , 100, true);

				if( $magzma_select_your_profile_image == 'upload' ) { ?>
				<figure class="author-ava">
					<img src="<?php echo esc_url( $magzma_author_img ); ?>" alt="<?php esc_html_e( 'Author', 'magzma' ); ?>">
				</figure>
				<?php }
				else { ?>
				<figure class="author-ava">
					<?php echo get_avatar( get_the_author_meta('ID'), '100' ); ?>
				</figure>
				<?php } ?>
			<?php }
			else { ?>
				<figure class="author-ava">
					<?php echo get_avatar( get_the_author_meta('ID'), '100' ); ?>
				</figure>
			<?php } ?>

			<div class="author-desc">
				<div class="author-name">
					<span><?php esc_html_e( 'Written by', 'magzma' ); ?></span> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?>" rel="author"><?php echo get_the_author_meta( 'display_name' ); ?></a>
				</div>
				<p><?php the_author_meta('description'); ?></p>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- end of author -->

	<?php get_template_part( 'inc/part/related', 'post' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->

<?php 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
	if ( comments_open() || '0' != get_comments_number() ) comments_template(); 
?>