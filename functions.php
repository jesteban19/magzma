<?php

// Create a helper function for easy SDK access.
function mag_fs()
{
    global  $mag_fs ;
    
    if ( !isset( $mag_fs ) ) {
        // Include Freemius SDK.
        require_once dirname( __FILE__ ) . '/freemius/start.php';
        $mag_fs = fs_dynamic_init( array(
            'id'             => '695',
            'slug'           => 'magzma',
            'type'           => 'theme',
            'public_key'     => 'pk_c080c9ae0260782dc4190b35fd883',
            'is_premium'     => false,
            'has_addons'     => false,
            'has_paid_plans' => true,
            'menu'           => array(
            'slug'    => 'magzma-about',
            'support' => false,
            'parent'  => array(
            'slug' => 'themes.php',
        ),
        ),
            'is_live'        => true,
        ) );
    }
    
    return $mag_fs;
}

// Init Freemius.
mag_fs();
//Set the content width based on the theme's design and stylesheet.
if ( !isset( $content_width ) ) {
    $content_width = 1200;
}
/* pixels */
/*-----------------------------------------------------------------------------------*/
/*  SETUP THEME
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'magzma_setup' ) ) {
    function magzma_setup()
    {
        // several theme support
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'custom-background' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
        add_theme_support( 'html5', array( 'gallery', 'caption' ) );
        load_theme_textdomain( 'magzma', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo', array(
            'flex-width'  => true,
            'flex-height' => true,
        ) );
        if ( is_admin() ) {
            require get_template_directory() . '/inc/admin/about-theme/about-theme.php';
        }
    }

}
add_action( 'after_setup_theme', 'magzma_setup' );
/*-----------------------------------------------------------------------------------*/
/*  SCRIPTS & STYLES
/*-----------------------------------------------------------------------------------*/
function magzma_scripts()
{
    //All necessary CSS
    wp_enqueue_style(
        'magzma-plugin-css',
        get_template_directory_uri() . '/css/plugin.css',
        array(),
        null
    );
    wp_enqueue_style(
        'magzma-responsive-css',
        get_template_directory_uri() . '/css/responsive.css',
        array(),
        null
    );
    wp_enqueue_style( 'magzma-style', get_stylesheet_uri(), array( 'magzma-plugin-css' ) );
    wp_enqueue_style(
        'magzma-font',
        get_template_directory_uri() . '/css/font.css',
        array(),
        null
    );
    //All Necessary Script
    //wp_enqueue_script( 'magzma-love-it', get_template_directory_uri() . '/js/love-it.js', array( 'jquery' ) );
    wp_enqueue_script(
        'magzma-plugins',
        get_template_directory_uri() . '/js/plugin.js',
        array( 'jquery' ),
        '',
        false
    );
    wp_enqueue_script(
        'magzma-main-js',
        get_template_directory_uri() . '/js/main.js',
        array( 'jquery', 'masonry' ),
        '',
        true
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'magzma_scripts' );
function magzma_customizer_live_preview()
{
    wp_enqueue_script(
        'magzma-magzma-customizer',
        get_template_directory_uri() . '/js/magzma-customizer.js',
        array( 'jquery', 'customize-preview' ),
        NULL,
        true
    );
    wp_enqueue_script(
        'magzma-color-customizer',
        get_template_directory_uri() . '/js/color-customizer.js',
        array( 'jquery', 'customize-preview' ),
        NULL,
        true
    );
}

add_action( 'customize_preview_init', 'magzma_customizer_live_preview' );
add_action( 'admin_enqueue_scripts', 'magzma_ads_wdscript' );
function magzma_ads_wdscript()
{
    wp_enqueue_media();
    wp_enqueue_script(
        'magzma_ads_script',
        get_template_directory_uri() . '/js/ads.js',
        false,
        '1.0',
        true
    );
}

/*-----------------------------------------------------------------------------------*/
/*  FONT SCRIPTS
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/*  CALL FRAMEWORK
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory() . '/extra/import-function.php';
require_once get_template_directory() . '/inc/option/panel/config-free.php';
/*-----------------------------------------------------------------------------------*/
/*  MENU
/*-----------------------------------------------------------------------------------*/
//Register Menus
add_action( 'after_setup_theme', 'magzma_register_my_menu' );
function magzma_register_my_menu()
{
    register_nav_menu( 'header-menu', esc_html__( 'Header Menu', 'magzma' ) );
    register_nav_menu( 'top-menu', esc_html__( 'Top Menu', 'magzma' ) );
    register_nav_menu( 'footer-menu', esc_html__( 'Footer Menu', 'magzma' ) );
}

//TOP MENU
function magzma_top_nav_menu()
{
    wp_nav_menu( array(
        'theme_location' => 'top-menu',
        'container'      => 'ul',
        'menu_class'     => 'sm sm-clean topbar-menu',
        'fallback_cb'    => 'magzma_top_menu_cb',
    ) );
}

function magzma_main_nav_menu()
{
    wp_nav_menu( array(
        'theme_location' => 'header-menu',
        'container'      => 'ul',
        'menu_class'     => 'sm sm-clean',
        'fallback_cb'    => 'magzma_header_menu_cb',
    ) );
}

function magzma_footer_nav_menu()
{
    wp_nav_menu( array(
        'theme_location' => 'footer-menu',
        'container'      => 'ul',
        'menu_class'     => 'footer-menu',
        'fallback_cb'    => 'magzma_footer_menu_cb',
    ) );
}

// FALLBACK IF PRIMARY MENU HAVEN'T SET YET
function magzma_top_menu_cb()
{
    echo  '<ul class="top-nav-menu sm sm-clean" id="menu-top-menu">' ;
    wp_list_pages( 'title_li=' );
    echo  '</ul>' ;
}

function magzma_header_menu_cb()
{
    echo  '<ul id="menu-top-menu" class="menus sm sm-clean">' ;
    wp_list_pages( 'title_li=' );
    echo  '</ul>' ;
}

/*-----------------------------------------------------------------------------------*/
/*  HEADER
/*-----------------------------------------------------------------------------------*/
// logo text or image huh?
function magzma_logo_type()
{
    $options = get_option( 'magzma_framework' );
    $logo = '';
    
    if ( isset( $options['logo_upload'] ) ) {
        $logo = $options['logo_upload'];
        $upload_logo = $logo['url'];
    }
    
    
    if ( !empty($upload_logo) ) {
        ?>

    <div class="logo-image">
    <a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
"><img src="<?php 
        echo  esc_url( $upload_logo ) ;
        ?>
" class="image-logo" alt="<?php 
        esc_html_e( 'logo', 'magzma' );
        ?>
" /></a>
    </div>
    
    <?php 
    } else {
        ?>
 
    
    <div class="logo-title">
        <h2 class="site-title">
            <a href="<?php 
        echo  esc_url( home_url( '/' ) ) ;
        ?>
" rel="home"><?php 
        bloginfo( 'name' );
        ?>
</a>
        </h2>
    </div>

<?php 
    }

}

/*-----------------------------------------------------------------------------------*/
/*  BREADCRUMBS
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory() . '/inc/function/breadcrumbs.php';
/*-----------------------------------------------------------------------------------*/
/*  WIDGET
/*-----------------------------------------------------------------------------------*/
// SETUP DEFAULT SIDEBAR
function magzma_widgets_init()
{
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'magzma' ),
        'id'            => 'primary-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title"><span>',
        'after_title'   => '</span></h4>',
    ) );
}

