<?php
/**
 * The Sidebar containing the Homepage widget area.
 *
 * @package WordPress
 * @subpackage Foursquare Two
 * @since Foursquare Two 1.0
 */
?>

</div><!--end container (from header.php)-->

<section id="footer-widgets" style="display:none;">
	<div class="container">
		<div class="row">

			<?php
			/* This tells the theme to use the Homepage Widgets specified
	 		* in Appearance > Widgets. In case no widgets are specified,
	 		* we're going to hard-code a few so the site won't be empty.
	 		*/
			if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>

			<?php endif; // end Homepage Widgets ?>
		</div><!--end row-->
		<hr />
	</div><!--end container-->
</section><!--end homepage-widgets-->