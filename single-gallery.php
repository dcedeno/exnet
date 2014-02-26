


<?php get_header(); ?>



<div id="category-header">

	<h3 class="cat-header"><?php the_title(); ?></h3>

</div><!--category-header-->

<div id="main">

	<div id="content-wrapper">

	

		<div id="home-main">

			<div id="archive-wrapper">

				<ul class="archive-list">

				

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php $images_url = get_post_meta( get_the_ID(), '_cg_meta_images_url', true ); ?>
						<?php $images_title = get_post_meta( get_the_ID(), '_cg_meta_images_title', true ); ?>
				
						<?php foreach ( $images_url as $key => $image_url ) : ?>

							<?php 
								global $wpdb;
								$cont_img = $wpdb->get_var( $wpdb->prepare( "SELECT post_content FROM $wpdb->posts WHERE guid = %s", $image_url ) );
							?>
							<li>
								<div class="archive-image">

									<a href="<?php echo esc_url( $image_url ); ?>">

									<img alt="albums-photos-videos" src="<?php echo esc_url( $image_url ); ?>" style="height: 192px;">

									

									</a>

								</div>
								<div class="archive-text">

									
									<h2><a href="<?php the_permalink() ?>"><?php if(isset($images_title[$key])) echo $images_title[$key]; else echo get_the_title(); ?></a></h2>
									<p><?php echo $cont_img; ?></p>

								</div><!--archive-text-->
								
								
							</li>	
	
						
					<?php endforeach; ?>
					 

					

					<?php endwhile; endif; ?>

				</ul>

			</div><!--archive-wrapper-->

		

		</div><!--home-main-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>