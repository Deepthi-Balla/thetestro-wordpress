<?php
/**
 * Floating site navigation with enterprise mega menus.
 *
 * @package TestRo
 */

$home_url  = home_url( '/' );
$nav_menus = testro_get_nav_menus();
?>
<header class="testro-header" role="banner">
	<nav class="testro-nav" aria-label="<?php esc_attr_e( 'Primary', 'testro' ); ?>">
		<div class="testro-nav__inner">
			<a class="testro-nav__logo" href="<?php echo esc_url( $home_url ); ?>">
				<?php
				echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside helper
					'images/testro-logo.png',
					__( 'theTestRo', 'testro' ),
					array(
						'width'         => 140,
						'height'        => 40,
						'loading'       => false,
						'fetchpriority' => 'high',
						'decoding'      => 'async',
					)
				);
				?>
			</a>

			<button
				type="button"
				class="testro-nav__toggle"
				aria-expanded="false"
				aria-controls="testro-primary-menu"
				aria-label="<?php esc_attr_e( 'Open menu', 'testro' ); ?>"
			>
				<span class="testro-nav__toggle-bar" aria-hidden="true"></span>
				<span class="testro-nav__toggle-bar" aria-hidden="true"></span>
				<span class="testro-nav__toggle-bar" aria-hidden="true"></span>
			</button>

			<div id="testro-primary-menu" class="testro-nav__menu">
				<ul class="testro-nav__list">
					<?php foreach ( $nav_menus as $key => $menu ) : ?>
						<?php
						$has_panel = ! empty( $menu['panel'] );
						$panel_id  = $has_panel ? 'testro-mega-' . sanitize_html_class( $key ) : '';
						$is_active = testro_nav_menu_has_active( $menu );
						$item_class = 'testro-nav__item' . ( $has_panel ? ' testro-nav__item--has-mega' : '' ) . ( $is_active ? ' is-active' : '' );
						?>
						<li class="<?php echo esc_attr( $item_class ); ?>"<?php echo $has_panel ? ' data-mega="' . esc_attr( $key ) . '"' : ''; ?>>
							<?php if ( $has_panel ) : ?>
								<button
									type="button"
									class="testro-nav__trigger"
									aria-expanded="false"
									aria-controls="<?php echo esc_attr( $panel_id ); ?>"
									aria-haspopup="true"
									<?php echo $is_active ? ' data-nav-active="true"' : ''; ?>
								>
									<span class="testro-nav__trigger-label"><?php echo esc_html( $menu['label'] ); ?></span>
									<span class="testro-nav__chevron" aria-hidden="true">
										<?php echo testro_nav_icon( 'chevron' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?>
									</span>
								</button>
								<?php testro_render_mega_panel( $key, $menu ); ?>
							<?php else : ?>
								<a
									class="testro-nav__link<?php echo $is_active ? ' is-active' : ''; ?>"
									href="<?php echo esc_url( $menu['href'] ); ?>"
									<?php echo $is_active ? ' aria-current="page"' : ''; ?>
								>
									<?php echo esc_html( $menu['label'] ); ?>
								</a>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="testro-nav__actions">
					<?php
					get_template_part(
						'template-parts/components/primary-button',
						null,
						array(
							'label'      => __( 'Try theTestRo for free', 'testro' ),
							'href'       => $home_url . '#contact-form',
							'with_arrow' => false,
							'attrs'      => array(
								'class' => 'primary-button testro-btn testro-btn--primary',
							),
						)
					);
					?>
				</div>
			</div>
		</div>
	</nav>
</header>
