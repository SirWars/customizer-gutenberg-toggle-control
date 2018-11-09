<?php
/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function text_domain_gutenberg_toggle_register( $wp_customize ) {

  // Add custom control.
  require get_parent_theme_file_path( 'inc/customizer/controls/class-gutenberg-toggle.php' );
  
  // Register the custom control type.
  $wp_customize->register_control_type( 'Text_Domain_Gutenberg_Toggle_Control' );
  
  // Add an option to disable the logo.
  $wp_customize->add_setting( 'text_domain_gutenberg_toggle', array(
    'default'           => false,
    'transport'         => 'postMessage',
    'sanitize_callback' => 'text_domain_sanitize_checkbox',
  ) );

  $wp_customize->add_control( new Text_Domain_Gutenberg_Toggle_Control( $wp_customize, 'text_domain_gutenberg_toggle', array(
    'label'       => esc_html__( 'Example Toggle', 'text-domain' ),
    'section'     => 'text_domain_toggle',
    'type'        => 'text-domain-gutenberg-toggle',
    'settings'    => 'gutenberg_example_toggle',
  ) ) );
}
add_action('customize_register', 'text_domain_gutenberg_toggle_register');

