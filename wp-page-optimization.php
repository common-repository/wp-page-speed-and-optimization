<?php
/**
 * Plugin Name: WP Page Speed and Optimization
 * Plugin URI: http://xarart.com
 * Version: 1.0
 * Author: Xaraar
 * Author URI: http://xarart.com
 * Description: WP Page Speed and Optimization. just activate plugin to leverage browser cache
 * License: GPL2
 */
 
class Xaraar_wp_page_speed_and_optimization {
 
     static function Xaraar_wp_page_speed_and_optimization_install() {
     		self::xwpso_update_htaccess();
	 
     }

	function xwpso_update_htaccess(){

		 	$htaccess = file_get_contents('../.htaccess');
		 	if(!preg_match('/XARAAR.COM EXPIRES CACHING/', $htaccess)){
			$htaccess .= '## XARAAR.COM EXPIRES CACHING ##
	<IfModule mod_expires.c>
	ExpiresActive On
	ExpiresByType image/jpg "access 1 year"
	ExpiresByType image/jpeg "access 1 year"
	ExpiresByType image/gif "access 1 year"
	ExpiresByType image/png "access 1 year"
	ExpiresByType text/css "access 1 month"
	ExpiresByType text/html "access 1 month"
	ExpiresByType application/pdf "access 1 month"
	ExpiresByType text/x-javascript "access 1 month"
	ExpiresByType application/x-shockwave-flash "access 1 month"
	ExpiresByType image/x-icon "access 1 year"
	ExpiresDefault "access 1 month"
	</IfModule>
	## XARAAR.COM EXPIRES CACHING ##';
			file_put_contents('../.htaccess', $htaccess);
			}
	}
		 
		
}
	 
register_activation_hook( __FILE__, array( 'Xaraar_wp_page_speed_and_optimization', 'Xaraar_wp_page_speed_and_optimization_install' ) );
