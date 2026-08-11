<?php
/**
 * Product page requirement traceability matrix with animated stage connections.
 *
 * Expected $args: id, eyebrow, title, intro, stages (array[] of icon/label),
 * items (array[] of icon/title/description).
 *
 * @package TestRo
 */

$args   = isset( $args ) && is_array( $args ) ? $args : array();
$stages = isset( $args['stages'] ) && is_array( $args['stages'] ) ? $args['stages'] : array();
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id     = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $stages && ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';

if ( ! $stages ) {
	$stages = array(
		array(
			'icon'  => 'folder-tree',
			'label' => __( 'Requirements', 'testro' ),
		),
		array(
			'icon'  => 'layout-grid',
			'label' => __( 'Test Cases', 'testro' ),
		),
		array(
			'icon'  => 'zap',
			'label' => __( 'Execution', 'testro' ),
		),
		array(
			'icon'  => 'alert-octagon',
			'label' => __( 'Defects', 'testro' ),
		),
		array(
			'icon'  => 'rocket',
			'label' => __( 'Release', 'testro' ),
		),
	);
}
?>
<section
	class="testro-prod-section testro-prod-section--tint testro-prod-trace"
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

		<?php if ( $stages ) : ?>
			<ol class="testro-prod-trace__matrix" data-reveal aria-label="<?php esc_attr_e( 'Requirement to release traceability path', 'testro' ); ?>">
				<?php foreach ( $stages as $index => $stage ) : ?>
					<li class="testro-prod-trace__stage" style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms">
						<span class="testro-prod-trace__node" aria-hidden="true">
							<?php echo testro_icon( $stage['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<span class="testro-prod-trace__label"><?php echo esc_html( $stage['label'] ); ?></span>
						<?php if ( $index < count( $stages ) - 1 ) : ?>
							<span class="testro-prod-trace__connector" aria-hidden="true">
								<span class="testro-prod-trace__pulse"></span>
							</span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php endif; ?>

		<?php if ( $items ) : ?>
			<ul class="testro-prod-trace__cards">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-trace__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-trace__card-icon" aria-hidden="true">
							<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<h3 class="testro-prod-trace__card-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="testro-prod-trace__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
