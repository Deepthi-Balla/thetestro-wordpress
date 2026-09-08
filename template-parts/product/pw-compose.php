<?php
/**
 * Playwright Export — Framer compositions (/features-tab/playwright-export).
 *
 * Variants:
 * - feature-cards     Feature Card 2 grid
 * - process-flow      Horizontal 01–04 steps
 * - compare-table     3-column comparison (with checkmarks)
 * - capability-rows   Title | description rows (+ optional brand / outro)
 * - feature-split     List + striped media panel
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
$section_class = 'testro-prod-section testro-prod-pw testro-prod-pw--' . $variant;
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-pw--tint';
}
if ( ! empty( $args['brand'] ) ) {
	$section_class .= ' testro-prod-pw--brand';
}
if ( ! empty( $args['hide_icons'] ) ) {
	$section_class .= ' testro-prod-pw--no-icons';
}
if ( ! empty( $args['media_side'] ) && 'left' === $args['media_side'] ) {
	$section_class .= ' testro-prod-pw--media-left';
}
if ( ! empty( $args['align_end'] ) ) {
	$section_class .= ' testro-prod-pw--align-end';
}
$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$columns    = isset( $args['columns'] ) ? max( 1, (int) $args['columns'] ) : count( $items );
$head_align = ! empty( $args['align_end'] ) ? 'start' : ( isset( $args['align'] ) && 'center' === $args['align'] ? 'center' : 'start' );
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
					'tone'          => ! empty( $args['brand'] ) ? 'dark' : 'light',
				)
			);
			$hide_icons = ! empty( $args['hide_icons'] );
			?>
			<ul class="testro-prod-pw__cards testro-prod-pw__cards--<?php echo esc_attr( (string) $columns ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-pw__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! $hide_icons ) : ?>
							<span class="testro-prod-pw__card-tile" aria-hidden="true">
								<?php
								$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'play';
								echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
								?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-pw__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-pw__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-pw__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-pw__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'process-flow' === $variant ) : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => 'start',
				)
			);
			?>
			<ul class="testro-prod-pw__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-pw__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-pw__flow-step" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-pw__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-pw__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'compare-table' === $variant ) : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => 'start',
				)
			);
			$legacy_label = isset( $args['legacy_label'] ) ? (string) $args['legacy_label'] : '';
			$modern_label = isset( $args['modern_label'] ) ? (string) $args['modern_label'] : '';
			$rows         = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
			?>
			<div class="testro-prod-pw__table" data-reveal>
				<div class="testro-prod-pw__table-row testro-prod-pw__table-row--head">
					<span class="testro-prod-pw__table-aspect" aria-hidden="true"></span>
					<span class="testro-prod-pw__table-legacy"><?php echo esc_html( $legacy_label ); ?></span>
					<span class="testro-prod-pw__table-modern"><?php echo esc_html( $modern_label ); ?></span>
				</div>
				<?php foreach ( $rows as $row ) : ?>
					<div class="testro-prod-pw__table-row">
						<span class="testro-prod-pw__table-aspect"><?php echo esc_html( isset( $row['aspect'] ) ? (string) $row['aspect'] : '' ); ?></span>
						<span class="testro-prod-pw__table-legacy"><?php echo esc_html( isset( $row['legacy'] ) ? (string) $row['legacy'] : '' ); ?></span>
						<span class="testro-prod-pw__table-modern">
							<span class="testro-prod-pw__table-check" aria-hidden="true">
								<?php echo testro_icon( 'circle-check', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<?php echo esc_html( isset( $row['modern'] ) ? (string) $row['modern'] : '' ); ?>
						</span>
					</div>
				<?php endforeach; ?>
			</div>

		<?php elseif ( 'capability-rows' === $variant ) : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => 'start',
					'tone'          => ! empty( $args['brand'] ) ? 'dark' : 'light',
				)
			);
			?>
			<ul class="testro-prod-pw__caps">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-pw__cap-row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-pw__cap-title<?php echo ! empty( $item['accent'] ) ? ' testro-prod-pw__cap-title--accent' : ''; ?>"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-pw__cap-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-pw__outro testro-prod-pw__outro--end" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'feature-split' === $variant ) : ?>
			<?php
			$media_left = ! empty( $args['media_side'] ) && 'left' === $args['media_side'];
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => 'start',
				)
			);
			?>
			<div class="testro-prod-pw__split" data-reveal>
				<?php if ( $media_left ) : ?>
					<div class="testro-prod-pw__split-media" aria-hidden="true">
						<span class="testro-prod-pw__media-frame">
							<span class="testro-prod-pw__media-stripes"></span>
						</span>
					</div>
				<?php endif; ?>
				<ul class="testro-prod-pw__split-list">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-pw__split-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-pw__split-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-pw__split-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
				<?php if ( ! $media_left ) : ?>
					<div class="testro-prod-pw__split-media" aria-hidden="true">
						<span class="testro-prod-pw__media-frame">
							<span class="testro-prod-pw__media-stripes"></span>
						</span>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-pw__outro testro-prod-pw__outro--end" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php endif; ?>
	</div>
</section>
