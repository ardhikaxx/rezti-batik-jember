/**
 * Reztis Batik Admin Dashboard - Main JavaScript File
 * Contains all the interactive functionality for the admin panel
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components when DOM is fully loaded
    initSidebarToggle();
    initActiveNavLinks();
    initTooltips();
    initPopovers();
    initDataTables();
    initCharts();
    initFormValidations();
    initImageUploadPreviews();
    initNotificationDropdown();
    initBackToTopButton();
});

/**
 * Initialize sidebar toggle functionality for mobile view
 */
function initSidebarToggle() {
    const sidebar = document.querySelector('.sidebar');
    const barsToggle = document.querySelector('.fa-bars.sidebar-toggle');
    const sidebarClose = document.querySelector('.sidebar-toggle .fa-times');
    const overlay = document.querySelector('.sidebar-overlay');
    
    if (barsToggle) {
        barsToggle.addEventListener('click', function() {
            sidebar.classList.add('show');
            overlay.classList.add('active');
        });
    }
    
    if (sidebarClose) {
        sidebarClose.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });
    }
    
    if (overlay) {
        overlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });
    }
}

/**
 * Highlight active navigation links based on current URL
 */
function initActiveNavLinks() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
    
    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href');
        
        // Check if current path starts with the link path (for nested routes)
        if (currentPath.startsWith(linkPath)) {
            link.classList.add('active');
            
            // Also activate parent dropdown if exists
            const parentItem = link.closest('.nav-item');
            if (parentItem) {
                parentItem.classList.add('active');
            }
        }
    });
}

/**
 * Initialize Bootstrap tooltips
 */
function initTooltips() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl, {
            trigger: 'hover'
        });
    });
}

/**
 * Initialize Bootstrap popovers
 */
function initPopovers() {
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
}

/**
 * Initialize DataTables for all tables with the 'data-table' class
 */
function initDataTables() {
    // Check if DataTables is loaded
    if (typeof $.fn.DataTable === 'function') {
        $('.table[data-table]').each(function() {
            const table = $(this);
            const options = {
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari...",
                    paginate: {
                        previous: "<i class='fas fa-chevron-left'></i>",
                        next: "<i class='fas fa-chevron-right'></i>"
                    }
                },
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                     "<'row'<'col-sm-12'tr>>" +
                     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                initComplete: function() {
                    // Add custom class to search input
                    const api = this.api();
                    api.columns().every(function() {
                        const column = this;
                        $('input', this.footer()).on('keyup change', function() {
                            if (column.search() !== this.value) {
                                column.search(this.value).draw();
                            }
                        });
                    });
                }
            };
            
            // Initialize DataTable
            table.DataTable(options);
        });
    }
}

/**
 * Initialize Chart.js charts
 */
function initCharts() {
    // Sales Chart - Already initialized in dashboard view
    
    // Additional chart initializations can be added here
    // Example for other charts:
    const chartElements = document.querySelectorAll('[data-chart]');
    
    chartElements.forEach(chartEl => {
        const chartType = chartEl.getAttribute('data-chart');
        const chartData = JSON.parse(chartEl.getAttribute('data-chart-data'));
        const chartOptions = JSON.parse(chartEl.getAttribute('data-chart-options') || '{}');
        
        new Chart(chartEl, {
            type: chartType,
            data: chartData,
            options: chartOptions
        });
    });
}

/**
 * Initialize form validations
 */
function initFormValidations() {
    // Example: Add Bootstrap validation to forms with 'needs-validation' class
    const forms = document.querySelectorAll('.needs-validation');
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });
    
    // Custom validation for file inputs
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            const feedback = this.nextElementSibling;
            
            if (file) {
                const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                const maxSize = 2 * 1024 * 1024; // 2MB
                
                if (!validTypes.includes(file.type)) {
                    this.setCustomValidity('Hanya file JPG, PNG atau GIF yang diperbolehkan');
                    feedback.textContent = 'Hanya file JPG, PNG atau GIF yang diperbolehkan';
                    feedback.style.display = 'block';
                } else if (file.size > maxSize) {
                    this.setCustomValidity('Ukuran file maksimal 2MB');
                    feedback.textContent = 'Ukuran file maksimal 2MB';
                    feedback.style.display = 'block';
                } else {
                    this.setCustomValidity('');
                    feedback.style.display = 'none';
                }
            }
        });
    });
}

/**
 * Initialize image upload preview functionality
 */
