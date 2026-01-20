<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package TRUCK
 * @since TRUCK 1.0.06
 */

$truck_header_css   = '';
$truck_header_image = get_header_image();
$truck_header_video = truck_get_header_video();
if ( ! empty( $truck_header_image ) && truck_trx_addons_featured_image_override( is_singular() || truck_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$truck_header_image = truck_get_current_mode_image( $truck_header_image );
}

$truck_header_id = truck_get_custom_header_id();
$truck_header_meta = get_post_meta( $truck_header_id, 'trx_addons_options', true );
if ( ! empty( $truck_header_meta['margin'] ) ) {
	truck_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( truck_prepare_css_value( $truck_header_meta['margin'] ) ) ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $truck_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $truck_header_id ) ) ); ?>
				<?php
				echo ! empty( $truck_header_image ) || ! empty( $truck_header_video )
					? ' with_bg_image'
					: ' without_bg_image';
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

	// Custom header's layout
	do_action( 'truck_action_show_layout', $truck_header_id );

	// Header widgets area
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-widgets' ) );

	?>
</header>
