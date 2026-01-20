<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: //codex.wordpress.org/Template_Hierarchy
 *
 * @package TRUCK
 * @since TRUCK 1.0
 */

$truck_template = apply_filters( 'truck_filter_get_template_part', truck_blog_archive_get_template() );

if ( ! empty( $truck_template ) && 'index' != $truck_template ) {

	get_template_part( $truck_template );

} else {

	truck_storage_set( 'blog_archive', true );

	get_header();

	if ( have_posts() ) {

		// Query params
		$truck_stickies   = is_home()
								|| ( in_array( truck_get_theme_option( 'post_type' ), array( '', 'post' ) )
									&& (int) truck_get_theme_option( 'parent_cat' ) == 0
									)
										? get_option( 'sticky_posts' )
										: false;
		$truck_post_type  = truck_get_theme_option( 'post_type' );
		$truck_args       = array(
								'blog_style'     => truck_get_theme_option( 'blog_style' ),
								'post_type'      => $truck_post_type,
								'taxonomy'       => truck_get_post_type_taxonomy( $truck_post_type ),
								'parent_cat'     => truck_get_theme_option( 'parent_cat' ),
								'posts_per_page' => truck_get_theme_option( 'posts_per_page' ),
								'sticky'         => truck_get_theme_option( 'sticky_style', 'inherit' ) == 'columns'
															&& is_array( $truck_stickies )
															&& count( $truck_stickies ) > 0
															&& get_query_var( 'paged' ) < 1
								);

		truck_blog_archive_start();

		do_action( 'truck_action_blog_archive_start' );

		if ( is_author() ) {
			do_action( 'truck_action_before_page_author' );
			get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/author-page' ) );
			do_action( 'truck_action_after_page_author' );
		}

		if ( truck_get_theme_option( 'show_filters', 0 ) ) {
			do_action( 'truck_action_before_page_filters' );
			truck_show_filters( $truck_args );
			do_action( 'truck_action_after_page_filters' );
		} else {
			do_action( 'truck_action_before_page_posts' );
			truck_show_posts( array_merge( $truck_args, array( 'cat' => $truck_args['parent_cat'] ) ) );
			do_action( 'truck_action_after_page_posts' );
		}

		do_action( 'truck_action_blog_archive_end' );

		truck_blog_archive_end();

	} else {

		if ( is_search() ) {
			get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/content', 'none-search' ), 'none-search' );
		} else {
			get_template_part( apply_filters( 'truck_filter_get_template_part', 'templates/content', 'none-archive' ), 'none-archive' );
		}
	}

	get_footer();
}
