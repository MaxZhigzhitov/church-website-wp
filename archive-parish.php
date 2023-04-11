<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package holy-trinity-parish-website
 * 
 * Template Name: Parish
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="archive section__spacing" id="archive">
        <div class="container">
            <div class="archive__inner aside-split">
                <div class="archive__content">
                    <h2 class="title">Архив новостей</h2>

                    <div class="news__feed">
                        <ul>
                            <?php
							$post;

                            $post_feed = get_posts([
                                'numberposts'   => -1,
                            ]);

                            foreach($post_feed as $post) :
                                setup_postdata($post);
							?>

                            <li class="news__feed-item box-shadow content-item-underlay">
                                <div class="link-wrapper">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(array( 150, 150)); ?>
                                    </a>
                                </div>
                                <div class="news__feed-descr">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                    <div class="textbox">
                                        <p>
                                            <?php the_excerpt(); ?>
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <?php endforeach;   wp_reset_postdata();

							the_posts_navigation();

							?>
                        </ul>
                    </div>

                    <!-- <div class="cta-wrapper cta-centered">
                        <a class="cta-button" href="#">Читать далее</a>
                    </div> -->
                </div>


                <?php get_sidebar(); ?>

            </div>


        </div>
        </div>
    </section>





</main><!-- #main -->

<?php
get_footer();