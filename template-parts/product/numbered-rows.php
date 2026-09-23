<?php
/**
 * Numbered step rows shared by product split sections.
 *
 * Expected $args:
 * - items       (array[]) Each: title, description.
 * - heading_tag (string)  Optional h1–h6. A paragraph is used otherwise.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$tag   = isset( $args['heading_tag'] ) ? (string) $args['heading_tag'] : '';

if ( ! in_array( $tag, array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ), true ) ) {
	$tag = '';
}

if ( ! $items ) {
	return;
}
?>
<ol class="testro-prod-features__rows">
	<?php foreach ( $items as $index => $item ) : ?>
		<li class="testro-prod-features__row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
			<span class="testro-prod-features__row-num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
			<div class="testro-prod-features__row-body">
				<?php if ( $tag ) : ?>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag name is allow-listed above. ?>
					<<?php echo $tag; ?> class="testro-prod-features__row-title"><?php echo esc_html( isset( $item['title'] ) ? $item['title'] : '' ); ?></<?php echo $tag; ?>>
				<?php else : ?>
					<p class="testro-prod-features__row-title"><?php echo esc_html( isset( $item['title'] ) ? $item['title'] : '' ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $item['description'] ) ) : ?>
					<p class="testro-prod-features__row-desc"><?php echo esc_html( $item['description'] ); ?></p>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ol>
