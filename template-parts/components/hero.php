<?php
/**
 * Common hero section — split layout with dynamic content and visual slot.
 *
 * Expected $args:
 * - title           (string)  Required heading text.
 * - description     (string)  Supporting copy.
 * - subtitle        (string)  Alias for description.
 * - subtitle_extra  (string)  Optional second paragraph (handled via after_content on product pages).
 * - eyebrow         (string)  Optional pill label above the heading.
 * - badge           (string)  Supporting tag below CTAs.
 * - heading_id      (string)  Optional id for aria-labelledby.
 * - heading_tag     (int)     Semantic heading level 1–6. Default 1.
 * - variant         (string)  'home', 'page', or default split spacing.
 * - layout          (string)  'split' (default) or 'centered'.
 * - primary_cta     (array)   label, href, modal.
 * - secondary_cta   (array)   label, href, modal.
 * - actions         (array[]) Product-style CTA group (overrides primary/secondary when set).
 * - visual          (string)  Template part slug under template-parts/components/hero-visuals/.
 * - visual_html     (string)  Pre-rendered visual markup (overrides visual slug).
 * - after_content   (string)  Optional HTML appended inside the content column.
 * - breadcrumbs     (bool)    Render breadcrumbs above the grid.
 * - class           (string)  Extra section classes.
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();

$title       = isset( $args['title'] ) ? (string) $args['title'] : '';
$description = isset( $args['description'] ) ? (string) $args['description'] : '';
if ( '' === $description && isset( $args['subtitle'] ) ) {
	$description = (string) $args['subtitle'];
}
$eyebrow     = isset( $args['eyebrow'] ) ? (string) $args['eyebrow'] : '';
$badge       = isset( $args['badge'] ) ? (string) $args['badge'] : '';
if ( '' === $badge && isset( $args['supporting_line'] ) ) {
	$badge = (string) $args['supporting_line'];
}
$heading_id    = isset( $args['heading_id'] ) ? (string) $args['heading_id'] : 'hero-title';
$heading_level = isset( $args['heading_tag'] ) ? max( 1, min( 6, (int) $args['heading_tag'] ) ) : 1;
$heading_tag   = 'h' . $heading_level;
$variant       = isset( $args['variant'] ) ? (string) $args['variant'] : '';
$layout        = isset( $args['layout'] ) ? (string) $args['layout'] : '';
$visual        = isset( $args['visual'] ) ? (string) $args['visual'] : '';
$visual_html   = isset( $args['visual_html'] ) ? (string) $args['visual_html'] : '';
$after_content = isset( $args['after_content'] ) ? (string) $args['after_content'] : '';
$breadcrumbs   = ! empty( $args['breadcrumbs'] );
$extra_class   = isset( $args['class'] ) ? (string) $args['class'] : '';
$actions       = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();

$primary_cta   = isset( $args['primary_cta'] ) && is_array( $args['primary_cta'] ) ? $args['primary_cta'] : array();
$secondary_cta = isset( $args['secondary_cta'] ) && is_array( $args['secondary_cta'] ) ? $args['secondary_cta'] : array();

if ( ! $primary_cta && isset( $args['cta'] ) ) {
	$primary_cta = array(
		'label' => (string) $args['cta'],
		'href'  => isset( $args['cta_href'] ) ? (string) $args['cta_href'] : '#final-cta',
	);
}
if ( ! $secondary_cta && isset( $args['cta_secondary'] ) ) {
	$secondary_cta = array(
		'label' => (string) $args['cta_secondary'],
		'modal' => 'demo-modal',
	);
}

if ( '' === $title ) {
	return;
}

$has_visual = ( '' !== $visual_html || '' !== $visual );
if ( '' === $layout ) {
	$layout = $has_visual ? 'split' : 'centered';
}

$is_centered   = ( 'centered' === $layout );
$is_product    = false !== strpos( $extra_class, 'testro-prod-hero' ) || 'product-hero-title' === $heading_id;
$section_classes = array( 'testro-hero' );

if ( 'home' === $variant ) {
	$section_classes[] = 'testro-hero--home';
} elseif ( 'page' === $variant || $is_product ) {
	$section_classes[] = 'testro-hero--page';
}

if ( ! $is_centered ) {
	$section_classes[] = 'testro-hero--split';
	if ( $is_product ) {
		$section_classes[] = 'testro-prod-hero--split';
	}
} else {
	$section_classes[] = 'testro-hero--centered';
}

if ( '' !== $extra_class ) {
	$section_classes[] = $extra_class;
}

$title_class = 'testro-hero__title';
if ( $is_product ) {
	$title_class .= ' testro-prod-hero__title gradient-text';
}

$actions_align = $is_centered ? 'center' : 'start';
$aria_labelledby = $heading_id ? ' aria-labelledby="' . esc_attr( $heading_id ) . '"' : '';
?>
<section class="<?php echo esc_attr( implode( ' ', $section_classes ) ); ?>"<?php echo $aria_labelledby; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( $is_product && $is_centered ) : ?>
		<span class="testro-prod-hero__aurora" aria-hidden="true"></span>
		<span class="testro-prod-hero__grid" aria-hidden="true"></span>
	<?php endif; ?>
	<div class="testro-hero__shell">
		<?php if ( $breadcrumbs ) : ?>
			<div class="testro-hero__breadcrumbs"><?php testro_the_breadcrumbs(); ?></div>
		<?php endif; ?>

		<div class="testro-hero__grid">
			<div class="testro-hero__content" data-reveal>
				<?php if ( '' !== $eyebrow ) : ?>
					<p class="subtitle-pill testro-section-eyebrow testro-hero__eyebrow testro-prod-hero__eyebrow" data-reveal><?php echo esc_html( $eyebrow ); ?></p>
				<?php endif; ?>

				<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- $heading_tag is sanitized h1–h6. ?>
				<<?php echo $heading_tag; ?> id="<?php echo esc_attr( $heading_id ); ?>" class="<?php echo esc_attr( $title_class ); ?>" data-reveal>
					<?php echo esc_html( $title ); ?>
				</<?php echo $heading_tag; ?>>

				<?php if ( '' !== $description ) : ?>
					<p class="testro-hero__desc testro-prod-hero__sub" data-reveal><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>

				<?php if ( $actions || $primary_cta || $secondary_cta ) : ?>
					<div class="testro-hero__actions testro-prod-hero__actions" data-reveal>
						<?php if ( $actions ) : ?>
							<?php
							get_template_part(
								'template-parts/product/actions',
								null,
								array(
									'actions' => $actions,
									'align'   => $actions_align,
								)
							);
							?>
						<?php else : ?>
							<?php if ( $primary_cta && ! empty( $primary_cta['label'] ) ) : ?>
								<?php
								$primary_attrs = array( 'class' => 'primary-button testro-btn testro-btn--brand' );
								if ( ! empty( $primary_cta['modal'] ) ) {
									$primary_attrs['data-open-modal'] = (string) $primary_cta['modal'];
									$primary_attrs['aria-haspopup']     = 'dialog';
									$primary_attrs['aria-controls']     = (string) $primary_cta['modal'];
									$primary_attrs['type']              = 'button';
								}
								get_template_part(
									'template-parts/components/primary-button',
									null,
									array(
										'label'      => (string) $primary_cta['label'],
										'href'       => ! empty( $primary_cta['modal'] ) ? '' : ( isset( $primary_cta['href'] ) ? (string) $primary_cta['href'] : '' ),
										'with_arrow' => false,
										'attrs'      => $primary_attrs,
									)
								);
								?>
							<?php endif; ?>

							<?php if ( $secondary_cta && ! empty( $secondary_cta['label'] ) ) : ?>
								<?php
								$secondary_href  = isset( $secondary_cta['href'] ) ? (string) $secondary_cta['href'] : '';
								$secondary_modal = isset( $secondary_cta['modal'] ) ? (string) $secondary_cta['modal'] : '';
								$secondary_label = (string) $secondary_cta['label'];
								if ( $secondary_modal ) :
									?>
									<button
										type="button"
										class="testro-btn testro-btn--secondary"
										data-open-modal="<?php echo esc_attr( $secondary_modal ); ?>"
										aria-haspopup="dialog"
										aria-controls="<?php echo esc_attr( $secondary_modal ); ?>"
									><?php echo esc_html( $secondary_label ); ?></button>
								<?php elseif ( '' !== $secondary_href ) : ?>
									<a class="testro-btn testro-btn--secondary" href="<?php echo esc_url( $secondary_href ); ?>"><?php echo esc_html( $secondary_label ); ?></a>
								<?php else : ?>
									<button type="button" class="testro-btn testro-btn--secondary"><?php echo esc_html( $secondary_label ); ?></button>
								<?php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ( '' !== $badge ) : ?>
					<p class="testro-tag testro-hero__tag"><?php echo esc_html( $badge ); ?></p>
				<?php endif; ?>

				<?php
				if ( '' !== $after_content ) {
					echo $after_content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- caller-provided HTML.
				}
				?>
			</div>

			<?php if ( ! $is_centered && $has_visual ) : ?>
				<div class="testro-hero__visual testro-prod-hero__visual" data-reveal>
					<div class="testro-hero__visual-frame<?php echo 'home' === $variant ? ' testro-hero__visual-frame--home' : ''; ?>">
						<?php
						if ( '' !== $visual_html ) {
							echo $visual_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- buffered visual markup.
						} elseif ( '' !== $visual ) {
							get_template_part( 'template-parts/components/hero-visuals/' . sanitize_file_name( $visual ) );
						}
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
