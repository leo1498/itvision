<?php include locate_template('header.php'); ?>

<div class="subpage">
  <div class="container container--xs">

  <?php if ( have_posts() ) : ?>
    <h1 class="title title--left">
		<?php pll_e('Wyniki wyszukiwania'); ?>: "<strong><?php echo get_search_query(); ?></strong>"
	</h1>

	<section class="news search-tile">
		<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</section>

</div>
<?php include locate_template('template-parts/footer-tile.php'); ?>
<?php include locate_template('footer.php'); ?>
