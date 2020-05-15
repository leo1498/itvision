</main>
<footer class="footer">
   
   <?php
      if (!is_front_page()) include locate_template('template-parts/slider-partners.php');
   ?>
   <div class="container">
      <div class="footer__wrapper">
         <div class="footer__info">
            <div class="logo">
               <?php echo getSvgContent(locate_template('dist/img/logo.svg')); ?>
            </div>
            <div class="footer__nav">
               <?php
               wp_nav_menu( array(
                  'theme_location' => 'menu-main',
                  'container' => false,
                  'container_id'    => '',
                  'menu_id'         => '',
                  'menu_class'     => 'footer__nav--menu'
               ));
               ?>
               <ul class="footer__nav--social">
                  <li><a href="https://vimeo.com/itvisionpl" target="_blank" class="social-sprite social-sprite--vimeo"></a></li>
                  <li><a href="https://www.linkedin.com/company/it-vision_2/" target="_blank" class="social-sprite social-sprite--in"></a></li>
                  <li><a href="https://www.facebook.com/ITVisionPL/" target="_blank" class="social-sprite social-sprite--facebook"></a></li>
               </ul>
            </div>
         </div>

         <?php $pagePrivacy = get_pages(array( 'meta_value' => 'templates/template-privacy.php' ))[0]; ?>
         <div class="footer__copyright">
            <span><?php pll_e('IT Vision© 2019 Wszystkie prawa zastrzeżone'); ?></span>
            <a href="<?php echo get_the_permalink($pagePrivacy->ID); ?>" class="link-privacy"><?php echo get_the_title($pagePrivacy->ID); ?></a>
            <div class="copyright"><?php pll_e('Created by'); ?> <a href="https://www.yoho.pl/" target="_blank">YOHO</a></div>
         </div>
      </div>
   </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
