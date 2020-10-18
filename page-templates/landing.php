<?php
/**
 * Template Name: Landing Page
 */
get_header();
?>

<div class="gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2><?php the_title();?></h2>
                    <h3 id="demo-title"><?php echo esc_html(cs_get_customize_option('demo_title')); ?></h3>
                    <h3><?php echo esc_html(cs_get_customize_option('demo_description')); ?></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <h1 class="heading1">
                    <?php echo esc_html(get_theme_mod('wp_customize_landing_page_refresh_heading', "Refresh Heading Title")); ?>
                </h1>

                <h5>image control</h5>
                <?php
$image_url = get_theme_mod('wp_customize_image_upload');
$image_id = attachment_url_to_postid($image_url);
echo wp_get_attachment_image($image_id, "large");
echo "<br/>";
print_r(wp_get_attachment_image_src($image_id, "large"));
?>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
?>