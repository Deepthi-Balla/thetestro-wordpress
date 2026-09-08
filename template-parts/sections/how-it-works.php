<?php
/**
 * How it works — Framer four-step flow.
 *
 * @package TestRo
 */

$steps = testro_get_how_it_works();
$count = count( $steps );
?>
<div id="how-it-works">
	<section class="testro-how testro-how--framer" aria-labelledby="how-heading">
		<div class="testro-container">
			<header class="testro-section-header testro-how__header">
				<p class="testro-section-eyebrow"><?php esc_html_e( 'HOW IT WORKS', 'testro' ); ?></p>
				<h2 id="how-heading" class="main-headings testro-how__title-heading"><?php esc_html_e( 'From plain English to production-ready tests.', 'testro' ); ?></h2>
				<p class="sub-text testro-how__headline"><?php esc_html_e( 'Anyone can automate. Record, play, automate — one connected workflow, no separate tools to stitch together.', 'testro' ); ?></p>
			</header>

			<ol class="testro-how__flow" style="--how-count: <?php echo esc_attr( (string) max( 1, $count ) ); ?>">
				<?php foreach ( $steps as $index => $step ) : ?>
					<li class="testro-how__flow-item">
						<span class="testro-how__flow-num" aria-hidden="true"><?php echo esc_html( isset( $step['step'] ) ? $step['step'] : sprintf( '%02d', $index + 1 ) ); ?></span>
						<h3 class="testro-how__flow-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p class="testro-how__flow-desc"><?php echo esc_html( $step['description'] ); ?></p>
						<?php if ( ! empty( $step['tag'] ) ) : ?>
							<p class="testro-how__flow-tag"><?php echo esc_html( $step['tag'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>
</div>
