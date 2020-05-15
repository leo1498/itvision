<?php
    $experts_name = get_post_meta(get_the_id(), 'experts_taxonomy_name', 1);
    $experts_position = get_post_meta(get_the_id(), 'experts_taxonomy_position', 1);
?>
<div class="experts-slider__person">
    <div class="experts-slider__person--content">
        <div class="experts-slider__person--image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_id(), 'avatar'); ?>);"></div>
        <div class="experts-slider__person--info">
        <span><?php echo $experts_name; ?></span>
        <span><?php echo $experts_position; ?></span>
        </div>
        <p class="experts-slider__person--text personText"><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>
    </div>
    <a href="<?php the_permalink(); ?>" class="btn btn--no-bg btn--md btn--icon more-info">
        <?php pll_e('Więcej'); ?> <i class="icon-plus"></i>
    </a>
</div>