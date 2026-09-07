<?php
/**
 * Browser/platform support matrix — header, check table, bottom split.
 *
 * Expected $args:
 * - id / eyebrow / title / intro / heading_level
 * - row_label (string) First column header (e.g. Browser × Platform).
 * - columns  (string[]) Platform column labels.
 * - rows     (array[]) Each: label (string), cells (array of 'check'|'').
 * - note     (string) Optional footer note inside the table.
 * - bottom   (array) Optional: body (string) left copy; visual is a placeholder.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$id            = isset( $args['id'] ) ? sanitize_title( (string) $args['id'] ) : '';
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$row_label     = isset( $args['row_label'] ) ? (string) $args['row_label'] : '';
$columns       = isset( $args['columns'] ) && is_array( $args['columns'] ) ? $args['columns'] : array();
$rows          = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
$note          = isset( $args['note'] ) ? (string) $args['note'] : '';
$bottom        = isset( $args['bottom'] ) && is_array( $args['bottom'] ) ? $args['bottom'] : array();
$bottom_body   = isset( $bottom['body'] ) ? (string) $bottom['body'] : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_id    = $id ? $id . '-heading' : '';
$col_count     = count( $columns );

if ( '' === $title && ! $rows ) {
	return;
}

$grid_cols = max( 1, $col_count + 1 );
?>
<section
	class="testro-page-section testro-support-matrix"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
	style="<?php echo esc_attr( '--support-matrix-cols: ' . $grid_cols . ';' ); ?>"
>
	<div class="testro-page-section__inner">
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

		<?php if ( $rows && $columns ) : ?>
			<div class="testro-prod-compare__table testro-support-matrix__table" data-reveal role="table" aria-label="<?php echo esc_attr( $title ); ?>">
				<div class="testro-support-matrix__head" role="row">
					<div class="testro-support-matrix__head-cell testro-support-matrix__head-cell--first" role="columnheader">
						<?php echo esc_html( $row_label ); ?>
					</div>
					<?php foreach ( $columns as $column ) : ?>
						<div class="testro-support-matrix__head-cell" role="columnheader">
							<?php echo esc_html( (string) $column ); ?>
						</div>
					<?php endforeach; ?>
				</div>

				<?php foreach ( $rows as $index => $row ) : ?>
					<?php
					$label = isset( $row['label'] ) ? (string) $row['label'] : '';
					$cells = isset( $row['cells'] ) && is_array( $row['cells'] ) ? $row['cells'] : array();
					?>
					<div
						class="testro-support-matrix__row<?php echo 1 === ( $index % 2 ) ? ' testro-support-matrix__row--alt' : ''; ?>"
						role="row"
						data-reveal
						style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms"
					>
						<div class="testro-support-matrix__cell testro-support-matrix__cell--label" role="rowheader">
							<?php echo esc_html( $label ); ?>
						</div>
						<?php for ( $i = 0; $i < $col_count; $i++ ) : ?>
							<?php
							$cell  = isset( $cells[ $i ] ) ? sanitize_key( (string) $cells[ $i ] ) : '';
							$check = 'check' === $cell;
							?>
							<div class="testro-support-matrix__cell testro-support-matrix__cell--mark" role="cell">
								<?php if ( $check ) : ?>
									<span class="testro-support-matrix__check" aria-label="<?php esc_attr_e( 'Supported', 'testro' ); ?>">
										<?php echo testro_icon( 'circle-check', array( 'size' => 20, 'stroke' => 2 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</span>
								<?php else : ?>
									<span class="testro-support-matrix__empty" aria-label="<?php esc_attr_e( 'Not supported', 'testro' ); ?>">—</span>
								<?php endif; ?>
							</div>
						<?php endfor; ?>
					</div>
				<?php endforeach; ?>

				<?php if ( '' !== $note ) : ?>
					<div class="testro-support-matrix__note" role="row">
						<div class="testro-support-matrix__note-cell" role="cell">
							<span class="testro-support-matrix__note-dot" aria-hidden="true"></span>
							<span class="testro-support-matrix__note-text"><?php echo esc_html( $note ); ?></span>
						</div>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( '' !== $bottom_body ) : ?>
			<div class="testro-support-matrix__bottom" data-reveal>
				<div class="testro-support-matrix__bottom-copy">
					<p class="testro-sec-header__desc"><?php echo esc_html( $bottom_body ); ?></p>
				</div>
				<div class="testro-support-matrix__bottom-visual" aria-hidden="true"></div>
			</div>
		<?php endif; ?>
	</div>
</section>
