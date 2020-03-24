<?php
/**
 * Global Reporting Centre Theme Customizer
 *
 * @package Global_Reporting_Centre
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function global_reporting_centre_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    // Add settings in WP Theme customizer to modify content of home page 'about the GRC' panel
    $wp_customize->add_setting( 'grc_about_panel_header' );
    $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'grc_about_panel_header_content',
           array(
               'label'      => __( 'About Panel Header', 'global-reporting-centre' ),
               'type'       => 'text',
               'section'    => 'static_front_page',
               'settings'   => 'grc_about_panel_header'
           )
       )
    );
    $wp_customize->add_setting( 'grc_about_panel_text' );
    $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'grc_about_panel_text_content',
           array(
               'label'      => __( 'About Panel Text', 'global-reporting-centre' ),
               'type'       => 'textarea',
               'section'    => 'static_front_page',
               'settings'   => 'grc_about_panel_text'
           )
       )
    );
    $wp_customize->add_setting( 'grc_about_panel_link_text' );
    $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'grc_about_panel_link_content',
           array(
               'label'      => __( 'About Panel Button Text', 'global-reporting-centre' ),
               'type'       => 'url',
               'section'    => 'static_front_page',
               'settings'   => 'grc_about_panel_link_text'
           )
       )
    );
    $wp_customize->add_setting( 'grc_about_panel_link' );
    $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'grc_about_panel_link_content',
           array(
               'label'      => __( 'About Panel Button URL', 'global-reporting-centre' ),
               'type'       => 'url',
               'description'=> 'Where should the button link to?',
               'section'    => 'static_front_page',
               'settings'   => 'grc_about_panel_link'
           )
       )
    );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'global_reporting_centre_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'global_reporting_centre_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'global_reporting_centre_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function global_reporting_centre_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function global_reporting_centre_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function global_reporting_centre_customize_preview_js() {
	wp_enqueue_script( 'global-reporting-centre-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'global_reporting_centre_customize_preview_js' );
