<?php
/**
 * Split journey section — SectionHeader left, stacked journey blocks right.
 *
 * Expected $args:
 * - id / eyebrow / title / intro / heading_level
 * - items (array[]) Each:
 *     - visual      (string) 'steps' | 'icon'. Default 'icon'.
 *     - steps       (int)    When visual is steps. Default 4.
 *     - active_step (int)    When visual is steps. Default 1.
 *     - icon        (string) Icon name when visual is icon.
 *     - title       (string)
 *     - description (string) Optional.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$id            = isset( $args['id'] ) ? sanitize_title( (string) $args['id'] ) : '';
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$items         = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_id    = $id ? $id . '-heading' : '';

if ( '' === $title && ! $items ) {
	return;
}
?>
<section
	class="testro-page-section testro-journey-split"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-page-section__inner testro-journey-split__inner">
		<div class="testro-journey-split__intro">
			<?php
			get_template_part(
				'template-parts/components/section-header',
				null,
				array(
					'label'             => $eyebrow,
					'heading'           => $title,
					'description'       => $intro,
					'heading_id'        => $heading_id,
					'heading_level'     => $heading_level,
					'label_color'       => 'var(--color-brand-sky)',
					'heading_color'     => 'var(--color-brand-navy)',
					'description_color' => '#5B7290',
					'attrs'             => array(
						'data-reveal' => true,
					),
				)
			);
			?>
		</div>

		<?php if ( $items ) : ?>
			<ul class="testro-journey-split__blocks">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$visual      = isset( $item['visual'] ) && 'steps' === $item['visual'] ? 'steps' : 'icon';
					$item_title  = isset( $item['title'] ) ? (string) $item['title'] : '';
					$item_desc   = isset( $item['description'] ) ? (string) $item['description'] : '';
					$item_icon   = isset( $item['icon'] ) ? (string) $item['icon'] : '';
					$steps       = isset( $item['steps'] ) ? (int) $item['steps'] : 4;
					$active_step = isset( $item['active_step'] ) ? (int) $item['active_step'] : 1;
					?>
					<li
						class="testro-journey-split__block"
						data-reveal
						style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms"
					>
						<?php if ( 'steps' === $visual ) : ?>
							<?php
							get_template_part(
								'template-parts/components/step-pill',
								null,
								array(
									'steps'       => $steps,
									'active_step' => $active_step,
								)
							);
							?>
						<?php elseif ( '' !== $item_icon ) : ?>
							<span class="testro-journey-split__icon" aria-hidden="true">
								<?php echo testro_icon( $item_icon, array( 'size' => 22, 'stroke' => 2 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>

						<?php if ( '' !== $item_title ) : ?>
							<p class="testro-feature-card__title testro-journey-split__title"><?php echo esc_html( $item_title ); ?></p>
						<?php endif; ?>

						<?php if ( '' !== $item_desc ) : ?>
							<p class="testro-feature-card__desc testro-journey-split__desc"><?php echo esc_html( $item_desc ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
