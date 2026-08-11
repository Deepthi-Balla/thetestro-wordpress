<?php
/**
 * Travel & Hospitality quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-travel"
	role="img"
	aria-label="<?php esc_attr_e( 'Travel booking quality dashboard showing flight search, hotel availability, booking status, payment validation, AI test execution, customer journey analytics and release readiness', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-travel__float testro-prod-hero-travel__float--booking" aria-hidden="true">
		<span class="testro-prod-hero-travel__float-dot"></span>
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Booking Healthy', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-travel__float testro-prod-hero-travel__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-travel__float testro-prod-hero-travel__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-travel__panel" aria-hidden="true">
		<div class="testro-prod-hero-travel__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-travel__chrome-label"><?php esc_html_e( 'Travel Quality', 'testro' ); ?></p>
			<span class="testro-prod-hero-travel__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-travel__body">
			<div class="testro-prod-hero-travel__clinical">
				<article class="testro-prod-hero-travel__tile">
					<span class="testro-prod-hero-travel__tile-icon">
						<?php echo testro_icon( 'rocket', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-travel__label"><?php esc_html_e( 'Flight Search', 'testro' ); ?></p>
					<strong>99.1%</strong>
					<em><?php esc_html_e( 'Availability accuracy', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-travel__tile">
					<span class="testro-prod-hero-travel__tile-icon">
						<?php echo testro_icon( 'package', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-travel__label"><?php esc_html_e( 'Hotel Availability', 'testro' ); ?></p>
					<strong>98.7%</strong>
					<em><?php esc_html_e( 'Inventory sync', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-travel__tile">
					<span class="testro-prod-hero-travel__tile-icon">
						<?php echo testro_icon( 'layout-grid', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-travel__label"><?php esc_html_e( 'Booking Status', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'Reservations clear', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-travel__tile">
					<span class="testro-prod-hero-travel__tile-icon">
						<?php echo testro_icon( 'coins', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-travel__label"><?php esc_html_e( 'Payment Validation', 'testro' ); ?></p>
					<strong>A+</strong>
					<em><?php esc_html_e( 'Gateway health', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-travel__row">
				<div class="testro-prod-hero-travel__ai">
					<div class="testro-prod-hero-travel__ai-head">
						<p class="testro-prod-hero-travel__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-travel__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-travel__runs">
						<li>
							<span><?php esc_html_e( 'Booking engine suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Hotel PMS flows', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Mobile booking apps', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Payment APIs', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-travel__health">
						<span><?php esc_html_e( 'Platform Health', 'testro' ); ?></span>
						<strong>A+</strong>
						<span class="testro-prod-hero-travel__health-bar"><i style="--fill:96%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-travel__journey">
					<p class="testro-prod-hero-travel__label"><?php esc_html_e( 'Customer Journey Analytics', 'testro' ); ?></p>
					<ol class="testro-prod-hero-travel__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Search', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Book', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Pay', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Check-In', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-travel__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-travel-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#003e81" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-travel-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#003e81" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-travel__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-travel-area)"
						/>
						<path
							class="testro-prod-hero-travel__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-travel-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-travel__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Readiness · Peak-season ready', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
