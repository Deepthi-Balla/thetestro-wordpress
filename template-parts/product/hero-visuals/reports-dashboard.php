<?php
/**
 * Reports & Analytics hero dashboard mockup.
 *
 * @package TestRo
 */

$score       = 96;
$ring_radius = 36;
$ring_length = 2 * M_PI * $ring_radius;
$ring_offset = $ring_length * ( 1 - ( $score / 100 ) );
?>
<div
	class="testro-prod-hero-rep"
	role="img"
	aria-label="<?php esc_attr_e( 'Test reports and analytics dashboard showing pass-rate trend, release readiness score, failure breakdown and live KPI tiles', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-rep__float testro-prod-hero-rep__float--ai" aria-hidden="true">
		<span class="testro-prod-hero-rep__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Insights', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-rep__float testro-prod-hero-rep__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-rep__float testro-prod-hero-rep__float--live" aria-hidden="true">
		<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Live Reports', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-rep__panel" aria-hidden="true">
		<div class="testro-prod-hero-rep__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-rep__chrome-label"><?php esc_html_e( 'Reports & Analytics', 'testro' ); ?></p>
			<span class="testro-prod-hero-rep__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-rep__body">
			<div class="testro-prod-hero-rep__stats">
				<article>
					<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Pass Rate', 'testro' ); ?></p>
					<strong>98.6%</strong>
					<em><?php esc_html_e( '+1.4% week', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Failed Tests', 'testro' ); ?></p>
					<strong>12</strong>
					<em><?php esc_html_e( '3 critical', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Coverage', 'testro' ); ?></p>
					<strong>92%</strong>
					<em><?php esc_html_e( 'Stable', 'testro' ); ?></em>
				</article>
				<article>
					<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Test Health', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'AI cleared', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-rep__row">
				<div class="testro-prod-hero-rep__trend">
					<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Pass rate · last 14 runs', 'testro' ); ?></p>
					<svg class="testro-prod-hero-rep__chart" viewBox="0 0 280 88" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-rep-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#2602ed" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-rep-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#2602ed" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-rep__trend-area"
							d="M0 68 L20 62 L40 58 L60 54 L80 50 L100 46 L120 42 L140 38 L160 34 L180 30 L200 28 L220 24 L240 20 L260 16 L280 12 L280 88 L0 88 Z"
							fill="url(#testro-rep-area)"
						/>
						<path
							class="testro-prod-hero-rep__trend-line"
							d="M0 68 L20 62 L40 58 L60 54 L80 50 L100 46 L120 42 L140 38 L160 34 L180 30 L200 28 L220 24 L240 20 L260 16 L280 12"
							fill="none"
							stroke="url(#testro-rep-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
				</div>

				<div
					class="testro-prod-hero-rep__ring-wrap"
					style="<?php echo esc_attr( '--ring-length: ' . round( $ring_length, 2 ) . '; --ring-offset: ' . round( $ring_offset, 2 ) . ';' ); ?>"
				>
					<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Release Readiness', 'testro' ); ?></p>
					<div class="testro-prod-hero-rep__ring">
						<svg viewBox="0 0 120 120" focusable="false">
							<defs>
								<linearGradient id="testro-rep-ring" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#2602ed" />
									<stop offset="100%" stop-color="#00cfcf" />
								</linearGradient>
							</defs>
							<circle class="testro-prod-hero-rep__ring-track" cx="60" cy="60" r="<?php echo esc_attr( (string) $ring_radius ); ?>" />
							<circle
								class="testro-prod-hero-rep__ring-value"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								stroke="url(#testro-rep-ring)"
							/>
						</svg>
						<div class="testro-prod-hero-rep__ring-score">
							<strong><?php echo esc_html( (string) $score ); ?>%</strong>
							<span><?php esc_html_e( 'Ready', 'testro' ); ?></span>
						</div>
					</div>
				</div>
			</div>

			<div class="testro-prod-hero-rep__breakdown">
				<p class="testro-prod-hero-rep__label"><?php esc_html_e( 'Failure Categories', 'testro' ); ?></p>
				<ul>
					<li>
						<span><?php esc_html_e( 'UI change', 'testro' ); ?></span>
						<span class="testro-prod-hero-rep__breakdown-track"><i class="testro-prod-hero-rep__breakdown-fill" style="--fill:42%"></i></span>
						<em>42%</em>
					</li>
					<li>
						<span><?php esc_html_e( 'Test data', 'testro' ); ?></span>
						<span class="testro-prod-hero-rep__breakdown-track"><i class="testro-prod-hero-rep__breakdown-fill" style="--fill:31%"></i></span>
						<em>31%</em>
					</li>
					<li>
						<span><?php esc_html_e( 'Environment', 'testro' ); ?></span>
						<span class="testro-prod-hero-rep__breakdown-track"><i class="testro-prod-hero-rep__breakdown-fill" style="--fill:27%"></i></span>
						<em>27%</em>
					</li>
				</ul>
			</div>

			<div class="testro-prod-hero-rep__meta">
				<span><?php echo testro_icon( 'server', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><?php esc_html_e( 'Jenkins', 'testro' ); ?></span>
				<span><?php echo testro_icon( 'git-branch', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><?php esc_html_e( 'GitHub Actions', 'testro' ); ?></span>
				<span><?php echo testro_icon( 'plug', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><?php esc_html_e( 'Jira', 'testro' ); ?></span>
				<span><?php echo testro_icon( 'message-text', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><?php esc_html_e( 'Slack', 'testro' ); ?></span>
			</div>
		</div>
	</div>
</div>
