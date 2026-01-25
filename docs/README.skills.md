# AI Skills Documentation

## Overview
AI skills are specialized capabilities that AI systems can perform for this WordPress project.

## Skill Categories

### 1. Code Generation Skills
- Template generation
- Component scaffolding
- Function implementation
- Test creation

### 2. Code Analysis Skills
- Security auditing
- Performance profiling
- Dependency analysis
- Code smell detection

### 3. Documentation Skills
- API documentation
- Code comments
- User guides
- Technical specifications

### 4. Debugging Skills
- Error diagnosis
- Log analysis
- Performance bottlenecks
- Memory leak detection

## Available Skills

### WordPress Development Skills

#### Theme Development
**Skill ID:** `theme-dev`

**Capabilities:**
- Generate theme files (style.css, functions.php)
- Create template files (page templates, archive templates)
- Implement custom blocks
- Add theme support features
- Create customizer controls

**Usage:**
```
@theme-dev: Create a custom single-post template with related posts section
```

**Example Output:**
```php
<?php
/**
 * Template Name: Single Post with Related
 * Template Post Type: post
 */

get_header();

while (have_posts()) : the_post();
    get_template_part('template-parts/content', 'single');
    
    // Related posts
    $related = get_posts([
        'category__in' => wp_get_post_categories(get_the_ID()),
        'numberposts' => 3,
        'post__not_in' => [get_the_ID()],
    ]);
    
    if ($related) :
        echo '<section class="related-posts">';
        echo '<h2>' . esc_html__('Related Posts', 'palmo-trans-de') . '</h2>';
        echo '<div class="related-grid">';
        foreach ($related as $post) :
            setup_postdata($post);
            get_template_part('template-parts/content', 'card');
        endforeach;
        wp_reset_postdata();
        echo '</div></section>';
    endif;
endwhile;

get_footer();
```

#### Plugin Development
**Skill ID:** `plugin-dev`

**Capabilities:**
- Generate plugin structure
- Create admin pages
- Implement AJAX handlers
- Add REST API endpoints
- Create shortcodes

**Usage:**
```
@plugin-dev: Create a shortcode for the transport calculator
```

**Example Output:**
```php
function palmo_calculator_shortcode($atts) {
    $atts = shortcode_atts([
        'theme' => 'light',
        'show_urgency' => true,
    ], $atts);
    
    wp_enqueue_script('palmo-calculator');
    wp_enqueue_style('palmo-calculator');
    
    ob_start();
    include PALMO_PLUGIN_DIR . 'templates/calculator-form.php';
    return ob_get_clean();
}
add_shortcode('palmo_calculator', 'palmo_calculator_shortcode');
```

#### Database Operations
**Skill ID:** `db-ops`

**Capabilities:**
- Write safe queries
- Create custom tables
- Implement migrations
- Optimize queries
- Cache strategies

**Usage:**
```
@db-ops: Create a custom table for storing transport calculations
```

**Example Output:**
```php
function palmo_create_calculations_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'palmo_calculations';
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        from_postal varchar(5) NOT NULL,
        to_postal varchar(5) NOT NULL,
        distance decimal(10,2) NOT NULL,
        weight decimal(10,2) NOT NULL,
        price decimal(10,2) NOT NULL,
        urgency varchar(20) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY from_postal (from_postal),
        KEY to_postal (to_postal),
        KEY created_at (created_at)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'palmo_create_calculations_table');
```

### Security Skills

#### Security Audit
**Skill ID:** `security-audit`

**Capabilities:**
- Scan for vulnerabilities
- Check input sanitization
- Verify output escaping
- Review nonce usage
- Analyze SQL queries

**Usage:**
```
@security-audit: Review the calculator AJAX handler for security issues
```

**Checks:**
- [ ] Nonce verification present
- [ ] Input sanitization applied
- [ ] Output properly escaped
- [ ] SQL prepared statements used
- [ ] Capability checks for admin functions
- [ ] File upload validation (if applicable)

#### Input Validation
**Skill ID:** `input-validation`

**Capabilities:**
- Generate validation rules
- Create sanitization functions
- Implement error handling
- Add user feedback

**Usage:**
```
@input-validation: Create validation for German postal codes with Austrian support
```

