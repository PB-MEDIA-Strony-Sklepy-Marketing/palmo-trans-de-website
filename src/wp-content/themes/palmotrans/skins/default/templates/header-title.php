<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

// Page (category, tag, archive, author) title

if ( truck_need_page_title() ) {
	truck_sc_layouts_showed( 'title', true );
	truck_sc_layouts_showed( 'postmeta', true );
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( is_single() ) {
							?>
							<div class="sc_layouts_title_meta">
							<?php
								truck_show_post_meta(
									apply_filters(
										'truck_filter_post_meta_args', array(
											'components' => join( ',', truck_array_get_keys_by_value( truck_get_theme_option( 'meta_parts' ) ) ),
											'counters'   => join( ',', truck_array_get_keys_by_value( truck_get_theme_option( 'counters' ) ) ),
											'seo'        => truck_is_on( truck_get_theme_option( 'seo_snippets' ) ),
										), 'header', 1
									)
								);
							?>
							</div>
							<?php
						}

						// Blog/Post title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$truck_blog_title           = truck_get_blog_title();
							$truck_blog_title_text      = '';
							$truck_blog_title_class     = '';
							$truck_blog_title_link      = '';
							$truck_blog_title_link_text = '';
							if ( is_array( $truck_blog_title ) ) {
								$truck_blog_title_text      = $truck_blog_title['text'];
								$truck_blog_title_class     = ! empty( $truck_blog_title['class'] ) ? ' ' . $truck_blog_title['class'] : '';
								$truck_blog_title_link      = ! empty( $truck_blog_title['link'] ) ? $truck_blog_title['link'] : '';
								$truck_blog_title_link_text = ! empty( $truck_blog_title['link_text'] ) ? $truck_blog_title['link_text'] : '';
							} else {
								$truck_blog_title_text = $truck_blog_title;
							}
							?>
							<h1 itemprop="headline" class="sc_layouts_title_caption<?php echo esc_attr( $truck_blog_title_class ); ?>">
								<?php
								$truck_top_icon = truck_get_term_image_small();
								if ( ! empty( $truck_top_icon ) ) {
									$truck_attr = truck_getimagesize( $truck_top_icon );
									?>
									<img src="<?php echo esc_url( $truck_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'truck' ); ?>"
										<?php
										if ( ! empty( $truck_attr[3] ) ) {
											truck_show_layout( $truck_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $truck_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $truck_blog_title_link ) && ! empty( $truck_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $truck_blog_title_link ); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html( $truck_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( ! is_paged() && ( is_category() || is_tag() || is_tax() ) ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						ob_start();
						do_action( 'truck_action_breadcrumbs' );
						$truck_breadcrumbs = ob_get_contents();
						ob_end_clean();
						truck_show_layout( $truck_breadcrumbs, '<div class="sc_layouts_title_breadcrumbs">', '</div>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
