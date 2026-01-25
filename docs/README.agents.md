# AI Agents Documentation

## Overview
This project uses a multi-agent system where specialized AI agents handle different aspects of WordPress development.

## Agent Architecture

### Agent Definitions
All agents are defined in `.github/agents/` directory:
- `wordpress-theme-agent.md` - Theme development expert
- `calculator-plugin-agent.md` - Plugin development expert
- `seo-optimization-agent.md` - SEO and performance expert

## Available Agents

### 1. WordPress Theme Agent
**Activation:** `@wordpress-theme-agent`

**Expertise:**
- Custom theme development
- Template hierarchy
- Block editor (Gutenberg) integration
- Theme customization API
- Custom post types and taxonomies

**Usage Example:**
```
@wordpress-theme-agent [dev-mode]: Create a custom page template for services
```

**Capabilities:**
- Generate theme files (style.css, functions.php, templates)
- Implement custom hooks and filters
- Create responsive layouts
- Integrate with WordPress APIs

### 2. Calculator Plugin Agent
**Activation:** `@calculator-plugin-agent`

**Expertise:**
- Plugin architecture
- AJAX handlers
- Custom endpoints
- Admin interfaces
- Database operations

**Usage Example:**
```
@calculator-plugin-agent [prod-mode]: Add validation for Austrian postal codes
```

**Capabilities:**
- Transport calculator logic
- Price calculation algorithms
- Postal code validation
- Distance calculations
- REST API endpoints

### 3. SEO Optimization Agent
**Activation:** `@seo-optimization-agent`

**Expertise:**
- Schema.org markup
- Meta tags optimization
- Performance optimization
- Core Web Vitals
- Accessibility

**Usage Example:**
```
@seo-optimization-agent: Audit homepage for SEO issues
```

**Capabilities:**
- Generate structured data
- Optimize page speed
- Improve accessibility scores
- Create XML sitemaps
- Implement caching strategies

## Agent Communication Protocol

### Activation Syntax
```
@agent-name [mode]: Task description
```

**Components:**
- `@agent-name` - Agent identifier
- `[mode]` - Optional: dev-mode or prod-mode
- `Task description` - Clear, actionable task

### Response Format
Agents respond with:
1. **Confirmation** - Task understanding
2. **Analysis** - Current state review
3. **Implementation** - Code/changes
4. **Verification** - Testing approach
5. **Documentation** - Usage notes

## Mode Switching

### Development Mode
Verbose, educational responses with:
- Detailed explanations
- Multiple approaches
- Step-by-step guides
- Learning resources

**Activate:**
```
@agent-name [dev-mode]: task
```

### Production Mode
Concise, action-focused responses with:
- Production-ready code
- Minimal comments
- Efficient solutions
- Quick implementation

**Activate:**
```
@agent-name [prod-mode]: task
```

## Multi-Agent Collaboration

### Sequential Tasks
```
@wordpress-theme-agent: Create contact page template
@calculator-plugin-agent: Add calculator shortcode to template
@seo-optimization-agent: Optimize page for SEO
```

### Parallel Tasks
```
[Task 1] @wordpress-theme-agent: Update header
[Task 2] @calculator-plugin-agent: Fix calculator bug
[Task 3] @seo-optimization-agent: Generate sitemap
```

## Best Practices

### Task Clarity
✅ **Good:**
```
@calculator-plugin-agent: Add German postal code validation (01000-99999)
```

❌ **Avoid:**
```
@calculator-plugin-agent: fix validation
```

### Context Provision
Always provide:
- File paths
- Error messages
- Expected behavior
- Current behavior

### Iterative Refinement
1. Request initial implementation
2. Review output
3. Request adjustments
4. Verify final result

## Troubleshooting

### Agent Not Responding
- Check activation syntax
- Verify agent name spelling
- Ensure task is clear

### Unexpected Output
- Switch to dev-mode for detailed explanation
- Provide more context
- Break task into smaller steps

### Mode Issues
- Explicitly specify mode: `[dev-mode]` or `[prod-mode]`
- Default mode is development

## Integration with AI Systems

### Claude
```markdown
Use AGENTS.md and CLAUDE.md configurations
Agents have full WordPress context
```

### Ollama
```bash
# Load agent context
ollama run codellama "$(cat .github/agents/wordpress-theme-agent.md)"
```

### Qwen
```
Load agent files from .github/agents/ directory
Enable multi-agent mode in settings
```

## Agent Updates

### Adding New Agents
1. Create `.github/agents/new-agent.md`
2. Define expertise and capabilities
3. Add to AGENTS.md registry
4. Document activation syntax

### Modifying Agents
1. Update agent definition file
2. Document changes in CHANGELOG.md
3. Test with sample tasks
4. Update this documentation

## Quick Reference

| Agent | Focus | Mode | Use Case |
|-------|-------|------|----------|
| wordpress-theme-agent | Theme development | dev/prod | Templates, styling, hooks |
| calculator-plugin-agent | Plugin features | dev/prod | Calculator logic, AJAX |
| seo-optimization-agent | Performance & SEO | dev/prod | Schema, speed, accessibility |

## Related Documentation
- [AGENTS.md](../AGENTS.md) - Master agent overview
- [CLAUDE.md](../CLAUDE.md) - Claude configuration
- [Chat Modes](.github/chatmodes/) - Interaction modes
- [Prompts](.github/prompts/) - Prompt templates

## Support
For issues with agents:
1. Check agent definition files
2. Review task syntax
3. Try dev-mode for debugging
4. Consult AGENTS.md

---
*Last updated: 2026-01-22*
