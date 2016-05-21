<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name:
 * Filename: scripts.php
 * Date: 20/5/2016
 * Time: 11:16 μμ
 */


if (!function_exists('iigt_enqueue_styles')) {
	/**
	 * Registers the styles for the plugin
	 */
	function iigt_register_styles()
	{
		wp_register_style("iigt_style", plugin_dir_url(IIGT_FILE) . 'assets/style.css', array(), "1.0");
	}
	add_action('wp_enqueue_scripts', 'iigt_register_styles');
}

if (!function_exists('iigt_set_gallery_styles')) {
	/**
	 * Sets dynamic styles for shortcode gallery
	 *
	 * @param $atts
	 */
	function iigt_set_gallery_styles($atts)
	{
		//get the options
		list($width, $columns, $show_name) = array_values($atts);
		wp_enqueue_style('iigt_style');

		//Calculate values
		$margin = 5;
		$item_width = floor($width / $columns) - 2 * $margin;

		wp_add_inline_style('iigt_style', sprintf("
			.my-image-gallery {				
				width: %dpx;						
			}
			.my-image-gallery .item {				
				width: %dpx;
				height: %dpx;
				margin: %dpx				
			}			
		", $width, $item_width, $item_width, $margin));
	}
}