<?php
/**
 * Why Choose theTestRo section — intro and benefit rows.
 *
 * @package TestRo
 *
 * @var array $args {
 *     @type string $section_id Optional anchor id. Default `benefits`.
 * }
 */

$section_id = ! empty( $args['section_id'] ) ? sanitize_html_class( (string) $args['section_id'] ) : 'benefits';
$section    = testro_get_why_section();
$benefits   = testro_get_why_benefits();
?>
<div id="<?php echo esc_attr( $section_id ); ?>">
	<section class="testro-why" aria-labelledby="why-heading">
		<div class="testro-why__inner">
			<header class="testro-why__intro" data-reveal>
				<div class="testro-why__intro-left">
					<?php if ( ! empty( $section['label'] ) ) : ?>
						<p class="testro-why__label"><?php echo esc_html( $section['label'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $section['title'] ) ) : ?>
						<h2 id="why-heading" class="testro-why__heading"><?php echo esc_html( $section['title'] ); ?></h2>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $section['description'] ) ) : ?>
					<p class="testro-why__desc"><?php echo esc_html( $section['description'] ); ?></p>
				<?php endif; ?>
			</header>

			<?php if ( $benefits ) : ?>
				<ul class="testro-why__benefits">
					<?php foreach ( $benefits as $index => $benefit ) : ?>
						<?php
						$type      = isset( $benefit['type'] ) ? (string) $benefit['type'] : 'icon';
						$icon_tone = isset( $benefit['icon_tone'] ) ? (string) $benefit['icon_tone'] : '';
						$icon_cls  = 'testro-why__benefit-icon';
						if ( 'accent' === $icon_tone ) {
							$icon_cls .= ' testro-why__benefit-icon--accent';
						}
						?>
						<li
							class="testro-why__benefit"
							data-reveal
							style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms"
						>
							<div class="testro-why__benefit-visual" aria-hidden="true">
								<?php if ( 'stat' === $type && ! empty( $benefit['value'] ) ) : ?>
									<span class="testro-why__benefit-stat"><?php echo esc_html( (string) $benefit['value'] ); ?></span>
								<?php elseif ( ! empty( $benefit['icon'] ) ) : ?>
									<span class="<?php echo esc_attr( $icon_cls ); ?>">
										<?php echo testro_icon( (string) $benefit['icon'], array( 'size' => 32, 'stroke' => 1.75 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</span>
								<?php endif; ?>
							</div>
							<div class="testro-why__benefit-copy">
								<?php if ( ! empty( $benefit['title'] ) ) : ?>
									<h3 class="testro-why__benefit-title"><?php echo esc_html( $benefit['title'] ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $benefit['description'] ) ) : ?>
									<p class="testro-why__benefit-desc"><?php echo esc_html( $benefit['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
</div>
