 <?php get_header();?>



    <div class="banner-area banner-bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner">
            <h2>Centre de Formation</h2>
            <ul class="page-title-link">
              <li><a href="#">Home</a></li>
              <li><a href="#">Nos expert</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <div id="test-box" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3 >Nos expert</h3>
                <p class="lead">Nous vous remercions pour tous nos témoignages impressionnants! Il y a des centaines de nos clients satisfaits!
Voyons ce que les autres disent sur notre centre!</p>
            </div><!-- end title -->



                                                 

   
                                <?php 
       $lastblog = new WP_Query('type=post&posts_per_page=-1&category_name=expert');
                    if ( $lastblog ->have_posts()) :
                    while ( $lastblog ->have_posts() ):
                         $lastblog ->the_post();?></h3>
			  <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div style="border: 1px solid orange;">
                 
                                <p class="lead">
 
                         <?php get_template_part('content',get_post_format());?>
                         <br>
                      
                   <?php endwhile;
               endif;
               wp_reset_postdata();
                    ?></p>
                   
</div>
 </div>
</div>
</div>

<?php get_footer();?>