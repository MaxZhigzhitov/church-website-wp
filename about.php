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
 * 
 * Template Name: About
 */

get_header();
?>

<main id="primary" class="site-main">

    <section class="about section__spacing" id="about">
        <div class="container">
            <div class="about__inner">
                <?php the_content(); ?>
            </div>
        </div>
    </section>

    <section class="basics section__margin-bottom" id="basics">
        <div class="section-banner section__margin-bottom">
            <div class="image-wrapper">
                <img src="<?php the_field('basics-banner'); ?>" alt="" />
            </div>
            <div class="container">
                <h2 class="title title--section"><?php the_field('basics-title'); ?></h2>
            </div>
        </div>

        <div class="container">
            <div class="basics__inner aside-split">
                <div class="basics__content">
                    <div class="news__feed">
                        <ul>

                            <?php
								$post;

								$basicsPosts = get_posts([
									'numberposts' => -1,
									'category'	  => 14,
								]);
							?>

                            <?php if($basicsPosts) {
								foreach($basicsPosts as $post) {
									setup_postdata($post);
							?>

                            <li class="news__feed-item box-shadow content-item-underlay">
                                <div class="link-wrapper">
                                    <a href="#">
                                        <?php the_post_thumbnail(array( 150, 150 )); ?>
                                    </a>
                                </div>
                                <div class="news__feed-descr">
                                    <h3 class="title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="textbox">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </li>

                            <?php }} wp_reset_postdata(); ?>

                        </ul>
                    </div>

                    <div class="cta-wrapper cta-centered">
                        <a class="cta-button" href="<?php the_field('basics-button-link'); ?>">Читать далее</a>
                    </div>
                </div>

                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>

    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();