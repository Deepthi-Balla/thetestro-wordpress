<?php
/**
 * Product page outcomes — measurable business results as benefit cards.
 *
 * Expected $args: id, eyebrow, title, intro, variant (optional tint/spotlight),
 * items (array[] of icon/title, optional description). When description is
 * present the card stacks copy vertically; AI page items without descriptions
 * keep the compact layout.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : '';

if ( ! $items ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-outcomes';
if ( $variant ) {
	$section_class .= ' testro-prod-section--' . $variant;
}
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'         => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
			)
		);
		?>

		<ul class="testro-prod-outcomes__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$has_desc = ! empty( $item['description'] );
				$classes  = 'testro-prod-outcomes__item' . ( $has_desc ? ' testro-prod-outcomes__item--rich' : '' );
				?>
				<li class="<?php echo esc_attr( $classes ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
					<span class="testro-prod-outcomes__motif" aria-hidden="true"></span>
					<span class="testro-prod-outcomes__icon" aria-hidden="true">
						<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<span class="testro-prod-outcomes__text">
						<h3 class="testro-prod-outcomes__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<?php if ( $has_desc ) : ?>
							<p class="testro-prod-outcomes__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</span>
					<span class="testro-prod-outcomes__arrow" aria-hidden="true">
						<?php echo testro_icon( 'arrow-right', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-outcomes__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
