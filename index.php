<?php

get_header();
?>

<main id="primary" class="site-main">

    <div class="gray-bg">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2 id="service-heading">
                            <?php echo esc_html(get_theme_mod('wp_customize_service_heading', __('Our Mission', 'wp_customize'))); ?>
                        </h2>

                        <?php
if (get_theme_mod('wp_customize_service_sub_heading_check', 1)) {
    echo apply_filters("the_content", get_theme_mod('wp_customize_service_sub_heading', __('Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus itaque quibusdam fugiat, dolorum aliquid quo ullam velit qui iure vero dolores quisquam, inventore neque alias tenetur? Voluptates optio, unde doloremque at cumque reprehenderit doloribus eius rerum ullam. Ducimus molestiae natus cumque voluptate quod perspiciatis voluptates perferendis nisi, harum recusandae ipsam.', 'wp_customize')));
}
?>
                    </div>
                </div>
            </div>
            <?php $wp_customizer_service_column = get_theme_mod('wp_customize_select_service_item', 4);?>
            <div class="row mt-5 text-center">
                <div class="col-lg-<?php echo esc_attr($wp_customizer_service_column); ?>">
                    <div class="single-service">
                        <i class="fa fa-code"></i>
                        <h5>Web Design</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt reiciendis nihil, quis
                            laborum
                            voluptatum eum!</p>
                    </div>
                </div>
                <div class="col-lg-<?php echo esc_attr($wp_customizer_service_column); ?>">
                    <div class="single-service">
                        <i class="fa fa-laptop"></i>
                        <h5>Web Development</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt reiciendis nihil, quis
                            laborum
                            voluptatum eum!</p>
                    </div>
                </div>
                <div class="col-lg-<?php echo esc_attr($wp_customizer_service_column); ?>">
                    <div class="single-service">
                        <i class="fa fa-desktop"></i>
                        <h5>App Development</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt reiciendis nihil, quis
                            laborum
                            voluptatum eum!</p>
                    </div>
                </div>
                <div class="col-lg-<?php echo esc_attr($wp_customizer_service_column); ?>">
                    <div class="single-service">
                        <i class="fa fa-pencil"></i>
                        <h5>Graphics Design</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt reiciendis nihil, quis
                            laborum
                            voluptatum eum!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();