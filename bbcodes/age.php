<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.1.2
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('age_sc')) {
	
	/*************METHODE Format French**************/
	function age_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'bday' => '', /***Date your birthday Days/Month/Years ex:24/04/1991**/
				'lang' => '' /**Ex on English: Years old/En fraiçais: ans**/
		 ), $atts));
		
		$BirthdayDate = ($bday !='') ? $bday : '';
		
		$age_out = age_final_calculate($BirthdayDate);
		$translate_years_old = ($lang !='') ? $lang : '';
		

		return $age_out.' '.$translate_years_old.' '.$content;
	}	
	function age_final_calculate($born){
		$InDateBorn = explode('/', $born);
		$OutDateBornAuto = explode('/', date('d/m/Y'));
		if(($InDateBorn[1] < $OutDateBornAuto[1]) || (($InDateBorn[1] == $OutDateBornAuto[1]) && ($InDateBorn[0] <= $OutDateBornAuto[0]))) return $OutDateBornAuto[2] - $InDateBorn[2];
		return $OutDateBornAuto[2] - $InDateBorn[2] - 1;
	}	
	add_bbcodes( 'age', 'age_sc' );
}

if(!function_exists('ageus_sc')) {
	/*************METHODE Format English**************/
	function ageus_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'bday' => '', /***Date your birthday Years/Month/Days ex:1991-04-24**/
				'lang' => '' /**Ex on English: Years old/En fraiçais: ans**/
		 ), $atts));
		
		$BirthdayDate = ($bday !='') ? $bday : '';
		
		$age_out = calculate_ages($BirthdayDate);
		$translate_years_old = ($lang !='') ? $lang : '';
		

		return $age_out.' '.$translate_years_old.' '.$content;
	}	
	function calculate_ages($date){
		$age = date('Y') - date('Y', strtotime($date));
		if (date('md') < date('md', strtotime($date))){
			$age --;
		}
		return $age;
	}
	
	add_bbcodes( 'age-us', 'ageus_sc' );

}