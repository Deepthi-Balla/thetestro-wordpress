<?php
/**
 * How it works section.
 *
 * @package TestRo
 */

$steps = testro_get_how_it_works();
$count = count( $steps );
$is_timeline = ( 5 === $count );
?>
<div id="how-it-works">
	<section
		class="testro-how how-it-works-container testro-how--count-<?php echo esc_attr( (string) $count ); ?><?php echo $is_timeline ? ' testro-how--timeline' : ''; ?>"
		aria-labelledby="how-heading"
		data-how-section
	>
		<div class="testro-container">
			<header class="testro-how__header">
				<div class="testro-how__eyebrow-wrap">
					<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Simple, fast, reliable testing', 'testro' ); ?></p>
				</div>
				<h2 id="how-heading" class="main-headings testro-how__title-heading"><?php esc_html_e( 'How theTestRo Works', 'testro' ); ?></h2>
				<p class="testro-how__intro"><?php esc_html_e( 'From discovery to continuous optimization—five clear steps that turn ideas into reliable, AI-assisted automation without friction.', 'testro' ); ?></p>
			</header>

			<div class="testro-how__stage">
				<ol class="testro-how__steps">
					<?php foreach ( $steps as $index => $step ) : ?>
						<li
							class="testro-how__step"
							style="--how-delay: <?php echo esc_attr( (string) ( $index * 120 ) ); ?>ms;"
							data-reveal
						>
							<article class="testro-how__card">
								<div class="testro-how__card-header">
									<p class="testro-how__step-label"><?php echo esc_html( $step['step'] ); ?></p>
									<span class="testro-how__step-num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
									<h3 class="testro-how__title"><?php echo esc_html( $step['title'] ); ?></h3>
								</div>
								<div class="testro-how__card-body">
									<p class="testro-how__desc"><?php echo esc_html( $step['description'] ); ?></p>
								</div>
							</article>
							<?php if ( $is_timeline && $index < $count - 1 ) : ?>
								<span class="testro-how__connector" aria-hidden="true">
									<svg class="testro-how__connector-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
										<path d="M5 12h14M13 6l6 6-6 6"/>
									</svg>
								</span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>
</div>
