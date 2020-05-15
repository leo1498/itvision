<?php 
// our partners
   $our_partners_list = get_post_meta(get_option('page_on_front'), 'our_partners_list', 1);
?>

<div class="our-partners">
   <div class="container">
      <div class="our-partners__wrapper">
         <div class="our-partners__slider partners-slider is-loading" id="partnersSlider">
         <?php foreach ($our_partners_list as $partner): ?>
            <div class="partners-slider__item">
               <img src="<?php echo $partner; ?>" alt="">
            </div>
         <?php endforeach; ?>
         </div>

         <span class="partners-slider--nav arrow arrow--prev"></span>
         <span class="partners-slider--nav arrow arrow--next"></span>
      </div>
   </div>
</div>