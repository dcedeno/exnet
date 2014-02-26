<?php
/*
	Template Name: Images Gallery
	
*/
?>

<?php get_header(); 
?>

<div class="container-960 bg-page-bar">

    <div class="page-bar">

      	<h1 class="title-page"><?php echo get_the_title(); ?></h1><span class="right"></span>

      	<div class="categories">

        <span class="right"></span>

        <ul>
        	
          	<li class="listFilterPanel" id="all">
          		<span class="right"><a class="template-based-element-background-color-hover  template-based-element-border-color-hover">All</a></span></li>
          
          	
			<?php 
			$categories = get_terms( 'gallerycategory', 'orderby=count&order=DESC&hide_empty=0' ); ?>

			<?php foreach ($categories as $i => $cat) : ?>
				<?php if($i <= 5 ) : ?>
		          	<li class="listFilterPanel" id="<?php echo $cat->term_id; ?>"><span class=
		          	"right"><a class="template-based-element-background-color-hover  template-based-element-border-color-hover"><?php echo $cat->name; ?></a></span></li>

		          	<li style="list-style: none"><span class="right"></span></li>
				<?php endif; ?>
			<?php endforeach;  ?>

        </ul>

    	</div>

    	<div class="clear"></div>

 	</div>

</div>

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

<div class="container-960 content-page-home content-page-standard">

	<div class="grid_12 container_12 alpha omega">
		
		<ul class="albums-photos-videos photos">
			
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

					<?php
						$images_url = get_post_meta( get_the_ID(), '_cg_meta_images_url', true ); 
				 		$images_title = get_post_meta( get_the_ID(), '_cg_meta_images_title', true );
				 		$fecha_album = get_post_meta( get_the_ID(), 'wpcf-fecha-del-album', true );
				 		$numero_album = get_post_meta( get_the_ID(), 'wpcf-numero-del-album', true );

				 		if (isset($fecha_album)) {
				 			$fecha_album = gmdate("Y-m-d",$fecha_album);
				 		}	 		
						setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
						$d = $fecha_album;
				 		$fecha_album = strftime("%d de %B de %Y", strtotime($d));
				 					 		
				 		$img_url = array();
				 		
				 		foreach ( $images_url as $key => $image_url ) :
							$img_url[] =  $image_url;						
						endforeach; 

						$idsCat = array();
						$catsId ="";
						$con = 0;
				 		$cats = get_the_terms(get_the_ID(),'gallerycategory');
				 		if ($cats) {
				 			foreach ($cats as $mycat) {
				 				if ($con == 0) {
				 					$catsId .=$mycat->term_id;
				 				}else{
				 					$catsId .=",".$mycat->term_id;
				 				}
					 			$con++;
					 		}
				 		}
				 		else{
				 			$catsId = 354;
				 		}
				 		

						?>


					<li id="post-<?php echo get_the_ID(); ?>" class="itemsGallery" name="<?php echo $catsId?>">

						<a  href="<?php echo get_permalink(get_the_ID()); ?>">

						<img alt="albums-photos-videos" src="<?php echo $img_url[1]; ?>" style="height: 192px;">

						<!-- parte frontal -->
						<div class="black-bg-albums-photos-videos caption">
							<h1><?php echo get_the_title(); ?></h1>
						</div>

						<!-- cuando gira -->
						<div class="black-bg-albums-photos-videos-pink">
							
							<p><?php echo $numero_album; ?></p>
							<h1><?php echo get_the_title(); ?></h1>
							<p><?php echo $fecha_album; ?></p>
							<p><?php echo count($images_title)." fotos" ?></p>
							<div class="icon-albums-photos-videos"></div>
						</div></a>

					</li>	
			<?php endwhile; else : ?>

                <li class='no-posts'>

                    <div class="post-container">

                        <div class="container-slider-single-page">

                            <h1><?php _e('The post was not found.', 'clubix-framework'); ?></h1>

                        </div>

                    </div>

                </li>
			<?php endif; ?>		
			<?php $wp_query = $temp; ?>

			

		</ul>

		<ul class="list-blog-pages">

            <li><?php next_posts_link(__('&lt; Older Posts', 'clubix-framework')); ?></li>
            <li class="list-blog-right"><?php previous_posts_link(__('Newer Posts &gt;', 'clubix-framework')); ?></li>

        </ul>

		<div class="clear"></div>

	</div>

	<div class="clear"></div>
</div>

<?php get_footer(); ?>