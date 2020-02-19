 <?php get_header();?>

 <div class="banner-area banner-bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="banner">
            <h2>Centre de Formation</h2>
            <ul class="page-title-link">
              <li><a href="#">Home</a></li>
              <li><a href="#">Formation</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>




<div id="about" class="section wb">
      <div class="container">
      <div class="section-title text-center">
                <h3>Nos Formation</h3>
                <p class="lead">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        </div><!-- end title -->
      </div>
       <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="portfolio-filter text-center">
                        <ul>
                            <li><a class="btn btn-dark btn-radius btn-brd active" href="<?php bloginfo('name'); ?>/index.php" data-filter="*"><span class="oi hidden-xs" data-glyph="grid-three-up"></span> All</a></li>
                            <li><a class="btn btn-dark btn-radius btn-brd" data-toggle="tooltip" data-placement="top" title="5" href="#" data-filter=".cat1">Design</a></li>
                            <li><a class="btn btn-dark btn-radius btn-brd" href="#" data-toggle="tooltip" data-placement="top" title="12" data-filter=".cat2">Mockup</a></li>
                            <li><a class="btn btn-dark btn-radius btn-brd" href="#" data-toggle="tooltip" data-placement="top" title="21" data-filter=".cat3">Logos</a></li>
                            <li><a class="btn btn-dark btn-radius btn-brd" href="#" data-toggle="tooltip" data-placement="top" title="11" data-filter=".cat4">HTML</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <br>
            <br>


<div class="container">
  <div class="row" >
<table>
    <?php   $arg_cat =array(
                     'include'=>9);
                   $categories=get_categories($arg_cat);
                  foreach ($categories as $category) 
                     {

                   $args=array(
                   'type'=>'post',
                     'posts_per_page'=>-1,
                   'category__in'=>$category->term_id,
                       );?>

                                <?php 
                       $lastblog = new WP_Query($args);

                   //  $req_blog=new WP_Query($args_blog);?>

                        
                     <?php  if (   $lastblog ->have_posts()) :?>
                    <tr>
                    <td>
                      <section id ="blog-font" style="border-color: blue;">
                        <div class="container">
                          <div class="row">
 <article class="col-6">
                         <?php while (   $lastblog->have_posts() ):
                           $lastblog ->the_post();?>
                           <div class="container">
                            
                   <article class="col-6 " style= "border-color:black;border-radius:1px; ">
                        <div  class="panel panel-default" style="border: 1px solid orange;">
                          <div class="panel-heading" >
                            <h2 style="text-align:center; color:#FF8C00;"><?php the_title();?>
                          </h2>
                        </div>
                          <div class="panel-body" style="height: 80% ;">
                           <div class="row"> <?php the_post_thumbnail('smallest',array('class'=>'img-responsive aligncenter'));
                            ?>
                            <?php the_excerpt();?>
                            <br>
                            <!--<?php
                           print_r(get_post_custom($post->ID));

                             ?>-->
                           </div>
                             <div style="text-align: center;">
                             <label  > Periode:</label>
                             <?php 
                          $nb = get_post_meta($post->ID, 'nb', true);
                          echo $nb; 
                             ?>
                             &nbsp &nbsp &nbsp &nbsp <label  > <i class="fa fa-euro-sign" aria-hidden="true"></i>Prix:</label>
                             <?php 
                           $prix = get_post_meta($post->ID, 'prix', true);
                          echo  $prix; 
                             ?>

                             &nbsp &nbsp &nbsp &nbsp <label  >Type:</label>
                              <?php 
                            $type = get_post_meta($post->ID, 'type', true);
                          echo  $type ; 
                             ?>
                              &nbsp &nbsp &nbsp &nbsp <span  class="dashicons dashicons-clock"></span>
                              <?php 
                            $date = get_post_meta($post->ID, 'date', true);
                          echo  $date ; 
                          ?>

                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  <button style="text-align:  right;background-color: orange;color:black;">reserver formation</button>
                           </div>
                            
                          </div>
                        </div>
                      </article>
                        <br>
                        <br>

                   
                    </div>
                     <?php endwhile;
                         endif;
                      wp_reset_postdata();
                      ?>
                      </div>  
                 
               </div>
            <?php }

     
            
?>  

 
</article>
</div>
</section>

</td>
</tr>
</table>
</div>
</div>        


<?php get_footer();?>