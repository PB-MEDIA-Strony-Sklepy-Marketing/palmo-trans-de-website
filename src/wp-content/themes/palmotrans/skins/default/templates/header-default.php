<?php
/**
 * The template to display default site header
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

$truck_header_css   = '';
$truck_header_image = get_header_image();
$truck_header_video = truck_get_header_video();
if ( ! empty( $truck_header_image ) && truck_trx_addons_featured_image_override( is_singular() || truck_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$truck_header_image = truck_get_current_mode_image( $truck_header_image );
}

?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $truck_header_image ) || ! empty( $truck_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $truck_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $truck_header_image ) {
		echo ' ' . esc_attr( truck_add_inline_css_class( 'background-image: url(' . esc_url( $truck_header_image ) . ');' ) );
	}
	if ( is_single() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	if ( truck_is_on( truck_get_theme_option( 'header_fullheight' ) ) ) {
		echo ' header_fullheight truck-full-height';
	}
	$truck_header_scheme = truck_get_theme_option( 'header_scheme' );
	if ( ! empty( $truck_header_scheme ) && ! truck_is_inherit( $truck_header_scheme  ) ) {
		echo ' scheme_' . esc_attr( $truck_header_scheme );
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $truck_header_video ) ) {
		get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-navi' ) );

	// Mobile header
	if ( truck_is_on( truck_get_theme_option( 'header_mobile_enabled' ) ) ) {
		get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-mobile' ) );
	}

	// Page title and breadcrumbs area
	if ( ! is_single() ) {
		get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-title' ) );
	}

	// Header widgets area
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-widgets' ) );
	?>
</header>
