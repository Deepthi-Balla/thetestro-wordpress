<?php
/**
 * Key features grid — Framer bordered cards with accent tab.
 *
 * @package TestRo
 */

$features = testro_get_key_features();
if ( ! $features ) {
	return;
}
?>
<section class="testro-key-features testro-key-features--framer" id="key-features" aria-labelledby="key-features-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-key-features__header">
			<p class="testro-section-eyebrow"><?php esc_html_e( 'KEY FEATURES', 'testro' ); ?></p>
			<h2 id="key-features-heading" class="main-headings"><?php esc_html_e( 'Everything you need, built in.', 'testro' ); ?></h2>
		</header>

		<ul class="testro-key-features__grid">
			<?php foreach ( $features as $feature ) : ?>
				<li>
					<a class="testro-key-features__card" href="<?php echo esc_url( $feature['href'] ); ?>">
						<span class="testro-key-features__accent" aria-hidden="true"></span>
						<span class="testro-key-features__icon" aria-hidden="true">
							<?php echo testro_nav_icon( $feature['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<span class="testro-key-features__body">
							<strong class="testro-key-features__title"><?php echo esc_html( $feature['title'] ); ?></strong>
							<span class="testro-key-features__desc"><?php echo esc_html( $feature['description'] ); ?></span>
						</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
