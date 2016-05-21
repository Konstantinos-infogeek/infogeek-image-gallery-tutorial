<?php
/**
 * Created by Konstantinos Tsatsarounos<konstantinos.tsatsarounos@gmail.com>
 * Project Name:
 * Filename: utilities.php
 * Date: 21/5/2016
 * Time: 5:08 πμ
 */

if (!function_exists('iigt_get_theme_content_width')) {
	/**
	 * @param int $default
	 *
	 * @return int
	 */
	function iigt_get_theme_content_width($default = 500)
	{
		global $content_width;
		return is_numeric($content_width) ? (int) $content_width : $default;
	}
}

if (!function_exists('iigt_get_file_name_from_url')) {
	/**
	 * @param $url
	 *
	 * @return string
	 */
	function iigt_get_file_name_from_url($url)
	{
		if( count( $sections = explode('/', $url ) ) > 0 ){
			return preg_replace( "/[-_]/", " ", substr($last = $sections[count($sections) - 1], 0, strpos($last, ".") ) );
		}
		return $url;
	}
}