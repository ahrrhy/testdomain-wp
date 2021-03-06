<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="wrap">
        <?php
        get_template_part( 'template-parts/footer/footer', 'widgets' );

        if ( has_nav_menu( 'social' ) ) : ?>
            <nav class="social-navigation" role="navigation"
                 aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'social',
                    'menu_class'     => 'social-links-menu',
                    'depth'          => 1,
                    'link_before'    => '<span class="screen-reader-text">',
                    'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
                ) );
                ?>
            </nav><!-- .social-navigation -->
        <?php endif; ?>
        <div class="customer-contact-info">
            <ul>
                <li class="contact-number">
                    <a id="contact-number" href="tel:<?php echo get_theme_mod(
                            'contact_phone',
                            '9876543210'
                    ); ?>">
                        <label for="contact-number"><?php echo get_theme_mod(
                                'contact_phone_label',
                                'Call Us'
                            ); ?></label>
                        <span class="widget-field-value">: <?php echo get_theme_mod(
                                'contact_phone',
                                '9876543210'
                            ); ?></span>
                    </a>
                </li>
                <li class="contact-email">
                    <a id="contact-email" href="mailto:<?php echo get_theme_mod(
                            'contact_email',
                            'testdomain@mail.to'
                        ); ?>">
                        <label for="contact-email"><?php echo get_theme_mod(
                                'contact_email_label',
                                'Email'
                            ); ?></label>
                        <span class="widget-field-value">: <?php echo get_theme_mod(
                                'contact_email',
                                'testdomain@mail.to'
                                ); ?></span>
                    </a>
                </li>
                <li class="contact-us-button">
                    <button id="contact-us-button"><?php echo get_theme_mod(
                            'contact_us_button',
                            'Contact Us'
                            ); ?></button>
                </li>
            </ul>
        </div>
        <?php get_template_part( 'template-parts/footer/site', 'info' ); ?>
    </div><!-- .wrap -->
</footer><!-- #colophon -->
</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
