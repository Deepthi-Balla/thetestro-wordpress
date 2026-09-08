<?php
/**
 * API Testing Framer compositions (exact layout tokens from Framer dump).
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$variant = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : '';
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();

if ( '' === $variant ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-api testro-prod-api--' . $variant;
$item_level    = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag      = 'h' . $item_level;

/**
 * Render Framer Validation Benefits numbered rows (26px circle + copy).
 *
 * @param array  $items Items.
 * @param string $tag   Heading tag.
 */
$render_numbered = static function ( $items, $tag ) {
	if ( ! $items ) {
		return;
	}
	echo '<ol class="testro-prod-api__benefits">';
	foreach ( $items as $index => $item ) {
		$delay = (string) ( $index * 60 );
		echo '<li class="testro-prod-api__benefit" data-reveal style="--reveal-delay: ' . esc_attr( $delay ) . 'ms">';
		echo '<span class="testro-prod-api__benefit-num" aria-hidden="true"><span>' . esc_html( (string) ( $index + 1 ) ) . '</span></span>';
		echo '<div class="testro-prod-api__benefit-copy">';
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg.
		echo '<' . $tag . ' class="testro-prod-api__benefit-title">' . esc_html( $item['title'] ) . '</' . $tag . '>';
		if ( ! empty( $item['description'] ) ) {
			echo '<p class="testro-prod-api__benefit-desc">' . esc_html( $item['description'] ) . '</p>';
		}
		echo '</div></li>';
	}
	echo '</ol>';
};
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'         => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
				'align'         => isset( $args['align'] ) ? $args['align'] : 'start',
			)
		);
		?>

		<?php if ( 'import-spec' === $variant ) : ?>
			<?php
			$mock   = isset( $args['mock'] ) && is_array( $args['mock'] ) ? $args['mock'] : array();
			$upload = isset( $mock['file'] ) ? (string) $mock['file'] : 'openapi.yaml';
			$eps    = isset( $mock['endpoints'] ) && is_array( $mock['endpoints'] ) ? $mock['endpoints'] : array();
			?>
			<?php /* Framer: Spec Import Mockup = horizontal gap 34; Import Steps = 3-col grid below. */ ?>
			<div class="testro-prod-api__spec-mock" data-reveal aria-hidden="true">
				<div class="testro-prod-api__spec-upload-col">
					<div class="testro-prod-api__upload">
						<span class="testro-prod-api__upload-label"><?php esc_html_e( 'UPLOAD', 'testro' ); ?></span>
						<span class="testro-prod-api__upload-file"><?php echo esc_html( $upload ); ?></span>
					</div>
				</div>
				<span class="testro-prod-api__spec-arrow" aria-hidden="true">→</span>
				<div class="testro-prod-api__endpoints">
					<span class="testro-prod-api__endpoints-label"><?php esc_html_e( 'DETECTED ENDPOINTS', 'testro' ); ?></span>
					<ul class="testro-prod-api__endpoint-list">
						<?php foreach ( $eps as $ep ) : ?>
							<li class="testro-prod-api__endpoint">
								<span class="testro-prod-api__method"><?php echo esc_html( isset( $ep['method'] ) ? (string) $ep['method'] : 'GET' ); ?></span>
								<code class="testro-prod-api__path"><?php echo esc_html( isset( $ep['path'] ) ? (string) $ep['path'] : '' ); ?></code>
								<span class="testro-prod-api__check" aria-hidden="true">✓</span>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<?php if ( $items ) : ?>
				<ol class="testro-prod-api__steps-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-api__step-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<span class="testro-prod-api__step-index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-api__step-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-api__step-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			<?php endif; ?>

		<?php elseif ( 'journey-modes' === $variant ) : ?>
			<ul class="testro-prod-api__modes">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php $mode = isset( $item['mode'] ) ? sanitize_html_class( (string) $item['mode'] ) : 'standalone'; ?>
					<li class="testro-prod-api__mode testro-prod-api__mode--<?php echo esc_attr( $mode ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<div class="testro-prod-api__mode-copy">
							<?php if ( ! empty( $item['label'] ) ) : ?>
								<span class="testro-prod-api__mode-label"><?php echo esc_html( (string) $item['label'] ); ?></span>
							<?php endif; ?>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-api__mode-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-api__mode-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
						<hr class="testro-prod-api__mode-divider" />
						<?php if ( 'standalone' === $mode ) : ?>
							<div class="testro-prod-api__mode-visual" aria-hidden="true">
								<div class="testro-prod-api__req">
									<span class="testro-prod-api__browser-chrome"></span>
									<span class="testro-prod-api__method">GET</span>
									<code>/v1/users/42</code>
									<span class="testro-prod-api__req-tag"><?php esc_html_e( 'REQUEST', 'testro' ); ?></span>
								</div>
								<div class="testro-prod-api__dash-conn" aria-hidden="true"><span></span><span></span><span></span></div>
								<div class="testro-prod-api__ok"><strong>200</strong><span><?php esc_html_e( 'OK', 'testro' ); ?></span></div>
							</div>
						<?php elseif ( 'chained' === $mode ) : ?>
							<div class="testro-prod-api__mode-visual testro-prod-api__mode-visual--chain" aria-hidden="true">
								<div class="testro-prod-api__req testro-prod-api__req--post">
									<span class="testro-prod-api__browser-chrome"></span>
									<span class="testro-prod-api__method">POST</span>
									<span class="testro-prod-api__req-tag"><?php esc_html_e( 'API CALL', 'testro' ); ?></span>
								</div>
								<div class="testro-prod-api__chain-steps">
									<span><?php esc_html_e( 'STATE CHECK', 'testro' ); ?></span>
									<span><?php esc_html_e( 'UI REFLECTED', 'testro' ); ?></span>
								</div>
								<div class="testro-prod-api__browser">
									<span class="testro-prod-api__browser-chrome"></span>
									<span class="testro-prod-api__browser-line"></span>
									<span class="testro-prod-api__browser-line testro-prod-api__browser-line--short"></span>
								</div>
							</div>
						<?php else : ?>
							<div class="testro-prod-api__mode-visual testro-prod-api__mode-visual--reuse" aria-hidden="true">
								<span class="testro-prod-api__reuse-label"><?php esc_html_e( 'Step Grouped', 'testro' ); ?></span>
								<ul class="testro-prod-api__reuse-list">
									<li><?php esc_html_e( 'Login', 'testro' ); ?></li>
									<li><?php esc_html_e( 'Get token', 'testro' ); ?></li>
									<li><?php esc_html_e( 'Checkout Profile', 'testro' ); ?></li>
								</ul>
							</div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-api__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'validate-response' === $variant ) : ?>
			<?php /* Framer Validation Detail Layout: horizontal gap 56 — payload 44% | benefits. */ ?>
			<div class="testro-prod-api__detail" data-reveal>
				<div class="testro-prod-api__payload" aria-hidden="true">
					<header class="testro-prod-api__payload-head">
						<span><?php esc_html_e( 'Response — /v1/orders/48213', 'testro' ); ?></span>
						<strong>200 OK</strong>
					</header>
					<ul class="testro-prod-api__payload-fields">
						<li><span>status</span><code>“fulfilled”</code></li>
						<li><span>total</span><code>“19.99”</code></li>
						<li><span>currency</span><code>“USD”</code></li>
						<li><span>items[]</span><code>3 entries</code></li>
					</ul>
				</div>
				<?php $render_numbered( $items, $item_tag ); ?>
			</div>

		<?php elseif ( 'self-healing' === $variant ) : ?>
			<?php /* Framer: full-width repair demo, then 3-col benefits grid gap 34. */ ?>
			<div class="testro-prod-api__heal-demo" data-reveal aria-hidden="true">
				<header class="testro-prod-api__heal-head">
					<span><?php esc_html_e( 'test_step_042 — validate_order_field', 'testro' ); ?></span>
					<span class="testro-prod-api__heal-statuses">
						<span class="testro-prod-api__heal-pill"><?php esc_html_e( 'Detecting schema drift', 'testro' ); ?></span>
						<span class="testro-prod-api__heal-pill testro-prod-api__heal-pill--ok"><?php esc_html_e( 'Automatically repaired', 'testro' ); ?></span>
					</span>
				</header>
				<pre class="testro-prod-api__heal-code">assert response.
