<?php
/**
 * FAQ accordion section.
 *
 * Optional $args:
 * - faqs    (array|string) FAQ list, or a context key for testro_get_faq_set().
 * - eyebrow (string)       Optional pill above the heading.
 * - title   (string)       Heading override.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$eyebrow = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title   = isset( $args['title'] ) ? (string) $args['title'] : __( 'Frequently Asked Questions', 'testro' );

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
				<?php if ( '' !== $eyebrow ) : ?>
					<p class="subtitle-pill testro-section-eyebrow testro-faq__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>
				<h2 id="faq-heading" class="gradient-text main-headings"><?php echo esc_html( $title ); ?></h2>
			</header>

			<div class="testro-faq__list" data-faq-accordion>
				<?php foreach ( $faqs as $index => $faq ) : ?>
					<?php
					$panel_id  = 'faq-answer-' . $index;
					$button_id = 'faq-question-' . $index;
					?>
					<div class="testro-faq__item">
						<h3 class="testro-faq__question">
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
						</h3>
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
