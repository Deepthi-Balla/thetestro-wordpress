<?php
/**
 * Product page use cases — interactive tabs with CSS illustration panels.
 *
 * Reuses homepage data-feature-tabs JS. Expected $args: id, eyebrow, title,
 * intro, tabs (array[] of id/label/title/description/bullets/illustration).
 *
 * @package TestRo
 */

$args      = isset( $args ) && is_array( $args ) ? $args : array();
$tabs      = isset( $args['tabs'] ) && is_array( $args['tabs'] ) ? $args['tabs'] : array();
$id        = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'use-cases';
$mock_note = isset( $args['mock_note'] ) ? (string) $args['mock_note'] : __( 'AI-powered no-code automation', 'testro' );

if ( ! $tabs ) {
	return;
}

$heading_id = $id . '-heading';
$uid        = 'usecase-' . $id;
?>
<section
	class="testro-prod-section testro-prod-usecases"
	id="<?php echo esc_attr( $id ); ?>"
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
			)
		);
		?>

		<div class="testro-prod-usecases__tabs" data-feature-tabs>
			<div class="testro-prod-usecases__rail" data-usecase-rail>
				<div class="testro-prod-usecases__tablist" role="tablist" aria-label="<?php esc_attr_e( 'Testing use cases', 'testro' ); ?>" data-usecase-tablist>
					<?php foreach ( $tabs as $index => $tab ) : ?>
						<?php
						$tab_id = isset( $tab['id'] ) ? sanitize_title( $tab['id'] ) : 'tab-' . $index;
						?>
						<button
							type="button"
							class="testro-prod-usecases__tab<?php echo 0 === $index ? ' is-active' : ''; ?>"
							role="tab"
							id="<?php echo esc_attr( $uid . '-tab-' . $tab_id ); ?>"
							aria-selected="<?php echo 0 === $index ? 'true' : 'false'; ?>"
							aria-controls="<?php echo esc_attr( $uid . '-panel-' . $tab_id ); ?>"
							data-feature-tab="<?php echo esc_attr( $tab_id ); ?>"
							tabindex="<?php echo 0 === $index ? '0' : '-1'; ?>"
						>
							<?php echo esc_html( $tab['label'] ); ?>
						</button>
					<?php endforeach; ?>
				</div>
				<span class="testro-prod-usecases__fade" aria-hidden="true"></span>
				<button
					type="button"
					class="testro-prod-usecases__cue"
					data-usecase-cue
					aria-label="<?php esc_attr_e( 'Scroll to more use cases', 'testro' ); ?>"
				>
					<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
				</button>
			</div>

			<?php foreach ( $tabs as $index => $tab ) : ?>
				<?php
				$tab_id = isset( $tab['id'] ) ? sanitize_title( $tab['id'] ) : 'tab-' . $index;
				$bullets = isset( $tab['bullets'] ) && is_array( $tab['bullets'] ) ? $tab['bullets'] : array();
				$illust  = isset( $tab['illustration'] ) ? (string) $tab['illustration'] : 'default';
				?>
				<div
					class="testro-prod-usecases__panel<?php echo 0 === $index ? ' is-active' : ''; ?>"
					role="tabpanel"
					id="<?php echo esc_attr( $uid . '-panel-' . $tab_id ); ?>"
					aria-labelledby="<?php echo esc_attr( $uid . '-tab-' . $tab_id ); ?>"
					data-feature-panel="<?php echo esc_attr( $tab_id ); ?>"
					<?php echo 0 === $index ? '' : ' hidden'; ?>
				>
					<div class="testro-prod-usecases__content" data-feature-animate>
						<h3 class="testro-prod-usecases__title gradient-text"><?php echo esc_html( $tab['title'] ); ?></h3>
						<?php if ( ! empty( $tab['description'] ) ) : ?>
							<p class="testro-prod-usecases__desc"><?php echo esc_html( $tab['description'] ); ?></p>
						<?php endif; ?>
						<?php if ( $bullets ) : ?>
							<ul class="testro-prod-usecases__bullets">
								<?php foreach ( $bullets as $bullet ) : ?>
									<li>
										<?php echo testro_icon( 'circle-check', array( 'size' => 18, 'class' => 'testro-prod-usecases__check' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
										<span><?php echo esc_html( $bullet ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>

					<div class="testro-prod-usecases__media" data-feature-animate aria-hidden="true">
						<div class="testro-prod-usecases__frame testro-prod-usecases__frame--<?php echo esc_attr( sanitize_html_class( $illust ) ); ?>">
							<div class="testro-prod-usecases__frame-chrome">
								<span></span><span></span><span></span>
							</div>
							<div class="testro-prod-usecases__frame-body">
								<div class="testro-prod-usecases__mock-row">
									<span class="testro-prod-usecases__mock-chip is-live"><?php esc_html_e( 'Running', 'testro' ); ?></span>
									<span class="testro-prod-usecases__mock-chip"><?php echo esc_html( $tab['label'] ); ?></span>
								</div>
								<div class="testro-prod-usecases__mock-steps">
									<span class="is-done"></span>
									<span class="is-done"></span>
									<span class="is-active"></span>
									<span></span>
								</div>
								<div class="testro-prod-usecases__mock-bars">
									<span style="--h:70%"></span>
									<span style="--h:92%"></span>
									<span style="--h:58%"></span>
									<span style="--h:84%"></span>
									<span style="--h:76%"></span>
								</div>
								<p class="testro-prod-usecases__mock-note"><?php echo esc_html( $mock_note ); ?></p>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
