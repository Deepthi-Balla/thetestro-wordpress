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
 *                     Optional list_style=numbered-rows for AI Quality Intelligence badges
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
$item_level   = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag     = 'h' . $item_level;
$columns      = isset( $args['columns'] ) ? max( 1, (int) $args['columns'] ) : count( $items );
$head_align   = ! empty( $args['align_end'] ) ? 'start' : ( isset( $args['align'] ) && 'center' === $args['align'] ? 'center' : 'start' );
$header_style = isset( $args['header_style'] ) ? (string) $args['header_style'] : '';
$use_three    = ( 'three-lines' === $header_style );
$is_brand     = ! empty( $args['brand'] );

/**
 * Render the shared three-line section header (Why theTestRo pattern).
 *
 * @param array  $args       Section args.
 * @param string $heading_id Optional heading id.
 */
$render_three_lines = static function ( $args, $heading_id ) {
	$line_heading = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
	$line_two     = isset( $args['title'] ) ? (string) $args['title'] : '';
	$line_three   = isset( $args['intro'] ) ? (string) $args['intro'] : '';
	if ( '' === $line_heading ) {
		$line_heading = $line_two;
		$line_two     = $line_three;
		$line_three   = isset( $args['intro_extra'] ) ? (string) $args['intro_extra'] : '';
	}
	$three_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
	$three_tag   = 'h' . $three_level;
	?>
	<header class="testro-section-header testro-section-header--three-lines testro-why__header" data-reveal>
		<?php if ( '' !== $line_heading ) : ?>
			<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
			<<?php echo $three_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="main-headings testro-why__heading"><?php echo esc_html( testro_section_label_title( $line_heading ) ); ?></<?php echo $three_tag; ?>>
		<?php endif; ?>
		<?php if ( '' !== $line_two ) : ?>
			<p class="sub-text testro-why__intro"><?php echo esc_html( $line_two ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $line_three ) : ?>
			<p class="sub-text testro-why__intro"><?php echo esc_html( $line_three ); ?></p>
		<?php endif; ?>
	</header>
	<?php
};
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( 'feature-cards' === $variant ) : ?>
			<?php
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
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
						'align'         => $head_align,
						'tone'          => $is_brand ? 'dark' : 'light',
					)
				);
			}
			$hide_icons = ! empty( $args['hide_icons'] );
			?>
			<ul class="testro-prod-pw__cards testro-prod-pw__cards--<?php echo esc_attr( (string) $columns ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-pw__card testro-card--top-line" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
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
				<p class="testro-prod-pw__outro testro-prod-pw__outro--end <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
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
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
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
						'tone'          => $is_brand ? 'dark' : 'light',
					)
				);
			}
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
				<p class="testro-prod-pw__outro testro-prod-pw__outro--end <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'feature-split' === $variant ) : ?>
			<?php
			$media_left = ! empty( $args['media_side'] ) && 'left' === $args['media_side'];
			$list_style = isset( $args['list_style'] ) ? (string) $args['list_style'] : '';
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => $head_align,
					)
				);
			}
			?>
			<div class="testro-prod-pw__split<?php echo 'numbered-rows' === $list_style ? ' testro-prod-pw__split--numbered' : ''; ?>" data-reveal>
				<?php if ( $media_left ) : ?>
					<div class="testro-prod-pw__split-media" aria-hidden="true">
						<span class="testro-prod-pw__media-frame">
							<span class="testro-prod-pw__media-stripes"></span>
						</span>
					</div>
				<?php endif; ?>
				<?php if ( 'numbered-rows' === $list_style ) : ?>
					<?php
					/* Same numbered badge rows as AI Quality Intelligence. */
					get_template_part(
						'template-parts/product/numbered-rows',
						null,
						array(
							'items'       => $items,
							'heading_tag' => $item_tag,
						)
					);
					?>
				<?php else : ?>
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
				<?php endif; ?>
				<?php if ( ! $media_left ) : ?>
					<div class="testro-prod-pw__split-media" aria-hidden="true">
						<span class="testro-prod-pw__media-frame">
							<span class="testro-prod-pw__media-stripes"></span>
						</span>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-pw__outro testro-prod-pw__outro--end <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php endif; ?>
	</div>
</section>
