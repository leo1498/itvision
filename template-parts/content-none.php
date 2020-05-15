<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itvision
 */

?>

	<h1 class="page-title"><?php pll_e( 'Nic nie znaleziono'); ?></h1>

	<div class="page-content no-search-found">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'itvision' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p>
				<?php pll_e('Przepraszamy, ale nic nie pasowało do wyszukiwanych haseł. Spróbuj ponownie, używając kilku różnych słów kluczowych.'); ?>
			</p>
			<?php
			get_search_form();

		else :
			?>

			<h2>
				<?php pll_e('Wygląda na to, że nie możemy znaleźć tego, czego szukasz. Być może wyszukiwanie może pomóc.'); ?>
			</h2>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
