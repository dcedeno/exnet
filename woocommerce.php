<?php get_header(); ?>

<div id="main">
	<div id="content-wrapper">
		<div id="home-main">
			<div id="post-area" <?php post_class(); ?>>
				<div id="woo-content">
					<?php woocommerce_content(); ?>
					<?php wp_link_pages(); ?>
				</div><!--woo-content-->
			</div><!--post-area-->
		</div><!--home-main-->
<?php get_sidebar('woo'); ?>
<?php get_footer(); ?>