<?php
/**
 * Skin Setup
 *
 * @package TRUCK
 * @since TRUCK 1.76.0
 */


//--------------------------------------------
// SKIN DEFAULTS
//--------------------------------------------

// Return theme's (skin's) default value for the specified parameter
if ( ! function_exists( 'truck_theme_defaults' ) ) {
	function truck_theme_defaults( $name='', $value='' ) {
		$defaults = array(
			'page_width'          => 1290,
			'page_boxed_extra'  => 60,
			'page_fullwide_max' => 1920,
			'page_fullwide_extra' => 60,
			'sidebar_width'       => 410,
			'sidebar_gap'       => 40,
			'grid_gap'          => 30,
			'rad'               => 0
		);
		if ( empty( $name ) ) {
			return $defaults;
		} else {
			if ( $value === '' && isset( $defaults[ $name ] ) ) {
				$value = $defaults[ $name ];
			}
			return $value;
		}
	}
}


// WOOCOMMERCE SETUP
//--------------------------------------------------

// Allow extended layouts for WooCommerce
if ( ! function_exists( 'truck_skin_woocommerce_allow_extensions' ) ) {
	add_filter( 'truck_filter_load_woocommerce_extensions', 'truck_skin_woocommerce_allow_extensions' );
	function truck_skin_woocommerce_allow_extensions( $allow ) {
		return false;
	}
}


// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)


//--------------------------------------------
// SKIN SETTINGS
//--------------------------------------------
if ( ! function_exists( 'truck_skin_setup' ) ) {
	add_action( 'after_setup_theme', 'truck_skin_setup', 1 );
	function truck_skin_setup() {

		$GLOBALS['TRUCK_STORAGE'] = array_merge( $GLOBALS['TRUCK_STORAGE'], array(

			// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
			'theme_pro_key'       => 'env-ancora',
			
			'theme_doc_url'       => '//doc.themerex.net/truck/',
			
			'theme_demofiles_url' => '//demofiles.ancorathemes.com/truck/',
			
			'theme_rate_url'      => '//themeforest.net/downloads',
			
			'theme_custom_url'    => '//themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themeinstall',
			
			'theme_support_url'   => '//themerex.net/support/',
			
			'theme_download_url'  => '//themeforest.net/user/ancorathemes/portfolio',        // Ancora
			
			'theme_video_url'     => '//www.youtube.com/channel/UCdIjRh7-lPVHqTTKpaf8PLA',   // Ancora
			
			'theme_privacy_url'   => '//ancorathemes.com/privacy-policy/',                   // Ancora
			
			'portfolio_url'       => '//themeforest.net/user/ancorathemes/portfolio',        // Ancora
			
			
			// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
			// (i.e. 'children,kindergarten')
			'theme_categories'    => '',
		) );
	}
}


// Add/remove/change Theme Settings
if ( ! function_exists( 'truck_skin_setup_settings' ) ) {
	add_action( 'after_setup_theme', 'truck_skin_setup_settings', 1 );
	function truck_skin_setup_settings() {
		// Example: enable (true) / disable (false) thumbs in the prev/next navigation
		truck_storage_set_array( 'settings', 'thumbs_in_navigation', false );
		truck_storage_set_array2( 'required_plugins', 'instagram-feed', 'install', false);
		truck_storage_set_array2( 'required_plugins', 'm-chart', 'install', false);
		truck_storage_set_array2( 'required_plugins', 'm-chart-highcharts-library', 'install', false);
	}
}

// Add/remove/change Theme Options
if ( ! function_exists( 'truck_skin_setup_options' ) ) {
    add_action( 'after_setup_theme', 'truck_skin_setup_options', 3 );
    function truck_skin_setup_options()  {
		truck_storage_set_array2( 'options', 'expand_content_single', 'std', 'normal' );
    }
}

// add/remove Theme Options elements
if ( ! function_exists( 'truck_skin_options_theme_setup2' ) ) {
	add_action( 'after_setup_theme', 'truck_skin_options_theme_setup2', 4 );
	function truck_skin_options_theme_setup2() {
		truck_storage_set_array2( 'options', 'color_scheme', 'std', 'light');
		truck_storage_set_array2( 'options', 'sidebar_scheme', 'std', 'light');
	}
}

// Add parameter to the list Extend background
if ( ! function_exists( 'truck_skin_setup_filter_get_list_sc_content_extra_bg' ) ) {
	add_filter( 'trx_addons_filter_get_list_sc_content_extra_bg', 'truck_skin_setup_filter_get_list_sc_content_extra_bg', 10, 2 );
	function truck_skin_setup_filter_get_list_sc_content_extra_bg( $list ) {
		$list['alter_right'] = esc_html__( 'Alter Right', 'truck' );
		return $list;
	}
}

