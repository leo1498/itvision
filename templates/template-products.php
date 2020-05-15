<?php

/*
Template name: Produkty
*/

include locate_template('header.php'); ?>

<?php 
  while( have_posts() ) : the_post();

?>

<div class="subpage subpage--lg noMarginBottom">
  <div class="container container--xs">

    <div class="subpage__header">
      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>
    </div>
  </div>

  <div class="subpage__content content">
    <div class="container container--xs">
      <?php the_content(); ?>
      
      <div class="products">
        <?php
          $all = get_posts(array('post_type'=> 'products', 'posts_per_page' => -1));
          $child_of = array();
          foreach ($all as $single) {
            $kids = get_children($single->ID);  
            foreach ($kids as $kid) {
              $child_of[] = $kid->ID;
            }
          }
          
          $products = new WP_Query(array (
            'post_type'      => 'products',
            'post__not_in' => $child_of,
            'posts_per_page' => -1,
          ));
          $count = 1;
          while( $products->have_posts() ) : $products->the_post();
            $products_group = get_post_meta(get_the_id(), 'products_00_group', 1);
        ?> 
          <div class="product-item" id="product-<?php echo $count; ?>">
            <h3 class="title title--left h1 h1--square h1--square-small"><?php the_title(); ?></h3>
            <div class="product-item__inner">
              <a href="<?php the_permalink(); ?>" class="product-item__image">
                <?php echo get_the_post_thumbnail(get_the_id(), 'product-item'); ?>
              </a>
              <div class="product-item__text">
                <?php the_excerpt(); ?>

                <a href="<?php the_permalink(); ?>" class="btn btn--arrow btn--xs btn--no-bg">
                  <?php pll_e('Dowiedz się więcej'); ?>
                </a>
              </div>
            </div>
          </div>
        <?php
          $count++;
          endwhile; 
          wp_reset_postdata();
        ?>
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