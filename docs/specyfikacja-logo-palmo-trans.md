# Specyfikacja Logo - PALMO-TRANS GmbH

## Analiza Obecnego Logo

### Elementy Wizualne:
- **Tekst główny**: "PALMO-TRANS" - czcionka bold, sans-serif
- **Tło**: Intensywny żółty (#FFD700) z czarną ramką
- **Styl**: Przemysłowy, mocny, czytelny
- **Format**: Prostokątny horyzontalny

### Kolorystyka Obecna:
- **Tło**: Żółty #FFD700 (kolor typowy dla branży transportowej)
- **Tekst**: Czarny #1A1A1A
- **Ramka**: Czarna #000000

---

## Wektoryzacja Logo - 4 Warianty SVG

Przygotowuję kompletną wektoryzację logo PALMO-TRANS z pełną strukturą warstw:

```svg name=logo_palmo_trans_complete_v1.svg
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 200" role="img">
  <title>PALMO-TRANS GmbH - Logo Kompletne</title>
  <desc>Logo firmy transportowej PALMO-TRANS</desc>

  <defs>
    <linearGradient id="yellowGradient" x1="0%" y1="0%" x2="0%" y2="100%">
      <stop offset="0%" style="stop-color:#FFE44D"/>
      <stop offset="50%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#E6C200"/>
    </linearGradient>

    <filter id="shadow">
      <feGaussianBlur in="SourceAlpha" stdDeviation="3"/>
      <feOffset dx="0" dy="2" result="offsetblur"/>
      <feFlood flood-color="#000000" flood-opacity="0.3"/>
      <feComposite in2="offsetblur" operator="in"/>
      <feMerge>
        <feMergeNode/>
        <feMergeNode in="SourceGraphic"/>
      </feMerge>
    </filter>

    <style>
      .background-yellow { fill: url(#yellowGradient); }
      .text-black { fill: #1A1A1A; font-family: 'Arial Black', sans-serif; font-weight: 900; }
      .border-black { fill: none; stroke: #000000; stroke-width: 6; }
    </style>
  </defs>

  <!-- Grupa główna logo -->
  <g id="logo-complete">
    
    <!-- Czarna ramka -->
    <rect x="5" y="5" width="590" height="190" rx="10" class="border-black"/>
    
    <!-- Żółte tło -->
    <rect x="10" y="10" width="580" height="180" rx="8" class="background-yellow"/>
    
    <!-- Tekst PALMO-TRANS -->
    <g id="text-palmo-trans" filter="url(#shadow)">
      <text x="300" y="120" class="text-black" font-size="72" text-anchor="middle" letter-spacing="2">
        PALMO-TRANS
      </text>
    </g>
    
    <!-- Subtitle GmbH -->
    <g id="text-gmbh">
      <text x="300" y="160" class="text-black" font-size="24" text-anchor="middle" letter-spacing="4">
        GmbH
      </text>
    </g>
  </g>
</svg>
```

```svg name=logo_palmo_trans_horizontal_v2.svg
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 150" role="img">
  <title>PALMO-TRANS GmbH - Wersja Horyzontalna</title>
  <desc>Poziomy układ logo z ikoną ciężarówki</desc>

  <defs>
    <linearGradient id="yellowGrad2" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:#FFD700"/>
      <stop offset="100%" style="stop-color:#FFC700"/>
    </linearGradient>
  </defs>

  <!-- Tło białe -->
  <rect fill="#FFFFFF" width="800" height="150"/>

  <!-- Ikona ciężarówki -->
  <g id="truck-icon" transform="translate(50,75)">
    <rect x="-30" y="-25" width="60" height="40" fill="#1A1A1A" rx="5"/>
    <rect x="30" y="-15" width="20" height="30" fill="#FFD700"/>
    <circle cx="-10" cy="20" r="8" fill="#1A1A1A"/>
    <circle cx="20" cy="20" r="8" fill="#1A1A1A"/>
    <circle cx="-10" cy="20" r="4" fill="#FFD700"/>
    <circle cx="20" cy="20" r="4" fill="#FFD700"/>
  </g>

  <!-- Żółty panel z tekstem -->
  <g id="text-panel" transform="translate(150,0)">
    <rect x="0" y="20" width="620" height="110" fill="url(#yellowGrad2)" stroke="#000000" stroke-width="3" rx="8"/>
    
    <text x="310" y="75" fill="#1A1A1A" font-family="Arial Black, sans-serif" font-size="48" font-weight="900" text-anchor="middle">
      PALMO-TRANS
    </text>
    
    <text x="310" y="105" fill="#1A1A1A" font-family="Arial, sans-serif" font-size="18" text-anchor="middle" letter-spacing="3">
      MIĘDZYNARODOWY TRANSPORT DROGOWY
    </text>
  </g>
</svg>
```

```svg name=logo_palmo_trans_icon_only_v3.svg
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" role="img">
  <title>PALMO-TRANS - Ikona</title>
  <desc>Kwadratowa ikona logo dla favicon i social media</desc>

  <defs>
    <radialGradient id="yellowRadial" cx="50%" cy="50%">
      <stop offset="0%" style="stop-color:#FFE44D"/>
      <stop offset="100%" style="stop-color:#E6C200"/>
    </radialGradient>
  </defs>

  <!-- Żółte koło tła -->
  <circle cx="100" cy="100" r="95" fill="url(#yellowRadial)" stroke="#000000" stroke-width="5"/>

  <!-- Stylizowana ciężarówka -->
  <g id="truck-symbol" transform="translate(100,100)">
    <!-- Kabina -->
    <rect x="-60" y="-30" width="50" height="40" fill="#1A1A1A" rx="5"/>
    
    <!-- Naczepa -->
    <rect x="-10" y="-25" width="55" height="35" fill="#1A1A1A" rx="3"/>
    
    <!-- Okno -->
    <rect x="-50" y="-25" width="30" height="20" fill="#FFD700" rx="2"/>
    
    <!-- Koła -->
    <circle cx="-40" cy="15" r="12" fill="#1A1A1A"/>
    <circle cx="20" cy="15" r="12" fill="#1A1A1A"/>
    <circle cx="-40" cy="15" r="6" fill="#FFD700"/>
    <circle cx="20" cy="15" r="6" fill="#FFD700"/>
    
    <!-- Detale -->
    <rect x="-10" y="-15" width="50" height="3" fill="#FFD700"/>
    <rect x="-10" y="-5" width="50" height="3" fill="#FFD700"/>
  </g>

  <!-- Inicjały PT -->
  <text x="100" y="170" fill="#1A1A1A" font-family="Arial Black, sans-serif" font-size="32" font-weight="900" text-anchor="middle">
    PT
  </text>
</svg>
```

```svg name=logo_palmo_trans_text_only_v4.svg
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 100" role="img">
  <title>PALMO-TRANS - Tylko Tekst</title>
  <desc>Wersja tekstowa logo bez grafiki</desc>

  <defs>
    <style>
      .text-main { fill: #1A1A1A; font-family: 'Arial Black', sans-serif; font-weight: 900; }
      .text-sub { fill: #555555; font-family: 'Arial', sans-serif; }
    </style>
  </defs>

  <!-- Tło przezroczyste -->
  
  <!-- PALMO-TRANS -->
  <text x="250" y="55" class="text-main" font-size="48" text-anchor="middle" letter-spacing="3">
    PALMO-TRANS
  </text>
  
  <!-- Linia separująca -->
  <line x1="100" y1="65" x2="400" y2="65" stroke="#FFD700" stroke-width="2"/>
  
  <!-- GmbH -->
  <text x="250" y="85" class="text-sub" font-size="16" text-anchor="middle" letter-spacing="2">
    MIĘDZYNARODOWY TRANSPORT DROGOWY
  </text>
</svg>
```

---

## Struktura Warstw Logo

```
├── background-layer (żółte tło)
├── border-layer (czarna ramka)
├── logo-group
│   ├── text-palmo-trans (główny napis)
│   ├── text-gmbh (podpis)
│   └── decorative-elements (opcjonalne grafiki)
```

---

## Paleta Kolorów Brandu

### Kolory Główne:
- **Żółty Primary**: `#FFD700` - główny kolor brandu
- **Czarny Primary**: `#1A1A1A` - tekst i akcenty
- **Biały**: `#FFFFFF` - tła alternatywne

### Kolory Wspierające:
- **Żółty Light**: `#FFE44D` - hover states
- **Żółty Dark**: `#E6C200` - active states
- **Szary Ciemny**: `#333333` - teksty drugorzędne
- **Czerwony Accent**: `#DC143C` - alerty, ostrzeżenia
- **Niebieski Accent**: `#0066CC` - linki, informacje

---

## Typografia

### Fonty Główne:
- **Headings**: Arial Black, Helvetica, sans-serif (900 weight)
- **Body**: Arial, Helvetica Neue, sans-serif (400 weight)
- **Monospace**: Courier New (dla numerów tras)

### Hierarchy:
```css
H1: Arial Black, 48px-72px, weight 900, uppercase
H2: Arial Black, 36px-48px, weight 900
H3: Arial, 24px-36px, weight 700
Body: Arial, 16px-18px, weight 400
```

---

## Minimalne Rozmiary

- **Pełne logo**: minimum 200px szerokości
- **Ikona**: minimum 32px x 32px
- **Tylko tekst**: minimum 150px szerokości

---

## Ochronne Przestrzenie

- Wokół logo: minimum 20px (lub wysokość litery "A")
- Między logo a innymi elementami: 30px+

---

## Wersje Logo - Use Cases

### Wersja 1: Complete (logo_palmo_trans_complete_v1.svg)
- **Użycie**: Hero section, główny banner
- **Formaty**: Desktop, druk
- **Tło**: Dowolne (ma własne tło)

### Wersja 2: Horizontal (logo_palmo_trans_horizontal_v2.svg)
- **Użycie**: Header strony, dokumenty, wizytówki
- **Formaty**: Wszystkie
- **Tło**: Jasne

### Wersja 3: Icon Only (logo_palmo_trans_icon_only_v3.svg)
- **Użycie**: Favicon, app icon, social media avatar
- **Formaty**: Square (200x200px, 512x512px)
- **Tło**: Przezroczyste lub żółte

### Wersja 4: Text Only (logo_palmo_trans_text_only_v4.svg)
- **Użycie**: Footer, małe formaty, teksty
- **Formaty**: Horizontal narrow spaces
- **Tło**: Jasne

---

## Export Formats

**Dla Web:**
- SVG (skalowalne, preferowane)
- PNG 2x (retina): 600px, 1200px, 2400px szerokości
- WebP (kompresja)

**Dla Druku:**
- PDF (wektorowy)
- EPS (Adobe)
- PNG 300dpi

**Dla Social Media:**
- Facebook: 1200x630px (og:image)
- LinkedIn: 1200x627px
- Instagram: 1080x1080px
- Favicon: 32x32px, 192x192px, 512x512px

---

**Ostatnia aktualizacja**: 2025-11-24  
**Wersja**: 1.0.0  
**Autor**: @piotroq