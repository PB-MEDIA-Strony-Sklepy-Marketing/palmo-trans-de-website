# GitHub Actions Workflows - Documentation

## 📋 Overview

This directory contains 9 automated workflows for CI/CD, quality assurance, and maintenance of the Palmo Trans DE WordPress project.

**Total Workflows:** 9
**Categories:** CI/CD (4), Quality (3), Maintenance (2)

---

## 🔄 Workflows List

### 1. CI - Continuous Integration (`ci.yml`)

**Trigger:** Push to main/develop/feature/hotfix branches, Pull Requests
**Purpose:** Automated testing and validation on every commit

**Jobs:**
- ✅ PHP Syntax Check
- ✅ WordPress Coding Standards (PHPCS)
- ✅ Build Assets (npm)
- ✅ Basic Security Scan
- ✅ CI Summary

**Use Case:**
```bash
# Automatically runs on:
git push origin feature/new-calculator-field
git push origin develop
# Or when creating PR
```

**Status Badge:**
```markdown
![CI Status](https://github.com/your-username/palmo-trans-de-website/workflows/CI%20-%20Continuous%20Integration/badge.svg)
```

---

### 2. Deploy to Production (`deploy-production.yml`)

**Trigger:** Push to main branch, manual dispatch
**Purpose:** Deploy code to production server

**Environment:** Production
**URL:** https://palmo-trans.de

**Jobs:**
- 📦 Build production assets
- 🚀 Deploy to production server
- ✅ Verify deployment

**Manual Deployment:**
```bash
# Via GitHub UI:
Actions → Deploy to Production → Run workflow

# Or via gh CLI:
gh workflow run deploy-production.yml
```

**Required Secrets:**
- `PROD_SSH_KEY` - SSH private key for production server
- `PROD_SSH_HOST` - Production server hostname
- `PROD_SSH_USER` - SSH username

---

### 3. Deploy to Staging (`deploy-staging.yml`)

**Trigger:** Push to develop branch, manual dispatch
**Purpose:** Deploy code to staging environment for testing

**Environment:** Staging

**Use Case:**
```bash
# Automatically deploys when merging to develop:
git checkout develop
git merge feature/new-feature
git push origin develop
# → Automatic staging deployment
```

---

### 4. Tests (`tests.yml`)

**Trigger:** Push, Pull Requests
**Purpose:** Run automated PHP unit tests

**Jobs:**
- 🧪 PHP Unit Tests (PHPUnit)
- 🧪 JavaScript Tests (Jest)

**Local Testing:**
```bash
# PHP tests
./vendor/bin/phpunit

# JavaScript tests
npm test
```

---

### 5. Security Scan (`security-scan.yml`)

**Trigger:** Daily at 2:00 AM (cron), manual dispatch
**Purpose:** Automated security vulnerability scanning

**Scans:**
- 🔐 Dependency vulnerabilities
- 🔐 Code security issues
- 🔐 WordPress core/plugin vulnerabilities

**Schedule:**
```yaml
cron: '0 2 * * *'  # Every day at 2:00 AM UTC
```

---

### 6. Code Quality (`code-quality.yml`)

**Trigger:** Push, Pull Requests
**Purpose:** Enforce code quality standards

**Checks:**
- 📝 PHP CodeSniffer (WordPress standards)
- 📝 ESLint (JavaScript)
- 📝 Code complexity analysis

**Configuration Files:**
- `phpcs.xml` - PHPCS rules
- `.eslintrc.json` - ESLint rules

---

### 7. Lighthouse Audit (`lighthouse-audit.yml`)

**Trigger:** Push to main/develop, Weekly on Sunday (cron)
**Purpose:** Performance, SEO, and accessibility auditing

**Metrics:**
- ⚡ Performance score
- 🔍 SEO score
- ♿ Accessibility score
- ✅ Best practices score

**URLs Tested:**
- Homepage: https://palmo-trans.de
- Services page
- Calculator page

**Schedule:**
```yaml
cron: '0 0 * * 0'  # Every Sunday at midnight
```

---

### 8. Dependency Updates (`dependency-update.yml`)

**Trigger:** Weekly on Monday (cron), manual dispatch
**Purpose:** Check for outdated dependencies

**Checks:**
- 📦 npm packages
- 📦 Composer packages
- 📦 WordPress core/plugins

