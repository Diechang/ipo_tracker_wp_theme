<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package IPO_Tracker_2020
 */

get_header();
?>

<div class="container">
	<div class="row py-5">
		<div class="col-lg-9 mb-5">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );
				?>

				<!-- 投稿ナビゲーション -->
				<div class="row mb-5">
					<?php if(get_previous_post()) :?>
					<div class="col"><?php previous_post_link(); ?></div>
					<?php endif; ?>
					<?php if(get_next_post()) :?>
					<div class="col"><?php next_post_link(); ?></div>
					<?php endif; ?>
				</div>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

		</div>
		<div class="col-lg-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
