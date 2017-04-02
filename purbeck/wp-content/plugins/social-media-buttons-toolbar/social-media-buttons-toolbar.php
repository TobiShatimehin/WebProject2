<?php
/**
 * Plugin Name: Social Media Follow Buttons Bar
 * Plugin URI: https://github.com/ArthurGareginyan/social-media-buttons-toolbar
 * Description: Easily add the smart bar with social media follow buttons (not share, only link to your profiles) to any place of your WordPress website.
 * Author: Arthur Gareginyan
 * Author URI: http://www.arthurgareginyan.com
 * Version: 4.0
 * License: GPL3
 * Text Domain: social-media-buttons-toolbar
 * Domain Path: /languages/
 *
 * Copyright 2015-2017 Arthur Gareginyan (email : arthurgareginyan@gmail.com)
 *
 * This file is part of "Social Media Follow Buttons Bar".
 *
 * "Social Media Follow Buttons Bar" is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * "Social Media Follow Buttons Bar" is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with "Social Media Follow Buttons Bar".  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *               █████╗ ██████╗ ████████╗██╗  ██╗██╗   ██╗██████╗
 *              ██╔══██╗██╔══██╗╚══██╔══╝██║  ██║██║   ██║██╔══██╗
 *              ███████║██████╔╝   ██║   ███████║██║   ██║██████╔╝
 *              ██╔══██║██╔══██╗   ██║   ██╔══██║██║   ██║██╔══██╗
 *              ██║  ██║██║  ██║   ██║   ██║  ██║╚██████╔╝██║  ██║
 *              ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═╝
 *
 *   ██████╗  █████╗ ██████╗ ███████╗ ██████╗ ██╗███╗   ██╗██╗   ██╗ █████╗ ███╗   ██╗
 *  ██╔════╝ ██╔══██╗██╔══██╗██╔════╝██╔════╝ ██║████╗  ██║╚██╗ ██╔╝██╔══██╗████╗  ██║
 *  ██║  ███╗███████║██████╔╝█████╗  ██║  ███╗██║██╔██╗ ██║ ╚████╔╝ ███████║██╔██╗ ██║
 *  ██║   ██║██╔══██║██╔══██╗██╔══╝  ██║   ██║██║██║╚██╗██║  ╚██╔╝  ██╔══██║██║╚██╗██║
 *  ╚██████╔╝██║  ██║██║  ██║███████╗╚██████╔╝██║██║ ╚████║   ██║   ██║  ██║██║ ╚████║
 *   ╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝╚═╝  ╚═══╝   ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═══╝
 *
 */


/**
 * Prevent Direct Access
 *
 * @since 0.1
 */
defined('ABSPATH') or die("Restricted access!");

/**
 * Define global constants
 *
 * @since 4.0
 */
defined('SMEDIABT_DIR') or define('SMEDIABT_DIR', dirname(plugin_basename(__FILE__)));
defined('SMEDIABT_BASE') or define('SMEDIABT_BASE', plugin_basename(__FILE__));
defined('SMEDIABT_URL') or define('SMEDIABT_URL', plugin_dir_url(__FILE__));
defined('SMEDIABT_PATH') or define('SMEDIABT_PATH', plugin_dir_path(__FILE__));
defined('SMEDIABT_TEXT') or define('SMEDIABT_TEXT', 'social-media-buttons-toolbar');
defined('SMEDIABT_VERSION') or define('SMEDIABT_VERSION', '4.0');

/**
 * Register text domain
 *
 * @since 2.0
 */
function smbtoolbar_textdomain() {
    load_plugin_textdomain( SMEDIABT_TEXT, false, SMEDIABT_DIR . '/languages/' );
}
add_action( 'init', 'smbtoolbar_textdomain' );

/**
 * Print direct link to Social Media Follow Buttons Bar admin page
 *
 * Fetches array of links generated by WP Plugin admin page ( Deactivate | Edit )
 * and inserts a link to the Social Media Follow Buttons Bar admin page
 *
 * @since  2.0
 * @param  array $links Array of links generated by WP in Plugin Admin page.
 * @return array        Array of links to be output on Plugin Admin page.
 */
