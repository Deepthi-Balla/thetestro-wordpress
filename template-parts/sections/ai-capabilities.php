<?php
/**
 * AI capabilities — intro, feature cards, closing statement.
 *
 * @package TestRo
 */

$data    = testro_get_ai_capabilities();
$eyebrow = isset( $data['eyebrow'] ) ? (string) $data['eyebrow'] : '';
$title   = isset( $data['title'] ) ? (string) $data['title'] : '';
$intro   = isset( $data['intro'] ) ? (string) $data['intro'] : '';
$outro   = isset( $data['outro'] ) ? (string) $data['outro'] : '';
$items   = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();

if ( '' === $title && ! $items ) {
	return;
}
?>
<section class="testro-ai-capabilities" id="ai-capabilities" aria-labelledby="ai-capabilities-heading">
	<div class="testro-ai-capabilities__inner">
		<header class="testro-ai-capabilities__intro" data-reveal>
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="testro-ai-capabilities__label"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $title ) : ?>
				<h2 id="ai-capabilities-heading" class="testro-ai-capabilities__heading"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $intro ) : ?>
				<p class="testro-ai-capabilities__desc"><?php echo esc_html( $intro ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( $items ) : ?>
			<ul class="testro-ai-capabilities__cards">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$icon = isset( $item['icon'] ) ? (string) $item['icon'] : 'sparkles';
					$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
					$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
					?>
					<li class="testro-ai-capabilities-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms">
						<span class="testro-ai-capabilities-card__icon" aria-hidden="true">
							<?php echo testro_icon( $icon, array( 'size' => 20, 'stroke' => 2 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<?php if ( '' !== $item_title ) : ?>
							<h3 class="testro-ai-capabilities-card__title"><?php echo esc_html( $item_title ); ?></h3>
						<?php endif; ?>
						<?php if ( '' !== $item_desc ) : ?>
							<p class="testro-ai-capabilities-card__desc"><?php echo esc_html( $item_desc ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( '' !== $outro ) : ?>
			<div class="testro-ai-capabilities__closing" data-reveal>
				<p class="testro-ai-capabilities__closing-text"><?php echo esc_html( $outro ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
