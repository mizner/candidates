<?php
wp_enqueue_script( 'flickity' );
wp_enqueue_style( 'flickity' );
$post_id          = get_the_ID();
$hero_gallery_ids = get_post_meta( $post_id, 'hero_gallery', true );
//_log( $hero_gallery );
$slider_settings = [
	'autoPlay'        => '1000',
	'wrapAround'      => true,
	'prevNextButtons' => false,
//	'imagesLoaded'    => true,
//	'freeScroll'      => true,
//	'contain'         => true,
];
?>

<section class="hero">
	<div class="container">
		<div class="hero-slider">
			<div class="carousel js-flickity"
			     data-flickity='<?php esc_attr_e( json_encode( $slider_settings ) ); ?>'>
				<?php foreach ( $hero_gallery_ids as $gallery_id ) {
					$image     = wp_get_attachment_image_url( $gallery_id, 'full' );
					$image_url = ( $image == null ? 'https://placehold.it/1920x700' : $image ); // If there's no image, use placeholder image
					$image_alt = ( $image == null ? 'Placeholder' : $image ); // and placeholder text
					?>
					<div class="carousel-cell">
						<img src="<?php echo esc_url( $image_url ); ?>" alt="">
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</section>