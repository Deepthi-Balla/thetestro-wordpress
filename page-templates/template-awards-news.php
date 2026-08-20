<?php
/**
 * Template Name: Awards & News
 * Description: Awards & News hub.
 *
 * @package TestRo
 */

get_header();
?>
<div class="testro-page-shell testro-page-shell--awards-news">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'Awards & News - theTestRo', 'testro' ),
			'subtitle'    => __( "See where theTestRo is recognized, and stay current on what's new.", 'testro' ),
			'breadcrumbs' => true,
		)
	);
	?>
</div>
<?php
get_footer();
