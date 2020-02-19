<?php get_header();?>
  
   

<div class="conntainer">




  <h1> <?php the_title(); ?></h1>
        <?php if(has_post_thumbnail()):?>
         <img src="<?php the_post_thumbnail_url('largest') ;?>" class="img-fluid">
    <?php   endif; ?>
<div >
    <main >

        <?php
        // Show the selected front page content.
        if ( have_posts() ) :
            while ( have_posts() ) :
		
                the_post();
        ?>
		
				
 <?php 
 		the_content();
            endwhile;
        
        endif;
        ?>
          </main>
</div><!-- #primary -->



<hr>
      <!--  <div class="col-xs-6" text-left>
                      <?php 
                      next_post_link('<<  derniere Article') ?> 
                  </div>
                   <div class="col-xs-6" text-right>
                      <?php 
                      previous_post_link(' nouvel article >>') ?> 
                  </div>-->

  <div>    <?php if (comments_open()){ comments_template();}
      else{
        echo'<h5 class="text-center">commentaire bloquer</h5>';
      } ?> 

</div>

</div>


  <?php get_footer();?>

