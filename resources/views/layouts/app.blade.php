<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Supernova Dispatch — Command Every Mile')</title>
    <meta name="description" content="@yield('meta_description', '24/7 American freight dispatch command for Dry Van, Reefer, Flatbed, and Box Truck carriers across all 48 states.')">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/hero-cinema.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site-theme.css') }}">
    @stack('styles')

    <!-- Core Animation Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
    <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js" defer></script>
</head>
<body class="{{ request()->routeIs('home') ? 'home-page' : 'inner-page' }}">

    <!-- Sticky Glass Top Navigation -->
    <header class="top-nav">
        <a href="{{ route('home') }}" class="nav-logo" aria-label="Supernova Dispatch Home">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Supernova Dispatch Logo">
        </a>

        <nav class="nav-links" aria-label="Main Navigation">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
            <a href="{{ route('reviews') }}" class="{{ request()->routeIs('reviews') ? 'active' : '' }}">Reviews</a>
            <a href="{{ route('equipment') }}" class="{{ request()->routeIs('equipment') ? 'active' : '' }}">Equipment</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </nav>

        <div class="nav-actions">
            <a href="{{ route('contact') }}" class="btn-nav">Start Dispatching</a>
            <button type="button" class="mobile-menu-btn" id="mobile-menu-toggle" aria-label="Toggle Menu">☰</button>
        </div>
    </header>

    <!-- Fullscreen Mobile Menu Drawer -->
    <div class="mobile-drawer" id="mobile-nav-drawer">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>        
        <a href="{{ route('services') }}">Services</a>
        <a href="{{ route('reviews') }}">Reviews</a>
        <a href="{{ route('equipment') }}">Equipment</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="{{ route('contact') }}" class="btn-primary">Get Free Fleet Setup</a>
    </div>

    <main>
        @yield('content')
    </main>

    <!-- Global Logistics Footer -->
    <footer class="sn-footer">
        <div class="sn-container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Supernova Dispatch">
                    <p>24/7 American freight dispatch command built for ambitious owner-operators and growing fleets across all 48 states.</p>
                </div>

                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Supernova</a></li>
                        <li><a href="{{ route('services') }}">Dispatch Services</a></li>
                        <li><a href="{{ route('reviews') }}">Reviews</a></li>
                        <li><a href="{{ route('equipment') }}">Fleet Equipment</a></li>
                        <li><a href="{{ route('contact') }}">Carrier Onboarding</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Equipment</h4>
                    <ul>
                        <li><a href="{{ route('equipment') }}#dry-van">53' Dry Van</a></li>
                        <li><a href="{{ route('equipment') }}#reefer">Refrigerated (Reefer)</a></li>
                        <li><a href="{{ route('equipment') }}#flatbed">Flatbed & Step Deck</a></li>
                        <li><a href="{{ route('equipment') }}#box-truck">26' Box Trucks</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Operations Desk</h4>
                    <ul>
                        <li><a href="tel:+18005550199">+1 (800) 555-0199</a></li>
                        <li><a href="mailto:dispatch@supernovadispatch.com">dispatch@supernovadispatch.com</a></li>
                        <li><span>Active 24/7 • All 48 Lower States</span></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <span>&copy; {{ date('Y') }} Supernova Dispatch LLC. All rights reserved.</span>
                <span>No Forced Dispatch • Transparent Flat Fee</span>
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/js/site-interactions.js') }}" defer></script>
    @stack('scripts')
</body>
</html>