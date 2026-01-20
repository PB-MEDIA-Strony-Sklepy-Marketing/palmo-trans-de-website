<?php
/**
 * The default template to displaying related posts
 *
 * @package TRUCK
 * @since TRUCK 1.0.54
 */

$truck_link        = get_permalink();
$truck_post_format = get_post_format();
$truck_post_format = empty( $truck_post_format ) ? 'standard' : str_replace( 'post-format-', '', $truck_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $truck_post_format ) ); ?> data-post-id="<?php the_ID(); ?>">
	<?php
	truck_show_post_featured(
		array(
			'thumb_size' => apply_filters( 'truck_filter_related_thumb_size', truck_get_thumb_size( (int) truck_get_theme_option( 'related_posts' ) == 1 ? 'huge' : 'big' ) ),
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $truck_link ); ?>"><?php
			if ( '' == get_the_title() ) {
				esc_html_e( '- No title -', 'truck' );
			} else {
				the_title();
			}
		?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<span class="post_date"><a href="<?php echo esc_url( $truck_link ); ?>"><?php echo wp_kses_data( truck_get_date() ); ?></a></span>
			<?php
		}
		?>
	</div>
</div>
