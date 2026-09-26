<?php
/**
 * Web Testing — Supported Browsers & Platforms (Framer VWJxJtN3s).
 *
 * Support Introduction → Browser Support Matrix → Coverage Explainer
 * (Coverage Explanation 440 LEFT + Execution Coverage Diagram 480 RIGHT).
 *
 * @package TestRo
 */

$args         = isset( $args ) && is_array( $args ) ? $args : array();
$id           = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : 'supported-browsers-platforms';
$platforms    = isset( $args['platforms'] ) && is_array( $args['platforms'] ) ? $args['platforms'] : array();
$browsers     = isset( $args['browsers'] ) && is_array( $args['browsers'] ) ? $args['browsers'] : array();
$frameworks   = isset( $args['frameworks'] ) && is_array( $args['frameworks'] ) ? $args['frameworks'] : array();
$conditions   = isset( $args['conditions'] ) && is_array( $args['conditions'] ) ? $args['conditions'] : array();
$hub_label    = isset( $args['hub_label'] ) ? (string) $args['hub_label'] : 'theTestRo';
$matrix_label = isset( $args['matrix_label'] ) ? (string) $args['matrix_label'] : __( 'Browser × Platform', 'testro' );
$matrix_note  = isset( $args['matrix_note'] ) ? (string) $args['matrix_note'] : '';

if ( '' === ( isset( $args['title'] ) ? (string) $args['title'] : '' ) && ! $platforms && ! $browsers ) {
	return;
}

$heading_id = $id . '-heading';
?>
<section class="testro-web-section testro-web-platforms" id="<?php echo esc_attr( $id ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-web-shell">
		<div class="testro-web-platforms__content">
			<header class="testro-web-platforms__head">
				<?php if ( ! empty( $args['title'] ) ) : ?>
					<h2 id="<?php echo esc_attr( $heading_id ); ?>" class="testro-web-platforms__title"><?php echo esc_html( (string) $args['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( ! empty( $args['intro'] ) ) : ?>
					<p class="testro-web-platforms__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</header>

			<?php if ( $platforms && $browsers ) : ?>
				<div class="testro-web-platforms__matrix" role="table" aria-label="<?php echo esc_attr( $matrix_label ); ?>">
					<div class="testro-web-platforms__row testro-web-platforms__row--head" role="row">
						<span class="testro-web-platforms__cell testro-web-platforms__cell--corner" role="columnheader"><?php echo esc_html( $matrix_label ); ?></span>
						<?php foreach ( $platforms as $platform ) : ?>
							<span class="testro-web-platforms__cell testro-web-platforms__cell--col" role="columnheader"><?php echo esc_html( (string) $platform ); ?></span>
						<?php endforeach; ?>
					</div>
					<?php foreach ( $browsers as $b_index => $browser ) : ?>
						<div class="testro-web-platforms__row<?php echo ( $b_index % 2 ) ? ' testro-web-platforms__row--alt' : ''; ?>" role="row">
							<span class="testro-web-platforms__cell testro-web-platforms__cell--row" role="rowheader"><?php echo esc_html( (string) $browser ); ?></span>
							<?php foreach ( $platforms as $platform ) : ?>
								<span class="testro-web-platforms__cell testro-web-platforms__cell--check" role="cell" aria-label="<?php echo esc_attr( sprintf( /* translators: 1: browser, 2: platform */ __( '%1$s on %2$s supported', 'testro' ), (string) $browser, (string) $platform ) ); ?>">
									<span class="testro-web-platforms__check" aria-hidden="true">
										<?php /* Framer IconNode 19px stroke #4A72F2 width 2 — outline circle + tick, no fill. */ ?>
										<svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
											<circle cx="9.5" cy="9.5" r="8" stroke="#4A72F2" stroke-width="2"/>
											<path d="M5.6 9.8 8.3 12.5 13.6 6.9" stroke="#4A72F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
								</span>
							<?php endforeach; ?>
						</div>
					<?php endforeach; ?>

					<?php if ( '' !== $matrix_note ) : ?>
						<div class="testro-web-platforms__note" role="note">
							<span class="testro-web-platforms__note-dot" aria-hidden="true"></span>
							<span><?php echo esc_html( $matrix_note ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if ( $frameworks || $conditions || ! empty( $args['outro'] ) ) : ?>
				<div class="testro-web-platforms__explainer">
					<?php if ( ! empty( $args['outro'] ) ) : ?>
						<p class="testro-web-platforms__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>"><?php echo esc_html( (string) $args['outro'] ); ?></p>
					<?php endif; ?>

					<div class="testro-web-platforms__diagram" aria-hidden="true">
						<?php if ( $frameworks ) : ?>
							<ul class="testro-web-platforms__frameworks">
								<?php foreach ( $frameworks as $fw ) : ?>
									<li class="testro-web-platforms__chip testro-web-platforms__chip--fw"><?php echo esc_html( (string) $fw ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

						<span class="testro-web-platforms__hub">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
								<path d="M7 14.5 12 19.5 21 9.5" stroke="#fff" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</span>
						<span class="testro-web-platforms__hub-label"><?php echo esc_html( $hub_label ); ?></span>

						<?php if ( $conditions ) : ?>
							<ul class="testro-web-platforms__conditions">
								<?php foreach ( $conditions as $cond ) : ?>
									<li class="testro-web-platforms__chip testro-web-platforms__chip--cond"><?php echo esc_html( (string) $cond ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
