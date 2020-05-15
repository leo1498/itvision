<?php include locate_template('header.php');?>

<div class="subpage page_404">
  <div class="container container--xs">
    <h1 class="title title--left">
		<?php pll_e('Oops, 404! That page can&rsquo;t be found.' ); ?>
      <span>
        <?php pll_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?'); ?>
      </span>
    </h1>

    <?php get_search_form(); ?> 
    
  </div>

<?php include locate_template('template-parts/footer-tile.php'); ?>
</div>
<?php include locate_template('footer.php'); ?>