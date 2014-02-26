<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />

<title><?php wp_title( '-', true, 'right' ); ?></title>

<!--[if lt IE 9]>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/iecss.css" />
<![endif]-->

<?php if(get_option('ht_favicon')) { ?><link rel="shortcut icon" href="<?php echo get_option('ht_favicon'); ?>" /><?php } ?>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />


<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>



<?php $analytics = get_option('ht_tracking'); if ($analytics) { echo stripslashes($analytics); } ?>



<?php wp_head(); ?>



<style type="text/css">
<?php $customcss = get_option('ht_customcss'); if ($customcss) { echo stripslashes($customcss); } ?>
</style>


</head>


<body <?php body_class(); ?>>

<div id="site">

	<?php if(get_option('ht_wall_ad')) { ?>

	<div id="wallpaper">

		<?php if(get_option('ht_wall_url')) { ?>

		<a href="<?php echo get_option('ht_wall_url'); ?>" class="wallpaper-link"></a>

		<?php } ?>

	</div><!--wallpaper-->

	<?php } ?>

	<div id="wrapper">

		<div id="header-wrapper">

			<div id="top-header-wrapper">

				<div id="top-nav">

					<?php wp_nav_menu(array('theme_location' => 'secondary-menu')); ?>

				</div><!--top-nav-->

				<div id="content-social">

					<ul>

						<?php if(get_option('ht_facebook')) { ?>

						<li><a href="http://www.facebook.com/<?php echo get_option('ht_facebook'); ?>" alt="Facebook" class="fb-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_twitter')) { ?>

						<li><a href="http://www.twitter.com/<?php echo get_option('ht_twitter'); ?>" alt="Twitter" class="twitter-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_pinterest')) { ?>

						<li><a href="http://www.pinterest.com/<?php echo get_option('ht_pinterest'); ?>" alt="Pinterest" class="pinterest-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_instagram')) { ?>

						<li><a href="http://www.instagram.com/<?php echo get_option('ht_instagram'); ?>" alt="Instagram" class="instagram-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_google')) { ?>

						<li><a href="<?php echo get_option('ht_google'); ?>" alt="Google Plus" class="google-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_tumblr')) { ?>

						<li><a href="http://<?php echo get_option('ht_tumblr'); ?>.tumblr.com" alt="Tumblr" class="tumblr-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_youtube')) { ?>

						<li><a href="http://www.youtube.com/user/<?php echo get_option('ht_youtube'); ?>" alt="YouTube" class="youtube-but" target="_blank"></a></li>

						<?php } ?>

						<?php if(get_option('ht_linkedin')) { ?>

						<li><a href="http://www.linkedin.com/company/<?php echo get_option('ht_linkedin'); ?>" alt="Linkedin" class="linkedin-but" target="_blank"></a></li>

						<?php } ?>

						<li><a href="<?php bloginfo('rss2_url'); ?>" alt="RSS Feed" class="rss-but"></a></li>

					</ul>

				</div><!--content-social-->

			</div><!--top-header-wrapper-->

			<?php if(get_option('ht_ad_layout') == 'Above Logo') { ?>

			<?php if(get_option('ht_leader_ad')) { ?>

			<div id="leader-wrapper">

				<div id="ad-970">

					<?php $ad970 = get_option('ht_leader_ad'); if ($ad970) { echo stripslashes($ad970); } ?>

				</div><!--ad-970-->

			</div><!--leader-wrapper-->

			<?php } ?>

			<div id="logo-wrapper" itemscope itemtype="http://schema.org/Organization">

				<?php if(get_option('ht_logo')) { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_option('ht_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } else { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } ?>

			</div><!--logo-wrapper-->

			<?php } else { ?>

			<?php if(get_option('ht_leader_ad')) {

			if ( is_home() ) {

			 ?>

			<div id="leader-small">

				<div id="ad-728" >

					<?php $ad970 = get_option('ht_leader_ad'); if ($ad970) { echo stripslashes($ad970); } ?>

				</div><!--ad-728-->

			</div><!--leader-small-->

			<?php

			}  // Close is home 

			} // Close is right 

			 ?>

			<div id="logo-small" itemscope itemtype="http://schema.org/Organization">

				<?php if(get_option('ht_logo')) { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_option('ht_logo'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } else { ?>

					<a itemprop="url" href="<?php echo home_url(); ?>"><img itemprop="logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>

				<?php } ?>

			</div><!--logo-small-->

			<?php } ?>

		</div><!--header-wrapper-->

		<div id="nav-wrapper">

			<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>

			<?php if (is_plugin_active('menufication/menufication.php')) { ?>

			<?php } else { ?>

				<div id="nav-mobi">

 					<?php wp_nav_menu(array( 'theme_location' => 'primary-menu', 'items_wrap' => '<select><option value="#">'.__('Menu', 'mvp-text').'</option>%3$s</select>', 'walker' => new select_menu_walker() )); ?>

				</div><!--nav-mobi-->

			<?php } ?>

			<ul class="main-nav">

				<?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>

			</ul><!--main-nav-->

			<div id="main-search">

				<?php get_search_form(); ?>

			</div><!--main-search-->

		</div><!--nav-wrapper-->