order_amount
=== 19.99</pre>
			</div>
			<?php if ( $items ) : ?>
				<ul class="testro-prod-api__heal-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-api__heal-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<span class="testro-prod-api__heal-icon" aria-hidden="true">
								<?php
								$icon = ! empty( $item['icon'] ) ? $item['icon'] : 'sparkles';
								echo testro_icon( $icon, array( 'size' => 17 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
								?>
							</span>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-api__heal-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-api__heal-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		<?php elseif ( 'scale-cloud' === $variant ) : ?>
			<?php
			$suites = isset( $args['suites'] ) && is_array( $args['suites'] ) ? $args['suites'] : array();
			?>
			<?php /* Framer: full-width dashboard rows, then 3-col benefits, then statement. */ ?>
			<?php if ( $suites ) : ?>
				<div class="testro-prod-api__cloud-dash" data-reveal aria-hidden="true">
					<?php foreach ( $suites as $suite ) : ?>
						<div class="testro-prod-api__suite-row">
							<span class="testro-prod-api__suite-name"><?php echo esc_html( isset( $suite['name'] ) ? (string) $suite['name'] : '' ); ?></span>
							<span class="testro-prod-api__suite-track"><span class="testro-prod-api__suite-fill"></span></span>
							<strong class="testro-prod-api__suite-count"><?php echo esc_html( isset( $suite['count'] ) ? (string) $suite['count'] : '' ); ?></strong>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php if ( $items ) : ?>
				<ol class="testro-prod-api__scale-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-api__scale-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<span class="testro-prod-api__scale-index" aria-hidden="true"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-api__scale-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-api__scale-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			<?php endif; ?>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-api__scale-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'deploy-pipeline' === $variant ) : ?>
			<?php $pipeline = isset( $args['pipeline'] ) && is_array( $args['pipeline'] ) ? $args['pipeline'] : array(); ?>
			<?php if ( $pipeline ) : ?>
				<div class="testro-prod-api__release" data-reveal>
					<ol class="testro-prod-api__pipeline">
						<?php
						$count = count( $pipeline );
						foreach ( $pipeline as $index => $step ) :
							$active = ! empty( $step['active'] );
							?>
							<li class="testro-prod-api__pipe-step<?php echo $active ? ' testro-prod-api__pipe-step--active' : ''; ?>">
								<span class="testro-prod-api__pipe-icon" aria-hidden="true">
									<?php
									$icon = ! empty( $step['icon'] ) ? $step['icon'] : 'zap';
									echo testro_icon( $icon, array( 'size' => 19 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
									?>
								</span>
								<span class="testro-prod-api__pipe-label"><?php echo esc_html( isset( $step['label'] ) ? (string) $step['label'] : '' ); ?></span>
							</li>
							<?php if ( $index < $count - 1 ) : ?>
								<li class="testro-prod-api__pipe-connector" aria-hidden="true"></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ol>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $args['notes'] ) && is_array( $args['notes'] ) ) : ?>
				<ul class="testro-prod-api__pipe-notes">
					<?php foreach ( $args['notes'] as $note ) : ?>
						<li><?php echo esc_html( (string) $note ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		<?php elseif ( 'debug-fast' === $variant ) : ?>
			<?php /* Framer: horizontal — dark log 44% | numbered benefits. Intro hidden in Framer. */ ?>
			<div class="testro-prod-api__detail" data-reveal>
				<div class="testro-prod-api__debug-panel" aria-hidden="true">
					<ul class="testro-prod-api__debug-log">
						<li><span>14:02:11</span><code>POST /v1/checkout/session → 200</code></li>
						<li><span>14:02:12</span><code>GET /v1/orders/48213 → 200</code></li>
						<li class="testro-prod-api__debug-root">
							<span>14:02:12</span>
							<strong><?php esc_html_e( 'root cause:', 'testro' ); ?></strong>
							<em><?php esc_html_e( 'field "order_total" renamed to "order_amount"', 'testro' ); ?></em>
						</li>
						<li class="testro-prod-api__debug-fail"><span>14:02:12</span><?php esc_html_e( 'assertion failed — not a network or environment issue', 'testro' ); ?></li>
					</ul>
				</div>
				<?php $render_numbered( $items, $item_tag ); ?>
			</div>

		<?php elseif ( 'enterprise' === $variant ) : ?>
			<?php
			/*
			 * Framer Coverage Diagram 473.17×417.14.
			 * Nodes use centerAnchor % from Framer; connectors rotate ±38° / -90°.
			 */
			?>
			<div class="testro-prod-api__detail testro-prod-api__detail--enterprise" data-reveal>
				<div class="testro-prod-api__flowchart" aria-hidden="true">
					<svg class="testro-prod-api__flow-svg" viewBox="0 0 473.17 417.14" xmlns="http://www.w3.org/2000/svg" focusable="false">
						<text x="236.59" y="56" text-anchor="middle" fill="#5B7290" font-size="9" font-weight="400"><?php echo esc_html__( 'Web, mobile and API results together', 'testro' ); ?></text>
						<?php /* Vertical connector: center 49.61%/37.61%, rotation -90deg, length 75.33 */ ?>
						<line x1="234.74" y1="119.22" x2="234.74" y2="194.55" stroke="#5384c2" stroke-width="0.62" />
						<?php /* Left arm: center 41.58%/62.54%, rotation -38deg */ ?>
						<g transform="rotate(-38 196.74 260.88)">
							<line x1="159.07" y1="260.88" x2="234.41" y2="260.88" stroke="#5384c2" stroke-width="0.62" />
						</g>
						<?php /* Right arm: center 57.5%/62.54%, rotation 38deg */ ?>
						<g transform="rotate(38 272.07 260.88)">
							<line x1="234.4" y1="260.88" x2="309.74" y2="260.88" stroke="#5384c2" stroke-width="0.62" />
						</g>
						<?php /* Unified Coverage — center 49.61% / 25.07%, r≈29.88 */ ?>
						<circle cx="234.74" cy="104.58" r="29.88" fill="#e7f7f2" stroke="#439680" stroke-width="0.62" />
						<text x="234.74" y="101" text-anchor="middle" fill="#1f6b55" font-size="9" font-weight="600">Unified</text>
						<text x="234.74" y="112" text-anchor="middle" fill="#1f6b55" font-size="9" font-weight="600">coverage</text>
						<?php /* Enterprise API Testing — center 49.61% / 50.24%, r≈38.6 */ ?>
						<circle cx="234.74" cy="209.57" r="38.6" fill="#e8f2ff" stroke="#003E84" stroke-width="0.62" />
						<text x="234.74" y="205" text-anchor="middle" fill="#003E84" font-size="9" font-weight="600">Enterprise API</text>
						<text x="234.74" y="216" text-anchor="middle" fill="#003E84" font-size="9" font-weight="600">testing</text>
						<?php /* Role-based Access — center 31.97% / 73.28% */ ?>
						<circle cx="151.27" cy="305.68" r="29.26" fill="#fff0eb" stroke="#ca7963" stroke-width="0.62" />
						<text x="151.27" y="302" text-anchor="middle" fill="#8a4a38" font-size="8" font-weight="600">Role-based</text>
						<text x="151.27" y="312" text-anchor="middle" fill="#8a4a38" font-size="8" font-weight="600">access</text>
						<?php /* Deployment Flexibility — center 68.03% / 73.28% */ ?>
						<circle cx="321.88" cy="305.68" r="29.26" fill="#f1f0ff" stroke="#003E84" stroke-width="0.62" />
						<text x="321.88" y="302" text-anchor="middle" fill="#003E84" font-size="8" font-weight="600">Deployment</text>
						<text x="321.88" y="312" text-anchor="middle" fill="#003E84" font-size="8" font-weight="600">flexibility</text>
						<?php /* Captions */ ?>
						<text x="154.45" y="355" text-anchor="middle" fill="#5B7290" font-size="9" font-weight="400"><?php echo esc_html__( 'Control who edits, runs, approves', 'testro' ); ?></text>
						<text x="324.39" y="367" text-anchor="middle" fill="#5B7290" font-size="9" font-weight="400"><?php echo esc_html__( 'Cloud, private or on-premise', 'testro' ); ?></text>
					</svg>
				</div>
				<?php $render_numbered( $items, $item_tag ); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
