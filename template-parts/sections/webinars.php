<?php
/**
 * Webinar cards grid (upcoming / on-demand).
 *
 * Expected $args:
 * - id / eyebrow / title / intro
 * - items (array) Each: status, title, description, optional href|modal|video_id, cta
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-webinars"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
			)
		);
		?>

		<ul class="testro-webinars__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$cta_label = ! empty( $item['cta'] ) ? (string) $item['cta'] : __( 'Learn More', 'testro' );
				$modal     = ! empty( $item['modal'] ) ? (string) $item['modal'] : '';
				$href      = ! empty( $item['href'] ) ? (string) $item['href'] : '';
				$video_id  = ! empty( $item['video_id'] ) ? (string) $item['video_id'] : '';
				$status    = ! empty( $item['status'] ) ? (string) $item['status'] : '';
				$title     = isset( $item['title'] ) ? (string) $item['title'] : '';
				$iframe_title = '' !== $title
					? sprintf(
						/* translators: %s: webinar title */
						__( '%s — theTestRo software testing webinar', 'testro' ),
						$title
					)
					: __( 'theTestRo software testing webinar', 'testro' );
				?>
				<li class="testro-webinars__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
					<article class="testro-webinars__article">
					<?php if ( $video_id ) : ?>
						<?php
						$embed = add_query_arg(
							array(
								'rel'            => '0',
								'modestbranding' => '1',
								'playsinline'    => '1',
							),
							'https://www.youtube.com/embed/' . rawurlencode( $video_id )
						);
						?>
						<div class="testro-webinars__media">
							<iframe
								src="<?php echo esc_url( $embed ); ?>"
								title="<?php echo esc_attr( $iframe_title ); ?>"
								loading="lazy"
								allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
								allowfullscreen
								referrerpolicy="strict-origin-when-cross-origin"
							></iframe>
						</div>
					<?php else : ?>
						<div class="testro-webinars__media testro-webinars__media--fallback" aria-hidden="true">
							<span class="testro-webinars__orb"></span>
							<?php echo testro_icon( 'video', array( 'size' => 28 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</div>
					<?php endif; ?>

					<div class="testro-webinars__body">
						<?php if ( '' !== $status ) : ?>
							<p class="testro-webinars__status"><?php echo esc_html( $status ); ?></p>
						<?php endif; ?>
						<h3 class="testro-webinars__title"><?php echo esc_html( $title ); ?></h3>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-webinars__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>

						<p class="testro-webinars__cta">
							<?php if ( $modal ) : ?>
								<button
									type="button"
									class="testro-btn testro-btn--outline testro-webinars__cta-btn"
									data-open-modal="<?php echo esc_attr( $modal ); ?>"
									aria-haspopup="dialog"
									aria-controls="<?php echo esc_attr( $modal ); ?>"
								>
									<span><?php echo esc_html( $cta_label ); ?></span>
									<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</button>
							<?php elseif ( $href ) : ?>
								<a class="testro-btn testro-btn--outline testro-webinars__cta-btn" href="<?php echo esc_url( $href ); ?>"<?php echo $video_id ? ' target="_blank" rel="noopener noreferrer"' : ''; ?>>
									<span><?php echo esc_html( $cta_label ); ?></span>
									<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</a>
							<?php endif; ?>
						</p>
					</div>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
