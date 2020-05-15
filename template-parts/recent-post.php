<?php
   $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'news-tile');
   $post_video_checkbox = get_post_meta(get_the_id(), 'posts_00_checkbox', 1);
?>
<a href="<?php the_permalink(); ?>" class="news__article-link recent-post">
   <article class="news__article">
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
            <?php 
               if (get_post_type(get_the_ID()) == 'experts' ) : 
               $expert_position = get_post_meta(get_the_id(), 'experts_taxonomy_position', 1);
            ?>
               <h5><?php echo $expert_position; ?></h5>
            <?php endif; ?>
         </div>
      </div>
   </article>
</a>