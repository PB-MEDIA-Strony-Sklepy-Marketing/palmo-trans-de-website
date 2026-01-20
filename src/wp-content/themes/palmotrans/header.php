<?php
/**
 * The Header: Logo and main menu
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js<?php
	// Class scheme_xxx need in the <html> as context for the <body>!
	echo ' scheme_' . esc_attr( truck_get_theme_option( 'color_scheme' ) );
?>">

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
	do_action( 'truck_action_before_body' );
	?>

	<div class="<?php echo esc_attr( apply_filters( 'truck_filter_body_wrap_class', 'body_wrap' ) ); ?>" <?php do_action('truck_action_body_wrap_attributes'); ?>>

		<?php do_action( 'truck_action_before_page_wrap' ); ?>

		<div class="<?php echo esc_attr( apply_filters( 'truck_filter_page_wrap_class', 'page_wrap' ) ); ?>" <?php do_action('truck_action_page_wrap_attributes'); ?>>

			<?php do_action( 'truck_action_page_wrap_start' ); ?>

			<?php
			$truck_full_post_loading = ( truck_is_singular( 'post' ) || truck_is_singular( 'attachment' ) ) && truck_get_value_gp( 'action' ) == 'full_post_loading';
			$truck_prev_post_loading = ( truck_is_singular( 'post' ) || truck_is_singular( 'attachment' ) ) && truck_get_value_gp( 'action' ) == 'prev_post_loading';

			// Don't display the header elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ! $truck_full_post_loading && ! $truck_prev_post_loading ) {

				// Short links to fast access to the content, sidebar and footer from the keyboard
				?>
				<a class="truck_skip_link skip_to_content_link" href="#content_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'truck_filter_skip_links_tabindex', 1 ) ); ?>"><?php esc_html_e( "Skip to content", 'truck' ); ?></a>
				<?php if ( truck_sidebar_present() ) { ?>
				<a class="truck_skip_link skip_to_sidebar_link" href="#sidebar_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'truck_filter_skip_links_tabindex', 1 ) ); ?>"><?php esc_html_e( "Skip to sidebar", 'truck' ); ?></a>
				<?php } ?>
				<a class="truck_skip_link skip_to_footer_link" href="#footer_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'truck_filter_skip_links_tabindex', 1 ) ); ?>"><?php esc_html_e( "Skip to footer", 'truck' ); ?></a>

				<?php
				do_action( 'truck_action_before_header' );

				// Header
				$truck_header_type = truck_get_theme_option( 'header_type' );
				if ( 'custom' == $truck_header_type && ! truck_is_layouts_available() ) {
					$truck_header_type = 'default';
				}
				get_template_part( apply_filters( 'truck_filter_get_template_part', "templates/header-" . sanitize_file_name( $truck_header_type ) ) );

				// Side menu
				if ( in_array( truck_get_theme_option( 'menu_side', 'none' ), array( 'left', 'right' ) ) ) {
					get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-navi-side' ) );
				}

				// Mobile menu
				if ( apply_filters( 'truck_filter_use_navi_mobile', true ) ) {
					get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/header-navi-mobile' ) );
				}

				do_action( 'truck_action_after_header' );

			}
			?>

			<?php do_action( 'truck_action_before_page_content_wrap' ); ?>

			<div class="page_content_wrap<?php
				if ( truck_is_off( truck_get_theme_option( 'remove_margins' ) ) ) {
					if ( empty( $truck_header_type ) ) {
						$truck_header_type = truck_get_theme_option( 'header_type' );
					}
					if ( 'custom' == $truck_header_type && truck_is_layouts_available() ) {
						$truck_header_id = truck_get_custom_header_id();
						if ( $truck_header_id > 0 ) {
							$truck_header_meta = truck_get_custom_layout_meta( $truck_header_id );
							if ( ! empty( $truck_header_meta['margin'] ) ) {
								?> page_content_wrap_custom_header_margin<?php
							}
						}
					}
					$truck_footer_type = truck_get_theme_option( 'footer_type' );
					if ( 'custom' == $truck_footer_type && truck_is_layouts_available() ) {
						$truck_footer_id = truck_get_custom_footer_id();
						if ( $truck_footer_id ) {
							$truck_footer_meta = truck_get_custom_layout_meta( $truck_footer_id );
							if ( ! empty( $truck_footer_meta['margin'] ) ) {
								?> page_content_wrap_custom_footer_margin<?php
							}
						}
					}
				}
				do_action( 'truck_action_page_content_wrap_class', $truck_prev_post_loading );
				?>"<?php
				if ( apply_filters( 'truck_filter_is_prev_post_loading', $truck_prev_post_loading ) ) {
					?> data-single-style="<?php echo esc_attr( truck_get_theme_option( 'single_style' ) ); ?>"<?php
				}
				do_action( 'truck_action_page_content_wrap_data', $truck_prev_post_loading );
			?>>
				<?php
				do_action( 'truck_action_page_content_wrap', $truck_full_post_loading || $truck_prev_post_loading );

				// Single posts banner
				if ( apply_filters( 'truck_filter_single_post_header', truck_is_singular( 'post' ) || truck_is_singular( 'attachment' ) ) ) {
					if ( $truck_prev_post_loading ) {
						if ( truck_get_theme_option( 'posts_navigation_scroll_which_block', 'article' ) != 'article' ) {
							do_action( 'truck_action_between_posts' );
						}
					}
					// Single post thumbnail and title
					$truck_path = apply_filters( 'truck_filter_get_template_part', 'templates/single-styles/' . truck_get_theme_option( 'single_style' ) );
					if ( truck_get_file_dir( $truck_path . '.php' ) != '' ) {
						get_template_part( $truck_path );
					}
				}

				// Widgets area above page
				$truck_body_style   = truck_get_theme_option( 'body_style' );
				$truck_widgets_name = truck_get_theme_option( 'widgets_above_page', 'hide' );
				$truck_show_widgets = ! truck_is_off( $truck_widgets_name ) && is_active_sidebar( $truck_widgets_name );
				if ( $truck_show_widgets ) {
					if ( 'fullscreen' != $truck_body_style ) {
						?>
						<div class="content_wrap">
							<?php
					}
					truck_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $truck_body_style ) {
						?>
						</div>
						<?php
					}
				}

				// Content area
				do_action( 'truck_action_before_content_wrap' );
				?>
				<div class="content_wrap<?php echo 'fullscreen' == $truck_body_style ? '_fullscreen' : ''; ?>">

					<?php do_action( 'truck_action_content_wrap_start' ); ?>

					<div class="content">
						<?php
						do_action( 'truck_action_page_content_start' );

						// Skip link anchor to fast access to the content from keyboard
						?>
						<a id="content_skip_link_anchor" class="truck_skip_link_anchor" href="#"></a>
						<?php
						// Single posts banner between prev/next posts
						if ( ( truck_is_singular( 'post' ) || truck_is_singular( 'attachment' ) )
							&& $truck_prev_post_loading 
							&& truck_get_theme_option( 'posts_navigation_scroll_which_block', 'article' ) == 'article'
						) {
							do_action( 'truck_action_between_posts' );
						}

						// Widgets area above content
						truck_create_widgets_area( 'widgets_above_content' );

						do_action( 'truck_action_page_content_start_text' );
