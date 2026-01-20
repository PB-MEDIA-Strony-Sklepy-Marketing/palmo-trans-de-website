<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'truck_trx_updater_theme_setup9' ) ) {
	add_action( 'after_setup_theme', 'truck_trx_updater_theme_setup9', 9 );
	function truck_trx_updater_theme_setup9() {
		if ( is_admin() ) {
			add_filter( 'truck_filter_tgmpa_required_plugins', 'truck_trx_updater_tgmpa_required_plugins', 8 );
			add_filter( 'trx_updater_filter_original_theme_slug', 'truck_trx_updater_original_theme_slug' );
		}
	}
}

// Filter to add in the required plugins list
// Priority 8 is used to add this plugin before all other plugins
if ( ! function_exists( 'truck_trx_updater_tgmpa_required_plugins' ) ) {
	//Handler of the add_filter( 'truck_filter_tgmpa_required_plugins',	'truck_trx_updater_tgmpa_required_plugins', 8 );
	function truck_trx_updater_tgmpa_required_plugins( $list = array() ) {
		if ( truck_storage_isset( 'required_plugins', 'trx_updater' ) && truck_storage_get_array( 'required_plugins', 'trx_updater', 'install' ) !== false && truck_is_theme_activated() ) {
			$path = truck_get_plugin_source_path( 'plugins/trx_updater/trx_updater.zip' );
			if ( ! empty( $path ) || truck_get_theme_setting( 'tgmpa_upload' ) ) {
				$list[] = array(
					'name'     => truck_storage_get_array( 'required_plugins', 'trx_updater', 'title' ),
					'slug'     => 'trx_updater',
					'source'   => ! empty( $path ) ? $path : 'upload://trx_updater.zip',
					'version'  => '1.5.2',
					'required' => false,
				);
			}
		}
		return $list;
	}
}

// Check if plugin installed and activated
if ( ! function_exists( 'truck_exists_trx_updater' ) ) {
	function truck_exists_trx_updater() {
		return defined( 'TRX_UPDATER_VERSION' );
	}
}

// Return original theme slug
if ( ! function_exists( 'truck_trx_updater_original_theme_slug' ) ) {
	//Handler of the add_filter( 'trx_updater_filter_original_theme_slug', 'truck_trx_updater_original_theme_slug' );
	function truck_trx_updater_original_theme_slug( $theme_slug ) {
		return apply_filters( 'truck_filter_original_theme_slug', $theme_slug );
	}
}
