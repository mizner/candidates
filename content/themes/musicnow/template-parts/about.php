<?php
$post_id   = get_the_ID();
$content   = get_post_meta( $post_id, 'about_content', true );
$image_id  = get_post_meta( $post_id, 'about_image', true );
$image_url = wp_get_attachment_image_url( $image_id, 'medium' );
$image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
?>
<section class="home-about module">
	<div class="container">
		<article>
			<?php echo wp_kses_post( $content ); ?>
		</article>
		<div class="home-about-image-wrapper">
			<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( $image_alt ) ?>">
		</div>
	</div>
</section>