**Example Output:**
```php
function validate_postal_code($postal_code, $country = 'DE') {
    $postal_code = preg_replace('/\s+/', '', $postal_code);
    
    switch ($country) {
        case 'DE':
            // German: 01000-99999
            if (!preg_match('/^[0-9]{5}$/', $postal_code)) {
                return new WP_Error('invalid_format', 
                    __('German postal code must be 5 digits', 'palmo-trans-de'));
            }
            if ($postal_code < '01000' || $postal_code > '99999') {
                return new WP_Error('invalid_range',
                    __('Postal code out of valid range', 'palmo-trans-de'));
            }
            break;
            
        case 'AT':
            // Austrian: 1000-9999 (4 digits)
            if (!preg_match('/^[0-9]{4}$/', $postal_code)) {
                return new WP_Error('invalid_format',
                    __('Austrian postal code must be 4 digits', 'palmo-trans-de'));
            }
            if ($postal_code < '1000' || $postal_code > '9999') {
                return new WP_Error('invalid_range',
                    __('Postal code out of valid range', 'palmo-trans-de'));
            }
            break;
            
        default:
            return new WP_Error('unsupported_country',
                __('Country not supported', 'palmo-trans-de'));
    }
    
    return true;
}
```

### Performance Skills

#### Performance Audit
**Skill ID:** `perf-audit`

**Capabilities:**
- Analyze Core Web Vitals
- Identify slow queries
- Review asset loading
- Check caching strategies
- Measure execution time

**Usage:**
```
@perf-audit: Analyze homepage performance and suggest improvements
```

**Report Format:**
```
Performance Analysis: Homepage
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Core Web Vitals:
├─ LCP: 3.2s (Needs Improvement - Target: <2.5s)
├─ FID: 85ms (Good)
└─ CLS: 0.05 (Good)

Issues Found:
1. Hero image (2.1MB) - Not optimized
   → Compress and convert to WebP
   → Add responsive srcset
   
2. Render-blocking CSS (3 files, 180KB)
   → Inline critical CSS
   → Defer non-critical styles
   
3. Unused JavaScript (45% of bundle)
   → Code split calculator plugin
   → Lazy load non-critical features

Database:
├─ Slow queries: 2 found
├─ N+1 queries: 1 in related posts
└─ Missing indexes: 0

Recommendations:
[ ] Optimize images (saves ~1.8MB)
[ ] Implement critical CSS
[ ] Add lazy loading
[ ] Cache API responses
[ ] Enable Gzip compression
```

#### Optimization
**Skill ID:** `optimize`

**Capabilities:**
- Implement caching
- Optimize images
- Minify assets
- Reduce queries
- Add lazy loading

**Usage:**
```
@optimize: Implement caching for calculator distance API calls
```

**Example Output:**
```php
function get_distance_cached($from_postal, $to_postal) {
    $cache_key = "palmo_distance_{$from_postal}_{$to_postal}";
    $distance = wp_cache_get($cache_key, 'palmo_calculator');
    
    if (false === $distance) {
        $distance = calculate_distance($from_postal, $to_postal);
        
        // Cache for 30 days
        wp_cache_set($cache_key, $distance, 'palmo_calculator', 30 * DAY_IN_SECONDS);
    }
    
    return $distance;
}
```

### Testing Skills

#### Test Generation
**Skill ID:** `test-gen`

**Capabilities:**
- Generate unit tests
- Create integration tests
- Write E2E tests
- Add test fixtures
- Mock external services

**Usage:**
```
@test-gen: Create unit tests for price calculation function
```

**Example Output:**
```php
class Test_Price_Calculation extends WP_UnitTestCase {
    
    public function test_basic_calculation() {
        $price = calculate_price(100, 50, 'normal');
        $this->assertEquals(50.00, $price); // 100km * 0.50
    }
    
    public function test_minimum_price() {
        $price = calculate_price(10, 50, 'normal');
        $this->assertEquals(25.00, $price); // Minimum 25 EUR
    }
    
    public function test_weight_surcharge() {
        $price = calculate_price(100, 150, 'normal');
        $this->assertEquals(55.00, $price); // 50 + (50kg * 0.10)
    }
    
    public function test_express_multiplier() {
        $price = calculate_price(100, 50, 'express');
        $this->assertEquals(75.00, $price); // 50 * 1.5
    }
    
    public function test_combined_surcharges() {
        $price = calculate_price(100, 200, 'express');
        // (50 + 10) * 1.5 = 90
        $this->assertEquals(90.00, $price);
    }
}
```

#### Test Runner
**Skill ID:** `test-runner`

