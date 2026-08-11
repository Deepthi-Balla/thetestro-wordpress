<?php
/**
 * Benefits section — KPI-rich outcome cards.
 *
 * @package TestRo
 */

$data  = testro_get_benefits();
$items = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();

if ( ! $items ) {
	return;
}
?>
<section class="testro-benefits" id="benefits" aria-labelledby="benefits-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-benefits__header">
			<p class="subtitle-pill testro-section-eyebrow"><?php echo esc_html( $data['eyebrow'] ); ?></p>
			<h2 id="benefits-heading" class="gradient-text main-headings"><?php echo esc_html( $data['title'] ); ?></h2>
			<p class="sub-text"><?php echo esc_html( $data['intro'] ); ?></p>
		</header>

		<ul class="testro-benefits__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<li class="testro-benefits__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 55 ) ); ?>ms">
					<span class="testro-benefits__glow" aria-hidden="true"></span>
					<?php if ( ! empty( $item['metric'] ) ) : ?>
						<span class="testro-benefits__metric"><?php echo esc_html( $item['metric'] ); ?></span>
					<?php endif; ?>
					<span class="testro-benefits__icon" aria-hidden="true">
						<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<h3 class="testro-benefits__title"><?php echo esc_html( $item['title'] ); ?></h3>
					<p class="testro-benefits__desc"><?php echo esc_html( $item['description'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
