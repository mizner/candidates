<?php
$post_id      = get_the_ID();
$hero_gallery = get_post_meta( $post_id, 'hero_gallery', true );
//_log( $hero_gallery );
?>

<section class="hero">
	<div class="container">
		<img src="http://via.placeholder.com/1920x600/000000/ffffff" alt="">

	</div>
</section>