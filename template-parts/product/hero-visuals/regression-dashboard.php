<?php
/**
 * Regression Testing suite-health hero dashboard mockup.
 *
 * @package TestRo
 */

$score       = 97;
$ring_radius = 36;
$ring_length = 2 * M_PI * $ring_radius;
$ring_offset = $ring_length * ( 1 - ( $score / 100 ) );
?>
<div
	class="testro-prod-hero-reg"
	role="img"
	aria-label="<?php esc_attr_e( 'Regression testing dashboard showing suite status, passed and failed tests, AI test execution, build validation, release readiness, coverage and quality score', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-reg__float testro-prod-hero-reg__float--suite" aria-hidden="true">
		<span class="testro-prod-hero-reg__float-dot"></span>
		<?php echo testro_icon( 'refresh', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Suite Healthy', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-reg__float testro-prod-hero-reg__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Self-Healing', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-reg__float testro-prod-hero-reg__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-reg__panel" aria-hidden="true">
		<div class="testro-prod-hero-reg__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-reg__chrome-label"><?php esc_html_e( 'Regression Suite Status', 'testro' ); ?></p>
			<span class="testro-prod-hero-reg__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-reg__body">
			<div class="testro-prod-hero-reg__stats">
				<article>
					<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'Passed Tests', 'testro' ); ?></p>
					<strong>1,248</strong>
					<em><?php esc_html_e( '98.4% pass', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'Failed Tests', 'testro' ); ?></p>
					<strong>8</strong>
					<em><?php esc_html_e( '2 critical', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'Test Coverage', 'testro' ); ?></p>
					<strong>94%</strong>
					<em><?php esc_html_e( '+6% uplift', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-reg__stat--accent">
					<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'Quality Score', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'AI cleared', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-reg__row">
				<div class="testro-prod-hero-reg__exec">
					<div class="testro-prod-hero-reg__exec-head">
						<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-reg__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-reg__runs">
						<li>
							<span><?php esc_html_e( 'Checkout regression pack', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'API contract suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Mobile smoke + heal', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Cross-browser critical path', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-reg__build">
						<div class="testro-prod-hero-reg__progress-head">
							<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'Build Validation', 'testro' ); ?></p>
							<span>86%</span>
						</div>
						<div class="testro-prod-hero-reg__bar"><i style="--fill:86%"></i></div>
						<p class="testro-prod-hero-reg__progress-meta"><?php esc_html_e( 'Build #4821 · parallel agents active', 'testro' ); ?></p>
					</div>
				</div>

				<div
					class="testro-prod-hero-reg__ring-wrap"
					style="<?php echo esc_attr( '--ring-length: ' . round( $ring_length, 2 ) . '; --ring-offset: ' . round( $ring_offset, 2 ) . ';' ); ?>"
				>
					<p class="testro-prod-hero-reg__label"><?php esc_html_e( 'Release Readiness', 'testro' ); ?></p>
					<div class="testro-prod-hero-reg__ring">
						<svg viewBox="0 0 120 120" focusable="false" aria-hidden="true">
							<defs>
								<linearGradient id="testro-reg-ring" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#2602ed" />
									<stop offset="100%" stop-color="#00cfcf" />
								</linearGradient>
							</defs>
							<circle
								class="testro-prod-hero-reg__ring-track"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								fill="none"
							/>
							<circle
								class="testro-prod-hero-reg__ring-value"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								fill="none"
								stroke="url(#testro-reg-ring)"
							/>
						</svg>
						<div class="testro-prod-hero-reg__ring-score">
							<strong><?php echo esc_html( (string) $score ); ?>%</strong>
							<span><?php esc_html_e( 'Ready', 'testro' ); ?></span>
						</div>
					</div>
					<ul class="testro-prod-hero-reg__signals">
						<li>
							<span><?php esc_html_e( 'Coverage', 'testro' ); ?></span>
							<em>94%</em>
						</li>
						<li>
							<span><?php esc_html_e( 'Stability', 'testro' ); ?></span>
							<em>99.1%</em>
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
