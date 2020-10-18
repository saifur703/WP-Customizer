<?php

function wp_customize_customize_register($wp_customize)
{

    // Panel
    $wp_customize->add_panel('wp_customize_options', array(
        'title' => __('Theme Options', 'wp_customize'),
        'priority' => 10,
    ));

    // Section - Services
    $wp_customize->add_section('wp_customize_services', array(
        'title' => __('Services', 'wp_customize'),
        'description' => '',
        'priority' => 30,
        'panel' => 'wp_customize_options',
    ));

    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('wp_customize_service_heading', array(
        'default' => 'Our Mission',
        'transport' => 'postMessage', //refresh, postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control('wp_customize_mission_heading_control', array(
        'label' => __('Service Heading', 'wp_customize'),
        'section' => 'wp_customize_services',
        'settings' => 'wp_customize_service_heading',
        'type' => 'text',
    ));

    //  =============================
    //  = Textarea Input            =
    //  =============================
    $wp_customize->add_setting('wp_customize_service_sub_heading', array(
        'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus itaque quibusdam fugiat, dolorum aliquid quo ullam velit qui iure vero dolores quisquam, inventore neque alias tenetur? Voluptates optio, unde doloremque at cumque reprehenderit doloribus eius rerum ullam. Ducimus molestiae natus cumque voluptate quod perspiciatis voluptates perferendis nisi, harum recusandae ipsam.',
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option
    ));

    $wp_customize->add_control('wp_customize_service_sub_heading_control', array(
        'label' => __('Service Sub Heading', 'wp_customize'),
        'section' => 'wp_customize_services',
        'settings' => 'wp_customize_service_sub_heading',
        'type' => 'textarea',
        'active_callback' => function () {
            if (get_theme_mod('wp_customize_service_sub_heading_check') == 1) {
                return true;
            }
            return false;
        },
    ));

    //  =============================
    //  = Checkbox Input            =
    //  =============================
    $wp_customize->add_setting('wp_customize_service_sub_heading_check', array(
        'default' => 1,
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option
    ));
    $wp_customize->add_control('wp_customize_service_sub_heading_check_ctrl', array(
        'label' => __('Display Sub heading', 'wp_customize'),
        'section' => 'wp_customize_services',
        'settings' => 'wp_customize_service_sub_heading_check',
        'type' => 'checkbox',

    ));

    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('wp_customize_icon_color', array(
        'default' => '#000',
        'transport' => 'postMessage', //postMessage
        'type' => 'theme_mod', // option
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'wp_customize_icon_color_ctrl', array(
        'label' => __('Icon Color', 'wp_customize'),
        'section' => 'wp_customize_services',
        'settings' => 'wp_customize_icon_color',
    )));

    //  =============================
    //  = Select Per Item           =
    //  =============================
    $wp_customize->add_setting('wp_customize_select_service_item', array(
        'default' => '4',
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option
    ));

    $wp_customize->add_control('wp_customize_select_service_item_ctrl', array(
        'label' => __('Number of items', 'wp_customize'),
        'section' => 'wp_customize_services',
        'settings' => 'wp_customize_select_service_item',
        'type' => 'select',
        'choices' => array(
            '3' => '4 items in row',
            '4' => '3 items in row',
            '6' => '2 items in row',
        ),
    ));

    // Landing Page Start
    $wp_customize->add_section('wp_customize_landing_page', array(
        'title' => __('Landing Page Heading', 'wp_customize'),
        'description' => '',
        'priority' => 30,
        'active_callback' => function () {
            return is_page_template("page-templates/landing.php");
        },
    ));

    $wp_customize->add_setting('wp_customize_landing_page_refresh_heading', array(
        'default' => 'Refresh Title',
        'transport' => 'postMessage', //refresh, postMessage
        'type' => 'theme_mod', // option

    ));
    $wp_customize->add_control('wp_customize_landing_page_refresh_heading', array(
        'label' => __('Landing Page Heading', 'wp_customize'),
        'section' => 'wp_customize_landing_page',
        'type' => 'text',
    ));
    $wp_customize->selective_refresh->add_partial("heading1", array(
        'selector' => '.heading1',
        'settings' => array('wp_customize_landing_page_refresh_heading'),
        'render_callback' => function () {
            return get_theme_mod('wp_customize_landing_page_refresh_heading');
        },
    ));
    // Landing Page End

    // Section - Other Controls
    $wp_customize->add_section('wp_customize_others', array(
        'title' => __('Other Settings', 'wp_customize'),
        'priority' => 30,
        'panel' => 'wp_customize_options',
    ));

    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('wp_customize_radio', array(
        'default' => 'value2',
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option
    ));

    $wp_customize->add_control('wp_customize_others_ctrl', array(
        'label' => __('Color Scheme', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_radio',
        'type' => 'radio',
        'choices' => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));

    //  =============================
    //  = Select Box                =
    //  =============================
    $wp_customize->add_setting('wp_customize_select_box', array(
        'default' => 'value2',
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));
    $wp_customize->add_control('wp_customize_select_box_ctrl', array(
        'settings' => 'wp_customize_select_box',
        'label' => 'Select Something:',
        'section' => 'wp_customize_others',
        'type' => 'select',
        'choices' => array(
            'value1' => 'Choice 1',
            'value2' => 'Choice 2',
            'value3' => 'Choice 3',
        ),
    ));

    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('wp_customize_image_upload', array(
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'wp_customize_image_upload_ctrl', array(
        'label' => __('Image Upload Test', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_image_upload',
    )));

    //  =============================
    //  = Page Dropdown             =
    //  =============================
    $wp_customize->add_setting('wp_customize_page_dropdown', array(
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control('wp_customize_page_dropdown_ctrl', array(
        'label' => __('Select any Page', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_page_dropdown',
        'type' => 'dropdown-pages',
        'allow_addition' => true,
    ));

    //  =============================
    //  = Number Dropdown             =
    //  =============================
    $wp_customize->add_setting('wp_customize_page_number', array(
        'default' => '10',
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control('wp_customize_page_number_ctrl', array(
        'label' => __('Number', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_page_number',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 10,
            'max' => 20,
            'step' => 2,
        ),
    ));

    //  =============================
    //  = Range Dropdown             =
    //  =============================
    $wp_customize->add_setting('wp_customize_page_range', array(
        'default' => '10',
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control('wp_customize_page_range_ctrl', array(
        'label' => __('Range', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_page_range',
        'type' => 'range',
        'input_attrs' => array(
            'min' => 10,
            'max' => 20,
            'step' => 2,
        ),
    ));

    //  =============================
    //  = Date Dropdown             =
    //  =============================
    $wp_customize->add_setting('wp_customize_page_date', array(
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control('wp_customize_page_date_ctrl', array(
        'label' => __('Date Field', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_page_date',
        'type' => 'date',
        'input_attrs' => array(
            'min' => 10,
            'max' => 20,
            'step' => 2,
        ),
    ));

    //  =============================
    //  = Week Dropdown             =
    //  =============================
    $wp_customize->add_setting('wp_customize_page_week', array(
        'transport' => 'refresh', //postMessage
        'type' => 'theme_mod', // option

    ));

    $wp_customize->add_control('wp_customize_page_week_ctrl', array(
        'label' => __('Week Field', 'wp_customize'),
        'section' => 'wp_customize_others',
        'settings' => 'wp_customize_page_week',
        'type' => 'week',
        'input_attrs' => array(
            'min' => 10,
            'max' => 20,
            'step' => 2,
        ),
    ));

}

add_action('customize_register', 'wp_customize_customize_register');