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
				<div class="single__post-thumbnail section__margin-bottom"> <?php the_post_thumbnail(); ?> </div>
			<?php endif; ?>
				<h1 class="title"><?php the_title(); ?></h1>

				<?php while(have_posts()) : the_post() ?>
					<div><i class="fa-solid fa-clock"></i><?php echo get_the_date(); ?> <i class="fa-solid fa-user"></i><?php echo get_the_author(); ?></div>
				<?php endwhile; wp_reset_query(); ?>
				
				<?php the_content(); ?>
            </div>

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );

					// the_post_navigation(
					// 	array(
					// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'parish' ) . '</span> <span class="nav-title">%title</span>',
					// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'parish' ) . '</span> <span class="nav-title">%title</span>',
					// 	)
					// );

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

<?php

get_footer();
