<?php
/**
 * AI capabilities — intro, feature cards, closing statement.
 *
 * Uses global SectionHeader, FeatureCard, and page-section container patterns.
 *
 * @package TestRo
 */

$data    = testro_get_ai_capabilities();
$eyebrow = isset( $data['eyebrow'] ) ? (string) $data['eyebrow'] : '';
$title   = isset( $data['title'] ) ? (string) $data['title'] : '';
$intro   = isset( $data['intro'] ) ? (string) $data['intro'] : '';
$outro   = isset( $data['outro'] ) ? (string) $data['outro'] : '';
$items   = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();

if ( '' === $title && ! $items ) {
	return;
}
?>
<section class="testro-page-section testro-ai-capabilities" id="ai-capabilities" aria-labelledby="ai-capabilities-heading">
	<div class="testro-page-section__inner">
		<?php
		get_template_part(
			'template-parts/components/section-header',
			null,
			array(
				'label'       => $eyebrow,
				'heading'     => $title,
				'description' => $intro,
				'heading_id'  => 'ai-capabilities-heading',
				'attrs'       => array(
					'data-reveal' => true,
				),
			)
		);
		?>

		<?php if ( $items ) : ?>
			<ul class="testro-ai-capabilities__cards">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php
					get_template_part(
						'template-parts/components/feature-card',
						null,
						array(
							'icon'        => isset( $item['icon'] ) ? (string) $item['icon'] : '',
							'title'       => isset( $item['title'] ) ? (string) $item['title'] : '',
							'description' => isset( $item['description'] ) ? (string) $item['description'] : '',
							'tag'         => 'li',
							'attrs'       => array(
								'data-reveal' => true,
								'style'       => '--reveal-delay: ' . ( (int) $index * 80 ) . 'ms',
							),
						)
					);
					?>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( '' !== $outro ) : ?>
			<div class="testro-ai-capabilities__closing" data-reveal>
				<p class="testro-ai-capabilities__closing-text"><?php echo esc_html( $outro ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</section>
