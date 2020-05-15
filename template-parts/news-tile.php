<?php
   $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'news-tile');
   $post_video_checkbox = get_post_meta(get_the_id(), 'posts_00_checkbox', 1);
   $content = get_the_excerpt() ? get_the_excerpt() : get_the_content();
   $date = get_the_time( 'F jS Y' );
?>

<a href="<?php the_permalink(); ?>" class="news__article-link">
   <article class="news__article type-news">
      <?php if ($post_video_checkbox) : ?>
        <div class="news__image news__image--noimage" style="background-image: url(<?php echo $thumbnail; ?>)"><span class="video-btn"></span></div>
      <?php else : ?>
         <div class="news__image" style="background-image: url(<?php echo $thumbnail; ?>);"></div>
      <?php endif; ?>
      <div class="news__content">
         <div class="news__text">
            <h3 class="news__text--title">
               <?php echo get_the_title(); ?>
            </h3>
            <div class="news__text--desc">
               <?php echo wp_trim_words($content, 50, '...'); ?>
            </div>
         </div>
         <div class="news__footer">
            <span class="news__footer--date">
               <?php pll_e('Opublikowano'); ?>:&nbsp; 
               <time datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
            </span>
            <span class="btn btn--arrow btn--xs btn--no-bg"><?php pll_e('Przejdź do artykułu'); ?></span>
         </div>
      </div>
   </article>
</a>