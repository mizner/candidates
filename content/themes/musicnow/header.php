<?php
get_template_part( 'template-parts/head' );
do_action( 'pyxl_before_header' );
?>
	<header id="masthead" class="site-header">
		<div class="container">
			<a href="<?php echo get_home_url() ?>">
				<h1 class="site-title">
					<?php
					$title    = 'Music<strong>Now</strong>';
					$date     = '04.27-29 / 2018';
					$location = 'CINCINNATI, OH';
					?>
					<div class="title-primary">
						<span class="title"><?php echo $title; ?></span>
					</div>
					<div class="title-secondary">
						<div>
							<span class="title-date"><?php esc_html_e( $date ); ?></span>
							<span class="title-location"><?php esc_html_e( $location ); ?></span>
						</div>
					</div>
				</h1>
			</a>
		</div>
	</header>
<?php
do_action( 'pyxl_after_header' );