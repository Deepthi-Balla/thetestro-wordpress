<?php
/**
 * Numbered feature list — horizontal FeatureCards with step badges.
 *
 * Source of truth: Validate Every Response right column
 * (number + heading + description, separators between rows).
 *
 * Expected $args:
 * - items (array[]) Each: title, description.
 *     Optional theme: 'navy' | 'sky' (row accent for title + badge).
 * - pad     (int)    Zero-pad width for badges (e.g. 2 → 01). Default 0.
 * - variant (string) 'default' (circular badges + separators) | 'tiles'
 *     (square #EAF3FC wells, no separators).
 * - class   (string) Optional extra classes on the list.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$pad     = isset( $args['pad'] ) ? max( 0, (int) $args['pad'] ) : 0;
$variant = isset( $args['variant'] ) && 'tiles' === $args['variant'] ? 'tiles' : 'default';
$class   = 'testro-numbered-feature-list';
if ( 'tiles' === $variant ) {
	$class .= ' testro-numbered-feature-list--tiles';
}
if ( ! empty( $args['class'] ) ) {
	$class .= ' ' . trim( (string) $args['class'] );
}

if ( ! $items ) {
	return;
}
?>
<ul class="<?php echo esc_attr( $class ); ?>">
	<?php foreach ( $items as $index => $item ) : ?>
		<?php
		$step  = $index + 1;
		$badge = $pad > 0 ? sprintf( '%0' . $pad . 'd', $step ) : (string) $step;
		$theme = isset( $item['theme'] ) ? (string) $item['theme'] : '';
		if ( ! in_array( $theme, array( 'navy', 'sky' ), true ) ) {
			$theme = '';
		}

		$card_args = array(
			'title'             => isset( $item['title'] ) ? (string) $item['title'] : '',
			'description'       => isset( $item['description'] ) ? (string) $item['description'] : '',
			'badge'             => $badge,
			'tag'               => 'li',
			'variant'           => 'horizontal',
			'description_color' => '#5B7290',
			'attrs'             => array(
				'data-reveal' => true,
				'style'       => '--reveal-delay: ' . ( (int) $index * 70 ) . 'ms',
			),
		);

		if ( 'tiles' === $variant ) {
			$card_args['icon_background'] = '#EAF3FC';
			$card_args['attrs']['style'] .= '; --feature-card-row-gap: 18px; --feature-card-icon-border: transparent';
		} else {
			$card_args['title_color']     = 'var(--color-brand-navy)';
			$card_args['icon_background'] = 'transparent';
			$card_args['icon_color']      = '#1678DD';
			$card_args['attrs']['style'] .= '; --feature-card-row-gap: 20px; --feature-card-icon-border: var(--color-brand-sky)';
		}

		if ( '' !== $theme ) {
			$card_args['theme'] = $theme;
		} elseif ( 'tiles' === $variant ) {
			$card_args['theme'] = 'navy';
		}

		get_template_part( 'template-parts/components/feature-card', null, $card_args );
		?>
	<?php endforeach; ?>
</ul>
