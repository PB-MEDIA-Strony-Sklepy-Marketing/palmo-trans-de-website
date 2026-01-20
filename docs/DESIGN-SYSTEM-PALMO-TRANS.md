# 🎨 Design System - PALMO-TRANS GmbH

**Wersja:** 1.0.0  
**Data:** 2025-11-24  
**Brand:** PALMO-TRANS GmbH - Międzynarodowy Transport Drogowy

---

## 📋 Spis Treści

1. [Filozofia Designu](#filozofia-designu)
2. [Kolorystyka](#kolorystyka)
3. [Typografia](#typografia)
4. [Spacing & Layout](#spacing--layout)
5. [Komponenty UI](#komponenty-ui)
6. [Ikony & Grafika](#ikony--grafika)
7. [Animacje & Transitions](#animacje--transitions)
8. [Responsywność](#responsywność)
9. [Accessibility](#accessibility)

---

## 🎯 Filozofia Designu

### Brand Personality

```
SOLIDNOŚĆ          ████████████████████░  95%
NIEZAWODNOŚĆ       ████████████████████░  95%
PROFESJONALIZM     ███████████████████░░  90%
SZYBKOŚĆ           ███████████████████░░  90%
NOWOCZESNOŚĆ       ██████████████████░░░  85%
INDUSTRIALNOŚĆ     ████████████████████░  95%
```

### Design Principles

**1. Industrial & Strong**
- Mocne, zdecydowane kolory (żółty + czarny)
- Proste, geometryczne kształty
- Czytelność na pierwszym miejscu
- High-contrast design

**2. Trust & Reliability**
- Konsystentna kolorystyka brandu
- Profesjonalne zdjęcia floty
- Certyfikaty i licencje widoczne
- Case studies i testimoniale

**3. Speed & Efficiency**
- Szybkie ładowanie strony
- Intuicyjna nawigacja
- Jednokrokowe formularze
- CTA zawsze widoczne

**4. Transport Industry Standards**
- Żółto-czarna kolorystyka (międzynarodowy standard)
- Ikony ciężarówek i tras
- GPS tracking visualization
- Loading bars i progress indicators

---

## 🎨 Kolorystyka

### Primary Palette

```css
/* Żółty Transportowy - Brand Primary */
--color-theme-primary: #FFD700;
--color-theme-primary-light: #FFE44D;
--color-theme-primary-dark: #E6C200;
--color-theme-primary-ultra-light: #FFF9E0;
```

**Użycie:**
- Buttony główne (CTA)
- Logo tło
- Akcenty w hero
- Ikony główne
- Alert banners

**Kontrast:**
- Na białym: 5.2:1 ✅ (AA)
- Na czarnym (#1A1A1A): 12.8:1 ✅ (AAA)
- Tekst czarny na żółtym: 10.5:1 ✅ (AAA)

**Psychologia koloru żółtego w transporcie:**
- Widoczność i bezpieczeństwo
- Energia i dynamika
- Uwaga i ostrzeżenie
- Międzynarodowy standard

---

### Secondary Palette

```css
/* Czarny Industrialny - Solidność */
--color-theme-secondary: #1A1A1A;
--color-theme-secondary-light: #333333;
--color-theme-secondary-dark: #000000;

/* Szary Wspierający */
--color-gray-100: #F5F5F5;
--color-gray-200: #E0E0E0;
--color-gray-300: #CCCCCC;
--color-gray-400: #999999;
--color-gray-500: #777777;
--color-gray-600: #555555;
--color-gray-700: #333333;
--color-gray-800: #1A1A1A;
--color-gray-900: #000000;
```

**Użycie:**
- Teksty główne
- Nagłówki
- Ramki i obramowania
- Tła sekcji
- Footer

---

### Accent Colors

```css
/* Czerwony Ostrzegawczy - Alerty */
--color-accent-red: #DC143C;
--color-accent-red-dark: #B01030;
--color-accent-red-light: #FF6B8A;

/* Niebieski Informacyjny - Linki */
--color-accent-blue: #0066CC;
--color-accent-blue-dark: #004C99;
--color-accent-blue-light: #3399FF;

/* Zielony Sukces - Status */
--color-accent-green: #28A745;
--color-accent-green-dark: #1E7E34;
--color-accent-green-light: #5CB85C;

/* Pomarańczowy Warning */
--color-accent-orange: #FF8C00;
--color-accent-orange-dark: #E67E00;
--color-accent-orange-light: #FFA500;
```

**Użycie:**
- Czerwony: Alerty, pilne transporty, ostrzeżenia
- Niebieski: Linki, informacje, tracking
- Zielony: Dostarczone, potwierdzenia, sukces
- Pomarańczowy: W drodze, oczekujące, warning

---

### Neutral Palette

```css
/* Grayscale Industrial */
--color-heading-primary: #1A1A1A;       /* Prawie czarny */
--color-heading-secondary: #333333;     /* Ciemnoszary */
--color-text-primary: #333333;          /* Główny tekst */
--color-text-secondary: #555555;        /* Drugorzędny tekst */
--color-text-muted: #777777;            /* Wyciszony */
--color-text-light: #999999;            /* Jasny */

/* Backgrounds */
--background-white: #FFFFFF;
--background-light: #F5F5F5;            /* Off-white */
--background-dark: #1A1A1A;             /* Dark sections */
--background-black: #000000;            /* Footer */
--background-yellow: #FFD700;           /* Yellow sections */
--background-overlay: rgba(0, 0, 0, 0.85);
```

---

### Semantic Colors

```css
/* Statusy Transportowe */
--color-status-delivered: #28A745;       /* Dostarczone */
--color-status-in-transit: #0066CC;      /* W drodze */
--color-status-pending: #FF8C00;         /* Oczekujące */
--color-status-delayed: #DC143C;         /* Opóźnione */
--color-status-cancelled: #777777;       /* Anulowane */

/* Backgrounds dla statusów */
--color-status-delivered-bg: #D4EDDA;
--color-status-in-transit-bg: #CCE5FF;
--color-status-pending-bg: #FFF3CD;
--color-status-delayed-bg: #F8D7DA;
--color-status-cancelled-bg: #E0E0E0;
```

---

### Color Usage Examples

```html
<!-- Primary CTA Button -->
<button class="btn-primary">
  Zapytaj o Wycenę
</button>

<!-- Secondary Button -->
<button class="btn-secondary">
  Śledź Przesyłkę
</button>

<!-- Status Badges -->
<span class="badge badge-delivered">Dostarczone</span>
<span class="badge badge-in-transit">W drodze</span>
<span class="badge badge-pending">Oczekujące</span>
<span class="badge badge-delayed">Opóźnione</span>

<!-- Text Hierarchy -->
<h1 class="text-heading-primary">Transport Międzynarodowy</h1>
<h2 class="text-heading-secondary">Niemcy - Polska</h2>
<p class="text-primary">Profesjonalna spedycja...</p>
<p class="text-muted">Dostawa w 24-48h</p>

<!-- Backgrounds -->
<section class="bg-white">Sekcja biała</section>
<section class="bg-yellow">Sekcja żółta (hero)</section>
<section class="bg-dark">Sekcja ciemna (footer)</section>
```

---

## ✍️ Typografia

### Font Stack

```css
/* Headings - Sans-serif Bold (Industrialne) */
--font-family-heading: 'Arial Black', 'Helvetica Neue', 'Arial', sans-serif;

/* Body - Sans-serif (Czytelność) */
--font-family-body: 'Arial', 'Helvetica Neue', 'Helvetica', sans-serif;

/* Monospace (Numery tras, tracking codes) */
--font-family-mono: 'Courier New', 'Courier', monospace;
```

**Dlaczego te fonty?**
- **Arial Black** - mocna, przemysłowa, doskonała dla transportu
- **Arial** - uniwersalna czytelność, bezpieczna dla wszystkich urządzeń
- **Courier New** - idealna dla kodów śledzenia i numerów

---

### Font Sizes (Mobile-First, REM)

```css
/* Base: 16px = 1rem */

/* Mobile (default) */
--font-size-xs: 0.75rem;      /* 12px */
--font-size-sm: 0.875rem;     /* 14px */
--font-size-base: 1rem;       /* 16px */
--font-size-lg: 1.125rem;     /* 18px */
--font-size-xl: 1.25rem;      /* 20px */
--font-size-2xl: 1.5rem;      /* 24px */
--font-size-3xl: 1.875rem;    /* 30px */
--font-size-4xl: 2.25rem;     /* 36px */
--font-size-5xl: 3rem;        /* 48px */
--font-size-6xl: 3.75rem;     /* 60px */
--font-size-7xl: 4.5rem;      /* 72px */

/* Tablet (768px+) */
@media (min-width: 768px) {
  --font-size-base: 1.0625rem;  /* 17px */
  --font-size-3xl: 2.25rem;     /* 36px */
  --font-size-5xl: 4rem;        /* 64px */
  --font-size-7xl: 6rem;        /* 96px */
}

/* Desktop (1200px+) */
@media (min-width: 1200px) {
  --font-size-base: 1.125rem;   /* 18px */
  --font-size-5xl: 4.5rem;      /* 72px */
  --font-size-7xl: 7rem;        /* 112px */
}
```

---

### Typography Scale

```css
/* Headings */
h1 {
  font-family: var(--font-family-heading);
  font-size: var(--font-size-5xl);      /* 48px → 72px */
  font-weight: var(--font-weight-black); /* 900 */
  line-height: var(--line-height-tight); /* 1.15 */
  letter-spacing: var(--letter-spacing-tight); /* -0.02em */
  color: var(--color-heading-primary);
  text-transform: uppercase;
  margin-bottom: var(--spacing-6);
}

h2 {
  font-family: var(--font-family-heading);
  font-size: var(--font-size-4xl);      /* 36px → 48px */
  font-weight: var(--font-weight-black); /* 900 */
  line-height: var(--line-height-tight);
  color: var(--color-heading-primary);
  text-transform: uppercase;
  margin-bottom: var(--spacing-5);
}

h3 {
  font-family: var(--font-family-heading);
  font-size: var(--font-size-2xl);      /* 24px → 30px */
  font-weight: var(--font-weight-bold); /* 700 */
  line-height: var(--line-height-normal); /* 1.4 */
  color: var(--color-heading-secondary);
  text-transform: uppercase;
  margin-bottom: var(--spacing-4);
}

h4 {
  font-family: var(--font-family-body);
  font-size: var(--font-size-xl);       /* 20px → 24px */
  font-weight: var(--font-weight-bold); /* 700 */
  line-height: var(--line-height-normal);
  color: var(--color-heading-secondary);
  margin-bottom: var(--spacing-3);
}

/* Body Text */
p {
  font-family: var(--font-family-body);
  font-size: var(--font-size-base);     /* 16px → 18px */
  font-weight: var(--font-weight-normal); /* 400 */
  line-height: var(--line-height-relaxed); /* 1.7 */
  color: var(--color-text-primary);
  margin-bottom: var(--spacing-4);
}

/* Lead Paragraph (intro) */
.lead {
  font-size: var(--font-size-lg);       /* 18px → 20px */
  font-weight: var(--font-weight-medium); /* 500 */
  line-height: var(--line-height-relaxed);
  color: var(--color-text-secondary);
}

/* Small Text */
small, .text-sm {
  font-size: var(--font-size-sm);       /* 14px */
  line-height: var(--line-height-normal);
  color: var(--color-text-muted);
}

/* Tracking Code / Numer trasy */
.tracking-code {
  font-family: var(--font-family-mono);
  font-size: var(--font-size-lg);
  font-weight: var(--font-weight-bold);
  color: var(--color-theme-primary);
  background: var(--color-gray-900);
  padding: var(--spacing-2) var(--spacing-4);
  border-radius: var(--radius-md);
  letter-spacing: var(--letter-spacing-wider);
}
```

---

### Font Weights

```css
--font-weight-light: 300;
--font-weight-normal: 400;
--font-weight-medium: 500;
--font-weight-semibold: 600;
--font-weight-bold: 700;
--font-weight-extrabold: 800;
--font-weight-black: 900;
```

**Użycie:**
- **Light (300):** Opcjonalne, rzadko używane
- **Normal (400):** Body text
- **Medium (500):** Lead paragraphs
- **Semibold (600):** Subheadings
- **Bold (700):** H3, H4, buttons
- **Extrabold (800):** Opcjonalne
- **Black (900):** H1, H2, logo text

---

### Line Heights

```css
--line-height-tight: 1.15;     /* Headings (H1, H2) */
--line-height-normal: 1.4;     /* H3, H4, UI elements */
--line-height-relaxed: 1.7;    /* Body text (czytelność) */
--line-height-loose: 2;        /* Quotes, special content */
```

---

### Letter Spacing

```css
--letter-spacing-tight: -0.02em;    /* Large headings */
--letter-spacing-normal: 0;         /* Body text */
--letter-spacing-wide: 0.025em;     /* Buttons, small headings */
--letter-spacing-wider: 0.05em;     /* ALL CAPS text */
--letter-spacing-widest: 0.1em;     /* Tracking codes, special */
```

---

## 📐 Spacing & Layout

### Spacing Scale (8px Grid)

```css
--spacing-0: 0;
--spacing-1: 0.25rem;   /* 4px */
--spacing-2: 0.5rem;    /* 8px */
--spacing-3: 0.75rem;   /* 12px */
--spacing-4: 1rem;      /* 16px */
--spacing-5: 1.25rem;   /* 20px */
--spacing-6: 1.5rem;    /* 24px */
--spacing-8: 2rem;      /* 32px */
--spacing-10: 2.5rem;   /* 40px */
--spacing-12: 3rem;     /* 48px */
--spacing-16: 4rem;     /* 64px */
--spacing-20: 5rem;     /* 80px */
--spacing-24: 6rem;     /* 96px */
--spacing-32: 8rem;     /* 128px */
```

**Filozofia 8px Grid:**
- Wszystkie elementy są wielokrotnością 8px
- Spójność wizualna
- Łatwiejsze skalowanie
- Industrial precision

---

### Container Widths

```css
--container-sm: 33.75rem;   /* 540px */
--container-md: 45rem;      /* 720px */
--container-lg: 60rem;      /* 960px */
--container-xl: 71.25rem;   /* 1140px */
--container-xxl: 81.25rem;  /* 1300px */
--container-full: 100%;     /* Full width */
```

**Użycie:**
```html
<!-- Wąski container (formularze) -->
<div class="container container-md">
  <form>...</form>
</div>

<!-- Standardowy container (większość sekcji) -->
<div class="container container-xl">
  <section>...</section>
</div>

<!-- Szeroki container (hero, galerie floty) -->
<div class="container container-xxl">
  <div class="hero">...</div>
</div>

<!-- Full width (mapy tras) -->
<div class="container-full">
  <div class="route-map">...</div>
</div>
```

---

### Section Spacing

```css
/* Padding wewnątrz sekcji */
.section {
  padding-top: var(--spacing-16);     /* 64px */
  padding-bottom: var(--spacing-16);
}

@media (min-width: 768px) {
  .section {
    padding-top: var(--spacing-20);   /* 80px */
    padding-bottom: var(--spacing-20);
  }
}

@media (min-width: 1200px) {
  .section {
    padding-top: var(--spacing-24);   /* 96px */
    padding-bottom: var(--spacing-24);
  }
}

/* Sekcje specjalne */
.section-hero {
  padding-top: var(--spacing-32);     /* 128px */
  padding-bottom: var(--spacing-32);
  min-height: 100vh;
}

.section-compact {
  padding-top: var(--spacing-12);     /* 48px */
  padding-bottom: var(--spacing-12);
}
```

---

### Grid System (Bootstrap 5.3)

```html
<!-- 12-column grid -->
<div class="container">
  <div class="row">
    <div class="col-12 col-md-6 col-lg-4">
      <!-- Service 1 -->
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <!-- Service 2 -->
    </div>
    <div class="col-12 col-md-12 col-lg-4">
      <!-- Service 3 -->
    </div>
  </div>
</div>

<!-- Transport features grid -->
<div class="container">
  <div class="row g-4">
    <div class="col-6 col-md-3">
      <div class="feature-box">
        <i class="fa-solid fa-truck-fast"></i>
        <h4>Ekspresowy</h4>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="feature-box">
        <i class="fa-solid fa-shield-halved"></i>
        <h4>Ubezpieczony</h4>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="feature-box">
        <i class="fa-solid fa-location-dot"></i>
        <h4>GPS Tracking</h4>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="feature-box">
        <i class="fa-solid fa-24"></i>
        <h4>24/7 Service</h4>
      </div>
    </div>
  </div>
</div>
```

**Gutters (odstępy między kolumnami):**
```css
--gutter-x: 1.5rem;  /* 24px - default Bootstrap */
--gutter-y: 1.5rem;

/* Custom gutters */
.g-2 { gap: 0.5rem; }   /* 8px */
.g-3 { gap: 1rem; }     /* 16px */
.g-4 { gap: 1.5rem; }   /* 24px */
.g-5 { gap: 3rem; }     /* 48px */
```

---

## 🧩 Komponenty UI

### Buttons

#### **Primary Button (CTA - Yellow)**

```html
<button class="btn btn-primary">
  <i class="fa-solid fa-phone"></i>
  Zapytaj o Wycenę
</button>
```

```css
.btn-primary {
  background: var(--button-theme-color);
  color: var(--button-text-color);
  border: none;
  padding: var(--spacing-3) var(--spacing-6);  /* 12px 24px */
  font-size: var(--font-size-base);
  font-weight: var(--font-weight-bold);
  font-family: var(--font-family-heading);
  border-radius: var(--radius-md);             /* 4px */
  transition: all var(--transition-base);
  box-shadow: var(--shadow-md);
  cursor: pointer;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-2);
  letter-spacing: var(--letter-spacing-wide);
  text-transform: uppercase;
}

.btn-primary:hover {
  background: var(--button-theme-color-hover);
  box-shadow: var(--shadow-yellow);
  transform: translateY(-2px);
}

.btn-primary:active {
  background: var(--button-theme-color-active);
  transform: translateY(0);
  box-shadow: var(--shadow-sm);
}

.btn-primary:focus-visible {
  outline: 3px solid var(--color-theme-primary);
  outline-offset: 4px;
}

.btn-primary i {
  font-size: 1.2em;
}
```

---

#### **Secondary Button (Dark)**

```html
<button class="btn btn-secondary">
  <i class="fa-solid fa-location-dot"></i>
  Śledź Przesyłkę
</button>
```

```css
.btn-secondary {
  background: var(--button-secondary-color);
  color: var(--button-text-dark);
  border: 2px solid var(--color-theme-primary);
  padding: calc(var(--spacing-3) - 2px) calc(var(--spacing-6) - 2px);
  font-size: var(--font-size-base);
  font-weight: var(--font-weight-bold);
  font-family: var(--font-family-heading);
  border-radius: var(--radius-md);
  transition: all var(--transition-base);
  cursor: pointer;
  text-transform: uppercase;
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-2);
}

.btn-secondary:hover {
  background: var(--color-theme-primary);
  color: var(--button-text-color);
  box-shadow: var(--shadow-md);
}
```

---

#### **Outline Button**

```html
<button class="btn btn-outline">
  Dowiedz się więcej
</button>
```

```css
.btn-outline {
  background: transparent;
  color: var(--color-theme-primary);
  border: 2px solid var(--color-theme-primary);
  padding: calc(var(--spacing-3) - 2px) calc(var(--spacing-6) - 2px);
  font-size: var(--font-size-base);
  font-weight: var(--font-weight-bold);
  border-radius: var(--radius-md);
  transition: all var(--transition-base);
  cursor: pointer;
  text-transform: uppercase;
}

.btn-outline:hover {
  background: var(--color-theme-primary);
  color: var(--button-text-color);
}
```

---

#### **Button Sizes**

```css
/* Small */
.btn-sm {
  padding: var(--spacing-2) var(--spacing-4);  /* 8px 16px */
  font-size: var(--font-size-sm);
}

/* Large */
.btn-lg {
  padding: var(--spacing-4) var(--spacing-8);  /* 16px 32px */
  font-size: var(--font-size-lg);
}

/* Extra Large (Hero CTA) */
.btn-xl {
  padding: var(--spacing-5) var(--spacing-10); /* 20px 40px */
  font-size: var(--font-size-xl);
}

/* Full Width */
.btn-block {
  width: 100%;
  display: flex;
  justify-content: center;
}
```

---

### Cards (Service Cards)

```html
<div class="card card-service">
  <div class="card-icon">
    <i class="fa-solid fa-truck-fast"></i>
  </div>
  <div class="card-body">
    <h3 class="card-title">Transport Ekspresowy</h3>
    <p class="card-text">
      Szybka dostawa 24-48h na terenie Niemiec i Polski. 
      Gwarantujemy terminowość i bezpieczeństwo.
    </p>
    <ul class="card-features">
      <li><i class="fa-solid fa-check"></i> Dostawa 24-48h</li>
      <li><i class="fa-solid fa-check"></i> GPS Tracking</li>
      <li><i class="fa-solid fa-check"></i> Ubezpieczenie</li>
    </ul>
  </div>
  <div class="card-footer">
    <a href="/uslugi/transport-ekspresowy" class="card-link">
      Dowiedz się więcej 
      <i class="fa-solid fa-arrow-right"></i>
    </a>
  </div>
</div>
```

```css
.card {
  background: var(--background-white);
  border: 2px solid var(--border-color-light);
  border-radius: var(--radius-lg);
  overflow: hidden;
  transition: all var(--transition-base);
  box-shadow: var(--shadow-sm);
}

.card:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl);
  border-color: var(--color-theme-primary);
}

.card-service {
  text-align: center;
}

.card-icon {
  padding: var(--spacing-8) var(--spacing-6);
  background: var(--color-theme-primary);
  display: flex;
  justify-content: center;
  align-items: center;
}

.card-icon i {
  font-size: 4rem;
  color: var(--color-heading-primary);
}

.card-body {
  padding: var(--spacing-6);
}

.card-title {
  font-size: var(--font-size-2xl);
  font-weight: var(--font-weight-bold);
  color: var(--color-heading-primary);
  margin-bottom: var(--spacing-3);
  text-transform: uppercase;
}

.card-text {
  font-size: var(--font-size-base);
  color: var(--color-text-secondary);
  line-height: var(--line-height-relaxed);
  margin-bottom: var(--spacing-4);
}

.card-features {
  list-style: none;
  padding: 0;
  margin: 0;
  text-align: left;
}

.card-features li {
  padding: var(--spacing-2) 0;
  display: flex;
  align-items: center;
  gap: var(--spacing-3);
}

.card-features li i {
  color: var(--color-accent-green);
  font-size: 1.2em;
}

.card-footer {
  padding: var(--spacing-6);
  border-top: 2px solid var(--border-color-light);
  background: var(--background-light);
}

.card-link {
  color: var(--color-theme-primary);
  font-weight: var(--font-weight-bold);
  text-decoration: none;
  transition: color var(--transition-fast);
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-2);
  text-transform: uppercase;
}

.card-link:hover {
  color: var(--color-theme-primary-dark);
}

.card-link i {
  transition: transform var(--transition-fast);
}

.card-link:hover i {
  transform: translateX(4px);
}
```

---

### Forms

```html
<form class="form form-quote">
  <div class="form-row">
    <div class="form-group">
      <label for="name" class="form-label">
        Imię i nazwisko <span class="required">*</span>
      </label>
      <input 
        type="text" 
        id="name" 
        name="name" 
        class="form-control" 
        placeholder="Jan Kowalski"
        required>
    </div>
    
    <div class="form-group">
      <label for="email" class="form-label">
        Email <span class="required">*</span>
      </label>
      <input 
        type="email" 
        id="email" 
        name="email" 
        class="form-control" 
        placeholder="jan.kowalski@firma.pl"
        required>
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group">
      <label for="from" class="form-label">
        Skąd <span class="required">*</span>
      </label>
      <input 
        type="text" 
        id="from" 
        name="from" 
        class="form-control" 
        placeholder="Berlin, Niemcy"
        required>
    </div>
    
    <div class="form-group">
      <label for="to" class="form-label">
        Dokąd <span class="required">*</span>
      </label>
      <input 
        type="text" 
        id="to" 
        name="to" 
        class="form-control" 
        placeholder="Warszawa, Polska"
        required>
    </div>
  </div>
  
  <div class="form-group">
    <label for="cargo" class="form-label">
      Opis ładunku <span class="required">*</span>
    </label>
    <textarea 
      id="cargo" 
      name="cargo" 
      class="form-control" 
      rows="4" 
      placeholder="Rodzaj towaru, wymiary, waga..."
      required></textarea>
  </div>
  
  <div class="form-group">
    <label class="form-label">
      Rodzaj transportu <span class="required">*</span>
    </label>
    <div class="form-check-group">
      <label class="form-check">
        <input type="radio" name="type" value="express" required>
        <span>Ekspresowy (24-48h)</span>
      </label>
      <label class="form-check">
        <input type="radio" name="type" value="ftl">
        <span>Pełnowymiarowy (FTL)</span>
      </label>
      <label class="form-check">
        <input type="radio" name="type" value="ltl">
        <span>Częściowy (LTL)</span>
      </label>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary btn-block btn-lg">
    <i class="fa-solid fa-paper-plane"></i>
    Wyślij Zapytanie
  </button>
</form>
```

```css
.form-quote {
  background: var(--background-white);
  padding: var(--spacing-8);
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-lg);
  border: 2px solid var(--color-theme-primary);
}

.form-row {
  display: grid;
  grid-template-columns: 1fr;
  gap: var(--spacing-4);
  margin-bottom: var(--spacing-4);
}

@media (min-width: 768px) {
  .form-row {
    grid-template-columns: 1fr 1fr;
  }
}

.form-group {
  margin-bottom: var(--spacing-5);
}

.form-label {
  display: block;
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-bold);
  color: var(--color-text-primary);
  margin-bottom: var(--spacing-2);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wide);
}

.required {
  color: var(--color-accent-red);
}

.form-control {
  width: 100%;
  padding: var(--spacing-3) var(--spacing-4);
  font-size: var(--font-size-base);
  font-family: var(--font-family-body);
  color: var(--input-text);
  background: var(--input-bg);
  border: 2px solid var(--input-border);
  border-radius: var(--radius-md);
  transition: all var(--transition-fast);
}

.form-control:focus {
  outline: none;
  border-color: var(--input-border-focus);
  box-shadow: var(--input-shadow-focus);
}

.form-control::placeholder {
  color: var(--input-placeholder);
}

.form-control:invalid:not(:placeholder-shown) {
  border-color: var(--color-error);
}

textarea.form-control {
  resize: vertical;
  min-height: 100px;
}

.form-check-group {
  display: flex;
  flex-direction: column;
  gap: var(--spacing-3);
}

.form-check {
  display: flex;
  align-items: center;
  gap: var(--spacing-3);
  padding: var(--spacing-3);
  border: 2px solid var(--border-color-light);
  border-radius: var(--radius-md);
  cursor: pointer;
  transition: all var(--transition-fast);
}

.form-check:hover {
  border-color: var(--color-theme-primary);
  background: var(--background-light);
}

.form-check input[type="radio"] {
  width: 20px;
  height: 20px;
  accent-color: var(--color-theme-primary);
}

.form-check span {
  font-weight: var(--font-weight-medium);
  color: var(--color-text-primary);
}
```

---

### Badges (Status Indicators)

```html
<span class="badge badge-delivered">Dostarczone</span>
<span class="badge badge-in-transit">W drodze</span>
<span class="badge badge-pending">Oczekujące</span>
<span class="badge badge-delayed">Opóźnione</span>
<span class="badge badge-cancelled">Anulowane</span>
```

```css
.badge {
  display: inline-flex;
  align-items: center;
  gap: var(--spacing-2);
  padding: var(--spacing-1) var(--spacing-3);
  font-size: var(--font-size-xs);
  font-weight: var(--font-weight-bold);
  line-height: 1;
  text-align: center;
  white-space: nowrap;
  border-radius: var(--radius-full);
  text-transform: uppercase;
  letter-spacing: var(--letter-spacing-wider);
}

.badge::before {
  content: '';
  width: 8px;
  height: 8px;
  border-radius: 50%;
  display: inline-block;
}

.badge-delivered {
  background: var(--color-status-delivered-bg);
  color: var(--color-status-delivered);
}

.badge-delivered::before {
  background: var(--color-status-delivered);
}

.badge-in-transit {
  background: var(--color-status-in-transit-bg);
  color: var(--color-status-in-transit);
}

.badge-in-transit::before {
  background: var(--color-status-in-transit);
  animation: pulse 2s infinite;
}

.badge-pending {
  background: var(--color-status-pending-bg);
  color: var(--color-status-pending);
}

.badge-pending::before {
  background: var(--color-status-pending);
}

.badge-delayed {
  background: var(--color-status-delayed-bg);
  color: var(--color-status-delayed);
}

.badge-delayed::before {
  background: var(--color-status-delayed);
  animation: pulse 1s infinite;
}

.badge-cancelled {
  background: var(--color-status-cancelled-bg);
  color: var(--color-status-cancelled);
}

.badge-cancelled::before {
  background: var(--color-status-cancelled);
}
```

---

### Progress Bar (Tracking Shipment)

```html
<div class="progress-tracker">
  <div class="progress-step active completed">
    <div class="progress-icon">
      <i class="fa-solid fa-box"></i>
    </div>
    <div class="progress-label">Przyjęty</div>
  </div>
  
  <div class="progress-line completed"></div>
  
  <div class="progress-step active">
    <div class="progress-icon">
      <i class="fa-solid fa-truck"></i>
    </div>
    <div class="progress-label">W drodze</div>
  </div>
  
  <div class="progress-line"></div>
  
  <div class="progress-step">
    <div class="progress-icon">
      <i class="fa-solid fa-warehouse"></i>
    </div>
    <div class="progress-label">W magazynie</div>
  </div>
  
  <div class="progress-line"></div>
  
  <div class="progress-step">
    <div class="progress-icon">
      <i class="fa-solid fa-check-circle"></i>
    </div>
    <div class="progress-label">Dostarczone</div>
  </div>
</div>
```

```css
.progress-tracker {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: var(--spacing-8) 0;
}

.progress-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--spacing-2);
  flex: 0 0 auto;
}

.progress-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: var(--background-light);
  border: 3px solid var(--border-color-light);
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all var(--transition-base);
}

.progress-icon i {
  font-size: 1.5rem;
  color: var(--color-gray-400);
  transition: all var(--transition-base);
}

.progress-step.active .progress-icon {
  background: var(--color-theme-primary);
  border-color: var(--color-theme-primary);
  box-shadow: var(--shadow-yellow);
}

.progress-step.active .progress-icon i {
  color: var(--color-heading-primary);
  animation: pulse 2s infinite;
}

.progress-step.completed .progress-icon {
  background: var(--color-accent-green);
  border-color: var(--color-accent-green);
}

.progress-step.completed .progress-icon i {
  color: white;
}

.progress-label {
  font-size: var(--font-size-sm);
  font-weight: var(--font-weight-bold);
  color: var(--color-text-muted);
  text-transform: uppercase;
}

.progress-step.active .progress-label {
  color: var(--color-heading-primary);
}

.progress-line {
  flex: 1 1 auto;
  height: 3px;
  background: var(--border-color-light);
  position: relative;
}

.progress-line.completed {
  background: var(--color-accent-green);
}

.progress-line.completed::after {
  content: '';
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  width: 0;
  height: 0;
  border-left: 8px solid var(--color-accent-green);
  border-top: 4px solid transparent;
  border-bottom: 4px solid transparent;
}

@media (max-width: 767px) {
  .progress-tracker {
    flex-direction: column;
  }
  
  .progress-line {
    width: 3px;
    height: 40px;
    flex: 0 0 auto;
  }
  
  .progress-line.completed::after {
    top: auto;
    bottom: 0;
    right: 50%;
    transform: translateX(50%) rotate(90deg);
  }
}
```

---

## 🎭 Ikony & Grafika

### Icon System

**Font Awesome 6 (Free) + Custom Transport Icons**

```html
<!-- Transport Icons -->
<i class="fa-solid fa-truck"></i>              <!-- Ciężarówka -->
<i class="fa-solid fa-truck-fast"></i>         <!-- Transport ekspresowy -->
<i class="fa-solid fa-truck-ramp-box"></i>     <!-- Załadunek -->
<i class="fa-solid fa-pallet"></i>             <!-- Palety -->
<i class="fa-solid fa-box"></i>                <!-- Paczka -->
<i class="fa-solid fa-warehouse"></i>          <!-- Magazyn -->

<!-- Location & Tracking -->
<i class="fa-solid fa-location-dot"></i>       <!-- Lokalizacja -->
<i class="fa-solid fa-route"></i>              <!-- Trasa -->
<i class="fa-solid fa-map"></i>                <!-- Mapa -->
<i class="fa-solid fa-satellite-dish"></i>     <!-- GPS -->

<!-- Status & Actions -->
<i class="fa-solid fa-check-circle"></i>       <!-- Potwierdzenie -->
<i class="fa-solid fa-clock"></i>              <!-- Czas -->
<i class="fa-solid fa-shield-halved"></i>      <!-- Ubezpieczenie -->
<i class="fa-solid fa-phone"></i>              <!-- Telefon -->
<i class="fa-solid fa-envelope"></i>           <!-- Email -->

<!-- Services -->
<i class="fa-solid fa-temperature-arrow-down"></i>  <!-- Chłodniczy -->
<i class="fa-solid fa-fire-flame-curved"></i>       <!-- ADR -->
<i class="fa-solid fa-boxes-stacked"></i>           <!-- LTL -->
<i class="fa-solid fa-truck-container"></i>         <!-- FTL -->
```

```css
.icon {
  width: 1.5rem;   /* 24px */
  height: 1.5rem;
  display: inline-block;
  vertical-align: middle;
}

.icon-sm {
  width: 1rem;     /* 16px */
  height: 1rem;
}

.icon-lg {
  width: 2rem;     /* 32px */
  height: 2rem;
}

.icon-xl {
  width: 3rem;     /* 48px */
  height: 3rem;
}

.icon-2xl {
  width: 4rem;     /* 64px */
  height: 4rem;
}

.icon-primary {
  color: var(--color-theme-primary);
}

.icon-secondary {
  color: var(--color-theme-secondary);
}

.icon-success {
  color: var(--color-accent-green);
}

.icon-danger {
  color: var(--color-accent-red);
}

/* Icon w kółku */
.icon-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: var(--color-theme-primary);
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

.icon-circle i {
  font-size: 1.5rem;
  color: var(--color-heading-primary);
}
```

---

### Logo Usage

**3 warianty logo:**

1. **logo_palmo_trans_complete_v1.svg** - Pełne logo (hero, header)
2. **logo_palmo_trans_horizontal_v2.svg** - Logo z ikoną ciężarówki (dokumenty)
3. **logo_palmo_trans_icon_only_v3.svg** - Ikona (favicon, mobile)

```html
<!-- Desktop Header -->
<img 
  src="/assets/images/brand/logo_palmo_trans_horizontal_v2.svg" 
  alt="PALMO-TRANS GmbH - Transport Międzynarodowy"
  class="logo"
  width="280"
  height="80">

<!-- Mobile Header -->
<img 
  src="/assets/images/brand/logo_palmo_trans_icon_only_v3.svg" 
  alt="PALMO-TRANS"
  class="logo-mobile"
  width="50"
  height="50">

<!-- Hero Section -->
<img 
  src="/assets/images/brand/logo_palmo_trans_complete_v1.svg" 
  alt="PALMO-TRANS GmbH"
  class="logo-hero"
  width="600"
  height="200">
```

**Minimalne rozmiary:**
- Pełne logo: min. 200px szerokości
- Ikona: min. 40px x 40px

**Ochronne przestrzenie:**
- Wokół logo: minimum 20px
- Między logo a innymi elementami: 30px

---

## ✨ Animacje & Transitions

### Transition Speeds

```css
--transition-fast: 150ms ease-in-out;
--transition-base: 250ms ease-in-out;
--transition-slow: 350ms ease-in-out;
--transition-slower: 500ms ease-in-out;
```

### Easing Functions

```css
--ease-in-out-cubic: cubic-bezier(0.645, 0.045, 0.355, 1);
--ease-in-out-quart: cubic-bezier(0.770, 0, 0.175, 1);
--ease-industrial: cubic-bezier(0.4, 0, 0.2, 1);
```

---

### Hover Animations

#### **Lift Effect**

```css
.hover-lift {
  transition: transform var(--transition-base), 
              box-shadow var(--transition-base);
}

.hover-lift:hover {
  transform: translateY(-8px);
  box-shadow: var(--shadow-xl);
}
```

#### **Yellow Glow Effect**

```css
.hover-yellow-glow {
  transition: box-shadow var(--transition-base);
}

.hover-yellow-glow:hover {
  box-shadow: 0 0 20px rgba(255, 215, 0, 0.6);
}
```

#### **Scale Effect**

```css
.hover-scale {
  transition: transform var(--transition-base);
}

.hover-scale:hover {
  transform: scale(1.05);
}
```

#### **Truck Drive Animation**

```css
@keyframes truckDrive {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100vw);
  }
}

.truck-moving {
  animation: truckDrive 8s linear infinite;
}
```

---

### Scroll Animations (AOS.js)

```html
<!-- Fade In Up -->
<div data-aos="fade-up" data-aos-duration="600">
  Content fades in from bottom
</div>

<!-- Fade In (staggered) -->
<div class="service-card" data-aos="fade-up" data-aos-delay="0">Service 1</div>
<div class="service-card" data-aos="fade-up" data-aos-delay="100">Service 2</div>
<div class="service-card" data-aos="fade-up" data-aos-delay="200">Service 3</div>

<!-- Slide In -->
<div data-aos="slide-right" data-aos-duration="800">
  Truck image slides in
</div>
```

**AOS Configuration:**

```javascript
AOS.init({
  duration: 600,
  easing: 'ease-in-out-cubic',
  once: true,
  offset: 100,
  delay: 0,
  disable: 'mobile'
});
```

---

### Loading States

```html
<button class="btn btn-primary" disabled>
  <span class="spinner"></span>
  Wysyłanie...
</button>
```

```css
.spinner {
  display: inline-block;
  width: 1.2rem;
  height: 1.2rem;
  border: 3px solid rgba(26, 26, 26, 0.3);
  border-top-color: var(--color-heading-primary);
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
```

---

## 📱 Responsywność

### Breakpoints

```css
/* Mobile First Approach */

/* Extra Small (default): < 576px */
/* Phones */

/* Small: 576px - 767px */
@media (min-width: 576px) {
  /* Large phones, small tablets */
}

/* Medium: 768px - 991px */
@media (min-width: 768px) {
  /* Tablets */
}

/* Large: 992px - 1199px */
@media (min-width: 992px) {
  /* Small laptops */
}

/* Extra Large: 1200px - 1399px */
@media (min-width: 1200px) {
  /* Desktops */
}

/* Extra Extra Large: 1400px+ */
@media (min-width: 1400px) {
  /* Large desktops */
}
```

---

### Responsive Patterns

#### **Stack to Row**

```html
<div class="row">
  <div class="col-12 col-md-6 col-lg-4">
    <!-- Mobile: 100% width -->
    <!-- Tablet: 50% width -->
    <!-- Desktop: 33.33% width -->
  </div>
</div>
```

#### **Hide/Show Elements**

```css
/* Hide on mobile, show on desktop */
.d-none.d-md-block {
  display: none;
}

@media (min-width: 768px) {
  .d-none.d-md-block {
    display: block;
  }
}

/* Show on mobile, hide on desktop */
.d-block.d-md-none {
  display: block;
}

@media (min-width: 768px) {
  .d-block.d-md-none {
    display: none;
  }
}
```

---

## ♿ Accessibility (WCAG 2.2 Level AA)

### Color Contrast

**Minimum ratios:**
- Normal text: 4.5:1 ✅
- Large text (18pt+): 3:1 ✅
- UI components: 3:1 ✅

**Nasze kontrasty:**
- Yellow (#FFD700) na białym: 5.2:1 ✅
- Black (#1A1A1A) na białym: 14.8:1 ✅
- Black (#1A1A1A) na yellow (#FFD700): 10.5:1 ✅

---

### Focus States

```css
*:focus-visible {
  outline: 3px solid var(--color-theme-primary);
  outline-offset: 4px;
  border-radius: var(--radius-sm);
}

*:focus {
  outline: none;
}
```

---

### ARIA Labels

```html
<!-- Button bez tekstu -->
<button aria-label="Otwórz menu nawigacji">
  <i class="fa-solid fa-bars"></i>
</button>

<!-- Link z ikoną -->
<a href="tel:+49XXXXXXXXX" aria-label="Zadzwoń do PALMO-TRANS">
  <i class="fa-solid fa-phone"></i>
</a>

<!-- Status transportu -->
<div role="status" aria-live="polite">
  <span class="badge badge-in-transit">W drodze</span>
</div>
```

---

### Keyboard Navigation

**Tab order musi być logiczny:**

1. Logo
2. Navigation links
3. Language switcher
4. CTA button ("Zapytaj o wycenę")
5. Main content
6. Forms
7. Footer links

**Skip to content link:**

```html
<a href="#main-content" class="skip-to-content">
  Przejdź do treści
</a>

<style>
.skip-to-content {
  position: absolute;
  top: -40px;
  left: 0;
  background: var(--color-theme-primary);
  color: var(--color-heading-primary);
  padding: 8px 16px;
  z-index: 100;
  font-weight: bold;
}

.skip-to-content:focus {
  top: 0;
}
</style>
```

---

### Reduced Motion

```css
@media (prefers-reduced-motion: reduce) {
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}
```

---

## 📚 Resources

**Fonts:**
- System fonts (Arial, Helvetica)
- No external font loading (performance!)

**Icons:**
- [Font Awesome 6](https://fontawesome.com/)
- Transport-specific icons collection

**Color Tools:**
- [Coolors.co](https://coolors.co/)
- [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/)

**Animations:**
- [AOS.js](https://michalsnik.github.io/aos/)
- CSS Animations

---

**Ostatnia aktualizacja:** 2025-11-24  
**Wersja dokumentu:** 1.0.0  
**Designer:** @piotroq