<?php

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

class FSBW_Buttons_Settings
{
    public function render_buttons_field($options)
    {
        $buttons = isset($options['fsbw_buttons']) ? $options['fsbw_buttons'] : array();
?>
        <div class="buttons-settings fsbw-container">
            <h2>Buttons</h2>
            <p style="margin-top: 0">Use the open-source <a href="https://simpleicons.org" target="_blank" alt="Simple Icon">Simple Icons Library</a> to find a social icon and enter its title in the icon field</p>
            <div id="fsbw-buttons-list">
                <?php
                foreach ($buttons as $index => $button) {
                ?>
                    <div class="fsbw-container fsbw-container_raised">
                        <div class="fsbw-button-header">
                            <h4>Button <?php echo esc_html($index + 1); ?></h4>
                            <a href="#" class="remove-button button-link-delete">Delete</a>
                        </div>
                        <div class="form-field">
                            <label for="fsbw_button_icon_<?php echo esc_attr($index); ?>">Icon</label>
                            <input type="text" id="fsbw_button_icon_<?php echo esc_attr($index); ?>" name="fsbw_settings[fsbw_buttons][<?php echo esc_attr($index); ?>][icon]" value="<?php echo esc_attr($button['icon']); ?>" />
                        </div>
                        <div class="form-field">
                            <label for="fsbw_button_bg_color_<?php echo esc_attr($index); ?>">Button Color</label>
                            <input type="text" class="color-picker" id="fsbw_button_bg_color_<?php echo esc_attr($index); ?>" name="fsbw_settings[fsbw_buttons][<?php echo esc_attr($index); ?>][bg_color]" value="<?php echo esc_attr($button['bg_color']); ?>" />
                        </div>
                        <div class="form-field">
                            <label for="fsbw_button_icon_color_<?php echo esc_attr($index); ?>">Icon Color</label>
                            <input type="text" class="color-picker" id="fsbw_button_icon_color_<?php echo esc_attr($index); ?>" name="fsbw_settings[fsbw_buttons][<?php echo esc_attr($index); ?>][icon_color]" value="<?php echo esc_attr($button['icon_color']); ?>" />
                        </div>
                        <div class="form-field">
                            <label for="fsbw_button_link_<?php echo esc_attr($index); ?>">Link</label>
                            <input type="text" id="fsbw_button_link_<?php echo esc_attr($index); ?>" name="fsbw_settings[fsbw_buttons][<?php echo esc_attr($index); ?>][link]" value="<?php echo esc_attr($button['link']); ?>" placeholder="Ex. https://t.me/your_phone_number" />
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <a href="#" class="button add-button">+ Add Button</a>
        </div>
<?php
    }
}
