<?php
/**
 * Banking & Finance quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-bank"
	role="img"
	aria-label="<?php esc_attr_e( 'Banking quality dashboard showing account overview, payment status, transaction analytics, API health, AI test execution, security status, compliance indicators and release readiness', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-bank__float testro-prod-hero-bank__float--compliance" aria-hidden="true">
		<span class="testro-prod-hero-bank__float-dot"></span>
		<?php echo testro_icon( 'shield-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Compliance Ready', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-bank__float testro-prod-hero-bank__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-bank__float testro-prod-hero-bank__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-bank__panel" aria-hidden="true">
		<div class="testro-prod-hero-bank__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-bank__chrome-label"><?php esc_html_e( 'Banking Quality', 'testro' ); ?></p>
			<span class="testro-prod-hero-bank__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-bank__body">
			<div class="testro-prod-hero-bank__clinical">
				<article class="testro-prod-hero-bank__tile">
					<span class="testro-prod-hero-bank__tile-icon">
						<?php echo testro_icon( 'layout-grid', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-bank__label"><?php esc_html_e( 'Account Overview', 'testro' ); ?></p>
					<strong>99.6%</strong>
					<em><?php esc_html_e( 'Balance sync health', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-bank__tile">
					<span class="testro-prod-hero-bank__tile-icon">
						<?php echo testro_icon( 'coins', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-bank__label"><?php esc_html_e( 'Payment Status', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'Settlements clear', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-bank__tile">
					<span class="testro-prod-hero-bank__tile-icon">
						<?php echo testro_icon( 'chart-bar', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-bank__label"><?php esc_html_e( 'Transaction Analytics', 'testro' ); ?></p>
					<strong>98.9%</strong>
					<em><?php esc_html_e( 'Transfer success', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-bank__tile">
					<span class="testro-prod-hero-bank__tile-icon">
						<?php echo testro_icon( 'layers-api', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-bank__label"><?php esc_html_e( 'API Health', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Payment endpoints', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-bank__row">
				<div class="testro-prod-hero-bank__ai">
					<div class="testro-prod-hero-bank__ai-head">
						<p class="testro-prod-hero-bank__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-bank__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-bank__runs">
						<li>
							<span><?php esc_html_e( 'Payments suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'UPI & QR flows', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Loans + KYC', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Core banking APIs', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-bank__health">
						<span><?php esc_html_e( 'Security Status', 'testro' ); ?></span>
						<strong>A+</strong>
						<span class="testro-prod-hero-bank__health-bar"><i style="--fill:97%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-bank__journey">
					<p class="testro-prod-hero-bank__label"><?php esc_html_e( 'Quality Metrics', 'testro' ); ?></p>
					<ol class="testro-prod-hero-bank__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Auth', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Pay', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Settle', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Audit', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-bank__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-bank-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#003e81" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-bank-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#003e81" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-bank__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-bank-area)"
						/>
						<path
							class="testro-prod-hero-bank__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-bank-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-bank__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · Compliance indicators green', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
