<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IPO_Tracker_2020
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer py-2 bg-dark text-light">
		<div class="site-info container text-center">
			&copy; <a href="<?php echo esc_url(home_url('/')) ?>">IPO Tracker</a>.
			<div class="text-muted"><small>designed by <a href="https://twitter.com/diechang_inv" target="_blank">Diechang.</small></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
