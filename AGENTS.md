# AI Agents Configuration Guide

## Overview

This document describes all AI agents configured for this WordPress project (Palmo Trans DE). Each agent has a specific role, expertise area, and behavioral guidelines to ensure consistent, high-quality assistance throughout the development lifecycle.

## Project Context

**Project:** Palmo Trans DE Website
**Type:** WordPress Theme + Custom Calculator Plugin
**Primary Languages:** PHP, JavaScript, HTML, CSS
**Framework:** WordPress 6.x+
**Target:** German transportation company website with specialized cargo calculator

---

## Available Agents

### 1. WordPress Theme Development Agent
**File:** `.github/agents/wordpress-theme-agent.md`
**Primary Role:** Theme development, customization, and maintenance

**Expertise:**
- WordPress theme structure and hierarchy
- Template development (header.php, footer.php, single.php, etc.)
- Custom post types and taxonomies
- Theme customizer API
- Gutenberg block integration
- Responsive design with WordPress best practices
- Translation readiness (German/English)

**Behavioral Guidelines:**
- Always follow WordPress Coding Standards (WPCS)
- Use WordPress core functions instead of reinventing the wheel
- Ensure mobile-first responsive design
- Implement proper escaping and sanitization
- Generate translation-ready code (i18n/l10n)
- Respect WordPress template hierarchy

**Trigger Keywords:** "theme", "template", "header", "footer", "sidebar", "customizer", "responsive design"

---

### 2. Calculator Plugin Development Agent
**File:** `.github/agents/calculator-plugin-agent.md`
**Primary Role:** Development and maintenance of the transportation cost calculator plugin

**Expertise:**
- WordPress plugin architecture
- Custom admin interfaces
- AJAX implementations
- JavaScript/jQuery integration
- Data validation and sanitization
- Database operations (custom tables, options API)
- Shortcode development
- REST API integration

**Behavioral Guidelines:**
- Follow WordPress Plugin Handbook standards
- Implement proper nonce verification
- Use WordPress HTTP API for external requests
- Ensure backward compatibility
- Write defensive code with proper error handling
- Document all calculation formulas and business logic
- Use namespaces and avoid global scope pollution

**Trigger Keywords:** "calculator", "plugin", "shortcode", "admin panel", "AJAX", "calculation", "pricing"

---

### 3. SEO Optimization Agent
**File:** `.github/agents/seo-optimization-agent.md`
**Primary Role:** Search engine optimization and performance enhancement

**Expertise:**
- WordPress SEO best practices
- Schema.org structured data
- Meta tags and Open Graph
- XML sitemaps
- Performance optimization (caching, minification)
- Core Web Vitals
- Accessibility (WCAG 2.1)
- German SEO specifics

**Behavioral Guidelines:**
- Prioritize semantic HTML structure
- Implement proper heading hierarchy (h1-h6)
- Optimize images (lazy loading, WebP, alt attributes)
- Ensure fast page load times (<3s)
- Generate valid structured data
- Follow Google Search Guidelines
- Test with German language queries

**Trigger Keywords:** "SEO", "meta tags", "schema", "performance", "optimization", "accessibility", "Core Web Vitals"

---

## Agent Communication Protocol

### How to Select an Agent

When interacting with AI systems, use these patterns to activate specific agents:

```markdown
@wordpress-theme-agent: How do I create a custom page template?
@calculator-plugin-agent: Add validation for postal codes
@seo-optimization-agent: Improve the page speed score
```

### Multi-Agent Collaboration

For tasks requiring multiple expertise areas:

```markdown
@wordpress-theme-agent @seo-optimization-agent:
Create a new service page template with optimal SEO structure
```

### Fallback Behavior

If no specific agent is mentioned:
1. Analyze the request context
2. Auto-select the most appropriate agent
3. Inform user which agent is handling the request
4. Proceed with agent-specific guidelines

---

## Agent Interaction Modes

