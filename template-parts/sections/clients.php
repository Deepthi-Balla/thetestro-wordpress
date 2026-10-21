<?php
/**
 * Trusted by Companies — Framer /trusted-by-companies (w2n4CgITW / yY1lhTsR5).
 *
 * Light mesh band · 72px one-line gradient title · absolute metrics · pill ticker v38.
 * Logo order (Framer): Urbuddi, FinFolio, Xcally, Optimworks, theTestRo, Sevaki, Globcar.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'TRUSTED BY COMPANIES', 'testro' );
$title   = isset( $args['title'] ) ? (string) $args['title'] : __( 'Thousands of engineering and QA teams worldwide trust theTestRo.', 'testro' );

/*
 * Framer Trusted Logos Row One (zqWSm9YhC) — 7 white marks, gap 20, pad 8, 140×100.
 * Duplicated once in the track for a seamless CSS/JS ticker (same as Framer tickerEffect).
 */
$clients = array(
	array(
		'name' => 'Urbuddi',
		'logo' => testro_asset( 'images/trusted/urbuddi-white.png' ),
	),
	array(
		'name' => 'FinFolio',
		'logo' => testro_asset( 'images/trusted/finfolio-white.png' ),
	),
	array(
		'name' => 'Xcally',
		'logo' => testro_asset( 'images/trusted/xcally-white.png' ),
	),
	array(
		'name' => 'Optimworks',
		'logo' => testro_asset( 'images/trusted/optimworks-white.png' ),
	),
	array(
		'name' => 'theTestRo',
		'logo' => testro_asset( 'images/trusted/thetestro-white.png' ),
	),
	array(
		'name' => 'Sevaki',
		'logo' => testro_asset( 'images/trusted/sevaki-white.png' ),
	),
	array(
		'name' => 'Globcar',
		'logo' => testro_asset( 'images/trusted/globcar-white.png' ),
	),
);

/*
 * Framer Performance Metrics (LQolfPiEE):
 * white card 163×112 · pad 11 · gap 8 · radius 19.8 · blur 15 · shadow 0 1 2
 * badge 32×37 radius 11 fill #ebf2ff — absolute top-right of section.
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
		'icon'  => 'pie-chart',
		'tone'  => 'blue',
	),
);

$track_items = $clients ? array_merge( $clients, $clients ) : array();
$mesh_url    = testro_asset( 'images/hero/mesh-trusted.png' );
?>
<section
	class="testro-clients testro-clients--trusted"
	aria-labelledby="clients-heading"
	style="--testro-trusted-mesh: url('<?php echo esc_url( $mesh_url ); ?>');"
>
	<div class="testro-container testro-clients__inner">
		<div class="testro-clients__top">
			<header class="testro-section-header testro-clients__header">
				<?php if ( '' !== $eyebrow ) : ?>
					<h2 id="clients-heading" class="main-headings testro-clients__heading"><?php echo esc_html( testro_section_label_title( $eyebrow ) ); ?></h2>
					<p class="sub-text"><?php echo esc_html( $title ); ?></p>
				<?php else : ?>
					<h2 id="clients-heading" class="main-headings testro-clients__heading"><?php echo esc_html( $title ); ?></h2>
				<?php endif; ?>
			</header>

			<ul class="testro-clients__metrics" aria-label="<?php esc_attr_e( 'Platform statistics', 'testro' ); ?>">
				<?php foreach ( $metrics as $metric ) : ?>
					<li class="testro-clients__metric testro-clients__metric--<?php echo esc_attr( $metric['tone'] ); ?>">
						<span class="testro-clients__metric-badge" aria-hidden="true">
							<?php echo testro_icon( $metric['icon'], array( 'size' => 20, 'stroke' => 1.5 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="testro-clients__metric-copy">
							<span class="testro-clients__metric-value"><?php echo esc_html( $metric['value'] ); ?></span>
							<span class="testro-clients__metric-label"><?php echo esc_html( $metric['label'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if ( $track_items ) : ?>
			<div class="testro-clients__logo-rail" data-trusted-ticker aria-label="<?php esc_attr_e( 'Trusted customer logos', 'testro' ); ?>">
				<button
					type="button"
					class="testro-clients__rail-nav testro-clients__rail-nav--prev"
					data-trusted-dir="-1"
					aria-label="<?php esc_attr_e( 'Scroll logos backward', 'testro' ); ?>"
				>
					<svg width="47" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
						<path d="M15 6l-6 6 6 6"/>
					</svg>
				</button>
				<div class="testro-clients__marquee">
					<ul class="testro-clients__track" data-trusted-track>
						<?php foreach ( $track_items as $client ) : ?>
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
											'width'   => 140,
											'height'  => 100,
											'class'   => 'testro-clients__logo',
											'loading' => 'lazy',
										)
									);
									?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<button
					type="button"
					class="testro-clients__rail-nav testro-clients__rail-nav--next"
					data-trusted-dir="1"
					aria-label="<?php esc_attr_e( 'Scroll logos forward', 'testro' ); ?>"
				>
					<svg width="47" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
						<path d="M9 6l6 6-6 6"/>
					</svg>
				</button>
			</div>
		<?php endif; ?>
	</div>
</section>
