<?php
/**
 * Product page hero — eyebrow, H1, subtitle, CTA pair and metric chips.
 *
 * Expected $args: eyebrow, title, subtitle, badges (string[]), actions (array[]),
 * metrics (array[] of value/label/icon). Optional layout=split + visual key
 * enables a two-column hero with a CSS product mockup; landing pages use the
 * default centered layout (same as AI Test Automation).
 * Visual keys: nocode-dashboard, web-testing-dashboard, api-testing-dashboard,
 * cross-browser-dashboard, tm-dashboard, heal-dashboard, td-dashboard,
 * te-dashboard, cicd-dashboard, pw-dashboard. Additional keys load from
 * template-parts/product/hero-visuals/{visual}.php via the fallback branch
 * (e.g. dynamics-dashboard, salesforce-dashboard, oracle-dashboard, sap-dashboard).
 *
 * Split DOM order is lead → visual → more so mobile shows product proof early;
 * desktop CSS places the visual in the right column.
 *
 * @package TestRo
 */

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow  = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title    = isset( $args['title'] ) ? (string) $args['title'] : '';
$subtitle = isset( $args['subtitle'] ) ? (string) $args['subtitle'] : '';
$badges   = isset( $args['badges'] ) && is_array( $args['badges'] ) ? $args['badges'] : array();
$actions  = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$metrics  = isset( $args['metrics'] ) && is_array( $args['metrics'] ) ? $args['metrics'] : array();
$layout   = isset( $args['layout'] ) ? (string) $args['layout'] : '';
$visual   = isset( $args['visual'] ) ? (string) $args['visual'] : '';
$is_split = ( 'split' === $layout && '' !== $visual );

if ( '' === $title ) {
	return;
}

