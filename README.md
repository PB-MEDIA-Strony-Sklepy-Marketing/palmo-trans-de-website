# Palmo Trans DE - WordPress Website & Transport Calculator

[![CI Status](https://img.shields.io/badge/CI-passing-brightgreen)](https://github.com)
[![WordPress](https://img.shields.io/badge/WordPress-6.4+-blue)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-8.1+-purple)](https://php.net)
[![License](https://img.shields.io/badge/License-Proprietary-red)](LICENSE)

Professional transportation website for German market with advanced cost calculator and SEO optimization.

---

## 🚀 Quick Start

```bash
# 1. Clone repository
git clone https://github.com/your-username/palmo-trans-de-website.git
cd palmo-trans-de-website

# 2. Install dependencies
npm install
composer install

# 3. Build assets
npm run build

# 4. Setup WordPress and activate theme/plugin
```

---

## 📋 Overview

**Palmo Trans DE** is a modern WordPress website for a German transportation company:

- 🚚 **Transportation Services** - Professional logistics showcase
- 💰 **Smart Calculator** - Real-time cost calculation
- 🇩🇪 **German Market** - Optimized for German SEO
- ⚡ **Performance** - Core Web Vitals 90+
- 📱 **Mobile-First** - Responsive design
- 🔐 **Security** - WordPress best practices

---

## ✨ Features

### WordPress Theme
- Custom theme from scratch
- Gutenberg block support
- Mobile-first responsive
- SEO-optimized templates
- Schema.org markup
- German language ready

### Calculator Plugin
- Real-time price calculation
- German postal code validation
- Distance calculation (Google Maps API)
- Volumetric weight support
- AJAX interface
- Shortcode: `[palmo_calculator]`

### SEO & Performance
- Meta tags optimization
- Lazy loading images
- Asset minification
- Lighthouse score 90+

---

## 🛠️ Tech Stack

- **WordPress** 6.4+
- **PHP** 8.1+
- **MySQL** 8.0+
- **JavaScript (ES6+)**
- **GitHub Actions** CI/CD

---

## 📁 Project Structure

```
palmo-trans-de-website/
├── wp-content/
│   ├── themes/palmo-trans-de/        # Custom theme
│   └── plugins/palmo-calculator/     # Calculator plugin
├── .github/workflows/                 # CI/CD pipelines
├── docs/                              # Documentation
├── AGENTS.md                          # AI agents
├── README.md                          # This file
└── ...
```

---

## 💻 Installation

```bash
# Install WordPress locally
# Clone repository to wp-content/
# Install dependencies
npm install && composer install
# Build assets
npm run build
# Activate theme and plugin
```

See [docs/](docs/) for detailed installation guide.

---

## 🔧 Development

```bash
# Development build
npm run dev

# Run tests
composer test && npm test

# Code quality
composer phpcs && npm run lint
```

---

## 🚀 Deployment

**Staging:** Push to `develop` branch
**Production:** Merge to `main` branch (requires approval)

See [.github/workflows/README.md](.github/workflows/README.md) for CI/CD documentation.

---

## 📚 Documentation

- [ARCHITECTURE.md](docs/ARCHITECTURE.md) - System architecture
- [API-DOCUMENTATION.md](docs/API-DOCUMENTATION.md) - API reference
- [BRAND-SETTINGS.md](docs/BRAND-SETTINGS.md) - Brand guidelines
- [CONTRIBUTING.md](CONTRIBUTING.md) - Contribution guide
- [SECURITY.md](SECURITY.md) - Security policy

---

## 🤝 Contributing

1. Fork the repository
2. Create feature branch
3. Make changes
4. Run tests
5. Create Pull Request

See [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines.

---

## 📝 License

**Proprietary** - All rights reserved.

See [LICENSE](LICENSE) for details.

---

## 📞 Support

- **Email:** support@palmo-trans.de
- **Website:** https://palmo-trans.de
- **Documentation:** [docs/](docs/)

---

Last updated: 2026-01-22
