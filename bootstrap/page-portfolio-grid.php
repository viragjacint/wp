<?php 
/*
	Template Name: Portfolio Grid
*/
?>
<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-12">
			
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				    <div class="page-header">	
				    	<h1><?php the_title(); ?></h1>	
				    </div>

					<?php the_content(); ?>

				<?php endwhile; endif; ?>

	    	</div>	    	

	    </div>

	    <div class="row">

			<?php 
			    $args = array(
			        'post_type' => 'portfolio'
			    );
			    $the_query = new WP_Query( $args );		    
			?>
			<?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>	

			<div class="col-sm-3 portfolio-piece">
					<?php 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);						
					 ?>
					<p><a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb_url[0]; ?>"></a></p>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			</div>

			<?php $count = $the_query->current_post + 1; ?>
			<?php if( $count % 4 == 0): ?>

			</div><div class="row">
			
			<?php endif; ?>

			<?php endwhile; endif; ?>

	    </div>

    </div>

<?php get_footer(); ?>