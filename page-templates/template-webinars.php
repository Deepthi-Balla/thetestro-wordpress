<?php
/**
 * Template Name: Webinars
 * Description: Live and on-demand webinars hub for Explore & Learn.
 *
 * @package TestRo
 */

get_header();

$data      = function_exists( 'testro_get_webinars' ) ? testro_get_webinars() : array();
$upcoming  = isset( $data['upcoming'] ) && is_array( $data['upcoming'] ) ? $data['upcoming'] : array();
$on_demand = isset( $data['on_demand'] ) && is_array( $data['on_demand'] ) ? $data['on_demand'] : array();
$topics    = isset( $data['topics'] ) && is_array( $data['topics'] ) ? $data['topics'] : array();

$webinar_actions = array(
	array(
		'label' => __( 'View On-Demand', 'testro' ),
		'style' => 'primary',
		'href'  => '#past-webinars',
	),
	array(
		'label' => __( 'Register Interest', 'testro' ),
		'style' => 'outline',
		'modal' => 'demo-modal',
		'icon'  => 'arrow-right',
	),
);
?>
<div class="testro-page-shell testro-page-shell--webinars">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'eyebrow'     => isset( $data['eyebrow'] ) ? $data['eyebrow'] : __( 'Explore & Learn', 'testro' ),
			'title'       => isset( $data['title'] ) ? $data['title'] : __( 'Webinars', 'testro' ),
			'subtitle'    => isset( $data['intro'] ) ? $data['intro'] : __( 'Catch us interacting live or view recorded conversations—all around modern test automation.', 'testro' ),
			'badges'      => array(
				__( 'Live Sessions', 'testro' ),
				__( 'On Demand', 'testro' ),
				__( 'AI Testing', 'testro' ),
				__( 'QA Strategy', 'testro' ),
			),
			'actions'     => $webinar_actions,
			'breadcrumbs' => true,
		)
	);

	if ( $upcoming ) {
		get_template_part(
			'template-parts/sections/webinars',
			null,
			array(
				'id'      => 'upcoming-webinars',
				'eyebrow' => __( 'Coming Up', 'testro' ),
				'title'   => __( 'Upcoming Webinars', 'testro' ),
				'intro'   => __( 'Register your interest to join upcoming live conversations with theTestRo team.', 'testro' ),
				'items'   => $upcoming,
			)
		);
	}

	if ( $on_demand ) {
		get_template_part(
			'template-parts/sections/webinars',
			null,
			array(
				'id'      => 'past-webinars',
				'eyebrow' => __( 'Watch Anytime', 'testro' ),
				'title'   => __( 'Past Webinars', 'testro' ),
				'intro'   => __( 'Explore on-demand sessions and product walkthroughs covering AI-powered, no-code test automation.', 'testro' ),
				'items'   => $on_demand,
			)
		);
	}

	if ( $topics ) {
		get_template_part(
			'template-parts/product/feature-grid',
			null,
			array(
				'id'      => 'webinar-topics',
				'variant' => 'tint',
				'columns' => 4,
				'eyebrow' => __( 'What You’ll Learn', 'testro' ),
				'title'   => __( 'Topics We Cover', 'testro' ),
				'intro'   => __( 'Sessions are designed for QA professionals, engineering leaders, and teams modernizing software testing.', 'testro' ),
				'items'   => $topics,
			)
		);
	}

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'         => 'webinars-final-cta',
			'title'      => __( 'Want a Live Walkthrough for Your Team?', 'testro' ),
			'intro'      => __( 'Book a demo to see how theTestRo helps teams automate testing faster with AI-powered, no-code automation.', 'testro' ),
			'actions'    => array(
				array(
					'label' => __( 'Book a Demo', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Read the Blog', 'testro' ),
					'style' => 'outline',
					'href'  => function_exists( 'testro_nav_url' ) ? testro_nav_url( 'blog' ) : home_url( '/blog/' ),
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
