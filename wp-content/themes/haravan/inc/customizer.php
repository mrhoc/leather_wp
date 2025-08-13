<?php
/**
 * Haravan Theme Customizer
 *
 * @package Haravan
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function haravan_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'haravan_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'haravan_customize_partial_blogdescription',
        ));
    }

    // Add section for theme colors
    $wp_customize->add_section('haravan_colors', array(
        'title'    => __('Theme Colors', 'haravan'),
        'priority' => 30,
    ));

    // Primary color setting
    $wp_customize->add_setting('haravan_primary_color', array(
        'default'           => '#007cba',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'haravan_primary_color', array(
        'label'   => __('Primary Color', 'haravan'),
        'section' => 'haravan_colors',
    )));

    // Secondary color setting
    $wp_customize->add_setting('haravan_secondary_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'haravan_secondary_color', array(
        'label'   => __('Secondary Color', 'haravan'),
        'section' => 'haravan_colors',
    )));
}
add_action('customize_register', 'haravan_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function haravan_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function haravan_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function haravan_customize_preview_js() {
    wp_enqueue_script('haravan-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'haravan_customize_preview_js');

