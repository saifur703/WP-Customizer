<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="site-info">
                    <a href="<?php echo esc_url(__('https://github.com/saifur703/', 'wp_customizer')); ?>">
                        <?php
printf(esc_html__('Proudly powered by %s', 'wp_customizer'), 'SaifurPro');
?>
                    </a>
                    <span class="sep"> | </span>
                    <?php
printf(esc_html__('Theme: %1$s by %2$s.', 'wp_customizer'), 'wp_customizer', '<a href="https://github.com/saifur703">Saifur Rahman</a>');
?>
                </div><!-- .site-info -->
            </div>
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

</body>

</html>