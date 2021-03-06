<?php
/**
 * vonline Theme Customizer
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

function vonline_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );
    $wp_customize->get_section( 'header_image' )->panel = 'vonline_header_panel';
    $wp_customize->get_section( 'header_image' )->priority = '13';
    $wp_customize->get_section( 'title_tagline' )->priority = '9';
    $wp_customize->get_section( 'title_tagline' )->title = __('Site title/tagline/logo', 'vonline');
    $wp_customize->get_section( 'colors' )->title = __('General', 'vonline');
    $wp_customize->get_section( 'colors' )->panel = 'vonline_colors_panel';
    $wp_customize->get_section( 'colors' )->priority = '10';


    //Partials
    for ($i = 1; $i < 5; $i++) { 
        $wp_customize->selective_refresh->add_partial( 'slider_title_' . $i, array(
            'selector'          => '.slide-item-' . $i . ' .maintitle',
            'render_callback'   => 'vonline_partial_slider_title_' . $i,
        ) );
        $wp_customize->selective_refresh->add_partial( 'slider_subtitle_' . $i, array(
            'selector'          => '.slide-item-' . $i . ' .subtitle',
            'render_callback'   => 'vonline_partial_slider_subtitle_' . $i,
        ) );        
    }    
    $wp_customize->selective_refresh->add_partial( 'slider_button_text', array(
        'selector'          => '.button-slider',
        'render_callback'   => 'vonline_partial_slider_button_text',
    ) );   

    //Divider
    class vonline_Divider extends WP_Customize_Control {
         public function render_content() {
            echo '<hr style="margin: 15px 0;border-top: 1px dashed #919191;" />';
         }
    }
    //Titles
    class vonline_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;padding:12px;color:#000;background:#cbcbcb;text-align:center;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    
    //Titles
    class vonline_Theme_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }


    //___General___//
    $wp_customize->add_section(
        'vonline_general',
        array(
            'title'         => __('General', 'vonline'),
            'priority'      => 8,
        )
    );
    //Top padding
    $wp_customize->add_setting(
        'wrapper_top_padding',
        array(
            'default' => __('83','vonline'),
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'wrapper_top_padding',
        array(
            'label'         => __( 'Page wrapper - top padding', 'vonline' ),
            'section'       => 'vonline_general',
            'type'          => 'number',
            'description'   => __('Top padding for the page wrapper (the space between the header and the page title)', 'vonline'),       
            'priority'      => 10,
            'input_attrs' => array(
                'min'   => 0,
                'max'   => 160,
                'step'  => 1,
            ),            
        )
    );
    //Bottom padding
    $wp_customize->add_setting(
        'wrapper_bottom_padding',
        array(
            'default' => __('100','vonline'),
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'wrapper_bottom_padding',
        array(
            'label'         => __( 'Page wrapper - bottom padding', 'vonline' ),
            'section'       => 'vonline_general',
            'type'          => 'number',
            'description'   => __('Bottom padding for the page wrapper (the space between the page content and the footer)', 'vonline'),       
            'priority'      => 10,
            'input_attrs' => array(
                'min'   => 0,
                'max'   => 160,
                'step'  => 1,
            ),            
        )
    );

    $wp_customize->add_setting(
        'vonline_enable_schema',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'vonline_enable_schema',
        array(
            'type'      => 'checkbox',
            'label'     => __('Enable Schema markup', 'vonline'),
            'section'   => 'vonline_general',
            'priority'  => 10,
        )
    );


    //___Header area___//
    $wp_customize->add_panel( 'vonline_header_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header area', 'vonline'),
    ) );
    //___Header type___//
    $wp_customize->add_section(
        'vonline_header_type',
        array(
            'title'         => __('Header type', 'vonline'),
            'priority'      => 10,
            'panel'         => 'vonline_header_panel', 
            'description'   => __('You can select your header type from here. After that, continue below to the next two tabs (Header Slider and Header Image) and configure them.', 'vonline'),
        )
    );
    //Front page
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           => 'nothing',
            'sanitize_callback' => 'vonline_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page header type', 'vonline'),
            'section'     => 'vonline_header_type',
            'description' => __('Select the header type for your front page', 'vonline'),
            'choices' => array(
                'slider'    => __('Full screen slider', 'vonline'),
                'image'     => __('Image', 'vonline'),
                'core-video'=> __('Video', 'vonline'),
                'nothing'   => __('No header (only menu)', 'vonline')
            ),
        )
    );
    //Site
    $wp_customize->add_setting(
        'site_header_type',
        array(
            'default'           => 'image',
            'sanitize_callback' => 'vonline_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'site_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site header type', 'vonline'),
            'section'     => 'vonline_header_type',
            'description' => __('Select the header type for all pages except the front page', 'vonline'),
            'choices' => array(
                'slider'    => __('Full screen slider', 'vonline'),
                'image'     => __('Image', 'vonline'),
                'core-video'=> __('Video', 'vonline'),
                'nothing'   => __('No header (only menu)', 'vonline')
            ),
        )
    );    
    //___Slider___//
    $wp_customize->add_section(
        'vonline_slider',
        array(
            'title'         => __('Header Slider', 'vonline'),
            'description'   => __('You can add up to 5 images in the slider. Make sure you select where to display your slider from the Header Type section found above. You can also add a Call to action button (scroll down to find the options)', 'vonline'),
            'priority'      => 11,
            'panel'         => 'vonline_header_panel',
        )
    );
    //Mobile slider
    $wp_customize->add_setting(
        'mobile_slider',
        array(
            'default'           => 'responsive',
            'sanitize_callback' => 'vonline_sanitize_mslider',
        )
    );
    $wp_customize->add_control(
        'mobile_slider',
        array(
            'type'        => 'radio',
            'label'       => __('Slider mobile behavior', 'vonline'),
            'section'     => 'vonline_slider',
            'priority'    => 99,
            'choices' => array(
                'fullscreen'    => __('Full screen', 'vonline'),
                'responsive'    => __('Responsive', 'vonline'),
            ),
        )
    );    
    //Speed
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => __('4000','vonline'),
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Slider speed', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'number',
            'description'   => __('Slider speed in miliseconds. Use 0 to disable [default: 4000]', 'vonline'),       
            'priority' => 7
        )
    );
    $wp_customize->add_setting(
        'textslider_slide',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'textslider_slide',
        array(
            'type'      => 'checkbox',
            'label'     => __('Stop the text slider?', 'vonline'),
            'section'   => 'vonline_slider',
            'priority'  => 9,
        )
    );
    //Image 1
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 's1', array(
        'label' => __('First slide', 'vonline'),
        'section' => 'vonline_slider',
        'settings' => 'vonline_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_1',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_1',
            array(
               'label'          => __( 'Upload your first image for the slider', 'vonline' ),
               'type'           => 'image',
               'section'        => 'vonline_slider',
               'settings'       => 'slider_image_1',
               'priority'       => 11,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_1',
        array(
            'default'           => __('Click the pencil icon to change this text','vonline'),
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'slider_title_1',
        array(
            'label' => __( 'Title for the first slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_1',
        array(
            'default' => __('or go to the Customizer','vonline'),
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_1',
        array(
            'label' => __( 'Subtitle for the first slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 13
        )
    );           
    //Image 2
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 's2', array(
        'label' => __('Second slide', 'vonline'),
        'section' => 'vonline_slider',
        'settings' => 'vonline_options[info]',
        'priority' => 14
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_2',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_2',
            array(
               'label'          => __( 'Upload your second image for the slider', 'vonline' ),
               'type'           => 'image',
               'section'        => 'vonline_slider',
               'settings'       => 'slider_image_2',
               'priority'       => 15,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_2',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_2',
        array(
            'label' => __( 'Title for the second slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 16
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_2',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_2',
        array(
            'label' => __( 'Subtitle for the second slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 17
        )
    );    
    //Image 3
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 's3', array(
        'label' => __('Third slide', 'vonline'),
        'section' => 'vonline_slider',
        'settings' => 'vonline_options[info]',
        'priority' => 18
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_3',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_3',
            array(
               'label'          => __( 'Upload your third image for the slider', 'vonline' ),
               'type'           => 'image',
               'section'        => 'vonline_slider',
               'settings'       => 'slider_image_3',
               'priority'       => 19,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_3',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_3',
        array(
            'label' => __( 'Title for the third slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 20
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_3',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_3',
        array(
            'label' => __( 'Subtitle for the third slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 21
        )
    );            
    //Image 4
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 's4', array(
        'label' => __('Fourth slide', 'vonline'),
        'section' => 'vonline_slider',
        'settings' => 'vonline_options[info]',
        'priority' => 22
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_4',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_4',
            array(
               'label'          => __( 'Upload your fourth image for the slider', 'vonline' ),
               'type'           => 'image',
               'section'        => 'vonline_slider',
               'settings'       => 'slider_image_4',
               'priority'       => 23,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_4',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_4',
        array(
            'label' => __( 'Title for the fourth slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 24
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_4',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_4',
        array(
            'label' => __( 'Subtitle for the fourth slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 25
        )
    );    
    //Image 5
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 's5', array(
        'label' => __('Fifth slide', 'vonline'),
        'section' => 'vonline_slider',
        'settings' => 'vonline_options[info]',
        'priority' => 26
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_5',
        array(
            'default-image'     => '',
            'sanitize_callback'  => 'esc_url_raw',
             'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_5',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'vonline' ),
               'type'           => 'image',
               'section'        => 'vonline_slider',
               'settings'       => 'slider_image_5',
               'priority'       => 27,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_5',
        array(
            'default'           => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_5',
        array(
            'label' => __( 'Title for the fifth slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 28
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_5',
        array(
            'default' => '',
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_5',
        array(
            'label' => __( 'Subtitle for the fifth slide', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 29
        )
    );
    //Header button
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'hbutton', array(
        'label' => __('Call to action button', 'vonline'),
        'section' => 'vonline_slider',
        'settings' => 'vonline_options[info]',
        'priority' => 30
        ) )
    );     
    $wp_customize->add_setting(
        'slider_button_url',
        array(
            'default' => '#primary',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'                        
        )
    );
    $wp_customize->add_control(
        'slider_button_url',
        array(
            'label' => __( 'URL for your call to action button', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 31
        )
    );
    $wp_customize->add_setting(
        'slider_button_text',
        array(
            'default' => __('Click to begin','vonline'),
            'sanitize_callback' => 'vonline_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_button_text',
        array(
            'label' => __( 'Text for your call to action button', 'vonline' ),
            'section' => 'vonline_slider',
            'type' => 'text',
            'priority' => 32
        )
    );         
    //___Menu style___//
    $wp_customize->add_section(
        'vonline_menu_style',
        array(
            'title'         => __('Menu layout', 'vonline'),
            'priority'      => 15,
            'panel'         => 'vonline_header_panel', 
        )
    );
    //Sticky menu
    $wp_customize->add_setting(
        'sticky_menu',
        array(
            'default'           => 'sticky',
            'sanitize_callback' => 'vonline_sanitize_sticky',
        )
    );
    $wp_customize->add_control(
        'sticky_menu',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Sticky menu', 'vonline'),
            'section' => 'vonline_menu_style',
            'choices' => array(
                'sticky'   => __('Sticky', 'vonline'),
                'static'   => __('Static', 'vonline'),
            ),
        )
    );
    //Menu style
    $wp_customize->add_setting(
        'menu_style',
        array(
            'default'           => 'inline',
            'sanitize_callback' => 'vonline_sanitize_menu_style',
        )
    );
    $wp_customize->add_control(
        'menu_style',
        array(
            'type'      => 'radio',
            'priority'  => 11,
            'label'     => __('Menu style', 'vonline'),
            'section'   => 'vonline_menu_style',
            'choices'   => array(
                'inline'     => __('Inline', 'vonline'),
                'centered'   => __('Centered (menu and site logo)', 'vonline'),
            ),
        )
    );
    //Menu style
    $wp_customize->add_setting(
        'menu_container',
        array(
            'default'           => 'container',
            'sanitize_callback' => 'vonline_sanitize_menu_container',
        )
    );
    $wp_customize->add_control(
        'menu_container',
        array(
            'type'      => 'select',
            'priority'  => 11,
            'label'     => __('Menu container', 'vonline'),
            'section'   => 'vonline_menu_style',
            'choices'   => array(
                'container'         => __('Contained', 'vonline'),
                'fw-menu-container' => __('Full width', 'vonline'),
            ),
        )
    );    
    //Custom menu item
    $wp_customize->add_setting(
        'header_button_html',
        array(
            'default'           => 'nothing',
            'sanitize_callback' => 'vonline_sanitize_header_custom_item',
        )
    );
    $wp_customize->add_control(
        'header_button_html',
        array(
            'type'      => 'select',
            'priority'  => 11,
            'label'     => __('Header custom item', 'vonline'),
            'section'   => 'vonline_menu_style',
            'choices'   => array(
                'nothing'   => __( 'Nothing', 'vonline'  ),
                'button'    => __( 'Button', 'vonline'  ),
                'html'      => __( 'HTML', 'vonline'   ),
            ),
        )
    );    

    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Divider( $wp_customize, 'hcs_sep', array(
            'section' => 'vonline_menu_style',
            'settings' => 'vonline_options[info]',
            'priority' => 11,
            'active_callback' => 'vonline_header_custom_btn_active_callback'
        ) )
    ); 

    $wp_customize->add_setting(
        'header_custom_item_btn_link',
        array(
            'default' => 'https://example.org/',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'header_custom_item_btn_link',
        array(
            'label'     => __( 'Button link', 'vonline' ),
            'section'   => 'vonline_menu_style',
            'type'      => 'text',
            'priority'  => 11,
            'active_callback' => 'vonline_header_custom_btn_active_callback'
        )
    );
    $wp_customize->add_setting(
        'header_custom_item_btn_text',
        array(
            'default'           => __( 'Get in touch', 'vonline' ),
            'sanitize_callback' => 'vonline_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_custom_item_btn_text',
        array(
            'label'     => __( 'Button text', 'vonline' ),
            'section'   => 'vonline_menu_style',
            'type'      => 'text',
            'priority'  => 11,
            'active_callback' => 'vonline_header_custom_btn_active_callback'
        )
    );
    $wp_customize->add_setting(
        'header_custom_item_btn_target',
        array(
            'default'           => 1,
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'header_custom_item_btn_target',
        array(
            'type'              => 'checkbox',
            'label'             => __('Open link in a new tab?', 'vonline'),
            'section'           => 'vonline_menu_style',
            'priority'          => 11,
            'active_callback'   => 'vonline_header_custom_btn_active_callback'
        )
    );  
    $wp_customize->add_setting(
        'header_custom_item_btn_tb_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_tb_padding', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'vonline_menu_style',
        'label'       => __('Top/bottom button padding', 'vonline'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 40,
            'step'  => 1,
        ),
        'active_callback'   => 'vonline_header_custom_btn_active_callback'
    ) );
    $wp_customize->add_setting(
        'header_custom_item_btn_lr_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '35',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_lr_padding', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'vonline_menu_style',
        'label'       => __('Left/right button padding', 'vonline'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 50,
            'step'  => 1,
        ),
        'active_callback'   => 'vonline_header_custom_btn_active_callback'
    ) );
    //Font size
    $wp_customize->add_setting(
        'header_custom_item_btn_font_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '13',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_font_size', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'vonline_menu_style',
        'label'       => __('Button font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 40,
            'step'  => 1,
        ),
        'active_callback'   => 'vonline_header_custom_btn_active_callback'
    ) ); 
    //Border radius
    $wp_customize->add_setting(
        'header_custom_item_btn_radius',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '3',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_radius', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'vonline_menu_style',
        'label'       => __('Button border radius', 'vonline'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 50,
            'step'  => 1,
        ),
        'active_callback'   => 'vonline_header_custom_btn_active_callback'
    ) );

    //Custom header html
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Divider( $wp_customize, 'hcs_html_sep', array(
            'section' => 'vonline_menu_style',
            'settings' => 'vonline_options[info]',
            'priority' => 11,
            'active_callback' => 'vonline_header_custom_html_active_callback'
        ) )
    );     
    $wp_customize->add_setting(
        'header_custom_item_html',
        array(
            'sanitize_callback' => 'vonline_sanitize_text',
            'default'           => '<a href="#">Your content</a>',
        )       
    );
    $wp_customize->add_control( 'header_custom_item_html', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'vonline_menu_style',
        'label'       => __('Custom HTML', 'vonline'),
        'active_callback'   => 'vonline_header_custom_html_active_callback'
    ) );


    //Header image size
    $wp_customize->add_setting(
        'header_bg_size',
        array(
            'default'           => 'cover',
            'sanitize_callback' => 'vonline_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'header_bg_size',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Header background size', 'vonline'),
            'section' => 'header_image',
            'choices' => array(
                'cover'     => __('Cover', 'vonline'),
                'contain'   => __('Contain', 'vonline'),
            ),
        )
    );
    //Header height
    $wp_customize->add_setting(
        'header_height',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '300',
        )       
    );
    $wp_customize->add_control( 'header_height', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'header_image',
        'label'       => __('Header height [default: 300px]', 'vonline'),
        'input_attrs' => array(
            'min'   => 250,
            'max'   => 600,
            'step'  => 5,
        ),
    ) );
    //Disable overlay
    $wp_customize->add_setting(
        'hide_overlay',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'hide_overlay',
        array(
            'type'      => 'checkbox',
            'label'     => __('Disable the overlay?', 'vonline'),
            'section'   => 'header_image',
            'priority'  => 12,
        )
    );    
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'vonline' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'priority'       => 12,
            )
        )
    );

    //___Blog options___//
    $wp_customize->add_section(
        'blog_options',
        array(
            'title' => __('Blog options', 'vonline'),
            'priority' => 13,
        )
    );  
    // Blog layout
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'layout', array(
        'label' => __('Layout', 'vonline'),
        'section' => 'blog_options',
        'settings' => 'vonline_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'blog_layout',
        array(
            'default'           => 'classic-alt',
            'sanitize_callback' => 'vonline_sanitize_blog',
        )
    );
    $wp_customize->add_control(
        'blog_layout',
        array(
            'type'      => 'radio',
            'label'     => __('Blog layout', 'vonline'),
            'section'   => 'blog_options',
            'priority'  => 11,
            'choices'   => array(
                'classic'           => __( 'Classic', 'vonline' ),
                'classic-alt'       => __( 'Classic (alternative)', 'vonline' ),
                'modern'            => __( 'Modern', 'vonline' ),
                'fullwidth'         => __( 'Full width (no sidebar)', 'vonline' ),
                'masonry-layout'    => __( 'Masonry (grid style)', 'vonline' )
            ),
        )
    ); 
    //Full width singles
    $wp_customize->add_setting(
        'fullwidth_single',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'fullwidth_single',
        array(
            'type'      => 'checkbox',
            'label'     => __('Full width single posts?', 'vonline'),
            'section'   => 'blog_options',
            'priority'  => 12,
        )
    );
    //Content/excerpt
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'content', array(
        'label' => __('Content/excerpt', 'vonline'),
        'section' => 'blog_options',
        'settings' => 'vonline_options[info]',
        'priority' => 13
        ) )
    );          
    //Full content posts
    $wp_customize->add_setting(
      'full_content_home',
      array(
        'sanitize_callback' => 'vonline_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_home',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on the home page.', 'vonline'),
            'section' => 'blog_options',
            'priority' => 14,
        )
    );
    $wp_customize->add_setting(
      'full_content_archives',
      array(
        'sanitize_callback' => 'vonline_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
        'full_content_archives',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to display the full content of your posts on all archives.', 'vonline'),
            'section' => 'blog_options',
            'priority' => 15,
        )
    );    
    //Excerpt
    $wp_customize->add_setting(
        'exc_lenght',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '55',
        )       
    );
    $wp_customize->add_control( 'exc_lenght', array(
        'type'        => 'number',
        'priority'    => 16,
        'section'     => 'blog_options',
        'label'       => __('Excerpt length', 'vonline'),
        'description' => __('Choose your excerpt length. Default: 55 words', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
        ),
    ) );
    //Meta
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'meta', array(
        'label' => __('Meta', 'vonline'),
        'section' => 'blog_options',
        'settings' => 'vonline_options[info]',
        'priority' => 17
        ) )
    ); 
    //Hide meta index
    $wp_customize->add_setting(
      'hide_meta_index',
      array(
        'sanitize_callback' => 'vonline_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_index',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on index, archives?', 'vonline'),
        'section' => 'blog_options',
        'priority' => 18,
      )
    );
    //Hide meta single
    $wp_customize->add_setting(
      'hide_meta_single',
      array(
        'sanitize_callback' => 'vonline_sanitize_checkbox',
        'default' => 0,     
      )   
    );
    $wp_customize->add_control(
      'hide_meta_single',
      array(
        'type' => 'checkbox',
        'label' => __('Hide post meta on singles?', 'vonline'),
        'section' => 'blog_options',
        'priority' => 19,
      )
    );
    //Featured images
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'images', array(
        'label' => __('Featured images', 'vonline'),
        'section' => 'blog_options',
        'settings' => 'vonline_options[info]',
        'priority' => 21
        ) )
    );     
    //Index images
    $wp_customize->add_setting(
        'index_feat_image',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'index_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to hide featured images on index, archives etc.', 'vonline'),
            'section' => 'blog_options',
            'priority' => 22,
        )
    );
    //Post images
    $wp_customize->add_setting(
        'post_feat_image',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'post_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to hide featured images on single posts', 'vonline'),
            'section' => 'blog_options',
            'priority' => 23,
        )
    );
    //Page images
    $wp_customize->add_setting(
        'page_feat_image',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
            'default'           => 1,
        )       
    );
    $wp_customize->add_control(
        'page_feat_image',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box to hide featured images on single pages', 'vonline'),
            'section' => 'blog_options',
            'priority' => 23,
        )
    );



    //___Footer___//
    $wp_customize->add_section(
        'vonline_footer',
        array(
            'title'         => __('Footer', 'vonline'),
            'priority'      => 18,
        )
    );
    //Front page
    $wp_customize->add_setting(
        'footer_widget_areas',
        array(
            'default'           => '3',
            'sanitize_callback' => 'vonline_sanitize_fw',
        )
    );
    $wp_customize->add_control(
        'footer_widget_areas',
        array(
            'type'        => 'radio',
            'label'       => __('Footer widget area', 'vonline'),
            'section'     => 'vonline_footer',
            'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'vonline'),
            'choices' => array(
                '1'     => __('One', 'vonline'),
                '2'     => __('Two', 'vonline'),
                '3'     => __('Three', 'vonline'),
                '4'     => __('Four', 'vonline')
            ),
        )
    );



    //___Fonts___//
    $wp_customize->add_section(
        'vonline_fonts',
        array(
            'title' => __('Fonts', 'vonline'),
            'priority' => 15,
            'description' => sprintf( __( 'You can check out previews of the Google Fonts %s', 'vonline' ), '<a target="_blank" href="https://fonts.google.com">' . __( 'here', 'vonline' ) . '</a>' ),
        )
    );

    require get_template_directory() . '/inc/controls/control-checkbox-multiple.php';
    require get_template_directory() . '/inc/controls/multiple-select/class-control-multiple-select.php';
    $wp_customize->register_control_type( 'vonline_Select2_Custom_Control' 	);


    //Body fonts title
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'general_fonts', array(
        'label' => __('General', 'vonline'),
        'section' => 'vonline_fonts',
        'settings' => 'vonline_options[info]',
        'priority' => 10
        ) )
    );    
    //Body font subsets
    $wp_customize->add_setting(
        'font_subsets',
        array(
            'default'   => array( 'latin' ),
            'sanitize_callback' => 'vonline_sanitize_font_weights',
        )
    );

    $wp_customize->add_control( new vonline_Select2_Custom_Control( $wp_customize, 'font_subsets', array(
        'label'     => __( 'Font subsets', 'vonline' ),
        'section'   => 'vonline_fonts',
        'priority'  => 10,
        'type'      => 'vonline-multiple-select',
        'input_attrs' => array(
            'multiple' => true,
        ),        
        'choices' => array( 
            'latin'         => 'Latin',
            'latin-ext'     => 'Latin Extended',
            'cyrillic'      => 'Cyrillic',
            'cyrillic-ext'  => 'Cyrillic Extended',
            'greek'         => 'Greek',
            'greek-ext'     => 'Greek Extended',
            'vietnamese'    => 'Vietnamese',
        ),
        ) )
    );   

    //Body fonts title
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'body_fonts', array(
        'label' => __('Body fonts', 'vonline'),
        'section' => 'vonline_fonts',
        'settings' => 'vonline_options[info]',
        'priority' => 10
        ) )
    );    
    //Body fonts
    $fonts = vonline_get_google_fonts();
    $fonts = array_combine( $fonts, $fonts );

    $wp_customize->add_setting(
        'body_font',
        array(
            'default'           => 'Raleway',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'vonline_sanitize_text',
        )
    );

    $wp_customize->add_control( new vonline_Select2_Custom_Control( $wp_customize, 'body_font', array(
        'label'     => __( 'Font family', 'vonline' ),
        'section'   => 'vonline_fonts',
        'type'      => 'vonline-multiple-select',      
        'priority' => 12,
        'choices' => $fonts  
        ) )
    );   



    $wp_customize->add_setting(
        'body_font_weights',
        array(
            'default'           =>  array('400', '600'),
            'sanitize_callback' => 'vonline_sanitize_font_weights',
        )
    );

    $wp_customize->add_control( new vonline_Select2_Custom_Control( $wp_customize, 'body_font_weights', array(
        'label'         => __('Font weights', 'vonline'),
        'description'   => sprintf( __( 'Please make sure your selected font weights are actually available for your font. You can check %s', 'vonline' ), '<a target="_blank" href="https://fonts.google.com">' . __( 'here', 'vonline' ) . '</a>' ),
        'section' => 'vonline_fonts',
        'priority' => 13,
        'input_attrs' => array(
            'multiple' => true,
        ),        
        'choices' => array( 
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
        ) )
    );   
    
    //Headings fonts title
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'headings_fonts', array(
        'label' => __('Headings fonts', 'vonline'),
        'section' => 'vonline_fonts',
        'settings' => 'vonline_options[info]',
        'priority' => 13
        ) )
    );      

    //Temp test headings font
    $wp_customize->add_setting(
        'headings_font',
        array(
            'default'           => 'Raleway',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'vonline_sanitize_text',
        )
    );

    $wp_customize->add_control( new vonline_Select2_Custom_Control( $wp_customize, 'headings_font', array(
        'label' => __( 'Font family', 'vonline' ),
        'section' => 'vonline_fonts',
        'type' => 'select',      
        'priority' => 14,
        'type'      => 'vonline-multiple-select',      
        'choices' => $fonts  
        ) )
    );      

    $wp_customize->add_setting(
        'headings_font_weights',
        array(
            'default'           => array( '600' ),
            'sanitize_callback' => 'vonline_sanitize_font_weights',
        )
    );

    $wp_customize->add_control( new vonline_Select2_Custom_Control( $wp_customize, 'headings_font_weights', array(
        'label' => __('Font weights', 'vonline'),
        'description'   => sprintf( __( 'Please make sure your selected font weights are actually available for your font. You can check %s', 'vonline' ), '<a target="_blank" href="https://fonts.google.com">' . __( 'here', 'vonline' ) . '</a>' ),
        'section' => 'vonline_fonts',
        'priority' => 14,
        'input_attrs' => array(
            'multiple' => true,
        ),           
        'choices' => array( 
            '100' => '100',
            '200' => '200',
            '300' => '300',
            '400' => '400',
            '500' => '500',
            '600' => '600',
            '700' => '700',
            '800' => '800',
            '900' => '900',
        ),
        ) )
    );     

    //Font sizes title
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'font_sizes', array(
        'label' => __('Font sizes', 'vonline'),
        'section' => 'vonline_fonts',
        'settings' => 'vonline_options[info]',
        'priority' => 16
        ) )
    );
    // Site title
    $wp_customize->add_setting(
        'site_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '32',
        )       
    );
    $wp_customize->add_control( 'site_title_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'vonline_fonts',
        'label'       => __('Site title', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
        ),
    ) ); 
    // Site description
    $wp_customize->add_setting(
        'site_desc_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
        )       
    );
    $wp_customize->add_control( 'site_desc_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'vonline_fonts',
        'label'       => __('Site description', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );  
    // Nav menu
    $wp_customize->add_setting(
        'menu_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '14',
        )       
    );
    $wp_customize->add_control( 'menu_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'vonline_fonts',
        'label'       => __('Menu items', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 50,
            'step'  => 1,
        ),
    ) );           
    //H1 size
    $wp_customize->add_setting(
        'h1_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '52',
        )       
    );
    $wp_customize->add_control( 'h1_size', array(
        'type'        => 'number',
        'priority'    => 17,
        'section'     => 'vonline_fonts',
        'label'       => __('H1 font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H2 size
    $wp_customize->add_setting(
        'h2_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '42',
        )       
    );
    $wp_customize->add_control( 'h2_size', array(
        'type'        => 'number',
        'priority'    => 18,
        'section'     => 'vonline_fonts',
        'label'       => __('H2 font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H3 size
    $wp_customize->add_setting(
        'h3_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '32',
        )       
    );
    $wp_customize->add_control( 'h3_size', array(
        'type'        => 'number',
        'priority'    => 19,
        'section'     => 'vonline_fonts',
        'label'       => __('H3 font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H4 size
    $wp_customize->add_setting(
        'h4_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '25',
        )       
    );
    $wp_customize->add_control( 'h4_size', array(
        'type'        => 'number',
        'priority'    => 20,
        'section'     => 'vonline_fonts',
        'label'       => __('H4 font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H5 size
    $wp_customize->add_setting(
        'h5_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '20',
        )       
    );
    $wp_customize->add_control( 'h5_size', array(
        'type'        => 'number',
        'priority'    => 21,
        'section'     => 'vonline_fonts',
        'label'       => __('H5 font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //H6 size
    $wp_customize->add_setting(
        'h6_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '18',
        )       
    );
    $wp_customize->add_control( 'h6_size', array(
        'type'        => 'number',
        'priority'    => 22,
        'section'     => 'vonline_fonts',
        'label'       => __('H6 font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 60,
            'step'  => 1,
        ),
    ) );
    //Body
    $wp_customize->add_setting(
        'body_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '16',
        )       
    );
    $wp_customize->add_control( 'body_size', array(
        'type'        => 'number',
        'priority'    => 23,
        'section'     => 'vonline_fonts',
        'label'       => __('Body font size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 24,
            'step'  => 1,
        ),
    ) );
    // Single post tiles
    $wp_customize->add_setting(
        'single_post_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '36',
        )       
    );
    $wp_customize->add_control( 'single_post_title_size', array(
        'type'        => 'number',
        'priority'    => 24,
        'section'     => 'vonline_fonts',
        'label'       => __('Single post title size', 'vonline'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 90,
            'step'  => 1,
        ),
    ) ); 
    //___Colors___//
    $wp_customize->add_panel( 'vonline_colors_panel', array(
        'priority'       => 19,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Colors', 'vonline'),
    ) );
    $wp_customize->add_section(
        'colors_header',
        array(
            'title'         => __('Header', 'vonline'),
            'priority'      => 11,
            'panel'         => 'vonline_colors_panel',
        )
    );
    $wp_customize->add_section(
        'colors_sidebar',
        array(
            'title'         => __('Sidebar', 'vonline'),
            'priority'      => 12,
            'panel'         => 'vonline_colors_panel',
        )
    );
    $wp_customize->add_section(
        'colors_footer',
        array(
            'title'         => __('Footer', 'vonline'),
            'priority'      => 13,
            'panel'         => 'vonline_colors_panel',
        )
    );    
    $wp_customize->add_setting(
        'primary_color',
        array(
            'default'           => '#d65050',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label'         => __('Primary color', 'vonline'),
                'section'       => 'colors',
                'settings'      => 'primary_color',
                'priority'      => 11
            )
        )
    );
    //Menu bg
    $wp_customize->add_setting(
        'menu_bg_color',
        array(
            'default'           => '#263246',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'menu_bg_color',
            array(
                'label' => __('Menu background', 'vonline'),
                'section' => 'colors_header',
                'priority' => 12
            )
        )
    );     
    //Site title
    $wp_customize->add_setting(
        'site_title_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_title_color',
            array(
                'label' => __('Site title', 'vonline'),
                'section' => 'colors_header',
                'settings' => 'site_title_color',
                'priority' => 13
            )
        )
    );
    //Site desc
    $wp_customize->add_setting(
        'site_desc_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'site_desc_color',
            array(
                'label' => __('Site description', 'vonline'),
                'section' => 'colors_header',
                'priority' => 14
            )
        )
    );
    //Top level menu items
    $wp_customize->add_setting(
        'top_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'top_items_color',
            array(
                'label' => __('Top level menu items', 'vonline'),
                'section' => 'colors_header',
                'priority' => 15
            )
        )
    );
    //Menu items hover
    $wp_customize->add_setting(
        'menu_items_hover',
        array(
            'default'           => '#d65050',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
        	'menu_items_hover',
            array(
                'label' => __('Menu items hover', 'vonline'),
                'section' => 'colors_header',
                'priority' => 15
            )
        )
    );

    //Sub menu items color
    $wp_customize->add_setting(
        'submenu_items_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_items_color',
            array(
                'label' => __('Sub-menu items', 'vonline'),
                'section' => 'colors_header',
                'priority' => 16
            )
        )
    );
    //Sub menu background
    $wp_customize->add_setting(
        'submenu_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'submenu_background',
            array(
                'label' => __('Sub-menu background', 'vonline'),
                'section' => 'colors_header',
                'priority' => 17
            )
        )
    );
    //Mobile menu
    $wp_customize->add_setting(
        'mobile_menu_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'mobile_menu_color',
            array(
                'label' => __('Mobile menu button', 'vonline'),
                'section' => 'colors_header',
                'priority' => 17
            )
        )
    );    
    //Slider text
    $wp_customize->add_setting(
        'slider_text',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'slider_text',
            array(
                'label' => __('Header slider text', 'vonline'),
                'section' => 'colors_header',
                'priority' => 18
            )
        )
    );
    //Body
    $wp_customize->add_setting(
        'body_text_color',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'body_text_color',
            array(
                'label' => __('Body text', 'vonline'),
                'section' => 'colors',
                'priority' => 19
            )
        )
    );    
    //Sidebar backgound
    $wp_customize->add_setting(
        'sidebar_background',
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_background',
            array(
                'label' => __('Sidebar background', 'vonline'),
                'section' => 'colors_sidebar',
                'priority' => 20
            )
        )
    );
    //Sidebar color
    $wp_customize->add_setting(
        'sidebar_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'sidebar_color',
            array(
                'label' => __('Sidebar color', 'vonline'),
                'section' => 'colors_sidebar',
                'priority' => 21
            )
        )
    );
    //Footer widget area
    $wp_customize->add_setting(
        'footer_widgets_background',
        array(
            'default'           => '#252525',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_widgets_background',
            array(
                'label' => __('Footer widget area background', 'vonline'),
                'section' => 'colors_footer',
                'priority' => 22
            )
        )
    );
    //Footer widget color
    $wp_customize->add_setting(
        'footer_widgets_color',
        array(
            'default'           => '#767676',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_widgets_color',
            array(
                'label' => __('Footer widget area color', 'vonline'),
                'section' => 'colors_footer',
                'priority' => 23
            )
        )
    );
    //Footer background
    $wp_customize->add_setting(
        'footer_background',
        array(
            'default'           => '#1c1c1c',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background',
            array(
                'label' => __('Footer background', 'vonline'),
                'section' => 'colors_footer',
                'priority' => 24
            )
        )
    );
    //Footer color
    $wp_customize->add_setting(
        'footer_color',
        array(
            'default'           => '#666666',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_color',
            array(
                'label' => __('Footer color', 'vonline'),
                'section' => 'colors_footer',
                'priority' => 25
            )
        )
    );
    //Rows overlay
    $wp_customize->add_setting(
        'rows_overlay',
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'rows_overlay',
            array(
                'label'         => __('Rows overlay', 'vonline'),
                'section'       => 'colors',
                'description'   => __('[DEPRECATED] Please use the color option from Edit Row > Design > Overlay color', 'vonline'),
                'priority'      => 26
            )
        )
    );


    //___Theme info___//
    $wp_customize->add_section(
        'vonline_themeinfo',
        array(
            'title' => __('Theme info', 'vonline'),
            'priority' => 139,
            'description' => '<p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('1. Documentation for vonline can be found ', 'vonline') . '<a target="_blank" href="https://vanstoneonline.com/documentation/vonline/">here</a></p><p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('2. A full theme demo can be found ', 'vonline') . '<a target="_blank" href="http://demo.vonline.com/vonline/">here</a></p>',         
        )
    );
    $wp_customize->add_setting('vonline_theme_docs', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Theme_Info( $wp_customize, 'documentation', array(
        'section' => 'vonline_themeinfo',
        'settings' => 'vonline_theme_docs',
        'priority' => 10
        ) )
    );  

    /* Woocommerce */
    //Sidebar
    $wp_customize->add_setting(
        'swc_sidebar_archives',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'swc_sidebar_archives',
        array(
            'type'      => 'checkbox',
            'label'     => __('Disable sidebar on shop archive pages?', 'vonline'),
            'section'   => 'woocommerce_product_catalog',
            'priority'  => 14,
        )
    );  
    //Show cart button on hover
    $wp_customize->add_setting(
        'wc_button_hover',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'wc_button_hover',
        array(
            'type'      => 'checkbox',
            'label'     => __('Show add to cart button on hover?', 'vonline'),
            'section'   => 'woocommerce_product_catalog',
            'priority'  => 14,
        )
    );      
    //Sidebar
    $wp_customize->add_section(
        'vonline_wc_singles',
        array(
            'title'         => __('Single products', 'vonline'),
            'panel'         => 'woocommerce',
            'priority'      => 14,
        )
    );    
    $wp_customize->add_setting(
        'swc_sidebar_products',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
            'default'           => 1
        )       
    );
    $wp_customize->add_control(
        'swc_sidebar_products',
        array(
            'type'      => 'checkbox',
            'label'     => __('Remove sidebar from single products?', 'vonline'),
            'section'   => 'vonline_wc_singles',
            'priority'  => 14,
        )
    );    
    //YITH
    $wp_customize->add_setting(
        'yith_buttons_visible',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'yith_buttons_visible',
        array(
            'type'          => 'checkbox',
            'label'         => __('Always show buttons for YITH quick view, wishlist and compare?', 'vonline'),
            'description'   => __('If you\'re using the plugins above, checking this option will keep their respective buttons always visible', 'vonline'),
            'section'       => 'woocommerce_product_catalog',
            'priority'      => 15,
        )
    );
    //Disable overlay shop
    $wp_customize->add_setting(
        'hide_overlay_shop',
        array(
            'sanitize_callback' => 'vonline_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'hide_overlay_shop',
        array(
            'type'      => 'checkbox',
            'label'     => __('Disable header image overlay on shop main page?', 'vonline'),
            'section'   => 'woocommerce_product_catalog',
            'priority'  => 16,
        )
    );              

}
add_action( 'customize_register', 'vonline_customize_register' );

