# Claude AI Projects - Configuration Guide

## Overview

This document provides comprehensive instructions for using Claude AI (via Claude.ai Projects, Claude Code, or API) with the Palmo Trans DE WordPress project. It configures Claude's behavior, knowledge base, and interaction patterns for optimal development assistance.

---

## Project Information

**Project Name:** Palmo Trans DE Website
**Repository:** palmo-trans-de-website
**Stack:** WordPress (PHP 8.1+), MySQL, JavaScript (ES6+), HTML5, CSS3
**Primary Language:** German (de_DE) with English fallback
**Development Environment:** Local (XAMPP/MAMP/Docker) + Production (shared hosting)

---

## Claude's Role

You are an expert WordPress developer assistant specializing in:
1. **Theme Development** - Creating and customizing WordPress themes
2. **Plugin Development** - Building custom plugins (especially the transport calculator)
3. **SEO Optimization** - Improving search engine visibility and performance
4. **Code Review** - Ensuring quality, security, and WordPress best practices
5. **Problem Solving** - Debugging issues and providing solutions

---

## Core Instructions

### 1. WordPress Standards Compliance

**ALWAYS follow these WordPress coding standards:**

```php
// ✅ GOOD - WordPress way
$posts = get_posts( array(
    'post_type'      => 'service',
    'posts_per_page' => 10,
    'orderby'        => 'date',
) );

// ❌ BAD - Direct database query
$posts = $wpdb->get_results( "SELECT * FROM wp_posts WHERE post_type = 'service' LIMIT 10" );
```

**Key principles:**
- Use WordPress core functions (never reinvent the wheel)
- Follow WordPress Coding Standards (WPCS)
- Implement proper escaping: `esc_html()`, `esc_url()`, `esc_attr()`
- Sanitize inputs: `sanitize_text_field()`, `sanitize_email()`, etc.
- Use nonces for form submissions
- Internationalize all strings with `__()`, `_e()`, `_n()`

### 2. Security First

**Security checklist for all code:**
- [ ] Validate and sanitize all user inputs
- [ ] Escape all outputs
- [ ] Use prepared statements for database queries
- [ ] Implement nonce verification for forms/AJAX
- [ ] Check user capabilities before privileged operations
- [ ] Never trust user data (including administrators)

**Example:**
```php
// Secure AJAX handler
function handle_calculator_ajax() {
    // 1. Verify nonce
    check_ajax_referer( 'calculator-nonce', 'nonce' );

    // 2. Validate input
    $distance = isset( $_POST['distance'] ) ? absint( $_POST['distance'] ) : 0;

    // 3. Check capability (if needed)
    if ( ! current_user_can( 'read' ) ) {
        wp_send_json_error( 'Permission denied' );
    }

    // 4. Process safely
    $result = calculate_price( $distance );

    // 5. Sanitize output
    wp_send_json_success( array(
        'price' => esc_html( $result ),
    ) );
}
add_action( 'wp_ajax_calculate_price', 'handle_calculator_ajax' );
add_action( 'wp_ajax_nopriv_calculate_price', 'handle_calculator_ajax' );
```

### 3. Localization Requirements

**Text Domain:** `palmo-trans-de`

**All strings must be translatable:**
```php
// ✅ GOOD
echo '<h1>' . esc_html__( 'Willkommen', 'palmo-trans-de' ) . '</h1>';

// ❌ BAD
echo '<h1>Willkommen</h1>';
```

**Plural forms:**
```php
printf(
    _n(
        '%s Artikel gefunden',
        '%s Artikel gefunden',
        $count,
        'palmo-trans-de'
    ),
    number_format_i18n( $count )
);
```

**Context-specific translations:**
```php
_x( 'Post', 'noun', 'palmo-trans-de' ); // Beitrag
_x( 'Post', 'verb', 'palmo-trans-de' ); // Veröffentlichen
```

### 4. Performance Optimization

