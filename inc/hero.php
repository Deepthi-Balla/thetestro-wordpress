<?php
/**
 * Common hero helpers — normalize product/page args and build slots.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the product hero dashboard visual markup.
 *
 * @param string $visual Visual key.
 * @return string
 */
function testro_render_product_hero_visual( $visual ) {
	$visual = (string) $visual;
	if ( '' === $visual ) {
		return '';
	}

	ob_start();
	get_template_part(
		'template-parts/product/hero-visual-body',
		null,
		array(
			'visual' => $visual,
		)
	);
	return (string) ob_get_clean();
}

/**
 * Build optional HTML appended below the hero content column.
 *
 * @param array $args     Product hero args.
 * @param bool  $is_split Whether the hero uses a split layout.
 * @return string
 */
function testro_build_hero_after_content( $args, $is_split ) {
	$html = '';

	$subtitle = isset( $args['subtitle'] ) ? (string) $args['subtitle'] : '';
	if ( $is_split && '' !== $subtitle ) {
		$html .= '<p class="testro-hero__desc testro-prod-hero__sub">' . esc_html( $subtitle ) . '</p>';
	}

	$subtitle_extra = isset( $args['subtitle_extra'] ) ? (string) $args['subtitle_extra'] : '';
	if ( '' !== $subtitle_extra ) {
		$html .= '<p class="testro-hero__desc testro-prod-hero__sub">' . esc_html( $subtitle_extra ) . '</p>';
	}

	$badges = isset( $args['badges'] ) && is_array( $args['badges'] ) ? $args['badges'] : array();
	if ( $badges ) {
		$html .= '<ul class="testro-prod-hero__badges" aria-label="' . esc_attr__( 'Platform highlights', 'testro' ) . '">';
		foreach ( $badges as $badge ) {
			$html .= '<li class="testro-prod-hero__badge">';
			$html .= testro_icon( 'circle-check', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
			$html .= esc_html( (string) $badge );
			$html .= '</li>';
		}
		$html .= '</ul>';
	}

	$metrics = isset( $args['metrics'] ) && is_array( $args['metrics'] ) ? $args['metrics'] : array();
	if ( $metrics ) {
		$html .= '<ul class="testro-prod-hero__metrics" aria-label="' . esc_attr__( 'Key metrics', 'testro' ) . '">';
		foreach ( $metrics as $metric ) {
			$html .= '<li class="testro-prod-hero__metric">';
			if ( ! empty( $metric['icon'] ) ) {
				$html .= '<span class="testro-prod-hero__metric-icon" aria-hidden="true">';
				$html .= testro_icon( $metric['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
				$html .= '</span>';
			}
			$html .= '<span class="testro-prod-hero__metric-text">';
			$html .= '<span class="testro-prod-hero__metric-value">' . esc_html( isset( $metric['value'] ) ? (string) $metric['value'] : '' ) . '</span>';
			$html .= '<span class="testro-prod-hero__metric-label">' . esc_html( isset( $metric['label'] ) ? (string) $metric['label'] : '' ) . '</span>';
			$html .= '</span></li>';
		}
		$html .= '</ul>';
	}

	if ( ! empty( $args['logos'] ) && function_exists( 'testro_get_clients' ) ) {
		$hero_clients = array_slice( testro_get_clients(), 0, 6 );
		if ( $hero_clients ) {
			$html .= '<div class="testro-prod-hero__logos">';
			$html .= '<p class="testro-prod-hero__logos-label">' . esc_html__( 'Trusted By', 'testro' ) . '</p>';
			$html .= '<ul class="testro-prod-hero__logos-list" aria-label="' . esc_attr__( 'Trusted by leading companies', 'testro' ) . '">';
			foreach ( $hero_clients as $hero_client ) {
				$html .= '<li>';
				$html .= testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside helper.
					$hero_client['logo'],
					isset( $hero_client['name'] ) ? (string) $hero_client['name'] : '',
					array(
						'width'   => 88,
						'height'  => 32,
						'class'   => 'testro-prod-hero__logo',
						'loading' => 'lazy',
					)
				);
				$html .= '</li>';
			}
			$html .= '</ul></div>';
		}
	}

	return $html;
}

/**
 * Map legacy product hero args to the common hero component.
 *
 * @param array $args Product hero args.
 * @return array
 */
function testro_normalize_product_hero_args( $args ) {
	$args    = is_array( $args ) ? $args : array();
	$layout  = isset( $args['layout'] ) ? (string) $args['layout'] : '';
	$visual  = isset( $args['visual'] ) ? (string) $args['visual'] : '';
	$is_split = ( 'split' === $layout && '' !== $visual );

	$hero_args = array(
		'title'       => isset( $args['title'] ) ? (string) $args['title'] : '',
		'eyebrow'     => isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '',
		'heading_id'  => 'product-hero-title',
		'class'       => 'testro-prod-hero',
		'breadcrumbs' => ! empty( $args['breadcrumbs'] ),
		'layout'      => $is_split ? 'split' : 'centered',
		'variant'     => 'page',
	);

	if ( $is_split ) {
		$hero_args['visual_html'] = testro_render_product_hero_visual( $visual );
	} else {
		$hero_args['description'] = isset( $args['subtitle'] ) ? (string) $args['subtitle'] : '';
	}

	$actions = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
	if ( function_exists( 'testro_filter_hero_actions' ) ) {
		$actions = testro_filter_hero_actions( $actions );
	}
	if ( $actions ) {
		$hero_args['actions'] = $actions;
	}

	$after_content = testro_build_hero_after_content( $args, $is_split );
	if ( '' !== $after_content ) {
		$hero_args['after_content'] = $after_content;
	}

	return $hero_args;
}
