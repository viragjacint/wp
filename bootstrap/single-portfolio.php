<?php get_header(); ?>

    <div class="container" role="main">
    	
	    <div class="page-header">	
			<div class="row">
	    	
	    		<div class="col-xs-9">
	    			<h1>Portfolio</h1>			
	    		</div>
	    		<div class="col-xs-3 prev-next">
					<?php next_post_link('%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>'); ?>			    	
					<a href="<?php bloginfo( 'url' );?>/?p=64"><span class="glyphicon glyphicon-th"></span></a>
					<?php previous_post_link('%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>'); ?>
	    		</div>	
	    	</div>
	    </div>	

	    <div class="row">	    								

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>				
			
				<div class="col-md-8 featured-image">
					<?php 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);						
					 ?>
					<p><img src="<?php echo $thumb_url[0]; ?>"></p>
				</div>			 

				<div class="col-md-4">

					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>

					<p><a class="btn btn-primary btn-lg" href="<?php the_field('link'); ?>">View Final Print <span class="glyphicon glyphicon-arrow-right"></span></a></p>
				</div>				



			</article>
			<?php endwhile; endif; ?>
    	

	    </div>

    </div>

<?php get_footer(); ?>