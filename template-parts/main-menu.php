<header class="header">
   <div class="container">
      <div class="header__wrapper">
         <a href="<?php echo pll_home_url(); ?>" class="logo logo--header">
            <?php echo getSvgContent(locate_template('dist/img/logo.svg')); ?>
         </a>

         <div class="menu">
            <nav>
               <?php
               wp_nav_menu( array(
                  'theme_location' => 'menu-main',
                  'container' => false,
                  'container_id'    => '',
                  'menu_id'         => '',
                  'menu_class'     => 'menu__nav'
               ));
               ?>
            </nav>
            <ul class="menu__lang">
               <?php
               if( function_exists('pll_current_language') ) {
                  pll_the_languages(array('display_names_as' => 'slug'));
               }
               ?>
            </ul>
         </div>

         <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
         </button>
      </div>
   </div>
</header>