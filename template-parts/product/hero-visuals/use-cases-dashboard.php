<?php
/**
 * Software Testing Use Cases hub hero dashboard mockup.
 *
 * @package TestRo
 */

$score       = 96;
$ring_radius = 34;
$ring_length = 2 * M_PI * $ring_radius;
$ring_offset = $ring_length * ( 1 - ( $score / 100 ) );
?>
<div
	class="testro-prod-hero-uc"
	role="img"
	aria-label="<?php esc_attr_e( 'AI-powered testing dashboard showing regression, functional, API, and end-to-end testing with AI execution status, test coverage, quality score, and release readiness', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-uc__float testro-prod-hero-uc__float--ai" aria-hidden="true">
		<span class="testro-prod-hero-uc__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Execution Active', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-uc__float testro-prod-hero-uc__float--cov" aria-hidden="true">
		<?php echo testro_icon( 'target', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( '94% Test Coverage', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-uc__float testro-prod-hero-uc__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-uc__panel" aria-hidden="true">
		<div class="testro-prod-hero-uc__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-uc__chrome-label"><?php esc_html_e( 'AI Testing Command Center', 'testro' ); ?></p>
			<span class="testro-prod-hero-uc__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-uc__body">
			<div class="testro-prod-hero-uc__suite">
				<p class="testro-prod-hero-uc__label"><?php esc_html_e( 'Active Use Cases', 'testro' ); ?></p>
				<ul class="testro-prod-hero-uc__cases">
					<li>
						<span class="testro-prod-hero-uc__case-icon"><?php echo testro_icon( 'refresh', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
						<span><?php esc_html_e( 'Regression Testing', 'testro' ); ?></span>
						<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
					</li>
					<li>
						<span class="testro-prod-hero-uc__case-icon"><?php echo testro_icon( 'layout-grid', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
						<span><?php esc_html_e( 'Functional Testing', 'testro' ); ?></span>
						<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
					</li>
					<li>
						<span class="testro-prod-hero-uc__case-icon"><?php echo testro_icon( 'layers-api', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
						<span><?php esc_html_e( 'API Testing', 'testro' ); ?></span>
						<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
					</li>
					<li>
						<span class="testro-prod-hero-uc__case-icon"><?php echo testro_icon( 'infinity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
						<span><?php esc_html_e( 'End-to-End Testing', 'testro' ); ?></span>
						<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
					</li>
				</ul>
			</div>

			<div class="testro-prod-hero-uc__side">
				<div class="testro-prod-hero-uc__metric">
					<p class="testro-prod-hero-uc__label"><?php esc_html_e( 'Quality Score', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'AI cleared', 'testro' ); ?></em>
				</div>

				<div
					class="testro-prod-hero-uc__ring-wrap"
					style="<?php echo esc_attr( '--ring-length: ' . round( $ring_length, 2 ) . '; --ring-offset: ' . round( $ring_offset, 2 ) . ';' ); ?>"
				>
					<p class="testro-prod-hero-uc__label"><?php esc_html_e( 'Release Readiness', 'testro' ); ?></p>
					<div class="testro-prod-hero-uc__ring">
						<svg viewBox="0 0 120 120" focusable="false" aria-hidden="true">
							<defs>
								<linearGradient id="testro-uc-ring" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#2602ed" />
									<stop offset="100%" stop-color="#00cfcf" />
								</linearGradient>
							</defs>
							<circle
								class="testro-prod-hero-uc__ring-track"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								fill="none"
							/>
							<circle
								class="testro-prod-hero-uc__ring-value"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								fill="none"
								stroke="url(#testro-uc-ring)"
							/>
						</svg>
						<span class="testro-prod-hero-uc__ring-score"><?php echo esc_html( (string) $score ); ?>%</span>
					</div>
				</div>

				<div class="testro-prod-hero-uc__flow">
					<p class="testro-prod-hero-uc__label"><?php esc_html_e( 'Testing Workflow', 'testro' ); ?></p>
					<div class="testro-prod-hero-uc__nodes">
						<span><?php esc_html_e( 'Author', 'testro' ); ?></span>
						<i></i>
						<span class="is-ai"><?php esc_html_e( 'AI Heal', 'testro' ); ?></span>
						<i></i>
						<span><?php esc_html_e( 'Ship', 'testro' ); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
