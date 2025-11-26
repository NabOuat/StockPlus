# 🎨 Baliseo Design Guide

## Overview
Ce guide explique comment utiliser et étendre le système de design moderne et animé de Baliseo.

---

## 📚 Files Structure

```
public/css/
├── dashboard-pro.css          # Styles principaux (animations intégrées)
├── dashboard-stockplus.css    # Styles alternatifs (animations intégrées)
├── animations.css             # Bibliothèque d'animations réutilisables
└── theme-variables.css        # Variables CSS et utilitaires

resources/views/
└── dashboard-final.blade.php  # Template principal
```

---

## 🎯 Quick Start

### 1. Inclure les CSS
```html
<link rel="stylesheet" href="{{ asset('css/dashboard-pro.css') }}">
<link rel="stylesheet" href="{{ asset('css/animations.css') }}">
<link rel="stylesheet" href="{{ asset('css/theme-variables.css') }}">
```

### 2. Utiliser les animations
```html
<!-- Slide In Up -->
<div class="slide-in-up">Contenu</div>

<!-- Avec délai -->
<div class="slide-in-up stagger-1">Item 1</div>
<div class="slide-in-up stagger-2">Item 2</div>

<!-- Pulse -->
<div class="pulse">Alerte</div>

<!-- Float -->
<div class="float">Flottant</div>
```

---

## 🎬 Animation Classes

### Entrance Animations
| Classe | Effet | Durée |
|--------|-------|-------|
| `.fade-in` | Apparition progressive | 0.6s |
| `.slide-in-up` | De bas en haut | 0.6s |
| `.slide-in-left` | De gauche | 0.6s |
| `.slide-in-right` | De droite | 0.6s |
| `.scale-in` | Mise à l'échelle | 0.6s |
| `.rotate-in` | Rotation | 0.6s |

### Continuous Animations
| Classe | Effet | Durée |
|--------|-------|-------|
| `.pulse` | Pulsation | 2s |
| `.glow` | Lueur de texte | 2s |
| `.float` | Flottement | 6s |
| `.bounce` | Rebond | 0.6s |
| `.spinner` | Rotation | 1s |

### Stagger Delays
```html
<div class="slide-in-up stagger-1">Item 1</div>  <!-- 0.1s -->
<div class="slide-in-up stagger-2">Item 2</div>  <!-- 0.2s -->
<div class="slide-in-up stagger-3">Item 3</div>  <!-- 0.3s -->
<div class="slide-in-up stagger-4">Item 4</div>  <!-- 0.4s -->
<div class="slide-in-up stagger-5">Item 5</div>  <!-- 0.5s -->
```

---

## 🎨 Color Palette

### Primary Colors
```css
--color-primary: #3291F8;           /* Bleu principal */
--color-primary-dark: #1f5ab8;      /* Bleu foncé */
--color-primary-darker: #17539B;    /* Bleu très foncé */
--color-primary-light: #F0F4FF;     /* Bleu très clair */
```

### Accent Colors
```css
--color-accent-red: #E74C3C;        /* Rouge */
--color-accent-green: #27AE60;      /* Vert */
--color-accent-orange: #FF8C42;     /* Orange */
```

### Neutral Colors
```css
--color-white: #FFFFFF;
--color-light-gray: #F5F7FA;
--color-border-gray: #E8EAED;
--color-text-dark: #1A1A1A;
--color-text-medium: #666666;
--color-text-light: #999999;
```

---

## 📏 Spacing System

```css
--spacing-xs: 4px;      /* Extra small */
--spacing-sm: 8px;      /* Small */
--spacing-md: 12px;     /* Medium */
--spacing-lg: 16px;     /* Large */
--spacing-xl: 20px;     /* Extra large */
--spacing-2xl: 24px;    /* 2x Large */
--spacing-3xl: 32px;    /* 3x Large */
```

### Usage
```html
<div class="p-lg m-md gap-xl">Contenu</div>
```

---

## 🔲 Border Radius

```css
--radius-sm: 4px;       /* Small */
--radius-md: 6px;       /* Medium */
--radius-lg: 8px;       /* Large */
--radius-xl: 12px;      /* Extra large */
--radius-full: 50%;     /* Circle */
```

### Usage
```html
<div class="rounded-xl">Contenu</div>
```

---

## 💫 Shadows

```css
--shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.05);
--shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
--shadow-lg: 0 8px 32px rgba(50, 145, 248, 0.08);
--shadow-xl: 0 16px 48px rgba(50, 145, 248, 0.15);
--shadow-glow: 0 0 20px rgba(50, 145, 248, 0.3);
```

