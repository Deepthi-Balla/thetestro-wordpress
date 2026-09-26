<?php
/**
 * Template Name: Compare Tools
 * Description: Compare theTestRo with leading test automation platforms.
 *
 * Framer source (read-only): bmVfIHEsEUn1XW77pAQ8 / Qc7jNmQghS7yjIB35091
 * Page: /why-thetestro/thetestro-vs-alternatives (s7B3lhYVO / Desktop oxvAGnHR1)
 *
 * Section order (skip Navigation): Platform Opening → Trusted Logos Row One →
 * Compare cards → What Teams Gain (exec-split + QI numbered rows) → Why Teams Switch → FAQ → Final CTA.
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

$compare_img = TESTRO_URI . '/assets/images/compare/';

$competitors = array(
	array(
		'slug'  => 'selenium',
		'logo'  => 'selenium.png',
		'title' => __( 'theTestRo vs. Selenium', 'testro' ),
	),
	array(
		'slug'  => 'browserstack',
		'logo'  => 'browserstack.png',
		'title' => __( 'theTestRo vs. BrowserStack', 'testro' ),
	),
	array(
		'slug'  => 'appium',
		'logo'  => 'appium.png',
		'title' => __( 'theTestRo vs. Appium', 'testro' ),
	),
	array(
		'slug'  => 'playwright',
		'logo'  => 'playwright.png',
		'title' => __( 'theTestRo vs. Playwright', 'testro' ),
	),
	array(
		'slug'  => 'katalon',
		'logo'  => 'katalon.png',
		'title' => __( 'theTestRo vs. Katalon', 'testro' ),
	),
);

/*
 * Hero: Start Free Trial (primary).
 * Final CTA: Secondary then Primary (Try for Free via allow_on_footer; Get a Demo).
 */
$compare_hero_actions = array(
	array(
		'label'      => __( 'Start Free Trial', 'testro' ),
		'style'      => 'primary',
		'modal'      => 'demo-modal',
		'with_arrow' => false,
	),
);

