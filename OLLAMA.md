# Ollama Local LLM - Configuration Guide

## Overview

This document provides setup and configuration instructions for using Ollama (local Large Language Models) with the Palmo Trans DE WordPress project. Ollama allows you to run AI models locally without internet dependency or API costs.

---

## What is Ollama?

**Ollama** is a tool for running large language models locally on your machine. Benefits:
- ✅ **Privacy** - All data stays on your machine
- ✅ **No API costs** - Unlimited usage
- ✅ **Offline capable** - Works without internet
- ✅ **Fast responses** - No network latency
- ❌ **Hardware requirements** - Needs powerful GPU/CPU
- ❌ **Model quality** - Smaller than cloud models (GPT-4, Claude)

---

## Installation

### Linux (Ubuntu/Debian)
```bash
curl -fsSL https://ollama.com/install.sh | sh
```

### macOS
```bash
brew install ollama
```

### Windows
Download installer from: https://ollama.com/download/windows

### Verify Installation
```bash
ollama --version
# Should output: ollama version is X.X.X
```

---

## Recommended Models for WordPress Development

### 1. CodeLlama (Recommended for Coding)
**Size:** 7B, 13B, 34B parameters
**Use:** PHP, JavaScript, HTML/CSS generation
**Installation:**
```bash
ollama pull codellama:13b
```

**Why CodeLlama:**
- Trained specifically on code
- Good at understanding WordPress patterns
- Fast inference on consumer hardware

### 2. Llama 3 (General Purpose)
**Size:** 8B, 70B parameters
**Use:** General questions, explanations, planning
**Installation:**
```bash
ollama pull llama3:8b
```

**Why Llama 3:**
- Excellent general knowledge
- Good for documentation and explanations
- Multilingual (German support)

### 3. Mistral (Balanced)
**Size:** 7B parameters
**Use:** Balanced code + conversation
**Installation:**
```bash
ollama pull mistral:7b
```

**Why Mistral:**
- Fast and efficient
- Good balance between code and text
- Low memory requirements (8GB RAM)

### 4. DeepSeek Coder (Alternative)
**Size:** 6.7B parameters
**Use:** Code-focused tasks
**Installation:**
```bash
ollama pull deepseek-coder:6.7b
```

---

## Project Setup

### 1. Create Modelfile

Create custom model with project context:

```bash
# Create file: ollama-wordpress-model.txt
FROM codellama:13b

# Set temperature (creativity vs consistency)
PARAMETER temperature 0.7

# System prompt with project context
SYSTEM """
You are an expert WordPress developer assistant for the Palmo Trans DE project.

Project Stack:
- WordPress 6.x+
- PHP 8.1+
- MySQL 8.0
- JavaScript (ES6+)
- German (de_DE) primary language

Core Rules:
1. Always follow WordPress Coding Standards (WPCS)
2. Use WordPress core functions (never raw SQL)
3. Implement security: escaping, sanitization, nonces
4. Make all strings translatable (text domain: palmo-trans-de)
5. Write responsive, mobile-first code
6. Comment complex logic with PHPDoc

Available Agents:
- @wordpress-theme-agent - Theme development
- @calculator-plugin-agent - Calculator plugin
- @seo-optimization-agent - SEO optimization

When providing code:
- Include file paths
- Explain the "why"
- Show complete, working examples
- Add error handling
- Follow PSR-12 for PHP

Security checklist:
☑ Validate inputs (sanitize_text_field, absint, etc.)
☑ Escape outputs (esc_html, esc_url, esc_attr)
☑ Use nonces for forms/AJAX
☑ Check user capabilities
☑ Use prepared statements for DB queries
"""
```

### 2. Create Custom Model

```bash
ollama create palmo-wordpress -f ollama-wordpress-model.txt
```

### 3. Test Model

```bash
ollama run palmo-wordpress

>>> Write a WordPress function to register a custom post type for services
[Model will generate code following your project context]
```

---

## Usage Patterns

### Command Line Interface

```bash
# Start interactive session
ollama run palmo-wordpress

# Single query
echo "How do I add a custom meta box?" | ollama run palmo-wordpress

# From file
ollama run palmo-wordpress < query.txt > response.txt
```

### Using with Code Editors

#### VS Code + Continue Extension

1. Install **Continue** extension
2. Configure `~/.continue/config.json`:

```json
{
  "models": [
    {
      "title": "Palmo WordPress (Local)",
      "provider": "ollama",
      "model": "palmo-wordpress",
      "apiBase": "http://localhost:11434"
    }
  ],
  "systemMessage": "You are helping with Palmo Trans DE WordPress project. Follow AGENTS.md and CLAUDE.md guidelines."
}
```

