<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

$truck_template_args = get_query_var( 'truck_template_args' );

if ( is_array( $truck_template_args ) ) {
	$truck_columns    = empty( $truck_template_args['columns'] ) ? 2 : max( 1, $truck_template_args['columns'] );
	$truck_blog_style = array( $truck_template_args['type'], $truck_columns );
    $truck_columns_class = truck_get_column_class( 1, $truck_columns, ! empty( $truck_template_args['columns_tablet']) ? $truck_template_args['columns_tablet'] : '', ! empty($truck_template_args['columns_mobile']) ? $truck_template_args['columns_mobile'] : '' );
} else {
	$truck_template_args = array();
	$truck_blog_style = explode( '_', truck_get_theme_option( 'blog_style' ) );
	$truck_columns    = empty( $truck_blog_style[1] ) ? 2 : max( 1, $truck_blog_style[1] );
    $truck_columns_class = truck_get_column_class( 1, $truck_columns );
}
$truck_expanded   = ! truck_sidebar_present() && truck_get_theme_option( 'expand_content' ) == 'expand';

$truck_post_format = get_post_format();
$truck_post_format = empty( $truck_post_format ) ? 'standard' : str_replace( 'post-format-', '', $truck_post_format );

?><div class="<?php
	if ( ! empty( $truck_template_args['slider'] ) ) {
		echo ' slider-slide swiper-slide';
	} else {
		echo ( truck_is_blog_style_use_masonry( $truck_blog_style[0] ) ? 'masonry_item masonry_item-1_' . esc_attr( $truck_columns ) : esc_attr( $truck_columns_class ) );
	}
?>"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $truck_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $truck_columns )
				. ' post_layout_' . esc_attr( $truck_blog_style[0] )
				. ' post_layout_' . esc_attr( $truck_blog_style[0] ) . '_' . esc_attr( $truck_columns )
	);
	truck_add_blog_animation( $truck_template_args );
	?>
>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?>
		<span class="post_label label_sticky"></span>
		<?php
	}

	// Featured image
	$truck_hover      = ! empty( $truck_template_args['hover'] ) && ! truck_is_inherit( $truck_template_args['hover'] )
							? $truck_template_args['hover']
							: truck_get_theme_option( 'image_hover' );

	$truck_components = ! empty( $truck_template_args['meta_parts'] )
							? ( is_array( $truck_template_args['meta_parts'] )
								? $truck_template_args['meta_parts']
								: explode( ',', $truck_template_args['meta_parts'] )
								)
							: truck_array_get_keys_by_value( truck_get_theme_option( 'meta_parts' ) );

	truck_show_post_featured( apply_filters( 'truck_filter_args_featured',
		array(
			'thumb_size' => ! empty( $truck_template_args['thumb_size'] )
				? $truck_template_args['thumb_size']
				: truck_get_thumb_size(
					'classic' == $truck_blog_style[0]
						? ( strpos( truck_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $truck_columns > 2 ? 'big' : 'huge' )
								: ( $truck_columns > 2
									? ( $truck_expanded ? 'square' : 'square' )
									: ($truck_columns > 1 ? 'square' : ( $truck_expanded ? 'huge' : 'big' ))
									)
							)
						: ( strpos( truck_get_theme_option( 'body_style' ), 'full' ) !== false
								? ( $truck_columns > 2 ? 'masonry-big' : 'full' )
								: ($truck_columns === 1 ? ( $truck_expanded ? 'huge' : 'big' ) : ( $truck_columns <= 2 && $truck_expanded ? 'masonry-big' : 'masonry' ))
							)
			),
			'hover'      => $truck_hover,
			'meta_parts' => $truck_components,
			'no_links'   => ! empty( $truck_template_args['no_links'] ),
        ),
        'content-classic',
        $truck_template_args
    ) );

	// Title and post meta
	$truck_show_title = get_the_title() != '';
	$truck_show_meta  = count( $truck_components ) > 0 && ! in_array( $truck_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	if ( $truck_show_title ) {
		?>
		<div class="post_header entry-header">
			<?php

			// Post meta
			if ( apply_filters( 'truck_filter_show_blog_meta', $truck_show_meta, $truck_components, 'classic' ) ) {
				if ( count( $truck_components ) > 0 ) {
					do_action( 'truck_action_before_post_meta' );
					truck_show_post_meta(
						apply_filters(
							'truck_filter_post_meta_args', array(
							'components' => join( ',', $truck_components ),
							'seo'        => false,
							'echo'       => true,
						), $truck_blog_style[0], $truck_columns
						)
					);
					do_action( 'truck_action_after_post_meta' );
				}
			}

			// Post title
			if ( apply_filters( 'truck_filter_show_blog_title', true, 'classic' ) ) {
				do_action( 'truck_action_before_post_title' );
				if ( empty( $truck_template_args['no_links'] ) ) {
					the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
				} else {
					the_title( '<h4 class="post_title entry-title">', '</h4>' );
				}
				do_action( 'truck_action_after_post_title' );
			}

			if( !in_array( $truck_post_format, array( 'quote', 'aside', 'link', 'status' ) ) ) {
				// More button
				if ( apply_filters( 'truck_filter_show_blog_readmore', ! $truck_show_title || ! empty( $truck_template_args['more_button'] ), 'classic' ) ) {
					if ( empty( $truck_template_args['no_links'] ) ) {
						do_action( 'truck_action_before_post_readmore' );
						truck_show_post_more_link( $truck_template_args, '<div class="more-wrap">', '</div>' );
						do_action( 'truck_action_after_post_readmore' );
					}
				}
			}
			?>
		</div><!-- .entry-header -->
		<?php
	}

	// Post content
	if( in_array( $truck_post_format, array( 'quote', 'aside', 'link', 'status' ) ) ) {
		ob_start();
		if (apply_filters('truck_filter_show_blog_excerpt', empty($truck_template_args['hide_excerpt']) && truck_get_theme_option('excerpt_length') > 0, 'classic')) {
			truck_show_post_content($truck_template_args, '<div class="post_content_inner">', '</div>');
		}
		// More button
		if(! empty( $truck_template_args['more_button'] )) {
			if ( empty( $truck_template_args['no_links'] ) ) {
				do_action( 'truck_action_before_post_readmore' );
				truck_show_post_more_link( $truck_template_args, '<div class="more-wrap">', '</div>' );
				do_action( 'truck_action_after_post_readmore' );
			}
		}
		$truck_content = ob_get_contents();
		ob_end_clean();
		truck_show_layout($truck_content, '<div class="post_content entry-content">', '</div><!-- .entry-content -->');
	}
	?>

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
