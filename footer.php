<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package holy-trinity-parish-website
 */

?>

<footer class="footer container-wide" id="footer">
    <?php if(ot_get_option('logo_upload_alter')) : ?>
    <div class="logo-wrapper link-wrapper">
        <a href="<?php echo home_url() ?>">
            <img src="<?php echo ot_get_option('logo_upload_alter') ?>" alt="" />
        </a>
    </div>
    <?php endif; ?>

    <div class="footer__nav-block">
        <div>
            <div class="title"><?php _e('Меню', 'parish'); ?></div>
            <?php
				$args = array(
					'theme_location'  => 'Footer',
					'menu'            => 'menu_full',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => '',
				);
				wp_nav_menu( $args );
            ?>
        </div>

        <div>
            <div class="title"><?php _e('Контакты', 'parish'); ?></div>
            <ul class="list__margin ver">
                <?php if(ot_get_option('contacts_address')) : ?>
                <li class="footer__nav-item footer__address">
                    <i class="fa-solid fa-location-dot fa-2x"></i>
                    <?php _e(ot_get_option('contacts_address'), 'parish') ?>
                </li>
                <?php endif; ?>
                <?php if(ot_get_option('contacts_phone')) : ?>
                <li class="footer__nav-item footer__phone">
                    <i class="fa-solid fa-phone fa-2x"></i><a
                        href="tel:<?php echo str_replace(array('-', '(', ')', ' '), '', ot_get_option('contacts_phone')) ?>">
                        <?php echo ot_get_option('contacts_phone') ?></a>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="footer__socials">
            <?php if(ot_get_option('socials_facebook')) : ?>
            <div class="link-wrapper">
                <a class="hover-icon" href=" <?php echo ot_get_option('socials_facebook') ?>"><i
                        class="fa-brands fa-facebook fa-2x hover-popup"></i></a>
            </div>
            <?php endif; ?>
            <?php if(ot_get_option('socials_vk')) : ?>
            <div class="link-wrapper">
                <a class="hover-icon" href="<?php echo ot_get_option('socials_vk') ?>"><i
                        class="fa-brands fa-vk fa-2x hover-popup"></i></a>
            </div>
            <?php endif; ?>
            <?php if(ot_get_option('contacts_email')) : ?>
            <div class="link-wrapper">
                <a class="hover-icon" href="mailto: <?php echo ot_get_option('contacts_email') ?>"><i
                        class="fa-solid fa-envelope fa-2x hover-popup"></i></a>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if(ot_get_option('copyright_text')) : ?>
		<div class="footer__copyright">
			<?php echo ot_get_option('copyright_text'); ?>
		</div>
	<?php endif; ?>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>