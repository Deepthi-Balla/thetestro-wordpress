<?php
/**
 * Integration Testing architecture stack hero visual mockup.
 *
 * @package TestRo
 */

$layers = array(
	array(
		'icon'  => 'browsers',
		'label' => __( 'Web App', 'testro' ),
		'meta'  => __( 'UI journeys', 'testro' ),
	),
	array(
		'icon'  => 'layers-api',
		'label' => __( 'API Gateway', 'testro' ),
		'meta'  => __( 'Contracts · auth', 'testro' ),
	),
	array(
		'icon'  => 'server',
		'label' => __( 'Microservices', 'testro' ),
		'meta'  => __( 'Distributed flows', 'testro' ),
	),
	array(
		'icon'  => 'database',
		'label' => __( 'Database', 'testro' ),
		'meta'  => __( 'Transactions', 'testro' ),
	),
	array(
		'icon'  => 'plug',
		'label' => __( 'Third-Party Services', 'testro' ),
		'meta'  => __( 'CRM · payments · SSO', 'testro' ),
	),
);
?>
<div
	class="testro-prod-hero-int"
	role="img"
	aria-label="<?php esc_attr_e( 'Integration testing architecture showing Web App, API Gateway, Microservices, Database and Third-Party Services with AI test execution, API validation, business rule validation, integration health, execution status and quality metrics', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-int__float testro-prod-hero-int__float--exec" aria-hidden="true">
		<span class="testro-prod-hero-int__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-int__float testro-prod-hero-int__float--api" aria-hidden="true">
		<?php echo testro_icon( 'layers-api', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'API Validation', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-int__float testro-prod-hero-int__float--rules" aria-hidden="true">
		<?php echo testro_icon( 'shield-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Business Rule Validation', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-int__panel" aria-hidden="true">
		<div class="testro-prod-hero-int__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-int__chrome-label"><?php esc_html_e( 'Integration Architecture', 'testro' ); ?></p>
			<span class="testro-prod-hero-int__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-int__body">
			<div class="testro-prod-hero-int__metrics">
				<article>
					<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Integration Health', 'testro' ); ?></p>
					<strong>99.2%</strong>
					<em><?php esc_html_e( 'All systems green', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Execution Status', 'testro' ); ?></p>
					<strong><?php esc_html_e( 'Running', 'testro' ); ?></strong>
					<em><?php esc_html_e( 'Parallel agents', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-int__metric--accent">
					<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Quality Metrics', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'AI cleared', 'testro' ); ?></em>
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
						<p class="testro-prod-hero-int__label"><?php esc_html_e( 'API Flow Pulse', 'testro' ); ?></p>
						<div class="testro-prod-hero-int__flow">
							<span></span><span></span><span></span><span></span><span></span>
						</div>
						<p class="testro-prod-hero-int__side-meta"><?php esc_html_e( 'Gateway → services → data → partners', 'testro' ); ?></p>
					</div>
					<div class="testro-prod-hero-int__side-card testro-prod-hero-int__side-card--accent">
						<p class="testro-prod-hero-int__label"><?php esc_html_e( 'Coverage Map', 'testro' ); ?></p>
						<ul class="testro-prod-hero-int__coverage">
							<li>
								<span><?php esc_html_e( 'APIs', 'testro' ); ?></span>
								<em>98%</em>
							</li>
							<li>
								<span><?php esc_html_e( 'Services', 'testro' ); ?></span>
								<em>94%</em>
							</li>
							<li>
								<span><?php esc_html_e( 'Partners', 'testro' ); ?></span>
								<em>91%</em>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
