<?php
/**
 * Template Name: Webinars
 * Description: Webinars hub — Framer /resources/webinars (lGPifkytr).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Desktop: X2wUEHmzn — Platform Opening hero only (grid stub not in Framer).
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
?>
<div class="testro-page-shell testro-page-shell--webinars">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Webinars', 'testro' ),
			'actions'     => $hero_actions,
			'breadcrumbs' => false,
		)
	);
	?>
</div>
<?php
get_footer();
