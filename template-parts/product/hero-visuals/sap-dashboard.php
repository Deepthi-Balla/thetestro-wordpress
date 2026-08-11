<?php
/**
 * SAP quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-sap"
	role="img"
	aria-label="<?php esc_attr_e( 'SAP enterprise quality dashboard showing SAP S/4HANA, SAP Fiori, business process validation, AI test execution, enterprise health, release readiness, workflow status and quality score', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-sap__float testro-prod-hero-sap__float--insight" aria-hidden="true">
		<span class="testro-prod-hero-sap__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Insights', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-sap__float testro-prod-hero-sap__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'wand', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-sap__float testro-prod-hero-sap__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-sap__panel" aria-hidden="true">
		<div class="testro-prod-hero-sap__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-sap__chrome-label"><?php esc_html_e( 'SAP Quality Hub', 'testro' ); ?></p>
			<span class="testro-prod-hero-sap__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-sap__body">
			<div class="testro-prod-hero-sap__modules">
				<article class="testro-prod-hero-sap__tile">
					<span class="testro-prod-hero-sap__tile-icon">
						<?php echo testro_icon( 'cloud', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-sap__label"><?php esc_html_e( 'SAP S/4HANA', 'testro' ); ?></p>
					<strong>99.4%</strong>
					<em><?php esc_html_e( 'Enterprise health', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-sap__tile">
					<span class="testro-prod-hero-sap__tile-icon">
						<?php echo testro_icon( 'browsers', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-sap__label"><?php esc_html_e( 'SAP Fiori', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'UI journeys', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-sap__tile">
					<span class="testro-prod-hero-sap__tile-icon">
						<?php echo testro_icon( 'infinity', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-sap__label"><?php esc_html_e( 'Business Process', 'testro' ); ?></p>
					<strong>98.7%</strong>
					<em><?php esc_html_e( 'Workflow status', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-sap__tile">
					<span class="testro-prod-hero-sap__tile-icon">
						<?php echo testro_icon( 'badge-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-sap__label"><?php esc_html_e( 'Release Readiness', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Go-live score', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-sap__row">
				<div class="testro-prod-hero-sap__ai">
					<div class="testro-prod-hero-sap__ai-head">
						<p class="testro-prod-hero-sap__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-sap__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-sap__runs">
						<li>
							<span><?php esc_html_e( 'Order-to-Cash', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Procure-to-Pay', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Fiori role journeys', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'S/4HANA patch suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-sap__health">
						<span><?php esc_html_e( 'Quality Score', 'testro' ); ?></span>
						<strong>97</strong>
						<span class="testro-prod-hero-sap__health-bar"><i style="--fill:97%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-sap__journey">
					<p class="testro-prod-hero-sap__label"><?php esc_html_e( 'Business Process Validation', 'testro' ); ?></p>
					<ol class="testro-prod-hero-sap__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Connect', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Author', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Execute', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Release', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-sap__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-sap-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#003e81" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-sap-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#003e81" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-sap__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-sap-area)"
						/>
						<path
							class="testro-prod-hero-sap__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-sap-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-sap__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · SAP workflows green', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
