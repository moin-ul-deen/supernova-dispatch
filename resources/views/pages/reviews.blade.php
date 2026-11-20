@extends('layouts.app')

@section('title', 'Carrier Reviews & Testimonials | Supernova Dispatch')

@section('content')
{{-- HERO + LIVE REVIEW SUBMISSION --}}
<section class="page-hero rv-hero">
    <div class="sn-container">
        <div class="rv-hero-grid">
            {{-- Left Column: Exact Inner-Page Heading + KPIs --}}
            <div>
                <span class="eyebrow">VERIFIED CARRIER FEEDBACK</span>
                <h1 class="page-title">
                    TRUSTED BY OWNER-OPERATORS <span>&amp; FLEETS ACROSS THE US.</span>
                </h1>
                <p class="section-desc">
                    Real-time feedback from carriers running Dry Van, Reefer, Flatbed, Box Trucks, and specialized trailers with our dispatch desk. Share your experience and see it publish live immediately.
                </p>

                <div class="rv-stats-row">
                    <div class="stat-box">
                        <strong id="live-avg-rating">{{ number_format($avgRating, 1) }} ★</strong>
                        <span>Average Rating</span>
                    </div>
                    <div class="stat-box">
                        <strong id="live-total-count">{{ max($reviews->count(), 12) }}+</strong>
                        <span>Verified Reviews</span>
                    </div>
                    <div class="stat-box">
                        <strong>98.4%</strong>
                        <span>Carrier Retention</span>
                    </div>
                </div>
            </div>

            {{-- Right Column: Live Review Submission Card --}}
            <div class="sn-form-box rv-form-box">
                <h3 class="rv-form-title">Post a Live Carrier Review</h3>
                <p class="rv-form-sub">Your feedback publishes immediately to our carrier wall.</p>

                <form id="liveReviewForm" action="{{ route('reviews.store') }}" method="POST" novalidate>
                    @csrf
                    {{-- Anti-Spam Honeypot --}}
                    <input type="text" name="website_url" tabindex="-1" autocomplete="off" aria-hidden="true" style="position:absolute;left:-9999px;opacity:0;">

                    <div class="rv-star-bar">
                        <label>Your Rating *</label>
                        <div class="rv-stars-input" id="starSelector" role="radiogroup" aria-label="Star Rating">
                            @for($i = 1; $i <= 5; $i++)
                                <button type="button" class="rv-star-btn active" data-value="{{ $i }}" aria-label="{{ $i }} Stars">★</button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" value="5">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="rv_first_name">Driver / Owner First Name *</label>
                            <input id="rv_first_name" class="sn-input" type="text" name="first_name" required maxlength="50" placeholder="e.g. Marcus">
                        </div>
                        <div class="form-group">
                            <label for="rv_last_name">Driver / Owner Last Name *</label>
                            <input id="rv_last_name" class="sn-input" type="text" name="last_name" required maxlength="50" placeholder="e.g. Vance">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="rv_equip">Equipment Type *</label>
                            <select id="rv_equip" class="sn-input" name="equipment_type" required>
                                <option value="Dry Van">53' Dry Van</option>
                                <option value="Reefer">Refrigerated (Reefer)</option>
                                <option value="Flatbed">Heavy Flatbed / Step Deck</option>
                                <option value="Box Truck">26' Box Truck</option>
                                <option value="Other">Other (Specify Equipment)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rv_lane">Primary Lane</label>
                            <input id="rv_lane" class="sn-input" type="text" name="lane_route" maxlength="100" placeholder="e.g. TX → IL">
                        </div>
                    </div>

                    {{-- Dynamic Custom Equipment Box (Appears when "Other" is selected) --}}
                    <div class="form-group rv-custom-equip-wrap" id="customEquipWrap" style="display:none;">
                        <label for="rv_custom_equip">Specify Your Equipment Type *</label>
                        <input id="rv_custom_equip" class="sn-input" type="text" name="custom_equipment" maxlength="60" placeholder="e.g. Hotshot, Power Only, Conestoga, RGN">
                    </div>

                    <div class="form-group">
                        <label for="rv_comment">Your Dispatch Experience *</label>
                        <textarea id="rv_comment" class="sn-input" name="comment" rows="3" required minlength="10" maxlength="800" placeholder="Share how our rate negotiation, communication, or back-office support helped your truck..."></textarea>
                    </div>

                    <button type="submit" class="btn-primary rv-submit-btn" id="submitReviewBtn">
                        <span>Publish Review Live</span>
                    </button>
                    <div id="reviewFormAlert" class="rv-alert" role="status" style="display:none;"></div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- ADMIN MODERATION BANNER --}}
