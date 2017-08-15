<?php

/**
 * Function fixed error when call get_theme_mod, return NULL , it is fixed it error.
 * @param $options_social
 * @param $name
 * @param string $default
 * @return string
 */
function get_theme_mod_fix($options_social,$name, $default=''){
    if(!isset($options_social[$name]) || empty($options_social[$name]))
        return $default;
    else
        return $options_social[$name];
}
function magzma_social_profile() {
    // name "magzma_framework" in database for profile social
    $options_social = get_option('magzma_framework');

	$twitter	= get_theme_mod_fix( $options_social,'twitter_profile', esc_url( '#' ) );
	$facebook	= get_theme_mod_fix( $options_social,'facebook_profile', esc_url( '#' ) );
	$linkedin	= get_theme_mod_fix( $options_social,'linkedin_profile' );
	$google		= get_theme_mod_fix( $options_social,'google_profile', esc_url( '#' ) );
	$pinterest	= get_theme_mod_fix( $options_social,'pinterest_profile' );
	$dribble	= get_theme_mod_fix( $options_social,'dribble_profile' );
	$youtube	= get_theme_mod_fix( $options_social,'youtube_profile', esc_url( '#' ) );
	$codepen	= get_theme_mod_fix( $options_social,'codepen_profile' );
	$dropbox	= get_theme_mod_fix( $options_social,'dropbox_profile' );
	$github		= get_theme_mod_fix( $options_social,'github_profile' );
	$instagram	= get_theme_mod_fix( $options_social,'instagram_profile');
	$skype		= get_theme_mod_fix( $options_social,'skype_profile' );
	$steam		= get_theme_mod_fix( $options_social,'steam_profile' );
	$tumblr		= get_theme_mod_fix( $options_social,'tumblr_profile' );
	$vimeo		= get_theme_mod_fix( $options_social,'vimeo_profile' );
	$wordpress	= get_theme_mod_fix( $options_social,'wordpress_profile' );
	$yahoo		= get_theme_mod_fix( $options_social,'yahoo_profile' );

	if (!empty($twitter)) { ?>
		<li class="twitter soc-icon"><a target="_blank" href="<?php echo esc_url( $twitter ); ?>" title="<?php esc_html_e( 'Twitter', 'magzma' ); ?>" class="icon-social-twitter"></a></li>
	<?php 
	} 

	if (!empty($facebook)) { ?>
		<li class="facebook soc-icon"><a target="_blank" href="<?php echo esc_url( $facebook ); ?>" title="<?php esc_html_e( 'Facebook', 'magzma' ); ?>" class="icon-social-facebook"></a></li>
	<?php 
	} 

	if (!empty($linkedin)) { ?>
		<li class="linkedin soc-icon"><a target="_blank" href="<?php echo esc_url( $linkedin ); ?>" title="<?php esc_html_e( 'Linkedin', 'magzma' ); ?>" class="icon-social-linkedin"></a></li>
	<?php 
	} 

	if (!empty($google)) { ?>
		<li class="google soc-icon"><a target="_blank" href="<?php echo esc_url( $google ); ?>" title="<?php esc_html_e( 'Google', 'magzma' ); ?>" class="icon-social-googleplus"></a></li>
	<?php 
	} 

	if (!empty($pinterest)) { ?>
		<li class="pinterest soc-icon"><a target="_blank" href="<?php echo esc_url( $pinterest ); ?>" title="<?php esc_html_e( 'Pinterest', 'magzma' ); ?>" class="icon-social-pinterest"></a></li>
	<?php 
	} 

	if (!empty($dribble)) { ?>
		<li class="dribble soc-icon"><a target="_blank" href="<?php echo esc_url( $dribble ); ?>" title="<?php esc_html_e( 'Dribbble', 'magzma' ); ?>" class="icon-social-dribbble"></a></li>
	<?php 
	}

	if (!empty($youtube)) { ?>
		<li class="youtube soc-icon"><a target="_blank" href="<?php echo esc_url( $youtube ); ?>" title="<?php esc_html_e( 'Youtube', 'magzma' ); ?>" class="icon-social-youtube"></a></li>
	<?php 
	}

	if (!empty($codepen)) { ?>
		<li class="codepen soc-icon"><a target="_blank" href="<?php echo esc_url( $codepen ); ?>" title="<?php esc_html_e( 'Codepen', 'magzma' ); ?>" class="icon-social-codepen"></a></li>
	<?php 
	}

	if (!empty($dropbox)) { ?>
		<li class="dropbox soc-icon"><a target="_blank" href="<?php echo esc_url( $dropbox ); ?>" title="<?php esc_html_e( 'Dropbox', 'magzma' ); ?>" class="icon-social-dropbox"></a></li>
	<?php 
	}

	if (!empty($github)) { ?>
		<li class="github soc-icon"><a target="_blank" href="<?php echo esc_url( $github ); ?>" title="<?php esc_html_e( 'Github', 'magzma' ); ?>" class="icon-social-github"></a></li>
	<?php 
	}

	if (!empty($instagram)) { ?>
		<li class="instagram soc-icon"><a target="_blank" href="<?php echo esc_url( $instagram ); ?>" title="<?php esc_html_e( 'Instagram', 'magzma' ); ?>" class="icon-social-instagram"></a></li>
	<?php 
	}

	if (!empty($skype)) { ?>
		<li class="skype soc-icon"><a target="_blank" href="<?php echo esc_url( $skype ); ?>" title="<?php esc_html_e( 'Skype', 'magzma' ); ?>" class="icon-social-skype"></a></li>
	<?php 
	}

	if (!empty($steam)) { ?>
		<li class="steam soc-icon"><a target="_blank" href="<?php echo esc_url( $steam ); ?>" title="<?php esc_html_e( 'Steam', 'magzma' ); ?>" class="icon-steam"></a></li>
	<?php 
	}

	if (!empty($tumblr)) { ?>
		<li class="tumblr soc-icon"><a target="_blank" href="<?php echo esc_url( $tumblr ); ?>" title="<?php esc_html_e( 'Tumblr', 'magzma' ); ?>" class="icon-social-tumblr"></a></li>
	<?php 
	}

	if (!empty($vimeo)) { ?>
		<li class="vimeo soc-icon"><a target="_blank" href="<?php echo esc_url( $vimeo ); ?>" title="<?php esc_html_e( 'Vimeo', 'magzma' ); ?>" class="icon-social-vimeo"></a></li>
	<?php 
	}

	if (!empty($wordpress)) { ?>
		<li class="wordpress soc-icon"><a target="_blank" href="<?php echo esc_url( $wordpress ); ?>" title="<?php esc_html_e( 'WordPress', 'magzma' ); ?>" class="icon-social-wordpress"></a></li>
	<?php 
	}

	if (!empty($yahoo)) { ?>
		<li class="yahoo soc-icon"><a target="_blank" href="<?php echo esc_url( $yahoo ); ?>" title="<?php esc_html_e( 'Yahoo', 'magzma' ); ?>" class="icon-social-yahoo"></a></li>
	<?php 
	}
}


