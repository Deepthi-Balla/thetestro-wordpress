<?php
/**
 * Two-column product section — SectionHeader intro + numbered rows.
 *
 * Expected $args:
 * - id            (string)  Section anchor id.
 * - eyebrow       (string)  Optional label.
 * - title         (string)  Section heading.
 * - intro         (string)  Optional supporting paragraph.
 * - note          (string)  Optional status line below the intro divider.
 * - heading_level (int)     Semantic heading level 1–6. Default 2.
 * - items         (array[]) Each: title, description.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$id            = isset( $args['id'] ) ? sanitize_title( (string) $args['id'] ) : '';
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$note          = isset( $args['note'] ) ? (string) $args['note'] : '';
$items         = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_id    = $id ? $id . '-heading' : '';

if ( '' === $title && ! $items ) {
	return;
}
?>
<section
	class="testro-page-section testro-split-list"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-page-section__inner testro-split-list__inner">
		<div class="testro-split-list__intro">
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
					'label_color'       => '#fff',
					'heading_color'     => '#fff',
					'description_color' => '#fff',
					'attrs'             => array(
						'data-reveal' => true,
					),
				)
			);
			?>

			<?php if ( '' !== $note ) : ?>
				<hr class="testro-split-list__rule" />
				<p class="testro-split-list__status">
					<span class="testro-split-list__status-dot" aria-hidden="true"></span>
					<?php echo esc_html( $note ); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php if ( $items ) : ?>
			<ol class="testro-split-list__items">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
					$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
					if ( '' === $item_title && '' === $item_desc ) {
						continue;
					}
					?>
					<li class="testro-split-list__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-split-list__num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						<div class="testro-split-list__body">
							<?php if ( '' !== $item_title ) : ?>
								<h3 class="testro-feature-card__title"><?php echo esc_html( $item_title ); ?></h3>
							<?php endif; ?>
							<?php if ( '' !== $item_desc ) : ?>
								<p class="testro-feature-card__desc"><?php echo esc_html( $item_desc ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php endif; ?>
	</div>
</section>
