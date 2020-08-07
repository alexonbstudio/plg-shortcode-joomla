<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.1.1
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('wp_sc')) {

	function wp_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'url' => ''
		 ), $atts));
		 
		$urls = ($url !='') ? $url : JURI::current();
		
		return $urls.' '.$content;
	}
		
	add_bbcodes( 'wp', 'wp_sc' );
}