<?php
/**
 * The template to display default site footer
 *
 * @package TRUCK
 * @since TRUCK 1.0.10
 */

?>
<footer class="footer_wrap footer_default
<?php
$truck_footer_scheme = truck_get_theme_option( 'footer_scheme' );
if ( ! empty( $truck_footer_scheme ) && ! truck_is_inherit( $truck_footer_scheme  ) ) {
	echo ' scheme_' . esc_attr( $truck_footer_scheme );
}
?>
				">
	<?php

	// Footer widgets area
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/footer-widgets' ) );

	// Logo
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/footer-logo' ) );

	// Socials
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/footer-socials' ) );

	// Copyright area
	get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/footer-copyright' ) );

	?>
</footer><!-- /.footer_wrap -->
