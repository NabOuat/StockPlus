<!-- Manage Categories Modal -->
<div class="modal-overlay" id="categoriesModal" onclick="if(event.target === this) closeStockModal('categoriesModal')">
    <div class="modal" style="max-width: 700px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-folder"></i>
                Gérer les Catégories
            </h2>
            <button class="modal-close" onclick="closeStockModal('categoriesModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <!-- Categories List -->
            <div style="display: grid; gap: 12px; margin-bottom: 20px;">
                <!-- Category 1 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background: #E3F2FD; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #0066FF; font-size: 18px;">
                            <i class="fas fa-droplet"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Eau</h4>
                            <p style="margin: 4px 0 0 0; font-size: 11px; color: #999;">12 produits</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button onclick="openEditCategoryModal('Eau', 'droplet', '#0066FF')" style="background: none; border: 1px solid #0066FF; color: #0066FF; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 11px; font-weight: 600;">
                            <i class="fas fa-edit"></i> Éditer
                        </button>
                        <button onclick="openDeleteCategoryModal('Eau')" style="background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 11px; font-weight: 600;">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>

                <!-- Category 2 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background: #FFF8E1; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #F39C12; font-size: 18px;">
                            <i class="fas fa-wine-glass"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Boissons</h4>
                            <p style="margin: 4px 0 0 0; font-size: 11px; color: #999;">8 produits</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button onclick="openEditCategoryModal('Boissons', 'wine-glass', '#F39C12')" style="background: none; border: 1px solid #0066FF; color: #0066FF; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 11px; font-weight: 600;">
                            <i class="fas fa-edit"></i> Éditer
                        </button>
                        <button onclick="openDeleteCategoryModal('Boissons')" style="background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 11px; font-weight: 600;">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>

                <!-- Category 3 -->
                <div style="padding: 12px; border: 1px solid #E8EAED; border-radius: 6px; background: #F9FAFB; display: flex; justify-content: space-between; align-items: center;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <div style="width: 40px; height: 40px; background: #F3E5F5; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #9B59B6; font-size: 18px;">
                            <i class="fas fa-candy"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0; font-size: 13px; font-weight: 600; color: #1A1A1A;">Friandises</h4>
                            <p style="margin: 4px 0 0 0; font-size: 11px; color: #999;">15 produits</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button onclick="openEditCategoryModal('Friandises', 'candy', '#9B59B6')" style="background: none; border: 1px solid #0066FF; color: #0066FF; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 11px; font-weight: 600;">
                            <i class="fas fa-edit"></i> Éditer
                        </button>
                        <button onclick="openDeleteCategoryModal('Friandises')" style="background: none; border: 1px solid #E74C3C; color: #E74C3C; padding: 6px 12px; border-radius: 4px; cursor: pointer; font-size: 11px; font-weight: 600;">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>

            <div style="padding-top: 16px; border-top: 1px solid #E8EAED;">
                <button onclick="openAddCategoryModal()" style="width: 100%; background: #0066FF; color: white; border: none; padding: 10px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <i class="fas fa-plus"></i> Ajouter une Catégorie
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal-overlay" id="addCategoryModal" onclick="if(event.target === this) closeStockModal('addCategoryModal')">
    <div class="modal" style="max-width: 500px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-plus-circle"></i>
                Ajouter une Catégorie
            </h2>
            <button class="modal-close" onclick="closeStockModal('addCategoryModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="addCategoryForm">
                <div class="form-group">
                    <label class="form-label required">Nom de la Catégorie</label>
                    <input type="text" class="form-input" placeholder="Ex: Produits Laitiers" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Icône</label>
                    <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px; margin-top: 8px;">
                        <div onclick="selectIcon(this, 'droplet')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Eau">
                            <i class="fas fa-droplet" style="font-size: 20px; color: #0066FF;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'wine-glass')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Boissons">
                            <i class="fas fa-wine-glass" style="font-size: 20px; color: #F39C12;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'candy')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Friandises">
                            <i class="fas fa-candy" style="font-size: 20px; color: #9B59B6;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'bread-slice')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Boulangerie">
                            <i class="fas fa-bread-slice" style="font-size: 20px; color: #D2691E;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'leaf')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Bio">
                            <i class="fas fa-leaf" style="font-size: 20px; color: #27AE60;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'ice-cream')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Crèmerie">
                            <i class="fas fa-ice-cream" style="font-size: 20px; color: #E74C3C;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'apple')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Fruits">
                            <i class="fas fa-apple" style="font-size: 20px; color: #E74C3C;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'carrot')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Légumes">
                            <i class="fas fa-carrot" style="font-size: 20px; color: #E67E22;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'utensils')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Épicerie">
                            <i class="fas fa-utensils" style="font-size: 20px; color: #34495E;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'coffee')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Café">
                            <i class="fas fa-coffee" style="font-size: 20px; color: #8B4513;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'egg')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Œufs">
                            <i class="fas fa-egg" style="font-size: 20px; color: #F39C12;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'box')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Autre">
                            <i class="fas fa-box" style="font-size: 20px; color: #95A5A6;"></i>
                        </div>
                    </div>
                    <input type="hidden" id="selectedIcon" value="">
                </div>

                <div class="form-group">
                    <label class="form-label required">Couleur</label>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                        <input type="color" id="categoryColor" value="#0066FF" style="width: 50px; height: 40px; border: 1px solid #E8EAED; border-radius: 6px; cursor: pointer;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-input" placeholder="Description de la catégorie..." style="min-height: 60px; resize: vertical;"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeStockModal('addCategoryModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-success" onclick="submitCategoryForm('addCategoryForm')">
                <i class="fas fa-check"></i> Ajouter
            </button>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal-overlay" id="editCategoryModal" onclick="if(event.target === this) closeStockModal('editCategoryModal')">
    <div class="modal" style="max-width: 500px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-edit"></i>
                Éditer la Catégorie
            </h2>
            <button class="modal-close" onclick="closeStockModal('editCategoryModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="editCategoryForm">
                <div class="form-group">
                    <label class="form-label required">Nom de la Catégorie</label>
                    <input type="text" id="editCategoryName" class="form-input" placeholder="Ex: Produits Laitiers" required>
                </div>

                <div class="form-group">
                    <label class="form-label required">Icône</label>
                    <div style="display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px; margin-top: 8px;">
                        <div onclick="selectIcon(this, 'droplet')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Eau">
                            <i class="fas fa-droplet" style="font-size: 20px; color: #0066FF;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'wine-glass')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Boissons">
                            <i class="fas fa-wine-glass" style="font-size: 20px; color: #F39C12;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'candy')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Friandises">
                            <i class="fas fa-candy" style="font-size: 20px; color: #9B59B6;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'bread-slice')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Boulangerie">
                            <i class="fas fa-bread-slice" style="font-size: 20px; color: #D2691E;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'leaf')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Bio">
                            <i class="fas fa-leaf" style="font-size: 20px; color: #27AE60;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'ice-cream')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Crèmerie">
                            <i class="fas fa-ice-cream" style="font-size: 20px; color: #E74C3C;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'apple')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Fruits">
                            <i class="fas fa-apple" style="font-size: 20px; color: #E74C3C;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'carrot')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Légumes">
                            <i class="fas fa-carrot" style="font-size: 20px; color: #E67E22;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'utensils')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Épicerie">
                            <i class="fas fa-utensils" style="font-size: 20px; color: #34495E;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'coffee')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Café">
                            <i class="fas fa-coffee" style="font-size: 20px; color: #8B4513;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'egg')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Œufs">
                            <i class="fas fa-egg" style="font-size: 20px; color: #F39C12;"></i>
                        </div>
                        <div onclick="selectIcon(this, 'box')" style="padding: 12px; border: 2px solid #E8EAED; border-radius: 6px; cursor: pointer; text-align: center; transition: all 0.3s;" title="Autre">
                            <i class="fas fa-box" style="font-size: 20px; color: #95A5A6;"></i>
                        </div>
                    </div>
                    <input type="hidden" id="selectedIconEdit" value="">
                </div>

                <div class="form-group">
                    <label class="form-label required">Couleur</label>
                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                        <input type="color" id="editCategoryColor" value="#0066FF" style="width: 50px; height: 40px; border: 1px solid #E8EAED; border-radius: 6px; cursor: pointer;">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea id="editCategoryDescription" class="form-input" placeholder="Description de la catégorie..." style="min-height: 60px; resize: vertical;"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeStockModal('editCategoryModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-primary" onclick="submitCategoryForm('editCategoryForm')">
                <i class="fas fa-save"></i> Enregistrer
            </button>
        </div>
    </div>
</div>

<!-- Delete Category Modal -->
<div class="modal-overlay" id="deleteCategoryModal" onclick="if(event.target === this) closeStockModal('deleteCategoryModal')">
    <div class="modal" style="max-width: 400px;">
        <div class="modal-header">
            <h2 class="modal-title">
                <i class="fas fa-trash"></i>
                Supprimer la Catégorie
            </h2>
            <button class="modal-close" onclick="closeStockModal('deleteCategoryModal')">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <p style="margin: 0; color: #666; font-size: 14px;">
                Êtes-vous sûr de vouloir supprimer la catégorie <strong id="deleteCategoryName">-</strong> ? Cette action est irréversible.
            </p>
            <div style="margin-top: 16px; padding: 12px; background: #FEF3C7; border-radius: 6px; border-left: 4px solid #F39C12;">
                <p style="margin: 0; font-size: 12px; color: #666;">
                    <i class="fas fa-info-circle" style="color: #F39C12; margin-right: 6px;"></i>
                    Les produits de cette catégorie ne seront pas supprimés.
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeStockModal('deleteCategoryModal')">
                <i class="fas fa-times"></i> Annuler
            </button>
            <button class="btn btn-danger" onclick="confirmDeleteCategory()">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </div>
    </div>
</div>

<style>
.btn-danger {
    background: #E74C3C;
    color: white;
}

.btn-danger:hover {
    background: #C0392B;
}

.form-input, .form-select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #E8EAED;
    border-radius: 6px;
    font-size: 13px;
    font-family: inherit;
}

.form-input:focus, .form-select:focus {
    outline: none;
    border-color: #0066FF;
    box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
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
</style>

<script>
// Category Management Functions
function openCategoriesModal() {
    document.getElementById('categoriesModal').classList.add('active');
}

function openAddCategoryModal() {
    document.getElementById('addCategoryForm').reset();
    document.getElementById('selectedIcon').value = '';
    document.getElementById('addCategoryModal').classList.add('active');
}

function openEditCategoryModal(name, icon, color) {
    document.getElementById('editCategoryName').value = name;
    document.getElementById('editCategoryColor').value = color;
    document.getElementById('selectedIconEdit').value = icon;
    document.getElementById('editCategoryModal').classList.add('active');
}

function openDeleteCategoryModal(name) {
    document.getElementById('deleteCategoryName').textContent = name;
    document.getElementById('deleteCategoryModal').classList.add('active');
}

function closeStockModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
}

function selectIcon(element, iconName) {
    // Remove previous selection
    element.parentElement.querySelectorAll('div').forEach(el => {
        el.style.borderColor = '#E8EAED';
        el.style.background = 'transparent';
    });
    
    // Select current
    element.style.borderColor = '#0066FF';
    element.style.background = '#E3F2FD';
    
    // Store selected icon
    if (element.closest('#addCategoryForm')) {
        document.getElementById('selectedIcon').value = iconName;
    } else if (element.closest('#editCategoryForm')) {
        document.getElementById('selectedIconEdit').value = iconName;
    }
}

function submitCategoryForm(formId) {
    const form = document.getElementById(formId);
    if (form.checkValidity()) {
        console.log('Category form submitted:', formId);
        alert('Catégorie enregistrée avec succès!');
        closeStockModal(formId === 'addCategoryForm' ? 'addCategoryModal' : 'editCategoryModal');
    } else {
        alert('Veuillez remplir tous les champs requis.');
    }
}

function confirmDeleteCategory() {
    console.log('Category deleted');
    alert('Catégorie supprimée avec succès!');
    closeStockModal('deleteCategoryModal');
}

// Close modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            modal.classList.remove('active');
        });
    }
});
</script>
