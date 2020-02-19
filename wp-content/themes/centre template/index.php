<?php get_header();?>




    
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12">
                    <div class="message-box">

<?php 
/*pagination*/
$currentPage = (get_query_var('paged'))?get_query_var('paged'):1;
echo $currentPage;
$args= array('posts_per_page'=>2,'paged'=>$currentPage);
query_posts($args);
?>


                          <?php if ( have_posts() ) : 
                            while ( have_posts() ) :the_post();
                                ?>
                            



                            <?php the_content();?>
                                <?php
                               endwhile ;?>
                     <!-- <div class="col-xs-6" text-left>
                      <?php 
                    //  next_posts_link('<<  derniere Article') ?> 
                  </div>
                   <div class="col-xs-6" text-right>
                      <?php 
                    //  previous_posts_link(' nouvel article >>') ?> 
                  </div>
        
      <?php   endif;
     // wp_reset_query();
        ?>
    </div>
</div>
    <div class="col-sm-4 col-xs-12">
<?php //get_sidebar();?>
</div>
</div>-->
<?php get_footer();?>
                        
                    </div>
                    <!-- end messagebox -->
                </div>
                <!-- end col -->

               


