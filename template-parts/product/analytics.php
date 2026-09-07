<?php
/**
 * Product page analytics section — capability list beside a release-readiness panel.
 *
 * Expected $args: id, eyebrow, title, intro, items (array[]), dashboard (array).
 * - layout (string) 'default' (capability list + dashboard) | 'split-visual'
 *     (SectionHeader + optional highlight/intro_extra + optional horizontal
 *     FeatureCards + image placeholder) | 'visual-list' (full-width
 *     SectionHeader, then visual placeholder left + NumberedFeatureList).
 * - highlight (string) Optional emphasis line after the SectionHeader (split-visual).
 * - intro_extra (string) Optional second body paragraph after highlight (split-visual).
 * - intro_extra_style (string) Optional 'accent' for cyan italic intro_extra.
 * - visual_first (bool) When true, render the visual column before copy (split-visual).
 *     For visual-list, defaults to true (visual left). Set false for list left / visual right.
 * - numbered_pad (int) Optional zero-pad for visual-list step badges (e.g. 2 → 01).
 * - list_variant (string) visual-list NumberedFeatureList variant: 'default' | 'tiles'.
 * - outro (string) Optional closing statement under the split (visual-list right-aligned
 *     SupportingText, or split-visual left-aligned body footer).
 * - outro_variant (string) SupportingText variant for visual-list: 'default' | 'on-dark'.
 * - items[] for visual-list may include theme: 'navy' | 'sky' for row accent colors.
 *
 * @package TestRo
 */

$args      = isset( $args ) && is_array( $args ) ? $args : array();
$items     = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$dashboard = isset( $args['dashboard'] ) && is_array( $args['dashboard'] ) ? $args['dashboard'] : array();
$id        = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$layout    = isset( $args['layout'] ) ? (string) $args['layout'] : 'default';
if ( ! in_array( $layout, array( 'split-visual', 'visual-list' ), true ) ) {
	$layout = 'default';
}

if ( ! $items && ! $dashboard && empty( $args['title'] ) ) {
	return;
}

$heading_id        = $id ? $id . '-heading' : '';
$heading_level     = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$eyebrow           = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title             = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro             = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$highlight         = isset( $args['highlight'] ) ? (string) $args['highlight'] : '';
$intro_extra       = isset( $args['intro_extra'] ) ? (string) $args['intro_extra'] : '';
$intro_extra_style = isset( $args['intro_extra_style'] ) && 'accent' === $args['intro_extra_style'] ? 'accent' : '';
$visual_first      = ! empty( $args['visual_first'] );
$outro             = isset( $args['outro'] ) ? (string) $args['outro'] : '';
$outro_variant     = isset( $args['outro_variant'] ) && 'on-dark' === $args['outro_variant'] ? 'on-dark' : 'default';
$numbered_pad      = isset( $args['numbered_pad'] ) ? max( 0, (int) $args['numbered_pad'] ) : 0;
$list_variant      = isset( $args['list_variant'] ) && 'tiles' === $args['list_variant'] ? 'tiles' : 'default';

if ( 'visual-list' === $layout ) {
	// visual-list historically places the media column first; allow opting out.
	$list_visual_first = array_key_exists( 'visual_first', $args ) ? $visual_first : true;
	$split_class       = 'testro-prod-analytics__split';
	$split_class      .= $list_visual_first
		? ' testro-prod-analytics__split--visual-first'
		: ' testro-prod-analytics__split--list-first';

	$visual_markup = static function () {
		?>
		<div class="testro-prod-analytics__visual" aria-hidden="true">
			<div class="testro-prod-analytics__placeholder"></div>
		</div>
		<?php
	};

	$list_markup = static function () use ( $items, $numbered_pad, $list_variant ) {
		get_template_part(
			'template-parts/components/numbered-feature-list',
			null,
			array(
				'items'   => $items,
				'pad'     => $numbered_pad,
				'variant' => $list_variant,
			)
		);
	};
	?>
<section
	class="testro-page-section testro-prod-analytics testro-prod-analytics--visual-list"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-page-section__inner testro-prod-analytics__stack">
		<?php
		get_template_part(
			'template-parts/components/section-header',
			null,
			array(
				'label'             => $eyebrow,
				'heading'           => $title,
				'description'       => $intro,
				'heading_id'        => $heading_id,
				'heading_level'     => $heading_level,
				'label_color'       => 'var(--color-brand-sky)',
				'heading_color'     => 'var(--color-brand-navy)',
				'description_color' => '#5B7290',
				'attrs'             => array(
					'data-reveal' => true,
				),
			)
		);
		?>

		<div class="<?php echo esc_attr( $split_class ); ?>">
			<?php
			if ( $list_visual_first ) {
				$visual_markup();
				$list_markup();
			} else {
				$list_markup();
				$visual_markup();
			}
			?>
		</div>

		<?php if ( '' !== $outro ) : ?>
			<?php
			get_template_part(
				'template-parts/components/supporting-text',
				null,
				array(
					'text'    => $outro,
					'variant' => $outro_variant,
					'attrs'   => array(
						'data-reveal' => true,
					),
				)
			);
			?>
		<?php endif; ?>
	</div>
</section>
	<?php
	return;
}

