<?php
/**
 * Web Testing — Validate Every UI Changes (Framer Gj9D5TyHM).
 *
 * Section Intro is visible:false in Framer — do not render intro.
 * Browser Coverage: 2×2 stack of rows, gap 24; cards h=143, horizontal
 * left visual slot + copy (title includes em dash from Framer controls).
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'validate-ui-changes';

if ( ! $items ) {
	return;
}

$heading_id = $id . '-heading';
$suite_uri  = get_template_directory_uri() . '/assets/images/web/analytics-suite-rows.svg';
?>
<section class="testro-web-section testro-web-validate" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<?php if ( ! empty( $args['title'] ) ) : ?>
			<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-validate__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
		<?php endif; ?>

		<ul class="testro-web-validate__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<li class="testro-web-validate__card">
					<span class="testro-web-validate__slot" aria-hidden="true" style="background-image: url('<?php echo esc_url( $suite_uri ); ?>');"></span>
					<div class="testro-web-validate__copy">
						<p class="testro-web-validate__card-text">
							<?php if ( ! empty( $item['title'] ) ) : ?>
								<strong class="testro-web-validate__card-title"><?php echo esc_html( (string) $item['title'] ); ?></strong>
							<?php endif; ?>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<span class="testro-web-validate__card-desc"><?php echo esc_html( (string) $item['description'] ); ?></span>
							<?php endif; ?>
						</p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
