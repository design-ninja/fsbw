<?php

/**
 * Plugin Name: Floating Social Buttons Widget
 * Description: Adds floating customizable action buttons with social media icons on all or specific page of your website.
 * Version: 0.2
 * Author: lirik
 * Author URI: http://github.com/design-ninja
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

require_once plugin_dir_path(__FILE__) . 'admin/settings.php';
require_once plugin_dir_path(__FILE__) . 'public/display.php';

class FloatingButtonsWidget
{
    public function __construct()
    {
        $admin = new FSBW_Admin_Settings();
        $display = new FSBW_Public_Display();

        // Admin actions
        add_action('admin_menu', array($admin, 'add_admin_menu'));
        add_action('admin_init', array($admin, 'register_settings'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));

        // Add settings link
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'add_settings_link'));

        // Public actions
        add_action('wp_footer', array($display, 'render_floating_buttons'));
        add_action('wp_enqueue_scripts', array($display, 'enqueue_styles_and_scripts'));
    }

    public function enqueue_admin_assets()
    {
        $plugin_version = '0.2';

        wp_enqueue_style('fsbw-admin-styles', plugins_url('admin/styles.css', __FILE__), array(), $plugin_version);
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('fsbw-admin-scripts', plugins_url('admin/scripts.js', __FILE__), array('jquery', 'wp-color-picker', 'jquery-ui-sortable'), $plugin_version, true);
    }

    public function add_settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=fsbw">' . __('Settings') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
}

new FloatingButtonsWidget();
