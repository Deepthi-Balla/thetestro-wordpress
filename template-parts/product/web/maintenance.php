<?php
/**
 * Web Testing — Intelligent Web Test Maintenance (Framer WjwO1AihP).
 *
 * Product Capability Cards: 1026×297, gap 16, 3 Unified Testing Cards
 * (pad 24, gap 24, r 18, border rgb(220,234,249)). Visual slot shows the
 * feature illustration when provided.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'intelligent-web-maintenance';

if ( ! $items ) {
	return;
}

$heading_id = $id . '-heading';
$widths     = array( 320, 368, 324 );
?>
<section class="testro-web-section testro-web-maintain" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<header class="testro-web-maintain__head">
			<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-maintain__title"><?php echo esc_html( testro_section_label_title( (string) $args['eyebrow'] ) ); ?></h2>
				<?php if ( ! empty( $args['title'] ) ) : ?>
					<p class="testro-web-maintain__intro"><?php echo esc_html( (string) $args['title'] ); ?></p>
				<?php endif; ?>
			<?php elseif ( ! empty( $args['title'] ) ) : ?>
				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-maintain__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $args['intro'] ) ) : ?>
				<p class="testro-web-maintain__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-web-maintain__cards">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$w     = isset( $widths[ $index ] ) ? (int) $widths[ $index ] : 320;
				$image = isset( $item['image'] ) ? (string) $item['image'] : '';
				$alt   = isset( $item['title'] ) ? (string) $item['title'] : '';
				?>
				<li class="testro-web-maintain__card<?php echo '' !== $image ? ' testro-web-maintain__card--has-image' : ''; ?> testro-card--top-line" style="--card-w: <?php echo esc_attr( (string) $w ); ?>px">
					<span class="testro-web-maintain__visual<?php echo '' !== $image ? ' testro-web-maintain__visual--image' : ''; ?>">
						<?php if ( '' !== $image ) : ?>
							<img
								src="<?php echo esc_url( $image ); ?>"
								alt="<?php echo esc_attr( $alt ); ?>"
								width="1024"
								height="1024"
								loading="lazy"
								decoding="async"
							/>
						<?php endif; ?>
					</span>
					<div class="testro-web-maintain__copy">
						<?php if ( ! empty( $item['title'] ) ) : ?>
							<h3 class="testro-web-maintain__card-title"><?php echo esc_html( (string) $item['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-web-maintain__card-desc"><?php echo esc_html( (string) $item['description'] ); ?></p>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
