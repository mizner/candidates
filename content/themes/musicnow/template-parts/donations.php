<?php
$post_id = get_the_ID();
$prefix  = 'donation_';
$title   = get_post_meta( $post_id, $prefix . 'title', true );
$content = get_post_meta( $post_id, $prefix . 'content', true );
?>

<section class="donations module">
	<div class="container">
		<h3><?php esc_html_e( $title ); ?></h3>
		<article>
			<?php echo wp_kses_post( $content ); ?>
		</article>
	</div>
</section>
