<?php
/**
 * Single post template.
 *
 * @package TestRo
 */

get_header();
?>

<div class="testro-container testro-inner">
	<?php testro_the_breadcrumbs(); ?>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'testro-entry testro-single' ); ?> itemscope itemtype="https://schema.org/Article">
			<header class="testro-entry__header">
				<h1 class="testro-entry__title" itemprop="headline"><?php the_title(); ?></h1>
				<p class="testro-entry__meta">
					<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>" itemprop="datePublished">
						<?php echo esc_html( get_the_date() ); ?>
					</time>
					<span class="testro-entry__author" itemprop="author"><?php the_author(); ?></span>
				</p>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="testro-entry__thumbnail" itemprop="image">
					<?php the_post_thumbnail( 'large' ); ?>
				</figure>
			<?php endif; ?>

			<div class="testro-entry__content" itemprop="articleBody">
				<?php the_content(); ?>
			</div>

			<footer class="testro-entry__footer">
				<?php the_tags( '<p class="testro-entry__tags">', ', ', '</p>' ); ?>
			</footer>
		</article>

		<?php
		the_post_navigation(
			array(
				'prev_text' => __( '&larr; Previous', 'testro' ),
				'next_text' => __( 'Next &rarr;', 'testro' ),
			)
		);
		?>
	<?php endwhile; ?>
</div>

<?php
get_footer();
