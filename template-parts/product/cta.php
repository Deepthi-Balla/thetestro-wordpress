<?php
/**
 * Product page closing CTA band.
 *
 * Expected $args: id, title, intro, body (string, optional second paragraph),
 * actions (array[]), assurances (string[]), heading_level (int, default 2).
 *
 * @package TestRo
 */

$args       = isset( $args ) && is_array( $args ) ? $args : array();
$title      = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$body          = isset( $args['body'] ) ? (string) $args['body'] : '';
$body_extra    = isset( $args['body_extra'] ) ? (string) $args['body_extra'] : '';
$actions       = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$assurances = isset( $args['assurances'] ) && is_array( $args['assurances'] ) ? $args['assurances'] : array();
$id            = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag   = 'h' . $heading_level;

if ( '' === $title ) {
	return;
}

$heading_id = $id ? $id . '-heading' : 'product-cta-heading';
?>
<section
	class="testro-prod-cta"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<div class="testro-container">
		<div class="testro-prod-cta__card" data-reveal>
			<span class="testro-prod-cta__glow" aria-hidden="true"></span>

			<div class="testro-prod-cta__body">
				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
				<<?php echo $heading_tag; ?> id="<?php echo esc_attr( $heading_id ); ?>" class="testro-prod-cta__title main-headings">
					<?php echo esc_html( $title ); ?>
				</<?php echo $heading_tag; ?>>

				<?php if ( '' !== $intro ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $intro ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $body ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $body ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $body_extra ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $body_extra ); ?></p>
				<?php endif; ?>

				<?php
				get_template_part(
					'template-parts/product/actions',
					null,
					array(
						'actions' => $actions,
						'tone'    => 'dark',
					)
				);
				?>

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
