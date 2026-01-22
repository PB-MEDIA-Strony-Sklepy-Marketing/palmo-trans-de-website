# Qwen AI Desktop - Configuration Guide

## Overview

This document provides configuration instructions for using Qwen AI Desktop with the Palmo Trans DE WordPress project. Qwen is Alibaba Cloud's powerful AI model available as a desktop application with strong multilingual support.

---

## What is Qwen AI Desktop?

**Qwen (通义千问)** is an AI assistant with:
- ✅ **Multilingual** - Excellent Chinese, English, German support
- ✅ **Code Generation** - Strong at PHP, JavaScript, Python
- ✅ **Desktop App** - User-friendly interface
- ✅ **Context Awareness** - Understands project structure
- ✅ **Free Tier** - Limited free usage available
- ❌ **Internet Required** - Cloud-based processing
- ❌ **Privacy** - Data processed on Alibaba servers

---

## Installation

### Windows
1. Download from: https://qianwen.aliyun.com/download
2. Run installer: `QwenAI-Setup.exe`
3. Login with Alibaba Cloud account (or create one)
4. Complete setup wizard

### macOS
1. Download: https://qianwen.aliyun.com/download
2. Open `QwenAI.dmg`
3. Drag to Applications
4. Login with credentials

### Linux (AppImage)
```bash
wget https://qianwen.aliyun.com/download/QwenAI-x86_64.AppImage
chmod +x QwenAI-x86_64.AppImage
./QwenAI-x86_64.AppImage
```

---

## Initial Setup

### 1. Configure Project Context

In Qwen AI Desktop:

1. **Settings** → **Knowledge Base**
2. **Add Project** → Select project folder: `palmo-trans-de-website`
3. **Index Files** - Enable indexing for:
   - ✅ `.php` files
   - ✅ `.js` files
   - ✅ `.css` files
   - ✅ `.md` files
   - ❌ `.git` folder
   - ❌ `node_modules` folder
   - ❌ `wp-admin`, `wp-includes` folders

4. **Wait for indexing** (may take 2-5 minutes)

### 2. Import Project Instructions

1. **Settings** → **System Prompt**
2. Click **Import from File**
3. Select `CLAUDE.md` (Qwen will adapt the instructions)
4. Alternatively, paste this custom prompt:

```
You are an expert WordPress developer assistant for Palmo Trans DE project.

Project Info:
- WordPress 6.x+ theme and custom calculator plugin
- PHP 8.1+, MySQL, JavaScript (ES6+)
- Primary language: German (de_DE)
- Text domain: palmo-trans-de

Core Principles:
1. Follow WordPress Coding Standards (WPCS)
2. Security first: sanitize inputs, escape outputs, use nonces
3. Internationalization: all strings must be translatable
4. Use WordPress core functions (no raw SQL)
5. Mobile-first responsive design
6. Comment complex logic with PHPDoc

Available Agents:
- @wordpress-theme-agent - Theme development
- @calculator-plugin-agent - Calculator plugin features
- @seo-optimization-agent - SEO and performance

When providing code:
- Include file path
- Explain reasoning
- Provide complete examples
- Add error handling
- Follow WordPress best practices

德语翻译注意事项 (German translation notes):
- Professional business tone
- Use "Sie" (formal you)
- Proper compound nouns (e.g., "Transportkosten" not "Transport Kosten")
- Follow German capitalization rules
```

### 3. Configure Code Style

1. **Settings** → **Code Generation**
2. **Language:** PHP, JavaScript
3. **Style Guide:** WordPress Coding Standards
4. **Indentation:** Tabs (for PHP), Spaces (for JS)
5. **Line Length:** 120 characters
6. **Documentation:** PHPDoc enabled

---

## Usage Patterns

### Chat Interface

#### Basic Questions
```
Q: How do I register a custom post type in WordPress?
A: [Qwen provides code with explanation]
```

