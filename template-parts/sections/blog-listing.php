<?php
/**
 * Blog post listing grid (featured + cards).
 *
 * Optional $args:
 * - show_featured (bool) Highlight the first post. Default true on main blog home.
 * - eyebrow / title / intro (string) Optional section header above the grid.
 *
 * Uses the main query loop.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$show_featured = array_key_exists( 'show_featured', $args ) ? (bool) $args['show_featured'] : true;
$eyebrow       = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : __( 'Latest Articles', 'testro' );
$title         = isset( $args['title'] ) ? (string) $args['title'] : __( 'Test Automation Articles', 'testro' );
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : __( 'Browse theTestRo software testing blog for AI testing insights, QA automation strategies, DevOps testing guidance, and enterprise quality engineering perspectives.', 'testro' );

if ( ! have_posts() ) {
	?>
	<section class="testro-prod-section testro-blog-listing" id="latest-blogs" aria-labelledby="latest-blogs-heading">
		<div class="testro-container">
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'    => $eyebrow,
					'title'      => $title,
					'intro'      => $intro,
					'heading_id' => 'latest-blogs-heading',
				)
			);
			?>
			<p class="testro-blog-listing__empty"><?php esc_html_e( 'No posts found yet. Check back soon for new insights.', 'testro' ); ?></p>
		</div>
	</section>
	<?php
	return;
}

$posts = array();
while ( have_posts() ) {
	the_post();
	$posts[] = get_post();
}

$featured = ( $show_featured && $posts ) ? array_shift( $posts ) : null;
?>
<section class="testro-prod-section testro-blog-listing" id="latest-blogs" aria-labelledby="latest-blogs-heading">
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => $eyebrow,
				'title'      => $title,
				'intro'      => $intro,
				'heading_id' => 'latest-blogs-heading',
			)
		);
		?>

		<?php if ( $featured instanceof WP_Post ) : ?>
			<?php
			$featured_cats = get_the_category( $featured->ID );
			$featured_cat  = $featured_cats ? $featured_cats[0]->name : __( 'Blog', 'testro' );
			$featured_alt  = get_the_title( $featured );
			if ( has_post_thumbnail( $featured ) ) {
				$thumb_alt = get_post_meta( get_post_thumbnail_id( $featured ), '_wp_attachment_image_alt', true );
				if ( is_string( $thumb_alt ) && '' !== trim( $thumb_alt ) ) {
					$featured_alt = $thumb_alt;
				} else {
					$featured_alt = sprintf(
						/* translators: %s: article title */
						__( '%s — test automation article', 'testro' ),
						get_the_title( $featured )
					);
				}
			}
			?>
			<article class="testro-blog-listing__featured" data-reveal>
				<a class="testro-blog-listing__featured-link" href="<?php echo esc_url( get_permalink( $featured ) ); ?>">
					<?php if ( has_post_thumbnail( $featured ) ) : ?>
						<span class="testro-blog-listing__featured-media">
							<?php
							echo get_the_post_thumbnail( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								$featured,
								'large',
								array(
									'class'   => 'testro-blog-listing__featured-image',
									'loading' => 'eager',
									'alt'     => $featured_alt,
								)
							);
							?>
						</span>
					<?php else : ?>
						<span class="testro-blog-listing__featured-media testro-blog-listing__featured-media--fallback" aria-hidden="true">
							<span class="testro-blog-listing__featured-orb"></span>
						</span>
					<?php endif; ?>
					<span class="testro-blog-listing__featured-body">
						<span class="testro-blog-listing__badge"><?php echo esc_html( $featured_cat ); ?></span>
						<h3 class="testro-blog-listing__featured-title"><?php echo esc_html( get_the_title( $featured ) ); ?></h3>
						<p class="testro-blog-listing__featured-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $featured ), 28 ) ); ?></p>
						<span class="testro-blog-listing__meta">
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C, $featured ) ); ?>">
								<?php echo esc_html( get_the_date( '', $featured ) ); ?>
							</time>
						</span>
					</span>
				</a>
			</article>
		<?php endif; ?>

		<?php if ( $posts ) : ?>
			<ul class="testro-blog-listing__grid">
				<?php foreach ( $posts as $index => $post_item ) : ?>
					<?php
					$cats = get_the_category( $post_item->ID );
					$cat  = $cats ? $cats[0]->name : __( 'Blog', 'testro' );
					$alt  = get_the_title( $post_item );
					if ( has_post_thumbnail( $post_item ) ) {
						$thumb_alt = get_post_meta( get_post_thumbnail_id( $post_item ), '_wp_attachment_image_alt', true );
						if ( is_string( $thumb_alt ) && '' !== trim( $thumb_alt ) ) {
							$alt = $thumb_alt;
						} else {
							$alt = sprintf(
								/* translators: %s: article title */
								__( '%s — software testing article', 'testro' ),
								get_the_title( $post_item )
							);
						}
					}
					?>
					<li class="testro-blog-listing__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<article <?php post_class( 'testro-blog-listing__card', $post_item ); ?>>
							<a class="testro-blog-listing__card-link" href="<?php echo esc_url( get_permalink( $post_item ) ); ?>">
								<?php if ( has_post_thumbnail( $post_item ) ) : ?>
									<span class="testro-blog-listing__thumb">
										<?php
										echo get_the_post_thumbnail( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
											$post_item,
											'medium_large',
											array(
												'class'   => 'testro-blog-listing__image',
												'loading' => 'lazy',
												'alt'     => $alt,
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
									<span class="testro-blog-listing__badge"><?php echo esc_html( $cat ); ?></span>
									<h3 class="testro-blog-listing__card-title"><?php echo esc_html( get_the_title( $post_item ) ); ?></h3>
									<p class="testro-blog-listing__card-excerpt"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post_item ), 18 ) ); ?></p>
									<span class="testro-blog-listing__meta">
										<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C, $post_item ) ); ?>">
											<?php echo esc_html( get_the_date( '', $post_item ) ); ?>
										</time>
									</span>
								</span>
							</a>
						</article>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php
		the_posts_pagination(
			array(
				'mid_size'  => 1,
				'prev_text' => __( 'Previous', 'testro' ),
				'next_text' => __( 'Next', 'testro' ),
				'class'     => 'testro-blog-listing__pagination',
			)
		);
		?>
	</div>
</section>
