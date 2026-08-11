<?php
/**
 * Salesforce CRM quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-salesforce"
	role="img"
	aria-label="<?php esc_attr_e( 'Salesforce quality dashboard showing Sales Pipeline, Lead Management, Customer Cases, CRM Health, AI test execution, workflow validation, release readiness and quality score', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-salesforce__float testro-prod-hero-salesforce__float--insight" aria-hidden="true">
		<span class="testro-prod-hero-salesforce__float-dot"></span>
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Insights', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-salesforce__float testro-prod-hero-salesforce__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'wand', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-salesforce__float testro-prod-hero-salesforce__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-salesforce__panel" aria-hidden="true">
		<div class="testro-prod-hero-salesforce__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-salesforce__chrome-label"><?php esc_html_e( 'Salesforce CRM Quality', 'testro' ); ?></p>
			<span class="testro-prod-hero-salesforce__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-salesforce__body">
			<div class="testro-prod-hero-salesforce__modules">
				<article class="testro-prod-hero-salesforce__tile">
					<span class="testro-prod-hero-salesforce__tile-icon">
						<?php echo testro_icon( 'trending-up', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-salesforce__label"><?php esc_html_e( 'Sales Pipeline', 'testro' ); ?></p>
					<strong>99.2%</strong>
					<em><?php esc_html_e( 'Opportunity health', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-salesforce__tile">
					<span class="testro-prod-hero-salesforce__tile-icon">
						<?php echo testro_icon( 'user-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-salesforce__label"><?php esc_html_e( 'Lead Management', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'Qualification flows', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-salesforce__tile">
					<span class="testro-prod-hero-salesforce__tile-icon">
						<?php echo testro_icon( 'message-text', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-salesforce__label"><?php esc_html_e( 'Customer Cases', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Service workflows', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-salesforce__tile">
					<span class="testro-prod-hero-salesforce__tile-icon">
						<?php echo testro_icon( 'activity', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-salesforce__label"><?php esc_html_e( 'CRM Health', 'testro' ); ?></p>
					<strong>98.8%</strong>
					<em><?php esc_html_e( 'Platform readiness', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-salesforce__row">
				<div class="testro-prod-hero-salesforce__ai">
					<div class="testro-prod-hero-salesforce__ai-head">
						<p class="testro-prod-hero-salesforce__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-salesforce__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-salesforce__runs">
						<li>
							<span><?php esc_html_e( 'Lead-to-Opportunity', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Quote-to-Cash', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Case Management', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Lightning components', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-salesforce__health">
						<span><?php esc_html_e( 'Quality Score', 'testro' ); ?></span>
						<strong>97</strong>
						<span class="testro-prod-hero-salesforce__health-bar"><i style="--fill:97%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-salesforce__journey">
					<p class="testro-prod-hero-salesforce__label"><?php esc_html_e( 'Workflow Validation', 'testro' ); ?></p>
					<ol class="testro-prod-hero-salesforce__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Lead', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Opp', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Quote', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Order', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-salesforce__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-salesforce-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#003e81" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-salesforce-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#003e81" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-salesforce__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-salesforce-area)"
						/>
						<path
							class="testro-prod-hero-salesforce__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-salesforce-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-salesforce__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · CRM workflows green', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
