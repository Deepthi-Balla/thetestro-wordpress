<?php
/**
 * Product page bento grid — asymmetric capability cards.
 *
 * Expected $args: id, eyebrow, title, intro, variant, items (array[] of
 * icon/title/description; first item is featured/large when 4+ cards).
 *
 * Optional `groups` (array[] of title/icon/description/items) renders a
 * grouped capability bento instead of the flat card grid. Flat `items`
 * remain the default for existing product pages.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$groups  = isset( $args['groups'] ) && is_array( $args['groups'] ) ? $args['groups'] : array();
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : 'spotlight';

if ( ! $items && ! $groups ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-bento';
if ( $variant ) {
	$section_class .= ' testro-prod-section--' . $variant;
}
if ( $groups ) {
	$section_class .= ' testro-prod-bento--grouped';
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
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
			)
		);
		?>

		<?php if ( $groups ) : ?>
			<ul class="testro-prod-bento__groups">
				<?php foreach ( $groups as $g_index => $group ) : ?>
					<?php
					$group_items = isset( $group['items'] ) && is_array( $group['items'] ) ? $group['items'] : array();
					$group_title = isset( $group['title'] ) ? (string) $group['title'] : '';
					?>
					<li class="testro-prod-bento__group" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $g_index * 80 ) ); ?>ms">
						<span class="testro-prod-bento__glow" aria-hidden="true"></span>
						<div class="testro-prod-bento__group-head">
							<?php if ( ! empty( $group['icon'] ) ) : ?>
								<span class="testro-prod-bento__icon" aria-hidden="true">
									<?php echo testro_icon( $group['icon'], array( 'size' => 26 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							<?php endif; ?>
							<div class="testro-prod-bento__group-copy">
								<?php if ( '' !== $group_title ) : ?>
									<h3 class="testro-prod-bento__title"><?php echo esc_html( $group_title ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $group['description'] ) ) : ?>
									<p class="testro-prod-bento__desc"><?php echo esc_html( $group['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</div>

						<?php if ( $group_items ) : ?>
							<ul class="testro-prod-bento__group-items">
								<?php foreach ( $group_items as $item ) : ?>
									<li class="testro-prod-bento__group-item">
										<?php if ( ! empty( $item['icon'] ) ) : ?>
											<span class="testro-prod-bento__group-item-icon" aria-hidden="true">
												<?php echo testro_icon( $item['icon'], array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
											</span>
										<?php endif; ?>
										<div>
											<?php if ( ! empty( $item['title'] ) ) : ?>
												<p class="testro-prod-bento__group-item-title"><?php echo esc_html( $item['title'] ); ?></p>
											<?php endif; ?>
											<?php if ( ! empty( $item['description'] ) ) : ?>
												<p class="testro-prod-bento__group-item-desc"><?php echo esc_html( $item['description'] ); ?></p>
											<?php endif; ?>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<span class="testro-prod-bento__deco" aria-hidden="true"></span>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<ul class="testro-prod-bento__grid">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					$featured = 0 === $index;
					$classes  = 'testro-prod-bento__card' . ( $featured ? ' testro-prod-bento__card--featured' : '' );
					?>
					<li class="<?php echo esc_attr( $classes ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-bento__glow" aria-hidden="true"></span>
						<span class="testro-prod-bento__icon" aria-hidden="true">
							<?php echo testro_icon( $item['icon'], array( 'size' => $featured ? 28 : 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<div class="testro-prod-bento__body">
							<h3 class="testro-prod-bento__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-bento__desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
						<?php if ( $featured ) : ?>
							<div class="testro-prod-bento__art" aria-hidden="true">
								<span class="testro-prod-bento__art-node"></span>
								<span class="testro-prod-bento__art-node"></span>
								<span class="testro-prod-bento__art-node"></span>
								<span class="testro-prod-bento__art-line"></span>
							</div>
						<?php else : ?>
							<span class="testro-prod-bento__deco" aria-hidden="true"></span>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
