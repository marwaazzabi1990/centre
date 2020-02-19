<?php get_header();?>

<div class="conntainer">
<section class="row">
	<div class="col-md-3"> 
           <?php if(is_active_sidebar('page_sidebar')):?>
	 <?php dynamic_sidebar('page-sidebar');?>

           <?php	endif; ?>
     </div>
   <div class="col-md-9"> 


           <h1> <?php the_title(); ?></h1>

             <?php if(has_post_thumbnail()):?>
                <img src="<?php the_post_thumbnail_url('largest') ;?>" alt="<?php the_title(); ?>" class="img-fluid mb-3 img-thumbnail">


                 <?php	endif; ?>

		  <?php
		// Show the selected front page content.
		  if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
			 the_content();
			endwhile;
		
		endif;
		?>
</div>
</section>
<!-- #primary -->
</div>

<?php get_footer();?>