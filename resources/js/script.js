const logo = document.getElementById('logo');
const subLogo = document.getElementById('sub-logo');
const pawLoader = document.getElementById('paw-loader');
const loadingText = document.getElementById('loading-text');
const logoWrapper = document.querySelector('.logo-wrapper');

// Show only the main logo initially
setTimeout(() => {
    logoWrapper.style.opacity = '1';
}, 500);

// Shrink the main logo after a short delay
setTimeout(() => {
    logo.classList.add('shrink');
}, 2000);

// After the main logo shrinks, show the sub-logo and paw loader
setTimeout(() => {
    subLogo.style.opacity = '1';
    subLogo.classList.add('shrink');
}, 3000);

// Add another delay for showing the paw loader
setTimeout(() => {
    pawLoader.style.opacity = '1';
}, 3500);

// Show the loading text after the paw loader
setTimeout(() => {
    loadingText.style.opacity = '1';
}, 4000);