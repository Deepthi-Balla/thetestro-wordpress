<?php
/**
 * FAQ accordion — Framer redesign.
 *
 * @package TestRo
 */

$args          = isset( $args ) && is_array( $args ) ? $args : array();
$title         = isset( $args['title'] ) ? (string) $args['title'] : __( 'Answers for teams ready to test smarter.', 'testro' );
$intro         = isset( $args['intro'] ) ? (string) $args['intro'] : __( 'Everything you need to know about building a more reliable testing practice with theTestRo.', 'testro' );
$heading_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
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
<section class="testro-faq testro-faq--framer" id="faq" aria-labelledby="faq-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-faq__header">
			<p class="testro-section-eyebrow"><?php esc_html_e( 'FAQ', 'testro' ); ?></p>
			<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
			<<?php echo $heading_tag; ?> id="faq-heading" class="main-headings"><?php echo esc_html( $title ); ?></<?php echo $heading_tag; ?>>
			<p class="sub-text"><?php echo esc_html( $intro ); ?></p>
		</header>

		<div class="testro-faq__list" data-faq-accordion>
			<?php foreach ( $faqs as $index => $faq ) : ?>
				<?php
				$panel_id  = 'faq-panel-' . (string) $index;
				$button_id = 'faq-trigger-' . (string) $index;
				?>
				<div class="testro-faq__item">
					<button
						type="button"
						class="testro-faq__trigger"
						id="<?php echo esc_attr( $button_id ); ?>"
						data-faq-trigger
						aria-expanded="false"
						aria-controls="<?php echo esc_attr( $panel_id ); ?>"
					>
						<span class="testro-faq__question"><?php echo esc_html( $faq['question'] ); ?></span>
						<span class="testro-faq__icon" aria-hidden="true">+</span>
					</button>
					<div
						class="testro-faq__panel"
						id="<?php echo esc_attr( $panel_id ); ?>"
						data-faq-panel
						role="region"
						aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
						hidden
					>
						<p class="testro-faq__answer"><?php echo esc_html( $faq['answer'] ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
