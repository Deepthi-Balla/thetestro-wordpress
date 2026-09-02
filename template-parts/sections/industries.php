<?php
/**
 * Solutions by Industry — industry cards (Key Features layout).
 *
 * @package TestRo
 */

$data  = testro_get_industries();
$label = isset( $data['label'] ) ? (string) $data['label'] : '';
$title = isset( $data['title'] ) ? (string) $data['title'] : '';
$intro = isset( $data['intro'] ) ? (string) $data['intro'] : '';
$items = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();

if ( ! $items ) {
	return;
}
?>
<section class="testro-key-features testro-key-features--industries" id="industries" aria-labelledby="industries-heading">
	<div class="testro-key-features__inner">
		<header class="testro-key-features__header" data-reveal>
			<?php if ( '' !== $label ) : ?>
				<p class="testro-key-features__label"><?php echo esc_html( $label ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $title ) : ?>
				<h2 id="industries-heading" class="testro-key-features__heading"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $intro ) : ?>
				<p class="testro-key-features__intro"><?php echo esc_html( $intro ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-key-features__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<li data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 40 ) ); ?>ms">
					<a class="testro-key-features__card" href="<?php echo esc_url( $item['href'] ); ?>">
						<span class="testro-key-features__icon" aria-hidden="true">
							<?php echo testro_icon( $item['icon'], array( 'size' => 20, 'stroke' => 1.75 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<p class="testro-key-features__card-title"><?php echo esc_html( $item['title'] ); ?></p>
						<p class="testro-key-features__desc"><?php echo esc_html( $item['description'] ); ?></p>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
