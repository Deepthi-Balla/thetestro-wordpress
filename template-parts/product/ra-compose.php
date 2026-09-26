<?php
/**
 * Reports & Analytics — Framer compositions (/features-tab/reports-analytics).
 *
 * Variants:
 * - feature-cards   Bordered industry cards OR light feature cards
 * - process-flow    Horizontal 01–04 steps (navy or cyan markers)
 *                   Optional flow_style=home for Home How It Works (.testro-process-flow)
 *                   Optional header_style=three-lines for Why theTestRo header
 *                   Optional header_style=faq-label for FAQ small cyan mono label
 * - feature-split   List + striped media right (brand / tint / white)
 *                   Optional list_style=numbered-rows for AI Quality Intelligence badges
 *                   Optional header_style=three-lines for Why theTestRo header
 *                   Optional header_style=faq-label for FAQ small cyan mono label
 * - overview        3 stakeholder cards with icon tiles + hatched media
 * - compare-table   Category | Manual | theTestRo (no checkmarks)
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
$section_class = 'testro-prod-section testro-prod-ra testro-prod-ra--' . $variant;
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-ra--tint';
}
if ( ! empty( $args['brand'] ) ) {
	$section_class .= ' testro-prod-ra--brand';
}
if ( ! empty( $args['cream'] ) ) {
	$section_class .= ' testro-prod-ra--cream';
}
if ( ! empty( $args['bordered'] ) ) {
	$section_class .= ' testro-prod-ra--bordered';
}
if ( ! empty( $args['hide_icons'] ) ) {
	$section_class .= ' testro-prod-ra--no-icons';
}
if ( ! empty( $args['white'] ) ) {
	$section_class .= ' testro-prod-ra--white';
}
if ( ! empty( $args['soft'] ) ) {
	/* Framer Border Soft fill #EAF3FC */
	$section_class .= ' testro-prod-ra--soft';
}
if ( ! empty( $args['item_checks'] ) ) {
	$section_class .= ' testro-prod-ra--split-checks';
}
$step_marker = isset( $args['step_marker'] ) ? sanitize_html_class( (string) $args['step_marker'] ) : 'cyan';
if ( 'navy' === $step_marker ) {
	$section_class .= ' testro-prod-ra--steps-navy';
} else {
	$section_class .= ' testro-prod-ra--steps-cyan';
}

