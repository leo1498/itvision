<?php

/*
Template name: Polityka prywatności
*/

?>

<?php include locate_template('header.php'); ?>

<?php 
  while( have_posts() ) : the_post();
  $accordion_group = get_post_meta(get_the_id(), 'accordion_default_group', 1);
?>

<div class="subpage subpage--lg noMarginBottom">
  <div class="container container--xs">

    <div class="subpage__header">
      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>
    </div>
  </div>

  <div class="subpage__content content content-default content--normal-font-size">
    <div class="container container--xs">

      <div class="accordion accordion-faq accordion--simple accordion--no-margin accordion--last-tab-open">

        <?php foreach ($accordion_group as $tab): ?>
          <div class="accordion__item">
            <div class="accordion__tab js-tab">
              <h3 class="title title--left"><?php echo $tab['title']; ?></h3>
            </div>
            <div class="accordion__tab-content">
              <div class="accordion__content">
                <?php echo $tab['text']; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <?php the_content(); ?>
    </div>
  </div>

<?php 
  endwhile;
  wp_reset_postdata();
?>

<?php include locate_template('template-parts/footer-tile.php'); ?>
</div>

<?php include locate_template('footer.php'); ?>