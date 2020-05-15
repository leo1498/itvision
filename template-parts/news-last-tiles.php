<article class="box-tiles__wrapper news last-news">
   <?php
      $news_last = new WP_Query( array (
         'post_type' => 'post',
         'posts_per_page' => 3,
      )); 

      $i = 0;
      while( $news_last->have_posts() ) : $news_last->the_post();
         $post_video_checkbox = get_post_meta(get_the_id(), 'posts_00_checkbox', 1);
         $title = wp_trim_words(get_the_title(), 5, '...');
         $content = get_the_excerpt() ? get_the_excerpt() : get_the_content();
         $highlighted_news = $i % 2 != 0 ? true : false;
         $thumbnail = get_the_post_thumbnail( get_the_id(), 'box-tile', true);
   ?>
      <a href="<?php the_permalink(); ?>" class="box-tile<?php echo $highlighted_news ? ' box-tile--highlighted' : NULL; ?>">
         <div class="box-tile__container">
            <div class="box-tile__image">
               <?php echo $thumbnail; ?>
               <?php if ($post_video_checkbox) echo '<span class="video-btn"></span>'; ?>
            </div>
            <div class="box-tile__title">
               <span class="h4"><?php echo $title; ?></span>
            </div>
         </div>
      </a>

   <?php 
      $i++;
      endwhile; 
      wp_reset_postdata(); 
   ?>

</article>