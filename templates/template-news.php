<?php

/*
Template name: Aktualności
*/

?>
<?php include locate_template('header.php');?>


<div class="subpage">
  <div class="container container--xs">
    <h1 class="h1"><?php echo get_the_title(); ?></h1>

    <section class="news">
      <div id="news-ajax">
        <?php 
          $postsPerPage = 10;
          $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
          $news = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => $postsPerPage,
            'paged'          => $paged,
          ));

          while ($news->have_posts()) : $news->the_post();
            include locate_template('template-parts/news-tile.php');
          endwhile;

          wp_reset_query();
        ?>
      </div>

      <div class="news__load-more">
        <div id="pagination-news">
          <?php
            $big = 999999999;
            echo '<div class="pagination">';
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $news->max_num_pages,
                'prev_next' => true,
                'prev_text' => __(''),
                'next_text' => __(''),
            ));
            echo '</div>'
          ?>
        </div>
      </div>
    </section>
  </div>
</div>


<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>