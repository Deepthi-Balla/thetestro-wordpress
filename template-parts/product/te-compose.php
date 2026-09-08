<?php
/**
 * Test Execution — Framer compositions (/features-tab/test-execution).
 *
 * Variants:
 * - feature-cards   Feature Card 2 grid (cloud / who / cicd)
 * - process-flow    Horizontal 01–04 steps on tint (how)
 * - coverage-rows   Badge + title/desc rows in white panel
 * - parallel-split  Left copy + right bordered feature list
 * - why-rows        Title | description rule rows (suites / insights)
 * - feature-split   Media | feature list (+ optional outro)
 * - compare-panels  Sequential vs Parallel dual panels
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$variant = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : '';
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();

if ( '' === $variant ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-te testro-prod-te--' . $variant;
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-te--tint';
}
if ( ! empty( $args['align'] ) && 'center' === $args['align'] ) {
	$section_class .= ' testro-prod-te--align-center';
}
if ( ! empty( $args['stack'] ) ) {
	$section_class .= ' testro-prod-te--stack';
}
$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$media_side = isset( $args['media_side'] ) && 'right' === $args['media_side'] ? 'right' : 'left';
$head_align = isset( $args['align'] ) && 'center' === $args['align'] ? 'center' : 'start';
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( 'feature-cards' === $variant ) : ?>
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
					'align'         => $head_align,
				)
			);
			?>
			<ul class="testro-prod-te__cards testro-prod-te__cards--<?php echo esc_attr( (string) count( $items ) ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-te__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-te__card-tile" aria-hidden="true">
							<?php
							$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'zap';
							echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							?>
						</span>
						<div class="testro-prod-te__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-te__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-te__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-te__outro testro-prod-te__outro--end" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'process-flow' === $variant ) : ?>
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
			<ul class="testro-prod-te__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-te__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-te__flow-step" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-te__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-te__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'coverage-rows' === $variant ) : ?>
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
			<div class="testro-prod-te__coverage" data-reveal>
				<ul class="testro-prod-te__coverage-list">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-te__coverage-row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-te__coverage-badge"><?php echo esc_html( isset( $item['badge'] ) ? (string) $item['badge'] : '' ); ?></span>
							<div class="testro-prod-te__coverage-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-te__coverage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-te__coverage-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php elseif ( 'parallel-split' === $variant ) : ?>
			<div class="testro-prod-te__parallel" data-reveal>
				<div class="testro-prod-te__parallel-copy">
					<?php
					get_template_part(
						'template-parts/product/section-header',
						null,
						array(
							'title'         => isset( $args['title'] ) ? $args['title'] : '',
							'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
							'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
							'heading_id'    => $heading_id,
							'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
							'align'         => 'start',
						)
					);
					?>
				</div>
				<ul class="testro-prod-te__parallel-list">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-te__parallel-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-te__parallel-dot" aria-hidden="true"></span>
							<div class="testro-prod-te__parallel-item-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-te__parallel-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-te__parallel-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-te__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'why-rows' === $variant ) : ?>
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
			<ul class="testro-prod-te__why">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-te__why-row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-te__why-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-te__why-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'feature-split' === $variant ) : ?>
			<div class="testro-prod-te__feature testro-prod-te__feature--media-<?php echo esc_attr( $media_side ); ?>" data-reveal>
				<div class="testro-prod-te__feature-media" aria-hidden="true">
					<span class="testro-prod-te__media-frame">
						<span class="testro-prod-te__media-stripes"></span>
					</span>
				</div>
				<div class="testro-prod-te__feature-copy">
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
					<ul class="testro-prod-te__feature-list">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-prod-te__feature-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-te__feature-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-te__feature-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-te__outro testro-prod-te__outro--split" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'compare-panels' === $variant ) : ?>
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
			$panels = isset( $args['panels'] ) && is_array( $args['panels'] ) ? $args['panels'] : array();
			?>
			<div class="testro-prod-te__compare" data-reveal>
				<?php foreach ( $panels as $p_index => $panel ) : ?>
					<?php $tone = isset( $panel['tone'] ) ? (string) $panel['tone'] : 'legacy'; ?>
					<div class="testro-prod-te__compare-panel testro-prod-te__compare-panel--<?php echo esc_attr( $tone ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $p_index * 70 ) ); ?>ms">
						<div class="testro-prod-te__compare-row testro-prod-te__compare-row--head">
							<span class="testro-prod-te__compare-label"><?php echo esc_html( isset( $panel['label'] ) ? (string) $panel['label'] : '' ); ?></span>
							<span class="testro-prod-te__compare-badge"><?php echo esc_html( isset( $panel['badge'] ) ? (string) $panel['badge'] : '' ); ?></span>
						</div>
						<?php if ( ! empty( $panel['rows'] ) && is_array( $panel['rows'] ) ) : ?>
							<?php foreach ( $panel['rows'] as $row ) : ?>
								<div class="testro-prod-te__compare-row">
									<span class="testro-prod-te__compare-aspect"><?php echo esc_html( isset( $row['aspect'] ) ? (string) $row['aspect'] : '' ); ?></span>
									<span class="testro-prod-te__compare-value"><?php echo esc_html( isset( $row['value'] ) ? (string) $row['value'] : '' ); ?></span>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
	</div>
</section>
