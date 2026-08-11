<?php
/**
 * Healthcare clinical quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-health"
	role="img"
	aria-label="<?php esc_attr_e( 'Healthcare quality dashboard showing patient workflow, appointment status, EHR validation, API health, AI test execution, compliance status and release readiness', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-health__float testro-prod-hero-health__float--compliance" aria-hidden="true">
		<span class="testro-prod-hero-health__float-dot"></span>
		<?php echo testro_icon( 'shield-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Compliance Ready', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-health__float testro-prod-hero-health__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-health__float testro-prod-hero-health__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-health__panel" aria-hidden="true">
		<div class="testro-prod-hero-health__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-health__chrome-label"><?php esc_html_e( 'Clinical Quality', 'testro' ); ?></p>
			<span class="testro-prod-hero-health__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-health__body">
			<div class="testro-prod-hero-health__clinical">
				<article class="testro-prod-hero-health__tile">
					<span class="testro-prod-hero-health__tile-icon">
						<?php echo testro_icon( 'heart-pulse', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-health__label"><?php esc_html_e( 'Patient Workflow', 'testro' ); ?></p>
					<strong>99.4%</strong>
					<em><?php esc_html_e( 'Journey pass rate', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-health__tile">
					<span class="testro-prod-hero-health__tile-icon">
						<?php echo testro_icon( 'calendar-sync', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-health__label"><?php esc_html_e( 'Appointment Status', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'Scheduling synced', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-health__tile">
					<span class="testro-prod-hero-health__tile-icon">
						<?php echo testro_icon( 'stethoscope', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-health__label"><?php esc_html_e( 'EHR Validation', 'testro' ); ?></p>
					<strong>98.7%</strong>
					<em><?php esc_html_e( 'Clinical records', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-health__tile">
					<span class="testro-prod-hero-health__tile-icon">
						<?php echo testro_icon( 'layers-api', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-health__label"><?php esc_html_e( 'API Health', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'FHIR endpoints', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-health__row">
				<div class="testro-prod-hero-health__ai">
					<div class="testro-prod-hero-health__ai-head">
						<p class="testro-prod-hero-health__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-health__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-health__runs">
						<li>
							<span><?php esc_html_e( 'Patient registration suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'EHR + clinical docs', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Lab orders & results', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Claims + FHIR APIs', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-health__health">
						<span><?php esc_html_e( 'Compliance Status', 'testro' ); ?></span>
						<strong>A+</strong>
						<span class="testro-prod-hero-health__health-bar"><i style="--fill:96%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-health__journey">
					<p class="testro-prod-hero-health__label"><?php esc_html_e( 'Quality Metrics', 'testro' ); ?></p>
					<ol class="testro-prod-hero-health__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Admit', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Chart', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Order', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Discharge', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-health__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-health-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#2602ed" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-health-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#2602ed" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-health__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-health-area)"
						/>
						<path
							class="testro-prod-hero-health__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-health-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-health__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · Clinical go-live ready', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
