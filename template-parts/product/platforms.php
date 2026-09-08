<?php
/**
 * Product page supported browsers × platforms matrix (Framer Web Testing).
 *
 * @package TestRo
 */

$args       = isset( $args ) && is_array( $args ) ? $args : array();
$id         = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$platforms  = isset( $args['platforms'] ) && is_array( $args['platforms'] ) ? $args['platforms'] : array();
$browsers   = isset( $args['browsers'] ) && is_array( $args['browsers'] ) ? $args['browsers'] : array();
$chips      = isset( $args['chips'] ) && is_array( $args['chips'] ) ? $args['chips'] : array();
$matrix_label = isset( $args['matrix_label'] ) ? (string) $args['matrix_label'] : '';
$matrix_note  = isset( $args['matrix_note'] ) ? (string) $args['matrix_note'] : '';

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
				<?php if ( '' !== $matrix_label ) : ?>
					<p class="testro-prod-platforms__matrix-label"><?php echo esc_html( $matrix_label ); ?></p>
				<?php endif; ?>

				<div class="testro-prod-platforms__table">
					<div class="testro-prod-platforms__row testro-prod-platforms__row--head" role="row">
						<span class="testro-prod-platforms__cell testro-prod-platforms__cell--corner" role="columnheader"></span>
						<?php foreach ( $platforms as $platform ) : ?>
							<span class="testro-prod-platforms__cell testro-prod-platforms__cell--col" role="columnheader"><?php echo esc_html( (string) $platform ); ?></span>
						<?php endforeach; ?>
					</div>
					<?php foreach ( $browsers as $b_index => $browser ) : ?>
						<div class="testro-prod-platforms__row<?php echo ( $b_index % 2 ) ? ' testro-prod-platforms__row--alt' : ''; ?>" role="row">
							<span class="testro-prod-platforms__cell testro-prod-platforms__cell--row" role="rowheader"><?php echo esc_html( (string) $browser ); ?></span>
							<?php foreach ( $platforms as $platform ) : ?>
								<span class="testro-prod-platforms__cell testro-prod-platforms__cell--check" role="cell" aria-label="<?php echo esc_attr( sprintf( /* translators: 1: browser, 2: platform */ __( '%1$s on %2$s supported', 'testro' ), (string) $browser, (string) $platform ) ); ?>">
									<span aria-hidden="true">✓</span>
								</span>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>
				</div>

				<?php if ( '' !== $matrix_note ) : ?>
					<p class="testro-prod-platforms__matrix-note"><?php echo esc_html( $matrix_note ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $chips ) : ?>
			<ul class="testro-prod-platforms__chips" data-reveal>
				<?php foreach ( $chips as $chip ) : ?>
					<li class="testro-prod-platforms__chip"><?php echo esc_html( (string) $chip ); ?></li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-platforms__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
