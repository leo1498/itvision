<?php

/*
Template name: Nasi klienci
*/

?>
<?php include locate_template('header.php');?>

<?php 
  while( have_posts() ) : the_post();
  $similar = $_GET['similar'];
?>

<div class="subpage">
  <div class="container container--xs">


  <?php if (!$similar) : ?>

    <h1 class="title title--left">
      <?php echo get_the_title(); ?>
      <span><?php the_content(); ?></span>
    </h1>

    <div class="filter" id="filter" data-ajax="<?php echo admin_url('admin-ajax.php'); ?>">
      <div class="filter__wrapper">
        <div class="filter__field filter-search">
          <input type="search" placeholder="<?php pll_e('wpisz słowa kluczowe'); ?>" id="filterSearch" class="filter-search--input">
          <button type="button" class="filter-search--btn" id="filterBtn">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/search.png" alt="<?php pll_e('Szukaj'); ?>">
          </button>
        </div>
        <div class="filter__field filter-sort input-group">
          <label for="filterSelect"><?php pll_e('sortuj'); ?></label>
          <select name="filter" data-ajax="filter__select" class="filter__select" id="filterSelect">
            <option value="0" class="filter__option"><?php pll_e('wybierz'); ?></option>
            <option value="sort_new" class="filter__option"><?php pll_e('Od najnowszych'); ?></option>
            <option value="sort_old" class="filter__option"><?php pll_e('Od najstarszych'); ?></option>
            <option value="sort_a" class="filter__option"><?php pll_e('Od A do Z'); ?></option>
            <option value="sort_z" class="filter__option"><?php pll_e('Od Z do A'); ?></option>
          </select>
        </div>
      </div>
    </div>

    <div class="clients">
      <div class="clients__wrapper" id="clients-container">
        <?php
          $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
          $clients = new WP_Query(array (
            'post_type'      => 'clients',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 6,
            'paged'          => $paged,
          ));
          
          while( $clients->have_posts() ) : $clients->the_post();
            include locate_template('template-parts/client-tile.php');
          endwhile; 

          wp_reset_query();
        ?>
      </div>

      <div class="clients__pagination" id="pagination">
        <?php
          $big = 999999999;
          echo '<div class="pagination">';
          echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $clients->max_num_pages,
              'prev_next' => true,
              'prev_text' => __(''),
              'next_text' => __(''),
          ));
          echo '</div>'
        ?>
      </div>
    </div>


  <?php else: ?>
  
  <?php
    $cats = $_GET['category'];
    $post_not_in = $_GET['post_not_in'];

    $cats_arr = explode(' ', $cats);
    

    $args = array(
      'post_type'      => 'clients',
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
    <h1 class="title title--left noPaddingBottom">
      <?php pll_e('Podobne rozwiązania'); ?>:
    </h1>

    <div class="tags-keywords">
      <span class="tags-keywords__title"><?php pll_e('Branże - tytuł'); ?>:</span>
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

    <div class="clients__wrapper mediumPaddingTop">
      <?php
        while( $similars->have_posts() ) : $similars->the_post();
          include locate_template('template-parts/client-tile.php');
        endwhile; 

        wp_reset_query();
        
      ?>
    </div>

  <?php endif; ?>
    
  </div>
</div>

<?php 
  endwhile;
  wp_reset_query();
?>

<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>