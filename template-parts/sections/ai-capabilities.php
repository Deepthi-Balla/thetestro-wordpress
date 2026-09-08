<?php
/**
 * AI capabilities — Framer gradient band + capability cards.
 *
 * @package TestRo
 */

$data  = testro_get_ai_capabilities();
$items = isset( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();
?>
<section class="testro-ai testro-ai--framer" id="ai-capabilities" aria-labelledby="ai-capabilities-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-ai__header">
			<?php if ( ! empty( $data['eyebrow'] ) ) : ?>
				<p class="testro-section-eyebrow testro-ai__eyebrow"><?php echo esc_html( $data['eyebrow'] ); ?></p>
			<?php endif; ?>
			<h2 id="ai-capabilities-heading" class="main-headings testro-ai__title"><?php echo esc_html( $data['title'] ); ?></h2>
			<?php if ( ! empty( $data['intro'] ) ) : ?>
				<p class="sub-text testro-ai__intro"><?php echo esc_html( $data['intro'] ); ?></p>
			<?php endif; ?>
		</header>

		<?php if ( $items ) : ?>
			<ul class="testro-ai__grid">
				<?php foreach ( $items as $item ) : ?>
					<li class="testro-ai__card">
						<span class="testro-ai__icon" aria-hidden="true">
							<?php
							if ( ! empty( $item['icon'] ) && function_exists( 'testro_icon' ) ) {
								echo testro_icon( $item['icon'], array( 'size' => 20 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							}
							?>
						</span>
						<h3 class="testro-ai__card-title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="testro-ai__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<?php if ( ! empty( $data['outro'] ) ) : ?>
			<blockquote class="testro-ai__quote">
				<p><?php echo esc_html( $data['outro'] ); ?></p>
			</blockquote>
		<?php endif; ?>
	</div>
</section>
