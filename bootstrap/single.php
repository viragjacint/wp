<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-9">
							
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article>
				
				    <div class="page-header">	
					<?php 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);						
						if($thumb_id):
					?>
					<p class="featured-image"><img src="<?php echo $thumb_url[0] ;?>"></p>
				    	
				    	<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>				    
						<p>By <?php the_author(); ?> on <?php echo the_time('l, F jS, Y'); ?> in <?php the_category( ', ' );?>.  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>

				    </div>				

					<?php endif; ?>
					<?php the_content(); ?>

				</article>
				<?php endwhile; endif; ?>

				<hr>

				<?php comments_template(); ?>

	    	</div>

	    	<?php get_sidebar('blog'); ?>

	    </div>

    </div>

<?php get_footer(); ?>