@php
    $isDark = true;
    if ( !empty($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark' ) {
        $isDark = true;
    } else if ( !empty($_COOKIE['theme']) && $_COOKIE['theme'] == 'light' ) {
        $isDark = false;
    } else if ( empty($_COOKIE['theme']) ) {
        $isDark = false;
        Cookie::make('theme', 'dark');
    }
@endphp
    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ $isDark ? 'dark' : 'light' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Fervid') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
@php
    $facebook = \Charlotte\Administration\Helpers\Settings::get('facebook');
    $instagram = \Charlotte\Administration\Helpers\Settings::get('instagram');
    $linkedin = \Charlotte\Administration\Helpers\Settings::get('linkedin');
    $logo_light = \Charlotte\Administration\Helpers\Settings::getFile('logo_light');
    $logo_dark = \Charlotte\Administration\Helpers\Settings::getFile('logo_dark');
    $brand_logo = \Charlotte\Administration\Helpers\Settings::getFile('brand_logo');
@endphp
<div class="preloader"></div>

<div class="page-loader">
    <div class="page-loader-item">
        <img src="{{$logo_light ? $logo_light : '/img/fervid_logo_light.svg'}}"
             alt="{{ config('app.name', 'Fervid') }}"
             class="load-img logo-img light-logo {{ $isDark ? 'visible' : '' }}">
        <img src="{{$logo_dark ? $logo_dark : '/img/fervid_logo_dark.svg'}}"
             alt="{{ config('app.name', 'Fervid') }}"
             class="load-img logo-img dark-logo {{ !$isDark ? 'visible' : '' }}">
    </div>
</div>

<nav class="nav">
    <div class="container">
        <div class="navigation">
            <div class="navigation-logo">
                <img src="{{$logo_light ? $logo_light : '/img/fervid_logo_light.svg'}}"
                     alt="{{ config('app.name', 'Fervid') }}"
                     class="navigation-logo-img logo-img light-logo {{ $isDark ? 'visible' : '' }}">
                <img src="{{$logo_dark ? $logo_dark : '/img/fervid_logo_dark.svg'}}"
                     alt="{{ config('app.name', 'Fervid') }}"
                     class="navigation-logo-img logo-img dark-logo {{ !$isDark ? 'visible' : '' }}">
            </div>
            <div class="navigation-toggle">
                <button class="navigation-toggle-btn">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </button>
            </div>
            <div class="navigation-links">
                <div class="navigation-links-mobile-header">
                    <div class="navigation-links-mobile-header-logo">
                        <img src="{{$logo_light ? $logo_light : '/img/fervid_logo_light.svg'}}"
                             alt="{{ config('app.name', 'Fervid') }}"
                             class="navigation-links-mobile-header-logo-img logo-img light-logo {{ $isDark ? 'visible' : '' }}">
                        <img src="{{$logo_dark ? $logo_dark : '/img/fervid_logo_dark.svg'}}"
                             alt="{{ config('app.name', 'Fervid') }}"
                             class="navigation-links-mobile-header-logo-img logo-img dark-logo {{ !$isDark ? 'visible' : '' }}">
                    </div>
                    <div class="navigation-links-mobile-header-action">
                        <button class="navigation-links-mobile-header-action-btn">
                            <i class="material-icons-outlined">
                                close
                            </i>
                        </button>
                    </div>
                </div>
                <ul class="navigation-links-list">
                    <li class="navigation-links-list-item">
                        <a href="{{ url('/projects') }}"
                           class="redirect {{Route::currentRouteName() == 'projects.index' ? 'active' : ''}}">Projects</a>
                    </li>
                    <li class="navigation-links-list-item">
                        <a href="{{ url('/services') }}"
                           class="redirect {{Route::currentRouteName() == 'services.index' ? 'active' : ''}}">Services</a>
                    </li>
                    <li class="navigation-links-list-item">
                        <a href="{{ url('/development-land') }}"
                           class="redirect {{Route::currentRouteName() == 'development.index' ? 'active' : ''}}">Development & Land</a>
                    </li>
                    <li class="navigation-links-list-item">
                        <a href="{{ url('/finance-funding') }}"
                           class="redirect {{Route::currentRouteName() == 'finance.index' ? 'active' : ''}}">Finance & Funding</a>
                    </li>
                    <li class="navigation-links-list-item">
                        <a href="{{ url('/about') }}"
                           class="redirect {{Route::currentRouteName() == 'about.index' ? 'active' : ''}}">About</a>
                    </li>
                    <li class="navigation-links-list-item">
                        <a href="{{ url('/contact') }}"
                           class="redirect {{Route::currentRouteName() == 'contact.index' ? 'active' : ''}}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="content">
    <div class="container">
        @yield('content')
    </div>
</div>

<div class="back-to-top">
    <button id="to-top">
        <i class="material-icons-outlined">keyboard_arrow_up</i>
    </button>
</div>

<div class="theme">
    <input type="checkbox" id="theme-switch"/>
    <label for="theme-switch" class="theme-label">
        <div class="theme-label-inner">
            <i class="material-icons-outlined theme-icon light-mode">
                wb_sunny
            </i>
            <i class="material-icons-outlined theme-icon dark-mode">
                nights_stay
            </i>
        </div>
    </label>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-logo">
            <div class="footer-logo-img">
                <img src="{{$logo_light ? $logo_light : '/img/fervid_logo_light.svg'}}" alt="{{ config('app.name', 'Fervid') }}">
            </div>
            <div class="footer-logo-brand">
                <img src="{{$brand_logo ? $brand_logo : '/img/fervid_text_logo.svg'}}" alt="{{ config('app.name', 'Fervid') }}">
            </div>
        </div>
        <div class="footer-links">
            <ul class="footer-links-list">
                <li class="footer-links-list-item">
                    <a href="{{ url('/projects') }}"
                       class="redirect {{Route::currentRouteName() == 'projects.index' ? 'active' : ''}}">Projects</a>
                </li>
                <li class="footer-links-list-item">
                    <a href="{{ url('/services') }}"
                       class="redirect {{Route::currentRouteName() == 'services.index' ? 'active' : ''}}">Services</a>
                </li>
                <li class="footer-links-list-item">
                    <a href="{{ url('/development-land') }}"
                       class="redirect {{Route::currentRouteName() == 'services.index' ? 'active' : ''}}">Development & Land</a>
                </li>
                <li class="footer-links-list-item">
                    <a href="{{ url('/finance-funding') }}"
                       class="redirect {{Route::currentRouteName() == 'services.index' ? 'active' : ''}}">Finance & Funding</a>
                </li>
                <li class="footer-links-list-item">
                    <a href="{{ url('/about') }}"
                       class="redirect {{Route::currentRouteName() == 'services.index' ? 'active' : ''}}">About</a>
                </li>
                <li class="footer-links-list-item">
                    <a href="{{ url('/contact') }}"
                       class="redirect {{Route::currentRouteName() == 'services.index' ? 'active' : ''}}">Contact</a>
                </li>
            </ul>
        </div>
        <div class="footer-social">
            @if($instagram)
                <div class="footer-social-item">
                    <a href="{{$instagram}}">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            @endif
            @if($facebook)
                <div class="footer-social-item">
                    <a href="{{$facebook}}">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                </div>
            @endif
            @if($linkedin)
                <div class="footer-social-item">
                    <a href="{{$linkedin}}">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            @endif
        </div>
        <div class="footer-copyright">
            <div class="footer-copyright-created">
                Created By &copy; Charlotte Web Solutions | {{ date('Y') }}
            </div>
        </div>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
