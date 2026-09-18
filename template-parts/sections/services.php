<?php
/**
 * Services section — Functional Automation Testing cards.
 * Matches reference: hover fill, elevation, heading swap.
 *
 * @package TestRo
 */

$services = testro_get_services();
$default  = $services[0];
?>
<section class="testro-services linear-background" id="services" aria-labelledby="services-heading" data-services>
	<div class="testro-services__eyebrow-wrap">
		<h2 id="services-heading" class="testro-services__heading gradient-text"><?php esc_html_e( 'Quality services you can count on', 'testro' ); ?></h2>
	</div>

	<header class="testro-services__header">
		<p class="testro-services__intro sub-text" data-services-title>
			<?php echo esc_html( $default['main_title'] ); ?>
		</p>
		<p class="testro-services__intro sub-text" data-services-desc>
			<?php echo esc_html( $default['main_description'] ); ?>
		</p>
	</header>

	<div class="testro-container">
		<ul class="testro-services__grid">
			<?php foreach ( $services as $service ) : ?>
				<li
					class="testro-services__card"
					data-services-card
					data-main-title="<?php echo esc_attr( $service['main_title'] ); ?>"
					data-main-description="<?php echo esc_attr( $service['main_description'] ); ?>"
					tabindex="0"
				>
					<span class="testro-services__fill" aria-hidden="true"></span>
					<div class="testro-services__body">
						<div class="testro-services__media">
							<?php
							echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								$service['image'],
								$service['title'],
								array(
									'width'   => 222,
									'height'  => 225,
									'class'   => 'testro-services__image',
									'loading' => 'lazy',
								)
							);
							?>
						</div>
						<h3 class="testro-services__title"><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="testro-services__desc"><?php echo esc_html( $service['description'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
