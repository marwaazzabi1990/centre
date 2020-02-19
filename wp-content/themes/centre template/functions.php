
<?php


require('meta/functions.php');

// require_once(get_template_directory().'/inc/navwalker.php');
/*loding botstrap et css*/
function load_stylesheets()
{

	wp_register_style('bootstrap',get_template_directory_uri().'/css/bootstrap.min.css',array(),false,'all');
	wp_enqueue_style('bootstrap');



    wp_register_style('responsive',get_template_directory_uri().'/css/responsive.css',array(),false,'all');
    wp_enqueue_style('responsive');

    wp_register_style('custom',get_template_directory_uri().'/css/custom.css',array(),false,'all');
    wp_enqueue_style('custom');

 wp_enqueue_style('google_fonts','https://fonts.googleapis.com/css?family=open+sans:300i,400,400i,600');


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

    wp_register_script('all',get_template_directory_uri().'/js/all.js','',1,true);
    wp_enqueue_script('all');

    wp_register_script('custom',get_template_directory_uri().'/js/custom.js','',1,true);
    wp_enqueue_script('custom');

    wp_register_script('hoverdir',get_template_directory_uri().'/js/hoverdir.js','',1,true);
    wp_enqueue_script('hoverdir');

    
}
add_action('wp_enqueue_scripts','loadjs');

/*include image d'article*/
add_theme_support('post-thumbnails');
 add_image_size('smallest',300,300,true);
 add_image_size('largest',1000,1000,true);
 /* include menu*/
add_theme_support('menus');

/*include widget*/
add_theme_support('widgets');
/*isertion de menu*/
register_nav_menus(
array(
	'top_menu'=>__('Top Menu','theme'),
	'footer_menu'=>__('Footer Menu','theme'),
	'mobile_menu'=>__('Mobile Menu','theme'),
)
);
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('custom-footer');

add_theme_support('post-formats',array('aside','image','video'));


//add_image_size('smallest',300,300,true);

//register Sidebars
function my_sidebars()
{

register_sidebar(

	array(
		'name'=>__('Pages Sidebar'),
		'id'=>__('page-sidebar'),
		'class'=>__('custom'),
		'description'=>'standard Sidebar',
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h4 class="widget_title">',
		'after_title'=>'</h4>'
	)
);
register_sidebar(

	array(
		'name'=>'Blog Sidebar',
		'id'=>'blog-sidebar',
		'class'=>__('custom'),
		'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
		'after_widget'=>'</aside>',
		'before_title'=>'<h4 class="widget_title">',
		'after_title'=>'</h4>'
	)
);
}
add_action('widgets_init','my_sidebars');
/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);
/*include walkerfile*/
require get_template_directory().'/inc/walker.php';
/*head function*/
function awesome_remove_version(){
	return '';

} 
add_filter('the_generator','awesome_remove_version');		
?>



