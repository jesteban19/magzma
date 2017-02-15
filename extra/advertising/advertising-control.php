<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_advertising_builder extends Widget_Base {

	public function get_name() {
		return 'magzma-advertising-builder';
	}

	public function get_title() {
		return __( 'Magzma Ads Builder', 'magzma' );
	}

	public function get_icon() {
		return 'eicon-image-box';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {

	/*===========STYLE CONTROL=============*/

		$this->start_controls_section(
			'section_magzma_advertising',
			[
				'label' => __( 'General Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'advertising_type',
			[
				'label' => __( 'Type of Advertising', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'image_and_url',
				'options' => [
					'image_and_url' => __( 'Image and Url', 'magzma' ),
					'script'=> __( 'Script', 'magzma' ),
				],
			
				
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'magzma' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
                    'advertising_type' => 'image_and_url',
                ],
			]
		);

		$this->add_control(
			'image_ad_size',
			[
				'label' => __( 'Image Size', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'full',
				'options' => [
					'full' => __( 'Full', 'magzma' ),
					'300' => __( '300 Pixel Square', 'magzma' ),
					'125' => __( '125 Pixel Square', 'magzma' ),
					'160' => __( '160 x 600 Pixel', 'magzma' ),
					'120' => __( '120 x 600 Pixel', 'magzma' ),
				],
				'condition' => [
                    'advertising_type' => 'image_and_url',
                ],
			]
		);

		$this->add_control(
			'link_to',
			[
				'label' => __( 'Link to', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => __( 'None', 'magzma' ),
					'custom' => __( 'Custom URL', 'magzma' ),
				],
				'condition' => [
                    'advertising_type' => 'image_and_url',
                ],
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link to', 'magzma' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'http://your-link.com', 'magzma' ),
				'condition' => [
					'link_to' => 'custom',
				],
				'show_label' => false,
			]
		);

		$this->add_control(
			'ad_script',
			[
				'label' => __( 'Ad Script', 'magzma' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your script', 'magzma' ),
				'condition' => [
                    'advertising_type' => 'script',
                ],
			]
		);

		$this->add_control(
			'sticky_ads',
			[
				'label' =>esc_html__( 'Sticky Ads', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'no' => esc_html__( 'No', 'magzma' ),
					'yes' => esc_html__( 'Yes', 'magzma' ),
				],
				'prefix_class' => 'sticky-widget-',
				'label_block' => true,
				'title' => esc_html__( 'Choose if you want this ad to be sticky', 'magzma' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$instance = $this->get_settings();
		$ad_type = ! empty( $instance['ad_type'] ) ? $instance['ad_type'] : 'image_and_url';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';
		$link = ! empty( $instance['link'] ) ? $instance['link'] : '';
		$ad_script = ! empty( $instance['ad_script'] ) ? $instance['ad_script'] : '';
		$img_size = ! empty( $instance['image_ad_size'] ) ? $instance['image_ad_size'] : 'full';

		include ( plugin_dir_path(__FILE__).'tpl/advertising.php' );

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {

	}

}

Plugin::instance()->widgets_manager->register_widget_type( new magzma_advertising_builder() );