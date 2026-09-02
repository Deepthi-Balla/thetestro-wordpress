<?php
/**
 * Product overview section — intro, three feature cards, closing line.
 *
 * @package TestRo
 */

$data     = testro_get_overview();
$eyebrow  = isset( $data['eyebrow'] ) ? (string) $data['eyebrow'] : '';
$title    = isset( $data['title'] ) ? (string) $data['title'] : '';
$intro    = isset( $data['intro'] ) ? (string) $data['intro'] : '';
$closing  = isset( $data['closing'] ) ? (string) $data['closing'] : '';
$cards    = isset( $data['cards'] ) && is_array( $data['cards'] ) ? $data['cards'] : array();

if ( '' === $title && ! $cards ) {
	return;
}
?>
<section class="testro-overview" id="overview" aria-labelledby="overview-heading">
	<div class="testro-overview__inner">
		<header class="testro-overview__intro" data-reveal>
			<?php if ( '' !== $eyebrow ) : ?>
				<p class="testro-overview__label"><?php echo esc_html( $eyebrow ); ?></p>
			<?php endif; ?>
			<?php if ( '' !== $title ) : ?>
				<h2 id="overview-heading" class="testro-overview__title"><?php echo esc_html( $title ); ?></h2>
			<?php endif; ?>
			<?php if ( '' !== $intro ) : ?>
				<p class="testro-overview__desc"><?php echo esc_html( $intro ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( $cards ) : ?>
			<ul class="testro-overview__cards">
				<?php foreach ( $cards as $index => $card ) : ?>
					<?php
					$variant     = isset( $card['variant'] ) && 'dark' === $card['variant'] ? 'dark' : 'light';
					$card_title  = isset( $card['title'] ) ? (string) $card['title'] : '';
					$card_desc   = isset( $card['description'] ) ? (string) $card['description'] : '';
					$visual      = isset( $card['visual'] ) ? (string) $card['visual'] : '';
					$suites      = isset( $card['suites'] ) && is_array( $card['suites'] ) ? $card['suites'] : array();
					$badge       = isset( $card['badge'] ) ? (string) $card['badge'] : '';
					$image       = isset( $card['image'] ) ? (string) $card['image'] : '';
					$image_alt   = isset( $card['image_alt'] ) ? (string) $card['image_alt'] : '';
					$image_w     = isset( $card['image_width'] ) ? (int) $card['image_width'] : 0;
					$image_h     = isset( $card['image_height'] ) ? (int) $card['image_height'] : 0;
					$card_class  = 'testro-overview-card testro-overview-card--' . $variant;
					?>
					<li class="<?php echo esc_attr( $card_class ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 80 ) ); ?>ms">
						<?php if ( '' !== $card_title ) : ?>
							<h3 class="testro-overview-card__title"><?php echo esc_html( $card_title ); ?></h3>
						<?php endif; ?>
						<?php if ( '' !== $card_desc ) : ?>
							<p class="testro-overview-card__desc"><?php echo esc_html( $card_desc ); ?></p>
						<?php endif; ?>

						<?php if ( 'suites' === $visual && $suites ) : ?>
							<div class="testro-overview-card__visual testro-overview-card__visual--suites" aria-hidden="true">
								<ul class="testro-overview-card__suites">
									<?php foreach ( $suites as $suite ) : ?>
										<?php
										$icon   = isset( $suite['icon'] ) ? (string) $suite['icon'] : '';
										$label  = isset( $suite['label'] ) ? (string) $suite['label'] : '';
										$status = isset( $suite['status'] ) ? (string) $suite['status'] : '';
										?>
										<li class="testro-overview-card__suite">
											<span class="testro-overview-card__suite-icon">
												<?php echo testro_icon( $icon, array( 'size' => 12, 'stroke' => 2.25 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
											</span>
											<span class="testro-overview-card__suite-label"><?php echo esc_html( $label ); ?></span>
											<span class="testro-overview-card__suite-status"><?php echo esc_html( $status ); ?></span>
										</li>
									<?php endforeach; ?>
								</ul>
								<?php if ( '' !== $badge ) : ?>
									<p class="testro-overview-card__badge">
										<span class="testro-overview-card__badge-check" aria-hidden="true">✓</span>
										<?php echo esc_html( $badge ); ?>
									</p>
								<?php endif; ?>
							</div>
						<?php elseif ( 'image' === $visual && '' !== $image ) : ?>
							<div class="testro-overview-card__visual testro-overview-card__visual--image" aria-hidden="true">
								<?php
								$img_attrs = array(
									'class'   => 'testro-overview-card__image',
									'loading' => 'lazy',
								);
								if ( $image_w ) {
									$img_attrs['width'] = $image_w;
								}
								if ( $image_h ) {
									$img_attrs['height'] = $image_h;
								}
								echo testro_picture( $image, $image_alt, $img_attrs ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped inside helper.
								?>
							</div>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( '' !== $closing ) : ?>
			<p class="testro-overview__closing" data-reveal>
				<span class="testro-overview__closing-text">&ldquo;<?php echo esc_html( $closing ); ?>&rdquo;</span>
			</p>
		<?php endif; ?>
	</div>
</section>
