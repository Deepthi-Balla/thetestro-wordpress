<?php
/**
 * Hero / Platform Opening — Framer redesign.
 * Single h1 on the front page; split copy + capability canvas.
 *
 * @package TestRo
 */

$slides = testro_get_hero_slides();
$slide  = isset( $slides[0] ) && is_array( $slides[0] ) ? $slides[0] : array();

$title            = isset( $slide['title'] ) ? (string) $slide['title'] : __( 'Best Test Automation Platform for Modern Software Testing', 'testro' );
$subtitle         = isset( $slide['subtitle'] ) ? (string) $slide['subtitle'] : '';
$cta_primary      = isset( $slide['cta'] ) ? (string) $slide['cta'] : __( 'Start Testing', 'testro' );
$cta_secondary    = isset( $slide['cta_secondary'] ) ? (string) $slide['cta_secondary'] : __( 'Get a Demo', 'testro' );
$supporting_line  = isset( $slide['supporting_line'] ) ? (string) $slide['supporting_line'] : '';
$canvas_badges    = isset( $slide['canvas_badges'] ) && is_array( $slide['canvas_badges'] )
	? $slide['canvas_badges']
	: array(
		array( 'label' => __( 'AI Authoring', 'testro' ), 'tone' => 'light' ),
		array( 'label' => __( 'Self-Healing', 'testro' ), 'tone' => 'dark' ),
		array( 'label' => __( 'No-Code Tests', 'testro' ), 'tone' => 'light' ),
		array( 'label' => __( 'CI/CD Ready', 'testro' ), 'tone' => 'dark' ),
	);
?>
<section class="testro-hero" aria-labelledby="hero-heading">
	<div class="testro-container testro-hero__layout">
		<div class="testro-hero__copy">
			<h1 id="hero-heading" class="testro-hero__title"><?php echo esc_html( $title ); ?></h1>

			<?php if ( '' !== $subtitle ) : ?>
				<p class="testro-hero__sub"><?php echo esc_html( $subtitle ); ?></p>
			<?php endif; ?>

			<div class="testro-hero__actions">
				<?php
				get_template_part(
					'template-parts/components/primary-button',
					null,
					array(
						'label'      => $cta_primary,
						'href'       => '#final-cta',
						'with_arrow' => false,
						'attrs'      => array(
							'class' => 'testro-btn testro-btn--primary',
						),
					)
				);

				get_template_part(
					'template-parts/components/primary-button',
					null,
					array(
						'label'      => $cta_secondary,
						'with_arrow' => false,
						'attrs'      => array(
							'class'           => 'testro-btn testro-btn--secondary',
							'data-open-modal' => 'demo-modal',
							'aria-haspopup'   => 'dialog',
							'aria-controls'   => 'demo-modal',
						),
					)
				);
				?>
			</div>

			<?php if ( '' !== $supporting_line ) : ?>
				<p class="testro-hero__supporting testro-hero__supporting--pill"><?php echo esc_html( $supporting_line ); ?></p>
			<?php endif; ?>
		</div>

		<div class="testro-hero__visual" aria-hidden="true">
			<div class="testro-hero-canvas">
				<div class="testro-hero-canvas__grid"></div>
				<ul class="testro-hero-canvas__chips">
					<?php foreach ( $canvas_badges as $badge ) : ?>
						<?php
						$label = isset( $badge['label'] ) ? (string) $badge['label'] : '';
						$tone  = isset( $badge['tone'] ) ? (string) $badge['tone'] : 'light';
						if ( '' === $label ) {
							continue;
						}
						?>
						<li class="testro-hero-canvas__chip testro-hero-canvas__chip--<?php echo esc_attr( $tone ); ?>">
							<?php echo esc_html( $label ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
</section>
