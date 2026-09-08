<?php
/**
 * Product page lifecycle — Framer split-ring (absolute diagram) or classic rail.
 *
 * Framer AI diagram (620×620):
 * - Ring 496×496 at 62,62 — 3px dashed #18A3F5
 * - Hub 156×156 at 232,232
 * - Cards 178×142 at fixed tops/lefts (no CSS rotate invention)
 *
 * @package TestRo
 */

$args      = isset( $args ) && is_array( $args ) ? $args : array();
$items     = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id        = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$layout    = isset( $args['layout'] ) ? (string) $args['layout'] : '';
$is_ring   = ( 'split-ring' === $layout );
$intro_extra = isset( $args['intro_extra'] ) ? (string) $args['intro_extra'] : '';

if ( ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
$total      = count( $items );
$loop_note  = isset( $args['loop_note'] )
	? (string) $args['loop_note']
	: __( 'Every cycle feeds the next — the platform gets more reliable with each release.', 'testro' );
$section_class = 'testro-prod-section testro-prod-lifecycle' . ( $is_ring ? ' testro-prod-lifecycle--split-ring' : '' );

/*
 * Framer absolute positions inside 620×620 canvas (top, left).
 * Order matches items: Generate, Execute, Detect, Analyze, Self-Heal, Optimize.
 */
$ring_positions = array(
	array( 'top' => 0, 'left' => 224 ),
	array( 'top' => 142, 'left' => 442 ),
	array( 'top' => 342, 'left' => 442 ),
	array( 'top' => 478, 'left' => 224 ),
	array( 'top' => 342, 'left' => 0 ),
	array( 'top' => 142, 'left' => 0 ),
);
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
	<?php echo $is_ring ? '' : 'data-lifecycle'; ?>
>
	<div class="testro-container">
		<?php if ( $is_ring ) : ?>
			<div class="testro-prod-lifecycle__split">
				<div class="testro-prod-lifecycle__brief">
					<?php
					get_template_part(
						'template-parts/product/section-header',
						null,
						array(
							'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
							'title'         => isset( $args['title'] ) ? $args['title'] : '',
							'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
							'heading_id'    => $heading_id,
							'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
							'align'         => 'start',
						)
					);
					?>
					<?php if ( '' !== $intro_extra ) : ?>
						<p class="testro-prod-lifecycle__callout"><?php echo esc_html( $intro_extra ); ?></p>
					<?php endif; ?>
				</div>

				<div class="testro-prod-lifecycle__canvas-wrap">
					<div class="testro-prod-lifecycle__canvas" role="list" aria-label="<?php esc_attr_e( 'Autonomous test lifecycle stages', 'testro' ); ?>">
						<span class="testro-prod-lifecycle__ring" aria-hidden="true"></span>

						<div class="testro-prod-lifecycle__hub" aria-hidden="true">
							<span class="testro-prod-lifecycle__hub-label"><?php esc_html_e( 'AI ENGINE', 'testro' ); ?></span>
							<span class="testro-prod-lifecycle__hub-copy"><?php echo wp_kses( __( 'Runs<br>continuously', 'testro' ), array( 'br' => array() ) ); ?></span>
						</div>

						<?php foreach ( $items as $index => $item ) : ?>
							<?php
							$pos = isset( $ring_positions[ $index ] ) ? $ring_positions[ $index ] : array( 'top' => 0, 'left' => 0 );
							$top_pct  = ( (float) $pos['top'] / 620 ) * 100;
							$left_pct = ( (float) $pos['left'] / 620 ) * 100;
							$line = trim( (string) $item['title'] );
							if ( ! empty( $item['description'] ) ) {
								$line .= ' — ' . (string) $item['description'];
							}
							?>
							<article
								class="testro-prod-lifecycle__orbit-card"
								role="listitem"
								style="top: <?php echo esc_attr( (string) $top_pct ); ?>%; left: <?php echo esc_attr( (string) $left_pct ); ?>%;"
							>
								<span class="testro-prod-lifecycle__orbit-num"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
								<p class="testro-prod-lifecycle__orbit-copy"><?php echo esc_html( $line ); ?></p>
							</article>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php else : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'intro_extra'   => $intro_extra,
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => isset( $args['align'] ) ? $args['align'] : 'center',
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
							<p class="testro-prod-lifecycle__title"><?php echo esc_html( $item['title'] ); ?></p>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-lifecycle__desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</article>
					</li>
				<?php endforeach; ?>
			</ol>

			<?php if ( '' !== $loop_note ) : ?>
			<p class="testro-prod-lifecycle__loop" data-reveal>
				<?php echo testro_icon( 'refresh', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
				<?php echo esc_html( $loop_note ); ?>
			</p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
