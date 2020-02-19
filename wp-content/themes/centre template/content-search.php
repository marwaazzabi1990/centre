
  
   

<div class="conntainer">



<article id="post-<?php the_ID();?>" <?php post_class();?>>
  <h1> <?php the_title(); ?></h1>
<?php if(has_post_thumbnail()):?>
<div class="pull-left"><?php the_post_thumbnail_url('largest') ;?>" </div>
<?php   endif; ?>


        <?php
        // Show the selected front page content.
       
             the_excerpt();
           
        ?>
</div><!-- #primary -->
</div>



    
   

</article>


