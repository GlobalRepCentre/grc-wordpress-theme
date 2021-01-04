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

  // Add settings in WP Theme customizer to modify content of the GRC promo panel
  $wp_customize->add_section( 'grc_donate_panel' , array(
    'title'      => __( 'GRC Donation Panel', 'global-reporting-centre' ),
    'priority'   => 30,
  ));
  $wp_customize->add_setting( 'grc_donate_header', array( 'sanitize_callback' => 'sanitize_text_field', ) );
  $wp_customize->add_control( 'grc_donate_header',
    array(
      'label'      => __( 'Donate Panel Header', 'global-reporting-centre' ),
      'type'       => 'text',
      'section'    => 'grc_donate_panel',
      'settings'   => 'grc_donate_header'
    )
  );
  // Sanitize textarea field
  function sanitize_textarea($input) {
    $allowed = array('p' => array(), 'a' => array());
    return wp_kses( $input, $allowed);
  }
  $wp_customize->add_setting( 'grc_donate_text', array( 'sanitize_callback' => 'sanitize_textarea', ) );
  $wp_customize->add_control( 'grc_donate_text',
    array(
      'label'      => __( 'Donate Panel Text', 'global-reporting-centre' ),
      'type'       => 'textarea',
      'section'    => 'grc_donate_panel',
      'settings'   => 'grc_donate_text'
    )
  );
  $wp_customize->add_setting( 'grc_donate_link_text', array( 'sanitize_callback' => 'sanitize_text_field', ) );
  $wp_customize->add_control( 'grc_donate_link_text',
    array(
      'label'      => __( 'Donate Panel Button Text', 'global-reporting-centre' ),
      'type'       => 'text',
      'section'    => 'grc_donate_panel',
      'settings'   => 'grc_donate_link_text'
    )
  );
  $wp_customize->add_setting( 'grc_donate_link', array( 'sanitize_callback' => 'esc_url_raw', ) );
  $wp_customize->add_control( 'grc_donate_link',
    array(
      'label'      => __( 'Donate Panel Button URL', 'global-reporting-centre' ),
      'type'       => 'url',
      'description'=> 'What should the button link to?',
      'section'    => 'grc_donate_panel',
      'settings'   => 'grc_donate_link'
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
