<?php
/**
 * Product page outcomes — measurable business results as benefit cards.
 *
 * Expected $args: id, eyebrow, title, intro, variant (optional tint/spotlight),
 * intro_layout (string) 'default' | 'sec-header'
 *     'sec-header' uses the global SectionHeader (.testro-sec-header).
 * label_color / heading_color / description_color (string) Optional theme
 *     colors when intro_layout is 'sec-header'.
 * items (array[] of icon/title, optional description). When description is
 * present the card stacks copy vertically; AI page items without descriptions
 * keep the compact layout.
 * - outro (string) Optional right-aligned supporting statement via
 *     global SupportingText (slate default).
 * - outro_variant (string) SupportingText variant: 'default' | 'on-dark'.
 *
 * @package TestRo
 */

$args               = isset( $args ) && is_array( $args ) ? $args : array();
$items              = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id                 = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant            = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : '';
$intro_layout       = isset( $args['intro_layout'] ) ? sanitize_html_class( (string) $args['intro_layout'] ) : 'default';
$eyebrow            = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title              = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro              = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$heading_level      = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$label_color        = isset( $args['label_color'] ) ? (string) $args['label_color'] : '';
$heading_color      = isset( $args['heading_color'] ) ? (string) $args['heading_color'] : '';
$description_color  = isset( $args['description_color'] ) ? (string) $args['description_color'] : '';
$outro              = isset( $args['outro'] ) ? (string) $args['outro'] : '';
$outro_variant      = isset( $args['outro_variant'] ) && 'on-dark' === $args['outro_variant'] ? 'on-dark' : 'default';

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
		<?php if ( 'sec-header' === $intro_layout && ( '' !== $title || '' !== $eyebrow || '' !== $intro ) ) : ?>
			<?php
			get_template_part(
				'template-parts/components/section-header',
				null,
				array(
					'label'             => $eyebrow,
					'heading'           => $title,
					'description'       => $intro,
					'heading_id'        => $heading_id,
					'heading_level'     => $heading_level,
					'label_color'       => $label_color,
					'heading_color'     => $heading_color,
					'description_color' => $description_color,
					'attrs'             => array(
						'data-reveal' => true,
					),
				)
			);
			?>
		<?php else : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => $eyebrow,
					'title'         => $title,
					'intro'         => $intro,
					'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => $heading_level,
				)
			);
			?>
		<?php endif; ?>

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
						<?php
						$item_heading_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
						$item_heading_tag   = 'h' . $item_heading_level;
						?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag name is derived from a numeric arg. ?>
						<<?php echo $item_heading_tag; ?> class="testro-prod-outcomes__title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_heading_tag; ?>>
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

		<?php if ( '' !== $outro ) : ?>
			<?php
			get_template_part(
				'template-parts/components/supporting-text',
				null,
				array(
					'text'    => $outro,
					'variant' => $outro_variant,
					'attrs'   => array(
						'data-reveal' => true,
					),
				)
			);
			?>
		<?php endif; ?>
	</div>
</section>
