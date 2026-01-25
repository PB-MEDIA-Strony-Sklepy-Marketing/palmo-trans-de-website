# Prompts Documentation

## Overview
This document provides comprehensive guidance on using AI prompts effectively for WordPress development in this project.

## Prompt Structure

### Basic Anatomy
```
[Context] + [Task] + [Constraints] + [Output Format]
```

**Example:**
```
Context: Working on palmo-trans-de theme
Task: Create a custom page template for services
Constraints: Must support Gutenberg blocks, responsive design
Output Format: Complete PHP file with comments
```

## Prompt Categories

### 1. Theme Development Prompts

#### Template Creation
```
Create a custom WordPress page template for [purpose] that:
- Uses template name: [name]
- Includes [sections/components]
- Supports Gutenberg blocks
- Is responsive and accessible
- Follows WordPress coding standards
```

**Example:**
```
Create a custom WordPress page template for transport services that:
- Uses template name: "Services Page"
- Includes hero section, service grid, calculator widget, contact CTA
- Supports Gutenberg blocks in main content area
- Is responsive (mobile-first) and accessible (WCAG 2.1 AA)
- Follows WordPress coding standards
```

#### Custom Post Types
```
Register a custom post type for [content type] with:
- Post type slug: [slug]
- Labels: [singular/plural]
- Supports: [features]
- Taxonomies: [categories/tags]
- Archive settings: [yes/no]
- REST API: [enabled/disabled]
```

#### Widget Development
```
Create a WordPress widget for [purpose] that:
- Widget ID: [id]
- Widget name: [name]
- Configurable options: [list]
- Output: [HTML structure]
- Styling: [CSS approach]
```

### 2. Plugin Development Prompts

#### AJAX Handler
```
Create a WordPress AJAX handler for [action] that:
- Action name: [ajax_action]
- Accepts parameters: [list]
- Validates input: [validation rules]
- Returns: [JSON response structure]
- Handles errors: [error cases]
- Security: [nonce verification]
```

**Example:**
```
Create a WordPress AJAX handler for transport price calculation that:
- Action name: palmo_calculate
- Accepts parameters: from_postal, to_postal, weight, urgency
- Validates input: 5-digit postal codes, weight 1-10000 kg
- Returns: JSON with distance, price, currency
- Handles errors: Invalid input, API failures
- Security: nonce verification required
```

#### REST API Endpoint
```
Create a WordPress REST API endpoint for [resource] that:
- Route: /wp-json/[namespace]/v1/[endpoint]
- Method: [GET/POST/PUT/DELETE]
- Parameters: [list]
- Authentication: [required/optional]
- Response: [structure]
- Permissions: [callback]
```

#### Admin Interface
```
Create a WordPress admin page for [purpose] that:
- Menu location: [top-level/submenu]
- Page slug: [slug]
- Capability: [required capability]
- Sections: [tabs/fields]
- Settings API: [yes/no]
- Saves data to: [options/post meta]
```

### 3. SEO Optimization Prompts

#### Schema Markup
```
Generate Schema.org structured data for [type] that:
- Schema type: [LocalBusiness/Service/etc]
- Required properties: [list]
- Optional properties: [list]
- Output format: JSON-LD
- Placement: [hook location]
```

**Example:**
```
Generate Schema.org structured data for transport company that:
- Schema type: LocalBusiness
- Required properties: name, address, telephone, geo coordinates
- Optional properties: priceRange, openingHours, areaServed
- Output format: JSON-LD
- Placement: wp_head hook
```

#### Meta Tags
```
Optimize meta tags for [page type] including:
- Title: [format, max 60 chars]
- Description: [format, max 160 chars]
- Open Graph: [og:* tags]
- Twitter Card: [twitter:* tags]
- Canonical: [URL structure]
```

#### Performance Optimization
```
Optimize [resource type] for performance by:
- Target metric: [LCP/FID/CLS]
- Current score: [baseline]
- Goal: [target score]
- Techniques: [list methods]
- Testing: [verification approach]
```

### 4. Debugging Prompts

#### Error Analysis
```
Debug [error type] that occurs when:
- Trigger: [user action/condition]
- Error message: [exact message]
- Expected behavior: [what should happen]
- Current behavior: [what actually happens]
- Environment: [dev/staging/prod]
- Browser/PHP version: [details]
```

#### Code Review
```
Review [file/function] for:
- Security vulnerabilities: [SQL injection, XSS, etc]
- Performance issues: [N+1 queries, inefficient loops]
- Code standards: [WordPress coding standards]
- Best practices: [DRY, SOLID principles]
- Accessibility: [ARIA, semantic HTML]
```

## Advanced Prompt Patterns

### Multi-Step Implementation
```
Step 1: Analyze [current implementation]
Step 2: Design [solution approach]
Step 3: Implement [code changes]
Step 4: Test [verification]
Step 5: Document [usage notes]
```

### Iterative Refinement
```
Version 1: Basic implementation of [feature]
Feedback: [issues/improvements needed]
Version 2: Enhanced with [additions]
Feedback: [further refinements]
Final: Production-ready [feature]
```

### Context-Aware Prompting
```
Project context:
- Codebase: WordPress 6.4+, PHP 8.1+
- Theme: palmo-trans-de (custom)
- Plugins: palmo-calculator (custom)
- Database: MySQL 8.0
- Hosting: [environment details]

Current task: [specific task]
Previous work: [related implementations]
Dependencies: [affected components]
```

