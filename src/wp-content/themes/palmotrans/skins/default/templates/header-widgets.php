<?php
/**
 * The template to display the widgets area in the header
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

// Header sidebar
$truck_header_name    = truck_get_theme_option( 'header_widgets' );
$truck_header_present = ! truck_is_off( $truck_header_name ) && is_active_sidebar( $truck_header_name );
if ( $truck_header_present ) {
	truck_storage_set( 'current_sidebar', 'header' );
	$truck_header_wide = truck_get_theme_option( 'header_wide' );
	ob_start();
	if ( is_active_sidebar( $truck_header_name ) ) {
		dynamic_sidebar( $truck_header_name );
	}
	$truck_widgets_output = ob_get_contents();
	ob_end_clean();
	if ( ! empty( $truck_widgets_output ) ) {
		$truck_widgets_output = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $truck_widgets_output );
		$truck_need_columns   = strpos( $truck_widgets_output, 'columns_wrap' ) === false;
		if ( $truck_need_columns ) {
			$truck_columns = max( 0, (int) truck_get_theme_option( 'header_columns' ) );
			if ( 0 == $truck_columns ) {
				$truck_columns = min( 6, max( 1, truck_tags_count( $truck_widgets_output, 'aside' ) ) );
			}
			if ( $truck_columns > 1 ) {
				$truck_widgets_output = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $truck_columns ) . ' widget', $truck_widgets_output );
			} else {
				$truck_need_columns = false;
			}
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo ! empty( $truck_header_wide ) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<?php do_action( 'truck_action_before_sidebar_wrap', 'header' ); ?>
			<div class="header_widgets_inner widget_area_inner">
				<?php
				if ( ! $truck_header_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $truck_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'truck_action_before_sidebar', 'header' );
				truck_show_layout( $truck_widgets_output );
				do_action( 'truck_action_after_sidebar', 'header' );
				if ( $truck_need_columns ) {
					?>
					</div>	<!-- /.columns_wrap -->
					<?php
				}
				if ( ! $truck_header_wide ) {
					?>
					</div>	<!-- /.content_wrap -->
					<?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
			<?php do_action( 'truck_action_after_sidebar_wrap', 'header' ); ?>
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