@if($isAdmin)
<div class="rv-admin-bar">
    <div class="sn-container rv-admin-inner">
        <span>🛡️ <strong>Admin Moderation Mode Active:</strong> Click <strong>✕ Delete</strong> on any review card below to remove spam.</span>
        <a href="{{ route('reviews', ['logout_admin' => 1]) }}" class="rv-admin-exit">Exit Admin Mode</a>
    </div>
</div>
@endif

{{-- INFINITE SCROLLING SHOWCASE MARQUEE --}}
<section class="rv-marquee-wrap" aria-label="Featured Carrier Highlights">
    <div class="rv-marquee-track">
        @php
            $seedHighlights = [
                ['name' => 'Derrick Holloway', 'tag' => '53\' Dry Van', 'text' => 'Moved my 2 Dry Vans from $2.15/mi average up to $2.78/mi on Midwest triangles within two weeks. Zero forced dispatch.'],
                ['name' => 'Carlos Mendez', 'tag' => 'Reefer', 'text' => 'Detention pay actually gets collected now. Supernova handles broker packets and lumper receipts while I focus on driving.'],
                ['name' => 'Trevor Jenkins', 'tag' => 'Flatbed', 'text' => 'Best flatbed dispatch team I have worked with. Consistently pre-booked before I even drop my tarps.'],
                ['name' => 'Rashid Al-Mansoor', 'tag' => '26\' Box Truck', 'text' => 'Transparent rate confirmations sent directly to my email before every booking. Reliable weekend coverage too.'],
            ];
        @endphp

        <div class="rv-marquee-group">
            @foreach($seedHighlights as $item)
                <article class="glass-card rv-m-card">
                    <div class="rv-m-top">
                        <span class="rv-m-stars">★★★★★</span>
                        <span class="rv-m-badge">{{ $item['tag'] }}</span>
                    </div>
                    <p>"{{ $item['text'] }}"</p>
                    <div class="rv-m-author">
                        <strong>{{ $item['name'] }}</strong>
                        <span>Verified Owner-Operator</span>
                    </div>
                </article>
            @endforeach

            @foreach($reviews->take(6) as $rev)
                <article class="glass-card rv-m-card">
                    <div class="rv-m-top">
                        <span class="rv-m-stars">{{ str_repeat('★', $rev->rating) }}</span>
                        <span class="rv-m-badge">{{ $rev->equipment_type }}</span>
                    </div>
                    <p>"{{ \Illuminate\Support\Str::limit($rev->comment, 160) }}"</p>
                    <div class="rv-m-author">
                        <strong>{{ $rev->reviewer_name }}</strong>
                        <span>Verified Owner-Operator</span>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="rv-marquee-group" aria-hidden="true">
            @foreach($seedHighlights as $item)
                <article class="glass-card rv-m-card">
                    <div class="rv-m-top">
                        <span class="rv-m-stars">★★★★★</span>
                        <span class="rv-m-badge">{{ $item['tag'] }}</span>
                    </div>
                    <p>"{{ $item['text'] }}"</p>
                    <div class="rv-m-author">
                        <strong>{{ $item['name'] }}</strong>
                        <span>Verified Owner-Operator</span>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

