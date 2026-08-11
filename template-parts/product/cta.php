<?php
/**
 * Product page closing CTA band.
 *
 * Expected $args: id, title, intro, actions (array[]), assurances (string[]).
 *
 * @package TestRo
 */

$args       = isset( $args ) && is_array( $args ) ? $args : array();
$title      = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro      = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$actions    = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$assurances = isset( $args['assurances'] ) && is_array( $args['assurances'] ) ? $args['assurances'] : array();
$id         = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

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
				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-prod-cta__title main-headings">
					<?php echo esc_html( $title ); ?>
				</h2>

				<?php if ( '' !== $intro ) : ?>
					<p class="testro-prod-cta__intro"><?php echo esc_html( $intro ); ?></p>
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
