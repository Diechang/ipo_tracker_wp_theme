<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IPO_Tracker_2020
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="container d-flex flex-nowrap justify-content-between align-items-center p-0">
			<div class="p-2">
				<?php the_custom_logo(); ?>
			</div>
			<div class="p-2 text-nowrap">
				<a href="<?php echo esc_url( get_bloginfo( 'rss2_url' ) ); ?>" class="btn btn-info" target="_blank"><i class="fas fa-rss"></i></a>
				<a href="https://twitter.com/diechang_inv" class="btn btn-info" target="_blank"><i class="fab fa-twitter"></i></a>
			</div>
		</div>

		<?php if ( display_header_text() ): ?>
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ): ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
				<?php
					$ipo_tracker_2020_description = get_bloginfo( 'description', 'display' );
					if ( $ipo_tracker_2020_description || is_customize_preview() ):
				?>
				<p class="site-description"><?php echo $ipo_tracker_2020_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation text-light">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ipo_tracker_2020' ); ?></button> -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'container_class' => 'menu-container container p-0',
				'depth'          => 2
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
