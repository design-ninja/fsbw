<?php

if (!defined('ABSPATH')) {
    exit; // Protect from direct access
}

class FSBW_Default_Settings
{
    public function get_default_settings()
    {
        return array(
            'fsbw_display' => 'sitewide',
            'fsbw_position' => 'bottom_right',
            'fsbw_style' => 'circle',
            'fsbw_size' => 'medium',
            'fsbw_main_icon' => '<svg width="28" height="28" fill="none"><path d="M23.75 4.125C26.375 6.75 28 10.188 28 13.938c0 7.624-6.375 13.874-14.063 13.874-2.312 0-4.562-.625-6.624-1.687L0 28l1.938-7.188a13.892 13.892 0 0 1-1.875-6.937C.063 6.25 6.313 0 13.937 0c3.75 0 7.25 1.5 9.813 4.125Zm-9.813 21.313c6.376 0 11.688-5.188 11.688-11.5 0-3.126-1.313-6-3.5-8.188A11.394 11.394 0 0 0 14 2.375c-6.375 0-11.563 5.188-11.563 11.5 0 2.188.626 4.313 1.75 6.188l.313.437-1.188 4.25 4.376-1.188.375.25c1.812 1.063 3.812 1.625 5.874 1.625Z" fill="#fff"/></svg>
',
            'fsbw_main_icon_bg_color' => '#000',
            'fsbw_main_icon_color' => '#fff',
            'fsbw_custom_css' => 'box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;',
            'fsbw_buttons' => array(
                array(
                    'icon' => 'whatsapp',
                    'bg_color' => '#000',
                    'icon_color' => '#fff',
                    'link' => 'https://wa.me/<number>'
                ),
                array(
                    'icon' => 'telegram',
                    'bg_color' => '#000',
                    'icon_color' => '#fff',
                    'link' => 'https://t.me/<number>'
                )
            )
        );
    }
}
