<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package holy-trinity-parish-website
 */

?>

<?php get_header(); ?>

<main id="primary" class="site-main">

    <section class="single section__spacing">
        <div class="container">
            <div class="single__inner aside-split">
                <div class="single__content">
                    <div class="single__post section__margin-bottom content-item-underlay box-shadow">

                        <?php if(has_post_thumbnail()) : ?>
                        
                        <?php if(get_field('post-settings-post-image-show')) : ?>
                        <div class="single__post-thumbnail section__margin-bottom"> <?php the_post_thumbnail(); ?></div>
                        <?php endif; ?>
                        
                        <?php endif; ?>

                        <h1 class="title"><?php the_title(); ?></h1>
                        <?php while(have_posts()) : the_post(); ?>
                        <div class="single-post-meta">
                            <span><i class="fa-solid fa-clock"></i><?php echo get_the_date(); ?></span>
                            <span><i class="fa-solid fa-user"></i><?php echo get_the_author(); ?></span>
                            <div class="single-post-cat">
                                Рубрика: <?php the_category(', '); ?>
                            </div>
                        </div>
                        <?php endwhile; wp_reset_query(); ?>

                        <?php the_content(); ?>
                    </div>

                    <?php while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/content', get_post_type() );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                        endwhile; // End of the loop.
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
    </section>
</main><!-- #main -->

<?php get_footer(); ?>