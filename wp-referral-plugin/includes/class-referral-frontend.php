<?php

/**
 * 
 */
class Referral_Plugin_Frontend
{
	
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'ref_enqueue_scripts'));
		add_action('wp_ajax_validate_referral_code',array($this, 'validate_referral_code_ajax'));
		add_action('wp_ajax_nopriv_validate_referral_code',array($this, 'validate_referral_code_ajax'));

	}

	public function ref_enqueue_scripts(){

		wp_enqueue_script('referal-js',plugin_dir_url(__FILE__).'../assets/js/referral.js',array('jquery'),null,true);
		wp_localize_script('referal-js','refferral_ajax',array('ajax_url' => admin_url('admin-ajax.php')));
	}

	public function validate_referral_code_ajax(){
		$code = isset($_POST['referral_code']) ? sanitize_text_field($_POST['referral_code']):'';

		$is_valid = $this->validate_referral_code($code);
		echo json_encode(array('is_valid'=> $is_valid));
		wp_die();
	}

	private function validate_referral_code($code){
		$user = get_user_by('login',$code);
		return $user? true : false;
	}
}
