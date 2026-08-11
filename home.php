<?php
/**
 * Blog posts index (page_for_posts).
 *
 * @package TestRo
 */

get_header();

$blog_actions = array(
	array(
		'label' => __( 'Browse Articles', 'testro' ),
		'style' => 'primary',
		'href'  => '#latest-blogs',
	),
	array(
		'label' => __( 'Get a Demo', 'testro' ),
		'style' => 'outline',
		'modal' => 'demo-modal',
		'icon'  => 'arrow-right',
	),
);
?>
<div class="testro-page-shell testro-page-shell--blog">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => __( 'Explore & Learn', 'testro' ),
			'title'       => __( 'Test Automation Blog for QA Professionals', 'testro' ),
			'subtitle'    => __( 'Ideas, stories, and strategies powering faster, smarter test automation—built for QA, engineering, and product teams.', 'testro' ),
			'badges'      => array(
				__( 'AI Testing', 'testro' ),
				__( 'No-Code Automation', 'testro' ),
				__( 'QA Best Practices', 'testro' ),
				__( 'Product Insights', 'testro' ),
			),
			'actions'     => $blog_actions,
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/sections/blog-listing',
		null,
		array(
			'show_featured' => true,
			'eyebrow'       => __( 'Latest Articles', 'testro' ),
			'title'         => __( 'Latest Blogs', 'testro' ),
			'intro'         => __( 'Stay current on AI-powered testing, no-code automation, CI/CD quality, and enterprise QA strategy.', 'testro' ),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'blog-final-cta',
			'title'      => __( 'Ready to Put These Ideas Into Practice?', 'testro' ),
			'intro'      => __( 'See how theTestRo helps QA professionals automate testing faster with AI-powered, no-code automation built for modern software delivery.', 'testro' ),
			'actions'    => array(
				array(
					'label' => __( 'Get a Demo', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Explore Case Studies', 'testro' ),
					'style' => 'outline',
					'href'  => function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'case-studies' ) : home_url( '/case-studies/' ),
					'icon'  => 'arrow-right',
				),
			),
			'assurances' => array(
				__( 'No credit card required', 'testro' ),
				__( 'Cancel anytime', 'testro' ),
				__( 'Setup in minutes', 'testro' ),
			),
		)
	);
	?>
</div>
<?php
get_footer();