add_action( 'widgets_init', 'magzma_widgets_init' );
require_once get_template_directory() . '/inc/widgets/magzma-social-widget.php';
/*-----------------------------------------------------------------------------------*/
/*  PAGINATION
/*-----------------------------------------------------------------------------------*/
function magzma_pagination( $pages = '', $range = 2 )
{
    $showitems = $range * 2 + 1;
    global  $paged ;
    if ( empty($paged) ) {
        $paged = 1;
    }
    
    if ( $pages == '' ) {
        global  $wp_query ;
        $pages = $wp_query->max_num_pages;
        if ( !$pages ) {
            $pages = 1;
        }
    }
    
    
    if ( 1 != $pages ) {
        echo  '<div class=\'pagination col-md-12 text-center\'>' ;
        if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages ) {
            echo  '<a href=\'' . get_pagenum_link( 1 ) . '\'>First</a>' ;
        }
        if ( $paged > 1 && $showitems < $pages ) {
            echo  '<a href=\'' . get_pagenum_link( $paged - 1 ) . '\'>&lsaquo;</a>' ;
        }
        for ( $i = 1 ;  $i <= $pages ;  $i++ ) {
            if ( 1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems) ) {
                echo  ( $paged == $i ? '<span class=\'current\'>' . $i . '</span>' : '<a href=\'' . get_pagenum_link( $i ) . '\' class=\'inactive\' >' . $i . '</a>' ) ;
            }
        }
        if ( $paged < $pages && $showitems < $pages ) {
            echo  '<a href=\'' . get_pagenum_link( $paged + 1 ) . '\'>&rsaquo;</a>' ;
        }
        if ( $paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages ) {
            echo  '<a href=\'' . get_pagenum_link( $pages ) . '\'>Last</a>' ;
        }
        echo  '</div>
' ;
    }

}

/*-----------------------------------------------------------------------------------*/
/*  PLACEHOLDER
/*-----------------------------------------------------------------------------------*/
/* Add Placehoder in comment Form Fields (Name, Email, Website) */
add_filter( 'comment_form_default_fields', 'magzma_comment_placeholders' );
function magzma_comment_placeholders( $fields )
{
    $fields['author'] = str_replace( '<input', '<input placeholder="' . esc_html__( 'Your Name', 'magzma' ) . '"', $fields['author'] );
    $fields['email'] = str_replace( '<input', '<input placeholder="' . esc_html__( 'Your Email', 'magzma' ) . '"', $fields['email'] );
    $fields['url'] = str_replace( '<input', '<input placeholder="' . esc_html__( 'Website URL', 'magzma' ) . '"', $fields['url'] );
    return $fields;
}

