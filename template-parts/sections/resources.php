<?php
/**
 * Resources section — blog + static resource cards.
 *
 * @package TestRo
 */

$data  = testro_get_resources();
$items = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();

if ( ! $items ) {
	return;
}
?>
<section class="testro-resources" id="resources" aria-labelledby="resources-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-resources__header">
			<p class="subtitle-pill testro-section-eyebrow"><?php echo esc_html( $data['eyebrow'] ); ?></p>
			<h2 id="resources-heading" class="gradient-text main-headings"><?php echo esc_html( $data['title'] ); ?></h2>
			<p class="sub-text"><?php echo esc_html( $data['intro'] ); ?></p>
		</header>

		<ul class="testro-resources__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<li data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 55 ) ); ?>ms">
					<a class="testro-resources__card" href="<?php echo esc_url( $item['href'] ); ?>">
						<span class="testro-resources__icon" aria-hidden="true">
							<?php
							$icon = isset( $item['icon'] ) ? $item['icon'] : 'blog';
							if ( function_exists( 'testro_nav_icon' ) ) {
								echo testro_nav_icon( $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							}
							?>
						</span>
						<?php if ( ! empty( $item['meta'] ) ) : ?>
							<span class="testro-resources__meta"><?php echo esc_html( $item['meta'] ); ?></span>
						<?php endif; ?>
						<h3 class="testro-resources__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="testro-resources__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<span class="testro-resources__arrow" aria-hidden="true">
							<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
