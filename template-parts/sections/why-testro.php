<?php
/**
 * Why theTestRo section — feature cards with hover fill (matches reference).
 *
 * @package TestRo
 */

$features = testro_get_why_features();
?>
<div id="why-the-testro">
	<section class="testro-why" aria-labelledby="why-heading">
		<div class="testro-container">
			<header class="testro-why__header">
				<div class="testro-why__eyebrow-wrap">
					<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Zero-code, full automation only with theTestRo', 'testro' ); ?></p>
				</div>
				<h2 id="why-heading" class="gradient-text main-headings testro-why__heading"><?php esc_html_e( 'Why Teams Love theTestRo', 'testro' ); ?></h2>
				<p class="sub-text testro-why__intro"><?php esc_html_e( "Automation shouldn't be complicated—and with Testro, it isn't. We designed every part of the platform so you can build, launch, and maintain automations without touching a single line of code.", 'testro' ); ?></p>
			</header>

			<ul class="testro-why__grid">
				<?php foreach ( $features as $feature ) : ?>
					<li class="testro-why__card" tabindex="0">
						<span class="testro-why__fill" aria-hidden="true"></span>
						<div class="testro-why__body">
							<div class="testro-why__icon" aria-hidden="true">
								<?php
								// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- trusted SVG from theme helper.
								echo testro_get_why_icon_svg( $feature['icon'] );
								?>
							</div>
							<h3 class="testro-why__title"><?php echo esc_html( $feature['title'] ); ?></h3>
							<p class="testro-why__desc"><?php echo esc_html( $feature['description'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</div>
