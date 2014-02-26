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
		<div id="home-main">
			<div id="post-area" <?php post_class(); ?>>
				<?php $ht_socialbox = get_option('ht_socialbox'); if ($ht_socialbox == "true") { ?>
				<div id="social-box">
					<ul class="post-social">
						<li class="fb-line">
							<div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
						</li>
						<li>
							<a href="http://twitter.com/share" class="twitter-share-button" data-lang="en" data-count="horizontal">Tweet</a>
						</li>
						<li>
							<g:plusone size="medium" annotation="bubble" width="90"></g:plusone>
						</li>
						<li>
							<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
						</li>
					</ul>
				</div><!--social-box-->
				<?php } ?>
				<div id="content-area">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</div><!--content-area-->
			</div><!--post-area-->
		</div><!--home-main-->
		<?php endwhile; endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>