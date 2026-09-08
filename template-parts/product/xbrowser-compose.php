<?php
/**
 * Cross-Browser Testing Framer compositions.
 *
 * @package TestRo
 */

$args    = isset( $args ) && is_array( $args ) ? $args : array();
$variant = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : '';
$id      = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$items   = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();

if ( '' === $variant ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-xbrowser testro-prod-xbrowser--' . $variant;
$item_level    = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag      = 'h' . $item_level;
$tone          = ! empty( $args['tone'] ) ? (string) $args['tone'] : 'light';
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'         => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
				'tone'          => $tone,
				'align'         => isset( $args['align'] ) ? $args['align'] : 'start',
			)
		);
		?>

		<?php if ( 'capability-grid' === $variant ) : ?>
			<?php
			$card_fill  = isset( $args['card_fill'] ) ? sanitize_html_class( (string) $args['card_fill'] ) : 'white';
			$icon_tone  = isset( $args['icon_tone'] ) ? sanitize_html_class( (string) $args['icon_tone'] ) : ( 'white' === $card_fill ? 'gradient' : 'navy' );
			$icon_size  = isset( $args['icon_size'] ) ? (int) $args['icon_size'] : 22;
			?>
			<ul class="testro-prod-xbrowser__cap-grid testro-prod-xbrowser__cap-grid--<?php echo esc_attr( $card_fill ); ?> testro-prod-xbrowser__cap-grid--icon-<?php echo esc_attr( $icon_tone ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-xbrowser__cap-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-xbrowser__cap-icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => $icon_size ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-xbrowser__cap-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-xbrowser__cap-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-xbrowser__cap-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'how-timeline' === $variant ) : ?>
			<ol class="testro-prod-xbrowser__timeline">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-xbrowser__timeline-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-xbrowser__timeline-marker" aria-hidden="true"></span>
						<span class="testro-prod-xbrowser__timeline-num" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-xbrowser__timeline-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-xbrowser__timeline-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>

		<?php elseif ( 'audience-row' === $variant ) : ?>
			<ul class="testro-prod-xbrowser__audience">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-xbrowser__audience-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-xbrowser__cap-icon testro-prod-xbrowser__cap-icon--navy" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-xbrowser__cap-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-xbrowser__cap-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-xbrowser__cap-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'ai-row' === $variant ) : ?>
			<ul class="testro-prod-xbrowser__ai-row">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-xbrowser__ai-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-xbrowser__cap-icon testro-prod-xbrowser__cap-icon--navy" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-xbrowser__cap-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-xbrowser__cap-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-xbrowser__cap-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'feature-card-row' === $variant ) : ?>
			<?php
			/* Framer Feature Card 2 instances — icon tile 46×42 + copy. */
			$row_mod = ! empty( $args['card_width'] ) && 'fixed' === $args['card_width'] ? 'fixed' : 'fluid';
			?>
			<ul class="testro-prod-xbrowser__feature-row testro-prod-xbrowser__feature-row--<?php echo esc_attr( $row_mod ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-xbrowser__feature-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-xbrowser__feature-tile" aria-hidden="true">
							<?php
							$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'code';
							echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							?>
						</span>
						<div class="testro-prod-xbrowser__feature-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-xbrowser__feature-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-xbrowser__feature-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'scale-parallel' === $variant ) : ?>
			<?php /* Framer Feature Card 2 with navy number tiles (01–03), not Lucide icons. */ ?>
			<ol class="testro-prod-xbrowser__scale-stack">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-xbrowser__scale-card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-xbrowser__scale-tile" aria-hidden="true">
							<span class="testro-prod-xbrowser__scale-num"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
						</span>
						<div class="testro-prod-xbrowser__scale-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-xbrowser__scale-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-xbrowser__scale-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ol>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-xbrowser__scale-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'catch-release' === $variant ) : ?>
			<?php if ( ! empty( $args['statement'] ) ) : ?>
				<div class="testro-prod-xbrowser__statement" data-reveal>
					<p><?php echo esc_html( (string) $args['statement'] ); ?></p>
				</div>
			<?php endif; ?>

		<?php elseif ( 'debug-browser' === $variant ) : ?>
			<div class="testro-prod-xbrowser__debug" data-reveal>
				<div class="testro-prod-xbrowser__playback" aria-hidden="true">
					<ul class="testro-prod-xbrowser__tabs">
						<li class="is-active"><?php esc_html_e( 'Chrome', 'testro' ); ?></li>
						<li><?php esc_html_e( 'Safari', 'testro' ); ?></li>
						<li><?php esc_html_e( 'Firefox', 'testro' ); ?></li>
						<li><?php esc_html_e( 'Edge', 'testro' ); ?></li>
					</ul>
					<div class="testro-prod-xbrowser__frame">
						<span class="testro-prod-xbrowser__play"><?php esc_html_e( '▶ playback · frame 0:14', 'testro' ); ?></span>
					</div>
				</div>
				<ol class="testro-prod-xbrowser__benefits">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-xbrowser__benefit">
							<span class="testro-prod-xbrowser__benefit-rail" aria-hidden="true">
								<span class="testro-prod-xbrowser__benefit-num"><span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span></span>
							</span>
							<div class="testro-prod-xbrowser__benefit-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-xbrowser__benefit-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-xbrowser__benefit-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-xbrowser__debug-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( ! empty( $args['outro'] ) && ! in_array( $variant, array( 'scale-parallel', 'debug-browser' ), true ) ) : ?>
			<p class="testro-prod-xbrowser__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
