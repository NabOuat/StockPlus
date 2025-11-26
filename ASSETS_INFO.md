# 🎨 Assets Baliseo - Informations

## 📁 Logos Utilisés

### `logoIcon.svg`
- **Utilisation**: Logo principal utilisé partout dans l'application
- **Dimensions**: 40x40px (navigation), 70x70px (pages d'authentification)
- **Emplacements**:
  - Header de la page d'accueil
  - Pages de connexion/inscription
  - Sidebar du tableau de bord
  - Favicon (optionnel)

### `logo.svg`
- **Statut**: Non utilisé actuellement
- **Peut être utilisé pour**: Logo complet avec texte (si nécessaire)

## 🎯 Utilisation des Logos

### Page d'Accueil (`home.blade.php`)
```html
<img src="{{ asset('logoIcon.svg') }}" alt="Baliseo Logo" style="width: 40px; height: 40px;">
```

### Pages d'Authentification (`login.blade.php`, `register.blade.php`)
```html
<img src="{{ asset('logoIcon.svg') }}" alt="Baliseo Logo" style="width: 70px; height: 70px; margin-bottom: 16px;">
```

### Tableau de Bord (`dashboard.blade.php`)
```html
<img src="{{ asset('logoIcon.svg') }}" alt="Baliseo Logo" style="width: 40px; height: 40px;">
```

## 🎨 Charte Graphique

### Couleurs Primaires
- **Bleu Foncé**: #17539B
- **Bleu Vif**: #3291F8
- **Orange**: #FF8C42

### Typographie
- **Font**: Instrument Sans
- **Poids**: 400, 500, 600, 700

## 📱 Responsive Design

Les logos s'adaptent automatiquement selon le contexte:
- **Navigation**: 40x40px
- **Authentification**: 70x70px
- **Sidebar**: 40x40px

## ✅ Checklist

- [x] Logo utilisé dans la navigation
- [x] Logo utilisé dans les pages d'authentification
- [x] Logo utilisé dans le tableau de bord
- [x] Dimensions optimisées pour chaque contexte
- [x] Format SVG pour meilleure qualité

---

**Dernière mise à jour**: 25 Novembre 2024
