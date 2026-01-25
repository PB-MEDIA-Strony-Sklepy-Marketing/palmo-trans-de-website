# System Architecture

## Overview
Palmo Trans DE follows WordPress best practices with custom theme and plugin architecture.

## Components
- **Theme**: palmo-trans-de (presentation layer)
- **Plugin**: palmo-calculator (business logic)
- **Database**: MySQL (WordPress tables + custom)
- **Cache**: WordPress transients + object cache
- **Assets**: npm + Webpack build system

## Technology Stack
- PHP 8.1+
- WordPress 6.4+
- MySQL 8.0+
- JavaScript ES6+
- CSS3 (Grid + Flexbox)

## Design Patterns
- MVC (Model-View-Controller)
- Repository pattern for data access
- Service layer for business logic
- Factory pattern for object creation

See docs/ for detailed architecture documentation.
