<!DOCTYPE html>
<html <?php  language_attributes();?>>

<!-- Basic -->
<meta charset="<?php bloginfo('sharset');?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title><?php bloginfo('name'); ?> <?php wp_title('/'); ?></title>
<meta name="keywords" content="">
<meta name="description" content="<?php bloginfo('description');?>">
<meta name="author" content="">

<!-- Site Icons -->

<!-- Site Icons -->


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php wp_head() ;?>
</head>

<body <?php body_class();  ?>>

    <!-- LOADER -->
   <div id="preloader">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <div class="top-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="left-top">
                        <div class="email-box">
                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php bloginfo('description'); ?></a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="right-top">
                        <div class="social-box">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss-square" aria-hidden="true"></i></a></li>
                                <ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php bloginfo('name'); ?>/index.php"> <img src="<?php header_image();?> " height="<?php  echo get_custom_header()->height;?>" width="<?php  echo get_custom_header()->width;?>" alt=""></a>
                </div>
 <div id="navbar" class="main-nav">


       <?php wp_nav_menu( 
array(
        'theme_location'=>'top_menu',
        'container'=>'div',
           'container_class'=>'navbar-collapse collapse ',
            'menu_class'=>'nav navbar-nav navbar-right dropdown',
            'depth'=>'7',
            
            /*'walker'=> new WP_Bootstrap_Navwalker(),
           /* 'fallback_cb'=>'WP_bootstrap_Navwalker::fallback',
            'walker'=> new WP_Bootstrap_Navwalker(),*/
));


?>
       
    </div>
        </nav>
        

    </header>
     <div class="search-form-container" ><?php get_search_form(); ?></div>
