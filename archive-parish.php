<?php
    /**
     * Шаблон страницы новостей прихода, без сортировки по рубрикам и тегам
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package holy-trinity-parish-website
     * 
     * Template Name: Новости прихода
     */

    get_header();
?>

<main id="primary" class="site-main">
    <section class="archive section__spacing" id="archive">
        <div class="container">
            <div class="archive__inner aside-split">
                <div class="archive__content">
                    <h2 class="title">Последние новости</h2>

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
                                <?php if(has_post_thumbnail()) : ?>
                                <div class="link-wrapper">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(array( 150, 150)); ?>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="news__feed-descr">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="title">
                                            <?php the_title(); ?>
                                        </h3>
                                    </a>
                                    <div class="single-post-meta">
                                        <span><i class="fa-solid fa-clock"></i><?php echo get_the_date(); ?></span>
                                        <span><i class="fa-solid fa-user"></i><?php echo get_the_author(); ?></span>
                                        <div class="single-post-cat">
                                            Рубрика: <?php the_category(', '); ?>
                                        </div>
                                    </div>
                                    <div class="textbox">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </li>

                            <?php 
                                endforeach;  
                                wp_reset_postdata();
		    					the_posts_navigation();
							?>
                        </ul>
                    </div>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>

</main><!-- #main -->

<?php get_footer(); ?>