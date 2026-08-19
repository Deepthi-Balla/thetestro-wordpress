<?php
/**
 * Product page section header — eyebrow pill, heading and intro copy.
 *
 * Expected $args:
 * - eyebrow    (string)  Optional pill label.
 * - title      (string)  Section heading text.
 * - intro        (string)  Optional supporting paragraph.
 * - intro_extra  (string)  Optional second supporting paragraph.
 * - intro_body   (string)  Optional third supporting paragraph.
 * - heading_id    (string)  Optional id used by the section's aria-labelledby.
 * - heading_level (int)     Semantic heading level 1–6. Default 2.
 * - tone          (string)  'light' (default) or 'dark' for brand-gradient backgrounds.
 * - align         (string)  'center' (default) or 'start'.
 *
 * @package TestRo
 */

$args       = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow    = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title      = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro       = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$intro_extra = isset( $args['intro_extra'] ) ? (string) $args['intro_extra'] : '';
$intro_body  = isset( $args['intro_body'] ) ? (string) $args['intro_body'] : '';
$paragraphs    = isset( $args['paragraphs'] ) && is_array( $args['paragraphs'] ) ? $args['paragraphs'] : array();
$heading_id    = isset( $args['heading_id'] ) ? (string) $args['heading_id'] : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag   = 'h' . $heading_level;
$tone          = isset( $args['tone'] ) && 'dark' === $args['tone'] ? 'dark' : 'light';
$align         = isset( $args['align'] ) && 'start' === $args['align'] ? 'start' : 'center';

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
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
		<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="<?php echo esc_attr( $heading_class ); ?>">
			<?php echo esc_html( $title ); ?>
		</<?php echo $heading_tag; ?>>
	<?php endif; ?>

	<?php if ( '' !== $intro ) : ?>
		<p class="testro-prod-head__intro"><?php echo esc_html( $intro ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $intro_extra ) : ?>
		<p class="testro-prod-head__intro"><?php echo esc_html( $intro_extra ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $intro_body ) : ?>
		<p class="testro-prod-head__intro"><?php echo esc_html( $intro_body ); ?></p>
	<?php endif; ?>

	<?php foreach ( $paragraphs as $paragraph ) : ?>
		<?php if ( '' !== (string) $paragraph ) : ?>
			<p class="testro-prod-head__intro"><?php echo esc_html( (string) $paragraph ); ?></p>
		<?php endif; ?>
	<?php endforeach; ?>
</header>
