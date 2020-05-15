<?php

/*
Template name: Strona główna
*/

?>
<?php include locate_template('header.php');?>

<?php 

// Sekcja 01
  $home_00_title = get_post_meta(get_the_id(), 'home_00_title', 1);
  $home_00_subtitle = get_post_meta(get_the_id(), 'home_00_subtitle', 1);
  $home_00_video_url = get_post_meta(get_the_id(), 'home_00_video_url', 1);
  $home_00_planet_group = get_post_meta(get_the_id(), 'home_00_planet_group', 1);
  $home_00_partners_group = get_post_meta(get_the_id(), 'home_00_partners_group', 1);
  $home_00_title_group_1 = get_post_meta(get_the_id(), 'home_00_title_group_1', 1);
  $home_00_title_group_2 = get_post_meta(get_the_id(), 'home_00_title_group_2', 1);
?>

<section class="main is-loading">
   <div class="container">
      <div class="main__wrapper">
         <div class="main__text">
            <h1 class="h1"><?php echo $home_00_title; ?></h1>
            <p><?php echo $home_00_subtitle; ?></p>
         </div>

         <div class="main__planet planet">
            <div class="video">
               <div class="video__responsive">
                  <video class="video--frame" height="633" playsinline autoplay muted loop>
                     <source src="<?php echo get_site_url().'/'. $home_00_video_url; ?>" type="video/mp4">
                     Your browser does not support the video tag.
                  </video>
                  <img src="<?php echo get_template_directory_uri(); ?>/dist/img/planet/planet-scope.png" class="planet-scope" alt="">
                  <div class="planet__satellites">
                     <?php foreach($home_00_planet_group as $slide) : ?>
                        <?php if (!empty($slide['title'])): ?>
                        <div class="satellite js-tab">
                           <div class="satellite__tab">
                              <a href="<?php echo $slide['url']; ?>" class="satellite__tab--content">
                                 <span><?php echo $slide['title']; ?></span>
                                 <span><?php echo $slide['subtitle']; ?></span>
                              </a>
                           </div>
                        </div>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </div>
               </div>

            </div>


         </div>
      </div>

      <div class="main__info">
         <div class="main__partners">
            <?php foreach($home_00_partners_group as $partner) : ?>
               <img src="<?php echo $partner['image']; ?>" alt="">
            <?php endforeach; ?>
         </div>
         <div class="main__actions">
            <div class="main__action action">
               <h3 class="title-border">
                  <?php echo $home_00_title_group_1; ?>
               </h3>
               <div class="action__btn-group">
                  <a href="<?php echo get_site_url().'/'; pll_e('branze/handel-i-dystrybucja'); ?>" class="btn btn--secondary btn--outline btn--xs">
                     <?php pll_e('Rozwiązaniach dla mojej branży'); ?>
                  </a>
                  <a href="<?php echo get_site_url().'/'; pll_e('services/analizy-i-doradztwo'); ?>" class="btn btn--secondary btn--outline btn--xs">
                     <?php pll_e('Usługach dla firm'); ?>
                  </a>
               </div>
            </div>

            <div class="main__action action">
               <h3 class="title-border">
                  <?php echo $home_00_title_group_2; ?>
               </h3>
               <div class="action__btn-group">
                  <a href="<?php echo get_site_url().'/'; pll_e('produkty'); ?>" class="btn btn--secondary btn--outline btn--xs">
                     <?php pll_e('Informacji o produktach'); ?>
                  </a>
                  <a href="<?php echo get_site_url().'/'; pll_e('kontakt'); ?>" class="btn btn--secondary btn--outline btn--xs">
                     <?php pll_e('Indywidualnej oferty'); ?>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<?php 
// Sekcja 02 - Co o nas slychac - News
  $home_01_title = get_post_meta(get_the_id(), 'home_01_title', 1);
?>

<section class="box-tiles last-news">
   <div class="container">
      <h2 class="title"><?php echo $home_01_title; ?></h2>
   </div>
   <div class="box-tiles__box">
      <div class="container">
         <?php include locate_template('template-parts/news-last-tiles.php'); ?>
         <a href="<?php echo get_site_url().'/'; pll_e('aktualnosci'); ?>" class="btn btn--secondary tiles--link"><?php pll_e('Zobacz pozostałe aktualności'); ?></a>
      </div>
   </div>
</section>


<?php 
// Sekcja 03 - Dla kogo pracujemy
  $home_03_title = get_post_meta(get_the_id(), 'home_03_title', 1);
  $home_03_slider = get_post_meta(get_the_id(), 'home_03_slider', 1);
?>

<section class="our-products">
   <div class="container">
      <h2 class="title"><?php echo $home_03_title; ?></h2>

      <div class="our-products__wrapper" id="productsSlider">
         <div class="our-poducts__slider products-slider is-loading">
            <?php
               $pageId = get_page_by_path(pll__('branze'))->ID;
               $solutions = new WP_Query(array(
                  'post_type' => 'page',
                  'posts_per_page' => -1,
                  'post_parent' => $pageId,
               ));
               while ($solutions->have_posts()): $solutions->the_post();
               $solutions_icon = get_post_meta(get_the_id(), 'solutions_02_icon', 1);
            ?>
               <a href="<?php the_permalink(); ?>" class="products-slider__item">
                  <img src="<?php echo $solutions_icon; ?>" alt="<?php the_title() ?>">
                  <h3><?php the_title(); ?></h3> 
               </a>
            <?php 
              endwhile;
              wp_reset_postdata();
            ?>
         </div>

         <span class="arrow arrow--prev"></span>
         <span class="arrow arrow--next"></span>
      </div>
   </div>
