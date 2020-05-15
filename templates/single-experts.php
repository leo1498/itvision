

<?php include locate_template('header.php'); ?>

<?php 
  while( have_posts() ) : the_post();
  $tags = get_the_tags();
  $prev_post = get_previous_post();
  $next_post = get_next_post();
  
  $expert_position = get_post_meta(get_the_id(), 'experts_taxonomy_position', 1);
?>

<div class="subpage subpage--lg">
  <div class="container container--xs">

    <div class="subpage__header">
        <div class="profile-box">
          <div class="profile-box__avatar" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_id(), 'avatar'); ?>);"></div>
          <div class="profile-box__info">
            <h1 class="title"><?php echo get_the_title(); ?></h1>
            <span><?php echo $expert_position; ?></span>
          </div>
        </div>

        <?php if (!empty($tags)) : ?>
        <div class="tags">
          <div class="tags-keywords">
            <span class="tags-keywords__title"><?php pll_e('słowa kluczowe'); ?>:</span>
            <div class="tags-keywords__box">
              <?php
                foreach ($tags as $tag) :
                  echo '<span class="tags-keywords--word">'.$tag->name.'</span>';
                endforeach;
              ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      
    </div>
  </div>

  <div class="subpage__content content content-default content--normal-font-size">
    <div class="container container--xs">
      <?php the_content(); ?>

      <div class="single-post__nav">
      <?php if ( !empty($prev_post) ) : ?>
        <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn--secondary btn--lg"><?php pll_e('Poprzednia wypowiedź'); ?></a>
      <?php endif; ?>
      <?php if ( !empty($next_post) ) : ?>
        <a href="<?php echo get_permalink($next_post); ?>" class="btn btn--secondary btn--lg"><?php pll_e('Następna wypowiedź'); ?></a>
      <?php endif; ?>
      </div>
    </div>
  </div>

</div>

<div class="container">
  <form method="GET" action="<?php echo get_site_url() . '/'; pll_e('co-mowia-eksperci'); ?>" class="single-post__nav systemSingle__btn">
    <?php 
      $terms = wp_get_post_terms( get_the_id(), 'category');
      $cats_array = '';
      foreach($terms as $term) {
        $cats_array .= $term->term_id.' '; 
      }
    ?>
    <input type="hidden" name="similar" value="true">
    <input type="hidden" name="category" value="<?php echo $cats_array; ?>">
    <input type="hidden" name="post_not_in" value="<?php echo get_the_id(); ?>">
    <?php if (!empty($cats_array)) : ?>
    <button type="submit" class="btn btn--secondary btn--lg">
      <?php pll_e('Zobacz powiązane wypowiedzi'); ?>
    </button>
    <?php endif; ?>
  </form>

  <div class="recent-posts">
    <h4 class="text-center"><?php pll_e('Zobacz również poniższe tematy'); ?></h4>
    
    <div class="recent-posts__wrapper">
      <?php 
        $recent_posts = new WP_Query(array(
          'post_type' => 'experts',
          'orderby' => 'rand',
          'post__not_in'  => array(get_the_id()),
          'posts_per_page' => 3,
        ));

        while ($recent_posts->have_posts()) : $recent_posts->the_post();
          include locate_template('template-parts/recent-post.php');
        endwhile;

        wp_reset_query();
      ?>
    </div>
  </div>
</div>
<?php 
  endwhile;
  wp_reset_postdata();
?>
<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>