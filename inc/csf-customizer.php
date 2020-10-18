<?php

function wp_customizer_csf_init()
{
    CSFramework_Customize::instance(array());
}
add_action("init", "wp_customizer_csf_init");

function wp_customize_csf_settings($options)
{

    $options = array();

    $options[] = array(
        'name' => 'wp_customize_csf_fields',
        'title' => __("Codestar Demo", "wp_customizer"),
        'settings' => array(
            array(
                'name' => 'demo_title',
                'default' => __("Demo Title", "wp_customizer"),
                'control' => array(
                    'label' => __("Demo Title", "wp_customizer"),
                    'type' => 'text',
                ),
                'transport' => 'postMessage',
            ),

            array(
                'name' => 'demo_description',
                'default' => __("Demo Description", "wp_customizer"),
                'control' => array(
                    'label' => __("Demo Description", "wp_customizer"),
                    'type' => 'textarea',
                ),
            ),
            array(
                'name' => 'demo_pages',
                'control' => array(
                    'label' => __("Demo Dropdown pages", "wp_customizer"),
                    'type' => 'dropdown-pages',
                ),
            ),
        ),
    );

    // codestar specific field control
    $options[] = array(
        'name' => 'wp_customize_csf_controls',
        'title' => __("Codestar Controls", "wp_customizer"),
        'active_callback' => function () {
            return true; // add custom code in customize.class in line number 114
        },
        'settings' => array(
            array(
                'name' => 'switcher',
                'default' => 1,
                'control' => array(
                    'label' => __("Switcher", "wp_customizer"),
                    'type' => 'cs_field',
                    'options' => array(
                        'type' => 'switcher',
                        'label' => __("Select Color", "wp_customizer"),
                    ),
                ),
            ),
            array(
                'name' => 'switcher_text',
                'control' => array(
                    'label' => __("Switcher Text", "wp_customizer"),
                    'type' => 'text',
                    'active_callback' => function () {
                        return cs_get_customize_option('switcher');
                    },
                ),
            ),
            array(
                'name' => 'icon',
                'default' => 'fa fa-heart',
                'control' => array(
                    'label' => __("Icon", "wp_customizer"),
                    'type' => 'cs_field',
                    'options' => array(
                        'type' => 'icon',
                        'label' => __("Select Icon", "wp_customizer"),
                    ),
                ),
            ),
            array(
                'name' => 'pages',
                'control' => array(
                    'label' => __("Pages", "wp_customizer"),
                    'type' => 'cs_field',
                    'options' => array(
                        'type' => 'select',
                        'title' => 'Select Field for posts',
                        'options' => 'posts',
                        'query_args' => array(
                            'post_type' => 'post',
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                        ),
                        'default_option' => 'Select a post',
                    ),
                ),
            ),
        ),
    );

    return $options;
}
add_filter("cs_customize_options", "wp_customize_csf_settings");