function magzma_social_share() { 
global $post;
	?>
	<div class="social-share-wrapper">
		<div class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="product_share_facebook" onclick="javascript:window.open(this.href,
							'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"><i class="icon-social-facebook"></i></a></div>
		<div class="twitter"><a href="https://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo urlencode(get_the_title()); ?>" onclick="javascript:window.open(this.href,
							'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" class="product_share_twitter"><i class="icon-social-twitter"></i></a></div> 



			<div class="google"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="icon-social-google"></i></a></div>

			<div class="pinterest"><a href="http://pinterest.com/pin/create/button/?url={URI-encoded URL of the page to pin}&media={URI-encoded URL of the image to pin}&description={optional URI-encoded description}" class="pin-it-button" count-layout="horizontal">
			<i class="icon-social-pinterest"></i></a></div>



</div><!-- Social Share Wrapper -->
<?php
}



//EXCERPT

function magzma_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}
 
function magzma_content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	} 
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content); 
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}


function magzma_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'magzma_custom_excerpt_length', 999 );

function magzma_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'magzma_new_excerpt_more');

/*=============== post format ================*/


			
			
		

function magzma_post_type() { ?>
	<div class="category-icon">
	<?php if ( has_post_format('gallery') ) {
		echo '<span class="category-icon-gallery"><i class="icon-themify-35"></i></span>';
	}

	if ( has_post_format('video') ) {
		echo '<span class="category-icon-video"><i class="icon-themify-231"></i></span>';
	}

	if ( !get_post_format() && !is_sticky() ) {
		echo '';
	}

	if ( is_sticky()) {
		echo '<i class="fa fa-sticky-note"></i>';
	} ?>
	</div>
<?php }

