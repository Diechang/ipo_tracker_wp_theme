<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package IPO_Tracker_2020
 */

if ( ! function_exists( 'ipo_tracker_2020_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ipo_tracker_2020_posted_on() {
		$time_string = '<time class="entry-date published updated" title="公開日" datetime="%1$s"><i class="far fa-clock"></i> %2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published mr-2" title="公開日" datetime="%1$s"><i class="far fa-clock"></i> %2$s</time> <time class="updated" title="最終更新日" datetime="%3$s"><i class="fas fa-history"></i> %4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		echo '<div class="posted-on text-muted">' . $time_string . '</div>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ipo_tracker_2020_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ipo_tracker_2020_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'ipo_tracker_2020' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ipo_tracker_2020_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ipo_tracker_2020_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'ipo_tracker_2020' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links mr-2"><i class="fas fa-tags"></i> ' . esc_html__( '%1$s', 'ipo_tracker_2020' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ipo_tracker_2020' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links mr-2"><i class="fas fa-hashtag"></i> ' . esc_html__( '%1$s', 'ipo_tracker_2020' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link mr-2"><i class="fas fa-comment"></i> ';
			comments_popup_link('0件', '1件', '%件');
			echo '</span>';
		}

		edit_post_link(
			'編集',
			'<span class="edit-link"><i class="fas fa-edit"></i> ',
			'</span>'
		);

	}
endif;

if ( ! function_exists( 'ipo_tracker_2020_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ipo_tracker_2020_post_thumbnail() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php if( has_post_thumbnail() ):?>
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
			<?php else: ?>
			<span class="no-image"></span>
			<?php endif; ?>
		</a>

		<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
