<?php
/**
 * Contact / Talk to Us form section.
 *
 * Optional $args:
 * - layout       (string)  'default' (centered) | 'split' (two-column intro + form).
 * - title        (string)  Section heading.
 * - description  (string)  Supporting copy.
 * - submit_label (string)  Submit button label.
 * - show_phone   (bool)    Include phone field.
 * - show_subject (bool)    Include inquiry-type select.
 * - full_name    (bool)    Use a single Full Name field instead of first/last.
 * - section_id   (string)  Wrapper id (default: contact-form).
 *
 * @package TestRo
 */

$args         = isset( $args ) && is_array( $args ) ? $args : array();
$layout       = isset( $args['layout'] ) && 'split' === $args['layout'] ? 'split' : 'default';
$title        = isset( $args['title'] ) ? (string) $args['title'] : __( "Talk to Us — We're Ready", 'testro' );
$description  = isset( $args['description'] ) ? (string) $args['description'] : __( "Tell us what you need and we'll show you how we can help. Start the conversation today.", 'testro' );
$submit_label = isset( $args['submit_label'] ) ? (string) $args['submit_label'] : __( 'Send Us a Message', 'testro' );
$show_phone   = ! empty( $args['show_phone'] );
$show_subject = ! empty( $args['show_subject'] );
$full_name    = ! empty( $args['full_name'] );
$section_id   = isset( $args['section_id'] ) ? sanitize_title( $args['section_id'] ) : 'contact-form';
$is_split     = 'split' === $layout;

$inquiry_types = array(
	''             => __( 'Select an inquiry type', 'testro' ),
	'demo'         => __( 'Request a Demo', 'testro' ),
	'sales'        => __( 'Talk to Sales', 'testro' ),
	'support'      => __( 'Product Support', 'testro' ),
	'partnerships' => __( 'Partnerships', 'testro' ),
	'other'        => __( 'Other', 'testro' ),
);

$section_class = 'testro-contact' . ( $is_split ? ' testro-contact--split' : '' );
?>
<div id="<?php echo esc_attr( $section_id ); ?>">
	<section class="<?php echo esc_attr( $section_class ); ?>" aria-labelledby="contact-heading">
		<div class="testro-contact__inner<?php echo $is_split ? ' testro-contact__inner--split' : ''; ?>">
			<?php if ( $is_split ) : ?>
				<div class="testro-contact__intro" data-reveal>
					<p class="subtitle-pill testro-section-eyebrow"><?php esc_html_e( 'Contact', 'testro' ); ?></p>
					<h2 id="contact-heading" class="testro-contact__heading gradient-text"><?php echo esc_html( $title ); ?></h2>
					<p class="testro-contact__desc sub-text"><?php echo esc_html( $description ); ?></p>
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
				</div>
			<?php else : ?>
				<header class="testro-contact__header">
					<h2 id="contact-heading" class="testro-contact__heading gradient-text"><?php echo esc_html( $title ); ?></h2>
					<p class="testro-contact__desc sub-text"><?php echo esc_html( $description ); ?></p>
				</header>
			<?php endif; ?>

			<div class="testro-contact__card talk-to-us" data-reveal>
				<div class="testro-contact__card-body">
					<div class="testro-contact__thanks" id="testro-contact-thanks" hidden>
						<h3 class="testro-contact__thanks-title"><?php esc_html_e( 'Thank You!', 'testro' ); ?></h3>
						<p class="testro-contact__thanks-text"><?php esc_html_e( "We'll be in touch shortly.", 'testro' ); ?></p>
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

						<div class="testro-form__row">
							<p class="testro-form__field">
								<label for="contact-company"><?php esc_html_e( 'Company', 'testro' ); ?><span aria-hidden="true">*</span></label>
								<input type="text" id="contact-company" name="company" required autocomplete="organization" aria-required="true" />
								<span class="testro-form__error" data-error-for="company" hidden></span>
							</p>
							<?php if ( $show_phone ) : ?>
								<p class="testro-form__field">
									<label for="contact-phone"><?php esc_html_e( 'Phone Number', 'testro' ); ?></label>
									<input type="tel" id="contact-phone" name="phone" autocomplete="tel" />
									<span class="testro-form__error" data-error-for="phone" hidden></span>
								</p>
							<?php endif; ?>
						</div>

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
								echo $is_split
									? esc_html__( 'Message', 'testro' )
									: esc_html__( 'Tell us about your automation needs', 'testro' );
								?>
								<span aria-hidden="true">*</span>
							</label>
							<textarea id="contact-message" name="message" rows="5" required aria-required="true"></textarea>
							<span class="testro-form__error" data-error-for="message" hidden></span>
						</p>

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
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
