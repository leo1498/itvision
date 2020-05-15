<?php
/*
Template Name: Produkty
Template Post Type: products
*/
?>

<?php include locate_template('header.php');?>

<?php
  while( have_posts() ) : the_post();

  $posts_00_video_youtube = get_post_meta(get_the_id(), 'posts_00_video_youtube', 1);
?>

<div class="subpage noMarginBottom">
  <div class="container container--xs">
    <div class="subpage__header">
      <div class="breadcrumbs-wrapper">
        <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumbs__link" href="<?php echo get_site_url().'/'; pll_e('produkty'); ?>" itemprop="item">
            <span itemprop="name"><?php pll_e('Produkty - tytuł'); ?></span>
            </a>
            <meta itemprop="position" content="1">
          </li>
          <li class="breadcrumbs__current"><?php the_title(); ?></li>
        </ul>
      </div>

      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>

      <?php if (!empty(get_the_excerpt())) : ?>
        <div class="single-excerpt">
          <?php the_excerpt(); ?>
        </div>
      <?php endif; ?>

    </div>
  </div>

  <div class="single-post-content">
    <div class="container container--xs content content-products largePaddingBottom content-floating">
      <?php 
      
      the_content();

        $moduls = new WP_Query(array(
            'post_type' => 'products',
            'posts_per_page' => -1,
            'post_parent' => get_the_id(),
        ));
        while ($moduls->have_posts()): $moduls->the_post();
        $products_modul_content = get_post_meta(get_the_id(), 'products_modul_content', 1);
        $products_modul_checkbox = get_post_meta(get_the_id(), 'products_modul_checkbox', 1);
      ?>
        <h2><?php the_title(); ?></h2>
        <?php echo $products_modul_content; ?>

        <?php if (!$products_modul_checkbox) : ?>
          <div class="text-center">
              <a href="<?php the_permalink(); ?>" class="btn btn--secondary">
                <?php pll_e('Poznaj szczegółowo funkcjonalności'); ?>
              </a>
          </div>
        <?php endif; ?>

      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    
  </div>



<?php 
  endwhile;
  wp_reset_postdata();
?>


<?php include locate_template('template-parts/footer-tile.php'); ?>
</div>
<?php include locate_template('footer.php'); ?>