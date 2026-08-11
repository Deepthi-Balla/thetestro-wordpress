<?php
/**
 * Theme footer.
 *
 * @package TestRo
 */
?>
	</main><!-- #main-content -->

	<?php get_template_part( 'template-parts/footer/site-footer' ); ?>
	<?php get_template_part( 'template-parts/components/demo-modal' ); ?>

</div><!-- #page -->

	<button
		type="button"
		class="testro-scroll-top"
		data-scroll-top
		aria-label="<?php esc_attr_e( 'Scroll to top', 'testro' ); ?>"
		aria-hidden="true"
		tabindex="-1"
	>
		<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'testro' ); ?></span>
		<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
			<path d="m7.5 15.25 4.5-4.5 4.5 4.5" />
			<path d="m7.5 11.25 4.5-4.5 4.5 4.5" />
		</svg>
	</button>

<?php wp_footer(); ?>
</body>
</html>
