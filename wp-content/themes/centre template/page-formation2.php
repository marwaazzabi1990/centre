
<?php 
/* 
Template Name: Page Formation2
*/

get_header();

?>






         

             

		  <?php
		// Show the selected front page content.
		  if ( have_posts() ) :
			while ( have_posts() ) :the_post();
			 the_content();
			endwhile;
		
		endif;
		?>


<?php get_footer();?>