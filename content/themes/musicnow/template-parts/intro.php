<?php
$post_id = get_the_ID();
$content = get_post_meta( $post_id, 'intro_content', true );

?>
<section class="home-intro module">
	<div class="container">
		<article>
			<?php echo wp_kses_post( $content ); ?>
		</article>
	</div>
</section>
