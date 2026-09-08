<?php
/**
 * Why Choose / Impact — Framer metric rows.
 *
 * @package TestRo
 */

$rows = array(
	array(
		'metric'      => '50%',
		'title'       => __( 'Less QA time, more quality work', 'testro' ),
		'description' => __( 'Cut QA time by up to 50% with fast, AI-driven testing.', 'testro' ),
		'variant'     => 'metric',
	),
	array(
		'metric'      => '',
		'icon'        => 'shield-check',
		'title'       => __( 'Less test maintenance', 'testro' ),
		'description' => __( 'Spend less time fixing tests — self-healing does it for you.', 'testro' ),
		'variant'     => 'icon',
	),
	array(
		'metric'      => '',
		'icon'        => 'arrow-right',
		'title'       => __( 'Faster delivery', 'testro' ),
		'description' => __( 'Ship faster with testing built right into your CI/CD flow.', 'testro' ),
		'variant'     => 'icon',
	),
	array(
		'metric'      => '1',
		'title'       => __( 'One platform, not five', 'testro' ),
		'description' => __( 'Lower your costs with one platform instead of five disconnected tools.', 'testro' ),
		'variant'     => 'metric',
	),
	array(
		'metric'      => '',
		'icon'        => 'circle-check',
		'title'       => __( 'Coverage your team can trust', 'testro' ),
		'description' => __( 'Build more trust with deeper, more reliable test coverage across every release.', 'testro' ),
		'variant'     => 'icon',
	),
);
?>
<section class="testro-impact" id="benefits" aria-labelledby="benefits-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-impact__header">
			<p class="testro-section-eyebrow"><?php esc_html_e( 'WHY CHOOSE THETESTRO', 'testro' ); ?></p>
			<h2 id="benefits-heading" class="main-headings"><?php esc_html_e( 'The real impact of theTestRo', 'testro' ); ?></h2>
			<p class="sub-text">
				<?php esc_html_e( 'A practical quality system that clears space for your team to move faster with confidence.', 'testro' ); ?>
			</p>
		</header>

		<ul class="testro-impact__rows">
			<?php foreach ( $rows as $row ) : ?>
				<li class="testro-impact__row">
					<div class="testro-impact__indicator" aria-hidden="true">
						<?php if ( 'metric' === $row['variant'] ) : ?>
							<span class="testro-impact__metric"><?php echo esc_html( $row['metric'] ); ?></span>
						<?php elseif ( ! empty( $row['icon'] ) ) : ?>
							<span class="testro-impact__icon">
								<?php echo testro_icon( $row['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
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
