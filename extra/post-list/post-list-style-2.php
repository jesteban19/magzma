<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_post_list_2 extends Widget_Base {

	public function get_name() {
		return 'magzma-post-list-2';
	}

	public function get_title() {
		return __( 'Magzma Post List 2', 'magzma' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_magzma_post_list_2_post_setting',
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
				'default' => 'loop-infinte-list-2',
				'title' => __( 'Enter some text', 'magzma' ),
				'description' => __( 'This class will avoid class conflict between post list query (must be different!).', 'magzma' ),
				'condition' => [
                    'use_infinite_scroll' => 'use',
                ],
			]
		);

		$this->end_controls_section();


		/*=========== STYLE Setting =============*/

		$this->start_controls_section(
			'section_magzma_post_list_2_post_control',
			[
				'label' => __( 'Style Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'width',
			[
				'label' => __( 'Width', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '700',
				'title' => __( 'Enter some text', 'magzma' ),
			]
		);

		$this->add_control(
			'height',
			[
				'label' => __( 'Height', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '500',
				'title' => __( 'Enter some text', 'magzma' ),
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
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_title_hov_color',
			[
				'label' => __( 'Category Title Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_bg_hov_color',
			[
				'label' => __( 'Category Background Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .standard-post-categories .post-categories a:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'category_line_height',
			[
				'label' => __( 'Category Line Height', 'magzma' ),
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
					'{{WRAPPER}} .standard-post-categories .post-categories a' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'category_font_size',
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
					'use_category' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'category_font_weight',
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
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-content h3.blog-title a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_title_hov_color',
			[
				'label' => __( 'Title Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-content h3.blog-title a:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_line_height',
			[
				'label' => __( 'Title Line Height', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1.25,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-content h3.blog-title' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_font_size',
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
					'{{WRAPPER}} .post-list-2-inner-content .post-content h3.blog-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'title_font_weight',
			[
				'label' => __( 'Title Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .post-list-2-inner-content .post-content h3.blog-title' => 'font-weight: {{VALUE}};',
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
					'{{WRAPPER}} .post-list-2-inner-content .post-content h3.blog-title' => 'min-height: {{VALUE}}px',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		/*=========== Meta ===========*/

		$this->add_control(
			'use_meta',
			[
				'label' => __( 'Use Meta', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'typhography_meta_color',
			[
				'label' => __( 'Meta Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => 'rgba(0,0,0,0.7)',
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-meta .post-author-name, .post-list-2-inner-content .post-meta .post-date, .post-list-2-inner-content .post-meta .time-read' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_meta' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'meta_line_height',
			[
				'label' => __( 'Meta Line Height', 'magzma' ),
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
					'{{WRAPPER}} .post-list-2-inner-content .post-meta .post-author-name, .post-list-2-inner-content .post-meta .post-date, .post-list-2-inner-content .post-meta .time-read' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_meta' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'meta_font_size',
			[
				'label' => __( 'Meta Font Size', 'magzma' ),
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
					'{{WRAPPER}} .post-list-2-inner-content .post-meta .post-author-name, .post-list-2-inner-content .post-meta .post-date, .post-list-2-inner-content .post-meta .time-read' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_meta' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'meta_font_weight',
			[
				'label' => __( 'Meta Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '700',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-meta .post-author-name, .post-list-2-inner-content .post-meta .post-date, .post-list-2-inner-content .post-meta .time-read' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_meta' => 'on',
				],
			]
		);

		/*=========== excerpt ===========*/

		$this->add_control(
			'use_excerpt',
			[
				'label' => __( 'Use Excerpt', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'excerpt_value',
			[
				'label' => __( 'Excerpt Word to Show', 'magzma' ),
				'description' => __( 'Insert a value to set your excerpt words.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
				'condition' => [
					'use_excerpt' => 'on',
				],
			]
		);

		$this->add_control(
			'typhography_excerpt_color',
			[
				'label' => __( 'Excerpt Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => 'rgba(0,0,0,0.7)',
				'selectors' => [
					'{{WRAPPER}} .post-content p' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_excerpt' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'excerpt_line_height',
			[
				'label' => __( 'Excerpt Line Height', 'magzma' ),
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
					'{{WRAPPER}} .post-content p' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_excerpt' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'excerpt_font_size',
			[
				'label' => __( 'Excerpt Font Size', 'magzma' ),
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
					'{{WRAPPER}} .post-content p' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_excerpt' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'excerpt_font_weight',
			[
				'label' => __( 'Excerpt Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .post-content p' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_excerpt' => 'on',
				],
			]
		);

		/*============= button =============*/

		$this->add_control(
			'use_button',
			[
				'label' => __( 'Use Button', 'magzma' ),
				'type' => Controls_Manager::CHECKBOX,	
				'default' => 'on',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Button Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} a.read-more' => 'color: {{VALUE}}; border-bottom: 2px solid {{VALUE}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Button Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} a.read-more:hover' => 'color: {{VALUE}}; border-bottom: 2px solid {{VALUE}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'button_line_height',
			[
				'label' => __( 'Button Line Height', 'magzma' ),
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
					'{{WRAPPER}} .post-list-2-inner-content a.read-more' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'button_font_size',
			[
				'label' => __( 'Button Font Size', 'magzma' ),
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
					'{{WRAPPER}} .post-list-2-inner-content a.read-more' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'button_font_weight',
			[
				'label' => __( 'Button Font Weight', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => '700',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content a.read-more' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->end_controls_section();


		//=====LAYOUT SETTING=====//

		$this->start_controls_section(
			'section_magzma_post_list_2_column_control',
			[
				'label' => __( 'Layout Setting', 'magzma' ),
			]
		);

		$this->add_responsive_control(
			'content_half',
			[
				'label' => __( 'Image Width', 'magzma' ),
				'description' => __( 'This value will effected to image section.', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 60,
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-block' => 'width: {{SIZE}}{{UNIT}};',
				],	
			]
		);

		$this->add_responsive_control(
			'content_half_2',
			[
				'label' => __( 'Content', 'magzma' ),
				'description' => __( 'This value will effected to content section.', 'magzma' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40,
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content .post-content' => 'width: {{SIZE}}{{UNIT}};',
				],	
			]
		);

		$this->add_control(
			'post_margin_bottom',
			[
				'label' => __( 'Margin Bottom Post', 'magzma' ),
				'description' => __( 'Margin bottom for each item inside this block.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '20',
				'selectors' => [
					'{{WRAPPER}} .post-list-2-inner-content' => 'margin-bottom: {{VALUE}}px;',
				],	
			]
		);

		$this->end_controls_section();

		/*Animation Setting*/

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
		
		$category = ! empty( $instance['category'] ) ? $instance['category'] : '';
		$post_per_page = ! empty( $instance['posts_per_page'] ) ? (int)$instance['posts_per_page'] : 1;
		$offset = ! empty( $instance['offset'] ) ? (int)$instance['offset'] : '';
		$orderby = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date';
		$metakey = ! empty( $instance['metakey'] ) ? $instance['metakey'] : 'Views';
		$use_infinite_scroll = $instance['use_infinite_scroll'];
		$loop_infinite_class = ! empty( $instance['loop_infinite_class'] ) ? $instance['loop_infinite_class'] : 'your-infinite-list-style-2';
		
		//image crop
		$width = ! empty( $instance['width'] ) ? (int)$instance['width'] : 700;
		$height = ! empty( $instance['height'] ) ? (int)$instance['height'] : 500;

		// animation
		$animation = ! empty( $instance['animate'] ) ? $instance['animate'] : '';
		$anime_time = ! empty( $instance['animetime'] ) ? $instance['animetime'] : '0.1';

		// conditional logic if use
		$use_category 		= $instance['use_category'];
		$use_title 			= $instance['use_title'];
		$use_meta 			= $instance['use_meta'];
		$use_excerpt 		= $instance['use_excerpt'];
		$use_button 		= $instance['use_button'];
		$excerpt_value 		= ! empty( $instance['excerpt_value'] ) ? (int)$instance['excerpt_value'] : 20;

		/* LAYOUT SETTING */


		include ( plugin_dir_path(__FILE__).'tpl/post-list-2.php' );

		?>


		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}


Plugin::instance()->widgets_manager->register_widget_type( new magzma_post_list_2() );