/* Add Placehoder in comment Form Field (Comment) */
add_filter( 'comment_form_defaults', 'magzma_textarea_placeholder' );
function magzma_textarea_placeholder( $fields )
{
    $fields['comment_field'] = str_replace( '<textarea', '<textarea placeholder="' . esc_html__( 'Your thoughts..', 'magzma' ) . '"', $fields['comment_field'] );
    return $fields;
}

/*-----------------------------------------------------------------------------------*/
/*  POST VIEWERS
/*-----------------------------------------------------------------------------------*/
//Set the Post Custom Field in the WP dashboard as Name/Value pair
function magzma_bac_PostViews( $post_ID )
{
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count';
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta( $post_ID, $count_key, true );
    //If the the Post Custom Field value is empty.
    
    if ( $count == '' ) {
        $count = 0;
        // set the counter to zero.
        //Delete all custom fields with the specified key from the specified post.
        delete_post_meta( $post_ID, $count_key );
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta( $post_ID, $count_key, '0' );
        return $count . esc_html__( ' View', 'magzma' );
    } else {
        $count++;
        //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta( $post_ID, $count_key, $count );
        //If statement, is just to have the singular form 'View' for the value '1'
        
        if ( $count == '1' ) {
            return $count . esc_html__( ' View', 'magzma' );
        } else {
            return $count . esc_html__( ' View', 'magzma' );
        }
    
    }

}

//Gets the  number of Post Views to be used later.
function magzma_get_PostViews( $post_ID )
{
    $count_key = 'post_views_count';
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta( $post_ID, $count_key, true );
    return $count;
}

//Function that Adds a 'Views' Column to your Posts tab in WordPress Dashboard.
function magzma_post_column_views( $newcolumn )
{
    //Retrieves the translated string, if translation exists, and assign it to the 'default' array.
    $newcolumn['post_views'] = esc_html__( 'Views', 'magzma' );
    return $newcolumn;
}

//Function that Populates the 'Views' Column with the number of views count.
function magzma_post_custom_column_views( $column_name, $id )
{
    if ( $column_name === 'post_views' ) {
        // Display the Post View Count of the current post.
        // get_the_ID() - Returns the numeric ID of the current post.
        echo  magzma_get_PostViews( get_the_ID() ) ;
    }
}

//Hooks a function to a specific filter action.
//applied to the list of columns to print on the manage posts screen.
add_filter( 'manage_posts_columns', 'magzma_post_column_views' );
//Hooks a function to a specific action.
//allows you to add custom columns to the list post/custom post type pages.
//'10' default: specify the function's priority.
//and '2' is the number of the functions' arguments.
add_action(
    'manage_posts_custom_column',
    'magzma_post_custom_column_views',
    10,
    2
);
remove_action(
    'wp_head',
    'adjacent_posts_rel_link_wp_head',
    10,
    0
);
/*-----------------------------------------------------------------------------------*/
/*  CUSTOM FUNCTIONS
/*-----------------------------------------------------------------------------------*/
require_once get_template_directory() . '/inc/function/custom.php';
require_once get_template_directory() . '/inc/function/navigation.php';
require_once get_template_directory() . '/inc/function/aq_resizer.php';
require_once get_template_directory() . '/inc/function/comment.php';
require_once get_template_directory() . '/inc/function/magzma-customizer.php';
require_once get_template_directory() . '/inc/function/thefooter.php';
require_once get_template_directory() . '/inc/function/love-it/love-function.php';
require_once get_template_directory() . '/inc/function/love-it/display-function.php';
// INSTALL NECESSARY PLUGINS
require_once get_template_directory() . '/class-tgm-free.php';
require_once get_template_directory() . '/extra/inc/animate.php';
require_once get_template_directory() . '/extra/inc/custom.php';
require_once get_template_directory() . '/extra/inc/element-helper.php';
require_once get_template_directory() . '/extra/magzma-importer.php';
function magzma_new_elements()
{
    require_once get_template_directory() . '/extra/carousel-slider/carousel-slider-1.php';
    require_once get_template_directory() . '/extra/main-news/main-news-1.php';
    require_once get_template_directory() . '/extra/post-list/post-list-style-1.php';
    require_once get_template_directory() . '/extra/masonry-post/masonry-post-1.php';
    require_once get_template_directory() . '/extra/post-list/post-list-style-2.php';
    require_once get_template_directory() . '/extra/contact-form/contact-form.php';
}

add_action( 'elementor/widgets/widgets_registered', 'magzma_new_elements' );