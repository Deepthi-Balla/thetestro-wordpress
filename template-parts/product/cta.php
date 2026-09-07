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
$eyebrow       = array_key_exists( 'eyebrow', $args )
	? (string) $args['eyebrow']
	: __( 'Ready when you are', 'testro' );
$supporting    = array_key_exists( 'supporting_line', $args )
	? (string) $args['supporting_line']
	: __( '14-day full access trial · No credit card required', 'testro' );

if ( '' === $title ) {
	return;
}

$heading_id  = $id ? $id . '-heading' : 'product-cta-heading';
$copy_parts  = array_values(
	array_filter(
		array( $intro, $body, $body_extra ),
		static function ( $part ) {
			return '' !== trim( (string) $part );
		}
	)
);
$description = '';
foreach ( $copy_parts as $index => $part ) {
	$part = trim( (string) $part );
	if ( $index > 0 && ! preg_match( '/[.!?]$/u', $description ) ) {
		$description .= '.';
	}
	$description .= ( '' === $description ? '' : ' ' ) . $part;
}
?>
<section
	class="testro-prod-cta"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<div class="testro-container testro-prod-cta__inner" data-reveal>
		<?php
		get_template_part(
			'template-parts/components/section-header',
			null,
			array(
				'label'             => $eyebrow,
				'heading'           => $title,
				'description'       => $description,
				'heading_id'        => $heading_id,
				'heading_level'     => $heading_level,
				'label_color'       => '#fff',
				'heading_color'     => '#fff',
				'description_color' => '#fff',
				'class'             => 'testro-prod-cta__header',
			)
		);
		?>

		<?php
		get_template_part(
			'template-parts/product/actions',
			null,
			array(
				'actions'    => $actions,
				'align'      => 'center',
				'with_arrow' => false,
			)
		);
		?>

		<?php if ( '' !== $supporting ) : ?>
			<p class="testro-prod-cta__note"><?php echo esc_html( $supporting ); ?></p>
		<?php endif; ?>
	</div>
</section>
