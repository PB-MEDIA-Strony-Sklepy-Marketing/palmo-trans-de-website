<?php
/**
 * The custom template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRUCK
 * @since TRUCK 1.0.50
 */

$truck_template_args = get_query_var( 'truck_template_args' );
if ( is_array( $truck_template_args ) ) {
	$truck_columns    = empty( $truck_template_args['columns'] ) ? 2 : max( 1, $truck_template_args['columns'] );
	$truck_blog_style = array( $truck_template_args['type'], $truck_columns );
} else {
	$truck_template_args = array();
	$truck_blog_style = explode( '_', truck_get_theme_option( 'blog_style' ) );
	$truck_columns    = empty( $truck_blog_style[1] ) ? 2 : max( 1, $truck_blog_style[1] );
}
$truck_blog_id       = truck_get_custom_blog_id( join( '_', $truck_blog_style ) );
$truck_blog_style[0] = str_replace( 'blog-custom-', '', $truck_blog_style[0] );
$truck_expanded      = ! truck_sidebar_present() && truck_get_theme_option( 'expand_content' ) == 'expand';
$truck_components    = ! empty( $truck_template_args['meta_parts'] )
							? ( is_array( $truck_template_args['meta_parts'] )
								? join( ',', $truck_template_args['meta_parts'] )
								: $truck_template_args['meta_parts']
								)
							: truck_array_get_keys_by_value( truck_get_theme_option( 'meta_parts' ) );
$truck_post_format   = get_post_format();
$truck_post_format   = empty( $truck_post_format ) ? 'standard' : str_replace( 'post-format-', '', $truck_post_format );

$truck_blog_meta     = truck_get_custom_layout_meta( $truck_blog_id );
$truck_custom_style  = ! empty( $truck_blog_meta['scripts_required'] ) ? $truck_blog_meta['scripts_required'] : 'none';

if ( ! empty( $truck_template_args['slider'] ) || $truck_columns > 1 || ! truck_is_off( $truck_custom_style ) ) {
	?><div class="
		<?php
		if ( ! empty( $truck_template_args['slider'] ) ) {
			echo 'slider-slide swiper-slide';
		} else {
			echo esc_attr( ( truck_is_off( $truck_custom_style ) ? 'column' : sprintf( '%1$s_item %1$s_item', $truck_custom_style ) ) . "-1_{$truck_columns}" );
		}
		?>
	">
	<?php
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
			'post_item post_item_container post_format_' . esc_attr( $truck_post_format )
					. ' post_layout_custom post_layout_custom_' . esc_attr( $truck_columns )
					. ' post_layout_' . esc_attr( $truck_blog_style[0] )
					. ' post_layout_' . esc_attr( $truck_blog_style[0] ) . '_' . esc_attr( $truck_columns )
					. ( ! truck_is_off( $truck_custom_style )
						? ' post_layout_' . esc_attr( $truck_custom_style )
							. ' post_layout_' . esc_attr( $truck_custom_style ) . '_' . esc_attr( $truck_columns )
						: ''
						)
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
	// Custom layout
	do_action( 'truck_action_show_layout', $truck_blog_id, get_the_ID() );
	?>
</article><?php
if ( ! empty( $truck_template_args['slider'] ) || $truck_columns > 1 || ! truck_is_off( $truck_custom_style ) ) {
	?></div><?php
	// Need opening PHP-tag above just after </div>, because <div> is a inline-block element (used as column)!
}
