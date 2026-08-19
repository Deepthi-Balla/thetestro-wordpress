<?php
/**
 * Product page comparison — legacy frameworks versus AI-native automation.
 *
 * Expected $args: id, eyebrow, title, intro, legacy (label/note), modern (label/note),
 * optional middle (label/note) for a third comparison column, rows (array[] of
 * aspect/legacy/modern, optional middle, legacy_mark/modern_mark/middle_mark),
 * text_only (bool) to hide check/close marks for descriptive tables.
 *
 * Mark values: check | close | partial. Defaults keep legacy=close and modern=check
 * so existing product/Why pages render unchanged.
 *
 * @package TestRo
 */

$args   = isset( $args ) && is_array( $args ) ? $args : array();
$rows   = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
$legacy    = isset( $args['legacy'] ) && is_array( $args['legacy'] ) ? $args['legacy'] : array();
$middle    = isset( $args['middle'] ) && is_array( $args['middle'] ) ? $args['middle'] : array();
$modern    = isset( $args['modern'] ) && is_array( $args['modern'] ) ? $args['modern'] : array();
$text_only = ! empty( $args['text_only'] );
$two_column = ! empty( $args['two_column'] );
$first_label = isset( $args['first_label'] ) ? (string) $args['first_label'] : '';
$id        = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $rows ) {
	return;
}

$heading_id   = $id ? $id . '-heading' : '';
$legacy_label = isset( $legacy['label'] ) ? $legacy['label'] : __( 'Legacy frameworks', 'testro' );
$middle_label = isset( $middle['label'] ) ? $middle['label'] : __( 'Legacy tools', 'testro' );
$modern_label = isset( $modern['label'] ) ? $modern['label'] : __( 'theTestRo', 'testro' );
$has_middle   = (bool) $middle;

/**
 * Resolve comparison cell mark metadata.
 *
 * @param string $mark Mark key.
 * @return array{icon:string,class:string}
 */
$resolve_mark = static function ( $mark ) {
	$mark = sanitize_key( (string) $mark );

	if ( 'check' === $mark ) {
		return array(
			'icon'  => 'check',
			'class' => 'testro-prod-compare__mark--check',
		);
	}

	if ( 'partial' === $mark ) {
		return array(
			'icon'  => 'minus',
			'class' => 'testro-prod-compare__mark--partial',
		);
	}

	return array(
		'icon'  => 'close',
		'class' => 'testro-prod-compare__mark--close',
	);
};

