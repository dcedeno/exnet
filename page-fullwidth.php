<?php

	/* Template Name: Full Width */

?>

<?php get_header(); ?>

<div id="main">
	<div id="content-wrapper">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="breadcrumb">
			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
		</div><!--breadcrumb-->
		<div id="title-main">
			<h1 class="headline-page"><?php the_title(); ?></h1>
		</div><!--title-main-->
		<div id="home-main" class="full">
			<div id="post-area" <?php post_class(); ?>>
				<div id="social-box" class="full2">
					<ul class="post-social">
						<li>
							<a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal">Tweet</a>
						</li>
						<li>
							<g:plusone size="medium" annotation="inline" width="120"></g:plusone>
						</li>
						<li>
							<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
						</li>
						<li>
							<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
						</li>
					</ul>
				</div><!--social-box-->
				<div id="content-area" class="full2">
					<?php $ht_featured_img = get_option('ht_featured_img'); if ($ht_featured_img == "true") { ?>
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>
						<div class="post-image">
							<?php the_post_thumbnail('post-thumb'); ?>
						</div><!--post-image-->
						<?php } ?>
					<?php } ?>
					<?php the_content(); ?>
					<?php posts_nav_link(); ?>
				</div><!--content-area-->
			</div><!--post-area-->
		</div><!--home-main-->
		<?php endwhile; endif; ?>
<?php get_footer(); ?>