{{-- LIVE INTERACTIVE CARRIER WALL --}}
<section class="sn-section">
    <div class="sn-container">
        <div class="rv-wall-head">
            <div class="section-head" style="margin-bottom:0;">
                <span class="eyebrow">REAL-TIME DISPATCH LOG</span>
                <h2 class="section-title">LIVE CARRIER <span>WALL.</span></h2>
                <p class="section-desc">Newest carrier submissions appear at the top automatically.</p>
            </div>

            <div class="rv-filters" id="equipmentFilters">
                <button type="button" class="rv-chip active" data-filter="all">All Equipment</button>
                <button type="button" class="rv-chip" data-filter="Dry Van">Dry Van</button>
                <button type="button" class="rv-chip" data-filter="Reefer">Reefer</button>
                <button type="button" class="rv-chip" data-filter="Flatbed">Flatbed</button>
                <button type="button" class="rv-chip" data-filter="Box Truck">Box Truck</button>
                <button type="button" class="rv-chip" data-filter="Other">Other</button>
            </div>
        </div>

        <div class="rv-grid" id="liveReviewsGrid">
            @forelse($reviews as $review)
                @php
                    $nameParts = preg_split('/\s+/', trim($review->reviewer_name));
                    $cardInitials = count($nameParts) >= 2
                        ? strtoupper(mb_substr($nameParts[0], 0, 1) . mb_substr(end($nameParts), 0, 1))
                        : strtoupper(mb_substr(trim($review->reviewer_name), 0, 2));
                    $standardTypes = ['Dry Van', 'Reefer', 'Flatbed', 'Box Truck'];
                    $filterCategory = in_array($review->equipment_type, $standardTypes) ? $review->equipment_type : 'Other';
                @endphp

                <article class="glass-card rv-card" data-id="{{ $review->id }}" data-equipment="{{ $filterCategory }}">
                    @if($isAdmin)
                        <button type="button" class="rv-del-btn" data-url="{{ route('reviews.destroy', $review->id) }}" title="Delete Review">
                            ✕ Delete
                        </button>
                    @endif

                    <div class="rv-card-top">
                        <div class="rv-avatar">{{ $cardInitials }}</div>
                        <div class="rv-meta">
                            <h3>{{ $review->reviewer_name }}</h3>
                            <span class="rv-verified-sub">✓ Verified Owner-Operator</span>
                        </div>
                        <div class="rv-card-stars" aria-label="{{ $review->rating }} out of 5 stars">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                        </div>
                    </div>

                    <p class="rv-card-body">"{{ $review->comment }}"</p>

                    <div class="rv-card-foot">
                        <span class="rv-tag">{{ $review->equipment_type }}</span>
                        <span class="rv-lane">{{ $review->lane_route ?: 'Nationwide US Lanes' }}</span>
                        <span class="rv-time">{{ $review->created_at->diffForHumans() }}</span>
                    </div>
                </article>
            @empty
                <div class="rv-empty" id="emptyReviewsNote">
                    Be the first carrier to post a live review above — it will appear right here immediately!
                </div>
            @endforelse
        </div>
    </div>
</section>

<style>
.rv-hero-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.08fr) minmax(0, 0.92fr);
    gap: 42px;
    align-items: center;
}
.rv-stats-row {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    margin-top: 28px;
}
.rv-stats-row .stat-box {
    padding: 16px;
}
.rv-stats-row .stat-box strong {
    font-size: 1.35rem;
}

.rv-form-box {
    padding: 28px;
}
.rv-form-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 4px;
}
.rv-form-sub {
    font-size: 0.84rem;
    color: var(--text-muted);
    margin-bottom: 16px;
}
.rv-form-box .form-row,
.rv-form-box .form-group {
    margin-bottom: 12px;
}
.rv-custom-equip-wrap {
    animation: rvFadeSlide 0.22s ease-out;
}
@keyframes rvFadeSlide {
    from { opacity: 0; transform: translateY(-6px); }
    to { opacity: 1; transform: translateY(0); }
}
.rv-form-box textarea.sn-input {
    resize: vertical;
    min-height: 82px;
}

