<?php
/**
 * Web Testing — Enterprise-Ready Web Testing (Framer PWi2rg_G4).
 *
 * Connected Capability Grid: 4 cards (pad 34 / gap 26 / tile 78). Connectors
 * are gap-only segments between adjacent cards (26×1px at y≈76 through icon
 * tiles). No continuous line across/over card surfaces.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'enterprise-ready-web';

if ( ! $items ) {
	return;
}

$heading_id = $id . '-heading';
$count      = count( $items );
?>
<section class="testro-web-section testro-web-enterprise" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<div class="testro-web-enterprise__inner">
			<header class="testro-web-enterprise__head">
				<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-enterprise__title"><?php echo esc_html( testro_section_label_title( (string) $args['eyebrow'] ) ); ?></h2>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<p class="testro-web-enterprise__intro"><?php echo esc_html( (string) $args['title'] ); ?></p>
					<?php endif; ?>
				<?php elseif ( ! empty( $args['title'] ) ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-enterprise__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $args['intro'] ) ) : ?>
					<p class="testro-web-enterprise__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</header>

			<div class="testro-web-enterprise__grid-wrap">
				<ul class="testro-web-enterprise__cards">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-web-enterprise__card">
							<div class="testro-web-enterprise__card-header">
								<span class="testro-web-enterprise__tile" aria-hidden="true">
									<?php
									$icon = ! empty( $item['icon'] ) ? $item['icon'] : 'sparkles';
									echo testro_icon( $icon, array( 'size' => 30 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
									?>
								</span>
								<span class="testro-web-enterprise__index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							</div>
							<div class="testro-web-enterprise__copy">
								<?php if ( ! empty( $item['title'] ) ) : ?>
									<h3 class="testro-web-enterprise__card-title"><?php echo esc_html( (string) $item['title'] ); ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-web-enterprise__card-desc"><?php echo esc_html( (string) $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
							<?php if ( $index < $count - 1 ) : ?>
								<span class="testro-web-enterprise__connector" aria-hidden="true"></span>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-web-enterprise__outro"><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>
