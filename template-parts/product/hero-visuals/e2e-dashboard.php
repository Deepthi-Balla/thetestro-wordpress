<?php
/**
 * End-to-End Testing workflow hero dashboard mockup.
 *
 * Reuses the Integration dashboard layout tokens for visual consistency across
 * use-case pages while presenting E2E-specific journey metrics and layers.
 *
 * @package TestRo
 */

$layers = array(
	array(
		'icon'  => 'user-check',
		'label' => __( 'User', 'testro' ),
		'meta'  => __( 'Journey start', 'testro' ),
	),
	array(
		'icon'  => 'browsers',
		'label' => __( 'Frontend', 'testro' ),
		'meta'  => __( 'Web · mobile UI', 'testro' ),
	),
	array(
		'icon'  => 'layers-api',
		'label' => __( 'API', 'testro' ),
		'meta'  => __( 'Contracts · auth', 'testro' ),
	),
	array(
		'icon'  => 'server',
		'label' => __( 'Business Services', 'testro' ),
		'meta'  => __( 'Domain logic', 'testro' ),
	),
	array(
		'icon'  => 'database',
		'label' => __( 'Database', 'testro' ),
		'meta'  => __( 'Transactions', 'testro' ),
	),
	array(
		'icon'  => 'plug',
		'label' => __( 'Third-Party Systems', 'testro' ),
		'meta'  => __( 'CRM · payments · SSO', 'testro' ),
	),
);
?>
<div
	class="testro-prod-hero-int testro-prod-hero-e2e"
	role="img"
	aria-label="<?php esc_attr_e( 'End-to-end testing dashboard showing user journey status, business workflow validation, AI test execution, cross-system health, API status, release readiness, test coverage and quality score across user, frontend, API, business services, database and third-party systems', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-int__float testro-prod-hero-int__float--exec" aria-hidden="true">
		<span class="testro-prod-hero-int__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-int__float testro-prod-hero-int__float--api" aria-hidden="true">
		<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Cross-System Health', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-int__float testro-prod-hero-int__float--rules" aria-hidden="true">
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-int__panel" aria-hidden="true">
		<div class="testro-prod-hero-int__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-int__chrome-label"><?php esc_html_e( 'User Journey Status', 'testro' ); ?></p>
			<span class="testro-prod-hero-int__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-int__body">
			<div class="testro-prod-hero-int__metrics">
				<article>
					<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Business Workflow Validation', 'testro' ); ?></p>
					<strong>48</strong>
					<em><?php esc_html_e( 'Journeys green', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Test Coverage', 'testro' ); ?></p>
					<strong>97%</strong>
					<em><?php esc_html_e( 'API Status · healthy', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-int__metric--accent">
					<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Quality Score', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Release Readiness', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-int__stack">
				<ul class="testro-prod-hero-int__layers">
					<?php foreach ( $layers as $index => $layer ) : ?>
						<li class="testro-prod-hero-int__layer" style="<?php echo esc_attr( '--i: ' . (int) $index . ';' ); ?>">
							<span class="testro-prod-hero-int__layer-icon">
								<?php echo testro_icon( $layer['icon'], array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<span class="testro-prod-hero-int__layer-copy">
								<strong><?php echo esc_html( $layer['label'] ); ?></strong>
								<em><?php echo esc_html( $layer['meta'] ); ?></em>
							</span>
							<span class="testro-prod-hero-int__layer-status"><?php esc_html_e( 'Pass', 'testro' ); ?></span>
							<?php if ( $index < count( $layers ) - 1 ) : ?>
								<span class="testro-prod-hero-int__connector"></span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="testro-prod-hero-int__side">
					<div class="testro-prod-hero-int__side-card">
						<p class="testro-prod-hero-int__label"><?php esc_html_e( 'E2E Flow Pulse', 'testro' ); ?></p>
						<div class="testro-prod-hero-int__flow">
							<span></span><span></span><span></span><span></span><span></span>
						</div>
						<p class="testro-prod-hero-int__side-meta"><?php esc_html_e( 'User → frontend → API → services → data → partners', 'testro' ); ?></p>
					</div>
					<div class="testro-prod-hero-int__side-card testro-prod-hero-int__side-card--accent">
						<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Journey Coverage', 'testro' ); ?></p>
						<ul class="testro-prod-hero-int__coverage">
							<li>
								<span><?php esc_html_e( 'Web', 'testro' ); ?></span>
								<em>98%</em>
							</li>
							<li>
								<span><?php esc_html_e( 'Mobile', 'testro' ); ?></span>
								<em>95%</em>
							</li>
							<li>
								<span><?php esc_html_e( 'API', 'testro' ); ?></span>
								<em>97%</em>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
