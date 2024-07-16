<?php

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

class FSBW_General_Settings
{
    public function render_settings_section($options)
    {
        $default_icon = '<svg width="28" height="28" fill="none"><path d="M23.75 4.125C26.375 6.75 28 10.188 28 13.938c0 7.624-6.375 13.874-14.063 13.874-2.312 0-4.562-.625-6.624-1.687L0 28l1.938-7.188a13.892 13.892 0 0 1-1.875-6.937C.063 6.25 6.313 0 13.937 0c3.75 0 7.25 1.5 9.813 4.125Zm-9.813 21.313c6.376 0 11.688-5.188 11.688-11.5 0-3.126-1.313-6-3.5-8.188A11.394 11.394 0 0 0 14 2.375c-6.375 0-11.563 5.188-11.563 11.5 0 2.188.626 4.313 1.75 6.188l.313.437-1.188 4.25 4.376-1.188.375.25c1.812 1.063 3.812 1.625 5.874 1.625Z" fill="#fff"/></svg>';
?>
        <div class="general-settings fsbw-container">
            <h2>General Settings</h2>
            <div class="form-field">
                <label for="fsbw_display">Display</label>
                <select id="fsbw_display" name="fsbw_settings[fsbw_display]">
                    <option value="sitewide" <?php selected(isset($options['fsbw_display']) ? $options['fsbw_display'] : '', 'sitewide'); ?>>Whole site</option>
                    <?php foreach (get_pages() as $page) : ?>
                        <option value="<?php echo esc_attr($page->ID); ?>" <?php selected(isset($options['fsbw_display']) ? $options['fsbw_display'] : '', $page->ID); ?>><?php echo esc_html($page->post_title); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-field">
                <label for="fsbw_position">Position</label>
                <select id="fsbw_position" name="fsbw_settings[fsbw_position]">
                    <option value="bottom_right" <?php selected(isset($options['fsbw_position']) ? $options['fsbw_position'] : '', 'bottom_right'); ?>>Bottom right</option>
                    <option value="bottom_left" <?php selected(isset($options['fsbw_position']) ? $options['fsbw_position'] : '', 'bottom_left'); ?>>Bottom left</option>
                </select>
            </div>
            <div class="form-field">
                <label for="fsbw_style">Button Style</label>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <select id="fsbw_style" name="fsbw_settings[fsbw_style]" style="flex: 1">
                        <option value="circle" <?php selected(isset($options['fsbw_style']) ? $options['fsbw_style'] : '', 'circle'); ?>>Circle</option>
                        <option value="square" <?php selected(isset($options['fsbw_style']) ? $options['fsbw_style'] : '', 'square'); ?>>Square</option>
                        <option value="rounded" <?php selected(isset($options['fsbw_style']) ? $options['fsbw_style'] : '', 'rounded'); ?>>Rounded</option>
                    </select>
                    <input type="text" name="fsbw_settings[fsbw_border_radius]" id="fsbw_border_radius" placeholder="Border Radius (ex. 4px)" value="<?php echo isset($options['fsbw_border_radius']) ? esc_attr($options['fsbw_border_radius']) : ''; ?>" style="display: <?php echo (isset($options['fsbw_style']) && $options['fsbw_style'] == 'rounded') ? 'block' : 'none'; ?>; flex: 1; margin-right: 24px;" />
                </div>
            </div>
            <div class="form-field">
                <label for="fsbw_size">Button Size</label>
                <select id="fsbw_size" name="fsbw_settings[fsbw_size]">
                    <option value="small" <?php selected(isset($options['fsbw_size']) ? $options['fsbw_size'] : '', 'small'); ?>>Small</option>
                    <option value="medium" <?php selected(isset($options['fsbw_size']) ? $options['fsbw_size'] : '', 'medium'); ?>>Medium</option>
                    <option value="large" <?php selected(isset($options['fsbw_size']) ? $options['fsbw_size'] : '', 'large'); ?>>Large</option>
                </select>
            </div>
            <div class="form-field">
                <label for="fsbw_main_icon">Main Button Icon</label>
                <div style="display: grid; gap: 8px;">
                    <textarea id="fsbw_main_icon" name="fsbw_settings[fsbw_main_icon]" placeholder="Paste your svg icon code here"><?php echo isset($options['fsbw_main_icon']) ? esc_textarea($options['fsbw_main_icon']) : ''; ?></textarea>
                    <a href="#" id="reset_main_icon" data-default-icon="<?php echo esc_attr($default_icon); ?>">Reset to default</a>
                </div>
            </div>
            <div class="form-field">
                <label for="fsbw_main_icon_bg_color">Main Button Color</label>
                <input type="text" class="color-picker" id="fsbw_main_icon_bg_color" name="fsbw_settings[fsbw_main_icon_bg_color]" value="<?php echo isset($options['fsbw_main_icon_bg_color']) ? esc_attr($options['fsbw_main_icon_bg_color']) : ''; ?>" />
            </div>
            <div class="form-field">
                <label for="fsbw_main_icon_color">Main Button Icon Color</label>
                <input type="text" class="color-picker" id="fsbw_main_icon_color" name="fsbw_settings[fsbw_main_icon_color]" value="<?php echo isset($options['fsbw_main_icon_color']) ? esc_attr($options['fsbw_main_icon_color']) : ''; ?>" />
            </div>
            <div class="form-field">
                <label for="fsbw_custom_css">Custom CSS</label>
                <textarea id="fsbw_custom_css" name="fsbw_settings[fsbw_custom_css]" placeholder="Make your buttons shine ✨"><?php echo isset($options['fsbw_custom_css']) ? esc_attr($options['fsbw_custom_css']) : ''; ?></textarea>
            </div>
        </div>
<?php
    }
}
