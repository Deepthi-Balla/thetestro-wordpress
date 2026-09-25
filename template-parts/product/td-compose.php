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
 *                   Optional list_style=numbered-rows for AI Quality Intelligence badges
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
$media_side   = isset( $args['media_side'] ) && 'right' === $args['media_side'] ? 'right' : 'left';
$bubbles      = isset( $args['bubbles'] ) && is_array( $args['bubbles'] ) ? $args['bubbles'] : array();
$header_style = isset( $args['header_style'] ) ? (string) $args['header_style'] : '';
$use_three    = ( 'three-lines' === $header_style );

/**
 * Render the shared three-line section header (Why theTestRo pattern).
 *
 * @param array  $args       Section args.
 * @param string $heading_id Optional heading id.
 */
$render_three_lines = static function ( $args, $heading_id ) {
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
	<?php
};
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( 'proof-split' === $variant ) : ?>
			<?php /* Same layout as CI/CD proof-split: three-line header + numbered proof list. */ ?>
			<div class="testro-prod-td__proof" data-reveal>
				<div class="testro-prod-td__proof-copy">
					<?php
					if ( $use_three ) {
						$render_three_lines( $args, $heading_id );
					} else {
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
					}
					?>
				</div>
				<ol class="testro-prod-td__proof-list">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-td__proof-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-td__proof-marker" aria-hidden="true"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
							<div class="testro-prod-td__proof-item-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-td__proof-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-td__proof-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-td__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'nl-split' === $variant ) : ?>
			<?php /* Framer Natural Language — chat demo | QI numbered-rows copy. */ ?>
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
					get_template_part(
						'template-parts/product/numbered-rows',
						null,
						array(
							'items'       => $items,
							'heading_tag' => $item_tag,
						)
					);
					?>
				</div>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-bottom-text" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

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
			<?php /* Who Builds — same AI Quality Intelligence numbered-rows styling. */ ?>
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
			get_template_part(
				'template-parts/product/numbered-rows',
				null,
				array(
					'items'       => $items,
					'heading_tag' => $item_tag,
				)
			);
			?>

		<?php elseif ( 'feature-split' === $variant ) : ?>
			<?php /* Same as Test Execution Real-Time Debugging: media | header + feature list. */ ?>
			<?php
			$list_style = isset( $args['list_style'] ) ? (string) $args['list_style'] : '';
			$use_qi     = ( 'numbered-rows' === $list_style );
			?>
			<div class="testro-prod-td__feature testro-prod-td__feature--media-<?php echo esc_attr( $media_side ); ?><?php echo $use_qi ? ' testro-prod-td__feature--numbered' : ''; ?>" data-reveal>
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
					if ( $use_qi ) {
						get_template_part(
							'template-parts/product/numbered-rows',
							null,
							array(
								'items'       => $items,
								'heading_tag' => $item_tag,
							)
						);
					} else {
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
						<?php
					}
					?>
				</div>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-td__outro testro-prod-td__outro--split <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'platform-band' === $variant ) : ?>
			<?php /* Framer Workflow Overview — label, title, description, then three columns. */ ?>
			<?php
			$platform_level = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
			$platform_tag   = 'h' . $platform_level;
			?>
			<header class="testro-prod-head testro-prod-head--dark testro-prod-head--start" data-reveal>
				<?php if ( ! empty( $args['eyebrow'] ) ) : ?>
					<p class="testro-prod-head__eyebrow"><?php echo esc_html( (string) $args['eyebrow'] ); ?></p>
				<?php endif; ?>
				<?php if ( ! empty( $args['title'] ) ) : ?>
					<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
					<<?php echo $platform_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="testro-prod-head__title main-headings"><?php echo esc_html( (string) $args['title'] ); ?></<?php echo $platform_tag; ?>>
				<?php endif; ?>
				<?php if ( ! empty( $args['intro'] ) ) : ?>
					<p class="testro-prod-head__intro"><?php echo esc_html( (string) $args['intro'] ); ?></p>
				<?php endif; ?>
			</header>
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
				<p class="testro-bottom-text testro-bottom-text--light" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'integrations' === $variant ) : ?>
			<?php /* Framer Fits Into Workflow — brief 390px | pill grid gap 34. */ ?>
			<div class="testro-prod-td__integrations" data-reveal>
				<div class="testro-prod-td__integrations-copy">
					<?php
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
