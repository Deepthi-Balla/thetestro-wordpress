<?php
/**
 * Convert uploaded and generated images to WebP under 100 KB.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'TESTRO_WEBP_MAX_BYTES' ) ) {
	define( 'TESTRO_WEBP_MAX_BYTES', 100 * 1024 );
}

/**
 * Whether a GIF file is animated.
 *
 * @param string $file Absolute path.
 * @return bool
 */
function testro_is_animated_gif( $file ) {
	if ( ! is_readable( $file ) ) {
		return false;
	}

	$fh = fopen( $file, 'rb' );
	if ( ! $fh ) {
		return false;
	}

	$count = 0;
	$chunk = '';
	while ( ! feof( $fh ) && $count < 2 ) {
		$chunk .= fread( $fh, 1024 * 100 );
		$count  = preg_match_all( '/\x00\x21\xF9\x04.{4}\x00(\x2C|\x21)/s', $chunk, $m );
		if ( strlen( $chunk ) > 1024 * 1024 ) {
			break;
		}
	}
	fclose( $fh );

	return $count > 1;
}

/**
 * Encode an image as WebP and keep the file at or below 100 KB.
 *
 * @param string $source Absolute source path.
 * @param string $dest   Absolute destination .webp path.
 * @return string|\WP_Error Destination path on success.
 */
function testro_encode_webp_under_limit( $source, $dest ) {
	if ( ! function_exists( 'wp_get_image_editor' ) ) {
		return new WP_Error( 'no_editor', 'Image editor unavailable.' );
	}

	$max       = TESTRO_WEBP_MAX_BYTES;
	$qualities = array( 82, 74, 66, 58, 50, 42, 35 );
	$scales    = array( 1.0, 0.9, 0.8, 0.7, 0.6, 0.5 );

	$tmp_dir = trailingslashit( dirname( $dest ) );
	if ( ! wp_mkdir_p( $tmp_dir ) ) {
		return new WP_Error( 'mkdir', 'Unable to create destination directory.' );
	}

	$last_path = '';
	foreach ( $scales as $scale ) {
		foreach ( $qualities as $quality ) {
			$editor = wp_get_image_editor( $source );
			if ( is_wp_error( $editor ) ) {
				return $editor;
			}

			if ( $scale < 1.0 ) {
				$size = $editor->get_size();
				if ( ! empty( $size['width'] ) && $size['width'] > 320 ) {
					$width = max( 320, (int) floor( $size['width'] * $scale ) );
					$editor->resize( $width, null );
				}
			}

			if ( method_exists( $editor, 'set_quality' ) ) {
				$editor->set_quality( $quality );
			}

			$saved = $editor->save( $dest, 'image/webp' );
			if ( is_wp_error( $saved ) ) {
				continue;
			}

			$path = isset( $saved['path'] ) ? $saved['path'] : $dest;
			$last_path = $path;
			if ( is_readable( $path ) && filesize( $path ) <= $max ) {
				return $path;
			}
		}
	}

	if ( $last_path && is_readable( $last_path ) ) {
		return $last_path;
	}

	return new WP_Error( 'webp_encode', 'Unable to encode WebP under the size limit.' );
}

/**
 * Convert a newly uploaded raster image to optimized WebP.
 *
 * @param array $upload Upload data (file, url, type).
 * @return array
 */
function testro_convert_upload_to_webp( $upload ) {
	if ( ! empty( $upload['error'] ) || empty( $upload['file'] ) || empty( $upload['type'] ) ) {
		return $upload;
	}

	$convertible = array( 'image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp' );
	if ( ! in_array( $upload['type'], $convertible, true ) ) {
		return $upload;
	}

	$file = $upload['file'];
	if ( 'image/gif' === $upload['type'] && testro_is_animated_gif( $file ) ) {
		return $upload;
	}

	if ( preg_match( '/\.webp$/i', $file ) && is_readable( $file ) && filesize( $file ) <= TESTRO_WEBP_MAX_BYTES ) {
		return $upload;
	}

	$dest = preg_replace( '/\.(jpe?g|png|gif|webp)$/i', '.webp', $file );
	if ( ! is_string( $dest ) || '' === $dest ) {
		return $upload;
	}

	if ( 0 === strcasecmp( $dest, $file ) ) {
		$dest = $file . '.tmp.webp';
	}

	$result = testro_encode_webp_under_limit( $file, $dest );
	if ( is_wp_error( $result ) ) {
		return $upload;
	}

	$final = $result;
	if ( preg_match( '/\.tmp\.webp$/i', $final ) ) {
		if ( ! @rename( $final, $file ) ) { // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			@unlink( $final ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			return $upload;
		}
		$final = $file;
	}

	if ( $final !== $file && file_exists( $file ) ) {
		@unlink( $file ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
	}

	$upload['file'] = $final;
	$upload['type'] = 'image/webp';
	if ( ! empty( $upload['url'] ) ) {
		$upload['url'] = preg_replace( '/\.(jpe?g|png|gif|webp)$/i', '.webp', $upload['url'] );
	}

	return $upload;
}
add_filter( 'wp_handle_upload', 'testro_convert_upload_to_webp' );

/**
 * Generate image sizes as WebP.
 *
 * @param array $formats Mime map.
 * @return array
 */
function testro_image_editor_output_format( $formats ) {
	$formats['image/jpeg'] = 'image/webp';
	$formats['image/png']  = 'image/webp';
	$formats['image/gif']  = 'image/webp';
	return $formats;
}
add_filter( 'image_editor_output_format', 'testro_image_editor_output_format' );

/**
 * Default WebP quality for the image editor.
 *
 * @param int    $quality Quality.
 * @param string $mime    Mime type.
 * @return int
 */
function testro_webp_editor_quality( $quality, $mime = '' ) {
	if ( 'image/webp' === $mime ) {
		return 80;
	}
	return $quality;
}
add_filter( 'wp_editor_set_quality', 'testro_webp_editor_quality', 10, 2 );

/**
 * Recompress attachment derivatives that still exceed 100 KB.
 *
 * @param array $metadata      Attachment metadata.
 * @param int   $attachment_id Attachment ID.
 * @return array
 */
function testro_optimize_attachment_metadata( $metadata, $attachment_id ) {
	$file = get_attached_file( $attachment_id );
	if ( ! $file || ! is_readable( $file ) ) {
		return $metadata;
	}

	$base_dir = trailingslashit( dirname( $file ) );
	$paths    = array( $file );

	if ( ! empty( $metadata['sizes'] ) && is_array( $metadata['sizes'] ) ) {
		foreach ( $metadata['sizes'] as $size ) {
			if ( ! empty( $size['file'] ) ) {
				$paths[] = $base_dir . $size['file'];
			}
		}
	}

	foreach ( array_unique( $paths ) as $path ) {
		if ( ! is_readable( $path ) || filesize( $path ) <= TESTRO_WEBP_MAX_BYTES ) {
			continue;
		}
		if ( ! preg_match( '/\.webp$/i', $path ) ) {
			continue;
		}

		$tmp = $path . '.opt.webp';
		$out = testro_encode_webp_under_limit( $path, $tmp );
		if ( is_wp_error( $out ) || ! is_readable( $out ) ) {
			continue;
		}

		if ( $out !== $path ) {
			@rename( $out, $path ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			if ( file_exists( $tmp ) && $tmp !== $path ) {
				@unlink( $tmp ); // phpcs:ignore WordPress.PHP.NoSilencedErrors.Discouraged
			}
		}
	}

	return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'testro_optimize_attachment_metadata', 20, 2 );
