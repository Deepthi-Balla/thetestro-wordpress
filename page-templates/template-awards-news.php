<?php
/**
 * Template Name: Awards & News
 * Description: Awards & News hub — Framer /why-thetestro/awards-news (NzGGDeaMl).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Desktop: po6BYVrXd — Platform Opening hero + v7e5ac08I brand Final CTA.
 *
 * @package TestRo
 */

get_header();

$hero_actions = array(
	array(
		'label'         => __( 'Get Custom Pricing', 'testro' ),
		'style'         => 'primary',
		'modal'         => 'demo-modal',
		'with_arrow'    => false,
		'allow_on_hero' => true,
	),
);

$cta_actions = array(
	array(
		'label'           => __( 'Start Testing Free', 'testro' ),
		'style'           => 'secondary',
		'modal'           => 'demo-modal',
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
	array(
		'label'           => __( 'Book a Demo', 'testro' ),
		'style'           => 'primary',
		'modal'           => 'demo-modal',
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
);
?>
<div class="testro-page-shell testro-page-shell--awards-news">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Awards & News - theTestRo', 'testro' ),
			'subtitle'    => __( "See where theTestRo is recognized, and stay current on what's new.", 'testro' ),
			'actions'     => $hero_actions,
			'breadcrumbs' => false,
		)
	);

	/*
	 * Framer v7e5ac08I — brand Final CTA (stub copy repeated in eyebrow, heading, body).
	 * 14-day note hidden in Framer.
	 */
	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'awards-news-cta',
			'variant'       => 'brand',
			'title'         => __( 'Awards & News - theTestRo', 'testro' ),
			'intro'         => __( 'Awards & News - theTestRo', 'testro' ),
			'body'          => __( 'Awards & News - theTestRo', 'testro' ),
			'heading_level' => 2,
			'actions'       => $cta_actions,
		)
	);
	?>
</div>
<?php
get_footer();
