<?php 
// footer tiles
$footer_tiles_group = get_post_meta(get_option('page_on_front'), 'footer_tiles_group', 1);
?>
<div class="icon-tiles icon-tiles--footer">
  <div class="container">
    <div class="icon-tiles__wrapper">
    <?php foreach ($footer_tiles_group as $tile): 
      if (!empty($tile['href'])) {
        $href = '<a href="'.get_site_url().'/'. $tile['href'] .'" class="icon-tiles__item">';
      } 
      if (!empty($tile['phone'])) {
        $href = '<a href="tel:'. $tile['phone'] .'" class="icon-tiles__item">';
      }
      if (empty($tile['phone']) && empty($tile['href'])) {
        $href = '<a href="#newsletter" class="icon-tiles__item newsletter-box" id="newsletterBtn">';
      }
    ?>
        <?php echo $href; ?>
        <img src="<?php echo $tile['image']; ?>" alt="">
        <h3><?php echo $tile['title']; ?></h3>
      </a>
    <?php endforeach; ?>
    </div>
    
  </div>
</div>

<?php
  $pageNewsletter = get_pages(array( 'meta_value' => 'templates/template-newsletter.php' ))[0];
  if (!is_page_template(get_page_template_slug($pageNewsletter->ID))) :
?>
  <div class="newsletter-subscribe newsletter-section" id="newsletter">
    <div class="container container--xs">
      <?php echo do_shortcode('[newsletter]'); ?>
    </div>
  </div>
<?php endif; ?>