<div class="front_page_section front_page_section_about<?php
	$truck_scheme = truck_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $truck_scheme ) && ! truck_is_inherit( $truck_scheme ) ) {
		echo ' scheme_' . esc_attr( $truck_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( truck_get_theme_option( 'front_page_about_paddings' ) );
	if ( truck_get_theme_option( 'front_page_about_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$truck_css      = '';
		$truck_bg_image = truck_get_theme_option( 'front_page_about_bg_image' );
		if ( ! empty( $truck_bg_image ) ) {
			$truck_css .= 'background-image: url(' . esc_url( truck_get_attachment_url( $truck_bg_image ) ) . ');';
		}
		if ( ! empty( $truck_css ) ) {
			echo ' style="' . esc_attr( $truck_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$truck_anchor_icon = truck_get_theme_option( 'front_page_about_anchor_icon' );
	$truck_anchor_text = truck_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $truck_anchor_icon ) || ! empty( $truck_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $truck_anchor_icon ) ? ' icon="' . esc_attr( $truck_anchor_icon ) . '"' : '' )
									. ( ! empty( $truck_anchor_text ) ? ' title="' . esc_attr( $truck_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( truck_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' truck-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$truck_css           = '';
			$truck_bg_mask       = truck_get_theme_option( 'front_page_about_bg_mask' );
			$truck_bg_color_type = truck_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $truck_bg_color_type ) {
				$truck_bg_color = truck_get_theme_option( 'front_page_about_bg_color' );
			} elseif ( 'scheme_bg_color' == $truck_bg_color_type ) {
				$truck_bg_color = truck_get_scheme_color( 'bg_color', $truck_scheme );
			} else {
				$truck_bg_color = '';
			}
			if ( ! empty( $truck_bg_color ) && $truck_bg_mask > 0 ) {
				$truck_css .= 'background-color: ' . esc_attr(
					1 == $truck_bg_mask ? $truck_bg_color : truck_hex2rgba( $truck_bg_color, $truck_bg_mask )
				) . ';';
			}
			if ( ! empty( $truck_css ) ) {
				echo ' style="' . esc_attr( $truck_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap content_wrap">
			<?php
			// Caption
			$truck_caption = truck_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $truck_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $truck_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $truck_caption, 'truck_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$truck_description = truck_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $truck_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $truck_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $truck_description ), 'truck_kses_content' ); ?></div>
				<?php
			}

			// Content
			$truck_content = truck_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $truck_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $truck_content ) ? 'filled' : 'empty'; ?>">
					<?php
					$truck_page_content_mask = '%%CONTENT%%';
					if ( strpos( $truck_content, $truck_page_content_mask ) !== false ) {
						$truck_content = preg_replace(
							'/(\<p\>\s*)?' . $truck_page_content_mask . '(\s*\<\/p\>)/i',
							sprintf(
								'<div class="front_page_section_about_source">%s</div>',
								apply_filters( 'the_content', get_the_content() )
							),
							$truck_content
						);
					}
					truck_show_layout( $truck_content );
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
