/**
 * Navigation Module
 * Handles mobile menu, dropdowns, and keyboard navigation
 * 
 * @package _bs
 */

/**
 * Initialize Navigation
 */
export function initNavigation() {
    initMobileMenu();
    initDropdowns();
    initKeyboardNav();
}

/**
 * Mobile Menu Toggle
 * Handles offcanvas or collapse mobile menu
 */
function initMobileMenu() {
    const toggler = document.querySelector('.navbar-toggler');
    const menu = document.querySelector('.navbar-collapse');

    if (!toggler || !menu) return;

    // Close menu on link click (for single page navigation)
    const menuLinks = menu.querySelectorAll('.nav-link:not(.dropdown-toggle)');
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (menu.classList.contains('show')) {
                const bsCollapse = bootstrap.Collapse.getInstance(menu);
                if (bsCollapse) {
                    bsCollapse.hide();
                }
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (menu.classList.contains('show') && !menu.contains(e.target) && !toggler.contains(e.target)) {
            const bsCollapse = bootstrap.Collapse.getInstance(menu);
            if (bsCollapse) {
                bsCollapse.hide();
            }
        }
    });
}

/**
 * Dropdown Menus
 * Enhanced dropdown behavior for WordPress menus
 */
function initDropdowns() {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        // Add hover support for desktop
        const dropdown = toggle.closest('.dropdown');
        if (!dropdown) return;

        // Desktop: show on hover
        if (window.matchMedia('(min-width: 992px)').matches) {
            dropdown.addEventListener('mouseenter', () => {
                toggle.classList.add('show');
                toggle.setAttribute('aria-expanded', 'true');
                dropdown.querySelector('.dropdown-menu')?.classList.add('show');
            });

            dropdown.addEventListener('mouseleave', () => {
                toggle.classList.remove('show');
                toggle.setAttribute('aria-expanded', 'false');
                dropdown.querySelector('.dropdown-menu')?.classList.remove('show');
            });
        }
    });
}

/**
 * Keyboard Navigation
 * Accessibility support for menu navigation
 */
function initKeyboardNav() {
    const nav = document.querySelector('.main-navigation');
    if (!nav) return;

    const menuItems = nav.querySelectorAll('.menu-item > a');

    menuItems.forEach(item => {
        item.addEventListener('keydown', (e) => {
            const menuItem = item.parentElement;
            const isDropdown = menuItem.classList.contains('menu-item-has-children');

            switch (e.key) {
                case 'ArrowDown':
                    if (isDropdown) {
                        e.preventDefault();
                        const dropdown = menuItem.querySelector('.dropdown-menu');
                        if (dropdown) {
                            dropdown.classList.add('show');
                            dropdown.querySelector('a')?.focus();
                        }
                    }
                    break;

                case 'ArrowUp':
                    if (menuItem.closest('.dropdown-menu')) {
                        e.preventDefault();
                        const prevItem = menuItem.previousElementSibling;
                        if (prevItem) {
                            prevItem.querySelector('a')?.focus();
                        } else {
                            menuItem.closest('.dropdown').querySelector('.dropdown-toggle')?.focus();
                        }
                    }
                    break;

                case 'Escape':
                    const openDropdown = menuItem.closest('.dropdown-menu.show');
                    if (openDropdown) {
                        openDropdown.classList.remove('show');
                        openDropdown.closest('.dropdown')?.querySelector('.dropdown-toggle')?.focus();
                    }
                    break;
            }
        });
    });
}

/**
 * Update ARIA attributes
 */
function updateAria(toggle, expanded) {
    toggle.setAttribute('aria-expanded', expanded);
}

// Export for use in main.js
export default { initNavigation };
