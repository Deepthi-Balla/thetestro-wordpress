<?php
/**
 * Key features grid — linked cards to product and feature pages.
 *
 * @package TestRo
 */

$features = testro_get_key_features();
if ( ! $features ) {
	return;
}
?>
<section class="testro-key-features" id="key-features" aria-labelledby="key-features-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-key-features__header">
			<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Platform capabilities', 'testro' ); ?></p>
			<h2 id="key-features-heading" class="gradient-text main-headings"><?php esc_html_e( 'Key features for modern test automation', 'testro' ); ?></h2>
			<p class="sub-text"><?php esc_html_e( 'Explore the products and features that help teams author, execute, heal, and analyze tests at enterprise scale.', 'testro' ); ?></p>
		</header>

		<ul class="testro-key-features__grid">
			<?php foreach ( $features as $index => $feature ) : ?>
				<li data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 40 ) ); ?>ms">
					<a class="testro-key-features__card" href="<?php echo esc_url( $feature['href'] ); ?>">
						<span class="testro-key-features__icon" aria-hidden="true">
							<?php echo testro_nav_icon( $feature['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<span class="testro-key-features__body">
							<h3 class="testro-key-features__title"><?php echo esc_html( $feature['title'] ); ?></h3>
							<p class="testro-key-features__desc"><?php echo esc_html( $feature['description'] ); ?></p>
						</span>
						<span class="testro-key-features__arrow" aria-hidden="true">
							<?php echo testro_icon( 'arrow-right', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
