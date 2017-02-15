<?php
// Set Panel ID
$panel_id = 'magzma_general_options';

// Set prefix
$prefix = 'magzma';


// Change panel for Colors
$site_bg_color        = $wp_customize->get_section( 'colors' );
$site_bg_color->panel = $panel_id;
$site_bg_color->title = esc_html__( 'Background Color', 'magzma' );
$site_bg_color->priority = 4;

// Change panel for Background Image
$site_bg_img        = $wp_customize->get_section( 'background_image' );
$site_bg_img->panel = $panel_id;
$site_bg_img->priority = 5;

// Change panel for Background Image
$wp_customize->get_section( 'header_image' )->panel = $panel_id;
$wp_customize->get_section( 'header_image' )->title = esc_html__( 'Blog Header Image', 'magzma' );

// Change panel for Static Front Page
$site_title        = $wp_customize->get_section( 'static_front_page' );
$site_title->panel = $panel_id;

// Change Logo section
$site_logo              = $wp_customize->get_control( 'custom_logo' );
$site_logo->description = esc_html__( 'The site logo is used as a graphical representation of your company name. Recommended size: 105 (width) x 75 (height) pixels(px).', 'magzma' );
$site_logo->label       = esc_html__( 'Site logo', 'magzma' );
$site_logo->section     = $prefix . '_general_logo_section';
$site_logo->priority    = 1;

// Change site icon section
$site_icon           = $wp_customize->get_control( 'site_icon' );
$site_icon->section  = $prefix . '_general_logo_section';
$site_icon->priority = 2;

// Change panel for Static Front Page
$bocah        = $wp_customize->get_section( 'title_tagline' );
$bocah->panel = $panel_id;
$bocah->priority    = 1;


/***********************************************/
/************** GENERAL OPTIONS  ***************/
/***********************************************/


$wp_customize->add_panel( $panel_id, array(
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => esc_html__( 'General Options', 'magzma' ),
	'description'    => esc_html__( 'You can change the site layout in this area as well as your contact details (the ones displayed in the header & footer) ', 'magzma' ),
) );

/***********************************************/
/*********** Logo section  ************/
/***********************************************/

$wp_customize->add_section( $prefix . '_general_logo_section', array(
	'title'    => esc_html__( 'Logo', 'magzma' ),
	'priority' => 2,
	'panel'    => $panel_id,
) );

/* Logo Top Gap */
$wp_customize->add_setting( 'magzma_logo_top', array(
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'magzma_sanitize_float',
	'priority'    => 2,
) );

$wp_customize->add_control('magzma_logo_top', array(
	'label'       => esc_html__( 'Logo Top Gap', 'magzma' ),
	'description' => esc_html__( 'Use this to option to create a top gap on your logo (px).', 'magzma' ),
	'section'	=>	'magzma_general_logo_section',
	'settings'	=>	'magzma_logo_top',
	'type'      => 'number',
) );

/* Logo Bottom Gap */
$wp_customize->add_setting( 'magzma_logo_bottom', array(
	'default'           => '',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'magzma_sanitize_float',
	'priority'    => 2,
) );

$wp_customize->add_control('magzma_logo_bottom', array(
	'label'       => esc_html__( 'Logo Bottom Gap', 'magzma' ),
	'description' => esc_html__( 'Use this to option to create a bottom gap on your logo (px).', 'magzma' ),
	'section'	=>	'magzma_general_logo_section',
	'settings'	=>	'magzma_logo_bottom',
	'type'      => 'number',
) );

/***********************************************/
/************** Page Container  ***************/
/***********************************************/
$wp_customize->add_section( 'magzma_container_section', array(
	'title'       => esc_html__( 'Container Section', 'magzma' ),
	'description' => esc_html__( 'Define your container size here.', 'magzma' ),
	'priority'    => 3,
	'panel'       => $panel_id,
) );

/* Header Container Size */
$wp_customize->add_setting( 'magzma_head_container_size', array(
	'default'           => '1170',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'magzma_sanitize_float',
	'priority'    => 2,
) );

$wp_customize->add_control('magzma_head_container_size', array(
	'label'       => esc_html__( 'Header Container', 'magzma' ),
	'description' => esc_html__( 'Use this to option to set your header container wrapper size (px).', 'magzma' ),
	'section'	=>	'magzma_container_section',
	'settings'	=>	'magzma_head_container_size',
	'type'      => 'number',
) );

/* Content Container Size */
$wp_customize->add_setting( 'magzma_content_container_size', array(
	'default'           => '1170',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'magzma_sanitize_float',
	'priority'    => 3,
) );

$wp_customize->add_control('magzma_content_container_size', array(
	'label'       => esc_html__( 'Content Container', 'magzma' ),
	'description' => esc_html__( 'Use this to option to set your content container wrapper size (px).', 'magzma' ),
	'section'	=>	'magzma_container_section',
	'settings'	=>	'magzma_content_container_size',
	'type'      => 'number',
) );

/* Footer Container Size */
$wp_customize->add_setting( 'magzma_foot_container_size', array(
	'default'           => '1170',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'magzma_sanitize_float',
	'priority'    => 4,
) );

$wp_customize->add_control('magzma_foot_container_size', array(
	'label'       => esc_html__( 'Footer Container', 'magzma' ),
	'description' => esc_html__( 'Use this to option to set your footer container wrapper size (px).', 'magzma' ),
	'section'	=>	'magzma_container_section',
	'settings'	=>	'magzma_foot_container_size',
	'type'      => 'number',
) );