</section>

<?php 
// Sekcja 04 - Nasze rozwiazania
  $home_04_title = get_post_meta(get_the_id(), 'home_04_title', 1);
  $home_04_title_link = get_post_meta(get_the_id(), 'home_04_title_link', 1);
  $home_04_partners_group = get_post_meta(get_the_id(), 'home_04_partners_group', 1);
?>

<section class="our-solution">
   <a href="<?php echo $home_04_title_link; ?>" class="our-solution__header">
      <h2 class="title"><?php echo $home_04_title; ?></h2>
   </a>
   <div class="container">
      <div class="our-solution__partners">
      <?php foreach($home_04_partners_group as $partner) : ?>
         <a href="<?php echo $partner['link']; ?>" class="our-solution__partners--item title-border">
            <img src="<?php echo $partner['image']; ?>" alt="">
         </a>
      <?php endforeach; ?>
      </div>
   </div>
</section>


<?php 
// Sekcja 05 - Etaps Jak dzialamy
  $home_05_title = get_post_meta(get_the_id(), 'home_05_title', 1);
?>

<section class="section-etaps">
   <div class="section-etaps__wrapper">
      <div class="section-etaps__sidebar">
         <h2 class="title"><?php echo $home_05_title; ?></h2>
         <ul>
         <?php
            $services = new WP_Query(array (
               'post_type'      => 'services',
               'orderby' => 'title',
               'order' => 'ASC',
               'posts_per_page' => -1,
            )); 
            while( $services->have_posts() ) : $services->the_post();
         ?>
            <li class="etaps-list js-tab"><?php the_title(); ?></li>
         <?php
            endwhile; 

            wp_reset_query();
         ?>
         </ul>
      </div>
      <div class="section-etaps__content">
         <div class="etaps-content">
         <?php            
            while( $services->have_posts() ) : $services->the_post();
               $content = get_the_excerpt() ? get_the_excerpt() : get_the_content();
               $subtitle = get_post_meta(get_the_id(), 'services_00_subtitle', 1);
            ?>
               <div class="etaps-content__tab">
                  <h3><?php the_title(); ?></h3>
                  <?php if (!empty($subtitle)) echo '<p>'.$subtitle.'</p>'; ?>
                  <div class="etaps-content__tab--text">
                  <?php echo wp_trim_words($content, 150, '...'); ?>

                  <a href="<?php the_permalink(); ?>" class="link-btn"><?php pll_e('Więcej'); ?></a>
                  </div>
               </div>
            <?php
            endwhile; 

            wp_reset_query();
            ?>
         </div>
      </div>
   </div>
</section>


<?php 
// Sekcja 06 - Counter
  $home_06_counter = get_post_meta(get_the_id(), 'home_06_tile-counter', 1);
?>
<section class="section-counter">
   <div class="container">
      <div class="section-counter__wrapper" id="counter">
         <?php foreach ($home_06_counter as $counter): ?>
            <div class="counter">
               <div class="counter--number" data-count="<?php echo $counter['count']; ?>">0</div>
               <span class="counter--title"><?php echo $counter['title']; ?></span>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>

<?php 
// Sekcja 07 - Co mowia klienci
  $home_07_title = get_post_meta(get_the_id(), 'home_07_title', 1);
?>

<section class="box-tiles rewiews-clients">
   <div class="container">
      <h2 class="title"><?php echo $home_07_title; ?></h2>
   </div>
   <div class="box-tiles__box box-tiles--primary">
      <div class="container">
         <?php include locate_template('template-parts/reviews-clients-tiles.php'); ?>
         <a href="<?php echo get_site_url().'/'; pll_e('nasi-klienci'); ?>" class="btn btn--primary-dark tiles--link"><?php pll_e('Zobacz więcej'); ?></a>
      </div>
   </div>
</section>


<?php include locate_template('template-parts/slider-partners.php'); ?>

<?php 
// Sekcja 08 - Co mowia eksperci
  $home_08_title = get_post_meta(get_the_id(), 'home_08_title', 1);
?>
<section class="box-tiles our-experts">
   <h2 class="title"><?php echo $home_08_title; ?></h2>

   <div class="our-experts__wrapper">
      <div class="container">
         <div class="our-experts__box">
            <div class="experts-slider is-loading" id="experts-slider">
            <?php
               $experts = new WP_Query(array (
                  'post_type'      => 'experts',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'posts_per_page' => 6,
               )); 
               while( $experts->have_posts() ) : $experts->the_post();
                  include locate_template('template-parts/expert-tile.php');
               endwhile; 
               wp_reset_query();
            ?>
            </div>
            <span class="arrow arrow--prev"></span>
            <span class="arrow arrow--next"></span>

            <a href="<?php echo get_site_url().'/'; pll_e('co-mowia-eksperci'); ?>" class="btn btn--secondary btn--lg tiles--link"><?php pll_e('Zobacz więcej'); ?></a>
         </div>
      </div>
   </div>
</section>

<div class="normalPaddingTop">
   <?php include locate_template('template-parts/footer-tile.php'); ?>
</div>
<?php include locate_template('footer.php'); ?>