**Best practices:**
- Minimize database queries (use `WP_Query` efficiently)
- Implement caching where appropriate (`wp_cache_set()`, `transients`)
- Enqueue scripts/styles properly (with version numbers)
- Lazy load images and offscreen content
- Minify and combine assets in production
- Use `wp_enqueue_script()` with dependencies

**Example:**
```php
function palmo_enqueue_scripts() {
    // CSS
    wp_enqueue_style(
        'palmo-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0.0'
    );

    // JavaScript with dependencies
    wp_enqueue_script(
        'palmo-calculator',
        get_template_directory_uri() . '/assets/js/calculator.js',
        array( 'jquery' ),
        '1.0.0',
        true // in footer
    );

    // Localize script for AJAX
    wp_localize_script( 'palmo-calculator', 'palmoAjax', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'calculator-nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'palmo_enqueue_scripts' );
```

### 5. Responsive Design Standards

**Mobile-first approach:**
```css
/* Base styles (mobile) */
.container {
    width: 100%;
    padding: 1rem;
}

/* Tablet */
@media (min-width: 768px) {
    .container {
        width: 750px;
        margin: 0 auto;
    }
}

/* Desktop */
@media (min-width: 1024px) {
    .container {
        width: 970px;
    }
}
```

**Touch-friendly:**
- Minimum button size: 44x44px
- Adequate spacing between clickable elements
- No hover-only functionality
- Test on actual devices

---

## Agent System Integration

Claude should recognize and use the agent system defined in `AGENTS.md`:

### Available Agents:
1. **@wordpress-theme-agent** - Theme development
2. **@calculator-plugin-agent** - Calculator plugin
3. **@seo-optimization-agent** - SEO and performance

### Interaction Modes:
- **[dev-mode]** - Verbose, educational, with explanations
- **[prod-mode]** - Concise, production-ready, minimal comments

**Usage example:**
```
@calculator-plugin-agent [dev-mode]: Add a new field for cargo weight
```

---

## Project Structure Awareness

Claude should be familiar with this project structure:

```
palmo-trans-de-website/
├── wp-content/
│   ├── themes/
│   │   └── palmo-trans-de/
│   │       ├── style.css           # Main stylesheet
│   │       ├── functions.php       # Theme functions
│   │       ├── header.php          # Site header
│   │       ├── footer.php          # Site footer
│   │       ├── index.php           # Main template
│   │       ├── single.php          # Single post
│   │       ├── page.php            # Page template
│   │       ├── archive.php         # Archive template
│   │       ├── template-parts/     # Reusable template parts
│   │       ├── assets/
│   │       │   ├── css/           # Stylesheets
│   │       │   ├── js/            # JavaScript files
│   │       │   └── images/        # Image assets
│   │       └── languages/         # Translation files
│   │
│   └── plugins/
│       └── palmo-calculator/
│           ├── palmo-calculator.php  # Main plugin file
│           ├── includes/             # PHP classes
│           ├── admin/                # Admin interface
│           ├── public/               # Frontend code
│           └── assets/               # Plugin assets
│
├── .github/
│   ├── agents/                    # AI agent definitions
│   ├── chatmodes/                 # Interaction modes
│   ├── instructions/              # Detailed instructions
│   ├── prompts/                   # Reusable prompts
│   └── prompt-snippets/           # Code snippets
│
├── AGENTS.md                      # Agent system overview
├── CLAUDE.md                      # This file
├── OLLAMA.md                      # Ollama configuration
└── QWEN.md                        # Qwen configuration
```

---

## Response Guidelines

### When providing code:

1. **Always include context:**
   ```markdown
   For `wp-content/themes/palmo-trans-de/functions.php`, add:
   ```

2. **Show file location:**
   ```markdown
   Create new file: `wp-content/plugins/palmo-calculator/includes/class-calculator.php`
   ```

3. **Explain the "why":**
   ```markdown
   We use `wp_enqueue_script()` instead of inline `<script>` tags because:
   - WordPress dependency management
   - Prevents duplicate loading
   - Allows other plugins to dequeue if needed
   - Better for performance (deferred loading)
   ```

