<?php
/**
 * The template to display the socials in the footer
 *
 * @package TRUCK
 * @since TRUCK 1.0.10
 */


// Socials
if ( truck_is_on( truck_get_theme_option( 'socials_in_footer' ) ) ) {
	$truck_output = truck_get_socials_links();
	if ( '' != $truck_output ) {
		?>
		<div class="footer_socials_wrap socials_wrap">
			<div class="footer_socials_inner">
				<?php truck_show_layout( $truck_output ); ?>
			</div>
		</div>
		<?php
	}
}
