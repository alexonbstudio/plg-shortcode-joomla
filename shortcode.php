<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.2.3 BETA
 * @author	Alexon Balangue
 * @link	alexonbstudio.fr
 * @copyright	(C) 2012-2020 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Factory;
use Joomla\CMS\Document;
use Joomla\CMS\Uri\Uri;


if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);# Add this code For Joomla 3.3.4+

#jimport('joomla.plugin.plugin'); # not support Joomla 4
#jimport( 'joomla.event.plugin' ); # not support Joomla 4

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
            Shortcodes::getInstance()->importbbcodeFiles();
            #Shortcodes::getInstance()->loadShortcodesOverwrite()->importbbcodeFiles();
        }

    }

    public function onAfterRender()
    {
		$app = Factory::getApplication();
		$docs = Factory::getDocument();
		if( $app->isClient('site') ) {
			#$data = JResponse::getBody(); 
			$data = $app->getBody(); # Fix Joomla 3.9 / >= 4 not compatible

			$new_html_data = '';
	
			$data = bbcodes_unautop($data);
			$data = do_bbcodes($data); 
			$data = str_replace('</html>', $new_html_data . "\n</html>", $data);

			#JResponse::setBody($data);
			$app->setBody($data); # Fix Joomla 3.9 / >= 4 not compatible
		} else {	
			#$data = JResponse::getBody();
			#JResponse::setBody($data);	
			$data = $app->getBody(); # Fix Joomla 3.9 / >= 4 not compatible
			$app->setBody($data);	 # Fix Joomla 3.9 / >= 4 not compatible		
					
		}
		$docs->addStyleDeclaration('.grade{text-align:center;margin:15px auto;width:72px;height:72px;font-size:50px;line-height:72px;font-weight:400;color:#fff}.grade-a{background-color:#00A500}.grade-b{background-color:#68D035}.grade-c{background-color:#F8CF00}.grade-d{background-color:#FFA901}.grade-e{background-color:#FF7701}.grade-f,.grade-m,.grade-t,.grade-unknown{background-color:#FF4D41}');

	}
}
