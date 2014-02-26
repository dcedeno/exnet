				<div id="footer-wrapper">

					<div id="footer-top">

						<ul>

							<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widget Area')): endif; ?>

						</ul>

					</div><!--footer-top-->

					<div id="footer-bottom">

						<p><?php echo get_option('ht_copyright'); ?></p><?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>

					</div><!--footer-bottom-->

				</div><!--footer-wrapper-->

			</div><!--content-wrapper-->

		</div><!--main-->

	</div><!--wrapper-->

</div><!--site-->



<?php wp_footer(); ?>

<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=6711531; 
var sc_invisible=1; 
var sc_security="68f52c6f"; 
</script>
<script type="text/javascript"
src="http://www.statcounter.com/counter/counter.js"></script>
<!-- End of StatCounter Code for Default Guide -->

</body>

</html>