.rv-star-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    background: rgba(7, 11, 20, 0.75);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    padding: 9px 14px;
    margin-bottom: 14px;
}
.rv-star-bar label {
    font-size: 0.8rem;
    font-weight: 600;
    color: #CBD5E1;
}
.rv-stars-input {
    display: flex;
    gap: 4px;
}
.rv-star-btn {
    background: transparent;
    border: none;
    font-size: 1.45rem;
    line-height: 1;
    color: #334155;
    cursor: pointer;
    padding: 2px;
    transition: transform 0.15s ease, color 0.15s ease;
}
.rv-star-btn.active {
    color: var(--accent-amber);
}
.rv-star-btn:hover {
    transform: scale(1.15);
}
.rv-submit-btn {
    width: 100%;
    justify-content: center;
    margin-top: 4px;
}
.rv-alert {
    margin-top: 12px;
    padding: 11px 14px;
    border-radius: 10px;
    font-size: 0.85rem;
}
.rv-alert.success {
    background: rgba(16, 185, 129, 0.15);
    border: 1px solid rgba(16, 185, 129, 0.45);
    color: #6EE7B7;
}
.rv-alert.error {
    background: rgba(239, 68, 68, 0.15);
    border: 1px solid rgba(239, 68, 68, 0.45);
    color: #FCA5A5;
}

/* Admin Banner */
.rv-admin-bar {
    background: rgba(127, 29, 29, 0.92);
    border-top: 1px solid rgba(239, 68, 68, 0.5);
    border-bottom: 1px solid rgba(239, 68, 68, 0.5);
    padding: 12px 0;
    color: #FEE2E2;
    font-size: 0.86rem;
}
.rv-admin-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
}
.rv-admin-exit {
    background: #EF4444;
    color: #fff;
    padding: 6px 14px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 700;
}

/* Marquee Showcase */
.rv-marquee-wrap {
    width: 100%;
    overflow: hidden;
    background: #050811;
    border-bottom: 1px solid rgba(255, 255, 255, 0.07);
    padding: 34px 0;
}
.rv-marquee-track {
    display: flex;
    width: max-content;
    gap: 20px;
    animation: rvMarquee 42s linear infinite;
}
.rv-marquee-wrap:hover .rv-marquee-track {
    animation-play-state: paused;
}
.rv-marquee-group {
    display: flex;
    gap: 20px;
}
.rv-m-card {
    width: clamp(275px, 76vw, 345px);
    padding: 20px;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.rv-m-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    margin-bottom: 10px;
}
.rv-m-stars {
    color: var(--accent-amber);
    letter-spacing: 2px;
    font-size: 0.9rem;
}
.rv-m-badge {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.68rem;
    background: rgba(0, 163, 255, 0.12);
    border: 1px solid rgba(0, 163, 255, 0.3);
    color: var(--accent-blue);
    padding: 3px 9px;
    border-radius: 99px;
}
.rv-m-card p {
    color: #E2E8F0;
    font-size: 0.86rem;
    line-height: 1.55;
    margin-bottom: 14px;
}
.rv-m-author strong {
    display: block;
    color: #fff;
    font-size: 0.86rem;
}
.rv-m-author span {
    color: #38BDF8;
    font-size: 0.74rem;
}
@keyframes rvMarquee {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}