#### Agent-Specific Queries
```
Q: @wordpress-theme-agent: Create a custom page template for services
A: [Qwen generates template with theme-specific code]

Q: @calculator-plugin-agent [dev-mode]: Add postal code validation
A: [Qwen provides detailed code with educational comments]
```

#### Multilingual Support
```
Q: Erstelle eine Funktion zur Validierung deutscher Postleitzahlen
   (Create a function for validating German postal codes)
A: [Qwen responds in German with code]

Q: Translate this error message to German: "Invalid input"
A: "Ungültige Eingabe"
```

### Code Generation

#### Generate Function
```
Q: Generate a WordPress function to calculate shipping cost based on:
   - Distance (km)
   - Weight (kg)
   - Urgency (normal/express)

A: [Complete function with validation and documentation]
```

#### Generate Shortcode
```
Q: Create a shortcode [palmo_services] that displays recent services in a grid

A: [Complete shortcode implementation with styling]
```

#### Generate Admin Page
```
Q: @calculator-plugin-agent: Create admin settings page for calculator configuration

A: [Complete admin page with settings API]
```

### Code Review

#### Review Existing Code

1. **Select code** in your editor
2. **Copy to Qwen**
3. Ask: "Review this code for security and WordPress standards"

```
Review this code:
[paste code here]

Check for:
- Security issues
- WordPress standards compliance
- Performance optimization
- German localization
```

#### Automated Review

```
Q: Review all PHP files in wp-content/plugins/palmo-calculator/ for:
   - SQL injection vulnerabilities
   - XSS vulnerabilities
   - Missing nonces
   - Untranslated strings

A: [Detailed review with line-by-line analysis]
```

### Debugging

```
Q: I'm getting this error: "Call to undefined function calculate_price()"
   Context: Running calculator shortcode on front-end
   File: wp-content/plugins/palmo-calculator/public/class-shortcodes.php

A: [Qwen analyzes error and suggests solution]
```

---

## Advanced Features

### Project Workspace

Qwen AI Desktop has workspace feature:

1. **Create Workspace** → "Palmo Trans DE"
2. **Add Files:**
   - `AGENTS.md`
   - `CLAUDE.md`
   - `wp-content/themes/palmo-trans-de/functions.php`
   - `wp-content/plugins/palmo-calculator/palmo-calculator.php`

3. **Benefits:**
   - Context awareness across files
   - Consistent code style
   - Better suggestions

### Templates (Custom Snippets)

Create reusable templates in Qwen:

#### WordPress Function Template
```php
/**
 * {{FUNCTION_DESCRIPTION}}
 *
 * @param {{PARAM_TYPE}} ${{PARAM_NAME}} {{PARAM_DESCRIPTION}}
 * @return {{RETURN_TYPE}} {{RETURN_DESCRIPTION}}
 */
function palmo_{{FUNCTION_NAME}}( ${{PARAM_NAME}} ) {
    // Validate input
    if ( empty( ${{PARAM_NAME}} ) ) {
        return new WP_Error( 'invalid_input', __( 'Ungültige Eingabe', 'palmo-trans-de' ) );
    }

    // {{FUNCTION_LOGIC}}

    return $result;
}
```

#### AJAX Handler Template
```php
/**
 * AJAX handler for {{ACTION_DESCRIPTION}}
 */
function palmo_ajax_{{ACTION_NAME}}() {
    // Verify nonce
    check_ajax_referer( '{{ACTION_NAME}}-nonce', 'nonce' );

    // Validate and sanitize input
    $input = isset( $_POST['{{INPUT_NAME}}'] ) ? sanitize_text_field( $_POST['{{INPUT_NAME}}'] ) : '';

    // Process
    $result = {{PROCESS_FUNCTION}}( $input );

    // Return response
    wp_send_json_success( array(
        'data' => $result,
    ) );
}
add_action( 'wp_ajax_{{ACTION_NAME}}', 'palmo_ajax_{{ACTION_NAME}}' );
add_action( 'wp_ajax_nopriv_{{ACTION_NAME}}', 'palmo_ajax_{{ACTION_NAME}}' );
```

