<?php
/**
 * Template Name: Thank You Page
 * Description: Post-form confirmation page for contact, demo, and newsletter.
 *
 * @package TestRo
 */

get_header();
?>

<div class="testro-container testro-inner testro-thank-you">
	<?php testro_the_breadcrumbs(); ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'testro-entry testro-thank-you-page' ); ?>>
			<header class="testro-entry__header">
				<h1 class="testro-entry__title"><?php the_title(); ?></h1>
			</header>
			<div class="testro-entry__content">
				<?php the_content(); ?>
			</div>
			<p class="testro-thank-you__actions">
				<a class="testro-btn testro-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php esc_html_e( 'Back to Home', 'testro' ); ?>
				</a>
			</p>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
