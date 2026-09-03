<?php
/**
 * Home hero visual — stage with floating feature tags.
 *
 * Expected $args (optional):
 * - tags (array[]) Each: label (string), tone ('light'|'accent'), position key.
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();
$tags = isset( $args['tags'] ) && is_array( $args['tags'] ) ? $args['tags'] : array(
	array(
		'label'    => 'AI Authoring',
		'tone'     => 'light',
		'position' => 'top-left',
	),
	array(
		'label'    => 'No-Code Tests',
		'tone'     => 'light',
		'position' => 'bottom-left',
	),
	array(
		'label'    => 'Self-Healing',
		'tone'     => 'accent',
		'position' => 'top-right',
	),
	array(
		'label'    => 'CI/CD Ready',
		'tone'     => 'accent',
		'position' => 'bottom-right',
	),
);
?>
<div class="testro-hero__visual-stage" aria-hidden="true">
	<ul class="testro-hero__float-tags">
		<?php foreach ( $tags as $tag ) : ?>
			<?php
			$label    = isset( $tag['label'] ) ? (string) $tag['label'] : '';
			$tone     = isset( $tag['tone'] ) && 'accent' === $tag['tone'] ? 'accent' : 'light';
			$position = isset( $tag['position'] ) ? sanitize_html_class( (string) $tag['position'] ) : '';
			if ( '' === $label ) {
				continue;
			}
			?>
			<li class="testro-hero__float-tag testro-hero__float-tag--<?php echo esc_attr( $tone ); ?> testro-hero__float-tag--<?php echo esc_attr( $position ); ?>">
				<?php echo esc_html( $label ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