### Batch Processing

Generate multiple related files:

```
Q: Generate complete custom post type implementation for "services":
   1. Registration function
   2. Meta boxes
   3. Admin columns
   4. Front-end template
   5. Archive template
   6. Translation files

A: [Qwen generates all 6 files with proper structure]
```

---

## Integration with Development Tools

### VS Code Extension

Qwen has VS Code extension:

1. Install from VS Code Marketplace: "Qwen AI Assistant"
2. Configure API key from Qwen Desktop
3. Use commands:
   - `Qwen: Explain Code`
   - `Qwen: Generate Tests`
   - `Qwen: Refactor Code`
   - `Qwen: Translate Comments`

### Command Line Interface

Qwen provides CLI tool:

```bash
# Install
npm install -g @qwen/cli

# Configure
qwen config set api-key YOUR_API_KEY

# Generate code
qwen generate "WordPress function to sanitize calculator input" > sanitize.php

# Review code
qwen review wp-content/plugins/palmo-calculator/includes/class-calculator.php

# Translate
qwen translate --to de --file error-messages.txt
```

---

## Best Practices for Qwen

### 1. Provide Context

**❌ Bad:**
```
Create a form
```

**✅ Good:**
```
@calculator-plugin-agent: Create a WordPress form for the calculator with fields:
- Origin postal code (5 digits, German format)
- Destination postal code (5 digits)
- Weight (kg, max 1000)
- Dimensions (length × width × height in cm)
- Submit button

Requirements:
- AJAX submission
- Client-side validation
- Nonce security
- German labels
- Responsive design
```

### 2. Specify File Locations

**❌ Bad:**
```
Add this to functions.php
```

**✅ Good:**
```
Add this to: wp-content/themes/palmo-trans-de/functions.php
After line 145 (after theme setup)
```

### 3. Request Explanations

**❌ Bad:**
```
Generate the code
```

**✅ Good:**
```
Generate the code and explain:
1. Why you chose this approach
2. Security considerations
3. Performance implications
4. Alternative approaches
```

### 4. Iterative Refinement

```
Q1: Create calculator form
A1: [Basic form code]

Q2: Add validation for German postal codes
A2: [Updated code with validation]

Q3: Add error messages in German
A3: [Final code with translations]
```

---

## Common Qwen Commands

### Code Generation
```
- "Generate WordPress shortcode for [feature]"
- "Create custom post type for [content]"
- "Build admin settings page for [plugin]"
- "Write AJAX handler for [action]"
```

### Code Analysis
```
- "Review this code for security issues"
- "Explain how this function works"
- "Find performance bottlenecks in this code"
- "Check WordPress standards compliance"
```

### Translation
```
- "Translate these error messages to German"
- "Generate .pot file for this plugin"
- "Create German translations for all strings"
```

### Debugging
```
- "Why is this function not working?"
- "Debug this error: [error message]"
- "Fix this deprecated function warning"
```

---

## Comparison: Qwen vs Claude vs Ollama

| Feature | Qwen Desktop | Claude | Ollama |
|---------|-------------|--------|---------|
| **Cost** | Free tier + paid | Pay-per-use | Free |
| **Multilingual** | ⭐⭐⭐⭐⭐ Excellent | ⭐⭐⭐⭐ Good | ⭐⭐⭐ Fair |
| **German Support** | ⭐⭐⭐⭐⭐ Native | ⭐⭐⭐⭐ Very good | ⭐⭐⭐ Good |
| **Code Quality** | ⭐⭐⭐⭐ Very good | ⭐⭐⭐⭐⭐ Excellent | ⭐⭐⭐ Good |
| **Context Size** | 32k tokens | 200k tokens | 2k-8k tokens |
| **Speed** | Fast (cloud) | Fast (cloud) | Varies (local) |
| **Privacy** | Cloud | Cloud | 100% local |
| **Offline** | ❌ No | ❌ No | ✅ Yes |
| **UI** | Desktop app | Web/API | CLI/API |

