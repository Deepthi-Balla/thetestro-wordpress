<?php
/**
 * Product page use-case card grid — linked cards with Learn More CTAs.
 *
 * Expected $args:
 * - id      (string)  Section anchor id.
 * - variant (string)  'default' | 'spotlight' | 'tint' | 'brand'.
 * - columns (int)     2, 3 or 4 (desktop columns). Default 3.
 * - eyebrow / title / intro (string)
 * - items   (array[]) Each: icon, title, description, href, cta (optional), motif (optional).
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$variant = isset( $args['variant'] ) ? sanitize_html_class( $args['variant'] ) : 'spotlight';
$columns = isset( $args['columns'] ) ? max( 2, min( 4, (int) $args['columns'] ) ) : 3;
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$tone       = 'brand' === $variant ? 'dark' : 'light';
$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-section--<?php echo esc_attr( $variant ); ?> testro-prod-usecase-grid"
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

		<ul class="testro-prod-usecase-grid__list" data-columns="<?php echo esc_attr( (string) $columns ); ?>">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$href   = isset( $item['href'] ) ? (string) $item['href'] : '';
				$cta    = isset( $item['cta'] ) ? (string) $item['cta'] : __( 'Learn More', 'testro' );
				$motif  = isset( $item['motif'] ) ? sanitize_html_class( (string) $item['motif'] ) : 'default';
				$title  = isset( $item['title'] ) ? (string) $item['title'] : '';
				$desc   = isset( $item['description'] ) ? (string) $item['description'] : '';
				$icon   = isset( $item['icon'] ) ? (string) $item['icon'] : '';
				$tag    = '' !== $href ? 'a' : 'div';
				$attrs  = '' !== $href
					? ' href="' . esc_url( $href ) . '"'
					: ' role="group"';
				?>
				<li
					class="testro-prod-usecase-grid__item"
					data-reveal
					style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms"
				>
					<<?php echo esc_html( $tag ); ?>
						class="testro-prod-usecase-grid__card"
						<?php echo $attrs; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>
					>
						<span class="testro-prod-usecase-grid__border" aria-hidden="true"></span>
						<span class="testro-prod-usecase-grid__glow" aria-hidden="true"></span>

						<div class="testro-prod-usecase-grid__visual testro-prod-usecase-grid__visual--<?php echo esc_attr( $motif ); ?>" aria-hidden="true">
							<span class="testro-prod-usecase-grid__orb"></span>
							<span class="testro-prod-usecase-grid__orb"></span>
							<span class="testro-prod-usecase-grid__wave"></span>
							<span class="testro-prod-usecase-grid__bars">
								<i></i><i></i><i></i><i></i>
							</span>
						</div>

						<div class="testro-prod-usecase-grid__body">
							<?php if ( '' !== $icon ) : ?>
								<span class="testro-prod-usecase-grid__icon" aria-hidden="true">
									<?php echo testro_icon( $icon, array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							<?php endif; ?>

							<?php if ( '' !== $title ) : ?>
								<h3 class="testro-prod-usecase-grid__title"><?php echo esc_html( $title ); ?></h3>
							<?php endif; ?>

							<?php if ( '' !== $desc ) : ?>
								<p class="testro-prod-usecase-grid__desc"><?php echo esc_html( $desc ); ?></p>
							<?php endif; ?>

							<span class="testro-prod-usecase-grid__cta">
								<?php echo esc_html( $cta ); ?>
								<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						</div>
					</<?php echo esc_html( $tag ); ?>>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
