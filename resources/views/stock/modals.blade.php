<!-- Create Product Modal -->
<div class="modal-overlay" id="createModal">
    <div class="modal create-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-plus-circle"></i>
                Ajouter un Produit
            </h2>
            <button class="modal-close" onclick="closeModal('createModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="createForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Produit</label>
                    <input type="text" class="form-input" placeholder="Ex: Eau Minérale 1.5L" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">SKU</label>
                        <input type="text" class="form-input" placeholder="Ex: SKU001" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Catégorie</label>
                        <select class="form-select" required>
                            <option value="">Sélectionner...</option>
                            <option value="eau">Eau</option>
                            <option value="boissons">Boissons</option>
                            <option value="friandises">Friandises</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Prix Unitaire (€)</label>
                        <input type="number" class="form-input" placeholder="0.00" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Stock Initial</label>
                        <input type="number" class="form-input" placeholder="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Seuil Réapprovisionnement</label>
                        <input type="number" class="form-input" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Fournisseur</label>
                        <input type="text" class="form-input" placeholder="Ex: Source Pure SA" required>
                    </div>
                </div>

                <div class="form-group form-row full">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" placeholder="Description du produit..."></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('createModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitForm('createForm')">
                <i class="fas fa-check"></i> Créer
            </button>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal-overlay" id="editModal">
    <div class="modal edit-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-edit"></i>
                Modifier le Produit
            </h2>
            <button class="modal-close" onclick="closeModal('editModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Produit</label>
                    <input type="text" class="form-input" placeholder="Ex: Eau Minérale 1.5L" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">SKU</label>
                        <input type="text" class="form-input" placeholder="Ex: SKU001" required disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Catégorie</label>
                        <select class="form-select" required>
                            <option value="">Sélectionner...</option>
                            <option value="eau">Eau</option>
                            <option value="boissons">Boissons</option>
                            <option value="friandises">Friandises</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Prix Unitaire (€)</label>
                        <input type="number" class="form-input" placeholder="0.00" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Stock Actuel</label>
                        <input type="number" class="form-input" placeholder="0" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Seuil Réapprovisionnement</label>
                        <input type="number" class="form-input" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Fournisseur</label>
                        <input type="text" class="form-input" placeholder="Ex: Source Pure SA" required>
                    </div>
                </div>

                <div class="form-group form-row full">
                    <label class="form-label">Description</label>
                    <textarea class="form-textarea" placeholder="Description du produit..."></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('editModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="submitForm('editForm')">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </div>
</div>

<!-- Delete Product Modal -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal delete-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-trash"></i>
                Supprimer le Produit
            </h2>
            <button class="modal-close" onclick="closeModal('deleteModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body delete-modal-body">
            <div class="delete-modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="delete-modal-title">Êtes-vous sûr ?</h3>
            <p class="delete-modal-text">
                Cette action supprimera définitivement le produit de votre inventaire.
            </p>
            <div class="delete-modal-info">
                <i class="fas fa-info-circle"></i>
                Cette opération ne peut pas être annulée.
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('deleteModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-danger" onclick="confirmDelete()">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </div>
    </div>
</div>

<!-- View Product Modal -->
<div class="modal-overlay" id="viewModal">
    <div class="modal view-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-eye"></i>
                Détails du Produit
            </h2>
            <button class="modal-close" onclick="closeModal('viewModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body view-modal-body">
            <div class="view-item">
                <span class="view-label">SKU</span>
                <span class="view-value" id="viewSKU">SKU001</span>
            </div>
            <div class="view-item">
                <span class="view-label">Nom</span>
                <span class="view-value" id="viewName">Eau Minérale Plate 1.5L</span>
            </div>
            <div class="view-item">
                <span class="view-label">Catégorie</span>
                <span class="view-value" id="viewCategory">Eau</span>
            </div>
            <div class="view-item">
                <span class="view-label">Fournisseur</span>
                <span class="view-value" id="viewSupplier">Source Pure SA</span>
            </div>
            <div class="view-item">
                <span class="view-label">Prix Unitaire</span>
                <span class="view-value" id="viewPrice">0.75 €</span>
            </div>
            <div class="view-item">
                <span class="view-label">Stock Actuel</span>
                <span class="view-value" id="viewStock">120</span>
            </div>
            <div class="view-item">
                <span class="view-label">Seuil Réapprovisionnement</span>
                <span class="view-value" id="viewThreshold">50</span>
            </div>
            <div class="view-item">
                <span class="view-label">Statut</span>
                <span class="status-badge active" id="viewStatus">Actif</span>
            </div>
            <div class="view-item">
                <span class="view-label">Créé le</span>
                <span class="view-value" id="viewCreated">26 novembre 2025</span>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('viewModal')">
                <i class="fas fa-times"></i> Fermer
            </button>
            <button class="btn btn-secondary" onclick="openHistoryModal(document.getElementById('viewName').textContent)">
                <i class="fas fa-history"></i> Historique
            </button>
            <button class="btn btn-primary" onclick="openEditModal()">
                <i class="fas fa-edit"></i> Modifier
            </button>
        </div>
    </div>
</div>

<!-- Bulk Actions Modal -->
<div class="modal-overlay" id="bulkActionsModal">
    <div class="modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-tasks"></i>
                Actions Groupées
            </h2>
            <button class="modal-close" onclick="closeModal('bulkActionsModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label class="form-label">Sélectionner une action</label>
                <select class="form-select" id="bulkAction">
                    <option value="">-- Choisir une action --</option>
                    <option value="update-price">Mettre à jour les prix</option>
                    <option value="update-stock">Mettre à jour le stock</option>
                    <option value="update-threshold">Mettre à jour les seuils</option>
                    <option value="export">Exporter en CSV</option>
                    <option value="delete">Supprimer les produits</option>
                </select>
            </div>

            <div class="form-group" id="bulkValueGroup" style="display: none;">
                <label class="form-label required">Nouvelle valeur</label>
                <input type="text" class="form-input" id="bulkValue" placeholder="Entrer la valeur...">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('bulkActionsModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="executeBulkAction()">
                <i class="fas fa-check"></i> Appliquer
            </button>
        </div>
    </div>
</div>

<script>
    // Modal Functions
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('active');
        }
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
        }
    }

    function openCreateModal() {
        openModal('createModal');
    }

    function openEditModal(productId) {
        openModal('editModal');
        // Load product data here
    }

    function openDeleteModal(productId) {
        openModal('deleteModal');
    }

    function openViewModal(productId) {
        openModal('viewModal');
        // Load product data here
    }

    function openBulkActionsModal() {
        openModal('bulkActionsModal');
    }

    function submitForm(formId) {
        const form = document.getElementById(formId);
        if (form.checkValidity()) {
            console.log('Form submitted:', formId);
            // Submit form via AJAX
            closeModal(formId === 'createForm' ? 'createModal' : 'editModal');
        } else {
            alert('Veuillez remplir tous les champs requis.');
        }
    }

    function confirmDelete() {
        console.log('Product deleted');
        closeModal('deleteModal');
    }

    function executeBulkAction() {
        const action = document.getElementById('bulkAction').value;
        console.log('Bulk action executed:', action);
        closeModal('bulkActionsModal');
    }

    function openHistoryModal(productName = 'Produit') {
        document.getElementById('historyProductName').textContent = productName;
        openModal('historyModal');
    }

    // Close modal when clicking overlay
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
            }
        });
    });

    // Show/hide bulk value input
    document.getElementById('bulkAction')?.addEventListener('change', function() {
        const valueGroup = document.getElementById('bulkValueGroup');
        if (this.value && this.value !== 'export' && this.value !== 'delete') {
            valueGroup.style.display = 'block';
        } else {
            valueGroup.style.display = 'none';
        }
    });

    // Attach modal functions to buttons
    document.addEventListener('DOMContentLoaded', function() {
        // Create button
        document.querySelector('[onclick*="openCreateModal"]')?.addEventListener('click', openCreateModal);

        // Edit buttons
        document.querySelectorAll('.icon-btn:not(.delete)').forEach(btn => {
            btn.addEventListener('click', function() {
                openEditModal();
            });
        });

        // Delete buttons
        document.querySelectorAll('.icon-btn.delete').forEach(btn => {
            btn.addEventListener('click', function() {
                openDeleteModal();
            });
        });

        // Bulk actions button
        document.querySelector('[onclick*="bulkActionsModal"]')?.addEventListener('click', openBulkActionsModal);
    });
