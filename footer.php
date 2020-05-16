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
			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'depth'          => 1,
					'menu_class'     => 'list-inline m-0',

				) );
			?>
			<div class="text-white-50">
				<small>
					&copy; <a href="<?php echo esc_url(home_url('/')) ?>">IPO Tracker</a>.
					designed by <a href="https://twitter.com/diechang_inv" target="_blank">Diechang.</a>
				</small>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
