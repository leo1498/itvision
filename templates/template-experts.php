<?php

/*
Template name: Postrona - Co mówią eksperci
*/

?>
<?php include locate_template('header.php');?>
<?php 
  while( have_posts() ) : the_post();
  $similar = $_GET['similar'];
?>

<div class="subpage">

<?php if (!$similar) : ?>
  <div class="container container--xs">
    <h1 class="h1"><?php echo get_the_title(); ?></h1>
  </div>

  <section class="box-tiles our-experts experts-page">
    <div class="our-experts__wrapper">
        <div class="container">
          <div class="our-experts__box">
              <div class="experts-slider is-loading">
                <?php
                  $experts = new WP_Query(array (
                      'post_type'      => 'experts',
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'posts_per_page' => -1,
                  )); 
                  while( $experts->have_posts() ) : $experts->the_post();
                    include locate_template('template-parts/expert-tile.php');
                  endwhile; 
                  wp_reset_query();
                ?>
              </div>
          </div>
        </div>
    </div>
  </section>

  <?php else: 

  $cats = $_GET['category'];
  $post_not_in = $_GET['post_not_in'];
  $cats_arr = explode(' ', $cats);
  
  $args = array(
    'post_type'      => 'experts',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => -1,
    'post__not_in' => array($post_not_in),
    'tax_query'	=> array(
      'relation'	=> 'OR',
    )
  );

  foreach($cats_arr as $cat) {
    if (!empty($cat)) {
      $args['tax_query'][] = array(
        'taxonomy' => 'category',
        'field' => 'term_id',
        'terms' => array($cat),
      );
    }
  }

  $similars = new WP_Query($args);  
?>
  <div class="container container--xs">
    <h1 class="title title--left noPaddingBottom">
      <?php pll_e('Powiązane wypowiedzi ekspertów'); ?>
    </h1>

    <div class="tags-keywords">
      <span class="tags-keywords__title"><?php pll_e('tematy powiązane'); ?>:</span>
      <div class="tags-keywords__box">
        <?php 
          foreach($cats_arr as $term_id) {
            if (!empty($term_id)) {
              echo '<span class="tags-keywords--word">'. get_term( $term_id )->name .'</span>'; 
            }
          }
        ?>
      </div>
    </div>
  </div>

  <section class="box-tiles our-experts experts-page">
    <div class="our-experts__wrapper">
        <div class="container">
          <div class="our-experts__box">
              <div class="experts-slider is-loading">
                <?php
                  while( $similars->have_posts() ) : $similars->the_post();
                    include locate_template('template-parts/expert-tile.php');
                  endwhile; 
                  wp_reset_query();
                ?>
              </div>
          </div>
        </div>
    </div>
  </section>

  <?php endif; ?>

</div>


<?php 
  endwhile;
  wp_reset_query();
?>
<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>