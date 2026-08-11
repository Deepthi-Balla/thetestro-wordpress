<?php
/**
 * Marketing pricing plans — three-column Starter / Professional / Enterprise cards.
 *
 * Used on the dedicated Pricing page. Homepage numeric plans remain in pricing.php.
 *
 * @package TestRo
 */

$plans = function_exists( 'testro_get_page_pricing_plans' ) ? testro_get_page_pricing_plans() : array();

if ( ! $plans ) {
	return;
}
?>
<div id="pricing">
	<section class="testro-pricing testro-pricing--plans" aria-labelledby="pricing-plans-heading" data-pricing-section>
		<div class="testro-pricing__container">
			<header class="testro-pricing__header">
				<div class="testro-pricing__eyebrow-wrap">
					<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Pricing', 'testro' ); ?></p>
				</div>
				<h2 id="pricing-plans-heading" class="gradient-text leading-tight main-headings testro-pricing__title">
					<?php esc_html_e( 'Choose the Right Plan', 'testro' ); ?>
				</h2>
				<p class="sub-text testro-pricing__intro">
					<?php esc_html_e( 'Flexible pricing designed for startups, growing teams, and enterprises. Choose the plan that fits your testing requirements and scale as your automation needs grow.', 'testro' ); ?>
				</p>
			</header>

			<ul class="testro-pricing__grid testro-pricing__grid--plans">
				<?php foreach ( $plans as $index => $plan ) : ?>
					<?php
					$recommended = ! empty( $plan['recommended'] );
					$card_bg     = ! empty( $plan['card_bg'] ) ? $plan['card_bg'] : 'default-pricing-card-background';
					$delay       = (string) ( $index * 80 );
					?>
					<li
						class="testro-pricing__col"
						style="--pricing-delay: <?php echo esc_attr( $delay ); ?>ms;"
					>
						<article
							class="testro-pricing__card testro-pricing__card--plan<?php echo $recommended ? ' is-recommended' : ''; ?>"
							data-plan="<?php echo esc_attr( $plan['id'] ); ?>"
						>
							<?php if ( ! empty( $plan['badge'] ) ) : ?>
								<div class="testro-pricing__badge">
									<?php
									$badge_icon = isset( $plan['badge_icon'] ) ? $plan['badge_icon'] : 'sparkles';
									// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted SVG from theme helper.
									echo testro_get_pricing_icon_svg( $badge_icon, 'testro-pricing__badge-icon' );
									?>
									<span><?php echo esc_html( $plan['badge'] ); ?></span>
								</div>
							<?php endif; ?>

							<div class="testro-pricing__card-inner">
								<div class="testro-pricing__top <?php echo esc_attr( $card_bg ); ?>">
									<div class="testro-pricing__name-row">
										<h3 class="testro-pricing__name"><?php echo esc_html( $plan['name'] ); ?></h3>
									</div>
									<?php if ( ! empty( $plan['tagline'] ) ) : ?>
										<p class="testro-pricing__tagline"><?php echo esc_html( $plan['tagline'] ); ?></p>
									<?php endif; ?>
									<?php if ( ! empty( $plan['best_for'] ) ) : ?>
										<p class="testro-pricing__best-for">
											<span class="testro-pricing__best-for-label"><?php esc_html_e( 'Best for', 'testro' ); ?></span>
											<span class="testro-pricing__best-for-value"><?php echo esc_html( $plan['best_for'] ); ?></span>
										</p>
									<?php endif; ?>

									<button
										type="button"
										class="cta-button testro-pricing__cta"
										style="--font-size: 14px;"
										data-open-modal="demo-modal"
										aria-haspopup="dialog"
										aria-controls="demo-modal"
									>
										<span><?php echo esc_html( $plan['cta'] ); ?></span>
									</button>
								</div>

								<div class="testro-pricing__body">
									<?php if ( ! empty( $plan['features'] ) ) : ?>
										<section class="testro-pricing__features testro-pricing__panel" aria-label="<?php esc_attr_e( 'Plan features', 'testro' ); ?>">
											<div class="testro-pricing__features-inner">
												<?php if ( ! empty( $plan['includes_note'] ) ) : ?>
													<p class="testro-pricing__includes-note"><?php echo esc_html( $plan['includes_note'] ); ?></p>
												<?php else : ?>
													<h4><?php esc_html_e( 'Includes', 'testro' ); ?></h4>
												<?php endif; ?>
												<ul>
													<?php foreach ( $plan['features'] as $feature ) : ?>
														<li>
															<span class="feature-text"><?php echo esc_html( $feature ); ?></span>
															<span class="testro-pricing__check" aria-hidden="true">
																<?php
																// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted SVG from theme helper.
																echo testro_get_pricing_icon_svg( 'check', 'testro-pricing__check-icon' );
																?>
															</span>
														</li>
													<?php endforeach; ?>
												</ul>
											</div>
										</section>
									<?php endif; ?>
								</div>
							</div>
						</article>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</div>
