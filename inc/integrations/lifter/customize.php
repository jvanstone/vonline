<?php
/**
 * Lifter Customizer options
 *
 * @package vonline
 */


 $wp_customize->add_panel( 'vonline_lifterlms', array(
        'priority'       => 29,
        'theme_supports' => '',
        'title'          => esc_html__( 'LifterLMS', 'vonline' ),
    ) );

	$wp_customize->add_section(
        'vonline_lifterlms_general',
        array(
            'title'         => esc_html__( 'General', 'vonline'),
            'priority'      => 10,
            'panel'         => 'vonline_lifterlms', 
        )
	);
	
	//Courses loop
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'lgc', array(
        	'label' => esc_html__( 'Courses archives', 'vonline'),
        	'section' => 'vonline_lifterlms_general',
        	'settings' => 'vonline_options[info]',
        ) )
    ); 	
    $wp_customize->add_setting(
        'vonline_lifter_course_cols',
        array(
            'default' => 3,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'vonline_lifter_course_cols',
        array(
            'label'         => esc_html__( 'Course catalog columns', 'vonline' ),
            'section'       => 'vonline_lifterlms_general',
            'type'          => 'number',
            'input_attrs' => array(
                'min'   => 2,
                'max'   => 4,
                'step'  => 1,
            ),            
        )
	);

    $wp_customize->add_setting(
        'vonline_lifter_course_loop_sidebar',
        array(
            'default'           => 'no-sidebar',
            'sanitize_callback' => 'vonline_sanitize_selects',
        )
    );
    $wp_customize->add_control(
        'vonline_lifter_course_loop_sidebar',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Sidebar layout', 'vonline'),
            'section'     => 'vonline_lifterlms_general',
            'choices' => array(
                'no-sidebar'    => esc_html__( 'No sidebar', 'vonline' ),
                'sidebar-left'  => esc_html__( 'Sidebar left', 'vonline' ),
                'sidebar-right' => esc_html__( 'Sidebar right', 'vonline' ),
            ),
        )
    );	
	
	//Memberships
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'lgm', array(
        	'label' => esc_html__( 'Membership archives', 'vonline'),
        	'section' => 'vonline_lifterlms_general',
        	'settings' => 'vonline_options[info]',
        ) )
    ); 		
    $wp_customize->add_setting(
        'vonline_lifter_membership_cols',
        array(
            'default' => 3,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'vonline_lifter_membership_cols',
        array(
            'label'         => esc_html__( 'Memberships columns', 'vonline' ),
            'section'       => 'vonline_lifterlms_general',
            'type'          => 'number',
            'input_attrs' => array(
                'min'   => 2,
                'max'   => 4,
                'step'  => 1,
            ),            
        )
	);	
	
    $wp_customize->add_setting(
        'vonline_lifter_membership_loop_sidebar',
        array(
            'default'           => 'no-sidebar',
            'sanitize_callback' => 'vonline_sanitize_selects',
        )
    );
    $wp_customize->add_control(
        'vonline_lifter_membership_loop_sidebar',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Sidebar layout', 'vonline'),
            'section'     => 'vonline_lifterlms_general',
            'choices' => array(
                'no-sidebar'    => esc_html__( 'No sidebar', 'vonline' ),
                'sidebar-left'  => esc_html__( 'Sidebar left', 'vonline' ),
                'sidebar-right' => esc_html__( 'Sidebar right', 'vonline' ),
            ),
        )
	);		
	//Styling
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'lgs', array(
        	'label' => esc_html__( 'Styling', 'vonline'),
        	'section' => 'vonline_lifterlms_general',
        	'settings' => 'vonline_options[info]',
        ) )
	); 	

    $wp_customize->add_setting(
        'vonline_lifter_loop_title_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'vonline_lifter_loop_title_color',
            array(
                'label'         => esc_html__( 'Archives titles color', 'vonline' ),
                'section'       => 'vonline_lifterlms_general',
                'settings'      => 'vonline_lifter_loop_title_color',
            )
        )
	);	
	
    $wp_customize->add_setting(
        'vonline_lifter_loop_title_color_hover',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'vonline_lifter_loop_title_color_hover',
            array(
                'label'         => esc_html__( 'Archives titles color (hover)', 'vonline' ),
                'section'       => 'vonline_lifterlms_general',
                'settings'      => 'vonline_lifter_loop_title_color_hover',
            )
        )
	);		
	
    $wp_customize->add_setting(
        'vonline_lifter_loop_meta_color',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'vonline_lifter_loop_meta_color',
            array(
                'label'         => esc_html__( 'Archives entry meta', 'vonline' ),
                'section'       => 'vonline_lifterlms_general',
                'settings'      => 'vonline_lifter_loop_meta_color',
            )
        )
	);		
	
    $wp_customize->add_setting(
        'vonline_lifter_loop_title_size',
        array(
            'sanitize_callback' => 'absint',
            'default'         	=> 25
        )       
    );
    $wp_customize->add_control( 'vonline_lifter_loop_title_size', array(
        'type'        => 'number',
        'section'     => 'vonline_lifterlms_general',
		'label'       => esc_html__( 'Archives titles font size', 'vonline' ),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 40,
            'step'  => 1,
        ),
    ) ); 	

