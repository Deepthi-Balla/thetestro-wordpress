<?php
/**
 * Solutions by Industry — Framer card grid.
 *
 * @package TestRo
 */

$items = array(
	array(
						'label'       => 'Insurance',
						'description' => 'Test claims and policies. Keep every payout accurate',
						'href'        => testro_nav_url( 'insurance' ),
						'icon'        => 'health',
					),
				
					array(
						'label'       => 'Banking & Finance',
						'description' => 'Run safe, secure tests for strict systems.',
						'href'        => testro_nav_url( 'banking-finance' ),
						'icon'        => 'bank',
					),
					array(
						'label'       => 'Healthcare',
						'description' => 'Test patient portals. Meet every rule, every time.',
						'href'        => testro_nav_url( 'healthcare' ),
						'icon'        => 'health',
					),
					array(
						'label'       => 'Education',
						'description' => 'Test student portals and learning platforms, even during enrollment rush.',
						'icon'        => 'health',
					),
					array(
						'label'       => 'Travel & Hospitality',
						'description' => 'Test bookings and check-ins, even during peak season.',
						'href'        => testro_nav_url( 'travel-and-hospitality' ),
						'icon'        => 'retail',
					),
					array(
						'label'       => 'Retail & E-commerce',
						'description' => 'Test checkout and payments, even under heavy load.',
						'href'        => testro_nav_url( 'retail-ecommerce' ),
						'icon'        => 'spark',
					),
);
?>
<section class="testro-industries testro-industries--framer" id="industries" aria-labelledby="industries-heading">
	<div class="testro-container">
		<header class="testro-section-header testro-industries__header">
			<h2 id="industries-heading" class="main-headings"><?php echo esc_html( testro_section_label_title( __( 'SOLUTIONS BY INDUSTRY', 'testro' ) ) ); ?></h2>
			<p class="sub-text testro-industries__headline"><?php esc_html_e( 'Built for your industry.', 'testro' ); ?></p>
			<p class="sub-text testro-industries__headline">
			</p>
		</header>

		<ul class="testro-industries__grid testro-industries__grid--framer">
			<?php foreach ( $items as $item ) : ?>
				<?php $has_link = ! empty( $item['href'] ); ?>
				<li>
					<?php if ( $has_link ) : ?>
					<a class="testro-industries__card testro-industries__card--framer testro-card--top-line" href="<?php echo esc_url( $item['href'] ); ?>">
					<?php else : ?>
					<div class="testro-industries__card testro-industries__card--framer testro-card--top-line">
					<?php endif; ?>
						<span class="testro-industries__accent" aria-hidden="true"></span>
						<span class="testro-industries__icon" aria-hidden="true">
							<?php echo testro_nav_icon( $item['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</span>
						<span class="testro-industries__body">
							<strong class="testro-industries__label"><?php echo esc_html( $item['label'] ); ?></strong>
							<span class="testro-industries__desc"><?php echo esc_html( $item['description'] ); ?></span>
						</span>
					<?php if ( $has_link ) : ?>
					</a>
					<?php else : ?>
					</div>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