### Recommended Usage

**Use Qwen for:**
- ✅ Multilingual projects (German focus)
- ✅ Desktop app preference
- ✅ Translation tasks
- ✅ Quick code generation
- ✅ Free tier development

**Use Claude for:**
- ✅ Complex architectural decisions
- ✅ Large codebase analysis
- ✅ Detailed reasoning
- ✅ API integration

**Use Ollama for:**
- ✅ Privacy-critical projects
- ✅ Offline development
- ✅ No budget
- ✅ Full local control

---

## Troubleshooting

### Connection Issues
```
Error: Unable to connect to Qwen servers

Solution:
1. Check internet connection
2. Check firewall settings
3. Restart Qwen Desktop
4. Re-login to account
```

### Indexing Problems
```
Error: Project files not indexed

Solution:
1. Settings → Knowledge Base → Re-index
2. Check file permissions
3. Exclude large folders (node_modules, .git)
4. Reduce project size if necessary
```

### API Rate Limits
```
Error: API rate limit exceeded

Solution:
1. Wait for rate limit reset (typically 1 hour)
2. Upgrade to paid tier
3. Use Ollama for unlimited local usage
```

### Language Mixing
```
Issue: Qwen responds in Chinese instead of English/German

Solution:
1. Add to system prompt: "Always respond in German and English"
2. Explicitly request: "Respond in German"
3. Settings → Language → Set preferred language
```

---

## Security Considerations

### Data Privacy

Qwen processes data on Alibaba Cloud servers:

**Sensitive data to AVOID sending:**
- ❌ Database credentials
- ❌ API keys and secrets
- ❌ Customer personal information
- ❌ Production environment variables

**Safe data to send:**
- ✅ Code structure and patterns
- ✅ Generic examples
- ✅ Documentation
- ✅ Error messages (sanitized)

### API Key Security

```bash
# Store API key securely
export QWEN_API_KEY="your-api-key-here"

# Never commit to git
echo "QWEN_API_KEY" >> .gitignore
```

---

## Resources

- **Qwen Official Site:** https://qianwen.aliyun.com/
- **Documentation:** https://help.aliyun.com/document_detail/qwen.html
- **GitHub:** https://github.com/QwenLM
- **API Reference:** https://dashscope.aliyun.com/
- **Community Forum:** https://developer.aliyun.com/ask/

---

## Versioning

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
**Compatible With:** Qwen AI Desktop 2.0+
**Tested Models:** Qwen-72B, Qwen-14B, Qwen-7B

---

## Example Workflow

### Complete Feature Development with Qwen

```
1. Planning
   Q: @wordpress-theme-agent: Plan a custom template for service pages
   A: [Qwen provides implementation plan]

2. Code Generation
   Q: Generate the template-service.php file based on this plan
   A: [Complete template code]

3. Translation
   Q: Translate all strings in this template to German
   A: [Updated code with German translations]

4. Review
   Q: Review this code for security and WordPress standards
   A: [Detailed review with suggestions]

5. Refinement
   Q: Implement the suggested improvements
   A: [Final optimized code]

6. Documentation
   Q: Generate PHPDoc comments for all functions
   A: [Code with complete documentation]
```

---

## Next Steps

1. Download and install Qwen AI Desktop
2. Create account and login
3. Add Palmo Trans DE project to workspace
4. Import `CLAUDE.md` as system prompt
5. Index project files
6. Test with simple query
7. Start developing!

---

**End of Configuration**

For cloud-based alternative, see `CLAUDE.md`. For local alternative, see `OLLAMA.md`.
