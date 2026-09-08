<?php
/**
 * AI Test Management — Framer compositions (/features-tab/ai-test-managment).
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
$section_class = 'testro-prod-section testro-prod-tm testro-prod-tm--' . $variant;
$item_level    = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag      = 'h' . $item_level;
$tone          = ! empty( $args['tone'] ) ? (string) $args['tone'] : 'light';
$image         = isset( $args['image'] ) ? (string) $args['image'] : '';
$image_alt     = isset( $args['image_alt'] ) ? (string) $args['image_alt'] : '';
$panel         = isset( $args['panel'] ) && is_array( $args['panel'] ) ? $args['panel'] : array();
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( 'what-split' !== $variant ) : ?>
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
		<?php endif; ?>

		<?php if ( 'what-split' === $variant ) : ?>
			<div class="testro-prod-tm__what" data-reveal>
				<?php if ( $image ) : ?>
					<figure class="testro-prod-tm__what-media">
						<img
							src="<?php echo esc_url( $image ); ?>"
							alt="<?php echo esc_attr( $image_alt ); ?>"
							width="545"
							height="485"
							loading="lazy"
							decoding="async"
						/>
					</figure>
				<?php endif; ?>
				<div class="testro-prod-tm__what-copy">
					<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
						<p class="testro-prod-tm__what-eyebrow"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
					<?php endif; ?>
					<?php
					$h_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
					$h_tag   = 'h' . $h_level;
					?>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
					<<?php echo $h_tag; ?> class="testro-prod-tm__what-title" id="<?php echo esc_attr( $heading_id ); ?>"><?php echo esc_html( (string) $args['title'] ); ?></<?php echo $h_tag; ?>>
					<?php if ( ! empty( $args['intro'] ) ) : ?>
						<p class="testro-prod-tm__what-desc"><?php echo esc_html( (string) $args['intro'] ); ?></p>
					<?php endif; ?>
					<?php if ( ! empty( $args['intro_extra'] ) ) : ?>
						<p class="testro-prod-tm__what-desc testro-prod-tm__what-desc--body"><?php echo esc_html( (string) $args['intro_extra'] ); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-tm__what-outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'agents-flow' === $variant ) : ?>
			<?php
			/* Framer Workflow Flow: absolute step circles over a connector line, then 4 stage columns. */
			?>
			<div class="testro-prod-tm__flow" aria-hidden="true">
				<span class="testro-prod-tm__flow-line"></span>
				<?php foreach ( $items as $index => $item ) : ?>
					<span class="testro-prod-tm__flow-step"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
				<?php endforeach; ?>
			</div>
			<ul class="testro-prod-tm__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-tm__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! empty( $item['label'] ) ) : ?>
							<p class="testro-prod-tm__stage-label"><?php echo esc_html( (string) $item['label'] ); ?></p>
						<?php endif; ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-tm__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-tm__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<div class="testro-prod-tm__outro-wrap testro-prod-tm__outro-wrap--start">
					<p class="testro-prod-tm__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
				</div>
			<?php endif; ?>

		<?php elseif ( 'split-safeguards' === $variant ) : ?>
			<div class="testro-prod-tm__split" data-reveal>
				<ol class="testro-prod-tm__safeguards">
					<?php foreach ( $items as $index => $item ) : ?>
						<?php
						/* Framer alternates title color: odd=navy, even=cyan (1-based). */
						$title_tone = ( 0 === ( $index % 2 ) ) ? 'navy' : 'cyan';
						?>
						<li class="testro-prod-tm__safeguard">
							<span class="testro-prod-tm__safeguard-num" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
							<div class="testro-prod-tm__safeguard-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-tm__safeguard-title testro-prod-tm__safeguard-title--<?php echo esc_attr( $title_tone ); ?>"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-tm__safeguard-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
				<?php if ( ! empty( $panel['type'] ) && 'repo' === $panel['type'] ) : ?>
					<div class="testro-prod-tm__panel testro-prod-tm__panel--repo" aria-hidden="true">
						<?php if ( ! empty( $panel['rows'] ) && is_array( $panel['rows'] ) ) : ?>
							<ul class="testro-prod-tm__panel-rows">
								<?php foreach ( $panel['rows'] as $row ) : ?>
									<li>
										<code><?php echo esc_html( (string) $row['id'] ); ?></code>
										<span><?php echo esc_html( (string) $row['label'] ); ?></span>
										<em><?php echo esc_html( (string) $row['meta'] ); ?></em>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<?php if ( ! empty( $panel['footer'] ) ) : ?>
							<p class="testro-prod-tm__panel-sync"><strong><?php esc_html_e( 'SYNCED', 'testro' ); ?></strong> <?php echo esc_html( (string) $panel['footer'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php elseif ( ! empty( $panel['type'] ) && 'sources' === $panel['type'] ) : ?>
					<div class="testro-prod-tm__panel testro-prod-tm__panel--sources" aria-hidden="true">
						<?php if ( ! empty( $panel['files'] ) && is_array( $panel['files'] ) ) : ?>
							<ul class="testro-prod-tm__panel-files">
								<?php foreach ( $panel['files'] as $file ) : ?>
									<li>
										<span class="testro-prod-tm__panel-badge"><?php echo esc_html( (string) $file['badge'] ); ?></span>
										<span><?php echo esc_html( (string) $file['name'] ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						<p class="testro-prod-tm__panel-generates"><?php echo esc_html( isset( $panel['action'] ) ? (string) $panel['action'] : __( 'generates', 'testro' ) ); ?></p>
						<?php if ( ! empty( $panel['footer'] ) ) : ?>
							<p class="testro-prod-tm__panel-sync"><strong><?php esc_html_e( 'SYNCED', 'testro' ); ?></strong> <?php echo esc_html( (string) $panel['footer'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $args['closing'] ) ) : ?>
				<p class="testro-prod-tm__closing" data-reveal><?php echo esc_html( (string) $args['closing'] ); ?></p>
			<?php endif; ?>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<?php
				/* Framer Workflow Closing Note: stackAlignment=end, footer max-width 700. */
				?>
				<div class="testro-prod-tm__outro-wrap testro-prod-tm__outro-wrap--end">
					<p class="testro-prod-tm__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
				</div>
			<?php endif; ?>

		<?php elseif ( 'feature-cards' === $variant ) : ?>
			<?php
			$card_fill = isset( $args['card_fill'] ) ? sanitize_html_class( (string) $args['card_fill'] ) : 'tint';
			?>
			<ul class="testro-prod-tm__cards testro-prod-tm__cards--<?php echo esc_attr( $card_fill ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-tm__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-tm__card-tile" aria-hidden="true">
							<?php
							$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'code';
							echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
							?>
						</span>
						<div class="testro-prod-tm__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-tm__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-tm__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<div class="testro-prod-tm__outro-wrap testro-prod-tm__outro-wrap--end">
					<p class="testro-prod-tm__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
