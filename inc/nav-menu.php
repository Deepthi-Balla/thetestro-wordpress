<?php
/**
 * Primary navigation mega menu data and helpers.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Build an absolute theme URL for a page slug path.
 *
 * @param string $path Path relative to home, e.g. 'ai-test-automation'.
 * @return string
 */
function testro_nav_url( $path = '' ) {
	$path = ltrim( (string) $path, '/' );
	if ( '' === $path ) {
		return home_url( '/' );
	}
	return home_url( '/' . $path . '/' );
}

/**
 * Inline SVG icon for mega menu items.
 *
 * @param string $name Icon key.
 * @return string Escaped-safe SVG markup.
 */
function testro_nav_icon( $name ) {
	$icons = array(
		'spark'       => '<path d="M12 3v3M12 18v3M3 12h3M18 12h3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1"/><circle cx="12" cy="12" r="3"/>',
		'blocks'      => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
		'globe'       => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 2.8 2.5 15.2 0 18M12 3c-2.5 2.8-2.5 15.2 0 18"/>',
		'api'         => '<path d="M7 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h3M17 8h3a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-3M9 12h6"/>',
		'browsers'    => '<rect x="3" y="4" width="14" height="11" rx="2"/><path d="M7 19h14a0 0 0 0 0 0 0v-9a2 2 0 0 0-2-2h-1"/><path d="M7 8h6"/>',
		'board'       => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M9 9v11M15 9v11"/>',
		'heal'        => '<path d="M12 21s-7-4.4-7-10a4 4 0 0 1 7-2.5A4 4 0 0 1 19 11c0 5.6-7 10-7 10z"/>',
		'wand'        => '<path d="M15 4l5 5M4 20l8.5-8.5M13 6l5 5M9.5 14.5 7 17"/><path d="M11 4l1 2 2 1-2 1-1 2-1-2-2-1 2-1z"/>',
		'code'        => '<path d="M8 8l-4 4 4 4M16 8l4 4-4 4M13 6l-2 12"/>',
		'play'        => '<circle cx="12" cy="12" r="9"/><path d="M10 8.5v7l6-3.5z"/>',
		'cicd'        => '<path d="M4 12h4l2-4 4 8 2-4h4"/><circle cx="4" cy="12" r="1.5"/><circle cx="20" cy="12" r="1.5"/>',
		'export'      => '<path d="M12 3v12M8 7l4-4 4 4M5 14v4a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-4"/>',
		'chart'       => '<path d="M4 19V5M4 19h16"/><path d="M8 15v-4M12 15V8M16 15v-6"/>',
		'retail'      => '<path d="M4 9h16l-1.2 10.2A2 2 0 0 1 16.8 21H7.2a2 2 0 0 1-2-1.8L4 9z"/><path d="M8 9V7a4 4 0 0 1 8 0v2"/>',
		'health'      => '<path d="M12 21c-4.5-3.3-7-6.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 3.6-2.5 6.7-7 10z"/><path d="M12 9v5M9.5 11.5h5"/>',
		'bank'        => '<path d="M3 10l9-6 9 6M5 10v8M19 10v8M3 18h18M9 14h6"/>',
		'travel'      => '<path d="M10 20l2-8 8-2-8-2-2-8-2 8-8 2 8 2z"/>',
		'insurance'   => '<path d="M12 3l8 4v5c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V7l8-4z"/>',
		'erp'         => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><path d="M14 17h7M17.5 14v7"/>',
		'dynamics'    => '<path d="M4 7h10v10H4zM14 10h6v7h-6z"/>',
		'salesforce'  => '<path d="M8.5 16a3.5 3.5 0 1 1 1.2-6.8A4 4 0 0 1 17 11a3 3 0 1 1 .3 5.9H8.7"/>',
		'oracle'      => '<ellipse cx="12" cy="12" rx="8" ry="5"/><path d="M4 12h16"/>',
		'sap'         => '<rect x="3" y="6" width="18" height="12" rx="2"/><path d="M7 12h10M12 9v6"/>',
		'workday'     => '<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
		'servicenow'  => '<path d="M4 14a5 5 0 0 1 9.6-2A4 4 0 1 1 16 18H6a4 4 0 0 1-2-7.5"/>',
		'regression'  => '<path d="M4 12a8 8 0 1 0 2.3-5.7M4 4v4h4"/>',
		'smoke'       => '<path d="M8 16c0-2 2-3 2-5s-1.5-3-1.5-4.5S10 4 12 4s3.5 1 3.5 2.5S14 9 14 11s2 3 2 5a4 4 0 0 1-8 0z"/>',
		'sanity'      => '<circle cx="12" cy="12" r="9"/><path d="M8 12l2.5 2.5L16 9"/>',
		'integration' => '<path d="M8 7H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h3M16 7h3a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-3M9 12h6"/>',
		'functional'  => '<path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
		'e2e'         => '<path d="M4 12h4M16 12h4M9 8l-3 4 3 4M15 8l3 4-3 4"/>',
		'backend'     => '<rect x="3" y="4" width="18" height="6" rx="1.5"/><rect x="3" y="14" width="18" height="6" rx="1.5"/><path d="M7 7h.01M7 17h.01"/>',
		'frontend'    => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 14h8"/>',
		'blog'        => '<path d="M4 5h12a2 2 0 0 1 2 2v12H6a2 2 0 0 1-2-2V5z"/><path d="M8 9h6M8 13h4M18 7v12a2 2 0 0 0 2-2V9"/>',
		'case'        => '<path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M4 7h16v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7z"/>',
		'webinar'     => '<rect x="3" y="5" width="18" height="12" rx="2"/><path d="M8 21h8M12 17v4"/>',
		'about'       => '<circle cx="12" cy="8" r="3.5"/><path d="M5 20a7 7 0 0 1 14 0"/>',
		'contact'     => '<path d="M4 6h16v12H4z"/><path d="M4 8l8 6 8-6"/>',
		'partners'    => '<path d="M8 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM16 14a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"/><path d="M4 20a4 4 0 0 1 8 0M12 20a4 4 0 0 1 8 0"/>',
		'awards'      => '<path d="M8 4h8v5a4 4 0 0 1-8 0V4z"/><path d="M8 6H5a1 1 0 0 0-1 1v1a4 4 0 0 0 4 4M16 6h3a1 1 0 0 1 1 1v1a4 4 0 0 1-4 4M10 13v3l2 4 2-4v-3"/>',
		'compare'     => '<path d="M8 3v18M16 3v18M3 8h5M16 16h5M3 16h5M16 8h5"/>',
		'usecases'    => '<path d="M4 6h16M4 12h16M4 18h10"/><circle cx="18" cy="18" r="2"/>',
		'chevron'     => '<path d="M6 9l6 6 6-6"/>',
	);

	$path = isset( $icons[ $name ] ) ? $icons[ $name ] : $icons['spark'];

	return '<svg class="testro-mega__icon-svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $path . '</svg>';
}

