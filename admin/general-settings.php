<?php

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

class FSBW_General_Settings {
    public function render_settings_section($options) {
        ?>
        <div class="general-settings fsbw-container">
            <h2>General Settings</h2>
            <div class="form-field">
                <label for="fsbw_active">Active</label>
                <input type="checkbox" id="fsbw_active" name="fsbw_settings[fsbw_active]" value="1" <?php checked(1, isset($options['fsbw_active']) ? $options['fsbw_active'] : 0); ?> />
            </div>
            <div class="form-field">
                <label for="fsbw_display">Display</label>
                <select id="fsbw_display" name="fsbw_settings[fsbw_display]">
                    <option value="sitewide" <?php selected(isset($options['fsbw_display']) ? $options['fsbw_display'] : '', 'sitewide'); ?>>Whole site</option>
                    <?php foreach (get_pages() as $page): ?>
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
                <textarea id="fsbw_main_icon" name="fsbw_settings[fsbw_main_icon]" placeholder="Paste your svg icon code here"><?php echo isset($options['fsbw_main_icon']) ? esc_textarea($options['fsbw_main_icon']) : ''; ?></textarea>
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
