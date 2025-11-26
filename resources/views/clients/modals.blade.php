<!-- Add Client Modal -->
<div class="modal-overlay" id="addClientModal">
    <div class="modal create-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-plus-circle"></i>
                Ajouter un Client
            </h2>
            <button class="modal-close" onclick="closeModal('addClientModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addClientForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Client</label>
                    <input type="text" class="form-input" placeholder="Ex: Sophie Dupont" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-input" placeholder="Ex: sophie@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Téléphone</label>
                        <input type="tel" class="form-input" placeholder="Ex: +33 1 23 45 67 89" required>
                    </div>
                </div>

                <div class="form-group form-row full">
                    <label class="form-label required">Adresse</label>
                    <input type="text" class="form-input" placeholder="Ex: 12 Rue de la Paix, Paris" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Ville</label>
                        <input type="text" class="form-input" placeholder="Ex: Paris" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Code Postal</label>
                        <input type="text" class="form-input" placeholder="Ex: 75000" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Termes de Paiement</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner...</option>
                        <option value="net30">Net 30</option>
                        <option value="net60">Net 60</option>
                        <option value="cod">COD (Contre Remboursement)</option>
                        <option value="reception">À Réception</option>
                    </select>
                </div>

                <div class="form-group form-row full">
                    <label class="form-label">Notes</label>
                    <textarea class="form-textarea" placeholder="Notes supplémentaires..."></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('addClientModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitForm('addClientForm')">
                <i class="fas fa-check"></i> Créer
            </button>
        </div>
    </div>
</div>

<!-- Edit Client Modal -->
<div class="modal-overlay" id="editClientModal">
    <div class="modal edit-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-edit"></i>
                Modifier le Client
            </h2>
            <button class="modal-close" onclick="closeModal('editClientModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editClientForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Client</label>
                    <input type="text" class="form-input" placeholder="Ex: Sophie Dupont" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Email</label>
                        <input type="email" class="form-input" placeholder="Ex: sophie@example.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Téléphone</label>
                        <input type="tel" class="form-input" placeholder="Ex: +33 1 23 45 67 89" required>
                    </div>
                </div>

                <div class="form-group form-row full">
                    <label class="form-label required">Adresse</label>
                    <input type="text" class="form-input" placeholder="Ex: 12 Rue de la Paix, Paris" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label required">Ville</label>
                        <input type="text" class="form-input" placeholder="Ex: Paris" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Code Postal</label>
                        <input type="text" class="form-input" placeholder="Ex: 75000" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label required">Termes de Paiement</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner...</option>
                        <option value="net30">Net 30</option>
                        <option value="net60">Net 60</option>
                        <option value="cod">COD (Contre Remboursement)</option>
                        <option value="reception">À Réception</option>
                    </select>
                </div>

                <div class="form-group form-row full">
                    <label class="form-label">Notes</label>
                    <textarea class="form-textarea" placeholder="Notes supplémentaires..."></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('editClientModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="submitForm('editClientForm')">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </div>
</div>

<!-- Delete Client Modal -->
<div class="modal-overlay" id="deleteClientModal">
    <div class="modal delete-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-trash"></i>
                Supprimer le Client
            </h2>
            <button class="modal-close" onclick="closeModal('deleteClientModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body delete-modal-body">
            <div class="delete-modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="delete-modal-title">Êtes-vous sûr ?</h3>
            <p class="delete-modal-text">
                Cette action supprimera définitivement le client de votre base de données.
            </p>
            <div class="delete-modal-info">
                <i class="fas fa-info-circle"></i>
                Cette opération ne peut pas être annulée.
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('deleteClientModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-danger" onclick="confirmDelete()">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </div>
    </div>
</div>

<!-- View Client Modal -->
<div class="modal-overlay" id="viewClientModal">
    <div class="modal view-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-eye"></i>
                Détails du Client
            </h2>
            <button class="modal-close" onclick="closeModal('viewClientModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body view-modal-body">
            <div class="view-item">
                <span class="view-label">Nom</span>
                <span class="view-value" id="viewName">Sophie Dupont</span>
            </div>
            <div class="view-item">
                <span class="view-label">Email</span>
                <span class="view-value" id="viewEmail">sophie.dupont@example.com</span>
            </div>
            <div class="view-item">
                <span class="view-label">Téléphone</span>
                <span class="view-value" id="viewPhone">+33 1 23 45 67 89</span>
            </div>
            <div class="view-item">
                <span class="view-label">Adresse</span>
                <span class="view-value" id="viewAddress">12 Rue de la Paix, Paris</span>
            </div>
            <div class="view-item">
                <span class="view-label">Ville</span>
                <span class="view-value" id="viewCity">Paris</span>
            </div>
            <div class="view-item">
                <span class="view-label">Code Postal</span>
                <span class="view-value" id="viewZip">75000</span>
            </div>
            <div class="view-item">
                <span class="view-label">Termes de Paiement</span>
                <span class="view-value" id="viewPaymentTerms">Net 30</span>
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
            <button class="btn btn-secondary" onclick="closeModal('viewClientModal')">
                <i class="fas fa-times"></i> Fermer
            </button>
            <button class="btn btn-primary" onclick="openEditClientModal()">
                <i class="fas fa-edit"></i> Modifier
            </button>
        </div>
    </div>
</div>

<!-- History Modal -->
<div class="modal-overlay" id="historyModal">
    <div class="modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-history"></i>
                Historique des Commandes
            </h2>
            <button class="modal-close" onclick="closeModal('historyModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="padding: 12px; background: #F5F7FA; border-radius: 6px; border-left: 3px solid #0066FF;">
                    <div style="font-weight: 600; color: #1A1A1A; margin-bottom: 4px;">Facture #2024-001</div>
                    <div style="font-size: 12px; color: #999999;">Date: 25/11/2025 | Montant: €185.50</div>
                </div>
                <div style="padding: 12px; background: #F5F7FA; border-radius: 6px; border-left: 3px solid #0066FF;">
                    <div style="font-weight: 600; color: #1A1A1A; margin-bottom: 4px;">Facture #2024-002</div>
                    <div style="font-size: 12px; color: #999999;">Date: 20/11/2025 | Montant: €320.00</div>
                </div>
                <div style="padding: 12px; background: #F5F7FA; border-radius: 6px; border-left: 3px solid #0066FF;">
                    <div style="font-weight: 600; color: #1A1A1A; margin-bottom: 4px;">Facture #2024-003</div>
                    <div style="font-size: 12px; color: #999999;">Date: 15/11/2025 | Montant: €450.75</div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('historyModal')">
                <i class="fas fa-times"></i> Fermer
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

    function openAddClientModal() {
        openModal('addClientModal');
    }

    function openEditClientModal(clientId) {
        openModal('editClientModal');
    }

    function openDeleteClientModal(clientId) {
        openModal('deleteClientModal');
    }

    function openViewClientModal(clientId) {
        openModal('viewClientModal');
    }

    function openHistoryModal(clientId) {
        openModal('historyModal');
    }

    function submitForm(formId) {
        const form = document.getElementById(formId);
        if (form.checkValidity()) {
            console.log('Form submitted:', formId);
            closeModal(formId === 'addClientForm' ? 'addClientModal' : 'editClientModal');
        } else {
            alert('Veuillez remplir tous les champs requis.');
        }
    }

    function confirmDelete() {
        console.log('Client deleted');
        closeModal('deleteClientModal');
    }

    // Close modal when clicking overlay
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
            }
        });
    });
</script>
