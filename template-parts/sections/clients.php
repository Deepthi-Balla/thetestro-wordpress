<?php
/**
 * Clients / trusted-by section — stats row + scrolling logo cards.
 *
 * Optional $args: title (eyebrow), intro (heading).
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$title = isset( $args['title'] ) ? (string) $args['title'] : __( 'Trusted By Companies', 'testro' );
$intro = isset( $args['intro'] ) ? (string) $args['intro'] : __( 'Thousands of engineering and QA teams worldwide trust theTestRo.', 'testro' );

$clients = testro_get_clients();
$stats   = testro_get_stats();
?>
<section class="testro-clients industry-leaders-container" aria-labelledby="clients-heading">
	<div class="testro-clients__top">
		<div class="testro-clients__copy">
			<p class="testro-clients__eyebrow"><?php echo esc_html( $title ); ?></p>
			<h2 id="clients-heading" class="testro-clients__heading"><?php echo esc_html( $intro ); ?></h2>
		</div>

		<?php if ( $stats ) : ?>
			<ul class="testro-clients__stats" aria-label="<?php esc_attr_e( 'Platform statistics', 'testro' ); ?>">
				<?php foreach ( $stats as $stat ) : ?>
					<?php
					$icon    = isset( $stat['icon'] ) ? (string) $stat['icon'] : '';
					$icon_bg = isset( $stat['icon_bg'] ) ? (string) $stat['icon_bg'] : '#FF9B42';
					?>
					<li class="testro-clients__stat">
						<?php if ( $icon && function_exists( 'testro_icon' ) ) : ?>
							<span class="testro-clients__stat-icon" style="--stat-icon-bg: <?php echo esc_attr( $icon_bg ); ?>">
								<?php echo testro_icon( $icon, array( 'size' => 19, 'stroke' => 2, 'class' => 'testro-clients__stat-svg' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<p class="testro-clients__stat-value"><?php echo esc_html( $stat['value'] ); ?></p>
						<p class="testro-clients__stat-label"><?php echo esc_html( $stat['label'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>

	<?php if ( $clients ) : ?>
		<div class="testro-clients__marquee" data-clients-marquee>
			<div class="testro-clients__track" data-clients-track>
				<ul class="testro-clients__group" aria-label="<?php esc_attr_e( 'Customer logos and ratings', 'testro' ); ?>">
					<?php foreach ( $clients as $client ) : ?>
						<?php
						$rating_num   = isset( $client['rating'] ) ? (float) $client['rating'] : 5;
						$rating_label = number_format( $rating_num, 1 ) . '/5.0';
						$filled_stars = (int) round( $rating_num );
						$name         = isset( $client['name'] ) ? (string) $client['name'] : '';
						?>
						<li class="testro-clients__logo-card">
							<span class="testro-clients__logo-frame">
								<?php
								echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									$client['logo'],
									$name,
									array(
										'width'   => 140,
										'height'  => 56,
										'class'   => 'testro-clients__logo',
										'loading' => 'lazy',
									)
								);
								?>
							</span>
							<span class="testro-clients__rating" aria-label="<?php echo esc_attr( sprintf( __( 'Rated %s out of 5', 'testro' ), number_format( $rating_num, 1 ) ) ); ?>">
								<span class="testro-clients__stars" aria-hidden="true">
									<?php
									for ( $s = 1; $s <= 5; $s++ ) {
										$filled = $s <= $filled_stars;
										echo '<svg class="testro-clients__star' . ( $filled ? ' is-filled' : '' ) . '" viewBox="0 0 20 20" fill="currentColor" width="11" height="11"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
									}
									?>
								</span>
								<span class="testro-clients__rating-value"><?php echo esc_html( $rating_label ); ?></span>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
</section>
