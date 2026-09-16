<?php
/**
 * Product page supported browsers × platforms matrix (Framer Web Testing).
 *
 * Framer VWJxJtN3s:
 * Support Introduction → Browser Support Matrix → Coverage Explainer
 * (Coverage Explanation 440px LEFT + Execution Coverage Diagram 480px RIGHT).
 *
 * @package TestRo
 */

$args         = isset( $args ) && is_array( $args ) ? $args : array();
$id           = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$platforms    = isset( $args['platforms'] ) && is_array( $args['platforms'] ) ? $args['platforms'] : array();
$browsers     = isset( $args['browsers'] ) && is_array( $args['browsers'] ) ? $args['browsers'] : array();
$chips        = isset( $args['chips'] ) && is_array( $args['chips'] ) ? $args['chips'] : array();
$frameworks   = isset( $args['frameworks'] ) && is_array( $args['frameworks'] ) ? $args['frameworks'] : array();
$conditions   = isset( $args['conditions'] ) && is_array( $args['conditions'] ) ? $args['conditions'] : array();
$hub_label    = isset( $args['hub_label'] ) ? (string) $args['hub_label'] : '';
$matrix_label = isset( $args['matrix_label'] ) ? (string) $args['matrix_label'] : '';
$matrix_note  = isset( $args['matrix_note'] ) ? (string) $args['matrix_note'] : '';

if ( ! $frameworks && ! $conditions && $chips ) {
	foreach ( $chips as $chip ) {
		$chip_s = (string) $chip;
		if ( in_array( $chip_s, array( 'React', 'Angular', 'Vue' ), true ) ) {
			$frameworks[] = $chip_s;
		} elseif ( false !== stripos( $chip_s, 'testro' ) ) {
			$hub_label = $hub_label ? $hub_label : $chip_s;
		} else {
			$conditions[] = $chip_s;
		}
	}
}
if ( '' === $hub_label ) {
	$hub_label = 'theTestRo';
}

if ( '' === ( isset( $args['title'] ) ? (string) $args['title'] : '' ) && ! $platforms && ! $browsers ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-platforms"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<div class="testro-prod-platforms__content">
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
					'align'         => isset( $args['align'] ) ? $args['align'] : 'start',
				)
			);
			?>

			<?php if ( $platforms && $browsers ) : ?>
				<div class="testro-prod-platforms__matrix" data-reveal role="table" aria-label="<?php echo esc_attr( $matrix_label ? $matrix_label : __( 'Browser and platform coverage', 'testro' ) ); ?>">
					<div class="testro-prod-platforms__table">
						<div class="testro-prod-platforms__row testro-prod-platforms__row--head" role="row">
							<span class="testro-prod-platforms__cell testro-prod-platforms__cell--corner" role="columnheader">
								<?php echo esc_html( $matrix_label ? $matrix_label : __( 'Browser × Platform', 'testro' ) ); ?>
							</span>
							<?php foreach ( $platforms as $platform ) : ?>
								<span class="testro-prod-platforms__cell testro-prod-platforms__cell--col" role="columnheader"><?php echo esc_html( (string) $platform ); ?></span>
							<?php endforeach; ?>
						</div>
						<?php foreach ( $browsers as $b_index => $browser ) : ?>
							<div class="testro-prod-platforms__row<?php echo ( $b_index % 2 ) ? ' testro-prod-platforms__row--alt' : ''; ?>" role="row">
								<span class="testro-prod-platforms__cell testro-prod-platforms__cell--row" role="rowheader"><?php echo esc_html( (string) $browser ); ?></span>
								<?php foreach ( $platforms as $platform ) : ?>
									<span class="testro-prod-platforms__cell testro-prod-platforms__cell--check" role="cell" aria-label="<?php echo esc_attr( sprintf( /* translators: 1: browser, 2: platform */ __( '%1$s on %2$s supported', 'testro' ), (string) $browser, (string) $platform ) ); ?>">
										<?php /* Framer uses IconNode w=19 — check glyph. */ ?>
										<span class="testro-prod-platforms__check" aria-hidden="true"><?php echo testro_icon( 'check', array( 'size' => 19 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
									</span>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>

						<?php if ( '' !== $matrix_note ) : ?>
							<div class="testro-prod-platforms__matrix-note" role="note">
								<span class="testro-prod-platforms__matrix-dot" aria-hidden="true"></span>
								<span><?php echo esc_html( $matrix_note ); ?></span>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php if ( $frameworks || $conditions || ! empty( $args['outro'] ) ) : ?>
				<?php /* Framer Coverage Explainer: copy 440 LEFT, diagram 480 RIGHT, gap 72, pad-top 34. */ ?>
				<div class="testro-prod-platforms__explainer" data-reveal>
					<?php if ( ! empty( $args['outro'] ) ) : ?>
						<p class="testro-prod-platforms__outro"><?php echo esc_html( (string) $args['outro'] ); ?></p>
					<?php endif; ?>

					<div class="testro-prod-platforms__diagram" aria-hidden="true">
						<?php if ( $frameworks ) : ?>
							<ul class="testro-prod-platforms__frameworks">
								<?php foreach ( $frameworks as $fw ) : ?>
									<li class="testro-prod-platforms__chip testro-prod-platforms__chip--framework"><?php echo esc_html( (string) $fw ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<span class="testro-prod-platforms__hub">
							<span class="testro-prod-platforms__hub-mark"></span>
						</span>
						<span class="testro-prod-platforms__hub-label"><?php echo esc_html( $hub_label ); ?></span>

						<?php if ( $conditions ) : ?>
							<ul class="testro-prod-platforms__conditions">
								<?php foreach ( $conditions as $cond ) : ?>
									<li class="testro-prod-platforms__chip testro-prod-platforms__chip--condition"><?php echo esc_html( (string) $cond ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
