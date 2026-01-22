/**
 * _bs Theme Main JavaScript
 * 
 * @package _bs
 */

// Import Bootstrap JS
import * as bootstrap from 'bootstrap';

// Import theme modules
import { initNavigation } from './navigation.js';

// Make Bootstrap available globally if needed
window.bootstrap = bootstrap;

/**
 * DOM Ready
 */
document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initScrollEffects();
    initBackToTop();
});

/**
 * Scroll Effects
 * Add 'scrolled' class to header on scroll
 */
function initScrollEffects() {
    const header = document.querySelector('.site-header');
    if (!header) return;

    const scrollThreshold = 50;

    const updateHeader = () => {
        if (window.scrollY > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    };

    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader(); // Check on load
}

/**
 * Back to Top Button
 */
function initBackToTop() {
    const btn = document.querySelector('.back-to-top');
    if (!btn) return;

    const showThreshold = 300;

    const toggleVisibility = () => {
        if (window.scrollY > showThreshold) {
            btn.classList.add('visible');
        } else {
            btn.classList.remove('visible');
        }
    };

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    window.addEventListener('scroll', toggleVisibility, { passive: true });
    toggleVisibility(); // Check on load
}

/**
 * Smooth scroll for anchor links
 */
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
