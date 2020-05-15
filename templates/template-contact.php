<?php

/*
Template name: Kontakt
*/

include locate_template('header.php'); ?>

<?php 
  while( have_posts() ) : the_post();

  $contact_00_text = get_post_meta(get_the_id(), 'contact_00__text', 1);
?>

<div class="subpage pageContact">
  <div class="container container--xs">
    <h1 class="h1"><?php echo get_the_title(); ?></h1>
  </div>
  

  <div class="container">
    <div class="contact">
      <div class="contact__wrapper">
        <div class="contact__content">
          <div class="contact__box">
            <?php the_content(); ?>
          </div>

          <a href="<?php echo get_site_url().'/'; pll_e('o-nas'); ?>" class="btn btn--secondary btn--lg"><?php pll_e('Zobacz jak działamy'); ?></a>

          <div class="contact__box">
            <?php echo $contact_00_text; ?>
          </div>
        </div>

        <div class="contact__form">
          <h3><?php pll_e('Formularz kontaktowy'); ?></h3>
          <?php
            if (pll_current_language() == 'pl') {
              echo do_shortcode('[contact-form-7 id="144" title="Formularz kontaktowy PL"]');
            } 
            else echo do_shortcode('[contact-form-7 id="196" title="Formularz kontaktowy EN"]');
          ?>
        </div>
      </div>
    </div>
    
  </div>

<?php 
  endwhile;
  wp_reset_postdata();
?>

<?php include locate_template('template-parts/footer-tile.php'); ?>
</div>
<?php include locate_template('footer.php'); ?>