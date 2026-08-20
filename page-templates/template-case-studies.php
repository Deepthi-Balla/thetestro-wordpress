<?php
/**
 * Template Name: Case Studies
 * Description: Case studies hub.
 *
 * @package TestRo
 */

get_header();
?>
<div class="testro-page-shell testro-page-shell--case-studies">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'theTestRo Case Studies', 'testro' ),
			'breadcrumbs' => true,
		)
	);
	?>
</div>
<?php
get_footer();
