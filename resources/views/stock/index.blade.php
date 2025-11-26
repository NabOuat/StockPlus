<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des Stocks - Baliseo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-stockplus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stock-management.css') }}">
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
                    <a href="{{ route('stock.index') }}" class="sidebar-menu-link active">
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
                    <h1 class="header-title" style="font-size: 26px; margin-bottom: 4px;">Gestion des Stocks</h1>
                    <p style="color: #999; font-size: 13px; margin: 0;">
                        Gérez l'inventaire de vos produits, mettez à jour les quantités et consultez les détails.
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

            <!-- Stock Stats -->
            <div class="stock-stats">
                <div class="stat-card slide-in-up stagger-1">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-card-title">Total Produits</div>
                        </div>
                        <div class="stat-card-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                    </div>
                    <div class="stat-card-value">1,245</div>
                    <div class="stat-card-label">Produits en stock</div>
                </div>

                <div class="stat-card slide-in-up stagger-2">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-card-title">Stock Faible</div>
                        </div>
                        <div class="stat-card-icon" style="background: linear-gradient(135deg, #FF6B6B 0%, #FF5252 100%);">
                            <i class="fas fa-exclamation"></i>
                        </div>
                    </div>
                    <div class="stat-card-value">12</div>
                    <div class="stat-card-label">À réapprovisionner</div>
                </div>

                <div class="stat-card slide-in-up stagger-3">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-card-title">Valeur Stock</div>
                        </div>
                        <div class="stat-card-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                    </div>
                    <div class="stat-card-value">€45.8K</div>
                    <div class="stat-card-label">Valeur totale</div>
                </div>

                <div class="stat-card slide-in-up stagger-4">
                    <div class="stat-card-header">
                        <div>
                            <div class="stat-card-title">Catégories</div>
                        </div>
                        <div class="stat-card-icon" style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                            <i class="fas fa-layer-group"></i>
                        </div>
                    </div>
                    <div class="stat-card-value">8</div>
                    <div class="stat-card-label">Catégories actives</div>
                </div>
            </div>

            <!-- Stock Management Section -->
            <div class="stock-management">
                <!-- Controls -->
                <div class="stock-controls">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Rechercher des produits..." id="searchInput">
                    </div>

                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter="all">
                            <i class="fas fa-list"></i> Toutes Catégories
                        </button>
                        <button class="filter-btn" data-filter="eau">
                            <i class="fas fa-droplet"></i> Eau
                        </button>
                        <button class="filter-btn" data-filter="boissons">
                            <i class="fas fa-wine-glass"></i> Boissons
                        </button>
                        <button class="filter-btn" data-filter="friandises">
                            <i class="fas fa-candy"></i> Friandises
                        </button>
                    </div>

                    <div class="action-buttons">
                        <button class="btn-secondary" onclick="openBulkActionsModal()">
                            <i class="fas fa-sliders-h"></i> Actions Groupées
                        </button>
                        <button class="btn-primary" onclick="openCreateModal()">
                            <i class="fas fa-plus"></i> Ajouter Produit
                        </button>
                    </div>
                </div>

                <!-- Products Section -->
                <div class="products-section">
                    <h2 class="section-title">
                        <i class="fas fa-list"></i> Liste des Produits
                    </h2>
                    <p class="section-subtitle">Aperçu de tous les produits en stock.</p>

                    <table class="products-table">
                        <thead>
                            <tr>
                                <th style="width: 40px;"><input type="checkbox" class="checkbox"></th>
                                <th style="width: 50px;">Image</th>
                                <th>SKU</th>
                                <th>Nom</th>
                                <th>Catégorie</th>
                                <th>Fournisseur</th>
                                <th>Prix Unitaire</th>
                                <th>Stock Actuel</th>
                                <th>Seuil Réappro.</th>
                                <th style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Product 1 -->
                            <tr>
                                <td><input type="checkbox" class="checkbox"></td>
                                <td>
                                    <div class="product-image">
                                        <i class="fas fa-droplet" style="color: #0066FF;"></i>
                                    </div>
                                </td>
                                <td><span class="sku-badge">SKU001</span></td>
                                <td>Eau Minérale Plate 1.5L</td>
                                <td><span class="category-badge">Eau</span></td>
                                <td>Source Pure SA</td>
                                <td><span class="price">0.75 €</span></td>
                                <td>
                                    <div class="stock-status">
                                        <span class="stock-number">120</span>
                                        <span class="stock-badge normal">Normal</span>
                                    </div>
                                </td>
                                <td><span class="reorder-point">50</span></td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Voir" onclick="openViewModal()">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="icon-btn" title="Éditer" onclick="openEditModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteModal()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Product 2 -->
                            <tr>
                                <td><input type="checkbox" class="checkbox"></td>
                                <td>
                                    <div class="product-image">
                                        <i class="fas fa-wine-glass" style="color: #FF6B6B;"></i>
                                    </div>
                                </td>
                                <td><span class="sku-badge">SKU002</span></td>
                                <td>Jus d'Orange Bio 1L</td>
                                <td><span class="category-badge">Boissons</span></td>
                                <td>Fructa SARL</td>
                                <td><span class="price">2.20 €</span></td>
                                <td>
                                    <div class="stock-status">
                                        <span class="stock-number">5</span>
                                        <span class="stock-badge critical">Faible Stock</span>
                                    </div>
                                </td>
                                <td><span class="reorder-point">10</span></td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Voir" onclick="openViewModal()">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="icon-btn" title="Éditer" onclick="openEditModal()">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer" onclick="openDeleteModal()">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Product 3 -->
                            <tr>
                                <td><input type="checkbox" class="checkbox"></td>
                                <td>
                                    <div class="product-image">
                                        <i class="fas fa-candy" style="color: #f59e0b;"></i>
                                    </div>
                                </td>
                                <td><span class="sku-badge">SKU003</span></td>
                                <td>Chocolat au Lait 100g</td>
                                <td><span class="category-badge">Friandises</span></td>
                                <td>Douceur Cacao</td>
                                <td><span class="price">1.50 €</span></td>
                                <td>
                                    <div class="stock-status">
                                        <span class="stock-number">300</span>
                                        <span class="stock-badge normal">Normal</span>
                                    </div>
                                </td>
                                <td><span class="reorder-point">75</span></td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Product 4 -->
                            <tr>
                                <td><input type="checkbox" class="checkbox"></td>
                                <td>
                                    <div class="product-image">
                                        <i class="fas fa-droplet" style="color: #10b981;"></i>
                                    </div>
                                </td>
                                <td><span class="sku-badge">SKU004</span></td>
                                <td>Eau Pétillante 0.5L</td>
                                <td><span class="category-badge">Eau</span></td>
                                <td>Bulles Fraîches Inc.</td>
                                <td><span class="price">0.85 €</span></td>
                                <td>
                                    <div class="stock-status">
                                        <span class="stock-number">45</span>
                                        <span class="stock-badge normal">Normal</span>
                                    </div>
                                </td>
                                <td><span class="reorder-point">20</span></td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Product 5 -->
                            <tr>
                                <td><input type="checkbox" class="checkbox"></td>
                                <td>
                                    <div class="product-image">
                                        <i class="fas fa-wine-glass" style="color: #FF6B6B;"></i>
                                    </div>
                                </td>
                                <td><span class="sku-badge">SKU005</span></td>
                                <td>Soda Cola 33cl</td>
                                <td><span class="category-badge">Boissons</span></td>
                                <td>Boissons Éclat SA</td>
                                <td><span class="price">1.10 €</span></td>
                                <td>
                                    <div class="stock-status">
                                        <span class="stock-number">150</span>
                                        <span class="stock-badge normal">Normal</span>
                                    </div>
                                </td>
                                <td><span class="reorder-point">60</span></td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Product 6 -->
                            <tr>
                                <td><input type="checkbox" class="checkbox"></td>
                                <td>
                                    <div class="product-image">
                                        <i class="fas fa-candy" style="color: #f59e0b;"></i>
                                    </div>
                                </td>
                                <td><span class="sku-badge">SKU006</span></td>
                                <td>Bonbons Gélifiés Sachet</td>
                                <td><span class="category-badge">Friandises</span></td>
                                <td>Gourmandises Fun</td>
                                <td><span class="price">0.90 €</span></td>
                                <td>
                                    <div class="stock-status">
                                        <span class="stock-number">8</span>
                                        <span class="stock-badge critical">Faible Stock</span>
                                    </div>
                                </td>
                                <td><span class="reorder-point">25</span></td>
                                <td>
                                    <div class="action-icons">
                                        <button class="icon-btn" title="Éditer">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="icon-btn delete" title="Supprimer">
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

    <!-- Include Modals -->
    @include('stock.modals')

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.products-table tbody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Filter functionality
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>
