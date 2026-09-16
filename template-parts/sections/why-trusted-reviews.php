<?php
/**
 * Trusted Logos Row One (Framer oyx6zQLFo / Partners w9X6aEuRB / Network fPTkjCQkB).
 *
 * Horizontal ticker: logo + ★★★★☆ 4.6/5.0) — Urbuddi, Xcally, Optimworks, Sevaki, Graduway.
 * Framer tickerEffect: velocity 38, hoverModifier 0, draggable false, overflow clip.
 *
 * Args:
 * - id       (string) Section / region id.
 * - embedded (bool)   If true, render marquee only (no section/container) for nesting.
 *
 * @package TestRo
 */

if ( ! function_exists( 'testro_get_why_trusted_logos' ) ) {
	return;
}

$args      = isset( $args ) && is_array( $args ) ? $args : array();
$embedded  = ! empty( $args['embedded'] );
$reviews   = testro_get_why_trusted_logos();
if ( ! $reviews ) {
	return;
}

/* Duplicate set for seamless CSS ticker (translateX -50%). */
$track_items = array_merge( $reviews, $reviews );
$section_id  = isset( $args['id'] ) ? sanitize_title( (string) $args['id'] ) : 'why-trusted-reviews';

$marquee = static function () use ( $track_items ) {
	?>
	<div class="testro-why-reviews__marquee">
		<ul class="testro-why-reviews__track" aria-label="<?php esc_attr_e( 'Trusted customer ratings', 'testro' ); ?>">
			<?php foreach ( $track_items as $review ) : ?>
				<?php
				$name = isset( $review['name'] ) ? (string) $review['name'] : '';
				$logo = isset( $review['logo'] ) ? $review['logo'] : '';
				if ( '' === $name || '' === $logo ) {
					continue;
				}
				?>
				<li class="testro-why-reviews__card">
					<div class="testro-why-reviews__logo-frame">
						<?php
						echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							$logo,
							$name,
							array(
								'width'   => 170,
								'height'  => 72,
								'class'   => 'testro-why-reviews__logo',
								'loading' => 'lazy',
							)
						);
						?>
					</div>
					<p class="testro-why-reviews__rating" aria-label="<?php esc_attr_e( 'Rated 4.6 out of 5', 'testro' ); ?>">
						<span class="testro-why-reviews__stars" aria-hidden="true">★★★★☆</span>
						<span><?php esc_html_e( '4.6/5.0)', 'testro' ); ?></span>
					</p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
};

if ( $embedded ) :
	?>
	<div class="testro-why-reviews testro-why-reviews--embedded" id="<?php echo esc_attr( $section_id ); ?>">
		<?php $marquee(); ?>
	</div>
	<?php
	return;
endif;
?>
<section
	class="testro-why-reviews"
	id="<?php echo esc_attr( $section_id ); ?>"
	aria-label="<?php esc_attr_e( 'Trusted customer ratings', 'testro' ); ?>"
>
	<div class="testro-container testro-why-reviews__inner">
		<?php $marquee(); ?>
	</div>
</section>
