
<?php
/* 
Template Name: Page Acceuil
*/

 get_header();?>


<!--<div class="slider-area">
        <div class="slider-wrapper owl-carousel">
            <div class="slider-item home-one-slider-otem slider-item-four slider-bg-one">
                <div class="container">
                    <div class="row">
                        <div class="slider-content-area">
                            <div class="slide-text">
                                <h1 class="homepage-three-title">Centre de <span>Formation  </span>et Services</h1>
                                <h2>Avec notre formation <br>Décrochez votre emploi d'avenir. </h2>
                                <div class="slider-content-btn">
                                    <a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>
                                    <a class="button btn btn-light btn-radius btn-brd" href="#">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-two">
                <div class="container">
                    <div class="row">
                        <div class="slider-content-area">
                            <div class="slide-text">
                                <h1 class="homepage-three-title">Formation <span>Complet</span> </h1>
                                <h2>Augmenter vos chances </h2>
                                <div class="slider-content-btn">
                                    <a class="button btn btn-light btn-radius btn-brd" href="#">Read More</a>
                                    <a class="button btn btn-light btn-radius btn-brd" href="#">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>-->


 <div class="banner-area banner-bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner">
            <h2>Centre de Formation</h2>
            <ul class="page-title-link">
              <li><a href="#">Formation</a></li>
              <li><a href="#">Acceuil</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

 <div id="about" class="section wb">
        <div class="container">
            <div class="row">
              <div class="col-sm-7 col-xs-12 col-md-6">
               
                  <div class="row">
                    <div class="message-box">
                        <h4><?php the_title() ?></h4>
                    <h2>Welcome to GoodWEB Solutions</h2>
                        <p class="lead">  <?php if ( have_posts() ) : while ( have_posts() ) :?>
                        <?php   the_post();?>
                        
                           <?php    the_content(); 
                              if(comments_open()||get_comments_number()):
                                comments_template();
                          endif;

                             endwhile;
        
                         endif;
                                 ?>


                        
                    </div> 
                   <a href="#services" class="btn btn-light btn-radius btn-brd grd1">Learn More</a>
                </p>
              </div>
            </div>
        

                       <!-- end col -->

                <div class="col-md-5">
                 
                    <div class="row">
                    <div class="post-media wow fadeIn">
                         <?php if(has_post_thumbnail()):?>
                    <img src="<?php the_post_thumbnail_url('smallest') ;?>" class="img-fluid">
                        <?php   endif; ?>
                       
                    </div><!-- end media -->
                
          </div></div><!-- end row -->


<!--<div id="about" class="section wb">
      <div class="container">

         <div class="container">
            <div class="row">
                <div class="col-sm-7 col-xs-12">
                    <div class="message-box">
                        <h4><?php// the_title() ?></h4>
                          <h2>Presentation du centre</h2>
                        <?php// if ( have_posts() ) : while ( have_posts() ) :?>
                        <h2><?php /*  the_post();?></h2>
                        
                              <?php    the_content();  
                              if(comments_open()||get_comments_number()):
                              	comments_template();
                          endif;

                             endwhile;
        
                         endif;
                                 ?>


                        
                    </div>
         
                <!-- end col -->
                   </div>
               <div class="col-md-5">
                    <div class="post-media wow fadeIn">
                       <?php if(has_post_thumbnail()):?>
                    <img src="<?php the_post_thumbnail_url('smallest') ;?>" class="img-fluid">
                        <?php   endif; */?>
                       
                    
                      <!-- end media -->
                    <!--</div>
                <!-- end col -->
                <!--  </div>

               </div>
</div>
            <!-- end row -->
            
         

</div>
</div>
</div>
</div>



<div>
    <?php get_footer();?>
  </div>
  </div>





    


                        
                    
                   
           








