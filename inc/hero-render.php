<?php
/**
 * Framer hero redesign helpers (Platform Opening v2).
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Default trust-row items from Framer hero designs.
 *
 * @return array<int, array{icon:string,label:string,tone?:string}>
 */
function testro_hero_default_trust_items() {
	return array(
		array(
			'icon'  => 'check-img',
			'label' => __( 'No credit card required', 'testro' ),
		),
		array(
			'icon'  => 'check-img',
			'label' => __( 'No tokens', 'testro' ),
		),
		array(
			'icon'  => 'zap',
			'label' => __( 'Start testing in minutes', 'testro' ),
			'tone'  => 'blue',
		),
	);
}

/**
 * Flatten title_lines into a plain string for SEO/accessibility fallbacks.
 *
 * @param array $title_lines Nested title segment lines.
 * @return string
 */
function testro_hero_plain_title( $title_lines ) {
	if ( ! is_array( $title_lines ) || ! $title_lines ) {
		return '';
	}

	$parts = array();
	foreach ( $title_lines as $line ) {
		if ( ! is_array( $line ) ) {
			continue;
		}
		$line_text = array();
		foreach ( $line as $segment ) {
			if ( is_array( $segment ) && isset( $segment['text'] ) && '' !== trim( (string) $segment['text'] ) ) {
				$line_text[] = trim( (string) $segment['text'] );
			}
		}
		if ( $line_text ) {
			$parts[] = implode( ' ', $line_text );
		}
	}

	return trim( implode( ' ', $parts ) );
}

/**
 * Render a multi-line Framer hero title with mixed gradient/dark segments.
 *
 * @param array  $title_lines Title lines of segments.
 * @param string $heading_id  Element id for the h1.
 * @param string $plain_title Optional plain title override.
 */
function testro_render_hero_title( $title_lines, $heading_id = 'hero-heading', $plain_title = '' ) {
	$title_lines = is_array( $title_lines ) ? $title_lines : array();
	$plain       = '' !== $plain_title ? $plain_title : testro_hero_plain_title( $title_lines );

	if ( ! $title_lines ) {
		if ( '' === $plain ) {
			return;
		}
		printf(
			'<h1 id="%1$s" class="testro-hero-v2__title">%2$s</h1>',
			esc_attr( $heading_id ),
			esc_html( $plain )
		);
		return;
	}

	echo '<h1 id="' . esc_attr( $heading_id ) . '" class="testro-hero-v2__title">';
	foreach ( $title_lines as $line ) {
		if ( ! is_array( $line ) || ! $line ) {
			continue;
		}
		echo '<span class="testro-hero-v2__title-line">';
		foreach ( $line as $segment ) {
			if ( ! is_array( $segment ) || ! isset( $segment['text'] ) || '' === (string) $segment['text'] ) {
				continue;
			}
			$tone = isset( $segment['tone'] ) ? (string) $segment['tone'] : 'dark';
			printf(
				'<span class="testro-hero-v2__title-seg testro-hero-v2__title-seg--%1$s">%2$s</span>',
				esc_attr( $tone ),
				esc_html( (string) $segment['text'] )
			);
		}
		echo '</span>';
	}
	echo '</h1>';
}

/**
 * Render body copy blocks with mixed muted/strong runs.
 *
 * @param array $blocks Array of paragraph run arrays.
 */
function testro_render_hero_body( $blocks ) {
	if ( ! is_array( $blocks ) || ! $blocks ) {
		return;
	}

	echo '<div class="testro-hero-v2__body">';
	foreach ( $blocks as $block ) {
		if ( ! is_array( $block ) || ! $block ) {
			continue;
		}
		echo '<p class="testro-hero-v2__sub">';
		foreach ( $block as $run ) {
			if ( ! is_array( $run ) || ! isset( $run['text'] ) ) {
				continue;
			}
			$tone = isset( $run['tone'] ) ? (string) $run['tone'] : 'muted';
			printf(
				'<span class="testro-hero-v2__run testro-hero-v2__run--%1$s">%2$s</span>',
				esc_attr( $tone ),
				esc_html( (string) $run['text'] )
			);
		}
		echo '</p>';
	}
	echo '</div>';
}

/**
 * Render icon + text feature lines (No-Code / Web / TD styles).
 *
 * @param array  $lines   Feature lines.
 * @param string $variant Optional variant: '' | 'panel'.
 */
