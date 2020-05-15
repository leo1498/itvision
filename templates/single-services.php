<?php include locate_template('header.php');?>

<?php 
  while( have_posts() ) : the_post();
   $thumbnail = get_the_post_thumbnail_url(get_the_id(), 'services-single');
   $services_fact = get_post_meta(get_the_id(), 'services_00_fact', 1);
   $services_download = get_post_meta(get_the_id(), 'services_00_download', 1);
   $services_00_group = get_post_meta(get_the_id(), 'services_00_group', 1);
?>

<div class="subpage">
  <div class="container">
    <h1 class="title title--left"><?php the_title(); ?></h1>

    <div class="services-single">
      <div class="services-single__wrapper">
        <div class="services-single__sidebar">
          <?php if (!empty($services_fact)): ?>
            <div class="services-single__sidebar--fact">
              <span><?php pll_e('Czy wiesz, że'); ?></span>
              <?php echo $services_fact; ?>
            </div>
          <?php endif; ?>
          <div class="services-single__sidebar--thumbnail">
            <img src="<?php echo $thumbnail; ?>" alt="<?php the_title(); ?>">
          </div>
        </div>

        <div class="services-single__content">
          <div class="excerpt">
            <?php the_excerpt(); ?>
          </div>

          <div class="content content--primary">
            <?php the_content(); ?>
          </div>
        </div>
      </div>

    </div>

  </div>

<div class="presentation-section">
  <?php if (!empty($services_download)): ?>
    <a href="<?php echo $services_download; ?>" download class="btn btn--lg btn--secondary tiles--link">
      <?php pll_e('Prezentacja'); ?>
    </a>
  <?php endif; ?>
</div>

<?php if (!empty($services_00_group)): ?>
  <div class="container">
    <div class="statment-section">
      <?php 
        $i = 1;
        foreach ($services_00_group as $item): 
      ?>
        <div class="statment-item">
          <div class="statment-item__text"> 
            <?php echo $item['text']; ?>
          </div>
          <div class="statment-item__footer">
            <span><?php echo $item['text_result']; ?></span>
            <a href="<?php echo $item['url']; ?>" target="_blank" class="btn btn--white btn--outline btn--xs">
              <?php echo $item['btn_text']; ?>
            </a>
          </div>
        </div>
      <?php
        $i++;
        endforeach; 
      ?>
    </div>
  </div>
  <?php endif; ?>

  <div class="container normalPaddingTop">
    <h3 class="h3 text-center"><?php pll_e('Zobacz jak działamy'); ?>:</h3>    
    <div class="services see-more">
      <?php
        $services = new WP_Query(array (
          'post_type' => 'services',
          'orderby' => 'title',
          'order' => 'ASC',
          'post__not_in'  => array(get_the_id()),
          'posts_per_page' => 4,
        ));
        while( $services->have_posts() ) : $services->the_post();
          include locate_template('template-parts/services-tile.php');
        endwhile; 
        wp_reset_query();
      ?>
      </div>
  </div>
</div>

<?php 
  endwhile;
  wp_reset_postdata();
?>

<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>