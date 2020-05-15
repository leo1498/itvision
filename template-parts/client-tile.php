<?php
   $thumbnail = get_the_post_thumbnail(get_the_id(), 'client-tile');
   $tags = get_the_tags();
?>

<div class="client-tile">
   <a href="<?php the_permalink(); ?>" class="client-tile__thumbnail">
      <div class="client-tile__thumbnail--image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
      <div class="client-tile__full-desc">
         <?php echo wp_trim_words(get_the_content(), 40, '...'); ?>
      </div>
   </a>
   <div class="client-tile__content">
      <div class="client-tile__text">
         <a href="<?php the_permalink(); ?>" class="h3"><?php the_title(); ?></a>
         <p><?php the_excerpt(); ?></p>
      </div>
      <div class="client-tile__tags">
         <?php
            foreach ($tags as $tag) :
               echo '<span> '.$tag->name.'</span>';
            endforeach;
         ?>
      </div>
   </div>
</div>