<?php
/**
 * Shared Framer hero redesign (Platform Opening v2).
 *
 * Expected $args:
 * - title_lines (array) Nested title segment lines (tone: gradient|dark)
 * - title (string) Plain title fallback / aria
 * - body_blocks (array) Paragraph run arrays (tone: muted|strong)
 * - feature_lines (array) Optional icon+text rows
 * - highlights (array) Optional AI highlight chips
 * - workflow_intro / workflow_steps / workflow_outro
 * - cta_label, cta_href, cta_modal, cta_with_arrow
 * - actions (array) Optional multi-CTA list; when set, renders instead of cta_label
 * - trust (array|true|false)
 * - mesh (string) Relative assets path for right visual
 * - heading_id (string)
 * - section_class (string) Extra section classes
 *
 * @package TestRo
 */

$args = isset( $args ) && is_array( $args ) ? $args : array();

$title_lines     = isset( $args['title_lines'] ) && is_array( $args['title_lines'] ) ? $args['title_lines'] : array();
$title           = isset( $args['title'] ) ? (string) $args['title'] : testro_hero_plain_title( $title_lines );
$body_blocks     = isset( $args['body_blocks'] ) && is_array( $args['body_blocks'] ) ? $args['body_blocks'] : array();
$feature_lines   = isset( $args['feature_lines'] ) && is_array( $args['feature_lines'] ) ? $args['feature_lines'] : array();
$feature_variant = isset( $args['feature_lines_variant'] ) ? (string) $args['feature_lines_variant'] : '';
$highlights      = isset( $args['highlights'] ) && is_array( $args['highlights'] ) ? $args['highlights'] : array();
$workflow_intro  = isset( $args['workflow_intro'] ) ? (string) $args['workflow_intro'] : '';
$workflow_steps  = isset( $args['workflow_steps'] ) && is_array( $args['workflow_steps'] ) ? $args['workflow_steps'] : array();
$workflow_outro  = isset( $args['workflow_outro'] ) ? (string) $args['workflow_outro'] : '';
$cta_label       = isset( $args['cta_label'] ) ? (string) $args['cta_label'] : __( 'Start Testing', 'testro' );
$cta_href        = isset( $args['cta_href'] ) ? (string) $args['cta_href'] : '#final-cta';
$cta_modal       = ! empty( $args['cta_modal'] );
$cta_with_arrow  = array_key_exists( 'cta_with_arrow', $args ) ? (bool) $args['cta_with_arrow'] : true;
$actions         = isset( $args['actions'] ) && is_array( $args['actions'] ) ? $args['actions'] : array();
$trust           = array_key_exists( 'trust', $args ) ? $args['trust'] : true;
$mesh            = isset( $args['mesh'] ) ? (string) $args['mesh'] : 'images/hero/mesh-home.gif';
$heading_id      = isset( $args['heading_id'] ) ? (string) $args['heading_id'] : 'hero-heading';
$section_class   = isset( $args['section_class'] ) ? (string) $args['section_class'] : '';
$show_divider    = array_key_exists( 'show_divider', $args ) ? (bool) $args['show_divider'] : true;
$title_wrap      = isset( $args['title_wrap'] ) ? (string) $args['title_wrap'] : '';

if ( '' === $title && ! $title_lines ) {
	return;
}

$hero_actions = array();
foreach ( $actions as $action ) {
	if ( ! is_array( $action ) || empty( $action['label'] ) ) {
		continue;
	}
	if ( array_key_exists( 'allow_on_hero', $action ) && ! $action['allow_on_hero'] ) {
		continue;
	}
	$hero_actions[] = $action;
}
if ( ! $hero_actions && '' !== $cta_label ) {
	$hero_actions[] = array(
		'label'      => $cta_label,
		'style'      => 'primary',
		'href'       => $cta_href,
		'modal'      => $cta_modal ? ( is_string( $args['cta_modal'] ) ? $args['cta_modal'] : 'demo-modal' ) : '',
		'with_arrow' => $cta_with_arrow,
	);
}

$section_classes = trim( 'testro-hero-v2 ' . $section_class );
if ( 'natural' === $title_wrap ) {
	$section_classes .= ' testro-hero-v2--title-natural';
}
$mesh_url        = testro_asset( $mesh );
?>
<section class="<?php echo esc_attr( $section_classes ); ?>" aria-labelledby="<?php echo esc_attr( $heading_id ); ?>">
	<div class="testro-hero-v2__frame">
		<div class="testro-hero-v2__copy">
			<?php testro_render_hero_title( $title_lines, $heading_id, $title ); ?>

			<?php testro_render_hero_body( $body_blocks ); ?>

			<?php testro_render_hero_feature_lines( $feature_lines, $feature_variant ); ?>

			<?php testro_render_hero_highlights( $highlights ); ?>

			<?php testro_render_hero_workflow( $workflow_intro, $workflow_steps, $workflow_outro ); ?>

			<div class="testro-hero-v2__cta-block">
				<?php if ( $show_divider ) : ?>
					<span class="testro-hero-v2__divider" aria-hidden="true"></span>
				<?php endif; ?>

				<?php if ( $hero_actions ) : ?>
					<div class="testro-hero-v2__actions">
						<?php
						foreach ( $hero_actions as $action ) {
							$style      = isset( $action['style'] ) ? (string) $action['style'] : 'primary';
							$label      = (string) $action['label'];
							$with_arrow = array_key_exists( 'with_arrow', $action ) ? (bool) $action['with_arrow'] : true;
							$modal      = ! empty( $action['modal'] ) ? (string) $action['modal'] : '';
							$href       = isset( $action['href'] ) ? (string) $action['href'] : '';
							/* Framer Dynamics hero: both CTAs are solid primary blue with arrows. */
							$btn_class  = 'primary' === $style || 'secondary' === $style
								? 'testro-btn testro-btn--primary testro-hero-v2__cta'
								: 'testro-btn testro-btn--' . sanitize_html_class( $style ) . ' testro-hero-v2__cta';
							$btn_attrs  = array(
								'class' => $btn_class,
							);
							if ( $modal ) {
								$btn_attrs['data-open-modal'] = $modal;
								$btn_attrs['aria-haspopup']  = 'dialog';
								$btn_attrs['aria-controls']  = $modal;
							}
							get_template_part(
								'template-parts/components/primary-button',
								null,
								array(
									'label'      => $label,
									'href'       => $modal ? '' : $href,
									'with_arrow' => $with_arrow,
									'attrs'      => $btn_attrs,
								)
							);
						}
						?>
					</div>
				<?php endif; ?>

				<?php testro_render_hero_trust( $trust ); ?>
			</div>
		</div>

		<div class="testro-hero-v2__visual" aria-hidden="true">
			<img
				class="testro-hero-v2__mesh"
				src="<?php echo esc_url( $mesh_url ); ?>"
				alt=""
				width="650"
				height="666"
				decoding="async"
				fetchpriority="high"
			/>
		</div>
	</div>
</section>
