# Bug Fix Prompt

## Template

```markdown
@[agent-name] [mode]:

**Bug:** [Short description]

**Current Behavior:**
[What happens now]

**Expected Behavior:**
[What should happen]

**Steps to Reproduce:**
1. Step 1
2. Step 2
3. Step 3

**Environment:**
- WordPress Version: [version]
- PHP Version: [version]
- Browser: [browser + version]
- Device: [desktop/mobile/tablet]

**Error Messages:**
```
[Paste any error messages]
```

**Relevant Files:**
- [file path 1]
- [file path 2]

**Priority:** Critical/High/Medium/Low
```

---

## Examples

### Example 1: Calculator Not Calculating

```markdown
@calculator-plugin-agent [dev-mode]:

**Bug:** Calculator returns "NaN" for price

**Current Behavior:**
When submitting calculator form with valid inputs, result shows "NaN €" instead of actual price.

**Expected Behavior:**
Should display calculated price (e.g., "125,50 €")

**Steps to Reproduce:**
1. Go to calculator page
2. Enter: From 10115, To 80331, Weight 150kg
3. Click "Preis berechnen"
4. Result shows "NaN €"

**Environment:**
- WordPress Version: 6.4
- PHP Version: 8.1.2
- Browser: Chrome 120.0
- Device: Desktop

**Error Messages:**
```
Console: Uncaught TypeError: Cannot read property 'toFixed' of undefined
  at calculator.js:45
```

**Relevant Files:**
- wp-content/plugins/palmo-calculator/public/js/calculator.js
- wp-content/plugins/palmo-calculator/includes/class-calculator.php

**Priority:** Critical
```

### Example 2: Broken Mobile Navigation

```markdown
@wordpress-theme-agent [prod-mode]:

**Bug:** Mobile menu doesn't close after clicking link

**Current Behavior:**
On mobile, clicking a menu item navigates to page but menu stays open.

**Expected Behavior:**
Menu should close automatically after link click.

**Steps to Reproduce:**
1. Open site on mobile (< 768px width)
2. Click hamburger icon to open menu
3. Click any menu link
4. Page changes but menu remains open

**Environment:**
- WordPress Version: 6.4
- Browser: Safari iOS 17
- Device: iPhone 14

**Relevant Files:**
- wp-content/themes/palmo-trans-de/assets/js/navigation.js

**Priority:** High
```

---

## Version

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
