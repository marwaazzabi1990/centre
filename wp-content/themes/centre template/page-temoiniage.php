 <?php get_header();?>



    <div class="banner-area banner-bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner">
            <h2>Centre de Formation</h2>
            <ul class="page-title-link">
              <li><a href="#">Home</a></li>
              <li><a href="#">Testimonials</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div id="test-box" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Testimonials</h3>
                <p class="lead">Nous vous remercions pour tous nos témoignages impressionnants! Il y a des centaines de nos clients satisfaits!
Voyons ce que les autres disent sur notre centre!</p>
            </div><!-- end title -->





<!-- debut de traitement -->
            <div class="row">


                <div class="col-md-12 col-sm-12">
                    
                                <?php 
                   $lastblog = new WP_Query('type=post&posts_per_page=2&category_name=temoinage');
                    if ( $lastblog ->have_posts()) :
                    while ( $lastblog ->have_posts() ):
                         $lastblog ->the_post();?></h3>
                                <p class="lead">
                                   <div style="border: 1px solid orange;">
                         <?php get_template_part('content',get_post_format());?>
                         <br>
                   <?php endwhile;
                      endif;
                         wp_reset_postdata();
                    ?></p>
                           
                        <!-- end testimonial -->

                     <!--testimonial -->
                        </div>

          </div>
</div>





<?php get_footer();?>