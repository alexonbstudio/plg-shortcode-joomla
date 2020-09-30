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

if(!function_exists('badgelxw_sc')) {

	function badgelxw_sc( $atts, $content) {
		extract(bbcodes_atts(array(
		/****Images badge*****/
				'url' => '',//not use this on your website indicate on LivingxWorld because will current link from on your website.
				'badge' => '',
		/****Embed code*****/
				'showembed' => ''
		 ), $atts));
		 
		$urls = ($url !='') ? $url : Juri::current();
		$LivingxWorld = ($badge !='') ? $badge : 'assets/images/logo-small.png';
		$embeds = ($showembed !='') ? $showembed : 'yes';
		ob_start();
			echo ' ';
			if($embeds == 'yes'){
				echo '<b>--BADGE NOT CONTINUED--</b>';
			}
		
		
		
		//return '<address'.$option.'>'.do_bbcodes($content).'</address>';
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'lxw-badge', 'badgelxw_sc' );
}