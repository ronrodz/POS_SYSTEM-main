// DOM Elements
const menuList = document.getElementById('menu-list');
const addMenuItemBtn = document.getElementById('add-menu-item');
const menuItemModal = new bootstrap.Modal(document.getElementById('menuItemModal'));
const saveMenuItemBtn = document.getElementById('save-menu-item');
const adminCredentialsForm = document.getElementById('admin-credentials-form');
const navLinks = document.querySelectorAll('.nav-link[data-section]');
const dropdownItems = document.querySelectorAll('.dropdown-item[data-section]');

// Setup Navigation
function setupNavigation() {
    // Handle main nav links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links and sections
            navLinks.forEach(l => l.classList.remove('active'));
            dropdownItems.forEach(l => l.classList.remove('active'));
            document.querySelectorAll('.section-content').forEach(section => {
                section.classList.remove('active');
            });
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Show corresponding section
            const sectionId = this.getAttribute('data-section');
            if (sectionId) {
                document.getElementById(sectionId).classList.add('active');
            }
        });
    });
    
    // Handle dropdown items
    dropdownItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all links and sections
            navLinks.forEach(l => l.classList.remove('active'));
            dropdownItems.forEach(l => l.classList.remove('active'));
            document.querySelectorAll('.section-content').forEach(section => {
                section.classList.remove('active');
            });
            
            // Add active class to clicked dropdown item
            this.classList.add('active');
            
            // Show corresponding section
            const sectionId = this.getAttribute('data-section');
            if (sectionId) {
                document.getElementById(sectionId).classList.add('active');
            }
        });
    });
}


// Setup Event Listeners
function setupMenuEventListeners() {
    // Add New Menu Item
    addMenuItemBtn.addEventListener('click', () => {
        document.getElementById('item-id').value = '';
        document.getElementById('item-name').value = '';
        document.getElementById('item-category').value = 'main-dishes';
        document.getElementById('item-price').value = '';
        document.getElementById('item-image').value = '';
        menuItemModal.show();
    });

    // Save Menu Item
    saveMenuItemBtn.addEventListener('click', () => {
        const id = document.getElementById('item-id').value;
        const name = document.getElementById('item-name').value;
        const category = document.getElementById('item-category').value;
        const price = parseFloat(document.getElementById('item-price').value);

        if (id) {
            // Edit existing item
            const index = menuItems.findIndex(item => item.id === parseInt(id));
            menuItems[index] = { 
                id: parseInt(id), 
                name, 
                category, 
                price, 
                image: menuItems[index].image 
            };
        } else {
            // Add new item
            const newId = menuItems.length > 0 ? Math.max(...menuItems.map(item => item.id)) + 1 : 1;
            menuItems.push({ 
                id: newId, 
                name, 
                category, 
                price, 
                image: 'img/pancake.jpg' 
            });
        }

        renderMenuItems();
        menuItemModal.hide();
    });

    // Edit Item
    menuList.addEventListener('click', (event) => {
        const editBtn = event.target.closest('.edit-item');
        if (editBtn) {
            const itemId = parseInt(editBtn.getAttribute('data-id'));
            const item = menuItems.find(i => i.id === itemId);

            document.getElementById('item-id').value = item.id;
            document.getElementById('item-name').value = item.name;
            document.getElementById('item-category').value = item.category;
            document.getElementById('item-price').value = item.price;
            
            menuItemModal.show();
        }
    });

    // Delete Item
    menuList.addEventListener('click', (event) => {
        const deleteBtn = event.target.closest('.delete-item');
        if (deleteBtn) {
            const itemId = parseInt(deleteBtn.getAttribute('data-id'));
            menuItems = menuItems.filter(item => item.id !== itemId);
            renderMenuItems();
        }
    });
}