function smbtoolbar_settings_link( $links ) {
    $settings_page = '<a href="' . admin_url( 'options-general.php?page=social-media-buttons-toolbar.php' ) .'">' . __( 'Settings', SMEDIABT_TEXT ) . '</a>';
    array_unshift( $links, $settings_page );
    return $links;
}
add_filter( 'plugin_action_links_'.SMEDIABT_BASE, 'smbtoolbar_settings_link' );

/**
 * Print additional links to plugin meta row
 *
 * @since 3.6
 */
function smbtoolbar_plugin_row_meta( $links, $file ) {

    if ( strpos( $file, 'social-media-buttons-toolbar.php' ) !== false ) {

        $new_links = array(
                           'donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8A88KC7TFF6CS" target="_blank"><span class="dashicons dashicons-heart"></span> ' . __( 'Donate', SMEDIABT_TEXT ) . '</a>'
                           );

        $links = array_merge( $links, $new_links );
    }

    return $links;
}
add_filter( 'plugin_row_meta', 'smbtoolbar_plugin_row_meta', 10, 2 );

/**
 * Register "Social Media Follow Buttons Bar" submenu in "Settings" Admin Menu
 *
 * @since 2.0
 */
function smbtoolbar_register_submenu_page() {
    add_options_page( __( 'Social Media Follow Buttons Bar', SMEDIABT_TEXT ), __( 'Social Media Follow Buttons', SMEDIABT_TEXT ), 'manage_options', basename( __FILE__ ), 'smbtoolbar_render_submenu_page' );
}
add_action( 'admin_menu', 'smbtoolbar_register_submenu_page' );

/**
 * Attach Settings Page
 *
 * @since 3.0
 */
require_once( SMEDIABT_PATH . 'inc/php/settings_page.php' );

/**
 * Base for the _load_scripts hook & Dymamic CSS for the _load_scripts hook
 *
 * @since 4.0
 */
function smbtoolbar_load_scripts_base() {

    // Style sheet
    wp_enqueue_style( 'smbtoolbar-frontend-css', SMEDIABT_URL . 'inc/css/frontend.css' );
    wp_enqueue_style( 'smbtoolbar-bootstrap-tooltip-css', SMEDIABT_URL . 'inc/css/bootstrap-tooltip.css' );

    // JavaScript
    wp_enqueue_script( 'smbtoolbar-bootstrap-tooltip-js', SMEDIABT_URL . 'inc/js/bootstrap-tooltip.js' );

    // Read options from BD, sanitiz data and declare variables
    $options = get_option( 'smbtoolbar_settings' );
    
    // Size of icons
    $icon_size = esc_textarea( $options['icon-size'] );
    if (empty($icon_size)) {
        $icon_size = "64";
    }
    
    // Space between icons
    $margin_right = esc_textarea( $options['margin-right'] );
    if (empty($margin_right)) {
        $margin_right = "10";
    }
    
    // Alignment of toolbar
    if (!empty($options['alignment'])) {
        $alignment = $options['alignment'];
    } else {
        $alignment = 'center';
    }

    // Dynamic CSS
    $custom_css = "
                    .smbt-social-icons {
                        text-align: " . $alignment . " !important;
                    }
                    .smbt-social-icons li img {
                        width: " . $icon_size . "px !important;
                        height: " . $icon_size . "px !important;
                        margin: " . ( $margin_right / 2 ) . "px !important;
                    }
                  ";

    // Inject dynamic CSS
    wp_add_inline_style( 'smbtoolbar-frontend-css', $custom_css );

}

/**
 * Load scripts and style sheet for settings page
 *
 * @since 4.0
 */
