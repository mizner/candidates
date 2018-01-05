<?php
get_header();
while ( have_posts() ) : the_post(); ?>

	<div class="container">
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
	</div>

<?php endwhile;
get_footer();