/**
 * Primary navigation mega menu configuration.
 *
 * @return array<string, array<string, mixed>>
 */
function testro_get_nav_menus() {
	return array(
		'products'  => array(
			'label'  => __( 'Products', 'testro' ),
			'href'   => testro_nav_url( 'ai-test-automation' ),
			'panel'  => 'products',
			'layout' => 'two-col',
			'columns'=> array(
				array(
					'title' => __( 'Products', 'testro' ),
					'items' => array(
						array(
							'label' => __( 'AI Test Automation', 'testro' ),
							'href'  => testro_nav_url( 'ai-test-automation' ),
							'icon'  => 'spark',
						),
						array(
							'label' => __( 'No-Code Test Automation', 'testro' ),
							'href'  => testro_nav_url( 'no-code-test-automation' ),
							'icon'  => 'blocks',
						),
						array(
							'label' => __( 'Web Testing', 'testro' ),
							'href'  => testro_nav_url( 'automated-web-application-testing' ),
							'icon'  => 'globe',
						),
						array(
							'label' => __( 'API Testing', 'testro' ),
							'href'  => testro_nav_url( 'automated-api-testing' ),
							'icon'  => 'api',
						),
						array(
							'label' => __( 'Cross-Browser Testing', 'testro' ),
							'href'  => testro_nav_url( 'automated-cross-browser-testing-tool' ),
							'icon'  => 'browsers',
						),
					),
				),
				array(
					'title' => __( 'Features', 'testro' ),
					'items' => array(
						array(
							'label' => __( 'AI Test Management Tool', 'testro' ),
							'href'  => testro_nav_url( 'test-management-software' ),
							'icon'  => 'board',
						),
						array(
							'label' => __( 'Self-Healing Tests', 'testro' ),
							'href'  => testro_nav_url( 'self-healing-test-automation-tool' ),
							'icon'  => 'heal',
						),
						array(
							'label' => __( 'Test Development', 'testro' ),
							'href'  => testro_nav_url( 'test-development' ),
							'icon'  => 'code',
						),
						array(
							'label' => __( 'Test Execution', 'testro' ),
							'href'  => testro_nav_url( 'test-lab' ),
							'icon'  => 'play',
						),
						array(
							'label' => __( 'CI/CD Integration', 'testro' ),
							'href'  => testro_nav_url( 'ci-cd-integration' ),
							'icon'  => 'cicd',
						),
						array(
							'label' => __( 'Playwright Test Automation', 'testro' ),
							'href'  => testro_nav_url( 'playwright-test-automation' ),
							'icon'  => 'export',
						),
						array(
							'label' => __( 'Reports & Analytics', 'testro' ),
							'href'  => testro_nav_url( 'reporting-analytics' ),
							'icon'  => 'chart',
						),
					),
				),
			),
		),
		'solutions' => array(
			'label'  => __( 'Solutions', 'testro' ),
			'href'   => testro_nav_url( 'use-cases' ),
			'panel'  => 'solutions',
			'layout' => 'solutions',
			'columns'=> array(
				array(
					'title' => __( 'By Industry', 'testro' ),
					'items' => array(
						array( 'label' => __( 'Retail', 'testro' ), 'href' => testro_nav_url( 'retail-ecommerce' ), 'icon' => 'retail' ),
						array( 'label' => __( 'Healthcare', 'testro' ), 'href' => testro_nav_url( 'healthcare' ), 'icon' => 'health' ),
						array( 'label' => __( 'Banking & Finance', 'testro' ), 'href' => testro_nav_url( 'banking-finance' ), 'icon' => 'bank' ),
						array( 'label' => __( 'Travel & Hospitality', 'testro' ), 'href' => testro_nav_url( 'travel-and-hospitality' ), 'icon' => 'travel' ),
						array( 'label' => __( 'Insurance', 'testro' ), 'href' => testro_nav_url( 'insurance' ), 'icon' => 'insurance' ),
					),
				),
				array(
					'title' => __( 'ERP Applications', 'testro' ),
					'items' => array(
						array( 'label' => __( 'Microsoft Dynamics 365', 'testro' ), 'href' => testro_nav_url( 'microsoft-dynamics-365-test-automation' ), 'icon' => 'dynamics' ),
						array( 'label' => __( 'Salesforce Testing', 'testro' ), 'href' => testro_nav_url( 'salesforce-test-automation' ), 'icon' => 'salesforce' ),
						array( 'label' => __( 'Oracle Testing', 'testro' ), 'href' => testro_nav_url( 'oracle-testing' ), 'icon' => 'oracle' ),
						array( 'label' => __( 'SAP Testing', 'testro' ), 'href' => testro_nav_url( 'sap-testing' ), 'icon' => 'sap' ),
						array( 'label' => __( 'Workday Testing', 'testro' ), 'href' => testro_nav_url( 'workday-testing' ), 'icon' => 'workday' ),
						array( 'label' => __( 'ServiceNow Testing', 'testro' ), 'href' => testro_nav_url( 'servicenow-testing' ), 'icon' => 'servicenow' ),
					),
				),
				array(
					'title' => __( 'By Use Case', 'testro' ),
					'items' => array(
						array( 'label' => __( 'Regression Testing', 'testro' ), 'href' => testro_nav_url( 'regression-test-automation' ), 'icon' => 'regression' ),
						array( 'label' => __( 'Sanity Testing', 'testro' ), 'href' => testro_nav_url( 'ai-automated-sanity-testing' ), 'icon' => 'sanity' ),
						array( 'label' => __( 'Integration Testing', 'testro' ), 'href' => testro_nav_url( 'ai-powered-integration-testing' ), 'icon' => 'integration' ),
						array( 'label' => __( 'Functional Testing', 'testro' ), 'href' => testro_nav_url( 'automated-functional-testing' ), 'icon' => 'functional' ),
						array( 'label' => __( 'End-to-End Testing', 'testro' ), 'href' => testro_nav_url( 'end-to-end-testing' ), 'icon' => 'e2e' ),
						array( 'label' => __( 'See All', 'testro' ), 'href' => testro_nav_url( 'use-cases' ), 'icon' => 'usecases' ),
					),
				),
			),
		),
		'resources' => array(
			'label'  => __( 'Resources', 'testro' ),
			'href'   => testro_nav_url( 'blog' ),
			'panel'  => 'resources',
			'layout' => 'two-col',
			'columns'=> array(
				array(
					'title' => __( 'Explore & Learn', 'testro' ),
					'items' => array(
						array(
							'label' => __( 'Blog', 'testro' ),
							'href'  => testro_nav_url( 'blog' ),
							'icon'  => 'blog',
						),
						array(
							'label' => __( 'Case Studies', 'testro' ),
							'href'  => testro_nav_url( 'case-studies' ),
							'icon'  => 'case',
						),
						array(
							'label' => __( 'Webinars', 'testro' ),
							'href'  => testro_nav_url( 'webinars' ),
							'icon'  => 'webinar',
						),
					),
				),
				array(
					'title' => __( 'Why theTestRo', 'testro' ),
					'items' => array(
						array(
							'label' => __( 'Why theTestRo', 'testro' ),
							'href'  => testro_nav_url( 'why-choose-thetestro' ),
							'icon'  => 'about',
						),
						array(
							'label' => __( 'Contact Us', 'testro' ),
							'href'  => testro_nav_url( 'contact-us' ),
							'icon'  => 'contact',
						),
						array(
							'label' => __( 'Partners', 'testro' ),
							'href'  => testro_nav_url( 'partners' ),
							'icon'  => 'partners',
						),
						array(
							'label' => __( 'Awards & News', 'testro' ),
							'href'  => testro_nav_url( 'awards-news' ),
							'icon'  => 'awards',
						),
						array(
							'label' => __( 'Compare Tools', 'testro' ),
							'href'  => testro_nav_url( 'compare-test-automation-tools' ),
							'icon'  => 'compare',
						),
					),
				),
			),
		),
		'pricing'   => array(
			'label' => __( 'Pricing', 'testro' ),
			'href'  => testro_nav_url( 'pricing' ),
			'panel' => null,
		),
	);
}

