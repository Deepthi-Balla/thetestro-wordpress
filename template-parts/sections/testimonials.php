<?php
/**
 * Testimonials section — 3D coverflow carousel (matches reference).
 *
 * Optional $args: eyebrow, title, intro.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'Teams across 50+ countries use theTestRo', 'testro' );
$title   = isset( $args['title'] ) ? (string) $args['title'] : __( 'What Our Clients Says About Us', 'testro' );
$intro   = isset( $args['intro'] ) ? (string) $args['intro'] : __( "Trusted by teams worldwide, theTestRo has revolutionized their testing processes. Here's what some of our clients have to say about their experience with us.", 'testro' );

// The default heading is tuned to sit on one line; overrides may need to wrap.
$heading_class = isset( $args['title'] ) ? ' testro-testimonials__heading--wrap' : '';

$testimonials = array_values(
	array_filter(
		testro_get_testimonials(),
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
		<div class="testro-container">
			<header class="testro-testimonials__header">
				<?php if ( '' !== $eyebrow ) : ?>
					<div class="testro-testimonials__eyebrow-wrap">
						<p class="subtitle-pill testro-section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
					</div>
				<?php endif; ?>
				<h2 id="testimonials-heading" class="gradient-text main-headings testro-testimonials__heading<?php echo esc_attr( $heading_class ); ?>"><?php echo esc_html( $title ); ?></h2>
				<p class="sub-text testro-testimonials__desc"><?php echo esc_html( $intro ); ?></p>
			</header>

			<div
				class="testro-testimonials__stage"
				data-testimonials-stage
				role="region"
				aria-roledescription="carousel"
				aria-label="<?php esc_attr_e( 'Client testimonials', 'testro' ); ?>"
			>
				<span class="testro-testimonials__deco testro-testimonials__deco--tl" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" width="16" height="16">
						<circle cx="2" cy="2" r="2" fill="currentColor"></circle>
						<circle cx="12" cy="2" r="2" fill="currentColor"></circle>
						<circle cx="2" cy="12" r="2" fill="currentColor"></circle>
						<circle cx="12" cy="12" r="2" fill="currentColor"></circle>
					</svg>
				</span>
				<span class="testro-testimonials__deco testro-testimonials__deco--br" aria-hidden="true">
					<svg viewBox="0 0 24 24" fill="none" width="16" height="16">
						<circle cx="2" cy="2" r="2" fill="currentColor"></circle>
						<circle cx="12" cy="2" r="2" fill="currentColor"></circle>
						<circle cx="2" cy="12" r="2" fill="currentColor"></circle>
						<circle cx="12" cy="12" r="2" fill="currentColor"></circle>
					</svg>
				</span>

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
							aria-hidden="<?php echo 0 === $index ? 'false' : 'true'; ?>"
							tabindex="<?php echo 0 === $index ? '0' : '-1'; ?>"
						>
							<article class="testro-testimonials__card">
								<span class="testro-testimonials__quote-deco" aria-hidden="true">”</span>

								<div class="testro-testimonials__body">
									<header class="testro-testimonials__identity">
										<span class="testro-testimonials__quote-icon" aria-hidden="true">“</span>
										<div class="testro-testimonials__identity-meta">
											<h3 class="testro-testimonials__name"><?php echo esc_html( $item['name'] ); ?></h3>
											<?php if ( ! empty( $item['role'] ) ) : ?>
												<span class="testro-testimonials__role">
													<svg class="testro-testimonials__role-icon" viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
														<path d="M16 20V6a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v14"/>
														<rect x="2" y="8" width="20" height="12" rx="2"/>
													</svg>
													<?php echo esc_html( $item['role'] ); ?>
												</span>
											<?php endif; ?>
										</div>
									</header>

									<div class="testro-testimonials__divider" aria-hidden="true">
										<span class="testro-testimonials__divider-mark">”</span>
									</div>

									<div class="testro-testimonials__quote-wrap">
										<blockquote class="testro-testimonials__quote">
											<p><?php echo wp_kses( testro_highlight_brand_name( $item['quote'] ), array( 'span' => array( 'class' => true ) ) ); ?></p>
										</blockquote>
									</div>

									<div class="testro-testimonials__rating" aria-label="<?php echo esc_attr( $rating_label ); ?>">
										<span class="testro-testimonials__rating-line" aria-hidden="true"></span>
										<span class="testro-testimonials__stars">
											<?php echo testro_render_testimonial_stars( $rating ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
										</span>
										<span class="testro-testimonials__rating-line" aria-hidden="true"></span>
									</div>
								</div>

								<span class="testro-testimonials__wave" aria-hidden="true"></span>
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
