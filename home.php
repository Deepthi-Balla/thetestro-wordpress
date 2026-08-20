<?php
/**
 * Blog posts index (page_for_posts).
 *
 * @package TestRo
 */

get_header();
?>
<div class="testro-page-shell testro-page-shell--blog">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Test Automation Blog for QA Professionals', 'testro' ),
			'breadcrumbs' => true,
		)
	);
	?>
</div>
<?php
get_footer();
