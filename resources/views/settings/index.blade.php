<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paramètres - Baliseo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-stockplus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="sidebar-logo-icon"><i class="fas fa-cube"></i></div>
                <div class="sidebar-logo-text">StockPlus</div>
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a href="{{ route('dashboard') }}" class="sidebar-menu-link">
                        <span class="sidebar-menu-icon"><i class="fas fa-chart-line"></i></span>
                        <span>Tableau de Bord</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('stock.index') }}" class="sidebar-menu-link">
                        <span class="sidebar-menu-icon"><i class="fas fa-boxes"></i></span>
                        <span>Gestion des Stocks</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('pdv.index') }}" class="sidebar-menu-link">
                        <span class="sidebar-menu-icon"><i class="fas fa-cash-register"></i></span>
                        <span>PDV / Facturation</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('clients.index') }}" class="sidebar-menu-link">
                        <span class="sidebar-menu-icon"><i class="fas fa-users"></i></span>
                        <span>Gestion des Clients</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('reports.index') }}" class="sidebar-menu-link">
                        <span class="sidebar-menu-icon"><i class="fas fa-chart-bar"></i></span>
                        <span>Rapports</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a href="{{ route('settings.index') }}" class="sidebar-menu-link active">
                        <span class="sidebar-menu-icon"><i class="fas fa-cog"></i></span>
                        <span>Paramètres</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <div class="header" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 244, 255, 0.95) 100%); backdrop-filter: blur(10px); border-radius: 12px; padding: 20px 24px; margin-bottom: 24px; box-shadow: 0 8px 32px rgba(0, 102, 255, 0.08); border: 1px solid rgba(232, 234, 237, 0.5);">
                <div>
                    <h1 class="header-title" style="font-size: 26px; margin-bottom: 4px;">Paramètres</h1>
                    <p style="color: #999; font-size: 13px; margin: 0;">
                        Configurez les paramètres de votre application.
                    </p>
                </div>
                <div class="header-actions" style="display: flex; align-items: center; gap: 16px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div class="user-avatar" style="width: 36px; height: 36px; font-size: 14px;">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600; color: #1A1A1A;">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                            <div style="font-size: 11px; color: #999;">Administrateur</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" class="action-btn secondary" style="padding: 8px 12px; font-size: 12px;">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Settings Container -->
            <div class="settings-container">
                <!-- Settings Sidebar -->
                <div class="settings-sidebar">
                    <ul class="settings-menu">
                        <li class="settings-menu-item">
                            <a class="settings-menu-link active" onclick="showSection('general')">
                                <i class="fas fa-sliders-h"></i>
                                <span>Général</span>
                            </a>
                        </li>
                        <li class="settings-menu-item">
                            <a class="settings-menu-link" onclick="showSection('company')">
                                <i class="fas fa-building"></i>
                                <span>Entreprise</span>
                            </a>
                        </li>
                        <li class="settings-menu-item">
                            <a class="settings-menu-link" onclick="showSection('appearance')">
                                <i class="fas fa-palette"></i>
                                <span>Apparence</span>
                            </a>
                        </li>
                        <li class="settings-menu-item">
                            <a class="settings-menu-link" onclick="showSection('notifications')">
                                <i class="fas fa-bell"></i>
                                <span>Notifications</span>
                            </a>
                        </li>
                        <li class="settings-menu-item">
                            <a class="settings-menu-link" onclick="showSection('users')">
                                <i class="fas fa-users-cog"></i>
                                <span>Utilisateurs</span>
                            </a>
                        </li>
                        <li class="settings-menu-item">
                            <a class="settings-menu-link" onclick="showSection('security')">
                                <i class="fas fa-lock"></i>
                                <span>Sécurité</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Settings Content -->
                <div class="settings-content">
                    <!-- General Settings -->
                    <div id="general" class="settings-section">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-sliders-h"></i>
                                Paramètres Généraux
                            </h2>
                            <p class="section-description">Configurez les paramètres généraux de l'application.</p>
                        </div>

                        <form class="settings-form">
                            <div class="form-group">
                                <label class="form-label required">Nom de l'Application</label>
                                <input type="text" class="form-input" value="StockPlus" placeholder="Nom de l'application">
                                <p class="form-help">Le nom affiché dans l'en-tête de l'application.</p>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Langue</label>
                                <select class="form-select">
                                    <option value="fr">Français</option>
                                    <option value="en">English</option>
                                    <option value="es">Español</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Fuseau Horaire</label>
                                <select class="form-select">
                                    <option value="Europe/Paris">Europe/Paris (UTC+1)</option>
                                    <option value="Europe/London">Europe/London (UTC+0)</option>
                                    <option value="America/New_York">America/New_York (UTC-5)</option>
                                </select>
                            </div>

                            <div class="settings-actions">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Company Settings -->
                    <div id="company" class="settings-section" style="display: none;">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-building"></i>
                                Informations Entreprise
                            </h2>
                            <p class="section-description">Configurez les informations de votre entreprise.</p>
                        </div>

                        <form class="settings-form">
                            <div class="form-group">
                                <label class="form-label required">Nom de l'Entreprise</label>
                                <input type="text" class="form-input" value="StockPlus S.A.R.L" placeholder="Nom de l'entreprise">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Adresse</label>
                                <input type="text" class="form-input" value="10 Rue du Commerce, 75000 Paris" placeholder="Adresse">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Téléphone</label>
                                <input type="tel" class="form-input" value="+33 1 23 45 67 89" placeholder="Téléphone">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Email</label>
                                <input type="email" class="form-input" value="contact@stockplus.fr" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Numéro SIRET</label>
                                <input type="text" class="form-input" placeholder="Numéro SIRET">
                            </div>

                            <div class="settings-actions">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Appearance Settings -->
                    <div id="appearance" class="settings-section" style="display: none;">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-palette"></i>
                                Apparence
                            </h2>
                            <p class="section-description">Personnalisez l'apparence de l'application.</p>
                        </div>

                        <form class="settings-form">
                            <div class="form-group">
                                <label class="form-label">Thème</label>
                                <div class="toggle-group">
                                    <span class="toggle-label">Mode Sombre</span>
                                    <div class="toggle-switch" id="darkModeToggle"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Couleur Primaire</label>
                                <div class="color-picker-group">
                                    <div class="color-option selected" style="background: #0066FF;" title="Bleu" data-color="blue" onclick="selectColor(this)"></div>
                                    <div class="color-option" style="background: #27AE60;" title="Vert" data-color="green" onclick="selectColor(this)"></div>
                                    <div class="color-option" style="background: #E74C3C;" title="Rouge" data-color="red" onclick="selectColor(this)"></div>
                                    <div class="color-option" style="background: #F39C12;" title="Orange" data-color="orange" onclick="selectColor(this)"></div>
                                    <div class="color-option" style="background: #9B59B6;" title="Violet" data-color="purple" onclick="selectColor(this)"></div>
                                </div>
                                <p class="form-help">Sélectionnez la couleur primaire de l'application.</p>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Taille de Police</label>
                                <select class="form-select" id="fontSizeSelect" onchange="applyFontSize()">
                                    <option value="small">Petite</option>
                                    <option value="normal" selected>Normale</option>
                                    <option value="large">Grande</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Densité de l'Interface</label>
                                <select class="form-select" id="densitySelect" onchange="applyDensity()">
                                    <option value="compact">Compacte</option>
                                    <option value="normal" selected>Normale</option>
                                    <option value="spacious">Spacieuse</option>
                                </select>
                            </div>

                            <div class="settings-actions">
                                <button type="button" class="btn btn-secondary" onclick="resetAppearance()">
                                    <i class="fas fa-undo"></i> Réinitialiser
                                </button>
                                <button type="button" class="btn btn-primary" onclick="saveAppearance()">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Notifications Settings -->
                    <div id="notifications" class="settings-section" style="display: none;">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-bell"></i>
                                Notifications
                            </h2>
                            <p class="section-description">Gérez vos préférences de notifications.</p>
                        </div>

                        <form class="settings-form">
                            <div class="toggle-group">
                                <span class="toggle-label">Notifications Email</span>
                                <div class="toggle-switch active"></div>
                            </div>

                            <div class="toggle-group">
                                <span class="toggle-label">Alertes Stock Faible</span>
                                <div class="toggle-switch active"></div>
                            </div>

                            <div class="toggle-group">
                                <span class="toggle-label">Notifications Factures</span>
                                <div class="toggle-switch active"></div>
                            </div>

                            <div class="toggle-group">
                                <span class="toggle-label">Rapports Hebdomadaires</span>
                                <div class="toggle-switch"></div>
                            </div>

                            <div class="settings-actions">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Users Management -->
                    <div id="users" class="settings-section" style="display: none;">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-users-cog"></i>
                                Gestion des Utilisateurs
                            </h2>
                            <p class="section-description">Gérez les utilisateurs et leurs permissions.</p>
                        </div>

                        <div style="margin-bottom: 16px;">
                            <button type="button" class="btn btn-primary" onclick="openAddUserModal()">
                                <i class="fas fa-plus"></i> Ajouter un Utilisateur
                            </button>
                        </div>

                        <table class="reports-table" style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Nom</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Email</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Rôle</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Modules</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Statut</th>
                                    <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid #E8EAED;">
                                    <td style="padding: 12px;">{{ Auth::user()->name ?? 'Admin' }}</td>
                                    <td style="padding: 12px;">{{ Auth::user()->email ?? 'admin@example.com' }}</td>
                                    <td style="padding: 12px;"><span style="background: #E3F2FD; color: #0066FF; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Administrateur</span></td>
                                    <td style="padding: 12px;"><span style="font-size: 12px; color: #0066FF; font-weight: 600;">Tous</span></td>
                                    <td style="padding: 12px;"><span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span></td>
                                    <td style="padding: 12px;">
                                        <button style="background: none; border: none; color: #0066FF; cursor: pointer; font-size: 14px;" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #E8EAED;">
                                    <td style="padding: 12px;">Caissier 1</td>
                                    <td style="padding: 12px;">caissier1@example.com</td>
                                    <td style="padding: 12px;"><span style="background: #FEF3C7; color: #D97706; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Caissier</span></td>
                                    <td style="padding: 12px;"><span style="font-size: 12px; color: #666;">PDV</span></td>
                                    <td style="padding: 12px;"><span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span></td>
                                    <td style="padding: 12px;">
                                        <button style="background: none; border: none; color: #0066FF; cursor: pointer; font-size: 14px; margin-right: 8px;" title="Éditer" onclick="openEditUserModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button style="background: none; border: none; color: #E74C3C; cursor: pointer; font-size: 14px;" title="Supprimer" onclick="openDeleteUserModal()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #E8EAED;">
                                    <td style="padding: 12px;">Gestionnaire Stock</td>
                                    <td style="padding: 12px;">stock@example.com</td>
                                    <td style="padding: 12px;"><span style="background: #F3E5F5; color: #9B59B6; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Gestionnaire</span></td>
                                    <td style="padding: 12px;"><span style="font-size: 12px; color: #666;">Gestion des Stocks</span></td>
                                    <td style="padding: 12px;"><span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span></td>
                                    <td style="padding: 12px;">
                                        <button style="background: none; border: none; color: #0066FF; cursor: pointer; font-size: 14px; margin-right: 8px;" title="Éditer" onclick="openEditUserModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button style="background: none; border: none; color: #E74C3C; cursor: pointer; font-size: 14px;" title="Supprimer" onclick="openDeleteUserModal()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr style="border-bottom: 1px solid #E8EAED;">
                                    <td style="padding: 12px;">Caissier + Stock</td>
                                    <td style="padding: 12px;">caissier.stock@example.com</td>
                                    <td style="padding: 12px;"><span style="background: #E0F2F1; color: #00897B; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Multi-Rôle</span></td>
                                    <td style="padding: 12px;"><span style="font-size: 12px; color: #666;">PDV + Stocks</span></td>
                                    <td style="padding: 12px;"><span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span></td>
                                    <td style="padding: 12px;">
                                        <button style="background: none; border: none; color: #0066FF; cursor: pointer; font-size: 14px; margin-right: 8px;" title="Éditer" onclick="openEditUserModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button style="background: none; border: none; color: #E74C3C; cursor: pointer; font-size: 14px;" title="Supprimer" onclick="openDeleteUserModal()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Security Settings -->
                    <div id="security" class="settings-section" style="display: none;">
                        <div class="section-header">
                            <h2 class="section-title">
                                <i class="fas fa-lock"></i>
                                Sécurité
                            </h2>
                            <p class="section-description">Gérez la sécurité de votre compte.</p>
                        </div>

                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            Votre compte est sécurisé. Modifiez votre mot de passe régulièrement.
                        </div>

                        <form class="settings-form">
                            <div class="form-group">
                                <label class="form-label required">Mot de passe actuel</label>
                                <input type="password" class="form-input" placeholder="Entrez votre mot de passe actuel">
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Nouveau mot de passe</label>
                                <input type="password" class="form-input" placeholder="Entrez un nouveau mot de passe">
                                <p class="form-help">Minimum 8 caractères avec majuscules, minuscules et chiffres.</p>
                            </div>

                            <div class="form-group">
                                <label class="form-label required">Confirmer le mot de passe</label>
                                <input type="password" class="form-input" placeholder="Confirmez le nouveau mot de passe">
                            </div>

                            <div class="toggle-group">
                                <span class="toggle-label">Authentification à Deux Facteurs</span>
                                <div class="toggle-switch"></div>
                            </div>

                            <div class="settings-actions">
                                <button type="button" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Annuler
                                </button>
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Enregistrer
                                </button>
                            </div>
                        </form>

                        <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid #E8EAED;">
                            <h3 style="font-size: 14px; font-weight: 700; color: #1A1A1A; margin-bottom: 12px;">
                                <i class="fas fa-history"></i> Historique des Connexions
                            </h3>
                            <table class="reports-table" style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Date</th>
                                        <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Heure</th>
                                        <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Adresse IP</th>
                                        <th style="padding: 12px; text-align: left; font-size: 12px; font-weight: 600; color: #666; text-transform: uppercase;">Navigateur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="border-bottom: 1px solid #E8EAED;">
                                        <td style="padding: 12px;">26/11/2025</td>
                                        <td style="padding: 12px;">09:30</td>
                                        <td style="padding: 12px;">192.168.1.100</td>
                                        <td style="padding: 12px;">Chrome - Windows</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #E8EAED;">
                                        <td style="padding: 12px;">25/11/2025</td>
                                        <td style="padding: 12px;">14:15</td>
                                        <td style="padding: 12px;">192.168.1.100</td>
                                        <td style="padding: 12px;">Firefox - Windows</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer" style="margin-top: 24px; padding: 16px; text-align: center; color: #999; font-size: 12px;">
                <i class="fas fa-copyright"></i> 2025 Baliseo. Tous droits réservés.
            </div>
        </main>
    </div>

    <!-- Include User Modals -->
    @include('settings.user-modals')

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.settings-section').forEach(section => {
                section.style.display = 'none';
            });

            // Remove active class from all menu items
            document.querySelectorAll('.settings-menu-link').forEach(link => {
                link.classList.remove('active');
            });

            // Show selected section
            document.getElementById(sectionId).style.display = 'block';

            // Add active class to clicked menu item
            event.target.closest('.settings-menu-link').classList.add('active');
        }

        // Toggle switch functionality
        document.querySelectorAll('.toggle-switch').forEach(toggle => {
            toggle.addEventListener('click', function() {
                this.classList.toggle('active');
            });
        });

        // Color picker functionality
        function selectColor(element) {
            document.querySelectorAll('.color-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            element.classList.add('selected');
        }

        // Appearance functions
        function applyFontSize() {
            const fontSize = document.getElementById('fontSizeSelect').value;
            const root = document.documentElement;
            
            switch(fontSize) {
                case 'small':
                    root.style.fontSize = '12px';
                    break;
                case 'large':
                    root.style.fontSize = '16px';
                    break;
                default:
                    root.style.fontSize = '14px';
            }
            
            localStorage.setItem('fontSize', fontSize);
        }

        function applyDensity() {
            const density = document.getElementById('densitySelect').value;
            const root = document.documentElement;
            
            switch(density) {
                case 'compact':
                    root.style.setProperty('--spacing', '8px');
                    break;
                case 'spacious':
                    root.style.setProperty('--spacing', '20px');
                    break;
                default:
                    root.style.setProperty('--spacing', '12px');
            }
            
            localStorage.setItem('density', density);
        }

        function saveAppearance() {
            const selectedColor = document.querySelector('.color-option.selected');
            const color = selectedColor ? selectedColor.getAttribute('data-color') : 'blue';
            
            localStorage.setItem('primaryColor', color);
            localStorage.setItem('fontSize', document.getElementById('fontSizeSelect').value);
            localStorage.setItem('density', document.getElementById('densitySelect').value);
            
            alert('Apparence enregistrée avec succès!');
        }

        function resetAppearance() {
            document.querySelectorAll('.color-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            document.querySelector('[data-color="blue"]').classList.add('selected');
            document.getElementById('fontSizeSelect').value = 'normal';
            document.getElementById('densitySelect').value = 'normal';
            
            localStorage.removeItem('primaryColor');
            localStorage.removeItem('fontSize');
            localStorage.removeItem('density');
            
            applyFontSize();
            applyDensity();
            
            alert('Apparence réinitialisée');
        }

        // Load saved appearance on page load
        window.addEventListener('load', function() {
            const savedFontSize = localStorage.getItem('fontSize') || 'normal';
            const savedDensity = localStorage.getItem('density') || 'normal';
            
            document.getElementById('fontSizeSelect').value = savedFontSize;
            document.getElementById('densitySelect').value = savedDensity;
            
            applyFontSize();
            applyDensity();
        });
    </script>
</body>
</html>
