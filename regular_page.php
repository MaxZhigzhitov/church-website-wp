<?php
/*
Template Name: regular
*/

?>

<?php get_header(); ?>

<section class="regular-page section__spacing" id="intro">
      <div class="container">
        <div class="regular-page__inner aside-split">
          <div class="regular-page__content content-item-underlay box-shadow">
            <?php the_content(); ?>
          </div>

          <?php get_sidebar(); ?>
  </section>

<?php

get_footer();

?>