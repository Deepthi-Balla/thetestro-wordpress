<?php
/**
 * Blog posts index (page_for_posts).
 *
 * Framer source (read-only): Qc7jNmQghS7yjIB35091 /resources/blog (j02lKvtem).
 * Desktop: gKVcUdVZz — Platform Opening hero only (listing stub not in Framer).
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
<div class="testro-page-shell testro-page-shell--blog">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Test Automation Blog for QA Professionals', 'testro' ),
			'actions'     => $hero_actions,
			'breadcrumbs' => false,
		)
	);
	?>
</div>
<?php
get_footer();
