<article class="box-tiles__wrapper is-loading" id="reviews-client-slider">
   <?php
      $news_last = new WP_Query( array (
         'post_type' => 'clients',
         'orderby' => 'date',
         'posts_per_page' => 6,
      )); 

      while( $news_last->have_posts() ) : $news_last->the_post();
         $title = wp_trim_words(get_the_title(), 15, '...');
         $content = wp_trim_words(get_the_excerpt(), 10, '...');
         $thumbnail = get_the_post_thumbnail( get_the_id(), 'box-tile', true);
   ?>
      <div class="box-tile reviews-client-tile">
         <div class="box-tile__container">
            <div class="box-tile__image">
               <?php echo $thumbnail; ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="box-tile__content">
               <span class="h4"><?php echo $title; ?></span>
               <p><?php echo $content; ?></p>
               <span class="btn btn--no-bg btn--md btn--icon"><?php pll_e('Więcej'); ?> <i class="icon-plus"></i></span>
            </a>
            <span class="icon-plus-btn"></span>
         </div>
      </div>

   <?php 
      endwhile; 
      wp_reset_postdata(); 
   ?>
</article>

<span class="arrow arrow--prev arrow--lg"></span>
<span class="arrow arrow--next arrow--lg"></span>