console.log(`I ❤ Fervid!`);
window.AOS = require('aos');

// -----------------------------------------
//             PAGE LOADER
// -----------------------------------------

const isIE = () => {
    const ua = navigator.userAgent;
    /* MSIE used to detect old browsers and Trident used to newer ones*/
    return ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
};

if (isIE()) {
    document.querySelector('.preloader').style.display = 'none';
    document.querySelector('.page-loader').style.display = 'none';
}

const links = document.querySelectorAll('.redirect');

for (let i = 0; i < links.length; i++) {
    links[i].addEventListener('click', (e) => {
        e.preventDefault();
        const url = e.target.href;
        preloader.classList.add('show');
        setTimeout(() => {
            window.location.href = url;
        }, 200);
    })
}

const preloader = document.querySelector('.preloader');
const pageLoader = document.querySelector('.page-loader');

document.addEventListener('DOMContentLoaded', () => {
    preloader.classList.remove('show');
    setTimeout(() => pageLoader.classList.add('loaded'), 500);
});

// -----------------------------------------
//             THEME CHANGE
// -----------------------------------------
const checkbox = document.querySelector('#theme-switch');
const logos = document.querySelectorAll('.logo-img');

if (document.body.contains(checkbox)) {
    window.addEventListener('load', () => {
        if (document.cookie.indexOf('theme=dark') >= 0) {
            document.documentElement.setAttribute('data-theme', 'dark');
            checkbox.setAttribute('checked', true);
        } else {
            document.documentElement.setAttribute('data-theme', 'light');
        }
    });

    checkbox.addEventListener('change', (e) => {
        if (e.target.checked) {
            trans();
            document.documentElement.setAttribute('data-theme', 'dark');
            logos.forEach((item) => {
                if (item.classList.contains('light-logo')){
                    item.classList.add('visible');
                }else {
                    item.classList.remove('visible');
                }
            });
            let date = new Date();
            date.setTime(date.getTime() + (3600 * 1000 * 24 * 365 * 10));
            let expires = 'expires=' + date.toUTCString();
            document.cookie = 'theme=dark;' + expires + ';path=/';
        } else {
            trans();
            document.documentElement.setAttribute('data-theme', 'light');
            logos.forEach((item) => {
                if (item.classList.contains('dark-logo')){
                    item.classList.add('visible');
                }else {
                    item.classList.remove('visible');
                }
            });
            let date = new Date();
            date.setTime(date.getTime() + (3600 * 1000 * 24 * 365 * 10));
            let expires = 'expires=' + date.toUTCString();
            document.cookie = 'theme=light;' + expires + ';path=/';
        }
    });

    const trans = () => {
        document.documentElement.classList.add('transition');
        window.setTimeout(() => {
            document.documentElement.classList.remove('transition');
        }, 500)
    };
}

// -----------------------------------------
//             HIDE NAV ON SCROLL
// -----------------------------------------
const nav = document.querySelector('.nav');
const topBtnContainer = document.querySelector('.back-to-top');

window.onscroll = () => scrollFunction();

const scrollFunction = () => {
    if (document.body.scrollTop > nav.offsetHeight || document.documentElement.scrollTop > nav.offsetHeight) {
        nav.classList.add('scrolled');
        topBtnContainer.classList.add('show');
    } else {
        nav.classList.remove('scrolled');
        topBtnContainer.classList.remove('show');
    }
};

// -----------------------------------------
//             MOBILE NAV TOGGLE
// -----------------------------------------
const navOpenBtn = document.querySelector('.navigation-toggle-btn');
const navCloseBtn = document.querySelector('.navigation-links-mobile-header-action-btn');
const mobileNav = document.querySelector('.navigation-links');

const openMobileNav = () => {
    mobileNav.classList.add('active');
    document.body.style.overflowY = 'hidden';
};

const closeMobileNav = () => {
    mobileNav.classList.remove('active');
    document.body.style.overflowY = 'unset';
};

navOpenBtn.addEventListener('click', openMobileNav);
navCloseBtn.addEventListener('click', closeMobileNav);
window.addEventListener('resize', () => {
    if (mobileNav.classList.contains('active') && window.innerWidth > 1100){
        closeMobileNav();
    }
});

// -----------------------------------------
//             ANIMATE ON SCROLL
// -----------------------------------------
AOS.init();

// -----------------------------------------
//             BACK TO TOP
// -----------------------------------------
const top = document.getElementById('to-top');

top.addEventListener('click', () => {
    scrollToTop(350);
});

const scrollToTop = (scrollDuration) => {
    const scrollStep = -window.scrollY / (scrollDuration / 15),
        scrollInterval = setInterval(() => {
            if (window.scrollY !== 0) {
                window.scrollBy(0, scrollStep);
            } else clearInterval(scrollInterval);
        }, 15);
};
