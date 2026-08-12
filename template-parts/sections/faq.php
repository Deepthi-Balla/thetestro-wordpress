<?php
/**
 * FAQ accordion section.
 *
 * Optional $args:
 * - faqs    (array|string) FAQ list, or a context key for testro_get_faq_set().
 * - title         (string)       Heading override.
 * - heading_level (int)          Semantic heading level 1–6. Default 5 on homepage.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$title         = isset( $args['title'] ) ? (string) $args['title'] : __( 'FAQs', 'testro' );
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 5;
$heading_tag   = 'h' . $heading_level;

if ( isset( $args['faqs'] ) && is_array( $args['faqs'] ) ) {
	$faqs = $args['faqs'];
} elseif ( isset( $args['faqs'] ) && function_exists( 'testro_get_faq_set' ) ) {
	$faqs = testro_get_faq_set( (string) $args['faqs'] );
} else {
	$faqs = testro_get_faqs();
}

if ( ! $faqs ) {
	return;
}
?>
<div id="faq">
	<section class="testro-faq" aria-labelledby="faq-heading">
		<div class="testro-container">
			<header class="testro-section-header">
				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
				<<?php echo $heading_tag; ?> id="faq-heading" class="gradient-text main-headings"><?php echo esc_html( $title ); ?></<?php echo $heading_tag; ?>>
			</header>

			<div class="testro-faq__list" data-faq-accordion>
				<?php foreach ( $faqs as $index => $faq ) : ?>
					<?php
					$panel_id  = 'faq-answer-' . $index;
					$button_id = 'faq-question-' . $index;
					?>
					<div class="testro-faq__item">
						<div class="testro-faq__question">
							<button
								type="button"
								id="<?php echo esc_attr( $button_id ); ?>"
								class="testro-faq__trigger"
								aria-expanded="false"
								aria-controls="<?php echo esc_attr( $panel_id ); ?>"
								data-faq-trigger
							>
								<?php echo esc_html( $faq['question'] ); ?>
							</button>
						</div>
						<div
							id="<?php echo esc_attr( $panel_id ); ?>"
							class="testro-faq__answer"
							role="region"
							aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
							hidden
							data-faq-panel
						>
							<p><?php echo esc_html( $faq['answer'] ); ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