## Prompt Optimization

### Clarity Enhancement
❌ **Vague:**
```
Fix the calculator
```

✅ **Clear:**
```
Fix postal code validation in palmo-calculator plugin:
- Issue: Accepts invalid German postal codes (e.g., "00000")
- Expected: Only 01000-99999 range valid
- File: wp-content/plugins/palmo-calculator/includes/class-calculator.php
- Function: validate_postal_code()
```

### Specificity
❌ **Generic:**
```
Improve performance
```

✅ **Specific:**
```
Reduce Largest Contentful Paint (LCP) on homepage from 3.5s to <2.5s by:
- Optimizing hero image (currently 2MB, uncompressed)
- Implementing lazy loading for below-fold images
- Deferring non-critical JavaScript
- Adding resource hints for critical assets
```

### Output Format
```
Specify desired output format:
- Complete file: "Provide full [filename] content"
- Code snippet: "Provide only the [function/class] code"
- Explanation: "Explain the approach without code"
- Documentation: "Generate JSDoc/PHPDoc comments"
```

## Integration with AI Systems

### Claude Projects
```markdown
# In Claude interface
Use project context from CLAUDE.md
Reference: docs/README.prompts.md for patterns
Apply: wordpress-snippets.md for code examples

Prompt: [your task using patterns above]
```

### Ollama
```bash
# Load context
ollama run codellama "$(cat docs/README.prompts.md)

Your task: [specific WordPress development task]
Context: Palmo Trans DE WordPress site
Requirements: [list requirements]"
```

### Qwen
```
Load: docs/README.prompts.md
Load: .github/prompt-snippets/wordpress-snippets.md

Task: [development task]
Follow patterns: [prompt category from this doc]
```

## Prompt Templates

### Bug Fix Template
```markdown
# Bug Report
**Description:** [What's wrong]
**Steps to Reproduce:**
1. [Step 1]
2. [Step 2]
3. [Step 3]

**Expected:** [What should happen]
**Actual:** [What actually happens]
**Environment:** [Browser, PHP version, WordPress version]
**Error Log:** [Relevant error messages]

# Prompt
Debug and fix the [component] issue where [description].
Review file: [path]
Check for: [potential causes]
Provide: [solution approach]
```

### Feature Implementation Template
```markdown
# Feature Request
**Feature:** [Feature name]
**User Story:** As a [role], I want [goal] so that [benefit]
**Acceptance Criteria:**
- [ ] [Criterion 1]
- [ ] [Criterion 2]
- [ ] [Criterion 3]

# Prompt
Implement [feature] for [component] that:
- Functionality: [detailed description]
- Integration points: [where it connects]
- UI/UX: [user interface requirements]
- Validation: [input validation rules]
- Testing: [test cases to cover]
```

### Code Review Template
```markdown
# Review Request
**Files Changed:** [list]
**Purpose:** [What this PR does]
**Areas of Concern:** [Specific review focus]

# Prompt
Review the following code changes for:
1. Security: [OWASP Top 10, WordPress security best practices]
2. Performance: [N+1 queries, caching opportunities]
3. Standards: [WordPress coding standards, PSR-12]
4. Maintainability: [Code organization, documentation]
5. Testing: [Test coverage, edge cases]

Files: [list with key changes noted]
```

## Best Practices

### Do's ✅
- Provide complete context
- Be specific about requirements
- Include example data/output
- Specify constraints clearly
- Reference existing patterns
- Request explanations when learning

### Don'ts ❌
- Assume context without stating it
- Use vague language
- Skip validation requirements
- Omit security considerations
- Ignore coding standards
- Request code without understanding

## Troubleshooting Prompts

### When Output is Incorrect
```
The generated [component] doesn't [expected behavior].
Expected: [detailed expectation]
Got: [actual output]
Review: [specific areas to check]
Constraints: [requirements not met]
```

### When Stuck
```
I'm trying to [goal] but [obstacle].
Attempted: [what you tried]
Error: [any error messages]
Question: [specific question]
Context: [relevant code/files]
```

## Quick Reference

### Prompt Components Checklist
- [ ] Clear task description
- [ ] Relevant context provided
- [ ] Constraints specified
- [ ] Output format defined
- [ ] Example data included (if applicable)
- [ ] Security requirements noted
- [ ] Testing approach mentioned

### Common Prompt Patterns
| Pattern | Use Case | Example |
|---------|----------|---------|
| Create X that does Y | New implementation | "Create widget that displays recent posts" |
| Debug X when Y | Troubleshooting | "Debug calculator when postal code is empty" |
| Optimize X for Y | Performance | "Optimize images for Core Web Vitals" |
| Review X for Y | Code quality | "Review AJAX handler for security issues" |
| Explain X in Y | Learning | "Explain hooks in beginner-friendly terms" |

## Related Documentation
- [Collections](README.collections.md) - Prompt collections and snippets
- [Agents](README.agents.md) - AI agent documentation
- [Instructions](README.instructions.md) - Operational procedures
- [CLAUDE.md](../CLAUDE.md) - Claude configuration

## Support
For prompt-related questions:
1. Review prompt patterns in this document
2. Check example prompts in collections
3. Test with clear, specific prompts
4. Iterate based on AI responses

---
*Last updated: 2026-01-22*