//--------------------------------------------
// SKIN FONTS
//--------------------------------------------
if ( ! function_exists( 'truck_skin_setup_fonts' ) ) {
	add_action( 'after_setup_theme', 'truck_skin_setup_fonts', 1 );
	function truck_skin_setup_fonts() {
		// Fonts to load when theme start
		// It can be:
		// - Google fonts (specify name, family and styles)
		// - Adobe fonts (specify name, family and link URL)
		// - uploaded fonts (specify name, family), placed in the folder css/font-face/font-name inside the skin folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		truck_storage_set(
			'load_fonts', array(
				array(
					'name'   => 'DM Sans',
					'family' => 'sans-serif',
					'link'   => '',
					'styles' => 'ital,wght@0,400;0,500;0,700;1,400;1,500;1,700'
				),
				array(
					'name'   => 'Outfit',
					'family' => 'sans-serif',
					'link'   => '',
					'styles' => 'wght@100;200;300;400;500;600;700;800;900'
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		truck_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags.
		// Default value of 'font-family' may be specified as reference to the array $load_fonts (see above)
		// or as comma-separated string.
		// In the second case (if 'font-family' is specified manually as comma-separated string):
		//    1) Font name with spaces in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!
		//    2) If font-family inherit a value from the 'Main text' - specify 'inherit' as a value
		// example:
		// Correct:   'font-family' => truck_get_load_fonts_family_string( $load_fonts[0] )
		// Correct:   'font-family' => 'Roboto,sans-serif'
		// Correct:   'font-family' => '"PT Serif",sans-serif'
		// Incorrect: 'font-family' => 'Roboto, sans-serif'
		// Incorrect: 'font-family' => 'PT Serif,sans-serif'

		$font_description = esc_html__( 'Please use only the following units: "rem" or "em".', 'truck' )
							. ( is_customize_preview() ? '<br>' . esc_html__( 'Press "Reload preview area" button at the top of this panel after the all font parameters are changed.', 'truck' ) : '' );

		truck_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'main text', 'truck' ) ),
					'font-family'     => '"DM Sans",sans-serif',
					'font-size'       => '1rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.65em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.57em',
				),
				'post'    => array(
					'title'           => esc_html__( 'Article text', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'article text', 'truck' ) ),
					'font-family'     => 'inherit',		// Example: '"PR Serif",serif',
					'font-size'       => '',			// Example: '1.286rem',
					'font-weight'     => 'inherit',		// Example: '400',
					'font-style'      => 'inherit',		// Example: 'normal',
					'line-height'     => '',			// Example: '1.75em',
					'text-decoration' => 'inherit',		// Example: 'none',
					'text-transform'  => 'inherit',		// Example: 'none',
					'letter-spacing'  => '',			// Example: '',
					'margin-top'      => '',			// Example: '0em',
					'margin-bottom'   => '',			// Example: '1.4em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H1', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '3.353em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.7px',
					'margin-top'      => '1.04em',
					'margin-bottom'   => '0.46em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H2', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '2.765em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.021em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1.4px',
					'margin-top'      => '0.72em',
					'margin-bottom'   => '0.52em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H3', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '2.059em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.086em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-1px',
					'margin-top'      => '1.07em',
					'margin-bottom'   => '0.7em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H4', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '1.647em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.214em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.6px',
					'margin-top'      => '1.35em',
					'margin-bottom'   => '0.7em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H5', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '1.412em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.208em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.5px',
					'margin-top'      => '1.5em',
					'margin-bottom'   => '0.82em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'tag H6', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '1.118em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.474em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.3px',
					'margin-top'      => '1.75em',
					'margin-bottom'   => '1.15em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'text of the logo', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '-0.5px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'buttons', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '16px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '21px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'input fields, dropdowns and textareas', 'truck' ) ),
					'font-family'     => 'inherit',
					'font-size'       => '16px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',     // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'post meta (author, categories, publish date, counters, share, etc.)', 'truck' ) ),
					'font-family'     => 'inherit',
					'font-size'       => '14px',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'main menu items', 'truck' ) ),
					'font-family'     => 'Outfit,sans-serif',
					'font-size'       => '17px',
					'font-weight'     => '500',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'truck' ),
					'description'     => sprintf( $font_description, esc_html__( 'dropdown menu items', 'truck' ) ),
					'font-family'     => '"DM Sans",sans-serif',
					'font-size'       => '15px',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
			)
		);

		// Font presets
		truck_storage_set(
			'font_presets', array(
				'karla' => array(
								'title'  => esc_html__( 'Karla', 'truck' ),
								'load_fonts' => array(
													// Google font
													array(
														'name'   => 'Dancing Script',
														'family' => 'fantasy',
														'link'   => '',
														'styles' => '300,400,700',
													),
													// Google font
													array(
														'name'   => 'Sansita Swashed',
														'family' => 'fantasy',
														'link'   => '',
														'styles' => '300,400,700',
													),
												),
								'theme_fonts' => array(
													'p'       => array(
														'font-family'     => '"Dancing Script",fantasy',
														'font-size'       => '1.25rem',
													),
													'post'    => array(
														'font-family'     => '',
													),
													'h1'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
														'font-size'       => '4em',
													),
													'h2'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h3'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h4'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h5'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'h6'      => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'logo'    => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'button'  => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'input'   => array(
														'font-family'     => 'inherit',
													),
													'info'    => array(
														'font-family'     => 'inherit',
													),
													'menu'    => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
													'submenu' => array(
														'font-family'     => '"Sansita Swashed",fantasy',
													),
												),
							),
				'roboto' => array(
								'title'  => esc_html__( 'Roboto', 'truck' ),
								'load_fonts' => array(
													// Google font
													array(
														'name'   => 'Noto Sans JP',
														'family' => 'serif',
														'link'   => '',
														'styles' => '300,300italic,400,400italic,700,700italic',
													),
													// Google font
													array(
														'name'   => 'Merriweather',
														'family' => 'sans-serif',
														'link'   => '',
														'styles' => '300,300italic,400,400italic,700,700italic',
													),
												),
								'theme_fonts' => array(
													'p'       => array(
														'font-family'     => '"Noto Sans JP",serif',
													),
													'post'    => array(
														'font-family'     => '',
													),
													'h1'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h2'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h3'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h4'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h5'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'h6'      => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'logo'    => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'button'  => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'input'   => array(
														'font-family'     => 'inherit',
													),
													'info'    => array(
														'font-family'     => 'inherit',
													),
													'menu'    => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
													'submenu' => array(
														'font-family'     => 'Merriweather,sans-serif',
													),
												),
							),
				'garamond' => array(
								'title'  => esc_html__( 'Garamond', 'truck' ),
								'load_fonts' => array(
													// Adobe font
													array(
														'name'   => 'Europe',
														'family' => 'sans-serif',
														'link'   => 'https://use.typekit.net/qmj1tmx.css',
														'styles' => '',
													),
													// Adobe font
													array(
														'name'   => 'Sofia Pro',
														'family' => 'sans-serif',
														'link'   => 'https://use.typekit.net/qmj1tmx.css',
														'styles' => '',
													),
												),
								'theme_fonts' => array(
													'p'       => array(
														'font-family'     => '"Sofia Pro",sans-serif',
													),
													'post'    => array(
														'font-family'     => '',
													),
													'h1'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h2'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h3'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h4'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h5'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'h6'      => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'logo'    => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'button'  => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'input'   => array(
														'font-family'     => 'inherit',
													),
													'info'    => array(
														'font-family'     => 'inherit',
													),
													'menu'    => array(
														'font-family'     => 'Europe,sans-serif',
													),
													'submenu' => array(
														'font-family'     => 'Europe,sans-serif',
													),
												),
							),
			)
		);
	}
}


