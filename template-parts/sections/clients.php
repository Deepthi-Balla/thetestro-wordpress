<?php
/**
 * Trusted by Companies — Framer gradient band with metric badges + logo cards.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'TRUSTED BY COMPANIES', 'testro' );
$title   = isset( $args['title'] ) ? (string) $args['title'] : __( 'Thousands of engineering and QA teams worldwide trust theTestRo.', 'testro' );

$clients = array_slice( testro_get_clients(), 0, 5 );

/*
 * Framer metric cards (Performance Metrics):
 * glass card + colored badge (32×37) + value (24px) + label (14px).
 */
$metrics = array(
	array(
		'value' => '10M+',
		'label' => __( 'Test Runs', 'testro' ),
		'icon'  => 'chart-bar',
		'tone'  => 'orange',
	),
	array(
		'value' => '99.9%',
		'label' => __( 'Uptime', 'testro' ),
		'icon'  => 'shield-check',
		'tone'  => 'teal',
	),
	array(
		'value' => '50%',
		'label' => __( 'Faster Test Cycles', 'testro' ),
		'icon'  => 'clock',
		'tone'  => 'blue',
	),
);
?>
<section class="testro-clients testro-clients--trusted" aria-labelledby="clients-heading">
	<div class="testro-container testro-clients__inner">
		<div class="testro-clients__top">
			<header class="testro-section-header testro-clients__header">
				<?php if ( '' !== $eyebrow ) : ?>
					<p class="testro-section-eyebrow testro-clients__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>
				<h2 id="clients-heading" class="main-headings testro-clients__heading"><?php echo esc_html( $title ); ?></h2>
			</header>

			<ul class="testro-clients__metrics" aria-label="<?php esc_attr_e( 'Platform statistics', 'testro' ); ?>">
				<?php foreach ( $metrics as $metric ) : ?>
					<li class="testro-clients__metric testro-clients__metric--<?php echo esc_attr( $metric['tone'] ); ?>">
						<span class="testro-clients__metric-badge" aria-hidden="true">
							<?php echo testro_icon( $metric['icon'], array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="testro-clients__metric-copy">
							<span class="testro-clients__metric-value"><?php echo esc_html( $metric['value'] ); ?></span>
							<span class="testro-clients__metric-label"><?php echo esc_html( $metric['label'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if ( $clients ) : ?>
			<ul class="testro-clients__logos">
				<?php foreach ( $clients as $client ) : ?>
					<?php
					$name = isset( $client['name'] ) ? (string) $client['name'] : '';
					$logo = isset( $client['logo'] ) ? $client['logo'] : '';
					if ( '' === $name || '' === $logo ) {
						continue;
					}
					?>
					<li class="testro-clients__logo-card">
						<div class="testro-clients__logo-frame">
							<?php
							echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								$logo,
								$name,
								array(
									'width'   => 170,
									'height'  => 72,
									'class'   => 'testro-clients__logo',
									'loading' => 'lazy',
								)
							);
							?>
						</div>
						<p class="testro-clients__rating-line" aria-label="<?php esc_attr_e( 'Rated 4.6 out of 5', 'testro' ); ?>">
							<span class="testro-clients__stars" aria-hidden="true">★★★★☆</span>
							<span>4.6/5.0)</span>
						</p>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
