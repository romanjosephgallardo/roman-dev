const isPagesDir = window.location.pathname.includes('/portfolio/pages/');
const assetsBase = isPagesDir ? '../assets' : 'portfolio/assets';
const pagesBase = isPagesDir ? '.' : 'portfolio/pages';
const homeHref = isPagesDir ? '../../index.html' : 'index.html';

function loadHeader() {
    document.getElementById('header-container').innerHTML = `
        <header>
            <img src="${assetsBase}/icons/header_logo.png" alt="Roman Logo" id="headerLogo">
            <nav>
                <ul>
                    <li><a href="${homeHref}"><span id="orangeSlash">/</span>home</a></li>
                    <li><a href="${pagesBase}/page-not-found.html"><span id="orangeSlash">/</span>projects</a></li>
                    <li><a href="${pagesBase}/about-me.html"><span id="orangeSlash">/</span>about_me</a></li>
                    <li><a href="${pagesBase}/page-not-found.html"><span id="orangeSlash">/</span>contact</a></li>
                    <li><a href="${pagesBase}/collaborate.html"><span id="orangeSlash">/</span>collaborate</a></li>
                </ul>
            </nav>
        </header>
    `;
}

function loadFooter() {
    document.getElementById('footer-container').innerHTML = `
        <footer class="footer">
            <div class="footer-logo">
                <img src="${assetsBase}/icons/header_logo.png" alt="Roman Logo" id="headerLogo">
                <p class="tagline">ASPIRING COMPUTER ENGINEER | CREATIVE DEVELOPER | MASHUP ARTIST</p>
            </div>
            <div class="footer-tagline">
                <p>Fueled by passion and caffeine... </p>
            </div>
            <div class="footer-media">
                <h4>Media</h4>
                <div class="social-icons">
                    <a href="https://github.com/romanjosephgallardo" aria-label="GitHub">
                        <img src="${assetsBase}/icons/social-icons/github.png" alt="GitHub">
                    </a>
                    <a href="https://www.instagram.com/romanramonroman" aria-label="Instagram">
                        <img src="${assetsBase}/icons/social-icons/instagram.png" alt="Instagram">
                    </a>
                    <a href="https://www.linkedin.com/in/roman-joseph-gallardo/" aria-label="LinkedIn">
                        <img src="${assetsBase}/icons/social-icons/linked_in.png" alt="LinkedIn">
                    </a>
                    <a href="mailto:romanjosephgallardo01@gmail.com" aria-label="Email">
                        <img src="${assetsBase}/icons/social-icons/email.png" alt="Email">
                    </a>
                </div>
            </div>
        </footer>
    `;
}

document.addEventListener('DOMContentLoaded', () => {
    loadHeader();
    loadFooter();
});