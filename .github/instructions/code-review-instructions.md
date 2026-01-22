# Code Review Instructions

## Overview

This document provides guidelines for AI-assisted code review of the Palmo Trans DE WordPress project.

---

## Review Checklist

### Security Review

- [ ] **Input Validation**
  - All user inputs validated
  - Type checking implemented
  - Range/format validation
  - Whitelist approach used

- [ ] **Output Escaping**
  - `esc_html()` for HTML content
  - `esc_url()` for URLs
  - `esc_attr()` for attributes
  - `wp_kses()` for allowed HTML

- [ ] **SQL Injection Prevention**
  - No direct SQL queries
  - Use WordPress functions (`get_posts`, `WP_Query`)
  - If custom SQL: use `$wpdb->prepare()`
  - No user input in queries without sanitization

- [ ] **CSRF Protection**
  - Nonces in all forms
  - Nonces verified in handlers
  - Action-specific nonces
  - Nonce field + check nonce pattern

- [ ] **Authentication & Authorization**
  - User capabilities checked
  - Sensitive operations protected
  - No hardcoded credentials
  - Proper role-based access

### WordPress Standards

- [ ] **Coding Standards (WPCS)**
  - Indentation: tabs (PHP), spaces (JS)
  - Brace style: Allman for PHP
  - Yoda conditions: `if ( 'value' === $var )`
  - Variable naming: snake_case
  - Function naming: snake_case with prefix

- [ ] **Hooks Usage**
  - Actions vs filters used correctly
  - Priority specified when needed
  - Removable hooks (no anonymous functions if needed)

- [ ] **Localization**
  - All strings wrapped in translation functions
  - Correct text domain: `palmo-trans-de`
  - Translator comments for complex strings
  - Plural forms handled

### Performance

- [ ] **Database Queries**
  - Queries minimized (no N+1 problems)
  - Caching implemented where appropriate
  - Transients for expensive operations
  - Only required fields fetched

- [ ] **Asset Loading**
  - Scripts/styles enqueued properly
  - Dependencies declared
  - Version numbers for cache busting
  - Deferred/async where appropriate

- [ ] **Caching**
  - Expensive operations cached
  - Cache invalidation strategy
  - Reasonable expiration times

### Code Quality

- [ ] **Comments & Documentation**
  - PHPDoc for functions/classes
  - Complex logic explained
  - No commented-out code
  - Inline comments for "why" not "what"

- [ ] **Error Handling**
  - Errors handled gracefully
  - WP_Error for internal errors
  - User-friendly error messages
  - Logging for debugging

- [ ] **Code Organization**
  - Functions < 50 lines
  - Single responsibility principle
  - No duplicate code
  - Proper file organization

---

## Review Process

### 1. Initial Scan

```markdown
**File:** wp-content/themes/palmo-trans-de/functions.php

**Quick Observations:**
- 247 lines total
- 12 functions defined
- 3 action hooks
- 2 filter hooks

**Potential Issues Spotted:**
1. Line 45: Possible SQL injection (line 45)
2. Line 102: Missing nonce verification
3. Line 187: Untranslated string
```

### 2. Security Deep Dive

Check each security category in detail:

```markdown
**Security Audit:**

✅ Input Validation: Good
  - Line 34: Postal code validation proper
  - Line 67: Weight validation implemented

❌ Output Escaping: ISSUES FOUND
  - Line 102: Missing esc_html() on user input
  - Line 145: URL not escaped with esc_url()

✅ SQL Injection: Safe
  - Using WP_Query throughout
  - No direct database access

❌ CSRF Protection: MISSING
  - Line 89: Form without nonce
  - Line 95: AJAX handler without nonce verification
```

### 3. Standards Compliance

```markdown
**WordPress Coding Standards:**

❌ Formatting Issues:
  - Line 23: Spaces instead of tabs
  - Line 56: Missing braces on if statement
  - Line 78: Non-Yoda condition

✅ Naming Conventions: Good
  - All functions prefixed with palmo_
  - Snake_case used consistently

❌ Localization:
  - Line 112: Hardcoded string "Calculate Now"
  - Line 134: Missing text domain
```

### 4. Recommendations

```markdown
**Priority Fixes (CRITICAL):**

1. **Line 102 - XSS Vulnerability**
   ```php
   // BEFORE (vulnerable)
   echo $user_input;

   // AFTER (secure)
   echo esc_html( $user_input );
   ```

2. **Line 89 - CSRF Vulnerability**
   ```php
   // ADD nonce field
   wp_nonce_field( 'palmo_calculator_action', 'palmo_calculator_nonce' );

   // ADD verification in handler
   if ( ! isset( $_POST['palmo_calculator_nonce'] ) ||
        ! wp_verify_nonce( $_POST['palmo_calculator_nonce'], 'palmo_calculator_action' ) ) {
       wp_die( 'Security check failed' );
   }
   ```

**Improvements (HIGH):**

1. **Localization**
   ```php
   // Wrap all strings
   echo esc_html__( 'Calculate Now', 'palmo-trans-de' );
   ```

2. **Performance**
   ```php
   // Add caching
   $results = get_transient( 'palmo_services' );
   if ( false === $results ) {
       $results = expensive_query();
       set_transient( 'palmo_services', $results, HOUR_IN_SECONDS );
   }
   ```

**Nice to Have (MEDIUM):**

1. Add PHPDoc comments
2. Split long functions
3. Extract magic numbers to constants
```

---

## Review Templates

### Security Issue Template

```markdown
**Security Issue:** [Type]
**Severity:** Critical/High/Medium/Low
**File:** [path]
**Line:** [number]

**Issue:**
[Description of the vulnerability]

**Risk:**
[What could happen if exploited]

**Fix:**
```php
// Vulnerable code
[current code]

// Secure code
[fixed code]
```

**References:**
- [Link to WordPress Codex or security documentation]
```

### Performance Issue Template

```markdown
**Performance Issue:** [Type]
**Impact:** High/Medium/Low
**File:** [path]
**Line:** [number]

**Issue:**
[Description of performance problem]

**Measurement:**
[If available: queries, time, memory]

**Fix:**
```php
// Current (slow)
[current code]

// Optimized
[optimized code]
```

**Expected Improvement:**
[e.g., "Reduces DB queries from 50 to 1"]
```

---

## Automated Checks

Run these before manual review:

### PHP_CodeSniffer (WordPress Coding Standards)

```bash
phpcs --standard=WordPress wp-content/themes/palmo-trans-de/
phpcs --standard=WordPress wp-content/plugins/palmo-calculator/
```

### PHP Stan (Static Analysis)

```bash
phpstan analyze wp-content/themes/palmo-trans-de/ --level=5
```

### ESLint (JavaScript)

```bash
eslint wp-content/themes/palmo-trans-de/assets/js/
```

---

## Review Prioritization

1. **Critical** - Security vulnerabilities (XSS, SQL injection, CSRF)
2. **High** - Data loss risks, broken functionality
3. **Medium** - Performance issues, standards violations
4. **Low** - Code style, minor optimizations

---

## Version

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
