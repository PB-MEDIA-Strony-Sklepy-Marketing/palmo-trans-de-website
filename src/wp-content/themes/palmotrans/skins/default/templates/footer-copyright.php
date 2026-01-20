<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package TRUCK
 * @since TRUCK 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap
<?php
$truck_copyright_scheme = truck_get_theme_option( 'copyright_scheme' );
if ( ! empty( $truck_copyright_scheme ) && ! truck_is_inherit( $truck_copyright_scheme  ) ) {
	echo ' scheme_' . esc_attr( $truck_copyright_scheme );
}
?>
				">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text">
			<?php
				$truck_copyright = truck_get_theme_option( 'copyright' );
			if ( ! empty( $truck_copyright ) ) {
				// Replace {{Y}} or {Y} with the current year
				$truck_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $truck_copyright );
				// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
				$truck_copyright = truck_prepare_macros( $truck_copyright );
				// Display copyright
				echo wp_kses( nl2br( $truck_copyright ), 'truck_kses_content' );
			}
			?>
			</div>
		</div>
	</div>
</div>
