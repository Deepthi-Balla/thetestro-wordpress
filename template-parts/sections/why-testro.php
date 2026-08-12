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
				<h3 id="why-heading" class="gradient-text main-headings testro-why__heading"><?php esc_html_e( 'Why theTestRo?', 'testro' ); ?></h3>
				<p class="sub-text testro-why__intro"><?php esc_html_e( 'Old record-and-playback tools break easily. Open-source frameworks take too much setup. theTestRo fixes both problems.', 'testro' ); ?></p>
				<p class="sub-text testro-why__intro"><?php esc_html_e( "Here's what you get:", 'testro' ); ?></p>
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
							<p class="testro-why__title"><strong><?php echo esc_html( $feature['title'] ); ?></strong> — <?php echo esc_html( $feature['description'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</div>
