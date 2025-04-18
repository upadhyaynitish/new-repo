<?php

/**
 * 
 */
class Referral_Admin
{
	
	public function __construct()
	{
		add_action('admin_menu',array($this, 'add_admin_menu'));
		add_action('admin_init',array($this, 'initialize_settings'));

	}

	public function add_admin_menu(){
		add_menu_page('Referral History','referral History', 'manage_options', 'referral-history',array($this, 'referral_history_page'),'dashicons-admin-users');
	}

	public function referral_history_page(){
		if(!class_exists('WP_List_Table')){
			require_once ABSPATH.'wp-admin/includes/class-wp-list-table.php';

		}
		require_once plugin_dir_path(__FILE__).'/class-history-table.php';
		$table = new Referral_history_Table();
		$table->prepare_items();
		$table->display();
	}

	public function initialize_settings(){
		register_setting('referral_plugin_options', 'Join Commission');
		add_settings_section('referral_plugin_settings', 'Referral Plugin Settings', null, 'gernal');
		add_settings_field('join_commission', 'Join Commission', array($this,'join_commission_field_html'), 'gernal','referral_plugin_settings' );
	}

	public function join_commission_field_html(){

		$commission = get_option('join_commission','50');
		echo"<input type='text' name='join_commission' value'".esc_attr($commission)."'/>";
	}




}