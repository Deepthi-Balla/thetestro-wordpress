<?php
/**
 * Self-Healing Automation — Framer compositions (/features-tab/self-healing-automation-tool).
 *
 * Variants:
 * - stability-timeline  Vertical numbered flow with connector (G9kzMV4BD)
 * - split-numbered      Media panel + numbered benefit rows (locator / diagnostics / enterprise)
 * - zigzag-timeline     Alternating L/R recovery timeline (J54n4VJGf)
 * - alt-media-rows      Alternating media/text cards (a5RjPu4_E)
 * - exec-flow           Horizontal numbered connector + stages (K4HbvYdhk)
 * - feature-cards       Feature Card 2 grid (ESpIAn3NI)
 * - why-rows            Title | description rule rows (o5mAvJfPU)
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
$section_class = 'testro-prod-section testro-prod-heal testro-prod-heal--' . $variant;
if ( 'dark' === $tone ) {
	$section_class .= ' testro-prod-heal--tone-dark';
}
$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$media_side = isset( $args['media_side'] ) && 'right' === $args['media_side'] ? 'right' : 'left';
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
				'tone'          => 'dark' === $tone ? 'dark' : 'light',
				'align'         => isset( $args['align'] ) ? $args['align'] : 'start',
			)
		);
		?>

		<?php if ( 'stability-timeline' === $variant ) : ?>
			<?php /* Framer DevOps Flow: left pad 48, numbered steps + hollow markers on vertical rule. */ ?>
			<ol class="testro-prod-heal__timeline">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-heal__timeline-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-heal__timeline-marker" aria-hidden="true"></span>
						<div class="testro-prod-heal__timeline-heading">
							<span class="testro-prod-heal__timeline-num" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-heal__timeline-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						</div>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-heal__timeline-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ol>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-heal__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'split-numbered' === $variant ) : ?>
			<?php /* Framer Validation Detail Layout: gap 56 — media 44% | numbered benefits. */ ?>
			<div class="testro-prod-heal__split testro-prod-heal__split--media-<?php echo esc_attr( $media_side ); ?>" data-reveal>
				<div class="testro-prod-heal__media" aria-hidden="true">
					<span class="testro-prod-heal__media-frame">
						<span class="testro-prod-heal__media-stripes"></span>
					</span>
				</div>
				<ol class="testro-prod-heal__benefits">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-heal__benefit" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
							<span class="testro-prod-heal__benefit-num" aria-hidden="true"><span><?php echo esc_html( (string) ( $index + 1 ) ); ?></span></span>
							<div class="testro-prod-heal__benefit-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-heal__benefit-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-heal__benefit-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>

		<?php elseif ( 'zigzag-timeline' === $variant ) : ?>
			<?php /* Framer Feature Timeline: center rule + alternating copy rows, height ~132. */ ?>
			<div class="testro-prod-heal__zigzag" data-reveal>
				<span class="testro-prod-heal__zigzag-rule" aria-hidden="true"></span>
				<ul class="testro-prod-heal__zigzag-list">
					<?php foreach ( $items as $index => $item ) : ?>
						<?php $side = ( 0 === $index % 2 ) ? 'left' : 'right'; ?>
						<li class="testro-prod-heal__zigzag-item testro-prod-heal__zigzag-item--<?php echo esc_attr( $side ); ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<span class="testro-prod-heal__zigzag-dot" aria-hidden="true"></span>
							<div class="testro-prod-heal__zigzag-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-heal__zigzag-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-heal__zigzag-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>

		<?php elseif ( 'alt-media-rows' === $variant ) : ?>
			<?php /* Framer alternating cards: media | copy, then copy | media. */ ?>
			<ul class="testro-prod-heal__alt-rows">
				<?php foreach ( $items as $index => $item ) : ?>
					<?php $flip = ( 1 === $index % 2 ); ?>
					<li class="testro-prod-heal__alt-row<?php echo $flip ? ' testro-prod-heal__alt-row--flip' : ''; ?>" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<div class="testro-prod-heal__alt-media" aria-hidden="true">
							<span class="testro-prod-heal__media-stripes"></span>
						</div>
						<div class="testro-prod-heal__alt-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-heal__alt-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-heal__alt-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'exec-flow' === $variant ) : ?>
			<?php /* Same Framer Workflow Flow pattern as TM agents-flow; labels hidden in Framer. */ ?>
			<div class="testro-prod-heal__flow" aria-hidden="true">
				<span class="testro-prod-heal__flow-line"></span>
				<?php foreach ( $items as $index => $item ) : ?>
					<span class="testro-prod-heal__flow-step"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
				<?php endforeach; ?>
			</div>
			<ul class="testro-prod-heal__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-heal__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-heal__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-heal__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-heal__outro testro-prod-heal__outro--flow" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'feature-cards' === $variant ) : ?>
			<?php /* Framer Feature Card 2 — tint fill, cyan icon tile 46×42 r10. */ ?>
			<ul class="testro-prod-heal__cards">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-heal__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-heal__card-tile" aria-hidden="true">
							<?php
							$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'code';
							echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							?>
						</span>
						<div class="testro-prod-heal__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-heal__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-heal__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-heal__outro testro-prod-heal__outro--center" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'why-rows' === $variant ) : ?>
			<?php /* Framer Debug Capabilities: horizontal title 300px | description, rule borders. */ ?>
			<ul class="testro-prod-heal__why">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-heal__why-row" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-heal__why-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-heal__why-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
