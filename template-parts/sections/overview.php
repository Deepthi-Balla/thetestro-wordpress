<?php
/**
 * Product overview — Framer 3-card grid + quote.
 *
 * @package TestRo
 */

$data     = testro_get_overview();
$headline = isset( $data['headline'] ) ? (string) $data['headline'] : '';
$quote    = isset( $data['quote'] ) ? (string) $data['quote'] : '';
$cards    = isset( $data['cards'] ) && is_array( $data['cards'] ) ? $data['cards'] : array();
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
					?>
					<li class="testro-overview__card testro-overview__card--<?php echo esc_attr( $variant ); ?>">
						<span class="testro-overview__card-icon" aria-hidden="true"></span>
						<h3 class="testro-overview__card-title"><?php echo esc_html( $title ); ?></h3>
						<p class="testro-overview__card-desc"><?php echo esc_html( $desc ); ?></p>

						<?php if ( 'suites' === $variant ) : ?>
							<ul class="testro-overview__suite-list" aria-hidden="true">
								<li><span>Web Testing</span><em>Passing</em></li>
								<li><span>API Testing</span><em>Passing</em></li>
								<li><span>Mobile Testing</span><em>Passing</em></li>
								<li><span>Cross-Browser</span><em>Passing</em></li>
							</ul>
							<p class="testro-overview__suite-badge" aria-hidden="true">✓ ALL suites passing</p>
						<?php elseif ( 'code' === $variant ) : ?>
							<div class="testro-overview__code-mock" aria-hidden="true">
								<div class="testro-overview__code-pane">
									<p>Code</p>
									<span></span><span></span><span></span>
								</div>
								<div class="testro-overview__nocode-pane">
									<p>No-Code</p>
									<label><i></i> Click Button</label>
									<label><i></i> Fill Form</label>
									<label><i></i> Verify Text</label>
								</div>
							</div>
						<?php else : ?>
							<div class="testro-overview__scale-mock" aria-hidden="true">
								<div class="testro-overview__scale-chart">
									<span class="testro-overview__scale-tip">✓ 98% Pass</span>
								</div>
								<div class="testro-overview__scale-axis">
									<span><?php esc_html_e( 'Small team', 'testro' ); ?></span>
									<span><?php esc_html_e( 'Enterprise', 'testro' ); ?></span>
								</div>
							</div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( '' !== $quote ) : ?>
			<blockquote class="testro-overview__quote">
				<p><?php echo esc_html( $quote ); ?></p>
			</blockquote>
		<?php endif; ?>
	</div>
</section>
