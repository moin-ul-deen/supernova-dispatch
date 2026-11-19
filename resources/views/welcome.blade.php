@extends('layouts.app')

@section('title', 'Supernova Dispatch — Command Every Mile')

@section('content')
    <!-- 1. Pinned Scroll-Driven Cinematic Hero -->
    @include('partials.hero-cinematic')

    <!-- 2. Trusted Load Boards & Compliance Strip -->
    <section class="trust-strip">
        <div class="sn-container trust-inner">
            <div class="trust-label">Integrated Freight Networks</div>
            <div class="trust-badges">
                <div class="trust-badge"><span>●</span> DAT ONE PRO</div>
                <div class="trust-badge"><span>●</span> TRUCKSTOP.COM</div>
                <div class="trust-badge"><span>●</span> 123LOADBOARD</div>
                <div class="trust-badge"><span>●</span> DIRECT SHIPPER LANES</div>
                <div class="trust-badge"><span>●</span> 48-STATE COVERAGE</div>
            </div>
        </div>
    </section>

    <!-- 3. Core Dispatch Services with Command Visual -->
    <section class="sn-section" id="services">
        <div class="sn-container">
            <div class="section-head">
                <div class="eyebrow">Full-Service Freight Command</div>
                <h2 class="section-title">EVERYTHING YOU NEED TO <span>RUN PROFITABLE.</span></h2>
                <p class="section-desc">We don’t just book loads—we protect your margins, eliminate deadhead miles, and handle every call, packet, and invoice while you stay focused on the road.</p>
            </div>

            <div class="services-split">
                <div class="services-grid">
                    <div class="glass-card">
                        <div class="card-icon">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <h3>Aggressive Rate Negotiation</h3>
                        <p>Dedicated senior dispatchers fight for top-market RPM on every single load—never settling for cheap broker first offers.</p>
                    </div>

                    <div class="glass-card">
                        <div class="card-icon amber">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3>Broker Credit & Packet Setup</h3>
                        <p>Instant credit score verification before booking, complete carrier packet onboarding, and rate-con auditing so you always get paid.</p>
                    </div>

                    <div class="glass-card">
                        <div class="card-icon">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <h3>Detention, Layover & TONU</h3>
                        <p>Your clock is money. We aggressively document check-in/out times and secure detention, layover, and Truck Order Not Used payouts.</p>
                    </div>

                    <div class="glass-card">
                        <div class="card-icon amber">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                        </div>
                        <h3>Factoring & Invoicing Sync</h3>
                        <p>Clean BOL collection, lumper receipt tracking, and direct submission to your factoring company for same-day cash flow.</p>
                    </div>
                </div>

                <div class="services-visual">
                    <img src="{{ asset('assets/images/dispatch-command.webp') }}" alt="Supernova Dispatch Command Cab" class="command-img">
                    <div class="visual-overlay-badge badge-top">
                        <span class="pulse-dot active"></span>
                        <div class="badge-text">
                            <strong>RATE CON LOCKED</strong>
                            <span>$3.45/mi • Midwest Corridor</span>
                        </div>
                    </div>
                    <div class="visual-overlay-badge badge-bottom">
                        <span class="pulse-dot alert"></span>
                        <div class="badge-text">
                            <strong>DETENTION RECOVERED</strong>
                            <span>+$250 • Active 2h 14m</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Equipment Types Visual Cards -->
    <section class="sn-section alt-bg" id="equipment">
        <div class="sn-container">
            <div class="section-head center">
                <div class="eyebrow amber">Specialized Lane Coverage</div>
                <h2 class="section-title">BUILT FOR <span>EVERY TRAILER.</span></h2>
                <p class="section-desc">Custom route planning and dedicated freight desks tailored to your exact equipment specs and preferred home-time schedule.</p>
            </div>

            <div class="equipment-grid">
                <div class="equip-card visual-card">
                    <div class="equip-img-wrap">
                        <img src="{{ asset('assets/images/dry-van.webp') }}" alt="53' Dry Van Trailer" class="equip-img">
                        <div class="equip-badge">53' Standard</div>
                    </div>
                    <div class="equip-body">
                        <h3>Dry Van</h3>
                        <p>High-volume regional and OTR drop-and-hook or live-load freight across major Midwest, South, and East Coast corridors.</p>
                        <div class="equip-rpm">
                            <span>Target RPM</span>
                            <strong>$2.65 – $3.20</strong>
                        </div>
                    </div>
                </div>

                <div class="equip-card visual-card">
                    <div class="equip-img-wrap">
                        <img src="{{ asset('assets/images/reefer.webp') }}" alt="Refrigerated Reefer Trailer" class="equip-img">
                        <div class="equip-badge amber">Temperature Controlled</div>
                    </div>
                    <div class="equip-body">
                        <h3>Reefer</h3>
                        <p>Year-round produce, dairy, pharma, and cold-chain lanes with strict appointment management and detention protection.</p>
                        <div class="equip-rpm">
                            <span>Target RPM</span>
                            <strong>$2.95 – $3.65</strong>
                        </div>
                    </div>
                </div>

                <div class="equip-card visual-card">
                    <div class="equip-img-wrap">
                        <img src="{{ asset('assets/images/flatbed.webp') }}" alt="Flatbed & Step Deck Trailer" class="equip-img">
                        <div class="equip-badge">Open Deck</div>
                    </div>
                    <div class="equip-body">
                        <h3>Flatbed & Step Deck</h3>
                        <p>Steel, machinery, lumber, and industrial freight with partial load stacking to maximize revenue per mile.</p>
                        <div class="equip-rpm">
                            <span>Target RPM</span>
                            <strong>$3.10 – $3.90</strong>
                        </div>
                    </div>
                </div>

                <div class="equip-card visual-card">
                    <div class="equip-img-wrap">
                        <img src="{{ asset('assets/images/box-truck.webp') }}" alt="26' Box Truck" class="equip-img">
                        <div class="equip-badge amber">26' Straight Truck</div>
                    </div>
                    <div class="equip-body">
                        <h3>Box Truck</h3>
                        <p>Dedicated expedited, dock-high, and liftgate local or regional lanes with minimal deadhead turnaround.</p>
                        <div class="equip-rpm">
                            <span>Target RPM</span>
                            <strong>$2.15 – $2.75</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Interactive Weekly Gross & RPM Calculator -->
    <section class="sn-section" id="calculator">
        <div class="sn-container">
            <div class="section-head">
                <div class="eyebrow">Transparent Economics</div>
                <h2 class="section-title">CALCULATE YOUR <span>WEEKLY GROSS.</span></h2>
                <p class="section-desc">Adjust your weekly miles, target rate per mile, and fleet size to estimate your revenue with our flat 5% dispatch fee.</p>
            </div>

            <div class="calc-wrapper">
                <div>
                    <div class="calc-control">
                        <div class="calc-control-top">
                            <label for="calc-miles">Weekly Loaded Miles (Per Truck)</label>
                            <span id="val-miles">2,600 mi</span>
                        </div>
                        <input type="range" id="calc-miles" class="sn-slider" min="1000" max="4000" step="100" value="2600">
                    </div>

                    <div class="calc-control">
                        <div class="calc-control-top">
                            <label for="calc-rpm">Average Rate Per Mile (RPM)</label>
                            <span id="val-rpm">$3.10</span>
                        </div>
                        <input type="range" id="calc-rpm" class="sn-slider" min="1.80" max="4.50" step="0.05" value="3.10">
                    </div>

                    <div class="calc-control" style="margin-bottom: 0;">
                        <div class="calc-control-top">
                            <label for="calc-trucks">Active Trucks in Fleet</label>
                            <span id="val-trucks">1 Truck</span>
                        </div>
                        <input type="range" id="calc-trucks" class="sn-slider" min="1" max="15" step="1" value="1">
                    </div>
                </div>

                <div class="calc-results">
                    <div>
                        <div class="res-row">
                            <span class="res-label">Estimated Weekly Gross</span>
                            <span class="res-val" id="res-gross">$8,060</span>
                        </div>
                        <div class="res-row">
                            <span class="res-label">Supernova Flat Fee (5%)</span>
                            <span class="res-val" id="res-fee">$403</span>
                        </div>
                        <div class="res-row">
                            <span class="res-label">Est. Monthly Net (4.33 wks)</span>
                            <span class="res-val" id="res-monthly">$33,155</span>
                        </div>
                        <div class="res-row" style="padding-top: 18px;">
                            <span class="res-label" style="color: #fff; font-weight: 600;">Your Weekly Take-Home</span>
                            <span class="res-val highlight" id="res-net">$7,657</span>
                        </div>
                    </div>

                    <a href="#onboarding" class="btn-primary" style="text-align: center; margin-top: 20px;">Lock In These Rates</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Interactive High-RPM Active Lanes & Corridor Maps -->
    <section class="sn-section alt-bg" id="lanes">
        <div class="sn-container">
            <div class="section-head center">
                <div class="eyebrow">Market Hotspots</div>
                <h2 class="section-title">ACTIVE HIGH-RPM <span>FREIGHT LANES.</span></h2>
                <p class="section-desc">Select a major US freight region below to view our highest paying active corridors and direct contract loads.</p>
            </div>

            <div class="lanes-interactive">
                <div class="lanes-selector">
                    <button class="lane-tab active" data-region="midwest">
                        <span>Midwest Hub</span>
                        <strong>Avg $3.25/mi</strong>
                    </button>
                    <button class="lane-tab" data-region="southeast">
                        <span>Southeast Corridor</span>
                        <strong>Avg $3.05/mi</strong>
                    </button>
                    <button class="lane-tab" data-region="northeast">
                        <span>Northeast Freight</span>
                        <strong>Avg $3.40/mi</strong>
                    </button>
                    <button class="lane-tab" data-region="west">
                        <span>West Coast Lanes</span>
                        <strong>Avg $2.85/mi</strong>
                    </button>
                </div>

                <div class="lanes-display">
                    <div class="lane-region-content active" id="lane-midwest">
                        <div class="lane-data-card">
                            <div class="lane-route">Chicago, IL ➔ Kansas City, MO</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Dry Van / Reefer</div>
                                <div><span>Current Rate:</span> $3.35/mi</div>
                                <div><span>Avg Payout:</span> $1,710 • 510 mi</div>
                            </div>
                        </div>
                        <div class="lane-data-card">
                            <div class="lane-route">Columbus, OH ➔ Dallas, TX</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Flatbed / Step Deck</div>
                                <div><span>Current Rate:</span> $3.15/mi</div>
                                <div><span>Avg Payout:</span> $3,180 • 1,010 mi</div>
                            </div>
                        </div>
                    </div>

                    <div class="lane-region-content" id="lane-southeast">
                        <div class="lane-data-card">
                            <div class="lane-route">Atlanta, GA ➔ Orlando, FL</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Reefer / Box Truck</div>
                                <div><span>Current Rate:</span> $3.10/mi</div>
                                <div><span>Avg Payout:</span> $1,360 • 438 mi</div>
                            </div>
                        </div>
                        <div class="lane-data-card">
                            <div class="lane-route">Charlotte, NC ➔ Houston, TX</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Dry Van</div>
                                <div><span>Current Rate:</span> $2.95/mi</div>
                                <div><span>Avg Payout:</span> $3,010 • 1,020 mi</div>
                            </div>
                        </div>
                    </div>

                    <div class="lane-region-content" id="lane-northeast">
                        <div class="lane-data-card">
                            <div class="lane-route">Philadelphia, PA ➔ Chicago, IL</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Dry Van / Flatbed</div>
                                <div><span>Current Rate:</span> $3.55/mi</div>
                                <div><span>Avg Payout:</span> $2,730 • 765 mi</div>
                            </div>
                        </div>
                        <div class="lane-data-card">
                            <div class="lane-route">Baltimore, MD ➔ Cleveland, OH</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Reefer</div>
                                <div><span>Current Rate:</span> $3.25/mi</div>
                                <div><span>Avg Payout:</span> $1,215 • 374 mi</div>
                            </div>
                        </div>
                    </div>

                    <div class="lane-region-content" id="lane-west">
                        <div class="lane-data-card">
                            <div class="lane-route">Los Angeles, CA ➔ Phoenix, AZ</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Dry Van / Reefer</div>
                                <div><span>Current Rate:</span> $2.90/mi</div>
                                <div><span>Avg Payout:</span> $1,070 • 370 mi</div>
                            </div>
                        </div>
                        <div class="lane-data-card">
                            <div class="lane-route">Seattle, WA ➔ Salt Lake City, UT</div>
                            <div class="lane-metrics">
                                <div><span>Equipment:</span> Flatbed</div>
                                <div><span>Current Rate:</span> $2.80/mi</div>
                                <div><span>Avg Payout:</span> $2,350 • 840 mi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. 3-Step Onboarding Process -->
    <section class="sn-section" id="process">
        <div class="sn-container">
            <div class="section-head center">
                <div class="eyebrow">Fast 30-Minute Setup</div>
                <h2 class="section-title">FROM PAPERWORK TO <span>LOADED IN 3 STEPS.</span></h2>
                <p class="section-desc">Zero long-term contracts. Start rolling today and judge us strictly by the rates we put on your rate-cons.</p>
            </div>

            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-num">STEP 01</div>
                    <h3>Send Carrier Docs</h3>
                    <p>Share your active MC Authority, W-9, Certificate of Insurance (COI), and Notice of Assignment (if using factoring).</p>
                </div>

                <div class="step-card">
                    <div class="step-num">STEP 02</div>
                    <h3>Meet Your Dispatcher</h3>
                    <p>We assign a dedicated senior dispatcher who maps out your preferred lanes, home-time schedule, and minimum RPM floor.</p>
                </div>

                <div class="step-card">
                    <div class="step-num">STEP 03</div>
                    <h3>Approve Loads & Roll</h3>
                    <p>You approve every single load before booking—100% no forced dispatch. We handle rate-cons, check calls, and billing.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Quick Fleet Setup Form with Fleet-Ready Visual -->
    <section class="sn-section alt-bg" id="onboarding">
        <div class="sn-container setup-grid">
            <div class="setup-visual-col">
                <div class="eyebrow amber">Start Rolling Today</div>
                <h2 class="section-title">GET YOUR FREE <span>FLEET SETUP.</span></h2>
                <p class="section-desc">Submit your details below and a senior Supernova dispatcher will reach out within 15 minutes with live load options in your current area.</p>

                <div class="fleet-image-wrap">
                    <img src="{{ asset('assets/images/fleet-ready.webp') }}" alt="Supernova Ready Fleet Truck" class="fleet-ready-img">
                    <div class="fleet-floating-badge">
                        <span class="active-pulse"></span>
                        <strong>15-MIN RESPONSE</strong>
                    </div>
                </div>

                <ul class="setup-perks">
                    <li><span class="perk-dot"></span> 100% No Forced Dispatch — You Have Final Say</li>
                    <li><span class="perk-dot"></span> Transparent 5% Flat Fee — Zero Hidden Charges</li>
                    <li><span class="perk-dot"></span> Dedicated 24/7 Operations & After-Hours Desk</li>
                    <li><span class="perk-dot"></span> Direct Broker Credit Checks & Fast Factoring Support</li>
                </ul>
            </div>

            <div class="sn-form-box">
                @if(session('setup_success'))
                    <div class="alert-success">
                        {{ session('setup_success') }}
                    </div>
                @endif

                <form action="{{ route('fleet.setup') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name">Full Name *</label>
                            <input type="text" id="full_name" name="full_name" class="sn-input" placeholder="John Miller" required>
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company / Carrier Name</label>
                            <input type="text" id="company_name" name="company_name" class="sn-input" placeholder="Miller Freight LLC">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" class="sn-input" placeholder="+1 (555) 234-5678" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" class="sn-input" placeholder="dispatch@carrier.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="mc_number">MC / DOT Number</label>
                            <input type="text" id="mc_number" name="mc_number" class="sn-input" placeholder="MC-123456">
                        </div>
                        <div class="form-group">
                            <label for="equipment_type">Equipment Type *</label>
                            <select id="equipment_type" name="equipment_type" class="sn-input" required>
                                <option value="Dry Van">53' Dry Van</option>
                                <option value="Reefer">Refrigerated (Reefer)</option>
                                <option value="Flatbed">Flatbed</option>
                                <option value="Step Deck">Step Deck</option>
                                <option value="Box Truck">26' Box Truck</option>
                                <option value="Hotshot">Hotshot</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer; font-size: 1rem;">
                        Request Free Dispatch Consultation
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/hero-cinema.js') }}" defer></script>
@endpush