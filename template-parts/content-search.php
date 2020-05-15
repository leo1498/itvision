<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itvision
 */

?>

<a href="<?php echo get_permalink(); ?>" rel="bookmark" class="news__article-link">
   <article id="post-<?php the_ID(); ?>" class="news__article type-news">
   	  <?php if (get_post_type() !== 'page' && !empty(get_the_post_thumbnail_url())) : ?>
      <div class="news__image" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);"></div>
	  <?php endif; ?>
	  <div class="news__content">
         <div class="news__text">
            <h3 class="news__text--title">
               <?php the_title(); ?>
            </h3>
            <div class="news__text--desc">
               <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
            </div>
         </div>
         <div class="news__footer">
            <span class="news__footer--date">
			<?php if (get_post_type() === 'page') : ?>
               <?php pll_e('Opublikowano'); ?>:&nbsp; 
			   <time datetime="<?php echo get_the_date(); ?>"><?php echo get_the_date(); ?></time>
			<?php endif; ?>
			</span>
            <span class="btn btn--arrow btn--xs btn--no-bg"><?php pll_e('Dowiedz się więcej'); ?></span>
         </div>
      </div>
   </article>
</a>