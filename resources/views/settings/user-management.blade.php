<!-- Add User Modal -->
<div class="modal-overlay" id="addUserModal" onclick="if(event.target === this) closeUserModal('addUserModal')">
    <div class="modal add-user-modal">
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
                    <label class="form-label required">Rôle</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner un rôle...</option>
                        <option value="admin">Administrateur</option>
                        <option value="caissier">Caissier</option>
                        <option value="gestionnaire">Gestionnaire Stock</option>
                        <option value="multi">Multi-Rôle</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label required">Mot de passe</label>
                    <input type="password" class="form-input" placeholder="Entrez un mot de passe" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Confirmer le mot de passe</label>
                    <input type="password" class="form-input" placeholder="Confirmez le mot de passe" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('addUserModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitUserForm('addUserForm')">
                <i class="fas fa-check"></i> Ajouter
            </button>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div class="modal-overlay" id="editUserModal" onclick="if(event.target === this) closeUserModal('editUserModal')">
    <div class="modal edit-user-modal">
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
                    <label class="form-label required">Rôle</label>
                    <select class="form-select" required>
                        <option value="">Sélectionner un rôle...</option>
                        <option value="admin">Administrateur</option>
                        <option value="caissier">Caissier</option>
                        <option value="gestionnaire">Gestionnaire Stock</option>
                        <option value="multi">Multi-Rôle</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Nouveau mot de passe (optionnel)</label>
                    <input type="password" class="form-input" placeholder="Laissez vide pour garder l'actuel">
                </div>

                <div class="form-group">
                    <label class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-input" placeholder="Confirmez si changement">
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
<div class="modal-overlay" id="deleteUserModal" onclick="if(event.target === this) closeUserModal('deleteUserModal')">
    <div class="modal delete-user-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-trash-alt"></i>
                Supprimer l'Utilisateur
            </h2>
            <button class="modal-close" onclick="closeUserModal('deleteUserModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <p style="margin: 0; color: #666; font-size: 14px;">
                Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.
            </p>
            <div id="deleteUserInfo" style="margin-top: 16px; padding: 12px; background: #FEF3C7; border-radius: 6px; border-left: 4px solid #F39C12;">
                <p style="margin: 0; font-size: 12px; color: #666;">
                    <strong>Utilisateur:</strong> <span id="deleteUserName">-</span>
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('deleteUserModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-danger" onclick="confirmDeleteUser()">
                <i class="fas fa-trash-alt"></i> Supprimer
            </button>
        </div>
    </div>
</div>

<!-- View User Modal -->
<div class="modal-overlay" id="viewUserModal" onclick="if(event.target === this) closeUserModal('viewUserModal')">
    <div class="modal view-user-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-user"></i>
                Détails de l'Utilisateur
            </h2>
            <button class="modal-close" onclick="closeUserModal('viewUserModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="user-details">
                <div class="detail-row">
                    <span class="detail-label">Nom:</span>
                    <span class="detail-value" id="viewUserName">-</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Email:</span>
                    <span class="detail-value" id="viewUserEmail">-</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Rôle:</span>
                    <span class="detail-value" id="viewUserRole">-</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Modules:</span>
                    <span class="detail-value" id="viewUserModules">-</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Statut:</span>
                    <span class="detail-value" id="viewUserStatus">-</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date de création:</span>
                    <span class="detail-value" id="viewUserCreated">-</span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('viewUserModal')">
                <i class="fas fa-times"></i> Fermer
            </button>
        </div>
    </div>
</div>

<!-- Manage Roles Modal -->
<div class="modal-overlay" id="rolesModal" onclick="if(event.target === this) closeUserModal('rolesModal')">
    <div class="modal roles-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-shield-alt"></i>
                Gérer les Rôles
            </h2>
            <button class="modal-close" onclick="closeUserModal('rolesModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div style="display: grid; gap: 12px;">
                <!-- Role 1 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Administrateur</h4>
                            <p style="margin: 4px 0 0 0; font-size: 11px; color: #999;">Accès complet à tous les modules</p>
                        </div>
                        <button onclick="openEditRoleModal('Administrateur', 'Accès complet à tous les modules')" class="btn btn-sm btn-secondary" style="padding: 6px 12px; font-size: 11px;">
                            <i class="fas fa-edit"></i> Éditer
                        </button>
                    </div>
                </div>

                <!-- Role 2 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Caissier</h4>
                            <p style="margin: 4px 0 0 0; font-size: 11px; color: #999;">Accès au PDV et facturation</p>
                        </div>
                        <button onclick="openEditRoleModal('Caissier', 'Accès au PDV et facturation')" class="btn btn-sm btn-secondary" style="padding: 6px 12px; font-size: 11px;">
                            <i class="fas fa-edit"></i> Éditer
                        </button>
                    </div>
                </div>

                <!-- Role 3 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Gestionnaire Stock</h4>
                            <p style="margin: 4px 0 0 0; font-size: 11px; color: #999;">Gestion des stocks et rapports</p>
                        </div>
                        <button onclick="openEditRoleModal('Gestionnaire Stock', 'Gestion des stocks et rapports')" class="btn btn-sm btn-secondary" style="padding: 6px 12px; font-size: 11px;">
                            <i class="fas fa-edit"></i> Éditer
                        </button>
                    </div>
                </div>
            </div>

            <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid #E8EAED;">
                <button onclick="openAddRoleModal()" class="btn btn-primary" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <i class="fas fa-plus"></i> Ajouter un Rôle
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Manage Permissions Modal -->
<div class="modal-overlay" id="permissionsModal" onclick="if(event.target === this) closeUserModal('permissionsModal')">
    <div class="modal permissions-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-key"></i>
                Gérer les Permissions
            </h2>
            <button class="modal-close" onclick="closeUserModal('permissionsModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div style="display: grid; gap: 12px;">
                <!-- Permission Group 1 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB;">
                    <h4 style="margin: 0 0 12px 0; font-size: 12px; font-weight: 600; color: #1A1A1A;">
                        <i class="fas fa-boxes" style="color: #0066FF; margin-right: 6px;"></i>
                        Gestion des Stocks
                    </h4>
                    <div style="display: grid; gap: 8px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" checked style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Voir les stocks</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" checked style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Créer/Modifier produits</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Supprimer produits</span>
                        </label>
                    </div>
                </div>

                <!-- Permission Group 2 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB;">
                    <h4 style="margin: 0 0 12px 0; font-size: 12px; font-weight: 600; color: #1A1A1A;">
                        <i class="fas fa-cash-register" style="color: #F39C12; margin-right: 6px;"></i>
                        PDV / Facturation
                    </h4>
                    <div style="display: grid; gap: 8px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" checked style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Accès PDV</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" checked style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Créer factures</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Annuler factures</span>
                        </label>
                    </div>
                </div>

                <!-- Permission Group 3 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB;">
                    <h4 style="margin: 0 0 12px 0; font-size: 12px; font-weight: 600; color: #1A1A1A;">
                        <i class="fas fa-chart-bar" style="color: #27AE60; margin-right: 6px;"></i>
                        Rapports
                    </h4>
                    <div style="display: grid; gap: 8px;">
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" checked style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Voir rapports</span>
                        </label>
                        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                            <input type="checkbox" style="cursor: pointer;">
                            <span style="font-size: 12px; color: #666;">Exporter données</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('permissionsModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary">
                <i class="fas fa-save"></i> Enregistrer
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

.user-details {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.detail-row {
    display: flex;
    justify-content: space-between;
    padding: 12px;
    background: #F9FAFB;
    border-radius: 6px;
    align-items: center;
}

.detail-label {
    font-weight: 600;
    color: #333;
    min-width: 120px;
    font-size: 12px;
}

.detail-value {
    color: #666;
    text-align: right;
    font-size: 13px;
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

.btn-danger {
    background: #E74C3C;
    color: white;
}

.btn-danger:hover {
    background: #C0392B;
}

.btn-sm {
    padding: 6px 12px;
    font-size: 11px;
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
// Modal Functions
function openAddUserModal() {
    document.getElementById('addUserModal').classList.add('active');
}

function openEditUserModal(userName = '') {
    document.getElementById('editUserModal').classList.add('active');
}

function openDeleteUserModal(userName = '') {
    document.getElementById('deleteUserName').textContent = userName;
    document.getElementById('deleteUserModal').classList.add('active');
}

function openViewUserModal(userName = '', email = '', role = '', modules = '') {
    document.getElementById('viewUserName').textContent = userName;
    document.getElementById('viewUserEmail').textContent = email;
    document.getElementById('viewUserRole').textContent = role;
    document.getElementById('viewUserModules').textContent = modules;
    document.getElementById('viewUserStatus').textContent = 'Actif';
    document.getElementById('viewUserCreated').textContent = new Date().toLocaleDateString('fr-FR');
    document.getElementById('viewUserModal').classList.add('active');
}

function openRolesModal() {
    document.getElementById('rolesModal').classList.add('active');
}

function openPermissionsModal() {
    document.getElementById('permissionsModal').classList.add('active');
}

function closeUserModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
}

function submitUserForm(formId) {
    const form = document.getElementById(formId);
    if (form.checkValidity()) {
        console.log('Form submitted:', formId);
        alert('Utilisateur enregistré avec succès!');
        closeUserModal(formId === 'addUserForm' ? 'addUserModal' : 'editUserModal');
    } else {
        alert('Veuillez remplir tous les champs requis.');
    }
}

function confirmDeleteUser() {
    console.log('User deleted');
    alert('Utilisateur supprimé avec succès!');
    closeUserModal('deleteUserModal');
}

// Role Management Functions
function openEditRoleModal(roleName, roleDescription) {
    document.getElementById('editRoleName').value = roleName;
    document.getElementById('editRoleDescription').value = roleDescription;
    document.getElementById('editRoleModal').classList.add('active');
}

function openAddRoleModal() {
    document.getElementById('addRoleForm').reset();
    document.getElementById('addRoleModal').classList.add('active');
}

function submitRoleForm(formId) {
    const form = document.getElementById(formId);
    if (form.checkValidity()) {
        console.log('Role form submitted:', formId);
        alert('Rôle enregistré avec succès!');
        closeUserModal(formId === 'addRoleForm' ? 'addRoleModal' : 'editRoleModal');
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

<!-- Edit Role Modal -->
<div class="modal-overlay" id="editRoleModal" onclick="if(event.target === this) closeUserModal('editRoleModal')">
    <div class="modal edit-role-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-shield-alt"></i>
                Éditer le Rôle
            </h2>
            <button class="modal-close" onclick="closeUserModal('editRoleModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editRoleForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Rôle</label>
                    <input type="text" id="editRoleName" class="form-input" placeholder="Ex: Administrateur" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Description</label>
                    <textarea class="form-textarea" id="editRoleDescription" placeholder="Description du rôle..." style="width: 100%; padding: 10px 12px; border: 1px solid #E8EAED; border-radius: 6px; font-size: 13px; font-family: inherit; min-height: 80px; resize: vertical;" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Permissions</label>
                    <div style="display: grid; gap: 8px;">
                        <!-- Gestion des Stocks -->
                        <div style="padding: 8px; background: #F0F7FF; border-radius: 4px; border-left: 3px solid #0066FF;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #0066FF;">📦 Gestion des Stocks</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" checked style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Voir les stocks</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" checked style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Créer/Modifier produits</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Supprimer produits</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les catégories</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les fournisseurs</span>
                                </label>
                            </div>
                        </div>

                        <!-- PDV / Facturation -->
                        <div style="padding: 8px; background: #FFF8F0; border-radius: 4px; border-left: 3px solid #F39C12;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #F39C12;">💳 PDV / Facturation</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" checked style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Accès PDV</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" checked style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Créer factures</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Annuler factures</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les paiements</span>
                                </label>
                            </div>
                        </div>

                        <!-- Gestion des Clients -->
                        <div style="padding: 8px; background: #F0FFF8; border-radius: 4px; border-left: 3px solid #27AE60;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #27AE60;">👥 Gestion des Clients</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Voir les clients</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Créer/Modifier clients</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Supprimer clients</span>
                                </label>
                            </div>
                        </div>

                        <!-- Rapports -->
                        <div style="padding: 8px; background: #F5F0FF; border-radius: 4px; border-left: 3px solid #9B59B6;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #9B59B6;">📊 Rapports</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Voir rapports</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Exporter données</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Imprimer rapports</span>
                                </label>
                            </div>
                        </div>

                        <!-- Paramètres -->
                        <div style="padding: 8px; background: #FFF0F5; border-radius: 4px; border-left: 3px solid #E74C3C;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #E74C3C;">⚙️ Paramètres</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les utilisateurs</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les rôles</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les permissions</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Modifier paramètres</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('editRoleModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="submitRoleForm('editRoleForm')">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </div>
</div>

<!-- Add Role Modal -->
<div class="modal-overlay" id="addRoleModal" onclick="if(event.target === this) closeUserModal('addRoleModal')">
    <div class="modal add-role-modal">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-plus-circle"></i>
                Ajouter un Rôle
            </h2>
            <button class="modal-close" onclick="closeUserModal('addRoleModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addRoleForm">
                <div class="form-group">
                    <label class="form-label required">Nom du Rôle</label>
                    <input type="text" class="form-input" placeholder="Ex: Superviseur" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Description</label>
                    <textarea class="form-textarea" placeholder="Description du rôle..." style="width: 100%; padding: 10px 12px; border: 1px solid #E8EAED; border-radius: 6px; font-size: 13px; font-family: inherit; min-height: 80px; resize: vertical;" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Permissions</label>
                    <div style="display: grid; gap: 8px;">
                        <!-- Gestion des Stocks -->
                        <div style="padding: 8px; background: #F0F7FF; border-radius: 4px; border-left: 3px solid #0066FF;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #0066FF;">📦 Gestion des Stocks</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Voir les stocks</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Créer/Modifier produits</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Supprimer produits</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les catégories</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les fournisseurs</span>
                                </label>
                            </div>
                        </div>

                        <!-- PDV / Facturation -->
                        <div style="padding: 8px; background: #FFF8F0; border-radius: 4px; border-left: 3px solid #F39C12;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #F39C12;">💳 PDV / Facturation</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Accès PDV</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Créer factures</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Annuler factures</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les paiements</span>
                                </label>
                            </div>
                        </div>

                        <!-- Gestion des Clients -->
                        <div style="padding: 8px; background: #F0FFF8; border-radius: 4px; border-left: 3px solid #27AE60;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #27AE60;">👥 Gestion des Clients</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Voir les clients</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Créer/Modifier clients</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Supprimer clients</span>
                                </label>
                            </div>
                        </div>

                        <!-- Rapports -->
                        <div style="padding: 8px; background: #F5F0FF; border-radius: 4px; border-left: 3px solid #9B59B6;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #9B59B6;">📊 Rapports</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Voir rapports</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Exporter données</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Imprimer rapports</span>
                                </label>
                            </div>
                        </div>

                        <!-- Paramètres -->
                        <div style="padding: 8px; background: #FFF0F5; border-radius: 4px; border-left: 3px solid #E74C3C;">
                            <p style="margin: 0 0 6px 0; font-size: 11px; font-weight: 600; color: #E74C3C;">⚙️ Paramètres</p>
                            <div style="display: grid; gap: 6px;">
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les utilisateurs</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les rôles</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Gérer les permissions</span>
                                </label>
                                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                    <input type="checkbox" style="cursor: pointer;">
                                    <span style="font-size: 12px; color: #666;">Modifier paramètres</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeUserModal('addRoleModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitRoleForm('addRoleForm')">
                <i class="fas fa-check"></i> Ajouter
            </button>
        </div>
    </div>
</div>
