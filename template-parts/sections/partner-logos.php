<?php
/**
 * Static partner / client logo grid (no marquee animation).
 *
 * Optional $args: eyebrow, title, intro.
 * Reuses logos from testro_get_clients() — does not invent partner brands.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'Ecosystem', 'testro' );
$title   = isset( $args['title'] ) ? (string) $args['title'] : __( 'Our Partner Ecosystem', 'testro' );
$intro   = isset( $args['intro'] ) ? (string) $args['intro'] : __( 'theTestRo collaborates with a growing network of organizations that help teams modernize software quality with AI-powered test automation.', 'testro' );

$logos = function_exists( 'testro_get_clients' ) ? testro_get_clients() : array();

if ( ! $logos ) {
	return;
}
?>
<section class="testro-partner-logos" aria-labelledby="partner-logos-heading">
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => $eyebrow,
				'title'      => $title,
				'intro'      => $intro,
				'heading_id' => 'partner-logos-heading',
			)
		);
		?>

		<ul class="testro-partner-logos__grid" aria-label="<?php esc_attr_e( 'Partner and customer logos', 'testro' ); ?>">
			<?php foreach ( $logos as $index => $logo ) : ?>
				<li class="testro-partner-logos__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
					<?php
					echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						$logo['logo'],
						isset( $logo['name'] ) ? (string) $logo['name'] : '',
						array(
							'width'   => 140,
							'height'  => 56,
							'class'   => 'testro-partner-logos__logo',
							'loading' => 'lazy',
						)
					);
					?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
