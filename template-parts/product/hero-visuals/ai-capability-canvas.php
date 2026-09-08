<?php
/**
 * AI Capability Canvas — Framer Platform Opening visual.
 * Reuses the homepage hero canvas chip pattern with product-page badges.
 *
 * @package TestRo
 */

$badges = array(
	array(
		'label' => __( 'AI Authoring', 'testro' ),
		'tone'  => 'light',
	),
	array(
		'label' => __( 'Self-Healing', 'testro' ),
		'tone'  => 'dark',
	),
	array(
		'label' => __( 'No-Code Tests', 'testro' ),
		'tone'  => 'light',
	),
	array(
		'label' => __( 'CI/CD Ready', 'testro' ),
		'tone'  => 'dark',
	),
);

if ( function_exists( 'testro_get_product_page' ) ) {
	$product = testro_get_product_page();
	if ( empty( $product['hero']['canvas_badges'] ) || ! is_array( $product['hero']['canvas_badges'] ) ) {
		$product = testro_get_product_page( 'ai-test-automation' );
	}
	if ( ! empty( $product['hero']['canvas_badges'] ) && is_array( $product['hero']['canvas_badges'] ) ) {
		$badges = $product['hero']['canvas_badges'];
	}
}
?>
<div class="testro-hero-canvas testro-prod-hero-canvas" aria-hidden="true">
	<div class="testro-hero-canvas__grid"></div>
	<ul class="testro-hero-canvas__chips">
		<?php foreach ( $badges as $badge ) : ?>
			<?php
			$label = isset( $badge['label'] ) ? (string) $badge['label'] : '';
			$tone  = isset( $badge['tone'] ) ? (string) $badge['tone'] : 'light';
			if ( '' === $label ) {
				continue;
			}
			?>
			<li class="testro-hero-canvas__chip testro-hero-canvas__chip--<?php echo esc_attr( $tone ); ?>">
				<?php echo esc_html( $label ); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
