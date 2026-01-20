<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

if ( truck_sidebar_present() ) {
	
	$truck_sidebar_type = truck_get_theme_option( 'sidebar_type' );
	if ( 'custom' == $truck_sidebar_type && ! truck_is_layouts_available() ) {
		$truck_sidebar_type = 'default';
	}
	
	// Catch output to the buffer
	ob_start();
	if ( 'default' == $truck_sidebar_type ) {
		// Default sidebar with widgets
		$truck_sidebar_name = truck_get_theme_option( 'sidebar_widgets' );
		truck_storage_set( 'current_sidebar', 'sidebar' );
		if ( is_active_sidebar( $truck_sidebar_name ) ) {
			dynamic_sidebar( $truck_sidebar_name );
		}
	} else {
		// Custom sidebar from Layouts Builder
		$truck_sidebar_id = truck_get_custom_sidebar_id();
		do_action( 'truck_action_show_layout', $truck_sidebar_id );
	}
	$truck_out = trim( ob_get_contents() );
	ob_end_clean();
	
	// If any html is present - display it
	if ( ! empty( $truck_out ) ) {
		$truck_sidebar_position    = truck_get_theme_option( 'sidebar_position' );
		$truck_sidebar_position_ss = truck_get_theme_option( 'sidebar_position_ss', 'below' );
		?>
		<div class="sidebar widget_area
			<?php
			echo ' ' . esc_attr( $truck_sidebar_position );
			echo ' sidebar_' . esc_attr( $truck_sidebar_position_ss );
			echo ' sidebar_' . esc_attr( $truck_sidebar_type );

			$truck_sidebar_scheme = apply_filters( 'truck_filter_sidebar_scheme', truck_get_theme_option( 'sidebar_scheme', 'inherit' ) );
			if ( ! empty( $truck_sidebar_scheme ) && ! truck_is_inherit( $truck_sidebar_scheme ) && 'custom' != $truck_sidebar_type ) {
				echo ' scheme_' . esc_attr( $truck_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php

			// Skip link anchor to fast access to the sidebar from keyboard
			?>
			<a id="sidebar_skip_link_anchor" class="truck_skip_link_anchor" href="#"></a>
			<?php

			do_action( 'truck_action_before_sidebar_wrap', 'sidebar' );

			// Button to show/hide sidebar on mobile
			if ( in_array( $truck_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$truck_title = apply_filters( 'truck_filter_sidebar_control_title', 'float' == $truck_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'truck' ) : '' );
				$truck_text  = apply_filters( 'truck_filter_sidebar_control_text', 'above' == $truck_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'truck' ) : '' );
				?>
				<a href="#" class="sidebar_control" title="<?php echo esc_attr( $truck_title ); ?>"><?php echo esc_html( $truck_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'truck_action_before_sidebar', 'sidebar' );
				truck_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $truck_out ) );
				do_action( 'truck_action_after_sidebar', 'sidebar' );
				?>
			</div>
			<?php

			do_action( 'truck_action_after_sidebar_wrap', 'sidebar' );

			?>
		</div>
		<div class="clearfix"></div>
		<?php
	}
}
