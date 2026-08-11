<?php
/**
 * Product page pipeline — connected delivery stages flowing left to right.
 *
 * Expected $args: id, eyebrow, title, intro, items (array[] of icon/stage/title/description).
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-section--tint testro-prod-pipeline"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
			)
		);
		?>

		<ol class="testro-prod-pipeline__flow" style="<?php echo esc_attr( '--pipeline-cols: ' . count( $items ) . ';' ); ?>">
			<?php foreach ( $items as $index => $item ) : ?>
				<li class="testro-prod-pipeline__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms">
					<div class="testro-prod-pipeline__card">
						<div class="testro-prod-pipeline__marker">
							<span class="testro-prod-pipeline__icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<span class="testro-prod-pipeline__connector" aria-hidden="true"></span>
						</div>
						<p class="testro-prod-pipeline__stage-label"><?php echo esc_html( $item['stage'] ); ?></p>
						<h3 class="testro-prod-pipeline__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="testro-prod-pipeline__desc"><?php echo esc_html( $item['description'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
