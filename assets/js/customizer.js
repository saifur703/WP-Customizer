; (function ($) {
    wp.customize('wp_customize_service_heading', function (value) {
        value.bind(function (newValue) {
            $("#service-heading").html(newValue);
        })
    });

    wp.customize('wp_customize_icon_color', function (value) {
        value.bind(function (newValue) {
            $(".single-service i.fa").css("color", newValue);
        })
    });

    wp.customize('_cs_customize_options[demo_title]', function (value) {
        value.bind(function (newValue) {
            $("#demo-title").html(newValue);
        })
    });

})(jQuery);