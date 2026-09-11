<?php
/**
 * Banking & Finance — Framer compositions (/solutions/banking-finance).
 *
 * Variants:
 * - feature-cards   Industry cards with gradient icon tile + cyan border
 * - exec-split      Left brief (390px) + right numbered steps (brand | light)
 * - impact-rows     Header + title|description divider rows
 * - workflow-grid   Left brief + 2×2 gradient integration tiles
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
$section_class = 'testro-prod-section testro-prod-bf testro-prod-bf--' . $variant;
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-bf--tint';
}
if ( ! empty( $args['soft'] ) ) {
	/* Framer Border Soft section fill #EAF3FC (Oracle One Platform). */
	$section_class .= ' testro-prod-bf--soft';
}
if ( ! empty( $args['brand'] ) ) {
	$section_class .= ' testro-prod-bf--brand';
}
if ( ! empty( $args['white'] ) ) {
	$section_class .= ' testro-prod-bf--white';
}

$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$columns    = isset( $args['columns'] ) ? max( 1, (int) $args['columns'] ) : count( $items );
$is_brand   = ! empty( $args['brand'] );
$card_fill  = isset( $args['card_fill'] ) ? sanitize_html_class( (string) $args['card_fill'] ) : '';
$card_style = isset( $args['card_style'] ) ? sanitize_html_class( (string) $args['card_style'] ) : 'industry';
if ( ! in_array( $card_style, array( 'industry', 'resource', 'resource-module' ), true ) ) {
	$card_style = 'industry';
}
$hide_icons = ! empty( $args['hide_icons'] ) || 'industry' !== $card_style;
if ( $hide_icons ) {
	$section_class .= ' testro-prod-bf--no-icons';
}
if ( 'industry' !== $card_style ) {
	$section_class .= ' testro-prod-bf--cards-' . $card_style;
}
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
					'emphasis'      => isset( $args['emphasis'] ) ? $args['emphasis'] : '',
					'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => 'start',
					'tone'          => 'light',
				)
			);
			?>
			<ul class="testro-prod-bf__cards testro-prod-bf__cards--<?php echo esc_attr( (string) $columns ); ?><?php echo $card_fill ? ' testro-prod-bf__cards--fill-' . esc_attr( $card_fill ) : ''; ?> testro-prod-bf__cards--style-<?php echo esc_attr( $card_style ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$href = isset( $item['href'] ) ? (string) $item['href'] : '';
					$cta  = isset( $item['cta'] ) ? (string) $item['cta'] : '';
					$tag  = '' !== $href ? 'a' : 'div';
					$attrs = '' !== $href
						? ' href="' . esc_url( $href ) . '"'
						: ' role="group"';
					?>
					<li class="testro-prod-bf__card<?php echo '' !== $href ? ' testro-prod-bf__card--linked' : ''; ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( 'industry' === $card_style ) : ?>
							<?php /* Accent is a card-top border segment (Framer PathNode), not icon chrome. */ ?>
							<span class="testro-prod-bf__card-accent" aria-hidden="true"></span>
						<?php endif; ?>
						<<?php echo esc_html( $tag ); ?>
							class="testro-prod-bf__card-inner"
							<?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>
						>
							<?php if ( 'resource' === $card_style ) : ?>
								<span class="testro-prod-bf__card-cover" aria-hidden="true"></span>
							<?php elseif ( 'resource-module' === $card_style ) : ?>
								<?php
								/* Framer modules: odd cards = illustration above; even = illustration below. */
								$module_media_bottom = ( 1 === ( (int) $index % 2 ) );
								?>
								<?php if ( ! $module_media_bottom ) : ?>
									<span class="testro-prod-bf__card-illust" aria-hidden="true"></span>
								<?php endif; ?>
							<?php elseif ( ! $hide_icons ) : ?>
								<span class="testro-prod-bf__card-tile" aria-hidden="true">
									<?php
									$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'code';
									echo testro_icon( $icon, array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
									?>
								</span>
							<?php endif; ?>
							<div class="testro-prod-bf__card-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-bf__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-bf__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
								<?php if ( '' !== $cta ) : ?>
									<span class="testro-prod-bf__card-cta"><?php echo esc_html( $cta ); ?></span>
								<?php endif; ?>
							</div>
							<?php if ( 'resource-module' === $card_style && ! empty( $module_media_bottom ) ) : ?>
								<span class="testro-prod-bf__card-illust" aria-hidden="true"></span>
							<?php endif; ?>
						</<?php echo esc_html( $tag ); ?>>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-bf__outro<?php echo ! empty( $args['outro_align'] ) && 'end' === $args['outro_align'] ? ' testro-prod-bf__outro--end' : ''; ?><?php echo ! empty( $args['outro_italic'] ) ? ' testro-prod-bf__outro--italic' : ''; ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'exec-split' === $variant ) : ?>
			<div class="testro-prod-bf__exec" data-reveal>
				<div class="testro-prod-bf__exec-brief">
					<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
						<p class="testro-prod-bf__exec-label"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
						<h<?php echo (int) ( isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2 ); ?>
							<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
							class="testro-prod-bf__exec-title"
						><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) ( isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2 ); ?>>
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
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-bf__exec-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'capability-split' === $variant ) : ?>
			<?php /* Framer horizontal: left title/intro + right stacked capability blocks. */ ?>
			<div class="testro-prod-bf__cap" data-reveal>
				<div class="testro-prod-bf__cap-brief">
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
						<h<?php echo (int) ( isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2 ); ?>
							<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
							class="testro-prod-bf__cap-title"
						><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) ( isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2 ); ?>>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro'] ) ) : ?>
						<p class="testro-prod-bf__cap-intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro_extra'] ) ) : ?>
						<p class="testro-prod-bf__cap-intro testro-prod-bf__cap-intro-extra"><?php echo esc_html( (string) $args['intro_extra'] ); ?></p>
					<?php endif; ?>
				</div>
				<div class="testro-prod-bf__cap-rail">
					<?php if ( ! empty( $args['list_label'] ) ) : ?>
						<p class="testro-prod-bf__cap-list-label"><?php echo esc_html( (string) $args['list_label'] ); ?></p>
					<?php endif; ?>
					<ul class="testro-prod-bf__cap-list">
						<?php foreach ( $items as $index => $item ) : ?>
							<?php
							$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
							$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
							?>
							<li class="testro-prod-bf__cap-item<?php echo ( '' === $item_title && '' !== $item_desc ) ? ' testro-prod-bf__cap-item--desc-only' : ''; ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
								<span class="testro-prod-bf__cap-item-mark" aria-hidden="true"></span>
								<div class="testro-prod-bf__cap-item-copy">
									<?php if ( '' !== $item_title ) : ?>
										<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
										<<?php echo $item_tag; ?> class="testro-prod-bf__cap-item-title"><?php echo esc_html( $item_title ); ?></<?php echo $item_tag; ?>>
									<?php endif; ?>
									<?php if ( '' !== $item_desc ) : ?>
										<p class="testro-prod-bf__cap-item-desc"><?php echo esc_html( $item_desc ); ?></p>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-bf__outro<?php echo ! empty( $args['outro_align'] ) && 'end' === $args['outro_align'] ? ' testro-prod-bf__outro--end' : ''; ?><?php echo ! empty( $args['outro_italic'] ) ? ' testro-prod-bf__outro--italic' : ''; ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'impact-rows' === $variant ) : ?>
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
					'tone'          => $is_brand ? 'dark' : 'light',
				)
			);
			?>
			<ul class="testro-prod-bf__rows">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-bf__row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-bf__row-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-bf__row-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-bf__outro<?php echo $is_brand ? ' testro-prod-bf__outro--on-dark' : ''; ?><?php echo ! empty( $args['outro_align'] ) && 'end' === $args['outro_align'] ? ' testro-prod-bf__outro--end' : ''; ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'workflow-grid' === $variant ) : ?>
			<?php
			$tool_cols = isset( $args['tool_columns'] ) ? max( 2, min( 4, (int) $args['tool_columns'] ) ) : 2;
			?>
			<div class="testro-prod-bf__workflow" data-reveal>
				<div class="testro-prod-bf__workflow-brief">
					<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
						<p class="testro-prod-bf__exec-label"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- heading tag from sanitized level. ?>
						<h<?php echo (int) ( isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2 ); ?>
							<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?>
							class="testro-prod-bf__exec-title"
						><?php echo esc_html( (string) $args['title'] ); ?></h<?php echo (int) ( isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2 ); ?>>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro'] ) ) : ?>
						<p class="testro-prod-bf__exec-intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro_extra'] ) ) : ?>
						<p class="<?php echo ! empty( $args['intro_emphasis'] ) ? 'testro-prod-bf__exec-emphasis' : 'testro-prod-bf__exec-intro'; ?>"><?php echo esc_html( (string) $args['intro_extra'] ); ?></p>
					<?php endif; ?>
				</div>
				<ul class="testro-prod-bf__tools testro-prod-bf__tools--<?php echo esc_attr( (string) $tool_cols ); ?>">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-bf__tool" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-bf__tool-label"><?php echo esc_html( isset( $item['title'] ) ? (string) $item['title'] : (string) $item ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-bf__workflow-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