/*MENU TOP OPTION*/
function magzma_header_banner() {
if(class_exists('Redux')) {

$options = get_option('magzma_framework');
$magzma_head_ads_type = $options['head_ads_type'];
	
	if($magzma_head_ads_type == 'head_ads_img') {
		$magzma_ads_img = '';
		if (isset($options['head_ads_image'])) {
		$magzma_ads_img = $options['head_ads_image'];
		$magzma_ads = $magzma_ads_img['url'];
		//$magzma_ads_res = aq_resize($magzma_ads,  728 , 90, true);

		$magzma_head_ads_link = $options['head_ads_link']; ?>
			
			<?php if(!empty($magzma_ads)){ ?>
			<div class="banner-ads">
				<a href="<?php echo esc_url($magzma_head_ads_link ); ?>">
					<img src="<?php echo esc_url( $magzma_ads_img['url'] ); ?>" alt="<?php esc_html_e( 'Banner Top', 'magzma' ); ?>" />
				</a>
			</div>
			<?php }
		}
	}
	elseif($magzma_head_ads_type == 'head_ads_js') {
	$magzma_head_ads_javascript = $options['head_ads_javascript'];
	?>
		<?php echo balancetags( $magzma_head_ads_javascript ); ?>
		
	<?php }

}

}

function magzma_top_content_banner() {
if(class_exists('Redux')) {

$options = get_option('magzma_framework');
$magzma_topcont_ads_type = $options['topcont_ads_type'];

	if($magzma_topcont_ads_type == 'topcont_ads_img') {
		$magzma_conttop_ads_img = '';
		if (isset($options['topcont_ads_image'])) {
		$magzma_conttop_ads_img = $options['topcont_ads_image'];
		$magzma_ads_conttop = $magzma_conttop_ads_img['url'];
		$magzma_ads_conttop_res = aq_resize($magzma_ads_conttop,  720 , 300, true);

		$magzma_topcont_ads_link = $options['topcont_ads_link']; ?>
			
			<?php if(!empty($magzma_ads_conttop)){ ?>
			<div class="ads-content-top wow fadeIn clearfix">
				<a href="<?php echo esc_url($magzma_topcont_ads_link ); ?>">
					<img src="<?php echo esc_url( $magzma_ads_conttop_res ); ?>" alt="<?php esc_html_e( 'Banner Top Content', 'magzma' ); ?>" />
				</a>
			</div>
			<?php }
		}
	}
	elseif($magzma_topcont_ads_type == 'topcont_ads_js') {
	$magzma_topcont_ads_javascript = $options['topcont_ads_javascript'];
	?>
		
		<?php echo balancetags( $magzma_topcont_ads_javascript ); ?>

	<?php }

}

}


function magzma_bottom_content_banner() {
if(class_exists('Redux')) {

$options = get_option('magzma_framework');
$magzma_botcont_ads_type = $options['botcont_ads_type'];
	
	if($magzma_botcont_ads_type == 'botcont_ads_img') {
		$magzma_contbot_ads_img = '';
		if (isset($options['botcont_ads_image'])) {
		$magzma_contbot_ads_img = $options['botcont_ads_image'];
		$magzma_ads_contbot = $magzma_contbot_ads_img['url']; 
		$magzma_ads_contbot_res = aq_resize($magzma_ads_contbot,  720 , 300, true);

		$magzma_botcont_ads_link = $options['botcont_ads_link']; ?>
			
			<?php if(!empty($magzma_ads_contbot)){ ?>
			<div class="ads-content-bottom wow fadeIn clearfix">
				<a href="<?php echo esc_url($magzma_botcont_ads_link ); ?>">
					<img src="<?php echo esc_url( $magzma_ads_contbot_res ); ?>" alt="<?php esc_html_e( 'Banner Bottom Content', 'magzma' ); ?>" />
				</a>
			</div>
			<?php }
		}
	}
	elseif($magzma_botcont_ads_type == 'botcont_ads_js') {
	$magzma_botcont_ads_javascript = $options['botcont_ads_javascript'];
	?>
			
		<?php echo balancetags( $magzma_botcont_ads_javascript ); ?>
		
	<?php }

}

}

