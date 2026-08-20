<?php
/**
 * Contact / Talk to Us form section.
 *
 * Optional $args:
 * - layout          (string)  'default' (centered) | 'split' (two-column intro + form).
 * - title           (string)  Section heading.
 * - supporting      (string)  Supporting heading under the H2.
 * - description     (string)  Supporting copy.
 * - submit_label    (string)  Submit button label.
 * - show_phone      (bool)    Include phone field.
 * - show_subject    (bool)    Include inquiry-type select.
 * - full_name       (bool)    Use a single Full Name field instead of first/last.
 * - section_id      (string)  Wrapper id (default: contact-form).
 * - show_highlights (bool)    Show split-layout highlight list. Default true.
 * - show_consent    (bool)    Show privacy consent line. Default false.
 *
 * @package TestRo
 */

$args           = isset( $args ) && is_array( $args ) ? $args : array();
$layout         = isset( $args['layout'] ) && 'split' === $args['layout'] ? 'split' : 'default';
$title          = isset( $args['title'] ) ? (string) $args['title'] : __( "Talk to Us — We're Ready", 'testro' );
$supporting     = isset( $args['supporting'] ) ? (string) $args['supporting'] : '';
$description    = isset( $args['description'] ) ? (string) $args['description'] : __( "Tell us what you need and we'll show you how we can help. Start the conversation today.", 'testro' );
$submit_label   = isset( $args['submit_label'] ) ? (string) $args['submit_label'] : __( 'Send Us a Message', 'testro' );
$show_phone     = ! empty( $args['show_phone'] );
$show_subject   = ! empty( $args['show_subject'] );
$full_name      = ! empty( $args['full_name'] );
$section_id     = isset( $args['section_id'] ) ? sanitize_title( $args['section_id'] ) : 'contact-form';
$show_highlights = array_key_exists( 'show_highlights', $args ) ? (bool) $args['show_highlights'] : true;
$show_consent   = ! empty( $args['show_consent'] );
$show_eyebrow   = array_key_exists( 'show_eyebrow', $args ) ? (bool) $args['show_eyebrow'] : true;
$is_split       = 'split' === $layout;

$inquiry_types = array(
	''             => __( 'Select an inquiry type', 'testro' ),
	'demo'         => __( 'Request a Demo', 'testro' ),
	'sales'        => __( 'Talk to Sales', 'testro' ),
	'support'      => __( 'Product Support', 'testro' ),
	'partnerships' => __( 'Partnerships', 'testro' ),
	'other'        => __( 'Other', 'testro' ),
);

$privacy_url = function_exists( 'testro_get_page_url' )
	? testro_get_page_url( 'privacy-notice' )
	: home_url( '/privacy-notice/' );

