<?php include locate_template('header.php'); ?>

<?php 
  while( have_posts() ) : the_post();
  $expert_position = get_post_meta(get_the_id(), 'experts_taxonomy_position', 1);
?>

<div class="subpage subpage--lg noMarginBottom">
  <div class="container container--xs">

    <div class="subpage__header"> 
        <div class="breadcrumbs-wrapper">
          <ul class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
              <a class="breadcrumbs__link" href="<?php echo get_site_url().'/'; pll_e('branze/produkcja'); ?>" itemprop="item">
                <span itemprop="name"><?php pll_e('Branże - tytuł'); ?></span>
              </a>
              <meta itemprop="position" content="1">
            </li>
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
              <a class="breadcrumbs__link" href="<?php echo get_the_permalink( $post->post_parent ); ?>" itemprop="item">
                <span itemprop="name"><?php echo get_the_title( $post->post_parent ); ?></span>
              </a>
              <meta itemprop="position" content="2">
            </li>
            <li class="breadcrumbs__current"><?php the_title(); ?></li>
          </ul>
        </div>
        <h1 class="title title--left"><?php echo get_the_title(); ?></h1>

    </div>
  </div>

  <div class="subpage__content content content-default content--normal-font-size">
    <div class="container container--xs">
      <?php the_content(); ?>

      <div class="single-post__nav nav-flex-wrap smallPaddingTop">
        <a href="<?php echo get_site_url().'/'; pll_e('produkty'); ?>" class="btn btn--secondary btn--lg">
          <?php pll_e('Poznaj nasze systemy'); ?>
        </a>
        <a href="<?php echo get_permalink(wp_get_post_parent_id(get_the_id())); ?>#positions-<?php echo wp_get_post_parent_id(get_the_id()); ?>" class="btn btn--secondary btn--lg">
          <?php pll_e('Poznaj inne perspektywy'); ?>
        </a>
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