<?php
/**
 * Product page feature card grid.
 *
 * Expected $args:
 * - id      (string)  Section anchor id.
 * - variant (string)  'default' | 'spotlight' | 'tint' | 'brand'.
 * - columns (int)     2, 3 or 4 (desktop columns). Default 3.
 * - eyebrow / title / intro (string)
 * - items   (array[]) Each: icon, title, description, optional cta
 *   (label + href|modal + optional attrs).
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$variant = isset( $args['variant'] ) ? sanitize_html_class( $args['variant'] ) : 'default';
$columns = isset( $args['columns'] ) ? max( 2, min( 4, (int) $args['columns'] ) ) : 3;
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$tone       = 'brand' === $variant ? 'dark' : 'light';
$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-section--<?php echo esc_attr( $variant ); ?> testro-prod-features"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
				'tone'       => $tone,
			)
		);
		?>

		<ul class="testro-prod-cards" data-columns="<?php echo esc_attr( (string) $columns ); ?>">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$cta       = isset( $item['cta'] ) && is_array( $item['cta'] ) ? $item['cta'] : null;
				$cta_label = $cta && ! empty( $cta['label'] ) ? (string) $cta['label'] : '';
				$has_cta   = '' !== $cta_label;
				$item_id   = ! empty( $item['id'] ) ? sanitize_title( (string) $item['id'] ) : '';
				?>
				<li
					class="testro-prod-card<?php echo $has_cta ? ' testro-prod-card--cta' : ''; ?>"
					<?php echo $item_id ? 'id="' . esc_attr( $item_id ) . '"' : ''; ?>
					data-reveal
					style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms"
				>
					<span class="testro-prod-card__glow" aria-hidden="true"></span>
					<div class="testro-prod-card__body">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-card__icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<h3 class="testro-prod-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-card__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>

						<?php if ( $has_cta ) : ?>
							<?php
							$cta_modal = isset( $cta['modal'] ) ? (string) $cta['modal'] : '';
							$cta_href  = isset( $cta['href'] ) ? (string) $cta['href'] : '';
							$cta_attrs = isset( $cta['attrs'] ) && is_array( $cta['attrs'] ) ? $cta['attrs'] : array();
							$attr_str  = '';

							foreach ( $cta_attrs as $attr_key => $attr_value ) {
								$attr_str .= sprintf( ' %s="%s"', esc_attr( $attr_key ), esc_attr( (string) $attr_value ) );
							}

							if ( $cta_modal ) {
								$attr_str .= sprintf(
									' data-open-modal="%1$s" aria-haspopup="dialog" aria-controls="%1$s" type="button"',
									esc_attr( $cta_modal )
								);
							}
							?>
							<p class="testro-prod-card__cta">
								<?php if ( $cta_modal || '' === $cta_href ) : ?>
									<button class="testro-btn testro-btn--outline testro-prod-card__cta-btn"<?php echo $attr_str; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
										<span><?php echo esc_html( $cta_label ); ?></span>
										<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</button>
								<?php else : ?>
									<a class="testro-btn testro-btn--outline testro-prod-card__cta-btn" href="<?php echo esc_url( $cta_href ); ?>"<?php echo $attr_str; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
										<span><?php echo esc_html( $cta_label ); ?></span>
										<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</a>
								<?php endif; ?>
							</p>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
