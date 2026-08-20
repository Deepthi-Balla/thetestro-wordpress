<?php
/**
 * Case studies section — success story cards with metrics.
 *
 * Optional $args:
 * - eyebrow / title / intro (string) Header overrides.
 * - items (array) Story overrides.
 * - cta_mode (string) 'hub' (default, link to case-studies page) | 'demo' (open demo modal).
 *
 * @package TestRo
 */

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$data     = function_exists( 'testro_get_case_studies' ) ? testro_get_case_studies() : array();
$items    = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : ( isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array() );
$eyebrow  = array_key_exists( 'eyebrow', $args ) ? (string) $args['eyebrow'] : ( isset( $data['eyebrow'] ) ? $data['eyebrow'] : '' );
$title    = array_key_exists( 'title', $args ) ? (string) $args['title'] : ( isset( $data['title'] ) ? $data['title'] : '' );
$intro    = array_key_exists( 'intro', $args ) ? (string) $args['intro'] : ( isset( $data['intro'] ) ? $data['intro'] : '' );
$cta_mode = isset( $args['cta_mode'] ) ? (string) $args['cta_mode'] : 'hub';

if ( ! $items ) {
	return;
}

$cta_url = function_exists( 'testro_nav_url' ) ? testro_nav_url( 'case-studies' ) : home_url( '/case-studies/' );
?>
<section class="testro-case-studies linear-background" id="case-studies" aria-labelledby="case-studies-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-case-studies__header">
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="subtitle-pill testro-section-eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $title ) : ?>
				<h2 id="case-studies-heading" class="gradient-text main-headings"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $intro ) : ?>
				<p class="sub-text"><?php echo esc_html( $intro ); ?></p>
			<?php endif; ?>
		</header>

		<ul class="testro-case-studies__grid">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$item_href = ! empty( $item['href'] ) ? (string) $item['href'] : '';
				$use_demo  = 'demo' === $cta_mode && '' === $item_href;
				$client    = isset( $item['client'] ) ? (string) $item['client'] : '';
				$logo_alt  = '' !== $client
					? sprintf(
						/* translators: %s: customer name */
						__( '%s customer success story — theTestRo test automation case study', 'testro' ),
						$client
					)
					: __( 'theTestRo customer test automation case study', 'testro' );
				?>
				<li class="testro-case-studies__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
					<article class="testro-case-studies__article">
					<div class="testro-case-studies__top">
						<?php if ( ! empty( $item['logo'] ) ) : ?>
							<span class="testro-case-studies__logo">
								<?php
								echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									$item['logo'],
									$logo_alt,
									array(
										'width'   => 120,
										'height'  => 40,
										'loading' => 'lazy',
									)
								);
								?>
							</span>
						<?php else : ?>
							<span class="testro-case-studies__client-name"><?php echo esc_html( $client ); ?></span>
						<?php endif; ?>
					</div>

					<?php if ( ! empty( $item['metrics'] ) && is_array( $item['metrics'] ) ) : ?>
						<ul class="testro-case-studies__metrics">
							<?php foreach ( $item['metrics'] as $metric ) : ?>
								<li><?php echo esc_html( $metric ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<h3 class="testro-case-studies__title"><?php echo esc_html( $client ); ?></h3>
					<p class="testro-case-studies__summary"><?php echo esc_html( $item['summary'] ); ?></p>

					<?php if ( $use_demo ) : ?>
						<button
							type="button"
							class="testro-case-studies__cta"
							data-open-modal="demo-modal"
							aria-haspopup="dialog"
							aria-controls="demo-modal"
						>
							<span><?php esc_html_e( 'Talk to an Expert', 'testro' ); ?></span>
							<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</button>
					<?php else : ?>
						<a class="testro-case-studies__cta" href="<?php echo esc_url( $item_href ? $item_href : $cta_url ); ?>">
							<span><?php echo esc_html( $item_href ? __( 'Read case study', 'testro' ) : __( 'Explore case studies', 'testro' ) ); ?></span>
							<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</a>
					<?php endif; ?>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
