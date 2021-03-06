<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.2.4
 * @author	Alexon Balangue
 * @link	alexonbstudio.fr
 * @copyright	(C) 2012-2020 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */


//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('wp_general_sc')) {

	function wp_general_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'domain' => '',
				/*Site imported GET Json WP - sites*/
				'name' => '',
				'sites' => '',
				/*Site imported GET Json WP - business*/
				'business' => '',
				'tva' => '',
				'siret' => '',
				'address' => '',
				'postal' => '',
				'city' => '',
				'region' => '',
				'contry' => '',
				'status' => '',
				'phone' => '',
				'fax' => '',
				'mobile' => '',
				'logo' => ''
		 ), $atts));
		 
		$domain = ($domain !='') ? $domain : 'alexonbstudio.yo.fr';
		
		
		$wp_sites = json_decode(file_get_contents('https://'.$domain .'/api/sites.json'), true);
		$wp_business = json_decode(file_get_contents('https://'.$domain .'/api/business.json'), true);
		$wp_images = json_decode(file_get_contents('https://'.$domain .'/api/images.json'), true);
		
		
		# API JSON DECODE Website Project WP - SITES
		$nameJsonWP_sites = ($name !='') ? $name : $wp_sites['name'];
		$sitesJsonWP_sites = ($sites !='') ? $sites : $wp_sites['domain'];
		
		if(!empty($sitesJsonWP_sites)){
			$domainTLD = $sitesJsonWP_sites;
		} else {
			$domainTLD = $wp_sites['auto']['domain'];
		}
		
		# API JSON DECODE Website Project WP - BUSINESS
		$nameJsonWP_business = ($business !='') ? $wp_business['local']['name'] : '';
		$siretJsonWP_business = ($siret !='') ? $wp_business['local']['siret'] : '';
		$tvaJsonWP_business = ($tva !='') ? $wp_business['local']['tva'] : '';
		$addressJsonWP_business = ($address !='') ? $wp_business['local']['address'] : '';
		$postalJsonWP_business = ($postal !='') ? $wp_business['local']['postal'] : '';
		$cityJsonWP_business = ($city !='') ? $wp_business['local']['city'] : '';
		$regionJsonWP_business = ($region !='') ? $wp_business['local']['region'] : '';
		$contryJsonWP_business = ($contry !='') ? $wp_business['local']['contry'] : '';
		$statusJsonWP_business = ($status !='') ? $wp_business['local']['status'] : '';
		
		$phoneJsonWP_business = ($phone !='') ? $wp_business['local']['phone']['number']: '';
		$mobileJsonWP_business = ($mobile !='') ? $wp_business['local']['mobile']['number'] : '';
		$faxJsonWP_business = ($fax !='') ? $wp_business['local']['fax']['number'] : '';
		
		# API JSON DECODE Website Project WP - IMAGES
		$logoJsonWP_images = ($logo !='') ? $logo : 'https://'.$domainTLD.'/'.$wp_images['dir'].'/'.$wp_images['manager']['logo']['big'];
		
		ob_start(); 		
?>
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-4">
					<?php if(!empty($logoJsonWP_images)) { ?>
						<?php echo '<img class="img-fluid" src="'.$logoJsonWP_images.'" alt="'.$nameJsonWP_business.'" />'; ?>
					<?php } ?>
					<p class="text-center">
					<a href="<?php echo $domainTLD; ?>"><?php echo '<b>'.$nameJsonWP_business.'</b> '.$statusJsonWP_business; ?></a>
					</p>
				</div>
				<div class="col-12 col-lg-8">
					<p>
					<?php if(!empty($addressJsonWP_business)) { ?><i class="fas fa-map-marked-alt fa-2x"></i> <?php echo $addressJsonWP_business.' '.$postalJsonWP_business.' '.$cityJsonWP_business.' '.$regionJsonWP_business.' '.$contryJsonWP_business; ?><br><?php } ?><?php if(!empty($phoneJsonWP_business)) { ?><i class="fas fa-phone fa-2x"></i> <?php echo '<a rel="nofollow" href="tel:'.$wp_business['local']['phone']['code'].$phoneJsonWP_business.'">'.$wp_business['local']['phone']['normal'].' '.$phoneJsonWP_business.'</a>'; ?><?php } ?> | <?php if(!empty($mobileJsonWP_business)) { ?><i class="fas fa-mobile-alt fa-2x"></i> <?php echo '<a rel="nofollow" href="tel:'.$wp_business['local']['mobile']['code'].$mobileJsonWP_business.'">'.$wp_business['local']['mobile']['normal'].' '.$mobileJsonWP_business.'</a>'; ?><?php } ?> | <?php if(!empty($faxJsonWP_business)) { ?><i class="fas fa-fax fa-2x"></i> <?php echo '<a rel="nofollow" href="tel:'.$wp_business['local']['fax']['code'].$faxJsonWP_business.'">'.$wp_business['local']['fax']['normal'].' '.$faxJsonWP_business.'</a>'; ?><?php } ?>
					</p>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-lg-12">
					Compatible PHP >= 7.2 <a href="https://github.com/alexonbstudio/website-project">Website Project WP</a> / <a href="https://github.com/alexonbstudio/wp-api">WP API (REMOTE)</a>
				</div>
			</div>
		</div>
		
<?php 		
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'wp-general', 'wp_general_sc' );
}


if(!function_exists('wp_logo_sc')) {

	function wp_logo_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'domain' => '',
				/*Site imported GET Json WP - sites*/
				'name' => '',
				'logo' => ''
		 ), $atts));
		 
		$domain = ($domain !='') ? $domain : 'alexonbstudio.yo.fr';
		
		$wp_business = json_decode(file_get_contents('https://'.$domain .'/api/business.json'), true);
		$wp_images = json_decode(file_get_contents('https://'.$domain .'/api/images.json'), true);
		
		
		# API JSON DECODE Website Project WP - SITES
		$nameJsonWP_business = ($name !='') ? $name : $wp_business['local']['name'];
		
		
		# API JSON DECODE Website Project WP - IMAGES
		$logoJsonWP_images = ($logo !='') ? $logo : 'https://'.$domain.'/'.$wp_images['dir'].'/'.$wp_images['manager']['logo']['normal'];
		
		ob_start(); 		

		if(!empty($logoJsonWP_images)) { 
		?>
			<?php echo '<img class="img-fluid" src="'.$logoJsonWP_images.'" alt="'.$nameJsonWP_business.'" />'; ?>
		<?php 
		} 
					
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'wp-logo', 'wp_logo_sc' );
}