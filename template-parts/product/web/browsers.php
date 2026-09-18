<?php
/**
 * Web Testing — Execute Tests Across Every Browser (Framer vRpmMrK4S).
 *
 * Browser Coverage grid gap 16. Cards: vertical, pad 24, gap 16, r 16.
 * Framer component uses Chrome Icon (IconNode h=34) on every card.
 * Title Sora 500 20/1.55 #212121; body Inter 500 14/1.55 #212121.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'execute-across-browsers';

if ( ! $items ) {
	return;
}

$heading_id    = $id . '-heading';
$chrome_uri    = get_template_directory_uri() . '/assets/images/web/chrome-icon.png';
?>
<section class="testro-web-section testro-web-browsers" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<?php if ( ! empty( $args['title'] ) ) : ?>
			<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-browsers__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
		<?php endif; ?>
		<?php if ( ! empty( $args['intro'] ) ) : ?>
			<p class="testro-web-browsers__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
		<?php endif; ?>

		<ul class="testro-web-browsers__grid">
			<?php foreach ( $items as $item ) : ?>
				<?php
				$title = isset( $item['title'] ) ? (string) $item['title'] : '';
				$desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
				?>
				<li class="testro-web-browsers__card testro-card--top-line">
					<span class="testro-web-browsers__icon" aria-hidden="true">
						<img src="<?php echo esc_url( $chrome_uri ); ?>" alt="" width="34" height="34" loading="lazy" decoding="async" />
					</span>
					<div class="testro-web-browsers__copy">
						<?php if ( '' !== $title ) : ?>
							<strong class="testro-web-browsers__card-title"><?php echo esc_html( $title ); ?></strong>
						<?php endif; ?>
						<?php if ( '' !== $desc ) : ?>
							<span class="testro-web-browsers__card-desc"><?php echo esc_html( $desc ); ?></span>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
