<?php
/**
 * Site footer — floating card layout matching theTestRo reference.
 *
 * @package TestRo
 */

$email     = testro_get_option( 'email', 'support@thetestro.com' );
$linkedin  = testro_get_option( 'linkedin', 'https://www.linkedin.com/company/thetestro/' );
$youtube   = testro_get_option( 'youtube', 'https://www.youtube.com/@thetestroai' );
$terms_url = testro_get_page_url( 'terms-conditions' );
$privacy   = testro_get_page_url( 'privacy-notice' );
$home      = home_url( '/' );
$footer_bg = testro_asset_webp( 'images/footer-bg.png' );
$blog_id   = (int) get_option( 'page_for_posts' );
$blog_url  = $blog_id ? get_permalink( $blog_id ) : $home;
?>
<footer class="testro-footer" role="contentinfo">
	<div
		class="testro-footer__card"
		style="--footer-bg: url('<?php echo esc_url( $footer_bg ); ?>')"
	>
		<div class="testro-footer__overlay" aria-hidden="true"></div>

		<div class="testro-footer__inner">
			<div class="testro-footer__brand">
				<a href="<?php echo esc_url( $home ); ?>" class="testro-footer__logo">
					<?php
					echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'images/testro-logo.png',
						__( 'theTestRo Logo', 'testro' ),
						array(
							'width'    => 140,
							'height'   => 40,
							'loading'  => 'lazy',
							'decoding' => 'async',
						)
					);
					?>
				</a>
				<p class="testro-footer__description">
					<?php esc_html_e( 'All-in-one, Intelligence-powered platform for intelligent, self-healing test automation—enabling faster, more reliable releases.', 'testro' ); ?>
				</p>
			</div>

			<div class="testro-footer__col">
				<p class="testro-footer__heading"><?php esc_html_e( 'RESOURCES', 'testro' ); ?></p>
				<ul class="testro-footer__links">
					<li><a href="<?php echo esc_url( $home . '#how-it-works' ); ?>"><?php esc_html_e( 'Documentation', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $home . '#how-it-works' ); ?>"><?php esc_html_e( 'Getting Started', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $home . '#videos' ); ?>"><?php esc_html_e( 'Tutorials', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $home . '#faq' ); ?>"><?php esc_html_e( 'FAQs', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $blog_url ); ?>"><?php esc_html_e( 'Product Updates', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( testro_get_page_url( 'contact-us' ) ); ?>"><?php esc_html_e( 'Help Center', 'testro' ); ?></a></li>
				</ul>
			</div>

			<div class="testro-footer__col">
				<p class="testro-footer__heading"><?php esc_html_e( 'EXPLORE', 'testro' ); ?></p>
				<ul class="testro-footer__links">
					<li><a href="<?php echo esc_url( $home . '#testimonials' ); ?>"><?php esc_html_e( "Client Testimonial's", 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $home . '#services' ); ?>"><?php esc_html_e( 'Quality services', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( testro_get_page_url( 'why-choose-thetestro' ) ); ?>"><?php esc_html_e( 'Why theTestRo', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $home . '#features' ); ?>"><?php esc_html_e( 'Core Features', 'testro' ); ?></a></li>
					<li><a href="<?php echo esc_url( $home . '#how-it-works' ); ?>"><?php esc_html_e( 'How It Works', 'testro' ); ?></a></li>
					<li>
						<a class="testro-footer__link--accent" href="<?php echo esc_url( testro_get_page_url( 'pricing' ) ); ?>">
							<?php esc_html_e( 'Pricing', 'testro' ); ?>
							<strong><?php esc_html_e( '(Try for free)', 'testro' ); ?></strong>
						</a>
					</li>
				</ul>
			</div>

			<div class="testro-footer__col">
				<p class="testro-footer__heading"><?php esc_html_e( 'CONTACT US', 'testro' ); ?></p>
				<div class="testro-footer__contact">
					<div class="testro-footer__enquire">
						<span><?php esc_html_e( 'Enquire:', 'testro' ); ?></span>
						<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
					</div>
					<a class="testro-footer__demo" href="<?php echo esc_url( testro_get_page_url( 'contact-us' ) ); ?>"><?php esc_html_e( 'Book a Demo', 'testro' ); ?></a>
				</div>
			</div>

			<div class="testro-footer__col testro-footer__newsletter">
				<div class="testro-footer__newsletter-block">
					<p class="testro-footer__heading testro-footer__heading--newsletter"><?php esc_html_e( 'NEWSLETTER', 'testro' ); ?></p>
					<p class="testro-footer__newsletter-copy">
						<?php esc_html_e( 'Be first to know—Product updates, exclusive discounts, and early access opportunities.', 'testro' ); ?>
					</p>
					<form class="testro-form testro-form--newsletter" id="testro-newsletter-form" novalidate>
						<label class="screen-reader-text" for="newsletter-email"><?php esc_attr_e( 'Email address', 'testro' ); ?></label>
						<input
							type="email"
							id="newsletter-email"
							name="email"
							placeholder="<?php esc_attr_e( 'Enter your email....', 'testro' ); ?>"
							required
							autocomplete="email"
						/>
						<button type="submit" class="testro-footer__subscribe" aria-label="<?php esc_attr_e( 'Subscribe to newsletter', 'testro' ); ?>">
							<?php esc_html_e( 'Subscribe', 'testro' ); ?>
						</button>
						<p class="testro-form__status" role="status" aria-live="polite" hidden></p>
					</form>
				</div>

				<div class="testro-footer__follow">
					<p class="testro-footer__heading testro-footer__heading--follow"><?php esc_html_e( 'FOLLOW US', 'testro' ); ?></p>
					<ul class="testro-footer__social">
						<li>
							<a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'theTestRo on LinkedIn', 'testro' ); ?>">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
							</a>
						</li>
						<li>
							<a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'theTestRo on YouTube', 'testro' ); ?>">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="testro-footer__bottom">
			<p class="testro-footer__copy"><?php echo esc_html( '© ' . gmdate( 'Y' ) . ' - All Rights Reserved' ); ?></p>
			<nav class="testro-footer__legal" aria-label="<?php esc_attr_e( 'Legal', 'testro' ); ?>">
				<a href="<?php echo esc_url( $terms_url ); ?>"><?php esc_html_e( 'Terms & Conditions', 'testro' ); ?></a>
				<a href="<?php echo esc_url( $privacy ); ?>"><?php esc_html_e( 'Privacy Notice', 'testro' ); ?></a>
			</nav>
		</div>
	</div>
</footer>