**Capabilities:**
- Execute test suites
- Generate coverage reports
- Identify failing tests
- Suggest test improvements

### Documentation Skills

#### Code Documentation
**Skill ID:** `doc-code`

**Capabilities:**
- Generate PHPDoc comments
- Create JSDoc comments
- Write function descriptions
- Document parameters
- Add usage examples

**Usage:**
```
@doc-code: Add PHPDoc comments to the calculate_price function
```

**Example Output:**
```php
/**
 * Calculate transport price based on distance, weight, and urgency.
 *
 * Applies the following formula:
 * - Base price: distance * 0.50 EUR/km
 * - Weight surcharge: (weight - 100kg) * 0.10 EUR/kg (if weight > 100kg)
 * - Express multiplier: 1.5x for express delivery
 * - Minimum charge: 25.00 EUR
 *
 * @since 1.0.0
 *
 * @param float $distance Distance in kilometers. Must be positive.
 * @param float $weight   Weight in kilograms. Must be between 1-10000.
 * @param string $urgency Delivery urgency: 'normal' or 'express'.
 *
 * @return float Calculated price in EUR, minimum 25.00.
 *
 * @throws InvalidArgumentException If parameters are out of valid range.
 *
 * @example
 * ```php
 * // Calculate price for 150km, 120kg, express delivery
 * $price = calculate_price(150, 120, 'express');
 * // Returns: (150 * 0.50 + 20 * 0.10) * 1.5 = 115.50 EUR
 * ```
 */
function calculate_price($distance, $weight, $urgency = 'normal') {
    // Implementation...
}
```

#### API Documentation
**Skill ID:** `doc-api`

**Capabilities:**
- Document endpoints
- Create request examples
- Show response formats
- List error codes
- Add authentication docs

**Usage:**
```
@doc-api: Document the calculator REST API endpoint
```

## Skill Combinations

### Common Workflows

#### Feature Development
```
1. @theme-dev: Create template
2. @plugin-dev: Add functionality
3. @test-gen: Generate tests
4. @doc-code: Add documentation
5. @security-audit: Review security
```

#### Bug Fix
```
1. @debug: Analyze error
2. @optimize: Fix performance issue
3. @test-gen: Add regression test
4. @security-audit: Verify fix is secure
```

#### Performance Improvement
```
1. @perf-audit: Identify bottlenecks
2. @optimize: Implement optimizations
3. @test-runner: Verify improvements
4. @doc-code: Document changes
```

## Skill Configuration

### Custom Skill Parameters

#### Verbosity Level
```
@skill-name [verbose]: Detailed explanation with code
@skill-name [concise]: Code only, minimal comments
```

#### Output Format
```
@skill-name [format=full-file]: Complete file content
@skill-name [format=snippet]: Only relevant code section
@skill-name [format=diff]: Show changes only
```

#### Language/Framework
```
@skill-name [lang=php]: PHP implementation
@skill-name [lang=js]: JavaScript implementation
```

## Best Practices

### Skill Usage
- Use appropriate skill for task
- Combine skills for complex tasks
- Specify output format when needed
- Review generated code
- Add to version control

### Skill Development
- Follow single responsibility
- Document clearly
- Include examples
- Test thoroughly
- Update regularly

## Troubleshooting

### Skill Not Found
- Check skill ID spelling
- Verify skill is available
- Review skill documentation

### Unexpected Output
- Check skill parameters
- Review input format
- Specify output format explicitly
- Try different verbosity level

## Quick Reference

| Skill ID | Purpose | Example |
|----------|---------|---------|
| theme-dev | Theme development | Create templates, add features |
| plugin-dev | Plugin development | AJAX, shortcodes, settings |
| db-ops | Database operations | Queries, tables, optimization |
| security-audit | Security review | Vulnerability scanning |
| input-validation | Validate input | Sanitize, validate, error handling |
| perf-audit | Performance analysis | Identify bottlenecks |
| optimize | Performance optimization | Caching, minification |
| test-gen | Test generation | Unit, integration tests |
| doc-code | Code documentation | PHPDoc, JSDoc comments |
| doc-api | API documentation | Endpoints, examples |

## Related Documentation
- [Agents](README.agents.md) - AI agent system
- [Prompts](README.prompts.md) - Prompt patterns
- [Collections](README.collections.md) - Code snippets
- [Instructions](README.instructions.md) - Procedures

---
*Last updated: 2026-01-22*