if ( 'split-visual' === $layout ) {
	$split_class = 'testro-prod-analytics__split';
	if ( $visual_first ) {
		$split_class .= ' testro-prod-analytics__split--visual-first';
	}

	$extra_class = 'testro-prod-analytics__extra';
	if ( 'accent' === $intro_extra_style ) {
		$extra_class .= ' testro-prod-analytics__extra--accent';
	}

	$visual_markup = static function () {
		?>
		<div class="testro-prod-analytics__visual" aria-hidden="true">
			<div class="testro-prod-analytics__placeholder"></div>
		</div>
		<?php
	};
	?>
<section
	class="testro-page-section testro-prod-analytics testro-prod-analytics--split-visual"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-page-section__inner testro-prod-analytics__stack">
		<div class="<?php echo esc_attr( $split_class ); ?>">
			<?php
			if ( $visual_first ) {
				$visual_markup();
			}
			?>

			<div class="testro-prod-analytics__copy">
				<?php
				get_template_part(
					'template-parts/components/section-header',
					null,
					array(
						'label'             => $eyebrow,
						'heading'           => $title,
						'description'       => $intro,
						'heading_id'        => $heading_id,
						'heading_level'     => $heading_level,
						'label_color'       => 'var(--color-brand-sky)',
						'heading_color'     => 'var(--color-brand-navy)',
						'description_color' => '#5B7290',
						'attrs'             => array(
							'data-reveal' => true,
						),
					)
				);
				?>

				<?php if ( '' !== $highlight ) : ?>
					<p class="testro-prod-analytics__highlight" data-reveal><?php echo esc_html( $highlight ); ?></p>
				<?php endif; ?>

				<?php if ( '' !== $intro_extra ) : ?>
					<p class="<?php echo esc_attr( $extra_class ); ?>" data-reveal><?php echo esc_html( $intro_extra ); ?></p>
				<?php endif; ?>

				<?php if ( $items ) : ?>
					<ul class="testro-prod-analytics__cards">
						<?php foreach ( $items as $index => $item ) : ?>
							<?php
							get_template_part(
								'template-parts/components/feature-card',
								null,
								array(
									'icon'        => isset( $item['icon'] ) ? (string) $item['icon'] : '',
									'title'       => isset( $item['title'] ) ? (string) $item['title'] : '',
									'description' => isset( $item['description'] ) ? (string) $item['description'] : '',
									'tag'         => 'li',
									'variant'     => 'horizontal',
									'attrs'       => array(
										'data-reveal' => true,
										'style'       => '--reveal-delay: ' . ( (int) $index * 70 ) . 'ms',
									),
								)
							);
							?>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<?php
			if ( ! $visual_first ) {
				$visual_markup();
			}
			?>
		</div>

		<?php if ( '' !== $outro ) : ?>
			<p class="testro-prod-analytics__footer" data-reveal><?php echo esc_html( $outro ); ?></p>
		<?php endif; ?>
	</div>
</section>
	<?php
	return;
}

$ring_grad  = $id ? $id . '-ring-grad' : 'testro-ring-grad';

