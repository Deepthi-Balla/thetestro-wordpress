<?php
/**
 * Request a Demo modal — matches theTestRo reference dialog.
 *
 * @package TestRo
 */
?>
<div
	id="demo-modal"
	class="testro-modal"
	role="dialog"
	aria-modal="true"
	aria-labelledby="demo-modal-title"
	aria-describedby="demo-modal-desc"
	aria-hidden="true"
	hidden
>
	<div class="testro-modal__backdrop" data-close-modal="demo-modal" tabindex="-1"></div>
	<div class="testro-modal__dialog" role="document">
		<button
			type="button"
			class="testro-modal__close"
			data-close-modal="demo-modal"
			aria-label="<?php esc_attr_e( 'Close', 'testro' ); ?>"
		>
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
				<path d="M18 6 6 18"></path>
				<path d="m6 6 12 12"></path>
			</svg>
		</button>

		<div class="testro-modal__header">
			<h2 id="demo-modal-title" class="testro-modal__title gradient-text" style="--font-size: 32px">
				<?php esc_html_e( 'Request a Demo', 'testro' ); ?>
			</h2>
			<p id="demo-modal-desc" class="testro-modal__subtitle">
				<?php esc_html_e( "Fill out the form below and we'll get in touch to schedule your demo.", 'testro' ); ?>
			</p>
		</div>

		<form class="testro-form testro-form--demo" id="testro-demo-form" novalidate>
			<div class="testro-form__row">
				<p class="testro-form__field">
					<label for="demo-first-name"><?php esc_html_e( 'First Name*', 'testro' ); ?></label>
					<input type="text" id="demo-first-name" name="first_name" required autocomplete="given-name" />
				</p>
				<p class="testro-form__field">
					<label for="demo-last-name"><?php esc_html_e( 'Last Name*', 'testro' ); ?></label>
					<input type="text" id="demo-last-name" name="last_name" required autocomplete="family-name" />
				</p>
			</div>

			<p class="testro-form__field">
				<label for="demo-work-email"><?php esc_html_e( 'Work Email*', 'testro' ); ?></label>
				<input type="email" id="demo-work-email" name="work_email" required autocomplete="email" />
			</p>

			<p class="testro-form__field">
				<label for="demo-organization"><?php esc_html_e( 'Organization Name*', 'testro' ); ?></label>
				<input type="text" id="demo-organization" name="organization_name" required autocomplete="organization" />
			</p>

			<p class="testro-form__field">
				<label for="demo-designation"><?php esc_html_e( 'Designation*', 'testro' ); ?></label>
				<input type="text" id="demo-designation" name="designation" required autocomplete="organization-title" />
			</p>

			<p class="testro-form__field">
				<label for="demo-requirements"><?php esc_html_e( 'Primary Requirements*', 'testro' ); ?></label>
				<textarea id="demo-requirements" name="primary_requirements" rows="4" required></textarea>
			</p>

			<p class="testro-form__status" role="status" aria-live="polite" hidden></p>

			<div class="testro-form__actions testro-form__actions--demo">
				<?php
				get_template_part(
					'template-parts/components/primary-button',
					null,
					array(
						'label' => __( 'Request Demo', 'testro' ),
						'attrs' => array(
							'type'  => 'submit',
							'class' => 'primary-button testro-btn testro-btn--primary',
						),
					)
				);
				?>
			</div>
		</form>
	</div>
</div>
