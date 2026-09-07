<?php
/**
 * Global right-aligned supporting statement.
 *
 * Source of truth for italic, medium, right-aligned closing copy used under
 * feature grids and visual-list analytics sections.
 *
 * Expected $args:
 * - text    (string)  Supporting statement.
 * - variant (string)  'default' (slate on light) | 'on-dark' (white on primary).
 * - class   (string)  Optional extra classes on the root.
 * - attrs   (array)   Optional HTML attributes (e.g. data-reveal).
 *
 * @package TestRo
 */

$args         = isset( $args ) && is_array( $args ) ? $args : array();
$text         = isset( $args['text'] ) ? (string) $args['text'] : '';
$variant      = isset( $args['variant'] ) && 'on-dark' === $args['variant'] ? 'on-dark' : 'default';
$extra_class  = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';
$attrs        = isset( $args['attrs'] ) && is_array( $args['attrs'] ) ? $args['attrs'] : array();

if ( '' === $text ) {
	return;
}

$class = 'testro-supporting-text';
if ( 'on-dark' === $variant ) {
	$class .= ' testro-supporting-text--on-dark';
}
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
<p class="<?php echo esc_attr( $class ); ?>"<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built with esc_attr above. ?>><?php echo esc_html( $text ); ?></p>
