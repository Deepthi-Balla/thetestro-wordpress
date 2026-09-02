<?php
/**
 * How it works section.
 *
 * @package TestRo
 */

$section = testro_get_how_it_works_section();
$steps   = testro_get_how_it_works();
$count   = count( $steps );

if ( ! $steps ) {
	return;
}
?>
<div id="how-it-works">
	<section
		class="testro-how how-it-works-container testro-how--count-<?php echo esc_attr( (string) $count ); ?>"
		aria-labelledby="how-heading"
	>
		<div class="testro-how__inner">
			<header class="testro-how__intro" data-reveal>
				<?php if ( ! empty( $section['label'] ) ) : ?>
					<p class="testro-how__label"><?php echo esc_html( $section['label'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $section['title'] ) ) : ?>
					<h2 id="how-heading" class="testro-how__heading"><?php echo esc_html( $section['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $section['description'] ) ) : ?>
					<p class="testro-how__desc"><?php echo esc_html( $section['description'] ); ?></p>
				<?php endif; ?>
			</header>

			<ol class="testro-how__steps">
				<?php foreach ( $steps as $index => $step ) : ?>
					<li
						class="testro-how__step"
						style="--how-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms;"
						data-reveal
					>
						<article class="testro-how__card">
							<span class="testro-how__num" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<?php if ( ! empty( $step['title'] ) ) : ?>
								<h3 class="testro-how__title"><?php echo esc_html( $step['title'] ); ?></h3>
							<?php endif; ?>
							<?php if ( ! empty( $step['description'] ) ) : ?>
								<p class="testro-how__text"><?php echo esc_html( $step['description'] ); ?></p>
							<?php endif; ?>
							<?php if ( ! empty( $step['supporting'] ) ) : ?>
								<p class="testro-how__tag"><?php echo esc_html( $step['supporting'] ); ?></p>
							<?php endif; ?>
						</article>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</section>
</div>
