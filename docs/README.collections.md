# Prompt Collections Documentation

## Overview
Prompt collections are organized sets of reusable prompts for common WordPress development tasks.

## Collection Structure

```
.github/
├── prompts/
│   ├── theme-development.md
│   ├── plugin-development.md
│   └── seo-optimization.md
└── prompt-snippets/
    ├── wordpress-snippets.md
    └── calculator-snippets.md
```

## Available Collections

### 1. Theme Development Prompts
**Location:** `.github/prompts/theme-development.md`

**Categories:**
- Template creation
- Custom post types
- Theme customization
- Widget development
- Navigation menus

**Example Prompts:**
```
"Create a custom page template with sidebar"
"Add support for custom logo and site icon"
"Implement breadcrumb navigation"
"Create custom widget for recent posts"
```

### 2. Plugin Development Prompts
**Location:** `.github/prompts/plugin-development.md`

**Categories:**
- Plugin scaffolding
- Admin interfaces
- AJAX handlers
- REST API endpoints
- Settings pages

**Example Prompts:**
```
"Create plugin activation/deactivation hooks"
"Implement AJAX form submission with nonce"
"Add custom admin menu page"
"Create REST API endpoint for calculator"
```

### 3. SEO Optimization Prompts
**Location:** `.github/prompts/seo-optimization.md`

**Categories:**
- Schema markup
- Meta tags
- Performance
- Accessibility
- Analytics

**Example Prompts:**
```
"Generate LocalBusiness schema for transport company"
"Optimize images for Core Web Vitals"
"Implement lazy loading for below-fold content"
"Add structured data for service pages"
```

## Code Snippet Collections

### WordPress Snippets
**Location:** `.github/prompt-snippets/wordpress-snippets.md`

**Categories:**
1. **Custom Post Types**
```php
// Register service post type
function register_service_post_type() {
    register_post_type('service', [
        'labels' => [...],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
}
add_action('init', 'register_service_post_type');
```

2. **Meta Boxes**
```php
// Add custom meta box
function add_service_meta_boxes() {
    add_meta_box(
        'service_details',
        'Service Details',
        'render_service_meta_box',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_service_meta_boxes');
```

3. **AJAX Handlers**
```php
// AJAX handler with nonce verification
function handle_ajax_request() {
    check_ajax_referer('my_nonce', 'nonce');
    $data = sanitize_text_field($_POST['data']);
    wp_send_json_success(['result' => $data]);
}
add_action('wp_ajax_my_action', 'handle_ajax_request');
add_action('wp_ajax_nopriv_my_action', 'handle_ajax_request');
```

### Calculator Snippets
**Location:** `.github/prompt-snippets/calculator-snippets.md`

**Categories:**
1. **Postal Code Validation**
```php
function validate_german_postal_code($postal_code) {
    $postal_code = preg_replace('/\s+/', '', $postal_code);
    return preg_match('/^[0-9]{5}$/', $postal_code) 
        && $postal_code >= '01000' 
        && $postal_code <= '99999';
}
```

2. **Distance Calculation**
```php
function calculate_distance($from_postal, $to_postal) {
    $from_coords = get_postal_coordinates($from_postal);
    $to_coords = get_postal_coordinates($to_postal);
    
    $lat1 = deg2rad($from_coords['lat']);
    $lon1 = deg2rad($from_coords['lon']);
    $lat2 = deg2rad($to_coords['lat']);
    $lon2 = deg2rad($to_coords['lon']);
    
    $dlat = $lat2 - $lat1;
    $dlon = $lon2 - $lon1;
    
    $a = sin($dlat/2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon/2) ** 2;
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    
    return 6371 * $c; // Earth radius in km
}
```

3. **Price Calculation**
```php
function calculate_price($distance, $weight, $urgency) {
    $base_price = $distance * 0.50;
    $weight_surcharge = max(0, ($weight - 100) * 0.10);
    $urgency_multiplier = ($urgency === 'express') ? 1.5 : 1.0;
    
    $total = ($base_price + $weight_surcharge) * $urgency_multiplier;
    return max($total, 25.00);
}
```

## Using Collections

### With Claude
```markdown
Reference prompts from collections:
"Use the custom post type prompt from theme-development collection"

Or load snippets:
"Apply the AJAX handler snippet from wordpress-snippets"
```

### With Ollama
```bash
# Load collection context
ollama run codellama "$(cat .github/prompts/theme-development.md)"
```

### With Qwen
```
Import collection: .github/prompts/plugin-development.md
Apply snippet: wordpress-snippets.md > Meta Boxes
```

## Creating Custom Collections

### Structure
```markdown
# Collection Name

## Category 1
- Prompt 1: Description
- Prompt 2: Description

## Category 2
- Prompt 3: Description

## Code Examples
```language
code snippet
```
```

### Best Practices
1. **Organize by task type** - Group related prompts
2. **Include code examples** - Show expected output
3. **Add context** - Explain when to use each prompt
4. **Keep snippets focused** - One purpose per snippet
5. **Document parameters** - Explain variables and options

### Example Custom Collection
```markdown
# Custom Admin Interface Prompts

## Dashboard Widgets
- Create overview widget: Display key metrics on admin dashboard
- Add quick stats widget: Show recent activity summary

## Settings Pages
- Create tabbed settings: Multiple setting categories
- Add validation: Custom field validation rules

## Code Snippets

### Dashboard Widget
```php
function add_custom_dashboard_widget() {
    wp_add_dashboard_widget(
        'custom_widget',
        'Transport Overview',
        'render_custom_dashboard_widget'
    );
}
add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

function render_custom_dashboard_widget() {
    echo '<p>Recent calculations: ' . get_recent_count() . '</p>';
}
```
```

## Collection Management

### Adding to Collections
1. Identify common task patterns
2. Create reusable prompt template
3. Add code examples
4. Document in appropriate collection file
5. Update this README

### Updating Collections
1. Review usage patterns
2. Refine prompts based on results
3. Add new examples
4. Version control changes
5. Document in CHANGELOG.md

## Quick Reference

| Collection | Purpose | Key Prompts |
|------------|---------|-------------|
| theme-development | Theme customization | Templates, widgets, menus |
| plugin-development | Plugin features | AJAX, REST API, admin UI |
| seo-optimization | Performance & SEO | Schema, meta tags, speed |
| wordpress-snippets | Common patterns | Post types, meta boxes, hooks |
| calculator-snippets | Calculator logic | Validation, calculation, pricing |

## Integration Patterns

### Combining Prompts
```
1. Load base prompt from collection
2. Add project-specific context
3. Apply code snippet
4. Customize for requirements
```

### Prompt Chaining
```
[Prompt 1] Create custom post type
    ↓
[Prompt 2] Add meta boxes for post type
    ↓
[Prompt 3] Create custom template
```

## Performance Tips

### Efficient Usage
- Reference snippets by category, not full file
- Load only relevant sections
- Combine related prompts
- Cache frequently used patterns

### Optimization
- Keep snippets under 100 lines
- Use descriptive names
- Document dependencies
- Test code examples

## Related Documentation
- [Prompts](.github/prompts/) - Full prompt files
- [Prompt Snippets](.github/prompt-snippets/) - Code snippets
- [Agents](README.agents.md) - AI agent documentation
- [Instructions](README.instructions.md) - Operational guides

## Support
For collection-related questions:
1. Review example prompts
2. Check code snippet syntax
3. Test with your AI system
4. Consult CLAUDE.md for configuration

---
*Last updated: 2026-01-22*
