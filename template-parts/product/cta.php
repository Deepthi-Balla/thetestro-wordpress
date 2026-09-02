<?php
/**
 * Shared closing CTA band — full-width gradient section used across the site.
 *
 * Expected $args: id, title, intro, body, body_extra, actions (array[]),
 * eyebrow (string), supporting_line (string), heading_level (int, default 2).
 * Content varies per page; structure and styling stay the same.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$body          = isset( $args['body'] ) ? (string) $args['body'] : '';
$body_extra    = isset( $args['body_extra'] ) ? (string) $args['body_extra'] : '';
$actions       = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$id            = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag   = 'h' . $heading_level;
$eyebrow       = array_key_exists( 'eyebrow', $args )
	? (string) $args['eyebrow']
	: __( 'Ready when you are', 'testro' );
$supporting    = array_key_exists( 'supporting_line', $args )
	? (string) $args['supporting_line']
	: __( '14-day full access trial · No credit card required', 'testro' );

if ( '' === $title ) {
	return;
}

$heading_id = $id ? $id . '-heading' : 'product-cta-heading';
$copy_parts = array_values( array_filter( array( $intro, $body, $body_extra ) ) );
?>
<section
	class="testro-prod-cta"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<div class="testro-container testro-prod-cta__inner" data-reveal>
		<div class="testro-prod-cta__head">
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="testro-prod-cta__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>

			<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
			<<?php echo $heading_tag; ?> id="<?php echo esc_attr( $heading_id ); ?>" class="testro-prod-cta__title">
				<?php echo esc_html( $title ); ?>
			</<?php echo $heading_tag; ?>>
		</div>

		<?php if ( $copy_parts ) : ?>
			<div class="testro-prod-cta__copy">
				<?php foreach ( $copy_parts as $copy ) : ?>
					<p class="testro-prod-cta__text"><?php echo esc_html( $copy ); ?></p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php
		get_template_part(
			'template-parts/product/actions',
			null,
			array(
				'actions'    => $actions,
				'align'      => 'center',
				'tone'       => 'dark',
				'with_arrow' => false,
			)
		);
		?>

		<?php if ( '' !== $supporting ) : ?>
			<p class="testro-prod-cta__note"><?php echo esc_html( $supporting ); ?></p>
		<?php endif; ?>
	</div>
</section>
