<?php

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
</head>

<body <?php body_class();?>>
    <?php wp_body_open();?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#primary"><?php esc_html_e('Skip to content', 'wp_customizer');?></a>

        <header id="masthead" class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="site-branding">
                            <?php
the_custom_logo();
if (is_front_page() && is_home()):
?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                    rel="home"><?php bloginfo('name');?></a></h1>
                            <?php
else:
?>
                            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                    rel="home"><?php bloginfo('name');?></a></p>
                            <?php
endif;
$wp_customizer_description = get_bloginfo('description', 'display');
if ($wp_customizer_description || is_customize_preview()):
?>
                            <p class="site-description">
                                <?php echo $wp_customizer_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped         ?>
                            </p>
                            <?php endif;?>
                        </div><!-- .site-branding -->
                    </div>
                    <div class="col-lg-7 text-right">
                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false"><?php esc_html_e('Primary Menu', 'wp_customizer');?></button>
                            <?php
wp_nav_menu(
    array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
    )
);
?>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>

        </header><!-- #masthead -->