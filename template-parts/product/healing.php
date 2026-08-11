<?php
/**
 * Product page self-healing split — vertical healing flow + benefit cards.
 *
 * Expected $args: id, eyebrow, title, intro, steps (array[] of icon/label),
 * items (array[] of icon/title/description for the right-hand cards).
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$steps = isset( $args['steps'] ) && is_array( $args['steps'] ) ? $args['steps'] : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $steps && ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
$step_count = count( $steps );
?>
<section
	class="testro-prod-section testro-prod-section--tint testro-prod-healing"
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

		<div class="testro-prod-healing__layout">
			<?php if ( $steps ) : ?>
				<ol class="testro-prod-healing__flow" data-reveal aria-label="<?php esc_attr_e( 'Self-healing automation flow', 'testro' ); ?>">
					<?php foreach ( $steps as $index => $step ) : ?>
						<li class="testro-prod-healing__step" style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms">
							<div class="testro-prod-healing__step-card">
								<span class="testro-prod-healing__marker-icon" aria-hidden="true">
									<?php echo testro_icon( ! empty( $step['icon'] ) ? $step['icon'] : 'sparkles', array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
								<span class="testro-prod-healing__step-body">
									<span class="testro-prod-healing__step-index"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
									<span class="testro-prod-healing__step-label"><?php echo esc_html( $step['label'] ); ?></span>
								</span>
							</div>
							<?php if ( $index < $step_count - 1 ) : ?>
								<span class="testro-prod-healing__connector" aria-hidden="true"></span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			<?php endif; ?>

			<?php if ( $items ) : ?>
				<ul class="testro-prod-healing__cards">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-healing__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 90 ) ); ?>ms">
							<span class="testro-prod-healing__card-glow" aria-hidden="true"></span>
							<span class="testro-prod-healing__card-icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<div class="testro-prod-healing__card-body">
								<h3 class="testro-prod-healing__card-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-healing__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
