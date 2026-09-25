<?php
/**
 * Product page section header — eyebrow, heading and intro copy.
 *
 * Style reassignment (exact existing implementations reused, no new type values):
 * - When a label/eyebrow is present:
 *   Label / eyebrow → former Header Title styles (heading tag + title classes)
 *   Header Title    → former Supporting Text styles (p + intro classes)
 *   Supporting Text → unchanged (p + intro classes)
 * - When no label/eyebrow is present, the title keeps its original heading styles
 *   so sections without an eyebrow are not visually broken.
 *
 * Expected $args:
 * - eyebrow    (string)  Optional pill label.
 * - title      (string)  Section heading text.
 * - intro        (string)  Optional supporting paragraph.
 * - intro_extra  (string)  Optional second supporting paragraph.
 * - emphasis     (string)  Optional mid-copy emphasis line (Framer callout).
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
$emphasis    = isset( $args['emphasis'] ) ? (string) $args['emphasis'] : '';
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

/*
 * Style B — exact former Header Title implementation:
 * heading tag + testro-prod-head__title + main-headings (+ gradient-text on light).
 */
$title_style_class = 'testro-prod-head__title main-headings';
if ( 'dark' !== $tone ) {
	$title_style_class .= ' gradient-text';
}

/* Style C — exact former Supporting Text implementation. */
$intro_style_class = 'testro-prod-head__intro';

$label_is_heading = ( '' !== $eyebrow );
/*
 * Framer label + heading: eyebrow stays the existing mono label, title stays
 * the heading. Opt-in only, so pages that promote the eyebrow to the heading
 * keep that behavior.
 */
$eyebrow_is_label = ! empty( $args['eyebrow_is_label'] ) && '' !== $eyebrow;
if ( $eyebrow_is_label ) {
	$label_is_heading = false;
}
?>
<header class="testro-prod-head testro-prod-head--<?php echo esc_attr( $tone ); ?> testro-prod-head--<?php echo esc_attr( $align ); ?>" data-reveal>
	<?php if ( $eyebrow_is_label ) : ?>
		<p class="testro-section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
	<?php endif; ?>
	<?php if ( $label_is_heading ) : ?>
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
		<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="<?php echo esc_attr( $title_style_class ); ?>">
			<?php echo esc_html( testro_section_label_title( $eyebrow ) ); ?>
		</<?php echo $heading_tag; ?>>
	<?php endif; ?>

	<?php if ( '' !== $title ) : ?>
		<?php if ( $label_is_heading ) : ?>
			<?php /* Style C — exact former supporting implementation (p + intro class). */ ?>
			<p class="<?php echo esc_attr( $intro_style_class ); ?>"><?php echo esc_html( $title ); ?></p>
		<?php else : ?>
			<?php
			/*
			 * No label: keep the original title implementation so sections
			 * without an eyebrow are not visually broken.
			 */
			?>
			<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
			<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="<?php echo esc_attr( $title_style_class ); ?>">
				<?php echo esc_html( $title ); ?>
			</<?php echo $heading_tag; ?>>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( '' !== $intro ) : ?>
		<p class="<?php echo esc_attr( $intro_style_class ); ?>"><?php echo esc_html( $intro ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $emphasis ) : ?>
		<p class="testro-prod-head__emphasis"><?php echo esc_html( $emphasis ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $intro_extra ) : ?>
		<p class="<?php echo esc_attr( $intro_style_class ); ?> testro-prod-head__intro-extra"><?php echo esc_html( $intro_extra ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $intro_body ) : ?>
		<p class="<?php echo esc_attr( $intro_style_class ); ?>"><?php echo esc_html( $intro_body ); ?></p>
	<?php endif; ?>

	<?php foreach ( $paragraphs as $paragraph ) : ?>
		<?php if ( '' !== (string) $paragraph ) : ?>
			<p class="<?php echo esc_attr( $intro_style_class ); ?>"><?php echo esc_html( (string) $paragraph ); ?></p>
		<?php endif; ?>
	<?php endforeach; ?>
</header>
