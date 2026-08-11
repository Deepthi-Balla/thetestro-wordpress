<?php
/**
 * Stats section.
 *
 * @package TestRo
 */

$stats = testro_get_stats();
?>
<section class="testro-stats background-blink" aria-label="<?php esc_attr_e( 'Key statistics', 'testro' ); ?>">
	<div class="testro-container">
		<ul class="testro-stats__list">
			<?php foreach ( $stats as $stat ) : ?>
				<li class="testro-stats__item">
					<p class="testro-stats__value"><?php echo esc_html( $stat['value'] ); ?></p>
					<h2 class="testro-stats__label"><?php echo esc_html( $stat['label'] ); ?></h2>
					<p class="testro-stats__desc"><?php echo esc_html( $stat['description'] ); ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
