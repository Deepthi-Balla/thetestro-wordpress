<?php
/**
 * Global section header — label, heading, description.
 *
 * Typography and spacing match the Home page AI Capabilities intro.
 * Pass colors only when a section needs a different theme.
 *
 * Expected $args:
 * - label              (string)  Optional uppercase eyebrow/label.
 * - heading            (string)  Section heading text.
 * - description        (string)  Optional supporting paragraph.
 * - heading_id         (string)  Optional id for aria-labelledby.
 * - heading_level      (int)     Semantic heading level 1–6. Default 2.
 * - label_color        (string)  Optional CSS color for the label.
 * - heading_color      (string)  Optional CSS color for the heading.
 * - description_color  (string)  Optional CSS color for the description.
 * - class              (string)  Optional extra classes on the root.
 * - attrs              (array)   Optional HTML attributes (e.g. data-reveal).
 *
 * @package TestRo
 */

$args              = isset( $args ) && is_array( $args ) ? $args : array();
$label             = isset( $args['label'] ) ? (string) $args['label'] : '';
$heading           = isset( $args['heading'] ) ? (string) $args['heading'] : '';
$description       = isset( $args['description'] ) ? (string) $args['description'] : '';
$heading_id        = isset( $args['heading_id'] ) ? (string) $args['heading_id'] : '';
$heading_level     = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag       = 'h' . $heading_level;
$label_color       = isset( $args['label_color'] ) ? (string) $args['label_color'] : '';
$heading_color     = isset( $args['heading_color'] ) ? (string) $args['heading_color'] : '';
$description_color = isset( $args['description_color'] ) ? (string) $args['description_color'] : '';
$extra_class       = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';
$attrs             = isset( $args['attrs'] ) && is_array( $args['attrs'] ) ? $args['attrs'] : array();

if ( '' === $label && '' === $heading && '' === $description ) {
	return;
}

$style_vars = array();
if ( '' !== $label_color ) {
	$style_vars[] = '--sec-header-label-color: ' . $label_color;
}
if ( '' !== $heading_color ) {
	$style_vars[] = '--sec-header-heading-color: ' . $heading_color;
}
if ( '' !== $description_color ) {
	$style_vars[] = '--sec-header-desc-color: ' . $description_color;
}

$style = isset( $attrs['style'] ) ? trim( (string) $attrs['style'] ) : '';
unset( $attrs['style'] );
if ( $style_vars ) {
	$style = ( '' !== $style ? rtrim( $style, '; ' ) . '; ' : '' ) . implode( '; ', $style_vars );
}

$class = 'testro-sec-header';
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
if ( '' !== $style ) {
	$attr_string .= ' style="' . esc_attr( $style ) . '"';
}
?>
<header class="<?php echo esc_attr( $class ); ?>"<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built with esc_attr above. ?>>
	<?php if ( '' !== $label ) : ?>
		<p class="testro-sec-header__label"><?php echo esc_html( $label ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $heading ) : ?>
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
		<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="testro-sec-header__heading">
			<?php echo esc_html( $heading ); ?>
		</<?php echo $heading_tag; ?>>
	<?php endif; ?>

	<?php if ( '' !== $description ) : ?>
		<p class="testro-sec-header__desc"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>
</header>
