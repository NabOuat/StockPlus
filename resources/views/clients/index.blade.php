<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion des Clients - Baliseo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-stockplus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/clients.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modals.css') }}">
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
                    <a href="{{ route('clients.index') }}" class="sidebar-menu-link active">
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
                    <a href="#" class="sidebar-menu-link">
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
                    <h1 class="header-title" style="font-size: 26px; margin-bottom: 4px;">Gestion des Clients</h1>
                    <p style="color: #999; font-size: 13px; margin: 0;">
                        Gérez et consultez les informations de vos clients.
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

            <!-- Clients Management Section -->
            <div class="clients-management">
                <!-- Controls -->
                <div class="clients-controls">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher des clients..." id="searchClients">
                    </div>

                    <button class="btn-add-client" onclick="openAddClientModal()">
                        <i class="fas fa-plus"></i> Ajouter un client
                    </button>
                </div>

                <!-- Clients Section -->
                <div class="clients-section">
                    <h2 class="section-title">
                        <i class="fas fa-list"></i> Liste des Clients
                    </h2>
                    <p class="section-subtitle">Gérer et consulter les informations de vos clients.</p>

                    <table class="clients-table">
                        <thead>
                            <tr>
                                <th>NOM DU CLIENT</th>
                                <th>CONTACT PRINCIPAL</th>
                                <th>ADRESSE</th>
                                <th>TERMES DE PAIEMENT</th>
                                <th>HISTORIQUE DES COMMANDES</th>
                                <th style="width: 100px;">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Client 1 -->
                            <tr>
                                <td>
                                    <div class="client-name-cell">
                                        <div class="client-avatar">SD</div>
                                        <div>
                                            <div class="client-name">Sophie Dupont</div>
                                            <div class="client-email">sophie.dupont@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="contact-info">sophie.dupont@example.com</span></td>
                                <td><span class="address-info">12 Rue de la Paix, Paris</span></td>
                                <td><span class="payment-terms">Net 30</span></td>
                                <td>
                                    <i class="fas fa-eye history-icon" title="Voir l'historique"></i>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer" onclick="openEditClientModal(1)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteClientModal(1)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Client 2 -->
                            <tr>
                                <td>
                                    <div class="client-name-cell">
                                        <div class="client-avatar" style="background: linear-gradient(135deg, #FF6B6B 0%, #FF5252 100%);">ML</div>
                                        <div>
                                            <div class="client-name">Marc Lefevre</div>
                                            <div class="client-email">marc.lefevre@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="contact-info">marc.lefevre@example.com</span></td>
                                <td><span class="address-info">45 Avenue des Champs, Lyon</span></td>
                                <td><span class="payment-terms">Net 60</span></td>
                                <td>
                                    <i class="fas fa-eye history-icon" title="Voir l'historique"></i>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer" onclick="openEditClientModal(2)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteClientModal(2)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Client 3 -->
                            <tr>
                                <td>
                                    <div class="client-name-cell">
                                        <div class="client-avatar" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">FZ</div>
                                        <div>
                                            <div class="client-name">Fatima Zahraoul</div>
                                            <div class="client-email">fatima.zahraoul@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="contact-info">fatima.zahraoul@example.com</span></td>
                                <td><span class="address-info">78 Boulevard de la Liberté, Marseille</span></td>
                                <td><span class="payment-terms cod">COD</span></td>
                                <td>
                                    <i class="fas fa-eye history-icon" title="Voir l'historique"></i>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer" onclick="openEditClientModal(3)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteClientModal(3)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Client 4 -->
                            <tr>
                                <td>
                                    <div class="client-name-cell">
                                        <div class="client-avatar" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">PD</div>
                                        <div>
                                            <div class="client-name">Pierre Dubois</div>
                                            <div class="client-email">pierre.dubois@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="contact-info">pierre.dubois@example.com</span></td>
                                <td><span class="address-info">10 Rue Saint-Jean, Toulouse</span></td>
                                <td><span class="payment-terms">Net 30</span></td>
                                <td>
                                    <i class="fas fa-eye history-icon" title="Voir l'historique"></i>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer" onclick="openEditClientModal(4)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteClientModal(4)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Client 5 -->
                            <tr>
                                <td>
                                    <div class="client-name-cell">
                                        <div class="client-avatar" style="background: linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%);">IM</div>
                                        <div>
                                            <div class="client-name">Isabelle Moreau</div>
                                            <div class="client-email">isabelle.moreau@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="contact-info">isabelle.moreau@example.com</span></td>
                                <td><span class="address-info">23 Place du Capitole, Bordeaux</span></td>
                                <td><span class="payment-terms reception">À réception</span></td>
                                <td>
                                    <i class="fas fa-eye history-icon" title="Voir l'historique"></i>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer" onclick="openEditClientModal(5)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteClientModal(5)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Client 6 -->
                            <tr>
                                <td>
                                    <div class="client-name-cell">
                                        <div class="client-avatar" style="background: linear-gradient(135deg, #EC4899 0%, #DB2777 100%);">AP</div>
                                        <div>
                                            <div class="client-name">Antoine Petit</div>
                                            <div class="client-email">antoine.petit@example.com</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="contact-info">antoine.petit@example.com</span></td>
                                <td><span class="address-info">50 Rue de la République, Nice</span></td>
                                <td><span class="payment-terms">Net 60</span></td>
                                <td>
                                    <i class="fas fa-eye history-icon" title="Voir l'historique"></i>
                                </td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer" onclick="openEditClientModal(6)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteClientModal(6)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="pagination-btn" disabled>
                        <i class="fas fa-chevron-left"></i> Précédent
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">
                        Suivant <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer" style="margin-top: 24px; padding: 16px; text-align: center; color: #999; font-size: 12px;">
                <i class="fas fa-copyright"></i> 2025 Baliseo. Tous droits réservés.
            </div>
        </main>
    </div>

    <!-- Include Modals -->
    @include('clients.modals')

    <script>
        // Search functionality
        document.getElementById('searchClients').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.clients-table tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Attach modal functions to buttons
        document.addEventListener('DOMContentLoaded', function() {
            // Add button
            document.querySelector('.btn-add-client').addEventListener('click', openAddClientModal);

            // Edit buttons
            document.querySelectorAll('.icon-btn:not(.delete)').forEach(btn => {
                btn.addEventListener('click', function() {
                    openEditClientModal();
                });
            });

            // Delete buttons
            document.querySelectorAll('.icon-btn.delete').forEach(btn => {
                btn.addEventListener('click', function() {
                    openDeleteClientModal();
                });
            });

            // History icons
            document.querySelectorAll('.history-icon').forEach(icon => {
                icon.addEventListener('click', function() {
                    openHistoryModal();
                });
            });
        });
    </script>
</body>
</html>
