<?php get_header();?>


<div class="slider-area">
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
    </div>




<div id="about" class="section wb">
         <div id="about" class="section wb">
 <?php
                    $lastblog = new WP_Query('type=post&posts_per_page=1&category_name=acceuil');
                    if ( $lastblog ->have_posts()) :
                    while ( $lastblog ->have_posts() ):
                         $lastblog ->the_post();?>
                         <?php get_template_part('content',get_post_format());?>
                   <?php endwhile;
               endif;
               wp_reset_postdata();
                    ?>
                    
  
 </div>


<div>
    <?php get_footer();?>
  </div>





    


                        
                    
                   
           