function smbtoolbar_load_scripts_admin($hook) {

    // Return if the page is not a settings page of this plugin
    if ( 'settings_page_social-media-buttons-toolbar' != $hook ) {
        return;
    }

    // Style sheet
    wp_enqueue_style( 'smbtoolbar-admin-css', SMEDIABT_URL . 'inc/css/admin.css' );
    wp_enqueue_style( 'smbtoolbar-bootstrap-css', SMEDIABT_URL . 'inc/css/bootstrap.css' );
    wp_enqueue_style( 'smbtoolbar-bootstrap-theme-css', SMEDIABT_URL . 'inc/css/bootstrap-theme.css' );

    // JavaScript
    wp_enqueue_script( 'smbtoolbar-admin-js', SMEDIABT_URL . 'inc/js/admin.js', array(), false, true );
    wp_enqueue_script( 'smbtoolbar-bootstrap-checkbox-js', SMEDIABT_URL . 'inc/js/bootstrap-checkbox.min.js' );
    wp_enqueue_script( 'smbtoolbar-bootstrap-tab', SMEDIABT_URL . 'inc/js/bootstrap-tab.js' );

    // Call the function with a basis of scripts
    smbtoolbar_load_scripts_base();

}
add_action( 'admin_enqueue_scripts', 'smbtoolbar_load_scripts_admin' );

/**
 * Load scripts and style sheet for front end
 *
 * @since 4.0
 */
function smbtoolbar_load_scripts_frontend() {
    
    // Call the function with a basis of scripts
    smbtoolbar_load_scripts_base();

}
add_action( 'wp_enqueue_scripts', 'smbtoolbar_load_scripts_frontend' );

/**
 * Register settings
 *
 * @since 0.1
 */
function smbtoolbar_register_settings() {
    register_setting( 'smbtoolbar_settings_group', 'smbtoolbar_settings' );
}
add_action( 'admin_init', 'smbtoolbar_register_settings' );

/**
 * Render fields for saving social media data to BD
 *
 * @since 1.4
 */
function smbtoolbar_media($name, $label, $placeholder, $help=null, $link=null) {

    // Declare variables
    $options = get_option( 'smbtoolbar_settings' );

    if ( !empty($options["media"][$name]["content"]) ) :
        $value = esc_textarea( $options["media"][$name]["content"] );
    else :
        $value = "";
    endif;

    // Generate the table
    if ( !empty($link) ) :
        $link_out = "<a href='$link' target='_blank'>$label</a>";
    else :
        $link_out = "$label";
    endif;

    $label = "<input type='hidden' name='smbtoolbar_settings[media][$name][label]' value='$label'>";
    $slug = "<input type='hidden' name='smbtoolbar_settings[media][$name][slug]' value='$name'>";
    $field_out = "<input type='text' name='smbtoolbar_settings[media][$name][content]' size='50' value='$value' placeholder='$placeholder'>";

    // Put table to the variables $out and $help_out
    $out = "<tr valign='top'>
                <th scope='row'>
                    $link_out
                </th>
                <td>
                    $label
                    $slug
                    $field_out
                </td>
            </tr>";
    if ( !empty($help) ) :
        $help_out = "<tr valign='top'>
                        <td></td>
                        <td class='help-text'>
                            $help
                        </td>
                     </tr>";
    else :
        $help_out = "";
    endif;

    // Print the generated table
    echo $out . $help_out;
}

/**
 * Render checkboxes and fields for saving settings data to BD
 *
 * @since 1.0
 */
function smbtoolbar_setting($name, $label, $help=null, $field=null, $placeholder=null, $size=null) {

    // Declare variables
    $options = get_option( 'smbtoolbar_settings' );

    if ( !empty($options[$name]) ) :
        $value = esc_textarea( $options[$name] );
    else :
        $value = "";
    endif;

    // Generate the table
    if ( !empty($options[$name]) ) :
        $checked = "checked='checked'";
    else :
        $checked = "";
    endif;

    if ( $field == "check" ) {
        $input = "<input type='checkbox' name='smbtoolbar_settings[$name]' id='smbtoolbar_settings[$name]' $checked >";
    } elseif ( $field == "field" ) {
        $input = "<input type='text' name='smbtoolbar_settings[$name]' size='$size' value='$value' placeholder='$placeholder'>";
    }

    // Put table to the variables $out and $help_out
    $out = "<tr valign='top'>
                <th scope='row'>
                    $label
                </th>
                <td>
                    $input
                </td>
            </tr>";
    if ( !empty($help) ) :
        $help_out = "<tr valign='top'>
                        <td></td>
                        <td class='help-text'>
                            $help
                        </td>
                     </tr>";
    else :
        $help_out = "";
    endif;

    // Print the generated table
    echo $out . $help_out;
}

