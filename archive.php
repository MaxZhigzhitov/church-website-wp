<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package holy-trinity-parish-website
 */

get_header();
?>

	<main id="primary" class="site-main">



	<section class="archive section__spacing" id="archive">
      <div class="container">
        <div class="archive__inner aside-split">
            <div class="archive__content">


			<?php if ( have_posts() ) : ;?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
			?>

			<li class="news__feed-item box-shadow content-item-underlay">
				<div class="link-wrapper">
					<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(array(150, 150)); ?>
					</a>
				</div>
				<div class="news__feed-descr">
					<a href="<?php the_permalink(); ?>">
						<h3 class="title">
							<?php the_title(); ?>
						</h3>
					</a>
					<div>
                          <span><i class="fa-solid fa-clock"></i><?php echo get_the_date(); ?></span>
                          <span><i class="fa-solid fa-user"></i><?php the_author(); ?></span>
                        </div>
					<div class="textbox">
						<?php the_excerpt(); ?>
					</div>
				</div>
			</li>
				<!--
				Include the Post-Type-specific template for the content.
				If you want to override this in a child theme, then include a file
				called content-___.php (where ___ is the Post Type name) and that will be used instead.
				
				get_template_part( 'template-parts/content', get_post_type() ); -->

			<?php endwhile;

			the_posts_navigation();

			else :

			get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			
			</div>

			<?php get_sidebar(); ?>

			</div>
        </div>
      </div>
    </section>
	
	
	
		

	</main><!-- #main -->

<?php
get_footer();
