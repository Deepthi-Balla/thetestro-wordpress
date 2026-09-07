<?php
/**
 * Numbered step pill — connected circular step indicators.
 *
 * Expected $args:
 * - steps       (int)    Total steps to render. Default 4. Min 1, max 8.
 * - active_step (int)    1-based active/current step. Default 1.
 *                        Use 0 with the process variant to keep all steps equal.
 * - pad         (int)    Zero-pad width for numbers (e.g. 2 → 01). Default 0.
 * - variant     (string) 'default' | 'process' (full-width track of equal steps).
 * - class       (string) Optional extra classes on the root.
 * - attrs       (array)  Optional HTML attributes.
 *
 * @package TestRo
 */

$args        = isset( $args ) && is_array( $args ) ? $args : array();
$steps       = isset( $args['steps'] ) ? max( 1, min( 8, (int) $args['steps'] ) ) : 4;
$active_step = array_key_exists( 'active_step', $args ) ? (int) $args['active_step'] : 1;
$pad         = isset( $args['pad'] ) ? max( 0, (int) $args['pad'] ) : 0;
$variant     = isset( $args['variant'] ) && 'process' === $args['variant'] ? 'process' : 'default';
$extra_class = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';
$attrs       = isset( $args['attrs'] ) && is_array( $args['attrs'] ) ? $args['attrs'] : array();

if ( 'process' !== $variant ) {
	$active_step = max( 1, min( $steps, $active_step ) );
}

$class = 'testro-step-pill';
if ( 'process' === $variant ) {
	$class .= ' testro-step-pill--process';
}
if ( '' !== $extra_class ) {
	$class .= ' ' . $extra_class;
}

$style = isset( $attrs['style'] ) ? trim( (string) $attrs['style'] ) : '';
unset( $attrs['style'] );
if ( 'process' === $variant ) {
	$process_style = '--step-pill-cols: ' . (string) $steps;
	$style         = ( '' !== $style ? rtrim( $style, '; ' ) . '; ' : '' ) . $process_style;
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
if ( '' !== $style ) {
	$attr_string .= ' style="' . esc_attr( $style ) . '"';
}
?>
<ol class="<?php echo esc_attr( $class ); ?>"<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built with esc_attr above. ?> aria-label="<?php esc_attr_e( 'Process steps', 'testro' ); ?>">
	<?php for ( $i = 1; $i <= $steps; $i++ ) : ?>
		<?php
		$is_active = 'process' !== $variant && $i === $active_step;
		$label     = $pad > 0 ? sprintf( '%0' . $pad . 'd', $i ) : (string) $i;
		?>
		<li class="testro-step-pill__item<?php echo $is_active ? ' is-active' : ''; ?>">
			<span class="testro-step-pill__num"><?php echo esc_html( $label ); ?></span>
		</li>
	<?php endfor; ?>
</ol>
