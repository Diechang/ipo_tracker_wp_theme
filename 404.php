<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package IPO_Tracker_2020
 */

get_header();
?>

<div class="container">
	<div class="py-5">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title">404 not found.</h1>
						<p class="lead">お探しのページは見つかりませんでした。</p>
					</header><!-- .page-header -->

					<div class="page-content">


						<?php
						the_widget( 'WP_Widget_Search' );

						the_widget( 'WP_Widget_Recent_Posts' );
						?>

						<div class="widget widget_categories">
							<h2 class="widget-title">使用率の高いカテゴリ</h2>
							<ul>
								<?php
								wp_list_categories( array(
									'orderby'    => 'count',
									'order'      => 'DESC',
									'show_count' => 1,
									'title_li'   => '',
									'number'     => 10,
								) );
								?>
							</ul>
						</div><!-- .widget -->

						<?php
						/* translators: %1$s: smiley */
						the_widget( 'WP_Widget_Archives' );

						the_widget( 'WP_Widget_Tag_Cloud' );
						?>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
<?php
get_footer();
