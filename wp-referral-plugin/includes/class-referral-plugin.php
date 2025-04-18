<?php

/**
 * 
 */
class Referral_Plugin
{
	
	public function __construct()
	{
		new Referral_Plugin_Frontend();
		new Referral_Admin();
		add_shortcode('referral_registration_form', array($this,'render_regis_form'));
	}

	//Res shortcode
	public function render_regis_form(){
		ob_start();
		include(plugin_dir_path(__FILE__).'../templates/referral-form.php');
		return ob_get_clean();
	}
}



?>