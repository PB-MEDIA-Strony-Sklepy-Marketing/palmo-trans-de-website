<?php
/**
 * The template to display single post
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

// Full post loading
$full_post_loading          = truck_get_value_gp( 'action' ) == 'full_post_loading';

// Prev post loading
$prev_post_loading          = truck_get_value_gp( 'action' ) == 'prev_post_loading';
$prev_post_loading_type     = truck_get_theme_option( 'posts_navigation_scroll_which_block', 'article' );

// Position of the related posts
$truck_related_position   = truck_get_theme_option( 'related_position', 'below_content' );

// Type of the prev/next post navigation
$truck_posts_navigation   = truck_get_theme_option( 'posts_navigation' );
$truck_prev_post          = false;
$truck_prev_post_same_cat = (int)truck_get_theme_option( 'posts_navigation_scroll_same_cat', 1 );

// Rewrite style of the single post if current post loading via AJAX and featured image and title is not in the content
if ( ( $full_post_loading 
		|| 
		( $prev_post_loading && 'article' == $prev_post_loading_type )
	) 
	&& 
	! in_array( truck_get_theme_option( 'single_style' ), array( 'style-6' ) )
) {
	truck_storage_set_array( 'options_meta', 'single_style', 'style-6' );
}

do_action( 'truck_action_prev_post_loading', $prev_post_loading, $prev_post_loading_type );

get_header();

while ( have_posts() ) {

	the_post();

	// Type of the prev/next post navigation
	if ( 'scroll' == $truck_posts_navigation ) {
		$truck_prev_post = get_previous_post( $truck_prev_post_same_cat );  // Get post from same category
		if ( ! $truck_prev_post && $truck_prev_post_same_cat ) {
			$truck_prev_post = get_previous_post( false );                    // Get post from any category
		}
		if ( ! $truck_prev_post ) {
			$truck_posts_navigation = 'links';
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $truck_prev_post ) ) {
		truck_sc_layouts_showed( 'featured', false );
		truck_sc_layouts_showed( 'title', false );
		truck_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $truck_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/content', 'single-' . truck_get_theme_option( 'single_style' ) ), 'single-' . truck_get_theme_option( 'single_style' ) );

	// If related posts should be inside the content
	if ( strpos( $truck_related_position, 'inside' ) === 0 ) {
		$truck_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'truck_action_related_posts' );
		$truck_related_content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $truck_related_content ) ) {
			$truck_related_position_inside = max( 0, min( 9, truck_get_theme_option( 'related_position_inside' ) ) );
			if ( 0 == $truck_related_position_inside ) {
				$truck_related_position_inside = mt_rand( 1, 9 );
			}

			$truck_p_number         = 0;
			$truck_related_inserted = false;
			$truck_in_block         = false;
			$truck_content_start    = strpos( $truck_content, '<div class="post_content' );
			$truck_content_end      = strrpos( $truck_content, '</div>' );

			for ( $i = max( 0, $truck_content_start ); $i < min( strlen( $truck_content ) - 3, $truck_content_end ); $i++ ) {
				if ( $truck_content[ $i ] != '<' ) {
					continue;
				}
				if ( $truck_in_block ) {
					if ( strtolower( substr( $truck_content, $i + 1, 12 ) ) == '/blockquote>' ) {
						$truck_in_block = false;
						$i += 12;
					}
					continue;
				} else if ( strtolower( substr( $truck_content, $i + 1, 10 ) ) == 'blockquote' && in_array( $truck_content[ $i + 11 ], array( '>', ' ' ) ) ) {
					$truck_in_block = true;
					$i += 11;
					continue;
				} else if ( 'p' == $truck_content[ $i + 1 ] && in_array( $truck_content[ $i + 2 ], array( '>', ' ' ) ) ) {
					$truck_p_number++;
					if ( $truck_related_position_inside == $truck_p_number ) {
						$truck_related_inserted = true;
						$truck_content = ( $i > 0 ? substr( $truck_content, 0, $i ) : '' )
											. $truck_related_content
											. substr( $truck_content, $i );
					}
				}
			}
			if ( ! $truck_related_inserted ) {
				if ( $truck_content_end > 0 ) {
					$truck_content = substr( $truck_content, 0, $truck_content_end ) . $truck_related_content . substr( $truck_content, $truck_content_end );
				} else {
					$truck_content .= $truck_related_content;
				}
			}
		}

		truck_show_layout( $truck_content );
	}

	// Comments
	do_action( 'truck_action_before_comments' );
	comments_template();
	do_action( 'truck_action_after_comments' );

	// Related posts
	if ( 'below_content' == $truck_related_position
		&& ( 'scroll' != $truck_posts_navigation || (int)truck_get_theme_option( 'posts_navigation_scroll_hide_related', 0 ) == 0 )
		&& ( ! $full_post_loading || (int)truck_get_theme_option( 'open_full_post_hide_related', 1 ) == 0 )
	) {
		do_action( 'truck_action_related_posts' );
	}

	// Post navigation: type 'scroll'
	if ( 'scroll' == $truck_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $truck_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $truck_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $truck_prev_post ) ); ?>"
			data-cur-post-link="<?php echo esc_attr( get_permalink() ); ?>"
			data-cur-post-title="<?php the_title_attribute(); ?>"
			<?php do_action( 'truck_action_nav_links_single_scroll_data', $truck_prev_post ); ?>
		></div>
		<?php
	}
}

get_footer();
