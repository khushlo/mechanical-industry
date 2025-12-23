// Admin Panel JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize sidebar toggle
    initSidebarToggle();
    
    // Initialize form validation
    initFormValidation();
    
    // Initialize image upload
    initImageUpload();
    
    // Initialize tooltips
    initTooltips();
});

// Sidebar toggle functionality
function initSidebarToggle() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth <= 992) {
                if (!sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    }
}

// Form validation
function initFormValidation() {
    const forms = document.querySelectorAll('.needs-validation');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
}

// Image upload functionality
function initImageUpload() {
    const imageUpload = document.querySelector('.image-upload');
    const fileInput = document.querySelector('input[type="file"][accept*="image"]');
    
    if (imageUpload && fileInput) {
        // Drag and drop functionality
        imageUpload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });
        
        imageUpload.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });
        
        imageUpload.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                handleFileSelection(files);
            }
        });
        
        // Click to upload
        imageUpload.addEventListener('click', function() {
            fileInput.click();
        });
        
        // File input change
        fileInput.addEventListener('change', function() {
            handleFileSelection(this.files);
        });
    }
}

// Handle file selection
function handleFileSelection(files) {
    const preview = document.querySelector('.image-preview');
    if (!preview) return;
    
    preview.innerHTML = '';
    
    Array.from(files).forEach(file => {
        if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.className = 'image-preview-item';
                previewItem.innerHTML = `
                    <img src="${e.target.result}" alt="Preview">
                    <button type="button" class="image-preview-remove" onclick="removeImagePreview(this)">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                preview.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        }
    });
}

// Remove image preview
function removeImagePreview(button) {
    const item = button.closest('.image-preview-item');
    if (item) {
        item.remove();
    }
}

// Initialize tooltips
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
}

// Delete confirmation
function confirmDelete(message = 'Are you sure you want to delete this item?') {
    return confirm(message);
}

// Show loading state
function showLoading(button) {
    const originalText = button.innerHTML;
    button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Loading...';
    button.disabled = true;
    
    return function hideLoading() {
        button.innerHTML = originalText;
        button.disabled = false;
    };
}

// AJAX form submission
function submitForm(formElement, callback) {
    const formData = new FormData(formElement);
    const submitBtn = formElement.querySelector('button[type="submit"]');
    const hideLoading = showLoading(submitBtn);
    
    fetch(formElement.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        hideLoading();
        if (callback) callback(data);
    })
    .catch(error => {
        hideLoading();
        console.error('Error:', error);
        showAlert('danger', 'An error occurred. Please try again.');
    });
}

// Show alert message
function showAlert(type, message, container = null) {
    const alertContainer = container || document.querySelector('.content') || document.body;
    
    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show`;
    alert.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Insert at the beginning of the container
    alertContainer.insertBefore(alert, alertContainer.firstChild);
    
    // Auto dismiss after 5 seconds
    setTimeout(() => {
        if (alert.parentNode) {
            const bsAlert = bootstrap.Alert.getInstance(alert);
            if (bsAlert) bsAlert.close();
        }
    }, 5000);
}

// Data table functionality
function initDataTable(tableId) {
    const table = document.getElementById(tableId);
    if (!table) return;
    
    // Add search functionality
    const searchInput = document.querySelector(`[data-table="${tableId}"]`);
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            filterTable(table, this.value);
        });
    }
    
    // Add sorting functionality
    const headers = table.querySelectorAll('th[data-sort]');
    headers.forEach(header => {
        header.style.cursor = 'pointer';
        header.addEventListener('click', function() {
            sortTable(table, this.dataset.sort);
        });
    });
}

// Filter table rows
function filterTable(table, searchTerm) {
    const rows = table.querySelectorAll('tbody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm.toLowerCase())) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Sort table by column
function sortTable(table, column) {
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const columnIndex = Array.from(table.querySelectorAll('th')).findIndex(th => th.dataset.sort === column);
    
    if (columnIndex === -1) return;
    
    const isAscending = !table.dataset.sortOrder || table.dataset.sortOrder === 'desc';
    
    rows.sort((a, b) => {
        const aValue = a.cells[columnIndex].textContent.trim();
        const bValue = b.cells[columnIndex].textContent.trim();
        
        // Try to parse as numbers
        const aNum = parseFloat(aValue);
        const bNum = parseFloat(bValue);
        
        if (!isNaN(aNum) && !isNaN(bNum)) {
            return isAscending ? aNum - bNum : bNum - aNum;
        }
        
        // String comparison
        return isAscending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
    });
    
    // Update table
    rows.forEach(row => tbody.appendChild(row));
    
    // Update sort order
    table.dataset.sortOrder = isAscending ? 'asc' : 'desc';
    
    // Update sort indicators
    table.querySelectorAll('th[data-sort]').forEach(th => {
        th.classList.remove('sorted-asc', 'sorted-desc');
    });
    
    const currentHeader = table.querySelector(`th[data-sort="${column}"]`);
    if (currentHeader) {
        currentHeader.classList.add(isAscending ? 'sorted-asc' : 'sorted-desc');
    }
}

// Export table data
function exportTable(tableId, filename = 'export.csv') {
    const table = document.getElementById(tableId);
    if (!table) return;
    
    const rows = table.querySelectorAll('tr:not([style*="display: none"])');
    const csvData = [];
    
    rows.forEach(row => {
        const cols = row.querySelectorAll('td, th');
        const rowData = Array.from(cols).map(col => {
            return '"' + col.textContent.replace(/"/g, '""') + '"';
        });
        csvData.push(rowData.join(','));
    });
    
    const csvContent = csvData.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const link = document.createElement('a');
    
    link.href = url;
    link.download = filename;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    window.URL.revokeObjectURL(url);
}

// Utility functions
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    });
}

function formatDateTime(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString('en-US', {
        year: 'numeric',
        month: 'short',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

function truncateText(text, maxLength = 100) {
    if (text.length <= maxLength) return text;
    return text.substring(0, maxLength) + '...';
}

// Auto-save functionality
function initAutoSave(formSelector, interval = 30000) {
    const form = document.querySelector(formSelector);
    if (!form) return;
    
    let autoSaveTimer;
    let hasChanges = false;
    
    // Track changes
    form.addEventListener('input', function() {
        hasChanges = true;
        
        // Clear existing timer
        if (autoSaveTimer) {
            clearTimeout(autoSaveTimer);
        }
        
        // Set new timer
        autoSaveTimer = setTimeout(() => {
            if (hasChanges) {
                saveFormData(form);
                hasChanges = false;
            }
        }, interval);
    });
    
    // Save on page unload
    window.addEventListener('beforeunload', function() {
        if (hasChanges) {
            saveFormData(form);
        }
    });
}

function saveFormData(form) {
    const formData = new FormData(form);
    formData.append('auto_save', '1');
    
    fetch(form.action || window.location.href, {
        method: 'POST',
        body: formData
    }).then(response => {
        if (response.ok) {
            showAlert('success', 'Draft saved automatically', form);
        }
    }).catch(error => {
        console.warn('Auto-save failed:', error);
    });
}

// Export functions for global use
window.confirmDelete = confirmDelete;
window.showAlert = showAlert;
window.showLoading = showLoading;
window.submitForm = submitForm;
window.initDataTable = initDataTable;
window.exportTable = exportTable;
window.initAutoSave = initAutoSave;