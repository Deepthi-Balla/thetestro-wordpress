<?php
/**
 * CI/CD Integration — Framer compositions (/features-tab/ci-cd-integration).
 *
 * Variants:
 * - proof-split     Left copy + right vertical proof timeline (built)
 * - process-flow    Horizontal 01–04 steps with connector (pipeline)
 * - compare-table   3-column Manual vs CI/CD table
 * - feature-cards   Feature Card 2 grid (who / practices / feedback / scale)
 * - integrations    Hub + tool badges panel
 * - shift-panels    3-column bordered shift-left / build / shift-right
 * - trigger-rows    Numbered badge rows (AI Quality Intelligence left rail)
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
$section_class = 'testro-prod-section testro-prod-cicd testro-prod-cicd--' . $variant;
if ( ! empty( $args['tint'] ) ) {
	$section_class .= ' testro-prod-cicd--tint';
}
if ( ! empty( $args['hide_icons'] ) ) {
	$section_class .= ' testro-prod-cicd--no-icons';
}
$item_level   = isset( $args['item_heading_level'] ) ? max( 1, min( 6, (int) $args['item_heading_level'] ) ) : 3;
$item_tag     = 'h' . $item_level;
$columns      = isset( $args['columns'] ) ? max( 1, (int) $args['columns'] ) : count( $items );
$head_align   = isset( $args['align'] ) && 'center' === $args['align'] ? 'center' : 'start';
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
			<div class="testro-prod-cicd__proof" data-reveal>
				<div class="testro-prod-cicd__proof-copy">
					<?php
					if ( $use_three ) {
						$render_three_lines( $args, $heading_id );
					} else {
						get_template_part(
							'template-parts/product/section-header',
							null,
							array(
								'title'         => isset( $args['title'] ) ? $args['title'] : '',
								'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
								'intro_body'    => isset( $args['intro_body'] ) ? $args['intro_body'] : '',
								'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
								'heading_id'    => $heading_id,
								'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
								'align'         => 'start',
							)
						);
					}
					?>
				</div>
				<ol class="testro-prod-cicd__proof-list">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-cicd__proof-item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
							<span class="testro-prod-cicd__proof-marker" aria-hidden="true"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
							<div class="testro-prod-cicd__proof-item-copy">
								<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
								<<?php echo $item_tag; ?> class="testro-prod-cicd__proof-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
								<?php if ( ! empty( $item['description'] ) ) : ?>
									<p class="testro-prod-cicd__proof-desc"><?php echo esc_html( $item['description'] ); ?></p>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ol>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-cicd__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'process-flow' === $variant ) : ?>
			<?php
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
					)
				);
			}
			?>
			<ul class="testro-prod-cicd__stages">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-cicd__stage" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<span class="testro-prod-cicd__flow-step" aria-hidden="true"><?php echo esc_html( isset( $item['stage'] ) ? (string) $item['stage'] : sprintf( '%02d', $index + 1 ) ); ?></span>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-cicd__stage-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-cicd__stage-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-cicd__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'compare-table' === $variant ) : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'title'         => isset( $args['title'] ) ? $args['title'] : '',
					'heading_id'    => $heading_id,
					'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
					'align'         => $head_align,
				)
			);
			$legacy_label = isset( $args['legacy_label'] ) ? (string) $args['legacy_label'] : '';
			$modern_label = isset( $args['modern_label'] ) ? (string) $args['modern_label'] : '';
			$rows         = isset( $args['rows'] ) && is_array( $args['rows'] ) ? $args['rows'] : array();
			?>
			<div class="testro-prod-cicd__table" data-reveal>
				<div class="testro-prod-cicd__table-row testro-prod-cicd__table-row--head">
					<span class="testro-prod-cicd__table-aspect" aria-hidden="true"></span>
					<span class="testro-prod-cicd__table-legacy"><?php echo esc_html( $legacy_label ); ?></span>
					<span class="testro-prod-cicd__table-modern"><?php echo esc_html( $modern_label ); ?></span>
				</div>
				<?php foreach ( $rows as $row ) : ?>
					<div class="testro-prod-cicd__table-row">
						<span class="testro-prod-cicd__table-aspect"><?php echo esc_html( isset( $row['aspect'] ) ? (string) $row['aspect'] : '' ); ?></span>
						<span class="testro-prod-cicd__table-legacy"><?php echo esc_html( isset( $row['legacy'] ) ? (string) $row['legacy'] : '' ); ?></span>
						<span class="testro-prod-cicd__table-modern"><?php echo esc_html( isset( $row['modern'] ) ? (string) $row['modern'] : '' ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>

		<?php elseif ( 'feature-cards' === $variant ) : ?>
			<?php
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => $head_align,
					)
				);
			}
			$hide_icons = ! empty( $args['hide_icons'] );
			?>
			<ul class="testro-prod-cicd__cards testro-prod-cicd__cards--<?php echo esc_attr( (string) $columns ); ?>">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-cicd__card testro-card--top-line" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 60 ) ); ?>ms">
						<?php if ( ! $hide_icons ) : ?>
							<span class="testro-prod-cicd__card-tile" aria-hidden="true">
								<?php
								$icon = ! empty( $item['icon'] ) ? (string) $item['icon'] : 'play';
								echo testro_icon( $icon, array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG.
								?>
							</span>
						<?php endif; ?>
						<div class="testro-prod-cicd__card-copy">
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
							<<?php echo $item_tag; ?> class="testro-prod-cicd__card-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-cicd__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'integrations' === $variant ) : ?>
			<?php
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
					)
				);
			}
			$tools = isset( $args['tools'] ) && is_array( $args['tools'] ) ? $args['tools'] : array();
			$hub   = isset( $args['hub_image'] ) ? (string) $args['hub_image'] : '';
			?>
			<div class="testro-prod-cicd__integ" data-reveal>
				<?php if ( '' !== $hub ) : ?>
					<div class="testro-prod-cicd__integ-hub" aria-hidden="true">
						<img
							src="<?php echo esc_url( $hub ); ?>"
							alt=""
							width="57"
							height="46"
							loading="lazy"
							decoding="async"
						/>
					</div>
				<?php endif; ?>
				<?php if ( $tools ) : ?>
					<ul class="testro-prod-cicd__integ-tools">
						<?php foreach ( $tools as $tool ) : ?>
							<li class="testro-prod-cicd__integ-tool">
								<span class="testro-prod-cicd__integ-diamond" aria-hidden="true"></span>
								<span class="testro-prod-cicd__integ-label"><?php echo esc_html( $tool ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-cicd__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php elseif ( 'shift-panels' === $variant ) : ?>
			<?php
			if ( $use_three ) {
				$render_three_lines( $args, $heading_id );
			} else {
				get_template_part(
					'template-parts/product/section-header',
					null,
					array(
						'title'         => isset( $args['title'] ) ? $args['title'] : '',
						'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
						'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
						'heading_id'    => $heading_id,
						'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
						'align'         => 'start',
					)
				);
			}
			?>
			<ul class="testro-prod-cicd__shift">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-cicd__shift-panel" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 50 ) ); ?>ms">
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag from numeric arg. ?>
						<<?php echo $item_tag; ?> class="testro-prod-cicd__shift-title"><?php echo esc_html( $item['title'] ); ?></<?php echo $item_tag; ?>>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-cicd__shift-desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>

		<?php elseif ( 'trigger-rows' === $variant ) : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
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
			<?php if ( ! empty( $args['outro'] ) ) : ?>
				<p class="testro-prod-cicd__outro <?php echo esc_attr( testro_bottom_text_class() ); ?>" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>

		<?php endif; ?>
	</div>
</section>
