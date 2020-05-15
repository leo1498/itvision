<?php include locate_template('header.php');?>

<?php
  while( have_posts() ) : the_post();
  $tags = get_the_tags();
  $prev_post = get_previous_post();
  $next_post = get_next_post();

  // content
  $clients_00_subtitle = get_post_meta(get_the_id(), 'clients_00_subtitle', 1);

  // section 01
  $clients_01_image = get_post_meta(get_the_id(), 'clients_01_image', 1);
  $clients_01_text = get_post_meta(get_the_id(), 'clients_01_text', 1);
  $clients_02_text = get_post_meta(get_the_id(), 'clients_02_text', 1);
  $clients_03_text = get_post_meta(get_the_id(), 'clients_03_text', 1);
  $clients_04_group_left = get_post_meta(get_the_id(), 'clients_04_group_left', 1);
  $clients_04_group_right = get_post_meta(get_the_id(), 'clients_04_group_right', 1);
  $clients_04_text = get_post_meta(get_the_id(), 'clients_04_text', 1);
  $clients_05_text = get_post_meta(get_the_id(), 'clients_05_text', 1);
  $clients_05_author = get_post_meta(get_the_id(), 'clients_05_author', 1);
  $clients_05_position = get_post_meta(get_the_id(), 'clients_05_position', 1);
  $clients_result_image = get_post_meta(get_the_id(), 'clients_result_image', 1);
  $clients_result_text = get_post_meta(get_the_id(), 'clients_result_text', 1);
  $clients_btn_url = get_post_meta(get_the_id(), 'clients_btn_url', 1);

  $clients_tags_02 = get_post_meta(get_the_id(), 'clients_00_tag_02', 1);
?>

