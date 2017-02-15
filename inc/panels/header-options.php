<?php
// Set Panel ID
$panel_id = 'magzma_header_options';

// Set prefix
$prefix = 'magzma';

/***********************************************/
/**************  HEADER OPTIONS  ***************/
/***********************************************/


$wp_customize->add_panel( $panel_id, array(
	'priority'       => 1,
	'capability'     => 'edit_theme_options',
	'theme_supports' => '',
	'title'          => esc_html__( 'Header Options', 'magzma' ),
	'description'    => esc_html__( 'You can change the site layout in this area details (the ones displayed in the header) ', 'magzma' ),
) );

/***********************************************/
/*********** Social Profile section  ***********/
/***********************************************/

$wp_customize->add_section( $prefix . '_social_section', array(
	'title'    => esc_html__( 'Social Section', 'magzma' ),
	'priority' => 2,
	'panel'    => $panel_id,
) );

/* Twitter URL */
$wp_customize->add_setting( $prefix . '_twitter_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'default'            =>  esc_url_raw('#'),
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_twitter_link', array(
	'label'          => esc_html__( 'Twitter URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_twitter_link',
	'priority'       => 1,
) );

/* facebook URL */
$wp_customize->add_setting( $prefix . '_facebook_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'default'            =>  esc_url_raw('#'),
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_facebook_link', array(
	'label'          => esc_html__( 'Facebook URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_facebook_link',
	'priority'       => 2,
) );

/* linkedin URL */
$wp_customize->add_setting( $prefix . '_linkedin_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_linkedin_link', array(
	'label'          => esc_html__( 'Linkedin URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_linkedin_link',
	'priority'       => 3,
) );

/* google URL */
$wp_customize->add_setting( $prefix . '_google_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'default'            =>  esc_url_raw('#'),
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_google_link', array(
	'label'          => esc_html__( 'Google+ URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_google_link',
	'priority'       => 4,
) );

/* pinterest URL */
$wp_customize->add_setting( $prefix . '_pinterest_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_pinterest_link', array(
	'label'          => esc_html__( 'Pinterest URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_pinterest_link',
	'priority'       => 5,
) );

/* dribble URL */
$wp_customize->add_setting( $prefix . '_dribble_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_dribble_link', array(
	'label'          => esc_html__( 'Dribbble URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_dribble_link',
	'priority'       => 6,
) );

/* youtube URL */
$wp_customize->add_setting( $prefix . '_youtube_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'default'            =>  esc_url_raw('#'),
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_youtube_link', array(
	'label'          => esc_html__( 'Youtube URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_youtube_link',
	'priority'       => 9,
) );

/* codepen URL */
$wp_customize->add_setting( $prefix . '_codepen_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_codepen_link', array(
	'label'          => esc_html__( 'Codepen URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_codepen_link',
	'priority'       => 11,
) );

/* dropbox URL */
$wp_customize->add_setting( $prefix . '_dropbox_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_dropbox_link', array(
	'label'          => esc_html__( 'Dropbox URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_dropbox_link',
	'priority'       => 14,
) );

/* github URL */
$wp_customize->add_setting( $prefix . '_github_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_github_link', array(
	'label'          => esc_html__( 'Github URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_github_link',
	'priority'       => 15,
) );

/* instagram URL */
$wp_customize->add_setting( $prefix . '_instagram_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'default'            =>  esc_url_raw('#'),
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_instagram_link', array(
	'label'          => esc_html__( 'Instagram URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_instagram_link',
	'priority'       => 16,
) );

/* skype URL */
$wp_customize->add_setting( $prefix . '_skype_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_skype_link', array(
	'label'          => esc_html__( 'Skype URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_skype_link',
	'priority'       => 17,
) );

/* steam URL */
$wp_customize->add_setting( $prefix . '_steam_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_steam_link', array(
	'label'          => esc_html__( 'Steam URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_steam_link',
	'priority'       => 19,
) );

/* tumblr URL */
$wp_customize->add_setting( $prefix . '_tumblr_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_tumblr_link', array(
	'label'          => esc_html__( 'Tumblr URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_tumblr_link',
	'priority'       => 21,
) );

/* vimeo URL */
$wp_customize->add_setting( $prefix . '_vimeo_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_vimeo_link', array(
	'label'          => esc_html__( 'Vimeo URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_vimeo_link',
	'priority'       => 22,
) );

/* wordpress URL */
$wp_customize->add_setting( $prefix . '_wordpress_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_wordpress_link', array(
	'label'          => esc_html__( 'WordPress URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_wordpress_link',
	'priority'       => 25,
) );

/* yahoo URL */
$wp_customize->add_setting( $prefix . '_yahoo_link',  array(
	'sanitize_callback'  => 'esc_url_raw',
	'transport'          => 'postMessage'
) );

$wp_customize->add_control( $prefix . '_yahoo_link', array(
	'label'          => esc_html__( 'Yahoo URL', 'magzma' ),
	'section'        => $prefix.'_social_section',
	'settings'       => $prefix . '_yahoo_link',
	'priority'       => 27,
) );