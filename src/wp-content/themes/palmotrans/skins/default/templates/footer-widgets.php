<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package TRUCK
 * @since TRUCK 1.0.10
 */

// Footer sidebar
$truck_footer_name    = truck_get_theme_option( 'footer_widgets' );
$truck_footer_present = ! truck_is_off( $truck_footer_name ) && is_active_sidebar( $truck_footer_name );
if ( $truck_footer_present ) {
	truck_storage_set( 'current_sidebar', 'footer' );
	$truck_footer_wide = truck_get_theme_option( 'footer_wide' );
	ob_start();
	if ( is_active_sidebar( $truck_footer_name ) ) {
		dynamic_sidebar( $truck_footer_name );
	}
	$truck_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $truck_out ) ) {
		$truck_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $truck_out );
		$truck_need_columns = true;   //or check: strpos($truck_out, 'columns_wrap')===false;
		if ( $truck_need_columns ) {
			$truck_columns = max( 0, (int) truck_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $truck_columns ) {
				$truck_columns = min( 4, max( 1, truck_tags_count( $truck_out, 'aside' ) ) );
			}
			if ( $truck_columns > 1 ) {
				$truck_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $truck_columns ) . ' widget', $truck_out );
			} else {
				$truck_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo ! empty( $truck_footer_wide ) ? ' footer_fullwidth' : ''; ?> sc_layouts_row sc_layouts_row_type_normal">
			<?php do_action( 'truck_action_before_sidebar_wrap', 'footer' ); ?>
			<div class="footer_widgets_inner widget_area_inner">
				<?php
				if ( ! $truck_footer_wide ) {
					?>
					<div class="content_wrap">
					<?php
				}
				if ( $truck_need_columns ) {
					?>
					<div class="columns_wrap">
					<?php
				}
				do_action( 'truck_action_before_sidebar', 'footer' );
				truck_show_layout( $truck_out );
				do_action( 'truck_action_after_sidebar', 'footer' );
				if ( $truck_need_columns ) {
					?>
					</div><!-- /.columns_wrap -->
					<?php
				}
				if ( ! $truck_footer_wide ) {
					?>
					</div><!-- /.content_wrap -->
					<?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
			<?php do_action( 'truck_action_after_sidebar_wrap', 'footer' ); ?>
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
