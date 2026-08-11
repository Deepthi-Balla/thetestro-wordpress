<?php
/**
 * 404 template.
 *
 * @package TestRo
 */

get_header();
?>

<div class="testro-container testro-inner testro-404">
	<?php testro_the_breadcrumbs(); ?>

	<header class="testro-entry__header">
		<h1 class="testro-entry__title"><?php esc_html_e( 'Page not found', 'testro' ); ?></h1>
		<p><?php esc_html_e( 'Sorry, we couldn’t find that page. Try heading back home or searching below.', 'testro' ); ?></p>
	</header>

	<p>
		<a class="testro-btn testro-btn--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php esc_html_e( 'Back to Home', 'testro' ); ?>
		</a>
	</p>

	<?php get_search_form(); ?>
</div>

<?php
get_footer();
