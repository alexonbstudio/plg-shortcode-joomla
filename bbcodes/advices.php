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

if(!function_exists('badgelxw_sc')) {

	function badgelxw_sc( $atts, $content) {
		extract(bbcodes_atts(array(
		/****Images badge*****/
				'url' => '',//not use this on your website indicate on LivingxWorld because will current link from on your website.
				'badge' => '',
		/****Embed code*****/
				'showembed' => ''
		 ), $atts));
		 
		$urls = ($url !='') ? $url : JURI::current();
		$LivingxWorld = ($badge !='') ? $badge : 'assets/images/logo-small.png';
		$embeds = ($showembed !='') ? $showembed : 'yes';
		ob_start();
			echo '<a href="https://business.livingx.world/"><img src="https://business.livingx.world/'.$LivingxWorld.'" alt="Badge par Livingx.World" itemprop="image"></a>';
			if($embeds == 'yes'){
				echo '<textarea cols="40" rows="6"><a href="'.$urls.'" rel="next" target="_top" itemprop="url"><img src="https://business.livingx.world/'.$LivingxWorld.'" alt="badge par livingx.world" itemprop="image" /></a></textarea>';
			}
		
		
		
		//return '<address'.$option.'>'.do_bbcodes($content).'</address>';
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'lxw-badge', 'badgelxw_sc' );
}