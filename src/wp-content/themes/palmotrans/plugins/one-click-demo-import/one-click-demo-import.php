<?php
/* One Click Demo Import support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'truck_ocdi_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'truck_ocdi_theme_setup9', 9 );
	function truck_ocdi_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'truck_filter_tgmpa_required_plugins', 'truck_ocdi_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( ! function_exists( 'truck_ocdi_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter('truck_filter_tgmpa_required_plugins',	'truck_ocdi_tgmpa_required_plugins');
	function truck_ocdi_tgmpa_required_plugins( $list = array() ) {
		if ( truck_storage_isset( 'required_plugins', 'one-click-demo-import' ) && truck_storage_get_array( 'required_plugins', 'one-click-demo-import', 'install' ) !== false ) {
			$list[] = array(
				'name'     => truck_storage_get_array( 'required_plugins', 'one-click-demo-import', 'title' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			);
		}
		return $list;
	}
}

// Check if plugin is installed and activated
if ( ! function_exists( 'truck_exists_ocdi' ) ) {
	function truck_exists_ocdi() {
		return class_exists( 'OCDI_Plugin' );
	}
}

