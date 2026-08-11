<?php
/**
 * Hero carousel section — single h1 on front page (first slide title).
 *
 * @package TestRo
 */

$slides = testro_get_hero_slides();
$count  = count( $slides );
?>
<section class="testro-hero" aria-roledescription="carousel" aria-label="<?php esc_attr_e( 'Hero highlights', 'testro' ); ?>">
	<div class="testro-hero__viewport" data-hero-viewport>
		<div class="testro-hero__track" data-hero-track>
		<?php foreach ( $slides as $index => $slide ) : ?>
			<?php
			$is_first       = ( 0 === $index );
			$heading        = $is_first ? 'h1' : 'h2';
			$cta_primary    = isset( $slide['cta'] ) ? $slide['cta'] : __( 'Start Testing', 'testro' );
			$cta_secondary  = isset( $slide['cta_secondary'] ) ? $slide['cta_secondary'] : __( 'Get a Demo', 'testro' );
			?>
			<div
				class="testro-hero__slide<?php echo $is_first ? ' is-active' : ''; ?>"
				data-hero-slide="<?php echo esc_attr( (string) $index ); ?>"
				role="group"
				aria-roledescription="slide"
				aria-label="<?php echo esc_attr( sprintf( /* translators: 1: current slide, 2: total */ __( 'Slide %1$d of %2$d', 'testro' ), $index + 1, $count ) ); ?>"
				aria-hidden="<?php echo $is_first ? 'false' : 'true'; ?>"
			>
				<ul class="testro-hero__badges" aria-label="<?php esc_attr_e( 'Highlights', 'testro' ); ?>">
					<?php foreach ( $slide['badges'] as $badge ) : ?>
						<li class="testro-hero__badge"><?php echo esc_html( $badge ); ?></li>
					<?php endforeach; ?>
				</ul>

				<p class="testro-hero__pill subtitle-pill"><?php echo esc_html( $slide['pill'] ); ?></p>

				<<?php echo esc_html( $heading ); ?> class="testro-hero__title gradient-text">
					<?php echo esc_html( $slide['title'] ); ?>
				</<?php echo esc_html( $heading ); ?>>

				<p class="testro-hero__sub"><?php echo esc_html( $slide['subtitle'] ); ?></p>

				<div class="testro-hero__actions">
					<?php
					get_template_part(
						'template-parts/components/primary-button',
						null,
						array(
							'label' => $cta_primary,
							'href'  => trailingslashit( home_url( '/' ) ) . '#pricing',
							'attrs' => array(
								'class' => 'testro-btn testro-btn--primary',
							),
						)
					);
					?>
					<button
						type="button"
						class="testro-btn testro-btn--outline testro-hero__cta-secondary"
						data-open-modal="demo-modal"
						aria-haspopup="dialog"
						aria-controls="demo-modal"
					>
						<span><?php echo esc_html( $cta_secondary ); ?></span>
					</button>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>

	<div class="testro-hero__indicators" data-hero-indicators role="group" aria-label="<?php esc_attr_e( 'Slide progress', 'testro' ); ?>">
		<?php foreach ( $slides as $index => $slide ) : ?>
			<button
				type="button"
				class="testro-hero__indicator is-pending"
				data-hero-indicator="<?php echo esc_attr( (string) $index ); ?>"
				aria-label="<?php echo esc_attr( sprintf( /* translators: %d: slide number */ __( 'Go to slide %d', 'testro' ), $index + 1 ) ); ?>"
				aria-current="<?php echo 0 === $index ? 'true' : 'false'; ?>"
			>
				<span class="testro-hero__indicator-track" aria-hidden="true">
					<svg class="testro-hero__indicator-circle" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
						<circle cx="12" cy="12" r="10"></circle>
					</svg>
					<svg class="testro-hero__indicator-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="10"></circle>
						<path d="m9 12 2 2 4-4"></path>
					</svg>
				</span>
			</button>
		<?php endforeach; ?>
	</div>
</section>
