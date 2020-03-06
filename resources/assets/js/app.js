console.log(`I ❤ Fervid!`);

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
    setTimeout(() => pageLoader.classList.add('loaded'), 300);
});

// -----------------------------------------
//             THEME CHANGE
// -----------------------------------------
const checkbox = document.querySelector('#theme-switch');

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
            let date = new Date();
            date.setTime(date.getTime() + (3600 * 1000 * 24 * 365 * 10));
            let expires = 'expires=' + date.toUTCString();
            document.cookie = 'theme=dark;' + expires + ';path=/';
        } else {
            trans();
            document.documentElement.setAttribute('data-theme', 'light');
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
