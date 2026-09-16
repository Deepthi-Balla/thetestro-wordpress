<?php
/**
 * Template Name: Case Studies
 * Description: Case studies hub — Framer /resources/case-studies (QwPeFXHEf).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091
 * Desktop: oXOjZcrjN — Platform Opening hero only (grid stub not in Framer).
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
<div class="testro-page-shell testro-page-shell--case-studies">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'theTestRo Case Studies', 'testro' ),
			'actions'     => $hero_actions,
			'breadcrumbs' => false,
		)
	);
	?>
</div>
<?php
get_footer();
