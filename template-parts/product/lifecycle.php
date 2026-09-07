<?php
/**
 * Product page lifecycle — numbered stages on a progress rail,
 * or a circular cycle diagram when layout is `cycle`.
 *
 * Expected $args:
 * - id, eyebrow, title, intro, heading_level
 * - layout     (string)  'rail' (default) | 'cycle'
 * - callout    (string)  Optional cyan note under the header (cycle).
 * - hub_label  (string)  Center label (cycle). Default 'AI ENGINE'.
 * - hub_title  (string)  Center title (cycle).
 * - items      (array[]) Each: icon/title/description. icon unused in cycle.
 * - loop_note  (string)  Optional note under the rail layout.
 *
 * @package TestRo
 */

$args   = isset( $args ) && is_array( $args ) ? $args : array();
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id     = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$layout = isset( $args['layout'] ) && 'cycle' === $args['layout'] ? 'cycle' : 'rail';

if ( ! $items ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$total         = count( $items );
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';

if ( 'cycle' === $layout ) {
	$callout   = isset( $args['callout'] ) ? (string) $args['callout'] : '';
	$hub_label = isset( $args['hub_label'] ) ? (string) $args['hub_label'] : __( 'AI ENGINE', 'testro' );
	$hub_title = isset( $args['hub_title'] ) ? (string) $args['hub_title'] : __( 'Runs continuously', 'testro' );
	?>
<section
	class="testro-page-section testro-prod-lifecycle testro-prod-lifecycle--cycle"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-page-section__inner testro-prod-lifecycle__cycle-inner">
		<div class="testro-prod-lifecycle__copy">
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

			<?php if ( '' !== $callout ) : ?>
				<p class="testro-prod-lifecycle__callout" data-reveal><?php echo esc_html( $callout ); ?></p>
			<?php endif; ?>
		</div>

		<div class="testro-lifecycle-cycle" data-reveal>
			<svg class="testro-lifecycle-cycle__orbit" viewBox="0 0 100 100" aria-hidden="true" focusable="false">
				<circle
					cx="50"
					cy="50"
					r="34"
					fill="none"
					stroke="#18A3F5"
					stroke-width="3"
					stroke-dasharray="5 7"
					stroke-linecap="round"
					vector-effect="non-scaling-stroke"
				/>
			</svg>

			<div class="testro-lifecycle-cycle__hub">
				<p class="testro-sec-header__label testro-lifecycle-cycle__hub-label"><?php echo esc_html( $hub_label ); ?></p>
				<p class="testro-lifecycle-cycle__hub-title"><?php echo esc_html( $hub_title ); ?></p>
			</div>

			<ol class="testro-lifecycle-cycle__cards">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
					$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
					?>
					<li
						class="testro-lifecycle-cycle__card"
						style="--i: <?php echo esc_attr( (string) $index ); ?>"
					>
						<span class="testro-lifecycle-cycle__badge"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
						<p class="testro-lifecycle-cycle__text">
							<?php if ( '' !== $item_title ) : ?>
								<strong class="testro-lifecycle-cycle__name"><?php echo esc_html( $item_title ); ?></strong>
							<?php endif; ?>
							<?php if ( '' !== $item_desc ) : ?>
								<?php echo ( '' !== $item_title ) ? ' — ' : ''; ?>
								<?php echo esc_html( $item_desc ); ?>
							<?php endif; ?>
						</p>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
	<?php
	return;
}

$loop_note = isset( $args['loop_note'] )
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
				'eyebrow'       => $eyebrow,
				'title'         => $title,
				'intro'         => $intro,
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => $heading_level,
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
	</div>
</section>
