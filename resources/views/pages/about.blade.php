@extends('layouts.app')

@section('title', 'About Supernova Dispatch — 24/7 American Freight Command')
@section('meta_description', 'Learn how Supernova Dispatch helps owner-operators and small fleets maximize weekly gross revenue with zero forced dispatch and 24/7 operations support.')

@section('content')
    <!-- Inner Page Header -->
    <section class="page-hero">
        <div class="sn-container">
            <div class="page-hero-inner">
                <div class="eyebrow">Built For American Carriers</div>
                <h1 class="page-title">DISPATCH COMMAND <span>ENGINEERED FOR MARGIN.</span></h1>
                <p class="section-desc">Supernova Dispatch was built to eliminate cheap freight, wasted deadhead miles, and back-office chaos—giving independent owner-operators the same negotiation power as 500-truck fleets.</p>
            </div>

            <div class="stats-bar">
                <div class="stat-box">
                    <strong>$3.18</strong>
                    <span>Avg Network RPM</span>
                </div>
                <div class="stat-box">
                    <strong>48 States</strong>
                    <span>Active Lane Coverage</span>
                </div>
                <div class="stat-box">
                    <strong>&lt; 15 Min</strong>
                    <span>Dispatcher Response Time</span>
                </div>
                <div class="stat-box">
                    <strong>100%</strong>
                    <span>No Forced Dispatch</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Operations Visual -->
    <section class="sn-section">
        <div class="sn-container">
            <div class="services-split">
                <div>
                    <div class="eyebrow amber">How We Operate</div>
                    <h2 class="section-title">YOUR WHEELS TURN. <span>WE HANDLE THE REST.</span></h2>
                    <p class="section-desc" style="margin-bottom: 18px;">Most dispatch services simply refresh public load boards and take the first broker rate offered. At Supernova, every carrier is paired with a dedicated senior dispatcher who pre-plans your reload 24 hours before your current trailer is empty.</p>
                    <p class="section-desc" style="margin-bottom: 24px;">From checking broker credit scores and negotiating detention payouts to submitting clean BOL packets to your factoring company, we protect every dollar you earn on the highway.</p>
                    <a href="{{ route('contact') }}" class="btn-primary">Partner With Our Dispatch Desk</a>
                </div>

                <div class="services-visual">
                    <img src="{{ asset('assets/images/fleet-ready.webp') }}" alt="Supernova Fleet Operations" class="command-img">
                    <div class="visual-overlay-badge badge-top">
                        <span class="pulse-dot active"></span>
                        <div class="badge-text">
                            <strong>24/7 LIVE DESK</strong>
                            <span>Day & Night Operations Support</span>
                        </div>
                    </div>
                    <div class="visual-overlay-badge badge-bottom">
                        <span class="pulse-dot alert"></span>
                        <div class="badge-text">
                            <strong>ZERO LOCK-IN CONTRACTS</strong>
                            <span>Cancel Anytime • Flat Fee Only</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Operating Principles -->
    <section class="sn-section alt-bg">
        <div class="sn-container">
            <div class="section-head center">
                <div class="eyebrow">Our Carrier Standards</div>
                <h2 class="section-title">FOUR PILLARS OF <span>SUPERNOVA DISPATCH.</span></h2>
            </div>

            <div class="services-grid">
                <div class="glass-card">
                    <div class="card-icon">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3>Strict No Forced Dispatch</h3>
                    <p>It is your truck, your authority, and your fuel. You review and approve every rate confirmation before we lock in a single load.</p>
                </div>

                <div class="glass-card">
                    <div class="card-icon amber">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <h3>Transparent Flat-Rate Billing</h3>
                    <p>No hidden setup fees, no percentage games, and no surprise deductions. You see the exact broker rate-con on every shipment.</p>
                </div>

                <div class="glass-card">
                    <div class="card-icon">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <h3>Proactive Reload Planning</h3>
                    <p>We map high-paying outbound and return corridors in advance so you never sit stranded in a dead freight zone over the weekend.</p>
                </div>

                <div class="glass-card">
                    <div class="card-icon amber">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3>1-on-1 Dedicated Dispatcher</h3>
                    <p>No call-center runarounds. You get the direct cell number of a dedicated dispatcher who knows your truck specs and home-time goals.</p>
                </div>
            </div>
        </div>
    </section>
@endsection