</script>

<!-- Product History Modal -->
<div class="modal-overlay" id="historyModal">
    <div class="modal history-modal" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-history"></i>
                Historique - <span id="historyProductName">Produit</span>
            </h2>
            <button class="modal-close" onclick="closeModal('historyModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <!-- Timeline -->
            <div style="position: relative; padding: 20px 0;">
                <!-- Timeline Line -->
                <div style="position: absolute; left: 19px; top: 0; bottom: 0; width: 2px; background: linear-gradient(180deg, #0066FF 0%, #E8EAED 100%);"></div>

                <!-- Event 1 -->
                <div style="display: flex; gap: 16px; margin-bottom: 24px; position: relative;">
                    <div style="width: 40px; height: 40px; background: #E3F2FD; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #0066FF; font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div style="flex: 1; padding-top: 4px;">
                        <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Produit créé</h4>
                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">Par: Admin • 26 Nov 2025 à 10:30</p>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">Stock initial: 100 unités • Prix: €2.50</p>
                    </div>
                </div>

                <!-- Event 2 -->
                <div style="display: flex; gap: 16px; margin-bottom: 24px; position: relative;">
                    <div style="width: 40px; height: 40px; background: #FFF8E1; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #F39C12; font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;">
                        <i class="fas fa-edit"></i>
                    </div>
                    <div style="flex: 1; padding-top: 4px;">
                        <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Produit modifié</h4>
                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">Par: Admin • 25 Nov 2025 à 14:15</p>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">Changements: Prix €2.50 → €2.75</p>
                    </div>
                </div>

                <!-- Event 3 -->
                <div style="display: flex; gap: 16px; margin-bottom: 24px; position: relative;">
                    <div style="width: 40px; height: 40px; background: #E8F5E9; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #27AE60; font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div style="flex: 1; padding-top: 4px;">
                        <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Stock augmenté</h4>
                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">Par: Caissier 1 • 24 Nov 2025 à 09:45</p>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">Stock: 100 → 150 unités (+50)</p>
                    </div>
                </div>

                <!-- Event 4 -->
                <div style="display: flex; gap: 16px; margin-bottom: 24px; position: relative;">
                    <div style="width: 40px; height: 40px; background: #FFE5E5; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #E74C3C; font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;">
                        <i class="fas fa-arrow-down"></i>
                    </div>
                    <div style="flex: 1; padding-top: 4px;">
                        <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Stock diminué</h4>
                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">Par: Caissier 1 • 23 Nov 2025 à 16:20</p>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">Stock: 150 → 120 unités (-30) • Facture #SP20230045</p>
                    </div>
                </div>

                <!-- Event 5 -->
                <div style="display: flex; gap: 16px; margin-bottom: 24px; position: relative;">
                    <div style="width: 40px; height: 40px; background: #FFF8E1; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #F39C12; font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div style="flex: 1; padding-top: 4px;">
                        <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Alerte stock faible</h4>
                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">Système • 22 Nov 2025 à 08:00</p>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">Stock: 120 unités (Seuil: 50)</p>
                    </div>
                </div>

                <!-- Event 6 -->
                <div style="display: flex; gap: 16px; position: relative;">
                    <div style="width: 40px; height: 40px; background: #E8F5E9; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #27AE60; font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;">
                        <i class="fas fa-arrow-up"></i>
                    </div>
                    <div style="flex: 1; padding-top: 4px;">
                        <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Stock réapprovisionné</h4>
                        <p style="margin: 4px 0 0 0; font-size: 12px; color: #999;">Par: Admin • 20 Nov 2025 à 11:30</p>
                        <p style="margin: 8px 0 0 0; font-size: 12px; color: #666;">Stock: 120 → 200 unités (+80) • Bon de commande #BC20230012</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('historyModal')">
                <i class="fas fa-times"></i> Fermer
            </button>
            <button class="btn btn-secondary" style="background: #E3F2FD; color: #0066FF;">
                <i class="fas fa-download"></i> Exporter
            </button>
        </div>
    </div>
</div>
