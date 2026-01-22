# Production Mode

## Activation

Add `[prod-mode]` to your prompt:
```
@wordpress-theme-agent [prod-mode]: Create footer template
```

---

## Characteristics

### 1. Concise Code
- Minimal comments
- No explanations unless critical
- Production-ready immediately
- Clean, efficient

### 2. Focus on Output
- Just the code needed
- File paths clearly stated
- No alternatives discussed
- Direct implementation

### 3. Security First
- All security measures implemented
- No shortcuts for "simplicity"
- Proper escaping, sanitization
- Nonce verification included

### 4. Performance Optimized
- Cached where appropriate
- Lazy loading implemented
- Minification-ready
- Database query optimization

---

## Example Response Format

```markdown
Create: wp-content/themes/palmo-trans-de/footer.php

```php
<?php
/**
 * Footer template
 *
 * @package Palmo_Trans_DE
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

    <footer id="colophon" class="site-footer">
        <?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
            <div class="footer-widgets">
                <div class="container">
                    <div class="footer-columns">
                        <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
                            <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
                                <div class="footer-column">
                                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-info">
                    <p class="copyright">
                        &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </p>

                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ) );
                    ?>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
```

Usage: Standard WordPress footer. Widgets in Appearance → Widgets.
```

---

## Response Rules

1. **No explanations** - Code speaks for itself
2. **No alternatives** - One best solution
3. **No learning content** - Just what's needed
4. **File path first** - Always start with location
5. **Usage notes** - One line max

---

## When to Use Production Mode

**Use prod-mode when:**
- ✅ Deploying to production
- ✅ Time-sensitive deadlines
- ✅ You know what you need
- ✅ Quick fixes required
- ✅ Senior developers
- ✅ Established patterns

**Don't use prod-mode when:**
- ❌ Learning new concepts
- ❌ Complex architectural decisions
- ❌ Need to understand "why"
- ❌ Training team members

---

## Code Quality in Production Mode

Even though concise, ALL code includes:
- ✅ Security (escaping, sanitization, nonces)
- ✅ Performance optimization
- ✅ WordPress standards compliance
- ✅ Internationalization
- ✅ Error handling
- ✅ Accessibility

**No corners cut.** Ever.

---

## Version

**Mode Version:** 1.0.0
**Last Updated:** 2026-01-22
