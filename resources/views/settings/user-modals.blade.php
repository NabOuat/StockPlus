<!-- Add User Modal -->
<div class="modal-overlay" id="addUserModal">
    <div class="modal create-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-user-plus"></i>
                Ajouter un Utilisateur
            </h2>
            <button class="modal-close" onclick="closeUserModal('addUserModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addUserForm">
                <div class="form-group">
                    <label class="form-label required">Nom Complet</label>
                    <input type="text" class="form-input" placeholder="Ex: Jean Dupont" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-input" placeholder="Ex: jean@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Mot de passe</label>
                    <input type="password" class="form-input" placeholder="Minimum 8 caractères" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Rôle</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner un rôle...</option>
                        <option value="caissier">Caissier</option>
                        <option value="gestionnaire">Gestionnaire Stock</option>
                        <option value="multi">Multi-Rôle (PDV + Stock)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required">Modules Autorisés</label>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="pdv"> PDV / Facturation
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="stock"> Gestion des Stocks
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="clients"> Gestion des Clients
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="reports"> Rapports
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('addUserModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitUserForm('addUserForm')">
                <i class="fas fa-check"></i> Créer
            </button>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal-overlay" id="editUserModal">
    <div class="modal edit-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-user-edit"></i>
                Modifier l'Utilisateur
            </h2>
            <button class="modal-close" onclick="closeUserModal('editUserModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editUserForm">
                <div class="form-group">
                    <label class="form-label required">Nom Complet</label>
                    <input type="text" class="form-input" placeholder="Ex: Jean Dupont" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-input" placeholder="Ex: jean@example.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nouveau Mot de passe (laisser vide pour ne pas changer)</label>
                    <input type="password" class="form-input" placeholder="Minimum 8 caractères">
                </div>

                <div class="form-group">
                    <label class="form-label required">Rôle</label>
                    <select class="form-select" required>
                        <option value="caissier">Caissier</option>
                        <option value="gestionnaire" selected>Gestionnaire Stock</option>
                        <option value="multi">Multi-Rôle (PDV + Stock)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required">Modules Autorisés</label>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="pdv"> PDV / Facturation
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="stock" checked> Gestion des Stocks
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="clients"> Gestion des Clients
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" value="reports"> Rapports
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Statut</label>
                    <select class="form-select">
                        <option value="active" selected>Actif</option>
                        <option value="inactive">Inactif</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('editUserModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="submitUserForm('editUserForm')">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </div>
</div>

<!-- Delete User Modal -->
<div class="modal-overlay" id="deleteUserModal">
    <div class="modal delete-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-trash"></i>
                Supprimer l'Utilisateur
            </h2>
            <button class="modal-close" onclick="closeUserModal('deleteUserModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body delete-modal-body">
            <div class="delete-modal-icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="delete-modal-title">Êtes-vous sûr ?</h3>
            <p class="delete-modal-text">
                Cette action supprimera définitivement l'utilisateur de votre base de données.
            </p>
            <div class="delete-modal-info">
                <i class="fas fa-info-circle"></i>
                Cette opération ne peut pas être annulée.
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('deleteUserModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-danger" onclick="confirmDeleteUser()">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div class="modal-overlay" id="viewUserModal">
    <div class="modal view-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-user"></i>
                Détails de l'Utilisateur
            </h2>
            <button class="modal-close" onclick="closeUserModal('viewUserModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body view-modal-body">
            <div class="view-item">
                <span class="view-label">Nom</span>
                <span class="view-value" id="viewUserName">Jean Dupont</span>
            </div>
            <div class="view-item">
                <span class="view-label">Email</span>
                <span class="view-value" id="viewUserEmail">jean@example.com</span>
            </div>
            <div class="view-item">
                <span class="view-label">Rôle</span>
                <span class="view-value" id="viewUserRole">Gestionnaire Stock</span>
            </div>
            <div class="view-item">
                <span class="view-label">Modules</span>
                <span class="view-value" id="viewUserModules">Gestion des Stocks</span>
            </div>
            <div class="view-item">
                <span class="view-label">Statut</span>
                <span class="status-badge active" id="viewUserStatus">Actif</span>
            </div>
            <div class="view-item">
                <span class="view-label">Créé le</span>
                <span class="view-value" id="viewUserCreated">26 novembre 2025</span>
            </div>
            <div class="view-item">
                <span class="view-label">Dernière connexion</span>
                <span class="view-value" id="viewUserLastLogin">26 novembre 2025 à 09:30</span>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('viewUserModal')">
                <i class="fas fa-times"></i> Fermer
            </button>
            <button class="btn btn-primary" onclick="openEditUserModalFromView()">
                <i class="fas fa-edit"></i> Modifier
            </button>
        </div>
    </div>
</div>

<script>
    // Modal Functions
    function openUserModal(modalId) {
        console.log('Opening modal:', modalId);
        const modal = document.getElementById(modalId);
        if (modal) {
            console.log('Modal found, adding active class');
            modal.classList.add('active');
            modal.style.display = 'flex';
            modal.style.opacity = '1';
            modal.style.visibility = 'visible';
        } else {
            console.log('Modal not found:', modalId);
        }
    }

    function closeUserModal(modalId) {
        console.log('Closing modal:', modalId);
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('active');
            modal.style.display = 'none';
            modal.style.opacity = '0';
            modal.style.visibility = 'hidden';
        }
    }

    function openAddUserModal() {
        console.log('openAddUserModal called');
        openUserModal('addUserModal');
    }

    function openEditUserModal(userId) {
        console.log('openEditUserModal called');
        openUserModal('editUserModal');
    }

    function openEditUserModalFromView() {
        closeUserModal('viewUserModal');
        openUserModal('editUserModal');
    }

    function openDeleteUserModal(userId) {
        console.log('openDeleteUserModal called');
        openUserModal('deleteUserModal');
    }

    function submitUserForm(formId) {
        const form = document.getElementById(formId);
        if (form.checkValidity()) {
            console.log('Form submitted:', formId);
            if (formId === 'addUserForm') {
                alert('Utilisateur créé avec succès!');
                closeUserModal('addUserModal');
            } else {
                alert('Utilisateur mis à jour avec succès!');
                closeUserModal('editUserModal');
            }
        } else {
            alert('Veuillez remplir tous les champs requis.');
        }
    }

    function confirmDeleteUser() {
        console.log('User deleted');
        alert('Utilisateur supprimé avec succès!');
        closeUserModal('deleteUserModal');
    }

    // Close modal when clicking overlay
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
        });
    });
</script>
