<?php
/**
 * Plugin Name: Top 5 blogs
 * Description: Top 5 blogs
 * Version: 1.0.0
 * Author: Nitsh
*/

if(!defined('ABSPATH')){
	exit;
}


 function top_five_blog_register_block(){
 	wp_register_script(
 		'top-five-blogs-block',
 		plugin_url('block/index.js',__FILE__),
 		array('wp-blocks','wp-element','wp-editor','wp-components','wp-data'),
 		filemtime(plugin_dir_path(__FILE__).'block/index.js')
 	);

 	wp_register_style(
 		'top-five-blogs-style',
 		plugin_url('block/style.css',__FILE__)

 	);

 	register_block_type('custom/top-five-blogs',array(
 		'editor-script' => 'top-five-blogs-block',
 		'style' => 'top-five-blogs-style',
 		'render_callback' => 'top_five_blogs_render',
 		'attributes' => array(
 			'order' => array(
 				'type' => 'string',
 				'default' => 'DESC'
 			),
 			'orderBy' => array(
 				'type' => 'string',
 				'default' => 'date'
 			),
 			'count' => array(
 				'type' => 'number'
 				'default' => 5
 			),

 		),

 	));

 }
 