/**
 * Normalize a URL or path to a comparable trailingslashit path.
 *
 * @param string $url Absolute URL or path.
 * @return string
 */
function testro_nav_normalize_path( $url ) {
	$path = wp_parse_url( (string) $url, PHP_URL_PATH );
	if ( ! is_string( $path ) || '' === $path ) {
		$path = '/';
	}
	return untrailingslashit( $path );
}

/**
 * Whether a nav href matches the current page path.
 *
 * @param string $href Absolute URL.
 * @return bool
 */
function testro_nav_is_active_href( $href ) {
	if ( empty( $href ) || '#' === substr( (string) $href, 0, 1 ) ) {
		return false;
	}

	$target = testro_nav_normalize_path( $href );
	$home   = testro_nav_normalize_path( home_url( '/' ) );

	// Front page: only match home itself.
	if ( is_front_page() ) {
		return $target === $home || '/' === $target || '' === $target;
	}

	$current = '';
	if ( is_singular() ) {
		$current = testro_nav_normalize_path( get_permalink() );
	} elseif ( is_home() && ! is_front_page() ) {
		$posts_page = (int) get_option( 'page_for_posts' );
		$current    = $posts_page ? testro_nav_normalize_path( get_permalink( $posts_page ) ) : '';
	} else {
		global $wp;
		$request = isset( $wp->request ) ? (string) $wp->request : '';
		$current = testro_nav_normalize_path( home_url( user_trailingslashit( $request ) ) );
	}

	if ( '' === $current || $current === $home ) {
		return false;
	}

	return $target === $current;
}