$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$columns    = isset( $args['columns'] ) ? max( 1, (int) $args['columns'] ) : count( $items );
$head_align = isset( $args['align'] ) && 'center' === $args['align'] ? 'center' : 'start';
$is_brand   = ! empty( $args['brand'] );
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
					'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => $head_align,
					'tone'          => $is_brand ? 'dark' : 'light',
					'header_style'  => isset( $args['header_style'] ) ? (string) $args['header_style'] : '',
				)
			);
			$hide_icons = ! empty( $args['hide_icons'] );
			?>
			<ul class="testro-prod-ra__cards testro-prod-ra__cards--<?php echo esc_attr( (string) $columns ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-ra__card testro-card--top-line" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! $hide_icons ) : ?>
							<span class="testro-prod-ra__card-tile" aria-hidden="true">
								<?php
								$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'play';
								echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
								?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-ra__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-ra__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-ra__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-ra__outro <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'process-flow' === $variant ) : ?>
			<?php
			$header_style = isset( $args['header_style'] ) ? (string) $args['header_style'] : '';
			$use_three    = ( 'three-lines' === $header_style );
			if ( $use_three ) :
				/*
				 * Same three-line header as Home → Why theTestRo.
				 * With eyebrow: eyebrow / title / intro.
				 * Without: title / intro / intro_extra.
				 */
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
			<?php else : ?>
				<?php
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'emphasis'      => isset( $args['emphasis'] ) ? $args['emphasis'] : '',
						'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
						'tone'          => $is_brand ? 'dark' : 'light',
					)
				);
				?>
			<?php endif; ?>
			<?php
			$flow_style = isset( $args['flow_style'] ) ? (string) $args['flow_style'] : '';
			?>
			<?php if ( 'home' === $flow_style ) : ?>
				<?php
				/* Same horizontal process flow as Home → How It Works. */
				$flow_count   = max( 1, count( $items ) );
				$flow_classes = 'testro-process-flow';
				if ( 'navy' === $step_marker ) {
					$flow_classes .= ' testro-process-flow--navy';
				}
				?>
				<div class="<?php echo esc_attr( $flow_classes ); ?>">
					<ol
						class="testro-process-flow__track"
						style="--process-count: <?php echo esc_attr( (string) $flow_count ); ?>"
					>
						<?php foreach ( $items as $index => $item ) : ?>
							<?php
							$num = isset( $item['stage'] ) ? (string) $item['stage'] : (string) ( $index + 1 );
							if ( ctype_digit( $num ) ) {
								$num = sprintf( '%02d', (int) $num );
							}
							?>
							<li class="testro-process-flow__step" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
								<span class="testro-process-flow__num" aria-hidden="true"><?php echo esc_html( $num ); ?></span>
								<div class="testro-process-flow__body">
									<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
									<<?php echo $item_tag; ?> class="testro-process-flow__title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
									<?php if ( ! empty( $item['description'] ) ) : ?>
										<p class="testro-process-flow__desc"><?php echo esc_html( $item['description'] ); ?></p>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ol>
				</div>
			<?php else : ?>
				<ul class="testro-prod-ra__stages">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-ra__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<span class="testro-prod-ra__flow-step" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-ra__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-ra__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-ra__outro <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'feature-split' === $variant ) : ?>
			<?php
			$media_side     = isset( $args['media_side'] ) && 'left' === $args['media_side'] ? 'left' : 'right';
			$hide_media     = ! empty( $args['hide_media'] );
			$item_checks    = ! empty( $args['item_checks'] );
			$header_in_rail = ! empty( $args['header_in_rail'] );
			$header_style   = isset( $args['header_style'] ) ? (string) $args['header_style'] : '';
			$header_args    = array(
				'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'         => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'emphasis'      => isset( $args['emphasis'] ) ? $args['emphasis'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
				'align'         => 'start',
				'tone'          => $is_brand ? 'dark' : 'light',
				'header_style'  => $header_style,
			);
			?>
			<?php if ( ! $header_in_rail ) : ?>
				<?php get_template_part( 'template-parts/product/section-header', null, $header_args ); ?>
			<?php endif; ?>
			<div class="testro-prod-ra__split testro-prod-ra__split--media-<?php echo esc_attr( $media_side ); ?><?php echo $hide_media ? ' testro-prod-ra__split--no-media' : ''; ?><?php echo $header_in_rail ? ' testro-prod-ra__split--rail-header' : ''; ?>" data-reveal>
				<div class="testro-prod-ra__split-rail">
					<?php if ( $header_in_rail ) : ?>
						<?php get_template_part( 'template-parts/product/section-header', null, $header_args ); ?>
					<?php endif; ?>
					<?php if ( ! empty( $args['list_label'] ) ) : ?>
						<p class="testro-prod-ra__split-label"><?php echo esc_html( (string) $args['list_label'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['list_style'] ) && 'numbered-rows' === $args['list_style'] ) : ?>
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
						<ul class="testro-prod-ra__split-list">
							<?php foreach ( $items as $index => $item ) : ?>
								<?php
								$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
								$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
								?>
								<li class="testro-prod-ra__split-item<?php echo ( '' === $item_title && '' !== $item_desc ) ? ' testro-prod-ra__split-item--desc-only' : ''; ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
									<?php if ( $item_checks ) : ?>
										<span class="testro-prod-ra__split-check" aria-hidden="true"></span>
									<?php endif; ?>
									<div class="testro-prod-ra__split-copy">
										<?php if ( '' !== $item_title ) : ?>
											<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
											<<?php echo $item_tag; ?> class="testro-prod-ra__split-title"><?php echo esc_html( $item_title ); ?></<?php echo $item_tag; ?>>
										<?php endif; ?>
										<?php if ( '' !== $item_desc ) : ?>
											<p class="testro-prod-ra__split-desc"><?php echo esc_html( $item_desc ); ?></p>
										<?php endif; ?>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
				<?php if ( ! $hide_media ) : ?>
				<div class="testro-prod-ra__split-media" aria-hidden="true">
					<span class="testro-prod-ra__media-frame">
						<span class="testro-prod-ra__media-stripes"></span>
					</span>
				</div>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-ra__outro<?php echo ! empty( $args['outro_align'] ) && 'end' === $args['outro_align'] ? ' testro-prod-ra__outro--end' : ''; ?><?php echo ! empty( $args['outro_italic'] ) ? ' testro-prod-ra__outro--italic' : ''; ?> <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'overview' === $variant ) : ?>
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
					'align'         => 'start',
					'tone'          => $is_brand ? 'dark' : 'light',
					'header_style'  => isset( $args['header_style'] ) ? (string) $args['header_style'] : '',
				)
			);
			?>
			<ul class="testro-prod-ra__stake">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-ra__stake-card testro-card--top-line<?php echo 1 === $index ? ' testro-prod-ra__stake-card--accent' : ''; ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-ra__stake-tile" aria-hidden="true">
							<?php
							$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'user-check';
							echo testro_icon( $icon, array( 'size' => 21 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							?>
						</span>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-ra__stake-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-ra__stake-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
						<span class="testro-prod-ra__stake-media" aria-hidden="true">
							<span class="testro-prod-ra__media-stripes"></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-ra__outro <?php echo esc_attr( testro_bottom_text_class( $is_brand ) ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

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
					'tone'          => 'dark',
				)
			);
			$legacy_label = isset( $args['legacy_label'] ) ? (string) $args['legacy_label'] : '';
			$modern_label = isset( $args['modern_label'] ) ? (string) $args['modern_label'] : '';
			$rows         = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
			?>
			<div class="testro-prod-ra__table" data-reveal>
				<div class="testro-prod-ra__table-row testro-prod-ra__table-row--head">
					<span class="testro-prod-ra__table-aspect" aria-hidden="true"></span>
					<span class="testro-prod-ra__table-legacy"><?php echo esc_html( $legacy_label ); ?></span>
					<span class="testro-prod-ra__table-modern"><?php echo esc_html( $modern_label ); ?></span>
				</div>
				<?php foreach ( $rows as $row ) : ?>
					<div class="testro-prod-ra__table-row">
						<span class="testro-prod-ra__table-aspect"><?php echo esc_html( isset( $row['aspect'] ) ? (string) $row['aspect'] : '' ); ?></span>
						<span class="testro-prod-ra__table-legacy"><?php echo esc_html( isset( $row['legacy'] ) ? (string) $row['legacy'] : '' ); ?></span>
						<span class="testro-prod-ra__table-modern"><?php echo esc_html( isset( $row['modern'] ) ? (string) $row['modern'] : '' ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>
	</div>
</section>
