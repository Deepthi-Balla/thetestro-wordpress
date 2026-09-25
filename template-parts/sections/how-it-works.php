<?php
/**
 * How it works — Framer Zg2v_q3Jm / VEyT2cC7G
 * Uses global process-flow utility: .testro-process-flow
 *
 * @package TestRo
 */

$steps = testro_get_how_it_works();
$count = count( $steps );
?>
<div id="how-it-works">
	<section class="testro-how testro-how--framer" aria-labelledby="how-heading">
		<div class="testro-container">
			<header class="testro-section-header testro-how__header">
				<h2 id="how-heading" class="main-headings testro-how__title-heading"><?php echo esc_html( testro_section_label_title( __( 'HOW IT WORKS', 'testro' ) ) ); ?></h2>
				<p class="sub-text testro-how__headline"><?php esc_html_e( 'Four Simple Steps to Better Testing', 'testro' ); ?></p>
			</header>

			<div class="testro-process-flow">
				<ol
					class="testro-process-flow__track"
					style="--process-count: <?php echo esc_attr( (string) max( 1, $count ) ); ?>"
				>
					<?php foreach ( $steps as $index => $step ) : ?>
						<?php
						$num = isset( $step['step'] ) ? (string) $step['step'] : (string) ( $index + 1 );
						if ( ctype_digit( $num ) ) {
							$num = sprintf( '%02d', (int) $num );
						}
						?>
						<li class="testro-process-flow__step">
							<span class="testro-process-flow__num" aria-hidden="true"><?php echo esc_html( $num ); ?></span>
							<div class="testro-process-flow__body">
								<h3 class="testro-process-flow__title"><?php echo esc_html( $step['title'] ); ?></h3>
								<p class="testro-process-flow__desc"><?php echo esc_html( $step['description'] ); ?></p>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</section>
</div>
