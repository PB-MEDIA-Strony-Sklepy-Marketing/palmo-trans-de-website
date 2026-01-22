# AI Configuration Files - Complete Index

**Data wygenerowania:** 2026-01-22
**Projekt:** Palmo Trans DE WordPress Website
**Total plików:** 16 (włączając ten index)

---

## 📋 Complete File List

### 🔴 ROOT LEVEL - Dokumentacja główna (PRIORYTET 1)

| Plik | Rozmiar | Opis | Dla kogo |
|------|---------|------|----------|
| **AGENTS.md** | 8.3K | Przegląd systemu agentów, komunikacja, quick reference | **WSZYSCY - START TUTAJ** |
| **CLAUDE.md** | 18K | Kompletna konfiguracja dla Claude AI Projects | Claude użytkownicy |
| **OLLAMA.md** | 13K | Setup i konfiguracja Ollama (local LLM) | Ollama użytkownicy |
| **QWEN.md** | 15K | Instrukcje dla Qwen AI Desktop | Qwen użytkownicy |
| **AI-CONFIGURATION-README.md** | 10K | Quick start guide, examples, best practices | Nowi użytkownicy |
| **AI-FILES-INDEX.md** | Ten plik | Kompletny index wszystkich plików | Nawigacja |

### 🤖 .github/agents/ - Specyfikacje agentów (PRIORYTET 2)

| Plik | Rozmiar | Agent | Specjalizacja |
|------|---------|-------|---------------|
| **wordpress-theme-agent.md** | 20K | @wordpress-theme-agent | Theme development, templates, responsive design |
| **calculator-plugin-agent.md** | 20K | @calculator-plugin-agent | Calculator plugin, AJAX, validation |
| **seo-optimization-agent.md** | 7K | @seo-optimization-agent | SEO, meta tags, schema.org, performance |

**Kiedy użyć:**
- Potrzebujesz szczegółów o konkretnym agencie
- Chcesz zrozumieć zakres odpowiedzialności
- Szukasz przykładów kodu dla danej domeny

### 💬 .github/chatmodes/ - Tryby interakcji

| Plik | Rozmiar | Tryb | Kiedy używać |
|------|---------|------|--------------|
| **development-mode.md** | 7.3K | `[dev-mode]` | Nauka, szczegółowe wyjaśnienia, multiple solutions |
| **production-mode.md** | 3.8K | `[prod-mode]` | Szybki kod, deployment-ready, minimal comments |

**Przykład użycia:**
```
@wordpress-theme-agent [dev-mode]: Explain how to create custom template
@calculator-plugin-agent [prod-mode]: Generate postal code validation
```

### 📖 .github/instructions/ - Instrukcje procesów

| Plik | Rozmiar | Proces | Zawartość |
|------|---------|--------|-----------|
| **code-review-instructions.md** | 6.8K | Code Review | Checklist security, standards, performance, quality |
| **deployment-instructions.md** | 3.6K | Deployment | Pre-deployment checklist, deployment steps, rollback |

**Kiedy użyć:**
- Przed/po code review
- Przed deploymentem do produkcji
- Gdy potrzebujesz checklisty procesu

### 📝 .github/prompts/ - Szablony promptów

| Plik | Rozmiar | Typ | Zastosowanie |
|------|---------|-----|--------------|
| **feature-development-prompt.md** | 2.4K | Feature Request | Template dla nowych funkcjonalności |
| **bug-fix-prompt.md** | 2.3K | Bug Report | Template dla zgłoszeń bugów |

**Struktura templateów:**
- Feature: nazwa, opis, requirements, acceptance criteria
- Bug: current behavior, expected, steps to reproduce, environment

**Przykład:**
```
@calculator-plugin-agent [dev-mode]:

**Feature:** Add dimensions field

**Requirements:**
- Length, width, height inputs (cm)
- Calculate volumetric weight
- Use max(actual, volumetric) for pricing
```

### 🧩 .github/prompt-snippets/ - Gotowe snippety

| Plik | Rozmiar | Kategoria | Zawartość |
|------|---------|-----------|-----------|
| **wordpress-snippets.md** | 8.6K | WordPress | CPT, taxonomies, meta boxes, AJAX, shortcodes, widgets |
| **calculator-snippets.md** | 11K | Calculator | Postal validation, distance calc, price calc, AJAX |

**Jak używać:**
```
Użytkownik: "Give me the custom post type snippet"
AI: [zwraca snippet z wordpress-snippets.md]

Użytkownik: "Show me postal code validation"
AI: [zwraca snippet z calculator-snippets.md]
```

---

## 🗺️ Navigation Map

### Scenariusz 1: Pierwszy raz z AI

```
1. Przeczytaj: AI-CONFIGURATION-README.md (Quick Start)
2. Przeczytaj: AGENTS.md (Zrozum system)
3. Wybierz AI: CLAUDE.md / OLLAMA.md / QWEN.md
4. Wypróbuj: Użyj @wordpress-theme-agent
```

### Scenariusz 2: Chcę dodać nową funkcjonalność

```
1. Użyj template: .github/prompts/feature-development-prompt.md
2. Wybierz agenta: .github/agents/[odpowiedni-agent].md
3. Wybierz tryb: .github/chatmodes/[dev lub prod]-mode.md
4. Po implementacji: .github/instructions/code-review-instructions.md
```

### Scenariusz 3: Chcę naprawić buga

```
1. Użyj template: .github/prompts/bug-fix-prompt.md
2. Wyślij do odpowiedniego agenta
3. Tryb: [prod-mode] dla szybkiego fixa
4. Review: .github/instructions/code-review-instructions.md
```

