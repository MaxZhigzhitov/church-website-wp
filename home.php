<?php
/*
Template Name: home
*/

?>

<?php get_header(); ?>

<?php $parish_schedule = get_post_meta($post -> ID, 'parish_schedule_link', true); ?>
<?php $parish_schedule_image = get_post_meta($post -> ID, 'parish_schedule_image', true); ?>
<?php $parish_school = get_post_meta($post -> ID, 'parish_school_link', true); ?>
<?php $parish_school_image = get_post_meta($post -> ID, 'parish_school_image', true); ?>

<section class="intro section__spacing-large" id="intro">
      <div class="container">
        <div class="intro__inner">
		  <?php
		  	$home_intro = get_post_meta( $post -> ID, 'intro_list_item', true);
		  ?>

		  <?php
		  	foreach( $home_intro as $intro_item ) :
		  ?>
		  
          <div class="intro__menu-item">
            <a href="<?php echo $intro_item[intro_item_link] ?>">
              <img
                class="box-shadow"
                src="<?php echo $intro_item[intro_item_thumbnail] ?>"
                alt=""
              />
            </a>
            <a href="<?php echo $intro_item[intro_item_link] ?>">
              <h3 class="title"><?php echo $intro_item[intro_item_title] ?></h3>
            </a>
          </div>

          <?php
		  	endforeach;
		  ?>
        </div>
      </div>
    </section>

    <section class="parish" id="parish">
      <div class="section-banner section__margin-bottom">
	  <?php $parish_meta_banner = get_post_meta($post -> ID, 'parish_banner_upload', true) ?>;
	  <?php $parish_meta_title = get_post_meta($post -> ID, 'parish_section_title', true) ?>;
	  <?php $parish_meta_description = get_post_meta($post -> ID, 'parish_description', true) ?>;
	  <?php $parish_slider = get_post_meta($post -> ID, 'parish_slider', true); ?>
	  
        <div class="image-wrapper">
          <img src="<?php echo $parish_meta_banner ?>" alt="" />
        </div>
        <div class="container">
          <h2 class="title title--section"><?php echo $parish_meta_title ?></h2>
        </div>
      </div>

      <div class="container">
        <div class="parish__inner aside-split">
          <div class="parish__content-block">
            <div class="parish__info box-shadow content-item-underlay">
              <div class="parish__slider-container swiper">
                <div class="parish__slider-wrapper swiper-wrapper">

				<?php
				    foreach( $parish_slider as $slider_item ) :
				?>
                  <div class="parish__image-item swiper-slide">
                    <div class="slider-image">
                      <img src="<?php echo $slider_item[parish_slider_image] ?>" alt="" />
                    </div>
                  </div>
                  
				<?php
					endforeach;
				?>
				</div>

                <div class="swiper-pagination"></div>
              </div>
              <div class="parish__text-content text-content">
                <div class="textbox">
                  <p>
				  <?php echo $parish_meta_description ?>
                  </p>
                </div>
                <ul class="parish__info-navigation list__margin ver">
                  <li>
                    <a href="#">Расписание служб</a>
                  </li>
                  <li>
                    <a href="#">К новостям</a>
                  </li>
                  <li>
                    <a href="#">Воскресная школа</a>
                  </li>
                </ul>
              </div>
            </div>


			
            <section class="news section__margin-bottom" id="news">

            <?php
                    global $post;

                    $myPostLatest = get_posts([
                      'numberposts' => 1,
                      'category'    => 0,
                    ]);
                    
                    $myPosts = get_posts([ 
                      'offset'      => 1,
                      'numberposts' => 5,
                      'category'    => 0,
                    ]);
            ?>

              <?php if($myPostLatest) {
                foreach( $myPostLatest as $post ){
                  setup_postdata($post);
              ?>

              <div
                class="news__feed-item highlight box-shadow content-item-underlay"
              >
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
                <div class="news__feed-descr">
                  <a href="<?php the_permalink(); ?>">
                    <h3 class="title">
                      <?php the_title(); ?>
                    </h3>
                  </a>
                  <div>
                    <div><i class="fa-solid fa-clock"></i><?php the_date(); ?></div>
                    <div><i class="fa-solid fa-user"></i><?php the_author(); ?></div>
                  </div>
                  <div class="textbox">
                    <p>
                      <?php the_excerpt(); ?>
                    </p>
                  </div>
                </div>
              </div>

              <?php }}?>
              
              <div class="flex-split flex-reverse">
                <div class="news__side-nav">
                  <div
                    class="link-wrapper box-shadow"
                    style="background-image: url(<?php echo $parish_schedule_image ?>)"
                  >
                    <div class="textbox">
                      <a href="<?php echo $parish_schedule ?>">
                        Расписание служб
                      </a>
                    </div>
                  </div>
                  <div
                    class="link-wrapper box-shadow"
                    style="
                      background-image: url(<?php echo $parish_school_image ?>)
                    "
                  >
                    <div class="textbox">
                      <a href="<?php echo $parish_school ?>">Воскресная школа</a>
                    </div>
                  </div>
                </div>
                <div class="news__feed">
                  <ul>

                  <?php
                    if( $myPosts ){
                      foreach( $myPosts as $post ){
                      setup_postdata($post);
                    ?>
                      <!-- News item -->
                    <li
                      class="news__feed-item box-shadow content-item-underlay"
                    >
                      <div class="link-wrapper">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail( array( 150,150 ) ); ?>
                        </a>
                      </div>
                      <div class="news__feed-descr">
                        <a href="<?php the_permalink() ?>">
                          <h3 class="title">
                            <?php the_title(); ?>
                          </h3>
                        </a>
                        <div>
                          <div><i class="fa-solid fa-clock"></i><?php echo get_the_date(); ?></div>
                          <div><i class="fa-solid fa-user"></i><?php the_author(); ?></div>
                        </div>
                        <div>
                          <?php the_tags('Темы: ', ' '); ?>
                        </div>
                        <div class="textbox">
                          <?php the_excerpt(); ?>
                        </div>
                      </div>
                    </li>

                    <!-- News item End-->
                      
                      
                    
                  <?php }} wp_reset_postdata();?>
                  
                  </ul>
                </div>
              </div>
            </section>
            <section class="calend section__margin-bottom" id="calend">
              <div class="calend-container">
                <div class="azbyka-saints"></div>
                <script>
                  window.___azcfg = {
                    api: "https://azbyka.ru/days/widgets",
                    //css: "https://azbyka.ru/days/css/api.min.css",
                    image: "1",
                    prevNextLinks: "1",
                  };
                  (function () {
                    var el = document.createElement("script");
                    el.type = "text/javascript";
                    el.async = true;
                    el.src = "https://azbyka.ru/days/js/api.min.js";
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(el, s);
                  })();
                </script>
              </div>
            </section>
            <section class="faq section__margin-bottom" id="faq">
              <h2 class="title title--section">Вопросы и ответы</h2>
              <ul class="faq__wrapper">

              <?php $faq_item = get_post_meta($post -> ID, 'faq_item', true) ?>
              <?php foreach($faq_item as $faq_item) : ?>
              
                <li class="faq__item">
                  <ul>
                    <li class="faq__question">
                      <?php echo $faq_item[faq_q]; ?>
                    </li>
                    <li class="faq__answer">
                      <?php echo $faq_item[faq_a]; ?>
                    </li>
                  </ul>
                </li>

              <?php endforeach; ?>
                
              </ul>
              <div class="textbox">
                <p class="title">Вы сможете задать свой вопрос по электронной почте:</p>
                <a href="mailto:<?php echo ot_get_option('contacts_email') ?>"><?php echo ot_get_option('contacts_email') ?></a>
              </div>
            </section>
          </div>

		  <?php get_sidebar(); ?>
		  
		  </div>
      </div>
    </section>

<?php

get_footer();

?>