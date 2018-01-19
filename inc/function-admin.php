<?php
/**
 * ------------------
 * Admin Panel.
 * ------------------
 */

function ash_express_add_admin_page() {
    // Generate Express Admin Page.
    add_menu_page( 'Express Theme Options', 'Express', 'manage_options', 'ash_express', 'ash_express_theme_create_page', 'dashicons-admin-customizer', 110);

    // Generate Expres Admin Sub Page.
    add_submenu_page( 'ash_express', 'Express Theme Options', 'General', 'manage_options', 'ash_express', 'ash_express_theme_create_page');
    add_submenu_page( 'ash_express', 'Express CSS Options', 'Custom CSS', 'manage_options', 'ash_express_css', 'ash_express_settings_page');
}
add_action( 'admin_menu', 'ash_express_add_admin_page' );

function ash_express_theme_create_page() {
    // Generation of Admin Page.
    require_once( get_template_directory().'/inc/templates/express-admin.php');
}

function ash_express_settings_page() {
    // Generation of Single Admin Menu Page.
}