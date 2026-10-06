<?php
/**
 * Site footer — full-bleed gradient background with content in the global container.
 *
 * @package TestRo
 */

$linkedin = testro_get_option( 'linkedin', 'https://www.linkedin.com/company/thetestro/' );
$youtube  = testro_get_option( 'youtube', 'https://www.youtube.com/@thetestroai' );
$twitter  = ltrim( (string) testro_get_option( 'twitter', '@testro_ai' ), '@' );
$x_url    = $twitter ? 'https://x.com/' . $twitter : '';
$home     = home_url( '/' );
$blog_id  = (int) get_option( 'page_for_posts' );
$blog_url = $blog_id ? get_permalink( $blog_id ) : $home;
?>
<footer class="testro-footer" role="contentinfo">
	<div class="testro-container">
		<div class="testro-footer__inner">
			<div class="testro-footer__brand">
				<a href="<?php echo esc_url( $home ); ?>" class="testro-footer__logo">
					<?php
					echo testro_picture( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						'images/footer-logo.png',
						__( 'theTestRo Logo', 'testro' ),
						array(
							'width'    => 242,
							'height'   => 51,
							'loading'  => 'lazy',
							'decoding' => 'async',
						)
					);
					?>
				</a>
				<div class="testro-footer__about">
					<p class="testro-footer__description">
						<?php esc_html_e( 'All-in-one platform for creating, editing, modifying, and tests without code.', 'testro' ); ?>
					</p>
					<ul class="testro-footer__social">
						<li>
							<a class="testro-footer__social-link--linkedin" href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'theTestRo on LinkedIn', 'testro' ); ?>">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 4C6 5.10457 5.10457 6 4 6C2.89543 6 2 5.10457 2 4C2 2.89543 2.89543 2 4 2C5.10457 2 6 2.89543 6 4Z"/><path d="M2 9H6V22H2V9Z"/><path d="M10 22H14V15C14 13.8954 14.8954 13 16 13C17.1046 13 18 13.8954 18 15V22H22V15C22 11.6863 19.3137 9 16 9C12.6863 9 10 11.6863 10 15V22Z"/></svg>
							</a>
						</li>
						<?php if ( $x_url ) : ?>
						<li>
							<a href="<?php echo esc_url( $x_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'theTestRo on X', 'testro' ); ?>">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.1111 13L3 21M19 3L13.0897 9.64914M3 3L16 21H21L8 3H3Z"/></svg>
							</a>
						</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'theTestRo on YouTube', 'testro' ); ?>">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2.44974 6.99251C2.57907 6.0915 3.31865 5.41506 4.22659 5.35027C6.16394 5.21201 9.53638 5 12 5C14.4636 5 17.8361 5.21201 19.7734 5.35027C20.6813 5.41506 21.4209 6.0915 21.5503 6.99251C21.749 8.37719 22 10.4356 22 12.0001C22 13.5647 21.749 15.623 21.5503 17.0077C21.4209 17.9087 20.6813 18.5852 19.7733 18.6499C17.836 18.7881 14.4636 19 12 19C9.53641 19 6.16403 18.7881 4.22666 18.6499C3.31869 18.5852 2.57906 17.9087 2.44973 17.0077C2.25098 15.623 2 13.5647 2 12.0001C2 10.4356 2.25099 8.37719 2.44974 6.99251Z"/><path d="M16 12L10 15.4641V8.5359L16 12Z"/></svg>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="testro-footer__nav">
				<div class="testro-footer__cols">
					<div class="testro-footer__col testro-footer__col--resources">
						<p class="testro-footer__heading"><?php esc_html_e( 'Resources', 'testro' ); ?></p>
						<ul class="testro-footer__links">
							<li><a href="<?php echo esc_url( $home . '#how-it-works' ); ?>"><?php esc_html_e( 'Documentation', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $home . '#how-it-works' ); ?>"><?php esc_html_e( 'Getting Started', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $home . '#videos' ); ?>"><?php esc_html_e( 'Tutorials', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $home . '#faq' ); ?>"><?php esc_html_e( 'FAQs', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $blog_url ); ?>"><?php esc_html_e( 'Product Updates', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( testro_get_page_url( 'contact-us' ) ); ?>"><?php esc_html_e( 'Help Center', 'testro' ); ?></a></li>
						</ul>
					</div>

					<div class="testro-footer__col testro-footer__col--explore">
						<p class="testro-footer__heading"><?php esc_html_e( 'Explore', 'testro' ); ?></p>
						<ul class="testro-footer__links">
							<li><a href="<?php echo esc_url( $home . '#testimonials' ); ?>"><?php esc_html_e( "Client testimonial's", 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $home . '#services' ); ?>"><?php esc_html_e( 'Quality services', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( testro_get_page_url( 'why-choose-thetestro' ) ); ?>"><?php esc_html_e( 'Why theTestRo', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $home . '#features' ); ?>"><?php esc_html_e( 'Core features', 'testro' ); ?></a></li>
							<li><a href="<?php echo esc_url( $home . '#how-it-works' ); ?>"><?php esc_html_e( 'How It Works', 'testro' ); ?></a></li>
						</ul>
					</div>

					<div class="testro-footer__col testro-footer__col--contact">
						<p class="testro-footer__heading"><?php esc_html_e( 'Contact Us', 'testro' ); ?></p>
						<ul class="testro-footer__links">
							<li><?php esc_html_e( 'Enquire:', 'testro' ); ?> <a class="testro-footer__mail" href="mailto:example@mail.com">example@mail.com</a></li>
							<li><?php esc_html_e( 'Sales:', 'testro' ); ?> <a class="testro-footer__mail" href="mailto:support@mail.com">support@mail.com</a></li>
							<li><?php esc_html_e( 'Phone (IST): +91-XXXXXXXXXX', 'testro' ); ?></li>
							<li><a href="<?php echo esc_url( testro_get_page_url( 'contact-us' ) ); ?>"><?php esc_html_e( 'Book a Demo', 'testro' ); ?></a></li>
						</ul>
					</div>
				</div>

				<div class="testro-footer__col testro-footer__newsletter">
					<p class="testro-footer__heading"><?php esc_html_e( 'Newsletter', 'testro' ); ?></p>
					<p class="testro-footer__newsletter-copy">
						<?php esc_html_e( 'Be first to know—Product updates, exclusive discounts, and early access opportunities.', 'testro' ); ?>
					</p>
					<form class="testro-form testro-form--newsletter" id="testro-newsletter-form" novalidate>
						<div class="testro-footer__subscribe-field">
							<label class="screen-reader-text" for="newsletter-email"><?php esc_html_e( 'Email address', 'testro' ); ?></label>
							<input
								type="email"
								id="newsletter-email"
								name="email"
								placeholder="<?php esc_attr_e( 'Enter your email….', 'testro' ); ?>"
								required
								autocomplete="email"
							/>
							<button type="submit" class="testro-footer__subscribe" aria-label="<?php esc_attr_e( 'Subscribe to newsletter', 'testro' ); ?>">
								<?php esc_html_e( 'Subscribe', 'testro' ); ?>
							</button>
						</div>
						<p class="testro-form__status" role="status" aria-live="polite" hidden></p>
					</form>
				</div>
			</div>
		</div>
	</div>
</footer>
