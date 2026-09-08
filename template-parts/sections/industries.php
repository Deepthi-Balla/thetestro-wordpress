<?php
/**
 * Solutions by Industry — Framer card grid.
 *
 * @package TestRo
 */

$items = array(
	array(
		'label'       => __( 'Retail & E-commerce', 'testro' ),
		'description' => __( 'Test checkout and payments, even under heavy load.', 'testro' ),
		'href'        => testro_nav_url( 'retail-ecommerce' ),
		'icon'        => 'retail',
	),
	array(
		'label'       => __( 'Healthcare', 'testro' ),
		'description' => __( 'Test patient portals. Meet every rule, every time.', 'testro' ),
		'href'        => testro_nav_url( 'healthcare' ),
		'icon'        => 'health',
	),
	array(
		'label'       => __( 'Banking & Finance', 'testro' ),
		'description' => __( 'Run safe, secure tests for strict systems.', 'testro' ),
		'href'        => testro_nav_url( 'banking-finance' ),
		'icon'        => 'bank',
	),
	array(
		'label'       => __( 'Travel & Hospitality', 'testro' ),
		'description' => __( 'Test bookings and check-ins, even during peak season.', 'testro' ),
		'href'        => testro_nav_url( 'travel-and-hospitality' ),
		'icon'        => 'travel',
	),
	array(
		'label'       => __( 'Insurance', 'testro' ),
		'description' => __( 'Test claims and policies. Keep every payout accurate.', 'testro' ),
		'href'        => testro_nav_url( 'insurance' ),
		'icon'        => 'insurance',
	),
);
?>
<section class="testro-industries testro-industries--framer" id="industries" aria-labelledby="industries-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-industries__header">
			<p class="testro-section-eyebrow"><?php esc_html_e( 'SOLUTIONS BY INDUSTRY', 'testro' ); ?></p>
			<h2 id="industries-heading" class="main-headings"><?php esc_html_e( 'Built for your industry.', 'testro' ); ?></h2>
			<p class="sub-text testro-industries__headline">
				<?php esc_html_e( 'theTestRo adapts to the workflows, constraints, and release pace of the teams who can’t afford a broken experience.', 'testro' ); ?>
			</p>
		</header>

		<ul class="testro-industries__grid testro-industries__grid--framer">
			<?php foreach ( $items as $item ) : ?>
				<li>
					<a class="testro-industries__card testro-industries__card--framer" href="<?php echo esc_url( $item['href'] ); ?>">
						<span class="testro-industries__accent" aria-hidden="true"></span>
						<span class="testro-industries__icon" aria-hidden="true">
							<?php echo testro_nav_icon( $item['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="testro-industries__body">
							<strong class="testro-industries__label"><?php echo esc_html( $item['label'] ); ?></strong>
							<span class="testro-industries__desc"><?php echo esc_html( $item['description'] ); ?></span>
						</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
