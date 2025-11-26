<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rapports - Baliseo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-stockplus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reports.css') }}">
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
                    <a href="{{ route('reports.index') }}" class="sidebar-menu-link active">
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
                    <h1 class="header-title" style="font-size: 26px; margin-bottom: 4px;">Rapports d'Invoices</h1>
                    <p style="color: #999; font-size: 13px; margin: 0;">
                        Consultez et analysez les données de vos factures.
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

            <!-- Reports Container -->
            <div class="reports-container">
                <!-- Filters Section -->
                <div class="filters-section">
                    <div class="filters-title">
                        <i class="fas fa-filter"></i> Filtres et Actions
                    </div>

                    <div class="filters-grid">
                        <div class="filter-group">
                            <label class="filter-label">Plage de dates</label>
                            <div class="date-range">
                                <input type="date" class="filter-input" value="2023-10-01">
                                <span class="date-separator">à</span>
                                <input type="date" class="filter-input" value="2023-10-31">
                            </div>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Client</label>
                            <select class="filter-select">
                                <option value="">Tous les clients</option>
                                <option value="1">Client Alpha</option>
                                <option value="2">Client Beta</option>
                                <option value="3">Client Gamma</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Statut</label>
                            <select class="filter-select">
                                <option value="">Tous les statuts</option>
                                <option value="paid">Payé</option>
                                <option value="unpaid">Impayé</option>
                                <option value="pending">En attente</option>
                            </select>
                        </div>
                    </div>

                    <div class="filters-actions">
                        <button class="btn-export" onclick="exportCSV()">
                            <i class="fas fa-download"></i> CSV
                        </button>
                        <button class="btn-export" onclick="exportExcel()">
                            <i class="fas fa-file-excel"></i> Excel
                        </button>
                        <button class="btn-print" onclick="window.print()">
                            <i class="fas fa-print"></i> Imprimer
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-label">Total des Factures</div>
                        <div class="stat-value">6</div>
                        <div class="stat-description">Nombre total de factures émises.</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Ventes Totales</div>
                        <div class="stat-value">5191.45 €</div>
                        <div class="stat-description">Montant total des ventes.</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-label">Valeur Moyenne par Facture</div>
                        <div class="stat-value">865.24 €</div>
                        <div class="stat-description">Moyenne du montant par facture.</div>
                    </div>
                </div>

                <!-- Reports Table -->
                <div class="reports-section">
                    <h2 class="section-title">
                        <i class="fas fa-list"></i> Liste des Invoices
                    </h2>

                    <table class="reports-table">
                        <thead>
                            <tr>
                                <th>ID Facture</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="invoice-id">INV001</span></td>
                                <td>Client Alpha</td>
                                <td>2023-10-26</td>
                                <td><span class="amount">1250.00 €</span></td>
                                <td><span class="status-badge status-paid">Payé</span></td>
                            </tr>
                            <tr>
                                <td><span class="invoice-id">INV002</span></td>
                                <td>Client Beta</td>
                                <td>2023-10-25</td>
                                <td><span class="amount">890.50 €</span></td>
                                <td><span class="status-badge status-unpaid">Impayé</span></td>
                            </tr>
                            <tr>
                                <td><span class="invoice-id">INV003</span></td>
                                <td>Client Gamma</td>
                                <td>2023-10-24</td>
                                <td><span class="amount">320.75 €</span></td>
                                <td><span class="status-badge status-paid">Payé</span></td>
                            </tr>
                            <tr>
                                <td><span class="invoice-id">INV004</span></td>
                                <td>Client Delta</td>
                                <td>2023-10-23</td>
                                <td><span class="amount">1500.00 €</span></td>
                                <td><span class="status-badge status-paid">Payé</span></td>
                            </tr>
                            <tr>
                                <td><span class="invoice-id">INV005</span></td>
                                <td>Client Epsilon</td>
                                <td>2023-10-22</td>
                                <td><span class="amount">450.20 €</span></td>
                                <td><span class="status-badge status-unpaid">Impayé</span></td>
                            </tr>
                            <tr>
                                <td><span class="invoice-id">INV006</span></td>
                                <td>Client Zeta</td>
                                <td>2023-10-21</td>
                                <td><span class="amount">780.00 €</span></td>
                                <td><span class="status-badge status-paid">Payé</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="pagination-btn" disabled>
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>

            <!-- Footer -->
            <div class="footer" style="margin-top: 24px; padding: 16px; text-align: center; color: #999; font-size: 12px;">
                <i class="fas fa-copyright"></i> 2025 Baliseo. Tous droits réservés.
            </div>
        </main>
    </div>

    <script>
        // Export to CSV
        function exportCSV() {
            alert('Export CSV en cours...');
            // Implémentation de l\'export CSV
        }

        // Export to Excel
        function exportExcel() {
            alert('Export Excel en cours...');
            // Implémentation de l\'export Excel
        }

        // Filter functionality
        document.querySelectorAll('.filter-select, .filter-input').forEach(filter => {
            filter.addEventListener('change', function() {
                console.log('Filtre appliqué');
                // Appliquer les filtres
            });
        });
    </script>
</body>
</html>
