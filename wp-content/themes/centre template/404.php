<?php
 get_header();?>

<div id="primery" class="container">
	<main id="main" class="site-main" role="main"> 

<section class="error-404 not-found">
	 <head class="page-header">
	 	<h1 class="page-title">Ne pas trouvez cette page !!!!</h1>
	 </head>
	 <div class="page-content"> 
	 	<h3>rien trouver essayer avec le lien suivant </h3>
		<?php  get_search_form();?>
		<?php  the_widget('WP_Widget_Recent_Posts');?>
		<div class="widget widget_categories">
			<h3>chek the most categories</h3>
			<ul>
				<!--<?php wp_list_categories(array(
				//	'orderby'=>'count',
					//'order'=>'DESC'?
					///'show_count'=>1,
					//'title_li'=>'',
					//'number'=>5,
				)); ?>
				-->
			</ul>
		</div>
		<?php the_widget('WP_Widget_Archive','dropdown=1',"after_title=<h2>$archive_content"); ?>
	 </div>
</section>
	</main>
</div>

<?php get_footer();?>

?>