-- ============================================
-- BALISEO - Structure de Base de Données SQLite
-- ============================================
-- Date: 2025-11-26
-- Version: 1.0
-- Description: Structure complète pour la gestion d'entreprise

-- ============================================
-- 1. TABLE USERS
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- 2.1 TABLE USER_ROLES (Liaison entre utilisateurs et rôles)
-- ============================================
CREATE TABLE IF NOT EXISTS user_roles (
    user_id INTEGER NOT NULL,
    role_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE
);

-- ============================================
-- 2.2 ROLES PAR DÉFAUT
-- ============================================
INSERT OR IGNORE INTO roles (id, name, description) VALUES 
(1, 'admin', 'Administrateur système avec tous les droits'),
(2, 'gestionnaire', 'Peut gérer les stocks et les ventes'),
(3, 'caissier', 'Peut enregistrer les ventes'),
(4, 'utilisateur', 'Accès limité en lecture seule');

-- ============================================
-- 2. TABLE ROLES
-- ============================================
CREATE TABLE IF NOT EXISTS roles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- 3. TABLE PERMISSIONS
-- ============================================
CREATE TABLE IF NOT EXISTS permissions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    module VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- 4. TABLE USER_ROLES (Pivot)
-- ============================================
CREATE TABLE IF NOT EXISTS user_roles (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER NOT NULL,
    role_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    UNIQUE(user_id, role_id)
);

-- ============================================
-- 5. TABLE ROLE_PERMISSIONS (Pivot)
-- ============================================
CREATE TABLE IF NOT EXISTS role_permissions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    role_id INTEGER NOT NULL,
    permission_id INTEGER NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
    UNIQUE(role_id, permission_id)
);

-- ============================================
-- 6. TABLE CATEGORIES
-- ============================================
CREATE TABLE IF NOT EXISTS categories (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    icon VARCHAR(50),
    color VARCHAR(7),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- 7. TABLE PRODUCTS
-- ============================================
CREATE TABLE IF NOT EXISTS products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    sku VARCHAR(50) UNIQUE NOT NULL,
    category_id INTEGER NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock INTEGER NOT NULL DEFAULT 0,
    threshold INTEGER NOT NULL DEFAULT 10,
    supplier VARCHAR(255),
    description TEXT,
    icon VARCHAR(50),
    color VARCHAR(7),
    is_active BOOLEAN DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT
);