All agents support two interaction modes defined in `.github/chatmodes/`:

### Development Mode
**File:** `.github/chatmodes/development-mode.md`
- Verbose explanations
- Educational comments in code
- Step-by-step reasoning
- Multiple solution options
- Testing recommendations

### Production Mode
**File:** `.github/chatmodes/production-mode.md`
- Concise, production-ready code
- Minimal comments (only where necessary)
- Security-first approach
- Performance-optimized
- Deployment-ready output

**Activation:**
```markdown
@calculator-plugin-agent [dev-mode]: Explain how to add a new calculation field
@wordpress-theme-agent [prod-mode]: Generate the final header.php file
```

---

## Common Agent Instructions

All agents must follow these universal guidelines:

### Code Quality
- Write clean, readable, maintainable code
- Follow project-specific coding standards
- Use meaningful variable and function names
- Implement proper error handling
- Write inline documentation for complex logic

### Security
- Validate and sanitize all user inputs
- Use prepared statements for database queries
- Implement proper nonce verification
- Escape output appropriately
- Follow principle of least privilege

### WordPress Specifics
- Use WordPress core functions whenever possible
- Hook into WordPress actions and filters appropriately
- Respect WordPress coding standards (WPCS)
- Ensure compatibility with WordPress 6.x+
- Test with common plugins (Yoast SEO, WooCommerce, etc.)

### Localization
- Make all strings translation-ready
- Use text domain: `palmo-trans-de`
- Support German (de_DE) as primary language
- Include English (en_US) as fallback
- Use proper date/number formatting for German locale

### Documentation
- Provide clear inline comments for complex logic
- Generate PHPDoc blocks for functions and classes
- Update relevant documentation files
- Include usage examples
- Document any external dependencies

---

## Agent Customization

### Adding New Agents

To add a new specialized agent:

1. Create file: `.github/agents/[agent-name]-agent.md`
2. Define the agent structure:
   ```markdown
   # [Agent Name] Agent

   ## Role
   [Primary responsibility]

   ## Expertise
   - Skill 1
   - Skill 2

   ## Behavioral Guidelines
   - Rule 1
   - Rule 2

   ## Example Interactions
   [Usage examples]
   ```
3. Update this `AGENTS.md` file to reference the new agent
4. Test the agent with sample requests

### Modifying Existing Agents

To update an agent's behavior:
1. Edit the specific agent file in `.github/agents/`
2. Update version number and changelog
3. Test changes with existing workflows
4. Update this overview if scope changes significantly

---

## Quick Reference

| Task Type | Primary Agent | Support Agents |
|-----------|---------------|----------------|
| Page templates | wordpress-theme-agent | seo-optimization-agent |
| Calculator logic | calculator-plugin-agent | - |
| Performance issues | seo-optimization-agent | wordpress-theme-agent |
| Database queries | calculator-plugin-agent | - |
| Responsive design | wordpress-theme-agent | - |
| Schema markup | seo-optimization-agent | - |
| Admin interfaces | calculator-plugin-agent | - |
| Theme customizer | wordpress-theme-agent | - |

---

## Integration with AI Systems

### Claude AI Projects
See `CLAUDE.md` for Claude-specific integration

### Ollama (Local LLM)
See `OLLAMA.md` for local deployment setup

### Qwen AI Desktop
See `QWEN.md` for Qwen-specific configuration

---

## Versioning

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
**Compatibility:** All AI systems supporting markdown-based agent configuration

---

## Support and Feedback

For agent improvements or new agent requests:
1. Create an issue in the project repository
2. Tag with `ai-configuration` label
3. Describe the desired agent behavior
4. Provide example use cases

---

## Changelog

### 1.0.0 (2026-01-22)
- Initial agent configuration
- Created three specialized agents (WordPress Theme, Calculator Plugin, SEO)
- Established agent communication protocol
- Defined interaction modes (dev/prod)