/*function magzma_love_it_link() {



global $user_ID, $post;

$love_count = magzma_li_get_love_count($post->ID);


?>

<span class="love-it-wrapper">
	<a href="#" class="love-it" data-post-id="<?php echo get_the_ID(); ?>" data-user-id="<?php echo esc_attr( $user_ID ); ?>"></a><span class="love-count"><?php echo sanitize_text_field( $love_count ); ?></span>
</span>


<?php 
}*/

/*=========*   HEADER TYPE   *=========*/

function magzma_header_choice() {

if ( class_exists( 'Redux' ) ) {
	$options = get_option('magzma_framework');
	$magzma_header_type = $options['header_type'];

	if( $magzma_header_type == 'default' ) {
		get_header();
	}
	elseif( $magzma_header_type == 'style-2' ) {
		get_header('style2');
	}
	elseif( $magzma_header_type == 'style-3' ) {
		get_header('style3');
	}
}
else {
	get_header();
}

}

/*=========*   FOOTER TYPE   *=========*/
function magzma_footer_choice() {

if ( class_exists( 'Redux' ) ) {
	$options = get_option('magzma_framework');
	$magzma_footer_type = $options['footer_type'];

	if( $magzma_footer_type == 'default' ) {

		get_footer();
	}
	elseif( $magzma_footer_type == 'style-2' ) {

		get_footer('style2');
	}
	/*elseif( $magzma_footer_type == 'style-3' ) {

		get_footer('style3');
	}*/
}
else {
	get_footer();
}

}

/*=========*   WRAPPER CLASS   *=========*/
function magzma_wrap_space() {
if ( class_exists( 'acf' ) ) {

	$magzma_wrapper_space 	= get_field('use_wrapper_space');

	if( $magzma_wrapper_space == false ) {
		echo '-space ';
	}
	else {
		echo '';
	}
}
else {
	echo '-space ';
}
}

/*=========*   HEADER TOP CONDITIONAL   *=========*/
function magzma_top_menu_condition() {

if ( class_exists( 'Redux' ) ) {
$options = get_option('magzma_framework');
$magzma_menu_select = $options['menu_select'];
$magzma_menu_top = $magzma_menu_select['use-top'];

	if( $magzma_menu_top == 1 ) { ?>

		<!-- Top Bar
		============================================= -->
		<div class="top-bar clearfix">
			<div class="container clearfix">
			
				<!-- Top Menu
				============================================= -->
				<div class="top-menu">
					<?php magzma_top_nav_menu(); ?>
				</div>
				<!-- .top-menu end -->

				<!-- Top Social
				============================================= -->
				<div id="top-social">
					<ul>
						<?php magzma_social_profile(); ?> 
					</ul>

					<div class="search-form">
						<?php get_search_form(); ?>
					</div>
				</div><!-- #top-social end -->
			</div>
		</div><!-- #top-bar end -->

	<?php }
	else {
		echo '';
	}
}
else { ?>
	<!-- Top Bar
	============================================= -->
	<div class="top-bar clearfix">
		<div class="container clearfix">
		
			<!-- Top Menu
			============================================= -->
			<div class="top-menu">
				<?php magzma_top_nav_menu(); ?>
			</div>
			<!-- .top-menu end -->

			<!-- Top Social
			============================================= -->
			<div id="top-social">
				<ul>
					<?php magzma_social_profile(); ?> 
				</ul>

				<div class="search-form">
					<?php get_search_form(); ?>
				</div>
			</div><!-- #top-social end -->
		</div>
	</div><!-- #top-bar end -->
<?php }
}

