<?php

	/*=====================================================================================================*/
	// Set Panel ID
	/*=====================================================================================================*/
	$panel_id_1 = 'magzma_header_section';

	$wp_customize->add_panel( $panel_id_1,
	    array(
	        'priority'          => 199,
	        'capability'        => 'edit_theme_options',
	        'theme_supports'    => '',
	        'title'             => esc_html__( 'Header Section Color', 'magzma' ),
	        'description'       => esc_html__( 'Edit your header color here.', 'magzma' ),
	    )
	);

	/* HEADER STYLING
	================================================== */
	
	$wp_customize->add_section( 'header_styling', array(
		'title'		=>	esc_html__( 'Header 1', 'magzma' ),
		'priority'	=>	200,
		'panel' 	  => $panel_id_1
	) );
	
	//SECTION

	$wp_customize->add_setting( 'bg_top', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'border_top_bar', array(
		'default'		=> 	'#e7e7e7',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'top_menu', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'top_menu_hover', array(
		'default'		=> 	'#999999',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'top_social', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'top_social_hover', array(
		'default'		=> 	'#999999',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'main_header', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'main_header_menu', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'mh_menu_hover', array(
		'default'		=> 	'#999999',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'sub_menu_bg', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	//CONTROL
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_top', array(
		'label'		=>	esc_html__( 'Top Header Background Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'bg_top',
		'priority'	=>	1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'border_top_bar', array(
		'label'		=>	esc_html__( 'Border Top Bar Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'border_top_bar',
		'priority'	=>	2,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_menu', array(
		'label'		=>	esc_html__( 'Top Header Menu List Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'top_menu',
		'priority'	=>	3,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_menu_hover', array(
		'label'		=>	esc_html__( 'Top Header Menu List Hover Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'top_menu_hover',
		'priority'	=>	4,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_social', array(
		'label'		=>	esc_html__( 'Top Social Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'top_social',
		'priority'	=>	5,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_social_hover', array(
		'label'		=>	esc_html__( 'Top Social Hover Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'top_social_hover',
		'priority'	=>	6,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_header', array(
		'label'		=>	esc_html__( 'Main Header Background Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'main_header',
		'priority'	=>	7,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_header_menu', array(
		'label'		=>	esc_html__( 'Main Header Menu Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'main_header_menu',
		'priority'	=>	8,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mh_menu_hover', array(
		'label'		=>	esc_html__( 'Main Header Menu Hover Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'mh_menu_hover',
		'priority'	=>	9,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sub_menu_bg', array(
		'label'		=>	esc_html__( 'Submenu Background Color', 'magzma' ),
		'section'	=>	'header_styling',
		'settings'	=>	'sub_menu_bg',
		'priority'	=>	10,
	) ) );



	/*=====================================================================================================*/
	// Set Panel ID
	/*=====================================================================================================*/
	$panel_id_2 = 'magzma_content_section';

	$wp_customize->add_panel( $panel_id_2,
	    array(
	        'priority'          => 199,
	        'capability'        => 'edit_theme_options',
	        'theme_supports'    => '',
	        'title'             => esc_html__( 'Content Section Color', 'magzma' ),
	        'description'       => esc_html__( 'Edit your content color here.', 'magzma' ),
	    )
	);

	/* CONTENT STYLING
	================================================== */
	
	$wp_customize->add_section( 'content_styling', array(
		'title'		=>	esc_html__( 'Content Color', 'magzma' ),
		'priority'	=>	200,
		'panel' 	  => $panel_id_2
	) );
	
	//SECTION

	$wp_customize->add_setting( 'breadcrumbs_color', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bc_hover', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bc_bg', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bc_border', array(
		'default'		=> 	'#e7e7e7',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'categories_blog', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'categories_hov_blog', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'categories_bg', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'categories_hov_bg', array(
		'default'		=> 	'#111111',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'title_blog', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'title_hov_blog', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'author_name', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'author_hov_name', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'post_meta_detail_color', array(
		'default'		=> 	'#999999',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'post_meta_hover', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'excerpt_blog', array(
		'default'		=> 	'#777777',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_readmore', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_readmore', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_hov_readmore', array(
		'default'		=> 	'#111111',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'meta_right', array(
		'default'		=> 	'#333333',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'meta_icon', array(
		'default'		=> 	'#111111',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bg_quote', array(
		'default'		=> 	'#e5e5e5',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'icon_quote', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'text_quote', array(
		'default'		=> 	'#777777',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_post', array(
		'default'		=> 	'#777777',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_hov_post', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_bg', array(
		'default'		=> 	'#f3f3f3',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_hov_bg', array(
		'default'		=> 	'#e6e6e6',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );


	$wp_customize->add_setting( 'next_previous', array(
		'default'		=> 	'#777777',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'arrow_next_previous', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'author_name_info', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'author_span_info', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'author_desc_info', array(
		'default'		=> 	'#777777',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'author_bg_info', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_comment', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'link_comment', array(
		'default'		=> 	'#999999',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'link_hov_comment', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_up', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_up_icon', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'post_title', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'post_title_hov', array(
		'default'		=> 	'#555555',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_loadmore_bg', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'btn_loadmore_text', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	//CONTROL

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'breadcrumbs_color', array(
		'label'		=>	esc_html__( 'Bread Crumbs Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'breadcrumbs_color',
		'priority'	=>	1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bc_hover', array(
		'label'		=>	esc_html__( 'Bread Crumbs Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'bc_hover',
		'priority'	=>	2,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bc_bg', array(
		'label'		=>	esc_html__( 'Bread Crumbs Background Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'bc_bg',
		'priority'	=>	3,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bc_border', array(
		'label'		=>	esc_html__( 'Bread Crumbs Border Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'bc_border',
		'priority'	=>	4,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'categories_blog', array(
		'label'		=>	esc_html__( 'Categories Title Blog Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'categories_blog',
		'priority'	=>	5,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'categories_hov_blog', array(
		'label'		=>	esc_html__( 'Categories Title Blog Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'categories_hov_blog',
		'priority'	=>	6,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'categories_bg', array(
		'label'		=>	esc_html__( 'Categories Blog Background Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'categories_bg',
		'priority'	=>	7,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'categories_hov_bg', array(
		'label'		=>	esc_html__( 'Categories Blog Background Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'categories_hov_bg',
		'priority'	=>	8,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_blog', array(
		'label'		=>	esc_html__( 'Title Blog Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'title_blog',
		'priority'	=>	9,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_hov_blog', array(
		'label'		=>	esc_html__( 'Title Blog Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'title_hov_blog',
		'priority'	=>	10,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_name', array(
		'label'		=>	esc_html__( 'Author Name Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'author_name',
		'priority'	=>	11,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_hov_name', array(
		'label'		=>	esc_html__( 'Author Name Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'author_hov_name',
		'priority'	=>	12,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_meta_detail_color', array(
		'label'		=>	esc_html__( 'Post Meta Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'post_meta_detail_color',
		'priority'	=>	13,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_meta_hover', array(
		'label'		=>	esc_html__( 'Post Meta Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'post_meta_hover',
		'priority'	=>	14,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'excerpt_blog', array(
		'label'		=>	esc_html__( 'Excerpt/Post Text Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'excerpt_blog',
		'priority'	=>	15,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_readmore', array(
		'label'		=>	esc_html__( 'Button Continue Read Text Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'btn_readmore',
		'priority'	=>	16,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_hov_readmore', array(
		'label'		=>	esc_html__( 'Button Continue Read Text Hover Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'btn_hov_readmore',
		'priority'	=>	17,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_right', array(
		'label'		=>	esc_html__( 'Post Meta Right Section Color (Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'meta_right',
		'priority'	=>	18,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'meta_icon', array(
		'label'		=>	esc_html__( 'Post Meta Right Section Icon Color (Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'meta_icon',
		'priority'	=>	19,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_quote', array(
		'label'		=>	esc_html__( 'Background Quote Color (Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'bg_quote',
		'priority'	=>	20,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'icon_quote', array(
		'label'		=>	esc_html__( 'icon Quote Color (Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'icon_quote',
		'priority'	=>	21,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_quote', array(
		'label'		=>	esc_html__( 'Quote Description Color (Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'text_quote',
		'priority'	=>	22,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_post', array(
		'label'		=>	esc_html__( 'Tag Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'tag_post',
		'priority'	=>	23,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_hov_post', array(
		'label'		=>	esc_html__( 'Tag Hover Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'tag_hov_post',
		'priority'	=>	24,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_bg', array(
		'label'		=>	esc_html__( 'Tag Background Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'tag_bg',
		'priority'	=>	25,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_hov_bg', array(
		'label'		=>	esc_html__( 'Tag Background Hover Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'tag_hov_bg',
		'priority'	=>	26,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'share_section', array(
		'label'		=>	esc_html__( 'Share Section Background Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'share_section',
		'priority'	=>	27,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'next_previous', array(
		'label'		=>	esc_html__( 'Button Next and previous Post Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'next_previous',
		'priority'	=>	28,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'arrow_next_previous', array(
		'label'		=>	esc_html__( 'Arrow Button Next and previous Post Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'arrow_next_previous',
		'priority'	=>	29,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_name_info', array(
		'label'		=>	esc_html__( 'Author Name Color at Column Info(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'author_name_info',
		'priority'	=>	30,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_span_info', array(
		'label'		=>	esc_html__( 'Text "Writen by" at Author Section(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'author_span_info',
		'priority'	=>	31,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_desc_info', array(
		'label'		=>	esc_html__( 'Description at Author Section(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'author_desc_info',
		'priority'	=>	32,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'author_bg_info', array(
		'label'		=>	esc_html__( 'Author Section Background Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'author_bg_info',
		'priority'	=>	33,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_comment', array(
		'label'		=>	esc_html__( 'Button Post Comment Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'btn_comment',
		'priority'	=>	34,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_comment', array(
		'label'		=>	esc_html__( 'Text Link at Comment Section Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'link_comment',
		'priority'	=>	35,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_hov_comment', array(
		'label'		=>	esc_html__( 'Text Link at Comment Section Hover Color(Single Post)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'link_hov_comment',
		'priority'	=>	36,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_up', array(
		'label'		=>	esc_html__( 'Button Send/Coment & Back To Top Background Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'btn_up',
		'priority'	=>	37,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_title', array(
		'label'		=>	esc_html__( 'Post Title Color (Post style 2, 3 & 4)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'post_title',
		'priority'	=>	38,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'post_title_hov', array(
		'label'		=>	esc_html__( 'Post Title Hover Color (Post style 2, 3 & 4)', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'post_title_hov',
		'priority'	=>	39,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_loadmore_bg', array(
		'label'		=>	esc_html__( 'Button Load More Background Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'btn_loadmore_bg',
		'priority'	=>	40,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'btn_loadmore_text', array(
		'label'		=>	esc_html__( 'Button Load More Text Color', 'magzma' ),
		'section'	=>	'content_styling',
		'settings'	=>	'btn_loadmore_text',
		'priority'	=>	41,
	) ) );



	/* SIDEBAR STYLING
	================================================== */
	
	$wp_customize->add_section( 'sidebar_styling', array(
		'title'		=>	esc_html__( 'Sidebar Section Color', 'magzma' ),
		'priority'	=>	200,
		'panel' 	  => $panel_id_2
	) );
	
	//SECTION

	$wp_customize->add_setting( 'title_sidebar', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'title_recent', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'title_hov_recent', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	//CONTROL

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_sidebar', array(
		'label'		=>	esc_html__( 'Widget Title Color', 'magzma' ),
		'section'	=>	'sidebar_styling',
		'settings'	=>	'title_sidebar',
		'priority'	=>	1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_recent', array(
		'label'		=>	esc_html__( 'All Widget Link Text Color', 'magzma' ),
		'section'	=>	'sidebar_styling',
		'settings'	=>	'title_recent',
		'priority'	=>	2,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'title_hov_recent', array(
		'label'		=>	esc_html__( 'All Widget Link Text Hover Color', 'magzma' ),
		'section'	=>	'sidebar_styling',
		'settings'	=>	'title_hov_recent',
		'priority'	=>	3,
	) ) );


	/* WIDGET STYLING
	================================================== */
	
	$wp_customize->add_section( 'widget_styling', array(
		'title'		=>	esc_html__( 'Widget Section Color', 'magzma' ),
		'priority'	=>	200,
		'panel' 	  => $panel_id_2
	) );
	
	//SECTION

	$wp_customize->add_setting( 'tag_widget_bg', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_widget_hov_bg', array(
		'default'		=> 	'#999999',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_widget_text', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'tag_widget_hov_text', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'magzma_news_bg', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'magzma_news_text_active', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'hov_news_text_active', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'magzma_news_text_deactive', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'hov_news_text_deactive', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bg_newsletter', array(
		'default'		=> 	'#111111',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bg_newsletter_circle', array(
		'default'		=> 	'#111111',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'newsletter_icon', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'newsletter_desc', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'newsletter_input', array(
		'default'		=> 	'#f2f2f7',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'sign_btn_bg', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'sign_btn_text', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	//CONTROL

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_widget_bg', array(
		'label'		=>	esc_html__( 'Tag Cloud Background Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'tag_widget_bg',
		'priority'	=>	1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_widget_hov_bg', array(
		'label'		=>	esc_html__( 'Tag Cloud Background Hover Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'tag_widget_hov_bg',
		'priority'	=>	2,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_widget_text', array(
		'label'		=>	esc_html__( 'Tag Cloud Text Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'tag_widget_text',
		'priority'	=>	3,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tag_widget_hov_text', array(
		'label'		=>	esc_html__( 'Tag Cloud Text Hover Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'tag_widget_hov_text',
		'priority'	=>	4,
	) ) );


	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magzma_news_bg', array(
		'label'		=>	esc_html__( 'Tab Background Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'magzma_news_bg',
		'priority'	=>	5,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magzma_news_text_active', array(
		'label'		=>	esc_html__( 'Tab text Active Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'magzma_news_text_active',
		'priority'	=>	6,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hov_news_text_active', array(
		'label'		=>	esc_html__( 'Tab text Active Hover Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'hov_news_text_active',
		'priority'	=>	7,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'magzma_news_text_deactive', array(
		'label'		=>	esc_html__( 'Tab text Deactive Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'magzma_news_text_deactive',
		'priority'	=>	8,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hov_news_text_deactive', array(
		'label'		=>	esc_html__( 'Tab text Deactive Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'hov_news_text_deactive',
		'priority'	=>	9,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_newsletter', array(
		'label'		=>	esc_html__( 'Newsletter Background Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'bg_newsletter',
		'priority'	=>	10,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_newsletter_circle', array(
		'label'		=>	esc_html__( 'Newsletter Background Circle Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'bg_newsletter_circle',
		'priority'	=>	11,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newsletter_icon', array(
		'label'		=>	esc_html__( 'Newsletter Icon Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'newsletter_icon',
		'priority'	=>	12,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newsletter_desc', array(
		'label'		=>	esc_html__( 'Newsletter Description Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'newsletter_desc',
		'priority'	=>	13,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'newsletter_input', array(
		'label'		=>	esc_html__( 'Newsletter Form Email Background Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'newsletter_input',
		'priority'	=>	14,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sign_btn_bg', array(
		'label'		=>	esc_html__( 'Newsletter Sign Up Button Background Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'sign_btn_bg',
		'priority'	=>	15,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sign_btn_text', array(
		'label'		=>	esc_html__( 'Newsletter Sign Up Button Text Color', 'magzma' ),
		'section'	=>	'widget_styling',
		'settings'	=>	'sign_btn_text',
		'priority'	=>	16,
	) ) );


	/*=====================================================================================================*/
	// Set Panel ID
	/*=====================================================================================================*/
	$panel_id_3 = 'magzma_footer_section';

	$wp_customize->add_panel( $panel_id_3,
	    array(
	        'priority'          => 199,
	        'capability'        => 'edit_theme_options',
	        'theme_supports'    => '',
	        'title'             => esc_html__( 'Footer Section Color', 'magzma' ),
	        'description'       => esc_html__( 'Edit your Footer color here.', 'magzma' ),
	    )
	);

	/* FOOTER STYLING
	================================================== */
	
	$wp_customize->add_section( 'footer1_styling', array(
		'title'		=>	esc_html__( 'Footer Color', 'magzma' ),
		'priority'	=>	200,
		'panel' 	  => $panel_id_3
	) );
	
	//SECTION

	$wp_customize->add_setting( 'bg_footer1', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'bg_footer2', array(
		'default'		=> 	'#ffffff',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'text_footer', array(
		'default'		=> 	'#777777',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'footer_sosmed', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'footer_hov_sosmed', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'footer_border_sosmed', array(
		'default'		=> 	'#d8d8d8',
		'type'			=> 	'option',
		'transport'		=> 	'postMessage',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'footer_menu', array(
		'default'		=> 	'#000000',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'footer_hov_menu', array(
		'default'		=> 	'#61c436',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_setting( 'footer_bord_menu', array(
		'default'		=> 	'#cccccc',
		'type'			=> 	'option',
		'capability'	=>	'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	//CONTROL

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_footer1', array(
		'label'		=>	esc_html__( 'Footer Bottom Background Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'bg_footer1',
		'priority'	=>	1,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bg_footer2', array(
		'label'		=>	esc_html__( 'Footer Top Background Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'bg_footer2',
		'priority'	=>	2,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_footer', array(
		'label'		=>	esc_html__( 'Footer Copyright Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'text_footer',
		'priority'	=>	3,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_sosmed', array(
		'label'		=>	esc_html__( 'Footer Social Media Icon Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'footer_sosmed',
		'priority'	=>	4,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_hov_sosmed', array(
		'label'		=>	esc_html__( 'Footer Social Media Icon Hover Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'footer_hov_sosmed',
		'priority'	=>	5,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_border_sosmed', array(
		'label'		=>	esc_html__( 'Footer Social Media Icon Border Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'footer_border_sosmed',
		'priority'	=>	6,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_menu', array(
		'label'		=>	esc_html__( 'Footer Menu List & Copyright Link Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'footer_menu',
		'priority'	=>	7,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_hov_menu', array(
		'label'		=>	esc_html__( 'Footer Menu List & Copyright Link Hover Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'footer_hov_menu',
		'priority'	=>	8,
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bord_menu', array(
		'label'		=>	esc_html__( 'Footer Menu List Border Color', 'magzma' ),
		'section'	=>	'footer1_styling',
		'settings'	=>	'footer_bord_menu',
		'priority'	=>	9,
	) ) );



	//require_once get_template_directory() . '/inc/panels/color-output.php';