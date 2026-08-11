<?php
/**
 * Top promotional banner.
 *
 * @package TestRo
 */

$banner_text = testro_get_option(
	'banner_text',
	"Boost Testing Efficiency with theTestRo's Smart Automation"
);
?>
<div class="testro-top-banner" role="region" aria-label="<?php esc_attr_e( 'Promotional banner', 'testro' ); ?>">
	<div class="testro-top-banner__inner banner-background">
		<div class="testro-top-banner__content">
			<p class="testro-top-banner__text">
				<?php echo esc_html( $banner_text ); ?>
				<button
					type="button"
					class="testro-top-banner__cta"
					data-open-modal="demo-modal"
					aria-haspopup="dialog"
					aria-controls="demo-modal"
				><?php esc_html_e( 'GET DEMO NOW', 'testro' ); ?></button>
			</p>
		</div>
	</div>
</div>
