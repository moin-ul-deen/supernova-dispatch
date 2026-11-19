@extends('layouts.app')

@section('title', 'Dispatch Services & Transparent Pricing — Supernova Dispatch')
@section('meta_description', 'Full-service truck dispatching, rate negotiation, broker credit checks, detention recovery, and back-office billing with a transparent flat fee.')

@section('content')
    <!-- Inner Page Header -->
    <section class="page-hero">
        <div class="sn-container">
            <div class="page-hero-inner">
                <div class="eyebrow">24/7 Dispatch Operations</div>
                <h1 class="page-title">FULL-SPECTRUM <span>FREIGHT COMMAND.</span></h1>
                <p class="section-desc">From hunting top-market spot & contract loads on DAT One and Truckstop to fighting for every dollar of detention, our dispatch desk runs like your in-house operations team.</p>
            </div>
        </div>
    </section>

    <!-- Core Services Breakdown -->
    <section class="sn-section">
        <div class="sn-container">
            <div class="services-split">
                <div class="services-grid">
                    <div class="glass-card">
                        <div class="card-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <h3>Top-Market Rate Negotiation</h3>
                        <p>We analyze live lane-to-truck ratios before calling brokers—securing $0.25–$0.55/mi above standard load board averages.</p>
                    </div>

                    <div class="glass-card">
                        <div class="card-icon amber">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3>Broker Vetting & Packets</h3>
                        <p>Every broker is vetted for credit score and days-to-pay before we sign a single rate confirmation on your behalf.</p>
                    </div>

                    <div class="glass-card">
                        <div class="card-icon">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                        <h3>Detention & TONU Enforcement</h3>
                        <p>We log arrival/departure timestamps and enforce detention, layover, and Truck Order Not Used compensation.</p>
                    </div>

                    <div class="glass-card">
                        <div class="card-icon amber">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                        </div>
                        <h3>Factoring & BOL Billing</h3>
                        <p>We verify signed BOLs, organize lumper receipts, and submit clean packets directly to your factoring company.</p>
                    </div>
                </div>

                <div class="services-visual">
                    <img src="{{ asset('assets/images/dispatch-command.webp') }}" alt="Dispatch Operations Desk" class="command-img">
                    <div class="visual-overlay-badge badge-top">
                        <span class="pulse-dot active"></span>
                        <div class="badge-text">
                            <strong>NO FORCED DISPATCH</strong>
                            <span>100% Driver Load Approval</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transparent Pricing Plans -->
    <section class="sn-section alt-bg" id="pricing">
        <div class="sn-container">
            <div class="section-head center">
                <div class="eyebrow amber">Zero Hidden Fees</div>
                <h2 class="section-title">SIMPLE, TRANSPARENT <span>DISPATCH PLANS.</span></h2>
                <p class="section-desc">No upfront retainers or long-term lock-ins. We only earn when your wheels are turning and generating gross revenue.</p>
            </div>

            <div class="pricing-grid">
                <div class="pricing-card">
                    <div>
                        <div class="eyebrow">Box Truck & Hotshot</div>
                        <h3>Regional & Expedited</h3>
                        <div class="price-rate">6% <span>per booked load</span></div>
                        <p class="section-desc" style="font-size: 0.85rem;">Built for 26' Box Trucks and Hotshot setups running high-turnaround lanes.</p>
                        <ul class="price-list">
                            <li>Dedicated Load Hunter & Route Planner</li>
                            <li>Broker Credit Check & Carrier Packets</li>
                            <li>Detention & Lumper Fee Recovery</li>
                            <li>Same-Day Factoring Packet Submission</li>
                            <li>No Forced Dispatch Guarantee</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-secondary" style="text-align: center;">Start Box Truck Setup</a>
                </div>

                <div class="pricing-card featured">
                    <div>
                        <div class="eyebrow amber">Most Popular • Class 8</div>
                        <h3>Owner-Operator Pro</h3>
                        <div class="price-rate">5% <span>per booked load</span></div>
                        <p class="section-desc" style="font-size: 0.85rem;">Complete 24/7 dispatch command for Dry Van, Reefer, and Flatbed solo operators.</p>
                        <ul class="price-list">
                            <li>Senior Dedicated Dispatcher (Direct Cell)</li>
                            <li>DAT One Pro & Truckstop.com Access</li>
                            <li>Direct Shipper & Contract Lane Bidding</li>
                            <li>Full Back-Office Billing & BOL Auditing</li>
                            <li>24/7 After-Hours Breakdown & Check-Call Desk</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-primary" style="text-align: center;">Get Assigned a Dispatcher</a>
                </div>

                <div class="pricing-card">
                    <div>
                        <div class="eyebrow">3+ Active Trucks</div>
                        <h3>Multi-Truck Fleet</h3>
                        <div class="price-rate">4% <span>per booked load</span></div>
                        <p class="section-desc" style="font-size: 0.85rem;">Volume-discounted enterprise dispatch for growing fleets seeking synchronized lanes.</p>
                        <ul class="price-list">
                            <li>Lead Account Manager + Support Team</li>
                            <li>Multi-Truck Triangle & Backhaul Optimization</li>
                            <li>Weekly Fleet RPM & Lane Profitability Report</li>
                            <li>Priority Access to Direct Dedicated Freight</li>
                            <li>Custom Factoring & Fuel Card Coordination</li>
                        </ul>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-secondary" style="text-align: center;">Request Fleet Quote</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Carrier FAQ -->
    <section class="sn-section">
        <div class="sn-container">
            <div class="section-head center">
                <div class="eyebrow">Carrier Questions</div>
                <h2 class="section-title">FREQUENTLY ASKED <span>QUESTIONS.</span></h2>
            </div>

            <div class="faq-list">
                <div class="faq-item">
                    <h4>Am I ever forced to take a load I don't like?</h4>
                    <p>Never. Supernova Dispatch operates on a strict 100% No Forced Dispatch policy. We negotiate the best options and present the rate, pickup/delivery times, and commodity—you give the final approval before anything is booked.</p>
                </div>
                <div class="faq-item">
                    <h4>How and when do I pay the dispatch fee?</h4>
                    <p>There are zero upfront deposits. Invoices are billed weekly only for completed loads that have been delivered and rate-confirmed.</p>
                </div>
                <div class="faq-item">
                    <h4>What documents do I need to get started today?</h4>
                    <p>You only need an active MC Authority letter, a signed W-9, your Certificate of Insurance (COI) listing $1M Auto / $100K Cargo, and your factoring Notice of Assignment (if applicable).</p>
                </div>
            </div>
        </div>
    </section>
@endsection