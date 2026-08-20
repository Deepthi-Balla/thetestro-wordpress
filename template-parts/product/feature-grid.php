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
$numbered = ! empty( $args['numbered'] );
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$title = isset( $args['title'] ) ? (string) $args['title'] : '';
$card_heading_level = isset( $args['card_heading_level'] ) ? max( 1, min( 6, (int) $args['card_heading_level'] ) ) : 0;
$card_heading_tag   = $card_heading_level ? ( 'h' . $card_heading_level ) : '';

if ( ! $items && '' === $title ) {
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
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'intro_body'    => isset( $args['intro_body'] ) ? $args['intro_body'] : '',
				'paragraphs'    => isset( $args['paragraphs'] ) ? $args['paragraphs'] : array(),
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
				'tone'          => $tone,
			)
		);
		?>

		<?php if ( $items ) : ?>
		<<?php echo $numbered ? 'ol' : 'ul'; ?> class="testro-prod-cards" data-columns="<?php echo esc_attr( (string) $columns ); ?>">
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
						<?php if ( $numbered ) : ?>
							<span class="testro-prod-card__step"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-card__icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<?php if ( $card_heading_tag ) : ?>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag name is derived from a numeric arg. ?>
							<<?php echo $card_heading_tag; ?> class="testro-prod-card__title"><?php echo esc_html( $item['title'] ); ?></<?php echo $card_heading_tag; ?>>
						<?php else : ?>
							<p class="testro-prod-card__title"><?php echo esc_html( $item['title'] ); ?></p>
						<?php endif; ?>
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
		</<?php echo $numbered ? 'ol' : 'ul'; ?>>
		<?php endif; ?>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-features__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
