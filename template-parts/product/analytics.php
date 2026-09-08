<?php
/**
 * Product page analytics / quality intelligence.
 *
 * Variants:
 * - default: list + release-readiness panel (legacy product pages)
 * - framer-quality: Framer AI layout — = markers, product line, empty bordered panel
 * - skeleton-dashboard: Framer no-code reports — copy + placeholder dashboard chrome
 *
 * @package TestRo
 */

$args      = isset( $args ) && is_array( $args ) ? $args : array();
$items     = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$dashboard = isset( $args['dashboard'] ) && is_array( $args['dashboard'] ) ? $args['dashboard'] : array();
$id        = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant   = isset( $args['variant'] ) ? (string) $args['variant'] : 'default';
$is_framer = ( 'framer-quality' === $variant );
$is_skeleton = ( 'skeleton-dashboard' === $variant );
$is_empty_panel = ( 'empty-panel' === $variant );
$marker    = isset( $args['marker'] ) ? (string) $args['marker'] : '=';
$product_line = isset( $args['product_line'] ) ? (string) $args['product_line'] : '';

if ( ! $items && ! $dashboard && empty( $args['title'] ) ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
$ring_grad  = $id ? $id . '-ring-grad' : 'testro-ring-grad';

$score        = isset( $dashboard['score'] ) ? max( 0, min( 100, (int) $dashboard['score'] ) ) : 0;
$ring_radius  = 52;
$ring_length  = 2 * M_PI * $ring_radius;
$ring_offset  = $ring_length * ( 1 - ( $score / 100 ) );

$section_class = 'testro-prod-section testro-prod-analytics';
if ( $is_framer ) {
	$section_class .= ' testro-prod-analytics--framer';
} elseif ( $is_skeleton ) {
	$section_class .= ' testro-prod-analytics--skeleton';
} elseif ( $is_empty_panel ) {
	$section_class .= ' testro-prod-analytics--empty-panel';
} else {
	$section_class .= ' testro-prod-section--tint';
}
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container<?php echo ( $is_framer || $is_skeleton || $is_empty_panel ) ? ' testro-prod-analytics__framer-wrap' : ''; ?>">
		<?php if ( $is_empty_panel ) : ?>
			<div class="testro-prod-analytics__copy">
				<?php
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'emphasis'      => isset( $args['emphasis'] ) ? $args['emphasis'] : '',
						'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
					)
				);
				?>
			</div>

			<?php /* Framer Failure Classification Dashboard — chrome only, no invented KPI text. */ ?>
			<div class="testro-prod-analytics__empty-panel" aria-hidden="true"></div>

		<?php elseif ( $is_skeleton ) : ?>
			<div class="testro-prod-analytics__copy">
				<?php
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'emphasis'      => isset( $args['emphasis'] ) ? $args['emphasis'] : '',
						'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
					)
				);
				?>
			</div>

			<?php /* Decorative skeleton only — no invented KPI labels/values. */ ?>
			<div class="testro-prod-analytics__skeleton" aria-hidden="true">
				<div class="testro-prod-analytics__skeleton-head">
					<span class="testro-prod-analytics__skeleton-chip testro-prod-analytics__skeleton-chip--title"></span>
					<span class="testro-prod-analytics__skeleton-chip testro-prod-analytics__skeleton-chip--status"></span>
				</div>
				<div class="testro-prod-analytics__skeleton-metrics">
					<span class="testro-prod-analytics__skeleton-metric"></span>
					<span class="testro-prod-analytics__skeleton-metric"></span>
				</div>
				<div class="testro-prod-analytics__skeleton-chart">
					<span style="--h:40%"></span>
					<span style="--h:78%"></span>
					<span style="--h:60%"></span>
					<span style="--h:100%"></span>
					<span style="--h:72%"></span>
				</div>
				<div class="testro-prod-analytics__skeleton-fail">
					<span class="testro-prod-analytics__skeleton-dot"></span>
					<span class="testro-prod-analytics__skeleton-line"></span>
					<span class="testro-prod-analytics__skeleton-line testro-prod-analytics__skeleton-line--short"></span>
				</div>
			</div>

		<?php elseif ( $is_framer ) : ?>
			<div class="testro-prod-analytics__copy">
				<?php
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
					)
				);
				?>
				<?php if ( '' !== $product_line ) : ?>
					<p class="testro-prod-analytics__product-line"><?php echo esc_html( $product_line ); ?></p>
				<?php endif; ?>

				<?php if ( $items ) : ?>
				<ul class="testro-prod-analytics__markers">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-analytics__marker-row">
							<span class="testro-prod-analytics__marker" aria-hidden="true"><?php echo esc_html( $marker ); ?></span>
							<span class="testro-prod-analytics__marker-text">
								<p class="testro-prod-analytics__marker-title"><?php echo esc_html( $item['title'] ); ?></p>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-analytics__marker-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>

			<?php if ( $dashboard ) : ?>
				<div class="testro-prod-analytics__panel" aria-hidden="true"></div>
			<?php endif; ?>
		<?php else : ?>
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
				'align'         => isset( $args['align'] ) ? $args['align'] : 'center',
			)
		);
		?>

		<div class="testro-prod-analytics__layout<?php echo ! $items ? ' testro-prod-analytics__layout--solo' : ''; ?>">
			<?php if ( $items ) : ?>
			<ul class="testro-prod-analytics__list">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-analytics__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
						<span class="testro-prod-analytics__icon" aria-hidden="true">
							<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<?php endif; ?>
						<span class="testro-prod-analytics__text">
							<h3 class="testro-prod-analytics__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p class="testro-prod-analytics__desc"><?php echo esc_html( $item['description'] ); ?></p>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<?php if ( $dashboard && empty( $dashboard['skeleton'] ) ) : ?>
				<div class="testro-prod-panel" data-reveal role="img" aria-label="<?php esc_attr_e( 'Illustrative release readiness dashboard showing a 96 percent readiness score, execution trends and failure breakdown', 'testro' ); ?>">
					<div class="testro-prod-panel__chrome" aria-hidden="true">
						<span></span><span></span><span></span>
					</div>

					<div class="testro-prod-panel__head" aria-hidden="true">
						<div>
							<p class="testro-prod-panel__label"><?php echo esc_html( isset( $dashboard['label'] ) ? $dashboard['label'] : '' ); ?></p>
							<p class="testro-prod-panel__build"><?php echo esc_html( isset( $dashboard['build'] ) ? $dashboard['build'] : '' ); ?></p>
						</div>
						<p class="testro-prod-panel__status"><?php echo esc_html( isset( $dashboard['status'] ) ? $dashboard['status'] : '' ); ?></p>
					</div>

					<div class="testro-prod-panel__score" aria-hidden="true">
						<svg class="testro-prod-panel__ring" viewBox="0 0 120 120" focusable="false">
							<defs>
								<linearGradient id="<?php echo esc_attr( $ring_grad ); ?>" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#2602ed" />
									<stop offset="100%" stop-color="#00cfcf" />
								</linearGradient>
							</defs>
							<circle class="testro-prod-panel__ring-track" cx="60" cy="60" r="<?php echo esc_attr( (string) $ring_radius ); ?>" />
							<circle
								class="testro-prod-panel__ring-value"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								style="--ring-length: <?php echo esc_attr( (string) round( $ring_length, 2 ) ); ?>; --ring-offset: <?php echo esc_attr( (string) round( $ring_offset, 2 ) ); ?>; stroke: url(#<?php echo esc_attr( $ring_grad ); ?>)"
							/>
						</svg>
						<span class="testro-prod-panel__score-value"><?php echo esc_html( $score . '%' ); ?></span>
					</div>

					<?php if ( ! empty( $dashboard['tiles'] ) ) : ?>
						<ul class="testro-prod-panel__tiles" aria-hidden="true">
							<?php foreach ( $dashboard['tiles'] as $tile ) : ?>
								<li class="testro-prod-panel__tile">
									<p class="testro-prod-panel__tile-label"><?php echo esc_html( $tile['label'] ); ?></p>
									<p class="testro-prod-panel__tile-value"><?php echo esc_html( $tile['value'] ); ?></p>
									<p class="testro-prod-panel__tile-trend is-<?php echo esc_attr( $tile['tone'] ); ?>"><?php echo esc_html( $tile['trend'] ); ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<?php if ( ! empty( $dashboard['chart']['bars'] ) ) : ?>
						<div class="testro-prod-panel__chart" aria-hidden="true">
							<p class="testro-prod-panel__chart-title"><?php echo esc_html( $dashboard['chart']['title'] ); ?></p>
							<ul class="testro-prod-panel__bars">
								<?php foreach ( $dashboard['chart']['bars'] as $bar_index => $bar ) : ?>
									<li class="testro-prod-panel__bar-col">
										<span
											class="testro-prod-panel__bar"
											style="--bar-height: <?php echo esc_attr( (string) max( 4, (int) $bar['value'] ) ); ?>%; --bar-delay: <?php echo esc_attr( (string) ( $bar_index * 70 ) ); ?>ms"
										></span>
										<span class="testro-prod-panel__bar-label"><?php echo esc_html( $bar['label'] ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $dashboard['breakdown'] ) ) : ?>
						<ul class="testro-prod-panel__breakdown" aria-hidden="true">
							<?php foreach ( $dashboard['breakdown'] as $row ) : ?>
								<li class="testro-prod-panel__breakdown-row is-<?php echo esc_attr( $row['tone'] ); ?>">
									<span class="testro-prod-panel__breakdown-label"><?php echo esc_html( $row['label'] ); ?></span>
									<span class="testro-prod-panel__breakdown-track">
										<span class="testro-prod-panel__breakdown-fill" style="--fill: <?php echo esc_attr( (string) (int) $row['value'] ); ?>%"></span>
									</span>
									<span class="testro-prod-panel__breakdown-value"><?php echo esc_html( $row['value'] . '%' ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-analytics__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
