<?php
/**
 * Shared inline SVG icon library (Lucide-style, 24x24 stroke icons).
 *
 * Icons are inlined rather than loaded from a sprite so product pages stay
 * render-blocking free and keep the theme's zero-dependency asset policy.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registered icon path data keyed by icon name.
 *
 * @return array<string, string>
 */
function testro_icon_paths() {
	static $icons = null;

	if ( null !== $icons ) {
		return $icons;
	}

	$icons = array(
		'sparkles'      => '<path d="M9.9 15.5A2 2 0 0 0 8.5 14.1L2.4 12.5a.5.5 0 0 1 0-1L8.5 9.9A2 2 0 0 0 9.9 8.5l1.6-6.1a.5.5 0 0 1 1 0l1.6 6.1a2 2 0 0 0 1.4 1.4l6.1 1.6a.5.5 0 0 1 0 1l-6.1 1.6a2 2 0 0 0-1.4 1.4l-1.6 6.1a.5.5 0 0 1-1 0z"/><path d="M20 3v4M22 5h-4M4 17v2M5 18H3"/>',
		'message-text'  => '<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M7 9h10M7 13h6"/>',
		'wand'          => '<path d="m15 4 5 5"/><path d="M20.5 9.5 9.4 20.6a2 2 0 0 1-2.8 0l-3.2-3.2a2 2 0 0 1 0-2.8L14.5 3.5a2 2 0 0 1 2.8 0l3.2 3.2a2 2 0 0 1 0 2.8Z"/><path d="M4 4h.01M19 15h.01M4.5 11.5h.01"/>',
		'user-check'    => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="m16 11 2 2 4-4"/>',
		'pen-square'    => '<path d="M12 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.4 2.6a2 2 0 0 1 3 3L12 15l-4 1 1-4z"/>',
		'scan-eye'      => '<path d="M3 7V5a2 2 0 0 1 2-2h2M17 3h2a2 2 0 0 1 2 2v2M21 17v2a2 2 0 0 1-2 2h-2M7 21H5a2 2 0 0 1-2-2v-2"/><circle cx="12" cy="12" r="1"/><path d="M18.9 12c-.7 1.4-2.9 4-6.9 4s-6.2-2.6-6.9-4c.7-1.4 2.9-4 6.9-4s6.2 2.6 6.9 4Z"/>',
		'heart-pulse'   => '<path d="M19 14c1.5-1.5 3-3.3 3-5.5A5.5 5.5 0 0 0 12 5.4 5.5 5.5 0 0 0 2 8.5c0 2.2 1.5 4 3 5.5l7 7Z"/><path d="M3.2 12H7l2-3 3 6 2-3h4.8"/>',
		'crosshair'     => '<circle cx="12" cy="12" r="8"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/><circle cx="12" cy="12" r="2.5"/>',
		'database'      => '<ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M20 5v6c0 1.7-3.6 3-8 3s-8-1.3-8-3V5"/><path d="M20 11v6c0 1.7-3.6 3-8 3s-8-1.3-8-3v-6"/>',
		'stethoscope'   => '<path d="M4 3v6a5 5 0 0 0 10 0V3"/><path d="M4 3H2.5M14 3h1.5"/><path d="M9 14v2a5 5 0 0 0 10 0v-1.5"/><circle cx="19.5" cy="12" r="2.5"/>',
		'zap'           => '<path d="M4 14a1 1 0 0 1-.8-1.6l9.9-10.2a.5.5 0 0 1 .9.5l-2 6a1 1 0 0 0 1 1.3h7a1 1 0 0 1 .8 1.6l-9.9 10.2a.5.5 0 0 1-.9-.5l2-6A1 1 0 0 0 11 14z"/>',
		'browsers'      => '<rect x="2" y="4" width="14" height="11" rx="2"/><path d="M2 8h14"/><path d="M8 19h12a1 1 0 0 0 1-1v-8a2 2 0 0 0-2-2h-1"/>',
		'layers-api'    => '<path d="M7 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h3M17 8h3a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-3"/><path d="M9 12h6"/>',
		'calendar-sync' => '<rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 9h18M8 2v4M16 2v4"/><path d="M14.5 15a2.5 2.5 0 0 0-4.4-1.6M9.5 16a2.5 2.5 0 0 0 4.4 1.6"/>',
		'cloud'         => '<path d="M17.5 19a4.5 4.5 0 0 0 .9-8.9 6 6 0 0 0-11.7 1.3A3.9 3.9 0 0 0 7 19z"/>',
		'rocket'        => '<path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.9.7-2.2-.1-3a2.1 2.1 0 0 0-2.9 0Z"/><path d="M12 15 9 12a13 13 0 0 1 3-8 10 10 0 0 1 8-4 10 10 0 0 1-4 8 13 13 0 0 1-4 7Z"/><path d="M9 12H5s.4-2.4 1.5-3.5C7.7 7.3 12 8 12 8M12 15v4s2.4-.4 3.5-1.5C16.7 16.3 16 12 16 12"/>',
		'alert-octagon' => '<path d="M8.6 2.6h6.8L21.4 8.6v6.8L15.4 21.4H8.6L2.6 15.4V8.6z"/><path d="M12 8v4.5M12 16h.01"/>',
		'microscope'    => '<path d="M6 18h8M3 22h18"/><path d="M14 22a7 7 0 1 0 0-14h-1"/><path d="M9 14h2M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2z"/><path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/>',
		'wrench'        => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.8-3.8a6 6 0 0 1-7.9 7.9l-6.9 6.9a2.1 2.1 0 0 1-3-3l6.9-6.9a6 6 0 0 1 7.9-7.9z"/>',
		'trending-up'   => '<path d="M16 7h6v6"/><path d="m22 7-8.5 8.5-5-5L2 17"/>',
		'filter-check'  => '<path d="M3 4h18l-7 8v7l-4 2v-9z"/>',
		'activity'      => '<path d="M22 12h-4l-3 9L9 3l-3 9H2"/>',
		'gauge'         => '<path d="m12 14 4-4"/><path d="M3.3 19a10 10 0 1 1 17.4 0"/>',
		'target'        => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
		'badge-check'   => '<path d="M3.9 8.5a3 3 0 0 1 1.7-2.9l1.8-.8.9-1.8a3 3 0 0 1 5.4 0l.9 1.8 1.8.8a3 3 0 0 1 1.7 2.9l-.2 2 .2 2a3 3 0 0 1-1.7 2.9l-1.8.8-.9 1.8a3 3 0 0 1-5.4 0l-.9-1.8-1.8-.8a3 3 0 0 1-1.7-2.9l.2-2z"/><path d="m9 12 2 2 4-4"/>',
		'layout-grid'   => '<rect x="3" y="3" width="7" height="7" rx="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5"/>',
		'folder-tree'   => '<path d="M3 4h4l2 2h5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Z"/><path d="M9 13h4l2 2h5a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1Z"/>',
		'puzzle'        => '<path d="M15.4 3.6a2 2 0 0 1 2.8 2.8l-.6.6H21v4h-1.2a2 2 0 0 0 0 4H21v4h-4v-1.2a2 2 0 0 0-4 0V21H9v-3.4l-.6.6a2 2 0 0 1-2.8-2.8l.6-.6H3V9h3.4l-.6-.6A2 2 0 0 1 8.6 5.6l.6.6V3h4v3.2l.6-.6z"/>',
		'server'        => '<rect x="2.5" y="3.5" width="19" height="7" rx="2"/><rect x="2.5" y="13.5" width="19" height="7" rx="2"/><path d="M6.5 7h.01M6.5 17h.01M11 7h5M11 17h5"/>',
		'shield-lock'   => '<path d="M20 13c0 5-3.5 7.5-7.7 9a1 1 0 0 1-.6 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.2-2.7a1.2 1.2 0 0 1 1.6 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M10 12.5h4v3h-4z"/><path d="M11 12.5v-1a1 1 0 0 1 2 0v1"/>',
		'infinity'      => '<path d="M6 16a4 4 0 1 1 0-8c3 0 5 8 8 8a4 4 0 1 0 0-8c-3 0-5 8-8 8Z"/>',
		'git-branch'    => '<path d="M6 3v12"/><circle cx="18" cy="6" r="3"/><circle cx="6" cy="18" r="3"/><path d="M18 9a9 9 0 0 1-9 9"/>',
		'clock'         => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
		'shield-check'  => '<path d="M20 13c0 5-3.5 7.5-7.7 9a1 1 0 0 1-.6 0C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.2-2.7a1.2 1.2 0 0 1 1.6 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/>',
		'refresh'       => '<path d="M3 12a9 9 0 0 1 15.3-6.4L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-15.3 6.4L3 16"/><path d="M3 21v-5h5"/>',
		'code'          => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
		'coins'         => '<circle cx="9" cy="9" r="6"/><path d="M15.5 3.6a6 6 0 0 1 0 16.8"/><path d="M6.5 15a6 6 0 0 0 9 5.4"/>',
		'check'         => '<polyline points="20 6 9 17 4 12"/>',
		'minus'         => '<path d="M5 12h14"/>',
		'close'         => '<path d="M18 6 6 18M6 6l12 12"/>',
		'arrow-right'   => '<path d="M5 12h14M13 6l6 6-6 6"/>',
		'arrow-down'    => '<path d="M12 5v14M6 13l6 6 6-6"/>',
		'circle-check'  => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
		'plug'          => '<path d="M9 2v6M15 2v6"/><path d="M6 8h12v3a6 6 0 0 1-12 0z"/><path d="M12 17v5"/>',
		'chart-bar'     => '<path d="M4 19V5M4 19h16"/><path d="M8 15v-4M12 15V8M16 15v-6"/>',
		'pie-chart'     => '<path d="M21.2 15.9A10 10 0 1 1 8.1 2.8"/><path d="M22 12A10 10 0 0 0 12 2v10z"/>',
		'file-text'     => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/><path d="M8 13h8M8 17h6"/>',
		'video'         => '<rect x="2" y="6" width="14" height="12" rx="2"/><path d="m16 10 4.6-2.3a1 1 0 0 1 1.4.9v6.8a1 1 0 0 1-1.4.9L16 14"/>',
		'download'      => '<path d="M12 3v12"/><path d="m7 11 5 5 5-5"/><path d="M4 20h16"/>',
		'retail'        => '<path d="M4 9h16l-1.2 10.2A2 2 0 0 1 16.8 21H7.2a2 2 0 0 1-2-1.8L4 9z"/><path d="M8 9V7a4 4 0 0 1 8 0v2"/>',
		'smartphone'    => '<rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/>',
		'package'       => '<path d="M16.5 9.4 7.5 4.2M21 16V8a2 2 0 0 0-1-1.7l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.7l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><path d="M3.3 7 12 12l8.7-5M12 22V12"/>',
		'map-pin'       => '<path d="M20 10c0 4.4-4.5 9.2-7.4 11.7a1 1 0 0 1-1.2 0C8.5 19.2 4 14.4 4 10a8 8 0 1 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
	);

	return $icons;
}

/**
 * Render an inline SVG icon.
 *
 * @param string $name  Icon key from testro_icon_paths().
 * @param array  $args  Optional. size (int), class (string), stroke (float).
 * @return string Safe SVG markup, or empty string when the icon is unknown.
 */
function testro_icon( $name, $args = array() ) {
	$icons = testro_icon_paths();
	$name  = (string) $name;

	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}

	$size   = isset( $args['size'] ) ? (int) $args['size'] : 24;
	$stroke = isset( $args['stroke'] ) ? (float) $args['stroke'] : 1.75;
	$class  = isset( $args['class'] ) ? trim( (string) $args['class'] ) : '';

	return sprintf(
		'<svg xmlns="http://www.w3.org/2000/svg" width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="%2$s" stroke-linecap="round" stroke-linejoin="round"%3$s aria-hidden="true" focusable="false">%4$s</svg>',
		$size,
		esc_attr( (string) $stroke ),
		$class ? ' class="' . esc_attr( $class ) . '"' : '',
		$icons[ $name ] // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static path data.
	);
}
