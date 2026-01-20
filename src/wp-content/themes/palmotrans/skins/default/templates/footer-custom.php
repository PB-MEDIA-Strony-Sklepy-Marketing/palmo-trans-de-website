<?php
/**
 * The template to display default site footer
 *
 * @package TRUCK
 * @since TRUCK 1.0.10
 */

$truck_footer_id = truck_get_custom_footer_id();
$truck_footer_meta = get_post_meta( $truck_footer_id, 'trx_addons_options', true );
if ( ! empty( $truck_footer_meta['margin'] ) ) {
	truck_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( truck_prepare_css_value( $truck_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $truck_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $truck_footer_id ) ) ); ?>
						<?php
						$truck_footer_scheme = truck_get_theme_option( 'footer_scheme' );
						if ( ! empty( $truck_footer_scheme ) && ! truck_is_inherit( $truck_footer_scheme  ) ) {
							echo ' scheme_' . esc_attr( $truck_footer_scheme );
						}
						?>
						">
	<?php
	// Custom footer's layout
	do_action( 'truck_action_show_layout', $truck_footer_id );
	?>
</footer><!-- /.footer_wrap -->
