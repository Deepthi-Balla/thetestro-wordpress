<?php
/**
 * Web Testing — Test Every User Journey (Framer TlicVVEQs).
 *
 * Structure: Journey Content (1027) = copy (564) + Journey Coverage Flow (436, gap 54).
 * Flow items centered; Four Point User Flow capsule; IconNode signals h=48.
 *
 * @package TestRo
 */

$args  = isset( $args ) && is_array( $args ) ? $args : array();
$items = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id    = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'test-every-user-journey';

if ( ! $items && '' === ( isset( $args['title'] ) ? (string) $args['title'] : '' ) ) {
	return;
}

$heading_id = $id . '-heading';
?>
<section class="testro-web-section testro-web-journey" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<div class="testro-web-journey__content">
			<div class="testro-web-journey__copy">
				<?php if ( ! empty( $args['title'] ) ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-journey__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $args['intro'] ) ) : ?>
					<p class="testro-web-journey__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</div>

			<ol class="testro-web-journey__flow">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-web-journey__item">
						<?php if ( ! empty( $item['steps'] ) && is_array( $item['steps'] ) ) : ?>
							<span class="testro-web-journey__steps" aria-hidden="true">
								<?php
								$step_count = count( $item['steps'] );
								foreach ( $item['steps'] as $step_i => $step ) :
									$step_label = trim( (string) $step );
									?>
									<span class="testro-web-journey__step<?php echo 0 === (int) $step_i ? ' testro-web-journey__step--active' : ''; ?>">
										<?php if ( '' !== $step_label ) : ?>
											<span class="testro-web-journey__step-label"><?php echo esc_html( $step_label ); ?></span>
										<?php endif; ?>
									</span>
									<?php if ( $step_i < $step_count - 1 ) : ?>
										<span class="testro-web-journey__link"></span>
									<?php endif; ?>
								<?php endforeach; ?>
							</span>
						<?php elseif ( ! empty( $item['signal'] ) ) : ?>
							<?php $signal = sanitize_html_class( (string) $item['signal'] ); ?>
							<span class="testro-web-journey__signal testro-web-journey__signal--<?php echo esc_attr( $signal ); ?>" aria-hidden="true">
								<?php if ( 'workflow' === $signal ) : ?>
									<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
										<circle cx="24" cy="24" r="24" fill="#00ACFF"/>
										<circle cx="16" cy="24" r="2.5" fill="#fff"/>
										<circle cx="24" cy="24" r="2.5" fill="#fff"/>
										<circle cx="32" cy="24" r="2.5" fill="#fff"/>
									</svg>
								<?php else : ?>
									<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
										<circle cx="24" cy="24" r="24" fill="#00ACFF"/>
										<path d="M14.5 24.5 20.5 30.5 33.5 17.5" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								<?php endif; ?>
							</span>
						<?php endif; ?>

						<?php if ( ! empty( $item['title'] ) ) : ?>
							<h3 class="testro-web-journey__item-title"><?php echo esc_html( (string) $item['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-web-journey__item-desc"><?php echo esc_html( (string) $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
		</div>
	</div>
</section>