#### Cursor Editor

1. Settings → Models → Add Custom Model
2. Provider: Ollama
3. Model: `palmo-wordpress`
4. Base URL: `http://localhost:11434`

---

## API Integration

### REST API

Ollama runs on `http://localhost:11434` by default.

#### Generate Response (Python)

```python
import requests
import json

def ask_ollama(prompt, model="palmo-wordpress"):
    response = requests.post(
        'http://localhost:11434/api/generate',
        json={
            'model': model,
            'prompt': prompt,
            'stream': False
        }
    )
    return response.json()['response']

# Example usage
code = ask_ollama("""
Create a WordPress shortcode for displaying recent services.
Requirements:
- Show 5 most recent services
- Include title, excerpt, thumbnail
- Responsive grid layout
""")

print(code)
```

#### Chat API (Python)

```python
import requests

def chat_ollama(messages, model="palmo-wordpress"):
    response = requests.post(
        'http://localhost:11434/api/chat',
        json={
            'model': model,
            'messages': messages,
            'stream': False
        }
    )
    return response.json()['message']['content']

# Conversation
messages = [
    {
        'role': 'user',
        'content': '@calculator-plugin-agent: Add validation for German postal codes'
    }
]

response = chat_ollama(messages)
print(response)

# Continue conversation
messages.append({'role': 'assistant', 'content': response})
messages.append({'role': 'user', 'content': 'Now add Austrian postal codes too'})

response2 = chat_ollama(messages)
print(response2)
```

#### cURL Examples

```bash
# Generate
curl http://localhost:11434/api/generate -d '{
  "model": "palmo-wordpress",
  "prompt": "Write a function to sanitize calculator input"
}'

# Chat
curl http://localhost:11434/api/chat -d '{
  "model": "palmo-wordpress",
  "messages": [
    {
      "role": "user",
      "content": "How do I add a custom admin menu?"
    }
  ]
}'
```

---

## Agent System Integration

### Using Agents with Ollama

Prepend agent mentions to your prompts:

```bash
ollama run palmo-wordpress

>>> @wordpress-theme-agent: Create a custom header template
>>> @calculator-plugin-agent [dev-mode]: Explain the calculation logic
>>> @seo-optimization-agent: How can I improve Core Web Vitals?
```

### Batch Processing with Agents

```python
import requests

agents = {
    'theme': '@wordpress-theme-agent',
    'calculator': '@calculator-plugin-agent',
    'seo': '@seo-optimization-agent'
}

def ask_agent(agent, question, mode='prod-mode'):
    prompt = f"{agents[agent]} [{mode}]: {question}"

    response = requests.post(
        'http://localhost:11434/api/generate',
        json={
            'model': 'palmo-wordpress',
            'prompt': prompt,
            'stream': False
        }
    )
    return response.json()['response']

# Use agents
theme_code = ask_agent('theme', 'Create footer.php template')
calc_code = ask_agent('calculator', 'Add weight validation', mode='dev-mode')
seo_tips = ask_agent('seo', 'Optimize images for performance')
```

---

## Performance Optimization

### GPU Acceleration

**NVIDIA GPU (CUDA):**
```bash
# Check if GPU is detected
ollama list

# Force GPU usage
OLLAMA_NUM_GPU=1 ollama run palmo-wordpress
```

**AMD GPU (ROCm):**
```bash
# Install ROCm support
# Follow: https://ollama.com/blog/amd-gpu

HSA_OVERRIDE_GFX_VERSION=10.3.0 ollama run palmo-wordpress
```

### Memory Management

```bash
# Limit context window (reduce memory)
OLLAMA_NUM_CTX=2048 ollama run palmo-wordpress

# Adjust batch size
OLLAMA_NUM_BATCH=512 ollama run palmo-wordpress
```

### Model Quantization

Use smaller quantized models for faster inference:

```bash
# Q4 quantization (4-bit, faster, less accurate)
ollama pull codellama:13b-q4

# Q5 quantization (5-bit, balanced)
ollama pull codellama:13b-q5

# Q8 quantization (8-bit, slower, more accurate)
ollama pull codellama:13b-q8
```

---

## Comparison: Ollama vs Claude

| Feature | Ollama (Local) | Claude (Cloud) |
|---------|----------------|----------------|
| **Cost** | Free | Pay-per-use |
| **Privacy** | 100% local | Data sent to Anthropic |
| **Speed** | Depends on hardware | Fast (API latency) |
| **Quality** | Good (smaller models) | Excellent (large models) |
| **Offline** | ✅ Yes | ❌ No |
| **Context** | Limited (2k-8k tokens) | Large (200k tokens) |
| **Best for** | Privacy, cost, offline | Quality, complex tasks |

