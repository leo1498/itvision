<?php
   $thumbnail = get_the_post_thumbnail(get_the_id(), 'services-tile');
   $content = get_the_excerpt() ? get_the_excerpt() : get_the_content();
   $subtitle = get_post_meta(get_the_id(), 'services_00_subtitle', 1);
?>

<a href="<?php the_permalink(); ?>" class="services-tile">
   <div class="services-tile__box">
   <div class="services-tile__image">
      <?php echo $thumbnail; ?>
   </div>
   <div class="services-tile__content">
      <div class="services-tile__content--desc">
         <?php echo wp_trim_words($content, 15, '...'); ?>
      </div>
      <h4 class="services-tile__content--title">
         <?php the_title(); ?>
         <?php if (!empty($subtitle)) echo '<span>'.$subtitle.'</span>'; ?>
      </h4>
   </div>
   </div>
</a>