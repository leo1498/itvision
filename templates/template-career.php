<?php

/*
Template name: Kariera
*/

include locate_template('header.php'); ?>

<?php 
  while( have_posts() ) : the_post();
  $career_figure_image = get_post_meta(get_the_id(), 'career_figure_image', 1);
  $career_figure_subtitle = get_post_meta(get_the_id(), 'career_figure_subtitle', 1);
  $career_figure_title = get_post_meta(get_the_id(), 'career_figure_title', 1);
  $career_group = get_post_meta(get_the_id(), 'career_00_group', 1);
  $career_content_text = get_post_meta(get_the_id(), 'career_content_text', 1);
?>

<div class="subpage subpage--lg noMarginBottom">
  <div class="container container--xs">

    <div class="subpage__header">
      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>
    </div>
  </div>

  <div class="subpage__content content content--normal-font-size">
    <div class="container container--xs">

      <div class="figure-content">
        <img src="<?php echo $career_figure_image; ?>" alt="<?php echo get_the_title(); ?>">
        <div class="figure-content__text">
          <span><?php echo $career_figure_subtitle; ?></span>
          <h4 class="h4"><?php echo $career_figure_title; ?></h4>
        </div>
      </div>

      <?php the_content(); ?>

      <div class="accordion accordion--simple">
        <h4 class="h4"><?php pll_e('Rekrutujemy na stanowiska'); ?>:</h4>

        <?php foreach ($career_group as $position): ?>
          <div class="accordion__item">
            <div class="accordion__tab js-tab">
              <h3 class="title title--left"><?php echo $position['title']; ?></h3>
            </div>
            <div class="accordion__tab-content">
              <div class="accordion__content">
                <?php echo $position['text']; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php 
        if (!empty($career_content_text)) :
          echo $career_content_text;
        endif; 
      ?>

    </div>
  </div>

<?php 
  endwhile;
  wp_reset_postdata();
?>

<?php include locate_template('template-parts/footer-tile.php'); ?>
</div>
<?php include locate_template('footer.php'); ?>