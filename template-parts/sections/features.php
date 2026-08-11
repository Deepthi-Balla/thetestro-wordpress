<?php
/**
 * Features tabs section.
 *
 * @package TestRo
 */

$tabs = testro_get_feature_tabs();
?>
<div id="features">
	<section class="testro-features" aria-labelledby="features-heading">
		<div class="testro-container">
			<header class="testro-features__header">
				<h2 id="features-heading" class="gradient-text main-headings testro-features__heading"><?php esc_html_e( 'Powerful Features for Modern Teams', 'testro' ); ?></h2>
				<p class="sub-text testro-features__sub"><?php esc_html_e( 'Everything your team needs to move faster. From automation to insights, Testro brings powerful features together so teams can focus on building, not managing.', 'testro' ); ?></p>
			</header>

			<div class="testro-features__tabs" data-feature-tabs>
				<div class="testro-features__tablist powerful-features-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Feature categories', 'testro' ); ?>">
					<?php foreach ( $tabs as $index => $tab ) : ?>
						<button
							type="button"
							class="testro-features__tab<?php echo 0 === $index ? ' is-active' : ''; ?>"
							role="tab"
							id="feature-tab-<?php echo esc_attr( $tab['id'] ); ?>"
							aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
							aria-controls="feature-panel-<?php echo esc_attr( $tab['id'] ); ?>"
							data-feature-tab="<?php echo esc_attr( $tab['id'] ); ?>"
							tabindex="<?php echo 0 === $index ? '0' : '-1'; ?>"
						>
							<?php echo esc_html( $tab['label'] ); ?>
						</button>
					<?php endforeach; ?>
				</div>

				<?php foreach ( $tabs as $index => $tab ) : ?>
					<div
						class="testro-features__panel<?php echo 0 === $index ? ' is-active' : ''; ?>"
						role="tabpanel"
						id="feature-panel-<?php echo esc_attr( $tab['id'] ); ?>"
						aria-labelledby="feature-tab-<?php echo esc_attr( $tab['id'] ); ?>"
						data-feature-panel="<?php echo esc_attr( $tab['id'] ); ?>"
						<?php echo 0 === $index ? '' : ' hidden'; ?>
					>
						<div class="testro-features__content" data-feature-animate>
							<h3 class="testro-features__title gradient-text"><?php echo esc_html( $tab['title'] ); ?></h3>
							<?php if ( ! empty( $tab['description'] ) ) : ?>
								<p class="testro-features__desc"><?php echo esc_html( $tab['description'] ); ?></p>
							<?php endif; ?>
							<ul class="testro-features__bullets">
								<?php foreach ( $tab['bullets'] as $bullet ) : ?>
									<li>
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="testro-features__check" aria-hidden="true" focusable="false"><path d="M20 6 9 17l-5-5"></path></svg>
										<span><?php echo esc_html( $bullet ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="testro-features__media" data-feature-animate>
							<div class="testro-features__media-frame">
								<video
									class="testro-features__video"
									src="<?php echo esc_url( $tab['video'] ); ?>"
									muted
									playsinline
									loop
									autoplay
									preload="metadata"
									aria-label="<?php echo esc_attr( $tab['title'] ); ?>"
								></video>
								<?php
								get_template_part(
									'template-parts/components/primary-button',
									null,
									array(
										'label' => $tab['cta'],
										'attrs' => array(
											'type'            => 'button',
											'class'           => 'primary-button testro-features__cta group relative overflow-hidden',
											'data-open-modal' => 'demo-modal',
											'aria-haspopup'   => 'dialog',
											'aria-controls'   => 'demo-modal',
										),
									)
								);
								?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
