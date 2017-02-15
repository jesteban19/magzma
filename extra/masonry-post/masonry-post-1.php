<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_masonry_post_1 extends Widget_Base {

	public function get_name() {
		return 'magzma-masonry-post-1';
	}

	public function get_title() {
		return __( 'Magzma Masonry 1', 'magzma' );
	}

	public function get_icon() {
		return 'eicon-gallery-masonry';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {


		/*===========GENERAL CONTROL=============*/

		$this->start_controls_section(
			'section_magzma_masonry_post_1',
			[
				'label' => __( 'Post Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label' => __( 'Post per Block', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '6',
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

		/*===========STYLE Setting=============*/

		$this->start_controls_section(
		'section_magzma_style_masonry_1',
			[
				'label' => __( 'Style Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'choose_column',
			[
				'label' => __( 'Column', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					2 => __( '2', 'magzma' ),
					3 => __( '3', 'magzma' ),
					4 => __( '4', 'magzma' ),
					5 => __( '5', 'magzma' ),
				]
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
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .loop-content .category a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_border_color',
			[
				'label' => __( 'Category Border Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .loop-content .category:after' => 'background-color: {{VALUE}};',
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
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .loop-content .category a:hover' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .loop-content .category a' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .loop-content .category a' => 'font-size: {{SIZE}}{{UNIT}};',
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
				'default' => '700',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .loop-content .category a' => 'font-weight: {{VALUE}};',
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
					'{{WRAPPER}} .loop-content h4.title' => 'color: {{VALUE}};',
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
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .loop-content h4.title a:hover' => 'color: {{VALUE}};',
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
					'size' => 1.3,
					'unit' => 'em',
				],
				'range' => [
					'px' => [
						'min' => 1,
					],
				],
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .loop-content h4.title' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .loop-content h4.title' => 'font-size: {{SIZE}}{{UNIT}};',
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
				'default' => '500',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .loop-content h4.title' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_title' => 'on',
				],
			]
		);

		/*=========== date ===========*/

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
				'default' => '#888888',
				'selectors' => [
					'{{WRAPPER}} .loop-content .date' => 'color: {{VALUE}};',
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
				'default' => '#888888',
				'selectors' => [
					'{{WRAPPER}} .loop-content .date:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'date_line_height',
			[
				'label' => __( 'Date Line Height', 'magzma' ),
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
					'{{WRAPPER}} .loop-content .date' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'date_font_size',
			[
				'label' => __( 'Date Font Size', 'magzma' ),
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
					'{{WRAPPER}} .loop-content .date' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'date_font_weight',
			[
				'label' => __( 'Date Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .loop-content .date' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_date' => 'on',
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
				'default' => '30',
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
				'default' => '#666666',
				'selectors' => [
					'{{WRAPPER}} .post-excerpt p' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .post-excerpt p' => 'line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_excerpt' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'excerpt1_font_size',
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
					'{{WRAPPER}} .post-excerpt p' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .post-excerpt' => 'font-weight: {{VALUE}};',
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
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .more-button a.more' => 'color: {{VALUE}};',
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
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .more-button a.more:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Button Background Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#61c436',
				'selectors' => [
					'{{WRAPPER}} .more-button a.more' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_control(
			'button_bg_hover_color',
			[
				'label' => __( 'Button Background Hover Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#f1f1f1',
				'selectors' => [
					'{{WRAPPER}} .more-button a.more:hover' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .more-button a.more' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'size' => 11,
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
					'{{WRAPPER}} .more-button a.more' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->add_responsive_control(
			'button_font_weight',
			[
				'label' => __( ' Button Font Weight', 'magzma' ),
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
					'{{WRAPPER}} .more-button a.more' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_button' => 'on',
				],
			]
		);

		$this->end_controls_section();

		/*===========ANIMATION=============*/

		$this->start_controls_section(
			'section_magzma_main_news_3_animation_control',
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

		$category = ! empty( $instance['category'] ) ? $instance['category'] : '';
		$offset = ! empty( $instance['offset'] ) ? (int)$instance['offset'] : '';
		$choose_column = ! empty( $instance['choose_column'] ) ? $instance['choose_column'] : 3;
		$post_per_page = ! empty( $instance['posts_per_page'] ) ? (int)$instance['posts_per_page'] : 6;
		$orderby = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date';
		$metakey = ! empty( $instance['metakey'] ) ? $instance['metakey'] : 'Views';

		// Style Setting
		$excerpt_value		= ! empty( $instance['excerpt_value'] ) ? (int)$instance['excerpt_value'] : 30;
		$use_category		=  $instance['use_category'];
		$use_title			=  $instance['use_title'];
		$use_date			=  $instance['use_date'];
		$use_excerpt		=  $instance['use_excerpt'];
		$use_button			=  $instance['use_button'];

		/* ANIMATION SETTING */
		$animation = ! empty( $instance['animate'] ) ? $instance['animate'] : '';
		$anime_time = ! empty( $instance['animetime'] ) ? $instance['animetime'] : '0.1';

		include ( plugin_dir_path(__FILE__).'tpl/masonry-1.php' );



		?>

		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}

Plugin::instance()->widgets_manager->register_widget_type( new magzma_masonry_post_1() );