<?php
/**
 * Product page lifecycle timeline — numbered stages on a progress rail.
 *
 * Expected $args: id, eyebrow, title, intro, items (array[] of icon/title/description).
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
$total      = count( $items );
$loop_note  = isset( $args['loop_note'] )
	? (string) $args['loop_note']
	: __( 'Every cycle feeds the next — the platform gets more reliable with each release.', 'testro' );
?>
<section
	class="testro-prod-section testro-prod-lifecycle"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
	data-lifecycle
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

		<ol class="testro-prod-lifecycle__list">
			<span class="testro-prod-lifecycle__rail" aria-hidden="true">
				<span class="testro-prod-lifecycle__rail-fill" data-lifecycle-fill></span>
			</span>

			<?php foreach ( $items as $index => $item ) : ?>
				<li class="testro-prod-lifecycle__step" data-lifecycle-step data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
					<span class="testro-prod-lifecycle__node" aria-hidden="true">
						<span class="testro-prod-lifecycle__node-icon">
							<?php echo testro_icon( $item['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
					</span>

					<article class="testro-prod-lifecycle__card">
						<p class="testro-prod-lifecycle__step-label">
							<?php
							printf(
								/* translators: 1: current stage number, 2: total stages */
								esc_html__( 'Stage %1$02d of %2$02d', 'testro' ),
								(int) $index + 1,
								(int) $total
							);
							?>
						</p>
						<h3 class="testro-prod-lifecycle__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-lifecycle__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</article>
				</li>
			<?php endforeach; ?>
		</ol>

		<p class="testro-prod-lifecycle__loop" data-reveal>
			<?php echo testro_icon( 'refresh', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
			<?php echo esc_html( $loop_note ); ?>
		</p>
	</div>
</section>
