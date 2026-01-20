<?php
$truck_woocommerce_sc = truck_get_theme_option( 'front_page_woocommerce_products' );
if ( ! empty( $truck_woocommerce_sc ) ) {
	?><div class="front_page_section front_page_section_woocommerce<?php
		$truck_scheme = truck_get_theme_option( 'front_page_woocommerce_scheme' );
		if ( ! empty( $truck_scheme ) && ! truck_is_inherit( $truck_scheme ) ) {
			echo ' scheme_' . esc_attr( $truck_scheme );
		}
		echo ' front_page_section_paddings_' . esc_attr( truck_get_theme_option( 'front_page_woocommerce_paddings' ) );
		if ( truck_get_theme_option( 'front_page_woocommerce_stack' ) ) {
			echo ' sc_stack_section_on';
		}
	?>"
			<?php
			$truck_css      = '';
			$truck_bg_image = truck_get_theme_option( 'front_page_woocommerce_bg_image' );
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
		$truck_anchor_icon = truck_get_theme_option( 'front_page_woocommerce_anchor_icon' );
		$truck_anchor_text = truck_get_theme_option( 'front_page_woocommerce_anchor_text' );
		if ( ( ! empty( $truck_anchor_icon ) || ! empty( $truck_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
			echo do_shortcode(
				'[trx_sc_anchor id="front_page_section_woocommerce"'
											. ( ! empty( $truck_anchor_icon ) ? ' icon="' . esc_attr( $truck_anchor_icon ) . '"' : '' )
											. ( ! empty( $truck_anchor_text ) ? ' title="' . esc_attr( $truck_anchor_text ) . '"' : '' )
											. ']'
			);
		}
	?>
		<div class="front_page_section_inner front_page_section_woocommerce_inner
			<?php
			if ( truck_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
				echo ' truck-full-height sc_layouts_flex sc_layouts_columns_middle';
			}
			?>
				"
				<?php
				$truck_css      = '';
				$truck_bg_mask  = truck_get_theme_option( 'front_page_woocommerce_bg_mask' );
				$truck_bg_color_type = truck_get_theme_option( 'front_page_woocommerce_bg_color_type' );
				if ( 'custom' == $truck_bg_color_type ) {
					$truck_bg_color = truck_get_theme_option( 'front_page_woocommerce_bg_color' );
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
			<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap content_wrap woocommerce">
				<?php
				// Content wrap with title and description
				$truck_caption     = truck_get_theme_option( 'front_page_woocommerce_caption' );
				$truck_description = truck_get_theme_option( 'front_page_woocommerce_description' );
				if ( ! empty( $truck_caption ) || ! empty( $truck_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					// Caption
					if ( ! empty( $truck_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $truck_caption ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( $truck_caption, 'truck_kses_content' );
						?>
						</h2>
						<?php
					}

					// Description (text)
					if ( ! empty( $truck_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $truck_description ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( wpautop( $truck_description ), 'truck_kses_content' );
						?>
						</div>
						<?php
					}
				}

				// Content (widgets)
				?>
				<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
					<?php
					if ( 'products' == $truck_woocommerce_sc ) {
						$truck_woocommerce_sc_ids      = truck_get_theme_option( 'front_page_woocommerce_products_per_page' );
						$truck_woocommerce_sc_per_page = count( explode( ',', $truck_woocommerce_sc_ids ) );
					} else {
						$truck_woocommerce_sc_per_page = max( 1, (int) truck_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
					}
					$truck_woocommerce_sc_columns = max( 1, min( $truck_woocommerce_sc_per_page, (int) truck_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
					echo do_shortcode(
						"[{$truck_woocommerce_sc}"
										. ( 'products' == $truck_woocommerce_sc
												? ' ids="' . esc_attr( $truck_woocommerce_sc_ids ) . '"'
												: '' )
										. ( 'product_category' == $truck_woocommerce_sc
												? ' category="' . esc_attr( truck_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
												: '' )
										. ( 'best_selling_products' != $truck_woocommerce_sc
												? ' orderby="' . esc_attr( truck_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
													. ' order="' . esc_attr( truck_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
												: '' )
										. ' per_page="' . esc_attr( $truck_woocommerce_sc_per_page ) . '"'
										. ' columns="' . esc_attr( $truck_woocommerce_sc_columns ) . '"'
						. ']'
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
