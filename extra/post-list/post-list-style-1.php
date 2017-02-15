<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_post_list_1 extends Widget_Base {

	public function get_name() {
		return 'magzma-post-list-1';
	}

	public function get_title() {
		return __( 'Magzma Post List 1', 'magzma' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_magzma_post_list',
			[
				'label' => __( 'Post Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Post per Block', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '3',
				'title' => __( 'Enter some text', 'magzma' ),
				'description' => __( 'This option allow you to set how much post display in this block.', 'magzma' ),			
			]
		);

		$this->add_control(
			'offset',
			[
				'label' => __( 'Offset', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'title' => __( 'Enter some text', 'magzma' ),
				'description' => __( 'Set the first post to display (start from 0 as the latest post in each order).', 'magzma' ),
			]
		);

		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'magzma' ),
				'type'    => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple'    => true,
				'default' => [],
				'options' => magzma_get_category(),
				'description' => __( 'Select category to display (default to All).', 'magzma' ),
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order By', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => magzma_order_by(),
				'description' => __( 'Select post order by (default to latest post).', 'magzma' ),				
			]
		);

		$this->add_control(
			'metakey',
			[
				'label' => __( 'Count By', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'Views',
				'options' => [
					'post_views_count' => __( 'Views', 'magzma' ),
					'_li_love_count'=> __( 'Love Count', 'magzma' ),
				],
				'condition' => [
					'orderby' => 'meta_value',
				],				
			]
		);

		$this->add_control(
			'use_infinite_scroll',
			[
				'label' => __( 'Use Infinite Scroll', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'magzma-widget-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
			]
		);

		$this->add_control(
			'loop_infinite_class',
			[
				'label' => __( 'Add Unique Class for Infinite Scroll', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'loop-infinte-list-1',
				'title' => __( 'Enter some text', 'magzma' ),
				'description' => __( 'This class will avoid class conflict between post list query (must be different!).', 'magzma' ),
				'condition' => [
					'use_infinite_scroll' => 'use',
				],
			]
		);

		$this->end_controls_section();


		/*===========STYLE SETTING=============*/

		$this->start_controls_section(
			'section_magzma_post_list_1_typhography_title',
			[
				'label' => __( 'Style Setting', 'magzma' ),
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Text Align', 'magzma' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'magzma' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'magzma' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'magzma' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-item' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'use_shadow',
			[
				'label' => __( 'Use Shadow', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'use',
				'prefix_class' => '',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __( 'You can show a box shadow behind your post item.', 'magzma' ),
				
			]
		);

		/*====== post format icon =======*/

		$this->add_control(
			'use_icon_post_list_1',
			[
				'label' => __( 'Use Post Icon', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'post_icon_color1_post_list_1',
			[
				'label' => __( 'Post Icon Video', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-video i' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_icon_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_icon_color2_post_list_1',
			[
				'label' => __( 'Post Icon Gallery', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#007AFE',
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-gallery i' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_icon_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_icon_size_post_list_1',
			[
				'label' => __( 'Icon Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-gallery i, .category-icon .category-icon-video i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_icon_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_icon_padding_post_list_1',
			[
				'label' => __( 'Post Padding', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-gallery i, .category-icon .category-icon-video i' => 'padding: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_icon_post_list_1' => 'on',
				],
			]
		);

		/*====== love and view =======*/

		$this->add_control(
			'use_view_post_list_1',
			[
				'label' => __( 'Use View and Love Counter', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'post_view_color_post_list_1',
			[
				'label' => __( 'View and Love Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .post-view, .post-list-1 .post-view i, .post-list-1 .love-it-wrapper a:before, .post-list-1 .has-been-loved:before, .post-list-1 .love-count' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_view_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_view_color_post_list_1_nothumb',
			[
				'label' => __( 'View and Love Color No Thumb', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .meta-love-and-view.no-thumb .post-view, .post-list-1 .meta-love-and-view.no-thumb .post-view i, .post-list-1 .meta-love-and-view.no-thumb .love-it-wrapper a:before, .post-list-1 .meta-love-and-view.no-thumb .has-been-loved:before, .post-list-1 .meta-love-and-view.no-thumb .love-count' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_view_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_view_line_height',
			[
				'label' => __( 'Category Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 0.1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .post-view, .post-list-1 .love-it-wrapper' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_view_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_view_font_size',
			[
				'label' => __( 'Category Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 16,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .post-view, .post-list-1 .love-it-wrapper' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_view_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_view_font_weight',
			[
				'label' => __( 'Category Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '600',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .post-view, .post-list-1 .love-it-wrapper' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_view_post_list_1' => 'on',
				],
			]
		);

		/*====== category =======*/

		$this->add_control(
			'use_category_post_list_1',
			[
				'label' => __( 'Use Category', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_category_post_list_1_color',
			[
				'label' => __( 'Category Title Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_list1_category_title_hov_color',
			[
				'label' => __( 'Category Title Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_category_post_list_1_background_color',
			[
				'label' => __( 'Category Background Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_list1_category_background_hov_color',
			[
				'label' => __( 'Category Background Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_category_line_height',
			[
				'label' => __( 'Category Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 0.1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_category_font_size',
			[
				'label' => __( 'Category Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 12,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_category_font_weight',
			[
				'label' => __( 'Category Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '600',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_category_post_list_1' => 'on',
				],
			]
		);

		//==========Typography Title==========//

		$this->add_control(
			'use_title_post_list_1',
			[
				'label' => __( 'Use Title Block', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_title_post_list_1_color',
			[
				'label' => __( 'Title Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .story-content h3 a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_title_post_list_1_hov_color',
			[
				'label' => __( 'Title Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .story-content h3 a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_title_line_height',
			[
				'label' => __( 'Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.25,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 0.1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .story-content h3' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_title_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_title_font_size',
			[
				'label' => __( 'Title Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 24,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .story-content h3' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_title_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_title_font_weight',
			[
				'label' => __( 'Title Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '600',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .story-content h3' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_title_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_min_height',
			[
				'label' => __( 'Title Minimum Height', 'magzma' ),
				'description' => __( 'Use in case you want to make all title have same height.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .post-list-1 .story-content h3' => 'min-height: {{VALUE}}px',
				],
				'condition' => [
					'use_title_post_list_1' => 'on',
				],
			]
		);

		//===========Typography Meta===========//

		$this->add_control(
			'use_meta_post_list_1',
			[
				'label' => __( 'Use Meta Block', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_meta_text_post_list_1_color',
			[
				'label' => __( 'Meta Text Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#999999',
				'selectors' => [
					'{{WRAPPER}} .post-meta span.author-separator, .post-meta a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_meta_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_meta_post_list_1_color',
			[
				'label' => __( 'Meta Author Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .post-meta span.vcard' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_meta_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_list1_meta_title_hov_color',
			[
				'label' => __( 'Meta Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .post-meta span.vcard:hover, .post-meta a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_meta_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_meta_font_size',
			[
				'label' => __( 'Meta Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 14,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-meta span.vcard, .post-meta a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_meta_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_meta_font_weight',
			[
				'label' => __( 'Meta Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '600',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .post-meta span.vcard, .post-meta a' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_meta_post_list_1' => 'on',
				],
			]
		);


		/*===========Typhography Excerpt=============*/

		$this->add_control(
			'use_excerpt_post_list_1',
			[
				'label' => __( 'Use Excerpt Block', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_excerpt_post_list_1_color',
			[
				'label' => __( 'Excerpt Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#777777',
				'selectors' => [
					'{{WRAPPER}} .post-list-1 p' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_excerpt_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_excerpt_line_height',
			[
				'label' => __( 'Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 0.1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 p' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_excerpt_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list_1_excerpt_font_size',
			[
				'label' => __( 'Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-1 p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_excerpt_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_list_1_excerpt_word',
			[
				'label' => __( 'Word Count for Post', 'magzma' ),
				'description' => __( 'Margin right for each item inside this block.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '30',
				'condition' => [
					'use_excerpt_post_list_1' => 'on',
				],	
			]
		);

		//==========Read More==========//

		$this->add_control(
			'use_read_more_post_list_1',
			[
				'label' => __( 'Use Read More', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_read_more_post_list_1_color',
			[
				'label' => __( 'Read More Title Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} a.read-more' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_list1_read_more_title_hov_color',
			[
				'label' => __( 'Read More Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} a.read-more:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list1_read_more_line_height',
			[
				'label' => __( 'Read More Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.5,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a.read-more' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list1_read_more_font_size',
			[
				'label' => __( 'Read More Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 18,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a.read-more' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_list1_read_more_font_weight',
			[
				'label' => __( 'Read More Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '400',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} a.read-more' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_read_more_border_post_list_1_color',
			[
				'label' => __( 'Read More Border Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .read-more' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->add_control(
			'post_list1_read_more_border_hov_color',
			[
				'label' => __( 'Read More Border Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .read-more:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'use_read_more_post_list_1' => 'on',
				],
			]
		);

		$this->end_controls_section();

		/*=========== Layout Setting =============*/

		$this->start_controls_section(
			'section_magzma_post_list_1_column_control',
			[
				'label' => __( 'Layout Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'post_list1_margin_bottom',
			[
				'label' => __( 'Margin Bottom Post', 'magzma' ),
				'description' => __( 'Margin bottom for each item inside this block.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
				'selectors' => [
					'{{WRAPPER}} .post-item' => 'margin-bottom: {{VALUE}}px;',
				],	
			]
		);

		$this->add_control(
			'horizontal_use',
			[
				'label' => __( 'Make it Horizontal', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'horizontal-item-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'left',
				'selectors' => [
					'{{WRAPPER}} .post-item' => 'float: {{VALUE}};',
				],
				'description' => __( 'You can make it horizontal inline and will displayed as grid', 'magzma' ),				
			]
		);

		$this->add_control(
			'width',
			[
				'label' => __( 'Width', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '600',
				'title' => __( 'Enter some text', 'magzma' ),
				'condition' => [
					'horizontal_use' => 'left',
				],
			]
		);

		$this->add_control(
			'height',
			[
				'label' => __( 'Height', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '600',
				'title' => __( 'Enter some text', 'magzma' ),
				'condition' => [
					'horizontal_use' => 'left',
				],
			]
		);

		$this->add_responsive_control(
			'horizontal_col_select',
			[
				'label' => __( 'Post Column', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'column-1',
				'options' => [
					'column-1' => __( '1 Column', 'magzma' ),
					'column-2' => __( '2 Column', 'magzma' ),
					'column-3' => __( '3 Column', 'magzma' ),
					'column-4' => __( '4 Column', 'magzma' ),
					'column-5' => __( '5 Column', 'magzma' ),
				],
				'description' => __( 'You can give your post list column to display how much item show per row.', 'magzma' ),
			]
		);

		$this->add_control(
			'use_padding',
			[
				'label' => __( 'Use Padding', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'extra-padding-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __( 'Add a gap for each post item with padding.', 'magzma' ),
				
			]
		);

		$this->add_responsive_control(
			'padding_size_list_style_1',
			[
				'label' => __( 'Padding Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 25,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .selector-padding' => 'padding-right: calc( {{SIZE}}{{UNIT}}/2 ); padding-left: calc( {{SIZE}}{{UNIT}}/2 );',
				],
				'condition' => [
					'use_padding' => 'use',
				],
			]
		);

		$this->end_controls_section();

		/*===========ANIMATION=============*/

		$this->start_controls_section(
			'section_magzma_post_list_animation_control',
			[
				'label' => __( 'Animation Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'animate',
			[
				'label' => __( 'Animate', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'fade in',
				
				'options' => magzma_animate()
			]
		);

		$this->add_control(
			'animetime',
			[
				'label' => __( 'Animation time', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0.1',
				'title' => __( 'Enter some text', 'magzma' ),
				
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$instance = $this->get_settings();
		
		// POST SETTING
		$post_per_page = ! empty( $instance['posts_per_page'] ) ? (int)$instance['posts_per_page'] : 3;
		$offset = ! empty( $instance['offset'] ) ? (int)$instance['offset'] : '';
		$category = ! empty( $instance['category'] ) ? $instance['category'] : '';
		$orderby = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date';
		$metakey = ! empty( $instance['metakey'] ) ? $instance['metakey'] : 'Views';
		/*infinite*/
		$use_infinite_scroll = $instance['use_infinite_scroll'];
		$loop_infinite_class = ! empty( $instance['loop_infinite_class'] ) ? $instance['loop_infinite_class'] : 'your-infinite-list-1';

		// STYLE SETTING
		$use_shadow 					= $instance['use_shadow'];
		$use_icon_post_list_1 			= $instance['use_icon_post_list_1'];
		$use_view_post_list_1 			= $instance['use_view_post_list_1'];
		$use_category_post_list_1 		= $instance['use_category_post_list_1'];
		$use_title_post_list_1 			= $instance['use_title_post_list_1'];
		$use_meta_post_list_1 			= $instance['use_meta_post_list_1'];
		$use_excerpt_post_list_1 		= $instance['use_excerpt_post_list_1'];
		$use_read_more_post_list_1 		= $instance['use_read_more_post_list_1'];

		//excerpt
		$post_list_1_excerpt_word = ! empty( $instance['post_list_1_excerpt_word'] ) ? (int)$instance['post_list_1_excerpt_word'] : 30;

		/* LAYOUT SETTING */
		$horizontal_use = $instance['horizontal_use'];
		$post_list1_margin_bottom = ! empty( $instance['post_list1_margin_bottom'] ) ? $instance['post_list1_margin_bottom'] : '20';
		$width = ! empty( $instance['width'] ) ? (int)$instance['width'] : 600;
		$height = ! empty( $instance['height'] ) ? (int)$instance['height'] : 600;
		$horizontal_col_select = ! empty( $instance['horizontal_col_select'] ) ? $instance['horizontal_col_select'] : 'column-1';

		// animation
		$animation = ! empty( $instance['animate'] ) ? $instance['animate'] : '';
		$anime_time = ! empty( $instance['animetime'] ) ? $instance['animetime'] : '0.1';

		include ( plugin_dir_path(__FILE__).'tpl/post-list-1.php' );

		?>

		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new magzma_post_list_1() );