# Analiza Elementów Logo - PALMO-TRANS GmbH

**Wersja:** 1.0.0  
**Data:** 2025-11-24  
**Autor:** @piotroq

---

## 📋 Spis Treści

1. [Analiza Obecnego Logo](#analiza-obecnego-logo)
2. [Elementy Wizualne](#elementy-wizualne)
3. [Kolorystyka Szczegółowa](#kolorystyka-szczegółowa)
4. [Typografia Logo](#typografia-logo)
5. [Symbolika i Znaczenie](#symbolika-i-znaczenie)
6. [Wersje Logo SVG](#wersje-logo-svg)
7. [Wytyczne Użycia](#wytyczne-użycia)
8. [Adaptacje Logo](#adaptacje-logo)

---

## 🔍 Analiza Obecnego Logo

### Podstawowe Informacje

**Logo PALMO-TRANS** to klasyczny przykład brandingu w branży transportowej, wykorzystujący międzynarodowo rozpoznawalną kolorystykę żółto-czarną, która jest standardem w logistyce i transporcie drogowym.

### Struktura Logo:

```
┌──────────────────────────────────────┐
│  ┌────────────────────────────────┐  │ <- Czarna ramka (6px)
│  │                                │  │
│  │      P A L M O - T R A N S     │  │ <- Czarny tekst (Arial Black)
│  │                                │  │
│  │            GmbH                │  │ <- Subtext (opcjonalny)
│  │                                │  │
│  └────────────────────────────────┘  │
│         Żółte tło (#FFD700)          │
└──────────────────────────────────────┘
```

### Kluczowe Elementy:

```
Logo PALMO-TRANS
├── Warstwa 1: Ramka czarna (border)
├── Warstwa 2: Tło żółte (background)
├── Warstwa 3: Tekst główny "PALMO-TRANS"
└── Warstwa 4: Podpis "GmbH" (opcjonalny)
```

### Wymiary i Proporcje:

- **Proporcje podstawowe**: 3:1 (szerokość do wysokości)
- **Format**: Prostokątny horyzontalny
- **Minimalna szerokość**: 200px dla pełnej czytelności
- **Maksymalna szerokość**: Bez limitu (skalowalne SVG)
- **Ochronna przestrzeń**: 20px (lub wysokość litery "A")

---

## 🎨 Elementy Wizualne

### 1. Tło (Background Layer)

#### **Kolor Główny: Żółty Transportowy**

**HEX:** `#FFD700`  
**Nazwa:** Gold / Złoty  
**RGB:** R:255 G:215 B:0  
**HSL:** H:51° S:100% L:50%  
**CMYK:** C:0 M:17 Y:100 K:0  
**Pantone:** 109 C (approximate)

**Psychologia koloru żółtego w transporcie:**
- ✅ Wysoka widoczność (dzień i noc)
- ✅ Kojarzenie z bezpieczeństwem drogowym
- ✅ Energia, dynamika, ruch
- ✅ Międzynarodowy standard w logistyce
- ✅ Ostrzeżenie i uwaga (ważne w transporcie)

**Gradient dla efektu premium (opcjonalny):**
```css
background: linear-gradient(135deg, 
  #FFE44D 0%,    /* Jasny żółty */
  #FFD700 50%,   /* Standardowy żółty */
  #E6C200 100%   /* Ciemny żółty */
);
```

**Tekstura (opcjonalna dla druku):**
- Matowe wykończenie dla elegancji
- Błyszczące dla większej widoczności
- Metaliczny efekt dla wersji premium

---

### 2. Ramka (Border Layer)

#### **Specyfikacja Ramki:**

**Kolor:** `#000000` (czysty czarny)  
**Grubość:** 6px (standard)  
**Styl:** Solid (jednolity)  
**Zaokrąglenie rogów:** 
- Wersja klasyczna: 0px (ostre rogi)
- Wersja nowoczesna: 8-10px (zaokrąglone)

**CSS Implementation:**
```css
.logo-border {
  border: 6px solid #000000;
  border-radius: 10px; /* opcjonalne */
  box-sizing: border-box;
}
```

**Funkcja ramki:**
- Definiuje wyraźne granice logo
- Tworzy mocny kontrast z żółtym tłem
- Nadaje solidność i profesjonalizm
- Ułatwia umieszczanie na różnorodnych tłach
- Zwiększa czytelność w małych rozmiarach

**Warianty ramki:**
```
Standard:    ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓   (6px solid)
Cienka:      ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓   (3px solid)
Gruba:       ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓   (10px solid)
Podwójna:    ▓  ▓▓▓▓▓▓▓▓▓  ▓   (double border)
```

---

### 3. Tekst Główny: "PALMO-TRANS"

#### **Typografia:**

**Font Family:** Arial Black, "Helvetica Neue Black", sans-serif  
**Font Weight:** 900 (Black/Heavy)  
**Font Size:** 48-72px (skalowalne)  
**Color:** `#1A1A1A` (prawie czarny, lepszy dla oczu niż #000)  
**Letter Spacing:** +2px (+0.05em)  
**Text Transform:** UPPERCASE  
**Line Height:** 1.1  

**CSS Implementation:**
```css
.logo-text-main {
  font-family: 'Arial Black', 'Helvetica Neue', sans-serif;
  font-weight: 900;
  font-size: 72px;
  color: #1A1A1A;
  letter-spacing: 0.05em;
  text-transform: uppercase;
  line-height: 1.1;
}
```

#### **Struktura Tekstu:**

```
P  A  L  M  O  -  T  R  A  N  S
└┬┘└┬┘└┬┘└┬┘└┬┘  └┬┘└┬┘└┬┘└┬┘└┬┘
 1  2  3  4  5  SEP 6  7  8  9  10

Część 1: PALMO (nazwa własna)
Separator: - (myślnik, łącznik)
Część 2: TRANS (transport)
```

**Separator (myślnik):**
- Wizualnie dzieli nazwę na dwie części
- Podkreśla "TRANS" (transport)
- Balansuje kompozycję
- Opcja: zamienić na kropkę lub slash (PALMO•TRANS, PALMO/TRANS)

**Proporcje liter:**
```
Wysokość główna: 100%
Szerokość liter:
- P, R, A, N, S: 85% wysokości
- L, M, O, T: 75% wysokości
- Separator (-): 40% wysokości
```

---

### 4. Subtext: "GmbH"

#### **Specyfikacja:**

**Font Family:** Arial, Helvetica, sans-serif (Regular, nie Black)  
**Font Weight:** 400-700  
**Font Size:** 18-24px (25-33% rozmiaru głównego tekstu)  
**Color:** `#1A1A1A` lub `#555555` (lżejszy dla hierarchii)  
**Letter Spacing:** +4px (+0.15em) - szerszy niż główny tekst  
**Text Transform:** UPPERCASE  
**Position:** Poniżej głównego tekstu, wyśrodkowane

**CSS Implementation:**
```css
.logo-subtext {
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  font-size: 24px;
  color: #555555;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  text-align: center;
}
```

**Warianty subtextu:**
- "GmbH" (forma prawna)
- "MIĘDZYNARODOWY TRANSPORT DROGOWY" (deskryptor usługi)
- "INTERNATIONAL FREIGHT TRANSPORT" (wersja EN)
- "EST. [YEAR]" (rok założenia - opcjonalnie)

---

## 🎨 Kolorystyka Szczegółowa

### Paleta Główna

#### **Żółty Primary (#FFD700)**

```
███████████████████  #FFD700 - Główny kolor brandu
███████████████████  
                     RGB: 255, 215, 0
                     CMYK: 0, 17, 100, 0
                     Pantone: 109 C
                     Użycie: Tło logo, akcenty, CTA buttons
```

**Odcienie żółtego:**
```css
--yellow-lightest: #FFF9E0;  /* Tła, subtelne akcenty */
--yellow-lighter:  #FFE44D;  /* Hover states */
--yellow-base:     #FFD700;  /* Główny kolor */
--yellow-darker:   #E6C200;  /* Active states, cienie */
--yellow-darkest:  #CCA900;  /* Głęboki akcent */
```

#### **Czarny Primary (#1A1A1A)**

```
███████████████████  #1A1A1A - Tekst główny
███████████████████  
                     RGB: 26, 26, 26
                     CMYK: 0, 0, 0, 90
                     Użycie: Tekst, ramka, nagłówki
```

**Odcienie czarnego/szarego:**
```css
--black-pure:      #000000;  /* Ramka logo */
--black-base:      #1A1A1A;  /* Tekst główny */
--gray-darkest:    #333333;  /* Podtytuły */
--gray-dark:       #555555;  /* Tekst drugorzędny */
--gray-medium:     #777777;  /* Tekst wyciszony */
--gray-light:      #999999;  /* Placeholder */
--gray-lighter:    #CCCCCC;  /* Obramowania */
--gray-lightest:   #E0E0E0;  /* Tła sekcji */
```

### Kolory Wspierające

#### **Czerwony Akcent (Ostrzeżenia)**

```css
--red-base:    #DC143C;  /* Crimson Red */
--red-light:   #FF6B8A;  /* Jasny czerwony */
--red-dark:    #B01030;  /* Ciemny czerwony */
```

**Użycie:**
- Alerty transportowe
- Pilne przesyłki
- Opóźnienia
- Komunikaty ważne

#### **Niebieski Akcent (Informacje)**

```css
--blue-base:   #0066CC;  /* Cobalt Blue */
--blue-light:  #3399FF;  /* Jasny niebieski */
--blue-dark:   #004C99;  /* Ciemny niebieski */
```

**Użycie:**
- Linki
- Tracking informacje
- Status "W drodze"
- Komunikaty informacyjne

#### **Zielony Akcent (Sukces)**

```css
--green-base:  #28A745;  /* Success Green */
--green-light: #5CB85C;  /* Jasny zielony */
--green-dark:  #1E7E34;  /* Ciemny zielony */
```

**Użycie:**
- Potwierdzenia
- Status "Dostarczone"
- Sukces formularzy
- Checkmarki

---

## ✍️ Typografia Logo

### Font Stack Szczegółowy

#### **Primary Font: Arial Black**

**Dlaczego Arial Black?**
- ✅ Uniwersalna dostępność (system font)
- ✅ Doskonała czytelność w małych rozmiarach
- ✅ Mocny, przemysłowy charakter
- ✅ Działa na wszystkich urządzeniach
- ✅ Nie wymaga ładowania web fontów (szybkość!)
- ✅ Sprawdzona w branży transportowej

**Fallback Stack:**
```css
font-family: 
  'Arial Black',           /* Windows, macOS */
  'Helvetica Neue Black',  /* macOS, iOS */
  'Helvetica Bold',        /* Older systems */
  'Arial',                 /* Universal fallback */
  sans-serif;              /* Generic fallback */
```

#### **Alternatywne Fonty (jeśli custom font)**

**Opcja 1: Bebas Neue** (Industrial, mocny)
```css
font-family: 'Bebas Neue', 'Arial Black', sans-serif;
/* Google Fonts: https://fonts.google.com/specimen/Bebas+Neue */
```

**Opcja 2: Oswald** (Mocny, kompaktowy)
```css
font-family: 'Oswald', 'Arial Black', sans-serif;
font-weight: 700;
/* Google Fonts: https://fonts.google.com/specimen/Oswald */
```

**Opcja 3: Anton** (Extra bold, display)
```css
font-family: 'Anton', 'Arial Black', sans-serif;
/* Google Fonts: https://fonts.google.com/specimen/Anton */
```

**⚠️ UWAGA:** Custom fonty zwiększają czas ładowania! Dla logo transportowego system fonts są najlepsze.

---

### Hierarchy Typograficzna

```
PALMO-TRANS  ← 72px / 900 weight / #1A1A1A / Letter-spacing +2px
    │
    └─ GmbH  ← 24px / 700 weight / #555555 / Letter-spacing +4px
```

**Proporcje:**
- Główny tekst: 100% (bazowy rozmiar)
- Subtext: 33% głównego tekstu
- Ramka: 8% głównego tekstu (grubość)

---

## 🧩 Symbolika i Znaczenie

### Analiza Semantyczna Logo

#### **"PALMO"**
- Część nazwy własnej firmy
- Możliwe pochodzenie: nazwa założyciela lub akronim
- Branding: Unikalna, zapamiętywalna nazwa

#### **"TRANS"**
- Skrót od "Transport" lub "Transportation"
- Jednoznacznie komunikuje branżę
- Międzynarodowo rozumiany (trans = przez, poza)

#### **Myślnik "-"**
- Łącznik wizualny
- Separator semantyczny
- Symbol połączenia (A → B transport)
- Reprezentuje trasę/drogę

### Symbolika Kolorów

#### **Żółty (#FFD700)**

**Znaczenie w transporcie:**
- 🚧 Bezpieczeństwo drogowe
- ⚠️ Uwaga i czujność
- 💡 Widoczność (dzień i noc)
- ⚡ Energia i dynamika
- 🌍 Standard międzynarodowy

**Psychologia:**
- Optymizm
- Pewność siebie
- Profesjonalizm
- Niezawodność

**Branże używające żółtego:**
- DHL (żółty + czerwony)
- Ryder (żółty ciężarówki)
- Penske (żółty + czarny)
- Caterpillar (żółty maszyneria)

#### **Czarny (#1A1A1A)**

**Znaczenie w transporcie:**
- 💪 Siła i solidność
- 🎯 Profesjonalizm
- 🔒 Niezawodność
- ⚙️ Industrialność

**Psychologia:**
- Autorytet
- Elegancja
- Precyzja
- Trwałość

### Skojarzenia Branżowe

**Logo PALMO-TRANS przypomina:**
- Znaki drogowe (żółty + czarny = ostrzeżenie)
- Plakietki transportowe
- Tablice rejestracyjne ciężarówek
- Oznaczenia cargo

**To buduje:**
- Instant recognition (rozpoznawalność)
- Trust (zaufanie)
- Professionalism (profesjonalizm)
- Industry compliance (zgodność ze standardami)

---

## 📐 Wersje Logo SVG

### Wersja 1: Logo Kompletne (Primary)

```svg
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
      .text-black { 
        fill: #1A1A1A; 
        font-family: 'Arial Black', sans-serif; 
        font-weight: 900; 
      }
      .text-subtext {
        fill: #555555;
        font-family: 'Arial', sans-serif;
        font-weight: 700;
      }
      .border-black { 
        fill: none; 
        stroke: #000000; 
        stroke-width: 6; 
      }
    </style>
  </defs>

  <!-- Grupa główna logo -->
  <g id="logo-complete">
    
    <!-- Czarna ramka -->
    <rect x="5" y="5" width="590" height="190" rx="10" class="border-black"/>
    
    <!-- Żółte tło -->
    <rect x="10" y="10" width="580" height="180" rx="8" class="background-yellow"/>
    
    <!-- Tekst PALMO-TRANS -->
    <g id="text-main" filter="url(#shadow)">
      <text x="300" y="115" class="text-black" font-size="72" text-anchor="middle" letter-spacing="2">
        PALMO-TRANS
      </text>
    </g>
    
    <!-- Subtext GmbH -->
    <g id="text-sub">
      <text x="300" y="155" class="text-subtext" font-size="24" text-anchor="middle" letter-spacing="4">
        GmbH
      </text>
    </g>
  </g>
</svg>
```

**Użycie:**
- Hero section strony głównej
- Nagłówek email
- Dokumenty PDF (faktury, umowy)
- Prezentacje firmowe

**Wymiary eksportu:**
- Web: 600x200px, 1200x400px (2x), 1800x600px (3x)
- Druk: 300 DPI, 20cm x 6.67cm

---

### Wersja 2: Logo Horyzontalne z Ikoną

```svg
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
    <!-- Kabina -->
    <rect x="-30" y="-25" width="60" height="40" fill="#1A1A1A" rx="5"/>
    <!-- Naczepa -->
    <rect x="30" y="-15" width="20" height="30" fill="#FFD700"/>
    <!-- Koła -->
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

**Użycie:**
- Header strony internetowej
- Wizytówki
- Papier firmowy
- Podpis email

**Wymiary eksportu:**
- Web: 800x150px, 1600x300px (2x)
- Druk: 300 DPI, 26.67cm x 5cm

---

### Wersja 3: Ikona Kwadratowa (Favicon)

```svg
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
    
    <!-- Detale ładunku -->
    <rect x="-10" y="-15" width="50" height="3" fill="#FFD700"/>
    <rect x="-10" y="-5" width="50" height="3" fill="#FFD700"/>
  </g>

  <!-- Inicjały PT -->
  <text x="100" y="170" fill="#1A1A1A" font-family="Arial Black, sans-serif" font-size="32" font-weight="900" text-anchor="middle">
    PT
  </text>
</svg>
```

**Użycie:**
- Favicon (16x16px, 32x32px, 64x64px)
- App icon mobile
- Social media avatar (Facebook, LinkedIn)
- Google My Business profile picture

**Wymiary eksportu:**
- Favicon: 16x16px, 32x32px, 64x64px, 128x128px
- Apple Touch Icon: 180x180px
- Android: 192x192px, 512x512px
- Social: 400x400px, 800x800px

---

### Wersja 4: Tylko Tekst (Text-Only)

```svg
<?xml version="1.0" encoding="UTF-8"?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 100" role="img">
  <title>PALMO-TRANS - Tylko Tekst</title>
  <desc>Wersja tekstowa logo bez grafiki</desc>

  <defs>
    <style>
      .text-main { 
        fill: #1A1A1A; 
        font-family: 'Arial Black', sans-serif; 
        font-weight: 900; 
      }
      .text-sub { 
        fill: #555555; 
        font-family: 'Arial', sans-serif; 
      }
    </style>
  </defs>

  <!-- Tło przezroczyste lub białe -->
  <rect fill="#FFFFFF" width="500" height="100" opacity="0"/>
  
  <!-- PALMO-TRANS -->
  <text x="250" y="55" class="text-main" font-size="48" text-anchor="middle" letter-spacing="3">
    PALMO-TRANS
  </text>
  
  <!-- Linia separująca -->
  <line x1="100" y1="65" x2="400" y2="65" stroke="#FFD700" stroke-width="2"/>
  
  <!-- Subtext -->
  <text x="250" y="85" class="text-sub" font-size="16" text-anchor="middle" letter-spacing="2">
    MIĘDZYNARODOWY TRANSPORT DROGOWY
  </text>
</svg>
```

**Użycie:**
- Footer strony
- Podpisy dokumentów
- Tekstowe wzmianki
- Email signature (uproszczona)

**Wymiary eksportu:**
- Web: 500x100px, 1000x200px (2x)

---

## 📏 Wytyczne Użycia

### Minimalne Rozmiary

```
Format            | Min Width | Min Height | Use Case
--------------------|-----------|------------|------------------
Pełne logo          | 200px     | 67px       | Web headers
Logo horyzontalne   | 180px     | 34px       | Email signature
Ikona kwadratowa    | 40px      | 40px       | Favicon, mobile
Tylko tekst         | 150px     | 30px       | Footer
```

### Ochronne Przestrzenie

```
┌─────────────────────────────────┐
│   ↑                             │
│  20px  ← Ochronna przestrzeń    │
│   ↓                             │
│   ┌───────────────────────┐     │
│   │  PALMO-TRANS          │←20px│
│   └───────────────────────┘     │
│                                 │
└─────────────────────────────────┘

Minimalna przestrzeń wokół logo:
- 20px lub wysokość litery "A"
- Żadne inne elementy w tej strefie
```

### Tła Dopuszczalne

#### **✅ DOBRE:**

**Jasne tła:**
```css
background: #FFFFFF; /* Biały */
background: #F5F5F5; /* Off-white */
background: #E0E0E0; /* Jasny szary */
```

**Ciemne tła (użyj wersji odwróconej):**
```css
background: #1A1A1A; /* Czarny */
background: #333333; /* Ciemnoszary */
```

**Zdjęcia/tekstury:**
- Użyj białej/czarnej półprzezroczystej nakładki (overlay)
- Blur tło za logo
- Upewnij się o kontrast min. 4.5:1

#### **❌ ZŁE:**

```css
/* NIE używaj logo na: */
background: #FFD700; /* Żółte tło = brak kontrastu */
background: #FFC107; /* Pomarańczowe = brak kontrastu */
background: linear-gradient(red, blue); /* Pstrokate tła */
```

### Wersja Odwrócona (Inverse/Negative)

**Dla ciemnych tł:**
```
Tło:    Czarne (#1A1A1A)
Ramka:  Żółta (#FFD700)
Tekst:  Żółty (#FFD700) lub Biały (#FFFFFF)
```

**SVG wersja odwrócona:**
```svg
<!-- Ciemne tło -->
<rect fill="#1A1A1A" width="600" height="200"/>
<!-- Żółta ramka -->
<rect x="10" y="10" width="580" height="180" fill="#000000" stroke="#FFD700" stroke-width="6"/>
<!-- Żółty tekst -->
<text fill="#FFD700" ...>PALMO-TRANS</text>
```

---

## 🔄 Adaptacje Logo

### Responsywne Wersje

#### **Desktop (> 1200px)**
```html
<img src="logo-complete.svg" alt="PALMO-TRANS" width="600" height="200">
```

#### **Tablet (768px - 1199px)**
```html
<img src="logo-horizontal.svg" alt="PALMO-TRANS" width="400" height="75">
```

#### **Mobile (< 767px)**
```html
<img src="logo-icon.svg" alt="PALMO-TRANS" width="50" height="50">
```

### Wielojęzyczne Warianty

#### **Niemiecki (DE):**
```
PALMO-TRANS
INTERNATIONALE SPEDITION
```

#### **Polski (PL):**
```
PALMO-TRANS
MIĘDZYNARODOWY TRANSPORT DROGOWY
```

#### **Angielski (EN):**
```
PALMO-TRANS
INTERNATIONAL FREIGHT TRANSPORT
```

### Animowane Logo (CSS)

```css
@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}

.logo-animated {
  animation: fadeIn 0.6s ease-out;
}

.logo-animated:hover {
  transform: scale(1.05);
  transition: transform 0.3s ease;
}
```

### Logo w Ruchu (dla video/animacji)

```css
@keyframes truckDrive {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}

.logo-truck-icon {
  animation: truckDrive 3s ease-in-out infinite;
}
```

---

## 📦 Formaty Eksportu

### Dla Web

```
Format  | Size              | Use Case
--------|-------------------|---------------------------
SVG     | Scalable          | Primary (all uses)
PNG     | 600x200 @2x       | Retina displays
PNG     | 300x100 @1x       | Standard displays
WebP    | Compressed        | Modern browsers
AVIF    | Highly compressed | Cutting-edge browsers
```

### Dla Druku

```
Format | Resolution | Use Case
-------|------------|---------------------------
PDF    | Vector     | Dokumenty, broszury
EPS    | Vector     | Adobe suite, profesjonalny druk
PNG    | 300 DPI    | Office (Word, PowerPoint)
TIFF   | 300 DPI    | Drukarnia offset
```

### Dla Social Media

```
Platform      | Size        | Format
--------------|-------------|--------
Facebook      | 1200x630px  | PNG/JPG
LinkedIn      | 1200x627px  | PNG/JPG
Instagram     | 1080x1080px | PNG/JPG
Twitter       | 1200x675px  | PNG/JPG
Favicon       | 32x32px     | PNG/ICO
```

---

## ✅ Checklist Implementacji

### Przed Wdrożeniem:

- [ ] Przygotowano wszystkie 4 wersje SVG
- [ ] Wyeksportowano PNG w rozdzielczościach 1x, 2x, 3x
- [ ] Stworzono favicon (16px, 32px, 64px)
- [ ] Przygotowano wersję dla ciemnych tł
- [ ] Przetestowano czytelność w małych rozmiarach
- [ ] Sprawdzono kontrast (min. 4.5:1)
- [ ] Dodano alt text dla accessibility
- [ ] Zoptymalizowano pliki (kompresja)
- [ ] Utworzono brand guidelines PDF
- [ ] Przeszkolono zespół z użycia logo

### Po Wdrożeniu:

- [ ] Zamieszczono logo na stronie www
- [ ] Zaktualizowano social media profile pictures
- [ ] Dodano do podpisu email
- [ ] Umieszczono na wizytówkach
- [ ] Dodano do dokumentów firmowych
- [ ] Zaktualizowano Google My Business
- [ ] Umieszczono na pojazdach (jeśli dotyczy)

---

## 📚 Pliki do Pobrania

### Struktura Folderów:

```
/assets/images/brand/
├── logo/
│   ├── svg/
│   │   ├── logo-palmo-trans-complete.svg
│   │   ├── logo-palmo-trans-horizontal.svg
│   │   ├── logo-palmo-trans-icon.svg
│   │   └── logo-palmo-trans-text-only.svg
│   ├── png/
│   │   ├── logo-palmo-trans-600x200.png
│   │   ├── logo-palmo-trans-600x200@2x.png
│   │   ├── logo-palmo-trans-600x200@3x.png
│   │   └── favicon/
│   │       ├── favicon-16x16.png
│   │       ├── favicon-32x32.png
│   │       └── favicon-64x64.png
│   └── print/
│       ├── logo-palmo-trans.pdf
│       ├── logo-palmo-trans.eps
│       └── logo-palmo-trans-300dpi.tiff
└── brand-guidelines.pdf
```

---

## 🎓 Tips & Best Practices

### DO's (Rób to):

✅ Używaj wersji SVG kiedy tylko możliwe (skalowalne)  
✅ Zachowuj proporcje (nie rozciągaj!)  
✅ Używaj odpowiedniej wersji dla kontekstu (desktop/mobile)  
✅ Testuj czytelność w małych rozmiarach  
✅ Zachowaj ochronne przestrzenie  
✅ Używaj oficjalnych kolorów (#FFD700, #1A1A1A)  
✅ Sprawdzaj kontrast na różnych tłach  

### DON'Ts (Nie rób tego):

❌ Nie zmieniaj kolorów logo  
❌ Nie dodawaj efektów (cienie, gradienty nie z wytycznych)  
❌ Nie obracaj logo  
❌ Nie umieszczaj na pstrokatych tłach  
❌ Nie rozciągaj (zachowaj aspect ratio)  
❌ Nie używaj niskiej jakości PNG (rozmyte)  
❌ Nie pomijaj ochronnych przestrzeni  
❌ Nie zmieniaj fontu lub układu tekstu  

---

**Ostatnia aktualizacja:** 2025-11-24  
**Wersja dokumentu:** 1.0.0  
**Autor:** @piotroq

---

## 📞 Kontakt

**W sprawie logo i brandingu:**  
Email: branding@palmo-trans.com  
Web: https://www.palmo-trans.com

**Pytania techniczne (SVG, formaty):**  
Email: it@palmo-trans.com