<?php
/**
 * Product page multi-browser execution showcase.
 *
 * Expected $args: id, eyebrow, title, intro, items (array[] of name/status/
 * progress/tone), parallel (title/description/stat/stat_label).
 *
 * @package TestRo
 */

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$items    = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$parallel = isset( $args['parallel'] ) && is_array( $args['parallel'] ) ? $args['parallel'] : array();
$features = isset( $args['features'] ) && is_array( $args['features'] ) ? $args['features'] : array();
$id       = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-section--spotlight testro-prod-browsers"
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
			)
		);
		?>

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

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-browsers__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
