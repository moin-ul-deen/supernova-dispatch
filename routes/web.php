<?php

use App\Mail\CarrierLeadMail;
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