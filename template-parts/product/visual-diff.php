<?php
/**
 * Product page visual regression mock — before / after / diff + feature cards.
 *
 * Expected $args: id, eyebrow, title, intro, before (label/note), after
 * (label/note), diff (label/change), items (array[] of icon/title/description).
 *
 * @package TestRo
 */

$args   = isset( $args ) && is_array( $args ) ? $args : array();
$before = isset( $args['before'] ) && is_array( $args['before'] ) ? $args['before'] : array();
$after  = isset( $args['after'] ) && is_array( $args['after'] ) ? $args['after'] : array();
$diff   = isset( $args['diff'] ) && is_array( $args['diff'] ) ? $args['diff'] : array();
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id     = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $before && ! $after && ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-section--tint testro-prod-vdiff"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
			)
		);
		?>

		<div class="testro-prod-vdiff__compare" data-reveal role="img" aria-label="<?php esc_attr_e( 'Visual regression comparison showing baseline, current build, and highlighted differences', 'testro' ); ?>">
			<figure class="testro-prod-vdiff__frame testro-prod-vdiff__frame--before">
				<figcaption>
					<span><?php echo esc_html( isset( $before['label'] ) ? $before['label'] : __( 'Baseline', 'testro' ) ); ?></span>
					<?php if ( ! empty( $before['note'] ) ) : ?>
						<em><?php echo esc_html( $before['note'] ); ?></em>
					<?php endif; ?>
				</figcaption>
				<div class="testro-prod-vdiff__screen" aria-hidden="true">
					<span class="testro-prod-vdiff__nav"></span>
					<span class="testro-prod-vdiff__hero"></span>
					<span class="testro-prod-vdiff__row">
						<i></i><i></i><i></i>
					</span>
				</div>
			</figure>

			<figure class="testro-prod-vdiff__frame testro-prod-vdiff__frame--after">
				<figcaption>
					<span><?php echo esc_html( isset( $after['label'] ) ? $after['label'] : __( 'Current build', 'testro' ) ); ?></span>
					<?php if ( ! empty( $after['note'] ) ) : ?>
						<em><?php echo esc_html( $after['note'] ); ?></em>
					<?php endif; ?>
				</figcaption>
				<div class="testro-prod-vdiff__screen" aria-hidden="true">
					<span class="testro-prod-vdiff__nav"></span>
					<span class="testro-prod-vdiff__hero testro-prod-vdiff__hero--shifted"></span>
					<span class="testro-prod-vdiff__row">
						<i></i><i class="is-changed"></i><i></i>
					</span>
					<span class="testro-prod-vdiff__hotspot testro-prod-vdiff__hotspot--a"></span>
					<span class="testro-prod-vdiff__hotspot testro-prod-vdiff__hotspot--b"></span>
				</div>
			</figure>

			<figure class="testro-prod-vdiff__frame testro-prod-vdiff__frame--diff">
				<figcaption>
					<span><?php echo esc_html( isset( $diff['label'] ) ? $diff['label'] : __( 'Visual diff', 'testro' ) ); ?></span>
					<?php if ( ! empty( $diff['change'] ) ) : ?>
						<em><?php echo esc_html( $diff['change'] ); ?></em>
					<?php endif; ?>
				</figcaption>
				<div class="testro-prod-vdiff__screen testro-prod-vdiff__screen--diff" aria-hidden="true">
					<span class="testro-prod-vdiff__nav"></span>
					<span class="testro-prod-vdiff__hero testro-prod-vdiff__hero--diff"></span>
					<span class="testro-prod-vdiff__row">
						<i></i><i class="is-diff"></i><i></i>
					</span>
					<span class="testro-prod-vdiff__overlay"></span>
				</div>
			</figure>
		</div>

		<?php if ( $items ) : ?>
			<ul class="testro-prod-cards" data-columns="4">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-card__glow" aria-hidden="true"></span>
						<div class="testro-prod-card__body">
							<?php if ( ! empty( $item['icon'] ) ) : ?>
								<span class="testro-prod-card__icon" aria-hidden="true">
									<?php echo testro_icon( $item['icon'], array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							<?php endif; ?>
							<h3 class="testro-prod-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-card__desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
