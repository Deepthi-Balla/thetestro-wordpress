<?php
/**
 * Archive template (categories, tags, dates).
 *
 * @package TestRo
 */

get_header();

$archive_title = get_the_archive_title();
$archive_desc  = get_the_archive_description();
?>
<div class="testro-page-shell testro-page-shell--blog">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => __( 'Explore & Learn', 'testro' ),
			'title'       => wp_strip_all_tags( $archive_title ),
			'subtitle'    => $archive_desc
				? wp_strip_all_tags( $archive_desc )
				: __( 'Browse test automation articles curated for QA professionals.', 'testro' ),
			'actions'     => array(
				array(
					'label' => __( 'View All Posts', 'testro' ),
					'style' => 'primary',
					'href'  => function_exists( 'testro_nav_url' ) ? testro_nav_url( 'blog' ) : home_url( '/blog/' ),
				),
				array(
					'label' => __( 'Get a Demo', 'testro' ),
					'style' => 'outline',
					'modal' => 'demo-modal',
					'icon'  => 'arrow-right',
				),
			),
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/sections/blog-listing',
		null,
		array(
			'show_featured' => false,
			'eyebrow'       => __( 'Articles', 'testro' ),
			'title'         => __( 'In This Archive', 'testro' ),
			'intro'         => '',
		)
	);
	?>
</div>
<?php
get_footer();
