<?php
/**
 * Contact / office information cards with optional Google Map.
 *
 * Expected $args:
 * - email (string), phone (string), address (string), company (string)
 * - map_query (string), show_map (bool)
 * - title (string), eyebrow (string), intro (string)
 * - locations (array[]) Optional list of office cards:
 *   name (string), lines (string[] address lines)
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();

$email     = isset( $args['email'] ) ? (string) $args['email'] : '';
$phone     = isset( $args['phone'] ) ? (string) $args['phone'] : '';
$locations = isset( $args['locations'] ) && is_array( $args['locations'] ) ? $args['locations'] : array();

if ( '' === $email && function_exists( 'testro_get_option' ) ) {
	$email = (string) testro_get_option( 'email', 'support@thetestro.com' );
}
if ( '' === $phone && function_exists( 'testro_get_option' ) ) {
	$phone = (string) testro_get_option( 'phone', '' );
}

$company = isset( $args['company'] ) && '' !== (string) $args['company']
	? (string) $args['company']
	: __( 'Openskale Technologies', 'testro' );

$address = isset( $args['address'] ) && '' !== (string) $args['address']
	? (string) $args['address']
	: __( '1st Floor, Jain Sadguru Images, Unit-106B, Capital Park Road, VIP Hills, Madhapur, Hyderabad, Telangana 500081', 'testro' );

$map_query = isset( $args['map_query'] ) && '' !== (string) $args['map_query']
	? (string) $args['map_query']
	: 'Openskale Technologies, Jain Sadguru Images, Unit-106B, Capital Park Road, VIP Hills, Madhapur, Hyderabad, Telangana 500081';

$show_map = ! array_key_exists( 'show_map', $args ) || ! empty( $args['show_map'] );

$map_embed = add_query_arg(
	array(
		'q'      => $map_query,
		'hl'     => 'en',
		'z'      => '16',
		'output' => 'embed',
	),
	'https://www.google.com/maps'
);

$map_link = add_query_arg(
	array(
		'api'   => '1',
		'query' => $map_query,
	),
	'https://www.google.com/maps/search/'
);

if ( ! $locations && '' === $email && '' === $phone && '' === $address ) {
	return;
}
?>
<section class="testro-prod-section testro-prod-section--tint testro-office" id="office-locations" aria-labelledby="office-locations-heading">
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'Reach Us', 'testro' ),
				'title'      => isset( $args['title'] ) && '' !== (string) $args['title']
					? (string) $args['title']
					: __( 'Office Locations', 'testro' ),
				'intro'      => isset( $args['intro'] ) ? (string) $args['intro'] : __( 'Visit Openskale Technologies in Madhapur, Hyderabad, or connect with theTestRo using the contact details below.', 'testro' ),
				'heading_id' => 'office-locations-heading',
			)
		);
		?>

		<div class="testro-office__layout<?php echo $locations || ! $show_map ? ' testro-office__layout--cards-only' : ''; ?>">
			<ul class="testro-office__grid">
				<?php if ( $locations ) : ?>
					<?php foreach ( $locations as $index => $location ) : ?>
						<?php
						$loc_name  = isset( $location['name'] ) ? (string) $location['name'] : '';
						$loc_lines = isset( $location['lines'] ) && is_array( $location['lines'] ) ? $location['lines'] : array();
						if ( '' === $loc_name && ! $loc_lines ) {
							continue;
						}
						?>
						<li class="testro-office__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<span class="testro-office__icon" aria-hidden="true">
								<?php echo testro_icon( 'map-pin', array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<?php if ( '' !== $loc_name ) : ?>
								<h3 class="testro-office__title"><?php echo esc_html( $loc_name ); ?></h3>
							<?php endif; ?>
							<?php if ( $loc_lines ) : ?>
								<address class="testro-office__address">
									<?php foreach ( $loc_lines as $line ) : ?>
										<?php if ( '' !== (string) $line ) : ?>
											<?php echo esc_html( (string) $line ); ?><br />
										<?php endif; ?>
									<?php endforeach; ?>
								</address>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				<?php else : ?>
					<li class="testro-office__card" data-reveal>
						<span class="testro-office__icon" aria-hidden="true">
							<?php echo testro_icon( 'map-pin', array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<h3 class="testro-office__title"><?php echo esc_html( $company ); ?></h3>
						<p class="testro-office__meta"><?php esc_html_e( 'Madhapur, Hyderabad', 'testro' ); ?></p>
						<ul class="testro-office__details">
							<?php if ( '' !== $address ) : ?>
								<li>
									<span class="testro-office__label"><?php esc_html_e( 'Address', 'testro' ); ?></span>
									<address class="testro-office__address"><?php echo esc_html( $address ); ?></address>
								</li>
							<?php endif; ?>
							<?php if ( '' !== $email ) : ?>
								<li>
									<span class="testro-office__label"><?php esc_html_e( 'Email', 'testro' ); ?></span>
									<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
								</li>
							<?php endif; ?>
							<?php if ( '' !== $phone ) : ?>
								<li>
									<span class="testro-office__label"><?php esc_html_e( 'Phone', 'testro' ); ?></span>
									<a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a>
								</li>
							<?php endif; ?>
						</ul>
						<p class="testro-office__map-link">
							<a class="testro-btn testro-btn--outline testro-office__directions" href="<?php echo esc_url( $map_link ); ?>" target="_blank" rel="noopener noreferrer">
								<span><?php esc_html_e( 'Get Directions', 'testro' ); ?></span>
								<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</a>
						</p>
					</li>
				<?php endif; ?>
			</ul>

			<?php if ( $show_map && ! $locations ) : ?>
				<div class="testro-office__map" data-reveal>
					<iframe
						class="testro-office__map-frame"
						title="<?php echo esc_attr( sprintf( __( 'Google Map of %s', 'testro' ), $company ) ); ?>"
						src="<?php echo esc_url( $map_embed ); ?>"
						loading="lazy"
						referrerpolicy="no-referrer-when-downgrade"
						allowfullscreen
					></iframe>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
