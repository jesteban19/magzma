<?php
/**
 * Getting started template
 */

$customizer_url = wp_customize_url() ;
?>

<div id="getting_started" class="magzma-tab-pane active">

<div class="content-info-about">

	<div class="intro-head">
		<h1 class="magzma-welcome-title"><?php _e('Welcome to Magzma!', 'magzma'); ?> <?php if( !empty($magzma_lite_lite['Version']) ): ?> <sup id="magzma-theme-version"><?php echo esc_attr( $magzma_lite_lite['Version'] ); ?> </sup><?php endif; ?></h1>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using magzma and that is why we gathered here all the necessary information for you. We hope you will enjoy using magzma, as much as we enjoy creating great products.', 'magzma' ); ?>
	</div>

	<div class="magzma-tab-pane-center column column-3">
		<div class="inner-info">
			<h1><?php esc_html_e( 'Getting started', 'magzma' ); ?></h1>

			<h4><?php esc_html_e( 'Customize everything in a single place.' ,'magzma' ); ?></h4>
			<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'magzma' ); ?></p>
			<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'magzma' ); ?></a></p>
		</div>
	</div>

	<div class="magzma-tab-pane-center column column-3">
		<div class="inner-info">
			<h1><?php esc_html_e( 'Need more features?', 'magzma' ); ?></h1>

			<h4><?php esc_html_e( 'Check our premium version for this theme.' ,'magzma' ); ?></h4>
			<p><?php esc_html_e( 'Check out the Premium version of this theme which comes with additional features and advanced customization.', 'magzma' ); ?></p>
			<p><a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'ThemeURI' ); ?>" class="button button-primary"><?php esc_html_e( 'Learn Premium Version', 'magzma' ); ?></a></p>
		</div>
	</div>

	<div class="magzma-tab-pane-center column column-3">
		<div class="inner-info">
			<h1><?php esc_html_e( 'Documentation', 'magzma' ); ?></h1>

			<h4><?php esc_html_e( 'How to install this theme with a minutes.' ,'magzma' ); ?></h4>
			<p><?php esc_html_e( 'Please read our online documentation page to setup this theme. Install from clean WordPress within a minutes.', 'magzma' ); ?></p>
			<p><a href="<?php echo $my_theme->get( 'ThemeURI' ); ?>/support/" class="button button-primary"><?php esc_html_e( 'Read Documentation', 'magzma' ); ?></a></p>
		</div>
	</div>
</div>
</div>
