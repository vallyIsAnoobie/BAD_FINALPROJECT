// DOM Elements
const logo = document.getElementById('logo');
const subLogo = document.getElementById('sub-logo');
const pawLoader = document.getElementById('paw-loader');
const loadingText = document.getElementById('loading-text');
const logoWrapper = document.querySelector('.logo-wrapper');

// Initial animations for the splash screen
setTimeout(() => {
    logoWrapper.style.opacity = '1';
}, 500);

setTimeout(() => {
    logo.classList.add('shrink');
}, 2000);

setTimeout(() => {
    subLogo.style.opacity = '1';
    subLogo.classList.add('shrink');
}, 3000);

setTimeout(() => {
    pawLoader.style.opacity = '1';
}, 3500);

setTimeout(() => {
    loadingText.style.opacity = '1';
}, 3500);

setTimeout(() => {
    loadingText.style.opacity = '0'; // Fade out
    setTimeout(() => {
        loadingText.textContent = 'Authenticating...'; // Change text after fade-out
        loadingText.style.opacity = '1'; // Fade back in
    }, 500); // Wait for fade-out animation to complete
}, 6000);

setTimeout(() => {
    window.location.href = '/menu'; // Redirect to the login page
}, 7500); // Wait until the animations finish
 