<?php
/**
 * Sanity Testing critical-path / build-gate hero dashboard mockup.
 *
 * @package TestRo
 */

$score       = 96;
$ring_radius = 36;
$ring_length = 2 * M_PI * $ring_radius;
$ring_offset = $ring_length * ( 1 - ( $score / 100 ) );
?>
<div
	class="testro-prod-hero-sanity"
	role="img"
	aria-label="<?php esc_attr_e( 'Sanity testing dashboard showing critical test status, passed and failed checks, AI test execution, build validation, release readiness, execution timeline and quality score', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-sanity__float testro-prod-hero-sanity__float--suite" aria-hidden="true">
		<span class="testro-prod-hero-sanity__float-dot"></span>
		<?php echo testro_icon( 'shield-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Critical Path Clear', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-sanity__float testro-prod-hero-sanity__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Sanity Gate', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-sanity__float testro-prod-hero-sanity__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-sanity__panel" aria-hidden="true">
		<div class="testro-prod-hero-sanity__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-sanity__chrome-label"><?php esc_html_e( 'Critical Test Status', 'testro' ); ?></p>
			<span class="testro-prod-hero-sanity__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-sanity__body">
			<div class="testro-prod-hero-sanity__stats">
				<article>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Passed Checks', 'testro' ); ?></p>
					<strong>42</strong>
					<em><?php esc_html_e( '100% critical', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Failed Checks', 'testro' ); ?></p>
					<strong>0</strong>
					<em><?php esc_html_e( 'Gate clear', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Execution Timeline', 'testro' ); ?></p>
					<strong>4m 12s</strong>
					<em><?php esc_html_e( '−68% vs manual', 'testro' ); ?></em>
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
							<span><?php esc_html_e( 'Login & session critical path', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Checkout smoke checks', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Bug-fix verification pack', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'API health + feature flag gate', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-sanity__build">
						<div class="testro-prod-hero-sanity__progress-head">
							<p class="testro-prod-hero-sanity__label"><?php esc_html_e( 'Build Validation', 'testro' ); ?></p>
							<span>92%</span>
						</div>
						<div class="testro-prod-hero-sanity__bar"><i style="--fill:92%"></i></div>
						<p class="testro-prod-hero-sanity__progress-meta"><?php esc_html_e( 'Build #5124 · sanity gate active', 'testro' ); ?></p>
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
								<linearGradient id="testro-sanity-ring" x1="0" y1="0" x2="1" y2="1">
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
								stroke="url(#testro-sanity-ring)"
							/>
						</svg>
						<div class="testro-prod-hero-sanity__ring-score">
							<strong><?php echo esc_html( (string) $score ); ?>%</strong>
							<span><?php esc_html_e( 'Ready', 'testro' ); ?></span>
						</div>
					</div>
					<ul class="testro-prod-hero-sanity__signals">
						<li>
							<span><?php esc_html_e( 'Critical path', 'testro' ); ?></span>
							<em>100%</em>
						</li>
						<li>
							<span><?php esc_html_e( 'Stability', 'testro' ); ?></span>
							<em>99.4%</em>
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
