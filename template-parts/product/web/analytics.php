<?php
/**
 * Web Testing — Web Testing Analytics (Framer u8nt0npb4).
 *
 * 4 Unified Testing Cards (gap 16, pad 24, r 18) with feature visuals.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'web-testing-analytics';

if ( ! $items ) {
	return;
}

$heading_id = $id . '-heading';
$suite_uri  = get_template_directory_uri() . '/assets/images/web/analytics-suite-rows.svg';
?>
<section class="testro-web-section testro-web-analytics" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<header class="testro-web-analytics__head">
			<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-analytics__title"><?php echo esc_html( testro_section_label_title( (string) $args['eyebrow'] ) ); ?></h2>
				<?php if ( ! empty( $args['title'] ) ) : ?>
					<p class="testro-web-analytics__intro"><?php echo esc_html( (string) $args['title'] ); ?></p>
				<?php endif; ?>
			<?php elseif ( ! empty( $args['title'] ) ) : ?>
				<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-analytics__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
			<?php endif; ?>
			<?php if ( ! empty( $args['intro'] ) ) : ?>
				<p class="testro-web-analytics__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-web-analytics__cards">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$image = isset( $item['image'] ) ? (string) $item['image'] : '';
				$alt   = isset( $item['title'] ) ? (string) $item['title'] : '';
				?>
				<li class="testro-web-analytics__card<?php echo '' !== $image ? ' testro-web-analytics__card--has-image' : ''; ?> testro-card--top-line">
					<?php if ( '' !== $image ) : ?>
						<span class="testro-web-analytics__visual testro-web-analytics__visual--image">
							<img
								src="<?php echo esc_url( $image ); ?>"
								alt="<?php echo esc_attr( $alt ); ?>"
								width="1024"
								height="682"
								loading="lazy"
								decoding="async"
							/>
						</span>
					<?php else : ?>
						<span class="testro-web-analytics__visual" aria-hidden="true" style="background-image: url('<?php echo esc_url( $suite_uri ); ?>');"></span>
					<?php endif; ?>
					<div class="testro-web-analytics__copy">
						<?php if ( ! empty( $item['title'] ) ) : ?>
							<h3 class="testro-web-analytics__card-title"><?php echo esc_html( (string) $item['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-web-analytics__card-desc"><?php echo esc_html( (string) $item['description'] ); ?></p>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
