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
 * - header_style=three-lines → Home Why theTestRo three-line header
 *   (eyebrow/title/intro, or title/intro/intro_extra when no eyebrow).
 * - header_style=faq-label → FAQ small cyan mono label + title + intro
 *   (requires eyebrow; same markup rhythm as FAQ on every page).
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
 * - header_style  (string)  Optional 'three-lines' or 'faq-label'.
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
$header_style  = isset( $args['header_style'] ) ? (string) $args['header_style'] : '';

if ( 'faq-label' === $header_style ) {
	/*
	 * Same three-line rhythm as FAQ on every page:
	 * small cyan mono label / large navy title / slate intro.
	 * Optional intro_extra stays as a fourth supporting line.
	 */
	$label = '' !== $eyebrow ? $eyebrow : '';
	if ( '' === $label && '' === $title ) {
		return;
	}
	?>
	<header class="testro-section-header testro-section-header--three-lines testro-section-header--faq-label" data-reveal>
		<?php if ( '' !== $label ) : ?>
			<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
			<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="main-headings"><?php echo esc_html( testro_section_label_title( $label ) ); ?></<?php echo $heading_tag; ?>>
		<?php endif; ?>
		<?php if ( '' !== $title ) : ?>
			<p class="sub-text"><?php echo esc_html( $title ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $intro ) : ?>
			<p class="sub-text"><?php echo esc_html( $intro ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $intro_extra ) : ?>
			<p class="sub-text testro-prod-head__intro-extra"><?php echo esc_html( $intro_extra ); ?></p>
		<?php endif; ?>
	</header>
	<?php
	return;
}

if ( 'three-lines' === $header_style ) {
	/*
	 * Same three-line header as Home → Why theTestRo.
	 * With eyebrow: eyebrow / title / intro.
	 * Without: title / intro / intro_extra.
	 */
	$line_heading = $eyebrow;
	$line_two     = $title;
	$line_three   = $intro;
	if ( '' === $line_heading ) {
		$line_heading = $line_two;
		$line_two     = $line_three;
		$line_three   = $intro_extra;
	}
	if ( '' === $line_heading ) {
		return;
	}
	?>
	<header class="testro-section-header testro-section-header--three-lines testro-why__header" data-reveal>
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
		<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="main-headings testro-why__heading"><?php echo esc_html( testro_section_label_title( $line_heading ) ); ?></<?php echo $heading_tag; ?>>
		<?php if ( '' !== $line_two ) : ?>
			<p class="sub-text testro-why__intro"><?php echo esc_html( $line_two ); ?></p>
		<?php endif; ?>
		<?php if ( '' !== $line_three ) : ?>
			<p class="sub-text testro-why__intro"><?php echo esc_html( $line_three ); ?></p>
		<?php endif; ?>
	</header>
	<?php
	return;
}

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
?>
<header class="testro-prod-head testro-prod-head--<?php echo esc_attr( $tone ); ?> testro-prod-head--<?php echo esc_attr( $align ); ?>" data-reveal>
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
