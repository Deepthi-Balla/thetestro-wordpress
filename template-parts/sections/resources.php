<?php
/**
 * Resources section — blog + resource cards.
 *
 * @package TestRo
 */

$data     = testro_get_resources();
$items    = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();
$eyebrow  = isset( $data['eyebrow'] ) ? (string) $data['eyebrow'] : '';
$headline = isset( $data['headline'] ) ? (string) $data['headline'] : '';
$intro    = isset( $data['intro'] ) ? (string) $data['intro'] : '';
$cta      = isset( $data['cta'] ) && is_array( $data['cta'] ) ? $data['cta'] : array();

if ( ! $items ) {
	return;
}
?>
<section class="testro-resources" id="resources" aria-labelledby="resources-heading">
	<div class="testro-resources__inner">
		<header class="testro-resources__intro" data-reveal>
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="testro-resources__label"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $headline ) : ?>
				<h2 id="resources-heading" class="testro-resources__heading"><?php echo esc_html( $headline ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $intro ) : ?>
				<p class="testro-resources__desc"><?php echo esc_html( $intro ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-resources__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$item_href  = isset( $item['href'] ) ? (string) $item['href'] : '';
				$item_label = isset( $item['label'] ) ? (string) $item['label'] : ( isset( $item['meta'] ) ? (string) $item['meta'] : '' );
				$item_title = isset( $item['title'] ) ? (string) $item['title'] : '';
				$item_desc  = isset( $item['description'] ) ? (string) $item['description'] : '';
				$item_image = isset( $item['image'] ) ? (string) $item['image'] : '';
				$item_alt   = isset( $item['image_alt'] ) ? (string) $item['image_alt'] : $item_title;
				?>
				<li class="testro-resources__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 55 ) ); ?>ms">
					<article class="testro-resources__card">
						<a class="testro-resources__card-link" href="<?php echo esc_url( $item_href ); ?>">
							<span class="testro-resources__media<?php echo '' === $item_image ? ' testro-resources__media--placeholder' : ''; ?>">
								<?php if ( '' !== $item_image ) : ?>
									<?php
									echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										$item_image,
										$item_alt,
										array(
											'class'   => 'testro-resources__image',
											'loading' => 'lazy',
										)
									);
									?>
								<?php else : ?>
									<span class="testro-resources__placeholder" aria-hidden="true"></span>
								<?php endif; ?>
							</span>
							<span class="testro-resources__body">
								<?php if ( '' !== $item_label ) : ?>
									<span class="testro-resources__card-label"><?php echo esc_html( $item_label ); ?></span>
								<?php endif; ?>
								<?php if ( '' !== $item_title ) : ?>
									<h3 class="testro-resources__card-title"><?php echo esc_html( $item_title ); ?></h3>
								<?php endif; ?>
								<?php if ( '' !== $item_desc ) : ?>
									<p class="testro-resources__card-desc"><?php echo esc_html( $item_desc ); ?></p>
								<?php endif; ?>
								<span class="testro-resources__read-more"><?php esc_html_e( 'Read more →', 'testro' ); ?></span>
							</span>
						</a>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php if ( ! empty( $cta['label'] ) && ! empty( $cta['href'] ) ) : ?>
			<div class="testro-resources__cta">
				<a class="testro-resources__cta-btn" href="<?php echo esc_url( $cta['href'] ); ?>">
					<?php echo esc_html( $cta['label'] ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>
