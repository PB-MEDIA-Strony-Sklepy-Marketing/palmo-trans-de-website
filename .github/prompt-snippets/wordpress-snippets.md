# WordPress Code Snippets

## Custom Post Type

```php
function palmo_register_post_type() {
    register_post_type( 'service', array(
        'labels' => array(
            'name'          => __( 'Dienstleistungen', 'palmo-trans-de' ),
            'singular_name' => __( 'Dienstleistung', 'palmo-trans-de' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true,
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'      => array( 'slug' => 'dienstleistungen' ),
    ) );
}
add_action( 'init', 'palmo_register_post_type' );
```

## Custom Taxonomy

```php
function palmo_register_taxonomy() {
    register_taxonomy( 'service_category', 'service', array(
        'labels' => array(
            'name'          => __( 'Service-Kategorien', 'palmo-trans-de' ),
            'singular_name' => __( 'Service-Kategorie', 'palmo-trans-de' ),
        ),
        'hierarchical'      => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'rewrite'           => array( 'slug' => 'service-kategorie' ),
    ) );
}
add_action( 'init', 'palmo_register_taxonomy' );
```

## Meta Box

```php
function palmo_add_meta_box() {
    add_meta_box(
        'service_details',
        __( 'Details', 'palmo-trans-de' ),
        'palmo_render_meta_box',
        'service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'palmo_add_meta_box' );

function palmo_render_meta_box( $post ) {
    wp_nonce_field( 'palmo_meta_box', 'palmo_meta_box_nonce' );
    $price = get_post_meta( $post->ID, '_service_price', true );
    ?>
    <label><?php esc_html_e( 'Preis (EUR):', 'palmo-trans-de' ); ?></label>
    <input type="number" name="service_price" value="<?php echo esc_attr( $price ); ?>" step="0.01">
    <?php
}

function palmo_save_meta_box( $post_id ) {
    if ( ! isset( $_POST['palmo_meta_box_nonce'] ) ||
         ! wp_verify_nonce( $_POST['palmo_meta_box_nonce'], 'palmo_meta_box' ) ) {
        return;
    }

    if ( isset( $_POST['service_price'] ) ) {
        update_post_meta( $post_id, '_service_price', sanitize_text_field( $_POST['service_price'] ) );
    }
}
add_action( 'save_post_service', 'palmo_save_meta_box' );
```

## AJAX Handler

```php
// PHP Handler
function palmo_ajax_handler() {
    check_ajax_referer( 'palmo-nonce', 'nonce' );

    $input = isset( $_POST['input'] ) ? sanitize_text_field( $_POST['input'] ) : '';

    $result = process_data( $input );

    wp_send_json_success( array(
        'data' => $result,
    ) );
}
add_action( 'wp_ajax_palmo_action', 'palmo_ajax_handler' );
add_action( 'wp_ajax_nopriv_palmo_action', 'palmo_ajax_handler' );

// JavaScript
jQuery(document).ready(function($) {
    $('#my-form').on('submit', function(e) {
        e.preventDefault();

        $.post(palmoData.ajaxurl, {
            action: 'palmo_action',
            nonce: palmoData.nonce,
            input: $('#input').val()
        }, function(response) {
            if (response.success) {
                console.log(response.data);
            }
        });
    });
});
```

## Shortcode

```php
function palmo_shortcode( $atts ) {
    $atts = shortcode_atts( array(
        'title' => __( 'Standard Titel', 'palmo-trans-de' ),
        'count' => 3,
    ), $atts, 'palmo_shortcode' );

    ob_start();
    ?>
    <div class="palmo-shortcode">
        <h3><?php echo esc_html( $atts['title'] ); ?></h3>
        <!-- Content here -->
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'palmo_shortcode', 'palmo_shortcode' );
```

## Custom Widget

```php
class Palmo_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'palmo_widget',
            __( 'Palmo Widget', 'palmo-trans-de' ),
            array( 'description' => __( 'Widget-Beschreibung', 'palmo-trans-de' ) )
        );
    }

    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
        }
        // Widget content
        echo $args['after_widget'];
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_html_e( 'Titel:', 'palmo-trans-de' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                   type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
    }
}

function palmo_register_widgets() {
    register_widget( 'Palmo_Widget' );
}
add_action( 'widgets_init', 'palmo_register_widgets' );
```

## WP_Query Loop

```php
$args = array(
    'post_type'      => 'service',
    'posts_per_page' => 10,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'service_category',
            'field'    => 'slug',
            'terms'    => 'transport',
        ),
    ),
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) :
        $query->the_post();
        ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(); ?>
        </article>
        <?php
    endwhile;
    wp_reset_postdata();
endif;
```

## Custom Menu Walker

```php
class Palmo_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        if ( in_array( 'current-menu-item', $classes ) ) {
            $classes[] = 'active';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names . '>';

        $atts = array(
            'href'   => ! empty( $item->url ) ? $item->url : '',
            'title'  => ! empty( $item->attr_title ) ? $item->attr_title : '',
            'target' => ! empty( $item->target ) ? $item->target : '',
        );

        $atts       = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
```

## Breadcrumbs

```php
function palmo_breadcrumbs() {
    if ( is_front_page() ) return;

    $separator = '<span class="separator">/</span>';

    echo '<nav class="breadcrumbs">';
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Startseite', 'palmo-trans-de' ) . '</a>';
    echo $separator;

    if ( is_single() ) {
        $categories = get_the_category();
        if ( $categories ) {
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' .
                 esc_html( $categories[0]->name ) . '</a>';
            echo $separator;
        }
        the_title( '<span class="current">', '</span>' );
    } elseif ( is_page() ) {
        the_title( '<span class="current">', '</span>' );
    } elseif ( is_category() ) {
        single_cat_title( '<span class="current">', '</span>' );
    }

    echo '</nav>';
}
```

---

## Version

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
