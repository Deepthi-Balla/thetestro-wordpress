<?php
/**
 * Global compare board — two equal columns with aligned legacy/modern rows.
 *
 * Structure and styling match the AI Test Automation comparison board.
 * Pass column labels and row copy; mark icons default to close / check.
 *
 * Expected $args:
 * - legacy_label (string) Left column header.
 * - modern_label (string) Right column header.
 * - rows         (array[]) Each: legacy, modern, optional legacy_mark / modern_mark
 *                          (check | close | partial).
 * - class        (string)  Optional extra classes on the root.
 * - attrs        (array)   Optional HTML attributes (e.g. data-reveal).
 *
 * @package TestRo
 */

$args         = isset( $args ) && is_array( $args ) ? $args : array();
$legacy_label = isset( $args['legacy_label'] ) ? (string) $args['legacy_label'] : '';
$modern_label = isset( $args['modern_label'] ) ? (string) $args['modern_label'] : '';
$rows         = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
$extra_class  = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';
$attrs        = isset( $args['attrs'] ) && is_array( $args['attrs'] ) ? $args['attrs'] : array();

if ( ! $rows ) {
	return;
}

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

$class = 'testro-compare-board';
if ( '' !== $extra_class ) {
	$class .= ' ' . $extra_class;
}

$attr_string = '';
foreach ( $attrs as $key => $value ) {
	if ( null === $value || false === $value ) {
		continue;
	}
	if ( true === $value ) {
		$attr_string .= ' ' . esc_attr( $key );
		continue;
	}
	$attr_string .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( (string) $value ) );
}
?>
<div class="<?php echo esc_attr( $class ); ?>"<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built with esc_attr above. ?>>
	<div class="testro-compare-board__heads">
		<p class="testro-compare-board__head testro-compare-board__head--legacy"><?php echo esc_html( $legacy_label ); ?></p>
		<p class="testro-compare-board__head testro-compare-board__head--modern"><?php echo esc_html( $modern_label ); ?></p>
	</div>

	<ul class="testro-compare-board__rows" role="list">
		<?php foreach ( $rows as $row ) : ?>
			<?php
			$legacy_mark = $resolve_mark( isset( $row['legacy_mark'] ) ? $row['legacy_mark'] : 'close' );
			$modern_mark = $resolve_mark( isset( $row['modern_mark'] ) ? $row['modern_mark'] : 'check' );
			?>
			<li class="testro-compare-board__row">
				<div class="testro-compare-board__cell testro-compare-board__cell--legacy">
					<span class="testro-compare-board__mark <?php echo esc_attr( $legacy_mark['class'] ); ?>" aria-hidden="true">
						<?php echo testro_icon( $legacy_mark['icon'], array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-feature-card__desc"><?php echo esc_html( isset( $row['legacy'] ) ? $row['legacy'] : '' ); ?></p>
				</div>
				<div class="testro-compare-board__cell testro-compare-board__cell--modern">
					<span class="testro-compare-board__mark <?php echo esc_attr( $modern_mark['class'] ); ?>" aria-hidden="true">
						<?php echo testro_icon( $modern_mark['icon'], array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-feature-card__desc"><?php echo esc_html( isset( $row['modern'] ) ? $row['modern'] : '' ); ?></p>
				</div>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
