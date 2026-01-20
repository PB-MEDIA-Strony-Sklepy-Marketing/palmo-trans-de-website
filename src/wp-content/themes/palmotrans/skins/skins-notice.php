<?php
/**
 * The template to display Admin notices
 *
 * @package TRUCK
 * @since TRUCK 1.0.64
 */

$truck_skins_url  = get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_skins' );
$truck_skins_args = get_query_var( 'truck_skins_notice_args' );
?>
<div class="truck_admin_notice truck_skins_notice notice notice-info is-dismissible" data-notice="skins">
	<?php
	// Theme image
	$truck_theme_img = truck_get_file_url( 'screenshot.jpg' );
	if ( '' != $truck_theme_img ) {
		?>
		<div class="truck_notice_image"><img src="<?php echo esc_url( $truck_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'truck' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="truck_notice_title">
		<?php esc_html_e( 'New skins are available', 'truck' ); ?>
	</h3>
	<?php

	// Description
	$truck_total      = $truck_skins_args['update'];	// Store value to the separate variable to avoid warnings from ThemeCheck plugin!
	$truck_skins_msg  = $truck_total > 0
							// Translators: Add new skins number
							? '<strong>' . sprintf( _n( '%d new version', '%d new versions', $truck_total, 'truck' ), $truck_total ) . '</strong>'
							: '';
	$truck_total      = $truck_skins_args['free'];
	$truck_skins_msg .= $truck_total > 0
							? ( ! empty( $truck_skins_msg ) ? ' ' . esc_html__( 'and', 'truck' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d free skin', '%d free skins', $truck_total, 'truck' ), $truck_total ) . '</strong>'
							: '';
	$truck_total      = $truck_skins_args['pay'];
	$truck_skins_msg .= $truck_skins_args['pay'] > 0
							? ( ! empty( $truck_skins_msg ) ? ' ' . esc_html__( 'and', 'truck' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d paid skin', '%d paid skins', $truck_total, 'truck' ), $truck_total ) . '</strong>'
							: '';
	?>
	<div class="truck_notice_text">
		<p>
			<?php
			// Translators: Add new skins info
			echo wp_kses_data( sprintf( __( "We are pleased to announce that %s are available for your theme", 'truck' ), $truck_skins_msg ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="truck_notice_buttons">
		<?php
		// Link to the theme dashboard page
		?>
		<a href="<?php echo esc_url( $truck_skins_url ); ?>" class="button button-primary"><i class="dashicons dashicons-update"></i> 
			<?php
			// Translators: Add theme name
			esc_html_e( 'Go to Skins manager', 'truck' );
			?>
		</a>
	</div>
</div>
