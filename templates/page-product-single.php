<?php include locate_template('header.php');?>

<?php
  while( have_posts() ) : the_post();
  $products_00_group = get_post_meta(get_the_id(), 'products_00_group', 1);
?>

<div class="subpage noMarginBottom">
  <div class="container container--xs">
    <div class="subpage__header">
      <div class="breadcrumbs-wrapper">
        <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumbs__link" href="<?php echo get_site_url().'/'; pll_e('produkty'); ?>" itemprop="item">
              <span itemprop="name"><?php echo get_the_title(get_page_by_path('produkty')); ?></span>
            </a>
            <meta itemprop="position" content="1">
          </li>

          <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
            <a class="breadcrumbs__link" href="<?php echo get_the_permalink( wp_get_post_parent_id($post->post->ID ));?>" itemprop="item">
              <span itemprop="name"><?php echo get_the_title( wp_get_post_parent_id($post->post->ID )); ?></span>
            </a>
            <meta itemprop="position" content="2">
          </li>
          
          <li class="breadcrumbs__current"><?php the_title(); ?></li>
        </ul>
      </div>
    
      <h1 class="title title--left"><?php echo get_the_title(); ?></h1>

    </div>
  </div>

  <div class="single-post-content">
    <div class="container container--xs content">
      <?php the_content(); ?>


      <div class="accordion accordion--simple normalPaddingBottom">
        <?php 
          if (is_array($products_00_group) || is_object($products_00_group)) :
          foreach ($products_00_group as $modul) : 
        ?>
          <div class="accordion__item">
            <div class="accordion__tab js-tab">
              <h3 class="title title--left"><?php echo $modul['title']; ?></h3>
            </div>
            <div class="accordion__tab-content">
              <div class="accordion__content">
                <?php echo $modul['text']; ?>
              </div>
            </div>
          </div>
        <?php 
          endforeach; 
          endif; 
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