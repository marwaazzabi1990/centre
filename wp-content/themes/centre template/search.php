<?php get_header();?>




    
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-xs-12">
                    <div class="message-box">
                          <?php if ( have_posts() ) : 
                            while ( have_posts() ) :the_post();
                                ?>
                            
                            <?php get_template_part('content','search');?>
                                <?php
                               endwhile ;
                       
        
        endif;
        ?>
    </div>
</div>
    <div class="col-sm-4 col-xs-12">
<?php get_sidebar();?>
</div>
</div>
<?php get_footer();?>
                        
                    </div>
                    <!-- end messagebox -->
                </div>
                <!-- end col -->

               


