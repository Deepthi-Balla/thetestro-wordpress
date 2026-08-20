<?php
/**
 * Template Name: Webinars
 * Description: Webinars hub.
 *
 * @package TestRo
 */

get_header();
?>
<div class="testro-page-shell testro-page-shell--webinars">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Webinars', 'testro' ),
			'breadcrumbs' => true,
		)
	);
	?>
</div>
<?php
get_footer();
