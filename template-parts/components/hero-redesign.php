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
$trust           = array_key_exists( 'trust', $args ) ? $args['trust'] : true;
$mesh            = isset( $args['mesh'] ) ? (string) $args['mesh'] : 'images/hero/mesh-home.gif';
$heading_id      = isset( $args['heading_id'] ) ? (string) $args['heading_id'] : 'hero-heading';
$section_class   = isset( $args['section_class'] ) ? (string) $args['section_class'] : '';
$show_divider    = array_key_exists( 'show_divider', $args ) ? (bool) $args['show_divider'] : true;
$title_wrap      = isset( $args['title_wrap'] ) ? (string) $args['title_wrap'] : '';

if ( '' === $title && ! $title_lines ) {
	return;
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

				<?php if ( '' !== $cta_label ) : ?>
					<div class="testro-hero-v2__actions">
						<?php
						$btn_attrs = array(
							'class' => 'testro-btn testro-btn--primary testro-hero-v2__cta',
						);
						if ( $cta_modal ) {
							$btn_attrs['data-open-modal'] = is_string( $args['cta_modal'] ) ? $args['cta_modal'] : 'demo-modal';
							$btn_attrs['aria-haspopup']  = 'dialog';
							$btn_attrs['aria-controls']  = $btn_attrs['data-open-modal'];
						}
						get_template_part(
							'template-parts/components/primary-button',
							null,
							array(
								'label'      => $cta_label,
								'href'       => $cta_modal ? '' : $cta_href,
								'with_arrow' => $cta_with_arrow,
								'attrs'      => $btn_attrs,
							)
						);
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
