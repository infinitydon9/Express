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
    // Register Settings.
    register_setting( 'express-setting-group', 'first_name' );
    register_setting( 'express-setting-group', 'last_name' );
    register_setting( 'express-setting-group', 'user_description' );
    register_setting( 'express-setting-group', 'twitter_handler', 'ash_express_sanitize_twitter_handler' );
    register_setting( 'express-setting-group', 'facebook_handler' );
    register_setting( 'express-setting-group', 'gplus_handler' );
    
    // Creating section to display the settings.
    add_settings_section( 'express-sidebar-options', __('Sidebar Option', 'ashexpress'), 'ash_express_sidebar_options', 'ash_express' );
    
    // Adding setting fields.
    add_settings_field( 'sidebar-name', __('Full Name', 'ashexpress'), 'ash_express_sidebar_name', 'ash_express', 'express-sidebar-options' );
    add_settings_field( 'sidebar-user-description', __('Description', 'ashexpress'), 'ash_express_sidebar_user_description', 'ash_express', 'express-sidebar-options' );
    add_settings_field( 'sidebar-twitter', __('Twitter Handler', 'ashexpress'), 'ash_express_sidebar_twitter', 'ash_express', 'express-sidebar-options' );
    add_settings_field( 'sidebar-facebook', __('Facebook Handler', 'ashexpress'), 'ash_express_sidebar_facebook', 'ash_express', 'express-sidebar-options' );
    add_settings_field( 'sidebar-gplus', __('Google+ Handler', 'ashexpress'), 'ash_express_sidebar_gplus', 'ash_express', 'express-sidebar-options' );
}

function ash_express_sidebar_options() {
    echo __('Customize the Sidebar options.', 'ashexpress');  
}

function ash_express_sidebar_name() {
    $firstName = esc_attr( get_option( 'first_name' ) );
    $lastName = esc_attr( get_option( 'last_name' ) );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="'.__("First Name", "ashexpress").'" />
    <input type="text" name="last_name" value="'.$lastName.'" placeholder="'.__("Last Name", "ashexpress").'" />';
}

function ash_express_sidebar_user_description() {
    $userDescription = esc_attr( get_option( 'user_description' ) );
    echo '<input class="regular-text" type="text" name="user_description" value="'.$userDescription.'" placeholder="'.__('Description', 'ashexpress').'" />
    <p class="description">'.__("Write something smart.", "ashexpress").'</p>';
}

function ash_express_sidebar_twitter() {
    $twitter = esc_attr( get_option( 'twitter_handler' ) );
    echo '<input class="regular-text" type="text" name="twitter_handler" value="'.$twitter.'" placeholder="'.__("Twitter Handler", "ashexpress").'" />
    <p class="description">'.__("Input your Twitter username without @ character.", "ashexpress").'</p>';
}

function ash_express_sidebar_facebook() {
    $facebook = esc_attr( get_option( 'facebook_handler' ) );
    echo '<input class="regular-text" type="text" name="facebook_handler" value="'.$facebook.'" placeholder="'.__("Facebook Handler", "ashexpress").'" />';
}

function ash_express_sidebar_gplus() {
    $gplus = esc_attr( get_option( 'gplus_handler' ) );
    echo '<input class="regular-text" type="text" name="gplus_handler" value="'.$gplus.'" placeholder="'.__("Google+ Handler", "ashexpress").'" />';
}

// Sanitize Settings.
function ash_express_sanitize_twitter_handler( $input ) {
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}