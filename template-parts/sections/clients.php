<?php
/**
 * Clients / industry leaders section — stacked cards + feature bullets.
 *
 * Optional $args: eyebrow, title, intro.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'Trusted by Companies', 'testro' );
$title   = isset( $args['title'] ) ? (string) $args['title'] : __( 'Trusted by Companies Worldwide', 'testro' );
$intro   = isset( $args['intro'] ) ? (string) $args['intro'] : __( 'From fast-growing startups to global enterprises, teams trust us to power their automation at scale.', 'testro' );

// Defaults may wrap on smaller viewports; explicit overrides always wrap freely.
$heading_class = ' testro-clients__heading--wrap';
$desc_class    = isset( $args['intro'] ) ? ' testro-clients__desc--wrap' : '';

$clients = testro_get_clients();
$first   = isset( $clients[1] ) ? $clients[1] : $clients[0];
$active  = isset( $clients[1] ) ? 1 : 0;
?>
<section class="testro-clients industry-leaders-container" aria-labelledby="clients-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-clients__header">
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="subtitle-pill testro-section-eyebrow testro-clients__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<h2 id="clients-heading" class="gradient-text main-headings testro-clients__heading<?php echo esc_attr( $heading_class ); ?>"><?php echo esc_html( $title ); ?></h2>
			<p class="sub-text testro-clients__desc<?php echo esc_attr( $desc_class ); ?>"><?php echo esc_html( $intro ); ?></p>
		</header>

		<div class="testro-clients__layout" data-clients>
			<div class="testro-clients__features" data-client-features aria-live="polite">
				<?php foreach ( $first['features'] as $fi => $feature ) : ?>
					<?php
					$text    = isset( $feature['text'] ) ? (string) $feature['text'] : '';
					$hl      = isset( $feature['highlight'] ) ? (string) $feature['highlight'] : '';
					$hl_word = isset( $feature['highlight_word'] ) ? (string) $feature['highlight_word'] : '';
					?>
					<div class="testro-clients__feature <?php echo 0 === $fi % 2 ? 'industry-badge' : 'industry-badge-2'; ?>" style="margin-left: <?php echo esc_attr( (string) ( $fi * 16 ) ); ?>px">
						<p class="primary-color-text">
							<?php
							if ( $hl && false !== stripos( $text, $hl ) ) {
								echo wp_kses(
									preg_replace( '/' . preg_quote( $hl, '/' ) . '/i', '<strong>' . esc_html( $hl ) . '</strong>', $text, 1 ),
									array( 'strong' => array() )
								);
							} else {
								echo esc_html( $text );
							}
							if ( $hl_word ) {
								echo ' <strong>' . esc_html( $hl_word ) . '</strong>';
							}
							?>
						</p>
					</div>
				<?php endforeach; ?>
			</div>

			<div class="testro-clients__stack" aria-label="<?php esc_attr_e( 'Client logos', 'testro' ); ?>">
				<?php foreach ( $clients as $index => $client ) : ?>
					<?php
					$summaries = array();
					if ( ! empty( $client['features'] ) && is_array( $client['features'] ) ) {
						foreach ( $client['features'] as $feature ) {
							if ( ! empty( $feature['text'] ) ) {
								$summaries[] = (string) $feature['text'];
							}
						}
					}
					?>
					<button
						type="button"
						class="testro-clients__item<?php echo $index === $active ? ' is-active' : ''; ?>"
						data-client-index="<?php echo esc_attr( (string) $index ); ?>"
						data-client-features="<?php echo esc_attr( wp_json_encode( $client['features'] ) ); ?>"
						aria-pressed="<?php echo $index === $active ? 'true' : 'false'; ?>"
					>
						<span class="testro-clients__card">
							<span class="testro-clients__logo-wrap">
								<?php
								echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									$client['logo'],
									$client['name'],
									array(
										'width'   => 120,
										'height'  => 48,
										'class'   => 'testro-clients__logo',
										'loading' => 'lazy',
									)
								);
								?>
							</span>
							<span class="testro-clients__meta">
								<span class="testro-clients__name"><?php echo esc_html( $client['name'] ); ?></span>
							</span>
						</span>
						<span class="testro-clients__rating" aria-label="<?php echo esc_attr( sprintf( __( 'Rated %s out of 5', 'testro' ), $client['rating'] ) ); ?>">
							<span class="testro-clients__rating-value"><?php echo esc_html( $client['rating'] ); ?></span>
							<span class="testro-clients__stars" aria-hidden="true">
								<?php
								$rating = (float) $client['rating'];
								for ( $s = 1; $s <= 5; $s++ ) {
									$filled = $s <= (int) round( $rating );
									echo '<svg class="testro-clients__star' . ( $filled ? ' is-filled' : '' ) . '" viewBox="0 0 20 20" fill="currentColor" width="16" height="16"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>';
								}
								?>
							</span>
						</span>
						<?php if ( ! empty( $summaries ) ) : ?>
							<span class="testro-clients__summary">
								<?php foreach ( $summaries as $summary ) : ?>
									<span class="testro-clients__summary-line"><?php echo esc_html( $summary ); ?></span>
								<?php endforeach; ?>
							</span>
						<?php endif; ?>
					</button>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
