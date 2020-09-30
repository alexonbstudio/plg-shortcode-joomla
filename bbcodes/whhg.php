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

//www.WebHostingHub.com/glyphs
//[whhg name='star' /]
if(!function_exists('whhg_sc')) {

	function whhg_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'name' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($name !='') ? 'icon-'.$name : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<i class="'.$option.'"></i>'.$content;
	}
		
	add_bbcodes( 'whhg', 'whhg_sc' );
}