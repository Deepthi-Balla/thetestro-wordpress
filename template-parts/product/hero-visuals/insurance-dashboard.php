<?php
/**
 * Insurance quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-ins"
	role="img"
	aria-label="<?php esc_attr_e( 'Insurance quality dashboard showing policy status, claims overview, premium analytics, application health, AI test execution, compliance indicators and release readiness', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-ins__float testro-prod-hero-ins__float--compliance" aria-hidden="true">
		<span class="testro-prod-hero-ins__float-dot"></span>
		<?php echo testro_icon( 'shield-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Compliance Ready', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-ins__float testro-prod-hero-ins__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-ins__float testro-prod-hero-ins__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-ins__panel" aria-hidden="true">
		<div class="testro-prod-hero-ins__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-ins__chrome-label"><?php esc_html_e( 'Insurance Quality', 'testro' ); ?></p>
			<span class="testro-prod-hero-ins__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-ins__body">
			<div class="testro-prod-hero-ins__clinical">
				<article class="testro-prod-hero-ins__tile">
					<span class="testro-prod-hero-ins__tile-icon">
						<?php echo testro_icon( 'file-text', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-ins__label"><?php esc_html_e( 'Policy Status', 'testro' ); ?></p>
					<strong>99.4%</strong>
					<em><?php esc_html_e( 'Issuance health', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-ins__tile">
					<span class="testro-prod-hero-ins__tile-icon">
						<?php echo testro_icon( 'activity', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-ins__label"><?php esc_html_e( 'Claims Overview', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'Settlements clear', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-ins__tile">
					<span class="testro-prod-hero-ins__tile-icon">
						<?php echo testro_icon( 'chart-bar', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-ins__label"><?php esc_html_e( 'Premium Analytics', 'testro' ); ?></p>
					<strong>98.7%</strong>
					<em><?php esc_html_e( 'Calc accuracy', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-ins__tile">
					<span class="testro-prod-hero-ins__tile-icon">
						<?php echo testro_icon( 'gauge', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-ins__label"><?php esc_html_e( 'Application Health', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Portal endpoints', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-ins__row">
				<div class="testro-prod-hero-ins__ai">
					<div class="testro-prod-hero-ins__ai-head">
						<p class="testro-prod-hero-ins__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-ins__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-ins__runs">
						<li>
							<span><?php esc_html_e( 'Policy lifecycle', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Claims processing', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Premium calc', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Portal journeys', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-ins__health">
						<span><?php esc_html_e( 'Compliance Status', 'testro' ); ?></span>
						<strong>A+</strong>
						<span class="testro-prod-hero-ins__health-bar"><i style="--fill:96%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-ins__journey">
					<p class="testro-prod-hero-ins__label"><?php esc_html_e( 'Quality Metrics', 'testro' ); ?></p>
					<ol class="testro-prod-hero-ins__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Quote', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Issue', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Claim', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Settle', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-ins__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-ins-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#003e81" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-ins-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#003e81" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-ins__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-ins-area)"
						/>
						<path
							class="testro-prod-hero-ins__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-ins-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-ins__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · Compliance indicators green', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