$section_class = 'testro-contact' . ( $is_split ? ' testro-contact--split' : '' );
?>
<div id="<?php echo esc_attr( $section_id ); ?>">
	<section class="<?php echo esc_attr( $section_class ); ?>" aria-labelledby="contact-heading">
		<div class="testro-contact__inner<?php echo $is_split ? ' testro-contact__inner--split' : ''; ?>">
			<?php if ( $is_split ) : ?>
				<header class="testro-contact__header" data-reveal>
					<?php if ( $show_eyebrow ) : ?>
						<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Contact Us', 'testro' ); ?></p>
					<?php endif; ?>
					<h2 id="contact-heading" class="testro-contact__heading gradient-text"><?php echo esc_html( $title ); ?></h2>
					<?php if ( '' !== $supporting ) : ?>
						<p class="testro-contact__supporting"><?php echo esc_html( $supporting ); ?></p>
					<?php endif; ?>
				</header>
				<div class="testro-contact__intro" data-reveal>
					<p class="testro-contact__desc sub-text"><?php echo esc_html( $description ); ?></p>
					<?php if ( $show_highlights ) : ?>
						<ul class="testro-contact__highlights" aria-label="<?php esc_attr_e( 'How we can help', 'testro' ); ?>">
							<li>
								<?php echo testro_icon( 'circle-check', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Product demos & walkthroughs', 'testro' ); ?></span>
							</li>
							<li>
								<?php echo testro_icon( 'circle-check', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Pricing & plan guidance', 'testro' ); ?></span>
							</li>
							<li>
								<?php echo testro_icon( 'circle-check', array( 'size' => 18 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								<span><?php esc_html_e( 'Support & partnership inquiries', 'testro' ); ?></span>
							</li>
						</ul>
					<?php endif; ?>
				</div>
			<?php else : ?>
				<header class="testro-contact__header">
					<h2 id="contact-heading" class="testro-contact__heading gradient-text"><?php echo esc_html( $title ); ?></h2>
					<?php if ( '' !== $supporting ) : ?>
						<p class="testro-contact__supporting"><?php echo esc_html( $supporting ); ?></p>
					<?php endif; ?>
					<p class="testro-contact__desc sub-text"><?php echo esc_html( $description ); ?></p>
				</header>
			<?php endif; ?>

			<div class="testro-contact__card talk-to-us" data-reveal>
				<div class="testro-contact__card-body">
					<div class="testro-contact__thanks" id="testro-contact-thanks" hidden>
						<div class="testro-contact__thanks-icon" aria-hidden="true">
							<?php echo testro_icon( 'circle-check', array( 'size' => 28 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</div>
						<p class="testro-contact__thanks-text"><?php esc_html_e( "Thank you for your interest. We'll get back to you soon.", 'testro' ); ?></p>
					</div>

					<form class="testro-form testro-form--contact" id="testro-contact-form" novalidate>
						<?php if ( $full_name ) : ?>
							<p class="testro-form__field">
								<label for="contact-full-name"><?php esc_html_e( 'Full Name', 'testro' ); ?><span aria-hidden="true">*</span></label>
								<input type="text" id="contact-full-name" name="full_name" required autocomplete="name" aria-required="true" />
								<span class="testro-form__error" data-error-for="full_name" hidden></span>
							</p>
						<?php else : ?>
							<div class="testro-form__row">
								<p class="testro-form__field">
									<label for="contact-first-name"><?php esc_html_e( 'First Name', 'testro' ); ?><span aria-hidden="true">*</span></label>
									<input type="text" id="contact-first-name" name="first_name" required autocomplete="given-name" aria-required="true" />
									<span class="testro-form__error" data-error-for="first_name" hidden></span>
								</p>
								<p class="testro-form__field">
									<label for="contact-last-name"><?php esc_html_e( 'Last Name', 'testro' ); ?><span aria-hidden="true">*</span></label>
									<input type="text" id="contact-last-name" name="last_name" required autocomplete="family-name" aria-required="true" />
									<span class="testro-form__error" data-error-for="last_name" hidden></span>
								</p>
							</div>
						<?php endif; ?>

						<p class="testro-form__field">
							<label for="contact-work-email"><?php esc_html_e( 'Work Email', 'testro' ); ?><span aria-hidden="true">*</span></label>
							<input type="email" id="contact-work-email" name="work_email" required autocomplete="email" aria-required="true" />
							<span class="testro-form__error" data-error-for="work_email" hidden></span>
						</p>

						<?php if ( $show_phone ) : ?>
							<div class="testro-form__row">
								<p class="testro-form__field">
									<label for="contact-company"><?php esc_html_e( 'Company', 'testro' ); ?><span aria-hidden="true">*</span></label>
									<input type="text" id="contact-company" name="company" required autocomplete="organization" aria-required="true" />
									<span class="testro-form__error" data-error-for="company" hidden></span>
								</p>
								<p class="testro-form__field">
									<label for="contact-phone"><?php esc_html_e( 'Phone Number', 'testro' ); ?></label>
									<input type="tel" id="contact-phone" name="phone" autocomplete="tel" />
									<span class="testro-form__error" data-error-for="phone" hidden></span>
								</p>
							</div>
						<?php else : ?>
							<p class="testro-form__field">
								<label for="contact-company"><?php esc_html_e( 'Company', 'testro' ); ?><span aria-hidden="true">*</span></label>
								<input type="text" id="contact-company" name="company" required autocomplete="organization" aria-required="true" />
								<span class="testro-form__error" data-error-for="company" hidden></span>
							</p>
						<?php endif; ?>

						<?php if ( $show_subject ) : ?>
							<p class="testro-form__field">
								<label for="contact-subject"><?php esc_html_e( 'Subject / Inquiry Type', 'testro' ); ?><span aria-hidden="true">*</span></label>
								<select id="contact-subject" name="subject" required aria-required="true">
									<?php foreach ( $inquiry_types as $value => $label ) : ?>
										<option value="<?php echo esc_attr( $value ); ?>"><?php echo esc_html( $label ); ?></option>
									<?php endforeach; ?>
								</select>
								<span class="testro-form__error" data-error-for="subject" hidden></span>
							</p>
						<?php endif; ?>

						<p class="testro-form__field">
							<label for="contact-message">
								<?php
								$message_label = isset( $args['message_label'] ) ? (string) $args['message_label'] : '';
								if ( '' !== $message_label ) {
									echo esc_html( $message_label );
								} else {
									echo $is_split
										? esc_html__( 'Message', 'testro' )
										: esc_html__( 'Tell us about your automation needs', 'testro' );
								}
								?>
								<span aria-hidden="true">*</span>
							</label>
							<textarea id="contact-message" name="message" rows="5" required aria-required="true"></textarea>
							<span class="testro-form__error" data-error-for="message" hidden></span>
						</p>

						<div class="testro-form__turnstile" id="contact-turnstile" aria-label="<?php esc_attr_e( 'Security verification', 'testro' ); ?>"></div>

						<p class="testro-form__status" role="status" aria-live="polite" hidden></p>

						<div class="testro-form__actions">
							<?php
							get_template_part(
								'template-parts/components/primary-button',
								null,
								array(
									'label' => $submit_label,
									'attrs' => array(
										'type'  => 'submit',
										'class' => 'testro-btn testro-btn--primary',
									),
								)
							);
							?>
						</div>

						<?php if ( $show_consent ) : ?>
							<p class="testro-form__consent">
								<?php
								echo wp_kses(
									sprintf(
										/* translators: %s: Privacy Policy URL */
										__( 'We respect your privacy. See our <a href="%s">Privacy Policy</a> for details.', 'testro' ),
										esc_url( $privacy_url )
									),
									array(
										'a' => array(
											'href' => true,
										),
									)
								);
								?>
							</p>
						<?php endif; ?>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
