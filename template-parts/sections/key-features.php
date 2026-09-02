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
	<div class="testro-key-features__inner">
		<header class="testro-key-features__header" data-reveal>
			<p class="testro-key-features__label"><?php esc_html_e( 'Key Features', 'testro' ); ?></p>
			<h2 id="key-features-heading" class="testro-key-features__heading"><?php esc_html_e( 'Everything you need, built in.', 'testro' ); ?></h2>
		</header>

		<ul class="testro-key-features__grid">
			<?php foreach ( $features as $index => $feature ) : ?>
				<li data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 40 ) ); ?>ms">
					<a class="testro-key-features__card" href="<?php echo esc_url( $feature['href'] ); ?>">
						<span class="testro-key-features__icon" aria-hidden="true">
							<?php echo testro_icon( $feature['icon'], array( 'size' => 20, 'stroke' => 1.75 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<p class="testro-key-features__card-title"><?php echo esc_html( $feature['title'] ); ?></p>
						<p class="testro-key-features__desc"><?php echo esc_html( $feature['description'] ); ?></p>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