$compare_cta_actions = array(
	array(
		'label'           => __( 'Try for Free', 'testro' ),
		'style'           => 'secondary',
		'modal'           => 'demo-modal',
		'with_arrow'      => false,
		'allow_on_footer' => true,
	),
	array(
		'label' => __( 'Get a Demo', 'testro' ),
		'style' => 'primary',
		'modal' => 'demo-modal',
	),
);
?>
<div class="testro-page-shell testro-page-shell--compare">
	<?php
	/* Framer kzSMcb2S7 — split Platform Opening; checklist in the lead; no breadcrumbs. */
	get_template_part(
		'template-parts/product/hero',
		null,
		array(
			'layout'      => 'split',
			'visual'      => 'ai-capability-canvas',
			'title'       => __( 'theTestRo vs Test Automation Alternatives', 'testro' ),
			'subtitle'    => __( "Find out how theTestRo's AI-powered approach compares to other test automation tools on speed, ease of use, and everyday reliability.", 'testro' ),
			'badges'      => array(
				__( 'Build tests in plain English, no scripting required', 'testro' ),
				__( 'Run tests across thousands of real browsers and devices', 'testro' ),
				__( 'One platform for web, mobile, API, and enterprise app testing', 'testro' ),
			),
			'actions'     => $compare_hero_actions,
			'breadcrumbs' => false,
		)
	);

	/* Framer sjIlFkE1_ — Trusted Logos Row One. */
	get_template_part(
		'template-parts/sections/why-trusted-reviews',
		null,
		array(
			'id' => 'compare-trusted-reviews',
		)
	);
	?>

	<?php /* Framer qLfCpNgjy — comparison cards on #F4F9FF. Logo pair is unique to this hub. */ ?>
	<section class="testro-compare-tools" id="compare-platforms" aria-labelledby="compare-platforms-heading">
		<div class="testro-container testro-compare-tools__inner">
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => __( 'Compare theTestRo to Other Tools', 'testro' ),
					'intro'         => __( 'Each comparison breaks down setup time, scripting requirements, maintenance effort, and total cost of ownership, so you can see exactly where the differences show up in day-to-day use.', 'testro' ),
					'heading_id'    => 'compare-platforms-heading',
					'heading_level' => 2,
					'align'         => 'start',
				)
			);
			?>
			<ul class="testro-compare-tools__grid">
				<?php foreach ( $competitors as $competitor ) : ?>
					<?php
					$href = $resolve_compare_url( $competitor['slug'] );
					?>
					<li class="testro-compare-tools__card">
						<span class="testro-compare-tools__accent" aria-hidden="true"></span>
						<a class="testro-compare-tools__link" href="<?php echo esc_url( $href ); ?>">
							<span class="testro-compare-tools__logos">
								<img
									class="testro-compare-tools__logo testro-compare-tools__logo--testro"
									src="<?php echo esc_url( $compare_img . 'testro-mark.png' ); ?>"
									alt="<?php esc_attr_e( 'theTestRo', 'testro' ); ?>"
									width="67"
									height="67"
									loading="lazy"
									decoding="async"
								/>
								<span class="testro-compare-tools__vs"><?php esc_html_e( 'VS', 'testro' ); ?></span>
								<img
									class="testro-compare-tools__logo testro-compare-tools__logo--competitor"
									src="<?php echo esc_url( $compare_img . $competitor['logo'] ); ?>"
									alt=""
									width="50"
									height="56"
									loading="lazy"
									decoding="async"
								/>
							</span>
							<h3 class="testro-compare-tools__title"><?php echo esc_html( $competitor['title'] ); ?></h3>
							<span class="testro-compare-tools__cta"><?php esc_html_e( 'See the comparison →', 'testro' ); ?></span>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>

	<?php
	/* Framer cBYVoFe2I — exec-split; QI numbered rows (AI Quality Intelligence left rail). */
	get_template_part(
		'template-parts/product/bf-compose',
		null,
		array(
			'id'            => 'what-teams-gain',
			'variant'       => 'exec-split',
			'white'         => true,
			'steps_style'   => 'numbered-rows',
			'title'         => __( 'What Teams Gain With theTestRo', 'testro' ),
			'intro'         => __( 'Real Outcomes, Not Just Feature Checklists', 'testro' ),
			'heading_level' => 2,
			'items'         => array(
				array(
					'title'       => __( 'Faster Test Creation', 'testro' ),
					'description' => __( 'Teams cut the time it takes to build a working test significantly compared to hand-scripted tools.', 'testro' ),
				),
				array(
					'title'       => __( 'Less Maintenance', 'testro' ),
					'description' => __( 'Self-healing tests mean fewer hours lost to patching broken scripts after every release.', 'testro' ),
				),
				array(
					'title'       => __( 'Broader Team Participation', 'testro' ),
					'description' => __( 'QA staff without a coding background contribute real coverage, not just engineers.', 'testro' ),
				),
				array(
					'title'       => __( 'Faster Regression Cycles', 'testro' ),
					'description' => __( 'Parallel execution turns a multi-hour regression run into something that finishes in minutes.', 'testro' ),
				),
			),
		)
	);
	?>

	<?php /* Framer fI10jA9iU — centered title + supporting text on #F4F9FF. */ ?>
	<section class="testro-compare-switch" id="why-teams-switch" aria-labelledby="why-teams-switch-heading">
		<div class="testro-container testro-compare-switch__inner">
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => __( 'Why Teams Switch to theTestRo', 'testro' ),
					'intro'         => __( 'Teams moving off custom frameworks or older automation tools consistently point to the same few reasons: less time spent on setup, less time spent on maintenance, and more of the team able to contribute to testing, not just a couple of automation specialists.', 'testro' ),
					'heading_id'    => 'why-teams-switch-heading',
					'heading_level' => 2,
					'align'         => 'center',
				)
			);
			?>
		</div>
	</section>

	<?php
	get_template_part(
		'template-parts/sections/faq',
		null,
		array(
			'title'         => __( 'Frequently Asked Questions', 'testro' ),
			'intro'         => '',
			'heading_level' => 2,
			'faqs'          => 'compare-tools',
		)
	);

	/*
	 * Framer OQLF7pwWn — brand Final CTA.
	 * Empty title so intro is the primary heading (matches why/partners CTA pattern).
	 * Framer “Get Started” is the section intent; primary line is the Want… question.
	 */
	get_template_part(
		'template-parts/product/cta',
		null,
		array(
			'id'            => 'compare-get-started',
			'variant'       => 'brand',
			'title'         => '',
			'intro'         => __( 'Want an All-in-One Platform to Run Your Tests?', 'testro' ),
			'body'          => __( 'See for yourself how theTestRo compares. Start testing in minutes, no setup required.', 'testro' ),
			'note'          => __( '14-day full access trial  ·  No credit card required', 'testro' ),
			'heading_level' => 2,
			'actions'       => $compare_cta_actions,
		)
	);
	?>
</div>
<?php
get_footer();
