@extends('layouts.app')

@section('title', 'Supported Fleet Equipment & Target RPMs — Supernova Dispatch')
@section('meta_description', 'Specialized freight dispatching for 53ft Dry Van, Refrigerated Reefer, Flatbed, Step Deck, and 26ft Box Trucks across all 48 US states.')

@section('content')
    <!-- Inner Page Header -->
    <section class="page-hero">
        <div class="sn-container">
            <div class="page-hero-inner">
                <div class="eyebrow amber">48-State Specialized Desks</div>
                <h1 class="page-title">TAILORED LANES FOR <span>YOUR EXACT RIG.</span></h1>
                <p class="section-desc">Every trailer type requires a different freight strategy. Our specialized desks match your equipment specs, weight limits, and preferred regions with high-paying direct and spot loads.</p>
            </div>
        </div>
    </section>

    <!-- Detailed Equipment Breakdown -->
    <section class="sn-section">
        <div class="sn-container">
            <!-- 1. Dry Van -->
            <div class="equip-detail-row" id="dry-van">
                <div class="equip-detail-media">
                    <img src="{{ asset('assets/images/dry-van.webp') }}" alt="53' Dry Van Trailer">
                </div>
                <div>
                    <div class="eyebrow">53' Standard & Air-Ride</div>
                    <h2 class="section-title" style="font-size: clamp(1.4rem, 2.5vw, 1.9rem);">DRY VAN <span>DISPATCH.</span></h2>
                    <p class="section-desc">Consistent year-round freight across consumer goods, retail distribution, automotive parts, and packaged food corridors—minimizing empty miles between reloads.</p>
                    <div class="spec-pills">
                        <div class="spec-pill">
                            <span>Target RPM</span>
                            <strong>$2.65 – $3.20</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Max Payload</span>
                            <strong>45,000 lbs</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Top Corridors</span>
                            <strong>IL • TX • PA • GA</strong>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-primary">Book Dry Van Loads</a>
                </div>
            </div>

            <!-- 2. Reefer -->
            <div class="equip-detail-row reverse" id="reefer">
                <div class="equip-detail-media">
                    <img src="{{ asset('assets/images/reefer.webp') }}" alt="Refrigerated Reefer Trailer">
                </div>
                <div>
                    <div class="eyebrow amber">Temperature-Controlled</div>
                    <h2 class="section-title" style="font-size: clamp(1.4rem, 2.5vw, 1.9rem);">REEFER <span>DISPATCH.</span></h2>
                    <p class="section-desc">High-margin produce, frozen protein, dairy, and pharmaceutical lanes with strict dock-appointment tracking and aggressive detention protection at cold-storage facilities.</p>
                    <div class="spec-pills">
                        <div class="spec-pill">
                            <span>Target RPM</span>
                            <strong>$2.95 – $3.65</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Temp Range</span>
                            <strong>-20°F to +70°F</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Top Corridors</span>
                            <strong>CA • FL • WI • WA</strong>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-primary">Book Reefer Loads</a>
                </div>
            </div>

            <!-- 3. Flatbed & Step Deck -->
            <div class="equip-detail-row" id="flatbed">
                <div class="equip-detail-media">
                    <img src="{{ asset('assets/images/flatbed.webp') }}" alt="Flatbed and Step Deck Trailer">
                </div>
                <div>
                    <div class="eyebrow">Open Deck & Heavy Haul</div>
                    <h2 class="section-title" style="font-size: clamp(1.4rem, 2.5vw, 1.9rem);">FLATBED & <span>STEP DECK.</span></h2>
                    <p class="section-desc">Industrial steel coils, heavy machinery, building materials, and oversized freight—plus strategic LTL partial stacking to boost your per-mile gross.</p>
                    <div class="spec-pills">
                        <div class="spec-pill">
                            <span>Target RPM</span>
                            <strong>$3.10 – $3.90</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Max Payload</span>
                            <strong>48,000 lbs</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Top Corridors</span>
                            <strong>OH • IN • AL • TX</strong>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-primary">Book Flatbed Loads</a>
                </div>
            </div>

            <!-- 4. 26' Box Truck -->
            <div class="equip-detail-row reverse" id="box-truck">
                <div class="equip-detail-media">
                    <img src="{{ asset('assets/images/box-truck.webp') }}" alt="26' Straight Box Truck">
                </div>
                <div>
                    <div class="eyebrow amber">26' Dock-High & Liftgate</div>
                    <h2 class="section-title" style="font-size: clamp(1.4rem, 2.5vw, 1.9rem);">BOX TRUCK <span>DISPATCH.</span></h2>
                    <p class="section-desc">Fast-turnaround regional freight, commercial pallet deliveries, and expedited runs designed to keep non-CDL and Class B straight trucks profitable every single week.</p>
                    <div class="spec-pills">
                        <div class="spec-pill">
                            <span>Target RPM</span>
                            <strong>$2.15 – $2.75</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Capacity</span>
                            <strong>12–14 Pallets</strong>
                        </div>
                        <div class="spec-pill">
                            <span>Top Corridors</span>
                            <strong>NJ • NC • IL • FL</strong>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-primary">Book Box Truck Loads</a>
                </div>
            </div>
        </div>
    </section>
@endsection