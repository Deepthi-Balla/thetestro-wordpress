<?php
/**
 * Web Testing — Scale Web Testing in CI/CD (Framer kstl0Ku78).
 *
 * Flow: header → centered brand hub → 5-card row. Connectors are gap-only
 * segments between adjacent cards (Framer gap 26px, y≈76 through icon row).
 * No continuous line across/over card surfaces.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'scale-web-testing-cicd';

if ( ! $items ) {
	return;
}

$heading_id    = $id . '-heading';
$cicd_icon_uri = get_template_directory_uri() . '/assets/images/web/cicd-testro-icon.png';
$count         = count( $items );
?>
<section class="testro-web-section testro-web-cicd" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<div class="testro-web-cicd__inner">
			<header class="testro-web-cicd__head">
				<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-cicd__title"><?php echo esc_html( testro_section_label_title( (string) $args['eyebrow'] ) ); ?></h2>
					<?php if ( ! empty( $args['title'] ) ) : ?>
						<p class="testro-web-cicd__intro"><?php echo esc_html( (string) $args['title'] ); ?></p>
					<?php endif; ?>
				<?php elseif ( ! empty( $args['title'] ) ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-cicd__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $args['intro'] ) ) : ?>
					<p class="testro-web-cicd__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</header>

			<div class="testro-web-cicd__flow">
				<span class="testro-web-cicd__brand" aria-hidden="true">
					<img src="<?php echo esc_url( $cicd_icon_uri ); ?>" alt="" width="70" height="70" loading="lazy" decoding="async" />
				</span>

				<div class="testro-web-cicd__boxes">
					<ul class="testro-web-cicd__cards">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-web-cicd__card testro-card--top-line">
								<span class="testro-web-cicd__tile" aria-hidden="true">
									<?php
									$icon = ! empty( $item['icon'] ) ? $item['icon'] : 'server';
									echo testro_icon( $icon, array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
									?>
								</span>
								<div class="testro-web-cicd__copy">
									<?php if ( ! empty( $item['title'] ) ) : ?>
										<h3 class="testro-web-cicd__card-title"><?php echo esc_html( (string) $item['title'] ); ?></h3>
									<?php endif; ?>
									<?php if ( ! empty( $item['description'] ) ) : ?>
										<p class="testro-web-cicd__card-desc"><?php echo esc_html( (string) $item['description'] ); ?></p>
									<?php endif; ?>
								</div>
								<?php if ( $index < $count - 1 ) : ?>
									<span class="testro-web-cicd__connector" aria-hidden="true"></span>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
