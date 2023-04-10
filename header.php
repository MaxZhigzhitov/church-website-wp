<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package holy-trinity-parish-website
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'parish' ); ?></a>

	<header class="header" id="header">
      <nav class="header__navbar box-shadow">
        <div class="container-wide">
          <div class="header__navbar-inner">
            <div class="header__meta-title-wrapper">
			<?php if(ot_get_option('logo_upload')){ ?>
              <div class="header__nav-logo logo-wrapper">
                <a href="<?php echo home_url(); ?>">
                  <img
                    class="logo-img"
                    src="<?php echo ot_get_option('logo_upload'); ?>"
                    alt="parish logo image"
                  />
                </a>
              </div>
			  <?php } ?>
              <div class="header__nav-title">
                <a class="title" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
				<?php if(ot_get_option('site_descr_toggle') != 'off'){ ?>
				<div class="descr">
					<?php bloginfo('description') ?>
				</div>
				<?php } ?>
              </div>
            </div> 
            
            <ul class="header__link-menu">
              <?php
                    $args = array(
                      'theme_location'  => 'Top',
                      'menu'            => 'top',
                      'container'       => '',
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'header__link-menu',
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
              <li class="header__link btn-sidenav-toggle">
                <a href="javascript:void(0);">
                  <i class="fa-solid fa-bars fa-2x"></i>
                </a>
              </li>
            </ul>

            <!-- Боковая навигационная панель -->
            <div class="header__sidenav content-item-underlay box-shadow">
              <nav class="header__sidenav-menu list__margin ver">
                <div class="header__sidenav-title title">Меню</div>
                <?php
                  $args = array(
                    'theme_location'  => 'Sidenav',
                    'menu'            => 'Main',
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
                <!-- <ul>
                  <li class="header__sidenav-menu-item">
                    <a href="#">Главная</a>
                  </li>
                  <li class="header__sidenav-menu-item">
                    <a href="#">Новости</a>
                  </li>
                  <li class="header__sidenav-menu-item">
                    <a href="#">Расписание служб</a>
                  </li>
                  <li class="header__sidenav-menu-item">
                    <a href="#">О Православии</a>
                  </li>
                  <li class="header__sidenav-menu-item">
                    <a href="#">Жизнь прихода</a>
                  </li>
                  <li class="header__sidenav-menu-item">
                    <a href="#">Контакты</a>
                  </li>
                  <li class="header__sidenav-menu-item">
                    <a href="#">Заказать записку</a>
                  </li>
                </ul> -->
              </nav>
              <div class="header__socials">
                <?php if(ot_get_option('socials_facebook')) { ?>
                <div class="link-wrapper">
                  <a class="hover-icon" href=" <?php echo ot_get_option('socials_facebook') ?>"
                    ><i class="fa-brands fa-facebook fa-2x hover-popup"></i
                  ></a>
                </div>
                <?php } ?>
                <?php if(ot_get_option('socials_vk')) { ?>
                <div class="link-wrapper">
                  <a class="hover-icon" href="<?php echo ot_get_option('socials_vk') ?>"
                    ><i class="fa-brands fa-vk fa-2x hover-popup"></i
                  ></a>
                </div>
                <?php } ?>
                <?php if(ot_get_option('contacts_email')) { ?>
                <div class="link-wrapper">
                  <a class="hover-icon" href="mailto: <?php echo ot_get_option('contacts_email') ?>"
                    ><i class="fa-solid fa-envelope fa-2x hover-popup"></i
                  ></a>
                </div>
                <?php } ?>
              </div>
              <div class="header__contacts">
				<?php if(ot_get_option('contacts_address')) { ?>
                <div class="header__contacts-item">
                  <div class="header__contacts-title title">Наш адрес</div>
                  <div class="header__contacts-descr">
                    <?php echo ot_get_option('contacts_address') ?>
                  </div>
                </div>
				<?php } ?>
				<?php if(ot_get_option('contacts_phone')) { ?>
                <div class="header__contacts-item">
                  <div class="header__contacts-title title">Телефон</div>
                  <div class="header__contacts-descr">
                    <a href="tel:<?php echo str_replace(array('-', '(', ')', ' '), '', ot_get_option('contacts_phone')) ?>"><?php echo ot_get_option('contacts_phone') ?></a>
                  </div>
                </div>
				<?php } ?>
              </div>
            </div>
          </div>
        </div>
      </nav>

      <img
        class="header__banner"
        src="<?php echo ot_get_option('main_banner_upload')?>"
        alt=""
      />

      <!-- После нав установить марджин -->

      <div class="header__link-panel container-wide box-shadow">
        <h1 class="title--main title"><?php bloginfo('name'); ?></h1>



        <?php


          $args = array(
            'theme_location'  => 'Main',
            'menu'            => 'Main',
            'container'       => 'nav',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'header__link-menu',
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
        
        
        <!-- <nav>
          <ul class="header__link-menu">
            <li class="header__link">
              <a href="#">Главная</a>
            </li>
            <li class="header__link">
              <a href="#">О Православии</a>
            </li>
            <li class="header__link">
              <a href="#">Православие в Монголии</a>
            </li>
            <li class="header__link">
              <a href="#">Жизнь прихода</a>
            </li>
            <li class="header__link">
              <a href="#">Контакты</a>
            </li>
          </ul>
        </nav> -->
      </div>
    </header>