<?php
/**
 * Why theTestRo — Framer G3gbasgpx (old 0.72fr + new 1fr · gap 24 · pad 26/24 · r16).
 *
 * @package TestRo
 */

$features = testro_get_why_features();
$old_way  = array(
	__( 'Record-and-playback tools that break with every UI change', 'testro' ),
	__( 'Open-source frameworks that take too much setup', 'testro' ),
);
$old_img  = testro_asset( 'images/home/why-old-way.png' );
$check_img = testro_asset( 'images/home/why-check.png' );
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
				<article class="testro-why__panel testro-why__panel--old testro-card--top-line">
					<div class="testro-why__illustration">
						<img
							src="<?php echo esc_url( $old_img ); ?>"
							alt=""
							width="347"
							height="253"
							loading="lazy"
							decoding="async"
						/>
					</div>
					<p class="testro-why__panel-label testro-why__panel-label--old"><?php esc_html_e( 'THE OLD WAY', 'testro' ); ?></p>
					<ul class="testro-why__old-list">
						<?php foreach ( $old_way as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>

				<article class="testro-why__panel testro-why__panel--new testro-card--top-line">
					<p class="testro-why__panel-label testro-why__panel-label--new"><?php esc_html_e( 'THE THETESTRO WAY', 'testro' ); ?></p>
					<ul class="testro-why__new-list">
						<?php foreach ( $features as $feature ) : ?>
							<li>
								<img
									class="testro-why__check-img"
									src="<?php echo esc_url( $check_img ); ?>"
									alt=""
									width="19"
									height="20"
									loading="lazy"
									decoding="async"
									aria-hidden="true"
								/>
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
