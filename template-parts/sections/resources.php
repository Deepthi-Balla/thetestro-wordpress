<?php
/**
 * Latest Blogs & Resources — Framer redesign.
 *
 * @package TestRo
 */

$data     = testro_get_resources();
$items    = isset( $data['items'] ) && is_array( $data['items'] ) ? array_slice( $data['items'], 0, 3 ) : array();
$headline = isset( $data['headline'] ) ? (string) $data['headline'] : '';
$intro    = isset( $data['intro'] ) ? (string) $data['intro'] : __( 'Guides and practical playbooks for teams building a continuous testing strategy.', 'testro' );
$cta      = isset( $data['cta'] ) && is_array( $data['cta'] ) ? $data['cta'] : array();
$blog_url = ! empty( $cta['href'] ) ? $cta['href'] : testro_nav_url( 'blog' );

$cards = array();
foreach ( $items as $item ) {
	$cards[] = array(
		'title'       => $item['title'],
		'description' => $item['description'],
		'href'        => ! empty( $item['href'] ) ? $item['href'] : $blog_url,
		'meta'        => ! empty( $item['meta'] ) ? $item['meta'] : 'AI Insights',
		'image'       => '',
	);
}

if ( ! $cards ) {
	return;
}
?>
<section class="testro-resources testro-resources--framer" id="resources" aria-labelledby="resources-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-resources__header">
			<p class="testro-section-eyebrow"><?php esc_html_e( 'LATEST BLOGS & RESOURCES', 'testro' ); ?></p>
			<h2 id="resources-heading" class="main-headings"><?php echo esc_html( ! empty( $headline ) ? $headline : __( 'Learn about AI-driven testing.', 'testro' ) ); ?></h2>
			<p class="sub-text"><?php echo esc_html( $intro ); ?></p>
		</header>

		<ul class="testro-resources__grid testro-resources__grid--framer">
			<?php foreach ( $cards as $card ) : ?>
				<li>
					<article class="testro-resources__card testro-resources__card--framer">
						<a class="testro-resources__media" href="<?php echo esc_url( $card['href'] ); ?>" tabindex="-1" aria-hidden="true">
							<?php if ( ! empty( $card['image'] ) ) : ?>
								<img src="<?php echo esc_url( $card['image'] ); ?>" alt="" loading="lazy" decoding="async" width="640" height="360" />
							<?php else : ?>
								<span class="testro-resources__placeholder"></span>
							<?php endif; ?>
						</a>
						<p class="testro-resources__type"><?php echo esc_html( $card['meta'] ); ?></p>
						<h3 class="testro-resources__title">
							<a href="<?php echo esc_url( $card['href'] ); ?>"><?php echo esc_html( $card['title'] ); ?></a>
						</h3>
						<p class="testro-resources__desc"><?php echo esc_html( $card['description'] ); ?></p>
						<a class="testro-resources__more" href="<?php echo esc_url( $card['href'] ); ?>"><?php esc_html_e( 'Read more →', 'testro' ); ?></a>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>

		<div class="testro-resources__cta">
			<?php
			get_template_part(
				'template-parts/components/primary-button',
				null,
				array(
					'label'      => ! empty( $cta['label'] ) ? $cta['label'] : __( 'Visit the Blog', 'testro' ),
					'href'       => $blog_url,
					'with_arrow' => false,
					'attrs'      => array(
						'class' => 'testro-btn testro-btn--secondary',
					),
				)
			);
			?>
		</div>
	</div>
</section>
