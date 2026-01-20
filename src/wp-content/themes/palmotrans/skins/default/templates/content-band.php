<?php
/**
 * 'Band' template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRUCK
 * @since TRUCK 1.71.0
 */

$truck_template_args = get_query_var( 'truck_template_args' );
if ( ! is_array( $truck_template_args ) ) {
	$truck_template_args = array(
								'type'    => 'band',
								'columns' => 1
								);
}

$truck_columns       = 1;

$truck_expanded      = ! truck_sidebar_present() && truck_get_theme_option( 'expand_content' ) == 'expand';

$truck_post_format   = get_post_format();
$truck_post_format   = empty( $truck_post_format ) ? 'standard' : str_replace( 'post-format-', '', $truck_post_format );

if ( is_array( $truck_template_args ) ) {
	$truck_columns    = empty( $truck_template_args['columns'] ) ? 1 : max( 1, $truck_template_args['columns'] );
	$truck_blog_style = array( $truck_template_args['type'], $truck_columns );
	if ( ! empty( $truck_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $truck_columns > 1 ) {
	    $truck_columns_class = truck_get_column_class( 1, $truck_columns, ! empty( $truck_template_args['columns_tablet']) ? $truck_template_args['columns_tablet'] : '', ! empty($truck_template_args['columns_mobile']) ? $truck_template_args['columns_mobile'] : '' );
				?><div class="<?php echo esc_attr( $truck_columns_class ); ?>"><?php
	}
}
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_band post_format_' . esc_attr( $truck_post_format ) );
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
								: array_map( 'trim', explode( ',', $truck_template_args['meta_parts'] ) )
								)
							: truck_array_get_keys_by_value( truck_get_theme_option( 'meta_parts' ) );
	truck_show_post_featured( apply_filters( 'truck_filter_args_featured',
		array(
			'no_links'   => ! empty( $truck_template_args['no_links'] ),
			'hover'      => $truck_hover,
			'meta_parts' => $truck_components,
			'thumb_bg'   => true,
			'thumb_ratio'   => '1:1',
			'thumb_size' => ! empty( $truck_template_args['thumb_size'] )
								? $truck_template_args['thumb_size']
								: truck_get_thumb_size( 
								in_array( $truck_post_format, array( 'gallery', 'audio', 'video' ) )
									? ( strpos( truck_get_theme_option( 'body_style' ), 'full' ) !== false
										? 'full'
										: ( $truck_expanded 
											? 'big' 
											: 'medium-square'
											)
										)
									: 'masonry-big'
								)
		),
		'content-band',
		$truck_template_args
	) );

	?><div class="post_content_wrap"><?php

		// Title and post meta
		$truck_show_title = get_the_title() != '';
		$truck_show_meta  = count( $truck_components ) > 0 && ! in_array( $truck_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );
		if ( $truck_show_title ) {
			?>
			<div class="post_header entry-header">
				<?php
				// Categories
				if ( apply_filters( 'truck_filter_show_blog_categories', $truck_show_meta && in_array( 'categories', $truck_components ), array( 'categories' ), 'band' ) ) {
					do_action( 'truck_action_before_post_category' );
					?>
					<div class="post_category">
						<?php
						truck_show_post_meta( apply_filters(
															'truck_filter_post_meta_args',
															array(
																'components' => 'categories',
																'seo'        => false,
																'echo'       => true,
																'cat_sep'    => false,
																),
															'hover_' . $truck_hover, 1
															)
											);
						?>
					</div>
					<?php
					$truck_components = truck_array_delete_by_value( $truck_components, 'categories' );
					do_action( 'truck_action_after_post_category' );
				}
				// Post title
				if ( apply_filters( 'truck_filter_show_blog_title', true, 'band' ) ) {
					do_action( 'truck_action_before_post_title' );
					if ( empty( $truck_template_args['no_links'] ) ) {
						the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );
					} else {
						the_title( '<h4 class="post_title entry-title">', '</h4>' );
					}
					do_action( 'truck_action_after_post_title' );
				}
				?>
			</div><!-- .post_header -->
			<?php
		}

		// Post content
		if ( ! isset( $truck_template_args['excerpt_length'] ) && ! in_array( $truck_post_format, array( 'gallery', 'audio', 'video' ) ) ) {
			$truck_template_args['excerpt_length'] = 13;
		}
		if ( apply_filters( 'truck_filter_show_blog_excerpt', empty( $truck_template_args['hide_excerpt'] ) && truck_get_theme_option( 'excerpt_length' ) > 0, 'band' ) ) {
			?>
			<div class="post_content entry-content">
				<?php
				// Post content area
				truck_show_post_content( $truck_template_args, '<div class="post_content_inner">', '</div>' );
				?>
			</div><!-- .entry-content -->
			<?php
		}
		// Post meta
		if ( apply_filters( 'truck_filter_show_blog_meta', $truck_show_meta, $truck_components, 'band' ) ) {
			if ( count( $truck_components ) > 0 ) {
				do_action( 'truck_action_before_post_meta' );
				truck_show_post_meta(
					apply_filters(
						'truck_filter_post_meta_args', array(
							'components' => join( ',', $truck_components ),
							'seo'        => false,
							'echo'       => true,
						), 'band', 1
					)
				);
				do_action( 'truck_action_after_post_meta' );
			}
		}
		// More button
		if ( apply_filters( 'truck_filter_show_blog_readmore', ! $truck_show_title || ! empty( $truck_template_args['more_button'] ), 'band' ) ) {
			if ( empty( $truck_template_args['no_links'] ) ) {
				do_action( 'truck_action_before_post_readmore' );
				truck_show_post_more_link( $truck_template_args, '<div class="more-wrap">', '</div>' );
				do_action( 'truck_action_after_post_readmore' );
			}
		}
		?>
	</div>
</article>
<?php

if ( is_array( $truck_template_args ) ) {
	if ( ! empty( $truck_template_args['slider'] ) || $truck_columns > 1 ) {
		?>
		</div>
		<?php
	}
}