<?php
/**
 * Web Testing — Intelligent Web Test Maintenance (Framer WjwO1AihP).
 *
 * Product Capability Cards: 1026×297, gap 16, 3 Unified Testing Cards
 * (pad 24, gap 24, r 18, border rgb(220,234,249)). Top visual row is an empty
 * Framer frame (serialized with no children) — keep an empty visual slot.
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
				<p class="testro-web-maintain__eyebrow"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $args['title'] ) ) : ?>
				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-maintain__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $args['intro'] ) ) : ?>
				<p class="testro-web-maintain__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-web-maintain__cards">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php $w = isset( $widths[ $index ] ) ? (int) $widths[ $index ] : 320; ?>
				<li class="testro-web-maintain__card" style="--card-w: <?php echo esc_attr( (string) $w ); ?>px">
					<span class="testro-web-maintain__visual" aria-hidden="true"></span>
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
