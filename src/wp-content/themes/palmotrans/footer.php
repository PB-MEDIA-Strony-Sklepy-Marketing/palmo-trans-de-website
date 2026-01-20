<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

							do_action( 'truck_action_page_content_end_text' );
							
							// Widgets area below the content
							truck_create_widgets_area( 'widgets_below_content' );
						
							do_action( 'truck_action_page_content_end' );
							?>
						</div>
						<?php
						
						do_action( 'truck_action_after_page_content' );

						// Show main sidebar
						get_sidebar();

						do_action( 'truck_action_content_wrap_end' );
						?>
					</div>
					<?php

					do_action( 'truck_action_after_content_wrap' );

					// Widgets area below the page and related posts below the page
					$truck_body_style = truck_get_theme_option( 'body_style' );
					$truck_widgets_name = truck_get_theme_option( 'widgets_below_page', 'hide' );
					$truck_show_widgets = ! truck_is_off( $truck_widgets_name ) && is_active_sidebar( $truck_widgets_name );
					$truck_show_related = truck_is_single() && truck_get_theme_option( 'related_position', 'below_content' ) == 'below_page';
					if ( $truck_show_widgets || $truck_show_related ) {
						if ( 'fullscreen' != $truck_body_style ) {
							?>
							<div class="content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $truck_show_related ) {
							do_action( 'truck_action_related_posts' );
						}

						// Widgets area below page content
						if ( $truck_show_widgets ) {
							truck_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $truck_body_style ) {
							?>
							</div>
							<?php
						}
					}
					do_action( 'truck_action_page_content_wrap_end' );
					?>
			</div>
			<?php
			do_action( 'truck_action_after_page_content_wrap' );

			// Don't display the footer elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ( ! truck_is_singular( 'post' ) && ! truck_is_singular( 'attachment' ) ) || ! in_array ( truck_get_value_gp( 'action' ), array( 'full_post_loading', 'prev_post_loading' ) ) ) {
				
				// Skip link anchor to fast access to the footer from keyboard
				?>
				<a id="footer_skip_link_anchor" class="truck_skip_link_anchor" href="#"></a>
				<?php

				do_action( 'truck_action_before_footer' );

				// Footer
				$truck_footer_type = truck_get_theme_option( 'footer_type' );
				if ( 'custom' == $truck_footer_type && ! truck_is_layouts_available() ) {
					$truck_footer_type = 'default';
				}
				get_template_part( apply_filters( 'truck_filter_get_template_part', "templates/footer-" . sanitize_file_name( $truck_footer_type ) ) );

				do_action( 'truck_action_after_footer' );

			}
			?>

			<?php do_action( 'truck_action_page_wrap_end' ); ?>

		</div>

		<?php do_action( 'truck_action_after_page_wrap' ); ?>

	</div>

	<?php do_action( 'truck_action_after_body' ); ?>

	<?php wp_footer(); ?>

</body>
</html>