<?php

/*
Template name: Branże
*/

?>
<?php include locate_template('header.php');?>


<?php 
  while( have_posts() ) : the_post();
  $current_page = get_the_id();
  $solutions_group = get_post_meta(get_the_id(), 'solutions_00_group', 1);
?>

<div class="subpage">
  <div class="container container--xs">

    <div class="subpage__header">
      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>
        <div class="icon-tiles icon-tiles--solutions">
          <div class="icon-tiles__wrapper">
            <?php
              $subpages = new WP_Query(array(
                'post_type' => 'page',
                'posts_per_page' => -1,
                'post_parent' => get_page_by_path(pll__('branze'))->ID,
              ));
              while ($subpages->have_posts()): $subpages->the_post();
              $current_subpage = get_the_id();
              $activeClass = $current_page == $current_subpage ? 'active' : NULL;
            ?>
              <a href="<?php echo get_permalink(); ?>" class="icon-tiles__item <?php echo $activeClass; ?>">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
                <h3><?php the_title(); ?> </h3>
              </a>
            <?php 
              endwhile;
              wp_reset_postdata();
            ?>
          </div>
        </div>

    </div>
  </div>



<?php
  global $post;  
  if (is_page() && $post->post_parent ) :
?>

  <?php if (get_the_content()) : ?>
  <div class="subpage__content content content--blue-title">
    <div class="container container--xs">
      <?php the_content(); ?>
    </div>
  </div>
  <?php endif; ?>
</div>


<div class="solutions-container">
  <div class="container container--xs">
    <div class="positions" id="positions-<?php the_id(); ?>">
      
      <?php 
        // Stanowiska
        $positions = new WP_Query(array(
          'post_type' => 'page',
          'posts_per_page' => -1,
          'post_parent' => get_the_id(),
        ));
        while ($positions->have_posts()): $positions->the_post();
      ?>
        <a href="<?php the_permalink(); ?>" class="positions__person">
          <div class="positions__person-container">
            <div class="positions__person--image">
              <div class="positions__person--image-crop" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_id(), 'position-tile'); ?>)"></div>
              <div class="client-tile__full-desc">
                <?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?>
              </div>
            </div>
            <div class="positions__person--content">
              <h3><?php the_title() ?></h3>
              <span class="btn btn--arrow btn--xs btn--no-bg"><?php pll_e('Dowiedz się więcej'); ?></span>
            </div>
          </div>
      </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</div>
 <div class="container">
    <div class="trusted-us">

      <div class="container--xs">
        <h3 class="h3"><?php pll_e('Zaufali nam'); ?></h3>
      </div>
      
      <div class="news">
      <?php foreach($solutions_group as $item) : ?>
        <a href="<?php echo $item['text']; ?>" class="news__article-link">
          <div class="news__article trusted-us-partner">
              <div class="news__image" style="background-image: url(<?php echo $item['image']; ?>);"></div>
              <div class="news__content">
                <div class="news__text">
                    <h3 class="news__text--title">
                      <?php echo $item['title']; ?>
                    </h3>
                    <div class="news__text--desc">
                      <?php echo $item['text_short']; ?>
                    </div>
                </div>
                <div class="news__footer">
                    <span class="news__footer--date"></span>
                    <span class="btn btn--arrow btn--xs btn--no-bg"><?php pll_e('Więcej'); ?></span>
                </div>
              </div>
          </div>
      </a>
      <?php endforeach; ?>
      </div>

    </div>
  </div>

<?php 
  endif;
  endwhile;
  wp_reset_postdata();
?>
<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>