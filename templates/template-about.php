<?php

/*
Template name: O nas
*/

?>
<?php include locate_template('header.php');?>

<?php 
  while( have_posts() ) : the_post();
?>

<div class="subpage">
  <div class="container container--xs">
    <h1 class="title title--left">
      <?php echo get_the_title(); ?>
    </h1>

    <div class="about-content content content--no-bg content--primary">
      <?php the_content(); ?>
    </div>
  </div>

  <div class="about-services container">
    <div class="container--xs">
      <h3 class="h3"><?php pll_e('Zobacz jak działamy'); ?>:</h3>    
    </div>
    <div class="services">
      <?php
        $services = new WP_Query(array (
          'post_type'      => 'services',
          'orderby' => 'title',
          'order' => 'ASC',
          'posts_per_page' => -1,
        ));
        while( $services->have_posts() ) : $services->the_post();
          include locate_template('template-parts/services-tile.php');
        endwhile; 
        wp_reset_query();
      ?>
      </div>
  </div>

  <?php
    $about_group = get_post_meta(get_the_id(), 'about_00_group', 1);
    $about_social = get_post_meta(get_the_id(), 'about_01_group', 1);
  ?>
  <div class="container container--xs">
    <h3 class="h3"><?php pll_e('Zobacz więcej naszych działań'); ?>:</h3>
    
    <div class="about-logo">
      <?php foreach ($about_group as $product): ?>
        <a href="<?php echo $product['url']; ?>" target="_blank" class="about-logo__item">
          <img src="<?php echo $product['image']; ?>" alt="">
          <span><?php echo $product['url']; ?></span>
        </a>
      <?php endforeach; ?>
    </div>

    <ul class="social-icon">
      <?php foreach ($about_social as $social): ?>
        <li>
          <a href="<?php echo $social['url']; ?>" target="_blank" class="social-icon--vimeo">
            <img src="<?php echo $social['image']; ?>" alt="">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<?php 
  endwhile;
  wp_reset_query();
?>


<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>