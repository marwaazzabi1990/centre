 <?php get_header();?>




 <?php   $arg_cat =array(
                     'include'=>9);
                   $categories=get_categories($arg_cat);
                  foreach ($categories as $category) 
                     {
                   $args=array(
                   'type'=>'post',
                   
                     'posts_per_page'='-1'
                    
                   'category__in'=>$category->term_id,
                       );?>

                        $lastblog = new WP_Query($args);
                      if ( $lastblog ->have_posts()) :
                       while ( $lastblog ->have_posts() ):
                          $lastblog ->the_post();?></h3>
                <p class="lead">
                         <?php get_template_part('content','formationcontent');?>
                     <?php endwhile;
                         endif;
                      wp_reset_postdata();
                      ?>

</div>


<!--<div class="row">
   <?php   $arg_cat =array(
                     'include'=>11);
                   $categories=get_categories($arg_cat);
                  foreach ($categories as $category) 
                     {
                   $args=array(
                   'type'=>'post',
                     'posts_per_page'=>1,
                   'category__in'=>$category->term_id,
                       );?>
              <div class="col-md-12 col-sm-12">
                    
                                <?php 
                       $lastblog = new WP_Query($args);
                      if ( $lastblog ->have_posts()) :
                       while ( $lastblog ->have_posts() ):
                          $lastblog ->the_post();?></h3>
                <p class="lead">
                         <?php get_template_part('content',get_post_format());?>
                     <?php endwhile;
                         endif;
                      wp_reset_postdata();
                      ?>
                        
                 </p>
               </div>
  
</div>-->




<?php get_footer();?>