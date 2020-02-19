
<?php 
/**
*@package FormationPlugin
*/
/*
Plugin Name: Formation Plugin
Plugin URI: http//Formation.com
Description: this is formation plugin
Version: 1.0.0
Author: http//Formation.com
Licence: GPLv2 later
Text Domaine: Formation Plugin
*/
/*description

*/
//if (!defined('ABSPATH'))
//{
//	die;
//}
defined('ABSPATH')or die('hey,you can\t access to this file');
/*if(! function_exists('add_action'))
{
	echo 'hey,you can\t access to this file';
	exit;
}*/
class FormationPlugin
{ 

 public $plugin;

 function __construct()
	{
       add_action('init',array($this,'custom_post_type'));
       $this-> plugin= plugin_basename(__FILE__);
	}

function register()
	{
		add_action('admin_enqueue_scripts',array($this,'enqueue'));
		//add_action('admin_menu',array($this,'add_admin_pages'));
		// echo $this->plugin;
		//add_filter("plugin_action_link_$this->plugin",array($this,'settings_link'));

	}
	public function settings_link($links)
	{
 		//add custom settings
 		//$settings_link='<a href="options-general.php?page=formation_plugin">Settings</a>';
 		//push
	}
	public function add_admin_pages()
	{
		//add_menu_page('formationplugin','formation','mange_options','formation_plugin',array($this,'admin_index'),'dashicons-store',110);
	}
     public function admin_index()
     {
     	//require template
     }

   function activate()
	{
    //generate a CPT
		$this->custom_post_type();
		//fluch rewrite rules
		flush_rewrite_rules();  
	}
	function diactivate()
	{
			//fluch rewrite rules 
		flush_rewrite_rules();
		
	}
/*	function uninstall()
	{
		//delete CPT
		
	}*/
	function custom_post_type()
	{
		register_post_type('formation',['public'=>true,'label'=>'formation']);
	}
	function enqueue()
	{
		//enqueu all our script
		wp_enqueue_style('mypluginstyle',plugins_url('/assets/mystyle.css', __FILE__));
		wp_enqueue_script('mypluginscript',plugins_url('/assets/myscript.js', __FILE__));
	}
//Methods
}
if(class_exists('FormationPlugin'))
{
$FormationPlugin =new FormationPlugin();
$FormationPlugin->register();

}
//activation
register_activation_hook( __FILE__,array($FormationPlugin,'activate'));
//disactivation
register_activation_hook( __FILE__,array($FormationPlugin,'diactivate'));

//unistall
//register_uninstall_hook( __FILE__,array($FormationtPlugin,'uninstall'));


?>