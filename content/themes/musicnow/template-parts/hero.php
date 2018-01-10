<?php
wp_enqueue_script( 'flickity' );
wp_enqueue_style( 'flickity' );
if ( function_exists( 'get_field' ) ) {
	$slider          = get_field( 'hero_slider' );
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
				     data-flickity='<?php echo esc_attr( json_encode( $slider_settings ) ); ?>'>
					<?php
					foreach ( $slider as $slide ) {
						// If there's no image, use placeholder image
						$image_url = ( ! isset( $slide['image']['url'] ) ? 'https://placehold.it/1920x700' : $slide['image']['url'] );
						// and placeholder text
						$image_alt = ( ! isset( $slide['image']['url'] ) == null ? 'Image' : $image );
						?>
						<div class="carousel-cell">
							<a href="<?php echo esc_url( $slide['link']['url'] ) ?>"
							   target="<?php echo esc_attr( $slide['link']['target'] ); ?>">
								<img src="<?php echo esc_url( $image_url ); ?>"
								     alt="<?php echo esc_attr( $image_alt ) ?>">
							</a>

						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<?php
} // End if().
