<?php
/**
 * Resources section — blog + static resource cards.
 *
 * @package TestRo
 */

$data     = testro_get_resources();
$items    = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();
$headline = isset( $data['headline'] ) ? (string) $data['headline'] : '';
$cta      = isset( $data['cta'] ) && is_array( $data['cta'] ) ? $data['cta'] : array();

if ( ! $items ) {
	return;
}
?>
<section class="testro-resources" id="resources" aria-labelledby="resources-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-resources__header">
			<h5 id="resources-heading" class="gradient-text main-headings"><?php echo esc_html( $data['title'] ); ?></h5>
			<?php if ( '' !== $headline ) : ?>
				<p class="sub-text testro-resources__headline"><?php echo esc_html( $headline ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-resources__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<li data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 55 ) ); ?>ms">
					<a class="testro-resources__card" href="<?php echo esc_url( $item['href'] ); ?>">
						<span class="testro-resources__icon" aria-hidden="true">
							<?php
							$icon = isset( $item['icon'] ) ? $item['icon'] : 'blog';
							if ( function_exists( 'testro_nav_icon' ) ) {
								echo testro_nav_icon( $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							}
							?>
						</span>
						<?php if ( ! empty( $item['meta'] ) ) : ?>
							<span class="testro-resources__meta"><?php echo esc_html( $item['meta'] ); ?></span>
						<?php endif; ?>
						<p class="testro-resources__title"><?php echo esc_html( $item['title'] ); ?></p>
						<p class="testro-resources__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<span class="testro-resources__arrow" aria-hidden="true">
							<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if ( ! empty( $cta['label'] ) && ! empty( $cta['href'] ) ) : ?>
			<div class="testro-resources__cta">
				<?php
				get_template_part(
					'template-parts/components/primary-button',
					null,
					array(
						'label' => $cta['label'],
						'href'  => $cta['href'],
						'attrs' => array(
							'class' => 'testro-btn testro-btn--outline',
						),
					)
				);
				?>
			</div>
		<?php endif; ?>
	</div>
</section>
