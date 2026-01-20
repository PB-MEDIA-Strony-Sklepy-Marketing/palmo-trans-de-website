<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

$truck_template_args = get_query_var( 'truck_template_args' );
$truck_columns = 1;
if ( is_array( $truck_template_args ) ) {
	$truck_columns    = empty( $truck_template_args['columns'] ) ? 1 : max( 1, $truck_template_args['columns'] );
	$truck_blog_style = array( $truck_template_args['type'], $truck_columns );
	if ( ! empty( $truck_template_args['slider'] ) ) {
		?><div class="slider-slide swiper-slide">
		<?php
	} elseif ( $truck_columns > 1 ) {
	    $truck_columns_class = truck_get_column_class( 1, $truck_columns, ! empty( $truck_template_args['columns_tablet']) ? $truck_template_args['columns_tablet'] : '', ! empty($truck_template_args['columns_mobile']) ? $truck_template_args['columns_mobile'] : '' );
		?>
		<div class="<?php echo esc_attr( $truck_columns_class ); ?>">
		<?php
	}
} else {
	$truck_template_args = array();
}
$truck_expanded    = ! truck_sidebar_present() && truck_get_theme_option( 'expand_content' ) == 'expand';
$truck_post_format = get_post_format();
$truck_post_format = empty( $truck_post_format ) ? 'standard' : str_replace( 'post-format-', '', $truck_post_format );
?>
<article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class( 'post_item post_item_container post_layout_excerpt post_format_' . esc_attr( $truck_post_format ) );
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
			'thumb_size' => ! empty( $truck_template_args['thumb_size'] )
							? $truck_template_args['thumb_size']
							: truck_get_thumb_size( strpos( truck_get_theme_option( 'body_style' ), 'full' ) !== false
								? 'full'
								: ( $truck_expanded 
									? 'huge' 
									: 'big' 
									)
								),
		),
		'content-excerpt',
		$truck_template_args
	) );

	// Title and post meta
	$truck_show_title = get_the_title() != '';
	$truck_show_meta  = count( $truck_components ) > 0 && ! in_array( $truck_hover, array( 'border', 'pull', 'slide', 'fade', 'info' ) );

	if ( $truck_show_title ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			if ( apply_filters( 'truck_filter_show_blog_title', true, 'excerpt' ) ) {
				do_action( 'truck_action_before_post_title' );
				if ( empty( $truck_template_args['no_links'] ) ) {
					the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( '<h3 class="post_title entry-title">', '</h3>' );
				}
				do_action( 'truck_action_after_post_title' );
			}
			?>
		</div><!-- .post_header -->
		<?php
	}

	// Post content
	if ( apply_filters( 'truck_filter_show_blog_excerpt', empty( $truck_template_args['hide_excerpt'] ) && truck_get_theme_option( 'excerpt_length' ) > 0, 'excerpt' ) ) {
		?>
		<div class="post_content entry-content">
			<?php

			// Post meta
			if ( apply_filters( 'truck_filter_show_blog_meta', $truck_show_meta, $truck_components, 'excerpt' ) ) {
				if ( count( $truck_components ) > 0 ) {
					do_action( 'truck_action_before_post_meta' );
					truck_show_post_meta(
						apply_filters(
							'truck_filter_post_meta_args', array(
								'components' => join( ',', $truck_components ),
								'seo'        => false,
								'echo'       => true,
							), 'excerpt', 1
						)
					);
					do_action( 'truck_action_after_post_meta' );
				}
			}

			if ( truck_get_theme_option( 'blog_content' ) == 'fullpost' ) {
				// Post content area
				?>
				<div class="post_content_inner">
					<?php
					do_action( 'truck_action_before_full_post_content' );
					the_content( '' );
					do_action( 'truck_action_after_full_post_content' );
					?>
				</div>
				<?php
				// Inner pages
				wp_link_pages(
					array(
						'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'truck' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'truck' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					)
				);
			} else {
				// Post content area
				truck_show_post_content( $truck_template_args, '<div class="post_content_inner">', '</div>' );
			}

			// More button
			if ( apply_filters( 'truck_filter_show_blog_readmore',  ! isset( $truck_template_args['more_button'] ) || ! empty( $truck_template_args['more_button'] ), 'excerpt' ) ) {
				if ( empty( $truck_template_args['no_links'] ) ) {
					do_action( 'truck_action_before_post_readmore' );
					if ( truck_get_theme_option( 'blog_content' ) != 'fullpost' ) {
						truck_show_post_more_link( $truck_template_args, '<p>', '</p>' );
					} else {
						truck_show_post_comments_link( $truck_template_args, '<p>', '</p>' );
					}
					do_action( 'truck_action_after_post_readmore' );
				}
			}

			?>
		</div><!-- .entry-content -->
		<?php
	}
	?>
</article>
<?php

if ( is_array( $truck_template_args ) ) {
	if ( ! empty( $truck_template_args['slider'] ) || $truck_columns > 1 ) {
		?>
		</div>
		<?php
	}
}
