<!-- Cinematic Telemetry Preloader -->
<div id="cinema-loader">
    <div class="loader-ambient"></div>
    <div class="loader-core">
        <div class="loader-logo-wrap">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Supernova Dispatch" class="loader-logo">
            <div class="loader-ring"></div>
        </div>
        <div class="loader-status">
            <span class="loader-brand">SUPERNOVA TELEMETRY</span>
            <span class="loader-pct" id="loader-pct">0%</span>
        </div>
        <div class="loader-bar-track">
            <div class="loader-bar-fill" id="loader-bar"></div>
        </div>
    </div>
</div>
<!-- Pinned Scroll-Driven Hero -->
<section id="hero-cinematic"
    data-desktop-frames="239"
    data-mobile-frames="159"
    data-desktop-path="{{ asset('assets/hero-sequence/desktop') }}"
    data-mobile-path="{{ asset('assets/hero-sequence/mobile') }}">

    <canvas id="hero-canvas"></canvas>
    <div class="hero-vignette"></div>

    <div class="story-stage">
        <!-- SCENE 01 -->
        <div class="story-beat beat-1">
            <div class="beat-inner">
                <div class="eyebrow">Supernova Freight Command</div>
                <h1 class="hero-title">MOVING FREIGHT.<br><span class="highlight">BUILDING TRUST.</span></h1>
                <p class="hero-sub">Precision truck dispatching engineered to keep your wheels turning, your rates climbing, and your back-office effortless.</p>
            </div>
        </div>

        <!-- SCENE 02 -->
        <div class="story-beat beat-2">
            <div class="beat-inner">
                <div class="eyebrow amber">Zero Deadhead Strategy</div>
                <h2 class="hero-title">MAXIMIZE EVERY<br><span class="highlight">LOADED MILE.</span></h2>
                <p class="hero-sub">Dedicated senior dispatchers negotiating high-RPM spot and direct contract freight across all 48 states.</p>
                <div class="hud-row">
                    <div class="hud-card">
                        <div class="hud-value"><span id="stat-ontime">0</span>%</div>
                        <div class="hud-label">On-Time Dispatch</div>
                    </div>
                    <div class="hud-card">
                        <div class="hud-value">$<span>3.15+</span></div>
                        <div class="hud-label">Avg. Target RPM</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCENE 03 -->
        <div class="story-beat beat-3">
            <div class="beat-inner">
                <div class="eyebrow">Real-Time Logistics Grid</div>
                <h2 class="hero-title">DRIVERS. BROKERS.<br><span class="highlight">CONNECTED.</span></h2>
                <p class="hero-sub">Seamless load matching, instant rate-con verification, detention pay recovery, and automated broker credit checks.</p>
            </div>
        </div>

        <svg class="dispatch-svg" id="dispatch-network-svg" viewBox="0 0 460 240" fill="none">
            <path id="route-line" d="M25 195 C 120 185, 165 65, 260 85 C 335 100, 370 35, 435 45" stroke="#00A3FF" stroke-width="3" stroke-linecap="round" stroke-dasharray="600" stroke-dashoffset="600"/>
            <circle cx="25" cy="195" r="7" fill="#00A3FF"/>
            <circle cx="260" cy="85" r="7" fill="#F59E0B"/>
            <circle cx="435" cy="45" r="8" fill="#38BDF8"/>
            <rect x="40" y="160" width="135" height="34" rx="8" fill="rgba(7,11,20,0.8)" stroke="rgba(0,163,255,0.45)"/>
            <text x="54" y="181" fill="#F8FAFC" font-family="JetBrains Mono" font-size="11">ORIGIN LOCKED</text>
            <rect x="285" y="14" width="150" height="34" rx="8" fill="rgba(7,11,20,0.8)" stroke="rgba(56,189,248,0.5)"/>
            <text x="299" y="35" fill="#38BDF8" font-family="JetBrains Mono" font-size="11">RATE CON VERIFIED</text>
        </svg>

        <!-- SCENE 04 -->
        <div class="story-beat beat-4">
            <div class="beat-inner">
                <div class="eyebrow">All-Weather Operations</div>
                <h2 class="hero-title">YOU DRIVE.<br><span class="highlight">WE MANAGE.</span></h2>
                <p class="hero-sub">From IFTA compliance and lumper fees to late-night route rerouting—our operations desk never sleeps.</p>
                <div class="hud-row">
                    <div class="hud-card">
                        <div class="hud-value">No <span>Forced</span></div>
                        <div class="hud-label">100% Driver Control</div>
                    </div>
                    <div class="hud-card">
                        <div class="hud-value">24/<span>7</span></div>
                        <div class="hud-label">Live Ops Support</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCENE 05 -->
        <div class="story-beat beat-5" id="book-call">
            <div class="beat-inner">
                <div class="eyebrow amber">Dry Van • Reefer • Flatbed</div>
                <h2 class="hero-title">LET’S MOVE YOUR<br><span class="highlight">BUSINESS FORWARD.</span></h2>
                <p class="hero-sub">Partner with Supernova Dispatch—built for ambitious owner-operators and growing fleets. No long-term lock-in contracts.</p>
                <div class="cta-group">
                    <a href="#onboarding" class="btn-primary">Get Your Free Fleet Setup</a>
                    <a href="#lanes" class="btn-secondary">Explore Active Lanes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-hud">
        <div class="scroll-cue" id="scroll-cue">
            <div class="scroll-line"></div>
            <span>Scroll to Direct</span>
        </div>
        <div class="progress-track">
            <div class="progress-fill" id="scroll-progress-bar"></div>
        </div>
    </div>
</section>