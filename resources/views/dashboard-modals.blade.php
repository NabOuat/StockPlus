<!-- Create Invoice Modal -->
<div class="modal-overlay" id="invoiceModal" onclick="if(event.target === this) closeDashboardModal('invoiceModal')">
    <div class="modal" style="max-width: 600px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-file-invoice-dollar"></i>
                Créer une Facture
            </h2>
            <button class="modal-close" onclick="closeDashboardModal('invoiceModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="invoiceForm">
                <div class="form-group">
                    <label class="form-label required">Client</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner un client...</option>
                        <option value="1">Jean Dupont</option>
                        <option value="2">Marie Martin</option>
                        <option value="3">Pierre Bernard</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required">Produit</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner un produit...</option>
                        <option value="1">Eau Minérale (1L) - €2.50</option>
                        <option value="2">Pain Complet - €1.80</option>
                        <option value="3">Café Arabica (250g) - €7.50</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required">Quantité</label>
                    <input type="number" class="form-input" min="1" placeholder="Ex: 5" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Notes</label>
                    <textarea class="form-input" placeholder="Notes supplémentaires..." style="min-height: 60px; resize: vertical;"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeDashboardModal('invoiceModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="submitDashboardForm('invoiceForm', 'facture')">
                <i class="fas fa-save"></i> Créer Facture
            </button>
        </div>
    </div>
</div>

<!-- Add Product Modal -->
<div class="modal-overlay" id="productModal" onclick="if(event.target === this) closeDashboardModal('productModal')">
    <div class="modal" style="max-width: 600px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-box-open"></i>
                Ajouter un Produit
            </h2>
            <button class="modal-close" onclick="closeDashboardModal('productModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="productForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Produit</label>
                    <input type="text" class="form-input" placeholder="Ex: Eau Minérale 1L" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">SKU</label>
                    <input type="text" class="form-input" placeholder="Ex: EAU-001" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Catégorie</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner une catégorie...</option>
                        <option value="eau">Eau</option>
                        <option value="boissons">Boissons</option>
                        <option value="friandises">Friandises</option>
                        <option value="autres">Autres</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required">Prix Unitaire (€)</label>
                    <input type="number" class="form-input" step="0.01" placeholder="Ex: 2.50" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Stock Initial</label>
                    <input type="number" class="form-input" min="0" placeholder="Ex: 100" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Seuil d'Alerte</label>
                    <input type="number" class="form-input" min="0" placeholder="Ex: 20" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeDashboardModal('productModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitDashboardForm('productForm', 'produit')">
                <i class="fas fa-check"></i> Ajouter Produit
            </button>
        </div>
    </div>
</div>

<!-- Register Client Modal -->
<div class="modal-overlay" id="clientModal" onclick="if(event.target === this) closeDashboardModal('clientModal')">
    <div class="modal" style="max-width: 600px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-user-plus"></i>
                Enregistrer un Client
            </h2>
            <button class="modal-close" onclick="closeDashboardModal('clientModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="clientForm">
                <div class="form-group">
                    <label class="form-label required">Nom Complet</label>
                    <input type="text" class="form-input" placeholder="Ex: Jean Dupont" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-input" placeholder="Ex: jean@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Téléphone</label>
                    <input type="tel" class="form-input" placeholder="Ex: +33 6 12 34 56 78" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Adresse</label>
                    <input type="text" class="form-input" placeholder="Ex: 10 Rue du Commerce">
                </div>

                <div class="form-group">
                    <label class="form-label">Code Postal</label>
                    <input type="text" class="form-input" placeholder="Ex: 75000">
                </div>

                <div class="form-group">
                    <label class="form-label">Ville</label>
                    <input type="text" class="form-input" placeholder="Ex: Paris">
                </div>

                <div class="form-group">
                    <label class="form-label">Type de Client</label>
                    <select class="form-select">
                        <option value="particulier">Particulier</option>
                        <option value="entreprise">Entreprise</option>
                        <option value="association">Association</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeDashboardModal('clientModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitDashboardForm('clientForm', 'client')">
                <i class="fas fa-check"></i> Enregistrer Client
            </button>
        </div>
    </div>
</div>

<style>
/* Modal Styles */
.modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease-out;
}

.modal-overlay.active {
    display: flex;
}

.modal {
    background: white;
    border-radius: 12px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
    max-width: 500px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    animation: slideUp 0.3s ease-out;
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 24px;
    border-bottom: 1px solid #E8EAED;
}

.modal-title {
    margin: 0;
    font-size: 16px;
    font-weight: 700;
    color: #1A1A1A;
    display: flex;
    align-items: center;
    gap: 8px;
}

.modal-close {
    background: none;
    border: none;
    font-size: 20px;
    color: #999;
    cursor: pointer;
    transition: color 0.3s;
}

.modal-close:hover {
    color: #E74C3C;
}

.modal-body {
    padding: 24px;
}

.modal-footer {
    display: flex;
    gap: 12px;
    padding: 16px 24px;
    border-top: 1px solid #E8EAED;
    background: #F9FAFB;
}

.form-group {
    margin-bottom: 16px;
}

.form-label {
    display: block;
    margin-bottom: 6px;
    font-size: 12px;
    font-weight: 600;
    color: #1A1A1A;
}

.form-label.required::after {
    content: ' *';
    color: #E74C3C;
}

.form-input,
.form-select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #E8EAED;
    border-radius: 6px;
    font-size: 13px;
    font-family: inherit;
    transition: border-color 0.3s;
}

.form-input:focus,
.form-select:focus {
    outline: none;
    border-color: #0066FF;
    box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
}

/* Buttons */
.btn {
    padding: 10px 16px;
    border: none;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-primary {
    background: #0066FF;
    color: white;
}

.btn-primary:hover {
    background: #0052CC;
    box-shadow: 0 4px 12px rgba(0, 102, 255, 0.3);
}

.btn-secondary {
    background: #F0F2F5;
    color: #666;
}

.btn-secondary:hover {
    background: #E8EAED;
}

.btn-success {
    background: #27AE60;
    color: white;
}

.btn-success:hover {
    background: #229954;
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>

<script>
// Dashboard Modal Functions
function openDashboardModal(type) {
    let modalId;
    switch(type) {
        case 'invoice':
            modalId = 'invoiceModal';
            break;
        case 'product':
            modalId = 'productModal';
            break;
        case 'client':
            modalId = 'clientModal';
            break;
        default:
            return;
    }
    document.getElementById(modalId).classList.add('active');
}

function closeDashboardModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
}

function submitDashboardForm(formId, type) {
    const form = document.getElementById(formId);
    if (form.checkValidity()) {
        console.log(type + ' form submitted:', formId);
        
        let message = '';
        let modalId = '';
        
        switch(type) {
            case 'facture':
                message = 'Facture créée avec succès!';
                modalId = 'invoiceModal';
                break;
            case 'produit':
                message = 'Produit ajouté avec succès!';
                modalId = 'productModal';
                break;
            case 'client':
                message = 'Client enregistré avec succès!';
                modalId = 'clientModal';
                break;
        }
        
        alert(message);
        form.reset();
        closeDashboardModal(modalId);
    } else {
        alert('Veuillez remplir tous les champs requis.');
    }
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        document.querySelectorAll('.modal-overlay.active').forEach(modal => {
            modal.classList.remove('active');
        });
    }
});
</script>
