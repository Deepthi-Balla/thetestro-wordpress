<?php
/**
 * Pricing section — matches theTestRo reference layout.
 *
 * @package TestRo
 */

$plans = testro_get_pricing_plans();
?>
<div id="pricing">
	<section class="testro-pricing" aria-labelledby="pricing-heading" data-pricing-section>
		<div class="testro-pricing__container">
			<header class="testro-pricing__header">
				<div class="testro-pricing__eyebrow-wrap">
					<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Pricing', 'testro' ); ?></p>
				</div>
				<h2 id="pricing-heading" class="gradient-text leading-tight main-headings testro-pricing__title">
					<?php
					echo wp_kses(
						__( 'From Startup to Enterprise <br> Test Automation for <br> Everyone.', 'testro' ),
						array( 'br' => array() )
					);
					?>
				</h2>
				<p class="sub-text testro-pricing__intro"><?php esc_html_e( 'Flexible plans for every team. Choose a pricing plan that fits your needs today and scales effortlessly as your team grows.', 'testro' ); ?></p>

				<div class="testro-pricing__toggle tabs-container" role="group" aria-label="<?php esc_attr_e( 'Billing period', 'testro' ); ?>">
					<button type="button" class="testro-pricing__period active-tab is-active" data-billing="monthly" aria-pressed="true">
						<?php esc_html_e( 'Monthly', 'testro' ); ?>
					</button>
					<button type="button" class="testro-pricing__period default-tab" data-billing="yearly" aria-pressed="false">
						<?php esc_html_e( 'Yearly', 'testro' ); ?>
						<span class="testro-pricing__save"><?php esc_html_e( 'Save 20%', 'testro' ); ?></span>
					</button>
				</div>
			</header>

			<ul class="testro-pricing__grid">
				<?php foreach ( $plans as $index => $plan ) : ?>
					<?php
					$recommended     = ! empty( $plan['recommended'] );
					$is_custom       = ! empty( $plan['is_custom'] ) || null === $plan['price_monthly'];
					$monthly         = $plan['price_monthly'];
					$yearly          = testro_yearly_price( $monthly, $plan );
					$billing_dynamic = ! empty( $plan['billing_dynamic'] );
					$has_paid_price  = is_numeric( $monthly ) && (float) $monthly > 0;
					$has_infra_cost  = $has_paid_price && isset( $plan['infra_unit_cost'] );
					$infra_unit      = $has_infra_cost ? (int) $plan['infra_unit_cost'] : 0;
					$parallel_def    = isset( $plan['parallel_default'] ) ? max( 1, (int) $plan['parallel_default'] ) : 1;
					$infra_cost_def  = $infra_unit * $parallel_def;
					$total_def       = (int) $monthly + $infra_cost_def;
					$card_bg         = $is_custom
						? 'custom-pricing-card-background'
						: ( $recommended ? 'enterprise-pricing-card-background' : 'default-pricing-card-background' );
					$delay           = (string) ( $index * 80 );
					?>
					<li
						class="testro-pricing__col"
						style="--pricing-delay: <?php echo esc_attr( $delay ); ?>ms;"
					>
						<article
							class="testro-pricing__card<?php echo $recommended ? ' is-recommended' : ''; ?><?php echo $is_custom ? ' is-custom' : ''; ?>"
							data-plan="<?php echo esc_attr( $plan['id'] ); ?>"
							<?php echo $billing_dynamic ? ' data-billing-dynamic="1"' : ''; ?>
							<?php if ( $has_infra_cost ) : ?>
								data-base-monthly="<?php echo esc_attr( (string) $monthly ); ?>"
								data-base-yearly="<?php echo esc_attr( (string) $yearly ); ?>"
								data-infra-unit="<?php echo esc_attr( (string) $infra_unit ); ?>"
								data-parallel="<?php echo esc_attr( (string) $parallel_def ); ?>"
							<?php endif; ?>
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
										<?php if ( $has_paid_price ) : ?>
											<span class="testro-pricing__save-pill">
												<?php esc_html_e( 'Save 20%', 'testro' ); ?>
											</span>
										<?php endif; ?>
									</div>
									<p class="testro-pricing__tagline"><?php echo esc_html( $plan['tagline'] ); ?></p>

									<?php if ( $is_custom ) : ?>
										<div class="testro-pricing__custom-price">
											<p class="testro-pricing__amount testro-pricing__amount--custom" data-price-custom>
												<?php echo esc_html( $plan['price_label'] ); ?>
											</p>
											<p class="testro-pricing__billing-note"><?php echo esc_html( $plan['billing_note'] ); ?></p>
										</div>
									<?php else : ?>
										<div class="testro-pricing__price-block">
											<div class="testro-pricing__price testro-pricing__price--monthly">
												<span
													class="testro-pricing__amount"
													data-price-monthly="<?php echo esc_attr( (string) $monthly ); ?>"
													data-price-yearly="<?php echo esc_attr( (string) $yearly ); ?>"
												>$<?php echo esc_html( (string) $monthly ); ?></span>
												<span class="testro-pricing__per"><?php esc_html_e( '/month', 'testro' ); ?></span>
											</div>
											<?php if ( $has_paid_price ) : ?>
												<div class="testro-pricing__price testro-pricing__price--yearly">
													<span class="testro-pricing__strike">$<?php echo esc_html( (string) $monthly ); ?>/month</span>
													<div class="testro-pricing__price-row">
														<span class="testro-pricing__amount">$<?php echo esc_html( (string) $yearly ); ?></span>
														<span class="testro-pricing__per"><?php esc_html_e( '/month', 'testro' ); ?></span>
													</div>
												</div>
											<?php endif; ?>
											<p
												class="testro-pricing__billing-note"
												<?php echo $billing_dynamic ? ' data-billing-note' : ''; ?>
												data-note-monthly="<?php echo esc_attr( $plan['billing_note'] ); ?>"
												data-note-yearly="<?php echo esc_attr( $billing_dynamic ? '(billed annually)' : $plan['billing_note'] ); ?>"
											><?php echo esc_html( $plan['billing_note'] ); ?></p>
										</div>
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
									<?php if ( ! empty( $plan['included'] ) ) : ?>
										<section class="testro-pricing__included testro-pricing__panel" aria-label="<?php esc_attr_e( "What's Included", 'testro' ); ?>">
											<div class="testro-pricing__included-inner">
												<h4><?php esc_html_e( "What's Included", 'testro' ); ?></h4>
												<ul>
													<?php foreach ( $plan['included'] as $row ) : ?>
														<?php testro_pricing_render_inc_row( $row ); ?>
													<?php endforeach; ?>
												</ul>
											</div>
										</section>
									<?php endif; ?>

									<?php if ( ! empty( $plan['features'] ) ) : ?>
										<section class="testro-pricing__features testro-pricing__panel<?php echo ! empty( $plan['features_mt'] ) ? ' has-top-gap' : ''; ?>" aria-label="<?php esc_attr_e( 'Features', 'testro' ); ?>">
											<div class="testro-pricing__features-inner">
												<h4><?php esc_html_e( 'Features', 'testro' ); ?></h4>
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

									<?php if ( ! empty( $plan['infrastructure'] ) ) : ?>
										<section class="testro-pricing__infra testro-pricing__panel" aria-label="<?php esc_attr_e( 'Infra & Cloud', 'testro' ); ?>">
											<h4 class="testro-pricing__infra-heading">
												<span class="testro-pricing__infra-dot" aria-hidden="true"></span>
												<?php esc_html_e( 'Infra & Cloud', 'testro' ); ?>
											</h4>
											<ul>
												<?php foreach ( $plan['infrastructure'] as $row ) : ?>
													<?php testro_pricing_render_inc_row( $row ); ?>
												<?php endforeach; ?>
											</ul>

											<?php if ( $has_infra_cost ) : ?>
												<div
													class="testro-pricing__cost-summary"
													data-cost-summary
													aria-label="<?php esc_attr_e( 'Pricing summary', 'testro' ); ?>"
												>
													<div class="testro-pricing__cost-breakdown">
														<div class="testro-pricing__cost-row">
															<span class="testro-pricing__cost-label"><?php esc_html_e( 'Plan Cost', 'testro' ); ?></span>
															<span
																class="testro-pricing__cost-value testro-pricing__cost-amount"
																data-base-cost
															>$<?php echo esc_html( (string) $monthly ); ?>/mo</span>
														</div>
														<div class="testro-pricing__cost-row">
															<span class="testro-pricing__cost-label"><?php esc_html_e( 'Infra Cost', 'testro' ); ?></span>
															<span
																class="testro-pricing__cost-value testro-pricing__cost-amount"
																data-infra-cost
															>$<?php echo esc_html( (string) $infra_cost_def ); ?>/mo</span>
														</div>
														<div class="testro-pricing__cost-row testro-pricing__cost-row--total">
															<span class="testro-pricing__cost-label"><?php esc_html_e( 'Total Cost', 'testro' ); ?></span>
															<span
																class="testro-pricing__cost-value testro-pricing__cost-amount"
																data-total-cost
															>$<?php echo esc_html( (string) $total_def ); ?>/mo</span>
														</div>
													</div>
												</div>
											<?php endif; ?>
										</section>
									<?php endif; ?>

									<?php if ( ! empty( $plan['included_list'] ) ) : ?>
										<section class="testro-pricing__custom-included testro-pricing__panel default-pricing-card-background" aria-label="<?php esc_attr_e( "What's Included", 'testro' ); ?>">
											<h4><?php esc_html_e( "What's Included", 'testro' ); ?></h4>
											<ul>
												<?php foreach ( $plan['included_list'] as $item ) : ?>
													<?php
													$item_label = is_array( $item ) ? $item['label'] : $item;
													$item_icon  = is_array( $item ) && ! empty( $item['icon'] ) ? $item['icon'] : 'check';
													?>
													<li>
														<?php
														// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted SVG from theme helper.
														echo testro_get_pricing_icon_svg( $item_icon, 'testro-pricing__custom-icon' );
														?>
														<span><?php echo esc_html( $item_label ); ?></span>
													</li>
												<?php endforeach; ?>
											</ul>
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
