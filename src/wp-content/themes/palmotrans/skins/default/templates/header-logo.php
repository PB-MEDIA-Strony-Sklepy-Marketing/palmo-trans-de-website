<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

$truck_args = get_query_var( 'truck_logo_args' );

// Site logo
$truck_logo_type   = isset( $truck_args['type'] ) ? $truck_args['type'] : '';
$truck_logo_image  = truck_get_logo_image( $truck_logo_type );
$truck_logo_text   = truck_is_on( truck_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$truck_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $truck_logo_image['logo'] ) || ! empty( $truck_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $truck_logo_image['logo'] ) ) {
			if ( empty( $truck_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric($truck_logo_image['logo']) && (int) $truck_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$truck_attr = truck_getimagesize( $truck_logo_image['logo'] );
				echo '<img src="' . esc_url( $truck_logo_image['logo'] ) . '"'
						. ( ! empty( $truck_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $truck_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $truck_logo_text ) . '"'
						. ( ! empty( $truck_attr[3] ) ? ' ' . wp_kses_data( $truck_attr[3] ) : '' )
						. '>';
			}
		} else {
			truck_show_layout( truck_prepare_macros( $truck_logo_text ), '<span class="logo_text">', '</span>' );
			truck_show_layout( truck_prepare_macros( $truck_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
