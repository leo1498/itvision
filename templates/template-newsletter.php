<?php

/*
Template name: Newsletter
*/

?>
<?php include locate_template('header.php');?>

<?php 
  while( have_posts() ) : the_post();
?>

<div class="subpage pageNewsletter">
  <div class="container container--xs">
    <h1 class="title title--left">
      <?php echo get_the_title(); ?>
      <span><?php pll_e('Dzięki zapisowi do newslettera będziesz na bieżąco z nowościami!'); ?></span>
    </h1>

    <?php the_content(); ?>
    
  </div>

<?php include locate_template('template-parts/footer-tile.php'); ?>
</div>

<?php 
  endwhile;
  wp_reset_query();
?>
<?php include locate_template('footer.php'); ?>