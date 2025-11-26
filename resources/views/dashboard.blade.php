<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Baliseo - Tableau de bord</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-stockplus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-variables.css') }}">
    <style>
        /* Override pour meilleure harmonisation */
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
            margin-bottom: 24px;
        }

        .stat-card {
            padding: 16px;
            min-height: 140px;
        }

        .stat-value {
            font-size: 22px;
        }

        .content-grid {
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .chart-container {
            grid-column: span 1;
        }

        .chart-container[style*="grid-column: span 2"] {
            grid-column: span 2;
        }

        .activity-feed {
            max-height: 400px;
            overflow-y: auto;
        }

        .quick-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .quick-actions h3 {
            margin-bottom: 12px;
        }

        .action-btn {
            padding: 10px 14px;
            font-size: 12px;
        }

        @media (max-width: 1200px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .chart-container[style*="grid-column: span 2"] {
                grid-column: span 1;
            }
        }
    </style>
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
                    <a href="{{ route('dashboard') }}" class="sidebar-menu-link active">
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
                    <a href="{{ route('settings.index') }}" class="sidebar-menu-link">
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
                    <h1 class="header-title" style="font-size: 26px; margin-bottom: 4px;">Tableau de Bord</h1>
                    <p style="color: #999; font-size: 13px; margin: 0;">
                        {{ \Carbon\Carbon::now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}
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

            <!-- Key Metrics - 4 Cards -->
            <div class="stats-grid" style="grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px;">
                <!-- Stock -->
                <div class="stat-card slide-in-up stagger-1">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div>
                            <div class="stat-title">STOCK</div>
                        </div>
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #0066FF 0%, #0052CC 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                    <div class="stat-value">120</div>
                    <div class="stat-label">Produits uniques</div>
                    <div style="font-size: 12px; color: #10b981; margin-top: 8px;">
                        <i class="fas fa-arrow-up"></i> +15 ce mois
                    </div>
                </div>

                <!-- Alertes -->
                <div class="stat-card slide-in-up stagger-2">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div>
                            <div class="stat-title">ALERTES</div>
                        </div>
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #FF6B6B 0%, #FF5252 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            <i class="fas fa-bell"></i>
                        </div>
                    </div>
                    <div class="stat-value">5</div>
                    <div class="stat-label">À réapprovisionner</div>
                    <div style="font-size: 11px; background: #FFE5E5; color: #E74C3C; padding: 4px 8px; border-radius: 4px; display: inline-block; margin-top: 8px; font-weight: 600;">
                        Action requise
                    </div>
                </div>

                <!-- Ventes -->
                <div class="stat-card slide-in-up stagger-3">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div>
                            <div class="stat-title">VENTES</div>
                        </div>
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #10b981 0%, #059669 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                    </div>
                    <div class="stat-value">€1 250</div>
                    <div class="stat-label">Aujourd'hui</div>
                    <div style="font-size: 12px; color: #10b981; margin-top: 8px;">
                        <i class="fas fa-arrow-up"></i> +12% vs hier
                    </div>
                </div>

                <!-- Factures -->
                <div class="stat-card slide-in-up stagger-4">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                        <div>
                            <div class="stat-title">FACTURES</div>
                        </div>
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px;">
                            <i class="fas fa-file-invoice"></i>
                        </div>
                    </div>
                    <div class="stat-value">8</div>
                    <div class="stat-label">€3 450 en attente</div>
                    <div style="font-size: 12px; color: #ef4444; margin-top: 8px;">
                        <i class="fas fa-exclamation-circle"></i> 3 en retard
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="content-grid" style="grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
                <!-- Quick Actions + Top Products -->
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <!-- Quick Actions -->
                    <div class="quick-actions slide-in-up stagger-1">
                        <h3 style="font-size: 14px; font-weight: 600; margin: 0 0 12px 0;">
                            <i class="fas fa-bolt"></i> Actions Rapides
                        </h3>
                        <button onclick="openDashboardModal('invoice')" class="action-btn" style="padding: 10px 14px; font-size: 12px;">
                            <i class="fas fa-file-invoice-dollar"></i> Créer Facture
                        </button>
                        <button onclick="openDashboardModal('product')" class="action-btn secondary" style="padding: 10px 14px; font-size: 12px;">
                            <i class="fas fa-box-open"></i> Ajouter Produit
                        </button>
                        <button onclick="openDashboardModal('client')" class="action-btn secondary" style="padding: 10px 14px; font-size: 12px;">
                            <i class="fas fa-user-plus"></i> Enregistrer Client
                        </button>
                    </div>

                    <!-- Top Products -->
                    <div class="chart-container slide-in-up stagger-2">
                        <h3 class="chart-title" style="font-size: 14px; margin-bottom: 12px;">
                            <i class="fas fa-trophy"></i> Top Produits
                        </h3>
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            <div style="display: flex; justify-content: space-between; padding: 10px; background: #f8f9fa; border-radius: 6px; border-left: 3px solid #0066FF;">
                                <div>
                                    <div style="font-weight: 600; font-size: 12px; color: #1A1A1A;">Eau Minérale</div>
                                    <div style="font-size: 11px; color: #999;">234 unités</div>
                                </div>
                                <div style="font-weight: 700; color: #0066FF;">€351</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 10px; background: #f8f9fa; border-radius: 6px; border-left: 3px solid #0066FF;">
                                <div>
                                    <div style="font-weight: 600; font-size: 12px; color: #1A1A1A;">Pain Complet</div>
                                    <div style="font-size: 11px; color: #999;">189 unités</div>
                                </div>
                                <div style="font-weight: 700; color: #0066FF;">€284</div>
                            </div>
                            <div style="display: flex; justify-content: space-between; padding: 10px; background: #f8f9fa; border-radius: 6px; border-left: 3px solid #0066FF;">
                                <div>
                                    <div style="font-weight: 600; font-size: 12px; color: #1A1A1A;">Café Arabica</div>
                                    <div style="font-size: 11px; color: #999;">156 unités</div>
                                </div>
                                <div style="font-weight: 700; color: #0066FF;">€1 170</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart + Activity -->
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <!-- Sales Chart -->
                    <div class="chart-container slide-in-up stagger-1">
                        <h3 class="chart-title" style="font-size: 14px; margin-bottom: 12px;">
                            <i class="fas fa-chart-area"></i> Ventes (7 jours)
                        </h3>
                        <canvas id="salesChart" style="max-height: 200px;"></canvas>
                    </div>

                    <!-- Recent Activity -->
                    <div class="activity-feed slide-in-up stagger-2">
                        <h3 class="activity-title" style="font-size: 14px; margin-bottom: 12px;">
                            <i class="fas fa-history"></i> Activité
                        </h3>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-receipt"></i></div>
                            <div class="activity-content">
                                <div class="activity-text">Facture #SP20230012</div>
                                <div class="activity-time">Il y a 2 min</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-cube"></i></div>
                            <div class="activity-content">
                                <div class="activity-text">Stock +50 unités</div>
                                <div class="activity-time">Il y a 15 min</div>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-user-check"></i></div>
                            <div class="activity-content">
                                <div class="activity-text">Nouveau client</div>
                                <div class="activity-time">Il y a 1h</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Row -->
            <div class="content-grid" style="grid-template-columns: 1fr 1fr; gap: 16px;">
                <!-- Low Stock Alerts -->
                <div class="activity-feed slide-in-up stagger-1">
                    <h3 class="activity-title" style="font-size: 14px; margin-bottom: 12px;">
                        <i class="fas fa-exclamation-triangle"></i> Stock Faible
                    </h3>
                    <div class="activity-item">
                        <div class="activity-icon" style="background: #fee2e2; color: #dc2626;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Eau Gazeuse (1L)</div>
                            <div class="activity-time">8 / 20 unités</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background: #fee2e2; color: #dc2626;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Riz Basmati (1kg)</div>
                            <div class="activity-time">12 / 25 unités</div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background: #fee2e2; color: #dc2626;">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-text">Farine Type 55</div>
                            <div class="activity-time">6 / 30 unités</div>
                        </div>
                    </div>
                </div>

                <!-- Payment Status -->
                <div class="chart-container slide-in-up stagger-2">
                    <h3 class="chart-title" style="font-size: 14px; margin-bottom: 12px;">
                        <i class="fas fa-credit-card"></i> Paiements
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                                <span style="font-size: 12px; color: #7f8c8d;">
                                    <i class="fas fa-check-circle" style="color: #10b981;"></i> Payées
                                </span>
                                <span style="font-weight: 700; color: #10b981; font-size: 12px;">72%</span>
                            </div>
                            <div style="height: 8px; background: #e9ecef; border-radius: 4px; overflow: hidden;">
                                <div style="width: 72%; height: 100%; background: linear-gradient(90deg, #10b981, #059669);"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                                <span style="font-size: 12px; color: #7f8c8d;">
                                    <i class="fas fa-clock" style="color: #f59e0b;"></i> En attente
                                </span>
                                <span style="font-weight: 700; color: #f59e0b; font-size: 12px;">17%</span>
                            </div>
                            <div style="height: 8px; background: #e9ecef; border-radius: 4px; overflow: hidden;">
                                <div style="width: 17%; height: 100%; background: linear-gradient(90deg, #f59e0b, #d97706);"></div>
                            </div>
                        </div>
                        <div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                                <span style="font-size: 12px; color: #7f8c8d;">
                                    <i class="fas fa-exclamation-circle" style="color: #ef4444;"></i> En retard
                                </span>
                                <span style="font-weight: 700; color: #ef4444; font-size: 12px;">11%</span>
                            </div>
                            <div style="height: 8px; background: #e9ecef; border-radius: 4px; overflow: hidden;">
                                <div style="width: 11%; height: 100%; background: linear-gradient(90deg, #ef4444, #dc2626);"></div>
                            </div>
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

    <!-- Include Dashboard Modals -->
    @include('dashboard-modals')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>
        const ctx = document.getElementById('salesChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                    datasets: [{
                        label: 'Ventes',
                        data: [3200, 4500, 2800, 5200, 4800, 6200, 3800],
                        backgroundColor: '#0066FF',
                        borderColor: '#0066FF',
                        borderRadius: 6,
                        borderSkipped: false,
                        barThickness: 'flex',
                        maxBarThickness: 35
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 7000,
                            grid: { color: '#E8EAED', drawBorder: false }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
