<?php

use Pyxl\Theme\Customizer\Social;

$social = new Social();

?>
<section class="social-media-mobile">
	<ul class="social-media-list">
		<?php foreach ( $social->platforms() as $icon => $link ) : ?>
			<li class="fa-svg-wrapper fa-svg-<?php esc_attr_e( $icon ) ?>">
				<a href="<?php echo esc_url( $link ) ?>" itemprop="url">
					<span class="social-media-name"><?php echo strtoupper( esc_html( $icon ) ); ?></span>
					<span class="social-media-icon">
						<svg class="fa-svg">
							<use xlink:href="#<?php esc_html_e( $icon ); ?>"></use>
						</svg>
					</span>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>