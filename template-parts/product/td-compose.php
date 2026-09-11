<?php
/**
 * Test Development — Framer compositions (/features-tab/test-development).
 *
 * Variants:
 * - proof-split     Left copy + vertical hollow-marker timeline (pYO4jfzAN)
 * - nl-split        Chat demo panel + numbered capabilities (p5fDSvGbK)
 * - process-flow    Horizontal 01–04 steps on navy→cyan (jKIau9ekT)
 * - role-rows       Pill role label + title/desc rule rows (yifVABAd4)
 * - feature-split   Alternating media | feature list (afm6…MGaZaREz3)
 * - platform-band   Three dash-list columns on gradient (eMaQR9czK)
 * - integrations    Left copy + gradient tool pills (uH0gRXAZL)
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
$tone          = ! empty( $args['tone'] ) ? sanitize_html_class( (string) $args['tone'] ) : 'light';
$section_class = 'testro-prod-section testro-prod-td testro-prod-td--' . $variant;
if ( 'dark' === $tone ) {
	$section_class .= ' testro-prod-td--tone-dark';
}
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-td--tint';
}
$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$media_side = isset( $args['media_side'] ) && 'right' === $args['media_side'] ? 'right' : 'left';
$bubbles    = isset( $args['bubbles'] ) && is_array( $args['bubbles'] ) ? $args['bubbles'] : array();
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( 'proof-split' === $variant ) : ?>
			<?php /* Framer Built Before You Finish — gap 96, pad 72/80/100/80. */ ?>
			<div class="testro-prod-td__proof" data-reveal>
				<div class="testro-prod-td__proof-copy">
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
							'align'         => 'start',
						)
					);
					?>
				</div>
				<ol class="testro-prod-td__proof-timeline">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-td__proof-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<span class="testro-prod-td__proof-marker" aria-hidden="true"></span>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-td__proof-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-td__proof-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>

		<?php elseif ( 'nl-split' === $variant ) : ?>
			<?php /* Framer Natural Language — chat demo | copy, tint #F1F8FD, gap 96. */ ?>
			<?php
			$has_bubbles = false;
			foreach ( $bubbles as $bubble_check ) {
				if ( ! empty( $bubble_check['text'] ) ) {
					$has_bubbles = true;
					break;
				}
			}
			$demo_class = 'testro-prod-td__nl-demo' . ( $has_bubbles ? '' : ' testro-prod-td__nl-demo--panel' );
			?>
			<div class="testro-prod-td__nl testro-prod-td__nl--media-<?php echo esc_attr( $media_side ); ?>" data-reveal>
				<div class="<?php echo esc_attr( $demo_class ); ?>" aria-hidden="true">
					<?php if ( $has_bubbles ) : ?>
						<?php foreach ( $bubbles as $bubble ) : ?>
							<?php
							$tone_bubble = isset( $bubble['tone'] ) && 'user' === $bubble['tone'] ? 'user' : 'system';
							?>
							<span class="testro-prod-td__nl-bubble testro-prod-td__nl-bubble--<?php echo esc_attr( $tone_bubble ); ?>">
								<?php echo esc_html( isset( $bubble['text'] ) ? (string) $bubble['text'] : '' ); ?>
							</span>
						<?php endforeach; ?>
					<?php else : ?>
						<span class="testro-prod-td__nl-panel-stripes"></span>
					<?php endif; ?>
				</div>
				<div class="testro-prod-td__nl-copy">
					<?php
					get_template_part(
						'template-parts/product/section-header',
						null,
						array(
							'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
							'title'         => isset( $args['title'] ) ? $args['title'] : '',
							'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
							'heading_id'    => $heading_id,
							'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
							'align'         => 'start',
						)
					);
					?>
					<ol class="testro-prod-td__nl-list">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-prod-td__nl-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-td__nl-item-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-td__nl-item-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ol>
					<?php if ( ! empty( $args['outro'] ) ) : ?>
						<p class="testro-prod-td__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>

		<?php elseif ( 'process-flow' === $variant ) : ?>
			<?php /* Framer From Idea — pad 72/80, gap 36, cyan markers + connector. */ ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'tone'          => 'dark',
					'align'         => 'start',
				)
			);
			?>
			<ul class="testro-prod-td__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-td__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-td__flow-step" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-td__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-td__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'role-rows' === $variant ) : ?>
			<?php /* Framer Who Builds — maxW 1039, pill 159 + copy, soft Soft borders. */ ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => 'start',
				)
			);
			?>
			<ul class="testro-prod-td__roles">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-td__role" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<span class="testro-prod-td__role-pill"><?php echo esc_html( isset( $item['label'] ) ? (string) $item['label'] : '' ); ?></span>
						<div class="testro-prod-td__role-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-td__role-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-td__role-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'feature-split' === $variant ) : ?>
			<?php /* Framer zigzag feature rows — gap 96, pad 88/80, striped media. */ ?>
			<div class="testro-prod-td__feature testro-prod-td__feature--media-<?php echo esc_attr( $media_side ); ?>" data-reveal>
				<div class="testro-prod-td__feature-media" aria-hidden="true">
					<span class="testro-prod-td__media-frame">
						<span class="testro-prod-td__media-stripes"></span>
					</span>
				</div>
				<div class="testro-prod-td__feature-copy">
					<?php
					get_template_part(
						'template-parts/product/section-header',
						null,
						array(
							'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
							'title'         => isset( $args['title'] ) ? $args['title'] : '',
							'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
							'heading_id'    => $heading_id,
							'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
							'align'         => 'start',
						)
					);
					?>
					<ul class="testro-prod-td__feature-list">
						<?php foreach ( $items as $index => $item ) : ?>
							<li class="testro-prod-td__feature-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-td__feature-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-td__feature-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php if ( ! empty( $args['outro'] ) ) : ?>
						<p class="testro-prod-td__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>

		<?php elseif ( 'platform-band' === $variant ) : ?>
			<?php /* Framer Workflow Overview — pad 48/56/72, gap 64, 3 columns. */ ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'tone'          => 'dark',
					'align'         => 'start',
				)
			);
			?>
			<div class="testro-prod-td__platform">
				<?php foreach ( $items as $index => $item ) : ?>
					<div class="testro-prod-td__platform-col" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-td__platform-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['points'] ) && is_array( $item['points'] ) ) : ?>
							<ul class="testro-prod-td__platform-list">
								<?php foreach ( $item['points'] as $point ) : ?>
									<li><?php echo esc_html( (string) $point ); ?></li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-td__outro testro-prod-td__outro--on-dark" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'integrations' === $variant ) : ?>
			<?php /* Framer Fits Into Workflow — brief 390px | pill grid gap 34. */ ?>
			<div class="testro-prod-td__integrations" data-reveal>
				<div class="testro-prod-td__integrations-copy">
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
							'align'         => 'start',
						)
					);
					?>
				</div>
				<ul class="testro-prod-td__integrations-grid">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-td__integrations-pill" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<?php echo esc_html( isset( $item['title'] ) ? (string) $item['title'] : '' ); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php endif; ?>
	</div>
</section>
