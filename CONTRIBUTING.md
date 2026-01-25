# Contributing to Palmo Trans DE

Thank you for your interest in contributing to Palmo Trans DE! This document provides guidelines and instructions for contributing to the project.

## Table of Contents
- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [Development Workflow](#development-workflow)
- [Coding Standards](#coding-standards)
- [Testing Requirements](#testing-requirements)
- [Pull Request Process](#pull-request-process)
- [Issue Reporting](#issue-reporting)

## Code of Conduct

This project adheres to a Code of Conduct that all contributors are expected to follow. Please read [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md) before contributing.

## Getting Started

### Prerequisites
- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Node.js 18+ and npm
- Composer
- WP-CLI
- Git

### Local Development Setup

1. **Fork and Clone**
```bash
git clone https://github.com/YOUR_USERNAME/palmo-trans-de-website.git
cd palmo-trans-de-website
```

2. **Install Dependencies**
```bash
# PHP dependencies
composer install

# Node dependencies
npm install
```

3. **Configure WordPress**
```bash
cp wp-config-sample.php wp-config.php
# Edit wp-config.php with your database credentials
```

4. **Install WordPress**
```bash
wp core install \
  --url="http://localhost:8000" \
  --title="Palmo Trans DE Dev" \
  --admin_user="admin" \
  --admin_email="dev@example.com"
```

5. **Activate Theme and Plugins**
```bash
wp theme activate palmo-trans-de
wp plugin activate palmo-calculator
```

6. **Start Development Server**
```bash
npm run dev
```

## Development Workflow

### Branch Strategy

```
main (production)
  ├── develop (staging)
  │   ├── feature/feature-name
  │   ├── bugfix/bug-description
  │   └── enhancement/enhancement-name
  └── hotfix/critical-fix
```

### Creating a Feature Branch

```bash
# Update develop branch
git checkout develop
git pull origin develop

# Create feature branch
git checkout -b feature/your-feature-name

# Make your changes
# ... write code ...

# Commit with conventional commits
git add .
git commit -m "feat: add feature description"

# Push to your fork
git push origin feature/your-feature-name
```

### Commit Message Convention

We follow [Conventional Commits](https://www.conventionalcommits.org/):

```
<type>(<scope>): <description>

[optional body]

[optional footer]
```

**Types:**
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, etc.)
- `refactor`: Code refactoring
- `perf`: Performance improvements
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

**Examples:**
```bash
feat(calculator): add Austrian postal code support
fix(theme): correct responsive menu behavior
docs(readme): update installation instructions
perf(api): optimize distance calculation caching
```

## Coding Standards

### PHP

We follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/):

```php
// Good
function palmo_calculate_price( $distance, $weight, $urgency ) {
    $base_price = $distance * 0.50;
    return max( $base_price, 25.00 );
}

// Bad
function calculate_price($distance,$weight,$urgency){
    $price=$distance*0.5;
    return max($price,25);
}
```

**Check your code:**
```bash
phpcs --standard=WordPress wp-content/themes/palmo-trans-de/
phpcs --standard=WordPress wp-content/plugins/palmo-calculator/
```

**Auto-fix issues:**
```bash
phpcbf --standard=WordPress wp-content/themes/palmo-trans-de/
```

### JavaScript

We follow [Airbnb JavaScript Style Guide](https://github.com/airbnb/javascript):

```javascript
// Good
const calculatePrice = (distance, weight, urgency) => {
  const basePrice = distance * 0.50;
  return Math.max(basePrice, 25.00);
};

// Bad
function calculatePrice(distance,weight,urgency) {
  var price = distance*0.5;
  return Math.max(price,25);
}
```

**Check your code:**
```bash
npm run lint
```

**Auto-fix issues:**
```bash
npm run lint:fix
```

### CSS/SCSS

We follow [CSS Guidelines](https://cssguidelin.es/):

```css
/* Good */
.calculator-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.calculator-form__input {
  padding: 0.5rem;
  border: 1px solid #ccc;
}

/* Bad */
.calculatorForm {
  display:flex;
  flex-direction:column;
}
```

## Testing Requirements

### PHP Unit Tests

```bash
# Run all PHP tests
composer test

# Run specific test
composer test -- --filter=test_calculate_price
```

### JavaScript Tests

```bash
# Run all JavaScript tests
npm test

# Run specific test
npm test -- calculator.test.js

# Run with coverage
npm run test:coverage
```

### Integration Tests

```bash
# Run integration tests
npm run test:integration
```

### Manual Testing Checklist

Before submitting a PR, test:
- [ ] Feature works as expected
- [ ] No console errors
- [ ] Responsive design (mobile, tablet, desktop)
- [ ] Cross-browser compatibility (Chrome, Firefox, Safari, Edge)
- [ ] Accessibility (keyboard navigation, screen readers)
- [ ] Performance (Lighthouse score > 90)

## Pull Request Process

### Before Submitting

1. **Update your branch**
```bash
git checkout develop
git pull origin develop
git checkout your-feature-branch
git rebase develop
```

2. **Run all checks**
```bash
# PHP syntax check
find wp-content -name "*.php" -exec php -l {} \;

# Coding standards
phpcs --standard=WordPress wp-content/

# JavaScript linting
npm run lint

# Run tests
composer test
npm test
```

3. **Update documentation**
- Add/update code comments
- Update README if needed
- Add entry to CHANGELOG.md

### Creating the Pull Request

1. **Push to your fork**
```bash
git push origin your-feature-branch
```

2. **Create PR on GitHub**
```bash
gh pr create \
  --base develop \
  --title "feat: your feature description" \
  --body "$(cat <<EOF
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix
- [ ] New feature
- [ ] Breaking change
- [ ] Documentation update

## Testing
Describe testing performed

## Checklist
- [ ] Code follows style guidelines
- [ ] Self-review completed
- [ ] Comments added for complex code
- [ ] Documentation updated
- [ ] Tests added/updated
- [ ] Tests pass locally
- [ ] No new warnings generated