function initImageUploadPreviews() {
    const imageUploads = document.querySelectorAll('.image-upload');
    
    imageUploads.forEach(upload => {
        const input = upload.querySelector('input[type="file"]');
        const preview = upload.querySelector('.image-preview');
        const defaultText = upload.querySelector('.default-text');
        
        if (input && preview) {
            input.addEventListener('change', function() {
                const file = this.files[0];
                
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                        
                        if (defaultText) {
                            defaultText.style.display = 'none';
                        }
                    }
                    
                    reader.readAsDataURL(file);
                }
            });
        }
    });
}

/**
 * Initialize notification dropdown functionality
 */
function initNotificationDropdown() {
    const notificationDropdown = document.querySelector('.dropdown-notifications');
    
    if (notificationDropdown) {
        notificationDropdown.addEventListener('shown.bs.dropdown', function() {
            // Mark notifications as read when dropdown is opened
            fetch('/admin/notifications/mark-as-read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(response => {
                if (response.ok) {
                    const badge = document.querySelector('.notification-badge');
                    if (badge) {
                        badge.remove();
                    }
                }
            });
        });
    }
}

/**
 * Initialize back to top button
 */
function initBackToTopButton() {
    const backToTopButton = document.querySelector('.back-to-top');
    
    if (backToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });
        
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

/**
 * Toggle password visibility in password fields
 */
function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.querySelector(`[data-toggle="${inputId}"] i`);
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

/**
 * Confirm before deleting an item
 * @param {string} message - The confirmation message
 * @returns {boolean} - Whether the user confirmed or not
 */
function confirmDelete(message = 'Apakah Anda yakin ingin menghapus item ini?') {
    return confirm(message);
}

/**
 * Show loading spinner on form submission
 */
function showFormLoading(formId, buttonText = 'Memproses...') {
    const form = document.getElementById(formId);
    const submitButton = form.querySelector('button[type="submit"]');
    
    if (submitButton) {
        submitButton.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            ${buttonText}
        `;
        submitButton.disabled = true;
    }
}

/**
 * Show toast notification
 * @param {string} type - Type of toast (success, error, warning, info)
 * @param {string} message - The message to display
 * @param {string} title - The title of the toast (optional)
 */
function showToast(type, message, title = '') {
    const toastContainer = document.getElementById('toast-container');
    
    if (!toastContainer) {
        console.error('Toast container not found');
        return;
    }
    
    const toastId = 'toast-' + Date.now();
    const toastHtml = `
        <div id="${toastId}" class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${title ? `<strong>${title}</strong><br>` : ''}
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
    
    toastContainer.insertAdjacentHTML('beforeend', toastHtml);
    
    const toastElement = document.getElementById(toastId);
    const toast = new bootstrap.Toast(toastElement, {
        autohide: true,
        delay: 5000
    });
    
    toast.show();
    
    // Remove toast from DOM after it's hidden
    toastElement.addEventListener('hidden.bs.toast', function() {
        toastElement.remove();
    });
}

/**
 * Initialize all date pickers
 */
function initDatePickers() {
    if (typeof flatpickr !== 'undefined') {
        flatpickr('.date-picker', {
            dateFormat: 'Y-m-d',
            allowInput: true,
            locale: 'id'
        });
        
        flatpickr('.datetime-picker', {
            enableTime: true,
            dateFormat: 'Y-m-d H:i',
            allowInput: true,
            locale: 'id'
        });
    }
}

/**
 * Initialize select2 dropdowns
 */
function initSelect2() {
    if (typeof $.fn.select2 === 'function') {
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: '100%',
            placeholder: 'Pilih opsi'
        });
    }
}

/**
 * Initialize summernote editor
 */
function initSummernote() {
    if (typeof $.fn.summernote === 'function') {
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    }
}

/**
 * Format currency input fields
 */
function initCurrencyInputs() {
    $('.currency-input').on('keyup', function() {
        let value = $(this).val().replace(/[^0-9]/g, '');
        value = value ? parseInt(value) : 0;
        $(this).val(new Intl.NumberFormat('id-ID').format(value));
    });
}

/**
 * Initialize all components that need to run after AJAX content load
 */
function initDynamicContent() {
    initTooltips();
    initPopovers();
    initDataTables();
    initDatePickers();
    initSelect2();
    initSummernote();
    initCurrencyInputs();
}

// Export functions for use in other modules if needed
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initSidebarToggle,
        initActiveNavLinks,
        initTooltips,
        initPopovers,
        initDataTables,
        initCharts,
        initFormValidations,
        initImageUploadPreviews,
        initNotificationDropdown,
        initBackToTopButton,
        togglePasswordVisibility,
        confirmDelete,
        showFormLoading,
        showToast,
        initDatePickers,
        initSelect2,
        initSummernote,
        initCurrencyInputs,
        initDynamicContent
    };
}