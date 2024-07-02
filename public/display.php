<?php

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

class FSBW_Public_Display {
    public function render_floating_buttons($options = null, $is_preview = false) {
        if (!$options) {
            $options = get_option('fsbw_settings');
        }

        $show_on_all_pages = isset($options['fsbw_display']) && $options['fsbw_display'] == 'sitewide';
        $current_page_id = get_the_ID();
        $selected_page_id = isset($options['fsbw_display']) ? intval($options['fsbw_display']) : 0;

        if ((isset($options['fsbw_active']) && $options['fsbw_active']) &&
            ($show_on_all_pages || $current_page_id == $selected_page_id || $is_preview)) {
            $buttons = isset($options['fsbw_buttons']) ? $options['fsbw_buttons'] : array();
            $main_icon_svg = isset($options['fsbw_main_icon']) ? $options['fsbw_main_icon'] : '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M27.1429 4.71429C30.1429 7.71429 32 11.6429 32 15.9286C32 24.6429 24.7143 31.7857 15.9286 31.7857C13.2857 31.7857 10.7143 31.0714 8.35714 29.8571L0 32L2.21429 23.7857C0.857143 21.4286 0.0714286 18.7143 0.0714286 15.8571C0.0714286 7.14286 7.21429 0 15.9286 0C20.2143 0 24.2143 1.71429 27.1429 4.71429ZM15.9286 29.0714C23.2143 29.0714 29.2857 23.1429 29.2857 15.9286C29.2857 12.3571 27.7857 9.07143 25.2857 6.57143C22.7857 4.07143 19.5 2.71429 16 2.71429C8.71428 2.71429 2.78571 8.64286 2.78571 15.8571C2.78571 18.3571 3.5 20.7857 4.78571 22.9286L5.14286 23.4286L3.78571 28.2857L8.78572 26.9286L9.21429 27.2143C11.2857 28.4286 13.5714 29.0714 15.9286 29.0714Z" fill="white"/></svg>';
            $main_icon_bg_color = isset($options['fsbw_main_icon_bg_color']) ? $options['fsbw_main_icon_bg_color'] : '#000000';
            $main_icon_color = isset($options['fsbw_main_icon_color']) ? ltrim($options['fsbw_main_icon_color'], '#') : 'ffffff';
            $position_class = isset($options['fsbw_position']) ? esc_attr($options['fsbw_position']) : 'bottom_right';
            $style_class = isset($options['fsbw_style']) ? esc_attr($options['fsbw_style']) : 'circle';
            $size_class = isset($options['fsbw_size']) ? esc_attr($options['fsbw_size']) : 'medium';
            $border_radius = isset($options['fsbw_border_radius']) ? esc_attr($options['fsbw_border_radius']) : '50%';

            $icon_size = '32';
            if ($size_class == 'small') {
                $icon_size = '24';
            } elseif ($size_class == 'large') {
                $icon_size = '40';
            }

            ?>
            <div id="fsbw-container" class="fsbw-container <?php echo $position_class; ?>">
                <div id="fsbw-buttons" class="fsbw-buttons">
                    <?php
                    foreach ($buttons as $button) {
                        $button_color = isset($button['icon_color']) ? ltrim($button['icon_color'], '#') : 'ffffff';
                        ?>
                        <a href="<?php echo esc_url($button['link']); ?>" target="_blank" class="fsbw-button <?php echo $style_class; ?> <?php echo $size_class; ?>" style="background-color: <?php echo esc_attr($button['bg_color']); ?>; border-radius: <?php echo $style_class == 'rounded' ? $border_radius : '50%'; ?>;">
                            <img src="https://cdn.simpleicons.org/<?php echo esc_attr($button['icon']); ?>/<?php echo esc_attr($button_color); ?>" width="<?php echo $icon_size; ?>" height="<?php echo $icon_size; ?>" />
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <div class="fsbw-main-icon fsbw-button <?php echo $style_class; ?> <?php echo $size_class; ?>" style="background-color: <?php echo esc_attr($main_icon_bg_color); ?>; border-radius: <?php echo $style_class == 'rounded' ? $border_radius : '50%'; ?>;">
                    <?php echo str_replace(array('fill="white"', 'width="32"', 'height="32"'), array('fill="#' . esc_attr($main_icon_color) . '"', 'width="' . $icon_size . '"', 'height="' . $icon_size . '"'), $main_icon_svg); ?>
                </div>
            </div>
            <style>
                <?php echo isset($options['fsbw_custom_css']) ? '.fsbw-button {' . $options['fsbw_custom_css'] . '}' : ''; ?>
            </style>
            <?php
        }
    }

    public function enqueue_styles_and_scripts() {
        wp_enqueue_style('fsbw-styles', plugins_url('styles.css', __FILE__));
        wp_enqueue_script('fsbw-scripts', plugins_url('scripts.js', __FILE__), array('jquery'), null, true);
    }
}
