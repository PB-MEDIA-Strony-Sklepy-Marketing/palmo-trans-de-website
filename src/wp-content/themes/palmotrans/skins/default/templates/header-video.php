<?php
/**
 * The template to display the background video in the header
 *
 * @package TRUCK
 * @since TRUCK 1.0.14
 */
$truck_header_video = truck_get_header_video();
$truck_embed_video  = '';
if ( ! empty( $truck_header_video ) && ! truck_is_from_uploads( $truck_header_video ) ) {
	if ( truck_is_youtube_url( $truck_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $truck_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php truck_show_layout( truck_get_embed_video( $truck_header_video ) ); ?></div>
		<?php
	}
}
