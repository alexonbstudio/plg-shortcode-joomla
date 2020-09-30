<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.2.3
 * @author	Alexon Balangue
 * @link	alexonbstudio.fr
 * @copyright	(C) 2012-2020 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */



//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('sites_sc')) {

	function sites_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'url' => ''
		 ), $atts));
		 
		$urls = ($url !='') ? $url : Juri::base();
		
		ob_start(); 
		
		echo $urls; 
		
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'sites', 'sites_sc' );
}