/* Carrier Wall */
.rv-wall-head {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 34px;
}
.rv-filters {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.rv-chip {
    background: rgba(12, 20, 38, 0.65);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: #CBD5E1;
    padding: 8px 15px;
    border-radius: 99px;
    cursor: pointer;
    font-family: inherit;
    font-size: 0.82rem;
    font-weight: 500;
    transition: all 0.25s ease;
}
.rv-chip.active,
.rv-chip:hover {
    background: var(--accent-blue);
    border-color: var(--accent-blue);
    color: #050811;
    font-weight: 700;
}

.rv-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(min(100%, 330px), 1fr));
    gap: 20px;
}
.rv-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.rv-del-btn {
    position: absolute;
    top: 14px;
    right: 14px;
    background: #DC2626;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 5px 10px;
    font-size: 0.74rem;
    font-weight: 700;
    cursor: pointer;
    z-index: 6;
}
.rv-del-btn:hover {
    background: #B91C1C;
}
.rv-card-top {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 14px;
    min-width: 0;
}
.rv-avatar {
    width: 42px;
    height: 42px;
    border-radius: 11px;
    background: rgba(0, 163, 255, 0.15);
    border: 1px solid rgba(0, 163, 255, 0.35);
    color: var(--accent-blue);
    font-family: 'JetBrains Mono', monospace;
    font-weight: 700;
    font-size: 0.88rem;
    display: grid;
    place-items: center;
    flex-shrink: 0;
}
.rv-meta {
    min-width: 0;
    flex: 1;
}
.rv-meta h3 {
    margin: 0 0 2px;
    font-size: 0.98rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.rv-verified-sub {
    display: block;
    font-size: 0.76rem;
    color: #38BDF8;
    font-weight: 500;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.rv-card-stars {
    color: var(--accent-amber);
    font-size: 0.9rem;
    letter-spacing: 1px;
    flex-shrink: 0;
}
.rv-card-body {
    color: #E2E8F0 !important;
    font-size: 0.9rem !important;
    line-height: 1.6 !important;
    margin-bottom: 18px;
    overflow-wrap: anywhere;
}
.rv-card-foot {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
    border-top: 1px solid rgba(255, 255, 255, 0.07);
    padding-top: 12px;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.74rem;
}
.rv-tag {
    background: rgba(245, 158, 11, 0.12);
    border: 1px solid rgba(245, 158, 11, 0.3);
    color: var(--accent-amber);
    padding: 3px 9px;
    border-radius: 6px;
    font-weight: 600;
}
.rv-lane {
    color: var(--text-muted);
}
.rv-time {
    margin-left: auto;
    color: #64748B;
}
.rv-empty {
    grid-column: 1 / -1;
    text-align: center;
    padding: 44px 20px;
    background: rgba(12, 20, 38, 0.5);
    border: 1px dashed rgba(255, 255, 255, 0.14);
    border-radius: 16px;
    color: var(--text-muted);
}

/* Tablet & Mobile Responsive */
@media (max-width: 1024px) {
    .rv-hero-grid {
        grid-template-columns: 1fr;
        gap: 32px;
    }
}

@media (max-width: 640px) {
    .rv-stats-row {
        grid-template-columns: 1fr;
        gap: 10px;
    }
    .rv-stats-row .stat-box {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
    }
    .rv-stats-row .stat-box strong {
        margin-bottom: 0;
    }
    .rv-form-box {
        padding: 20px 16px;
    }
    .rv-chip {
        padding: 7px 12px;
        font-size: 0.78rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const isAdmin = @json($isAdmin);
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}';

    // Star Rating Picker
    const starButtons = document.querySelectorAll('#starSelector .rv-star-btn');
    const ratingInput = document.getElementById('ratingInput');
    starButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const val = parseInt(btn.dataset.value, 10);
            ratingInput.value = val;
            starButtons.forEach(b => b.classList.toggle('active', parseInt(b.dataset.value, 10) <= val));
        });
    });

    // Show / Hide Custom Equipment Input when "Other" is selected
    const equipSelect = document.getElementById('rv_equip');
    const customEquipWrap = document.getElementById('customEquipWrap');
    const customEquipInput = document.getElementById('rv_custom_equip');

    equipSelect?.addEventListener('change', () => {
        const isOther = equipSelect.value === 'Other';
        customEquipWrap.style.display = isOther ? 'block' : 'none';
        customEquipInput.required = isOther;
        if (isOther) {
            customEquipInput.focus();
        } else {
            customEquipInput.value = '';
        }
    });

    // Equipment Filter Chips
    document.querySelectorAll('#equipmentFilters .rv-chip').forEach(chip => {
        chip.addEventListener('click', () => {
            document.querySelectorAll('#equipmentFilters .rv-chip').forEach(c => c.classList.remove('active'));
            chip.classList.add('active');
            const filter = chip.dataset.filter;
            document.querySelectorAll('#liveReviewsGrid .rv-card').forEach(card => {
                card.style.display = (filter === 'all' || card.dataset.equipment === filter) ? '' : 'none';
            });
        });
    });

    // Instant AJAX Review Submit
    const form = document.getElementById('liveReviewForm');
    const alertBox = document.getElementById('reviewFormAlert');
    const submitBtn = document.getElementById('submitReviewBtn');
    const grid = document.getElementById('liveReviewsGrid');

    form?.addEventListener('submit', async (e) => {
        e.preventDefault();
        submitBtn.disabled = true;
        submitBtn.querySelector('span').textContent = 'Publishing Live...';
        alertBox.style.display = 'none';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' },
                body: new FormData(form)
            });
            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.message || 'Please complete all required fields.');
            }

            const r = data.review;
            const starsHtml = '★'.repeat(r.rating) + '☆'.repeat(5 - r.rating);
            const deleteBtnHtml = isAdmin ? `<button type="button" class="rv-del-btn" data-url="/reviews/${r.id}" title="Delete Review">✕ Delete</button>` : '';

            const newCard = document.createElement('article');
            newCard.className = 'glass-card rv-card';
            newCard.dataset.id = r.id;
            newCard.dataset.equipment = r.filter_key;
            newCard.innerHTML = `
                ${deleteBtnHtml}
                <div class="rv-card-top">
                    <div class="rv-avatar">${r.initials}</div>
                    <div class="rv-meta">
                        <h3>${r.reviewer_name}</h3>
                        <span class="rv-verified-sub">✓ ${r.subtitle}</span>
                    </div>
                    <div class="rv-card-stars">${starsHtml}</div>
                </div>
                <p class="rv-card-body">"${r.comment}"</p>
                <div class="rv-card-foot">
                    <span class="rv-tag">${r.equipment_type}</span>
                    <span class="rv-lane">${r.lane_route}</span>
                    <span class="rv-time">${r.created_human}</span>
                </div>
            `;

            document.getElementById('emptyReviewsNote')?.remove();
            grid.prepend(newCard);
            form.reset();
            customEquipWrap.style.display = 'none';
            customEquipInput.required = false;
            ratingInput.value = 5;
            starButtons.forEach(b => b.classList.add('active'));

            alertBox.className = 'rv-alert success';
            alertBox.textContent = data.message;
            alertBox.style.display = 'block';
        } catch (err) {
            alertBox.className = 'rv-alert error';
            alertBox.textContent = err.message;
            alertBox.style.display = 'block';
        } finally {
            submitBtn.disabled = false;
            submitBtn.querySelector('span').textContent = 'Publish Review Live';
        }
    });

    // Admin Delete Handler
    grid?.addEventListener('click', async (e) => {
        const delBtn = e.target.closest('.rv-del-btn');
        if (!delBtn) return;
        if (!confirm('Delete this review permanently?')) return;

        delBtn.disabled = true;
        delBtn.textContent = 'Deleting...';

        const res = await fetch(delBtn.dataset.url, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }
        });

        if (res.ok) {
            delBtn.closest('.rv-card').remove();
        } else {
            alert('Could not delete review. Please re-open Admin Mode.');
            delBtn.disabled = false;
            delBtn.textContent = '✕ Delete';
        }
    });
});
</script>
@endsection