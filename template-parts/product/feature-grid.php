<?php
/**
 * Product page feature card grid.
 *
 * Expected $args:
 * - id      (string)  Section anchor id.
 * - variant (string)  'default' | 'spotlight' | 'tint' | 'brand'.
 * - columns (int)     2–5 desktop columns. Default 3.
 * - eyebrow / title / intro (string)
 * - intro_layout (string) 'default' | 'split' | 'sec-header'
 *     'sec-header' uses the global SectionHeader (.testro-sec-header).
 * - label_color / heading_color / description_color (string) Optional theme
 *     colors when intro_layout is 'sec-header'.
 * - card_style (string) 'default' (product cards) | 'feature-card' (global FeatureCard).
 * - card_variant (string) FeatureCard variant when card_style is 'feature-card'
 *     ('default' | 'light' | 'tint' | 'horizontal' | 'media' | 'media-inline' |
 *     'media-footer' | 'step').
 * - icon_background / icon_color / card_description_color (string) Optional
 *     FeatureCard theme overrides when card_style is 'feature-card'.
 * - card_background / card_border_color / card_title_color (string) Optional
 *     FeatureCard surface/title overrides when card_style is 'feature-card'.
 * - numbered (bool) When true with feature-card style, render 1-based step
 *     badges. For most variants the badge replaces the icon; for `step` both
 *     icon and badge are shown with a connector.
 * - numbered_pad (int) Optional zero-pad width for numbered badges (e.g. 2 → 01).
 * - process (bool) When true, render a StepPill process track between the
 *     header and the card grid.
 * - process_steps (int) Optional step count for the process track. Defaults to
 *     the item count (or 4).
 * - visual  (bool) When true, render an empty media placeholder between the
 *     header and the card grid (fill via section CSS; no inner content).
 * - notes   (string[]) Optional supporting lines rendered after cards/visual
 *     (e.g. a two-column footer row). Second item gets an accent class.
 * - items   (array[]) Each: icon, label, title, description, optional cta
 *   (label + href|modal + optional attrs).
 * - outro   (string) Optional closing paragraph.
 * - outro_variant (string) When 'supporting' or 'supporting-on-dark', render
 *     outro via global SupportingText. Otherwise keep legacy outro markup.
 *
 * @package TestRo
 */

$args         = isset( $args ) && is_array( $args ) ? $args : array();
$items        = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$variant      = isset( $args['variant'] ) ? sanitize_html_class( $args['variant'] ) : 'default';
$columns      = isset( $args['columns'] ) ? max( 1, min( 5, (int) $args['columns'] ) ) : 3;
$numbered     = ! empty( $args['numbered'] );
$numbered_pad = isset( $args['numbered_pad'] ) ? max( 0, (int) $args['numbered_pad'] ) : 0;
$show_process = ! empty( $args['process'] );
$process_steps = isset( $args['process_steps'] )
	? max( 1, min( 8, (int) $args['process_steps'] ) )
	: max( 1, min( 8, $items ? count( $items ) : 4 ) );
$intro_layout = isset( $args['intro_layout'] ) ? sanitize_html_class( (string) $args['intro_layout'] ) : 'default';
$id           = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$eyebrow      = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$title        = isset( $args['title'] ) ? (string) $args['title'] : '';
$intro        = isset( $args['intro'] ) ? (string) $args['intro'] : '';
$card_heading_level = isset( $args['card_heading_level'] ) ? max( 1, min( 6, (int) $args['card_heading_level'] ) ) : 0;
$card_heading_tag   = $card_heading_level ? ( 'h' . $card_heading_level ) : '';
$heading_level      = isset( $args['heading_level'] ) ? max( 1, min( 6, (int) $args['heading_level'] ) ) : 2;
$heading_tag        = 'h' . $heading_level;
$label_color        = isset( $args['label_color'] ) ? (string) $args['label_color'] : '';
$heading_color      = isset( $args['heading_color'] ) ? (string) $args['heading_color'] : '';
$description_color  = isset( $args['description_color'] ) ? (string) $args['description_color'] : '';
$card_style         = isset( $args['card_style'] ) && 'feature-card' === $args['card_style'] ? 'feature-card' : 'default';
$show_visual        = ! empty( $args['visual'] );
$notes              = isset( $args['notes'] ) && is_array( $args['notes'] ) ? array_values( $args['notes'] ) : array();
$card_variant       = 'default';
if ( isset( $args['card_variant'] ) ) {
	$requested_card_variant = (string) $args['card_variant'];
	if ( in_array( $requested_card_variant, array( 'light', 'tint', 'horizontal', 'media', 'media-inline', 'media-footer', 'step' ), true ) ) {
		$card_variant = $requested_card_variant;
	}
}

