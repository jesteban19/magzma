<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-item'); ?>>

	<?php if ( has_post_thumbnail()) { ?>
		<div class="post-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div><!-- thumbnail-->
	<?php } ?> 

	<div class="post-content-wrap">
		<div class="post-content">
			<div class="standard-post-categories">
				<?php the_category(''); ?>
			</div>

			<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
			<div class="post-meta">
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
						<span><?php esc_html_e( 'Post On', 'magzma' ); ?></span> <span><?php echo get_the_date('F'); ?></span> <span><?php echo get_the_date('d'); ?></span><?php esc_html_e( ',', 'magzma' ); ?> <span><?php echo get_the_date('Y'); ?></span>
					</a>
				</span>
				<span class="comments">
					<a href="<?php the_permalink(); ?>" class="comments"><span><?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e( 'Comments', 'magzma' ); ?></span></a>
				</span>
			</div>

			<div class="post-text">
				<?php the_excerpt(); ?>
			</div>

			<a href="<?php the_permalink(); ?>" class="read-more"><?php esc_html_e( 'Continue Reading', 'magzma' ); ?></a>
		</div>
	</div>
</article>