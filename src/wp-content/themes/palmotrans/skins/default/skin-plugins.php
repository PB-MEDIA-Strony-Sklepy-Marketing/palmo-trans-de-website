<?php
/**
 * Required plugins
 *
 * @package TRUCK
 * @since TRUCK 1.76.0
 */

// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
$truck_theme_required_plugins_groups = array(
	'core'          => esc_html__( 'Core', 'truck' ),
	'page_builders' => esc_html__( 'Page Builders', 'truck' ),
	'ecommerce'     => esc_html__( 'E-Commerce & Donations', 'truck' ),
	'socials'       => esc_html__( 'Socials and Communities', 'truck' ),
	'events'        => esc_html__( 'Events and Appointments', 'truck' ),
	'content'       => esc_html__( 'Content', 'truck' ),
	'other'         => esc_html__( 'Other', 'truck' ),
);
$truck_theme_required_plugins        = array(
	'trx_addons'                 => array(
		'title'       => esc_html__( 'ThemeREX Addons', 'truck' ),
		'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'truck' ),
		'required'    => true,
		'logo'        => 'trx_addons.png',
		'group'       => $truck_theme_required_plugins_groups['core'],
	),
	'elementor'                  => array(
		'title'       => esc_html__( 'Elementor', 'truck' ),
		'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'truck' ),
		'required'    => false,
		'logo'        => 'elementor.png',
		'group'       => $truck_theme_required_plugins_groups['page_builders'],
	),
	'gutenberg'                  => array(
		'title'       => esc_html__( 'Gutenberg', 'truck' ),
		'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'truck' ),
		'required'    => false,
		'install'     => false,          // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'gutenberg.png',
		'group'       => $truck_theme_required_plugins_groups['page_builders'],
	),
	'js_composer'                => array(
		'title'       => esc_html__( 'WPBakery PageBuilder', 'truck' ),
		'description' => esc_html__( "Popular PageBuilder which allows you to create excellent pages", 'truck' ),
		'required'    => false,
		'install'     => false,          // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'js_composer.jpg',
		'group'       => $truck_theme_required_plugins_groups['page_builders'],
	),
	'woocommerce'                => array(
		'title'       => esc_html__( 'WooCommerce', 'truck' ),
		'description' => esc_html__( "Connect the store to your website and start selling now", 'truck' ),
		'required'    => false,
		'logo'        => 'woocommerce.png',
		'group'       => $truck_theme_required_plugins_groups['ecommerce'],
	),
	'elegro-payment'             => array(
		'title'       => esc_html__( 'Elegro Crypto Payment', 'truck' ),
		'description' => esc_html__( "Extends WooCommerce Payment Gateways with an elegro Crypto Payment", 'truck' ),
		'required'    => false,
		'install'     => false, // TRX_addons has marked the "Elegro Crypto Payment" plugin as obsolete and no longer recommends it for installation, even if it had been previously recommended by the theme
		'logo'        => 'elegro-payment.png',
		'group'       => $truck_theme_required_plugins_groups['ecommerce'],
	),
	'm-chart'              => array(
		'title'       => esc_html__( 'M Chart', 'truck' ),
		'description' => '',
		'required'    => false,
		'logo'        => truck_get_file_url( 'plugins/m-chart/m-chart.png' ),
		'group'       => $truck_theme_required_plugins_groups['other'],
	),
	'm-chart-highcharts-library'              => array(
		'title'       => esc_html__( 'M Chart Highcharts Library', 'truck' ),
		'description' => '',
		'required'    => false,
		'logo'        => truck_get_file_url( 'plugins/m-chart/m-chart.png' ),
		'group'       => $truck_theme_required_plugins_groups['other'],
	),
	'instagram-feed'             => array(
		'title'       => esc_html__( 'Instagram Feed', 'truck' ),
		'description' => esc_html__( "Displays the latest photos from your profile on Instagram", 'truck' ),
		'required'    => false,
		'logo'        => 'instagram-feed.png',
		'group'       => $truck_theme_required_plugins_groups['socials'],
	),
	'mailchimp-for-wp'           => array(
		'title'       => esc_html__( 'MailChimp for WP', 'truck' ),
		'description' => esc_html__( "Allows visitors to subscribe to newsletters", 'truck' ),
		'required'    => false,
		'logo'        => 'mailchimp-for-wp.png',
		'group'       => $truck_theme_required_plugins_groups['socials'],
	),
	'booked'                     => array(
		'title'       => esc_html__( 'Booked Appointments', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => 'booked.png',
		'group'       => $truck_theme_required_plugins_groups['events'],
	),
	'quickcal'                     => array(
		'title'       => esc_html__( 'QuickCal', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => 'quickcal.png',
		'group'       => $truck_theme_required_plugins_groups['events'],
	),
	'the-events-calendar'        => array(
		'title'       => esc_html__( 'The Events Calendar', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => 'the-events-calendar.png',
		'group'       => $truck_theme_required_plugins_groups['events'],
	),
	'contact-form-7'             => array(
		'title'       => esc_html__( 'Contact Form 7', 'truck' ),
		'description' => esc_html__( "CF7 allows you to create an unlimited number of contact forms", 'truck' ),
		'required'    => false,
		'logo'        => 'contact-form-7.png',
		'group'       => $truck_theme_required_plugins_groups['content'],
	),

	'latepoint'                  => array(
		'title'       => esc_html__( 'LatePoint', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => truck_get_file_url( 'plugins/latepoint/latepoint.png' ),
		'group'       => $truck_theme_required_plugins_groups['events'],
	),
	'advanced-popups'                  => array(
		'title'       => esc_html__( 'Advanced Popups', 'truck' ),
		'description' => '',
		'required'    => false,
		'logo'        => truck_get_file_url( 'plugins/advanced-popups/advanced-popups.jpg' ),
		'group'       => $truck_theme_required_plugins_groups['content'],
	),
	'devvn-image-hotspot'                  => array(
		'title'       => esc_html__( 'Image Hotspot by DevVN', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => truck_get_file_url( 'plugins/devvn-image-hotspot/devvn-image-hotspot.png' ),
		'group'       => $truck_theme_required_plugins_groups['content'],
	),
	'ti-woocommerce-wishlist'                  => array(
		'title'       => esc_html__( 'TI WooCommerce Wishlist', 'truck' ),
		'description' => '',
		'required'    => false,
		'logo'        => truck_get_file_url( 'plugins/ti-woocommerce-wishlist/ti-woocommerce-wishlist.png' ),
		'group'       => $truck_theme_required_plugins_groups['ecommerce'],
	),
	'woo-smart-quick-view'                  => array(
		'title'       => esc_html__( 'WPC Smart Quick View for WooCommerce', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => truck_get_file_url( 'plugins/woo-smart-quick-view/woo-smart-quick-view.png' ),
		'group'       => $truck_theme_required_plugins_groups['ecommerce'],
	),
	'twenty20'                  => array(
		'title'       => esc_html__( 'Twenty20 Image Before-After', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false, 
		'logo'        => truck_get_file_url( 'plugins/twenty20/twenty20.png' ),
		'group'       => $truck_theme_required_plugins_groups['content'],
	),
	'essential-grid'             => array(
		'title'       => esc_html__( 'Essential Grid', 'truck' ),
		'description' => '',
		'required'    => false,
		'install'     => false,
		'logo'        => 'essential-grid.png',
		'group'       => $truck_theme_required_plugins_groups['content'],
	),
	'revslider'                  => array(
		'title'       => esc_html__( 'Revolution Slider', 'truck' ),
		'description' => '',
		'required'    => false,
		'logo'        => 'revslider.png',
		'group'       => $truck_theme_required_plugins_groups['content'],
	),
	'sitepress-multilingual-cms' => array(
		'title'       => esc_html__( 'WPML - Sitepress Multilingual CMS', 'truck' ),
		'description' => esc_html__( "Allows you to make your website multilingual", 'truck' ),
		'required'    => false,
		'install'     => false,      // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
		'logo'        => 'sitepress-multilingual-cms.png',
		'group'       => $truck_theme_required_plugins_groups['content'],
	),
	'wp-gdpr-compliance'         => array(
		'title'       => esc_html__( 'Cookie Information', 'truck' ),
		'description' => esc_html__( "Allow visitors to decide for themselves what personal data they want to store on your site", 'truck' ),
		'required'    => false,
		'install'     => false,
		'logo'        => 'wp-gdpr-compliance.png',
		'group'       => $truck_theme_required_plugins_groups['other'],
	),
	'gdpr-framework'         => array(
		'title'       => esc_html__( 'The GDPR Framework', 'truck' ),
		'description' => esc_html__( "Tools to help make your website GDPR-compliant. Fully documented, extendable and developer-friendly.", 'truck' ),
		'required'    => false,
		'install'     => false,
		'logo'        => 'gdpr-framework.png',
		'group'       => $truck_theme_required_plugins_groups['other'],
	),
	'trx_updater'                => array(
		'title'       => esc_html__( 'ThemeREX Updater', 'truck' ),
		'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'truck' ),
		'required'    => false,
		'logo'        => 'trx_updater.png',
		'group'       => $truck_theme_required_plugins_groups['other'],
	),
);

if ( TRUCK_THEME_FREE ) {
	unset( $truck_theme_required_plugins['js_composer'] );
	unset( $truck_theme_required_plugins['booked'] );
	unset( $truck_theme_required_plugins['quickcal'] );
	unset( $truck_theme_required_plugins['the-events-calendar'] );
	unset( $truck_theme_required_plugins['calculated-fields-form'] );
	unset( $truck_theme_required_plugins['essential-grid'] );
	unset( $truck_theme_required_plugins['revslider'] );
	unset( $truck_theme_required_plugins['sitepress-multilingual-cms'] );
	unset( $truck_theme_required_plugins['trx_updater'] );
	unset( $truck_theme_required_plugins['trx_popup'] );
}

// Add plugins list to the global storage
truck_storage_set( 'required_plugins', $truck_theme_required_plugins );
