<?php
/**
 * Template Name: Legal Page
 * Description: Terms & Conditions / Privacy Notice layout.
 *
 * @package TestRo
 */

get_header();
?>

<div class="testro-container testro-inner testro-legal">
	<?php testro_the_breadcrumbs(); ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'testro-entry testro-legal-page' ); ?>>
			<header class="testro-entry__header">
				<h1 class="testro-entry__title"><?php the_title(); ?></h1>
				<p class="testro-legal__updated">
					<?php
					printf(
						/* translators: %s: modified date */
						esc_html__( 'Last updated: %s', 'testro' ),
						esc_html( get_the_modified_date() )
					);
					?>
				</p>
			</header>
			<div class="testro-entry__content testro-legal__content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
