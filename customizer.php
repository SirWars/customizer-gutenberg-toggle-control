<?php
/**
 * Theme Customizer functionality
 */

/**
 * Customizer.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 */
function login_designer_customize_register( $wp_customize ) {

	// Add custom control.
  require get_parent_theme_file_path( 'customizer-controls/toggle/class-login-designer-toggle.php' );
  
  // Register the custom control type.
  $wp_customize->register_control_type( 'Login_Designer_Toggle_Control' );
  
  // Add an option to disable the logo.
  $wp_customize->add_setting( 'login_designer[disable_logo]', array(
    'default'           => 'false',
    'type' 			        => 'option',
    'transport'         => 'postMessage',
    'sanitize_callback' => login_designer_sanitize_checkbox(),
  ) );

  $wp_customize->add_control( new Login_Designer_Toggle_Control( $wp_customize, 'login_designer[disable_logo]', array(
    'label'	      => esc_html__( 'Disable Logo', 'login-designer' ),
    'section'     => 'login_designer__section--styles',
    'type'        => 'toggle',
    'settings'    => 'login_designer[disable_logo]',
  ) ) );
}

