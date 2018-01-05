<?php
do_action( 'pyxl_before_footer' );

$copyright   = get_theme_mod( 'copyright' );
$footer_logo = get_theme_mod( 'footer_logo' );
?>
	<footer id="colophon" class="site-footer module">
		<div class="container">
			<section class="copyright">
				<p><?php echo wp_kses_post( $copyright ); ?></p>
			</section>
			<section class="footer-logo">
				<img src="<?php echo esc_url( $footer_logo ); ?>" alt="">
			</section>
		</div>
	</footer>
<?php
do_action( 'pyxl_after_footer' );
wp_footer();