### When to use Ollama:
- ✅ Sensitive client data
- ✅ Offline development
- ✅ Budget constraints
- ✅ Simple code generation

### When to use Claude:
- ✅ Complex architectural decisions
- ✅ Large codebase analysis
- ✅ Detailed explanations
- ✅ Multi-step reasoning

---

## Troubleshooting

### Model Not Found
```bash
# List installed models
ollama list

# Pull missing model
ollama pull codellama:13b
```

### Out of Memory
```bash
# Use smaller model
ollama run mistral:7b

# Or reduce context
OLLAMA_NUM_CTX=2048 ollama run codellama:13b
```

### Slow Inference
```bash
# Use quantized model
ollama pull codellama:13b-q4

# Enable GPU
OLLAMA_NUM_GPU=1 ollama run codellama:13b-q4
```

### Port Already in Use
```bash
# Change port
OLLAMA_HOST=0.0.0.0:11435 ollama serve

# Connect on different port
curl http://localhost:11435/api/generate -d '{...}'
```

---

## Advanced Configuration

### Multi-Model Setup

Create specialized models for different tasks:

```bash
# Code generation
ollama create palmo-code -f <<EOF
FROM codellama:13b
PARAMETER temperature 0.3
SYSTEM "You generate WordPress code. Be concise. No explanations."
EOF

# Documentation
ollama create palmo-docs -f <<EOF
FROM llama3:8b
PARAMETER temperature 0.7
SYSTEM "You write WordPress documentation. Be detailed. Use examples."
EOF

# Code review
ollama create palmo-review -f <<EOF
FROM mistral:7b
PARAMETER temperature 0.5
SYSTEM "You review WordPress code. Focus on security, performance, standards."
EOF
```

### Automated Workflows

```bash
#!/bin/bash
# generate-feature.sh

FEATURE_NAME=$1
AGENT=${2:-@wordpress-theme-agent}

echo "Generating $FEATURE_NAME..."

# Generate code
CODE=$(echo "$AGENT: Create $FEATURE_NAME" | ollama run palmo-code)

# Save to file
echo "$CODE" > "$FEATURE_NAME.php"

# Review code
REVIEW=$(echo "Review this code: $CODE" | ollama run palmo-review)

echo "Review:"
echo "$REVIEW"
```

---

## Integration with Development Workflow

### Pre-commit Hook

```bash
# .git/hooks/pre-commit
#!/bin/bash

# Get staged PHP files
FILES=$(git diff --cached --name-only --diff-filter=ACM | grep '\.php$')

for FILE in $FILES; do
    echo "Reviewing $FILE..."

    # Ask Ollama to review
    REVIEW=$(cat $FILE | ollama run palmo-review)

    # Check for critical issues
    if echo "$REVIEW" | grep -i "critical\|security\|vulnerability"; then
        echo "❌ Critical issues found in $FILE"
        echo "$REVIEW"
        exit 1
    fi
done

echo "✅ All files passed review"
```

### VS Code Task

`.vscode/tasks.json`:
```json
{
  "version": "2.0.0",
  "tasks": [
    {
      "label": "Ollama: Generate Function",
      "type": "shell",
      "command": "echo 'Write a WordPress function to ${input:functionPurpose}' | ollama run palmo-wordpress",
      "problemMatcher": [],
      "presentation": {
        "reveal": "always",
        "panel": "new"
      }
    }
  ],
  "inputs": [
    {
      "id": "functionPurpose",
      "type": "promptString",
      "description": "What should the function do?"
    }
  ]
}
```

---

## Resources

- **Ollama Documentation:** https://ollama.com/docs
- **Model Library:** https://ollama.com/library
- **GitHub Repository:** https://github.com/ollama/ollama
- **Discord Community:** https://discord.gg/ollama

---

## Versioning

**Document Version:** 1.0.0
**Last Updated:** 2026-01-22
**Compatible With:** Ollama 0.1.0+
**Tested Models:** CodeLlama, Llama 3, Mistral, DeepSeek Coder

---

## Next Steps

1. Install Ollama
2. Pull recommended model: `ollama pull codellama:13b`
3. Create custom model: `ollama create palmo-wordpress -f ollama-wordpress-model.txt`
4. Test with: `ollama run palmo-wordpress`
5. Integrate with your editor
6. Start developing!

---

**End of Configuration**

For cloud-based AI, see `CLAUDE.md`. For desktop AI, see `QWEN.md`.