function testro_render_hero_feature_lines( $lines, $variant = '' ) {
	if ( ! is_array( $lines ) || ! $lines ) {
		return;
	}

	$classes = 'testro-hero-v2__features';
	if ( 'panel' === $variant ) {
		$classes .= ' testro-hero-v2__features--panel';
	}

	echo '<ul class="' . esc_attr( $classes ) . '">';
	foreach ( $lines as $line ) {
		if ( ! is_array( $line ) || empty( $line['text'] ) ) {
			continue;
		}
		$icon  = isset( $line['icon'] ) ? (string) $line['icon'] : 'zap';
		$badge = ! empty( $line['badge'] );
		echo '<li class="testro-hero-v2__feature">';
		if ( 'target-img' === $icon ) {
			printf(
				'<img class="testro-hero-v2__feature-img" src="%s" alt="" width="25" height="24" decoding="async" />',
				esc_url( testro_asset( 'images/hero/icon-target.png' ) )
			);
		} elseif ( 'bolt-img' === $icon ) {
			printf(
				'<img class="testro-hero-v2__feature-img" src="%s" alt="" width="25" height="24" decoding="async" />',
				esc_url( testro_asset( 'images/hero/icon-bolt.png' ) )
			);
		} elseif ( $badge ) {
			echo '<span class="testro-hero-v2__feature-badge" aria-hidden="true">' . testro_icon( $icon, array( 'size' => 14 ) ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			$icon_size = ( 'panel' === $variant ) ? 22 : 20;
			echo '<span class="testro-hero-v2__feature-icon" aria-hidden="true">' . testro_icon( $icon, array( 'size' => $icon_size ) ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		echo '<span class="testro-hero-v2__feature-text">' . esc_html( (string) $line['text'] ) . '</span>';
		echo '</li>';
	}
	echo '</ul>';
}

/**
 * Render AI-style highlight chips.
 *
 * @param array $items Highlight items.
 */
function testro_render_hero_highlights( $items ) {
	if ( ! is_array( $items ) || ! $items ) {
		return;
	}

	echo '<ul class="testro-hero-v2__highlights">';
	foreach ( $items as $item ) {
		if ( ! is_array( $item ) || empty( $item['label'] ) ) {
			continue;
		}
		$icon = isset( $item['icon'] ) ? (string) $item['icon'] : 'rocket';
		$tone = isset( $item['tone'] ) ? (string) $item['tone'] : 'blue';
		printf(
			'<li class="testro-hero-v2__highlight"><span class="testro-hero-v2__highlight-icon testro-hero-v2__highlight-icon--%1$s" aria-hidden="true">%2$s</span><span class="testro-hero-v2__highlight-label">%3$s</span></li>',
			esc_attr( $tone ),
			testro_icon( $icon, array( 'size' => 20 ) ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			esc_html( (string) $item['label'] )
		);
	}
	echo '</ul>';
}

/**
 * Render API workflow step cards.
 *
 * @param string $intro Optional intro heading.
 * @param array  $steps Step cards.
 * @param string $outro Optional outro copy.
 */
function testro_render_hero_workflow( $intro, $steps, $outro = '' ) {
	if ( ( ! is_array( $steps ) || ! $steps ) && '' === $intro && '' === $outro ) {
		return;
	}

	echo '<div class="testro-hero-v2__workflow">';
	if ( '' !== $intro ) {
		echo '<p class="testro-hero-v2__workflow-intro">' . esc_html( $intro ) . '</p>';
	}
	if ( is_array( $steps ) && $steps ) {
		echo '<ol class="testro-hero-v2__steps">';
		$count = count( $steps );
		foreach ( $steps as $index => $step ) {
			if ( ! is_array( $step ) || empty( $step['label'] ) ) {
				continue;
			}
			$icon = isset( $step['icon'] ) ? (string) $step['icon'] : 'file-text';
			echo '<li class="testro-hero-v2__step">';
			echo '<span class="testro-hero-v2__step-icon" aria-hidden="true">' . testro_icon( $icon, array( 'size' => 20 ) ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<span class="testro-hero-v2__step-label">' . esc_html( (string) $step['label'] ) . '</span>';
			echo '</li>';
			if ( $index < $count - 1 ) {
				echo '<li class="testro-hero-v2__step-arrow" aria-hidden="true">' . testro_icon( 'arrow-circle-right', array( 'size' => 18 ) ) . '</li>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
		echo '</ol>';
	}
	if ( '' !== $outro ) {
		echo '<p class="testro-hero-v2__workflow-outro">' . esc_html( $outro ) . '</p>';
	}
	echo '</div>';
}

/**
 * Render Framer trust/assurance pill row.
 *
 * @param array|true|null $items Trust items or true for defaults.
 */
function testro_render_hero_trust( $items = true ) {
	if ( false === $items || null === $items ) {
		return;
	}
	if ( true === $items ) {
		$items = testro_hero_default_trust_items();
	}
	if ( ! is_array( $items ) || ! $items ) {
		return;
	}

	echo '<ul class="testro-hero-v2__trust">';
	foreach ( $items as $item ) {
		if ( ! is_array( $item ) || empty( $item['label'] ) ) {
			continue;
		}
		$icon = isset( $item['icon'] ) ? (string) $item['icon'] : 'check-img';
		$tone = isset( $item['tone'] ) ? (string) $item['tone'] : '';
		echo '<li class="testro-hero-v2__trust-item">';
		if ( 'check-img' === $icon ) {
			printf(
				'<img class="testro-hero-v2__trust-img" src="%s" alt="" width="16" height="16" decoding="async" />',
				esc_url( testro_asset( 'images/hero/icon-check.png' ) )
			);
		} else {
			$icon_size  = ( 'zap' === $icon ) ? 20 : 16;
			$icon_class = 'testro-hero-v2__trust-icon' . ( '' !== $tone ? ' testro-hero-v2__trust-icon--' . $tone : '' );
			echo '<span class="' . esc_attr( $icon_class ) . '" aria-hidden="true">' . testro_icon( $icon, array( 'size' => $icon_size ) ) . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		echo '<span class="testro-hero-v2__trust-label">' . esc_html( (string) $item['label'] ) . '</span>';
		echo '</li>';
	}
	echo '</ul>';
}
