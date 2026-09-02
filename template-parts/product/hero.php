<?php
/**
 * Shared page hero — left copy column and right visual stage.
 *
 * Expected $args: title, subtitle, subtitle_extra, actions, supporting_line,
 * badges (string[] rendered as stage chips), eyebrow, breadcrumbs, logos,
 * metrics. Content varies per page; structure and styling stay the same.
 *
 * @package TestRo
 */

$args           = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow        = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title          = isset( $args['title'] ) ? (string) $args['title'] : '';
$subtitle       = isset( $args['subtitle'] ) ? (string) $args['subtitle'] : '';
$subtitle_extra = isset( $args['subtitle_extra'] ) ? (string) $args['subtitle_extra'] : '';
$badges         = isset( $args['badges'] ) && is_array( $args['badges'] ) ? array_values( $args['badges'] ) : array();
$actions        = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$metrics        = isset( $args['metrics'] ) && is_array( $args['metrics'] ) ? $args['metrics'] : array();
$supporting     = isset( $args['supporting_line'] ) ? (string) $args['supporting_line'] : '';
$chips          = array_slice( $badges, 0, 4 );

if ( '' === $title ) {
	return;
}
?>
<section class="testro-prod-hero" aria-labelledby="product-hero-title">
	<div class="testro-container testro-prod-hero__inner">
		<?php if ( ! empty( $args['breadcrumbs'] ) ) : ?>
			<div class="testro-prod-hero__breadcrumbs"><?php testro_the_breadcrumbs(); ?></div>
		<?php endif; ?>

		<div class="testro-prod-hero__split">
			<div class="testro-prod-hero__lead">
				<?php if ( '' !== $eyebrow ) : ?>
					<p class="subtitle-pill testro-section-eyebrow testro-prod-hero__eyebrow" data-reveal>
						<?php echo esc_html( $eyebrow ); ?>
					</p>
				<?php endif; ?>

				<h1 id="product-hero-title" class="testro-prod-hero__title" data-reveal>
					<?php echo esc_html( $title ); ?>
				</h1>

				<?php if ( '' !== $subtitle ) : ?>
					<p class="testro-prod-hero__sub" data-reveal><?php echo wp_kses( $subtitle, array( 'strong' => array(), 'em' => array() ) ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $subtitle_extra ) : ?>
					<p class="testro-prod-hero__sub" data-reveal><?php echo esc_html( $subtitle_extra ); ?></p>
				<?php endif; ?>

				<?php if ( $actions ) : ?>
					<div class="testro-prod-hero__actions" data-reveal>
						<?php
						get_template_part(
							'template-parts/product/actions',
							null,
							array(
								'actions'    => $actions,
								'align'      => 'start',
								'with_arrow' => false,
							)
						);
						?>
					</div>
				<?php endif; ?>

				<?php if ( '' !== $supporting ) : ?>
					<p class="testro-prod-hero__note" data-reveal><?php echo esc_html( $supporting ); ?></p>
				<?php endif; ?>
			</div>

			<div class="testro-prod-hero__visual" data-reveal>
				<div class="testro-prod-hero__stage"<?php echo $chips ? '' : ' aria-hidden="true"'; ?>>
					<?php if ( $chips ) : ?>
						<ul class="testro-prod-hero__chips" aria-label="<?php esc_attr_e( 'Platform highlights', 'testro' ); ?>">
							<?php foreach ( $chips as $index => $chip ) : ?>
								<li class="testro-prod-hero__chip testro-prod-hero__chip--<?php echo esc_attr( (string) $index ); ?>">
									<?php echo esc_html( $chip ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php if ( ! empty( $args['logos'] ) && function_exists( 'testro_get_clients' ) ) : ?>
			<?php
			$hero_clients = array_slice( testro_get_clients(), 0, 6 );
			?>
			<?php if ( $hero_clients ) : ?>
				<div class="testro-prod-hero__logos" data-reveal>
					<p class="testro-prod-hero__logos-label"><?php esc_html_e( 'Trusted By', 'testro' ); ?></p>
					<ul class="testro-prod-hero__logos-list" aria-label="<?php esc_attr_e( 'Trusted by leading companies', 'testro' ); ?>">
						<?php foreach ( $hero_clients as $hero_client ) : ?>
							<li>
								<?php
								echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									$hero_client['logo'],
									isset( $hero_client['name'] ) ? (string) $hero_client['name'] : '',
									array(
										'width'   => 88,
										'height'  => 32,
										'class'   => 'testro-prod-hero__logo',
										'loading' => 'lazy',
									)
								);
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $metrics ) : ?>
			<ul class="testro-prod-hero__metrics" data-reveal>
				<?php foreach ( $metrics as $metric ) : ?>
					<li class="testro-prod-hero__metric">
						<?php if ( ! empty( $metric['icon'] ) ) : ?>
							<span class="testro-prod-hero__metric-icon" aria-hidden="true">
								<?php echo testro_icon( $metric['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<span class="testro-prod-hero__metric-text">
							<span class="testro-prod-hero__metric-value"><?php echo esc_html( $metric['value'] ); ?></span>
							<span class="testro-prod-hero__metric-label"><?php echo esc_html( $metric['label'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
