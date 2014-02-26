<?php get_header(); ?>



<?php global $author; $userdata = get_userdata($author); ?>



<div id="main">

	<div id="content-wrapper">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="breadcrumb">

			<?php // if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('<p id="breadcrumbs">','</p>');
					} ?>


		</div><!--breadcrumb-->

	

		<div id="home-main">

			<div id="post-area" <?php post_class(); ?>>


				<div id="content-area">

	<!-- <div id="title-main">-->

			<h1 class="headline"><?php the_title(); ?></h1>	
		
		<!-- </div> -->

					<?php $ht_featured_img = get_option('ht_featured_img');
						$hayvideo = get_post_meta($post->ID, "mvp_video_embed", false); 

						if (($ht_featured_img == "true") || ($hayvideo)) { ?>

						<?php if($hayvideo): ?>

							<?php echo get_post_meta($post->ID, "mvp_video_embed", true); ?>

						<?php else: ?>

							<?php $mvp_show_hide = get_post_meta($post->ID, "mvp_featured_image", true); if ($mvp_show_hide == "hide") { ?>

							<?php } else { ?>

								<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { /* if post has a thumbnail */ ?>

								<div class="post-image">

									<?php the_post_thumbnail('post-thumb'); ?>

								</div><!--post-image-->

								<?php } ?>

							<?php } ?>

						<?php endif; ?>

					<?php } ?>

		<div align="center">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- luchas_single_336 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:336px;height:280px"
			     data-ad-client="ca-pub-9268096879094453"
			     data-ad-slot="2947911491"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>



					<?php the_content(); ?>

		<div><br>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- luchas_single_336_botoom -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:336px;height:280px"
			     data-ad-client="ca-pub-9268096879094453"
			     data-ad-slot="2917558690"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>


					<?php wp_link_pages(); ?>

				</div><!--content-area-->

				<?php $author = get_option('ht_author_box'); if ($author == "true") { ?>

				<div id="author-info">

					<?php echo get_avatar( get_the_author_meta('email'), '60' ); ?>

					<div id="author-text">

	<span class="post-byline"><?php _e( 'By', 'mvp-text' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'el', 'mvp-text' ); ?></span>  <?php fechas_good(); //the_time(get_option('date_format')); ?><?php $authordesc = get_the_author_meta( 'twitter' ); if ( ! empty ( $authordesc ) ) { ?><span class="twitter-byline"><a href="http://www.twitter.com/<?php the_author_meta('twitter'); ?>" target="blank">@<?php the_author_meta('twitter'); ?></a></span><?php } ?>

						<?php the_author_meta('description'); ?>

					</div><!--author-text-->

				</div><!--author-info-->

				<?php } ?>

				<div class="post-tags">

					<span class="post-tags-header"><?php _e( 'Related Items', 'mvp-text' ); ?></span><?php the_tags('','','') ?>

				</div><!--post-tags-->

				<?php $ht_socialbox = get_option('ht_socialbox'); if ($ht_socialbox == "true") { ?>

				<div id="social-box">

					<ul class="post-social">

						<li class="fb-line">

							<div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false"></div>

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

			</div><!--post-area-->

			<?php $ht_prev_next = get_option('ht_prev_next'); if ($ht_prev_next == "true") { ?>

			<div class="prev-next-wrapper">

				<div class="prev-post">

					<?php previous_post_link('&larr; '.__('Previous Story', 'mvp-text').' %link', '%title', TRUE); ?>

				</div><!--prev-post-->

				<div class="next-post">

					<?php next_post_link(''.__('Next Story', 'mvp-text').' &rarr; %link', '%title', TRUE); ?>

				</div><!--next-post-->

			</div><!--prev-next-wrapper-->

			<?php } ?>

			<?php getRelatedPosts(); ?>

			<?php comments_template(); ?>

		</div><!--home-main-->

		<?php endwhile; endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>