$section_class = 'testro-prod-section testro-prod-compare';
if ( $has_middle ) {
	$section_class .= ' testro-prod-compare--triple';
}
if ( $text_only ) {
	$section_class .= ' testro-prod-compare--text-only';
}
if ( $two_column ) {
	$section_class .= ' testro-prod-compare--two';
}
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
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
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
			)
		);
		?>

		<div class="testro-prod-compare__table" data-reveal>
			<div class="testro-prod-compare__head" aria-hidden="true">
				<div class="testro-prod-compare__head-spacer">
					<?php if ( '' !== $first_label ) : ?>
						<span class="testro-prod-compare__head-label"><?php echo esc_html( $first_label ); ?></span>
					<?php endif; ?>
				</div>

				<?php if ( ! $two_column ) : ?>
				<div class="testro-prod-compare__head-cell testro-prod-compare__head-cell--legacy">
					<span class="testro-prod-compare__head-icon">
						<?php echo testro_icon( 'close', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<span>
						<span class="testro-prod-compare__head-label"><?php echo esc_html( $legacy_label ); ?></span>
						<?php if ( ! empty( $legacy['note'] ) ) : ?>
							<span class="testro-prod-compare__head-note"><?php echo esc_html( $legacy['note'] ); ?></span>
						<?php endif; ?>
					</span>
				</div>
				<?php endif; ?>

				<?php if ( $has_middle ) : ?>
				<div class="testro-prod-compare__head-cell testro-prod-compare__head-cell--middle">
					<span class="testro-prod-compare__head-icon">
						<?php echo testro_icon( 'minus', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<span>
						<span class="testro-prod-compare__head-label"><?php echo esc_html( $middle_label ); ?></span>
						<?php if ( ! empty( $middle['note'] ) ) : ?>
							<span class="testro-prod-compare__head-note"><?php echo esc_html( $middle['note'] ); ?></span>
						<?php endif; ?>
					</span>
				</div>
				<?php endif; ?>

				<div class="testro-prod-compare__head-cell testro-prod-compare__head-cell--modern">
					<span class="testro-prod-compare__head-icon">
						<?php echo testro_icon( 'sparkles', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<span>
						<span class="testro-prod-compare__head-label"><?php echo esc_html( $modern_label ); ?></span>
						<?php if ( ! empty( $modern['note'] ) ) : ?>
							<span class="testro-prod-compare__head-note"><?php echo esc_html( $modern['note'] ); ?></span>
						<?php endif; ?>
					</span>
				</div>
			</div>

			<ul class="testro-prod-compare__rows">
				<?php foreach ( $rows as $index => $row ) : ?>
					<?php
					$legacy_mark = $resolve_mark( isset( $row['legacy_mark'] ) ? $row['legacy_mark'] : 'close' );
					$middle_mark = $resolve_mark( isset( $row['middle_mark'] ) ? $row['middle_mark'] : 'partial' );
					$modern_mark = $resolve_mark( isset( $row['modern_mark'] ) ? $row['modern_mark'] : 'check' );
					?>
					<li class="testro-prod-compare__row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! empty( $row['aspect'] ) ) : ?>
							<p class="testro-prod-compare__aspect"><?php echo esc_html( $row['aspect'] ); ?></p>
						<?php else : ?>
							<span class="testro-prod-compare__aspect testro-prod-compare__aspect--empty" aria-hidden="true"></span>
						<?php endif; ?>

						<?php if ( ! $two_column ) : ?>
						<div class="testro-prod-compare__cell testro-prod-compare__cell--legacy">
							<span class="testro-prod-compare__cell-label"><?php echo esc_html( $legacy_label ); ?></span>
							<?php if ( ! $text_only ) : ?>
							<span class="testro-prod-compare__mark <?php echo esc_attr( $legacy_mark['class'] ); ?>" aria-hidden="true">
								<?php echo testro_icon( $legacy_mark['icon'], array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<?php endif; ?>
							<p class="testro-prod-compare__text"><?php echo esc_html( isset( $row['legacy'] ) ? $row['legacy'] : '' ); ?></p>
						</div>
						<?php endif; ?>

						<?php if ( $has_middle ) : ?>
						<div class="testro-prod-compare__cell testro-prod-compare__cell--middle">
							<span class="testro-prod-compare__cell-label"><?php echo esc_html( $middle_label ); ?></span>
							<?php if ( ! $text_only ) : ?>
							<span class="testro-prod-compare__mark <?php echo esc_attr( $middle_mark['class'] ); ?>" aria-hidden="true">
								<?php echo testro_icon( $middle_mark['icon'], array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<?php endif; ?>
							<p class="testro-prod-compare__text"><?php echo esc_html( $row['middle'] ); ?></p>
						</div>
						<?php endif; ?>

						<div class="testro-prod-compare__cell testro-prod-compare__cell--modern">
							<span class="testro-prod-compare__cell-label"><?php echo esc_html( $modern_label ); ?></span>
							<?php if ( ! $text_only ) : ?>
							<span class="testro-prod-compare__mark <?php echo esc_attr( $modern_mark['class'] ); ?>" aria-hidden="true">
								<?php echo testro_icon( $modern_mark['icon'], array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<?php endif; ?>
							<p class="testro-prod-compare__text"><?php echo esc_html( $row['modern'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-compare__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
