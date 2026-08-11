<?php
/**
 * Functional Testing end-to-end workflow hero dashboard mockup.
 *
 * Reuses the Sanity dashboard layout tokens for visual consistency across
 * use-case pages while presenting Functional Testing-specific metrics.
 *
 * @package TestRo
 */

$score       = 98;
$ring_radius = 36;
$ring_length = 2 * M_PI * $ring_radius;
$ring_offset = $ring_length * ( 1 - ( $score / 100 ) );
?>
<div
	class="testro-prod-hero-func testro-prod-hero-sanity"
	role="img"
	aria-label="<?php esc_attr_e( 'Functional testing dashboard showing end-to-end workflow status, business process validation, AI test execution, pass fail summary, test coverage, release readiness, quality score and AI insights', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-sanity__float testro-prod-hero-sanity__float--suite" aria-hidden="true">
		<span class="testro-prod-hero-sanity__float-dot"></span>
		<?php echo testro_icon( 'shield-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Workflows Validated', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-sanity__float testro-prod-hero-sanity__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Insights', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-sanity__float testro-prod-hero-sanity__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-sanity__panel" aria-hidden="true">
		<div class="testro-prod-hero-sanity__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-sanity__chrome-label"><?php esc_html_e( 'End-to-End Workflow Status', 'testro' ); ?></p>
			<span class="testro-prod-hero-sanity__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-sanity__body">
			<div class="testro-prod-hero-sanity__stats">
				<article>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Pass / Fail Summary', 'testro' ); ?></p>
					<strong>1,086</strong>
					<em><?php esc_html_e( '99.1% pass', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Test Coverage', 'testro' ); ?></p>
					<strong>96%</strong>
					<em><?php esc_html_e( '+8% uplift', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Business Process', 'testro' ); ?></p>
					<strong>42</strong>
					<em><?php esc_html_e( 'Workflows green', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-sanity__stat--accent">
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Quality Score', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'AI cleared', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-sanity__row">
				<div class="testro-prod-hero-sanity__exec">
					<div class="testro-prod-hero-sanity__exec-head">
						<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-sanity__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-sanity__runs">
						<li>
							<span><?php esc_html_e( 'Checkout & payment journey', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'UI + API functional pack', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Enterprise workflow validation', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Cross-browser functional suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-sanity__build">
						<div class="testro-prod-hero-sanity__progress-head">
							<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Business Process Validation', 'testro' ); ?></p>
							<span>94%</span>
						</div>
						<div class="testro-prod-hero-sanity__bar"><i style="--fill:94%"></i></div>
						<p class="testro-prod-hero-sanity__progress-meta"><?php esc_html_e( 'Build #5280 · functional gate active', 'testro' ); ?></p>
					</div>
				</div>

				<div
					class="testro-prod-hero-sanity__ring-wrap"
					style="<?php echo esc_attr( '--ring-length: ' . round( $ring_length, 2 ) . '; --ring-offset: ' . round( $ring_offset, 2 ) . ';' ); ?>"
				>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Release Readiness', 'testro' ); ?></p>
					<div class="testro-prod-hero-sanity__ring">
						<svg viewBox="0 0 120 120" focusable="false" aria-hidden="true">
							<defs>
								<linearGradient id="testro-func-ring" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#2602ed" />
									<stop offset="100%" stop-color="#00cfcf" />
								</linearGradient>
							</defs>
							<circle
								class="testro-prod-hero-sanity__ring-track"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								fill="none"
							/>
							<circle
								class="testro-prod-hero-sanity__ring-value"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								fill="none"
								stroke="url(#testro-func-ring)"
							/>
						</svg>
						<div class="testro-prod-hero-sanity__ring-score">
							<strong><?php echo esc_html( (string) $score ); ?>%</strong>
							<span><?php esc_html_e( 'Ready', 'testro' ); ?></span>
						</div>
					</div>
					<ul class="testro-prod-hero-sanity__signals">
						<li>
							<span><?php esc_html_e( 'Workflow coverage', 'testro' ); ?></span>
							<em>96%</em>
						</li>
						<li>
							<span><?php esc_html_e( 'Stability', 'testro' ); ?></span>
							<em>99.2%</em>
						</li>
						<li>
							<span><?php esc_html_e( 'Risk', 'testro' ); ?></span>
							<em class="is-ok"><?php esc_html_e( 'Low', 'testro' ); ?></em>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
