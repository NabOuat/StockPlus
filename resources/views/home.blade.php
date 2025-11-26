<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baliseo - Plateforme SaaS de Gestion</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="/" class="logo">
                <img src="{{ asset('logoIcon.svg') }}" alt="Baliseo Logo" style="width: 40px; height: 40px;">
                <span>Baliseo</span>
            </a>
            <div class="nav-links">
                @auth
                    <a href="{{ route('dashboard') }}">Tableau de bord</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Connexion</a>
                    <a href="{{ route('register') }}" class="btn-primary">S'inscrire</a>
                @endauth
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Gérez votre chaîne de valeur en un seul endroit</h1>
        <p>Baliseo est une plateforme SaaS moderne qui vous offre une vue centralisée et des outils d'action rapide pour gérer votre chaîne de valeur, de l'entrée du stock à l'émission des factures client.</p>
        <div class="hero-buttons">
            @guest
                <a href="{{ route('register') }}" class="btn-primary">Commencer gratuitement</a>
                <a href="{{ route('login') }}" class="btn-secondary">Se connecter</a>
            @endguest
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2 class="section-title">Fonctionnalités principales</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">📦</div>
                <h3>Gestion du Stock</h3>
                <p>Suivez votre inventaire en temps réel avec des alertes automatiques pour les articles en bas stock.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📋</div>
                <h3>Commandes</h3>
                <p>Gérez vos commandes fournisseurs et clients avec un système de suivi complet et des notifications.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💳</div>
                <h3>Facturation</h3>
                <p>Générez et gérez vos factures facilement avec des modèles personnalisables et un suivi des paiements.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">👥</div>
                <h3>Gestion Clients</h3>
                <p>Centralisez les informations de vos clients et maintenez une relation client optimale.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Tableaux de Bord</h3>
                <p>Visualisez vos métriques clés avec des graphiques intuitifs et des rapports détaillés.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚙️</div>
                <h3>Automatisation</h3>
                <p>Automatisez vos processus répétitifs et gagnez du temps sur les tâches administratives.</p>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="benefits-content">
            <h2 class="section-title">Pourquoi choisir Baliseo ?</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <div class="benefit-check">✓</div>
                    <div>
                        <h4>Interface Intuitive</h4>
                        <p>Une interface claire et facile à utiliser, sans courbe d'apprentissage complexe.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-check">✓</div>
                    <div>
                        <h4>Sécurité Garantie</h4>
                        <p>Vos données sont protégées avec le chiffrement SSL et les sauvegardes automatiques.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-check">✓</div>
                    <div>
                        <h4>Support 24/7</h4>
                        <p>Notre équipe est toujours disponible pour vous aider et répondre à vos questions.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-check">✓</div>
                    <div>
                        <h4>Scalabilité</h4>
                        <p>Grandissez sans limites avec une plateforme qui s'adapte à votre croissance.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-check">✓</div>
                    <div>
                        <h4>Intégrations</h4>
                        <p>Connectez vos outils favoris pour un workflow sans friction.</p>
                    </div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-check">✓</div>
                    <div>
                        <h4>Tarification Flexible</h4>
                        <p>Des plans adaptés à tous les budgets et tailles d'entreprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stats-content">
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">Entreprises actives</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50K+</div>
                <div class="stat-label">Transactions traitées</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">99.9%</div>
                <div class="stat-label">Disponibilité</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24/7</div>
                <div class="stat-label">Support client</div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing">
        <h2 class="section-title">Tarification Simple et Transparente</h2>
        <div class="pricing-grid">
            <!-- Starter Plan -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Starter</h3>
                    <p class="pricing-desc">Pour débuter</p>
                </div>
                <div class="pricing-price">
                    <span class="price">29€</span>
                    <span class="period">/mois</span>
                </div>
                <ul class="pricing-features">
                    <li>✓ Jusqu'à 1000 articles</li>
                    <li>✓ Gestion basique du stock</li>
                    <li>✓ 5 utilisateurs</li>
                    <li>✓ Support email</li>
                    <li>✗ API</li>
                    <li>✗ Intégrations avancées</li>
                </ul>
                <button class="btn-pricing">Commencer</button>
            </div>

            <!-- Professional Plan -->
            <div class="pricing-card featured">
                <div class="pricing-badge">Populaire</div>
                <div class="pricing-header">
                    <h3>Professionnel</h3>
                    <p class="pricing-desc">Pour les PME</p>
                </div>
                <div class="pricing-price">
                    <span class="price">79€</span>
                    <span class="period">/mois</span>
                </div>
                <ul class="pricing-features">
                    <li>✓ Jusqu'à 10000 articles</li>
                    <li>✓ Gestion complète du stock</li>
                    <li>✓ 20 utilisateurs</li>
                    <li>✓ Support prioritaire</li>
                    <li>✓ API</li>
                    <li>✓ Intégrations de base</li>
                </ul>
                <button class="btn-pricing featured">Commencer</button>
            </div>

            <!-- Enterprise Plan -->
            <div class="pricing-card">
                <div class="pricing-header">
                    <h3>Entreprise</h3>
                    <p class="pricing-desc">Pour les grandes structures</p>
                </div>
                <div class="pricing-price">
                    <span class="price">Sur devis</span>
                    <span class="period"></span>
                </div>
                <ul class="pricing-features">
                    <li>✓ Illimité</li>
                    <li>✓ Toutes les fonctionnalités</li>
                    <li>✓ Utilisateurs illimités</li>
                    <li>✓ Support 24/7 dédié</li>
                    <li>✓ API complète</li>
                    <li>✓ Intégrations personnalisées</li>
                </ul>
                <button class="btn-pricing">Nous contacter</button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2 class="section-title">Ce que disent nos clients</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"Baliseo a transformé notre gestion de stock. Nous avons réduit nos erreurs de 80% et gagné 10 heures par semaine!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">JD</div>
                    <div>
                        <div class="author-name">Jean Dupont</div>
                        <div class="author-role">Directeur, E-commerce Plus</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"L'interface est intuitive et le support client est excellent. Nous recommandons Baliseo à tous nos partenaires!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">MC</div>
                    <div>
                        <div class="author-name">Marie Chauvin</div>
                        <div class="author-role">Gérante, Boutique Luxe</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"Avec Baliseo, nous avons automatisé 90% de nos processus. C'est un investissement qui s'est rentabilisé en 3 mois!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">PL</div>
                    <div>
                        <div class="author-name">Pierre Laurent</div>
                        <div class="author-role">PDG, Logistique Express</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <h2 class="section-title">Questions Fréquemment Posées</h2>
        <div class="faq-grid">
            <div class="faq-item">
                <h4>Comment commencer ?</h4>
                <p>Inscrivez-vous en 2 minutes, configurez votre compte et commencez à gérer votre stock immédiatement. Pas de carte bancaire requise pour l'essai gratuit.</p>
            </div>
            <div class="faq-item">
                <h4>Puis-je importer mes données ?</h4>
                <p>Oui! Nous supportons l'import depuis Excel, CSV et d'autres systèmes. Notre équipe peut vous aider avec la migration.</p>
            </div>
            <div class="faq-item">
                <h4>Mes données sont-elles sécurisées ?</h4>
                <p>Absolument. Nous utilisons le chiffrement SSL, les sauvegardes automatiques et respectons les normes RGPD et ISO 27001.</p>
            </div>
            <div class="faq-item">
                <h4>Quel est le délai de mise en place ?</h4>
                <p>Vous pouvez commencer en quelques minutes. Pour une intégration complète, comptez 1-2 jours selon votre complexité.</p>
            </div>
            <div class="faq-item">
                <h4>Proposez-vous une formation ?</h4>
                <p>Oui, nous offrons des webinaires gratuits, une documentation complète et un support par email/chat pour tous les plans.</p>
            </div>
            <div class="faq-item">
                <h4>Puis-je changer de plan ?</h4>
                <p>Bien sûr! Vous pouvez upgrader ou downgrader votre plan à tout moment. Les changements sont appliqués au prochain cycle de facturation.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <h2>Prêt à transformer votre gestion ?</h2>
        <p>Rejoignez des centaines d'entreprises qui font confiance à Baliseo</p>
        <div class="cta-buttons">
            <a href="{{ route('register') }}" class="btn-primary">Commencer gratuitement</a>
            <a href="#" class="btn-secondary">Voir une démo</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Baliseo</h4>
                <p>La plateforme SaaS pour gérer votre chaîne de valeur simplement.</p>
            </div>
            <div class="footer-section">
                <h4>Produit</h4>
                <ul>
                    <li><a href="#">Fonctionnalités</a></li>
                    <li><a href="#">Tarification</a></li>
                    <li><a href="#">Sécurité</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Entreprise</h4>
                <ul>
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Légal</h4>
                <ul>
                    <li><a href="#">Conditions</a></li>
                    <li><a href="#">Confidentialité</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 Baliseo - Plateforme SaaS de gestion de chaîne de valeur. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
