<div id="sidebar-wrapper">

	<ul>

		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Home Widget Area')): endif; ?>
		
		<?php include "gallery.php" ?>
	</ul>

</div><!--sidebar-wrapper-->