<?php
/**
 * Product page closing CTA band.
 *
 * Expected $args: id, title, intro, body (string, optional second paragraph),
 * note (string), actions (array[]), assurances (string[]), heading_level (int),
 * variant ('default'|'brand').
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$body          = isset( $args['body'] ) ? (string) $args['body'] : '';
$body_extra    = isset( $args['body_extra'] ) ? (string) $args['body_extra'] : '';
$note          = isset( $args['note'] ) ? (string) $args['note'] : '';
$actions       = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
if ( function_exists( 'testro_filter_footer_cta_actions' ) ) {
	$actions = testro_filter_footer_cta_actions( $actions );
}
$assurances    = isset( $args['assurances'] ) && is_array( $args['assurances'] ) ? $args['assurances'] : array();
$id            = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag   = 'h' . $heading_level;
$variant       = isset( $args['variant'] ) && 'brand' === $args['variant'] ? 'brand' : 'default';
$is_brand      = 'brand' === $variant;

if ( '' === $title && '' === $intro ) {
	return;
}

$heading_id   = $id ? $id . '-heading' : 'product-cta-heading';
$section_class = 'testro-prod-cta' . ( $is_brand ? ' testro-prod-cta--brand' : '' );

/* Brand variant: title = eyebrow, intro = primary heading (Framer Final CTA). */
$eyebrow_text  = $is_brand ? $title : '';
$heading_text = $is_brand ? ( '' !== $intro ? $intro : $title ) : $title;
$lead_text    = $is_brand ? $body : $intro;
$second_text  = $is_brand ? $body_extra : $body;
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<div class="testro-container">
		<div class="testro-prod-cta__card" data-reveal>
			<span class="testro-prod-cta__glow" aria-hidden="true"></span>

			<div class="testro-prod-cta__body">
				<?php if ( '' !== $eyebrow_text ) : ?>
					<p class="testro-section-eyebrow testro-prod-cta__eyebrow"><?php echo esc_html( $eyebrow_text ); ?></p>
				<?php endif; ?>

				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
				<<?php echo $heading_tag; ?> id="<?php echo esc_attr( $heading_id ); ?>" class="testro-prod-cta__title main-headings">
					<?php echo esc_html( $heading_text ); ?>
				</<?php echo $heading_tag; ?>>

				<?php if ( '' !== $lead_text ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $lead_text ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $second_text ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $second_text ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $body_extra && ! $is_brand ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $body_extra ); ?></p>
				<?php endif; ?>

				<?php
				get_template_part(
					'template-parts/product/actions',
					null,
					array(
						'actions' => $actions,
						'tone'    => $is_brand ? 'dark' : 'dark',
						'align'   => $is_brand ? 'center' : 'center',
					)
				);
				?>

				<?php if ( '' !== $note ) : ?>
					<p class="testro-prod-cta__note"><?php echo esc_html( $note ); ?></p>
				<?php endif; ?>

				<?php if ( $assurances ) : ?>
					<ul class="testro-prod-cta__assurances">
						<?php foreach ( $assurances as $assurance ) : ?>
							<li>
								<?php echo testro_icon( 'circle-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<?php echo esc_html( $assurance ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
