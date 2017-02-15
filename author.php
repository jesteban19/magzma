<?php magzma_header_choice();  ?>
<?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<!-- CONTENT START
============================================= -->
<section id="content" class="clearfix">

	<!-- BLOG START
	============================================= -->
	<div class="blog archives wrapper-space clearfix">
		<div class="container">
			<div class="author-box clearfix">
				<figure class="author-ava">
					<?php if ( class_exists( 'acf' ) ) {
					$author_id1 						= $curauth->ID;
					$magzma_select_your_profile_image 	= get_field('select_your_profile_image', 'user_'. $author_id1);
					$magzma_upload_profile_image 		= get_field('upload_profile_image', 'user_'. $author_id1);
						$magzma_author_img = aq_resize($magzma_upload_profile_image,  200 , 200, true);

						if( $magzma_select_your_profile_image == 'upload' ) { ?>
							<img src="<?php echo esc_url( $magzma_author_img ); ?>" alt="<?php esc_html_e( 'Author', 'magzma' ); ?>">
						<?php }
						else { ?>
							<?php echo get_avatar( $curauth->user_email, '200' ); ?>
						<?php } ?>
					<?php }
					else { ?>
							<?php echo get_avatar( $curauth->user_email, '200' ); ?>
					<?php } ?>
				</figure>

				<div class="author-desc">
					<h2><?php echo sanitize_text_field( $curauth->display_name ); ?></h2>
					<p><?php echo sanitize_text_field( $curauth->user_description ); ?></p>

					<div class="social-profile">
						<ul>
							<?php 

							$user_email 	= $curauth->user_email;
							$author_id 		= $curauth->ID;
							$facebook 		= get_field('facebook', 'user_'. $author_id);
							$twitter 		= get_field('twitter', 'user_'. $author_id); 
							$pinterest 		= get_field('pinterest', 'user_'. $author_id);  
							$instagram 		= get_field('instagram', 'user_'. $author_id); 
							$google_plus 	= get_field('google_plus', 'user_'. $author_id); 
							$linkedin 		= get_field('linkedin', 'user_'. $author_id); 

							?>

							<li><a href="mailto:<?php echo sanitize_text_field($user_email); ?>"><i class="icon-email"></i></a></li>

							<?php if(!empty($facebook)){ ?> 
							<li><a href="<?php echo esc_url($facebook); ?>"><i class="icon-social-facebook"></i></a></li>
							<?php } ?>

							<?php if(!empty($twitter)){ ?> 
							<li><a href="<?php echo esc_url($twitter); ?>"><i class="icon-social-twitter"></i></a></li>
							<?php } ?>

							<?php if(!empty($pinterest)){ ?> 
							<li><a href="<?php echo esc_url($pinterest); ?>"><i class="icon-social-pinterest"></i></a></li>
							<?php } ?>

							<?php if(!empty($instagram)){ ?> 
							<li><a href="<?php echo esc_url($instagram); ?>"><i class="icon-social-instagram"></i></a></li>
							<?php } ?>

							<?php if(!empty($google_plus)){ ?> 
							<li><a href="<?php echo esc_url($google_plus); ?>"><i class="icon-social-googleplus"></i></a></li>
							<?php } ?>

							<?php if(!empty($linkedin)){ ?> 
							<li><a href="<?php echo esc_url($linkedin); ?>"><i class="icon-social-linkedin"></i></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="row">

				<!-- BLOG LOOP START
				============================================= -->
				<div class="blog-section author-post column column-2of3">

					<h3 class="post-by"><?php esc_html_e( 'Stories by', 'magzma' ); ?> <?php echo sanitize_text_field( $curauth->display_name ); ?></h3>

					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); 

							get_template_part( 'inc/format/loop', get_post_format() );

						endwhile; ?>
						
					<?php else : ?>

					<p><?php esc_html_e('No posts by this author.', 'magzma'); ?></p>

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