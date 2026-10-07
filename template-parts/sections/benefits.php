<?php
/**
 * Why Choose / Impact — Framer UJi1xy19J rows (metric 48px mono · icon 28px).
 *
 * Leading: 50% | Shield | Arrow | 1 | Circle-check
 *
 * @package TestRo
 */

$rows = array(
	array(
		'variant'     => 'metric',
		'metric'      => '50X',
		'title'       => __( '50x faster testing', 'testro' ),
		'description' => __( 'Build and run tests up to 50x faster with no-code, AI-driven automation.', 'testro' ),
	),
	array(
		'variant'     => 'icon',
		'icon'        => 'shield-check',
		'title'       => __( 'No coding expertise needed', 'testro' ),
		'description' => __( 'Anyone on your team can create and run tests, with no scripting skills required.', 'testro' ),
	),
	array(
		'variant'     => 'metric',
		'metric'      => '1',
		'title'       => __( 'One platform, not five', 'testro' ),
		'description' => __( 'Lower your costs with one platform instead of five disconnected tools.', 'testro' ),
	),
	array(
		'variant'     => 'icon',
		'icon'        => 'circle-check',
		'title'       => __( 'Coverage your team can trust', 'testro' ),
		'description' => __( 'Build more trust with deeper, more reliable test coverage across every release.', 'testro' ),
	),
);
?>
<section class="testro-impact" id="benefits" aria-labelledby="benefits-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-impact__header">
			<h2 id="benefits-heading" class="main-headings"><?php echo esc_html( testro_section_label_title( __( 'Why Choose theTestRo

', 'testro' ) ) ); ?></h2>
			<p class="sub-text"><?php esc_html_e( 'The real impact of theTestRo', 'testro' ); ?></p>
			
		</header>

		<ul class="testro-impact__rows">
			<?php foreach ( $rows as $row ) : ?>
				<li class="testro-impact__row">
					<div class="testro-impact__indicator" aria-hidden="true">
						<?php if ( 'metric' === $row['variant'] ) : ?>
							<span class="testro-impact__metric"><?php echo esc_html( $row['metric'] ); ?></span>
						<?php else : ?>
							<span class="testro-impact__icon">
								<?php echo testro_icon( $row['icon'], array( 'size' => 28, 'stroke' => 1.5 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</span>
						<?php endif; ?>
					</div>
					<div class="testro-impact__content">
						<h3 class="testro-impact__title"><?php echo esc_html( $row['title'] ); ?></h3>
						<p class="testro-impact__desc"><?php echo esc_html( $row['description'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