**Schedule:**
```yaml
cron: '0 0 * * 1'  # Every Monday at midnight
```

**Output:**
- List of outdated packages
- Suggested updates
- Security advisories

---

### 9. Automated Backup (`backup.yml`)

**Trigger:** Daily at 3:00 AM (cron), manual dispatch
**Purpose:** Create automated backups of wp-content

**Backup Contents:**
- wp-content/themes/
- wp-content/plugins/
- wp-content/uploads/

**Retention:** 30 days

**Schedule:**
```yaml
cron: '0 3 * * *'  # Every day at 3:00 AM UTC
```

---

## 📊 Workflow Diagram

```
┌─────────────────────────────────────────────────┐
│                  CODE CHANGE                     │
│          (push, PR, schedule, manual)            │
└──────────────────┬──────────────────────────────┘
                   │
      ┌────────────┴────────────┐
      │                         │
      ▼                         ▼
┌──────────┐            ┌──────────────┐
│  CI      │            │  Quality     │
│  Tests   │            │  Checks      │
└────┬─────┘            └──────┬───────┘
     │                         │
     │ ✅ Pass                 │ ✅ Pass
     │                         │
     └──────────┬──────────────┘
                │
                ▼
         ┌─────────────┐
         │  Staging    │
         │  Deploy     │
         └──────┬──────┘
                │
                │ ✅ Verified
                │
                ▼
         ┌─────────────┐
         │ Production  │
         │   Deploy    │
         └─────────────┘
```

---

## 🔐 Required Secrets

Configure these secrets in GitHub Repository Settings → Secrets and variables → Actions:

### Production Deployment
```
PROD_SSH_KEY         - SSH private key
PROD_SSH_HOST        - example.com
PROD_SSH_USER        - deploy_user
PROD_DEPLOY_PATH     - /var/www/html
```

### Staging Deployment
```
STAGING_SSH_KEY      - SSH private key
STAGING_SSH_HOST     - staging.example.com
STAGING_SSH_USER     - deploy_user
STAGING_DEPLOY_PATH  - /var/www/html
```

### Notifications (Optional)
```
SLACK_WEBHOOK_URL    - Slack webhook for notifications
DISCORD_WEBHOOK_URL  - Discord webhook
EMAIL_RECIPIENT      - Email for alerts
```

---

## 🎯 Workflow Status Badges

Add these to your README.md:

```markdown
![CI](https://github.com/username/repo/workflows/CI/badge.svg)
![Tests](https://github.com/username/repo/workflows/Tests/badge.svg)
![Security](https://github.com/username/repo/workflows/Security%20Scan/badge.svg)
![Deploy](https://github.com/username/repo/workflows/Deploy%20to%20Production/badge.svg)
```

---

## 📖 Usage Examples

### Example 1: Feature Development Workflow

```bash
# 1. Create feature branch
git checkout -b feature/add-dimensions

# 2. Make changes
# ... code changes ...

# 3. Commit (triggers CI)
git add .
git commit -m "Add cargo dimensions field"
git push origin feature/add-dimensions

# → CI workflow runs automatically
# → Code quality checks
# → Tests run

# 4. Create PR to develop
gh pr create --base develop --title "Add dimensions"

# → CI runs on PR
# → Code review

# 5. Merge to develop (if approved)
gh pr merge

# → Staging deployment runs automatically
# → Test on staging environment

# 6. Merge to main (for production)
git checkout main
git merge develop
git push origin main

# → Production deployment runs automatically
```

### Example 2: Hotfix Workflow

```bash
# 1. Create hotfix from main
git checkout main
git checkout -b hotfix/calculator-bug

# 2. Fix bug
# ... fix ...

# 3. Commit
git commit -m "Fix: Calculator NaN error"
git push origin hotfix/calculator-bug

# 4. Create PR to main (urgent)
gh pr create --base main --title "Hotfix: Calculator"

# 5. After approval, merge
gh pr merge

# → Production deployment runs immediately
```

### Example 3: Manual Deployment

```bash
# Deploy specific commit to production
gh workflow run deploy-production.yml --ref main

# Deploy to staging
gh workflow run deploy-staging.yml --ref develop

# Run security scan manually
gh workflow run security-scan.yml
```

---

## 🛠️ Workflow Customization

### Modify Workflow Triggers

Edit the `on:` section in any workflow:

