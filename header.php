<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> > <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if ie]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<?php wp_head(); ?>

</head>

<body id="body" <?php body_class() ;?>>
<?php
$logo_id        = get_theme_mod( 'custom_logo' );
$logo_image     = wp_get_attachment_image_src( $logo_id, 'full' );
?>

	<!-- MAIN WRAPPER -->
	<div id="main-wrapper" class="header-style-1 clearfix">

	<?php magzma_top_menu_condition(); ?>

		<!-- Header
		============================================= -->
		<header id="header" class="sticky-style-2">

			<div class="container clearfix">

				<!-- Logo
				============================================= -->
				<div class="logo">
					<?php if ( ! empty( $logo_image ) ) { ?>
					<div class="logo-image">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $logo_image[0] ); ?>" alt="<?php esc_html_e( 'logo', 'magzma' ); ?>" />
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

				<!-- Banner Ads
				============================================ -->
				<?php magzma_header_banner(); ?>
				<!-- #banner end -->

			</div>

			<?php magzma_main_menu_condition(); ?>

		</header>
		<!-- HEADER END -->