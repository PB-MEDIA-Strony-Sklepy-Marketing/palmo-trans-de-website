# Development Mode

## Activation

Add `[dev-mode]` to your prompt:
```
@wordpress-theme-agent [dev-mode]: Create a custom page template
```

---

## Characteristics

### 1. Verbose Explanations
- Detailed code comments
- Educational explanations
- "Why" behind decisions
- Alternative approaches discussed

### 2. Learning-Focused
- Step-by-step breakdowns
- Best practices explained
- Common pitfalls highlighted
- Links to documentation

### 3. Multiple Solutions
- Present 2-3 approaches
- Pros and cons of each
- Recommendation with reasoning
- Allow user to choose

### 4. Code Quality Focus
- Extensive inline comments
- PHPDoc for all functions
- Variable explanations
- Security considerations noted

---

## Example Response Format

```markdown
I'll create a custom page template. Let me explain the approach:

**Why This Solution:**
- Uses WordPress template hierarchy (more maintainable)
- Follows theme structure conventions
- Implements proper escaping for security
- Supports internationalization out of the box

**Alternative Approaches:**
1. Page builder plugin (easier but less flexible)
2. Custom Gutenberg block (modern but complex)
3. Template file (recommended for this use case)

**Implementation:**

Create: wp-content/themes/palmo-trans-de/template-services.php

```php
<?php
/**
 * Template Name: Services Page
 *
 * This template displays services in a grid layout.
 * It includes structured data for SEO.
 *
 * @package Palmo_Trans_DE
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main">
    <?php
    while ( have_posts() ) :
        the_post();

        /**
         * Title section with breadcrumbs
         */
        ?>
        <header class="page-header">
            <?php
            // Breadcrumbs for better UX and SEO
            if ( function_exists( 'palmo_breadcrumbs' ) ) {
                palmo_breadcrumbs();
            }
            ?>

            <h1 class="page-title"><?php the_title(); ?></h1>

            <?php if ( has_excerpt() ) : ?>
                <div class="page-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>
        </header>

        <?php
        /**
         * Query services
         * Using WP_Query for better control and caching
         */
        $services_query = new WP_Query( array(
            'post_type'      => 'service',
            'posts_per_page' => 12,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
        ) );

        if ( $services_query->have_posts() ) :
            ?>
            <div class="services-grid">
                <?php
                while ( $services_query->have_posts() ) :
                    $services_query->the_post();
                    ?>
                    <article class="service-card">
                        <?php
                        // Thumbnail with lazy loading for performance
                        if ( has_post_thumbnail() ) :
                            ?>
                            <div class="service-thumbnail">
                                <?php the_post_thumbnail( 'medium', array( 'loading' => 'lazy' ) ); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="service-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="service-excerpt">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="service-link">
                            <?php esc_html_e( 'Mehr erfahren', 'palmo-trans-de' ); ?>
                            <span aria-hidden="true">→</span>
                        </a>
                    </article>
                    <?php
                endwhile;
                ?>
            </div>

            <?php
            // Pagination for better UX with many services
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( '← Zurück', 'palmo-trans-de' ),
                'next_text' => __( 'Weiter →', 'palmo-trans-de' ),
            ) );
            ?>
            <?php
        else :
            ?>
            <p><?php esc_html_e( 'Keine Dienstleistungen gefunden.', 'palmo-trans-de' ); ?></p>
            <?php
        endif;

        // Reset post data to avoid conflicts
        wp_reset_postdata();
        ?>

    <?php endwhile; ?>
</main>

<?php
get_footer();
```

**How It Works:**
1. WordPress checks for template name in file header
2. Template appears in page editor dropdown
3. When selected, WordPress loads this file instead of page.php
4. WP_Query fetches services (cached automatically by WordPress)
5. Grid layout is responsive (handled in CSS)

**CSS to Add (assets/css/main.css):**
```css
/* Services grid - mobile first */
.services-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    margin: 2rem 0;
}

/* Tablet: 2 columns */
@media (min-width: 768px) {
    .services-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Desktop: 3 columns */
@media (min-width: 1024px) {
    .services-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.service-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.service-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.service-thumbnail img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
```

**Usage:**
1. Upload this file to: `wp-content/themes/palmo-trans-de/`
2. Go to Pages → Services Page → Page Attributes
3. Select "Services Page" template
4. Update page
5. View result

**Testing Checklist:**
- ✓ Mobile responsiveness (check on actual phone)
- ✓ No JavaScript errors (check browser console)
- ✓ Services display correctly
- ✓ Pagination works with > 12 services
- ✓ SEO: View source, check title and meta
- ✓ Accessibility: Tab through with keyboard
- ✓ Performance: Run Lighthouse audit

**Common Issues & Fixes:**
- Services not showing? Check post type is 'service'
- Layout broken? Ensure CSS is enqueued
- Images not loading? Check thumbnail support in functions.php

**Further Enhancements:**
- Add filtering by category
- Implement AJAX load more
- Add sorting options
- Include call-to-action button
```

---

## When to Use Development Mode

**Use dev-mode when:**
- Learning new WordPress concepts
- Need detailed explanations
- Want to understand the "why"
- Exploring multiple solutions
- Building complex features
- Teaching/sharing with team

**Don't use dev-mode when:**
- Need quick production code
- Time-sensitive tasks
- You're already familiar with the pattern
- Just need the code without explanation

---

## Version

**Mode Version:** 1.0.0
**Last Updated:** 2026-01-22
