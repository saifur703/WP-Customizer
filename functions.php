<?php

if (!function_exists('wp_customizer_setup')):

    function wp_customizer_setup()
{

        load_theme_textdomain('wp_customizer', get_template_directory() . '/languages');

        add_theme_support('automatic-feed-links');

        add_theme_support('title-tag');

        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'wp_customizer'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'wp_customizer_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'wp_customizer_setup');

function wp_customizer_scripts()
{
    wp_enqueue_style('wp_customizer-bootstrap-css', "//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css", array(), '1.0', 'all');
    wp_enqueue_style('wp_customizer-font-awesome-css', "//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
", array(), '1.0', 'all');
    wp_enqueue_style('wp_customizer-style', get_stylesheet_uri(), array(), '1.0', 'all');

    $service_icon_color = get_theme_mod('wp_customize_icon_color', '#000');
    $service_icon_style = <<<EOD
        .single-service i.fa {
            color: {$service_icon_color};
        }
    EOD;
    wp_add_inline_style('wp_customizer-style', $service_icon_style);

    wp_enqueue_script('wp_customizer-bootstrap-js', "//cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js", array('jquery'), '1.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wp_customizer_scripts');

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/lib/plugins/csf/cs-framework.php';
require get_template_directory() . '/inc/csf-customizer.php';

function wp_customizer_customizer_assets()
{
    wp_enqueue_script('wp_customizer-customizer-js', get_template_directory_uri() . '/assets/js/customizer.js', array('jquery', 'customize-preview'), time(), true);
}
add_action('customize_preview_init', 'wp_customizer_customizer_assets');