<?php
/**
 * Product Demo — Framer split layout (copy + video placeholder).
 *
 * @package TestRo
 */

$chapters = array(
	array(
		'time'  => '0:00',
		'label' => __( 'Building a test in plain English', 'testro' ),
	),
	array(
		'time'  => '1:12',
		'label' => __( 'Running across three browsers in parallel', 'testro' ),
	),
	array(
		'time'  => '2:40',
		'label' => __( 'AI self-healing a broken locator, live', 'testro' ),
	),
	array(
		'time'  => '3:55',
		'label' => __( 'Reviewing results and root-cause triage', 'testro' ),
	),
);

$videos   = function_exists( 'testro_get_videos' ) ? testro_get_videos() : array();
$video_id = ! empty( $videos[0]['id'] ) ? (string) $videos[0]['id'] : '';
$demo_url = $video_id
	? 'https://www.youtube.com/watch?v=' . rawurlencode( $video_id )
	: '#videos';
?>
<section class="testro-demo" id="videos" aria-labelledby="videos-heading">
	<div class="testro-container testro-demo__layout">
		<div class="testro-demo__copy">
			<p class="testro-section-eyebrow"><?php esc_html_e( 'PRODUCT DEMO', 'testro' ); ?></p>
			<h2 id="videos-heading" class="main-headings testro-demo__title">
				<?php esc_html_e( 'See theTestRo build, run, and heal a test — in real time.', 'testro' ); ?>
			</h2>
			<p class="sub-text testro-demo__desc">
				<?php esc_html_e( 'A four-minute walkthrough of the full loop: writing a test in plain English, running it across browsers, and watching Intelligence repair a broken selector without anyone touching a line of code.', 'testro' ); ?>
			</p>

			<ol class="testro-demo__chapters">
				<?php foreach ( $chapters as $chapter ) : ?>
					<li>
						<span class="testro-demo__time"><?php echo esc_html( $chapter['time'] ); ?></span>
						<span class="testro-demo__chapter"><?php echo esc_html( $chapter['label'] ); ?></span>
					</li>
				<?php endforeach; ?>
			</ol>

			<?php
			get_template_part(
				'template-parts/components/primary-button',
				null,
				array(
					'label'      => __( 'Watch the Full Demo', 'testro' ),
					'href'       => $demo_url,
					'with_arrow' => false,
					'attrs'      => array(
						'class'  => 'testro-btn testro-btn--primary',
						'target' => $video_id ? '_blank' : null,
						'rel'    => $video_id ? 'noopener noreferrer' : null,
					),
				)
			);
			?>
		</div>

		<div class="testro-demo__visual">
			<div class="testro-demo__player" role="img" aria-label="<?php esc_attr_e( 'Live product recording preview', 'testro' ); ?>">
				<div class="testro-demo__chrome">
					<span><?php esc_html_e( 'app.thetestro.com/demo', 'testro' ); ?></span>
				</div>
				<div class="testro-demo__screen">
					<span class="testro-demo__rec-icon" aria-hidden="true"></span>
					<p class="testro-demo__rec-label"><?php esc_html_e( 'LIVE PRODUCT RECORDING', 'testro' ); ?></p>
					<span class="testro-demo__rec-time"><?php esc_html_e( '4:12', 'testro' ); ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
