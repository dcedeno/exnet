<?php

/**

 * Plugin Name: Gallery Widget

 */



add_action( 'widgets_init', 'ht_gallery_load_widgets' );



function ht_gallery_load_widgets() {

	register_widget( 'ht_gallery_widget' );

}



class ht_gallery_widget extends WP_Widget {



	/**

	 * Widget setup.

	 */

	function ht_gallery_widget() {

		/* Widget settings. */

		$widget_ops = array( 'classname' => 'ht_gallery_widget', 'description' => __('A widget designed for the Homepage Widget Area that displays a gallery with posts of your choice.', 'ht_gallery_widget') );



		/* Widget control settings. */

		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'ht_gallery_widget' );



		/* Create the widget. */

		$this->WP_Widget( 'ht_gallery_widget', __('Hot Topix: Gallery Widget', 'ht_gallery_widget'), $widget_ops, $control_ops );

	}



	/**

	 * How to display the widget on the screen.

	 */

	function widget( $args, $instance ) {

		extract( $args );



		/* Our variables from the widget settings. */

		$title = apply_filters('widget_title', $instance['title'] );

		$number = $instance['number'];

		$tags = $instance['tags'];



		/* Before widget (defined by themes). */

		echo $before_widget;



		/* Display the widget title if one was input (before and after defined by themes). */

		if ( $title )

			echo $before_title . $title . $after_title;



		?>





					<div class="carousel-wrapper es-carousel-wrapper">

						<div class="es-carousel">

							<ul class="home-carousel">
								<?php 
									$args3 = array(
				                    'post_type' => 'gallery',
				                    'post_status' => 'publish',
				                   
				                    'posts_per_page' => $number,
				                    'ignore_sticky_posts'=> 1
				                );
								?>
								<?php $recent = new WP_Query($args3); 

								while($recent->have_posts()) : $recent->the_post();?>
									<?php
										$images_url = get_post_meta( get_the_ID(), '_cg_meta_images_url', true ); 
								 		$images_title = get_post_meta( get_the_ID(), '_cg_meta_images_title', true );
								 		
								 		

										
								 			
										
								 					 		
								 		$img_url = array();
								 		$contents_img = array();


								 		
								 		foreach ( $images_url as $key => $image_url ) :
											$img_url[] =  $image_url;

											global $wpdb;
											$cont_img = $wpdb->get_var( $wpdb->prepare( "SELECT post_content FROM $wpdb->posts WHERE guid = %s", $image_url ) );
												
											$contents_img[] =  $cont_img;     								
										endforeach; 

										
							 		//$indice =  rand(0, count($images_title))

									?>

									<li>

										<a href="<?php the_permalink() ?>">

										<img width="300" height="194" src="<?php echo $img_url[0]; ?>"  ?>">

										<h2><?php the_title(); ?> - <?php echo $contents_img[0] ?></h2>

										</a>
										

									</li>

								<?php endwhile; ?>

							</ul>

						</div><!--es-carousel-->

					</div><!--carousel-wrapper-->





		<?php



		/* After widget (defined by themes). */

		echo $after_widget;

	}



	/**

	 * Update the widget settings.

	 */

	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;



		/* Strip tags for title and name to remove HTML (important for text inputs). */

		$instance['title'] = strip_tags( $new_instance['title'] );

		$instance['number'] = strip_tags( $new_instance['number'] );

		$instance['tags'] = $new_instance['tags'];





		return $instance;

	}





	function form( $instance ) {



		/* Set up some default widget settings. */

		$defaults = array( 'title' => 'Widget Title', 'number' => 10);

		$instance = wp_parse_args( (array) $instance, $defaults ); ?>



		<!-- Widget Title: Text Input -->

		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:90%;" />

		</p>



		<!-- Tag -->

		<p>

			<label for="<?php echo $this->get_field_id('tags'); ?>">Show from: Gallery</label>

			

		</p>



		<!-- Number of posts -->

		<p>

			<label for="<?php echo $this->get_field_id( 'number' ); ?>">Maximum number of posts in Gallery:</label>

			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" size="3" />

		</p>





	<?php

	}

}




?>