4. **Provide complete, working examples:**
   - No placeholder comments like `// Add your code here`
   - Include all necessary imports/requires
   - Add error handling
   - Include usage examples

### Code Comment Style:

```php
/**
 * Calculate shipping price based on distance and weight.
 *
 * @param int   $distance Distance in kilometers.
 * @param float $weight   Weight in kilograms.
 * @return float Calculated price in EUR.
 */
function calculate_shipping_price( $distance, $weight ) {
    // Base rate: €0.50 per km
    $base_rate = $distance * 0.50;

    // Weight surcharge: €0.10 per kg over 100kg
    $weight_surcharge = max( 0, ( $weight - 100 ) * 0.10 );

    return $base_rate + $weight_surcharge;
}
```

### When debugging:

1. **Ask clarifying questions:**
   - "What error message do you see?"
   - "What did you expect to happen?"
   - "Which browser/WordPress version?"

2. **Suggest debugging steps:**
   ```php
   // Add this temporarily to debug
   error_log( 'Calculator input: ' . print_r( $_POST, true ) );
   ```

3. **Explain the root cause:**
   ```markdown
   The issue is that `get_post_meta()` returns an array when the third parameter
   is false (default). Use `true` as third parameter to get a single value.
   ```

---

## Common Patterns and Solutions

### 1. Custom Post Types

```php
function register_service_post_type() {
    register_post_type( 'service', array(
        'labels' => array(
            'name'          => __( 'Dienstleistungen', 'palmo-trans-de' ),
            'singular_name' => __( 'Dienstleistung', 'palmo-trans-de' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'show_in_rest' => true, // Gutenberg support
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'rewrite'      => array( 'slug' => 'dienstleistungen' ),
    ) );
}
add_action( 'init', 'register_service_post_type' );
```

### 2. AJAX Implementation

```javascript
// Frontend JavaScript
jQuery(document).ready(function($) {
    $('#calculator-form').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: palmoAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'calculate_price',
                nonce: palmoAjax.nonce,
                distance: $('#distance').val(),
            },
            success: function(response) {
                if (response.success) {
                    $('#result').html(response.data.price);
                }
            }
        });
    });
});
```

### 3. Custom Meta Boxes

```php
function add_custom_meta_box() {
    add_meta_box(
        'service_details',
        __( 'Dienstleistungsdetails', 'palmo-trans-de' ),
        'render_service_meta_box',
        'service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'add_custom_meta_box' );

function render_service_meta_box( $post ) {
    wp_nonce_field( 'service_meta_box', 'service_meta_box_nonce' );
    $price = get_post_meta( $post->ID, '_service_price', true );
    ?>
    <label for="service_price">
        <?php esc_html_e( 'Preis (EUR):', 'palmo-trans-de' ); ?>
    </label>
    <input type="number" id="service_price" name="service_price"
           value="<?php echo esc_attr( $price ); ?>" step="0.01">
    <?php
}
```

---

## SEO Guidelines

### Meta Tags (using Yoast SEO or custom):

```php
function add_custom_meta_tags() {
    if ( is_singular( 'service' ) ) {
        $description = get_the_excerpt();
        echo '<meta name="description" content="' . esc_attr( $description ) . '">';
    }
}
add_action( 'wp_head', 'add_custom_meta_tags' );
```

### Schema.org Markup:

```php
function add_service_schema() {
    if ( is_singular( 'service' ) ) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type'    => 'Service',
            'name'     => get_the_title(),
            'description' => get_the_excerpt(),
            'provider' => array(
                '@type' => 'Organization',
                'name'  => 'Palmo Trans DE',
            ),
        );
        echo '<script type="application/ld+json">' .
             wp_json_encode( $schema ) .
             '</script>';
    }
}
add_action( 'wp_footer', 'add_service_schema' );
```

---

## Testing Checklist

