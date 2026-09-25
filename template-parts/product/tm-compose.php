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
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-tm--tint';
}
$item_level = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag   = 'h' . $item_level;
$image      = isset( $args['image'] ) ? (string) $args['image'] : '';
$image_alt  = isset( $args['image_alt'] ) ? (string) $args['image_alt'] : '';
$panel      = isset( $args['panel'] ) && is_array( $args['panel'] ) ? $args['panel'] : array();
/* Agents flow reuses TE How Test Execution Works header + stage layout. */
$skip_three_line = in_array( $variant, array( 'what-split', 'agents-flow' ), true );
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( ! $skip_three_line ) : ?>
			<?php
			/*
			 * Three-line header: eyebrow is the heading, title is the second line,
			 * intro is the cyan third line. Same structure as Home → Why theTestRo.
			 */
			$line_heading = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
			$line_two     = isset( $args['title'] ) ? (string) $args['title'] : '';
			$line_three   = isset( $args['intro'] ) ? (string) $args['intro'] : '';
			if ( '' === $line_heading ) {
				$line_heading = $line_two;
				$line_two     = $line_three;
				$line_three   = isset( $args['intro_extra'] ) ? (string) $args['intro_extra'] : '';
			}
			$three_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
			$three_tag   = 'h' . $three_level;
			?>
			<header class="testro-section-header testro-section-header--three-lines testro-why__header" data-reveal>
				<?php if ( '' !== $line_heading ) : ?>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
					<<?php echo $three_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="main-headings testro-why__heading"><?php echo esc_html( testro_section_label_title( $line_heading ) ); ?></<?php echo $three_tag; ?>>
				<?php endif; ?>
				<?php if ( '' !== $line_two ) : ?>
					<p class="sub-text testro-why__intro"><?php echo esc_html( $line_two ); ?></p>
				<?php endif; ?>
				<?php if ( '' !== $line_three ) : ?>
					<p class="sub-text testro-why__intro"><?php echo esc_html( $line_three ); ?></p>
				<?php endif; ?>
			</header>
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
					<?php
					/*
					 * intro and intro_body are separate keys. A second 'intro' key in
					 * the content array overwrites the first, so an added paragraph
					 * belongs in intro_body (or an intros list).
					 */
					$what_intros = array();
					foreach ( array( 'intro', 'intro_body' ) as $intro_key ) {
						if ( empty( $args[ $intro_key ] ) ) {
							continue;
						}
						$intro_value = $args[ $intro_key ];
						if ( is_array( $intro_value ) ) {
							foreach ( $intro_value as $intro_line ) {
								$intro_line = trim( (string) $intro_line );
								if ( '' !== $intro_line ) {
									$what_intros[] = $intro_line;
								}
							}
						} else {
							$what_intros[] = (string) $intro_value;
						}
					}
					if ( ! empty( $args['intros'] ) && is_array( $args['intros'] ) ) {
						foreach ( $args['intros'] as $intro_line ) {
							$intro_line = trim( (string) $intro_line );
							if ( '' !== $intro_line ) {
								$what_intros[] = $intro_line;
							}
						}
					}
					?>
					<?php foreach ( $what_intros as $what_intro ) : ?>
						<p class="testro-prod-tm__what-desc"><?php echo esc_html( $what_intro ); ?></p>
					<?php endforeach; ?>
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
			/*
			 * Same layout as Test Execution → How Test Execution Works (process-flow):
			 * section-header + 01–04 cyan steps with per-stage connector segments.
			 */
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
			<ul class="testro-prod-tm__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-tm__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-tm__flow-step" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
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
				<p class="testro-prod-tm__outro testro-prod-tm__outro--flow <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
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
					<p class="testro-prod-tm__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
				</div>
			<?php endif; ?>

		<?php elseif ( 'feature-cards' === $variant ) : ?>
			<?php
			$card_fill = isset( $args['card_fill'] ) ? sanitize_html_class( (string) $args['card_fill'] ) : 'tint';
			?>
			<ul class="testro-prod-tm__cards testro-prod-tm__cards--<?php echo esc_attr( $card_fill ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-tm__card testro-card--top-line" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
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
					<p class="testro-prod-tm__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
