<?php 

/**
 * 
 */
if(!class_exists('WP_List_Table')){
		
	require_once ABSPATH.'wp-admin/includes/class-wp-list-table.php';

}
class Referral_history_Table extends WP_List_Table
{
	
	public function __construct()
	{
		parent::__construct([
			'singular' => 'referral_history',
			'plural'   => 'referral_histories',
			'ajax'     => false
		]);
		
	}

	public function get_columns(){
		$array_colm = array(
			'username' => 'Username',
			'referral_user' => 'Referral User',
			'join_commission' => 'Join Commission',
			'action'  => 'Action'
		);
		return $array_colm;
	}

	public function get_sortable_columns(){
		return ['username' => ['username,false']];
	}

	public function prepare_items(){
		global $wpdb;

		$sql = "Select * From {$wpdb->prefix}users";
		$results = $wpdb->get_results($sql);
		$data = array();
		foreach ($results as $user) {
			$data[] = array(
				'username' => $user->user_login,
				'referral_user' => get_user_meta($user->ID,'referral_user',true),
				'join_commission' => get_option('join_commission','50'). 'Rs.',
				'action'  => '<a href="#">Edit</a>|<a href="#">Delete</a>'
			);
		}
		$this->_column_headers = [$this->get_columns(),array(),$this->get_sortable_columns()];
		$this->items = $data;
	}
}


 ?>