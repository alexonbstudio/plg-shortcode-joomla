<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.0
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('video_sc')) {

	function video_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'width' => '',
				'height' => '',
				'config' => '',
				'url' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($config !='') ? ' '.$config : '';
		$option .= ($url !='') ? ' src="'.$url.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<video'.$option.' controls>'.do_bbcodes($content).'</video>';
	}
		
	add_bbcodes( 'video', 'video_sc' );
}

if(!function_exists('youtube_sc')) {

	function youtube_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//www.youtube.com/embed/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youtube', 'youtube_sc' );
}

if(!function_exists('dailymotion_sc')) {

	function dailymotion_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//www.dailymotion.com/embed/video/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'dailymotion', 'dailymotion_sc' );
}

if(!function_exists('vimeo_sc')) {

	function vimeo_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//player.vimeo.com/video/'.$source.'?title=0&byline=0&portrait=0"' : '';

		return '<iframe'.$option.' frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'vimeo', 'vimeo_sc' );
}

if(!function_exists('youku_sc')) {

	function youku_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://player.youku.com/embed/'.$source.'=="' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youku', 'youku_sc' );
}


if(!function_exists('gloria_sc')) {

	function gloria_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? 'width/'.$width : '';
		$option .= ($height !='') ? 'height/'.$height : '';
		$options = ($source !='') ? ' src="//gloria.tv/embed/frame/media/'.$source : '';

		return '<iframe'.$options.'/'.$option.'" frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'gloria', 'gloria_sc' );
}


if(!function_exists('xvideos_sc')) {

	function xvideos_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://flashservice.xvideos.com/embedframe/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'xvideos', 'xvideos_sc' );
}

if(!function_exists('twitch_sc')) {

	function twitch_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.twitch.tv/'.$source.'/embed"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'twitch', 'twitch_sc' );
}

if(!function_exists('pornhub_sc')) {

	function pornhub_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.pornhub.com/embed/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'pornhub', 'pornhub_sc' );
}
if(!function_exists('youporn_sc')) {

	function youporn_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.youporn.com/embed/'.$source.'/n-a/"' : '';

		return '<iframe'.$option.' name="yp_embed_video" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youporn', 'youporn_sc' );
}

if(!function_exists('anysex_sc')) {

	function anysex_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://anysex.com/embed/'.$source.'/embed"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'anysex', 'anysex_sc' );
}