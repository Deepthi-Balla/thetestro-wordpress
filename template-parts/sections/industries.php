<?php
/**
 * Industries section — industry solution cards.
 *
 * @package TestRo
 */

$data   = testro_get_industries();
$groups = isset( $data['groups'] ) && is_array( $data['groups'] ) ? $data['groups'] : array();

if ( ! $groups ) {
	return;
}

$group_keys = array_keys( $groups );
$first_key  = $group_keys[0];
$headline   = isset( $data['headline'] ) ? (string) $data['headline'] : '';
$show_tabs  = count( $groups ) > 1;
?>
<section class="testro-industries linear-background" id="industries" aria-labelledby="industries-heading" data-industries>
	<div class="testro-container">
		<header class="testro-section-header testro-industries__header">
			<h4 id="industries-heading" class="gradient-text main-headings"><?php echo esc_html( $data['title'] ); ?></h4>
			<?php if ( '' !== $headline ) : ?>
				<p class="sub-text testro-industries__headline"><?php echo esc_html( $headline ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( $show_tabs ) : ?>
			<div class="testro-industries__tabs" role="tablist" aria-label="<?php esc_attr_e( 'Industry categories', 'testro' ); ?>">
				<?php foreach ( $groups as $key => $group ) : ?>
					<?php
					$tab_id    = 'industries-tab-' . sanitize_html_class( $key );
					$panel_id  = 'industries-panel-' . sanitize_html_class( $key );
					$is_active = ( $key === $first_key );
					?>
					<button
						type="button"
						class="testro-industries__tab<?php echo $is_active ? ' is-active' : ''; ?>"
						id="<?php echo esc_attr( $tab_id ); ?>"
						role="tab"
						aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
						data-industries-tab="<?php echo esc_attr( $key ); ?>"
						tabindex="<?php echo $is_active ? '0' : '-1'; ?>"
					>
						<?php echo esc_html( $group['label'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php foreach ( $groups as $key => $group ) : ?>
			<?php
			$tab_id    = 'industries-tab-' . sanitize_html_class( $key );
			$panel_id  = 'industries-panel-' . sanitize_html_class( $key );
			$is_active = ( $key === $first_key );
			$items     = isset( $group['items'] ) && is_array( $group['items'] ) ? $group['items'] : array();
			?>
			<div
				class="testro-industries__panel<?php echo $is_active ? ' is-active' : ''; ?>"
				id="<?php echo esc_attr( $panel_id ); ?>"
				role="tabpanel"
				<?php echo $show_tabs ? 'aria-labelledby="' . esc_attr( $tab_id ) . '"' : 'aria-labelledby="industries-heading"'; ?>
				data-industries-panel="<?php echo esc_attr( $key ); ?>"
				<?php echo $is_active ? '' : 'hidden'; ?>
			>
				<ul class="testro-industries__grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<a class="testro-industries__card" href="<?php echo esc_url( $item['href'] ); ?>">
								<span class="testro-industries__icon" aria-hidden="true">
									<?php echo testro_nav_icon( isset( $item['icon'] ) ? $item['icon'] : 'spark' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
								<span class="testro-industries__body">
									<span class="testro-industries__label"><strong><?php echo esc_html( $item['label'] ); ?></strong><?php if ( ! empty( $item['description'] ) ) : ?> — <?php echo esc_html( $item['description'] ); ?><?php endif; ?></span>
								</span>
								<span class="testro-industries__arrow" aria-hidden="true">
									<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endforeach; ?>
	</div>
</section>
