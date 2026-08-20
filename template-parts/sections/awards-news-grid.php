<?php
/**
 * Awards & News category grid — semantic article cards.
 *
 * Expected $args:
 * - id    (string) Section anchor id.
 * - title (string) H2 section heading.
 * - intro (string) Optional supporting copy.
 * - items (array) Each: title, description, href, date?, image?, image_alt?, cta_label?
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( (string) $args['id'] ) : '';
$title = isset( $args['title'] ) ? (string) $args['title'] : '';

if ( ! $items || '' === $title ) {
	return;
}

$intro      = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$heading_id = $id ? $id . '-heading' : 'awards-news-section-heading';
?>
<section
	class="testro-prod-section testro-blog-listing testro-awards-news"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	aria-labelledby="<?php echo esc_attr( $heading_id ); ?>"
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'title'         => $title,
				'intro'         => $intro,
				'heading_id'    => $heading_id,
				'heading_level' => 2,
			)
		);
		?>

		<ul class="testro-blog-listing__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
				$item_href  = isset( $item['href'] ) ? (string) $item['href'] : '';
				if ( '' === $item_title || '' === $item_href ) {
					continue;
				}

				$item_desc   = isset( $item['description'] ) ? (string) $item['description'] : '';
				$item_date   = isset( $item['date'] ) ? (string) $item['date'] : '';
				$item_image  = isset( $item['image'] ) ? (string) $item['image'] : '';
				$image_alt   = isset( $item['image_alt'] ) ? (string) $item['image_alt'] : $item_title;
				$date_iso    = isset( $item['date_iso'] ) ? (string) $item['date_iso'] : '';
				?>
				<li class="testro-blog-listing__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
					<article class="testro-blog-listing__card">
						<a class="testro-blog-listing__card-link" href="<?php echo esc_url( $item_href ); ?>">
							<?php if ( '' !== $item_image && function_exists( 'testro_picture' ) ) : ?>
								<span class="testro-blog-listing__thumb">
									<?php
									echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										$item_image,
										$image_alt,
										array(
											'class'   => 'testro-blog-listing__image',
											'loading' => 'lazy',
										)
									);
									?>
								</span>
							<?php else : ?>
								<span class="testro-blog-listing__thumb testro-blog-listing__thumb--fallback" aria-hidden="true">
									<span class="testro-blog-listing__thumb-orb"></span>
								</span>
							<?php endif; ?>
							<span class="testro-blog-listing__card-body">
								<h3 class="testro-blog-listing__card-title"><?php echo esc_html( $item_title ); ?></h3>
								<?php if ( '' !== $item_desc ) : ?>
									<p class="testro-blog-listing__card-excerpt"><?php echo esc_html( $item_desc ); ?></p>
								<?php endif; ?>
								<?php if ( '' !== $item_date ) : ?>
									<span class="testro-blog-listing__meta">
										<time <?php echo $date_iso ? 'datetime="' . esc_attr( $date_iso ) . '"' : ''; ?>>
											<?php echo esc_html( $item_date ); ?>
										</time>
									</span>
								<?php endif; ?>
							</span>
						</a>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
