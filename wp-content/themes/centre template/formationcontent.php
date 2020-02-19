
 <div class="col-xs-6">
                        <div  class="panel panel-default">
                          <div class="panel-heading">
                            <h2><?php the-title();?>
                          </h2>
                        </div>
                          <div class="panel-body">
                            <?php the_post_thumbnail('smallest',array('class'=>'img-responsive aligncenter'));
                            ?>
                            <?php the_excerpt();?>
                          </div>
                        </div>