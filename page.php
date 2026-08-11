<?php
/**
 * Default page template.
 *
 * @package TestRo
 */

get_header();
?>

<div class="testro-container testro-inner">
	<?php testro_the_breadcrumbs(); ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'testro-entry testro-page' ); ?>>
			<header class="testro-entry__header">
				<h1 class="testro-entry__title"><?php the_title(); ?></h1>
			</header>
			<div class="testro-entry__content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
