<?php
/*
Plugin Name: Infogeek Image Gallery Tutorial
Plugin URI:
Description: Tutorial for plugin on how to make a simple gallery shortcode
Version: 1.0
Author: Konstantinos Tsatsarounos
Author URI: http://www.ketchupthemes.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
Network: false
Text Domain:
Domain Path: /language
*/

//Set an identifier for the plugin
if(!defined('IIGT')){
	define('IIGT', '1.0' );
}
define( "IIGT_FILE", __FILE__ );


if (!function_exists('iigt_include_file')) {
	/**
	 * @param $path
	 * @param string $extension
	 */
	function iigt_include_file($path, $extension = 'php')
	{
		include_once plugin_dir_path(IIGT_FILE) . $path . ".{$extension}";
	}
}

//Include needed files and utilities
iigt_include_file('/app/scripts');
iigt_include_file('/app/utilities');
iigt_include_file('/app/templates');


if (!function_exists('iigt_add_gallery_shortcode')) {
	/**
	 * Registers a shortcode for a simple gallery
	 */
	function iigt_add_gallery_shortcode()
	{
		add_shortcode('my-image-gallery', function($atts, $content){

			$atts = shortcode_atts(array(
				'width' => iigt_get_theme_content_width(),
				'columns' => '2',
				'show_name' => FALSE,
			), $atts, 'my_image_gallery');

			iigt_set_gallery_styles($atts);

			if(!empty($content)){
				$urls = [];

				foreach (explode(',', trim($content)) as $url){
					if( $url = filter_var($url, FILTER_VALIDATE_URL) ){
						array_push($urls, $url);
					}
				}
				return iigt_get_gallery_template($urls, $atts);
			}
			return '<strong style="color: red;">No gallery items to show.</strong>';
		});

	}

	add_action('plugins_loaded', 'iigt_add_gallery_shortcode', 20);
}
