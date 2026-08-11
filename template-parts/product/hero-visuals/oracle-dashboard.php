<?php
/**
 * Oracle quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-oracle"
	role="img"
	aria-label="<?php esc_attr_e( 'Oracle enterprise quality dashboard showing Oracle ERP, Oracle Cloud, Oracle HCM, Oracle SCM, AI test execution, business workflow validation, release readiness and quality score', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-oracle__float testro-prod-hero-oracle__float--insight" aria-hidden="true">
		<span class="testro-prod-hero-oracle__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Insights', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-oracle__float testro-prod-hero-oracle__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'wand', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-oracle__float testro-prod-hero-oracle__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-oracle__panel" aria-hidden="true">
		<div class="testro-prod-hero-oracle__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-oracle__chrome-label"><?php esc_html_e( 'Oracle Quality Hub', 'testro' ); ?></p>
			<span class="testro-prod-hero-oracle__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-oracle__body">
			<div class="testro-prod-hero-oracle__modules">
				<article class="testro-prod-hero-oracle__tile">
					<span class="testro-prod-hero-oracle__tile-icon">
						<?php echo testro_icon( 'coins', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-oracle__label"><?php esc_html_e( 'Oracle ERP', 'testro' ); ?></p>
					<strong>99.2%</strong>
					<em><?php esc_html_e( 'Ledger health', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-oracle__tile">
					<span class="testro-prod-hero-oracle__tile-icon">
						<?php echo testro_icon( 'cloud', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-oracle__label"><?php esc_html_e( 'Oracle Cloud', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'Fusion flows', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-oracle__tile">
					<span class="testro-prod-hero-oracle__tile-icon">
						<?php echo testro_icon( 'user-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-oracle__label"><?php esc_html_e( 'Oracle HCM', 'testro' ); ?></p>
					<strong>98.9%</strong>
					<em><?php esc_html_e( 'People workflows', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-oracle__tile">
					<span class="testro-prod-hero-oracle__tile-icon">
						<?php echo testro_icon( 'package', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-oracle__label"><?php esc_html_e( 'Oracle SCM', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Supply sync', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-oracle__row">
				<div class="testro-prod-hero-oracle__ai">
					<div class="testro-prod-hero-oracle__ai-head">
						<p class="testro-prod-hero-oracle__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-oracle__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-oracle__runs">
						<li>
							<span><?php esc_html_e( 'Order-to-Cash', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Procure-to-Pay', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'HCM hire-to-retire', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Quarterly patch suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-oracle__health">
						<span><?php esc_html_e( 'Quality Score', 'testro' ); ?></span>
						<strong>97</strong>
						<span class="testro-prod-hero-oracle__health-bar"><i style="--fill:97%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-oracle__journey">
					<p class="testro-prod-hero-oracle__label"><?php esc_html_e( 'Business Workflow Validation', 'testro' ); ?></p>
					<ol class="testro-prod-hero-oracle__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Connect', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Author', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Execute', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Deploy', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-oracle__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-oracle-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#003e81" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-oracle-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#003e81" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-oracle__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-oracle-area)"
						/>
						<path
							class="testro-prod-hero-oracle__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-oracle-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-oracle__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · Oracle workflows green', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