$section_class = 'testro-prod-hero' . ( $is_split ? ' testro-prod-hero--split' : '' );
?>
<section class="<?php echo esc_attr( $section_class ); ?>" aria-labelledby="product-hero-title">
	<span class="testro-prod-hero__aurora" aria-hidden="true"></span>
	<span class="testro-prod-hero__grid" aria-hidden="true"></span>

	<div class="testro-container testro-prod-hero__inner">
		<?php if ( ! empty( $args['breadcrumbs'] ) ) : ?>
			<div class="testro-prod-hero__breadcrumbs"><?php testro_the_breadcrumbs(); ?></div>
		<?php endif; ?>

		<?php if ( $is_split ) : ?>
			<div class="testro-prod-hero__split">
				<div class="testro-prod-hero__lead">
		<?php endif; ?>

		<?php if ( '' !== $eyebrow ) : ?>
			<p class="subtitle-pill testro-section-eyebrow testro-prod-hero__eyebrow" data-reveal>
				<?php echo esc_html( $eyebrow ); ?>
			</p>
		<?php endif; ?>

		<h1 id="product-hero-title" class="testro-prod-hero__title gradient-text" data-reveal>
			<?php echo esc_html( $title ); ?>
		</h1>

		<?php if ( ! $is_split && '' !== $subtitle ) : ?>
			<p class="testro-prod-hero__sub" data-reveal><?php echo esc_html( $subtitle ); ?></p>
		<?php endif; ?>

		<?php if ( $actions ) : ?>
			<div class="testro-prod-hero__actions" data-reveal>
				<?php
				get_template_part(
					'template-parts/product/actions',
					null,
					array(
						'actions' => $actions,
						'align'   => $is_split ? 'start' : 'center',
					)
				);
				?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $args['logos'] ) && function_exists( 'testro_get_clients' ) ) : ?>
			<?php
			$hero_clients = array_slice( testro_get_clients(), 0, 6 );
			?>
			<?php if ( $hero_clients ) : ?>
				<div class="testro-prod-hero__logos" data-reveal>
					<p class="testro-prod-hero__logos-label"><?php esc_html_e( 'Trusted By', 'testro' ); ?></p>
					<ul class="testro-prod-hero__logos-list" aria-label="<?php esc_attr_e( 'Trusted by leading companies', 'testro' ); ?>">
						<?php foreach ( $hero_clients as $hero_client ) : ?>
							<li>
								<?php
								echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									$hero_client['logo'],
									isset( $hero_client['name'] ) ? (string) $hero_client['name'] : '',
									array(
										'width'   => 88,
										'height'  => 32,
										'class'   => 'testro-prod-hero__logo',
										'loading' => 'lazy',
									)
								);
								?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $is_split ) : ?>
				</div><!-- /.testro-prod-hero__lead -->

				<div class="testro-prod-hero__visual" data-reveal>
					<?php if ( 'nocode-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-dash" role="img" aria-label="<?php esc_attr_e( 'No-code test automation dashboard mockup with workflow builder, AI tests, execution and analytics', 'testro' ); ?>">
							<div class="testro-prod-hero-dash__float testro-prod-hero-dash__float--heal">
								<span class="testro-prod-hero-dash__float-dot"></span>
								<?php echo testro_icon( 'heart-pulse', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Self-Healing Active', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-dash__float testro-prod-hero-dash__float--pass">
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( '98.4% Pass Rate', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-dash__panel">
								<div class="testro-prod-hero-dash__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-dash__chrome-label"><?php esc_html_e( 'No-Code Studio', 'testro' ); ?></p>
								</div>

								<div class="testro-prod-hero-dash__body">
									<div class="testro-prod-hero-dash__workflow">
										<p class="testro-prod-hero-dash__label"><?php esc_html_e( 'Drag & Drop Workflow', 'testro' ); ?></p>
										<div class="testro-prod-hero-dash__nodes">
											<span class="testro-prod-hero-dash__node"><?php esc_html_e( 'Login', 'testro' ); ?></span>
											<span class="testro-prod-hero-dash__link"></span>
											<span class="testro-prod-hero-dash__node testro-prod-hero-dash__node--ai"><?php esc_html_e( 'AI Step', 'testro' ); ?></span>
											<span class="testro-prod-hero-dash__link"></span>
											<span class="testro-prod-hero-dash__node"><?php esc_html_e( 'Assert', 'testro' ); ?></span>
										</div>
									</div>

									<div class="testro-prod-hero-dash__row">
										<div class="testro-prod-hero-dash__card">
											<p class="testro-prod-hero-dash__label"><?php esc_html_e( 'AI Generated Test', 'testro' ); ?></p>
											<p class="testro-prod-hero-dash__code">Verify checkout completes for premium users</p>
											<span class="testro-prod-hero-dash__pill"><?php esc_html_e( 'Generated', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-dash__card">
											<p class="testro-prod-hero-dash__label"><?php esc_html_e( 'Browser Execution', 'testro' ); ?></p>
											<div class="testro-prod-hero-dash__browsers">
												<span>Chrome</span><span>Firefox</span><span>Safari</span><span>Edge</span>
											</div>
										</div>
									</div>

									<div class="testro-prod-hero-dash__exec">
										<div class="testro-prod-hero-dash__exec-head">
											<p class="testro-prod-hero-dash__label"><?php esc_html_e( 'Test Execution Dashboard', 'testro' ); ?></p>
											<span class="testro-prod-hero-dash__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-dash__bars">
											<span style="--h:72%"></span>
											<span style="--h:88%"></span>
											<span style="--h:64%"></span>
											<span style="--h:96%"></span>
											<span style="--h:80%"></span>
										</div>
										<div class="testro-prod-hero-dash__analytics">
											<div>
												<strong>312</strong>
												<span><?php esc_html_e( 'Self-healed', 'testro' ); ?></span>
											</div>
											<div>
												<strong>4m 12s</strong>
												<span><?php esc_html_e( 'Suite time', 'testro' ); ?></span>
											</div>
											<div>
												<strong>0.6%</strong>
												<span><?php esc_html_e( 'Flaky', 'testro' ); ?></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'web-testing-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-web" role="img" aria-label="<?php esc_attr_e( 'Live multi-browser web testing mockup with Chrome, Firefox, Safari, Edge execution, visual validation and AI self-healing', 'testro' ); ?>">
							<div class="testro-prod-hero-web__float testro-prod-hero-web__float--heal">
								<span class="testro-prod-hero-web__float-dot"></span>
								<?php echo testro_icon( 'heart-pulse', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Self-Healing', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-web__float testro-prod-hero-web__float--pass">
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Test Passed', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-web__float testro-prod-hero-web__float--visual">
								<?php echo testro_icon( 'scan-eye', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Visual Validation', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-web__panel">
								<div class="testro-prod-hero-web__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-web__chrome-label"><?php esc_html_e( 'Live Execution', 'testro' ); ?></p>
									<span class="testro-prod-hero-web__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-web__body">
									<p class="testro-prod-hero-web__label"><?php esc_html_e( 'Running Tests', 'testro' ); ?></p>
									<div class="testro-prod-hero-web__grid">
										<article class="testro-prod-hero-web__browser testro-prod-hero-web__browser--chrome">
											<header>
												<span class="testro-prod-hero-web__dot" aria-hidden="true"></span>
												<strong>Chrome</strong>
												<em><?php esc_html_e( '78%', 'testro' ); ?></em>
											</header>
											<span class="testro-prod-hero-web__bar"><i style="--p:78%"></i></span>
											<p><?php esc_html_e( 'Checkout flow', 'testro' ); ?></p>
										</article>
										<article class="testro-prod-hero-web__browser testro-prod-hero-web__browser--firefox">
											<header>
												<span class="testro-prod-hero-web__dot" aria-hidden="true"></span>
												<strong>Firefox</strong>
												<em><?php esc_html_e( '64%', 'testro' ); ?></em>
											</header>
											<span class="testro-prod-hero-web__bar"><i style="--p:64%"></i></span>
											<p><?php esc_html_e( 'Login SSO', 'testro' ); ?></p>
										</article>
										<article class="testro-prod-hero-web__browser testro-prod-hero-web__browser--safari">
											<header>
												<span class="testro-prod-hero-web__dot" aria-hidden="true"></span>
												<strong>Safari</strong>
												<em><?php esc_html_e( 'Passed', 'testro' ); ?></em>
											</header>
											<span class="testro-prod-hero-web__bar testro-prod-hero-web__bar--done"><i style="--p:100%"></i></span>
											<p><?php esc_html_e( 'Visual check', 'testro' ); ?></p>
										</article>
										<article class="testro-prod-hero-web__browser testro-prod-hero-web__browser--edge">
											<header>
												<span class="testro-prod-hero-web__dot" aria-hidden="true"></span>
												<strong>Edge</strong>
												<em><?php esc_html_e( '91%', 'testro' ); ?></em>
											</header>
											<span class="testro-prod-hero-web__bar"><i style="--p:91%"></i></span>
											<p><?php esc_html_e( 'Search journey', 'testro' ); ?></p>
										</article>
									</div>

									<div class="testro-prod-hero-web__status">
										<div>
											<strong>4/4</strong>
											<span><?php esc_html_e( 'Browsers', 'testro' ); ?></span>
										</div>
										<div>
											<strong>99.9%</strong>
											<span><?php esc_html_e( 'Pass rate', 'testro' ); ?></span>
										</div>
										<div>
											<strong>2.1s</strong>
											<span><?php esc_html_e( 'Heal time', 'testro' ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'api-testing-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-api" role="img" aria-label="<?php esc_attr_e( 'API testing dashboard mockup with request, response, JSON viewer, AI analysis, collections and execution status', 'testro' ); ?>">
							<div class="testro-prod-hero-api__float testro-prod-hero-api__float--pass">
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Test Passed', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-api__float testro-prod-hero-api__float--ai">
								<span class="testro-prod-hero-api__float-dot"></span>
								<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Analysis', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-api__float testro-prod-hero-api__float--coll">
								<?php echo testro_icon( 'layers-api', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'API Collections', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-api__panel">
								<div class="testro-prod-hero-api__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-api__chrome-label"><?php esc_html_e( 'API Studio', 'testro' ); ?></p>
									<span class="testro-prod-hero-api__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-api__body">
									<div class="testro-prod-hero-api__pair">
										<article class="testro-prod-hero-api__card testro-prod-hero-api__card--req">
											<p class="testro-prod-hero-api__label"><?php esc_html_e( 'API Request', 'testro' ); ?></p>
											<p class="testro-prod-hero-api__endpoint">
												<em>POST</em>
												<span>/v1/orders</span>
											</p>
											<pre class="testro-prod-hero-api__json" aria-hidden="true">{ "sku": "PRO-42" }</pre>
										</article>
										<span class="testro-prod-hero-api__link" aria-hidden="true"></span>
										<article class="testro-prod-hero-api__card testro-prod-hero-api__card--res">
											<p class="testro-prod-hero-api__label"><?php esc_html_e( 'API Response', 'testro' ); ?></p>
											<p class="testro-prod-hero-api__endpoint">
												<em class="is-ok">201</em>
												<span><?php esc_html_e( 'Created', 'testro' ); ?></span>
											</p>
											<pre class="testro-prod-hero-api__json" aria-hidden="true">{ "id": "ord_9182" }</pre>
										</article>
									</div>

									<div class="testro-prod-hero-api__row">
										<div class="testro-prod-hero-api__viewer">
											<p class="testro-prod-hero-api__label"><?php esc_html_e( 'JSON Viewer', 'testro' ); ?></p>
											<div class="testro-prod-hero-api__lines" aria-hidden="true">
												<span style="--w:88%"></span>
												<span style="--w:64%"></span>
												<span style="--w:76%"></span>
											</div>
										</div>
										<div class="testro-prod-hero-api__exec">
											<p class="testro-prod-hero-api__label"><?php esc_html_e( 'Execution Status', 'testro' ); ?></p>
											<div class="testro-prod-hero-api__bars" aria-hidden="true">
												<span style="--h:72%"></span>
												<span style="--h:90%"></span>
												<span style="--h:58%"></span>
												<span style="--h:96%"></span>
											</div>
										</div>
									</div>

									<div class="testro-prod-hero-api__status">
										<div>
											<strong>248</strong>
											<span><?php esc_html_e( 'Requests', 'testro' ); ?></span>
										</div>
										<div>
											<strong>99.9%</strong>
											<span><?php esc_html_e( 'Pass rate', 'testro' ); ?></span>
										</div>
										<div>
											<strong>182ms</strong>
											<span><?php esc_html_e( 'Avg latency', 'testro' ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'cross-browser-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-cbt" role="img" aria-label="<?php esc_attr_e( 'Cross-browser testing dashboard showing Chrome, Firefox, Edge and Safari running the same application with AI validation, progress and analytics', 'testro' ); ?>">
							<div class="testro-prod-hero-cbt__float testro-prod-hero-cbt__float--ai">
								<span class="testro-prod-hero-cbt__float-dot"></span>
								<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Validation', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-cbt__float testro-prod-hero-cbt__float--pass">
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( '4/4 Browsers Pass', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-cbt__float testro-prod-hero-cbt__float--os">
								<?php echo testro_icon( 'browsers', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Cross-Platform', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-cbt__panel">
								<div class="testro-prod-hero-cbt__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-cbt__chrome-label"><?php esc_html_e( 'Cross-Browser Studio', 'testro' ); ?></p>
									<span class="testro-prod-hero-cbt__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-cbt__body">
									<div class="testro-prod-hero-cbt__toolbar">
										<p class="testro-prod-hero-cbt__label"><?php esc_html_e( 'Same app · every browser', 'testro' ); ?></p>
										<div class="testro-prod-hero-cbt__devices" aria-hidden="true">
											<span class="is-active"><?php esc_html_e( 'Desktop', 'testro' ); ?></span>
											<span><?php esc_html_e( 'Tablet', 'testro' ); ?></span>
											<span><?php esc_html_e( 'Mobile', 'testro' ); ?></span>
										</div>
									</div>

									<div class="testro-prod-hero-cbt__grid">
										<article class="testro-prod-hero-cbt__browser testro-prod-hero-cbt__browser--chrome">
											<header>
												<span class="testro-prod-hero-cbt__dot" aria-hidden="true"></span>
												<strong>Chrome</strong>
												<em><?php esc_html_e( 'Passed', 'testro' ); ?></em>
											</header>
											<div class="testro-prod-hero-cbt__preview" aria-hidden="true">
												<span class="testro-prod-hero-cbt__nav"></span>
												<span class="testro-prod-hero-cbt__hero-block"></span>
												<span class="testro-prod-hero-cbt__cols"><i></i><i></i><i></i></span>
											</div>
											<span class="testro-prod-hero-cbt__bar testro-prod-hero-cbt__bar--done"><i style="--p:100%"></i></span>
										</article>
										<article class="testro-prod-hero-cbt__browser testro-prod-hero-cbt__browser--firefox">
											<header>
												<span class="testro-prod-hero-cbt__dot" aria-hidden="true"></span>
												<strong>Firefox</strong>
												<em>76%</em>
											</header>
											<div class="testro-prod-hero-cbt__preview" aria-hidden="true">
												<span class="testro-prod-hero-cbt__nav"></span>
												<span class="testro-prod-hero-cbt__hero-block"></span>
												<span class="testro-prod-hero-cbt__cols"><i></i><i></i><i></i></span>
											</div>
											<span class="testro-prod-hero-cbt__bar"><i style="--p:76%"></i></span>
										</article>
										<article class="testro-prod-hero-cbt__browser testro-prod-hero-cbt__browser--edge">
											<header>
												<span class="testro-prod-hero-cbt__dot" aria-hidden="true"></span>
												<strong>Edge</strong>
												<em>91%</em>
											</header>
											<div class="testro-prod-hero-cbt__preview" aria-hidden="true">
												<span class="testro-prod-hero-cbt__nav"></span>
												<span class="testro-prod-hero-cbt__hero-block"></span>
												<span class="testro-prod-hero-cbt__cols"><i></i><i></i><i></i></span>
											</div>
											<span class="testro-prod-hero-cbt__bar"><i style="--p:91%"></i></span>
										</article>
										<article class="testro-prod-hero-cbt__browser testro-prod-hero-cbt__browser--safari is-diff">
											<header>
												<span class="testro-prod-hero-cbt__dot" aria-hidden="true"></span>
												<strong>Safari</strong>
												<em><?php esc_html_e( 'AI check', 'testro' ); ?></em>
											</header>
											<div class="testro-prod-hero-cbt__preview" aria-hidden="true">
												<span class="testro-prod-hero-cbt__nav"></span>
												<span class="testro-prod-hero-cbt__hero-block is-flag"></span>
												<span class="testro-prod-hero-cbt__cols"><i></i><i class="is-flag"></i><i></i></span>
												<span class="testro-prod-hero-cbt__ai-pill"><?php esc_html_e( 'Diff', 'testro' ); ?></span>
											</div>
											<span class="testro-prod-hero-cbt__bar"><i style="--p:88%"></i></span>
										</article>
									</div>

									<div class="testro-prod-hero-cbt__status">
										<div>
											<strong>4/4</strong>
											<span><?php esc_html_e( 'Browsers', 'testro' ); ?></span>
										</div>
										<div>
											<strong>99.2%</strong>
											<span><?php esc_html_e( 'Pass rate', 'testro' ); ?></span>
										</div>
										<div>
											<strong>2m 54s</strong>
											<span><?php esc_html_e( 'Parallel run', 'testro' ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'tm-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-tm" role="img" aria-label="<?php esc_attr_e( 'AI Test Management dashboard showing test suites, runs, requirements, defects, AI suggestions, execution progress and release status', 'testro' ); ?>">
							<div class="testro-prod-hero-tm__float testro-prod-hero-tm__float--ai">
								<span class="testro-prod-hero-tm__float-dot"></span>
								<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Suggestion', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-tm__float testro-prod-hero-tm__float--pass">
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-tm__float testro-prod-hero-tm__float--trace">
								<?php echo testro_icon( 'git-branch', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Traceability Live', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-tm__panel">
								<div class="testro-prod-hero-tm__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-tm__chrome-label"><?php esc_html_e( 'Test Management', 'testro' ); ?></p>
									<span class="testro-prod-hero-tm__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-tm__body">
									<div class="testro-prod-hero-tm__stats">
										<article>
											<p class="testro-prod-hero-tm__label"><?php esc_html_e( 'Test Suites', 'testro' ); ?></p>
											<strong>128</strong>
											<em><?php esc_html_e( '+12 this sprint', 'testro' ); ?></em>
										</article>
										<article>
											<p class="testro-prod-hero-tm__label"><?php esc_html_e( 'Test Runs', 'testro' ); ?></p>
											<strong>1.2k</strong>
											<em><?php esc_html_e( '98.6% pass', 'testro' ); ?></em>
										</article>
										<article>
											<p class="testro-prod-hero-tm__label"><?php esc_html_e( 'Requirements', 'testro' ); ?></p>
											<strong>64</strong>
											<em><?php esc_html_e( '92% covered', 'testro' ); ?></em>
										</article>
										<article>
											<p class="testro-prod-hero-tm__label"><?php esc_html_e( 'Defects', 'testro' ); ?></p>
											<strong>17</strong>
											<em><?php esc_html_e( '4 critical', 'testro' ); ?></em>
										</article>
									</div>

									<div class="testro-prod-hero-tm__row">
										<div class="testro-prod-hero-tm__kanban">
											<p class="testro-prod-hero-tm__label"><?php esc_html_e( 'Planning Board', 'testro' ); ?></p>
											<div class="testro-prod-hero-tm__lanes" aria-hidden="true">
												<span><i></i><i></i></span>
												<span class="is-active"><i></i><i></i><i></i></span>
												<span><i></i></span>
											</div>
										</div>
										<div class="testro-prod-hero-tm__progress">
											<p class="testro-prod-hero-tm__label"><?php esc_html_e( 'Execution Progress', 'testro' ); ?></p>
											<span class="testro-prod-hero-tm__bar"><i style="--p:78%"></i></span>
											<p class="testro-prod-hero-tm__progress-meta"><?php esc_html_e( 'Release 2.4 · 78% complete', 'testro' ); ?></p>
										</div>
									</div>

									<div class="testro-prod-hero-tm__status">
										<div>
											<strong>96%</strong>
											<span><?php esc_html_e( 'Release status', 'testro' ); ?></span>
										</div>
										<div>
											<strong>7</strong>
											<span><?php esc_html_e( 'AI suggestions', 'testro' ); ?></span>
										</div>
										<div>
											<strong>A+</strong>
											<span><?php esc_html_e( 'Analytics health', 'testro' ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'heal-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-heal" role="img" aria-label="<?php esc_attr_e( 'Self-healing automation dashboard showing broken locator detection, AI DOM analysis, auto-healed locator, execution timeline and AI recommendations', 'testro' ); ?>">
							<div class="testro-prod-hero-heal__float testro-prod-hero-heal__float--active">
								<span class="testro-prod-hero-heal__float-dot"></span>
								<?php echo testro_icon( 'heart-pulse', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Self-Healing Active', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-heal__float testro-prod-hero-heal__float--repaired">
								<?php echo testro_icon( 'wand', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Locator Repaired', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-heal__float testro-prod-hero-heal__float--continues">
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Test Continues', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-heal__panel">
								<div class="testro-prod-hero-heal__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-heal__chrome-label"><?php esc_html_e( 'Self-Healing Console', 'testro' ); ?></p>
									<span class="testro-prod-hero-heal__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-heal__body">
									<p class="testro-prod-hero-heal__label"><?php esc_html_e( 'Healing Workflow', 'testro' ); ?></p>
									<ol class="testro-prod-hero-heal__flow" aria-hidden="true">
										<li class="testro-prod-hero-heal__step is-broken" style="--step:0">
											<span class="testro-prod-hero-heal__step-icon"><?php echo testro_icon( 'alert-octagon', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-heal__step-text"><?php esc_html_e( 'Broken Locator', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-heal__step is-detect" style="--step:1">
											<span class="testro-prod-hero-heal__step-icon"><?php echo testro_icon( 'scan-eye', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-heal__step-text"><?php esc_html_e( 'AI Detection', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-heal__step is-dom" style="--step:2">
											<span class="testro-prod-hero-heal__step-icon"><?php echo testro_icon( 'microscope', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-heal__step-text"><?php esc_html_e( 'DOM Analysis', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-heal__step is-healed" style="--step:3">
											<span class="testro-prod-hero-heal__step-icon"><?php echo testro_icon( 'wand', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-heal__step-text"><?php esc_html_e( 'Auto-Healed Locator', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-heal__step is-continue" style="--step:4">
											<span class="testro-prod-hero-heal__step-icon"><?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-heal__step-text"><?php esc_html_e( 'Test Continues', 'testro' ); ?></span>
										</li>
									</ol>

									<div class="testro-prod-hero-heal__row">
										<div class="testro-prod-hero-heal__timeline">
											<p class="testro-prod-hero-heal__label"><?php esc_html_e( 'Execution Timeline', 'testro' ); ?></p>
											<ul class="testro-prod-hero-heal__ticks" aria-hidden="true">
												<li><span>0.0s</span><em><?php esc_html_e( 'Start', 'testro' ); ?></em></li>
												<li class="is-alert"><span>1.2s</span><em><?php esc_html_e( 'Locator fail', 'testro' ); ?></em></li>
												<li class="is-ai"><span>1.8s</span><em><?php esc_html_e( 'AI analyze', 'testro' ); ?></em></li>
												<li class="is-ok"><span>2.4s</span><em><?php esc_html_e( 'Healed', 'testro' ); ?></em></li>
												<li class="is-ok"><span>3.1s</span><em><?php esc_html_e( 'Pass', 'testro' ); ?></em></li>
											</ul>
											<span class="testro-prod-hero-heal__rail"><i></i></span>
										</div>
										<div class="testro-prod-hero-heal__recs">
											<p class="testro-prod-hero-heal__label"><?php esc_html_e( 'AI Recommendations', 'testro' ); ?></p>
											<ul aria-hidden="true">
												<li><?php esc_html_e( 'Prefer data-testid over CSS path', 'testro' ); ?></li>
												<li><?php esc_html_e( 'Persist healed #checkout-btn', 'testro' ); ?></li>
												<li><?php esc_html_e( 'Promote multi-attr match', 'testro' ); ?></li>
											</ul>
										</div>
									</div>

									<div class="testro-prod-hero-heal__status">
										<div>
											<strong>99.95%</strong>
											<span><?php esc_html_e( 'Heal success', 'testro' ); ?></span>
										</div>
										<div>
											<strong>&lt;2s</strong>
											<span><?php esc_html_e( 'Avg heal time', 'testro' ); ?></span>
										</div>
										<div>
											<strong>OK</strong>
											<span><?php esc_html_e( 'Success indicator', 'testro' ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'td-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-td" role="img" aria-label="<?php esc_attr_e( 'AI Test Development dashboard showing natural language test creation, drag and drop workflow, reusable components, AI suggestions, live preview and test repository', 'testro' ); ?>">
							<div class="testro-prod-hero-td__float testro-prod-hero-td__float--ai">
								<span class="testro-prod-hero-td__float-dot"></span>
								<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Suggestions', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-td__float testro-prod-hero-td__float--nl">
								<?php echo testro_icon( 'message-text', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Natural Language', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-td__float testro-prod-hero-td__float--reuse">
								<?php echo testro_icon( 'puzzle', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Reusable Components', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-td__panel">
								<div class="testro-prod-hero-td__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-td__chrome-label"><?php esc_html_e( 'AI Test Builder', 'testro' ); ?></p>
									<span class="testro-prod-hero-td__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-td__body">
									<div class="testro-prod-hero-td__prompt">
										<p class="testro-prod-hero-td__label"><?php esc_html_e( 'Natural Language Test Creation', 'testro' ); ?></p>
										<p class="testro-prod-hero-td__code"><?php esc_html_e( 'Verify premium checkout completes with saved payment methods', 'testro' ); ?></p>
										<span class="testro-prod-hero-td__pill"><?php esc_html_e( 'AI Generated', 'testro' ); ?></span>
									</div>

									<div class="testro-prod-hero-td__workflow">
										<p class="testro-prod-hero-td__label"><?php esc_html_e( 'Drag & Drop Workflow', 'testro' ); ?></p>
										<div class="testro-prod-hero-td__nodes" aria-hidden="true">
											<span class="testro-prod-hero-td__node"><?php esc_html_e( 'Login', 'testro' ); ?></span>
											<span class="testro-prod-hero-td__link"></span>
											<span class="testro-prod-hero-td__node testro-prod-hero-td__node--ai"><?php esc_html_e( 'AI Step', 'testro' ); ?></span>
											<span class="testro-prod-hero-td__link"></span>
											<span class="testro-prod-hero-td__node"><?php esc_html_e( 'Assert', 'testro' ); ?></span>
											<span class="testro-prod-hero-td__link"></span>
											<span class="testro-prod-hero-td__node"><?php esc_html_e( 'Publish', 'testro' ); ?></span>
										</div>
									</div>

									<div class="testro-prod-hero-td__row">
										<div class="testro-prod-hero-td__card">
											<p class="testro-prod-hero-td__label"><?php esc_html_e( 'Test Libraries', 'testro' ); ?></p>
											<ul class="testro-prod-hero-td__list" aria-hidden="true">
												<li><?php esc_html_e( 'Auth components', 'testro' ); ?></li>
												<li><?php esc_html_e( 'Checkout flows', 'testro' ); ?></li>
												<li><?php esc_html_e( 'API helpers', 'testro' ); ?></li>
											</ul>
										</div>
										<div class="testro-prod-hero-td__card testro-prod-hero-td__card--preview">
											<p class="testro-prod-hero-td__label"><?php esc_html_e( 'Live Preview', 'testro' ); ?></p>
											<div class="testro-prod-hero-td__preview" aria-hidden="true">
												<span class="is-done"></span>
												<span class="is-done"></span>
												<span class="is-active"></span>
												<span></span>
											</div>
											<p class="testro-prod-hero-td__preview-meta"><?php esc_html_e( 'Step 3 of 4 · Validating', 'testro' ); ?></p>
										</div>
									</div>

									<div class="testro-prod-hero-td__repo">
										<div>
											<strong>248</strong>
											<span><?php esc_html_e( 'Test Repository', 'testro' ); ?></span>
										</div>
										<div>
											<strong>64</strong>
											<span><?php esc_html_e( 'Components', 'testro' ); ?></span>
										</div>
										<div>
											<strong>12</strong>
											<span><?php esc_html_e( 'AI suggestions', 'testro' ); ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'te-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-te" role="img" aria-label="<?php esc_attr_e( 'AI Test Execution dashboard showing running tests, parallel execution, browser status, environment health, queue manager, AI monitoring, execution progress and release readiness', 'testro' ); ?>">
							<div class="testro-prod-hero-te__float testro-prod-hero-te__float--parallel">
								<span class="testro-prod-hero-te__float-dot"></span>
								<?php echo testro_icon( 'infinity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Parallel Execution', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-te__float testro-prod-hero-te__float--queue">
								<?php echo testro_icon( 'database', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Queue Manager', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-te__float testro-prod-hero-te__float--ai">
								<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Monitoring', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-te__panel">
								<div class="testro-prod-hero-te__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-te__chrome-label"><?php esc_html_e( 'Test Execution Dashboard', 'testro' ); ?></p>
									<span class="testro-prod-hero-te__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-te__body">
									<div class="testro-prod-hero-te__stats">
										<div class="testro-prod-hero-te__stat">
											<strong>128</strong>
											<span><?php esc_html_e( 'Running Tests', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-te__stat testro-prod-hero-te__stat--accent">
											<strong>32x</strong>
											<span><?php esc_html_e( 'Parallel Grid', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-te__stat">
											<strong>94%</strong>
											<span><?php esc_html_e( 'Release Ready', 'testro' ); ?></span>
										</div>
									</div>

									<div class="testro-prod-hero-te__row">
										<div class="testro-prod-hero-te__card">
											<p class="testro-prod-hero-te__label"><?php esc_html_e( 'Browser Status', 'testro' ); ?></p>
											<ul class="testro-prod-hero-te__browsers" aria-hidden="true">
												<li><span class="is-live"></span><?php esc_html_e( 'Chrome', 'testro' ); ?></li>
												<li><span class="is-live"></span><?php esc_html_e( 'Firefox', 'testro' ); ?></li>
												<li><span class="is-live"></span><?php esc_html_e( 'Safari', 'testro' ); ?></li>
												<li><span class="is-warn"></span><?php esc_html_e( 'Edge', 'testro' ); ?></li>
											</ul>
										</div>
										<div class="testro-prod-hero-te__card">
											<p class="testro-prod-hero-te__label"><?php esc_html_e( 'Environment Status', 'testro' ); ?></p>
											<ul class="testro-prod-hero-te__envs" aria-hidden="true">
												<li>
													<span><?php esc_html_e( 'Dev', 'testro' ); ?></span>
													<em class="is-ok"><?php esc_html_e( 'Healthy', 'testro' ); ?></em>
												</li>
												<li>
													<span><?php esc_html_e( 'Staging', 'testro' ); ?></span>
													<em class="is-ok"><?php esc_html_e( 'Healthy', 'testro' ); ?></em>
												</li>
												<li>
													<span><?php esc_html_e( 'Prod gate', 'testro' ); ?></span>
													<em class="is-run"><?php esc_html_e( 'Executing', 'testro' ); ?></em>
												</li>
											</ul>
										</div>
									</div>

									<div class="testro-prod-hero-te__progress">
										<div class="testro-prod-hero-te__progress-head">
											<p class="testro-prod-hero-te__label"><?php esc_html_e( 'Execution Progress', 'testro' ); ?></p>
											<span><?php esc_html_e( '76% complete', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-te__bar" aria-hidden="true"><i></i></div>
										<p class="testro-prod-hero-te__progress-meta"><?php esc_html_e( 'Cloud Infrastructure · 14 queued · AI monitoring active', 'testro' ); ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'cicd-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-cicd" role="img" aria-label="<?php esc_attr_e( 'CI/CD continuous testing dashboard showing commit to production pipeline, quality gate, running tests, build success, AI validation and deployment progress', 'testro' ); ?>">
							<div class="testro-prod-hero-cicd__float testro-prod-hero-cicd__float--status">
								<span class="testro-prod-hero-cicd__float-dot"></span>
								<?php echo testro_icon( 'activity', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Pipeline Status', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-cicd__float testro-prod-hero-cicd__float--tests">
								<?php echo testro_icon( 'zap', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Running Tests', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-cicd__float testro-prod-hero-cicd__float--gate">
								<?php echo testro_icon( 'badge-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Validation', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-cicd__panel">
								<div class="testro-prod-hero-cicd__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-cicd__chrome-label"><?php esc_html_e( 'CI/CD Pipeline Dashboard', 'testro' ); ?></p>
									<span class="testro-prod-hero-cicd__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-cicd__body">
									<div class="testro-prod-hero-cicd__stats">
										<div class="testro-prod-hero-cicd__stat">
											<strong>Live</strong>
											<span><?php esc_html_e( 'Pipeline Status', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-cicd__stat testro-prod-hero-cicd__stat--accent">
											<strong>64</strong>
											<span><?php esc_html_e( 'Running Tests', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-cicd__stat">
											<strong>98%</strong>
											<span><?php esc_html_e( 'Build Success', 'testro' ); ?></span>
										</div>
									</div>

									<p class="testro-prod-hero-cicd__label"><?php esc_html_e( 'Commit → Production', 'testro' ); ?></p>
									<ol class="testro-prod-hero-cicd__flow" aria-hidden="true">
										<li class="testro-prod-hero-cicd__stage is-done" style="--step:0">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'code', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'Commit', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-cicd__stage is-done" style="--step:1">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'git-branch', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'Git', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-cicd__stage is-done" style="--step:2">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'server', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'Build', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-cicd__stage is-run" style="--step:3">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'zap', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'AI Tests', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-cicd__stage is-gate" style="--step:4">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'shield-check', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'Quality Gate', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-cicd__stage is-next" style="--step:5">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'rocket', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'Deploy', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-cicd__stage is-next" style="--step:6">
											<span class="testro-prod-hero-cicd__stage-icon"><?php echo testro_icon( 'circle-check', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-cicd__stage-text"><?php esc_html_e( 'Production', 'testro' ); ?></span>
										</li>
									</ol>

									<div class="testro-prod-hero-cicd__row">
										<div class="testro-prod-hero-cicd__card">
											<p class="testro-prod-hero-cicd__label"><?php esc_html_e( 'Quality Gate', 'testro' ); ?></p>
											<ul class="testro-prod-hero-cicd__checks" aria-hidden="true">
												<li>
													<span><?php esc_html_e( 'Build validation', 'testro' ); ?></span>
													<em class="is-ok"><?php esc_html_e( 'Pass', 'testro' ); ?></em>
												</li>
												<li>
													<span><?php esc_html_e( 'AI validation', 'testro' ); ?></span>
													<em class="is-run"><?php esc_html_e( 'Running', 'testro' ); ?></em>
												</li>
												<li>
													<span><?php esc_html_e( 'Release risk', 'testro' ); ?></span>
													<em class="is-ok"><?php esc_html_e( 'Low', 'testro' ); ?></em>
												</li>
											</ul>
										</div>
										<div class="testro-prod-hero-cicd__card">
											<p class="testro-prod-hero-cicd__label"><?php esc_html_e( 'Deployment Progress', 'testro' ); ?></p>
											<ul class="testro-prod-hero-cicd__checks" aria-hidden="true">
												<li>
													<span><?php esc_html_e( 'Staging', 'testro' ); ?></span>
													<em class="is-ok"><?php esc_html_e( 'Ready', 'testro' ); ?></em>
												</li>
												<li>
													<span><?php esc_html_e( 'Canary', 'testro' ); ?></span>
													<em class="is-run"><?php esc_html_e( 'Queued', 'testro' ); ?></em>
												</li>
												<li>
													<span><?php esc_html_e( 'Production', 'testro' ); ?></span>
													<em class="is-wait"><?php esc_html_e( 'Awaiting gate', 'testro' ); ?></em>
												</li>
											</ul>
										</div>
									</div>

									<div class="testro-prod-hero-cicd__progress">
										<div class="testro-prod-hero-cicd__progress-head">
											<p class="testro-prod-hero-cicd__label"><?php esc_html_e( 'Pipeline Progress', 'testro' ); ?></p>
											<span><?php esc_html_e( '68% complete', 'testro' ); ?></span>
										</div>
										<div class="testro-prod-hero-cicd__bar" aria-hidden="true"><i></i></div>
										<p class="testro-prod-hero-cicd__progress-meta"><?php esc_html_e( 'GitHub Actions · Quality gate active · AI insights on', 'testro' ); ?></p>
									</div>
								</div>
							</div>
						</div>
					<?php elseif ( 'pw-dashboard' === $visual ) : ?>
						<div class="testro-prod-hero-pw" role="img" aria-label="<?php esc_attr_e( 'Playwright export workflow showing visual builder, AI processing, TypeScript code generation, IDE export and CI/CD pipeline', 'testro' ); ?>">
							<div class="testro-prod-hero-pw__float testro-prod-hero-pw__float--export">
								<span class="testro-prod-hero-pw__float-dot"></span>
								<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Export Ready', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-pw__float testro-prod-hero-pw__float--code">
								<?php echo testro_icon( 'code', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'TypeScript · Playwright', 'testro' ); ?></span>
							</div>
							<div class="testro-prod-hero-pw__float testro-prod-hero-pw__float--ai">
								<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'AI Generating…', 'testro' ); ?></span>
							</div>

							<div class="testro-prod-hero-pw__panel">
								<div class="testro-prod-hero-pw__chrome">
									<span></span><span></span><span></span>
									<p class="testro-prod-hero-pw__chrome-label"><?php esc_html_e( 'Playwright Export Studio', 'testro' ); ?></p>
									<span class="testro-prod-hero-pw__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
								</div>

								<div class="testro-prod-hero-pw__body">
									<ol class="testro-prod-hero-pw__flow" aria-hidden="true">
										<li class="testro-prod-hero-pw__stage is-done" style="--step:0">
											<span class="testro-prod-hero-pw__stage-icon"><?php echo testro_icon( 'layout-grid', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-pw__stage-text"><?php esc_html_e( 'Visual Builder', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-pw__stage is-run" style="--step:1">
											<span class="testro-prod-hero-pw__stage-icon"><?php echo testro_icon( 'sparkles', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-pw__stage-text"><?php esc_html_e( 'AI Processing', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-pw__stage is-next" style="--step:2">
											<span class="testro-prod-hero-pw__stage-icon"><?php echo testro_icon( 'code', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-pw__stage-text"><?php esc_html_e( 'Code Gen', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-pw__stage is-next" style="--step:3">
											<span class="testro-prod-hero-pw__stage-icon"><?php echo testro_icon( 'badge-check', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-pw__stage-text"><?php esc_html_e( 'Export', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-pw__stage is-next" style="--step:4">
											<span class="testro-prod-hero-pw__stage-icon"><?php echo testro_icon( 'pen-square', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-pw__stage-text"><?php esc_html_e( 'IDE', 'testro' ); ?></span>
										</li>
										<li class="testro-prod-hero-pw__stage is-next" style="--step:5">
											<span class="testro-prod-hero-pw__stage-icon"><?php echo testro_icon( 'rocket', array( 'size' => 12 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?></span>
											<span class="testro-prod-hero-pw__stage-text"><?php esc_html_e( 'CI/CD', 'testro' ); ?></span>
										</li>
									</ol>

									<div class="testro-prod-hero-pw__split-panels">
										<div class="testro-prod-hero-pw__card">
											<p class="testro-prod-hero-pw__label"><?php esc_html_e( 'Visual Test Builder', 'testro' ); ?></p>
											<ul class="testro-prod-hero-pw__steps" aria-hidden="true">
												<li><em>1</em><span><?php esc_html_e( 'Open login page', 'testro' ); ?></span></li>
												<li><em>2</em><span><?php esc_html_e( 'Fill credentials', 'testro' ); ?></span></li>
												<li class="is-active"><em>3</em><span><?php esc_html_e( 'Click Sign in', 'testro' ); ?></span></li>
												<li><em>4</em><span><?php esc_html_e( 'Assert dashboard', 'testro' ); ?></span></li>
											</ul>
										</div>
										<div class="testro-prod-hero-pw__card testro-prod-hero-pw__card--code">
											<p class="testro-prod-hero-pw__label"><?php esc_html_e( 'login.spec.ts', 'testro' ); ?></p>
											<pre class="testro-prod-hero-pw__code" aria-hidden="true"><code><span class="kw">import</span> { test, expect } <span class="kw">from</span> <span class="str">'@playwright/test'</span>;

test(<span class="str">'user can sign in'</span>, <span class="kw">async</span> ({ page }) =&gt; {
  <span class="kw">await</span> page.goto(<span class="str">'/login'</span>);
  <span class="kw">await</span> page.getByLabel(<span class="str">'Email'</span>).fill(<span class="str">'qa@…'</span>);
  <span class="kw">await</span> page.getByRole(<span class="str">'button'</span>, { name: <span class="str">'Sign in'</span> }).click();
  <span class="kw">await</span> expect(page).toHaveURL(<span class="str">'/dashboard'</span>);
});</code></pre>
										</div>
									</div>

									<div class="testro-prod-hero-pw__meta">
										<span><?php echo testro_icon( 'browsers', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><?php esc_html_e( 'Chromium · Firefox · WebKit', 'testro' ); ?></span>
										<span><?php echo testro_icon( 'git-branch', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?><?php esc_html_e( 'CI/CD ready', 'testro' ); ?></span>
									</div>
								</div>
							</div>
						</div>
					<?php else : ?>
						<?php get_template_part( 'template-parts/product/hero-visuals/' . sanitize_file_name( $visual ) ); ?>
					<?php endif; ?>
				</div>

				<div class="testro-prod-hero__more">
					<?php if ( '' !== $subtitle ) : ?>
						<p class="testro-prod-hero__sub" data-reveal><?php echo esc_html( $subtitle ); ?></p>
					<?php endif; ?>

					<?php if ( $badges ) : ?>
						<ul class="testro-prod-hero__badges" aria-label="<?php esc_attr_e( 'Platform highlights', 'testro' ); ?>" data-reveal>
							<?php foreach ( $badges as $badge ) : ?>
								<li class="testro-prod-hero__badge">
									<?php echo testro_icon( 'circle-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									<?php echo esc_html( $badge ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div><!-- /.testro-prod-hero__split -->
		<?php else : ?>
			<?php if ( $badges ) : ?>
				<ul class="testro-prod-hero__badges" aria-label="<?php esc_attr_e( 'Platform highlights', 'testro' ); ?>" data-reveal>
					<?php foreach ( $badges as $badge ) : ?>
						<li class="testro-prod-hero__badge">
							<?php echo testro_icon( 'circle-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							<?php echo esc_html( $badge ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $metrics ) : ?>
			<ul class="testro-prod-hero__metrics" data-reveal>
				<?php foreach ( $metrics as $metric ) : ?>
					<li class="testro-prod-hero__metric">
						<?php if ( ! empty( $metric['icon'] ) ) : ?>
							<span class="testro-prod-hero__metric-icon" aria-hidden="true">
								<?php echo testro_icon( $metric['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<span class="testro-prod-hero__metric-text">
							<span class="testro-prod-hero__metric-value"><?php echo esc_html( $metric['value'] ); ?></span>
							<span class="testro-prod-hero__metric-label"><?php echo esc_html( $metric['label'] ); ?></span>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
