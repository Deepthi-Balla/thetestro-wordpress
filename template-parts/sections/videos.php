<?php
/**
 * YouTube videos section — carousel matching theTestRo reference.
 *
 * @package TestRo
 */

$videos = testro_get_videos();
$count  = count( $videos );
?>
<div id="videos">
	<section class="testro-videos" aria-labelledby="videos-heading" data-videos-section>
		<div class="testro-container">
			<header class="testro-videos__header">
				<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Product demo', 'testro' ); ?></p>
				<h2 id="videos-heading" class="gradient-text main-headings testro-videos__heading"><?php esc_html_e( 'See theTestRo in action', 'testro' ); ?></h2>
				<p class="sub-text testro-videos__desc"><?php esc_html_e( 'Watch product demos and walkthroughs that show how AI-powered no-code automation fits into your QA workflow—from authoring to CI/CD.', 'testro' ); ?></p>
			</header>

			<div class="testro-videos__carousel-wrap">
				<div
					class="testro-videos__carousel"
					data-videos-carousel
					role="region"
					aria-roledescription="carousel"
					aria-label="<?php esc_attr_e( 'theTestRo video demos', 'testro' ); ?>"
				>
					<div class="testro-videos__viewport" data-videos-viewport>
						<ul class="testro-videos__track" data-videos-track>
							<?php foreach ( $videos as $index => $video ) : ?>
								<?php
								$embed = add_query_arg(
									array(
										'rel'            => '0',
										'modestbranding' => '1',
										'playsinline'    => '1',
									),
									'https://www.youtube.com/embed/' . rawurlencode( $video['id'] )
								);
								$is_active = 0 === $index;
								?>
								<li
									class="testro-videos__slide<?php echo $is_active ? ' is-active' : ''; ?>"
									data-videos-slide
									data-video-index="<?php echo esc_attr( (string) $index ); ?>"
									role="group"
									aria-roledescription="slide"
									aria-label="<?php echo esc_attr( sprintf( /* translators: 1: slide number, 2: total */ __( 'Video %1$d of %2$d', 'testro' ), $index + 1, $count ) ); ?>"
								>
									<div class="testro-videos__card<?php echo $is_active ? ' is-active' : ''; ?>">
										<div class="testro-videos__embed">
											<iframe
												src="<?php echo esc_url( $embed ); ?>"
												title="<?php echo esc_attr( $video['title'] ); ?>"
												loading="lazy"
												allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
												allowfullscreen
												referrerpolicy="strict-origin-when-cross-origin"
											></iframe>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>

					<?php if ( $count > 1 ) : ?>
						<div class="testro-videos__dots" data-videos-dots role="tablist" aria-label="<?php esc_attr_e( 'Video slides', 'testro' ); ?>">
							<?php for ( $i = 0; $i < $count; $i++ ) : ?>
								<button
									type="button"
									class="testro-videos__dot<?php echo 0 === $i ? ' is-active' : ''; ?>"
									data-videos-dot
									data-video-index="<?php echo esc_attr( (string) $i ); ?>"
									aria-label="<?php echo esc_attr( sprintf( /* translators: %d: video number */ __( 'Go to video %d', 'testro' ), $i + 1 ) ); ?>"
									aria-current="<?php echo 0 === $i ? 'true' : 'false'; ?>"
								></button>
							<?php endfor; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="testro-videos__cta">
				<button
					type="button"
					class="testro-btn testro-btn--outline"
					data-open-modal="demo-modal"
					aria-haspopup="dialog"
					aria-controls="demo-modal"
				>
					<span><?php esc_html_e( 'Schedule a personalized walkthrough', 'testro' ); ?></span>
				</button>
			</div>
		</div>
	</section>
</div>
