<?php
/**
 * Product Demo section — two-column layout with chapter timeline and browser preview.
 *
 * @package TestRo
 */

$chapters = array(
	array(
		'time' => '0:00',
		'text' => __( 'Building a test in plain English', 'testro' ),
	),
	array(
		'time' => '1:12',
		'text' => __( 'Running across three browsers in parallel', 'testro' ),
	),
	array(
		'time' => '2:40',
		'text' => __( 'AI self-healing a broken locator, live', 'testro' ),
	),
	array(
		'time' => '3:55',
		'text' => __( 'Reviewing results and root-cause triage', 'testro' ),
	),
);
?>
<div id="videos">
	<section class="testro-videos" aria-labelledby="videos-heading" data-videos-section>
		<div class="testro-videos__inner">
			<div class="testro-videos__content" data-reveal>
				<p class="testro-videos__label"><?php esc_html_e( 'Product Demo', 'testro' ); ?></p>
				<h2 id="videos-heading" class="testro-videos__title">
					<?php esc_html_e( 'See theTestRo build, run, and heal a test — in real time.', 'testro' ); ?>
				</h2>
				<p class="testro-videos__desc">
					<?php esc_html_e( 'A four-minute walkthrough of the full loop: writing a test in plain English, running it across browsers, and watching Intelligence repair a broken selector without anyone touching a line of code.', 'testro' ); ?>
				</p>

				<?php if ( $chapters ) : ?>
					<ul class="testro-videos__rows" aria-label="<?php esc_attr_e( 'Demo chapters', 'testro' ); ?>">
						<?php foreach ( $chapters as $chapter ) : ?>
							<li class="testro-videos__row">
								<span class="testro-videos__time"><?php echo esc_html( $chapter['time'] ); ?></span>
								<span class="testro-videos__row-text"><?php echo esc_html( $chapter['text'] ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<div class="testro-videos__cta">
					<button
						type="button"
						class="testro-btn testro-btn--primary testro-videos__btn"
						data-open-modal="demo-modal"
						aria-haspopup="dialog"
						aria-controls="demo-modal"
					>
						<span><?php esc_html_e( 'Watch the Full Demo', 'testro' ); ?></span>
					</button>
				</div>
			</div>

			<div class="testro-videos__demo" data-reveal style="--reveal-delay: 120ms">
				<div class="testro-videos__frame" aria-hidden="true">
					<div class="testro-videos__browser-bar">
						<span class="testro-videos__browser-url">app.thetestro.com/demo</span>
					</div>
					<div class="testro-videos__stage">
						<div class="testro-videos__play">
							<svg class="testro-videos__play-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="currentColor" focusable="false" aria-hidden="true">
								<path d="M8 5.5v13l11-6.5z" />
							</svg>
						</div>
						<p class="testro-videos__stage-label"><?php esc_html_e( 'Live Product Recording', 'testro' ); ?></p>
						<span class="testro-videos__duration">4:12</span>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
