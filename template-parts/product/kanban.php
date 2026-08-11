<?php
/**
 * Product page Kanban-style planning board with capability cards.
 *
 * Expected $args: id, eyebrow, title, intro, variant, columns (board columns),
 * items (array[] of icon/title/description).
 *
 * @package TestRo
 */

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$items    = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$columns  = isset( $args['columns'] ) && is_array( $args['columns'] ) ? $args['columns'] : array();
$id       = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';
$variant  = isset( $args['variant'] ) ? sanitize_html_class( (string) $args['variant'] ) : 'spotlight';

if ( ! $items && ! $columns ) {
	return;
}

$heading_id    = $id ? $id . '-heading' : '';
$section_class = 'testro-prod-section testro-prod-kanban';
if ( $variant ) {
	$section_class .= ' testro-prod-section--' . $variant;
}

if ( ! $columns ) {
	$columns = array(
		array(
			'label' => __( 'Backlog', 'testro' ),
			'count' => '8',
			'cards' => array(
				array(
					'title'  => __( 'Smoke Suite', 'testro' ),
					'tag'    => __( 'Suite', 'testro' ),
					'owner'  => 'AK',
					'status' => __( 'Ready', 'testro' ),
				),
				array(
					'title'  => __( 'Checkout Module', 'testro' ),
					'tag'    => __( 'Collection', 'testro' ),
					'owner'  => 'MR',
					'status' => __( 'Draft', 'testro' ),
				),
			),
		),
		array(
			'label' => __( 'In Progress', 'testro' ),
			'count' => '5',
			'cards' => array(
				array(
					'title'  => __( 'Release 2.4 Plan', 'testro' ),
					'tag'    => __( 'Version', 'testro' ),
					'owner'  => 'SL',
					'status' => __( 'Active', 'testro' ),
				),
				array(
					'title'  => __( 'Payment Regression', 'testro' ),
					'tag'    => __( 'Label', 'testro' ),
					'owner'  => 'JD',
					'status' => __( 'Running', 'testro' ),
				),
			),
		),
		array(
			'label' => __( 'Review', 'testro' ),
			'count' => '3',
			'cards' => array(
				array(
					'title'  => __( 'API Contract Pack', 'testro' ),
					'tag'    => __( 'Owner', 'testro' ),
					'owner'  => 'TN',
					'status' => __( 'Review', 'testro' ),
				),
			),
		),
		array(
			'label' => __( 'Done', 'testro' ),
			'count' => '12',
			'cards' => array(
				array(
					'title'  => __( 'Login SSO Suite', 'testro' ),
					'tag'    => __( 'Suite', 'testro' ),
					'owner'  => 'RK',
					'status' => __( 'Passed', 'testro' ),
				),
			),
		),
	);
}
?>
<section
	class="<?php echo esc_attr( $section_class ); ?>"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'    => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'      => isset( $args['title'] ) ? $args['title'] : '',
				'intro'      => isset( $args['intro'] ) ? $args['intro'] : '',
				'heading_id' => $heading_id,
			)
		);
		?>

		<div class="testro-prod-kanban__layout">
			<div class="testro-prod-kanban__board" data-reveal role="img" aria-label="<?php esc_attr_e( 'Kanban-style test planning board with suites, collections, owners and versions', 'testro' ); ?>">
				<div class="testro-prod-kanban__chrome" aria-hidden="true">
					<span></span><span></span><span></span>
					<p class="testro-prod-kanban__chrome-label"><?php esc_html_e( 'Test Planning Board', 'testro' ); ?></p>
					<span class="testro-prod-kanban__live"><?php esc_html_e( 'Live', 'testro' ); ?></span>
				</div>

				<div class="testro-prod-kanban__cols" aria-hidden="true">
					<?php foreach ( $columns as $col_index => $column ) : ?>
						<div class="testro-prod-kanban__col" style="--reveal-delay: <?php echo esc_attr( (string) ( $col_index * 70 ) ); ?>ms">
							<header class="testro-prod-kanban__col-head">
								<strong><?php echo esc_html( $column['label'] ); ?></strong>
								<em><?php echo esc_html( (string) $column['count'] ); ?></em>
							</header>
							<?php if ( ! empty( $column['cards'] ) ) : ?>
								<?php foreach ( $column['cards'] as $card ) : ?>
									<article class="testro-prod-kanban__card">
										<span class="testro-prod-kanban__tag"><?php echo esc_html( $card['tag'] ); ?></span>
										<p class="testro-prod-kanban__card-title"><?php echo esc_html( $card['title'] ); ?></p>
										<footer class="testro-prod-kanban__card-meta">
											<span class="testro-prod-kanban__avatar"><?php echo esc_html( $card['owner'] ); ?></span>
											<span class="testro-prod-kanban__status"><?php echo esc_html( $card['status'] ); ?></span>
										</footer>
									</article>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<?php if ( $items ) : ?>
				<ul class="testro-prod-kanban__features">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-kanban__feature" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<span class="testro-prod-kanban__feature-icon" aria-hidden="true">
								<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							</span>
							<span class="testro-prod-kanban__feature-text">
								<h3 class="testro-prod-kanban__feature-title"><?php echo esc_html( $item['title'] ); ?></h3>
								<p class="testro-prod-kanban__feature-desc"><?php echo esc_html( $item['description'] ); ?></p>
							</span>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
