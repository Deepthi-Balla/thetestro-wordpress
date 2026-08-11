#!/usr/bin/env php
<?php
/**
 * Build minified CSS/JS for the TestRo theme.
 *
 * Usage: php bin/build-assets.php
 *
 * @package TestRo
 */

$root = dirname( __DIR__ );
$css  = $root . '/assets/css/main.css';
$js   = $root . '/assets/js/main.js';

if ( ! is_readable( $css ) || ! is_readable( $js ) ) {
	fwrite( STDERR, "Missing main.css or main.js\n" );
	exit( 1 );
}

/**
 * Conservative CSS minify (comments + excess whitespace).
 *
 * Does not strip spaces around "+", so calc(100% + 1rem) stays valid.
 * (Adjacent-sibling "A+B" remains valid without spaces.)
 *
 * @param string $css CSS source.
 * @return string
 */
function testro_minify_css( $css ) {
	$css = preg_replace( '!/\*.*?\*/!s', '', $css );
	$css = preg_replace( '/\s+/', ' ', $css );
	$css = preg_replace( '/\s*([{};:,>~])\s*/', '$1', $css );
	$css = str_replace( ';}', '}', $css );
	return trim( $css );
}

/**
 * Conservative JS minify — strip block/line comments and collapse safe whitespace.
 *
 * @param string $js JS source.
 * @return string
 */
function testro_minify_js( $js ) {
	// Protect strings by tokenizing roughly.
	$out     = '';
	$len     = strlen( $js );
	$i       = 0;
	$in_str  = null;
	$in_tmpl = false;
	$escaped = false;

	while ( $i < $len ) {
		$ch = $js[ $i ];
		$nx = ( $i + 1 < $len ) ? $js[ $i + 1 ] : '';

		if ( null !== $in_str ) {
			$out .= $ch;
			if ( $escaped ) {
				$escaped = false;
			} elseif ( '\\' === $ch ) {
				$escaped = true;
			} elseif ( $ch === $in_str ) {
				$in_str = null;
			}
			$i++;
			continue;
		}

		if ( $in_tmpl ) {
			$out .= $ch;
			if ( $escaped ) {
				$escaped = false;
			} elseif ( '\\' === $ch ) {
				$escaped = true;
			} elseif ( '`' === $ch ) {
				$in_tmpl = false;
			}
			$i++;
			continue;
		}

		// Line comment.
		if ( '/' === $ch && '/' === $nx ) {
			$i += 2;
			while ( $i < $len && "\n" !== $js[ $i ] && "\r" !== $js[ $i ] ) {
				$i++;
			}
			continue;
		}

		// Block comment.
		if ( '/' === $ch && '*' === $nx ) {
			$i += 2;
			while ( $i + 1 < $len && ! ( '*' === $js[ $i ] && '/' === $js[ $i + 1 ] ) ) {
				$i++;
			}
			$i += 2;
			continue;
		}

		if ( "'" === $ch || '"' === $ch ) {
			$in_str = $ch;
			$out   .= $ch;
			$i++;
			continue;
		}

		if ( '`' === $ch ) {
			$in_tmpl = true;
			$out    .= $ch;
			$i++;
			continue;
		}

		$out .= $ch;
		$i++;
	}

	$out = preg_replace( "/[ \t]+/", ' ', $out );
	$out = preg_replace( "/\n\s*/", "\n", $out );
	$out = preg_replace( "/\n{2,}/", "\n", $out );
	return trim( $out );
}

$css_min = testro_minify_css( file_get_contents( $css ) );
$js_min  = testro_minify_js( file_get_contents( $js ) );

file_put_contents( $root . '/assets/css/main.min.css', $css_min . "\n" );
file_put_contents( $root . '/assets/js/main.min.js', $js_min . "\n" );

printf(
	"Wrote main.min.css (%d → %d bytes)\nWrote main.min.js (%d → %d bytes)\n",
	filesize( $css ),
	strlen( $css_min ),
	filesize( $js ),
	strlen( $js_min )
);