<div class="subpage subpage--lg systemSingle">
  <div class="container container--xs">
    <div class="subpage__header">
      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>

      <div class="tags">
        <?php 
        $terms = wp_get_post_terms( get_the_id(), 'category');
        if (!empty($terms)) : ?>
        <div class="tags-keywords">
          <span class="tags-keywords__title"><?php pll_e('Branże - tytuł'); ?>:</span>
          <div class="tags-keywords__box">
            <?php 
              foreach($terms as $term) {
                echo '<span class="tags-keywords--word">'. $term->name .'</span>'; 
              }
            ?>
          </div>
        </div>
        <?php endif; ?>

        <?php if (!empty($clients_tags_02)) : ?>
          <div class="tags-keywords tags-topics">
            <span class="tags-keywords__title"><?php pll_e('rozwiązanie'); ?>:</span>
            <div class="tags-keywords__box">
              <?php
                $tags_02 = explode(',', $clients_tags_02);
                foreach ($tags_02 as $tag) {
                  echo '<span class="tags-keywords--word">'.$tag.'</span>';
                }
              ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="systemSingle__content">
    <div class="container container--xs content">
      <h2><?php echo $clients_00_subtitle; ?></h2>
      <?php the_content(); ?>
    </div>
  </div>


  <div class="systemSingle__figure <?php echo empty($clients_01_image) ? 'systemSingle__figure--noimage' : null; ?>">
    <?php if (!empty($clients_01_image)) : ?>
      <div class="systemSingle__figure--image">
        <img src="<?php echo $clients_01_image ?>" alt="">
      </div>
    <?php endif; ?>
    <div class="text <?php echo empty($clients_01_image) ? 'container container--xs' : null; ?>"><?php echo $clients_01_text; ?></div>
  </div>

  <?php if (!empty($clients_02_text)) : ?>
  <section class="subpage__content content">
    <div class="container container--xs">
      <h1 class="h1 h1--square h1--secondary"><?php pll_e('Wyzwanie'); ?></h1>
      <?php echo $clients_02_text; ?>
    </div>
  </section>
  <?php endif; ?>

  <?php if (!empty($clients_03_text)) : ?>
  <div class="container">
    <div class="systemSingle__blockquote">
      <?php echo $clients_03_text; ?>
    </div>
  </div>
  <?php endif; ?>

  <section class="subpage__content content paddingBottom">
    <div class="container container--xs">
      <h1 class="h1 h1--square"><?php pll_e('Rozwiązanie'); ?></h1>
      <?php if (!empty($clients_04_group_right) && !empty($clients_04_group_left)) : ?>
        <div class="wp-block-media-text alignwide has-media-on-the-right">
          <?php if (!empty($clients_04_group_right)) : ?>
            <figure class="wp-block-media-text__media">
              <?php echo $clients_04_group_right; ?>
            </figure>
          <?php endif; ?>

          <?php if (!empty($clients_04_group_left)) : ?>
            <div class="wp-block-media-text__content">
              <?php echo $clients_04_group_left; ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php echo $clients_04_text; ?>
    </div>
  </section>

 <?php if (!empty($clients_05_text)) : ?>
  <div class="systemSingle__review">
    <div class="systemSingle__review--box">
      <div class="text"><?php echo $clients_05_text; ?></div>
      <?php if (!empty($clients_05_author)) : ?>
        <span class="span-strong"><?php echo $clients_05_author; ?></span>
      <?php endif; ?>
      <?php if (!empty($clients_05_position)) : ?>
        <span><?php echo $clients_05_position; ?></span>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>


  <section class="subpage__content content systemSingle__result">
    <div class="container container--xs">
      <h1 class="h1 h1--square h1--double"><?php pll_e('Wynik'); ?></h1>

      <h2 class="title"><?php the_title(); ?></h2>

      <?php 
        if (!empty($clients_result_text)) {
          echo  $clients_result_text; 
        } 
      ?>

      <?php 
        if (!empty($clients_result_image)) {
          echo '<img src="'.$clients_result_image.'" alt="">'; 
        } else {
          echo get_the_post_thumbnail(); 
        }
      ?>
      
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
    </div>
  </section>

  <div class="container">
    <form method="GET" action="<?php echo get_site_url() . '/'; pll_e('nasi-klienci'); ?>" class="single-post__nav systemSingle__btn">
      <?php if (!empty($clients_btn_url) ) : ?>
        <a href="<?php echo $clients_btn_url; ?>" target="_blank" class="btn btn--secondary btn--lg"><?php pll_e('Dowiedz się więcej o systemie'); ?></a>
      <?php endif; ?>

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
      <button type="submit" class="btn btn--secondary btn--lg">
        <?php pll_e('Zobacz inne rozwiązania z branży'); ?>
      </button>

    </form>
  </div>

  <div class="container">
  <div class="recent-posts">

    <div class="recent-posts__wrapper">
      <?php
        $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'news-tile');
      ?>
      
      <?php if( !empty($prev_post) ) : ?>
        <a href="<?php echo get_permalink($prev_post); ?>" class="news__article-link nav-post">
          <article class="news__article">
              <div class="news__image" style="background-image: url(<?php echo get_the_post_thumbnail_url($prev_post, 'news-tile'); ?>);"></div>
              <div class="news__content">
                <span class="change-post"><?php pll_e('Poprzedni') ?></span>
                <div class="news__text">
                  <h3 class="news__text--title">
                    <?php echo $prev_post->post_title; ?>
                  </h3>
                  <p><?php echo wp_trim_words( $prev_post->post_content, 8); ?></p>
                </div>
              </div>
          </article>
       </a>
      <?php endif; ?>

      <?php if( !empty($next_post) ) : ?>
        <a href="<?php echo get_permalink($next_post); ?>" class="news__article-link nav-post">
          <article class="news__article">
              <div class="news__image" style="background-image: url(<?php echo get_the_post_thumbnail_url($next_post, 'news-tile'); ?>);"></div>
              <div class="news__content">
                <span class="change-post"><?php pll_e('Następny') ?></span>
                <div class="news__text">
                  <h3 class="news__text--title">
                    <?php echo $next_post->post_title; ?>
                  </h3>
                  <p><?php echo wp_trim_words( $next_post->post_content, 8); ?></p>
                </div>
              </div>
          </article>
       </a>
      <?php endif; ?>

    </div>
  </div>
</div>
  
</div>

<?php 
  endwhile;
  wp_reset_postdata();
?>
<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>