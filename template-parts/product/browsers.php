<?php
/**
 * Product page multi-browser execution showcase.
 *
 * Variants:
 * - default: progress mock cards + optional parallel aside (legacy)
 * - browser-list: Framer Chrome Browser list (title — + text, no heavy cards)
 * - validate-list: Framer Chrome Browser 6 stacked rows (h ~143)
 * - rows: legacy bordered rows (kept for compatibility)
 *
 * @package TestRo
 */

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$items    = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$parallel = isset( $args['parallel'] ) && is_array( $args['parallel'] ) ? $args['parallel'] : array();
$features = isset( $args['features'] ) && is_array( $args['features'] ) ? $args['features'] : array();
$id       = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant  = isset( $args['variant'] ) ? (string) $args['variant'] : 'default';
$is_list  = in_array( $variant, array( 'rows', 'browser-list', 'validate-list' ), true );
$is_validate = ( 'validate-list' === $variant );
$is_browser  = ( 'browser-list' === $variant || 'rows' === $variant );

if ( ! $items ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-browsers';
if ( $is_list ) {
	$section_class .= ' testro-prod-browsers--list';
	$section_class .= ' testro-prod-browsers--' . sanitize_html_class( $variant );
} else {
	$section_class .= ' testro-prod-section--spotlight';
}
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
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
				'align'         => isset( $args['align'] ) ? $args['align'] : ( $is_list ? 'start' : 'center' ),
			)
		);
		?>

		<?php if ( $is_list ) : ?>
			<?php /* Framer Chrome Browser / Chrome Browser 6: pad 24, gap 16, border rgb(220,234,249), icon row + copy gap 12. */ ?>
			<ul class="testro-prod-browsers__list<?php echo $is_validate ? ' testro-prod-browsers__list--validate' : ''; ?><?php echo $is_browser ? ' testro-prod-browsers__list--browsers' : ''; ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$row_title = '';
					if ( ! empty( $item['title'] ) ) {
						$row_title = (string) $item['title'];
					} elseif ( ! empty( $item['name'] ) ) {
						$row_title = (string) $item['name'];
					}
					?>
					<li class="testro-prod-browsers__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-browsers__item-icon-row" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-browsers__item-copy">
							<?php if ( '' !== $row_title ) : ?>
								<strong class="testro-prod-browsers__item-title"><?php echo esc_html( $row_title ); ?><span aria-hidden="true"> —</span></strong>
							<?php endif; ?>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<span class="testro-prod-browsers__item-desc"><?php echo esc_html( $item['description'] ); ?></span>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
		<div class="testro-prod-browsers__stage" data-reveal>
			<span class="testro-prod-browsers__hub" aria-hidden="true">
				<?php echo testro_icon( 'zap', array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
			</span>

			<ul class="testro-prod-browsers__grid" aria-label="<?php esc_attr_e( 'Parallel browser execution', 'testro' ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$tone     = ! empty( $item['tone'] ) ? sanitize_html_class( (string) $item['tone'] ) : 'running';
					$progress = isset( $item['progress'] ) ? max( 0, min( 100, (int) $item['progress'] ) ) : 0;
					$slug     = sanitize_title( isset( $item['name'] ) ? (string) $item['name'] : 'browser-' . $index );
					?>
					<li
						class="testro-prod-browsers__card testro-prod-browsers__card--<?php echo esc_attr( $tone ); ?> testro-prod-browsers__card--<?php echo esc_attr( $slug ); ?>"
						style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms; --progress: <?php echo esc_attr( (string) $progress ); ?>%"
						data-reveal
					>
						<span class="testro-prod-browsers__ray" aria-hidden="true"></span>
						<header class="testro-prod-browsers__card-head">
							<span class="testro-prod-browsers__badge" aria-hidden="true"></span>
							<strong class="testro-prod-browsers__name"><?php echo esc_html( $item['name'] ); ?></strong>
							<span class="testro-prod-browsers__status"><?php echo esc_html( $item['status'] ); ?></span>
						</header>
						<div class="testro-prod-browsers__window" aria-hidden="true">
							<span></span><span></span><span></span>
							<span class="testro-prod-browsers__url"></span>
						</div>
						<div class="testro-prod-browsers__track" role="presentation">
							<span class="testro-prod-browsers__fill"></span>
						</div>
						<p class="testro-prod-browsers__pct"><?php echo esc_html( (string) $progress ); ?>%</p>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-browsers__parallel-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if ( $features ) : ?>
			<ul class="testro-prod-cards" data-columns="3">
				<?php foreach ( $features as $index => $feature ) : ?>
					<li class="testro-prod-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-card__glow" aria-hidden="true"></span>
						<div class="testro-prod-card__body">
							<?php if ( ! empty( $feature['icon'] ) ) : ?>
								<span class="testro-prod-card__icon" aria-hidden="true">
									<?php echo testro_icon( $feature['icon'], array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							<?php endif; ?>
							<h3 class="testro-prod-card__title"><?php echo esc_html( $feature['title'] ); ?></h3>
							<?php if ( ! empty( $feature['description'] ) ) : ?>
								<p class="testro-prod-card__desc"><?php echo esc_html( $feature['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( $parallel ) : ?>
			<aside class="testro-prod-browsers__parallel" data-reveal>
				<span class="testro-prod-browsers__parallel-icon" aria-hidden="true">
					<?php echo testro_icon( 'rocket', array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
				</span>
				<div class="testro-prod-browsers__parallel-copy">
					<?php if ( ! empty( $parallel['title'] ) ) : ?>
						<h3 class="testro-prod-browsers__parallel-title"><?php echo esc_html( $parallel['title'] ); ?></h3>
					<?php endif; ?>
					<?php if ( ! empty( $parallel['description'] ) ) : ?>
						<p class="testro-prod-browsers__parallel-desc"><?php echo esc_html( $parallel['description'] ); ?></p>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $parallel['stat'] ) ) : ?>
					<p class="testro-prod-browsers__parallel-stat">
						<strong><?php echo esc_html( $parallel['stat'] ); ?></strong>
						<?php if ( ! empty( $parallel['stat_label'] ) ) : ?>
							<span><?php echo esc_html( $parallel['stat_label'] ); ?></span>
						<?php endif; ?>
					</p>
				<?php endif; ?>
			</aside>
		<?php endif; ?>
		<?php endif; ?>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-browsers__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
