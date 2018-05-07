<?php

namespace HG\CandidateCore\InlineStyles\Page;

use HG\CandidateCore\TemplateData\PageBackgroundOptions;

class BackgroundOptions
{
	public static function init()
	{
		$class = new self;
		add_action('get_footer', [$class, 'render']);
	}

	public function render()
	{
		echo $this->getStyles();
	}

	public function getStyles()
	{
		$data = new PageBackgroundOptions();
		$background_image_url = wp_get_attachment_image_url($data->background_image, 'full');

		ob_start();
		?>
		<style>

			.page #wrapper {
				background-color: #777777;
				background-image: url("<?php echo esc_attr($background_image_url) ?>");
				background-attachment: fixed;
				background-position: center;
				background-size: cover;
			}

		</style>
		<?php
		return ob_get_clean();
	}
}