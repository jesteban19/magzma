<?php 

	/*
	*
	*
	*	magzma_customize_register()
	*	magzma_customize_preview()
	*
	*/
	
	if (!function_exists('magzma_customize_register')) {
		function magzma_customize_register($wp_customize) {
		
			$wp_customize->get_setting('blogname')->transport='postMessage';
			$wp_customize->get_setting('blogdescription')->transport='postMessage';
			$wp_customize->get_setting('header_textcolor')->transport='postMessage';

			$wp_customize->get_control( 'custom_logo' )->section = 'magzma_general_options';

			// General Controls
			require_once get_template_directory() . '/inc/panels/general-options.php';

			// Header Controls
			require_once get_template_directory() . '/inc/panels/header-options.php';

			// Color Controls
			require_once get_template_directory() . '/inc/panels/color-options.php';

			// Header Controls
			//require_once get_template_directory() . '/inc/panels/font-options.php';			

		}
		add_action( 'customize_register', 'magzma_customize_register' );

	}

	require_once get_template_directory() . '/inc/panels/color-output.php';
	
/**
 *  Sanitize HTML
 */
if ( ! function_exists( 'magzma_sanitize_html' ) ) {
	function magzma_sanitize_html( $input ) {
		$input = force_balance_tags( $input );

		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'img'    => array(
				'alt'    => array(),
				'src'    => array(),
				'srcset' => array(),
				'title'  => array(),
			),
			'strong' => array(),
		);
		$output       = wp_kses( $input, $allowed_html );

		return $output;
	}
}

if ( ! function_exists( 'magzma_sanitize_select' ) ) {
	function magzma_sanitize_select( $input ) {
		if ( is_numeric( $input ) ) {
			return intval( $input );
		}
	}
}

if ( ! function_exists( 'magzma_sanitize_float' ) ) {
	function magzma_sanitize_float( $input ) {
	    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}
}

function magzma_customizer_mod_output() {	

/* logo gap */
$magzma_logo_top		= get_theme_mod( 'magzma_logo_top', '' );
$magzma_logo_bottom	= get_theme_mod( 'magzma_logo_bottom', '' );

/* container */
$magzma_head_container_size	= get_theme_mod( 'magzma_head_container_size', '1170' );
$magzma_content_container_size	= get_theme_mod( 'magzma_content_container_size', '1170' );
$magzma_foot_container_size	= get_theme_mod( 'magzma_foot_container_size', '1170' );

echo '<style type="text/css">';
	
	/*logo gap*/
	if(!empty($magzma_logo_top)) {
	echo '#header .logo-image, #header .logo-title{padding-top:'.$magzma_logo_top.'px}' ;
	}
	else {
		echo '#header .logo-image, #header .logo-title{padding-top: 35px}' ;
	}
	echo '#header .logo-image, #header .logo-title{padding-bottom:'.$magzma_logo_bottom.'px}' ;

	/* container */
	echo '.top-bar .container, #header .container{width:'.$magzma_head_container_size.'px}' ;
	echo '#content-wrapper .container{width:'.$magzma_content_container_size.'px}' ;
	echo '#footer .container{width:'.$magzma_foot_container_size.'px}' ;

echo '</style> ';

}

add_action( 'wp_head', 'magzma_customizer_mod_output');