-- ============================================
-- 8. TABLE STOCK_HISTORY
-- ============================================
CREATE TABLE IF NOT EXISTS stock_history (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    product_id INTEGER NOT NULL,
    user_id INTEGER,
    action VARCHAR(50) NOT NULL,
    old_value INTEGER,
    new_value INTEGER,
    quantity_change INTEGER,
    reference VARCHAR(100),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ============================================
-- 9. TABLE CLIENTS
-- ============================================
CREATE TABLE IF NOT EXISTS clients (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    phone VARCHAR(20),
    address VARCHAR(255),
    postal_code VARCHAR(10),
    city VARCHAR(100),
    type VARCHAR(50) DEFAULT 'particulier',
    notes TEXT,
    is_active BOOLEAN DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- 10. TABLE INVOICES
-- ============================================
CREATE TABLE IF NOT EXISTS invoices (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    invoice_number VARCHAR(50) UNIQUE NOT NULL,
    client_id INTEGER NOT NULL,
    user_id INTEGER,
    total_amount DECIMAL(12, 2) NOT NULL,
    tax_amount DECIMAL(10, 2) DEFAULT 0,
    discount_amount DECIMAL(10, 2) DEFAULT 0,
    status VARCHAR(50) DEFAULT 'draft',
    payment_method VARCHAR(50),
    payment_date TIMESTAMP NULL,
    invoice_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    due_date TIMESTAMP,
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE RESTRICT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ============================================
-- 11. TABLE INVOICE_ITEMS
-- ============================================
CREATE TABLE IF NOT EXISTS invoice_items (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    invoice_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
    quantity INTEGER NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    total_price DECIMAL(12, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

-- ============================================
-- 12. TABLE SETTINGS
-- ============================================
CREATE TABLE IF NOT EXISTS settings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    key VARCHAR(100) UNIQUE NOT NULL,
    value TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ============================================
-- INDEXES
-- ============================================
CREATE INDEX IF NOT EXISTS idx_products_category_id ON products(category_id);
CREATE INDEX IF NOT EXISTS idx_products_sku ON products(sku);
CREATE INDEX IF NOT EXISTS idx_stock_history_product_id ON stock_history(product_id);
CREATE INDEX IF NOT EXISTS idx_stock_history_user_id ON stock_history(user_id);
CREATE INDEX IF NOT EXISTS idx_invoices_client_id ON invoices(client_id);
CREATE INDEX IF NOT EXISTS idx_invoices_user_id ON invoices(user_id);
CREATE INDEX IF NOT EXISTS idx_invoices_status ON invoices(status);
CREATE INDEX IF NOT EXISTS idx_invoice_items_invoice_id ON invoice_items(invoice_id);
CREATE INDEX IF NOT EXISTS idx_invoice_items_product_id ON invoice_items(product_id);
CREATE INDEX IF NOT EXISTS idx_user_roles_user_id ON user_roles(user_id);
CREATE INDEX IF NOT EXISTS idx_user_roles_role_id ON user_roles(role_id);
CREATE INDEX IF NOT EXISTS idx_role_permissions_role_id ON role_permissions(role_id);
CREATE INDEX IF NOT EXISTS idx_role_permissions_permission_id ON role_permissions(permission_id);

-- ============================================
-- DONNÉES D'INITIALISATION
-- ============================================

-- Rôles
INSERT INTO roles (name, description) VALUES
('Administrateur', 'Accès complet à tous les modules'),
('Caissier', 'Accès au PDV et facturation'),
('Gestionnaire Stock', 'Gestion des stocks et rapports'),
('Multi-Rôle', 'PDV + Gestion des stocks');

-- Permissions (19 permissions)
INSERT INTO permissions (name, description, module) VALUES
-- Gestion des Stocks
('view_stock', 'Voir les stocks', 'stock'),
('create_product', 'Créer/Modifier produits', 'stock'),
('delete_product', 'Supprimer produits', 'stock'),
('manage_categories', 'Gérer les catégories', 'stock'),
('manage_suppliers', 'Gérer les fournisseurs', 'stock'),

-- PDV / Facturation
('access_pdv', 'Accès PDV', 'pdv'),
('create_invoice', 'Créer factures', 'pdv'),
('cancel_invoice', 'Annuler factures', 'pdv'),
('manage_payments', 'Gérer les paiements', 'pdv'),

-- Gestion des Clients
('view_clients', 'Voir les clients', 'clients'),
('create_client', 'Créer/Modifier clients', 'clients'),
('delete_client', 'Supprimer clients', 'clients'),

-- Rapports
('view_reports', 'Voir rapports', 'reports'),
('export_data', 'Exporter données', 'reports'),
('print_reports', 'Imprimer rapports', 'reports'),

-- Paramètres
('manage_users', 'Gérer les utilisateurs', 'settings'),
('manage_roles', 'Gérer les rôles', 'settings'),
('manage_permissions', 'Gérer les permissions', 'settings'),
('modify_settings', 'Modifier paramètres', 'settings');

-- Catégories
INSERT INTO categories (name, icon, color, description) VALUES
('Eau', 'droplet', '#0066FF', 'Eau minérale et eau plate'),
('Boissons', 'wine-glass', '#F39C12', 'Boissons gazeuses et jus'),
('Friandises', 'candy', '#9B59B6', 'Bonbons et confiseries'),
('Boulangerie', 'bread-slice', '#D2691E', 'Pain et produits de boulangerie'),
('Bio', 'leaf', '#27AE60', 'Produits biologiques'),
('Crèmerie', 'ice-cream', '#E74C3C', 'Produits laitiers et crème'),
('Fruits', 'apple', '#E74C3C', 'Fruits frais'),
('Légumes', 'carrot', '#E67E22', 'Légumes frais');

-- Produits exemple
INSERT INTO products (name, sku, category_id, price, stock, threshold, supplier, description, icon, color) VALUES
('Eau Minérale 1.5L', 'EAU-001', 1, 2.50, 120, 50, 'Source Pure SA', 'Eau minérale plate 1.5L', 'droplet', '#0066FF'),
('Eau Gazeuse 1.5L', 'EAU-002', 1, 2.75, 85, 40, 'Source Pure SA', 'Eau gazeuse 1.5L', 'droplet', '#0066FF'),
('Coca Cola 33cl', 'BOI-001', 2, 1.50, 200, 100, 'Coca Cola France', 'Coca Cola 33cl', 'wine-glass', '#F39C12'),
('Jus Orange 1L', 'BOI-002', 2, 3.20, 45, 30, 'Tropicana', 'Jus d\'orange frais 1L', 'wine-glass', '#F39C12'),
('Bonbons Assortis', 'FRI-001', 3, 5.99, 60, 20, 'Haribo', 'Bonbons assortis 500g', 'candy', '#9B59B6'),
('Chocolat Noir', 'FRI-002', 3, 3.50, 75, 25, 'Lindt', 'Chocolat noir 100g', 'candy', '#9B59B6');

-- Clients exemple
INSERT INTO clients (name, email, phone, address, postal_code, city, type) VALUES
('Jean Dupont', 'jean@example.com', '+33612345678', '10 Rue du Commerce', '75000', 'Paris', 'particulier'),
('Marie Martin', 'marie@example.com', '+33687654321', '25 Avenue des Champs', '75008', 'Paris', 'particulier'),
('Entreprise ABC', 'contact@abc.com', '+33123456789', '100 Boulevard Saint-Germain', '75006', 'Paris', 'entreprise'),
('Pierre Bernard', 'pierre@example.com', '+33698765432', '50 Rue de Rivoli', '75004', 'Paris', 'particulier');

-- Utilisateurs exemple
INSERT INTO users (name, email, password) VALUES
('Admin', 'admin@baliseo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Caissier 1', 'caissier1@baliseo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Gestionnaire Stock', 'stock@baliseo.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Assignation des rôles aux utilisateurs
INSERT INTO user_roles (user_id, role_id) VALUES
(1, 1),
(2, 2),
(3, 3);

-- Assignation des permissions aux rôles
-- Administrateur (tous les permissions)
INSERT INTO role_permissions (role_id, permission_id) 
SELECT 1, id FROM permissions;

-- Caissier (PDV + Clients)
INSERT INTO role_permissions (role_id, permission_id)
SELECT 2, id FROM permissions WHERE module IN ('pdv', 'clients', 'reports');

-- Gestionnaire Stock (Stock + Rapports)
INSERT INTO role_permissions (role_id, permission_id)
SELECT 3, id FROM permissions WHERE module IN ('stock', 'reports');

-- Paramètres d'application
INSERT INTO settings (key, value) VALUES
('app_name', 'StockPlus'),
('company_name', 'StockPlus S.A.R.L'),
('company_address', '10 Rue du Commerce, 75000 Paris'),
('company_phone', '+33 1 23 45 67 89'),
('company_email', 'contact@stockplus.fr'),
('currency', 'EUR'),
('language', 'fr'),
('timezone', 'Europe/Paris'),
('tax_rate', '20'),
('invoice_prefix', 'INV');

-- ============================================
-- TRIGGERS (Optionnel - pour audit)
-- ============================================

-- Trigger pour mettre à jour updated_at automatiquement
CREATE TRIGGER IF NOT EXISTS update_products_timestamp 
AFTER UPDATE ON products
BEGIN
    UPDATE products SET updated_at = CURRENT_TIMESTAMP WHERE id = NEW.id;
END;

CREATE TRIGGER IF NOT EXISTS update_categories_timestamp 
AFTER UPDATE ON categories
BEGIN
    UPDATE categories SET updated_at = CURRENT_TIMESTAMP WHERE id = NEW.id;
END;

CREATE TRIGGER IF NOT EXISTS update_invoices_timestamp 
AFTER UPDATE ON invoices
BEGIN
    UPDATE invoices SET updated_at = CURRENT_TIMESTAMP WHERE id = NEW.id;
END;

CREATE TRIGGER IF NOT EXISTS update_clients_timestamp 
AFTER UPDATE ON clients
BEGIN
    UPDATE clients SET updated_at = CURRENT_TIMESTAMP WHERE id = NEW.id;
END;

-- ============================================
-- FIN DU SCRIPT
-- ============================================
-- Exécution: sqlite3 baliseo.db < baliseo_structure.sql
-- Ou dans Laravel: php artisan tinker
-- >>> exec(file_get_contents('database/baliseo_structure.sql'));
