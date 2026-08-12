<?php
/**
 * Product page architecture diagram — central platform hub feeding capability nodes.
 *
 * Expected $args: id, eyebrow, title, intro, hub (label/sub/icon), items (array[]).
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$hub   = isset( $args['hub'] ) && is_array( $args['hub'] ) ? $args['hub'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $items ) {
	return;
}

$heading_id = $id ? $id . '-heading' : '';
?>
<section
	class="testro-prod-section testro-prod-arch"
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
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
			)
		);
		?>

		<div class="testro-prod-arch__diagram" style="<?php echo esc_attr( '--arch-cols: ' . count( $items ) . ';' ); ?>">
			<?php if ( $hub ) : ?>
				<div class="testro-prod-arch__hub" data-reveal>
					<span class="testro-prod-arch__hub-pulse" aria-hidden="true"></span>
					<span class="testro-prod-arch__hub-icon" aria-hidden="true">
						<?php echo testro_icon( $hub['icon'], array( 'size' => 26 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
					</span>
					<p class="testro-prod-arch__hub-label"><?php echo esc_html( $hub['label'] ); ?></p>
					<p class="testro-prod-arch__hub-sub"><?php echo esc_html( $hub['sub'] ); ?></p>
				</div>
			<?php endif; ?>

			<span class="testro-prod-arch__trunk" aria-hidden="true"></span>

			<ul class="testro-prod-arch__nodes">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-arch__node" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-arch__branch" aria-hidden="true"></span>
						<div class="testro-prod-arch__card">
							<span class="testro-prod-arch__icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<h3 class="testro-prod-arch__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-arch__desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-arch__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
