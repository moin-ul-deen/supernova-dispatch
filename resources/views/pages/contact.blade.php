@extends('layouts.app')

@section('title', 'Carrier Onboarding & Contact — Supernova Dispatch')
@section('meta_description', 'Submit your MC/DOT details and get paired with a dedicated Supernova dispatcher in under 15 minutes.')

@section('content')
    <!-- Inner Page Header -->
    <section class="page-hero">
        <div class="sn-container">
            <div class="page-hero-inner">
                <div class="eyebrow amber">15-Minute Carrier Onboarding</div>
                <h1 class="page-title">GET LOADED <span>TODAY.</span></h1>
                <p class="section-desc">Fill out your fleet profile below or call our 24/7 dispatch desk directly. A senior dispatcher will reach out within 15 minutes with live loads in your current area.</p>
            </div>
        </div>
    </section>

    <!-- Contact Channels + Full Onboarding Form -->
    <section class="sn-section">
        <div class="sn-container setup-grid" style="align-items: start;">
            <!-- Left Column: Direct Desk Info & Checklist -->
            <div class="setup-visual-col">
                <div class="services-grid" style="grid-template-columns: 1fr; margin-bottom: 24px;">
                    <div class="glass-card">
                        <div class="eyebrow" style="margin-bottom: 8px;">24/7 Dispatch Hotline</div>
                        <h3>+1 (800) 555-0199</h3>
                        <p>Direct line for active carriers, broker check calls, and urgent after-hours load support.</p>
                    </div>

                    <div class="glass-card">
                        <div class="eyebrow amber" style="margin-bottom: 8px;">Packets & Billing Desk</div>
                        <h3>dispatch@supernovadispatch.com</h3>
                        <p>Send your MC Authority, W-9, Certificate of Insurance (COI), and Factoring NOA for instant setup.</p>
                    </div>
                </div>

                <div class="fleet-image-wrap">
                    <img src="{{ asset('assets/images/dispatch-command.webp') }}" alt="Supernova Dispatch Desk" class="fleet-ready-img">
                    <div class="fleet-floating-badge">
                        <span class="active-pulse"></span>
                        <strong>DISPATCHERS ONLINE NOW</strong>
                    </div>
                </div>

                <ul class="setup-perks">
                    <li><span class="perk-dot"></span> Active MC Authority & $1M Auto / $100K Cargo Required</li>
                    <li><span class="perk-dot"></span> Same-Day Setup — Start Booking Within 30 Minutes</li>
                    <li><span class="perk-dot"></span> 100% No Forced Dispatch & Weekly Transparent Invoicing</li>
                </ul>
            </div>

            <!-- Right Column: Full Carrier Setup Form -->
            <div class="sn-form-box">
                <div class="eyebrow" style="margin-bottom: 10px;">Carrier Setup Application</div>
                <h3 style="font-size: 1.25rem; margin-bottom: 6px; color: #fff;">Request Your Dedicated Dispatcher</h3>
                <p class="section-desc" style="font-size: 0.85rem; margin-bottom: 20px;">Zero commitment. Tell us what you haul and where you want to run.</p>

                @if(session('setup_success'))
                    <div class="alert-success">
                        {{ session('setup_success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-success" style="background: rgba(239, 68, 68, 0.15); border-color: rgba(239, 68, 68, 0.45); color: #FCA5A5;">
                        Please check the required fields below and try again.
                    </div>
                @endif

                <form action="{{ route('fleet.setup') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name">Full Name *</label>
                            <input type="text" id="full_name" name="full_name" class="sn-input" value="{{ old('full_name') }}" placeholder="John Miller" required>
                        </div>
                        <div class="form-group">
                            <label for="company_name">Company / Carrier Name</label>
                            <input type="text" id="company_name" name="company_name" class="sn-input" value="{{ old('company_name') }}" placeholder="Miller Freight LLC">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" class="sn-input" value="{{ old('phone') }}" placeholder="+1 (555) 234-5678" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" class="sn-input" value="{{ old('email') }}" placeholder="dispatch@carrier.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="mc_number">MC / DOT Number</label>
                            <input type="text" id="mc_number" name="mc_number" class="sn-input" value="{{ old('mc_number') }}" placeholder="MC-123456">
                        </div>
                        <div class="form-group">
                            <label for="equipment_type">Equipment Type *</label>
                            <select id="equipment_type" name="equipment_type" class="sn-input" required>
                                <option value="Dry Van" {{ old('equipment_type') == 'Dry Van' ? 'selected' : '' }}>53' Dry Van</option>
                                <option value="Reefer" {{ old('equipment_type') == 'Reefer' ? 'selected' : '' }}>Refrigerated (Reefer)</option>
                                <option value="Flatbed" {{ old('equipment_type') == 'Flatbed' ? 'selected' : '' }}>Flatbed</option>
                                <option value="Step Deck" {{ old('equipment_type') == 'Step Deck' ? 'selected' : '' }}>Step Deck</option>
                                <option value="Box Truck" {{ old('equipment_type') == 'Box Truck' ? 'selected' : '' }}>26' Box Truck</option>
                                <option value="Hotshot" {{ old('equipment_type') == 'Hotshot' ? 'selected' : '' }}>Hotshot</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="preferred_lanes">Preferred Regions / Home State</label>
                        <input type="text" id="preferred_lanes" name="preferred_lanes" class="sn-input" value="{{ old('preferred_lanes') }}" placeholder="e.g., Midwest to Southeast, Home every weekend in TX">
                    </div>

                    <div class="form-group">
                        <label for="notes">Fleet Size or Additional Notes</label>
                        <textarea id="notes" name="notes" rows="3" class="sn-input" placeholder="Tell us how many trucks you run, factoring company, or target RPM...">{{ old('notes') }}</textarea>
                    </div>

                    <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer; font-size: 0.98rem;">
                        Submit Carrier Profile
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection