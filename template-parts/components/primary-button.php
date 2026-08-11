<?php
/**
 * Reusable primary button with dual-label hover + arrow (reference interaction).
 *
 * Expected $args:
 * - label (string)
 * - attrs (array) HTML attributes
 * - href (string|optional) if set, renders <a> instead of <button>
 * - with_arrow (bool) default true for primary CTAs
 *
 * @package TestRo
 */

$args       = isset( $args ) && is_array( $args ) ? $args : array();
$label      = isset( $args['label'] ) ? $args['label'] : '';
$attrs      = isset( $args['attrs'] ) && is_array( $args['attrs'] ) ? $args['attrs'] : array();
$href       = isset( $args['href'] ) ? $args['href'] : '';
$with_arrow = array_key_exists( 'with_arrow', $args ) ? (bool) $args['with_arrow'] : true;

if ( '' === $label ) {
	return;
}

if ( empty( $attrs['class'] ) ) {
	$attrs['class'] = 'primary-button';
} elseif ( false === strpos( $attrs['class'], 'primary-button' ) ) {
	$attrs['class'] .= ' primary-button';
}

if ( false === strpos( $attrs['class'], 'group' ) ) {
	$attrs['class'] .= ' group relative overflow-hidden';
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
	$attr_string .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
}

ob_start();
?>
<span class="primary-button__label relative block h-6 overflow-hidden">
	<span class="primary-button__label-a block transition-transform duration-300 group-hover:-translate-y-full"><?php echo esc_html( $label ); ?></span>
	<span class="primary-button__label-b absolute inset-0 translate-y-full transition-transform duration-300 group-hover:translate-y-0" aria-hidden="true"><?php echo esc_html( $label ); ?></span>
</span>
<?php if ( $with_arrow ) : ?>
	<svg class="primary-button__arrow ml-3 w-6 h-6" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
		<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
<?php endif; ?>
<?php
$inner = ob_get_clean();

if ( $href ) {
	printf(
		'<a href="%1$s"%2$s>%3$s</a>',
		esc_url( $href ),
		$attr_string, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$inner // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
} else {
	$type = isset( $attrs['type'] ) ? '' : ' type="button"';
	printf(
		'<button%1$s%2$s>%3$s</button>',
		$type,
		$attr_string, // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		$inner // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
}
