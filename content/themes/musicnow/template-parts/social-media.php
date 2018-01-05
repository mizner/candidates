<?php

use Pyxl\Theme\Social;

$social = new Social();

?>
<section class="social-media">
	<ul class="social-media-list">
		<?php foreach ( $social->platforms() as $icon => $link ) : ?>
			<li class="fa-svg-wrapper fa-svg-<?php esc_attr_e( $icon ) ?>">
				<a href="<?php echo esc_url( $link ) ?>" itemprop="url">
					<svg class="fa-svg">
						<use xlink:href="#<?php esc_html_e( $icon ); ?>"></use>
					</svg>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</section>