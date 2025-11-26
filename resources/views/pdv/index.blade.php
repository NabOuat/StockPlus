<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PDV / Facturation - Baliseo</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard-stockplus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pdv.css') }}">
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
                    <a href="{{ route('pdv.index') }}" class="sidebar-menu-link active">
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
                    <h1 class="header-title" style="font-size: 26px; margin-bottom: 4px;">Point de Vente / Créer une facture</h1>
                    <p style="color: #999; font-size: 13px; margin: 0;">
                        Gérez vos ventes et créez des factures en temps réel.
                    </p>
                </div>
                <div class="header-actions" style="display: flex; align-items: center; gap: 16px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div class="user-avatar" style="width: 36px; height: 36px; font-size: 14px;">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</div>
                        <div>
                            <div style="font-size: 13px; font-weight: 600; color: #1A1A1A;">{{ Auth::user()->name ?? 'Utilisateur' }}</div>
                            <div style="font-size: 11px; color: #999;">Vendeur</div>
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

            <!-- PDV Container -->
            <div class="pdv-container">
                <!-- Left Section - Products -->
                <div class="pdv-left">
                    <!-- Search Section -->
                    <div class="search-section">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Rechercher un produit..." id="searchProducts">
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="products-grid">
                        <!-- Product 1 -->
                        <div class="product-card" onclick="addToCart('Eau Minérale 1.5L', 1.50)">
                            <div class="product-image">
                                <i class="fas fa-droplet" style="color: #0066FF;"></i>
                            </div>
                            <div class="product-name">Eau Minérale 1.5L</div>
                            <div class="product-price">1.50 €</div>
                            <button class="btn-add-product">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>

                        <!-- Product 2 -->
                        <div class="product-card" onclick="addToCart('Boisson Gazeuse 33cl', 1.20)">
                            <div class="product-image">
                                <i class="fas fa-wine-glass" style="color: #FF6B6B;"></i>
                            </div>
                            <div class="product-name">Boisson Gazeuse 33cl</div>
                            <div class="product-price">1.20 €</div>
                            <button class="btn-add-product">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>

                        <!-- Product 3 -->
                        <div class="product-card" onclick="addToCart('Jus de Fruits 1L', 2.80)">
                            <div class="product-image">
                                <i class="fas fa-wine-glass" style="color: #FF8C42;"></i>
                            </div>
                            <div class="product-name">Jus de Fruits 1L</div>
                            <div class="product-price">2.80 €</div>
                            <button class="btn-add-product">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>

                        <!-- Product 4 -->
                        <div class="product-card" onclick="addToCart('Tablette de Chocolat', 2.00)">
                            <div class="product-image">
                                <i class="fas fa-candy" style="color: #8B4513;"></i>
                            </div>
                            <div class="product-name">Tablette de Chocolat</div>
                            <div class="product-price">2.00 €</div>
                            <button class="btn-add-product">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>

                        <!-- Product 5 -->
                        <div class="product-card" onclick="addToCart('Sachet de Bonbons', 1.00)">
                            <div class="product-image">
                                <i class="fas fa-lollipop" style="color: #FF69B4;"></i>
                            </div>
                            <div class="product-name">Sachet de Bonbons</div>
                            <div class="product-price">1.00 €</div>
                            <button class="btn-add-product">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>

                        <!-- Product 6 -->
                        <div class="product-card" onclick="addToCart('Café Glace 250ml', 1.80)">
                            <div class="product-image">
                                <i class="fas fa-mug-hot" style="color: #8B4513;"></i>
                            </div>
                            <div class="product-name">Café Glace 250ml</div>
                            <div class="product-price">1.80 €</div>
                            <button class="btn-add-product">
                                <i class="fas fa-plus"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Right Section - Cart & Invoice -->
                <div class="pdv-right">
                    <!-- Client Section -->
                    <div class="client-section">
                        <div class="section-title">
                            <i class="fas fa-user"></i>
                            Informations client
                        </div>
                        <select class="client-select" id="clientSelect">
                            <option value="">Sélectionner un client...</option>
                            <option value="1">Client SARL Dupont</option>
                            <option value="2">Entreprise Martin</option>
                            <option value="3">Commerce Leclerc</option>
                        </select>
                        <div class="client-info" id="clientInfo" style="display: none;">
                            <strong id="clientName">Client SARL Dupont</strong><br>
                            12 Rue de la Paix, 75001 Paris<br>
                            01 23 45 67 89
                        </div>
                        <button class="btn-manage-clients">
                            <i class="fas fa-plus"></i> Gérer les clients
                        </button>
                    </div>

                    <!-- Cart Section -->
                    <div class="cart-section">
                        <div class="section-title">
                            <i class="fas fa-shopping-cart"></i>
                            Articles du panier
                        </div>
                        <div id="cartItems">
                            <div class="empty-cart">
                                <i class="fas fa-shopping-cart"></i>
                                <p>Panier vide</p>
                            </div>
                        </div>
                    </div>

                    <!-- Invoice Section -->
                    <div class="invoice-section">
                        <div class="invoice-title">Récapitulatif de la facture</div>
                        
                        <div class="invoice-row">
                            <span class="invoice-label">Sous-total:</span>
                            <span class="invoice-value" id="subtotal">0.00 €</span>
                        </div>

                        <!-- Discount -->
                        <div class="discount-section">
                            <div class="discount-label">
                                <span>Remise (%):</span>
                                <span id="discountValue">0.00 €</span>
                            </div>
                            <input type="range" class="discount-slider" id="discountSlider" min="0" max="50" value="0" onchange="updateInvoice()">
                        </div>

                        <div class="invoice-row">
                            <span class="invoice-label">Taxes (10%):</span>
                            <span class="invoice-value" id="taxes">0.00 €</span>
                        </div>

                        <div class="invoice-total">
                            <span>TOTAL:</span>
                            <span id="total">0.00 €</span>
                        </div>

                        <!-- Payment Method -->
                        <div class="payment-section">
                            <label class="section-title" style="margin-bottom: 8px;">
                                <i class="fas fa-credit-card"></i>
                                Méthode de paiement
                            </label>
                            <select class="payment-select" id="paymentMethod" onchange="updatePaymentDisplay()">
                                <option value="card">Carte de crédit/débit</option>
                                <option value="cash">Espèces</option>
                                <option value="check">Chèque</option>
                                <option value="transfer">Virement</option>
                            </select>
                        </div>

                        <!-- Cash Payment Section -->
                        <div id="cashPaymentSection" style="display: none; margin-top: 16px; padding: 12px; background: #F0F4FF; border-radius: 6px; border-left: 3px solid #0066FF;">
                            <div style="font-size: 12px; font-weight: 600; color: #0066FF; margin-bottom: 8px;">
                                <i class="fas fa-money-bill"></i> Paiement en Espèces
                            </div>
                            <div style="display: flex; gap: 8px; margin-bottom: 8px;">
                                <div style="flex: 1;">
                                    <label style="font-size: 11px; color: #666; display: block; margin-bottom: 4px;">Montant reçu (€)</label>
                                    <input type="number" id="amountReceived" class="form-input" placeholder="0.00" step="0.01" onchange="calculateChange()" style="padding: 8px; border: 1px solid #E8EAED; border-radius: 4px; font-size: 12px; width: 100%;">
                                </div>
                            </div>
                            <div style="display: flex; justify-content: space-between; font-size: 12px; padding: 8px 0; border-top: 1px solid #E8EAED;">
                                <span style="color: #666;">Monnaie à rendre:</span>
                                <span style="font-weight: 700; color: #0066FF;" id="changeAmount">0.00 €</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="action-buttons">
                            <button class="btn-secondary" onclick="clearCart()">
                                <i class="fas fa-times"></i> Annuler
                            </button>
                            <button class="btn-primary" onclick="createInvoice()">
                                <i class="fas fa-check"></i> Créer une facture
                            </button>
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

    <script>
        let cartItems = [];

        function addToCart(productName, price) {
            const existingItem = cartItems.find(item => item.name === productName);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cartItems.push({
                    name: productName,
                    price: price,
                    quantity: 1
                });
            }
            
            updateCart();
        }

        function updateCart() {
            const cartContainer = document.getElementById('cartItems');
            
            if (cartItems.length === 0) {
                cartContainer.innerHTML = `
                    <div class="empty-cart">
                        <i class="fas fa-shopping-cart"></i>
                        <p>Panier vide</p>
                    </div>
                `;
            } else {
                cartContainer.innerHTML = cartItems.map((item, index) => `
                    <div class="cart-item">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="quantity-control">
                            <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">−</button>
                            <input type="number" class="quantity-input" value="${item.quantity}" readonly>
                            <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                        <div class="cart-item-price">${(item.price * item.quantity).toFixed(2)} €</div>
                        <button class="btn-remove-item" onclick="removeFromCart(${index})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `).join('');
            }
            
            updateInvoice();
        }

        function updateQuantity(index, change) {
            cartItems[index].quantity += change;
            if (cartItems[index].quantity <= 0) {
                removeFromCart(index);
            } else {
                updateCart();
            }
        }

        function removeFromCart(index) {
            cartItems.splice(index, 1);
            updateCart();
        }

        function updateInvoice() {
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const discountPercent = parseFloat(document.getElementById('discountSlider').value);
            const discountAmount = subtotal * (discountPercent / 100);
            const taxableAmount = subtotal - discountAmount;
            const taxes = taxableAmount * 0.10;
            const total = taxableAmount + taxes;

            document.getElementById('subtotal').textContent = subtotal.toFixed(2) + ' €';
            document.getElementById('discountValue').textContent = discountAmount.toFixed(2) + ' €';
            document.getElementById('taxes').textContent = taxes.toFixed(2) + ' €';
            document.getElementById('total').textContent = total.toFixed(2) + ' €';
        }

        function clearCart() {
            if (confirm('Êtes-vous sûr de vouloir vider le panier ?')) {
                cartItems = [];
                updateCart();
            }
        }

        function createInvoice() {
            if (cartItems.length === 0) {
                alert('Le panier est vide. Veuillez ajouter des produits.');
                return;
            }
            
            const clientId = document.getElementById('clientSelect').value;
            if (!clientId) {
                alert('Veuillez sélectionner un client.');
                return;
            }
            
            const paymentMethod = document.getElementById('paymentMethod').value;
            
            // Validation pour paiement en espèces
            if (paymentMethod === 'cash') {
                const amountReceived = parseFloat(document.getElementById('amountReceived').value) || 0;
                const totalText = document.getElementById('total').textContent;
                const total = parseFloat(totalText.replace(' €', '').replace(',', '.')) || 0;
                
                if (amountReceived === 0) {
                    alert('Veuillez entrer le montant reçu.');
                    return;
                }
                
                if (amountReceived < total) {
                    alert('Le montant reçu est insuffisant. Montant requis: ' + total.toFixed(2) + ' €');
                    return;
                }
            }
            
            const discountPercent = parseFloat(document.getElementById('discountSlider').value);
            
            // Calcul de la facture
            const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const discountAmount = subtotal * (discountPercent / 100);
            const taxableAmount = subtotal - discountAmount;
            const taxes = taxableAmount * 0.10;
            const total = taxableAmount + taxes;
            
            // Préparation des données
            const invoiceData = {
                number: 'FACTURE #2024-' + Math.floor(Math.random() * 10000),
                date: new Date().toLocaleDateString('fr-FR'),
                client: {
                    id: clientId,
                    name: document.getElementById('clientSelect').options[document.getElementById('clientSelect').selectedIndex].text,
                    address: '12 Rue de la Paix, 75001 Paris',
                    phone: '01 23 45 67 89'
                },
                items: cartItems.map(item => ({
                    name: item.name,
                    quantity: item.quantity,
                    price: item.price,
                    total: item.price * item.quantity
                })),
                subtotal: subtotal,
                discount: discountAmount,
                discount_percent: discountPercent,
                taxes: taxes,
                total: total,
                payment_method: paymentMethod,
                cash_payment: paymentMethod === 'cash' ? {
                    amount_received: parseFloat(document.getElementById('amountReceived').value),
                    change: parseFloat(document.getElementById('amountReceived').value) - total
                } : null
            };
            
            // Envoi au serveur pour générer la facture
            fetch('{{ route("pdv.create") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify(invoiceData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Redirection vers la facture
                    window.location.href = data.invoice_url;
                } else {
                    alert('Erreur: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de la création de la facture');
            });
        }

        // Client selection
        document.getElementById('clientSelect').addEventListener('change', function() {
            const clientInfo = document.getElementById('clientInfo');
            if (this.value) {
                clientInfo.style.display = 'block';
            } else {
                clientInfo.style.display = 'none';
            }
        });

        // Search products
        document.getElementById('searchProducts').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.product-card');
            
            cards.forEach(card => {
                const productName = card.querySelector('.product-name').textContent.toLowerCase();
                card.style.display = productName.includes(searchTerm) ? '' : 'none';
            });
        });

        // Update payment display based on method
        function updatePaymentDisplay() {
            const paymentMethod = document.getElementById('paymentMethod').value;
            const cashSection = document.getElementById('cashPaymentSection');
            
            if (paymentMethod === 'cash') {
                cashSection.style.display = 'block';
            } else {
                cashSection.style.display = 'none';
                document.getElementById('amountReceived').value = '';
                document.getElementById('changeAmount').textContent = '0.00 €';
            }
        }

        // Calculate change for cash payment
        function calculateChange() {
            const amountReceived = parseFloat(document.getElementById('amountReceived').value) || 0;
            const totalText = document.getElementById('total').textContent;
            const total = parseFloat(totalText.replace(' €', '').replace(',', '.')) || 0;
            
            const change = amountReceived - total;
            const changeAmount = document.getElementById('changeAmount');
            
            if (change >= 0) {
                changeAmount.textContent = change.toFixed(2) + ' €';
                changeAmount.style.color = '#10b981';
            } else {
                changeAmount.textContent = Math.abs(change).toFixed(2) + ' € (insuffisant)';
                changeAmount.style.color = '#ef4444';
            }
        }
    </script>
</body>
</html>
