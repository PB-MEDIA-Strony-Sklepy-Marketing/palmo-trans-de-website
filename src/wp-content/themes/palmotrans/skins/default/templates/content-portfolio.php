<?php
/**
 * The Portfolio template to display the content
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

$truck_post_format = get_post_format();
$truck_post_format = empty( $truck_post_format ) ? 'standard' : str_replace( 'post-format-', '', $truck_post_format );

?><div class="
<?php
if ( ! empty( $truck_template_args['slider'] ) ) {
	echo ' slider-slide swiper-slide';
} else {
	echo ( truck_is_blog_style_use_masonry( $truck_blog_style[0] ) ? 'masonry_item masonry_item-1_' . esc_attr( $truck_columns ) : esc_attr( $truck_columns_class ));
}
?>
"><article id="post-<?php the_ID(); ?>" 
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $truck_post_format )
		. ' post_layout_portfolio'
		. ' post_layout_portfolio_' . esc_attr( $truck_columns )
		. ( 'portfolio' != $truck_blog_style[0] ? ' ' . esc_attr( $truck_blog_style[0] )  . '_' . esc_attr( $truck_columns ) : '' )
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

	$truck_hover   = ! empty( $truck_template_args['hover'] ) && ! truck_is_inherit( $truck_template_args['hover'] )
								? $truck_template_args['hover']
								: truck_get_theme_option( 'image_hover' );

	if ( 'dots' == $truck_hover ) {
		$truck_post_link = empty( $truck_template_args['no_links'] )
								? ( ! empty( $truck_template_args['link'] )
									? $truck_template_args['link']
									: get_permalink()
									)
								: '';
		$truck_target    = ! empty( $truck_post_link ) && truck_is_external_url( $truck_post_link )
								? ' target="_blank" rel="nofollow"'
								: '';
	}
	
	// Meta parts
	$truck_components = ! empty( $truck_template_args['meta_parts'] )
							? ( is_array( $truck_template_args['meta_parts'] )
								? $truck_template_args['meta_parts']
								: explode( ',', $truck_template_args['meta_parts'] )
								)
							: truck_array_get_keys_by_value( truck_get_theme_option( 'meta_parts' ) );

	// Featured image
	truck_show_post_featured( apply_filters( 'truck_filter_args_featured',
        array(
			'hover'         => $truck_hover,
			'no_links'      => ! empty( $truck_template_args['no_links'] ),
			'thumb_size'    => ! empty( $truck_template_args['thumb_size'] )
								? $truck_template_args['thumb_size']
								: truck_get_thumb_size(
									truck_is_blog_style_use_masonry( $truck_blog_style[0] )
										? (	strpos( truck_get_theme_option( 'body_style' ), 'full' ) !== false || $truck_columns < 3
											? 'masonry-big'
											: 'masonry'
											)
										: (	strpos( truck_get_theme_option( 'body_style' ), 'full' ) !== false || $truck_columns < 3
											? 'square'
											: 'square'
											)
								),
			'thumb_bg' => truck_is_blog_style_use_masonry( $truck_blog_style[0] ) ? false : true,
			'show_no_image' => true,
			'meta_parts'    => $truck_components,
			'class'         => 'dots' == $truck_hover ? 'hover_with_info' : '',
			'post_info'     => 'dots' == $truck_hover
										? '<div class="post_info"><h5 class="post_title">'
											. ( ! empty( $truck_post_link )
												? '<a href="' . esc_url( $truck_post_link ) . '"' . ( ! empty( $target ) ? $target : '' ) . '>'
												: ''
												)
												. esc_html( get_the_title() ) 
											. ( ! empty( $truck_post_link )
												? '</a>'
												: ''
												)
											. '</h5></div>'
										: '',
            'thumb_ratio'   => 'info' == $truck_hover ?  '100:102' : '',
        ),
        'content-portfolio',
        $truck_template_args
    ) );
	?>
</article></div><?php
// Need opening PHP-tag above, because <article> is a inline-block element (used as column)!