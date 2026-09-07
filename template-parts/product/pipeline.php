<?php
/**
 * Product page pipeline — connected delivery stages, or a vertical flow list.
 *
 * Expected $args:
 * - id, eyebrow, title, intro, heading_level
 * - layout (string) 'default' (horizontal stages) | 'flow' (vertical dotted list
 *     via global FlowList component)
 * - list_layout (string) FlowList layout when layout is 'flow':
 *     'default' | 'inline'.
 * - tone   (string) For flow layout: 'dark' (default) | 'light' (navy FlowList).
 * - items  (array[]) Each: icon/stage/title/description. icon/stage unused in flow.
 * - outro  (string) Optional closing statement.
 *
 * @package TestRo
 */

$args   = isset( $args ) && is_array( $args ) ? $args : array();
$items  = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id     = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$layout = isset( $args['layout'] ) && 'flow' === $args['layout'] ? 'flow' : 'default';
$tone   = isset( $args['tone'] ) && 'light' === $args['tone'] ? 'light' : 'dark';
$list_layout = isset( $args['list_layout'] ) && 'inline' === $args['list_layout'] ? 'inline' : 'default';

if ( ! $items ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title         = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$outro         = isset( $args['outro'] ) ? (string) $args['outro'] : '';

if ( 'flow' === $layout ) {
	$is_light      = 'light' === $tone;
	$section_class = 'testro-page-section testro-prod-pipeline testro-prod-pipeline--flow';
	if ( $is_light ) {
		$section_class .= ' testro-prod-pipeline--flow-light';
	}
	?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-page-section__inner">
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
				'label_color'       => $is_light ? 'var(--color-brand-sky)' : 'var(--color-brand-sky)',
				'heading_color'     => $is_light ? 'var(--color-brand-navy)' : '#fff',
				'description_color' => $is_light ? '#5B7290' : '#fff',
				'attrs'             => array(
					'data-reveal' => true,
				),
			)
		);
		?>

		<?php
		$flow_list_args = array(
			'items'   => $items,
			'variant' => $is_light ? 'navy' : 'on-dark',
			'layout'  => $list_layout,
			'class'   => 'testro-prod-pipeline__rows',
		);
		if ( 'inline' === $list_layout ) {
			$flow_list_args['variant']           = 'default';
			$flow_list_args['title_color']       = 'var(--color-brand-navy)';
			$flow_list_args['description_color'] = '#5B7290';
			$flow_list_args['border_color']      = '#EAF3FC';
			$flow_list_args['dot_background']    = 'var(--color-brand-sky)';
			$flow_list_args['dot_border']        = 'var(--color-brand-sky)';
		}
		get_template_part(
			'template-parts/components/flow-list',
			null,
			$flow_list_args
		);
		?>

		<?php if ( '' !== $outro ) : ?>
			<?php
			$outro_class = 'testro-prod-pipeline__outro';
			if ( 'inline' === $list_layout ) {
				$outro_class = 'testro-feature-card__title ' . $outro_class;
			}
			?>
			<p class="<?php echo esc_attr( $outro_class ); ?>" data-reveal><?php echo esc_html( $outro ); ?></p>
		<?php endif; ?>
	</div>
</section>
	<?php
	return;
}
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
				'eyebrow'       => $eyebrow,
				'title'         => $title,
				'intro'         => $intro,
				'heading_id'    => $heading_id,
				'heading_level' => $heading_level,
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
						<p class="testro-prod-pipeline__title"><?php echo esc_html( $item['title'] ); ?></p>
						<p class="testro-prod-pipeline__desc"><?php echo esc_html( $item['description'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-pipeline__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
