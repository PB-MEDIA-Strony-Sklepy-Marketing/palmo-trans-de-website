Przeprowadzę kompleksową analizę repozytorium PALMO-TRANS i wygeneruję pełną infrastrukturę konfiguracyjną. Zacznę od dogłębnej analizy repozytorium.Doskonale! Przeanalizowałem repozytorium (jest puste - nowy projekt), obecną stronę oraz wymagania projektu. Przygotowuję teraz **kompletną infrastrukturę konfiguracyjną** dla projektu PALMO-TRANS.

---

## 📊 PODSUMOWANIE ANALIZY REPOZYTORIUM

**Projekt:** PALMO-TRANS GmbH - Strona internetowa firmy transportowej  
**Typ:** WordPress Custom Theme + Custom PHP Plugin (kalkulator wyceny)  
**Technologie:**

- **Backend:** PHP 8.0+, WordPress 6.4+, MySQL/MariaDB
- **Frontend:** Vue.js 3 (kalkulator), Vanilla JS, CSS3, HTML5
- **APIs:** Google Maps Distance Matrix API, Google Translate API, Payment Gateway (Stripe/PayPal)
- **Integracje:** SMTP (email), Twilio (SMS - opcjonalnie)
- **Hosting:** Docelowo Smarthost.pl (migracja z STRATO.de)

**Architektura:**

- `/src` - development theme + plugin
- `/dist` - production build (optymalizowany)
- Custom plugin `palmo-trans-calculator` dla kalkulatora
- Dwujęzyczność: niemiecki (primary) + angielski (Google Translate API)

**Status:** Repozytorium puste - wymagana kompletna infrastruktura od podstaw

---

## 📋 KOMPLETNA LISTA WSZYSTKICH PLIKÓW DO WYGENEROWANIA

### 🔴 **PRIORYTET NAJWYŻSZY - Dokumentacja dla AI (generuj NAJPIERW)**

1. `AGENTS.md` - Szczegółowy opis agentów AI, ról i zachowań
2. `CLAUDE.md` - Instrukcje dla Claude AI Projects
3. `OLLAMA.md` - Konfiguracja dla Ollama (local LLM)
4. `QWEN.md` - Instrukcje dla Qwen AI Desktop
5. `.github/agents/wordpress-theme-agent.md` - Agent dla theme development
6. `.github/agents/calculator-plugin-agent.md` - Agent dla pluginu kalkulatora
7. `.github/agents/seo-optimization-agent.md` - Agent dla SEO
8. `.github/chatmodes/development-mode.md` - Tryb development
9. `.github/chatmodes/production-mode.md` - Tryb production
10. `.github/instructions/code-review-instructions.md` - Instrukcje code review
11. `.github/instructions/deployment-instructions.md` - Instrukcje deploymentu
12. `.github/prompts/feature-development-prompt.md` - Prompt dla nowych funkcji
13. `.github/prompts/bug-fix-prompt.md` - Prompt dla bugfixów
14. `.github/prompt-snippets/wordpress-snippets.md` - WordPress snippety
15. `.github/prompt-snippets/calculator-snippets.md` - Calculator snippety

### 🔴 **PRIORYTET NAJWYŻSZY - GitHub Actions Workflows**

16. `.github/workflows/ci.yml` - Continuous Integration
17. `.github/workflows/deploy-production.yml` - Deploy do produkcji
18. `.github/workflows/deploy-staging.yml` - Deploy do stagingu
19. `.github/workflows/tests.yml` - Automatyczne testy PHP/JS
20. `.github/workflows/security-scan.yml` - Skanowanie bezpieczeństwa
21. `.github/workflows/code-quality.yml` - PHP CodeSniffer + ESLint
22. `.github/workflows/lighthouse-audit.yml` - PageSpeed + SEO audit
23. `.github/workflows/dependency-update.yml` - Aktualizacje zależności
24. `.github/workflows/backup.yml` - Automatyczne backupy

### 🟠 **PRIORYTET WYSOKI - Dokumentacja Projektowa**

