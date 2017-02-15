<?php


    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


if (!class_exists("MAGZMA_Framework_Config")) {

    class MAGZMA_Framework_Config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            // This is needed. Bah WordPress bugs.  ;)
            if ( get_template_directory() && strpos( Redux_Helpers::cleanFilePath( __FILE__ ), Redux_Helpers::cleanFilePath( get_template_directory() ) ) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);    
            }
        }

        public function initSettings() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }       
            
            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setHelpTabs();
            $this->setSections();

            if (!isset($this->args['opt_name'])) { 
                return;
            }

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setSections() {



            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'magzma'), $this->theme->display('Name'));
            ?>
            

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();


            // DECLARATION OF SECTIONS



  

                $this->sections[] = array(
                    'icon' => ' el-icon-credit-card',
                    'icon_class' => 'icon-large',
                    'title' => esc_html__('Header Options', 'magzma'),
                    'fields' => array(

                        array(
                            'id'       => 'header_type',
                            'type'     => 'image_select',
                            'title'    => esc_html__( 'Header Type', 'magzma' ),
                            'subtitle' => esc_html__( 'Select Your Header Type', 'magzma' ),
                            'options' => array(
                                'default' => array('alt' => 'default', 'img' => get_template_directory_uri() .'/img/header-op-1.jpg'),
                                'style-2' => array('alt' => 'style-2', 'img' => get_template_directory_uri() .'/img/header-op-2.jpg'),
                                'style-3' => array('alt' => 'style-3', 'img' => get_template_directory_uri() .'/img/header-op-3.jpg'),
                            ),
                            'default'  => 'default'
                        ),

                        array(
                            'id'       => 'menu_select',
                            'type'     => 'checkbox',
                            'title'    => __( 'Header Menu Select', 'magzma' ),
                            'desc'     => __( 'An option created for hide/show your selected menus areas on your header.', 'magzma' ),
                            'options'  => array(
                                'use-top' => 'Use Header Top',
                                'use-main' => 'Use Header Main',
                            ),
                            'default'  => array(
                                'use-top' => '1',
                                'use-main' => '1',
                            ),
                        ),
                            
                    )
                );



                $this->sections[] = array(
                    'icon' => 'el-icon-fullscreen',
                    'icon_class' => 'icon-large',
                    'title' => esc_html__('Page Options', 'magzma'),
                    'fields' => array(

                        array(
                            'id'       => 'scroll_top',
                            'type'     => 'button_set',
                            'title'    => esc_html__('Use Scroll to Top', 'magzma'),
                            'options'  => array(
                                'use'   => esc_html__('use', 'magzma'),
                                'no'    => esc_html__('No', 'magzma'),
                            ),
                            'default'  => 'use'
                        ),
                        
                    )
                );

                $this->sections[] = array(
                    'icon' => 'el-icon-plus',
                    'icon_class' => 'icon-large',
                    'title' => esc_html__('Ads Options', 'magzma'),
                    'fields' => array(

                        /*===================================*/
                        /*============ HEADER ADS ===========*/
                        /*===================================*/

                        array(
                            'id'       => 'header_ads_start',
                            'type'     => 'section',
                            'title'    => esc_html__( 'Header Ads', 'magzma' ),
                            'indent'   => true, // Indent all options below until the next 'section' option is set.
                        ),

                        array(
                            'id'       => 'head_ads_type',
                            'type'     => 'button_set',
                            'title'    => esc_html__('Your Advertisement Type', 'magzma'),
                            'options'  => array(
                                'head_ads_img'   => esc_html__('Upload Image Ads', 'magzma'),
                                'head_ads_js'    => esc_html__('Embed JS Ads', 'magzma'),
                            ),
                            'default'  => 'head_ads_img'
                        ),

                        array(
                            'id' => 'head_ads_image',
                            'type' => 'media',
                            'url' => true,
                            'compiler' => 'true',
                            'title' => esc_html__('Ads Image', 'magzma'), 
                            'desc' => esc_html__('Upload your advertisement image here (728 x 90 pixel).', 'magzma'),
                            'required' => array( 'head_ads_type', '=', 'head_ads_img' ),
                        ),

                        array(
                            'id'=>'head_ads_link',
                            'type' => 'text',
                            'title' => esc_html__('Ads Image Link', 'magzma'),
                            'validate' => 'url',
                            'default' => '',
                            'required' => array( 'head_ads_type', '=', 'head_ads_img' ),
                        ),

                        array(
                            'id'       => 'head_ads_javascript',
                            'type'     => 'textarea',
                            'title'    => esc_html__('Ads JS', 'magzma'), 
                            'required' => array( 'head_ads_type', '=', 'head_ads_js' )
                        ),

                        array(
                            'id'     => 'header_ads_end',
                            'type'   => 'section',
                            'indent' => false, // Indent all options below until the next 'section' option is set.
                        ),
                        array(
                            'id'   => 'ads_div_1',
                            'type' => 'divide'
                        ),

                        /*===================================*/
                        /*========== TOP CONTENT ADS ========*/
                        /*===================================*/

                        array(
                            'id'       => 'topcont_ads_start',
                            'type'     => 'section',
                            'title'    => esc_html__( 'Top Content Ads', 'magzma' ),
                            'indent'   => true, // Indent all options below until the next 'section' option is set.
                        ),

                        array(
                            'id'       => 'topcont_ads_type',
                            'type'     => 'button_set',
                            'title'    => esc_html__('Your Advertisement Type', 'magzma'),
                            'options'  => array(
                                'topcont_ads_img'   => esc_html__('Upload Image Ads', 'magzma'),
                                'topcont_ads_js'    => esc_html__('Embed JS Ads', 'magzma'),
                            ),
                            'default'  => 'topcont_ads_img'
                        ),

                        array(
                            'id' => 'topcont_ads_image',
                            'type' => 'media',
                            'url' => true,
                            'compiler' => 'true',
                            'title' => esc_html__('Ads Image', 'magzma'), 
                            'desc' => esc_html__('Upload your advertisement image here (any size).', 'magzma'),
                            'required' => array( 'topcont_ads_type', '=', 'topcont_ads_img' ),
                        ),

                        array(
                            'id'=>'topcont_ads_link',
                            'type' => 'text',
                            'title' => esc_html__('Ads Image Link', 'magzma'),
                            'validate' => 'url',
                            'default' => '',
                            'required' => array( 'topcont_ads_type', '=', 'topcont_ads_img' ),
                        ),

                        array(
                            'id'       => 'topcont_ads_javascript',
                            'type'     => 'textarea',
                            'title'    => esc_html__('Ads JS', 'magzma'), 
                            'required' => array( 'topcont_ads_type', '=', 'topcont_ads_js' )
                        ),

                        array(
                            'id'     => 'topcont_ads_end',
                            'type'   => 'section',
                            'indent' => false, // Indent all options below until the next 'section' option is set.
                        ),
                        array(
                            'id'   => 'ads_div_2',
                            'type' => 'divide'
                        ),

                        /*===================================*/
                        /*======== BOTTOM CONTENT ADS =======*/
                        /*===================================*/

                        array(
                            'id'       => 'botcont_ads_start',
                            'type'     => 'section',
                            'title'    => esc_html__( 'Bottom Content Ads', 'magzma' ),
                            'indent'   => true, // Indent all options below until the next 'section' option is set.
                        ),

                        array(
                            'id'       => 'botcont_ads_type',
                            'type'     => 'button_set',
                            'title'    => esc_html__('Your Advertisement Type', 'magzma'),
                            'options'  => array(
                                'botcont_ads_img'   => esc_html__('Upload Image Ads', 'magzma'),
                                'botcont_ads_js'    => esc_html__('Embed JS Ads', 'magzma'),
                            ),
                            'default'  => 'botcont_ads_img'
                        ),

                        array(
                            'id' => 'botcont_ads_image',
                            'type' => 'media',
                            'url' => true,
                            'compiler' => 'true',
                            'title' => esc_html__('Ads Image', 'magzma'), 
                            'desc' => esc_html__('Upload your advertisement image here (any size).', 'magzma'),
                            'required' => array( 'botcont_ads_type', '=', 'botcont_ads_img' ),
                        ),

                        array(
                            'id'=>'botcont_ads_link',
                            'type' => 'text',
                            'title' => esc_html__('Ads Image Link', 'magzma'),
                            'validate' => 'url',
                            'default' => '',
                            'required' => array( 'botcont_ads_type', '=', 'botcont_ads_img' ),
                        ),

                        array(
                            'id'       => 'botcont_ads_javascript',
                            'type'     => 'textarea',
                            'title'    => esc_html__('Ads JS', 'magzma'), 
                            'required' => array( 'botcont_ads_type', '=', 'botcont_ads_js' )
                        ),

                        array(
                            'id'     => 'botcont_ads_end',
                            'type'   => 'section',
                            'indent' => false, // Indent all options below until the next 'section' option is set.
                        ),
                        
                    )
                );


                $this->sections[] = array(
                    'icon' => 'el-icon-photo',
                    'icon_class' => 'icon-large',
                    'title' => esc_html__('Footer Options', 'magzma'),
                    'fields' => array(

                        array(
                            'id'       => 'footer_type',
                            'type'     => 'image_select',
                            'title'    => esc_html__( 'Footer Type', 'magzma' ),
                            'subtitle' => esc_html__( 'Select Your Footer Type', 'magzma' ),
                            'options' => array(
                                'default' => array('alt' => 'default', 'img' => get_template_directory_uri() .'/img/footer-op-1.jpg'),
                                'style-2' => array('alt' => 'style-2', 'img' => get_template_directory_uri() .'/img/footer-op-2.jpg'),
                                //'style-3' => array('alt' => 'style-3', 'img' => get_template_directory_uri() .'/img/footer-3.png')
                            ),
                            'default'  => 'default'
                        ),

                        array(
                            'id'=>'footer-layout',
                            'type' => 'image_select',
                            'compiler'=>true,
                            'title' => esc_html__('Main Layout', 'magzma'), 
                            'subtitle' => esc_html__('Select footer and widget alignment. Choose between 1, 2, 3 or 4 column layout.', 'magzma'),
                            'options' => array(
                                    '1widget-footer' => array('alt' => '1widget-footer', 'img' => get_template_directory_uri() .'/img/footer-one.png'),
                                    '2widget-footer' => array('alt' => '2widget-footer', 'img' => get_template_directory_uri() .'/img/footer-two.png'),
                                    '3widget-footer' => array('alt' => '3widget-footer', 'img' => get_template_directory_uri() .'/img/footer-three.png'),
                                    '4widget-footer' => array('alt' => '4widget-footer', 'img' => get_template_directory_uri() .'/img/footer-four.png')
                                ),
                            'default' => '3widget-footer'
                        ),

                        array(
                            'id'=>'footer-text',
                            'type' => 'editor',
                            'title' => esc_html__('Footer Text', 'magzma'), 
                            'subtitle' => esc_html__('Add Your Copyright Here', 'magzma'),
                            'default' => 'Powered by WordPress - Built by <a href= "http://www.magzma.com/">Magzma Theme</a>',
                            )
                        
                        
                    )
                );


            $this->sections[] = array(
                'icon' => 'el-icon-list-alt',
                'title' => esc_html__('Typography Options', 'magzma'),
                'fields' => array(

                    array(
                        'id'=>'body-font',
                        'type' => 'typography', 
                        'title' => esc_html__('Body Options', 'magzma'),
                        'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('body'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> esc_html__('Set website body font (leave form empty if you want to use default)', 'magzma'),
                        'default'=> array(

                            'font-family' => 'Lato',
                            'font-weight' => '400',
                            'google' => true,
                        )
                    ),  

                    array(
                        'id'=>'heading-font',
                        'type' => 'typography', 
                        'title' => esc_html__('Heading Typography', 'magzma'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('h1', 'h2', 'h3','h4','h5','h6'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> esc_html__('Set website heading font (leave form empty if you want to use default)', 'magzma'),
                        'default'=> array(

                            'font-weight' => '500',
                            'font-family' => 'Poppins',
                            'google' => true,
                        )
                    ),

                 array(
                        'id'=>'menu-font',
                        'type' => 'typography', 
                        'title' => esc_html__('Menu Typography', 'magzma'),
                        //'compiler'=>true, // Use if you want to hook in your own CSS compiler
                        'google'=>true, // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup'=>true, // Select a backup non-google font in addition to a google font
                        //'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        'subsets'=>false, // Only appears if google is true and subsets not set to false
                        'font-size'=>false,
                        'line-height'=>false,
                        //'word-spacing'=>true, // Defaults to false
                        //'letter-spacing'=>true, // Defaults to false
                        'color'=>false,
                        //'preview'=>false, // Disable the previewer
                        'output' => array('ul.sm-clean li a'), // An array of CSS selectors to apply this font style to dynamically
                        'units'=>'px', // Defaults to px
                        'subtitle'=> esc_html__('Set website menu font (leave form empty if you want to use default)', 'magzma'),
                        'default'=> array(

                            'font-weight' => '500',
                            'font-family' => 'Poppins',
                            'google' => true,

                        )
                    ),
                    
                )
            );

        
            $this->sections[] = array(
                'icon' => 'el-icon-twitter',
                'title' => esc_html__('Social Profile', 'magzma'),
                'fields' => array(

                    array(
                        'id'=>'facebook_profile',
                        'type' => 'text',
                        'title' => esc_html__('Facebook Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'http://facebook.com/#'
                        ),

                    array(
                        'id'=>'twitter_profile',
                        'type' => 'text',
                        'title' => esc_html__('twitter Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'http://twitter.com/#'
                        ),


                    array(
                        'id'=>'google_profile',
                        'type' => 'text',
                        'title' => esc_html__('Google+ Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'http://google.com/#'
                        ),


                    array(
                        'id'=>'linkedin_profile',
                        'type' => 'text',
                        'title' => esc_html__('linkedin Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'http://linkedin.com/#'
                        ),


                    array(
                        'id'=>'pinterest_profile',
                        'type' => 'text',
                        'title' => esc_html__('Pinterest Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'http://pinterest.com/#'
                        ),

                    array(
                        'id'=>'dribble_profile',
                        'type' => 'text',
                        'title' => esc_html__('Dribble Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'flickr_profile',
                        'type' => 'text',
                        'title' => esc_html__('Flickr Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'behance_profile',
                        'type' => 'text',
                        'title' => esc_html__('Behance Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'youtube_profile',
                        'type' => 'text',
                        'title' => esc_html__('Youtube Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'https://www.youtube.com/'
                        ),

                    array(
                        'id'=>'soundcloud_profile',
                        'type' => 'text',
                        'title' => esc_html__('Soundcloud Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'codepen_profile',
                        'type' => 'text',
                        'title' => esc_html__('Codepen Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'deviantart_profile',
                        'type' => 'text',
                        'title' => esc_html__('Deviantart Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'digg_profile',
                        'type' => 'text',
                        'title' => esc_html__('Digg Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'dropbox_profile',
                        'type' => 'text',
                        'title' => esc_html__('Dropbox Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'github_profile',
                        'type' => 'text',
                        'title' => esc_html__('Github Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'instagram_profile',
                        'type' => 'text',
                        'title' => esc_html__('Instagram Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => 'https://instagram.com/'
                        ),

                    array(
                        'id'=>'skype_profile',
                        'type' => 'text',
                        'title' => esc_html__('Skype Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'spotify_profile',
                        'type' => 'text',
                        'title' => esc_html__('Spotify Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'steam_profile',
                        'type' => 'text',
                        'title' => esc_html__('Steam Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'trello_profile',
                        'type' => 'text',
                        'title' => esc_html__('Trello Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'tumblr_profile',
                        'type' => 'text',
                        'title' => esc_html__('Tumblr Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'vimeo_profile',
                        'type' => 'text',
                        'title' => esc_html__('Vimeo Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'wechat_profile',
                        'type' => 'text',
                        'title' => esc_html__('Wechat Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'weibo_profile',
                        'type' => 'text',
                        'title' => esc_html__('Weibo Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'wordpress_profile',
                        'type' => 'text',
                        'title' => esc_html__('WordPress Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'xing_profile',
                        'type' => 'text',
                        'title' => esc_html__('Xing Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'yahoo_profile',
                        'type' => 'text',
                        'title' => esc_html__('Yahoo Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    array(
                        'id'=>'yelp_profile',
                        'type' => 'text',
                        'title' => esc_html__('Yelp Profile', 'magzma'),
                        'validate' => 'url',
                        'default' => ''
                        ),

                    
                )
            
            );  
            






        }

        public function setHelpTabs() {


        }


        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'magzma_framework', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true, // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Options', 'magzma'),
                'page' => esc_html__('Options', 'magzma'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyAX_2L_UzCDPEnAHTG7zhESRVpMPS4ssII', // Must be defined to add google fonts to the typography module
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => '', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => false, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => '_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => true, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // esc_html__( '', $this->args['domain'] );            
            );






        }

    }

    new MAGZMA_Framework_Config();
}


function magzma_footer_copyright() {


    $options = get_option('magzma_framework');
    $copyright_footer = $options['footer-text'];
    echo balancetags( $copyright_footer );
}


function magzma_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'magzma_removeDemoModeLink');