/**
 * Whether any link in a top-level menu matches the current page.
 *
 * @param array<string, mixed> $menu Menu config.
 * @return bool
 */
function testro_nav_menu_has_active( $menu ) {
	if ( ! empty( $menu['columns'] ) && is_array( $menu['columns'] ) ) {
		foreach ( $menu['columns'] as $column ) {
			if ( empty( $column['items'] ) || ! is_array( $column['items'] ) ) {
				continue;
			}
			foreach ( $column['items'] as $item ) {
				if ( ! empty( $item['href'] ) && testro_nav_is_active_href( $item['href'] ) ) {
					return true;
				}
			}
		}
	}

	if ( ! empty( $menu['href'] ) && empty( $menu['panel'] ) ) {
		return testro_nav_is_active_href( $menu['href'] );
	}

	return false;
}

/**
 * Render a single mega menu link item.
 *
 * @param array $item Item config.
 */
function testro_render_mega_item( $item ) {
	$label = isset( $item['label'] ) ? $item['label'] : '';
	$href  = isset( $item['href'] ) ? $item['href'] : '#';
	$icon  = isset( $item['icon'] ) ? $item['icon'] : 'spark';
	$desc  = isset( $item['desc'] ) ? $item['desc'] : '';
	$is_active = testro_nav_is_active_href( $href );
	$class = 'testro-mega__link' . ( $desc ? ' testro-mega__link--rich' : '' ) . ( $is_active ? ' is-active' : '' );
	?>
	<a
		class="<?php echo esc_attr( $class ); ?>"
		href="<?php echo esc_url( $href ); ?>"
		<?php echo $is_active ? ' aria-current="page"' : ''; ?>
	>
		<span class="testro-mega__icon" aria-hidden="true">
			<?php echo testro_nav_icon( $icon ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?>
		</span>
		<span class="testro-mega__text">
			<span class="testro-mega__label"><?php echo esc_html( $label ); ?></span>
			<?php if ( $desc ) : ?>
				<span class="testro-mega__desc"><?php echo esc_html( $desc ); ?></span>
			<?php endif; ?>
		</span>
	</a>
	<?php
}

/**
 * Render a mega menu panel for a top-level item.
 *
 * @param string               $key   Menu key.
 * @param array<string, mixed> $menu  Menu config.
 */
function testro_render_mega_panel( $key, $menu ) {
	if ( empty( $menu['panel'] ) || empty( $menu['columns'] ) ) {
		return;
	}

	$layout = isset( $menu['layout'] ) ? $menu['layout'] : 'two-col';
	$panel_id = 'testro-mega-' . sanitize_html_class( $key );
	?>
	<div
		class="testro-mega testro-mega--<?php echo esc_attr( $layout ); ?>"
		id="<?php echo esc_attr( $panel_id ); ?>"
		role="region"
		aria-label="<?php echo esc_attr( sprintf( /* translators: %s: menu label */ __( '%s menu', 'testro' ), $menu['label'] ) ); ?>"
		aria-hidden="true"
		hidden
	>
		<div class="testro-mega__inner">
			<?php foreach ( $menu['columns'] as $column ) : ?>
				<div class="testro-mega__col">
					<?php if ( ! empty( $column['title'] ) ) : ?>
						<p class="testro-mega__heading"><?php echo esc_html( $column['title'] ); ?></p>
					<?php endif; ?>
					<ul class="testro-mega__list">
						<?php foreach ( $column['items'] as $item ) : ?>
							<li class="testro-mega__item">
								<?php testro_render_mega_item( $item ); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}
