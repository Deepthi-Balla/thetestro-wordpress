<?php
/**
 * Main fallback template.
 *
 * Prefer home.php / archive.php / single.php / page.php when available.
 * Keeps a single H1: page-level for multi-post views, post title for singular.
 *
 * @package TestRo
 */

get_header();

$is_multi = have_posts() && ! is_singular();
?>

<div class="testro-container testro-inner<?php echo $is_multi ? ' testro-archive' : ''; ?>">
	<?php testro_the_breadcrumbs(); ?>

	<?php if ( have_posts() ) : ?>
		<?php if ( $is_multi ) : ?>
			<header class="testro-entry__header">
				<h1 class="testro-entry__title">
					<?php
					if ( is_home() ) {
						$blog_id = (int) get_option( 'page_for_posts' );
						echo esc_html( $blog_id ? get_the_title( $blog_id ) : __( 'Blog', 'testro' ) );
					} elseif ( is_archive() ) {
						the_archive_title();
					} else {
						esc_html_e( 'Posts', 'testro' );
					}
					?>
				</h1>
			</header>
			<ul class="testro-archive-list">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<li>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'testro-archive-card' ); ?>>
							<h2 class="testro-archive-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<p class="testro-archive-card__meta">
								<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
									<?php echo esc_html( get_the_date() ); ?>
								</time>
							</p>
							<div class="testro-archive-card__excerpt">
								<?php the_excerpt(); ?>
							</div>
						</article>
					</li>
				<?php endwhile; ?>
			</ul>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<?php
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'testro-entry' ); ?>>
				<header class="testro-entry__header">
					<h1 class="testro-entry__title"><?php the_title(); ?></h1>
				</header>
				<div class="testro-entry__content">
					<?php the_content(); ?>
				</div>
			</article>
		<?php endif; ?>
	<?php else : ?>
		<p><?php esc_html_e( 'No posts found.', 'testro' ); ?></p>
	<?php endif; ?>
</div>

<?php
get_footer();