if ( ! $items && '' === $title ) {
	return;
}

$tone           = 'brand' === $variant ? 'dark' : 'light';
$heading_id     = $id ? $id . '-heading' : '';
$section_class  = 'testro-prod-section testro-prod-section--' . $variant . ' testro-prod-features';
if ( 'split' === $intro_layout ) {
	$section_class .= ' testro-prod-features--why-intro';
}
if ( 'feature-card' === $card_style ) {
	$section_class .= ' testro-prod-features--feature-cards';
}
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php if ( 'sec-header' === $intro_layout && ( '' !== $title || '' !== $eyebrow || '' !== $intro ) ) : ?>
			<?php
			get_template_part(
				'template-parts/components/section-header',
				null,
				array(
					'label'              => $eyebrow,
					'heading'            => $title,
					'description'        => $intro,
					'heading_id'         => $heading_id,
					'heading_level'      => $heading_level,
					'label_color'        => $label_color,
					'heading_color'      => $heading_color,
					'description_color'  => $description_color,
					'attrs'              => array(
						'data-reveal' => true,
					),
				)
			);
			?>
		<?php elseif ( 'split' === $intro_layout && ( '' !== $title || '' !== $eyebrow ) ) : ?>
			<header class="testro-why__intro" data-reveal>
				<div class="testro-why__intro-left">
					<?php if ( '' !== $eyebrow ) : ?>
						<p class="testro-why__label"><?php echo esc_html( $eyebrow ); ?></p>
					<?php endif; ?>
					<?php if ( '' !== $title ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag name is derived from a numeric arg. ?>
						<<?php echo $heading_tag; ?><?php echo $heading_id ? ' id="' . esc_attr( $heading_id ) . '"' : ''; ?> class="testro-why__heading">
							<?php echo esc_html( $title ); ?>
						</<?php echo $heading_tag; ?>>
					<?php endif; ?>
				</div>
				<?php if ( '' !== $intro ) : ?>
					<p class="testro-why__desc"><?php echo esc_html( $intro ); ?></p>
				<?php endif; ?>
			</header>
		<?php elseif ( '' !== $title || '' !== $eyebrow ) : ?>
			<?php
			get_template_part(
				'template-parts/product/section-header',
				null,
				array(
					'eyebrow'       => $eyebrow,
					'title'         => $title,
					'intro'         => $intro,
					'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
					'intro_body'    => isset( $args['intro_body'] ) ? $args['intro_body'] : '',
					'paragraphs'    => isset( $args['paragraphs'] ) ? $args['paragraphs'] : array(),
					'heading_id'    => $heading_id,
					'heading_level' => $heading_level,
					'tone'          => $tone,
				)
			);
			?>
		<?php endif; ?>

		<?php if ( $show_process ) : ?>
			<?php
			get_template_part(
				'template-parts/components/step-pill',
				null,
				array(
					'steps'       => $process_steps,
					'pad'         => 2,
					'variant'     => 'process',
					'active_step' => 0,
					'class'       => 'testro-prod-features__process',
					'attrs'       => array(
						'data-reveal' => true,
					),
				)
			);
			?>
		<?php endif; ?>

		<?php if ( $show_visual ) : ?>
			<div class="testro-prod-features__visual" aria-hidden="true">
				<div class="testro-prod-features__placeholder"></div>
			</div>
		<?php endif; ?>

		<?php if ( $items && 'feature-card' === $card_style ) : ?>
		<ul class="testro-feature-card-grid" data-columns="<?php echo esc_attr( (string) $columns ); ?>">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$card_args = array(
					'icon'        => ( ( $numbered && 'step' !== $card_variant ) || empty( $item['icon'] ) ) ? '' : (string) $item['icon'],
					'label'       => isset( $item['label'] ) ? (string) $item['label'] : '',
					'title'       => isset( $item['title'] ) ? (string) $item['title'] : '',
					'description' => isset( $item['description'] ) ? (string) $item['description'] : '',
					'tag'         => 'li',
					'variant'     => $card_variant,
					'attrs'       => array(
						'data-reveal' => true,
						'style'       => '--reveal-delay: ' . ( (int) $index * 70 ) . 'ms',
					),
				);
				if ( $numbered ) {
					$step = $index + 1;
					$card_args['badge'] = $numbered_pad > 0
						? sprintf( '%0' . $numbered_pad . 'd', $step )
						: (string) $step;
				}
				if ( 'light' === $card_variant || 'tint' === $card_variant ) {
					$is_tint = 'tint' === $card_variant;
					$card_args['background']        = isset( $args['card_background'] ) && '' !== (string) $args['card_background']
						? (string) $args['card_background']
						: ( $is_tint ? '#F4F9FF' : '#FFFFFF' );
					$card_args['border_color']      = isset( $args['card_border_color'] ) && '' !== (string) $args['card_border_color']
						? (string) $args['card_border_color']
						: '#d5e9fc';
					$card_args['title_color']       = isset( $args['card_title_color'] ) && '' !== (string) $args['card_title_color']
						? (string) $args['card_title_color']
						: ( $is_tint ? '#063B7A' : 'var(--color-brand-navy)' );
					$card_args['description_color'] = isset( $args['card_description_color'] ) && '' !== (string) $args['card_description_color']
						? (string) $args['card_description_color']
						: ( $is_tint ? '#58718E' : 'var(--color-muted)' );
					$card_args['icon_background']   = isset( $args['icon_background'] ) && '' !== (string) $args['icon_background']
						? (string) $args['icon_background']
						: ( $is_tint ? 'var(--color-brand-navy)' : 'linear-gradient(135deg, #003e84 0%, #00acff 100%)' );
					$card_args['icon_color']        = isset( $args['icon_color'] ) && '' !== (string) $args['icon_color']
						? (string) $args['icon_color']
						: '#fff';
				} elseif ( 'step' === $card_variant ) {
					$card_args['background']        = isset( $args['card_background'] ) && '' !== (string) $args['card_background']
						? (string) $args['card_background']
						: '#FFFFFF';
					$card_args['border_color']      = isset( $args['card_border_color'] ) && '' !== (string) $args['card_border_color']
						? (string) $args['card_border_color']
						: 'transparent';
					$card_args['title_color']       = isset( $args['card_title_color'] ) && '' !== (string) $args['card_title_color']
						? (string) $args['card_title_color']
						: 'var(--color-brand-navy)';
					$card_args['description_color'] = isset( $args['card_description_color'] ) && '' !== (string) $args['card_description_color']
						? (string) $args['card_description_color']
						: '#5B7290';
					$card_args['icon_background']   = isset( $args['icon_background'] ) && '' !== (string) $args['icon_background']
						? (string) $args['icon_background']
						: '#F2F6FF';
					$card_args['icon_color']        = isset( $args['icon_color'] ) && '' !== (string) $args['icon_color']
						? (string) $args['icon_color']
						: 'var(--color-brand-navy)';
				} elseif ( 'media' === $card_variant || 'media-footer' === $card_variant ) {
					$card_args['background']        = isset( $args['card_background'] ) && '' !== (string) $args['card_background']
						? (string) $args['card_background']
						: '#FFFFFF';
					$card_args['border_color']      = isset( $args['card_border_color'] ) && '' !== (string) $args['card_border_color']
						? (string) $args['card_border_color']
						: '#d5e9fc';
					$card_args['title_color']       = isset( $args['card_title_color'] ) && '' !== (string) $args['card_title_color']
						? (string) $args['card_title_color']
						: 'var(--color-brand-navy)';
					$card_args['description_color'] = isset( $args['card_description_color'] ) && '' !== (string) $args['card_description_color']
						? (string) $args['card_description_color']
						: 'var(--color-muted)';
					if ( ! empty( $item['image'] ) ) {
						$card_args['image'] = (string) $item['image'];
					}
					if ( ! empty( $item['image_alt'] ) ) {
						$card_args['image_alt'] = (string) $item['image_alt'];
					}
					if ( ! empty( $item['image_width'] ) ) {
						$card_args['image_width'] = (int) $item['image_width'];
					}
					if ( ! empty( $item['image_height'] ) ) {
						$card_args['image_height'] = (int) $item['image_height'];
					}
				} elseif ( 'media-inline' === $card_variant ) {
					$card_args['background']   = isset( $args['card_background'] ) && '' !== (string) $args['card_background']
						? (string) $args['card_background']
						: '#FFFFFF';
					$card_args['border_color'] = isset( $args['card_border_color'] ) && '' !== (string) $args['card_border_color']
						? (string) $args['card_border_color']
						: '#d5e9fc';
					if ( ! empty( $item['image'] ) ) {
						$card_args['image'] = (string) $item['image'];
					}
					if ( ! empty( $item['image_alt'] ) ) {
						$card_args['image_alt'] = (string) $item['image_alt'];
					}
					if ( ! empty( $item['image_width'] ) ) {
						$card_args['image_width'] = (int) $item['image_width'];
					}
					if ( ! empty( $item['image_height'] ) ) {
						$card_args['image_height'] = (int) $item['image_height'];
					}
				} elseif ( 'horizontal' === $card_variant ) {
					if ( isset( $args['card_title_color'] ) && '' !== (string) $args['card_title_color'] ) {
						$card_args['title_color'] = (string) $args['card_title_color'];
					}
					if ( isset( $args['card_description_color'] ) && '' !== (string) $args['card_description_color'] ) {
						$card_args['description_color'] = (string) $args['card_description_color'];
					}
					if ( isset( $args['icon_background'] ) && '' !== (string) $args['icon_background'] ) {
						$card_args['icon_background'] = (string) $args['icon_background'];
					}
					if ( isset( $args['icon_color'] ) && '' !== (string) $args['icon_color'] ) {
						$card_args['icon_color'] = (string) $args['icon_color'];
					}
				}
				if ( $card_heading_level ) {
					$card_args['heading_level'] = $card_heading_level;
				}
				get_template_part( 'template-parts/components/feature-card', null, $card_args );
				?>
			<?php endforeach; ?>
		</ul>
		<?php elseif ( $items ) : ?>
		<<?php echo $numbered ? 'ol' : 'ul'; ?> class="testro-prod-cards" data-columns="<?php echo esc_attr( (string) $columns ); ?>">
			<?php foreach ( $items as $index => $item ) : ?>
				<?php
				$cta       = isset( $item['cta'] ) && is_array( $item['cta'] ) ? $item['cta'] : null;
				$cta_label = $cta && ! empty( $cta['label'] ) ? (string) $cta['label'] : '';
				$has_cta   = '' !== $cta_label;
				$item_id   = ! empty( $item['id'] ) ? sanitize_title( (string) $item['id'] ) : '';
				?>
				<li
					class="testro-prod-card<?php echo $has_cta ? ' testro-prod-card--cta' : ''; ?>"
					<?php echo $item_id ? 'id="' . esc_attr( $item_id ) . '"' : ''; ?>
					data-reveal
					style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms"
				>
					<span class="testro-prod-card__glow" aria-hidden="true"></span>
					<div class="testro-prod-card__body">
						<?php if ( $numbered ) : ?>
							<span class="testro-prod-card__step"><?php echo esc_html( (string) ( $index + 1 ) ); ?></span>
						<?php endif; ?>
						<?php if ( ! empty( $item['icon'] ) ) : ?>
							<span class="testro-prod-card__icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 24 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
						<?php endif; ?>
						<?php if ( $card_heading_tag ) : ?>
							<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag name is derived from a numeric arg. ?>
							<<?php echo $card_heading_tag; ?> class="testro-prod-card__title"><?php echo esc_html( $item['title'] ); ?></<?php echo $card_heading_tag; ?>>
						<?php else : ?>
							<p class="testro-prod-card__title"><?php echo esc_html( $item['title'] ); ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $item['description'] ) ) : ?>
							<p class="testro-prod-card__desc"><?php echo esc_html( $item['description'] ); ?></p>
						<?php endif; ?>

						<?php if ( $has_cta ) : ?>
							<?php
							$cta_modal = isset( $cta['modal'] ) ? (string) $cta['modal'] : '';
							$cta_href  = isset( $cta['href'] ) ? (string) $cta['href'] : '';
							$cta_attrs = isset( $cta['attrs'] ) && is_array( $cta['attrs'] ) ? $cta['attrs'] : array();
							$attr_str  = '';

							foreach ( $cta_attrs as $attr_key => $attr_value ) {
								$attr_str .= sprintf( ' %s="%s"', esc_attr( $attr_key ), esc_attr( (string) $attr_value ) );
							}

							if ( $cta_modal ) {
								$attr_str .= sprintf(
									' data-open-modal="%1$s" aria-haspopup="dialog" aria-controls="%1$s" type="button"',
									esc_attr( $cta_modal )
								);
							}
							?>
							<p class="testro-prod-card__cta">
								<?php if ( $cta_modal || '' === $cta_href ) : ?>
									<button class="testro-btn testro-btn--outline testro-prod-card__cta-btn"<?php echo $attr_str; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
										<span><?php echo esc_html( $cta_label ); ?></span>
										<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</button>
								<?php else : ?>
									<a class="testro-btn testro-btn--outline testro-prod-card__cta-btn" href="<?php echo esc_url( $cta_href ); ?>"<?php echo $attr_str; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above. ?>>
										<span><?php echo esc_html( $cta_label ); ?></span>
										<?php echo testro_icon( 'arrow-right', array( 'size' => 16 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
									</a>
								<?php endif; ?>
							</p>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; ?>
		</<?php echo $numbered ? 'ol' : 'ul'; ?>>
		<?php endif; ?>

		<?php if ( $notes ) : ?>
			<div class="testro-prod-features__notes" data-reveal>
				<?php foreach ( $notes as $note_index => $note ) : ?>
					<?php
					$note_text = is_array( $note )
						? ( isset( $note['text'] ) ? (string) $note['text'] : '' )
						: (string) $note;
					if ( '' === $note_text ) {
						continue;
					}
					$note_class = 'testro-prod-features__note';
					if ( $note_index > 0 ) {
						$note_class .= ' testro-prod-features__note--accent';
					}
					?>
					<p class="<?php echo esc_attr( $note_class ); ?>"><?php echo esc_html( $note_text ); ?></p>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $args['outro'] ) ) : ?>
			<?php
			$outro_variant = isset( $args['outro_variant'] ) ? (string) $args['outro_variant'] : '';
			if ( 'supporting' === $outro_variant || 'supporting-on-dark' === $outro_variant ) :
				get_template_part(
					'template-parts/components/supporting-text',
					null,
					array(
						'text'    => (string) $args['outro'],
						'variant' => 'supporting-on-dark' === $outro_variant ? 'on-dark' : 'default',
						'class'   => 'testro-prod-features__outro',
						'attrs'   => array(
							'data-reveal' => true,
						),
					)
				);
			else :
				?>
			<p class="testro-prod-head__intro testro-prod-features__outro" data-reveal><?php echo esc_html( (string) $args['outro'] ); ?></p>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</section>
