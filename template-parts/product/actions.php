<?php
/**
 * Product page CTA group.
 *
 * Expected $args:
 * - actions (array[]) Each: label, style ('primary'|'outline'), modal (string
 *   modal id) or href (string), icon (optional icon key for outline buttons).
 * - align   (string)  'center' (default) or 'start'.
 * - tone    (string)  'light' (default) or 'dark' for brand backgrounds.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$actions = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$align   = isset( $args['align'] ) && 'start' === $args['align'] ? 'start' : 'center';
$tone    = isset( $args['tone'] ) && 'dark' === $args['tone'] ? 'dark' : 'light';

if ( ! $actions ) {
	return;
}
?>
<div class="testro-prod-actions testro-prod-actions--<?php echo esc_attr( $align ); ?> testro-prod-actions--<?php echo esc_attr( $tone ); ?>">
	<?php foreach ( $actions as $action ) : ?>
		<?php
		$label = isset( $action['label'] ) ? (string) $action['label'] : '';
		if ( '' === $label ) {
			continue;
		}

		$style   = isset( $action['style'] ) && 'outline' === $action['style'] ? 'outline' : 'primary';
		$modal   = isset( $action['modal'] ) ? (string) $action['modal'] : '';
		$href    = isset( $action['href'] ) ? (string) $action['href'] : '';
		$classes = 'primary' === $style
			? 'testro-btn testro-btn--primary testro-prod-actions__btn'
			: 'testro-btn testro-btn--outline testro-prod-actions__btn testro-prod-actions__btn--outline';

		$attrs = array( 'class' => $classes );
		if ( $modal ) {
			$attrs['data-open-modal'] = $modal;
			$attrs['aria-haspopup']   = 'dialog';
			$attrs['aria-controls']   = $modal;
			$attrs['type']            = 'button';
		}
		?>

		<?php if ( 'primary' === $style ) : ?>
			<?php
			get_template_part(
				'template-parts/components/primary-button',
				null,
				array(
					'label' => $label,
					'href'  => $modal ? '' : $href,
					'attrs' => $attrs,
				)
			);
			?>
		<?php else : ?>
			<?php
			$attr_string = '';
			foreach ( $attrs as $key => $value ) {
				$attr_string .= sprintf( ' %s="%s"', esc_attr( $key ), esc_attr( $value ) );
			}
			$icon = isset( $action['icon'] ) ? testro_icon( $action['icon'], array( 'size' => 18, 'class' => 'testro-prod-actions__icon' ) ) : '';
			?>
			<?php if ( $modal || '' === $href ) : ?>
				<button<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
					<span><?php echo esc_html( $label ); ?></span>
					<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
				</button>
			<?php else : ?>
				<a href="<?php echo esc_url( $href ); ?>"<?php echo $attr_string; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
					<span><?php echo esc_html( $label ); ?></span>
					<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
				</a>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
