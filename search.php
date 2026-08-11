<?php
/**
 * Search results template.
 *
 * @package TestRo
 */

get_header();
?>

<div class="testro-container testro-inner testro-search">
	<?php testro_the_breadcrumbs(); ?>

	<header class="testro-entry__header">
		<h1 class="testro-entry__title">
			<?php
			printf(
				/* translators: %s: search query */
				esc_html__( 'Search results for “%s”', 'testro' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
	</header>

	<?php if ( have_posts() ) : ?>
		<ul class="testro-search-results">
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<li class="testro-search-results__item">
					<article <?php post_class(); ?>>
						<h2 class="testro-search-results__title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="testro-search-results__excerpt">
							<?php the_excerpt(); ?>
						</div>
					</article>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No results matched your search. Try different keywords.', 'testro' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</div>

<?php
get_footer();
