<?php
/**
 * Product page section header — eyebrow pill, heading and intro copy.
 *
 * Expected $args:
 * - eyebrow    (string)  Optional pill label.
 * - title      (string)  Section heading text.
 * - intro      (string)  Optional supporting paragraph.
 * - heading_id (string)  Optional id used by the section's aria-labelledby.
 * - tone       (string)  'light' (default) or 'dark' for brand-gradient backgrounds.
 * - align      (string)  'center' (default) or 'start'.
 *
 * @package TestRo
 */

$args       = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow    = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title      = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro      = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$heading_id = isset( $args['heading_id'] ) ? (string) $args['heading_id'] : '';
$tone       = isset( $args['tone'] ) && 'dark' === $args['tone'] ? 'dark' : 'light';
$align      = isset( $args['align'] ) && 'start' === $args['align'] ? 'start' : 'center';

if ( '' === $title && '' === $eyebrow ) {
	return;
}

$heading_class = 'testro-prod-head__title main-headings';
if ( 'dark' !== $tone ) {
	$heading_class .= ' gradient-text';
}
?>
<header class="testro-prod-head testro-prod-head--<?php echo esc_attr( $tone ); ?> testro-prod-head--<?php echo esc_attr( $align ); ?>" data-reveal>
	<?php if ( '' !== $eyebrow ) : ?>
		<p class="subtitle-pill testro-section-eyebrow testro-prod-head__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $title ) : ?>
		<h2<?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="<?php echo esc_attr( $heading_class ); ?>">
			<?php echo esc_html( $title ); ?>
		</h2>
	<?php endif; ?>

	<?php if ( '' !== $intro ) : ?>
		<p class="testro-prod-head__intro"><?php echo esc_html( $intro ); ?></p>
	<?php endif; ?>
</header>
