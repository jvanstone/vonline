<?php
/**
 * Learndash Customizer options
 *
 * @package vonline
 */


    $wp_customize->add_panel( 'vonline_learndash', array(
        'priority'       => 29,
        'theme_supports' => '',
        'title'          => esc_html__( 'Learndash', 'vonline' ),
    ) );

	$wp_customize->add_section(
        'vonline_learndash_layout',
        array(
            'title'         => esc_html__( 'Layout', 'vonline'),
            'priority'      => 10,
            'panel'         => 'vonline_learndash', 
        )
    );
    

    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'learndashlayoutcourse', array(
        	'label' => esc_html__( 'Single courses', 'vonline'),
        	'section' => 'vonline_learndash_layout',
        	'settings' => 'vonline_options[info]',
        ) )
	); 	
	
    $wp_customize->add_setting(
        'vonline_lifter_single_course_sidebar',
        array(
            'default'           => 'sidebar-right',
            'sanitize_callback' => 'vonline_sanitize_selects',
        )
    );
    $wp_customize->add_control(
        'vonline_lifter_single_course_sidebar',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Sidebar layout', 'vonline'),
            'section'     => 'vonline_learndash_layout',
            'choices' => array(
                'no-sidebar'    => esc_html__( 'No sidebar', 'vonline' ),
                'sidebar-left'  => esc_html__( 'Sidebar left', 'vonline' ),
                'sidebar-right' => esc_html__( 'Sidebar right', 'vonline' ),
            ),
        )
    );		
    
    $wp_customize->add_setting('vonline_options[info]', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new vonline_Info( $wp_customize, 'learndashlayoutqt', array(
        	'label' => esc_html__( 'Single lessons, topics, quizzes etc.', 'vonline'),
        	'section' => 'vonline_learndash_layout',
        	'settings' => 'vonline_options[info]',
        ) )
	); 	
	
    $wp_customize->add_setting(
        'vonline_lifter_single_lesson_sidebar',
        array(
            'default'           => 'sidebar-right',
            'sanitize_callback' => 'vonline_sanitize_selects',
        )
    );
    $wp_customize->add_control(
        'vonline_lifter_single_lesson_sidebar',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Sidebar layout', 'vonline'),
            'section'     => 'vonline_learndash_layout',
            'choices' => array(
                'no-sidebar'    => esc_html__( 'No sidebar', 'vonline' ),
                'sidebar-left'  => esc_html__( 'Sidebar left', 'vonline' ),
                'sidebar-right' => esc_html__( 'Sidebar right', 'vonline' ),
            ),
        )
	);		    