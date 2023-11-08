<?php
/**
 * Plugin Name: Custom Popup Plugin
 * Description: A plugin to show a customizable HTML popup after a delay or upon a button click.
 * Version: 1.0
 * Author: D.kandekore
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Create menu link in admin panel
function custom_popup_plugin_menu() {
    add_menu_page('Custom Popup Plugin Settings', 'Popup Settings', 'administrator', __FILE__, 'custom_popup_plugin_settings_page');
}

add_action('admin_menu', 'custom_popup_plugin_menu');

// Create settings page content
function custom_popup_plugin_settings_page() {
	
	$delay = get_option('custom_popup_plugin_delay', '0'); // '0' is the default value if the setting is not found
    echo '<p>Current delay setting: ' . esc_html($delay) . ' minutes</p>';
    ?>
    <div class="wrap">
        <h1>Custom Popup Settings</h1>
        <form method="post" action="options.php">
            <?php
                settings_fields('custom-popup-plugin-settings-group');
                do_settings_sections('custom-popup-plugin-settings-group');
                submit_button();
            ?>
            <p>Enter the HTML content for the popup:</p>
            <textarea name="custom_popup_plugin_html_content" style="width:100%;height:200px;"><?php echo esc_textarea(get_option('custom_popup_plugin_html_content')); ?></textarea>

            <p>Set the delay for the popup (0 for immediate, 1-10 for delay in minutes, -1 to disable automatic popup):</p>
            <input type="number" name="custom_popup_plugin_delay" value="<?php echo esc_attr(get_option('custom_popup_plugin_delay', '0')); ?>" min="-1" max="10" step="1">
        </form>
    </div>
    <?php
}


// Register settings
function custom_popup_plugin_register_settings() {
    register_setting('custom-popup-plugin-settings-group', 'custom_popup_plugin_html_content');
    register_setting('custom-popup-plugin-settings-group', 'custom_popup_plugin_delay'); 
}


add_action('admin_init', 'custom_popup_plugin_register_settings');

// Enqueue the necessary scripts
function custom_popup_plugin_scripts() {
    wp_enqueue_script('custom-popup-plugin-js', plugin_dir_url(__FILE__) . 'custom-popup-plugin.js', array('jquery'), '1.0.0', true);
    wp_localize_script('custom-popup-plugin-js', 'popup_params', array(
        'htmlContent' => get_option('custom_popup_plugin_html_content'),
        'delay' => get_option('custom_popup_plugin_delay', '0') 
    ));
}

add_action('wp_enqueue_scripts', 'custom_popup_plugin_scripts');

// Shortcode to generate the popup button
function custom_popup_plugin_shortcode() {
    return '<button id="custom-popup-plugin-button">Open Popup</button>';
}

add_shortcode('custom_popup_button', 'custom_popup_plugin_shortcode');

function custom_popup_plugin_styles() {
    wp_enqueue_style('custom-popup-plugin-css', plugin_dir_url(__FILE__) . 'custom-popup-plugin.css');
}

add_action('wp_enqueue_scripts', 'custom_popup_plugin_styles');
