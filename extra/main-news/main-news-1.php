<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_main_news_1 extends Widget_Base {

	public function get_name() {
		return 'magzma-main-news-1';
	}

	public function get_title() {
		return __( 'Magzma Main News 1', 'magzma' );
	}

	public function get_icon() {
		return 'eicon-inner-section';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {

	/*===========POST CONTROL=============*/

		$this->start_controls_section(
			'section_magzma_main_news_1_general_control',
			[
				'label' => __( 'Post Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Post per Block', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '4',
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

		$this->end_controls_section();

		/*===========Style Setting=============*/

		$this->start_controls_section(
			'section_magzma_main_news_post_control',
			[
				'label' => __( 'Style Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'image_overlay',
			[
				'label' => __( 'Overlay Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => 'rgba(0,0,0,0.3)',
				'selectors' => [
					'{{WRAPPER}} .blog-overlay' => 'background-color: {{VALUE}};',
				],
				
			]
		);

		$this->add_responsive_control(
			'vertical_position',
			[
				'label' => __( 'Vertical Position', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 50,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-news-1 .has-post-thumbnail .blog-desc' => 'top: {{SIZE}}{{UNIT}};',
				],
				'description' => __( 'Drag the slider to change vertical align of post text inside image.', 'magzma' ),
			]
		);

		$this->add_responsive_control(
			'horizontal_position',
			[
				'label' => __( 'Horizontal Position', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 5,
					'unit' => '%',
				],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-news-1 .has-post-thumbnail .blog-desc' => 'left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
				],
				'description' => __( 'Drag the slider to change horizontal align of post text inside image.', 'magzma' ),
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
					'{{WRAPPER}} .main-news-1 .blog-desc' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'width',
			[
				'label' => __( 'Width', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '600',
				'title' => __( 'Enter some text', 'magzma' ),
				'description' => __( 'Crop your image width.', 'magzma' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'height',
			[
				'label' => __( 'Height', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '600',
				'title' => __( 'Enter some text', 'magzma' ),
				
				'selectors' => [
					'{{WRAPPER}} .blog-wrap' => 'height: {{VALUE}}px;',
					'{{WRAPPER}} .article-wrap' => 'height: {{VALUE}}px;',
				],
				'description' => __( 'Crop your image height and also your post height.', 'magzma' ),
			]
		);

		/*========== love count ===========*/

		$this->add_control(
			'love_count',
			[
				'label' => __( 'Love Count', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'love_count_color',
			[
				'label' => __( 'Love Count Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .love-it-wrapper a:before, .has-been-loved:before, .love-count' => 'color: {{VALUE}};',
				],
				'condition' => [
					'love_count' => 'on',
				],
			]
		);

		$this->add_control(
			'love_count_hov_color',
			[
				'label' => __( 'Love Count Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .love-it-wrapper:hover a:before,  .love-it-wrapper:hover .has-been-loved:before, .love-it-wrapper:hover .love-count' => 'color: {{VALUE}};',
				],
				'condition' => [
					'love_count' => 'on',
				],
			]
		);

		/*=========== category ===========*/

		$this->add_control(
			'use_category',
			[
				'label' => __( 'Use Category', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'category_title_color',
			[
				'label' => __( 'Category Title Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .category-main-news-1 .post-categories li a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_title_hover_color',
			[
				'label' => __( 'Category Title Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .category-main-news-1 .post-categories li:hover a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_bg_color',
			[
				'label' => __( 'Category Background Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .category-main-news-1 .post-categories li' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_bg_hover_color',
			[
				'label' => __( 'Category background Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .category-main-news-1 .post-categories li:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		/*=========== title ===========*/

		$this->add_control(
			'use_title',
			[
				'label' => __( 'Use Title', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_title_color',
			[
				'label' => __( 'Title Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .main-news-1 h3.blog-title a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .main-news-1 h3.blog-title a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_line_height',
			[
				'label' => __( 'Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.3,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 0.1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .main-news-1 h3.blog-title' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_font_size',
			[
				'label' => __( 'Font Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 22,
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
					'{{WRAPPER}} .main-news-1 h3.blog-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_font_weight',
			[
				'label' => __( ' Title Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .main-news-1 h3.blog-title' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
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
					'{{WRAPPER}} .main-news-1 h3.blog-title' => 'min-height: {{VALUE}}px',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		/*============= date =============*/

		$this->add_control(
			'use_date',
			[
				'label' => __( 'Use Date', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_date_color',
			[
				'label' => __( 'Date Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .main-news-1 .blog-date' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_date_hov_color',
			[
				'label' => __( 'Date Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .main-news-1 .blog-date:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'date_font_size',
			[
				'label' => __( 'Font Size', 'magzma' ),
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
					'{{WRAPPER}} .main-news-1 .blog-date' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'date_font_weight',
			[
				'label' => __( ' Date Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .main-news-1 .blog-date' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		/*============= read minutes =============*/

		$this->add_control(
			'use_read',
			[
				'label' => __( 'Use Minute Read', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);


		$this->add_control(
			'typhography_read_color',
			[
				'label' => __( 'Minute Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .main-news-1 .time-read' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_read' => 'on',
				],
			]
		);


		$this->add_control(
			'typhography_read_hov_color',
			[
				'label' => __( 'Minute Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .main-news-1 .time-read:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_read' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'read_font_size',
			[
				'label' => __( 'Font Size', 'magzma' ),
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
					'{{WRAPPER}} .main-news-1 .time-read' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_read' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'read_font_weight',
			[
				'label' => __( ' Date Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .main-news-1 .time-read' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_read' => 'on',
				],
			]
		);

		/*============= icon =============*/

		$this->add_control(
			'use_icon',
			[
				'label' => __( 'Use Post Icon', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'post_icon_color',
			[
				'label' => __( 'Post Icon Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-gallery i, .category-icon .category-icon-video i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_icon' => 'on',
				],
			]
		);

		$this->add_control(
			'post_icon_color1',
			[
				'label' => __( 'Post Icon Video', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-video i' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_icon' => 'on',
				],
			]
		);

		$this->add_control(
			'post_icon_color2',
			[
				'label' => __( 'Post Icon Gallery', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#007AFE',
				'selectors' => [
					'{{WRAPPER}} .category-icon .category-icon-gallery i' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_icon' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_icon_size',
			[
				'label' => __( 'Icon Size', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
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
					'use_icon' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'post_icon_padding',
			[
				'label' => __( 'Post Icon Padding', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
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
					'use_icon' => 'on',
				],
			]
		);

		$this->end_controls_section();

		/*=========== Layout Setting =============*/

		$this->start_controls_section(
			'section_magzma_main_news_column_control',
			[
				'label' => __( 'Layout Setting', 'magzma' ),
			]
		);

		$this->add_responsive_control(
			'margin_bottom',
			[
				'label' => __( 'Margin Bottom Post', 'magzma' ),
				'description' => __( 'Margin bottom for each item inside this block.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',
				'selectors' => [
					'{{WRAPPER}} .article-wrap' => 'margin-bottom: {{VALUE}}px;',
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
					'{{WRAPPER}} .article-wrap' => 'float: {{VALUE}};',
				],
				'description' => __( 'You can make it horizontal inline and will displayed as grid', 'magzma' ),
				
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
			'padding_size',
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
			'section_magzma_main_news_animation_control',
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
				'description' => __( 'Select animation type.', 'magzma' ),
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
				'description' => __( 'Insert animation time.', 'magzma' ),
				
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$instance = $this->get_settings();

		// Post Setting
		$category 				= ! empty( $instance['category'] ) ? $instance['category'] : '';
		$offset 				= ! empty( $instance['offset'] ) ? (int)$instance['offset'] : '0';
		$width 					= ! empty( $instance['width'] ) ? (int)$instance['width'] : 600;
		$height 				= ! empty( $instance['height'] ) ? (int)$instance['height'] : 600;
		$post_per_page 			= ! empty( $instance['posts_per_page'] ) ? (int)$instance['posts_per_page'] : 1;
		$orderby 				= ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date';
		$metakey 				= ! empty( $instance['metakey'] ) ? $instance['metakey'] : 'Views';

		// Style Setting
		$use_category			=  $instance['use_category'];
		$use_title				=  $instance['use_title'];
		$use_icon				=  $instance['use_icon'];
		$use_date 				=  $instance['use_date'];
		$use_read 				=  $instance['use_read'];
		$love_count 			=  $instance['love_count'];

		// Layout Setting
		$horizontal_col_select 	= ! empty( $instance['horizontal_col_select'] ) ? $instance['horizontal_col_select'] : 'column-1';

		//Animation
		$animation 				= ! empty( $instance['animate'] ) ? $instance['animate'] : '';
		$anime_time 			= ! empty( $instance['animetime'] ) ? $instance['animetime'] : '0.1';

		include ( plugin_dir_path(__FILE__).'tpl/main-news-1.php' );

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {

	}

	

}

Plugin::instance()->widgets_manager->register_widget_type( new magzma_main_news_1() );