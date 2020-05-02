<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IPO_Tracker_2020
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				ipo_tracker_2020_posted_on();
				// ipo_tracker_2020_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if( !is_singular() ) ipo_tracker_2020_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content('続きを読む');
		} else {
			the_excerpt();
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'ページ', 'ipo_tracker_2020' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php ipo_tracker_2020_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