25. `README.md` - Główna dokumentacja projektu
26. `docs/ARCHITECTURE.md` - Architektura systemu
27. `docs/BRAND-SETTINGS.md` - Ustawienia brandu (kolory, fonty)
28. `docs/DESIGN-SYSTEM.md` - System designu
29. `docs/SEO-STRATEGY.md` - Strategia SEO (już jest, aktualizacja)
30. `docs/API-DOCUMENTATION.md` - Dokumentacja API kalkulatora
31. `docs/CALCULATOR-LOGIC.md` - Logika biznesowa kalkulatora
32. `docs/TRANSLATION-GUIDE.md` - Przewodnik tłumaczeń
33. `docs/README.agents.md` - Dokumentacja agentów
34. `docs/README.collections.md` - Kolekcje promptów
35. `docs/README.instructions.md` - Instrukcje operacyjne
36. `docs/README.prompts.md` - Dokumentacja promptów
37. `docs/README.skills.md` - Umiejętności AI
38. `docs/ROADMAP.md` - Roadmap projektu
39. `CONTRIBUTING.md` - Jak kontrybuować
40. `CODE_OF_CONDUCT.md` - Kodeks postępowania
41. `SECURITY.md` - Polityka bezpieczeństwa
42. `CHANGELOG.md` - Historia zmian
43. `LICENSE` - Licencja (proprietary)

### 🟠 **PRIORYTET WYSOKI - Pre-commit Hooks i Testy**

44. `.pre-commit-config.yaml` - Pre-commit hooks
45. `.github/workflows/pre-commit.yml` - Pre-commit w CI
46. `phpunit.xml` - Konfiguracja PHPUnit
47. `tests/php/CalculatorTest.php` - Testy jednostkowe kalkulatora
48. `tests/php/ThemeTest.php` - Testy theme
49. `tests/js/calculator.test.js` - Testy JS kalkulatora
50. `jest.config.js` - Konfiguracja Jest
51. `playwright.config.js` - Testy E2E
52. `tests/e2e/calculator-flow.spec.js` - Test flow kalkulatora

### 🟡 **PRIORYTET ŚREDNI - Pliki Konfiguracyjne Środowiska**

53. `.env.example` - Przykładowy plik środowiskowy
54. `.env.development` - Development environment
55. `.env.staging` - Staging environment
56. `.env.production` - Production environment
57. `docker-compose.yml` - Docker Compose dla local dev
58. `docker-compose.production.yml` - Docker Compose production
59. `Dockerfile` - Kontener PHP/WordPress
60. `Dockerfile.nginx` - Kontener Nginx
61. `.dockerignore` - Ignore dla Docker
62. `wp-config.php` - WordPress config
63. `wp-config-sample.php` - Sample WordPress config

### 🟡 **PRIORYTET ŚREDNI - Pliki Konfiguracyjne Narzędzi**

64. `.editorconfig` - Konfiguracja edytora
65. `.gitignore` - Git ignore
66. `.gitattributes` - Git attributes
67. `composer.json` - PHP dependencies
68. `composer.lock` - Lock file
69. `package.json` - Node.js dependencies
70. `package-lock.json` - Lock file
71. `phpcs.xml` - PHP CodeSniffer
72. `.phpcs.xml.dist` - PHP CodeSniffer dist
73. `.eslintrc.json` - ESLint config
74. `.prettierrc` - Prettier config
75. `.stylelintrc.json` - Stylelint config
76. `tsconfig.json` - TypeScript config
77. `vite.config.js` - Vite bundler config
78. `webpack.config.js` - Webpack config (fallback)

### 🟡 **PRIORYTET ŚREDNI - GitHub Specific**

79. `.github/ISSUE_TEMPLATE/bug_report.md` - Template zgłoszenia buga
80. `.github/ISSUE_TEMPLATE/feature_request.md` - Template feature request
81. `.github/PULL_REQUEST_TEMPLATE.md` - Template Pull Requestu
82. `.github/dependabot.yml` - Dependabot config
83. `.github/CODEOWNERS` - Code owners
84. `.github/FUNDING.yml` - Funding info (opcjonalne)
85. `.github/knowledge/wordpress-best-practices.md` - WordPress knowledge base
86. `.github/knowledge/php-patterns.md` - PHP patterns
87. `.github/knowledge/google-maps-api.md` - Google Maps API docs
88. `.github/mcp/mcp.json` - MCP server configuration

