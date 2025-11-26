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

                        <!-- Stats Cards -->
                        <div class="users-stats" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
                            <div class="stat-card" style="background: linear-gradient(135deg, rgba(0, 102, 255, 0.1) 0%, rgba(0, 102, 255, 0.05) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(0, 102, 255, 0.2); border-radius: 12px; padding: 20px; animation: slideInUp 0.5s ease-out;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <p style="margin: 0; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 600;">Total Utilisateurs</p>
                                        <h3 style="margin: 8px 0 0 0; font-size: 28px; font-weight: 700; color: #0066FF;">4</h3>
                                    </div>
                                    <i class="fas fa-users" style="font-size: 32px; color: #0066FF; opacity: 0.2;"></i>
                                </div>
                            </div>

                            <div class="stat-card" style="background: linear-gradient(135deg, rgba(39, 174, 96, 0.1) 0%, rgba(39, 174, 96, 0.05) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(39, 174, 96, 0.2); border-radius: 12px; padding: 20px; animation: slideInUp 0.5s ease-out 0.1s backwards;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <p style="margin: 0; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 600;">Utilisateurs Actifs</p>
                                        <h3 style="margin: 8px 0 0 0; font-size: 28px; font-weight: 700; color: #27AE60;">4</h3>
                                    </div>
                                    <i class="fas fa-check-circle" style="font-size: 32px; color: #27AE60; opacity: 0.2;"></i>
                                </div>
                            </div>

                            <div class="stat-card" style="background: linear-gradient(135deg, rgba(155, 89, 182, 0.1) 0%, rgba(155, 89, 182, 0.05) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(155, 89, 182, 0.2); border-radius: 12px; padding: 20px; animation: slideInUp 0.5s ease-out 0.2s backwards;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <p style="margin: 0; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 600;">Rôles Assignés</p>
                                        <h3 style="margin: 8px 0 0 0; font-size: 28px; font-weight: 700; color: #9B59B6;">3</h3>
                                    </div>
                                    <i class="fas fa-shield-alt" style="font-size: 32px; color: #9B59B6; opacity: 0.2;"></i>
                                </div>
                            </div>

                            <div class="stat-card" style="background: linear-gradient(135deg, rgba(243, 156, 18, 0.1) 0%, rgba(243, 156, 18, 0.05) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(243, 156, 18, 0.2); border-radius: 12px; padding: 20px; animation: slideInUp 0.5s ease-out 0.3s backwards;">
                                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                    <div>
                                        <p style="margin: 0; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 600;">Permissions</p>
                                        <h3 style="margin: 8px 0 0 0; font-size: 28px; font-weight: 700; color: #F39C12;">12</h3>
                                    </div>
                                    <i class="fas fa-key" style="font-size: 32px; color: #F39C12; opacity: 0.2;"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div style="display: flex; gap: 12px; margin-bottom: 24px; flex-wrap: wrap;">
                            <button type="button" class="btn btn-primary" onclick="openAddUserModal()" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-user-plus"></i> Ajouter Utilisateur
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="openRolesModal()" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-shield-alt"></i> Gérer Rôles
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="openPermissionsModal()" style="display: flex; align-items: center; gap: 8px;">
                                <i class="fas fa-key"></i> Gérer Permissions
                            </button>
                        </div>

                        <!-- Users Grid -->
                        <div class="users-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 16px;">
                            <!-- User Card 1 -->
                            <div class="user-card" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 244, 255, 0.95) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(232, 234, 237, 0.5); border-radius: 12px; padding: 20px; box-shadow: 0 8px 32px rgba(0, 102, 255, 0.08); transition: all 0.3s ease; animation: slideInUp 0.5s ease-out;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #0066FF, #0052CC); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 18px;">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
                                    <div style="flex: 1;">
                                        <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: #1A1A1A;">{{ Auth::user()->name ?? 'Admin' }}</h4>
                                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                                    <span style="background: #E3F2FD; color: #0066FF; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Administrateur</span>
                                    <span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span>
                                </div>
                                <p style="margin: 0 0 12px 0; font-size: 12px; color: #666;">
                                    <i class="fas fa-lock-open" style="color: #0066FF; margin-right: 6px;"></i>
                                    Tous les modules
                                </p>
                                <div style="display: flex; gap: 8px; padding-top: 12px; border-top: 1px solid #E8EAED;">
                                    <button data-name="{{ Auth::user()->name ?? 'Admin' }}" data-email="{{ Auth::user()->email ?? 'admin@example.com' }}" data-role="Administrateur" data-modules="Tous les modules" onclick="openViewUserModal(this.dataset.name, this.dataset.email, this.dataset.role, this.dataset.modules)" style="flex: 1; background: none; border: 1px solid #0066FF; color: #0066FF; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#0066FF'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#0066FF';">
                                        <i class="fas fa-eye"></i> Voir
                                    </button>
                                    <button data-name="{{ Auth::user()->name ?? 'Admin' }}" onclick="openDeleteUserModal(this.dataset.name)" style="flex: 1; background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#E74C3C'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#E74C3C';">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>

                            <!-- User Card 2 -->
                            <div class="user-card" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 244, 255, 0.95) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(232, 234, 237, 0.5); border-radius: 12px; padding: 20px; box-shadow: 0 8px 32px rgba(0, 102, 255, 0.08); transition: all 0.3s ease; animation: slideInUp 0.5s ease-out 0.1s backwards;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #F39C12, #E67E22); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 18px;">C1</div>
                                    <div style="flex: 1;">
                                        <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: #1A1A1A;">Caissier 1</h4>
                                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">caissier1@example.com</p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                                    <span style="background: #FEF3C7; color: #D97706; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Caissier</span>
                                    <span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span>
                                </div>
                                <p style="margin: 0 0 12px 0; font-size: 12px; color: #666;">
                                    <i class="fas fa-cash-register" style="color: #F39C12; margin-right: 6px;"></i>
                                    PDV / Facturation
                                </p>
                                <div style="display: flex; gap: 8px; padding-top: 12px; border-top: 1px solid #E8EAED;">
                                    <button onclick="openEditUserModal('Caissier 1')" style="flex: 1; background: none; border: 1px solid #0066FF; color: #0066FF; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#0066FF'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#0066FF';">
                                        <i class="fas fa-edit"></i> Éditer
                                    </button>
                                    <button onclick="openDeleteUserModal('Caissier 1')" style="flex: 1; background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#E74C3C'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#E74C3C';">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>

                            <!-- User Card 3 -->
                            <div class="user-card" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 244, 255, 0.95) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(232, 234, 237, 0.5); border-radius: 12px; padding: 20px; box-shadow: 0 8px 32px rgba(0, 102, 255, 0.08); transition: all 0.3s ease; animation: slideInUp 0.5s ease-out 0.2s backwards;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #9B59B6, #8E44AD); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 18px;">GS</div>
                                    <div style="flex: 1;">
                                        <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: #1A1A1A;">Gestionnaire Stock</h4>
                                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">stock@example.com</p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                                    <span style="background: #F3E5F5; color: #9B59B6; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Gestionnaire</span>
                                    <span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span>
                                </div>
                                <p style="margin: 0 0 12px 0; font-size: 12px; color: #666;">
                                    <i class="fas fa-boxes" style="color: #9B59B6; margin-right: 6px;"></i>
                                    Gestion des Stocks
                                </p>
                                <div style="display: flex; gap: 8px; padding-top: 12px; border-top: 1px solid #E8EAED;">
                                    <button onclick="openEditUserModal('Gestionnaire Stock')" style="flex: 1; background: none; border: 1px solid #0066FF; color: #0066FF; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#0066FF'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#0066FF';">
                                        <i class="fas fa-edit"></i> Éditer
                                    </button>
                                    <button onclick="openDeleteUserModal('Gestionnaire Stock')" style="flex: 1; background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#E74C3C'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#E74C3C';">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>

                            <!-- User Card 4 -->
                            <div class="user-card" style="background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 244, 255, 0.95) 100%); backdrop-filter: blur(10px); border: 1px solid rgba(232, 234, 237, 0.5); border-radius: 12px; padding: 20px; box-shadow: 0 8px 32px rgba(0, 102, 255, 0.08); transition: all 0.3s ease; animation: slideInUp 0.5s ease-out 0.3s backwards;">
                                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                                    <div style="width: 48px; height: 48px; background: linear-gradient(135deg, #00897B, #00695C); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 18px;">CS</div>
                                    <div style="flex: 1;">
                                        <h4 style="margin: 0; font-size: 14px; font-weight: 600; color: #1A1A1A;">Caissier + Stock</h4>
                                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">caissier.stock@example.com</p>
                                    </div>
                                </div>
                                <div style="display: flex; gap: 8px; margin-bottom: 12px;">
                                    <span style="background: #E0F2F1; color: #00897B; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Multi-Rôle</span>
                                    <span style="background: #E8F5E9; color: #27AE60; padding: 4px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">Actif</span>
                                </div>
                                <p style="margin: 0 0 12px 0; font-size: 12px; color: #666;">
                                    <i class="fas fa-layer-group" style="color: #00897B; margin-right: 6px;"></i>
                                    PDV + Stocks
                                </p>
                                <div style="display: flex; gap: 8px; padding-top: 12px; border-top: 1px solid #E8EAED;">
                                    <button onclick="openEditUserModal('Caissier + Stock')" style="flex: 1; background: none; border: 1px solid #0066FF; color: #0066FF; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#0066FF'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#0066FF';">
                                        <i class="fas fa-edit"></i> Éditer
                                    </button>
                                    <button onclick="openDeleteUserModal('Caissier + Stock')" style="flex: 1; background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 8px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='#E74C3C'; this.style.color='white';" onmouseout="this.style.background='none'; this.style.color='#E74C3C';">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
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

    <!-- Include User Management Modals -->
    @include('settings.user-management')

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
