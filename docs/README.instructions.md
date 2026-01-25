# Operational Instructions Documentation

## Overview
Operational instructions provide step-by-step procedures for common development tasks in this WordPress project.

## Instruction Categories

### Development Workflows
- Local development setup
- Feature branch workflow
- Testing procedures
- Deployment process

### Code Quality
- Coding standards compliance
- Security best practices
- Performance optimization
- Accessibility guidelines

### Maintenance
- Plugin updates
- Theme updates
- Database maintenance
- Backup procedures

## Core Instructions

### 1. Local Development Setup

#### Prerequisites
```bash
# Required software
- PHP 8.1+
- MySQL 5.7+ or MariaDB 10.3+
- Node.js 18+
- Composer
- WP-CLI
```

#### Setup Steps
```bash
# 1. Clone repository
git clone https://github.com/username/palmo-trans-de-website.git
cd palmo-trans-de-website

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies
npm install

# 4. Configure WordPress
cp wp-config-sample.php wp-config.php
# Edit wp-config.php with database credentials

# 5. Install WordPress
wp core install \
  --url="http://localhost:8000" \
  --title="Palmo Trans DE" \
  --admin_user="admin" \
  --admin_email="admin@example.com"

# 6. Activate theme and plugins
wp theme activate palmo-trans-de
wp plugin activate palmo-calculator

# 7. Import sample data (optional)
wp import sample-data.xml --authors=create

# 8. Start development server
npm run dev
```

### 2. Feature Development Workflow

#### Branch Strategy
```bash
main (production)
  ├── develop (staging)
  │   ├── feature/calculator-enhancements
  │   ├── feature/new-template
  │   └── bugfix/postal-validation
  └── hotfix/critical-bug
```

#### Development Process
```bash
# 1. Create feature branch
git checkout develop
git pull origin develop
git checkout -b feature/new-feature

# 2. Develop feature
# - Write code
# - Follow WordPress coding standards
# - Add tests

# 3. Commit changes
git add .
git commit -m "feat: Add new feature description"

# 4. Push and create PR
git push origin feature/new-feature
gh pr create --base develop --title "Add new feature"

# 5. After approval, merge to develop
# Automatic deployment to staging environment

# 6. Test on staging
# - Manual testing
# - User acceptance

# 7. Merge to main for production
gh pr create --base main --head develop
# Requires approval from maintainers
```

### 3. Code Quality Checks

#### Before Committing
```bash
# 1. PHP Syntax Check
find wp-content -name "*.php" -exec php -l {} \;

# 2. WordPress Coding Standards
phpcs --standard=WordPress wp-content/themes/palmo-trans-de/
phpcs --standard=WordPress wp-content/plugins/palmo-calculator/

# 3. JavaScript Linting
npm run lint

# 4. CSS Linting
npm run lint:css

# 5. Run tests
npm test
```

#### Auto-fix Issues
```bash
# PHP Code Beautifier
phpcbf --standard=WordPress wp-content/themes/palmo-trans-de/

# JavaScript auto-fix
npm run lint:fix

# CSS auto-fix
npm run lint:css:fix
```

### 4. Security Guidelines

#### Input Validation
```php
// Always sanitize input
$postal_code = sanitize_text_field($_POST['postal_code']);
$weight = floatval($_POST['weight']);

// Validate data
if (!preg_match('/^[0-9]{5}$/', $postal_code)) {
    wp_send_json_error('Invalid postal code');
}
```

#### Output Escaping
```php
// Escape output
echo esc_html($user_input);
echo esc_url($url);
echo esc_attr($attribute);
```

#### Nonce Verification
```php
// Create nonce
wp_nonce_field('palmo_calculator_nonce', 'nonce');

// Verify nonce
if (!wp_verify_nonce($_POST['nonce'], 'palmo_calculator_nonce')) {
    wp_die('Security check failed');
}
```

#### SQL Queries
```php
// Use prepared statements
global $wpdb;
$results = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM {$wpdb->prefix}calculations WHERE postal_code = %s",
    $postal_code
));
```

### 5. Testing Procedures

#### Unit Tests
```bash
# Run PHP unit tests
composer test

# Run JavaScript tests
npm test

# Run specific test
npm test -- calculator.test.js
```

#### Integration Tests
```bash
# Run integration tests
npm run test:integration

# Test calculator API
curl -X POST http://localhost:8000/wp-admin/admin-ajax.php \
  -d "action=palmo_calculate" \
  -d "from_postal=10115" \
  -d "to_postal=80331" \
  -d "weight=150" \
  -d "urgency=normal"
```

