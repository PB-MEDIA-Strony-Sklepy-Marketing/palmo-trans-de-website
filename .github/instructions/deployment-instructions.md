# Deployment Instructions

## Pre-Deployment Checklist

### Code Quality

- [ ] All files pass PHPCS WordPress standards
- [ ] No PHP errors/warnings
- [ ] JavaScript linted (ESLint)
- [ ] All strings translatable
- [ ] Security review completed
- [ ] Performance tested

### Testing

- [ ] Tested on PHP 8.0+
- [ ] Tested on WordPress 6.0+
- [ ] Mobile responsive verified
- [ ] Cross-browser tested (Chrome, Firefox, Safari, Edge)
- [ ] Forms working correctly
- [ ] Calculator functionality verified
- [ ] No console errors

### SEO & Performance

- [ ] Meta tags present on all pages
- [ ] Structured data validated
- [ ] Images optimized (WebP, lazy loading)
- [ ] Page speed score > 90
- [ ] Core Web Vitals pass
- [ ] XML sitemap generated

### Security

- [ ] All inputs validated
- [ ] All outputs escaped
- [ ] Nonces in place
- [ ] No hardcoded credentials
- [ ] File permissions correct (644 files, 755 directories)

---

## Deployment Process

### 1. Backup Current Site

```bash
# Database backup
wp db export backup-$(date +%Y%m%d-%H%M%S).sql

# Files backup
tar -czf backup-files-$(date +%Y%m%d-%H%M%S).tar.gz wp-content/
```

### 2. Upload Theme

```bash
# Via FTP/SFTP
upload: wp-content/themes/palmo-trans-de/

# Or via WP-CLI
wp theme install palmo-trans-de.zip --activate
```

### 3. Upload Plugin

```bash
# Via FTP/SFTP
upload: wp-content/plugins/palmo-calculator/

# Or via WP-CLI
wp plugin install palmo-calculator.zip --activate
```

### 4. Update WordPress

```bash
# Update core
wp core update

# Update plugins
wp plugin update --all

# Update themes
wp theme update --all
```

### 5. Flush Caches

```bash
wp cache flush
wp rewrite flush
```

### 6. Test Live Site

- [ ] Homepage loads
- [ ] All pages accessible
- [ ] Forms submit correctly
- [ ] Calculator works
- [ ] No broken images
- [ ] No JavaScript errors

---

## Rollback Procedure

If issues occur:

```bash
# 1. Restore database
wp db import backup-20260122-143000.sql

# 2. Restore files
tar -xzf backup-files-20260122-143000.tar.gz

# 3. Deactivate new theme/plugin
wp theme activate twentytwentyfour
wp plugin deactivate palmo-calculator

# 4. Clear caches
wp cache flush
```

---

## Production Environment Setup

### wp-config.php Settings

```php
// Disable debug in production
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );

// Enable caching
define( 'WP_CACHE', true );

// Security keys (generate: https://api.wordpress.org/secret-key/1.1/salt/)
define( 'AUTH_KEY', 'put your unique phrase here' );
// ... (all 8 keys)

// Force SSL
define( 'FORCE_SSL_ADMIN', true );

// Limit revisions
define( 'WP_POST_REVISIONS', 5 );

// Autosave interval
define( 'AUTOSAVE_INTERVAL', 300 );
```

### .htaccess Security

```apache
# Protect wp-config.php
<files wp-config.php>
order allow,deny
deny from all
</files>

# Disable directory browsing
Options -Indexes

# Protect .htaccess
<files .htaccess>
order allow,deny
deny from all
</files>
```

---

## Post-Deployment

### 1. Monitor Errors

```bash
# Check error log
tail -f wp-content/debug.log

# Check server error log
tail -f /var/log/apache2/error.log
```

### 2. Performance Check

- Run Google PageSpeed Insights
- Check Core Web Vitals
- Test with GTmetrix

### 3. SEO Verification

- Submit sitemap to Google Search Console
- Verify structured data
- Check robots.txt

---

## Version

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
