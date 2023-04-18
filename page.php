<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package holy-trinity-parish-website
 */
?>

<?php get_header(); ?>

<section class="regular-page section__spacing" id="intro">
    <div class="container">
        <div class="regular-page__inner aside-split">
            <div class="regular-page__content content-item-underlay box-shadow">
                <h1 class="title"><?php the_title();?></h1>
                <?php the_content(); ?>
            </div>

            <?php
              if(ICL_LANGUAGE_CODE == 'ru') { 
                  get_sidebar('ru');
              } elseif(ICL_LANGUAGE_CODE == 'mn') {
                  get_sidebar('mn');
                  
              } else {
                  get_sidebar('en');
              }

            ?>
</section>

<?php get_footer(); ?>