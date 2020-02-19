<?php get_header();?>

<div class="conntainer">
<h1> <?php the_title(); ?></h1>
<?php if(has_post_thumbnail()):?>
<img src="<?php the_post_thumbnail_url('largest') ;?>" class="img-fluid">
<?php	endif; ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Show the selected front page content.
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
			 the_content();
			endwhile;
		
		endif;
		?>
</div><!-- #primary -->
</div>

<?php get_footer();?>