<?php get_header();?>
  
            <div class="container">
            <div class="row">




                <div class="col-sm-8 col-xs-12">
                    <div class="message-box">
                        <h4><?php the_title() ?></h4>
                        <?php if ( have_posts() ) : while ( have_posts() ) :?>
                        <h2><?php   the_post();?></h2>
                        
                              <?php    the_content();  
                              if(comments_open()||get_comments_number()):
                              	comments_template();
                          endif;

                             endwhile;
        
        endif;
        ?>


                        
                    </div>
         
                <!-- end col -->

               <!-- <div class="col-md-4">-->
                    <div class="post-media wow fadeIn">
                       <?php if(has_post_thumbnail()):?>
<img src="<?php the_post_thumbnail_url('smallest') ;?>" class="img-fluid">
<?php   endif; ?>
                       
                    
                    <!-- end media -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

       


</div>
[masterslider id = "1"]
 
  </div>



  <?php get_footer();?>