#### Manual Testing Checklist
- [ ] Calculator form submission
- [ ] Postal code validation
- [ ] Price calculation accuracy
- [ ] Responsive design (mobile/tablet/desktop)
- [ ] Browser compatibility (Chrome, Firefox, Safari, Edge)
- [ ] Accessibility (keyboard navigation, screen readers)
- [ ] Performance (Lighthouse score > 90)

### 6. Deployment Process

#### Staging Deployment
```bash
# Automatic on push to develop
git push origin develop

# Monitor deployment
gh run list --branch develop

# Verify staging site
curl https://staging.palmotrans.de/
```

#### Production Deployment
```bash
# 1. Create release PR
gh pr create --base main --head develop \
  --title "Release v1.1.0" \
  --body "$(cat CHANGELOG.md | head -20)"

# 2. Request approval
# Requires 2 approvals from maintainers

# 3. After approval, merge
gh pr merge --merge

# 4. Monitor production deployment
gh run list --branch main

# 5. Verify production
curl https://palmotrans.de/

# 6. Tag release
git tag -a v1.1.0 -m "Release version 1.1.0"
git push origin v1.1.0
```

### 7. Performance Optimization

#### Image Optimization
```bash
# Compress images
npm run optimize:images

# Generate WebP versions
npm run generate:webp

# Verify optimization
npm run analyze:images
```

#### CSS/JS Optimization
```bash
# Minify assets
npm run build:production

# Analyze bundle size
npm run analyze:bundle

# Check for unused CSS
npm run purge:css
```

#### Database Optimization
```bash
# Optimize database tables
wp db optimize

# Clean up revisions
wp post delete $(wp post list --post_type=revision --format=ids)

# Remove transients
wp transient delete --all

# Regenerate thumbnails
wp media regenerate --yes
```

### 8. Backup Procedures

#### Manual Backup
```bash
# Backup database
wp db export backup-$(date +%Y%m%d).sql

# Backup uploads
tar -czf uploads-$(date +%Y%m%d).tar.gz wp-content/uploads/

# Backup plugins and themes
tar -czf code-$(date +%Y%m%d).tar.gz \
  wp-content/themes/palmo-trans-de/ \
  wp-content/plugins/palmo-calculator/
```

#### Automated Backup
```bash
# Runs daily via GitHub Actions
# See .github/workflows/backup.yml

# Restore from backup
wp db import backup-20260122.sql
tar -xzf uploads-20260122.tar.gz
```

### 9. Troubleshooting

#### Common Issues

**Issue: White screen of death**
```bash
# Enable debugging
wp config set WP_DEBUG true
wp config set WP_DEBUG_LOG true
tail -f wp-content/debug.log
```

**Issue: Plugin conflicts**
```bash
# Disable all plugins
wp plugin deactivate --all

# Enable one by one
wp plugin activate palmo-calculator
# Test site
```

**Issue: Performance problems**
```bash
# Check slow queries
wp db query "SHOW FULL PROCESSLIST;"

# Clear all caches
wp cache flush
wp transient delete --all

# Check disk space
df -h
```

## Best Practices

### Code Organization
- Follow WordPress file structure
- Use meaningful function/variable names
- Comment complex logic
- Keep functions focused (single responsibility)

### Version Control
- Write descriptive commit messages
- Create small, focused commits
- Keep branches up to date
- Delete merged branches

### Documentation
- Document public functions
- Update README when adding features
- Maintain CHANGELOG.md
- Add inline comments for complex code

### Security
- Validate all input
- Escape all output
- Use nonces for forms
- Prepare SQL statements
- Keep WordPress/plugins updated

## Quick Reference

### Common Commands
```bash
# Development
npm run dev              # Start development server
npm run build            # Build for production
npm run watch            # Watch for changes

# Testing
npm test                 # Run all tests
npm run lint             # Check code quality
composer test            # Run PHP tests

# WordPress
wp plugin list           # List plugins
wp theme list            # List themes
wp db export             # Export database
wp cache flush           # Clear cache

# Git
git status               # Check status
git log --oneline        # View commits
git branch -a            # List branches
gh pr list               # List PRs
```

### File Locations
```
wp-config.php            # WordPress configuration
.env                     # Environment variables
wp-content/themes/       # Theme files
wp-content/plugins/      # Plugin files
wp-content/uploads/      # Media files
wp-content/debug.log     # Debug log
```

## Related Documentation
- [ARCHITECTURE.md](ARCHITECTURE.md) - System architecture
- [CONTRIBUTING.md](../CONTRIBUTING.md) - Contribution guidelines
- [API-DOCUMENTATION.md](API-DOCUMENTATION.md) - API reference
- [SECURITY.md](../SECURITY.md) - Security policy

## Support
For operational issues:
1. Check this instruction manual
2. Review error logs
3. Test on staging first
4. Contact development team

---
*Last updated: 2026-01-22*
