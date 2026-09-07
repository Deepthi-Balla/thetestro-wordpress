<?php
/**
 * Global feature card — optional icon/badge, title, description.
 *
 * Layout and typography match the Home page AI Capabilities cards.
 * Pass colors/background only when a section needs a different theme.
 * Omit icon/badge to render title + description only (no empty icon shell).
 *
 * Expected $args:
 * - icon                 (string)  Optional icon name for testro_icon().
 * - badge                (string)  Optional label in the icon well (e.g. step number).
 *                                  When set alone, renders instead of the SVG icon.
 *                                  With the `step` variant, renders beside the icon.
 * - label                (string)  Optional uppercase eyebrow above the title.
 *                                  When icon/badge are omitted, this acts as the
 *                                  leading content in place of the icon well.
 *                                  Theme via --feature-card-label-font,
 *                                  --feature-card-label-tracking,
 *                                  --feature-card-label-height.
 * - title                (string)  Card heading.
 * - description          (string)  Card body copy.
 * - tag                  (string)  Wrapper tag: 'div' (default), 'li', or 'article'.
 * - background           (string)  Optional CSS background for the card.
 * - border_color         (string)  Optional CSS border color.
 * - title_color          (string)  Optional CSS color for the title.
 * - description_color    (string)  Optional CSS color for the description.
 * - icon_background      (string)  Optional CSS background for the icon well.
 * - icon_color           (string)  Optional CSS color for the icon/badge.
 * - image                (string)  Optional image path for media / media-inline /
 *                                  media-footer.
 * - image_alt            (string)  Optional alt text when image is set.
 * - image_width          (int)     Optional intrinsic width for the image.
 * - image_height         (int)     Optional intrinsic height for the image.
 * - variant              (string)  'default' | 'light' | 'tint' | 'horizontal' |
 *                                  'media' | 'media-inline' | 'media-footer' |
 *                                  'step'.
 * - theme                (string)  Optional accent: 'navy' | 'sky'. Sets title
 *                                  and icon/badge colors via controlled CSS.
 * - class                (string)  Optional extra classes on the root.
 * - attrs                (array)   Optional HTML attributes (e.g. data-reveal).
 * - heading_level        (int)     Title heading level 1–6. Default 3.
 *
 * @package TestRo
 */

$args              = isset( $args ) && is_array( $args ) ? $args : array();
$icon              = isset( $args['icon'] ) ? (string) $args['icon'] : '';
$badge             = isset( $args['badge'] ) ? (string) $args['badge'] : '';
$label             = isset( $args['label'] ) ? (string) $args['label'] : '';
$title             = isset( $args['title'] ) ? (string) $args['title'] : '';
$description       = isset( $args['description'] ) ? (string) $args['description'] : '';
$image             = isset( $args['image'] ) ? (string) $args['image'] : '';
$image_alt         = isset( $args['image_alt'] ) ? (string) $args['image_alt'] : '';
$image_width       = isset( $args['image_width'] ) ? max( 0, (int) $args['image_width'] ) : 0;
$image_height      = isset( $args['image_height'] ) ? max( 0, (int) $args['image_height'] ) : 0;
$tag               = isset( $args['tag'] ) ? strtolower( (string) $args['tag'] ) : 'div';
$allowed_variants  = array( 'default', 'light', 'tint', 'horizontal', 'media', 'media-inline', 'media-footer', 'step' );
$variant           = isset( $args['variant'] ) ? (string) $args['variant'] : 'default';
if ( ! in_array( $variant, $allowed_variants, true ) ) {
	$variant = 'default';
}
$is_horizontal     = 'horizontal' === $variant;
$is_media          = 'media' === $variant;
$is_media_inline   = 'media-inline' === $variant;
$is_media_footer   = 'media-footer' === $variant;
$is_step           = 'step' === $variant;
$has_media         = $is_media || $is_media_inline || $is_media_footer;
$wrap_body         = $is_horizontal || $is_media_inline;
$background        = isset( $args['background'] ) ? (string) $args['background'] : '';
$border_color      = isset( $args['border_color'] ) ? (string) $args['border_color'] : '';
$title_color       = isset( $args['title_color'] ) ? (string) $args['title_color'] : '';
$description_color = isset( $args['description_color'] ) ? (string) $args['description_color'] : '';
$icon_background   = isset( $args['icon_background'] ) ? (string) $args['icon_background'] : '';
$icon_color        = isset( $args['icon_color'] ) ? (string) $args['icon_color'] : '';
$extra_class       = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';
$theme             = isset( $args['theme'] ) ? (string) $args['theme'] : '';
if ( ! in_array( $theme, array( 'navy', 'sky' ), true ) ) {
	$theme = '';
}
$attrs             = isset( $args['attrs'] ) && is_array( $args['attrs'] ) ? $args['attrs'] : array();
$heading_level     = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 3;
$heading_tag       = 'h' . $heading_level;
$has_icon_well     = '' !== $badge || '' !== $icon;

if ( ! in_array( $tag, array( 'div', 'li', 'article' ), true ) ) {
	$tag = 'div';
}