//--------------------------------------------
// COLOR SCHEMES
//--------------------------------------------
if ( ! function_exists( 'truck_skin_setup_schemes' ) ) {
	add_action( 'after_setup_theme', 'truck_skin_setup_schemes', 1 );
	function truck_skin_setup_schemes() {

		// Theme colors for customizer
		// Attention! Inner scheme must be last in the array below
		truck_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'truck' ),
					'description' => esc_html__( 'Colors of the main content area', 'truck' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'truck' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'truck' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'truck' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'truck' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'truck' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'truck' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'truck' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'truck' ),
				),
			)
		);

		truck_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'truck' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'truck' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'truck' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'truck' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'truck' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'truck' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'truck' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'truck' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'truck' ),
					'description' => esc_html__( 'Color of the text inside this block', 'truck' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'truck' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'truck' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'truck' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'truck' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'truck' ),
					'description' => esc_html__( 'Color of the links inside this block', 'truck' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'truck' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'truck' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Accent 2', 'truck' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'truck' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Accent 2 hover', 'truck' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'truck' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Accent 3', 'truck' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'truck' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Accent 3 hover', 'truck' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'truck' ),
				),
			)
		);

		// Default values for each color scheme
		$schemes = array(
			
			// Color scheme: 'default'
			'default' => array(
				'title'    => esc_html__( 'Default', 'truck' ),
				'internal' => true,
				'colors'   => array(
					
					// Whole block border and background
					'bg_color'         => '#E5EFF4', //
					'bd_color'         => '#CEDDE5', //
					
					// Text and links colors
					'text'             => '#797C7F', //
					'text_light'       => '#A5A6AA', //
					'text_dark'        => '#050606', //
					'text_link'        => '#FA4729', //
					'text_hover'       => '#F02D0C', //
					'text_link2'       => '#D60009', //
					'text_hover2'      => '#BA0008', //
					'text_link3'       => '#F5C002', //
					'text_hover3'      => '#ECAA00', //
					
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#EFF5F8', //
					'alter_bg_hover'   => '#FFFFFF', //
					'alter_bd_color'   => '#CEDDE5', //
					'alter_bd_hover'   => '#BACBD4', //
					'alter_text'       => '#797C7F', //
					'alter_light'      => '#A5A6AA', //
					'alter_dark'       => '#050606', //
					'alter_link'       => '#FA4729', //
					'alter_hover'      => '#F02D0C', //
					'alter_link2'      => '#D60009', //
					'alter_hover2'     => '#BA0008', //
					'alter_link3'      => '#F5C002', //
					'alter_hover3'     => '#ECAA00', //
					
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#232A31', //
					'extra_bg_hover'   => '#283039', //
					'extra_bd_color'   => '#353E48', //
					'extra_bd_hover'   => '#454E58', //
					'extra_text'       => '#D2D3D5', //
					'extra_light'      => '#96999F', //
					'extra_dark'       => '#FFFFFF', //
					'extra_link'       => '#FA4729', //
					'extra_hover'      => '#FFFFFF', //
					'extra_link2'      => '#D60009', //
					'extra_hover2'     => '#BA0008', //
					'extra_link3'      => '#F5C002', //
					'extra_hover3'     => '#ECAA00', //
					
					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#CEDDE5', //
					'input_bd_hover'   => '#BACBD4', //
					'input_text'       => '#797C7F', //
					'input_light'      => '#A5A6AA', //
					'input_dark'       => '#050606', //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FFFFFF', //
					'inverse_bd_hover' => '#FFFFFF', //
					'inverse_text'     => '#050606', //
					'inverse_light'    => '#FFFFFF', //
					'inverse_dark'     => '#050606', //
					'inverse_link'     => '#FFFFFF', //
					'inverse_hover'    => '#FFFFFF', //
					
					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'dark'
			'dark'    => array(
				'title'    => esc_html__( 'Dark', 'truck' ),
				'internal' => true,
				'colors'   => array(
					
					// Whole block border and background
					'bg_color'         => '#0B0C0E', //
					'bd_color'         => '#353E48', //
					
					// Text and links colors
					'text'             => '#D2D3D5', //
					'text_light'       => '#96999F', //
					'text_dark'        => '#FFFFFF', //
					'text_link'        => '#FA4729', //
					'text_hover'       => '#F02D0C', //
					'text_link2'       => '#D60009', //
					'text_hover2'      => '#BA0008', //
					'text_link3'       => '#F5C002', //
					'text_hover3'      => '#ECAA00', //
					
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#12171B', //
					'alter_bg_hover'   => '#1A2126', //
					'alter_bd_color'   => '#353E48', //
					'alter_bd_hover'   => '#454E58', //
					'alter_text'       => '#D2D3D5', //
					'alter_light'      => '#96999F', //
					'alter_dark'       => '#FFFFFF', //
					'alter_link'       => '#FA4729', //
					'alter_hover'      => '#F02D0C', //
					'alter_link2'      => '#D60009', //
					'alter_hover2'     => '#BA0008', //
					'alter_link3'      => '#F5C002', //
					'alter_hover3'     => '#ECAA00', //
					
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#232A31', //
					'extra_bg_hover'   => '#283039', //
					'extra_bd_color'   => '#353E48', //
					'extra_bd_hover'   => '#454E58', //
					'extra_text'       => '#D2D3D5', //
					'extra_light'      => '#96999F', //
					'extra_dark'       => '#FFFFFF', //
					'extra_link'       => '#FA4729', //
					'extra_hover'      => '#FFFFFF', //
					'extra_link2'      => '#D60009', //
					'extra_hover2'     => '#BA0008', //
					'extra_link3'      => '#F5C002', //
					'extra_hover3'     => '#ECAA00', //
					
					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#353E48', //
					'input_bd_hover'   => '#454E58', //
					'input_text'       => '#D2D3D5', //
					'input_light'      => '#96999F', //
					'input_dark'       => '#FFFFFF', //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FFFFFF', //
					'inverse_bd_hover' => '#FFFFFF', //
					'inverse_text'     => '#FFFFFF', //
					'inverse_light'    => '#FFFFFF', //
					'inverse_dark'     => '#050606', //
					'inverse_link'     => '#FFFFFF', //
					'inverse_hover'    => '#050606', //
					
					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'light'
			'light' => array(
				'title'    => esc_html__( 'Light', 'truck' ),
				'internal' => true,
				'colors'   => array(
					
					// Whole block border and background
					'bg_color'         => '#EFF5F8', //
					'bd_color'         => '#CEDDE5', //
					
					// Text and links colors
					'text'             => '#797C7F', //
					'text_light'       => '#A5A6AA', //
					'text_dark'        => '#050606', //
					'text_link'        => '#FA4729', //
					'text_hover'       => '#F02D0C', //
					'text_link2'       => '#D60009', //
					'text_hover2'      => '#BA0008', //
					'text_link3'       => '#F5C002', //
					'text_hover3'      => '#ECAA00', //
					
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#E5EFF4', //
					'alter_bg_hover'   => '#FFFFFF', //
					'alter_bd_color'   => '#CEDDE5', //
					'alter_bd_hover'   => '#BACBD4', //
					'alter_text'       => '#797C7F', //
					'alter_light'      => '#A5A6AA', //
					'alter_dark'       => '#050606', //
					'alter_link'       => '#FA4729', //
					'alter_hover'      => '#F02D0C', //
					'alter_link2'      => '#D60009', //
					'alter_hover2'     => '#BA0008', //
					'alter_link3'      => '#F5C002', //
					'alter_hover3'     => '#ECAA00', //
					
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#232A31', //
					'extra_bg_hover'   => '#283039', //
					'extra_bd_color'   => '#353E48', //
					'extra_bd_hover'   => '#454E58', //
					'extra_text'       => '#D2D3D5', //
					'extra_light'      => '#96999F', //
					'extra_dark'       => '#FFFFFF', //
					'extra_link'       => '#FA4729', //
					'extra_hover'      => '#FFFFFF', //
					'extra_link2'      => '#D60009', //
					'extra_hover2'     => '#BA0008', //
					'extra_link3'      => '#F5C002', //
					'extra_hover3'     => '#ECAA00', //
					
					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#CEDDE5', //
					'input_bd_hover'   => '#BACBD4', //
					'input_text'       => '#797C7F', //
					'input_light'      => '#A5A6AA', //
					'input_dark'       => '#050606', //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FFFFFF', //
					'inverse_bd_hover' => '#FFFFFF', //
					'inverse_text'     => '#050606', //
					'inverse_light'    => '#FFFFFF', //
					'inverse_dark'     => '#050606', //
					'inverse_link'     => '#FFFFFF', //
					'inverse_hover'    => '#FFFFFF', //
					
					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'orange'
			'orange' => array(
				'title'    => esc_html__( 'Orange', 'truck' ),
				'internal' => true,
				'colors'   => array(
					
					// Whole block border and background
					'bg_color'         => '#F4EED8', //
					'bd_color'         => '#E5DBCE', //
					
					// Text and links colors
					'text'             => '#927B6C', //
					'text_light'       => '#AD998B', //
					'text_dark'        => '#361703', //
					'text_link'        => '#FA7629', //
					'text_hover'       => '#E05605', //
					'text_link2'       => '#2B9EC4', //
					'text_hover2'      => '#217996', //
					'text_link3'       => '#DF9C2A', //
					'text_hover3'      => '#B17A1B', //
					
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#F8F4EF', //
					'alter_bg_hover'   => '#FFFFFF', //
					'alter_bd_color'   => '#E5DBCE', //
					'alter_bd_hover'   => '#CDA97B', //
					'alter_text'       => '#927B6C', //
					'alter_light'      => '#AD998B', //
					'alter_dark'       => '#361703', //
					'alter_link'       => '#FA7629', //
					'alter_hover'      => '#E05605', //
					'alter_link2'      => '#2B9EC4', //
					'alter_hover2'     => '#217996', //
					'alter_link3'      => '#DF9C2A', //
					'alter_hover3'     => '#B17A1B', //
					
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#5C2704', //
					'extra_bg_hover'   => '#6F2F05', //
					'extra_bd_color'   => '#8A3A06', //
					'extra_bd_hover'   => '#A3806A', //
					'extra_text'       => '#BEAB9F', //
					'extra_light'      => '#776456', //
					'extra_dark'       => '#F5F4F3', //
					'extra_link'       => '#FA7629', //
					'extra_hover'      => '#F5F4F3', //
					'extra_link2'      => '#2B9EC4', //
					'extra_hover2'     => '#217996', //
					'extra_link3'      => '#DF9C2A', //
					'extra_hover3'     => '#B17A1B', //
					
					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#E5DBCE', //
					'input_bd_hover'   => '#CDA97B', //
					'input_text'       => '#927B6C', //
					'input_light'      => '#AD998B', //
					'input_dark'       => '#361703', //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#F5F4F3', //
					'inverse_bd_hover' => '#F5F4F3', //
					'inverse_text'     => '#361703', //
					'inverse_light'    => '#F5F4F3', //
					'inverse_dark'     => '#361703', //
					'inverse_link'     => '#F5F4F3', //
					'inverse_hover'    => '#F5F4F3', //
					
					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'orange_dark'
			'orange_dark'    => array(
				'title'    => esc_html__( 'Orange Dark', 'truck' ),
				'internal' => true,
				'colors'   => array(
					
					// Whole block border and background
					'bg_color'         => '#220E01', //
					'bd_color'         => '#513E32', //
					
					// Text and links colors
					'text'             => '#BEAB9F', //
					'text_light'       => '#776456', //
					'text_dark'        => '#F5F4F3', //
					'text_link'        => '#FA7629', //
					'text_hover'       => '#E05605', //
					'text_link2'       => '#2B9EC4', //
					'text_hover2'      => '#217996', //
					'text_link3'       => '#DF9C2A', //
					'text_hover3'      => '#B17A1B', //
					
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#361702', //
					'alter_bg_hover'   => '#491F03', //
					'alter_bd_color'   => '#513E32', //
					'alter_bd_hover'   => '#A3806A', //
					'alter_text'       => '#BEAB9F', //
					'alter_light'      => '#776456', //
					'alter_dark'       => '#F5F4F3', //
					'alter_link'       => '#FA7629', //
					'alter_hover'      => '#E05605', //
					'alter_link2'      => '#2B9EC4', //
					'alter_hover2'     => '#217996', //
					'alter_link3'      => '#DF9C2A', //
					'alter_hover3'     => '#B17A1B', //
					
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#5C2704', //
					'extra_bg_hover'   => '#6F2F05', //
					'extra_bd_color'   => '#8A3A06', //
					'extra_bd_hover'   => '#A3806A', //
					'extra_text'       => '#BEAB9F', //
					'extra_light'      => '#776456', //
					'extra_dark'       => '#F5F4F3', //
					'extra_link'       => '#FA7629', //
					'extra_hover'      => '#F5F4F3', //
					'extra_link2'      => '#2B9EC4', //
					'extra_hover2'     => '#217996', //
					'extra_link3'      => '#DF9C2A', //
					'extra_hover3'     => '#B17A1B', //
					
					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#513E32', //
					'input_bd_hover'   => '#A3806A', //
					'input_text'       => '#BEAB9F', //
					'input_light'      => '#776456', //
					'input_dark'       => '#F5F4F3', //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#F5F4F3', //
					'inverse_bd_hover' => '#F5F4F3', //
					'inverse_text'     => '#F5F4F3', //
					'inverse_light'    => '#F5F4F3', //
					'inverse_dark'     => '#361703', //
					'inverse_link'     => '#F5F4F3', //
					'inverse_hover'    => '#361703', //
					
					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'orange_light'
			'orange_light' => array(
				'title'    => esc_html__( 'Orange Light', 'truck' ),
				'internal' => true,
				'colors'   => array(
					
					// Whole block border and background
					'bg_color'         => '#F8F4EF', //
					'bd_color'         => '#E5DBCE', //
					
					// Text and links colors
					'text'             => '#927B6C', //
					'text_light'       => '#AD998B', //
					'text_dark'        => '#361703', //
					'text_link'        => '#FA7629', //
					'text_hover'       => '#E05605', //
					'text_link2'       => '#2B9EC4', //
					'text_hover2'      => '#217996', //
					'text_link3'       => '#DF9C2A', //
					'text_hover3'      => '#B17A1B', //
					
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#F4EED8', //
					'alter_bg_hover'   => '#FFFFFF', //
					'alter_bd_color'   => '#E5DBCE', //
					'alter_bd_hover'   => '#CDA97B', //
					'alter_text'       => '#927B6C', //
					'alter_light'      => '#AD998B', //
					'alter_dark'       => '#361703', //
					'alter_link'       => '#FA7629', //
					'alter_hover'      => '#E05605', //
					'alter_link2'      => '#2B9EC4', //
					'alter_hover2'     => '#217996', //
					'alter_link3'      => '#DF9C2A', //
					'alter_hover3'     => '#B17A1B', //
					
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#5C2704', //
					'extra_bg_hover'   => '#6F2F05', //
					'extra_bd_color'   => '#8A3A06', //
					'extra_bd_hover'   => '#A3806A', //
					'extra_text'       => '#BEAB9F', //
					'extra_light'      => '#776456', //
					'extra_dark'       => '#F5F4F3', //
					'extra_link'       => '#FA7629', //
					'extra_hover'      => '#F5F4F3', //
					'extra_link2'      => '#2B9EC4', //
					'extra_hover2'     => '#217996', //
					'extra_link3'      => '#DF9C2A', //
					'extra_hover3'     => '#B17A1B', //
					
					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#E5DBCE', //
					'input_bd_hover'   => '#CDA97B', //
					'input_text'       => '#927B6C', //
					'input_light'      => '#AD998B', //
					'input_dark'       => '#361703', //
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#F5F4F3', //
					'inverse_bd_hover' => '#F5F4F3', //
					'inverse_text'     => '#361703', //
					'inverse_light'    => '#F5F4F3', //
					'inverse_dark'     => '#361703', //
					'inverse_link'     => '#F5F4F3', //
					'inverse_hover'    => '#F5F4F3', //
					
					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
		
			// Color scheme: 'sky'
			'sky' => array(
				'title'    => esc_html__( 'Sky', 'truck' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#E5EFF4', //
					'bd_color'         => '#CEDDE5', //

					// Text and links colors
					'text'             => '#797C7F', //
					'text_light'       => '#A5A6AA', //
					'text_dark'        => '#050606', //
					'text_link'        => '#FA4729', //
					'text_hover'       => '#F02D0C', //
					'text_link2'       => '#D60009', //
					'text_hover2'      => '#BA0008', //
					'text_link3'       => '#F5C002', //
					'text_hover3'      => '#ECAA00', //

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#EFF5F8', //
					'alter_bg_hover'   => '#FFFFFF', //
					'alter_bd_color'   => '#CEDDE5', //
					'alter_bd_hover'   => '#BACBD4', //
					'alter_text'       => '#797C7F', //
					'alter_light'      => '#A5A6AA', //
					'alter_dark'       => '#050606', //
					'alter_link'       => '#FA4729', //
					'alter_hover'      => '#F02D0C', //
					'alter_link2'      => '#D60009', //
					'alter_hover2'     => '#BA0008', //
					'alter_link3'      => '#F5C002', //
					'alter_hover3'     => '#ECAA00', //

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#232A31', //
					'extra_bg_hover'   => '#283039', //
					'extra_bd_color'   => '#353E48', //
					'extra_bd_hover'   => '#B1BCE3', //
					'extra_text'       => '#D3D6E0', //
					'extra_light'      => '#868EA9', //
					'extra_dark'       => '#FDFDFD', //
					'extra_link'       => '#FA4729', //
					'extra_hover'      => '#FDFDFD', //
					'extra_link2'      => '#D60009', //
					'extra_hover2'     => '#BA0008', //
					'extra_link3'      => '#F5C002', //
					'extra_hover3'     => '#ECAA00', //

					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#CEDDE5', //
					'input_bd_hover'   => '#BACBD4', //
					'input_text'       => '#797C7F', //
					'input_light'      => '#A5A6AA', //
					'input_dark'       => '#050606', //

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FDFDFD', //
					'inverse_bd_hover' => '#FDFDFD', //
					'inverse_text'     => '#050606', //
					'inverse_light'    => '#FDFDFD', //
					'inverse_dark'     => '#050606', //
					'inverse_link'     => '#FDFDFD', //
					'inverse_hover'    => '#FDFDFD', //

					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'sky_dark'
			'sky_dark'    => array(
				'title'    => esc_html__( 'Sky Dark', 'truck' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#1D3175', //
					'bd_color'         => '#2E4BAD', //

					// Text and links colors
					'text'             => '#D3D6E0', //
					'text_light'       => '#868EA9', //
					'text_dark'        => '#FDFDFD', //
					'text_link'        => '#FA4729', //
					'text_hover'       => '#F02D0C', //
					'text_link2'       => '#D60009', //
					'text_hover2'      => '#BA0008', //
					'text_link3'       => '#F5C002', //
					'text_hover3'      => '#ECAA00', //

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#233A8A', //
					'alter_bg_hover'   => '#28429E', //
					'alter_bd_color'   => '#2E4BAD', //
					'alter_bd_hover'   => '#B1BCE3', //
					'alter_text'       => '#D3D6E0', //
					'alter_light'      => '#868EA9', //
					'alter_dark'       => '#FDFDFD', //
					'alter_link'       => '#FA4729', //
					'alter_hover'      => '#F02D0C', //
					'alter_link2'      => '#D60009', //
					'alter_hover2'     => '#BA0008', //
					'alter_link3'      => '#F5C002', //
					'alter_hover3'     => '#ECAA00', //

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#232A31', //
					'extra_bg_hover'   => '#283039', //
					'extra_bd_color'   => '#353E48', //
					'extra_bd_hover'   => '#B1BCE3', //
					'extra_text'       => '#D3D6E0', //
					'extra_light'      => '#868EA9', //
					'extra_dark'       => '#FDFDFD', //
					'extra_link'       => '#FA4729', //
					'extra_hover'      => '#FDFDFD', //
					'extra_link2'      => '#D60009', //
					'extra_hover2'     => '#BA0008', //
					'extra_link3'      => '#F5C002', //
					'extra_hover3'     => '#ECAA00', //

					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#2E4BAD', //
					'input_bd_hover'   => '#B1BCE3', //
					'input_text'       => '#D3D6E0', //
					'input_light'      => '#868EA9', //
					'input_dark'       => '#FDFDFD', //

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FDFDFD', //
					'inverse_bd_hover' => '#FDFDFD', //
					'inverse_text'     => '#FDFDFD', //
					'inverse_light'    => '#FDFDFD', //
					'inverse_dark'     => '#050606', //
					'inverse_link'     => '#FDFDFD', //
					'inverse_hover'    => '#050606', //

					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			),
			
			// Color scheme: 'sky_light'
			'sky_light' => array(
				'title'    => esc_html__( 'Sky Light', 'truck' ),
				'internal' => true,
				'colors'   => array(

					// Whole block border and background
					'bg_color'         => '#EFF5F8', //
					'bd_color'         => '#CEDDE5', //

					// Text and links colors
					'text'             => '#797C7F', //
					'text_light'       => '#A5A6AA', //
					'text_dark'        => '#050606', //
					'text_link'        => '#FA4729', //
					'text_hover'       => '#F02D0C', //
					'text_link2'       => '#D60009', //
					'text_hover2'      => '#BA0008', //
					'text_link3'       => '#F5C002', //
					'text_hover3'      => '#ECAA00', //

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'   => '#E5EFF4', //
					'alter_bg_hover'   => '#FFFFFF', //
					'alter_bd_color'   => '#CEDDE5', //
					'alter_bd_hover'   => '#BACBD4', //
					'alter_text'       => '#797C7F', //
					'alter_light'      => '#A5A6AA', //
					'alter_dark'       => '#050606', //
					'alter_link'       => '#FA4729', //
					'alter_hover'      => '#F02D0C', //
					'alter_link2'      => '#D60009', //
					'alter_hover2'     => '#BA0008', //
					'alter_link3'      => '#F5C002', //
					'alter_hover3'     => '#ECAA00', //

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'   => '#232A31', //
					'extra_bg_hover'   => '#283039', //
					'extra_bd_color'   => '#353E48', //
					'extra_bd_hover'   => '#B1BCE3', //
					'extra_text'       => '#D3D6E0', //
					'extra_light'      => '#868EA9', //
					'extra_dark'       => '#FDFDFD', //
					'extra_link'       => '#FA4729', //
					'extra_hover'      => '#FDFDFD', //
					'extra_link2'      => '#D60009', //
					'extra_hover2'     => '#BA0008', //
					'extra_link3'      => '#F5C002', //
					'extra_hover3'     => '#ECAA00', //

					// Input fields (form's fields and textarea)
					'input_bg_color'   => 'transparent', //
					'input_bg_hover'   => 'transparent', //
					'input_bd_color'   => '#CEDDE5', //
					'input_bd_hover'   => '#BACBD4', //
					'input_text'       => '#797C7F', //
					'input_light'      => '#A5A6AA', //
					'input_dark'       => '#050606', //

					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color' => '#FDFDFD', //
					'inverse_bd_hover' => '#FDFDFD', //
					'inverse_text'     => '#050606', //
					'inverse_light'    => '#FDFDFD', //
					'inverse_dark'     => '#050606', //
					'inverse_link'     => '#FDFDFD', //
					'inverse_hover'    => '#FDFDFD', //

					// Additional (skin-specific) colors.
					// Attention! Set of colors must be equal in all color schemes.
					//---> For example:
					//---> 'new_color1'         => '#rrggbb',
					//---> 'alter_new_color1'   => '#rrggbb',
					//---> 'inverse_new_color1' => '#rrggbb',
				),
			)
		);
		truck_storage_set( 'schemes', $schemes );
		truck_storage_set( 'schemes_original', $schemes );

		// Add names of additional colors
		//---> For example:
		//---> truck_storage_set_array( 'scheme_color_names', 'new_color1', array(
		//---> 	'title'       => __( 'New color 1', 'truck' ),
		//---> 	'description' => __( 'Description of the new color 1', 'truck' ),
		//---> ) );


		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		truck_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_08' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.8,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_00' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
                'alter_dark_015'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.15,
                ),
                'alter_dark_02'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.2,
                ),
                'alter_dark_05'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.5,
                ),
                'alter_dark_08'     => array(
                    'color' => 'alter_dark',
                    'alpha' => 0.8,
                ),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_05' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.5,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
                'text_dark_003'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.03,
                ),
                'text_dark_005'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.05,
                ),
                'text_dark_008'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.08,
                ),
				'text_dark_015'      => array(
					'color' => 'text_dark',
					'alpha' => 0.15,
				),
				'text_dark_02'      => array(
					'color' => 'text_dark',
					'alpha' => 0.2,
				),
                'text_dark_03'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.3,
                ),
                'text_dark_05'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.5,
                ),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
                'text_dark_08'      => array(
                    'color' => 'text_dark',
                    'alpha' => 0.8,
                ),
                'text_link_007'      => array(
                    'color' => 'text_link',
                    'alpha' => 0.07,
                ),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
                'text_link_03'      => array(
                    'color' => 'text_link',
                    'alpha' => 0.3,
                ),
				'text_link_04'      => array(
					'color' => 'text_link',
					'alpha' => 0.4,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_link2_08'      => array(
                    'color' => 'text_link2',
                    'alpha' => 0.8,
                ),
                'text_link2_007'      => array(
                    'color' => 'text_link2',
                    'alpha' => 0.07,
                ),
				'text_link2_02'      => array(
					'color' => 'text_link2',
					'alpha' => 0.2,
				),
                'text_link2_03'      => array(
                    'color' => 'text_link2',
                    'alpha' => 0.3,
                ),
				'text_link2_05'      => array(
					'color' => 'text_link2',
					'alpha' => 0.5,
				),
                'text_link3_007'      => array(
                    'color' => 'text_link3',
                    'alpha' => 0.07,
                ),
				'text_link3_02'      => array(
					'color' => 'text_link3',
					'alpha' => 0.2,
				),
                'text_link3_03'      => array(
                    'color' => 'text_link3',
                    'alpha' => 0.3,
                ),
                'inverse_text_03'      => array(
                    'color' => 'inverse_text',
                    'alpha' => 0.3,
                ),
                'inverse_link_08'      => array(
                    'color' => 'inverse_link',
                    'alpha' => 0.8,
                ),
                'inverse_hover_08'      => array(
                    'color' => 'inverse_hover',
                    'alpha' => 0.8,
                ),
				'text_dark_blend'   => array(
					'color'      => 'text_dark',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
			)
		);

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		truck_storage_set(
			'schemes_simple', array(
				'text_link'        => array(),
				'text_hover'       => array(),
				'text_link2'       => array(),
				'text_hover2'      => array(),
				'text_link3'       => array(),
				'text_hover3'      => array(),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
			)
		);

		// Parameters to set order of schemes in the css
		truck_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'menu_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// Color presets
		truck_storage_set(
			'color_presets', array(
				'autumn' => array(
								'title'  => esc_html__( 'Autumn', 'truck' ),
								'colors' => array(
												'default' => array(
																	'text_link'  => '#d83938',
																	'text_hover' => '#f2b232',
																	),
												'dark' => array(
																	'text_link'  => '#d83938',
																	'text_hover' => '#f2b232',
																	)
												)
							),
				'green' => array(
								'title'  => esc_html__( 'Natural Green', 'truck' ),
								'colors' => array(
												'default' => array(
																	'text_link'  => '#75ac78',
																	'text_hover' => '#378e6d',
																	),
												'dark' => array(
																	'text_link'  => '#75ac78',
																	'text_hover' => '#378e6d',
																	)
												)
							),
			)
		);
	}
}

// Enqueue extra styles for frontend
if ( ! function_exists( 'truck_trx_addons_extra_styles' ) ) {
    add_action( 'wp_enqueue_scripts', 'truck_trx_addons_extra_styles', 2060 );
    function truck_trx_addons_extra_styles() {
        $truck_url = truck_get_file_url( 'extra-styles.css' );
        if ( '' != $truck_url ) {
            wp_enqueue_style( 'truck-trx-addons-extra-styles', $truck_url, array(), null );
        }
    }
}

// Activation methods
if ( ! function_exists( 'truck_clone_activation_methods' ) ) {
    add_filter( 'trx_addons_filter_activation_methods', 'truck_clone_activation_methods', 11, 1 );
    function truck_clone_activation_methods( $args ) {
        $args['elements_key'] = true;
        return $args;
    }
}