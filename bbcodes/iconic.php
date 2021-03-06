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

//Default - Recomande https://useiconic.com/purchase/ $129 USD
if(!function_exists('iconicdefault_sc')) {

	function iconicdefault_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'name' => '', //Name of icon
				'title' => '', //title of icon
				'size' => '', // size: sm, md, lg
				'more' => ''//More fa-li, fa-spin, etc....
		 ), $atts));
		 
		$names = ($name !='') ? $name : '';
		$option = ($size !='') ? ' iconic-'.$size : '';
		$option .= ($more !='') ? ' '.$more : '';
		$titles = ($title !='') ? 'title="'.$title.'"' : 'title="'.$name.'"';

		return '<span class="iconic'.$option.'" data-glyph="'.$names.'" '.$titles.' aria-hidden="true"></span>' . $content;
	}
		
	add_bbcodes( 'iodefault', 'iconicdefault_sc' );
}
//Boostrap - Recomande https://useiconic.com/purchase/ $129 USD
if(!function_exists('iconicbs_sc')) {

	function iconicbs_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'name' => '', //Name of icon
				'title' => '', //title of icon
				'size' => '', // size: sm, md, lg
				'more' => ''//More fa-li, fa-spin, etc....
		 ), $atts));
		 
		$option = ($name !='') ? $name : '';
		$option .= ($size !='') ? ' iconic-'.$size : '';
		$option .= ($more !='') ? ' '.$more : '';
		$titles = ($title !='') ? 'title="'.$title.'"' : 'title="'.$name.'"';

		return '<span class="iconic iconic-'.$option.'" '.$titles.' aria-hidden="true"></span>' . $content;
	}
		
	add_bbcodes( 'iobs', 'iconicbs_sc' );
}
//Fondation - Recomande https://useiconic.com/purchase/ $129 USD
if(!function_exists('iconicfi_sc')) {

	function iconicfi_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'name' => '', //Name of icon
				'title' => '', //title of icon
				'size' => '', // size: sm, md, lg
				'more' => ''//More fa-li, fa-spin, etc....
		 ), $atts));
		 
		$option = ($name !='') ? $name : '';
		$option .= ($size !='') ? ' iconic-'.$size : '';
		$option .= ($more !='') ? ' '.$more : '';
		$titles = ($title !='') ? 'title="'.$title.'"' : 'title="'.$name.'"';

		return '<span class="fi-'.$option.'" '.$titles.' aria-hidden="true"></span>' . $content;
	}
		
	add_bbcodes( 'iofi', 'iconicfi_sc' );
}
/****
 * 
 * All icon name https://useiconic.com/
 * or https://useiconic.com/free/
****/