<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-9">

				<div class="page-header">	
					<h1><?php wp_title(''); ?></h1>
				</div>
							


			<?php 
			    $args = array(
			        'post_type' => 'post',
			        'category_name' => 'featured'
			    );
			    $the_query = new WP_Query( $args );		    
			?>
			


				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>	
						<li data-target="#carousel-example-generic" data-slide-to="<?php echo $the_query->current_post; ?>" <?php if($the_query->current_post == 0): ?>class="active"<?php endif; ?>></li>
					<?php endwhile; endif; ?>		
					</ol>	
					<?php rewind_posts(); ?>

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>	
				    <div class="item <?php if($the_query->current_post == 0): ?>active<?php endif; ?>">
						<?php 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);						
						?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url[0] ;?>" alt="..."></a>
						<div class="carousel-caption"><?php the_title(); ?>
						</div>
				    </div>
				    <?php endwhile; endif; ?>		
				  </div>

				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				  </a>
				</div>

			
			<?php wp_reset_query(); ?>




				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article>

				    <div class="page-header">	
				    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				    	<p>By <?php the_author(); ?> on <?php echo the_time('l, F jS, Y'); ?> in <?php the_category( ', ' );?>.  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>
				    </div>				

					<?php the_excerpt(); ?>

				</article>
				<?php endwhile; endif; ?>

	    	</div>

	    	<?php get_sidebar('blog'); ?>

	    </div>

	    

    </div>

<?php get_footer(); ?>