$score        = isset( $dashboard['score'] ) ? max( 0, min( 100, (int) $dashboard['score'] ) ) : 0;
$ring_radius  = 52;
$ring_length  = 2 * M_PI * $ring_radius;
$ring_offset  = $ring_length * ( 1 - ( $score / 100 ) );
?>
<section
	class="testro-prod-section testro-prod-section--tint testro-prod-analytics"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
			)
		);
		?>

		<div class="testro-prod-analytics__layout<?php echo ! $items ? ' testro-prod-analytics__layout--solo' : ''; ?>">
			<?php if ( $items ) : ?>
			<ul class="testro-prod-analytics__list">
				<?php foreach ( $items as $index => $item ) : ?>
					<li class="testro-prod-analytics__item" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
						<span class="testro-prod-analytics__icon" aria-hidden="true">
							<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						</span>
						<span class="testro-prod-analytics__text">
							<h3 class="testro-prod-analytics__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p class="testro-prod-analytics__desc"><?php echo esc_html( $item['description'] ); ?></p>
						</span>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<?php if ( $dashboard ) : ?>
				<div class="testro-prod-panel" data-reveal role="img" aria-label="<?php esc_attr_e( 'Illustrative release readiness dashboard showing a 96 percent readiness score, execution trends and failure breakdown', 'testro' ); ?>">
					<div class="testro-prod-panel__chrome" aria-hidden="true">
						<span></span><span></span><span></span>
					</div>

					<div class="testro-prod-panel__head" aria-hidden="true">
						<div>
							<p class="testro-prod-panel__label"><?php echo esc_html( $dashboard['label'] ); ?></p>
							<p class="testro-prod-panel__build"><?php echo esc_html( $dashboard['build'] ); ?></p>
						</div>
						<p class="testro-prod-panel__status"><?php echo esc_html( $dashboard['status'] ); ?></p>
					</div>

					<div class="testro-prod-panel__score" aria-hidden="true">
						<svg class="testro-prod-panel__ring" viewBox="0 0 120 120" focusable="false">
							<defs>
								<linearGradient id="<?php echo esc_attr( $ring_grad ); ?>" x1="0" y1="0" x2="1" y2="1">
									<stop offset="0%" stop-color="#2602ed" />
									<stop offset="100%" stop-color="#00cfcf" />
								</linearGradient>
							</defs>
							<circle class="testro-prod-panel__ring-track" cx="60" cy="60" r="<?php echo esc_attr( (string) $ring_radius ); ?>" />
							<circle
								class="testro-prod-panel__ring-value"
								cx="60"
								cy="60"
								r="<?php echo esc_attr( (string) $ring_radius ); ?>"
								style="--ring-length: <?php echo esc_attr( (string) round( $ring_length, 2 ) ); ?>; --ring-offset: <?php echo esc_attr( (string) round( $ring_offset, 2 ) ); ?>; stroke: url(#<?php echo esc_attr( $ring_grad ); ?>)"
							/>
						</svg>
						<span class="testro-prod-panel__score-value"><?php echo esc_html( $score . '%' ); ?></span>
					</div>

					<?php if ( ! empty( $dashboard['tiles'] ) ) : ?>
						<ul class="testro-prod-panel__tiles" aria-hidden="true">
							<?php foreach ( $dashboard['tiles'] as $tile ) : ?>
								<li class="testro-prod-panel__tile">
									<p class="testro-prod-panel__tile-label"><?php echo esc_html( $tile['label'] ); ?></p>
									<p class="testro-prod-panel__tile-value"><?php echo esc_html( $tile['value'] ); ?></p>
									<p class="testro-prod-panel__tile-trend is-<?php echo esc_attr( $tile['tone'] ); ?>"><?php echo esc_html( $tile['trend'] ); ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

					<?php if ( ! empty( $dashboard['chart']['bars'] ) ) : ?>
						<div class="testro-prod-panel__chart" aria-hidden="true">
							<p class="testro-prod-panel__chart-title"><?php echo esc_html( $dashboard['chart']['title'] ); ?></p>
							<ul class="testro-prod-panel__bars">
								<?php foreach ( $dashboard['chart']['bars'] as $bar_index => $bar ) : ?>
									<li class="testro-prod-panel__bar-col">
										<span
											class="testro-prod-panel__bar"
											style="--bar-height: <?php echo esc_attr( (string) max( 4, (int) $bar['value'] ) ); ?>%; --bar-delay: <?php echo esc_attr( (string) ( $bar_index * 70 ) ); ?>ms"
										></span>
										<span class="testro-prod-panel__bar-label"><?php echo esc_html( $bar['label'] ); ?></span>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $dashboard['breakdown'] ) ) : ?>
						<ul class="testro-prod-panel__breakdown" aria-hidden="true">
							<?php foreach ( $dashboard['breakdown'] as $row ) : ?>
								<li class="testro-prod-panel__breakdown-row is-<?php echo esc_attr( $row['tone'] ); ?>">
									<span class="testro-prod-panel__breakdown-label"><?php echo esc_html( $row['label'] ); ?></span>
									<span class="testro-prod-panel__breakdown-track">
										<span class="testro-prod-panel__breakdown-fill" style="--fill: <?php echo esc_attr( (string) (int) $row['value'] ); ?>%"></span>
									</span>
									<span class="testro-prod-panel__breakdown-value"><?php echo esc_html( $row['value'] . '%' ); ?></span>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<p class="testro-prod-head__intro testro-prod-analytics__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
		<?php endif; ?>
	</div>
</section>
