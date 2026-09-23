<?php
/**
 * Product overview — Framer muahWPQ8i
 * (3 cards · pad 26/22/24 · r20 · gap 20 · shadow 0 20 40 -12 rgba(0,62,132,.18)).
 *
 * @package TestRo
 */

$data     = testro_get_overview();
$headline = isset( $data['headline'] ) ? (string) $data['headline'] : '';
$quote    = isset( $data['quote'] ) ? (string) $data['quote'] : '';
$cards    = isset( $data['cards'] ) && is_array( $data['cards'] ) ? $data['cards'] : array();

$suite_rows = array(
	array( 'symbol' => '▣', 'label' => 'Web Testing' ),
	array( 'symbol' => '▱', 'label' => 'API Testing' ),
	array( 'symbol' => '▯', 'label' => 'Mobile Testing' ),
	array( 'symbol' => '◉', 'label' => 'Cross-Browser' ),
);

$visuals = array(
	'code'  => array(
		'src'    => 'images/home/overview-code.png',
		'alt'    => __( 'Code and no-code authoring side by side', 'testro' ),
		'width'  => 321,
		'height' => 157,
	),
	'scale' => array(
		'src'    => 'images/home/overview-scale.png',
		'alt'    => __( 'Pass rate scaling from small team to enterprise', 'testro' ),
		'width'  => 316,
		'height' => 169,
	),
);
?>
<section class="testro-overview" id="overview" aria-labelledby="overview-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-overview__header">
			<?php if ( ! empty( $data['eyebrow'] ) ) : ?>
				<p class="testro-section-eyebrow"><?php echo esc_html( $data['eyebrow'] ); ?></p>
			<?php endif; ?>
			<h2 id="overview-heading" class="main-headings testro-overview__title">
				<?php echo esc_html( $data['title'] ); ?>
			</h2>
			<?php if ( '' !== $headline ) : ?>
				<p class="sub-text testro-overview__headline"><?php echo esc_html( $headline ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( $cards ) : ?>
			<ul class="testro-overview__cards">
				<?php foreach ( $cards as $card ) : ?>
					<?php
					$variant = isset( $card['variant'] ) ? (string) $card['variant'] : 'suites';
					$title   = isset( $card['title'] ) ? (string) $card['title'] : '';
					$desc    = isset( $card['description'] ) ? (string) $card['description'] : '';
					$icon    = 'layers';
					if ( 'code' === $variant ) {
						$icon = 'terminal';
					} elseif ( 'scale' === $variant ) {
						$icon = 'activity';
					}
					?>
					<li class="testro-overview__card testro-overview__card--<?php echo esc_attr( $variant ); ?>">
						<div class="testro-overview__card-top">
							<span class="testro-overview__card-icon" aria-hidden="true">
								<?php
								echo testro_icon( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG from allowlisted library.
									$icon,
									array(
										'size'   => 21,
										'stroke' => 1.7,
									)
								);
								?>
							</span>
							<h3 class="testro-overview__card-title"><?php echo esc_html( $title ); ?></h3>
							<p class="testro-overview__card-desc"><?php echo esc_html( $desc ); ?></p>
						</div>

						<?php if ( 'suites' === $variant ) : ?>
							<div class="testro-overview__suite-panel">
								<ul class="testro-overview__suite-list" aria-hidden="true">
									<?php foreach ( $suite_rows as $row ) : ?>
										<li>
											<span><?php echo esc_html( $row['symbol'] . '  ' . $row['label'] ); ?></span>
											<em><?php esc_html_e( 'Passing', 'testro' ); ?></em>
										</li>
									<?php endforeach; ?>
								</ul>
								<p class="testro-overview__suite-badge" aria-hidden="true"><?php esc_html_e( '✓  ALL suites passing', 'testro' ); ?></p>
							</div>
						<?php elseif ( isset( $visuals[ $variant ] ) ) : ?>
							<?php
							$visual = $visuals[ $variant ];
							echo '<div class="testro-overview__visual" aria-hidden="true">';
							echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- helper escapes attrs.
								$visual['src'],
								$visual['alt'],
								array(
									'class'   => 'testro-overview__visual-img',
									'width'   => (string) $visual['width'],
									'height'  => (string) $visual['height'],
									'loading' => 'lazy',
								)
							);
							echo '</div>';
							?>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( '' !== $quote ) : ?>
			<blockquote class="testro-overview__quote <?php echo esc_attr( testro_bottom_text_class() ); ?>">
				<p><?php echo esc_html( $quote ); ?></p>
			</blockquote>
		<?php endif; ?>
	</div>
</section>
