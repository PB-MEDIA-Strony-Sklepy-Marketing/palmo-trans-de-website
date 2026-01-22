# AI Configuration Files - Quick Start Guide

## 🎯 Przegląd

Ten projekt zawiera kompletny zestaw plików konfiguracyjnych dla systemów AI wspierających rozwój projektu Palmo Trans DE WordPress.

**Wygenerowano:** 15 plików konfiguracyjnych (~155KB dokumentacji)
**Wspierane systemy AI:** Claude, Ollama, Qwen, inne LLM

---

## 📁 Struktura Plików

```
palmo-trans-de-website/
├── AGENTS.md              # 🔴 START TUTAJ - Przegląd wszystkich agentów
├── CLAUDE.md              # Konfiguracja dla Claude AI
├── OLLAMA.md              # Konfiguracja dla Ollama (local)
├── QWEN.md                # Konfiguracja dla Qwen AI Desktop
└── .github/
    ├── agents/            # Szczegółowe specyfikacje agentów
    │   ├── wordpress-theme-agent.md
    │   ├── calculator-plugin-agent.md
    │   └── seo-optimization-agent.md
    ├── chatmodes/         # Tryby interakcji
    │   ├── development-mode.md
    │   └── production-mode.md
    ├── instructions/      # Instrukcje procesów
    │   ├── code-review-instructions.md
    │   └── deployment-instructions.md
    ├── prompts/           # Szablony promptów
    │   ├── feature-development-prompt.md
    │   └── bug-fix-prompt.md
    └── prompt-snippets/   # Gotowe snippety
        ├── wordpress-snippets.md
        └── calculator-snippets.md
```

---

## 🚀 Quick Start

### 1. Wybierz System AI

#### Claude AI (Zalecane dla jakości)
```
1. Otwórz Claude.ai lub Claude Code
2. Utwórz nowy projekt: "Palmo Trans DE"
3. Dodaj do Project Knowledge: CLAUDE.md + AGENTS.md
4. Rozpocznij rozmowę używając: @wordpress-theme-agent
```

#### Ollama (Zalecane dla prywatności)
```bash
# Instalacja
curl -fsSL https://ollama.com/install.sh | sh

# Pobierz model
ollama pull codellama:13b

# Utwórz custom model
ollama create palmo-wordpress -f OLLAMA.md

# Użyj
ollama run palmo-wordpress
```

#### Qwen AI Desktop (Zalecane dla multilingual)
```
1. Pobierz z: https://qianwen.aliyun.com/download
2. Dodaj projekt do workspace
3. Importuj QWEN.md jako system prompt
4. Zaindeksuj pliki projektu
```

### 2. Wybierz Agenta

**Dostępni agenci:**

| Agent | Aktywacja | Kiedy używać |
|-------|-----------|--------------|
| WordPress Theme | `@wordpress-theme-agent` | Szablony, responsive design, customizer |
| Calculator Plugin | `@calculator-plugin-agent` | Kalkulator, AJAX, walidacja |
| SEO Optimization | `@seo-optimization-agent` | Meta tags, schema, performance |

### 3. Wybierz Tryb

**Development Mode** `[dev-mode]`
- Szczegółowe wyjaśnienia
- Komentarze edukacyjne
- Wiele rozwiązań do wyboru

**Production Mode** `[prod-mode]`
- Zwięzły kod
- Gotowy do wdrożenia
- Bez wyjaśnień

### 4. Przykłady Użycia

#### Nowa funkcjonalność
```
@calculator-plugin-agent [dev-mode]:

Dodaj pole "wymiary ładunku" do kalkulatora:
- 3 pola: długość, szerokość, wysokość (cm)
- Oblicz wagę objętościową: (L × W × H) / 5000
- Użyj wyższej wartości: rzeczywista vs objętościowa
```

#### Bug fix
```
@wordpress-theme-agent [prod-mode]:

Bug: Mobile menu nie zamyka się po kliknięciu linku

Steps to reproduce:
1. Otwórz na mobile
2. Kliknij hamburger
3. Kliknij link
4. Menu pozostaje otwarte

Fix this.
```

#### Code review
```
Przejrzyj ten kod pod kątem bezpieczeństwa i WordPress standards:

[wklej kod]
```

---

## 📚 Dokumentacja Szczegółowa

### Dla Agentów AI

1. **AGENTS.md** - Start here! Przegląd systemu agentów
2. **CLAUDE.md** - Szczegółowe instrukcje dla Claude
3. **OLLAMA.md** - Setup lokalnego LLM
4. **QWEN.md** - Konfiguracja Qwen AI

### Dla Deweloperów

