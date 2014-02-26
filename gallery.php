<?php 
$type = 'gallery';
                if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
                    elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
                    else { $paged = 1; }
                $args = array(
                    'post_type' => $type,
                    'post_status' => 'publish',
                    'paged' => $paged,
                    'posts_per_page' => -1,
                    'ignore_sticky_posts'=> 1
                );
                $temp = $wp_query; // assign ordinal query to temp variable for later use
			 $wp_query = null;
                $wp_query = new WP_Query($args);?> 


		<li class="sidebar-widget">
			<span class="sidebar-widget-header"><h3 class="sidebar-widget-header">Galería</h3></span>
			<div class="category-dark">
				<div class="cat-dark-bottom">
					<ul>
						<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

							<?php
								$images_url = get_post_meta( get_the_ID(), '_cg_meta_images_url', true ); 
						 		$images_title = get_post_meta( get_the_ID(), '_cg_meta_images_title', true );
						 		

						 			
								
						 					 		
						 		$img_url = array();
						 		
						 		foreach ( $images_url as $key => $image_url ) :
									$img_url[] =  $image_url;						
								endforeach; 

								
						 		

								?>


								<li> 
									<a href="<?php echo get_permalink(get_the_ID()); ?>">
										<img width="85" height="54" src="<?php echo $img_url[1]; ?>" class="attachment-small-thumb wp-post-image" alt="<?php echo get_the_title(); ?>">
									</a> 
									<!--
									<span class="list-byline">
										<a href="http://www.extralucha.com/author/bryan" title="Entradas de Bryan" rel="author">Bryan</a> | 7 febrero 2014
									</span>-->
									<p>
										<a href="<?php echo get_permalink(get_the_ID()); ?>"><?php echo get_the_title(); ?></a>
									</p>
								</li>
						<?php endwhile;?>

			                
						<?php endif; ?>		
					<?php $wp_query = $temp; ?>
					</ul>
				</div><!--cat-dark-bottom-->
			</div>

		</li>
	

	