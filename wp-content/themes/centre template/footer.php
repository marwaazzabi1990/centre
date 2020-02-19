
     <footer class="footer">
        <div class="container">
            <div class="row">
              

        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="wrap">
                <?php
               
             wp_nav_menu( 
array(
        'theme_location'=>'menu2',
        'container'=>'div',
           'container_class'=>'widget-title',
            'menu_class'=>'footer-links hov"',
            'depth'=>'4',
            /*'walker'=> new WP_Bootstrap_Navwalker(),
           /* 'fallback_cb'=>'WP_bootstrap_Navwalker::fallback',
            'walker'=> new WP_Bootstrap_Navwalker(),*/
   ));

        ?>
   <?php wp_footer(); ?>

       

        <!-- end container -->
    </footer>
    <!-- end footer -->

    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-left">
                    <p class="footer-company-name">All Rights Reserved. &copy; 2018 <!-- <a href="#">GoodWEB</a> Design By :
                        <a href="https://html.design/">html design</a>-->
                    </p>
                </div>


            </div>
        </div>
        <!-- end container -->
    </div>
    <!-- end copyrights -->

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="<?php bloginfo('template_url'); ?>/js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="<?php bloginfo('template_url'); ?>/js/custom.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/portfolio.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/hoverdir.js"></script>

</body>

</html>