```yaml
# Run on specific branches
on:
  push:
    branches:
      - main
      - 'release/**'

# Run on schedule
on:
  schedule:
    - cron: '0 9 * * 1-5'  # Weekdays at 9 AM

# Manual trigger with inputs
on:
  workflow_dispatch:
    inputs:
      environment:
        description: 'Deployment environment'
        required: true
        type: choice
        options:
          - staging
          - production
```

### Add Notification Steps

Add to any workflow:

```yaml
- name: Notify Slack
  if: failure()
  uses: 8398a7/action-slack@v3
  with:
    status: ${{ job.status }}
    webhook_url: ${{ secrets.SLACK_WEBHOOK_URL }}
```

---

## 🐛 Troubleshooting

### Workflow Fails: "Permission denied"

**Cause:** SSH key not configured
**Fix:**
```bash
# Generate SSH key
ssh-keygen -t ed25519 -C "github-actions"

# Add public key to server ~/.ssh/authorized_keys
# Add private key to GitHub Secrets as PROD_SSH_KEY
```

### Workflow Fails: "Command not found: wp"

**Cause:** WP-CLI not installed on server
**Fix:**
```bash
# On server
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
```

### Workflow Skipped

**Cause:** Commit message contains `[skip ci]`
**Fix:** Remove `[skip ci]` from commit message or force run:
```bash
gh workflow run ci.yml
```

---

## 📈 Performance Optimization

### Cache Dependencies

All workflows use caching for faster runs:

```yaml
- name: Cache Composer
  uses: actions/cache@v3
  with:
    path: vendor
    key: ${{ runner.os }}-composer-${{ hashFiles('**/composer.lock') }}

- name: Cache npm
  uses: actions/cache@v3
  with:
    path: node_modules
    key: ${{ runner.os }}-npm-${{ hashFiles('**/package-lock.json') }}
```

### Parallel Jobs

Jobs run in parallel when possible:

```yaml
jobs:
  test-php:
    # runs in parallel
  test-js:
    # runs in parallel
  deploy:
    needs: [test-php, test-js]  # waits for both
```

---

## 🔄 Workflow Dependencies

```
ci.yml
  ├─→ tests.yml (runs tests)
  └─→ code-quality.yml (checks quality)

deploy-staging.yml
  ├─→ ci.yml (must pass)
  └─→ tests.yml (must pass)

deploy-production.yml
  ├─→ ci.yml (must pass)
  ├─→ tests.yml (must pass)
  ├─→ security-scan.yml (must pass)
  └─→ lighthouse-audit.yml (performance check)

backup.yml (independent, runs daily)
dependency-update.yml (independent, runs weekly)
```

---

## 📅 Execution Schedule

| Workflow | Schedule | Frequency |
|----------|----------|-----------|
| CI | On push/PR | Per commit |
| Tests | On push/PR | Per commit |
| Code Quality | On push/PR | Per commit |
| Deploy Staging | On push to develop | Per merge |
| Deploy Production | On push to main | Per release |
| Security Scan | Daily 2:00 AM | Daily |
| Lighthouse Audit | Weekly Sunday | Weekly |
| Dependency Update | Weekly Monday | Weekly |
| Backup | Daily 3:00 AM | Daily |

---

## ✅ Best Practices

1. **Always test in staging first**
   - Merge to `develop` → auto-deploy to staging
   - Test thoroughly
   - Then merge to `main` for production

2. **Review workflow logs**
   - Check for warnings even if passed
   - Monitor performance metrics
   - Address issues promptly

3. **Keep secrets secure**
   - Never commit secrets to code
   - Rotate SSH keys regularly
   - Use environment-specific secrets

4. **Monitor workflow runs**
   - Enable email notifications
   - Check status badges
   - Review failed runs immediately

5. **Update dependencies regularly**
   - Review dependency-update.yml output weekly
   - Test updates in staging first
   - Keep WordPress/plugins current

---

## 📚 Resources

- [GitHub Actions Documentation](https://docs.github.com/en/actions)
- [WordPress CI/CD Best Practices](https://make.wordpress.org/hosting/handbook/continuous-integration/)
- [GitHub Actions Marketplace](https://github.com/marketplace?type=actions)

---

## Version

**Documentation Version:** 1.0.0
**Last Updated:** 2026-01-22
**Workflows Count:** 9