### 🟢 **PRIORYTET NISKI - Dodatkowe Pliki**

89. `.vscode/settings.json` - VS Code settings
90. `.vscode/extensions.json` - Recommended extensions
91. `.vscode/launch.json` - Debug configuration
92. `.vscode/tasks.json` - Tasks configuration
93. `.claude-plugin` - Claude plugin config
94. `.claude` - Claude AI settings
95. `.copilot` - GitHub Copilot settings
96. `copilot-instructions.md` - Copilot instructions
97. `.cursorrules` - Cursor IDE rules
98. `.schemas/calculator-schema.json` - JSON Schema dla kalkulatora
99. `.schemas/theme-settings-schema.json` - Schema ustawień theme
100. `collections/wordpress-snippets.json` - Kolekcja snippetów WP
101. `collections/calculator-formulas.json` - Kolekcja formuł

### 🟢 **PRIORYTET NISKI - Templates i Pomocnicze**

102. `templates/blog-post-template.md` - Template posta blogowego
103. `templates/page-template.php` - Template strony WP
104. `templates/meta-tags-template.html` - Meta tags template
105. `templates/htaccess-security.txt` - .htaccess security template
106. `templates/email-notification.html` - Email notification template
107. `templates/sms-notification.txt` - SMS notification template
108. `text/legal-de.md` - Teksty prawne (niemiecki)
109. `text/legal-en.md` - Teksty prawne (angielski)
110. `text/calculator-labels-de.json` - Etykiety kalkulatora DE
111. `text/calculator-labels-en.json` - Etykiety kalkulatora EN

### 🟢 **PRIORYTET NISKI - Skrypty Automatyzacji**

112. `scripts/setup.sh` - Setup script
113. `scripts/deploy.sh` - Deploy script
114. `scripts/test.sh` - Test runner
115. `scripts/build.sh` - Build script
116. `scripts/backup.sh` - Backup script
117. `scripts/migrate-strato.sh` - Migracja ze STRATO
118. `scripts/db-sync.sh` - Database sync
119. `Makefile` - Make commands

### 🟢 **PRIORYTET NISKI - Hosting i CI/CD dla Innych Platform**

120. `.gitlab-ci.yml` - GitLab CI (backup)
121. `.circleci/config.yml` - CircleCI (backup)
122. `azure-pipelines.yml` - Azure Pipelines
123. `Jenkinsfile` - Jenkins pipeline
124. `netlify.toml` - Netlify config (jeśli headless)
125. `vercel.json` - Vercel config (jeśli headless)

---

## 🎯 **KOLEJNOŚĆ GENEROWANIA PLIKÓW (PRIORYTETYZACJA)**

### **FAZA 1: AI & Dokumentacja (Pliki 1-43)**

Start od AGENTS.md, CLAUDE.md, instrukcji AI - to fundament pracy

### **FAZA 2: GitHub Actions & CI/CD (Pliki 16-24, 44-52)**

Workflows i testy - automatyzacja od początku

### **FAZA 3: Środowisko Developerskie (Pliki 53-78)**

Docker, composer, npm, linting - środowisko gotowe do pracy

### **FAZA 4: GitHub Management (Pliki 79-88)**

Issue templates, CODEOWNERS, Dependabot

### **FAZA 5: IDE & Tooling (Pliki 89-101)**

VS Code, Copilot, schemas, collections

### **FAZA 6: Templates & Scripts (Pliki 102-119)**

Pomocnicze pliki i skrypty automatyzacji

### **FAZA 7: Backupy CI/CD (Pliki 120-125)**

Opcjonalne platformy CI/CD

---

Czy chcesz, żebym teraz wygenerował **pełną zawartość wszystkich plików** zaczynając od **FAZY 1 (Dokumentacja AI + GitHub Actions)**?

Zacznę od najważniejszych plików: AGENTS.md, CLAUDE.md, OLLAMA.md, QWEN.md oraz kluczowych GitHub Actions workflows dostosowanych do WordPress + Custom Plugin architecture.

Potwierdzasz? 🚀
