<?php include locate_template('header.php');?>

<?php
  while( have_posts() ) : the_post();
  $tags = get_the_tags();
  $prev_post = get_previous_post();
  $next_post = get_next_post();
?>

<div class="subpage">
  <div class="container container--xs">
    <div class="subpage__header">
      <div class="breadcrumbs-wrapper">
        <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumbs__link" href="<?php echo get_site_url().'/'; pll_e('aktualnosci'); ?>" itemprop="item">
              <span itemprop="name"><?php pll_e('Aktualności - tytuł'); ?></span>
            </a>
            <meta itemprop="position" content="1">
          </li>
          <li class="breadcrumbs__current"><?php the_title(); ?></li>
        </ul>
      </div>

      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>

      <div class="tags">
        <?php if (!empty($tags)) : ?>
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
        <?php endif; ?>

        <div class="tags-keywords tags-topics">
          <span class="tags-keywords__title"><?php pll_e('tematy powiązane'); ?>:</span>
          <div class="tags-keywords__box">
            <?php 
              $newsWords = new WP_Query(array(
                'post_type' => 'post',
                'orderby' => 'rand',
                'order' => 'ASC',
                'post__not_in'  => array(get_the_id()),
                'posts_per_page' => 4,
              ));

              while ($newsWords->have_posts()) : $newsWords->the_post();
                echo '<a href="'.get_the_permalink().'" class="tags-keywords--word">'.wp_trim_words(get_the_title(), 3, false).'</a>';
              endwhile;

              wp_reset_query();
            ?>
          </div>
        </div>
      </div>

      <div class="date-publication">
        <?php pll_e('Opublikowano') ?>: <time datetime="<?php echo get_the_time( 'F jS Y' ); ?>"><?php echo get_the_time( 'F jS Y' ); ?></time>
      </div>

      <?php if (!empty(get_the_excerpt())) : ?>
        <div class="single-excerpt">
          <?php the_excerpt(); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <div class="single-post-content">
    <div class="container container--xs content">
      <?php the_content(); ?>
    </div>
    

    <div class="container container--xs">

      <?php
        $gallery = get_post_meta(get_the_id(), 'gallery_images', 1);
        if (!empty($gallery)) :
      ?>
        <div class="gallery">
          <div class="gallery__wrapper">
            <div class="gallery__slider is-loading" id="gallery-slider">
              <?php slider_fancy('gallery_images', 'gallery'); ?>
            </div>
            <span class="gallery-slider--arrow arrow arrow--prev"></span>
            <span class="gallery-slider--arrow arrow arrow--next"></span>
          </div>
        </div>

      <?php
        endif;
      ?>

      <div class="single-post__nav">
      <?php if ( !empty($prev_post) ) : ?>
        <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn--secondary btn--lg"><?php pll_e('Poprzedni artykuł'); ?></a>
      <?php endif; ?>
      <?php if ( !empty($next_post) ) : ?>
        <a href="<?php echo get_permalink($next_post); ?>" class="btn btn--secondary btn--lg"><?php pll_e('Następny artykuł'); ?></a>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="recent-posts">
    <h4 class="text-center"><?php pll_e('Zobacz również poniższe tematy'); ?></h4>
    
    <div class="recent-posts__wrapper">
      <?php 
        $recent_posts = new WP_Query(array(
          'post_type' => 'post',
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