if ( ! $has_icon_well && ! $has_media && '' === $label && '' === $title && '' === $description ) {
	return;
}

$style_vars = array();
if ( '' !== $background ) {
	$style_vars[] = '--feature-card-bg: ' . $background;
}
if ( '' !== $border_color ) {
	$style_vars[] = '--feature-card-border: ' . $border_color;
}
if ( '' !== $title_color ) {
	$style_vars[] = '--feature-card-title-color: ' . $title_color;
}
if ( '' !== $description_color ) {
	$style_vars[] = '--feature-card-desc-color: ' . $description_color;
}
if ( '' !== $icon_background ) {
	$style_vars[] = '--feature-card-icon-bg: ' . $icon_background;
}
if ( '' !== $icon_color ) {
	$style_vars[] = '--feature-card-icon-color: ' . $icon_color;
}

$style = isset( $attrs['style'] ) ? trim( (string) $attrs['style'] ) : '';
unset( $attrs['style'] );
if ( $style_vars ) {
	$style = ( '' !== $style ? rtrim( $style, '; ' ) . '; ' : '' ) . implode( '; ', $style_vars );
}

$class = 'testro-feature-card';
if ( 'default' !== $variant ) {
	$class .= ' testro-feature-card--' . $variant;
}
if ( '' !== $theme ) {
	$class .= ' testro-feature-card--theme-' . $theme;
}
if ( ! $has_icon_well && ! $has_media ) {
	$class .= ' testro-feature-card--no-icon';
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
if ( '' !== $style ) {
	$attr_string .= ' style="' . esc_attr( $style ) . '"';
}

/**
 * Render media block (shared by media / media-inline / media-footer).
 *
 * @param string $image        Image path.
 * @param string $image_alt    Alt text.
 * @param int    $image_width  Width.
 * @param int    $image_height Height.
 */
$render_media = static function ( $image, $image_alt, $image_width, $image_height ) {
	?>
	<div class="testro-feature-card__media<?php echo '' === $image ? ' testro-feature-card__media--placeholder' : ''; ?>"<?php echo '' === $image ? ' aria-hidden="true"' : ''; ?>>
		<?php if ( '' !== $image ) : ?>
			<?php
			$img_attrs = array(
				'class'   => 'testro-feature-card__image',
				'loading' => 'lazy',
			);
			if ( $image_width ) {
				$img_attrs['width'] = $image_width;
			}
			if ( $image_height ) {
				$img_attrs['height'] = $image_height;
			}
			echo testro_picture( $image, $image_alt, $img_attrs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside helper.
			?>
		<?php endif; ?>
	</div>
	<?php
};
?>
<<?php echo esc_attr( $tag ); ?> class="<?php echo esc_attr( $class ); ?>"<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- built with esc_attr above. ?>>
	<?php if ( $is_media || $is_media_inline ) : ?>
		<?php $render_media( $image, $image_alt, $image_width, $image_height ); ?>
	<?php elseif ( $is_step && $has_icon_well ) : ?>
		<div class="testro-feature-card__meta">
			<?php if ( '' !== $icon ) : ?>
				<span class="testro-feature-card__icon" aria-hidden="true">
					<?php echo testro_icon( $icon, array( 'size' => 30, 'stroke' => 2 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
				</span>
			<?php endif; ?>
			<?php if ( '' !== $badge ) : ?>
				<span class="testro-feature-card__connector" aria-hidden="true"></span>
				<span class="testro-feature-card__badge"><?php echo esc_html( $badge ); ?></span>
			<?php endif; ?>
		</div>
	<?php elseif ( $has_icon_well ) : ?>
		<span class="testro-feature-card__icon" aria-hidden="true">
			<?php if ( '' !== $badge ) : ?>
				<span class="testro-feature-card__badge"><?php echo esc_html( $badge ); ?></span>
			<?php else : ?>
				<?php echo testro_icon( $icon, array( 'size' => 20, 'stroke' => 2 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
			<?php endif; ?>
		</span>
	<?php endif; ?>

	<?php if ( $wrap_body ) : ?>
		<div class="testro-feature-card__body">
	<?php endif; ?>

	<?php if ( '' !== $label ) : ?>
		<p class="testro-feature-card__label"><?php echo esc_html( $label ); ?></p>
	<?php endif; ?>

	<?php if ( '' !== $title ) : ?>
		<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
		<<?php echo $heading_tag; ?> class="testro-feature-card__title"><?php echo esc_html( $title ); ?></<?php echo $heading_tag; ?>>
	<?php endif; ?>

	<?php if ( '' !== $description ) : ?>
		<p class="testro-feature-card__desc"><?php echo esc_html( $description ); ?></p>
	<?php endif; ?>

	<?php if ( $wrap_body ) : ?>
		</div>
	<?php endif; ?>

	<?php if ( $is_media_footer ) : ?>
		<div class="testro-feature-card__media-wrap">
			<?php $render_media( $image, $image_alt, $image_width, $image_height ); ?>
		</div>
	<?php endif; ?>
</<?php echo esc_attr( $tag ); ?>>
