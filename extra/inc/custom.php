<?php

function magzma_cf7_temp() {
    $wpcf7_array = array();

        $args = array(
            'post_type' => 'wpcf7_contact_form',
        );
        
        $wpcf7 = get_posts($args);

        foreach( $wpcf7 as $post ) { setup_postdata( $post );
            $wpcf7_array[$post->ID] = $post->post_title;
        } 

        return $wpcf7_array;



    wp_reset_postdata();
}

function magzma_get_category() {

/*$output_categories = array('All');*/
$categories = get_categories();

  foreach($categories as $category) { 
     $output_categories[$category->cat_ID] = $category->name;

}
return $output_categories;
}



function magzma_order_by() {


$magzma_orderby = array(

        'none'			=> 'none',
        'ID' 			=> 'ID',
        'author'		=> 'Author',
        'title'			=> 'Title',
        'name'			=> 'Name',
        'type'			=> 'Type',
        'date'			=> 'Date',
        'modified'		=> 'Modifiede Time',
        'parent'		=> 'Parent',
        'rand'			=> 'Random',
        'comment_count'	=> 'Total Comment',
        'menu_order'	=> 'Menu Order',
        'meta_value' 	=> 'Popular'


);

return $magzma_orderby;


}



function magzma_masonry_choose_column() {

			if($choose_column == 2) {
			    echo 'column-2';
			}

			elseif($choose_column == 3) {
			    echo 'column-3';
			}

			elseif($choose_column == 4) {
			    echo 'column-4';
			}

			elseif($choose_column == 5) {
			    echo 'column-5';
			}
}

add_action('elementor/element/after_section_end',function( $element, $current_section, $current_section_options){

	if(isset($_GET['disable_elementor'])){
		set_transient('magzma_disable_elementor', 'yes', 60);
	}
	if(get_transient('magzma_disable_elementor')){
		return;
	}

	if( $current_section == 'section_layout' &&  method_exists( $element, 'add_control' ) && method_exists( $element, 'start_controls_section' ) && method_exists( $element, 'end_controls_section' ) ) {

		$element->start_controls_section(
			'section_sticky_element',
			[
				'label' => __( 'Sticky Element', 'magzma' ),
				'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
                'hide_in_top' => true,
			]
		);

		$element->add_control(
			'sticky_element',
			[
				'label' =>esc_html__( 'Sticky Sidebar', 'magzma' ),
				'type' => Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => esc_html__( 'No', 'magzma' ),
					'sticky-yes' => esc_html__( 'Yes', 'magzma' ),
				],
				'prefix_class' => '',
				'label_block' => True,
				'title' => esc_html__( 'Choose if you want this widget to be sticky', 'magzma' ),
			]
		);


		$element->end_controls_section();
	}
}, 10, 3);


function magzma_sticky_option( $widget, $return, $instance ) { 

 
        // Display the sticky option.
        $sticky = isset( $instance['sticky'] ) ? $instance['sticky'] : 'sticky';
        ?>
            <p>
                <input class="checkbox" type="checkbox" id="<?php echo $widget->get_field_id('sticky'); ?>" name="<?php echo $widget->get_field_name('sticky'); ?>" <?php checked( true , $sticky ); ?> />
                <label for="<?php echo $widget->get_field_id('sticky'); ?>">
                    <?php _e( 'Sticky this widget', 'magzma' ); ?>
                </label>
            </p>
        <?php

}
add_filter('in_widget_form', 'magzma_sticky_option', 10, 3 );


function magzma_save_menu_sticky_option( $instance, $new_instance ) {
 
    // Is the instance a nav menu and are stickys enabled?
    if ( !empty( $new_instance['sticky'] ) ) {
        $new_instance['sticky'] = 1;
    }
 
    return $new_instance;
}
add_filter( 'widget_update_callback', 'magzma_save_menu_sticky_option', 10, 2 );


function magzma_sticky_widget_control( $params ) {
 
    $widget_calendar = get_option('widget_calendar'); 

    if ( !empty( $widget_calendar[$params[1]['number']]['sticky'] ) ) {


 		
		$classe_to_add = 'sticky-widget '; // make sure you leave a space at the end
        $classe_to_add = 'class=" '.$classe_to_add;
        $params[0]['before_widget'] = str_replace('class="',$classe_to_add,$params[0]['before_widget']);
    }

	$widget_archives = get_option('widget_archives'); 

    if ( !empty( $widget_archives[$params[1]['number']]['sticky'] ) ) {
 		
		$classe_to_add = 'sticky-widget '; // make sure you leave a space at the end
        $classe_to_add = 'class=" '.$classe_to_add;
        $params[0]['before_widget'] = str_replace('class="',$classe_to_add,$params[0]['before_widget']);
    }


	$widget_categories = get_option('widget_categories'); 

    if ( !empty( $widget_categories[$params[1]['number']]['sticky'] ) ) {

        //var_dump($params[0]);
 		
		$classe_to_add = 'sticky-widget '; // make sure you leave a space at the end
        $classe_to_add = 'class=" '.$classe_to_add;
        $params[0]['before_widget'] = str_replace('class="',$classe_to_add,$params[0]['before_widget']);
    }

    /*$widget_magzma_news = get_option('widget_magzma_news'); 

    if ( !empty( $widget_magzma_news[$params[1]['number']]['sticky'] ) ) {
        
        $classe_to_add = 'sticky-widget '; // make sure you leave a space at the end
        $classe_to_add = 'class=" '.$classe_to_add;
        $params[0]['before_widget'] = str_replace('class="',$classe_to_add,$params[0]['before_widget']);
    }*/




 
    // Return the unmodified $params.
    return $params;
}
add_filter( 'dynamic_sidebar_params', 'magzma_sticky_widget_control' );



function home_pagination( $query = null ) 
{
    global $wp_rewrite;

    if ( get_query_var('paged') ) {
        $paged = get_query_var('paged'); 
    } elseif ( get_query_var('page') ) { 
        $paged = get_query_var('page'); 
    } else { 
        $paged = 1; 
    }


    $pagination = array(            
        'base'      => $sec_hook( 'paged', '%#%' ),
        'format'    => '',
        'current'   => $paged,
        'total'     => $sec_hook->max_num_pages,
        'prev_text' => '&laquo; Previous',
        'next_text' => 'Next &raquo;',
    );

    if ( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ).'/%#%/', '' );

    if ( ! empty( $wp_query->query_vars['s'] ) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    return paginate_links( $pagination );
} 
