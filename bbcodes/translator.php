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

if(!function_exists('googletw_sc')) {

	function googletw_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'lang' => '' // indicate a default language is English (ex: fr, en, de, es)
		 ), $atts));
		 
		$langs = ($lang !='') ? $lang : 'en';

		return '<div id="google_translate_element"></div>
				<script type="text/javascript">function googleTranslateElementInit() {new google.translate.TranslateElement({pageLanguage: '.$langs.'},\'google_translate_element\');}</script>
				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>' . $content;
	}
		
	add_bbcodes( 'google-translator', 'googletw_sc' );
}

if(!function_exists('bingtw_sc')) {

	function bingtw_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'css' => '', //Name of icon
				'setting' => '', //Name of icon
				'from' => ''//More typcn-li, typcn-spin, etc....
		 ), $atts));
		 
		$css_class = ($css !='') ? $css : 'Dark';
		$js_set .= ($setting !='') ? $setting : 'undefined';
		$js_from .= ($from !='') ? $from : '';

		return '<div id=\'MicrosoftTranslatorWidget\' class=\''.$css_class.'\' style=\'color:white;background-color:#555555\'></div><script type=\'text/javascript\'>setTimeout(function(){{var s=document.createElement(\'script\');s.type=\'text/javascript\';s.charset=\'UTF-8\';s.src=((location && location.href && location.href.indexOf(\'https\') == 0)?\'https://ssl.microsofttranslator.com\':\'http://www.microsofttranslator.com\')+\'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings='.$js_set.'&from='.$js_from.'\';var p=document.getElementsByTagName(\'head\')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>' . $content;
	}
		
	add_bbcodes( 'bing-translator', 'bingtw_sc' );
}
