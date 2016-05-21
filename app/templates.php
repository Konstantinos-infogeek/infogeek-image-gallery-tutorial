<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name:
 * Filename: templates.php
 * Date: 21/5/2016
 * Time: 5:07 πμ
 */

if (!function_exists('iigt_get_gallery_template')) {
	/**
	 * @param $urls
	 * @param $atts
	 *
	 * @return string
	 */
	function iigt_get_gallery_template($urls, $atts)
	{
		list($width, $columns, $show_name) = array_values($atts);

		return sprintf("
		<section class='my-image-gallery'>
			%s
		</section>
		", implode('', array_map(function($current, $index) use($show_name){
			return iigt_get_gallery_item($current, $index, $show_name);
		}, $urls, array_keys($urls)) ) );
	}
}

if (!function_exists('iigt_get_gallery_item')) {
	/**
	 * @param $url
	 * @param $index
	 * @param $show_name
	 *
	 * @return string
	 */
	function iigt_get_gallery_item($url, $index, $show_name)
	{
		$name = ($show_name) ? '<span>'.iigt_get_file_name_from_url($url).'</span>' : '';

		return sprintf("
			<div class='item%s' style='background-image: url(%s);'>%s</div>
		", $extra_class = ($index%2 == 0) ? ' odd-item': '', $url, $name);
	}
}