/**
 * Single course
 */
$wp_customize->add_section(
    'vonline_lifterlms_course',
    array(
        'title'         => esc_html__( 'Single course', 'vonline'),
        'priority'      => 10,
        'panel'         => 'vonline_lifterlms', 
    )
);

$wp_customize->add_setting(
    'vonline_lifter_course_title_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'vonline_lifter_course_title_color',
        array(
            'label'         => esc_html__( 'Course title', 'vonline' ),
            'section'       => 'vonline_lifterlms_course',
            'settings'      => 'vonline_lifter_course_title_color',
        )
    )
);	

$wp_customize->add_setting(
    'vonline_lifter_course_title_size',
    array(
        'sanitize_callback' => 'absint',
        'default'         	=> 36
    )       
);
$wp_customize->add_control( 'vonline_lifter_course_title_size', array(
    'type'        => 'number',
    'section'     => 'vonline_lifterlms_course',
    'label'       => esc_html__( 'Course title font size', 'vonline' ),
    'input_attrs' => array(
        'min'   => 10,
        'max'   => 50,
        'step'  => 1,
    ),
) ); 

$wp_customize->add_setting(
    'vonline_lifter_course_accent_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'vonline_lifter_course_accent_color',
        array(
            'label'         => esc_html__( 'Course accent color', 'vonline' ),
            'section'       => 'vonline_lifterlms_course',
            'settings'      => 'vonline_lifter_course_accent_color',
        )
    )
);

$wp_customize->add_section(
    'vonline_lifterlms_lesson',
    array(
        'title'         => esc_html__( 'Single lesson', 'vonline'),
        'priority'      => 10,
        'panel'         => 'vonline_lifterlms', 
    )
);

$wp_customize->add_setting(
    'vonline_lifter_lesson_title_color',
    array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'vonline_lifter_lesson_title_color',
        array(
            'label'         => esc_html__( 'Lesson title', 'vonline' ),
            'section'       => 'vonline_lifterlms_lesson',
            'settings'      => 'vonline_lifter_lesson_title_color',
        )
    )
);	

$wp_customize->add_setting(
    'vonline_lifter_lesson_title_size',
    array(
        'sanitize_callback' => 'absint',
        'default'         	=> 36
    )       
);
$wp_customize->add_control( 'vonline_lifter_lesson_title_size', array(
    'type'        => 'number',
    'section'     => 'vonline_lifterlms_lesson',
    'label'       => esc_html__( 'Lesson title font size', 'vonline' ),
    'input_attrs' => array(
        'min'   => 10,
        'max'   => 50,
        'step'  => 1,
    ),
) ); 