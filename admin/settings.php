<?php

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

require_once 'general-settings.php';
require_once 'buttons-settings.php';
require_once 'default-settings.php';

class FSBW_Admin_Settings {
    public function add_admin_menu() {
        add_menu_page(
            'Floating Social Buttons Widget',
            'FSBw',
            'manage_options',
            'fsbw',
            array($this, 'create_admin_page'),
            'dashicons-marker'
        );
    }

    public function register_settings() {
        register_setting('floating_buttons_widget_group', 'fsbw_settings');
    }

    private function get_settings() {
        $defaults = (new FSBW_Default_Settings())->get_default_settings();
        $options = get_option('fsbw_settings', array());
        return wp_parse_args($options, $defaults);
    }

    public function create_admin_page() {
        $plugin_data = get_file_data(plugin_dir_path(__FILE__) . '../fsbw.php', array('Version' => 'Version'));
        $this->version = $plugin_data['Version'];
        ?>
        <div class="fsbw">
            <div class="wrap">
                <div class="title-bar">
                    <span class="dashicons dashicons-marker" style="color: #9285FF;"></span>
                    <h1>Floating Social Buttons Widget <span class="text-subtle">v<?php echo esc_html($this->version); ?></span></h1>
                    <span class="text-subtle author"><a href="https://github.com/design-ninja" target="_blank" alt="Visit my github page">by lirik</a></span>
                </div>
                <form method="post" action="options.php">
                    <?php
                    settings_fields('floating_buttons_widget_group');
                    $options = $this->get_settings();
                    (new FSBW_General_Settings())->render_settings_section($options);
                    (new FSBW_Buttons_Settings())->render_buttons_field($options);
                    submit_button();
                    ?>
                </form>
                <span>
                    Find this plugin useful? <a href="https://buymeacoffee.com/design_ninja" target="_blank" alt="Buy me a coffee ☕️">Buy me a coffee</a> ☕️
                </span>
            </div>
        </div>
        <?php
    }
}
