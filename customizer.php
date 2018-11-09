<?php
/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function text_domain_customizer_register( $wp_customize ) {

  // Add custom control.
  require get_parent_theme_file_path( 'inc/customizer/controls/class-gutenberg-toggle.php' );
  
  // Register the custom control type.
  $wp_customize->register_control_type( 'Text_Domain_Gutenberg_Toggle_Control' );
  
  // Add an option to disable the logo.
  $wp_customize->add_setting( 'text_domain_gutenberg_toggle', array(
    'default'           => false,
    'transport'         => 'refresh',
    'sanitize_callback' => 'text_domain_sanitize_checkbox',
  ) );

  $wp_customize->add_control( new Text_Domain_Gutenberg_Toggle_Control( $wp_customize, 'text_domain_gutenberg_toggle', array(
    'label'       => esc_html__( 'Example Toggle', 'text-domain' ),
    'section'     => 'text_domain_toggle',
    'type'        => 'text-domain-gutenberg-toggle',
    'settings'    => 'text_domain_gutenberg_toggle',
  ) ) );
}
add_action('customize_register', 'text_domain_customizer_register');


/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function text_domain_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}
