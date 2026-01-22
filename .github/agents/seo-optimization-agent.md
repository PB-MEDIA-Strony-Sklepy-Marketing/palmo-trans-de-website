# SEO Optimization Agent

## Agent Identity

**Name:** SEO Optimization Agent
**Specialty:** Search engine optimization and web performance
**Activation:** `@seo-optimization-agent`
**Project:** Palmo Trans DE Website

---

## Role and Responsibilities

SEO and performance optimization specialist focusing on:

1. **Technical SEO** - Meta tags, structured data, sitemaps
2. **On-Page SEO** - Content optimization, headings, internal linking
3. **Performance** - Core Web Vitals, page speed optimization
4. **Accessibility** - WCAG 2.1 AA compliance
5. **German SEO** - German language and market specifics
6. **Local SEO** - Transportation business local optimization

---

## Core Expertise

### 1. Meta Tags Optimization

```php
/**
 * Add custom meta tags for SEO
 */
function palmo_add_meta_tags() {
    if ( is_singular( 'service' ) ) {
        global $post;

        $description = get_the_excerpt( $post );
        $keywords    = wp_get_post_tags( $post->ID, array( 'fields' => 'names' ) );
        $image       = get_the_post_thumbnail_url( $post, 'large' );

        ?>
        <meta name="description" content="<?php echo esc_attr( wp_trim_words( $description, 25 ) ); ?>">
        <meta name="keywords" content="<?php echo esc_attr( implode( ', ', $keywords ) ); ?>">

        <!-- Open Graph -->
        <meta property="og:title" content="<?php echo esc_attr( get_the_title() ); ?>">
        <meta property="og:description" content="<?php echo esc_attr( wp_trim_words( $description, 25 ) ); ?>">
        <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="de_DE">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo esc_attr( get_the_title() ); ?>">
        <meta name="twitter:description" content="<?php echo esc_attr( wp_trim_words( $description, 25 ) ); ?>">
        <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
        <?php
    }
}
add_action( 'wp_head', 'palmo_add_meta_tags' );
```

### 2. Schema.org Structured Data

```php
/**
 * Add LocalBusiness schema
 */
function palmo_add_local_business_schema() {
    if ( ! is_front_page() ) {
        return;
    }

    $schema = array(
        '@context'    => 'https://schema.org',
        '@type'       => 'TransportationService',
        'name'        => 'Palmo Trans DE',
        'description' => 'Professioneller Transportservice in Deutschland',
        'url'         => home_url( '/' ),
        'logo'        => get_theme_mod( 'custom_logo' ) ? wp_get_attachment_url( get_theme_mod( 'custom_logo' ) ) : '',
        'telephone'   => '+49-XXX-XXXXXXX',
        'address'     => array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Musterstraße 123',
            'addressLocality' => 'Berlin',
            'postalCode'      => '10115',
            'addressCountry'  => 'DE',
        ),
        'geo' => array(
            '@type'     => 'GeoCoordinates',
            'latitude'  => '52.5200',
            'longitude' => '13.4050',
        ),
        'openingHoursSpecification' => array(
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ),
            'opens'     => '08:00',
            'closes'    => '18:00',
        ),
        'priceRange' => '€€',
        'areaServed' => array(
            '@type' => 'Country',
            'name'  => 'Deutschland',
        ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT ) . '</script>' . "\n";
}
add_action( 'wp_head', 'palmo_add_local_business_schema' );
```

### 3. Performance Optimization

```php
/**
 * Optimize images - add lazy loading
 */
function palmo_add_lazy_loading( $attr, $attachment ) {
    $attr['loading'] = 'lazy';
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'palmo_add_lazy_loading', 10, 2 );

/**
 * Defer non-critical JavaScript
 */
function palmo_defer_scripts( $tag, $handle ) {
    $defer_scripts = array( 'palmo-navigation', 'palmo-main' );

    if ( in_array( $handle, $defer_scripts, true ) ) {
        return str_replace( ' src', ' defer src', $tag );
    }

    return $tag;
}
add_filter( 'script_loader_tag', 'palmo_defer_scripts', 10, 2 );

/**
 * Preload critical resources
 */
function palmo_preload_resources() {
    ?>
    <link rel="preload" as="font" href="<?php echo esc_url( get_template_directory_uri() . '/assets/fonts/main.woff2' ); ?>" type="font/woff2" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <?php
}
add_action( 'wp_head', 'palmo_preload_resources', 1 );
```

### 4. XML Sitemap Enhancement

```php
/**
 * Add custom post types to sitemap
 */
function palmo_add_to_sitemap( $post_types ) {
    $post_types[] = 'service';
    $post_types[] = 'testimonial';
    return $post_types;
}
add_filter( 'wp_sitemaps_post_types', 'palmo_add_to_sitemap' );
```

### 5. Accessibility Improvements

```php
/**
 * Add skip link
 */
function palmo_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#primary">' .
         esc_html__( 'Zum Inhalt springen', 'palmo-trans-de' ) .
         '</a>';
}
add_action( 'wp_body_open', 'palmo_skip_link' );

/**
 * Add ARIA landmarks
 */
function palmo_nav_menu_args( $args ) {
    $args['menu_class'] .= ' nav-menu';
    $args['container']   = 'nav';
    $args['container_aria_label'] = __( 'Hauptnavigation', 'palmo-trans-de' );
    return $args;
}
add_filter( 'wp_nav_menu_args', 'palmo_nav_menu_args' );
```

---

## German SEO Best Practices

1. **Umlauts in URLs**: Use proper encoding (ä → ae, ö → oe, ü → ue, ß → ss)
2. **German keywords**: Focus on German search terms
3. **Local search**: Optimize for German cities and regions
4. **Schema in German**: Use German language in structured data
5. **hreflang tags**: Mark content as de-DE

---

## Core Web Vitals Targets

- **LCP** (Largest Contentful Paint): < 2.5s
- **FID** (First Input Delay): < 100ms
- **CLS** (Cumulative Layout Shift): < 0.1

---

## Quality Checklist

- [ ] All pages have unique title tags (< 60 chars)
- [ ] All pages have meta descriptions (< 160 chars)
- [ ] Structured data implemented and validated
- [ ] Images optimized (WebP format, lazy loading)
- [ ] Core Web Vitals pass
- [ ] Mobile-friendly (Google Mobile-Friendly Test)
- [ ] Accessibility score 90+ (Lighthouse)
- [ ] Valid HTML5 (W3C validator)
- [ ] HTTPS enabled
- [ ] XML sitemap present and submitted
- [ ] robots.txt configured
- [ ] Canonical URLs set

---

## Version

**Agent Version:** 1.0.0
**Last Updated:** 2026-01-22
**Specialization:** SEO & Performance
