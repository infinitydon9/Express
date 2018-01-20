<?php
/**
 * ------------------
 * Admin Panel.
 * ------------------
 */

function ash_express_add_admin_page() {
    // Generate Express Admin Page.
    add_menu_page( 'Express Theme Options', 'Express', 'manage_options', 'ash_express', 'ash_express_theme_create_page', 'dashicons-admin-customizer', 110 );

    // Generate Expres Admin Sub Page.
    add_submenu_page( 'ash_express', 'Express Theme Options', 'General', 'manage_options', 'ash_express', 'ash_express_theme_create_page' );
    add_submenu_page( 'ash_express', 'Express CSS Options', 'Custom CSS', 'manage_options', 'ash_express_css', 'ash_express_settings_page' );

    // Activate Custom Settings.
    add_action( 'admin_init', 'ash_express_custom_settings' );
}
add_action( 'admin_menu', 'ash_express_add_admin_page' );

function ash_express_theme_create_page() {
    // Generation of Admin Page.
    require_once( get_template_directory().'/inc/templates/express-admin.php' );
}

function ash_express_settings_page() {
    // Generation of Single Admin Menu Page.
}

function ash_express_custom_settings() {
    register_setting( 'express-setting-group', 'first_name');
    add_settings_section( 'express-sidebar-options', __('Sidebar Option', 'ashexpress'), 'ash_express_sidebar_options', 'ash_express' );
    add_settings_field( 'sidebar-name', __('First Name', 'ashexpress'), 'ash_express_sidebar_name', 'ash_express', 'express-sidebar-options' );
}

function ash_express_sidebar_options() {
    echo "Customize the Sidebar options.";  
}

function ash_express_sidebar_name() {
    $firstName = esc_attr( get_option( 'first_name' ) );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="'.__("First Name", "ashexpress").'" />';
}