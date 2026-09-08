<?php
/**
 * Product page pipeline / DevOps flow.
 *
 * layout=timeline (Framer AI): vertical title+desc with left flow markers.
 * default: horizontal stage cards.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : 'tint';
$layout  = isset( $args['layout'] ) ? (string) $args['layout'] : '';
$is_timeline = ( 'timeline' === $layout || 'timeline-cards' === $layout );
$is_timeline_cards = ( 'timeline-cards' === $layout );

if ( ! $items ) {
	return;
}

if ( ! in_array( $variant, array( 'default', 'tint', 'brand', 'spotlight' ), true ) ) {
	$variant = 'tint';
}

$tone       = 'brand' === $variant ? 'dark' : 'light';
$heading_id = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-section--' . $variant . ' testro-prod-pipeline';
if ( $is_timeline ) {
	$section_class .= ' testro-prod-pipeline--timeline';
}
if ( $is_timeline_cards ) {
	$section_class .= ' testro-prod-pipeline--timeline-cards';
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
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
				'tone'          => $tone,
				'align'         => isset( $args['align'] ) ? $args['align'] : 'center',
			)
		);
		?>

		<?php if ( $is_timeline ) : ?>
			<ol class="testro-prod-pipeline__timeline">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-pipeline__timeline-item">
						<span class="testro-prod-pipeline__timeline-marker" aria-hidden="true"></span>
						<?php if ( $is_timeline_cards ) : ?>
							<div class="testro-prod-pipeline__timeline-card">
								<h3 class="testro-prod-pipeline__timeline-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-pipeline__timeline-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						<?php else : ?>
							<div class="testro-prod-pipeline__timeline-body">
								<h3 class="testro-prod-pipeline__timeline-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-pipeline__timeline-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php else : ?>
			<ol class="testro-prod-pipeline__flow" style="<?php echo esc_attr( '--pipeline-cols: ' . count( $items ) . ';' ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-pipeline__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms">
						<div class="testro-prod-pipeline__card">
							<div class="testro-prod-pipeline__marker">
								<?php if ( ! empty( $item['icon'] ) ) : ?>
								<span class="testro-prod-pipeline__icon" aria-hidden="true">
									<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
								<?php endif; ?>
								<span class="testro-prod-pipeline__connector" aria-hidden="true"></span>
							</div>
							<?php if ( ! empty( $item['stage'] ) ) : ?>
								<p class="testro-prod-pipeline__stage-label"><?php echo esc_html( $item['stage'] ); ?></p>
							<?php endif; ?>
							<p class="testro-prod-pipeline__title"><?php echo esc_html( $item['title'] ); ?></p>
							<p class="testro-prod-pipeline__desc"><?php echo esc_html( $item['description'] ); ?></p>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
		<?php endif; ?>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-pipeline__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
