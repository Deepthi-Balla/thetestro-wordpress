<?php
/**
 * Retail & E-commerce commerce quality hero dashboard mockup.
 *
 * @package TestRo
 */
?>
<div
	class="testro-prod-hero-retail"
	role="img"
	aria-label="<?php esc_attr_e( 'Retail commerce quality dashboard showing product catalog, shopping cart, checkout flow, order status, AI test execution and customer journey analytics', 'testro' ); ?>"
	data-reveal
>
	<div class="testro-prod-hero-retail__float testro-prod-hero-retail__float--checkout" aria-hidden="true">
		<span class="testro-prod-hero-retail__float-dot"></span>
		<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Checkout Healthy', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-retail__float testro-prod-hero-retail__float--ai" aria-hidden="true">
		<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'AI Tests Running', 'testro' ); ?></span>
	</div>
	<div class="testro-prod-hero-retail__float testro-prod-hero-retail__float--ready" aria-hidden="true">
		<?php echo testro_icon( 'rocket', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
		<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
	</div>

	<div class="testro-prod-hero-retail__panel" aria-hidden="true">
		<div class="testro-prod-hero-retail__chrome">
			<span></span><span></span><span></span>
			<p class="testro-prod-hero-retail__chrome-label"><?php esc_html_e( 'Commerce Quality', 'testro' ); ?></p>
			<span class="testro-prod-hero-retail__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
		</div>

		<div class="testro-prod-hero-retail__body">
			<div class="testro-prod-hero-retail__commerce">
				<article class="testro-prod-hero-retail__tile">
					<span class="testro-prod-hero-retail__tile-icon">
						<?php echo testro_icon( 'layout-grid', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-retail__label"><?php esc_html_e( 'Product Catalog', 'testro' ); ?></p>
					<strong>12.4k</strong>
					<em><?php esc_html_e( 'SKUs validated', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-retail__tile">
					<span class="testro-prod-hero-retail__tile-icon">
						<?php echo testro_icon( 'retail', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-retail__label"><?php esc_html_e( 'Shopping Cart', 'testro' ); ?></p>
					<strong>98.9%</strong>
					<em><?php esc_html_e( 'Promo accuracy', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-retail__tile">
					<span class="testro-prod-hero-retail__tile-icon">
						<?php echo testro_icon( 'coins', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-retail__label"><?php esc_html_e( 'Checkout Flow', 'testro' ); ?></p>
					<strong>99.2%</strong>
					<em><?php esc_html_e( 'Pass rate', 'testro' ); ?></em>
				</article>
				<article class="testro-prod-hero-retail__tile">
					<span class="testro-prod-hero-retail__tile-icon">
						<?php echo testro_icon( 'package', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-hero-retail__label"><?php esc_html_e( 'Order Status', 'testro' ); ?></p>
					<strong>OK</strong>
					<em><?php esc_html_e( 'OMS synced', 'testro' ); ?></em>
				</article>
			</div>

			<div class="testro-prod-hero-retail__row">
				<div class="testro-prod-hero-retail__ai">
					<div class="testro-prod-hero-retail__ai-head">
						<p class="testro-prod-hero-retail__label"><?php esc_html_e( 'AI Test Execution', 'testro' ); ?></p>
						<span class="testro-prod-hero-retail__pulse"><?php esc_html_e( 'Running', 'testro' ); ?></span>
					</div>
					<ul class="testro-prod-hero-retail__runs">
						<li>
							<span><?php esc_html_e( 'Web storefront suite', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Checkout + payments', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'Mobile commerce', 'testro' ); ?></span>
							<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
						</li>
						<li>
							<span><?php esc_html_e( 'POS + inventory API', 'testro' ); ?></span>
							<em class="is-pass"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
						</li>
					</ul>
					<div class="testro-prod-hero-retail__health">
						<span><?php esc_html_e( 'Website Health', 'testro' ); ?></span>
						<strong>A+</strong>
						<span class="testro-prod-hero-retail__health-bar"><i style="--fill:94%"></i></span>
					</div>
				</div>

				<div class="testro-prod-hero-retail__journey">
					<p class="testro-prod-hero-retail__label"><?php esc_html_e( 'Customer Journey Analytics', 'testro' ); ?></p>
					<ol class="testro-prod-hero-retail__steps">
						<li class="is-done"><span>1</span><?php esc_html_e( 'Browse', 'testro' ); ?></li>
						<li class="is-done"><span>2</span><?php esc_html_e( 'Cart', 'testro' ); ?></li>
						<li class="is-active"><span>3</span><?php esc_html_e( 'Pay', 'testro' ); ?></li>
						<li><span>4</span><?php esc_html_e( 'Ship', 'testro' ); ?></li>
					</ol>
					<svg class="testro-prod-hero-retail__chart" viewBox="0 0 220 64" preserveAspectRatio="none" focusable="false">
						<defs>
							<linearGradient id="testro-retail-area" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#2602ed" stop-opacity="0.28" />
								<stop offset="100%" stop-color="#00cfcf" stop-opacity="0.02" />
							</linearGradient>
							<linearGradient id="testro-retail-line" x1="0" y1="0" x2="1" y2="0">
								<stop offset="0%" stop-color="#2602ed" />
								<stop offset="100%" stop-color="#00cfcf" />
							</linearGradient>
						</defs>
						<path
							class="testro-prod-hero-retail__trend-area"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10 L220 64 L0 64 Z"
							fill="url(#testro-retail-area)"
						/>
						<path
							class="testro-prod-hero-retail__trend-line"
							d="M0 48 L30 44 L60 40 L90 34 L120 28 L150 22 L180 16 L220 10"
							fill="none"
							stroke="url(#testro-retail-line)"
							stroke-width="2.5"
							stroke-linecap="round"
							stroke-linejoin="round"
						/>
					</svg>
					<p class="testro-prod-hero-retail__release">
						<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php esc_html_e( 'Release Status · Peak-season ready', 'testro' ); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
