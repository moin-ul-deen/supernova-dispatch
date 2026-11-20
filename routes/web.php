<?php

use App\Mail\CarrierLeadMail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/services', 'pages.services')->name('services');
Route::view('/equipment', 'pages.equipment')->name('equipment');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

// Live Carrier Reviews Page + Admin Moderation Unlock
Route::get('/reviews', function (Request $request) {
    $reviews = Review::latest()->get();

    if ($request->query('logout_admin') === '1') {
        session()->forget('reviews_admin_unlocked');
        return redirect()->route('reviews');
    }

    $adminKey = (string) env('REVIEWS_ADMIN_KEY', '');
    if ($adminKey !== '' && $request->filled('admin') && hash_equals($adminKey, (string) $request->query('admin'))) {
        session(['reviews_admin_unlocked' => true]);
    }

    $isAdmin = (bool) session('reviews_admin_unlocked', false);
    $avgRating = $reviews->count() ? round($reviews->avg('rating'), 1) : 4.9;

    return view('pages.reviews', compact('reviews', 'isAdmin', 'avgRating'));
})->name('reviews');

// Instant AJAX Review Submission
Route::post('/reviews', function (Request $request) {
    if ($request->filled('website_url')) {
        return response()->json(['status' => 'ok'], 200);
    }

    $validated = $request->validate([
        'reviewer_name'  => 'required|string|max:100',
        'company_name'   => 'nullable|string|max:120',
        'equipment_type' => 'required|string|max:50',
        'lane_route'     => 'nullable|string|max:100',
        'rating'         => 'required|integer|min:1|max:5',
        'comment'        => 'required|string|min:10|max:800',
    ]);

    $review = Review::create($validated);

    return response()->json([
        'status'  => 'success',
        'message' => 'Thank you! Your review is now live on Supernova Dispatch.',
        'review'  => [
            'id'             => $review->id,
            'reviewer_name'  => e($review->reviewer_name),
            'company_name'   => e($review->company_name ?: 'Independent Owner-Operator'),
            'equipment_type' => e($review->equipment_type),
            'lane_route'     => e($review->lane_route ?: 'Nationwide US Lanes'),
            'rating'         => (int) $review->rating,
            'comment'        => e($review->comment),
            'created_human'  => 'Just now',
            'initials'       => strtoupper(substr(trim($review->reviewer_name), 0, 2)),
        ],
    ]);
})->name('reviews.store');

// Admin-Only Spam Review Delete
Route::delete('/reviews/{review}', function (Review $review) {
    if (!session('reviews_admin_unlocked', false)) {
        return response()->json(['message' => 'Unauthorized'], 403);
    }

    $review->delete();

    return response()->json(['status' => 'deleted']);
})->name('reviews.destroy');

// Fleet Setup & Carrier Onboarding Form Submission (AJAX + Fallback)
Route::post('/fleet-setup', function (Request $request) {
    $validated = $request->validate([
        'full_name'       => 'required|string|max:120',
        'company_name'    => 'nullable|string|max:120',
        'phone'           => 'required|string|max:30',
        'email'           => 'required|email|max:120',
        'mc_number'       => 'nullable|string|max:40',
        'equipment_type'  => 'required|string|max:50',
        'preferred_lanes' => 'nullable|string|max:200',
        'notes'           => 'nullable|string|max:1000',
    ]);

    try {
        $recipient = env('DISPATCH_ADMIN_EMAIL', config('mail.from.address', 'dispatch@supernovadispatch.com'));
        Mail::to($recipient)->send(new CarrierLeadMail($validated));
    } catch (\Throwable $e) {
        Log::error('Carrier Lead Email Failed: ' . $e->getMessage(), $validated);
    }

    $message = 'Application received! A senior Supernova dispatcher will call you within 15 minutes with live loads.';

    if ($request->expectsJson()) {
        return response()->json([
            'status'  => 'success',
            'message' => $message,
        ]);
    }

    return back()->with('setup_success', $message);
})->name('fleet.setup');