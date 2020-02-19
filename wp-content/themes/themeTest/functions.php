<?php

/*loding botstrap et css*/
function load_stylesheets()
{

	wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css',array(),false,'all');
	wp_enqueue_style('bootstrap');


		wp_register_style('style',get_template_directory_uri().'/style.css',array(),false,'all');
	wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts','load_stylesheets');

/*loding jquery*/
function include_jquery()
{
	wp_deregister_script('jquery',get_template_directory_uri().'/js/script.js','',1,true);
	wp_enqueue_script('jquery',get_template_directory_uri().'/js/j-query-3.4.1.min.js','',1,true);
	add_action('wp_enqueue_scripts','jquery');
}
add_action('wp_enqueue_scripts','include_jquery');

/*lodingjd*/
function loadjs()
{
	wp_register_script('customjs',get_template_directory_uri().'/js/script.js','',1,true);
	wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts','loadjs');

/* include menu*/
add_theme_support('menus');
/*include image d'article*/
add_theme_support('post-thumbnails');
/*include widget*/
add_theme_support('widgets');

register_nav_menus(
array(
	'top_menu'=>__('Top Menu','theme'),
	'footer_menu'=>__('Footer Menu','theme'),
	'mobile_menu'=>__('Mobile Menu','theme'),
)
);
add_image_size('smallest',300,300,true);
add_image_size('largest',800,800,true);
//register Sidebars
function my_sidebars()
{

register_sidebar(

	array(
		'name'=>__('Page Sidebar'),
		'id'=>__('page-sidebar'),
		'before_title'=>__('<h4 class="widget_title">'),
		'after_title'=>__('</h4>')
	)
);
register_sidebar(

	array(
		'name'=>'Blog Sidebar',
		'id'=>'blog-sidebar',
		'before_title'=>'<h4 class="widget_title">',
		'after_title'=>'</h4>'
	)
);
}
add_action('widgets_init','my_sidebars');
?>
