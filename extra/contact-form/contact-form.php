<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class magzma_contact_form extends Widget_Base {

	public function get_name() {
		return 'magzma-contact-form';
	}

	public function get_title() {
		return __( 'Magzma Contact Form', 'magzma' );
	}

	public function get_icon() {
		return 'eicon-form-horizontal';
	}

	public function get_categories() {
		return [ 'magzma-category' ];
	}

	protected function _register_controls() {

		/*===========NEWS CONTROL=============*/

		$this->start_controls_section(
			'section_magzma_contact_form_general_control',
			[
				'label' => __( 'Form Setting', 'magzma' ),
			]
		);

		$this->add_control(
			'form_select',
			[
				'label' => __( 'Contact Form 7', 'magzma' ),
				'type' => Controls_Manager::SELECT,
				'default' => [],
				'options' => magzma_cf7_temp(),
				'description' => __( 'List of your available contact form 7 template.', 'magzma' ),
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$instance = $this->get_settings();

		include ( plugin_dir_path(__FILE__).'tpl/contact-form-block.php' );

	}

	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {

	}

}

Plugin::instance()->widgets_manager->register_widget_type( new magzma_contact_form() );