/**
 * Generate the buttons toolbar
 *
 * @since 4.0
 */
function smbtoolbar_tollbar() {

    // Read options from BD, sanitiz data and declare variables
    $options = get_option( 'smbtoolbar_settings' );
    $media = $options['media'];

    // Open link in new tab
    if (!empty($options['new_tab'])) {
        $new_tab = 'target="blank"';
    } else {
        $new_tab = '';
    }

    // Enable Tolltips
    if (!empty($options['tooltips'])) {
        $tooltips = 'data-toggle="tooltip"';
    } else {
        $tooltips = '';
    }

    // Add a caption above of buttons
    $caption = esc_textarea( $options['caption'] );
    if (empty($caption)) {
        $caption = "";
    }

    // Generate the Buttons
    $metatags_arr[] = '<ul class="smbt-social-icons">';
    if ( !empty($media) ) {
        foreach ($media as $name) {
            foreach ($name as $key => $value) {
                if ($key == "slug") {
                    $slag = $value;
                }
                if ($key == "label") {
                    $label = $value;
                }
                if ($key == "content") {
                    if (!empty($value)) {
                        $icon = plugins_url( "inc/img/social-media-icons/$slag.png", __FILE__ );
                        $metatags_arr[] = '<li>
                                                <a href="' . $value . '" ' . $tooltips . ' title="' . $label . '" ' . $new_tab . '>
                                                    <img src="' . $icon . '" alt="' . $label . '" />
                                                </a>
                                            </li>';
                    }
                }
            }
        }
    }
    $metatags_arr[] = '</ul>';

    // Add script for toolbar
    if (!empty($options['tooltips'])) {
        $js = "<script type='text/javascript'>
                    jQuery(document).ready(function($) {

                        // Enable Bootstrap Tooltips
                        $('[data-toggle=\"tooltip\"]').tooltip();

                    });
               </script>";
    } else {
        $js = '';
    }

    if ( count( $metatags_arr ) > 0 ) {
        array_unshift( $metatags_arr, $caption );
        array_push( $metatags_arr, $js );
    }

    // Return the content of array
    return $metatags_arr;
    
}

/**
 * Create the shortcode "[smbtoolbar]"
 *
 * @since 0.2
 */
function smbtoolbar_shortcode() {
    return implode(PHP_EOL, smbtoolbar_tollbar());
}
add_shortcode( 'smbtoolbar', 'smbtoolbar_shortcode' );

/**
 * Allow shortcodes in the text widget
 *
 * @since 0.2
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Add toolbar to the beginning of each post or/and page.
 *
 * @since 0.2
 */
function smbtoolbar_addContent( $content ) {
    $options = get_option( 'smbtoolbar_settings' );

    if ( is_single() ) {
        if ( !empty($options['show_posts']) && $options['show_posts'] == "on" ) {
            $content = $content . smbtoolbar_shortcode();
        }
    }

    if ( is_page() ) {
        if ( !empty($options['show_pages']) && $options['show_pages'] == "on" ) {
            $content = $content . smbtoolbar_shortcode();
        }
    }

    // Returns the content.
    return $content;
}
add_action( 'the_content', 'smbtoolbar_addContent' );

/**
 * Delete options on uninstall
 *
 * @since 0.1
 */
function smbtoolbar_uninstall() {
    delete_option( 'smbtoolbar_settings' );
}
register_uninstall_hook( __FILE__, 'smbtoolbar_uninstall' );

?>
