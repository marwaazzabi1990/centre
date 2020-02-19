<?php
/**
* trigger this file on plugin uninstall
*@package FormationPlugin

**/
if(!defined('WP_UNINSTALL_PLUGIN'))
{
	die();
}
//clear database stored data
/*$formations=get_posts(array('post_type'=>'formation','numberposts'=>-1));
foreach ($formatons as $formation) 
{
	wp_delete_post($formation->ID,true);
	# code...
}*/

//acces the database via SQL
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type");
//$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts )";
//$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts )";
);
?>