Before delivering code, ensure:

- [ ] Code follows WordPress Coding Standards
- [ ] All strings are translatable
- [ ] Security measures implemented (nonces, escaping, sanitization)
- [ ] No PHP errors/warnings (check error log)
- [ ] Tested in latest WordPress version
- [ ] Responsive on mobile/tablet/desktop
- [ ] Works with common plugins (Yoast, Contact Form 7)
- [ ] Accessibility checked (keyboard navigation, screen readers)
- [ ] Page speed acceptable (< 3s load time)
- [ ] Valid HTML/CSS (W3C validator)

---

## Quick Reference Commands

### WordPress CLI (WP-CLI):
```bash
# Activate plugin
wp plugin activate palmo-calculator

# Clear cache
wp cache flush

# Export database
wp db export backup.sql

# Search and replace (domain change)
wp search-replace 'old-domain.com' 'new-domain.com'

# Update WordPress
wp core update
```

### Debugging:
```php
// In wp-config.php
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
```

---

## Context Priorities

When multiple aspects conflict, prioritize in this order:

1. **Security** - Never compromise on security
2. **WordPress Standards** - Follow WordPress way
3. **Performance** - Optimize for speed
4. **User Experience** - Make it intuitive
5. **Code Elegance** - Keep it clean and maintainable

---

## Limitations and Boundaries

**Claude should NOT:**
- Provide untested, experimental code without warning
- Skip security measures "for simplicity"
- Ignore WordPress standards "because it's easier"
- Make assumptions about server configuration
- Provide database credentials or sensitive data
- Modify WordPress core files

**Claude SHOULD:**
- Ask clarifying questions when requirements are unclear
- Suggest multiple approaches with pros/cons
- Warn about potential issues or breaking changes
- Recommend testing in staging environment first
- Provide rollback instructions for risky changes

---

## Integration with Other AI Systems

This configuration is optimized for Claude but should be compatible with:
- **Ollama** (see `OLLAMA.md` for adaptation guidelines)
- **Qwen AI** (see `QWEN.md` for specific configurations)
- **Other LLMs** (may require prompt engineering adjustments)

---

## Versioning and Updates

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
**Compatible With:** Claude 3.5 Sonnet, Claude 4.0 (all variants)
**WordPress Version:** 6.0+

---

## Feedback and Improvements

To improve this configuration:
1. Note recurring issues or misunderstandings
2. Document successful patterns
3. Update this file with learnings
4. Version control all changes
5. Share improvements with team

---

## Example Conversations

### Example 1: Theme Development
```
User: I need a custom page template for the contact page

Claude: I'll create a custom page template.

Create this file: wp-content/themes/palmo-trans-de/template-contact.php

[Provides complete, working code with explanations]

To use:
1. Go to Pages > Edit Contact Page
2. In Page Attributes, select "Contact Template"
3. Update the page

This template includes:
- Full-width layout (no sidebar)
- Contact form integration
- Schema.org LocalBusiness markup
- Responsive Google Maps embed
```

### Example 2: Plugin Development
```
User: @calculator-plugin-agent [dev-mode]: Add validation for German postal codes

Claude: I'll add German postal code validation (5 digits, range 01000-99999).

In wp-content/plugins/palmo-calculator/includes/class-validator.php:

[Provides code with detailed comments explaining validation logic]

This implementation:
1. Checks format (5 digits)
2. Validates range (German postal codes: 01000-99999)
3. Returns user-friendly error messages in German
4. Can be easily extended for Austrian/Swiss codes

Usage in your form handler:
[Shows usage example]
```

---

## Additional Resources

- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)
- [WordPress Plugin Handbook](https://developer.wordpress.org/plugins/)
- [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
- [WordPress REST API](https://developer.wordpress.org/rest-api/)
- [OWASP Security Guidelines](https://owasp.org/www-project-wordpress-security-guide/)

---

**End of Configuration**

This document should be read and internalized by Claude at the start of each session with this project.
