# Feature Development Prompt

## Template

Use this template when requesting new feature development:

```markdown
@[agent-name] [mode]:

**Feature:** [Feature name]

**Description:**
[What the feature should do]

**Requirements:**
- Requirement 1
- Requirement 2
- Requirement 3

**Acceptance Criteria:**
- [ ] Criterion 1
- [ ] Criterion 2
- [ ] Criterion 3

**Technical Constraints:**
- [Any limitations or requirements]

**Priority:** Critical/High/Medium/Low
```

---

## Examples

### Example 1: New Calculator Field

```markdown
@calculator-plugin-agent [dev-mode]:

**Feature:** Add cargo dimensions field to calculator

**Description:**
Allow users to input cargo dimensions (length × width × height) in centimeters. Calculate volumetric weight if it exceeds actual weight. Use higher of actual vs volumetric weight for pricing.

**Requirements:**
- Three input fields: length, width, height (cm)
- Validation: min 1cm, max 600cm per dimension
- Calculate volumetric weight: (L × W × H) / 5000
- Use max(actual_weight, volumetric_weight) for pricing
- German labels and error messages

**Acceptance Criteria:**
- [ ] Dimension fields appear in calculator form
- [ ] Validation prevents invalid dimensions
- [ ] Volumetric weight calculated correctly
- [ ] Price uses higher weight value
- [ ] Error messages in German
- [ ] Responsive on mobile

**Technical Constraints:**
- Must integrate with existing calculator AJAX handler
- Follow current validation patterns
- Maintain backward compatibility

**Priority:** High
```

### Example 2: Service Archive Page

```markdown
@wordpress-theme-agent [prod-mode]:

**Feature:** Custom archive template for services

**Description:**
Create archive-service.php with filtering by service category, responsive grid layout, and SEO optimization.

**Requirements:**
- Grid layout (1 col mobile, 2 col tablet, 3 col desktop)
- Filter by service category (dropdown)
- Pagination (12 per page)
- Structured data for each service
- Breadcrumbs

**Acceptance Criteria:**
- [ ] Archive displays services in grid
- [ ] Category filter works via AJAX
- [ ] Pagination functional
- [ ] Schema.org markup present
- [ ] Mobile responsive

**Priority:** Medium
```

---

## Version

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
