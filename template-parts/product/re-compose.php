<?php
/**
 * Retail & E-commerce — Framer compositions (/solutions/retail-e-commerce).
 *
 * Variants:
 * - feature-cards    Industry cards with gradient icon tile + cyan border
 * - exec-split       Left brief (390px) + right numbered steps
 * - workflow-grid    Left brief + gradient integration tiles
 * - coverage-split   Eyebrow/title + bordered rows | striped media
 * - compare-table    Text-only 3-column comparison table
 *
 * Feature/exec/workflow markup reuses .testro-prod-bf-* classes (same Framer
 * components as Banking & Finance) scoped under .testro-product-re.
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

$heading_id = $id ? $id . '-heading' : '';

/* Shared industry card / exec / workflow → bf classnames (identical Framer components). */
$shared_bf = in_array( $variant, array( 'feature-cards', 'exec-split', 'workflow-grid' ), true );

if ( $shared_bf ) {
	$section_class = 'testro-prod-section testro-prod-bf testro-prod-bf--' . $variant;
} else {
	$section_class = 'testro-prod-section testro-prod-re testro-prod-re--' . $variant;
}

if ( ! empty( $args['tint'] ) ) {
	$section_class .= $shared_bf ? ' testro-prod-bf--tint' : ' testro-prod-re--tint';
}
if ( ! empty( $args['brand'] ) ) {
	$section_class .= $shared_bf ? ' testro-prod-bf--brand' : ' testro-prod-re--brand';
}
if ( ! empty( $args['white'] ) ) {
	$section_class .= $shared_bf ? ' testro-prod-bf--white' : ' testro-prod-re--white';
}