1. **.github/agents/** - Specyfikacje każdego agenta
2. **.github/chatmodes/** - Tryby interakcji
3. **.github/instructions/** - Procesy (review, deployment)
4. **.github/prompts/** - Szablony zapytań
5. **.github/prompt-snippets/** - Gotowy kod

---

## 🎓 Przykładowe Workflow

### Workflow 1: Nowa Funkcjonalność

```
1. Planning
   @wordpress-theme-agent [dev-mode]:
   Plan: Custom template for services page with filtering

2. Implementation
   @wordpress-theme-agent [prod-mode]:
   Create template-services.php based on plan

3. Review
   Review code for security and WordPress standards:
   [paste code]

4. Testing
   @seo-optimization-agent:
   Check SEO optimization for services template
```

### Workflow 2: Bug Fix

```
1. Diagnosis
   @calculator-plugin-agent [dev-mode]:
   Debug: Calculator returns NaN
   [paste error details]

2. Fix
   @calculator-plugin-agent [prod-mode]:
   Implement the fix

3. Verify
   Review the fix for potential side effects
```

---

## 🔧 Zaawansowane Użycie

### Multi-Agent Collaboration

```
@wordpress-theme-agent @seo-optimization-agent:

Create service archive page with:
- SEO-optimized structure
- Schema.org markup
- Fast loading (< 2s)
```

### Custom Snippets

Użyj gotowych snippetów z `.github/prompt-snippets/`:

```
Give me the WordPress custom post type snippet for "testimonials"
```

### Batch Operations

```
Generate for all services:
1. Individual page templates
2. Schema markup
3. Breadcrumbs
4. Social sharing meta tags
```

---

## ✅ Best Practices

### DO's ✅

- **Zawsze określ agenta** - `@wordpress-theme-agent`
- **Wybierz tryb** - `[dev-mode]` lub `[prod-mode]`
- **Podaj kontekst** - Opisz co już istnieje
- **Używaj checklistów** - Z plików instructions/
- **Testuj sugestie** - Zawsze weryfikuj kod

### DON'Ts ❌

- ❌ Nie mieszaj agentów bez powodu
- ❌ Nie pomijaj walidacji i sanitizacji
- ❌ Nie deployuj bez testów
- ❌ Nie ignoruj security guidelines
- ❌ Nie commituj bez code review

---

## 🔐 Bezpieczeństwo

**NIGDY nie wysyłaj do AI:**
- Hasła do bazy danych
- API keys
- Dane osobowe klientów
- Tokeny dostępowe

**ZAWSZE sprawdź kod pod kątem:**
- SQL injection (używaj WP_Query)
- XSS (escapuj output)
- CSRF (nonces w formularzach)
- Autoryzacji (capabilities)

---

## 🐛 Troubleshooting

### Problem: AI nie rozumie projektu

**Rozwiązanie:**
1. Upewnij się, że załadowałeś AGENTS.md i CLAUDE.md
2. Podaj więcej kontekstu w pierwszym promptcie
3. Użyj `[dev-mode]` dla szczegółów

### Problem: Kod nie działa

**Rozwiązanie:**
1. Sprawdź czy wszystkie pliki są we właściwych lokalizacjach
2. Uruchom `phpcs` dla WordPress standards
3. Sprawdź error log: `wp-content/debug.log`
4. Użyj code-review-instructions.md

### Problem: AI generuje nieodpowiedni kod

**Rozwiązanie:**
1. Doprecyzuj prompt używając feature-development-prompt.md
2. Wskaż konkretnie czego oczekujesz
3. Podaj przykład oczekiwanego outputu
4. Zmień tryb (dev vs prod)

---

## 📊 Metryki Sukcesu

Po wdrożeniu konfiguracji AI, powinieneś zauważyć:

- ✅ **Szybszy rozwój** - Kod generowany w minutach, nie godzinach
- ✅ **Wyższa jakość** - Automatyczne sprawdzanie standards
- ✅ **Mniej bugów** - Security guidelines wbudowane
- ✅ **Lepsza dokumentacja** - Automatyczne komentarze
- ✅ **Spójny kod** - Konsystentny styl w całym projekcie

---

## 🔄 Aktualizacje

**Wersja:** 1.0.0
**Data:** 2026-01-22

### Changelog

**v1.0.0 (2026-01-22)**
- ✨ Inicjalna konfiguracja AI
- 📝 3 wyspecjalizowanych agentów
- 🎯 2 tryby interakcji (dev/prod)
- 📚 Kompletna dokumentacja
- 🔧 Code snippets i templates
- 🔐 Security guidelines

---

## 💡 Tips & Tricks

### Tip 1: Iteracyjne Refinement
```
Zapytanie 1: Create calculator form
Zapytanie 2: Add validation for German postal codes
Zapytanie 3: Add error messages in German
Zapytanie 4: Make it responsive
```

### Tip 2: Używaj przykładów
```
Create a function similar to this:
[wklej przykład z wordpress-snippets.md]

But for testimonials instead of services
```

### Tip 3: Context management
```
Poprzedni kontekst: Stworzyliśmy template-services.php
Teraz: Dodaj do niego paginację
```

---

## 🤝 Contributing

Aby ulepszyć konfigurację AI:

1. Testuj i notuj co działa/nie działa
2. Aktualizuj odpowiednie pliki .md
3. Dodaj przykłady do prompt-snippets/
4. Commituj z jasnym opisem zmian

---

## 📞 Support

**Problemy z konfiguracją?**
1. Sprawdź AGENTS.md - FAQ
2. Zobacz przykłady w prompts/
3. Użyj snippetów z prompt-snippets/

**Pytania o WordPress/Plugin?**
1. Sprawdź wordpress-snippets.md
2. Sprawdź calculator-snippets.md
3. Użyj code-review-instructions.md

---

## 🎉 Gotowe do startu!

1. ✅ Przeczytaj AGENTS.md
2. ✅ Wybierz system AI (Claude/Ollama/Qwen)
3. ✅ Załaduj odpowiednią konfigurację
4. ✅ Wypróbuj pierwszy prompt z @wordpress-theme-agent
5. ✅ Rozpocznij rozwój z AI!

---

**Happy Coding with AI! 🚀**
