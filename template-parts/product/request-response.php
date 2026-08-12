<?php
/**
 * Product page request/response or visual→code split — mock source panel →
 * processing → output panel with feature cards.
 *
 * Expected $args: id, eyebrow, title, intro, request (method/path/body[]),
 * response (status/body[]), items (array[] of icon/title/description).
 * Optional labels: process_label, request_label, response_label, pass_label,
 * flow_aria (aria-label for the flow diagram).
 *
 * @package TestRo
 */

$args     = isset( $args ) && is_array( $args ) ? $args : array();
$request  = isset( $args['request'] ) && is_array( $args['request'] ) ? $args['request'] : array();
$response = isset( $args['response'] ) && is_array( $args['response'] ) ? $args['response'] : array();
$items    = isset( $args['items'] ) && is_array( $args['items'] ) ? $args['items'] : array();
$id       = isset( $args['id'] ) ? sanitize_title( $args['id'] ) : '';

if ( ! $request && ! $response && ! $items ) {
	return;
}

$heading_id      = $id ? $id . '-heading' : '';
$request_body    = isset( $request['body'] ) && is_array( $request['body'] ) ? $request['body'] : array();
$response_body   = isset( $response['body'] ) && is_array( $response['body'] ) ? $response['body'] : array();
$request_method  = isset( $request['method'] ) ? (string) $request['method'] : 'POST';
$request_path    = isset( $request['path'] ) ? (string) $request['path'] : '/api';
$response_status = isset( $response['status'] ) ? (string) $response['status'] : '200 OK';
$process_label   = isset( $args['process_label'] ) ? (string) $args['process_label'] : __( 'API Processing', 'testro' );
$request_label   = isset( $args['request_label'] ) ? (string) $args['request_label'] : __( 'Request', 'testro' );
$response_label  = isset( $args['response_label'] ) ? (string) $args['response_label'] : __( 'Response', 'testro' );
$pass_label      = isset( $args['pass_label'] ) ? (string) $args['pass_label'] : __( 'Validated', 'testro' );
$flow_aria       = isset( $args['flow_aria'] ) ? (string) $args['flow_aria'] : __( 'API request processing into a validated response', 'testro' );
?>
<section
	class="testro-prod-section testro-prod-section--tint testro-prod-rr"
	<?php echo $id ? 'id="' . esc_attr( $id ) . '"' : ''; ?>
	<?php echo $heading_id ? 'aria-labelledby="' . esc_attr( $heading_id ) . '"' : ''; ?>
>
	<div class="testro-container">
		<?php
		get_template_part(
			'template-parts/product/section-header',
			null,
			array(
				'eyebrow'       => isset( $args['eyebrow'] ) ? $args['eyebrow'] : '',
				'title'         => isset( $args['title'] ) ? $args['title'] : '',
				'intro'         => isset( $args['intro'] ) ? $args['intro'] : '',
				'intro_extra'   => isset( $args['intro_extra'] ) ? $args['intro_extra'] : '',
				'heading_id'    => $heading_id,
				'heading_level' => isset( $args['heading_level'] ) ? (int) $args['heading_level'] : 2,
			)
		);
		?>

		<div class="testro-prod-rr__layout">
			<div class="testro-prod-rr__flow" data-reveal role="img" aria-label="<?php echo esc_attr( $flow_aria ); ?>">
				<article class="testro-prod-rr__panel testro-prod-rr__panel--request">
					<header class="testro-prod-rr__panel-head">
						<span class="testro-prod-rr__method"><?php echo esc_html( $request_method ); ?></span>
						<code class="testro-prod-rr__path"><?php echo esc_html( $request_path ); ?></code>
					</header>
					<p class="testro-prod-rr__label"><?php echo esc_html( $request_label ); ?></p>
					<pre class="testro-prod-rr__json" aria-hidden="true"><?php
					foreach ( $request_body as $line ) {
						echo esc_html( $line ) . "\n";
					}
					?></pre>
				</article>

				<div class="testro-prod-rr__process" aria-hidden="true">
					<span class="testro-prod-rr__process-line"></span>
					<span class="testro-prod-rr__process-pill">
						<?php echo testro_icon( 'sparkles', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
						<?php echo esc_html( $process_label ); ?>
					</span>
					<span class="testro-prod-rr__process-line"></span>
				</div>

				<article class="testro-prod-rr__panel testro-prod-rr__panel--response">
					<header class="testro-prod-rr__panel-head">
						<span class="testro-prod-rr__status"><?php echo esc_html( $response_status ); ?></span>
						<span class="testro-prod-rr__pass">
							<?php echo testro_icon( 'circle-check', array( 'size' => 14 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
							<?php echo esc_html( $pass_label ); ?>
						</span>
					</header>
					<p class="testro-prod-rr__label"><?php echo esc_html( $response_label ); ?></p>
					<pre class="testro-prod-rr__json" aria-hidden="true"><?php
					foreach ( $response_body as $line ) {
						echo esc_html( $line ) . "\n";
					}
					?></pre>
				</article>
			</div>

			<?php if ( $items ) : ?>
				<ul class="testro-prod-rr__cards">
					<?php foreach ( $items as $index => $item ) : ?>
						<li class="testro-prod-rr__card" data-reveal style="--reveal-delay: <?php echo esc_attr( (string) ( $index * 70 ) ); ?>ms">
							<span class="testro-prod-rr__card-glow" aria-hidden="true"></span>
							<?php if ( ! empty( $item['icon'] ) ) : ?>
								<span class="testro-prod-rr__card-icon" aria-hidden="true">
									<?php echo testro_icon( $item['icon'], array( 'size' => 22 ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG. ?>
								</span>
							<?php endif; ?>
							<h3 class="testro-prod-rr__card-title"><?php echo esc_html( $item['title'] ); ?></h3>
							<?php if ( ! empty( $item['description'] ) ) : ?>
								<p class="testro-prod-rr__card-desc"><?php echo esc_html( $item['description'] ); ?></p>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
</section>
