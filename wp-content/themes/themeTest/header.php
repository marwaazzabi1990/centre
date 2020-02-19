<!DOCTYPE html>
<html>
 <head>

 <title><?php bloginfo('title'); ?></title>
 <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type="text/css" media="screen"/>
  <?php wp_head() ;?>
 </head>
 <body <?php body_class();?>>
 	<header  class='header_style_01 .navbar-default' class='header_style_01 .navbar'

 		<div class="container">
 		<?php wp_nav_menu(); 


 		?>
 		</div>
 	</header>