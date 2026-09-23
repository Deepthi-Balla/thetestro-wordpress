<?php
/**
 * Customer Stories — Framer u3x7YxmyT (gradient · ticker velocity 18 · 347×206 cards).
 *
 * Six cards: quote A ×3 + quote B ×3 (duplicated in track for seamless loop).
 *
 * @package TestRo
 */

$cards = array(
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
		'quote'   => __( '“theTestRo cut our regression testing time in half. Flaky tests? Almost gone.”', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
		'quote'   => __( '“theTestRo cut our regression testing time in half. Flaky tests? Almost gone.”', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
		'quote'   => __( '“theTestRo cut our regression testing time in half. Flaky tests? Almost gone.”', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
		'quote'   => __( '“We finally have test coverage that grows with the product, instead of slowing the release down.”', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
		'quote'   => __( '“We finally have test coverage that grows with the product, instead of slowing the release down.”', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
		'quote'   => __( '“We finally have test coverage that grows with the product, instead of slowing the release down.”', 'testro' ),
	),
);

$track_items = array_merge( $cards, $cards );
?>
<section class="testro-stories" id="testimonials" aria-labelledby="testimonials-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-section-header--three-lines testro-stories__header">
			<h2 id="testimonials-heading" class="main-headings testro-stories__title"><?php echo esc_html( testro_section_label_title( __( 'CUSTOMER STORIES', 'testro' ) ) ); ?></h2>
			<p class="sub-text testro-stories__intro"><?php esc_html_e( 'What our customers say.', 'testro' ); ?></p>
		</header>

		<div class="testro-stories__marquee" aria-label="<?php esc_attr_e( 'Customer testimonials', 'testro' ); ?>">
			<ul class="testro-stories__track">
				<?php foreach ( $track_items as $card ) : ?>
					<li class="testro-stories__card">
						<p class="testro-stories__company"><?php echo esc_html( $card['company'] ); ?></p>
						<p class="testro-stories__role"><?php echo esc_html( $card['role'] ); ?></p>
						<p class="testro-stories__stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'testro' ); ?>">★★★★★</p>
						<blockquote class="testro-stories__quote">
							<p><?php echo esc_html( $card['quote'] ); ?></p>
						</blockquote>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