### Usage
```html
<div class="shadow-lg">Contenu avec ombre</div>
```

---

## ⏱️ Transitions

```css
--transition-fast: 0.2s ease;
--transition-normal: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
--transition-slow: 0.5s ease;
```

### Usage
```html
<button class="transition-normal">Bouton</button>
```

---

## 📝 Typography

### Font Sizes
```css
--font-size-xs: 11px;
--font-size-sm: 12px;
--font-size-base: 13px;
--font-size-md: 14px;
--font-size-lg: 16px;
--font-size-xl: 18px;
--font-size-2xl: 24px;
--font-size-3xl: 28px;
```

### Font Weights
```css
--font-weight-normal: 400;
--font-weight-medium: 500;
--font-weight-semibold: 600;
--font-weight-bold: 700;
```

### Usage
```html
<h1 class="text-3xl font-bold">Titre</h1>
<p class="text-md font-medium">Texte</p>
```

---

## 🎯 Component Examples

### Card with Animation
```html
<div class="slide-in-up shadow-lg rounded-xl p-2xl">
    <h3 class="text-lg font-semibold">Titre</h3>
    <p class="text-md text-secondary">Description</p>
</div>
```

### Button with Hover Effect
```html
<button class="bg-primary text-white p-lg rounded-lg transition-normal">
    Action
</button>
```

### Animated Badge
```html
<span class="pulse bg-accent-red text-white p-sm rounded-full text-xs font-bold">
    Alert
</span>
```

### Floating Icon
```html
<div class="float">
    <svg>...</svg>
</div>
```

---

## 🌙 Dark Mode

### Activation
```html
<!-- Light Mode (Default) -->
<html data-theme="light">

<!-- Dark Mode -->
<html data-theme="dark">
```

### CSS Variables in Dark Mode
```css
[data-theme="dark"] {
    --bg-primary: #1A1A1A;
    --bg-secondary: #2D2D2D;
    --text-primary: #FFFFFF;
    --text-secondary: #B0B0B0;
}
```

---

## ♿ Accessibility

### Respect Motion Preferences
```css
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        transition-duration: 0.01ms !important;
    }
}
```

### Color Contrast
- Tous les textes ont un contraste ≥ 4.5:1
- Les icônes ont un contraste ≥ 3:1

### Focus States
```css
button:focus {
    outline: 2px solid var(--color-primary);
    outline-offset: 2px;
}
```

---

## 🚀 Performance Tips

1. **Utiliser `transform` et `opacity`** pour les animations (GPU accelerated)
2. **Éviter les animations simultanées** - utiliser les délais
3. **Limiter le nombre d'animations** sur une page
4. **Tester sur mobile** - les animations peuvent être gourmandes

### Exemple Optimisé
```css
/* ✅ BON - GPU accelerated */
.element {
    animation: slideInUp 0.6s ease-out;
}

/* ❌ MAUVAIS - CPU intensive */
.element {
    animation: changeLeft 0.6s ease-out;
}
```

---

## 🔧 Customization

### Modifier les couleurs
```css
:root {
    --color-primary: #YOUR_COLOR;
}
```

### Modifier les durées d'animation
```css
:root {
    --animation-duration-normal: 0.8s;
}
```

### Ajouter une nouvelle animation
```css
@keyframes myAnimation {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.my-animation {
    animation: myAnimation 0.6s ease-out;
}
```

---

## 📊 Browser Support

| Browser | Support |
|---------|---------|
| Chrome | ✅ Full |
| Firefox | ✅ Full |
| Safari | ✅ Full |
| Edge | ✅ Full |
| IE 11 | ⚠️ Partial |
| Mobile | ✅ Full |

---

## 🐛 Troubleshooting

### Les animations ne s'affichent pas
- Vérifier que `animations.css` est inclus
- Vérifier la console pour les erreurs CSS
- Vérifier les préférences de mouvement réduit

### Les animations sont saccadées
- Réduire le nombre d'animations simultanées
- Utiliser `transform` et `opacity`
- Vérifier les performances du navigateur

### Les couleurs ne correspondent pas
- Vérifier les variables CSS
- Vérifier le thème actif (light/dark)
- Vérifier les préfixes de navigateur

---

## 📚 Resources

- [MDN - CSS Animations](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Animations)
- [MDN - CSS Transitions](https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Transitions)
- [Web.dev - Performance](https://web.dev/performance/)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)

---

## 📞 Support

Pour toute question ou problème:
1. Consulter ce guide
2. Vérifier les fichiers CSS
3. Tester dans différents navigateurs
4. Vérifier la console du navigateur

---

**Version**: 1.0  
**Last Updated**: 2025-11-26
