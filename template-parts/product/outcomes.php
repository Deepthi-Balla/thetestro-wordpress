<?php
/**
 * Product page outcomes / capability cards.
 *
 * Web Testing Framer variants (exact structure from Framer serialize):
 * - unified-cards: Unified Testing Card (pad 24, gap 24, icon no tile bg)
 * - cicd-cards: icon tile 62.4 + copy (pad 20/16/20/20, gap 28)
 * - enterprise-cards: icon tile 78 + index + copy (pad 34, gap 28)
 * - debug-rows: horizontal 200px label | desc (pad 19 0, gap 26)
 * - journey-flow: split copy + flow
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$items         = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id            = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant       = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : '';
$is_framer     = ( 'framer-cards' === $variant );
$is_numbered   = ( 'numbered-cards' === $variant );
$is_enterprise = ( 'enterprise-cards' === $variant );
$is_cicd       = ( 'cicd-cards' === $variant );
$is_unified    = ( 'unified-cards' === $variant );
$is_debug      = ( 'debug-rows' === $variant );
$is_journey    = ( 'journey-flow' === $variant );
$is_safeguards = ( 'safeguards' === $variant );
$is_audience   = ( 'audience-cards' === $variant );

if ( ! $items ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-outcomes';
if ( $variant ) {
	$section_class .= ' testro-prod-section--' . $variant;
	$section_class .= ' testro-prod-outcomes--' . $variant;
}

$item_heading_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_heading_tag   = 'h' . $item_heading_level;
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( $is_journey ) : ?>
			<div class="testro-prod-outcomes__journey">
				<div class="testro-prod-outcomes__journey-copy">
					<?php
					get_template_part(
						'template-parts/product/section-header',
						null,
						array(
							'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
							'title'         => isset( $args['title'] ) ? $args['title'] : '',
							'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
							'heading_id'    => $heading_id,
							'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
							'align'         => 'start',
						)
					);
					?>
				</div>

				<ol class="testro-prod-outcomes__journey-flow">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__journey-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<?php if ( ! empty( $item['steps'] ) && is_array( $item['steps'] ) ) : ?>
								<?php /* Framer Four Point User Flow: 26px points + 32×2 Flow Links; Point Labels empty. */ ?>
								<span class="testro-prod-outcomes__journey-steps" aria-hidden="true">
									<?php
									$step_count = count( $item['steps'] );
									foreach ( $item['steps'] as $step_i => $step ) :
										$step_label = trim( (string) $step );
										?>
										<span class="testro-prod-outcomes__journey-step<?php echo 0 === (int) $step_i ? ' testro-prod-outcomes__journey-step--active' : ''; ?>">
											<?php if ( '' !== $step_label ) : ?>
												<span class="testro-prod-outcomes__journey-step-label"><?php echo esc_html( $step_label ); ?></span>
											<?php endif; ?>
										</span>
										<?php if ( $step_i < $step_count - 1 ) : ?>
											<span class="testro-prod-outcomes__journey-link"></span>
										<?php endif; ?>
									<?php endforeach; ?>
								</span>
							<?php elseif ( ! empty( $item['signal'] ) ) : ?>
								<?php
								/*
								 * Framer IconNode h=48 (Workflow Signal / Protected Path Signal).
								 * Exact SVG paths require a live Framer IconNode dump — slot preserves size only.
								 */
								$signal = sanitize_html_class( (string) $item['signal'] );
								?>
								<span class="testro-prod-outcomes__journey-signal testro-prod-outcomes__journey-signal--<?php echo esc_attr( $signal ); ?>" aria-hidden="true"></span>
							<?php endif; ?>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__journey-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-outcomes__journey-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>

		<?php else : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => isset( $args['align'] ) ? $args['align'] : 'center',
				)
			);
			?>

			<?php if ( $is_debug ) : ?>
				<ul class="testro-prod-outcomes__debug-rows">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__debug-row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__debug-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-outcomes__debug-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php elseif ( $is_unified ) : ?>
				<?php
				/* Framer Unified Testing Card: pad 24, gap 24, r 18.
				 * Analytics (u8nt0npb4): Test Suite Rows visual 136px.
				 * Maintenance (WjwO1AihP): icon row, no tile fill.
				 */
				$is_analytics_cards = ( 'web-testing-analytics' === $id );
				$suite_rows_uri     = get_template_directory_uri() . '/assets/images/web/analytics-suite-rows.svg';
				?>
				<ul class="testro-prod-outcomes__unified-grid<?php echo $is_analytics_cards ? ' testro-prod-outcomes__unified-grid--analytics' : ''; ?>">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__unified-card<?php echo $is_analytics_cards ? ' testro-prod-outcomes__unified-card--analytics' : ''; ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<?php if ( $is_analytics_cards ) : ?>
								<span class="testro-prod-outcomes__unified-visual" aria-hidden="true" style="background-image: url('<?php echo esc_url( $suite_rows_uri ); ?>');"></span>
							<?php elseif ( ! empty( $item['icon'] ) ) : ?>
								<span class="testro-prod-outcomes__unified-icon-row" aria-hidden="true">
									<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							<?php endif; ?>
							<div class="testro-prod-outcomes__unified-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__unified-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-outcomes__unified-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php elseif ( $is_cicd ) : ?>
				<?php
				/* Framer kstl0Ku78: testro icon 78 + Infrastructure Trace + 5 cards (pad 20/16/20/20, gap 26, r 20). */
				$cicd_icon_uri = get_template_directory_uri() . '/assets/images/web/cicd-testro-icon.png';
				?>
				<div class="testro-prod-outcomes__cicd-stage">
					<span class="testro-prod-outcomes__cicd-brand" aria-hidden="true">
						<img src="<?php echo esc_url( $cicd_icon_uri ); ?>" alt="" width="70" height="70" loading="lazy" decoding="async" />
					</span>
					<div class="testro-prod-outcomes__cicd-trace" aria-hidden="true">
						<span class="testro-prod-outcomes__cicd-trace-line"></span>
						<span class="testro-prod-outcomes__cicd-trace-dot"></span>
						<span class="testro-prod-outcomes__cicd-trace-dot"></span>
						<span class="testro-prod-outcomes__cicd-trace-dot"></span>
						<span class="testro-prod-outcomes__cicd-trace-dot"></span>
					</div>
					<ul class="testro-prod-outcomes__cicd-grid">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-prod-outcomes__cicd-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
								<span class="testro-prod-outcomes__cicd-header" aria-hidden="true">
									<span class="testro-prod-outcomes__cicd-tile">
										<?php
										$cicd_icon = ! empty( $item['icon'] ) ? $item['icon'] : 'sparkles';
										echo testro_icon( $cicd_icon, array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
										?>
									</span>
								</span>
								<div class="testro-prod-outcomes__cicd-copy">
									<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
									<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__cicd-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
									<?php if ( ! empty( $item['description'] ) ) : ?>
										<p class="testro-prod-outcomes__cicd-desc"><?php echo esc_html( $item['description'] ); ?></p>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php elseif ( $is_enterprise ) : ?>
				<?php /* Framer PWi2rg_G4: Infrastructure Trace + 4 cards (pad 34, tile 78, r 20). */ ?>
				<div class="testro-prod-outcomes__enterprise-stage">
					<div class="testro-prod-outcomes__enterprise-trace" aria-hidden="true">
						<span class="testro-prod-outcomes__enterprise-trace-line"></span>
						<span class="testro-prod-outcomes__enterprise-trace-dot"></span>
						<span class="testro-prod-outcomes__enterprise-trace-dot"></span>
						<span class="testro-prod-outcomes__enterprise-trace-dot"></span>
						<span class="testro-prod-outcomes__enterprise-trace-dot"></span>
					</div>
					<ul class="testro-prod-outcomes__enterprise-grid">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-prod-outcomes__enterprise-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
								<div class="testro-prod-outcomes__enterprise-header">
									<span class="testro-prod-outcomes__enterprise-tile" aria-hidden="true">
										<?php
										$ent_icon = ! empty( $item['icon'] ) ? $item['icon'] : 'sparkles';
										echo testro_icon( $ent_icon, array( 'size' => 30 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
										?>
									</span>
									<span class="testro-prod-outcomes__enterprise-index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
								</div>
								<div class="testro-prod-outcomes__enterprise-copy">
									<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
									<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__enterprise-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
									<?php if ( ! empty( $item['description'] ) ) : ?>
										<p class="testro-prod-outcomes__enterprise-desc"><?php echo esc_html( $item['description'] ); ?></p>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

			<?php elseif ( $is_framer ) : ?>
				<ul class="testro-prod-outcomes__framer-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__framer-card">
							<?php if ( ! empty( $item['icon'] ) ) : ?>
								<span class="testro-prod-outcomes__framer-icon" aria-hidden="true">
									<span class="testro-prod-outcomes__framer-icon-glyph">
										<?php echo testro_icon( $item['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</span>
								</span>
							<?php endif; ?>
							<div class="testro-prod-outcomes__framer-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__framer-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-outcomes__framer-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php elseif ( $is_numbered ) : ?>
				<ul class="testro-prod-outcomes__numbered-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__numbered-card">
							<span class="testro-prod-outcomes__numbered-badge" aria-hidden="true">
								<span class="testro-prod-outcomes__numbered-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
							</span>
							<div class="testro-prod-outcomes__numbered-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__numbered-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-outcomes__numbered-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php elseif ( $is_safeguards ) : ?>
				<ul class="testro-prod-outcomes__safeguards">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__safeguard">
							<span class="testro-prod-outcomes__safeguard-num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<div class="testro-prod-outcomes__safeguard-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__safeguard-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-outcomes__safeguard-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php elseif ( $is_audience ) : ?>
				<ul class="testro-prod-outcomes__audience-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-outcomes__audience-card">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__audience-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-outcomes__audience-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>

			<?php else : ?>
				<ul class="testro-prod-outcomes__grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<?php
						$has_desc = ! empty( $item['description'] );
						$classes  = 'testro-prod-outcomes__item' . ( $has_desc ? ' testro-prod-outcomes__item--rich' : '' );
						?>
						<li class="<?php echo esc_attr( $classes ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<span class="testro-prod-outcomes__motif" aria-hidden="true"></span>
							<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-outcomes__icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<?php endif; ?>
							<span class="testro-prod-outcomes__text">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
								<?php if ( $has_desc ) : ?>
									<p class="testro-prod-outcomes__desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</span>
							<span class="testro-prod-outcomes__arrow" aria-hidden="true">
								<?php echo testro_icon( 'arrow-right', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-head__intro testro-prod-outcomes__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