/*=========*   HEADER MENUS CONDITIONAL   *=========*/
function magzma_main_menu_condition() {

if ( class_exists( 'Redux' ) ) {
$options = get_option('magzma_framework');
$magzma_menu_select = $options['menu_select'];
$magzma_menu_main = $magzma_menu_select['use-main'];

if( $magzma_menu_main == 1 ) { ?>

	<div class="header-wrap">
		<div class="mobile-menu">
			<span class="text"><?php esc_html_e( 'Navigate', 'magzma' ); ?></span>
			<i class="mobile-menu-button icon-themify-101"></i>
		</div> 
		
		<div class="container clearfix">
			<!-- Primary Navigation
			============================================= -->
			<nav id="primary-menu" class="menu main-menu">
				<?php magzma_main_nav_menu(); ?>
			</nav>
			<!-- #primary-menu end -->
		</div> 
	</div>

<?php }
else {
	echo '';
}
}
else { ?>
<div class="header-wrap">
	<div class="mobile-menu">
		<span class="text"><?php esc_html_e( 'Navigate', 'magzma' ); ?></span>
		<i class="mobile-menu-button icon-themify-101"></i>
	</div> 
	
	<div class="container clearfix">
		<!-- Primary Navigation
		============================================= -->
		<nav id="primary-menu" class="menu main-menu">
			<?php magzma_main_nav_menu(); ?>
		</nav>
		<!-- #primary-menu end -->
	</div> 
</div>
<?php }
}

function magzma_logo_dark() {
	$logo_id        = get_theme_mod( 'custom_logo' );
	$logo_image     = wp_get_attachment_image_src( $logo_id, 'full' );
	$logo2_id        = get_theme_mod( 'magzma_second_logo' );
	$logo2_image     = wp_get_attachment_image_src( $logo2_id, 'full' );

	$header_4_select  = get_field('header_4_select'); ?>

	<div class="logo">
        <?php if ( !empty( $logo_image ) && $header_4_select == 'dark' ) { ?>
        <div class="logo-image">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $logo_image[0] ); ?>" alt="<?php esc_html_e( 'logo', 'magzma' ); ?>" />
            </a>
        </div>
        <?php }
        elseif ( !empty($logo2_image) && !($header_4_select) ) { ?>
        <div class="logo-image">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $logo2_image[0] ); ?>" alt="<?php esc_html_e( 'logo', 'magzma' ); ?>" />
            </a>
        </div>
        <?php }
        else { ?>
        <div class="logo-title">
            <h2 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="header-logo"><?php echo esc_attr( get_bloginfo( 'name' ) ); ?></a>
            </h2>
        </div>
        <?php } ?>
    </div><!-- #logo end -->
<?php }

/* ======== magzma get avatar ======= */
function magzma_get_author_50() {
if ( class_exists( 'acf' ) ) {
$author_id 							= get_the_author_meta('ID');
$magzma_select_your_profile_image 	= get_field('select_your_profile_image', 'user_'. $author_id);
$magzma_upload_profile_image 		= get_field('upload_profile_image', 'user_'. $author_id);
	$magzma_author_img = aq_resize($magzma_upload_profile_image,  50 , 50, true);

	if( $magzma_select_your_profile_image == 'upload' ) { ?>
		<img src="<?php echo esc_url( $magzma_author_img ); ?>" alt="<?php esc_html_e( 'Author', 'magzma' ); ?>">
	<?php }
	else { ?>
		<?php echo get_avatar( get_the_author_meta('ID'), '50' ); ?>
	<?php } ?>
<?php }
else { ?>
		<?php echo get_avatar( get_the_author_meta('ID'), '50' ); ?>
<?php }
}

function magzma_get_author_30() {
if ( class_exists( 'acf' ) ) {
$author_id 							= get_the_author_meta('ID');
$magzma_select_your_profile_image 	= get_field('select_your_profile_image', 'user_'. $author_id);
$magzma_upload_profile_image 		= get_field('upload_profile_image', 'user_'. $author_id);
	$magzma_author_img = aq_resize($magzma_upload_profile_image,  30 , 30, true);

	if( $magzma_select_your_profile_image == 'upload' ) { ?>
		<img src="<?php echo esc_url( $magzma_author_img ); ?>" alt="<?php esc_html_e( 'Author', 'magzma' ); ?>">
	<?php }
	else { ?>
		<?php echo get_avatar( get_the_author_meta('ID'), '30' ); ?>
	<?php } ?>
<?php }
else { ?>
		<?php echo get_avatar( get_the_author_meta('ID'), '30' ); ?>
<?php }
}