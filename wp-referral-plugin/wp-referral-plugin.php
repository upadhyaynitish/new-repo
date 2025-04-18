<?php
/**
 * Plugin Name: Referral Plugin
 * Description: Referal plugin 
 * Version: 1.0.0
 * Author: Nitsh
*/

if(!defined('ABSPATH')){
	exit;
}

require_once plugin_dir_path(__FILE__).'includes/class-referral-plugin.php';
require_once plugin_dir_path(__FILE__).'includes/class-referral-frontend.php';
require_once plugin_dir_path(__FILE__).'includes/class-referral-admin.php';




function init_referral_plugin(){

	new Referral_Plugin();

}


add_action('plugins_loaded', 'init_referral_plugin')
?>