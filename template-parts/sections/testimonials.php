<?php
/**
 * Customer Stories / testimonials — gradient section + horizontal cards.
 *
 * Optional $args: label, heading, headline|intro, description, heading_level (1–6, default 2).
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();

$label = isset( $args['label'] ) ? (string) $args['label'] : __( 'CUSTOMER STORIES', 'testro' );

if ( isset( $args['heading'] ) ) {
	$heading = (string) $args['heading'];
} elseif ( isset( $args['headline'] ) ) {
	$heading = (string) $args['headline'];
} elseif ( isset( $args['intro'] ) ) {
	$heading = (string) $args['intro'];
} elseif ( isset( $args['title'] ) ) {
	$heading = (string) $args['title'];
} else {
	$heading = __( 'What our customers say.', 'testro' );
}

$description = isset( $args['description'] )
	? (string) $args['description']
	: __( 'Quality leaders use theTestRo to make every release feel more predictable.', 'testro' );

$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag   = 'h' . $heading_level;

$testimonials = array_values(
	array_filter(
		array_slice( testro_get_testimonials(), 0, 5 ),
		static function ( $item ) {
			return ! empty( $item['name'] ) && ! empty( $item['quote'] );
		}
	)
);
$count = count( $testimonials );
if ( $count < 1 ) {
	return;
}
?>
<div id="testimonials">
	<section class="testro-testimonials" aria-labelledby="testimonials-heading" data-testimonials>
		<div class="testro-testimonials__inner">
			<header class="testro-testimonials__header">
				<?php if ( '' !== $label ) : ?>
					<p class="testro-testimonials__label"><?php echo esc_html( $label ); ?></p>
				<?php endif; ?>
				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag name is derived from a numeric arg. ?>
				<<?php echo $heading_tag; ?> id="testimonials-heading" class="testro-testimonials__heading"><?php echo esc_html( $heading ); ?></<?php echo $heading_tag; ?>>
				<?php if ( '' !== $description ) : ?>
					<p class="testro-testimonials__desc"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</header>

			<div
				class="testro-testimonials__stage"
				data-testimonials-stage
				role="region"
				aria-roledescription="carousel"
				aria-label="<?php esc_attr_e( 'Customer stories', 'testro' ); ?>"
			>
				<ul class="testro-testimonials__track" data-testimonials-track>
					<?php foreach ( $testimonials as $index => $item ) : ?>
						<?php
						$rating       = isset( $item['rating'] ) ? (float) $item['rating'] : 5;
						$rating_label = sprintf(
							/* translators: %s: rating value e.g. 4.5 */
							__( '%s out of 5 stars', 'testro' ),
							rtrim( rtrim( number_format( $rating, 1, '.', '' ), '0' ), '.' )
						);
						?>
						<li
							class="testro-testimonials__slide<?php echo 0 === $index ? ' is-active' : ''; ?>"
							data-testimonial-index="<?php echo esc_attr( (string) $index ); ?>"
							role="group"
							aria-roledescription="slide"
							aria-label="<?php echo esc_attr( sprintf( /* translators: 1: slide number, 2: total */ __( 'Testimonial %1$d of %2$d', 'testro' ), $index + 1, $count ) ); ?>"
						>
							<article class="testro-testimonials__card">
								<p class="testro-testimonials__company"><?php echo esc_html( $item['name'] ); ?></p>
								<?php if ( ! empty( $item['role'] ) ) : ?>
									<p class="testro-testimonials__role"><?php echo esc_html( $item['role'] ); ?></p>
								<?php endif; ?>
								<div class="testro-testimonials__rating" aria-label="<?php echo esc_attr( $rating_label ); ?>">
									<span class="testro-testimonials__stars">
										<?php echo testro_render_testimonial_stars( $rating, 'light' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									</span>
								</div>
								<blockquote class="testro-testimonials__quote">
									<p><?php echo wp_kses( testro_highlight_brand_name( $item['quote'] ), array( 'span' => array( 'class' => true ) ) ); ?></p>
								</blockquote>
							</article>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php if ( $count > 1 ) : ?>
					<div class="testro-testimonials__dots" data-testimonials-dots role="tablist" aria-label="<?php esc_attr_e( 'Testimonial slides', 'testro' ); ?>">
						<?php for ( $i = 0; $i < $count; $i++ ) : ?>
							<button
								type="button"
								class="testro-testimonials__dot<?php echo 0 === $i ? ' is-active' : ''; ?>"
								data-testimonials-dot
								data-testimonial-index="<?php echo esc_attr( (string) $i ); ?>"
								aria-label="<?php echo esc_attr( sprintf( /* translators: %d: testimonial number */ __( 'Go to testimonial %d', 'testro' ), $i + 1 ) ); ?>"
								aria-current="<?php echo 0 === $i ? 'true' : 'false'; ?>"
							></button>
						<?php endfor; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
