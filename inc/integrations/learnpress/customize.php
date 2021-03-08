<?php
/**
 * Learnpress Customizer options
 *
 * @package vonline
 */


	$wp_customize->add_section(
        'vonline_learnpress',
        array(
            'title'         => esc_html__( 'Learnpress', 'vonline'),
            'priority'      => 21,
        )
	);

    $wp_customize->add_setting(
        'vonline_learnpress_course_loop_sidebar',
        array(
            'default'           => 'sidebar-right',
            'sanitize_callback' => 'vonline_sanitize_selects',
        )
    );
    $wp_customize->add_control(
        'vonline_learnpress_course_loop_sidebar',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Sidebar layout (course archive)', 'vonline'),
            'section'     => 'vonline_learnpress',
            'choices' => array(
                'no-sidebar'    => esc_html__( 'No sidebar', 'vonline' ),
                'sidebar-left'  => esc_html__( 'Sidebar left', 'vonline' ),
                'sidebar-right' => esc_html__( 'Sidebar right', 'vonline' ),
            ),
        )
    );


    $wp_customize->add_setting(
        'vonline_learnpress_single_course_sidebar',
        array(
            'default'           => 'sidebar-right',
            'sanitize_callback' => 'vonline_sanitize_selects',
        )
    );
    $wp_customize->add_control(
        'vonline_learnpress_single_course_sidebar',
        array(
            'type'        => 'select',
            'label'       => esc_html__( 'Sidebar layout (single course)', 'vonline'),
            'section'     => 'vonline_learnpress',
            'choices' => array(
                'no-sidebar'    => esc_html__( 'No sidebar', 'vonline' ),
                'sidebar-left'  => esc_html__( 'Sidebar left', 'vonline' ),
                'sidebar-right' => esc_html__( 'Sidebar right', 'vonline' ),
            ),
        )
    );    