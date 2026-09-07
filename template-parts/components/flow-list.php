<?php
/**
 * Global dotted flow list — timeline dots + copy rows.
 *
 * Source of truth: DevOps & Continuous Quality flow rows.
 * Dots, 37px gap, and text-only bottom borders are fixed globally.
 * Theme colors (line, border, title, description) via variant or CSS vars.
 *
 * Expected $args:
 * - items             (array[]) Each: title, description.
 * - variant           (string)  'default' (light) | 'on-dark' | 'navy'.
 * - layout            (string)  'default' (title above description) |
 *                               'inline' (dot + title + description in a row).
 * - class             (string)  Optional extra classes on the list.
 * - tag               (string)  'ol' (default) or 'ul'.
 * - title_color       (string)  Optional CSS color for titles.
 * - description_color (string)  Optional CSS color for descriptions.
 * - line_color        (string)  Optional CSS color for the vertical connector.
 * - border_color      (string)  Optional CSS color for row bottom borders.
 * - dot_background    (string)  Optional CSS color for step dots.
 * - dot_border        (string)  Optional CSS color for step dot borders/rings.
 *
 * @package TestRo
 */

$args              = isset( $args ) && is_array( $args ) ? $args : array();
$items             = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$allowed_variants  = array( 'default', 'on-dark', 'navy' );
$variant           = isset( $args['variant'] ) ? (string) $args['variant'] : 'default';
if ( ! in_array( $variant, $allowed_variants, true ) ) {
	$variant = 'default';
}
$layout            = isset( $args['layout'] ) && 'inline' === $args['layout'] ? 'inline' : 'default';
$extra_class       = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';
$tag               = isset( $args['tag'] ) ? strtolower( (string) $args['tag'] ) : 'ol';
$title_color       = isset( $args['title_color'] ) ? (string) $args['title_color'] : '';
$description_color = isset( $args['description_color'] ) ? (string) $args['description_color'] : '';
$line_color        = isset( $args['line_color'] ) ? (string) $args['line_color'] : '';
$border_color      = isset( $args['border_color'] ) ? (string) $args['border_color'] : '';
$dot_background    = isset( $args['dot_background'] ) ? (string) $args['dot_background'] : '';
$dot_border        = isset( $args['dot_border'] ) ? (string) $args['dot_border'] : '';

if ( ! in_array( $tag, array( 'ol', 'ul' ), true ) ) {
	$tag = 'ol';
}

if ( ! $items ) {
	return;
}

$style_vars = array();
if ( '' !== $title_color ) {
	$style_vars[] = '--flow-list-title-color: ' . $title_color;
}
if ( '' !== $description_color ) {
	$style_vars[] = '--flow-list-desc-color: ' . $description_color;
}
if ( '' !== $line_color ) {
	$style_vars[] = '--flow-list-line: ' . $line_color;
}
if ( '' !== $border_color ) {
	$style_vars[] = '--flow-list-border: ' . $border_color;
}
if ( '' !== $dot_background ) {
	$style_vars[] = '--flow-list-dot-bg: ' . $dot_background;
}
if ( '' !== $dot_border ) {
	$style_vars[] = '--flow-list-dot-border: ' . $dot_border;
	$style_vars[] = '--flow-list-dot-ring: ' . $dot_border;
}

$class = 'testro-flow-list';
if ( 'default' !== $variant ) {
	$class .= ' testro-flow-list--' . $variant;
}
if ( 'inline' === $layout ) {
	$class .= ' testro-flow-list--inline';
}
if ( '' !== $extra_class ) {
	$class .= ' ' . $extra_class;
}

$style_attr = $style_vars ? ' style="' . esc_attr( implode( '; ', $style_vars ) ) . '"' : '';
?>
<<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sanitized ol|ul. ?> class="<?php echo esc_attr( $class ); ?>"<?php echo $style_attr; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
	<?php foreach ( $items as $index => $item ) : ?>
		<?php
		$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
		$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
		if ( '' === $item_title && '' === $item_desc ) {
			continue;
		}
		?>
		<li
			class="testro-flow-list__item"
			data-reveal
			style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms"
		>
			<span class="testro-flow-list__dot" aria-hidden="true"></span>
			<div class="testro-flow-list__body">
				<?php if ( '' !== $item_title ) : ?>
					<h3 class="testro-feature-card__title testro-flow-list__title"><?php echo esc_html( $item_title ); ?></h3>
				<?php endif; ?>
				<?php if ( '' !== $item_desc ) : ?>
					<p class="testro-feature-card__desc testro-flow-list__desc"><?php echo esc_html( $item_desc ); ?></p>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</<?php echo $tag; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- sanitized ol|ul. ?>>
