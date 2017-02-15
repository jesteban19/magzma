<?php
namespace Elementor;

function magzma_elementor_init(){
    Plugin::instance()->elements_manager->add_category(
        'magzma-category',
        [
            'title'  => 'Magzma Addons Element',
            'icon' => 'font'
        ],
        1
    );
}
add_action('elementor/init','Elementor\magzma_elementor_init');