<?php
/**
 * Product overview section — platform summary with highlights + CSS mock.
 *
 * @package TestRo
 */

$data       = testro_get_overview();
$highlights = isset( $data['highlights'] ) && is_array( $data['highlights'] ) ? $data['highlights'] : array();
?>
<section class="testro-overview linear-background" id="overview" aria-labelledby="overview-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-overview__header" data-reveal>
			<p class="subtitle-pill testro-section-eyebrow"><?php echo esc_html( $data['eyebrow'] ); ?></p>
			<h2 id="overview-heading" class="gradient-text main-headings testro-overview__title">
				<?php echo esc_html( $data['title'] ); ?>
			</h2>
			<p class="sub-text testro-overview__intro"><?php echo esc_html( $data['intro'] ); ?></p>
		</header>

		<div class="testro-overview__layout">
			<div class="testro-overview__copy" data-reveal>
				<?php if ( $highlights ) : ?>
					<ul class="testro-overview__highlights">
						<?php foreach ( $highlights as $index => $item ) : ?>
							<li class="testro-overview__highlight" style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms" data-reveal>
								<span class="testro-overview__highlight-icon" aria-hidden="true">
									<?php echo testro_icon( 'circle-check', array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
								<span class="testro-overview__highlight-text">
									<strong><?php echo esc_html( $item['title'] ); ?></strong>
									<span><?php echo esc_html( $item['description'] ); ?></span>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<div class="testro-overview__visual" data-reveal aria-hidden="true">
				<div class="testro-overview-dash" role="img" aria-label="<?php esc_attr_e( 'theTestRo platform dashboard mockup', 'testro' ); ?>">
					<div class="testro-overview-dash__chrome">
						<span></span><span></span><span></span>
						<p><?php esc_html_e( 'theTestRo Studio', 'testro' ); ?></p>
					</div>
					<div class="testro-overview-dash__body">
						<div class="testro-overview-dash__sidebar">
							<span class="is-active"></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
						<div class="testro-overview-dash__main">
							<div class="testro-overview-dash__row">
								<span class="testro-overview-dash__pill"><?php esc_html_e( 'AI Suite', 'testro' ); ?></span>
								<span class="testro-overview-dash__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
							</div>
							<div class="testro-overview-dash__bars">
								<span style="--h: 72%"></span>
								<span style="--h: 54%"></span>
								<span style="--h: 88%"></span>
								<span style="--h: 66%"></span>
								<span style="--h: 94%"></span>
							</div>
							<ul class="testro-overview-dash__list">
								<li><i></i><?php esc_html_e( 'Checkout · Self-healed', 'testro' ); ?></li>
								<li><i></i><?php esc_html_e( 'API auth · Passing', 'testro' ); ?></li>
								<li><i></i><?php esc_html_e( 'Regression · Queued', 'testro' ); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
