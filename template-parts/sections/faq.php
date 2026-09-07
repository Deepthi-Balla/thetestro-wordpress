<?php
/**
 * FAQ accordion section — global SectionHeader + reusable accordion cards.
 *
 * Optional $args:
 * - faqs               (array|string) FAQ list, or a context key for testro_get_faq_set().
 * - label              (string)       Eyebrow label. Default "FAQ".
 * - heading            (string)       Main heading override.
 * - title              (string)       Alias for heading (product pages).
 * - description        (string)       Intro copy. Omitted on pages without one unless set.
 * - heading_level      (int)          Semantic heading level 1–6. Default 2 on homepage.
 * - id                 (string)       Prefix for accordion control IDs.
 * - label_color        (string)       Optional SectionHeader label color.
 * - heading_color      (string)       Optional SectionHeader heading color.
 * - description_color  (string)       Optional SectionHeader description color.
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();

$has_custom_heading = isset( $args['heading'] ) || isset( $args['title'] );

if ( isset( $args['heading'] ) ) {
	$heading = (string) $args['heading'];
} elseif ( isset( $args['title'] ) ) {
	$heading = (string) $args['title'];
} else {
	$heading = __( 'Answers for teams ready to test smarter.', 'testro' );
}

if ( array_key_exists( 'description', $args ) ) {
	$description = (string) $args['description'];
} elseif ( ! $has_custom_heading ) {
	$description = __( 'Everything you need to know about building a more reliable testing practice with theTestRo.', 'testro' );
} else {
	$description = '';
}

if ( array_key_exists( 'label', $args ) ) {
	$label = (string) $args['label'];
} else {
	$label = __( 'FAQ', 'testro' );
}

$heading_level     = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$section_id        = ! empty( $args['id'] ) ? sanitize_html_class( (string) $args['id'] ) : 'faq';
$heading_id        = $section_id . '-heading';
$label_color       = isset( $args['label_color'] ) ? (string) $args['label_color'] : 'var(--color-brand-sky)';
$heading_color     = isset( $args['heading_color'] ) ? (string) $args['heading_color'] : 'var(--color-brand-navy)';
$description_color = isset( $args['description_color'] ) ? (string) $args['description_color'] : '#5B7290';

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
<div id="<?php echo esc_attr( $section_id ); ?>">
	<section class="testro-faq" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
		<div class="testro-faq__inner">
			<?php
			get_template_part(
				'template-parts/components/section-header',
				null,
				array(
					'label'             => $label,
					'heading'           => $heading,
					'description'       => $description,
					'heading_id'        => $heading_id,
					'heading_level'     => $heading_level,
					'label_color'       => $label_color,
					'heading_color'     => $heading_color,
					'description_color' => $description_color,
				)
			);
			?>

			<div class="testro-faq__list" data-faq-accordion>
				<?php foreach ( $faqs as $index => $faq ) : ?>
					<?php
					$panel_id  = $section_id . '-answer-' . $index;
					$button_id = $section_id . '-question-' . $index;
					?>
					<div class="testro-faq__item">
						<button
							type="button"
							id="<?php echo esc_attr( $button_id ); ?>"
							class="testro-faq__trigger"
							aria-expanded="false"
							aria-controls="<?php echo esc_attr( $panel_id ); ?>"
							data-faq-trigger
						>
							<span class="testro-faq__question-text"><?php echo esc_html( $faq['question'] ); ?></span>
							<span class="testro-faq__icon" aria-hidden="true">
								<?php
								echo testro_icon( 'plus', array( 'size' => 20, 'stroke' => 1.75, 'class' => 'testro-faq__icon-plus' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
								echo testro_icon( 'minus', array( 'size' => 20, 'stroke' => 1.75, 'class' => 'testro-faq__icon-minus' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
								?>
							</span>
						</button>
						<div
							id="<?php echo esc_attr( $panel_id ); ?>"
							class="testro-faq__answer"
							role="region"
							aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
							hidden
							data-faq-panel
						>
							<?php
							$answer_text    = isset( $faq['answer'] ) ? (string) $faq['answer'] : '';
							$escaped_answer = esc_html( $answer_text );

							// Make the partners contact email clickable for the Partners page.
							$email = 'partners@thetestro.com';
							if ( '' !== $email && false !== strpos( $answer_text, $email ) ) {
								$escaped_email  = esc_html( $email );
								$escaped_answer = str_replace(
									$escaped_email,
									'<a href="mailto:' . esc_attr( $email ) . '">' . $escaped_email . '</a>',
									$escaped_answer
								);
							}
							?>
							<p><?php echo $escaped_answer; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- output is escaped except for mailto anchor inserted by theme. ?></p>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