/**
 * Sanitize
 */
//Header type
function vonline_sanitize_layout( $input ) {
    $valid = array(
        'slider'    => __('Full screen slider', 'vonline'),
        'image'     => __('Image', 'vonline'),
        'core-video'=> __('Video', 'vonline'),
        'nothing'   => __('Nothing (only menu)', 'vonline')
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Text
function vonline_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//Background size
function vonline_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => __('Cover', 'vonline'),
        'contain'   => __('Contain', 'vonline'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Footer widget areas
function vonline_sanitize_fw( $input ) {
    $valid = array(
        '1'     => __('One', 'vonline'),
        '2'     => __('Two', 'vonline'),
        '3'     => __('Three', 'vonline'),
        '4'     => __('Four', 'vonline')
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Sticky menu
function vonline_sanitize_sticky( $input ) {
    $valid = array(
        'sticky'     => __('Sticky', 'vonline'),
        'static'   => __('Static', 'vonline'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Blog Layout
function vonline_sanitize_blog( $input ) {
    $valid = array(
        'classic'    => __( 'Classic', 'vonline' ),
        'classic-alt'    => __( 'Classic (alternative)', 'vonline' ),
        'modern'    => __( 'Modern', 'vonline' ),
        'fullwidth'  => __( 'Full width (no sidebar)', 'vonline' ),
        'masonry-layout'    => __( 'Masonry (grid style)', 'vonline' )

    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Mobile slider
function vonline_sanitize_mslider( $input ) {
    $valid = array(
        'fullscreen'    => __('Full screen', 'vonline'),
        'responsive'    => __('Responsive', 'vonline'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Menu style
function vonline_sanitize_menu_style( $input ) {
    $valid = array(
        'inline'     => __('Inline', 'vonline'),
        'centered'   => __('Centered (menu and site logo)', 'vonline'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Checkboxes
function vonline_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function vonline_sanitize_font_weights( $input ) {
    if ( is_array( $input ) ) {
        return $input;
    }
}
function vonline_sanitize_header_custom_item( $input ) {
    if ( in_array( $input, array( 'nothing', 'button', 'html' ), true ) ) {
        return $input;
    }
}
function vonline_sanitize_menu_container( $input ) {
    if ( in_array( $input, array( 'container', 'fw-menu-container' ), true ) ) {
        return $input;
    }
}
/**
 * Selects
 */
function vonline_sanitize_selects( $input, $setting ){
          
    $input = sanitize_key($input);

    $choices = $setting->manager->get_control( $setting->id )->choices;
                      
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
      
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vonline_customize_preview_js() {
    
	wp_enqueue_script( 'vonline_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20200129', true );
}
add_action( 'customize_preview_init', 'vonline_customize_preview_js' );



/**
 * Partials callbacks
 */
//Slider titles
function vonline_partial_slider_title_1() {
    return get_theme_mod('slider_title_1', __('Click the pencil icon to change this text','vonline'));
}
function vonline_partial_slider_title_2() {
    return get_theme_mod('slider_title_2');
}
function vonline_partial_slider_title_3() {
    return get_theme_mod('slider_title_3');
}
function vonline_partial_slider_title_4() {
    return get_theme_mod('slider_title_4');
}
function vonline_partial_slider_title_5() {
    return get_theme_mod('slider_title_5');
}
//Slider subtitles
function vonline_partial_slider_subtitle_1() {
    return get_theme_mod('slider_subtitle_1', __('or go to the Customizer','vonline'));
}
function vonline_partial_slider_subtitle_2() {
    return get_theme_mod('slider_subtitle_2');
}
function vonline_partial_slider_subtitle_3() {
    return get_theme_mod('slider_subtitle_3');
}
function vonline_partial_slider_subtitle_4() {
    return get_theme_mod('slider_subtitle_4');
}
function vonline_partial_slider_subtitle_5() {
    return get_theme_mod('slider_subtitle_5');
}
function vonline_partial_slider_button_text() {
    return get_theme_mod('slider_button_text');
}
//Header custom items active callbacks
function vonline_header_custom_btn_active_callback() {
    $type = get_theme_mod( 'header_button_html' );

    if ( 'button' == $type ) {
        return true;
    } else {
        return false;
    }
}

function vonline_header_custom_html_active_callback() {
    $type = get_theme_mod( 'header_button_html' );

    if ( 'html' == $type ) {
        return true;
    } else {
        return false;
    }
}