$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$columns    = isset( $args['columns'] ) ? max( 1, (int) $args['columns'] ) : count( $items );
$card_fill  = isset( $args['card_fill'] ) ? sanitize_html_class( (string) $args['card_fill'] ) : '';
$heading_lv = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
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
					'heading_level' => $heading_lv,
					'align'         => 'start',
					'tone'          => 'light',
				)
			);
			?>
			<ul class="testro-prod-bf__cards testro-prod-bf__cards--<?php echo esc_attr( (string) $columns ); ?><?php echo $card_fill ? ' testro-prod-bf__cards--fill-' . esc_attr( $card_fill ) : ''; ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-bf__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-bf__card-accent" aria-hidden="true"></span>
						<span class="testro-prod-bf__card-tile" aria-hidden="true">
							<?php
							$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'shopping-cart';
							echo testro_icon( $icon, array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							?>
						</span>
						<div class="testro-prod-bf__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-bf__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-bf__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-bf__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'exec-split' === $variant ) : ?>
			<div class="testro-prod-bf__exec" data-reveal>
				<div class="testro-prod-bf__exec-brief">
					<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
						<p class="testro-prod-bf__exec-label"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
						<h<?php echo (int) $heading_lv; ?>
							<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
							class="testro-prod-bf__exec-title"
						><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) $heading_lv; ?>>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro'] ) ) : ?>
						<p class="testro-prod-bf__exec-intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro_extra'] ) ) : ?>
						<p class="testro-prod-bf__exec-emphasis"><?php echo esc_html( (string) $args['intro_extra'] ); ?></p>
					<?php endif; ?>
				</div>
				<ul class="testro-prod-bf__exec-steps">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-bf__exec-step" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-bf__exec-num" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
							<div class="testro-prod-bf__exec-step-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-bf__exec-step-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-bf__exec-step-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php elseif ( 'workflow-grid' === $variant ) : ?>
			<div class="testro-prod-bf__workflow" data-reveal>
				<div class="testro-prod-bf__workflow-brief">
					<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
						<p class="testro-prod-bf__exec-label"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
						<h<?php echo (int) $heading_lv; ?>
							<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
							class="testro-prod-bf__exec-title"
						><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) $heading_lv; ?>>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro'] ) ) : ?>
						<p class="testro-prod-bf__exec-intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
					<?php endif; ?>
				</div>
				<ul class="testro-prod-bf__tools">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-bf__tool" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-bf__tool-label"><?php echo esc_html( isset( $item['title'] ) ? (string) $item['title'] : (string) $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php elseif ( 'coverage-split' === $variant ) : ?>
			<?php /* Framer Coverage Engine — pad 54/72/80/72, gap 48; copy+rows | striped media. */ ?>
			<div class="testro-prod-re__coverage" data-reveal>
				<div class="testro-prod-re__coverage-copy">
					<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
						<p class="testro-prod-re__coverage-label"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
						<h<?php echo (int) $heading_lv; ?>
							<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
							class="testro-prod-re__coverage-title"
						><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) $heading_lv; ?>>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro'] ) ) : ?>
						<p class="testro-prod-re__coverage-intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro_extra'] ) ) : ?>
						<p class="testro-prod-re__coverage-intro"><?php echo esc_html( (string) $args['intro_extra'] ); ?></p>
					<?php endif; ?>
					<ul class="testro-prod-re__coverage-list">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-prod-re__coverage-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-re__coverage-item-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-re__coverage-item-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="testro-prod-re__coverage-media" aria-hidden="true">
					<span class="testro-prod-re__media-frame">
						<span class="testro-prod-re__media-stripes"></span>
					</span>
				</div>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-re__coverage-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'compare-table' === $variant ) : ?>
			<?php
			/* Framer Tool Comparison — 3-col retail or 2-col healthcare compliance matrix. */
			$legacy_label = isset( $args['legacy_label'] ) ? (string) $args['legacy_label'] : '';
			$modern_label = isset( $args['modern_label'] ) ? (string) $args['modern_label'] : '';
			$first_label  = isset( $args['first_label'] ) ? (string) $args['first_label'] : '';
			$rows         = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
			$two_column   = ! empty( $args['two_column'] ) || ( '' === $legacy_label );
			$table_class  = 'testro-prod-re__table' . ( $two_column ? ' testro-prod-re__table--two' : '' );
			?>
			<header class="testro-prod-re__compare-intro" data-reveal>
				<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
					<p class="testro-prod-re__compare-eyebrow"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $args['title'] ) ) : ?>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
					<h<?php echo (int) $heading_lv; ?>
						<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
						class="testro-prod-re__compare-title"
					><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) $heading_lv; ?>>
				<?php endif; ?>
				<?php if ( ! empty( $args['intro'] ) ) : ?>
					<p class="testro-prod-re__compare-summary"><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</header>
			<div class="<?php echo esc_attr( $table_class ); ?>" data-reveal role="table" aria-label="<?php echo esc_attr( (string) ( $args['title'] ?? '' ) ); ?>">
				<div class="testro-prod-re__table-row testro-prod-re__table-row--head" role="row">
					<span class="testro-prod-re__table-aspect" role="columnheader"><?php echo esc_html( $first_label ); ?></span>
					<?php if ( ! $two_column ) : ?>
						<span class="testro-prod-re__table-legacy" role="columnheader"><?php echo esc_html( $legacy_label ); ?></span>
					<?php endif; ?>
					<span class="testro-prod-re__table-modern" role="columnheader"><span class="testro-prod-re__table-modern-inner"><?php echo esc_html( $modern_label ); ?></span></span>
				</div>
				<?php foreach ( $rows as $row ) : ?>
					<div class="testro-prod-re__table-row" role="row">
						<span class="testro-prod-re__table-aspect" role="cell"><?php echo esc_html( isset( $row['aspect'] ) ? (string) $row['aspect'] : '' ); ?></span>
						<?php if ( ! $two_column ) : ?>
							<span class="testro-prod-re__table-legacy" role="cell"><?php echo esc_html( isset( $row['legacy'] ) ? (string) $row['legacy'] : '' ); ?></span>
						<?php endif; ?>
						<span class="testro-prod-re__table-modern" role="cell"><span class="testro-prod-re__table-modern-inner"><?php echo esc_html( isset( $row['modern'] ) ? (string) $row['modern'] : '' ); ?></span></span>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-re__compare-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
