<?php
/**
 * Why theTestRo — Framer Old Way vs theTestRo Way comparison.
 *
 * @package TestRo
 */

$features = testro_get_why_features();
$old_way  = array(
	__( 'Record-and-playback tools that break with every UI change', 'testro' ),
	__( 'Open-source frameworks that take too much setup', 'testro' ),
);
?>
<div id="why-the-testro">
	<section class="testro-why testro-why--compare" aria-labelledby="why-heading">
		<div class="testro-container">
			<header class="testro-section-header testro-why__header">
				<p class="testro-section-eyebrow"><?php esc_html_e( 'WHY THETESTRO', 'testro' ); ?></p>
				<h2 id="why-heading" class="main-headings testro-why__heading"><?php esc_html_e( 'Built to replace five tools with one.', 'testro' ); ?></h2>
				<p class="sub-text testro-why__intro"><?php esc_html_e( 'Old record-and-playback tools break easily. Open-source frameworks take too much setup. theTestRo fixes both problems.', 'testro' ); ?></p>
			</header>

			<div class="testro-why__compare">
				<article class="testro-why__panel testro-why__panel--old">
					<div class="testro-why__illustration" aria-hidden="true">
						<span class="testro-why__broken-window"></span>
					</div>
					<p class="testro-why__panel-label"><?php esc_html_e( 'THE OLD WAY', 'testro' ); ?></p>
					<ul class="testro-why__old-list">
						<?php foreach ( $old_way as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>

				<article class="testro-why__panel testro-why__panel--new">
					<p class="testro-why__panel-label"><?php esc_html_e( 'THE THETESTRO WAY', 'testro' ); ?></p>
					<ul class="testro-why__new-list">
						<?php foreach ( $features as $feature ) : ?>
							<li>
								<span class="testro-why__check" aria-hidden="true">
									<svg viewBox="0 0 20 20" width="18" height="18" fill="none" aria-hidden="true">
										<circle cx="10" cy="10" r="10" fill="#16A34A"/>
										<path d="M6 10.2 8.6 12.8 14 7.4" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</span>
								<p>
									<strong><?php echo esc_html( $feature['title'] ); ?></strong>
									— <?php echo esc_html( $feature['description'] ); ?>
								</p>
							</li>
						<?php endforeach; ?>
					</ul>
				</article>
			</div>
		</div>
	</section>
</div>