### Scenariusz 4: Potrzebuję gotowego kodu

```
1. Sprawdź: .github/prompt-snippets/wordpress-snippets.md
2. Lub: .github/prompt-snippets/calculator-snippets.md
3. Skopiuj i dostosuj do potrzeb
```

### Scenariusz 5: Deployment do produkcji

```
1. Code review: .github/instructions/code-review-instructions.md
2. Pre-deployment: .github/instructions/deployment-instructions.md
3. Tryb: Użyj [prod-mode] dla deployment-ready code
4. Post-deployment: Monitoring checklist
```

---

## 📊 File Usage Statistics

### Częstotliwość użycia (przewidywana)

**🔥 Bardzo często:**
- AGENTS.md (daily)
- wordpress-theme-agent.md (daily)
- calculator-plugin-agent.md (daily)
- development-mode.md (daily)
- wordpress-snippets.md (daily)

**⚡ Często:**
- CLAUDE.md / OLLAMA.md / QWEN.md (setup)
- seo-optimization-agent.md (weekly)
- calculator-snippets.md (weekly)
- code-review-instructions.md (per PR)

**💡 Okresowo:**
- production-mode.md (production releases)
- deployment-instructions.md (deployments)
- feature-development-prompt.md (new features)
- bug-fix-prompt.md (bug fixes)

**📚 Referencyjnie:**
- AI-CONFIGURATION-README.md (onboarding)
- AI-FILES-INDEX.md (navigation)

---

## 🔍 Quick Search

### Szukasz informacji o...

**WordPress theme development?**
→ wordpress-theme-agent.md + wordpress-snippets.md

**Calculator plugin?**
→ calculator-plugin-agent.md + calculator-snippets.md

**SEO optimization?**
→ seo-optimization-agent.md

**Code review process?**
→ code-review-instructions.md

**Deployment?**
→ deployment-instructions.md

**Jak używać agentów?**
→ AGENTS.md

**Setup Claude/Ollama/Qwen?**
→ CLAUDE.md / OLLAMA.md / QWEN.md

**Quick start guide?**
→ AI-CONFIGURATION-README.md

**Gotowe snippety kodu?**
→ .github/prompt-snippets/

**Templates dla requestów?**
→ .github/prompts/

---

## 📐 File Relationships

```
AGENTS.md (master overview)
    ├──→ CLAUDE.md (Claude-specific)
    ├──→ OLLAMA.md (Ollama-specific)
    └──→ QWEN.md (Qwen-specific)

.github/agents/ (detailed specs)
    ├──→ wordpress-theme-agent.md
    │       └──→ wordpress-snippets.md (code examples)
    ├──→ calculator-plugin-agent.md
    │       └──→ calculator-snippets.md (code examples)
    └──→ seo-optimization-agent.md

.github/chatmodes/ (interaction modes)
    ├──→ development-mode.md
    └──→ production-mode.md

.github/instructions/ (processes)
    ├──→ code-review-instructions.md
    └──→ deployment-instructions.md

.github/prompts/ (request templates)
    ├──→ feature-development-prompt.md
    └──→ bug-fix-prompt.md
```

---

## 🎯 Priority Reading Order

### Dla nowych użytkowników:

1. **AI-CONFIGURATION-README.md** - Quick start
2. **AGENTS.md** - System overview
3. **[CLAUDE/OLLAMA/QWEN].md** - Your AI system
4. **wordpress-theme-agent.md** - Most used agent
5. **development-mode.md** - For learning

### Dla doświadczonych deweloperów:

1. **AGENTS.md** - Quick reference
2. **production-mode.md** - Efficient coding
3. **wordpress-snippets.md** - Code library
4. **calculator-snippets.md** - Code library
5. **code-review-instructions.md** - Quality assurance

### Dla team leads/managers:

1. **AI-CONFIGURATION-README.md** - Overview
2. **AGENTS.md** - Team capabilities
3. **deployment-instructions.md** - Release process
4. **code-review-instructions.md** - Quality standards

---

## 🔄 Update History

| Version | Date | Changes | Files |
|---------|------|---------|-------|
| 1.0.0 | 2026-01-22 | Initial AI configuration | All 16 files |

---

## ✅ Verification Checklist

Po wygenerowaniu, sprawdź:

- [x] Wszystkie 16 plików istnieje
- [x] Rozmiary plików są sensowne (> 1KB)
- [x] Każdy plik ma header z metadanymi
- [x] Cross-references między plikami działają
- [x] Code snippets są kompletne
- [x] Templates mają wszystkie sekcje
- [x] Instructions mają checklisty
- [x] README.md jest aktualny

---

## 💾 File Sizes Summary

| Category | Files | Total Size |
|----------|-------|------------|
| Root docs | 6 | ~55KB |
| Agents | 3 | ~47KB |
| Chat modes | 2 | ~11KB |
| Instructions | 2 | ~10KB |
| Prompts | 2 | ~5KB |
| Snippets | 2 | ~20KB |
| **TOTAL** | **17** | **~148KB** |

---

## 🎓 Learning Path

### Beginner → Intermediate

Week 1: AGENTS.md + AI-CONFIGURATION-README.md
Week 2: wordpress-theme-agent.md + development-mode.md
Week 3: calculator-plugin-agent.md + wordpress-snippets.md
Week 4: seo-optimization-agent.md + calculator-snippets.md

### Intermediate → Advanced

Month 1: Master all agents + dev mode
Month 2: Transition to prod mode
Month 3: Create custom snippets
Month 4: Optimize workflow

---

**END OF INDEX**

Dla pytań i problemów, sprawdź AI-CONFIGURATION-README.md sekcję "Troubleshooting"
