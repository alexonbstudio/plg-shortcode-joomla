<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.2.2
 * @author	Alexon Balangue
 * @link	AlexonbStudio.fr
 * @copyright	(C) 2012-2020 AlexonbStudio. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Application;

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);# Add this code For Joomla 3.3.4+

jimport('joomla.plugin.plugin');
jimport( 'joomla.event.plugin' );

class PlgSystemShortcode extends CMSPlugin
{
	protected $autoloadLanguage = true;
	
	//public function plgSystemShortcode(&$subject,$config)
	public function __construct(&$subject,$config)
	{
		parent::__construct($subject,$config); 
		//$this->loadLanguage();
		
	}
	
    public function onAfterInitialise()
    {
        $shortcode_path = JPATH_PLUGINS.DS.'system'.DS.'shortcode'.DS.'wp'.DS.'shortcode.php';
        if (file_exists($shortcode_path)) {
            require_once($shortcode_path);
            Shortcodes::getInstance()->loadShortcodesOverwrite()->importbbcodeFiles();
        }

    }

    public function onAfterRender()
    {
		$app = Factory::getApplication();
		#$docs = JFactory::getDocument();
		if( $app->isClient('administrator') ) {
			$data = JApplicationWeb::getBody();
			JApplicationWeb::setBody($data);			
			#JResponse::setBody($data);	#J3		
					
		} else {	
			#$data = JResponse::getBody(); 
			$data = JApplicationWeb::getBody(); 

			$new_html_data = '';
	
			$data = bbcodes_unautop($data);
			$data = do_bbcodes($data); 
			$data = str_replace('</html>', $new_html_data . "\n</html>", $data);

			JApplicationWeb::setBody($data);
		}
		#$docs->addStyleDeclaration('.grade{text-align:center;margin:15px auto;width:72px;height:72px;font-size:50px;line-height:72px;font-weight:400;color:#fff}.grade-a{background-color:#00A500}.grade-b{background-color:#68D035}.grade-c{background-color:#F8CF00}.grade-d{background-color:#FFA901}.grade-e{background-color:#FF7701}.grade-f,.grade-m,.grade-t,.grade-unknown{background-color:#FF4D41}');

	}
}
