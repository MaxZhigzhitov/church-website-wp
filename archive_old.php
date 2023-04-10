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



	<section class="archive" id="archive">
      <div class="container">
        <div class="archive__inner aside-split">
            <div class="archive__content">


                <div
              class="news__feed-item highlight box-shadow content-item-underlay"
            >
              <div class="link-wrapper">
                <a href="#">
                  <img
                    class="image-rounded"
                    src="images/tamara-malaniy-n-BM_YXVOY4-unsplash.jpg"
                    alt=""
                  />
                </a>
              </div>
              <div class="news__feed-descr">
                <h3 class="title">
                  Поздравляем наших прихожан с началом Великого Поста
                </h3>
                <div class="textbox">
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, voluptate!
                  </p>
                </div>
              </div>
            </div>
                
                
                
			<div class="news__feed">
				<ul>
					<li class="news__feed-item box-shadow content-item-underlay">
					<div class="link-wrapper">
						<a href="#">
						<img
							class="image-rounded"
							src="images/tamara-malaniy-n-BM_YXVOY4-unsplash.jpg"
							alt=""
						/>
						</a>
					</div>
					<div class="news__feed-descr">
						<h3 class="title">
						Поздравляем наших прихожан с началом Великого Поста
						</h3>
						<div class="textbox">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Quisquam, voluptate!
						</p>
						</div>
					</div>
					</li>
					<li class="news__feed-item box-shadow content-item-underlay">
					<div class="link-wrapper">
						<a href="#">
						<img
							class="image-rounded"
							src="images/tamara-malaniy-n-BM_YXVOY4-unsplash.jpg"
							alt=""
						/>
						</a>
					</div>
					<div class="news__feed-descr">
						<h3 class="title">
						Поздравляем наших прихожан с началом Великого Поста
						</h3>
						<div class="textbox">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Quisquam, voluptate!
						</p>
						</div>
					</div>
					</li>
					<li class="news__feed-item box-shadow content-item-underlay">
					<div class="link-wrapper">
						<a href="#">
						<img
							class="image-rounded"
							src="images/tamara-malaniy-n-BM_YXVOY4-unsplash.jpg"
							alt=""
						/>
						</a>
					</div>
					<div class="news__feed-descr">
						<h3 class="title">
						Поздравляем наших прихожан с началом Великого Поста
						</h3>
						<div class="textbox">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Quisquam, voluptate!
						</p>
						</div>
					</div>
					</li>
				</ul>
				</div>
	
				<div class="cta-wrapper cta-centered">
				<a class="cta-button" href="#">Читать далее</a>
				</div>
			</div>


			<?php get_sidebar(); ?>

            </div>

            
        </div>
      </div>
    </section>
	
	
	
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
						<a href="#">
						<img
							class="image-rounded"
							src="images/tamara-malaniy-n-BM_YXVOY4-unsplash.jpg"
							alt=""
						/>
						</a>
					</div>
					<div class="news__feed-descr">
						<h3 class="title">
						<?php the_title(); ?>
						</h3>
						<div class="textbox">
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit.
							Quisquam, voluptate!
						</p>
						</div>
					</div>
					</li>
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
