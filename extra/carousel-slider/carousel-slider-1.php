<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_carousel_slider_1 extends Widget_Base {

	public function get_name() {
		return 'magzma-carousel-slider-1';
	}

	public function get_title() {
		return __( 'Magzma Carousel 1', 'magzma' );
	}

	public function get_icon() {
		// Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
		return 'eicon-slider-album';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {

		/*=========== POST SETTING ===========*/
		$this->start_controls_section(
			'section_magzma_carousel_post_1',
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

		/*===========STYLE Setting=============*/

		$this->start_controls_section(
		'section_magzma_style',
			[
				'label' => __( 'Style Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => __( 'Overlay Background Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => 'rgba(255, 255, 255, 0.8)',
				'selectors' => [
					'{{WRAPPER}} .text-overlay' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .text-overlay' => 'top: {{SIZE}}{{UNIT}};',
				],
				'description' => __( 'Drag the slider to change vertical align of post text inside image.', 'magzma' ),
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
					'{{WRAPPER}} .carousel-slider .category-feature-slider a, .carousel-slider .category-feature-slider ul.post-categories li' => 'color: {{VALUE}};',
				],
				'condition' => [
					'use_category' => 'on',
				],
			]
		);

		$this->add_control(
			'category_border_color',
			[
				'label' => __( 'Category Background Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .carousel-slider .category-feature-slider ul.post-categories li' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .carousel-slider .category-feature-slider a' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .carousel-slider .category-feature-slider a' => 'font-size: {{SIZE}}{{UNIT}};',
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
				'default' => '500',
				'options' => [
					'300' => __( 'Thin', 'magzma' ),
					'400'=> __( 'Semi Thin', 'magzma' ),
					'500'=> __( 'Normal', 'magzma' ),
					'600'=> __( 'Semi Bold', 'magzma' ),
					'700'=> __( 'Bold', 'magzma' ),
				],
				'selectors' => [
					'{{WRAPPER}} .carousel-slider .category-feature-slider a' => 'font-weight: {{VALUE}};',
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
					'{{WRAPPER}} .carousel-slider .text-overlay-title a h4, .carousel-slider .text-overlay-title a h4:after' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .carousel-slider .text-overlay-title a h4' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .carousel-slider .text-overlay-title a h4' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .carousel-slider .text-overlay-title a h4' => 'font-weight: {{VALUE}};',
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
					'{{WRAPPER}} .carousel-slider .text-overlay-title a h4' => 'min-height: {{VALUE}}px',
				],
				'condition' => [
					'use_title' => 'on',
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
					'{{WRAPPER}} .excerpt' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .excerpt' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .excerpt' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .excerpt' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_excerpt' => 'on',
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
				'default' => 'rgba(0,0,0,0.7)',
				'selectors' => [
					'{{WRAPPER}} .text-overlay span' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .text-overlay span' => 'line-height: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .text-overlay span' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .text-overlay span' => 'font-weight: {{VALUE}};',
				],
				'condition' => [
					'use_date' => 'on',
				],
			]
		);

		$this->end_controls_section();

		/*=========== LAYOUT SETTING ===========*/

		$this->start_controls_section(
			'section_magzma_carousel_options',
			[
				'label' => __( 'Carousel Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'choose_column',
			[
				'label' => __( 'Column', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 3,
				'options' => [
					'auto' => __( 'auto', 'magzma' ),
					1 => __( '1', 'magzma' ),
					2 => __( '2', 'magzma' ),
					3 => __( '3', 'magzma' ),
					4 => __( '4', 'magzma' ),
					5 => __( '5', 'magzma' ),
				],
				'description' => __( 'Number of slides per view (slides visible at the same time on slider&#39;s container)', 'magzma' ),
			]
		);

		$this->add_control(
			'choose_column_mobile',
			[
				'label' => __( 'Column (on mobile)', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 1,
				'options' => [
					1 => __( '1', 'magzma' ),
					2 => __( '2', 'magzma' ),
					3 => __( '3', 'magzma' ),
					4 => __( '4', 'magzma' ),
					5 => __( '5', 'magzma' ),
				],
				'description' => __( 'Number of slides per view (slides visible at the same time on slider&#39;s container)', 'magzma' ),
			]
		);

		$this->add_control(
			'column_gap',
			[
				'label' => __( 'Carousel Column Gap', 'magzma' ),
				'description' => __( 'Space between carousel items.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '0',			
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
			]
		);

		$this->add_control(
			'height',
			[
				'label' => __( 'Height', 'magzma' ),
				'type' => Controls_Manager::TEXT,
				'default' => '600',
				'title' => __( 'Enter some text', 'magzma' ),
				'description' => __( 'Crop your image height and also your post height.', 'magzma' ),
			]
		);

		/* navigation */
		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => __( 'None', 'magzma' ),
					'arrows-dots' => __( 'Arrows and Dots', 'magzma' ),
					'arrows' => __( 'Arrows', 'magzma' ),
					'dots' => __( 'Dots', 'magzma' ),
				],
				'description' => __( 'Select your navigation type.', 'magzma' ),
			]
		);

		$this->add_control(
			'navigation_arrows_color',
			[
				'label' => __( 'Navigation Arrows Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .swiper-button-next:before, .swiper-button-prev:before' => 'color: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'arrows-dots', 'arrows' ],
				],
			]
		);

		$this->add_control(
			'navigation_dots_color',
			[
				'label' => __( 'Navigation Dots Color', 'magzma' ),
				'type' => Controls_Manager::COLOR,	
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination-bullet-active' => 'background: {{VALUE}};',
				],
				'condition' => [
					'navigation' => [ 'arrows-dots', 'dots' ],
				],
			]
		);

		/* auto opt */
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'slide-autoplay-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __( 'Make your slider auto play.', 'magzma' ),
			]
		);

		$this->add_control(
			'autoplay_ms',
			[
				'label' => __( 'Next Slide On', 'magzma' ),
				'description' => __( 'Delay between transitions (in ms). If this parameter is not specified, auto play will be disabled.', 'magzma' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '1500',
				'condition' => [
					'autoplay' => 'use',
				],			
			]
		);

		$this->add_control(
			'auto_loop',
			[
				'label' => __( 'Slides Loop', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'slide-loop-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __( 'Make your slider loop your items.', 'magzma' ),
			]
		);

		/* misc */
		$this->add_control(
			'keyboard_nav',
			[
				'label' => __( 'Keyboard Control', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'slide-keyboard-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __( 'Allow to navigate the slide using keyboard arrows.', 'magzma' ),
			]
		);

		$this->add_control(
			'centered_slide',
			[
				'label' => __( 'Centered Slides', 'magzma' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => '',
				'prefix_class' => 'slide-centered-',
				'label_on' => 'Use',
				'label_off' => 'No',
				'return_value' => 'use',
				'description' => __( 'Allow to make centered slides.', 'magzma' ),
			]
		);

		$this->add_control(
			'effect_type',
			[
				'label' => __( 'Effect Type', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => __( 'Slide', 'magzma' ),
					'fade' => __( 'Fade', 'magzma' ),
					'cube' => __( 'Cube', 'magzma' ),
					'coverflow' => __( 'Coverflow', 'magzma' ),
					'flip' => __( 'Flip', 'magzma' ),
				],
				'description' => __( 'Select your slider slide effect.', 'magzma' ),
			]
		);

		$this->end_controls_section();


	}

	protected function render( $instance = [] ) {
		$instance = $this->get_settings();

		// get our input from the widget settings.
		$rand1 = rand();
		$post_per_page = ! empty( $instance['posts_per_page'] ) ? (int)$instance['posts_per_page'] : 6;
		$offset = ! empty( $instance['offset'] ) ? (int)$instance['offset'] : '0';
		$category = ! empty( $instance['category'] ) ? $instance['category'] : '';
		$orderby = ! empty( $instance['orderby'] ) ? $instance['orderby'] : '';
		$metakey = ! empty( $instance['metakey'] ) ? $instance['metakey'] : 'Views';

		// Style Setting
		$width 				= ! empty( $instance['width'] ) ? (int)$instance['width'] : 600;
		$height 			= ! empty( $instance['height'] ) ? (int)$instance['height'] : 600;
		$excerpt_value		= ! empty( $instance['excerpt_value'] ) ? (int)$instance['excerpt_value'] : 20;
		$use_category		=  $instance['use_category'];
		$use_title			=  $instance['use_title'];
		$use_excerpt		=  $instance['use_excerpt'];
		$use_date			=  $instance['use_date'];

		/*layout*/
		$choose_column 			= ! empty( $instance['choose_column'] ) ? $instance['choose_column'] : 3;
		$choose_column_mobile 	= ! empty( $instance['choose_column_mobile'] ) ? $instance['choose_column_mobile'] : 1;	
		$column_gap 			= ! empty( $instance['column_gap'] ) ? $instance['column_gap'] : '0';		
		
		$navigation 	=  $instance['navigation'];
		$autoplay 		=  $instance['autoplay'];
		$autoplay_ms 	= ! empty( $instance['autoplay_ms'] ) ? (int)$instance['autoplay_ms'] : 1500;
		$auto_loop 		=  $instance['auto_loop'];
		$keyboard_nav	=  $instance['keyboard_nav'];
		$centered_slide	=  $instance['centered_slide'];
		$effect_type 	= ! empty( $instance['effect_type'] ) ? $instance['effect_type'] : 'Slide';


		include ( plugin_dir_path(__FILE__).'tpl/carousel-1.php' );



		?>


		<?php

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}


Plugin::instance()->widgets_manager->register_widget_type( new magzma_carousel_slider_1() );