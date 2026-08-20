<?php
/**
 * Template Name: Compare Tools
 * Description: Compare theTestRo with leading test automation platforms.
 *
 * @package TestRo
 */

get_header();

/**
 * Resolve a competitor comparison URL when a dedicated page exists at
 * `/thetestro-vs-{competitor}/`; otherwise link to this hub without inventing routes.
 *
 * @param string $competitor Competitor slug fragment (e.g. browserstack).
 * @return string
 */
$resolve_compare_url = static function ( $competitor ) {
	$competitor = sanitize_title( $competitor );
	$slug       = 'thetestro-vs-' . $competitor;
	$page       = get_page_by_path( $slug );

	if ( $page instanceof WP_Post ) {
		return get_permalink( $page );
	}

	return function_exists( 'testro_get_page_url' )
		? testro_get_page_url( 'compare-test-automation-tools' )
		: home_url( '/compare-test-automation-tools/' );
};

$competitors = array(
	array(
		'slug'  => 'selenium',
		'icon'  => 'code',
		'title' => __( 'theTestRo vs. Selenium', 'testro' ),
	),
	array(
		'slug'  => 'browserstack',
		'icon'  => 'browsers',
		'title' => __( 'theTestRo vs. BrowserStack', 'testro' ),
	),
	array(
		'slug'  => 'appium',
		'icon'  => 'smartphone',
		'title' => __( 'theTestRo vs. Appium', 'testro' ),
	),
	array(
		'slug'  => 'playwright',
		'icon'  => 'code',
		'title' => __( 'theTestRo vs. Playwright', 'testro' ),
	),
	array(
		'slug'  => 'katalon',
		'icon'  => 'layout-grid',
		'title' => __( 'theTestRo vs. Katalon', 'testro' ),
	),
);

$competitor_items = array();
foreach ( $competitors as $competitor ) {
	$competitor_items[] = array(
		'id'    => 'compare-' . $competitor['slug'],
		'icon'  => $competitor['icon'],
		'title' => $competitor['title'],
		'cta'   => array(
			'label' => $competitor['title'],
			'href'  => $resolve_compare_url( $competitor['slug'] ),
		),
	);
}
?>
<div class="testro-page-shell testro-page-shell--compare">
	<?php
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'title'       => __( 'theTestRo vs Test Automation Alternatives', 'testro' ),
			'subtitle'    => __( "Find out how theTestRo's AI-powered approach compares to other test automation tools on speed, ease of use, and everyday reliability.", 'testro' ),
			'actions'     => array(
				array(
					'label' => __( 'Start Free Trial', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
			),
			'breadcrumbs' => true,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'      => 'compare-hero-benefits',
			'variant' => 'spotlight',
			'columns' => 3,
			'items'   => array(
				array(
					'icon'  => 'pen-square',
					'title' => __( 'Build tests in plain English, no scripting required', 'testro' ),
				),
				array(
					'icon'  => 'browsers',
					'title' => __( 'Run tests across thousands of real browsers and devices', 'testro' ),
				),
				array(
					'icon'  => 'layout-grid',
					'title' => __( 'One platform for web, mobile, API, and enterprise app testing', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'            => 'compare-platforms',
			'variant'       => 'default',
			'columns'       => 3,
			'title'         => __( 'Compare theTestRo to Other Tools', 'testro' ),
			'outro'         => __( 'Each comparison breaks down setup time, scripting requirements, maintenance effort, and total cost of ownership, so you can see exactly where the differences show up in day-to-day use.', 'testro' ),
			'heading_level' => 2,
			'items'         => $competitor_items,
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'            => 'what-teams-gain',
			'variant'       => 'tint',
			'columns'       => 4,
			'title'         => __( 'What Teams Gain With theTestRo', 'testro' ),
			'intro'         => __( 'Real Outcomes, Not Just Feature Checklists', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
				array(
					'icon'        => 'zap',
					'title'       => __( 'Faster Test Creation', 'testro' ),
					'description' => __( 'Teams cut the time it takes to build a working test significantly compared to hand-scripted tools.', 'testro' ),
				),
				array(
					'icon'        => 'wrench',
					'title'       => __( 'Less Maintenance', 'testro' ),
					'description' => __( 'Self-healing tests mean fewer hours lost to patching broken scripts after every release.', 'testro' ),
				),
				array(
					'icon'        => 'user-check',
					'title'       => __( 'Broader Team Participation', 'testro' ),
					'description' => __( 'QA staff without a coding background contribute real coverage, not just engineers.', 'testro' ),
				),
				array(
					'icon'        => 'rocket',
					'title'       => __( 'Faster Regression Cycles', 'testro' ),
					'description' => __( 'Parallel execution turns a multi-hour regression run into something that finishes in minutes.', 'testro' ),
				),
			),
		)
	);

	get_template_part(
		'template-parts/product/feature-grid',
		null,
		array(
			'id'            => 'why-teams-switch',
			'variant'       => 'spotlight',
			'title'         => __( 'Why Teams Switch to theTestRo', 'testro' ),
			'intro'         => __( 'Teams moving off custom frameworks or older automation tools consistently point to the same few reasons: less time spent on setup, less time spent on maintenance, and more of the team able to contribute to testing, not just a couple of automation specialists.', 'testro' ),
			'heading_level' => 3,
			'items'         => array(),
		)
	);

	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'compare-get-started',
			'title'         => __( 'Get Started', 'testro' ),
			'intro'         => __( 'Want an All-in-One Platform to Run Your Tests?', 'testro' ),
			'body'          => __( 'See for yourself how theTestRo compares. Start testing in minutes, no setup required.', 'testro' ),
			'heading_level' => 3,
			'actions'       => array(
				array(
					'label' => __( 'Try for Free', 'testro' ),
					'style' => 'primary',
					'modal' => 'demo-modal',
				),
				array(
					'label' => __( 'Get a Demo', 'testro' ),
					'style' => 'outline',
					'modal' => 'demo-modal',
					'icon'  => 'arrow-right',
				),
			),
		)
	);
	?>
</div>
<?php
get_footer();
