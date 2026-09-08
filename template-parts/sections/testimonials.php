<?php
/**
 * Customer Stories — Framer gradient glass cards.
 *
 * @package TestRo
 */

$quote = __( '“theTestRo cut our regression testing time in half. Flaky tests? Almost gone.”', 'testro' );
$cards = array(
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
	),
	array(
		'company' => __( 'Company Name', 'testro' ),
		'role'    => __( 'QA Lead', 'testro' ),
	),
);
?>
<section class="testro-stories" id="testimonials" aria-labelledby="testimonials-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-stories__header">
			<p class="testro-section-eyebrow testro-stories__eyebrow"><?php esc_html_e( 'CUSTOMER STORIES', 'testro' ); ?></p>
			<h2 id="testimonials-heading" class="main-headings testro-stories__title"><?php esc_html_e( 'What our customers say.', 'testro' ); ?></h2>
			<p class="sub-text testro-stories__intro">
				<?php esc_html_e( 'Quality leaders use theTestRo to make every release feel more predictable.', 'testro' ); ?>
			</p>
		</header>

		<ul class="testro-stories__grid">
			<?php foreach ( $cards as $card ) : ?>
				<li class="testro-stories__card">
					<p class="testro-stories__company"><?php echo esc_html( $card['company'] ); ?></p>
					<p class="testro-stories__role"><?php echo esc_html( $card['role'] ); ?></p>
					<p class="testro-stories__stars" aria-label="<?php esc_attr_e( '5 out of 5 stars', 'testro' ); ?>">★★★★★</p>
					<blockquote class="testro-stories__quote">
						<p><?php echo esc_html( $quote ); ?></p>
					</blockquote>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
